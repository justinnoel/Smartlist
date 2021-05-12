<?php session_start(); include('../../cred.php'); ?>
<div class="container">
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM dining_room WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
$users = $dbh->query($sql);
$dr_count = $users->rowCount();
if ($dr_count > 0)
{
echo '<table class="table" id="sort_dining">
<tr class="hover">
<td onclick="sort_dining(0)">Name</td>
<td onclick="sort_dining(1)">Quantity</td>

</tr>';
foreach ($users as $row)
{
echo "<tr data-id=".json_encode($row['id'])." id='dining_roomtr_" . $row['id'] . "' onclick=\"item('" . $row['id'] . "', '" . decrypt($row['name']) . "', '" . decrypt($row['qty']) . "', '" . decrypt($row['price']) . "', 'https://smartlist.ga/dashboard/rooms/dining_room/', 'dining_room', '" . $row['star'] . "')";
if ($row['star'] == 1)
{
echo "\" style='border-left: 3px solid #f57f17'>";
}
else
{
echo "\">";
}
print "<td>" . decrypt($row["name"]) . "</td><td>" . decrypt($row["qty"]) . "";
if ($row['login_id'] != $_SESSION['id'])
{
echo "<span class='sync'>Synced</span>";
}
echo "</td>";
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
 <script>
        $('#dining_room tr').contextmenu(function(event) {
        event.preventDefault();
        var e = this.getAttribute('data-id');
        modal_open(e, this, 'dining_room');
    });
function sort_dining(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("sort_dining");
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
