<?php 
session_start();
include("../../cred.php");
?>

<h5>Custom Categories</h5>
<p>Add custom categories, such as "Pillows", "Bottom Rack", "Jackets", etc. Note that deleting a label <b>does not items with the label.</b></p>
<ul class="collection">
  <?php
  try
  {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM labels WHERE login=:sessid");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();

    foreach ($users as $row){
  ?>
  <li class="collection-item <?=(isset($row['image']) && !empty($row['image']) ? "avatar" : "");?>"> 
    <?=(isset($row['image']) && !empty($row['image']) ? "<img src='".$row['image']."' class='circle'>":"");?>
    <a href="javascript:void(0)" class="right btn waves-effect btn-flat btn-floating" onclick="$('#ajaxLoader').load('./user/labels/delete.php?id=<?=$row['id'];?>', getHashPage)"><i class="material-icons" style="color:var(--font-color)!important">delete</i></a>
    <h5><b><?=htmlspecialchars($row['name'])?></b></h5>
    <br>
    <br>
  </li>
  <?php
      }
    $dbh = null;
  }
  catch(PDOexception $e)
  {
    echo "Error is: " . $e->etmessage();
  }
  ?>
</ul>
<div class="fixed-action-btn">
  <a href="javascript:void(0)" class="btn-fixed btn blue-grey darken-3 btn-large btn-floating" onclick="$('#settingsContainer').load('./user/labels/add.php')">
    <i class="material-icons">add</i>
  </a> 
</div>