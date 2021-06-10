<?php 
session_start();
include_once("../../cred.php");
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
      echo "<tr class='".($row['login_id'] != $_SESSION['id'] ? "sync" : "")."' id='croomtr_".$row['id']."' onclick='item(this, ".($row['star'] == 1 ? 1 : 0).", ".json_encode(decrypt($row['price'])).", \"custom_room\")' ".($row['star'] == 1 ? "style='border-left: 3px solid #f57f17'" : "").">";
      print "<td>".decrypt(htmlspecialchars($row["name"])) . "</td><td>" . decrypt(htmlspecialchars($row["qty"]))."</td>";
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