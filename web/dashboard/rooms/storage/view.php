<?php
session_start(); include_once('../../cred.php');?>
<div class="container">
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM storageroom WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt($_SESSION['syncid']));
$users = $dbh->query($sql);
$storage_count = $users->rowCount();
if ($storage_count > 0)
{
echo '<table class="table" id="storage_sort">
<tr class="hover">
<td onclick="storage_sort(0)">Name</td>
<td onclick="storage_sort(1)">Quantity</td>
</tr>';
foreach ($users as $row)
{
echo "<tr class='".($row['login_id'] !== $_SESSION['id'] ? "sync_tr" : "")."' data-id=".json_encode($row['id'])." id='storagetr_" . $row['id'] . "' onclick='item(this, ".($row['star'] == 1 ? 1 : 0).", ".json_encode(decrypt($row['price'])).", \"storage\")' ".($row['star'] == 1 ? "style='border-left: 3px solid #f57f17'" : "").">";
echo "<td>".htmlspecialchars(decrypt($row['name']))."</td><td> ".htmlspecialchars(decrypt($row['qty']))." </td>";
echo "</tr>";
}
$dbh = null;
}
else
{
echo "<img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p>";
}
}
catch(PDOexception $e)
{
echo "Error is: " . $e->etmessage();
}
?>
</table>
</div>
  <script>
        $('#storage tr').contextmenu(function(event) {
        event.preventDefault();
        var e = this.getAttribute('data-id');
        modal_open(e, this, 'storage');
    });
function storage_sort(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("storage_sort");
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