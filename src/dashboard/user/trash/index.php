<?php 
ini_set("display_errors", 1);
session_start();
require "../../cred.php";
try {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM trash WHERE login=:sessid ORDER by id DESC");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();
if(count($users)!==0) {
  echo '<div class="container"><br><br><h5><b>Deleted items</b></h5><p>All items in your trash will be deleted weekly on Friday at 12:00 AM</p><a href="javascript:void(0)" class="btn-round btn red darken-3 waves-effect waves-light" onclick="if(confirm(\'Delete trash? These items will be permanently deleted!\') == true){ $(\'#ajaxLoader\').load(\'https://smartlist.ga/dashboard/user/trash/deleteUserTrash.php?item_count=\',getHashPage)}"><i class="material-icons left">delete_forever</i>Clear trash</a><br><br><div class="row">';
}
foreach ($users as $row)
{
  ?>
  <div class="col s12 m4">
    <div class="card">
      <div class="card-content">
        <h6><b><?=decrypt($row['name']);?></b></h6>
        <p><?=decrypt($row['qty']);?><br><?=$row['room'];?></p>
        <br>
      </div>
    </div>
  </div>
  <?php 
}
if(count($users)==0) {
?>
  <center>
  <br><br><br>
    <h1 class="grey-text lighten-3"><i class="material-icons medium">error</i></h1>
    <h5 class="grey-text lighten-3">No items in trash</h5>
  </center>
  <?php 
}
}
catch (Exception $e) {
  echo $e->getMessage();
}
if(count($users)!==0) {
  echo "</div></div>";
}