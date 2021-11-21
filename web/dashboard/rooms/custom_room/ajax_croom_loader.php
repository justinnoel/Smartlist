<?php
ini_set('display_errors', 1);
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM custom_room_items WHERE price=:room AND (login_id=:sessid OR login_id=:syncid )");

$sql->execute(array( ':sessid' => $_SESSION['id'], ':syncid' => $_SESSION['syncid'], ':room' => $_GET['room']));
$inv = $sql->fetchAll();

if(count($inv) == 0) {
  echo "<div class='center'><img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br>No items here?<br> <a href='#/add/".intval($_GET['room'])."' class='btn blue-grey darken-3 waves-effect waves-light btn-round'>Add an item</a></div>";
  exit();
}
?> 
<div class="container">
  <div style="text-align:right;padding: 10px">
    <a class="btn dropdown-trigger btn-flat waves-effect btn-outline btn-large" data-target="orderBy" href="javascript:void(0)">Filter <i class="material-icons right">arrow_drop_down</i></a>
  </div>
  <table id="kitchen_table">
    <tr>
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
        id="croomtr_<?=intval($item['id']);?>" 

        onclick="item(this,<?=(empty(trim($item['star']))?0:$item['star'])?>, '<?=strip_tags(($item['label']))?>', 'custom_room')">
      <td><?=strip_tags(decrypt($item['name']));?></td>
      <td><?=strip_tags(decrypt($item['qty']));?></td>
      <td class="hide"><?=trim(explode("on ", strip_tags(($item['date'])))[0]);?></td>
    </tr>
    <?php } ?>

  </table>
</div>
<ul id='orderBy' class='dropdown-content'>
  <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(0, document.getElementById('kitchen_table'), 'asc')">Alphabetical (A-Z)</a></li>
  <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(0, document.getElementById('kitchen_table'), 'desc')">Alphabetical (Z-A)</a></li>
  <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(2, document.getElementById('kitchen_table'), 'desc')">Date Updated</a></li>
  <li><a href="javascript:void(0)" class="waves-effect" onclick="$('.dropdown-trigger').html(this.innerText+'<i class=\'material-icons right\'>arrow_drop_down</i>');sortTable(1, document.getElementById('kitchen_table'), 'asc')">Quantity</a></li>
</ul>
<script>
  $('#app table tr').contextmenu(function(event) {
    event.preventDefault();
    var e = this.getAttribute('data-id');
    modal_open(e, this, 'custom_room');
  });
  $('.dropdown-trigger').dropdown({coverTrigger:true,constrainWidth: false});
</script>
