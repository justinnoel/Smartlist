<?php 
session_start();
include_once("../cred.php");
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM custom_room_items WHERE login_id=".$_SESSION['id']." AND price = '".$_GET['room']."'";
  $users = $dbh->query($sql);
  $lr_count = $users->rowCount();
  if($lr_count > 0) {
  echo '<div class="container"><table class="table" id="croom_table">
            <tr class="hover">
             <td onclick="croom_sort(0)">Name</td>
             <td onclick="croom_sort(1)">Quantity</td>
             <td class="d-none">Price</td>
            </tr>';
  foreach ($users as $row) {
      echo "<tr id='croomtr_".$row['id']."' onclick=\"item('".$row['id']."', '".decrypt($row['name'])."', '".decrypt($row['qty'])."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/laundry/', 'custom_room', '".$row['star']."')";
      if($row['star'] == 1) {
          echo "\" style='background: #f2f2aa'>";
      }
      else {echo "\">";}
      print "<td>".decrypt($row["name"]) . "</td><td>" . decrypt($row["qty"])."";
      if ($row['login_id'] != $_SESSION['id']) {
               echo "<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span>";
      }
      echo "</td>";
  }
  $dbh = null;
}
  else {
 echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
 }
}
catch (PDOexception $e) {
  echo "Error is: " . $e-> etmessage();
}
?>
</table>
</div>
<script>
function croom_sort(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("croom_table");
  switching = true;
  dir = "asc";
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>