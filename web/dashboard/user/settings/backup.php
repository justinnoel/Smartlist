<?php
session_start();
include('../../cred.php');
?>
<h5>Backup</h5>
<p>Here, you can backup your items. However, you will not be able to re-import your data back to Smartlist. You may use this as a tool to keep your items for records. Backups will be stored in a .csv file. </p>

<a href="javascript:void(0)" onclick="$('#div1').load('./user/settings/backup/kitchen.php')">Download Kitchen</a><br>
<a href="javascript:void(0)" onclick="$('#div1').load('./user/settings/backup/bedroom.php')">Download Bedroom</a><br>
<a href="javascript:void(0)" onclick="$('#div1').load('./user/settings/backup/bathroom.php')">Download Bathroom</a><br>
<a href="javascript:void(0)" onclick="$('#div1').load('./user/settings/backup/garage.php')">Download Garage</a><br>
<a href="javascript:void(0)" onclick="$('#div1').load('./user/settings/backup/livingroom.php')">Download Living Room</a><br>
<a href="javascript:void(0)" onclick="$('#div1').load('./user/settings/backup/storageroom.php')">Download Storage Room</a><br>
<a href="javascript:void(0)" onclick="$('#div1').load('./user/settings/backup/camping.php')">Download Camping Supplies</a><br>
<a href="javascript:void(0)" onclick="$('#div1').load('./user/settings/backup/diningroom.php')">Download Dining Room</a><br>
<a href="javascript:void(0)" onclick="$('#div1').load('./user/settings/backup/laundryroom.php')">Download Laundry Room</a><br>
<br>
<p>Custom Rooms</p>
<?php 
    try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'];
    $users = $dbh->query($sql);
    foreach ($users as $row) {
      echo "<a href=\"javascript:void(0)\" onclick=\"$('#div1').load('./user/settings/backup/custom_room.php?id=".$row['id']."')\">Download ".htmlspecialchars($row['name'])."</a><br>";
    }
    $dbh = null;
  }
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>

<script>
  function downloadFile(fileName, urlData) {
    var aLink = document.createElement('a');
    aLink.download = fileName;
    aLink.href = urlData;
    var event = new MouseEvent('click');
    aLink.dispatchEvent(event);
  }
</script>