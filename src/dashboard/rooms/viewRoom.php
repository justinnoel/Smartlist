<?php
// Class for suggested stuff at the top.
class Suggestions {
    protected $items;
    protected $chips;
    
    public function __construct($items) {
        $this->items = $items;
    }
    public function displaySuggestedItems() {
        switch(_table) {
            case "products": 
                $chips = array(
                    "Fridge" => "kitchen",
                    "Coffee maker" => "coffee_maker",
                    "Cups" => "coffee",
                    "Utensils" => "flatware",
                    "Blender" => "blender",
                    "Bowls" => "rice_bowl",
                    "Plate" => "circle",
                    "Microwave" => "microwave",
                    "Egg" => "egg",
                    "Cookie" => "cookie",
                );
                break;
                
            case "bathroom": 
                $chips = array(
                    "Bathtub" => "bathtub",
                    "Shower" => "shower",
                    "Soap" => "soap",
                    "Dryer" => "dry",
                    "Sink" => "wash",
                    "Light" => "light",
                    "Wall picture" => "image"
                );
                break;
            
            case "bedroom": 
                $chips = array(
                    "Bed" => "bed",
                    "Nightstand" => "light",
                    "Pillow" => "crop_16_9",
                    "Alarm clock" => "alarm",
                    "Chair" => "event_seat",
                    "Wall picture" => "image",
                    "Table" => "table_bar",
                    "Dresser" => "cabin",
                    "Light" => "light",
                );
                break;
                
            case "family": 
                $chips = array(
                    "TV" => "tv",
                    "Router" => "router",
                    "Couch" => "chair",
                    "Floor Lamp" => "tungsten",
                    "Center Table" => "table_bar",
                    "Wall picture" => "image",
                    "Table" => "table_bar"
                );
                break;
                
             case "garage": 
                $chips = array(
                    "Car" => "directions_car",
                    "Wrench" => "build",
                    "Saw" => "carpenter",
                    "Hammer" => "construction",
                    "Fitness equipment" => "fitness_center",
                    "Basketball" => "sports_basketball",
                    "Soccer ball" => "sports_soccer",
                    "Bike" => "directions_bike",
                    "Surf board" => "surfing",
                    "Baseball" => "sports_baseball",
                    "Speaker" => "speaker",
                    "Boxes" => "inventory_2",
                    "Fire extinguisher" => "fire_extinguisher",
                );
                break;
                
            case "laundry": 
                $chips = array(
                    "Dryer" => "dry",
                    "Washer" => "local_laundry_service",
                    "Laundry Detergent" => "sanitizer",
                );
                break;
                
            case "camping": 
            case "dining_room": 
            case "storageroom": 
                $chips = array();
                break;
        }
        $count=0;
        $tempChips = "";
        foreach ($chips as $name=>$icon) {
            if(!in_array( strtolower($name), array_map("strtolower", $this->items) )) {
                $count++;
                $tempChips.= "<div onclick=\"chipAdd(this)\" class=\"chip-border chip waves-effect chip_icon\"><i class=\"material-icons left\">$icon</i>$name</div>";
            }
        }
        if($count > 0) {
            echo "<br><h6 class='orange-text'><i class=\"material-icons left\">auto_awesome</i>Suggested <span class='badge right new blue'></span></h6><br>";
            echo "<div class='chipSuggestions'>".$tempChips."</div>";
        }
    }
}

ini_set('display_errors', 1);
session_start();
require '../cred.php';
if (!isset($_GET['room'])) {
    die("Invalid room!");
}
define("_table", $_GET['room']);
$availableTables = array(
    "products",
    "bedroom",
    "bathroom",
    "garage",
    "family",
    "dining_room",
    "laundry",
    "storageroom",
    "camping"
);
$room = _table;

if (_table == "products") {
    $room = "kitchen";
}

try {
    $dbh = new PDO("mysql:host=".app::server.";dbname=" . app::database, app::username, app::password);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = $dbh->prepare("SELECT * FROM " . _table . " WHERE login_id=:sessid OR login_id=:syncid ORDER BY id DESC");

    $sql->execute(array(
        ':sessid' => $_SESSION['id'],
        ':syncid' => $_SESSION['syncid']
    ));
    $inv = $sql->fetchAll();

    $arr = array_map("decrypt_all", $inv);

    if (count($inv) == 0) {
        die("<div class='center'><img alt='image' src='https://i.ibb.co/dpYCnCG/fogg-616.png' width='300px' style='display:block;margin:auto;'><br>No items here? Try <a href='#/add/" . $room . "'>adding something. </a></div>");
    }
}
catch(Exception $e) {
    die($e->getMessage());
}

?> 
<div class="container">
    <?php
    $chips = new Suggestions(array_map("decrypt_all", $inv));
    $chips->displaySuggestedItems();
    ?>
  <div style="text-align:right;padding: 10px">
    <a class="btn dropdown-trigger btn-flat waves-effect btn-round btn-outline btn-large" style="color:var(--font-color)!important;padding: 0 15px !important;border-radius: 999px!important" data-target="orderBy" href="javascript:void(0)">Filter <i class="material-icons right" style="color:var(--font-color)!important;margin-right: 10px!important;">arrow_drop_down</i></a>
  </div>
  <table id="_itemTable">
    <tr>
      <td>Name</td>
      <td>Quantity</td>
    </tr>

    <?php
foreach ($inv as $item) {
?>
    <tr 
        class="<?=(intval($item['login_id']) !== intval($_SESSION['id']) ? "sync_tr" : "") ?>" 
        data-date="<?=($item['date']) ?>" 
        tabindex='0'
        onkeyup="if(event.keyCode===13) this.click();"
        <?=($item['star'] == 1 ? 'style="border-left: 3px solid #f57f17;"' : '') ?>
        data-id="<?=intval($item['id']) ?>" 
        id="kitchentr_<?=intval($item['id']); ?>" 
        onclick="item(this,<?=$item['star'] ?>, '<?=strip_tags(decrypt($item['price'])) ?>', '<?=$room; ?>')">
      <td><?=strip_tags(decrypt($item['name'])); ?></td>
      <td><?=strip_tags(decrypt($item['qty'])); ?></td>
      <td class="hide"><?=trim(explode("on ", strip_tags(($item['date']))) [0]); ?></td>
    </tr>
    <?php
} ?>

  </table>
</div>
<ul id='orderBy' class='dropdown-content'>
  <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(0, document.getElementById('_itemTable'), 'asc')">Alphabetical (A-Z)</a></li>
  <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(0, document.getElementById('_itemTable'), 'desc')">Alphabetical (Z-A)</a></li>
  <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(2, document.getElementById('_itemTable'), 'desc')">Date Updated</a></li>
  <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(1, document.getElementById('_itemTable'), 'asc')">Quantity</a></li>
</ul>
<script>
  var room = <?=json_encode(ucfirst($room)); ?>;
  
  function chipAdd(i) {
    localStorage.setItem("add"+room+"Name", i.innerText.replace(i.getElementsByTagName("i")[0].innerText, ""))
    localStorage.setItem("add"+room+"Qty", 1)
    window.location.hash="#/add/"+room.toLowerCase();
  }
  $('#app table tr').contextmenu(function(event) {
      event.preventDefault();
    event.target.click();
  });
  $('.dropdown-trigger').dropdown({coverTrigger:true,constrainWidth: false});
</script>