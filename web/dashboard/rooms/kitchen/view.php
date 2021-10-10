<?php
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM products WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt($_SESSION['syncid'])). " ORDER BY id DESC";
$items = $dbh->query($sql);
$inv = $items->fetchAll();
$arr = array_map("decrypt_all",$inv);
if($items->rowCount() == 0) {
  echo "<div class='center'><img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br>No items here? Try <a href='#/add/kitchen'>adding something. </a></div>";
  exit();
}
?> 
<div class="container">
  <?php
  if(in_array("Fridge", $arr) && in_array("Coffee Maker", $arr) && in_array("Cups", $arr) && in_array("Utensils", $arr) && in_array("Blender", $arr) && in_array("Microwave", $arr) && in_array("Bowls", $arr)&&in_array("Plate", $arr)) {} else{echo "<br><h6 class='orange-text'><i class=\"material-icons left\">auto_awesome</i>Suggested <span class='badge right new blue'></span></h6><br>";}
  ?>
  <div class="chipSuggestions">
    <?php 
    if(!in_array("Fridge", $arr)) {echo '<a href="#/add/kitchen" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons left">kitchen</i>Fridge</a>';}
    if(!in_array("Coffee Maker", $arr)) {echo '<a href="#/add/kitchen" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons left">coffee_maker</i>Coffee Maker</a>';}
    if(!in_array("Cups", $arr)) {echo '<a href="#/add/kitchen" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons left">coffee</i>Cups</a>';}
    if(!in_array("Utensils", $arr)) {echo '<a href="#/add/kitchen" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons left">flatware</i>Utensils</a>';}
    if(!in_array("Blender", $arr)) {echo '<a href="#/add/kitchen" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons left">blender</i>Blender</a>';}
    if(!in_array("Microwave", $arr)) {echo '<a href="#/add/kitchen" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons left">microwave</i>Microwave</a>';}
    if(!in_array("Bowls", $arr)) {echo '<a href="#/add/kitchen" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons left">rice_bowl</i>Bowls</a>';}
    if(!in_array("Plate", $arr)) {echo '<a href="#/add/kitchen" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons left">circle</i>Plate</a>';}

    ?>
  </div>
  <table id="kitchen_table">
    <tr class="hover">
      <td>Name</td>
      <td>Quantity</td>
    </tr>

    <?php
    foreach($inv as $item) {
    ?>
    <tr 
        class="<?=($item['login_id'] !== $_SESSION['id'] ? "sync_tr" : "")?>" 
        data-date="<?=($item['date'])?>" 
        tabindex='0' 
        <?=($item['star'] == 1 ? 'style="border-left: 3px solid #f57f17;"' : '')?>
        data-id="<?=intval($item['id'])?>" 
        id="kitchentr_<?=intval($item['id']);?>" 
        onclick="item(this,<?=$item['star']?>, '<?=strip_tags(decrypt($item['price']))?>', 'kitchen')">
      <td><?=strip_tags(decrypt($item['name']));?></td>
      <td><?=strip_tags(decrypt($item['qty']));?></td>
    </tr>
    <?php } ?>

  </table>
</div>
<script>
  function chipAdd(e) {
    localStorage.setItem('addKitchenName', e.innerText.replace(e.getElementsByTagName("i")[0].innerText, ""))
    localStorage.setItem('addKitchenQty', 1)
  }
  $('#app table tr').contextmenu(function(event) {
    event.preventDefault();
    var e = this.getAttribute('data-id');
    modal_open(e, this, 'kitchen');
  });
</script>
