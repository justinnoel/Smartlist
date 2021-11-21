<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM bathroom WHERE login_id=:sessid OR login_id=:syncid ORDER BY id DESC");

$sql->execute(array( ':sessid' => $_SESSION['id'], ':syncid' => $_SESSION['syncid'] ));
$inv = $sql->fetchAll();

$arr = array_map("decrypt_all",$inv);

if(count($inv) == 0) {
  echo "<div class='center'><img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br>No items here?<br> <a href='#/add/bathroom' class='btn blue-grey darken-3 waves-effect waves-light btn-round'>Add an item</a></div>";
  exit();
}
?> 
<div class="container">
  <?php
  if(in_array("Bathtub", $arr) && in_array("Shower", $arr) && in_array("Soap", $arr) && in_array("Dryer", $arr) && in_array("Sink", $arr) && in_array("Wall Picture", $arr) && in_array("Table", $arr)) {} else{echo "<br><h6 class='orange-text'><i class=\"material-icons left\">auto_awesome</i>Suggested <span class='badge right new blue'></span></h6><br>";}
  ?>
  <div class="chipSuggestions">
    <?php 
    if(!in_array("Bathtub", $arr)) {echo '<a href="#/add/bathroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons-round left">bathtub</i>Bathtub</a>';}
    if(!in_array("Shower", $arr)) {echo '<a href="#/add/bathroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons-round left">shower</i>Shower</a>';}
    if(!in_array("Soap", $arr)) {echo '<a href="#/add/bathroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons-round left">soap</i>Soap</a>';}
    if(!in_array("Dryer", $arr)) {echo '<a href="#/add/bathroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons-round left">dry</i>Dryer</a>';}
    if(!in_array("Sink", $arr)) {echo '<a href="#/add/bathroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons-round left">wash</i>Sink</a>';}
    if(!in_array("Wall Picture", $arr)) {echo '<a href="#/add/bathroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons-round left">image</i>Wall Picture</a>';}
    if(!in_array("Table", $arr)) {echo '<a href="#/add/bedroom" onclick="chipAdd(this)" class="chip-border chip chip_icon waves-effect"><i class="material-icons-round left">table_bar</i>Table</a>';}

    ?>
  </div>
    <div style="text-align:right;padding: 10px">
    <a class="btn dropdown-trigger btn-flat waves-effect btn-outline btn-large" data-target="orderBy" href="javascript:void(0)">Filter <i class="material-icons right">arrow_drop_down</i></a>
  </div>
  <ul id='orderBy' class='dropdown-content'>
    <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(0, document.getElementById('bathrom_table'), 'asc')">Alphabetical (A-Z)</a></li>
    <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(0, document.getElementById('bathrom_table'), 'desc')">Alphabetical (Z-A)</a></li>
    <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(2, document.getElementById('bathrom_table'), 'desc')">Date Updated</a></li>
    <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(1, document.getElementById('bathrom_table'), 'asc')">Quantity</a></li>
  </ul>
  <script>
    $('.dropdown-trigger').dropdown({coverTrigger:true, constrainWidth: false});
  </script>
  <table id="bathroom_table">
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
        id="bathroomtr_<?=intval($item['id']);?>" 
        onclick="item(this,<?=$item['star']?>, '<?=strip_tags(decrypt($item['price']))?>', 'bathroom')">
      <td><?=strip_tags(decrypt($item['name']));?></td>
      <td><?=strip_tags(decrypt($item['qty']));?></td>
      <td class="hide"><?=strip_tags(($item['date']));?></td>
    </tr>
    <?php } ?>

  </table>
</div>
<script>
  function chipAdd(e) {
    localStorage.setItem('addBathroomName', e.innerText.replace(e.getElementsByTagName("i")[0].innerText, ""))
    localStorage.setItem('addBathroomQty', 1)
  }
  $('#app table tr').contextmenu(function(event) {
    event.preventDefault();
    var e = this.getAttribute('data-id');
    modal_open(e, this, 'bathroom');
  });
</script>
