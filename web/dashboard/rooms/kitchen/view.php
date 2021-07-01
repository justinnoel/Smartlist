<?php
session_start();
include('../../cred.php');
  try
  {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM products WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid']. " ORDER BY id DESC";
    $users = $dbh->query($sql);
    $KITCHEN_VAR_COUNT = $users->rowCount();
    if ($KITCHEN_VAR_COUNT > 0)
    {
    }
    else
    {
      echo "<div id='KITCHEN_VAR_COUNT' style='height: 90vh'><img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p></div>";
    }
    echo '
    <br><br>
    <div class="container">
        <div class="card white-text" style="background: url(https://i.ytimg.com/vi/bY2i46N2TpM/maxresdefault.jpg) !important;background-size: cover">
            <div class="card-content">
                <h4>Kitchen</h4>
                <br>
                <button class="btn blue-grey waves-effect waves-light" onclick="sm_page(\'addkitchen\'); AJAX_LOAD(\'#addkitchen\', \'./rooms/kitchen/quickadd.php\')">Add Item</button>
            </div>
        </div>
        <h5>Items</h5>
    </div>
    <table class="table container" id="kitchen_table">
      <div class="container"><input type="search" style="display:none" id="kitchen_search" placeholder="Search..."></div>
      <tr class="hover">
        <td onclick="sortTable(0)" style="width: 50%"><b>Name</b></td>
        <td onclick="sortTable(1)" style="width: 50%;te"><b>Quantity</b></td>
      </tr>
';
foreach ($users as $row)
    {
      echo "<tr class=\"draggable".($row['login_id'] !== $_SESSION['id'] ? " sync_tr" : "")."\" tabindex='0' data-id='".intval($row['id'])."' id='kitchentr_".$row['id']."' onclick='item(this, ".($row['star'] == 1 ? 1 : 0).", ".json_encode(decrypt($row['price'])).", \"kitchen\")' ".($row['star'] == 1 ? 'style=\'border-left: 3px solid #f57f17;\'' : '').">
      <td>".htmlspecialchars(decrypt($row['name']))."</td><td> ".htmlspecialchars(decrypt($row['qty']))." </td>
      </tr>";
    }
    ?>
    </table>
     <div class="container">
         <p>Showing <?=$KITCHEN_VAR_COUNT;?>/<?=$KITCHEN_VAR_COUNT;?> items in your kitchen</p>
     </div>
     <?php
    $dbh = null;
  }
  catch(PDOexception $e)
  {
    echo "Error is: " . $e->etmessage();
  }
  ?>
  <script>
        $('#Contact tr').contextmenu(function(event) {
        event.preventDefault();
        var e = this.getAttribute('data-id');
        modal_open(e, this, 'kitchen');
    });
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("kitchen_table");
  switching = true;
  dir = "asc";
  while (switching) {
    switching = false;
    rows = table.querySelectorAll('tr:not(:last-child)');
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].querySelectorAll("td")[n];
      y = rows[i + 1].querySelectorAll("td")[n];
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
//   addPagerToTables('#kitchen_table', 15);

  </script>