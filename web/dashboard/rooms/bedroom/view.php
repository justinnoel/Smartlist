<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM bedroom WHERE login_id=:sessid OR login_id=:syncid ORDER BY id DESC");

$sql->execute(array( ':sessid' => $_SESSION['id'], ':syncid' => $_SESSION['syncid'] ));
$inv = $sql->fetchAll();

$arr = array_map("decrypt_all",$inv);

if(count($inv) == 0) {
  echo "<div class='center'><img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br>No items here?<br> <a href='#/add/bedroom' class='btn blue-grey darken-3 waves-effect waves-light btn-round'>Add an item</a></div>";
  exit();
}
?> 
<div class="container">
  <?php
  if(in_array("Bed", $arr) && in_array("Nightstand", $arr) && in_array("Pillow", $arr) && in_array("Alarm Clock", $arr) && in_array("Chair", $arr) && in_array("Wall Picture", $arr) && in_array("Table", $arr)) {} else{echo "<br><h6 class='orange-text'><i class=\"material-icons left\">auto_awesome</i>Suggested <span class='badge right new blue'></span></h6><br>";}
  ?>
  <div class="chipSuggestions">
    <?php 
    if(!in_array("Bed", $arr)) {echo '<a href="#/add/bedroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons left">bed</i>Bed</a>';}
    if(!in_array("Nightstand", $arr)) {echo '<a href="#/add/bedroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons left">light</i>Nightstand</a>';}
    if(!in_array("Pillow", $arr)) {echo '<a href="#/add/bedroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons left">crop_16_9</i>Pillow</a>';}
    if(!in_array("Alarm Clock", $arr)) {echo '<a href="#/add/bedroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons left">alarm</i>Alarm Clock</a>';}
    if(!in_array("Chair", $arr)) {echo '<a href="#/add/bedroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons left">event_seat</i>Chair</a>';}
    if(!in_array("Wall Picture", $arr)) {echo '<a href="#/add/bedroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons left">image</i>Wall Picture</a>';}
    if(!in_array("Table", $arr)) {echo '<a href="#/add/bedroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons left">table_bar</i>Table</a>';}

    ?>
  </div>
  <div style="text-align:right;padding: 10px">
    <a class="btn dropdown-trigger btn-flat waves-effect btn-outline btn-large" data-target="orderBy" href="javascript:void(0)">Filter <i class="material-icons right">arrow_drop_down</i></a>
  </div>
  <ul id='orderBy' class='dropdown-content'>
    <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(0, document.getElementById('bedroom_table'), 'asc')">Alphabetical (A-Z)</a></li>
    <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(0, document.getElementById('bedroom_table'), 'desc')">Alphabetical (Z-A)</a></li>
    <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(2, document.getElementById('bedroom_table'), 'desc')">Date Updated</a></li>
    <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(1, document.getElementById('bedroom_table'), 'asc')">Quantity</a></li>
  </ul>
  <script>
    $('.dropdown-trigger').dropdown({coverTrigger:true,constrainWidth: false});
  </script>
  <table id="bedroom_table">
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
        onclick="item(this,<?=$item['star']?>, '<?=strip_tags(decrypt($item['price']))?>', 'bedroom')">
      <td><?=strip_tags(decrypt($item['name']));?></td>
      <td><?=strip_tags(decrypt($item['qty']));?></td>
      <td class="hide"><?=strip_tags(($item['date']));?></td>
    </tr>
    <?php } ?>

  </table>
</div>
<script>
  function chipAdd(e) {
    localStorage.setItem('addBedroomName', e.innerText.replace(e.getElementsByTagName("i")[0].innerText, ""))
    localStorage.setItem('addBedroomQty', 1)
  }
  $('#app table tr').contextmenu(function(event) {
    event.preventDefault();
    var e = this.getAttribute('data-id');
    modal_open(e, this, 'bedroom');
  });
</script>