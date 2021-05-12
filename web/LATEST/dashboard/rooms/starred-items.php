<?php session_start();
include('../cred.php');
   try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM products WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."')";
       $users = $dbh->query($sql);
       echo '<table class="table container">
                 <tr>
                  <td><b>Name</b></td>
                  <td><b>Quantity</b></td>
                  <td style="width:15%"><b>Room</b></td>
                 </tr>';
       foreach ($users as $row) {
           echo "<tr class='draggables' id='tr_star_".$row['id']."'>";
           print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."</td><td>Kitchen</td></tr>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   }
   try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM bedroom WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."')";
       $users = $dbh->query($sql);
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           echo "<tr class='draggables'>";
           
           print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."";
           if ($row['login_id'] != $_SESSION['id']) {
                    echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
           }
           echo "</td><td>Bedroom</td></tr>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   }  
     try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM garage WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."')";
       $users = $dbh->query($sql);
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           echo "<tr class='draggables'>";
           
           print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."";
           if ($row['login_id'] != $_SESSION['id']) {
                    echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
           }
           echo "</td><td>Garage</td></tr>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   }  
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM bathroom WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."')";
       $users = $dbh->query($sql);
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           echo "<tr class='draggables'>";
           
           print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."";
           if ($row['login_id'] != $_SESSION['id']) {
                    echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
           }
           echo "</td><td>Bathroom</td></tr>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM family WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."')";
       $users = $dbh->query($sql);
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           echo "<tr class='draggables'>";
           
           print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."";
           if ($row['login_id'] != $_SESSION['id']) {
                    echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
           }
           echo "</td><td>Family room</td></tr>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM laundry WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."')";
       $users = $dbh->query($sql);
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           echo "<tr class='draggables'>";
           
           print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."";
           if ($row['login_id'] != $_SESSION['id']) {
                    echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
           }
           echo "</td><td>Laundry</td></tr>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM camping WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."')";
       $users = $dbh->query($sql);
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           echo "<tr class='draggables'>";
           
           print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."";
           if ($row['login_id'] != $_SESSION['id']) {
                    echo "<span clas='badge synced'>Synced</span>";
           }
           echo "</td><td>Camping</td></tr>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
      try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM storageroom WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."')";
       $users = $dbh->query($sql);
       $KITCHEN_VAR_COUNT = $users->rowCount();
       foreach ($users as $row) {
           echo "<tr class='draggables'>";
           
           print "<td>".htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["qty"]) ."";
           if ($row['login_id'] != $_SESSION['id']) {
                    echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
           }
           echo "</td><td>Storage</td></tr>";
       }
       $dbh = null;
   }
   catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
   } 
   ?>
