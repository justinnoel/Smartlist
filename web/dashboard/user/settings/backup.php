<?php
session_start();
include('../../cred.php');
?>
<h5>Backup</h5>
<p>Here, you can backup your items. However, you will not be able to re-import your data back to Smartlist. You may use this as a tool to keep your items for records. Backups will be stored in a .csv file. </p>
<a class="btn green darken-3" href="https://smartlist.ga/dashboard/user/settings/backup/upload/">Import CSV</a>
<ul class="collection">
    <li class="collection-item">
        <p>Kitchen</p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/kitchen.php')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/kitchen.php')">PDF</a>
      <a class="btn blue-grey darken-3" href="./user/settings/backup/JSON/kitchen.php">JSON</a>
    </li>
    <li class="collection-item">
        <p>Bedroom</p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/bedroom.php')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/bedroom.php')">PDF</a>
    </li>
    <li class="collection-item">
        <p>Bathroom</p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/bathroom.php')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/bathroom.php')">PDF</a>
    </li>
    <li class="collection-item">
        <p>Garage</p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/garage.php')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/garage.php')">PDF</a>
    </li>
    <li class="collection-item">
        <p>Living Room</p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/livingroom.php')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/livingroom.php')">PDF</a>
    </li>
    <li class="collection-item">
        <p>Storage Room</p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/storageroom.php')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/storageroom.php')">PDF</a>
    </li>
    <li class="collection-item">
        <p>Camping Supplies</p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/camping.php')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/camping.php')">PDF</a>
    </li>
    <li class="collection-item">
        <p>Dining Room</p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/diningroom.php')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/diningroom.php')">PDF</a>
    </li>
    <li class="collection-item">
        <p>Laundry Room</p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/laundryroom.php')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/laundryroom.php')">PDF</a>
    </li>
</ul>
<br>
<p>Custom Rooms</p>
<ul class="collection">
<?php 
    try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'];
    $users = $dbh->query($sql);
    foreach ($users as $row) {
    //   echo "<li class=\"collection-item\" href=\"javascript:void(0)\" onclick=\"$('#ajaxLoader').load('./user/settings/backup/custom_room.php?id=".$row['id']."')\">Download ".htmlspecialchars($row['name'])."</li>";
    ?>
    <li class="collection-item">
        <p><?=$row['name'];?></p>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/custom_room.php?id=<?=$row['id'];?>')">CSV</a>
      <a class="btn blue-grey darken-3" href="javascript:void(0)" onclick="$('#ajaxLoader').load('./user/settings/backup/PDF/custom_room.php?id=<?=$row['id'];?>')">PDF</a>
    </li>
    <?php
    }
    $dbh = null;
  }
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
</ul>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src="https://unpkg.com/jspdf-autotable@3.5.14/dist/jspdf.plugin.autotable.js"></script>
<script>
function downloadFile(fileName, urlData) {
  var aLink = document.createElement('a');
  aLink.download = fileName;
  aLink.href = urlData;
  var event = new MouseEvent('click');
  aLink.dispatchEvent(event);
}
</script>