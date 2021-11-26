<?php 
session_start();
include("../cred.php");
if(!isset($_GET['room'])) {
    die("Invalid room");
}
define("room", $_GET['room']);
switch(room) {
    case "bedroom": $chips = array("Bedside Table", "Bed", "Linens", "Pillow", "Pillow Cases", "Lamps", "Alarm Clock", "Chair", "Nightlight", "Rugs", "Dresser", "Throws (blankets)", "Nightstand", "Smoke Detector", "Wall Picture", "Duvet"); break;
    case "bathroom": $chips = array("Mirror", "Wastebasket", "Natural Hand Soap ", "Bath towels", "hand towels", "washcloths", "Non-skid bath mat ", "Toothbrush holder ", "Over-the-door and/or wall hooks", "Extra toilet paper", "Toilet paper storage", "Toilet brush & container ", "Plunger", "Green cleaning supplies ", "Non-skid tub mat", "Soap dispenser or dish", "Shower curtain, liner, and rings", "Cosmetics organizers", "Wall-mounted shelving", "Clothes hamper", "Razors ", "Hair brush", "Nail clippers", "Scale", "Dental floss ", "Bath pillow", "Hair dryer", "Pain reliever",); break;
    case "dining_room": $chips = array("Plates", "Plates ", "Cutlery sets", "Cutlery sets ", "Glasses", "Glasses ", "Cups", "Cups ", "Trays", "Trays ", "Napkin holders", "Napkin holders ", "Drink Coasters", "Drink Coasters ", "Sugar Bowls", "Sugar Bowls ", "Cookie jars", "Cookie jars ", "Teapots", "Teapots ", "Tea sets", "Tea sets ", "Serving bowls", "Serving bowls ", "Bowls", "Bowls ", "Salad bowls", "Salad bowls ", "Baskets", "Baskets ", "Bread Bins", "Bread Bins ", "Fruit Bowls", "Fruit Bowls ", "Egg Cups", "Egg Cups ", "Jugs", "Jugs ", "Decanters", "Decanters ", "Bottles", "Bottles ", "Corkscrew", "Corkscrew ", "Bottle openers", "Bottle openers ", "Bottle Stoppers", "Bottle Stoppers ", "Drip catchers", "Drip catchers ", "Foil cutters", "Foil cutters ", "Trivets", "Trivets ", "Table Decorations", "Table Decorations ", "Tea infusers", "Tea infusers ", "Butter dishes", "Butter dishes ", "Grated cheese bowls", "Grated cheese bowls ", "Pizza cutters", "Pizza cutters ", "Food Covers", "Food Covers ", "Knife rests", "Knife rests",); break;
    case "family": $chips = array("Wing chair", "TV stand", "Sofa", "Cushion", "Telephone", "Television", "Speaker", "End table", "Tea set", "Fireplace", "Remote", "Fan", "Floor lamp", "Carpet", "Table", "Blinds", "Curtains", "Picture", "Vase", "Grandfather clock",); break;
    case "garage": $chips = array("Dryer","Washer","Chainsaw","Basketball","Paintbrush","Tires","Snowblower","Hoe","Gas","Box","Suv","Oil","Bin","Saw","Door","Keys","Bugs","Tent","Nuts","Wood","Tool","Shoe","Boat","Pump","Dust","Junk","Tyre","Toys","Bike","Rake","Pail","Hose","Rods","Food","Rags","Brace","Spade","Table","Bench","Torch","Radio","Shelf","Boxes","Drill","Chair","Level","Mower","Broom","Grill","Paint","Truck","Vacuum","Window","Wheels","Ladder","Cooler","Blower","Cutter","Lights","Catbox","Shovel","Fridge","Clothes","Spanner","Baubles","Shelves","Storage","Freezer","Garbage","Carramp","Cupboard","Strimmer","Umbrella","Carparts","Pegboard","Furniture","Recycling","Motoroil","Linecord","Dumbbells","Deckchair","Skateboard","Lawnedger","Fertilizer","Golfclubs","Wheelbarrow","Pottingmix","Workgloves","Waterheater","Gardentools","Bushtrimmer","Tapemeasure","Extinguisher",); break;
    case "kitchen": $chips = array("artichoke", "aubergine", "asparagus", "legumes", "alfalfa sprouts", "azuki beans", "bean sprouts", "black beans", "black-eyed peas", "borlotti bean", "broad beans", "chickpeas, garbanzos, or ceci beans", "green beans", "kidney beans", "lentils", "lima beans or butter bean", "mung beans", "navy beans", "peanuts", "pinto beans", "runner beans", "split peas", "soy beans", "peas", "mangetout or snap peas", "broccoflower", "broccoli", "brussels sprouts", "cabbage", "kohlrabi", "Savoy cabbage", "red cabbage", "cauliflower", "celery", "endive", "fiddleheads", "frisee", "fennel", "greens", "bok choy", "chard", "collard greens", "kale", "mustard greens", "herbs", "anise", "basil", "caraway", "coriander", "chamomile", "daikon", "dill", "fennel", "lavender", "lemongrass", "marjoram", "oregano", "parsley", "rosemary", "thyme", "lettuce", "arugula", "mushrooms", "nettles", "New Zealand spinach", "okra", "onions", "chives", "garlic", "leek", "onion", "shallot", "scallion", "peppers", "bell pepper", "chili pepper", "jalapeño", "habanero", "paprika", "tabasco pepper", "cayenne pepper", "radicchio", "rhubarb", "root vegetables", "beetroot", "carrot", "celeriac", "corms", "eddoe", "konjac", "taro", "water chestnut", "ginger", "parsnip", "rutabaga", "radish", "wasabi", "horseradish", "Diakon or white radish", "tubers", "jicama", "jerusalem artichoke", "potato", "sweet potato", "yam", "turnip", "salsify", "skirret", "sweetcorn", "topinambur", "squashes ", "acorn squash", "bitter melon", "butternut squash", "banana squash", "Zucchini", "cucumber ", "delicata", "gem squash", "hubbard squash", "Squash", "spaghetti squash", "spinach", "tomato ", "watercress"); break;
    case "laundry": $chips = array("Detergent", "Bleach", "Dryer sheets", "Stain and odor removers", "Linens", "Iron Board", "Washer", "Dryer", "Micro-fiber towels", "Extra Towels", "Cleaning Supplies", "Iron", "Drying Rack", "Laundry Basket", "Hamper",); break;
    case "storage": $chips = array("Lysol", "Clorox", "Picture Frames", "HDMI cables", "USB chargers", "Computer mouse", "Keyboard", "Apron", "Shower Curtain", "Suitcase", "Chairs", "Fold tables", "Paper Cups", "Plastic utensils", "Plastic forks", "Disposable masks", "Disposable gloves", "Rake", "Car tires", "Bicycle", "Face shield", "Glass Cleaner", "Oil Degreaser", "BBQ tool set", "Barbeque", "Shovel",); break;
}
$chips = array_map('ucfirst', $chips);
$rand_keys = array_rand($chips, 15);
?>

<br><br>
<div class="container">
  <form action="https://smartlist.ga/dashboard/rooms/addToRoom.php?room=<?=urlencode((room == 'kitchen' ? 'products':room));?>" method="POST" id="<?=(room);?>_add_form">
    <h5>Add an item <span style="color: rgba(100, 100, 100, .8);margin-left: 5px">(<?=ucfirst(room);?>)</span></h5>
    <div class="input-field input-border">
      <input type="text" name="name" autofocus id="autofocus1" data-length="150" autocomplete="off" required>
      <label>Name</label>
    </div>
    <div class="chip-suggestions">
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[0]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[1]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[2]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[3]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[4]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[5]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[6]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[7]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[8]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[9]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[10]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[11]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[12]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[13]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[14]];?></div>
    </div>
    <div class="input-field input-border">
      <input type="text" name="qty" autocomplete="off" id="add<?=ucfirst(room);?>Qty">
      <label>Quantity</label>
      <?php include('suggestion_count.php'); ?>
    </div>
    <?php include('category_select.php');?> 
    <input type="hidden" id="date" name="date">

    <button class="btn blue-grey darken-3 waves-effect waves-light btn-round">
      <i class="material-icons-round left">save</i> Save
    </button>
  </form>
</div>
<script>
  document.getElementById('autofocus1').addEventListener("keyup", () => 
                                                         localStorage.setItem("add<?=ucfirst(room);?>Name", document.getElementById('autofocus1').value))
  document.getElementById('autofocus1').value = localStorage.getItem('add<?=ucfirst(room);?>Name') || ""

  document.getElementById('add<?=ucfirst(room);?>Qty').addEventListener("keyup", () => 
                                                            localStorage.setItem("add<?=ucfirst(room);?>Qty", document.getElementById('add<?=ucfirst(room);?>Qty').value))
  document.getElementById('add<?=ucfirst(room);?>Qty').value = localStorage.getItem('add<?=ucfirst(room);?>Qty') || ""
  $(document).ready(function() {
    $('.validate').characterCounter();
  });
  $("#<?=(room);?>_add_form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        localStorage.setItem('add<?=ucfirst(room);?>Name', "")
        localStorage.setItem('add<?=ucfirst(room);?>Qty', "")
        document.getElementById('date').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    
        document.getElementById('autofocus1').focus()
        document.getElementById('<?=(room);?>_add_form').reset()
        if(data == "Item Already Exists!") {
          M.toast({html: "Item Already Exists!"});
        }
        else {
          M.toast({html: 'Added item successfully. You can keep adding more'});
        }
      }
    });
  });

</script>