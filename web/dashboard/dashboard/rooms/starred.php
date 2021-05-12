<?php session_start();
include('cred.php');?>
<div class="card">
    <div class="card-content">
        <h5 style="margin:0;">Starred</h5><br>
<?php
   try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM products WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."') LIMIT 3";
       $users = $dbh->query($sql);
       $r1 = $users->rowCount();
       echo '<div class="collection">';
       foreach ($users as $row) {
           print "<a href='javascript:void(0)' class='collection-item'>".htmlspecialchars($row["name"]). "</a>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   }
   try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM bedroom WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."') LIMIT 3";
       $users = $dbh->query($sql);
       $r2 = $users->rowCount();
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           print "<a href='javascript:void(0)' class='collection-item'>".htmlspecialchars($row["name"]). "</a>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   }  
     try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM garage WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."') LIMIT 3";
       $users = $dbh->query($sql);
       $r3 = $users->rowCount();
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           print "<a href='javascript:void(0)' class='collection-item'>".htmlspecialchars($row["name"]). "</a>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   }  
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM bathroom WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."') LIMIT 3";
       $users = $dbh->query($sql);
       $r4 = $users->rowCount();
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           print "<a href='javascript:void(0)' class='collection-item'>".htmlspecialchars($row["name"]). "</a>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM family WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."') LIMIT 3";
       $users = $dbh->query($sql);
       $r5 = $users->rowCount();
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           print "<a href='javascript:void(0)' class='collection-item'>".htmlspecialchars($row["name"]). "</a>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM laundry WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."') LIMIT 3";
       $users = $dbh->query($sql);
       $r6 = $users->rowCount();
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           print "<a href='javascript:void(0)' class='collection-item'>".htmlspecialchars($row["name"]). "</a>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM camping WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."') LIMIT 3";
       $users = $dbh->query($sql);
       $r7 = $users->rowCount();
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           print "<a href='javascript:void(0)' class='collection-item'>".htmlspecialchars($row["name"]). "</a>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM storageroom WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."') LIMIT 3";
       $users = $dbh->query($sql);
       $r8 = $users->rowCount();
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           print "<a href='javascript:void(0)' class='collection-item'>".htmlspecialchars($row["name"]). "</a>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
   $res = $r1 + $r2 + $r3 + $r4 + $r5 + $r6 + $r7 + $r8;
   if($res == 0) {
       echo "<div style='width:100%;padding:10px;'>Top starred Items will appear here</div>";
   }
   ?>
   </div>
    </div>
</div>