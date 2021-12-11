<?php
session_start();
include('../../cred.php');
?>
<h5>Backup</h5>
<p>Here, you can backup your items. However, you will not be able to re-import your data back to Smartlist. You may use this as a tool to keep your items for records. Backups will be stored in a .csv file. </p>
<a class="btn green darken-3" href="https://smartlist.ga/dashboard/user/settings/backup/upload/"><i class="material-icons left">upload</i>Import from JSON</a>
<ul class="collection">
  <li class="collection-item">
    <p>Kitchen</p>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=products&f=json" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">description</i>JSON</a>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=products&f=csv" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">table_view</i>CSV</a>
  </li>
  <li class="collection-item">
    <p>Garage</p>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=garage&f=json" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">description</i>JSON</a>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=garage&f=csv" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">table_view</i>CSV</a>
  </li>
  <li class="collection-item">
    <p>Bedroom</p>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=bedroom&f=json" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">description</i>JSON</a>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=bedroom&f=csv" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">table_view</i>CSV</a>
  </li>
  <li class="collection-item">
    <p>Bathroom</p>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=bathroom&f=json" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">description</i>JSON</a>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=bathroom&f=csv" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">table_view</i>CSV</a>
  </li>
  <li class="collection-item">
    <p>Family</p>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=family&f=json" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">description</i>JSON</a>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=family&f=csv" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">table_view</i>CSV</a>
  </li>
  <li class="collection-item">
    <p>Laundry Room</p>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=laundry&f=json" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">description</i>JSON</a>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=laundry&f=csv" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">table_view</i>CSV</a>
  </li>
  <li class="collection-item">
    <p>Camping Supplies</p>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=camping&f=json" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">description</i>JSON</a>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=camping&f=csv" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">table_view</i>CSV</a>
  </li>
  <li class="collection-item">
    <p>Dining room</p>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=dining_room&f=json" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">description</i>JSON</a>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=dining_room&f=csv" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">table_view</i>CSV</a>
  </li>
<?php 
    try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'];
    $users = $dbh->query($sql);
    foreach ($users as $row) {
    ?>
    <li class="collection-item">
        <p><?=$row['name'];?></p>
     <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=<?=urlencode($row['id']);?>&f=json" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">description</i>JSON</a>
    <a href="https://smartlist.ga/dashboard/user/settings/backup/?t=<?=urlencode($row['id']);?>&f=csv" download class="btn blue-grey darken-3 btn-round waves-effect waves-light"><i class="material-icons left">table_view</i>CSV</a>
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