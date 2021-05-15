<?php session_start();
include('../cred.php');
   try {
       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $sql = "SELECT * FROM products WHERE star = 1 AND (login_id='".$_SESSION['id']."' OR login_id='".$_SESSION['syncid']."')";
       $users = $dbh->query($sql);
       echo '<table class="table container" id="st">
                 <tr class="hover">
                  <td onclick="sortTable(0)"><b>Name</b></td>
                  <td onclick="sortTable(1)"><b>Quantity</b></td>
                  <td onclick="sortTable(2)" style="width:15%"><b>Room</b></td>
                 </tr>';
       foreach ($users as $row) {
           echo "<tr class='draggables' id='tr_star_".$row['id']."'>";
           print "<td>".htmlspecialchars(decrypt($row["name"])) . "</td><td>" . htmlspecialchars(decrypt($row["qty"])) ."</td><td>Kitchen</td></tr>";
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
           
           print "<td>".htmlspecialchars(decrypt($row["name"])) . "</td><td>" . htmlspecialchars(decrypt($row["qty"])) ."";
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
           
           print "<td>".htmlspecialchars(decrypt($row["name"])) . "</td><td>" . htmlspecialchars(decrypt($row["qty"])) ."";
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
           
           print "<td>".htmlspecialchars(decrypt($row["name"])) . "</td><td>" . htmlspecialchars(decrypt($row["qty"])) ."";
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
           
           print "<td>".htmlspecialchars(decrypt($row["name"])) . "</td><td>" . htmlspecialchars(decrypt($row["qty"])) ."";
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
           
           print "<td>".htmlspecialchars(decrypt($row["name"])) . "</td><td>" . htmlspecialchars(decrypt($row["qty"])) ."";
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
           
           print "<td>".htmlspecialchars(decrypt($row["name"])) . "</td><td>" . htmlspecialchars(decrypt($row["qty"])) ."";
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
           
           print "<td>".htmlspecialchars(decrypt($row["name"])) . "</td><td>" . htmlspecialchars(decrypt($row["qty"])) ."";
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
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("st");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>