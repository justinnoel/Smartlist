<?php 
session_start();
include('../../cred.php');
?>
<ul class="collection"> 
<h5>Rooms</h5><br> <?php try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt($_SESSION['syncid']));
$users = $dbh->query($sql);
foreach ($users as $row)
{
print "<li class=\"collection-item\" style='width:100%;'><i class='material-icons-round left'>" . $row['qty'] . "</i>" . $row["name"] . " <a class='secondary-content waves-effect _room' href='https://smartlist.ga/dashboard/rooms/custom_room/custom_room_delete.php?id=" . $row['id'] . "&name=" . urlencode($row['name']) . "'><i class='material-icons-round'>delete</i></a></li>";
}
$dbh = null;
}
catch(PDOexception $e)
{
echo "Error is: " . $e->etmessage();
} ?> </ul> 