<?php 
session_start();
include('../../cred.php');
?>
<div class="container">
<?php
try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM garage WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt($_SESSION['syncid']));
  $users = $dbh->query($sql);
  $garage_count = $users->rowCount();
  if ($garage_count > 0)
  {
    echo '<table class="table" id="garage_table">
    <tr class="hover">
    <td onclick="garage_table(0)">Name</td>
    <td onclick="garage_table(1)">Quantity</td>
    </tr>';
    foreach ($users as $row)
    {
        echo "
        <tr class='".($row['login_id'] !== $_SESSION['id'] ? "sync_tr" : "")."' id='garagetr_".$row['id']."' data-id='".$row['id']."' onclick='item(this, ".($row['star'] == 1 ? 1 : 0).", ".json_encode(decrypt($row['price'])).", \"garage\")' ".($row['star'] == 1 ? "style='border-left: 3px solid #f57f17'" : "").">
            <td>".htmlspecialchars(decrypt($row['name']))."</td>
            <td>".htmlspecialchars(decrypt($row['qty']))."</td>
        </tr>";
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
</div>
  <script>
        $('#About tr').contextmenu(function(event) {
        event.preventDefault();
        var e = this.getAttribute('data-id');
        modal_open(e, this, 'garage');
    });
function garage_table(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("garage_table");
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