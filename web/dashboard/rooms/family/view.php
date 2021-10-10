<?php
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM family WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt($_SESSION['syncid'])). " ORDER BY id DESC";
$items = $dbh->query($sql);
$inv = $items->fetchAll();
$arr = array_map("decrypt_all",$inv);
if($items->rowCount() == 0) {
  echo "<div class='center'><img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br>No items here? Try <a href='#/add/bedroom'>adding something. </a></div>";
  exit();
}
?> 
<div class="container">
  <?php
  if(in_array("TV", $arr) && in_array("Router", $arr) && in_array("Couch", $arr) && in_array("Floor Lamp", $arr) && in_array("Center Table", $arr) && in_array("Wall Picture", $arr) && in_array("Table", $arr)) {} else{echo "<br><h6 class='orange-text'><i class=\"material-icons left\">auto_awesome</i>Suggested <span class='badge right new blue'></span></h6><br>";}
  ?>
  <div class="chipSuggestions">
    <?php 
    if(!in_array("TV", $arr)) {echo '<a href="#/add/family" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons-round left">tv</i>TV</a>';}
    if(!in_array("Router", $arr)) {echo '<a href="#/add/family" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons-round left">router</i>Router</a>';}
    if(!in_array("Couch", $arr)) {echo '<a href="#/add/family" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons-round left">chair</i>Couch</a>';}
    if(!in_array("Floor Lamp", $arr)) {echo '<a href="#/add/family" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons-round left">tungsten</i>Floor Lamp</a>';}
    if(!in_array("Center Table", $arr)) {echo '<a href="#/add/family" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons-round left">table_bar</i>Center Table</a>';}
    if(!in_array("Wall Picture", $arr)) {echo '<a href="#/add/family" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons-round left">image</i>Wall Picture</a>';}
    if(!in_array("Table", $arr)) {echo '<a href="#/add/family" onclick="chipAdd(this)" class="chip chip_icon waves-effect"><i class="material-icons-round left">table_bar</i>Table</a>';}

    ?>
  </div>
  <table id="family_table">
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
        id="familytr_<?=intval($item['id']);?>" 
        onclick="item(this,<?=$item['star']?>, '<?=strip_tags(decrypt($item['price']))?>', 'family')">
      <td><?=strip_tags(decrypt($item['name']));?></td>
      <td><?=strip_tags(decrypt($item['qty']));?></td>
    </tr>
    <?php } ?>

  </table>
</div>
<script>
  function chipAdd(e) {
    localStorage.setItem('addFamilyName', e.innerText.replace(e.getElementsByTagName("i")[0].innerText, ""))
    localStorage.setItem('addFamilyQty', 1)
  }
  $('#app table tr').contextmenu(function(event) {
    event.preventDefault();
    var e = this.getAttribute('data-id');
    modal_open(e, this, 'family');
  });
</script>
