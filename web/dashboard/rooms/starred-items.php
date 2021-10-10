<?php session_start();
include('../cred.php');
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT id, name, qty, login_id, star, 'Kitchen' as Source
  FROM products 
  where login_id = ".$_SESSION['id']." AND star=1
  union all


  SELECT id, name, qty, login_id, star, 'Bedroom' as Source
  FROM bedroom 
  where login_id = ".$_SESSION['id']." AND star=1

  union all

  SELECT id, name, qty, login_id, star, 'Bathroom' as Source
  FROM bathroom 
  where login_id = ".$_SESSION['id']." AND star=1

  union all

  SELECT id, name, qty, login_id, star, 'Garage' as Source
  FROM garage 
  where login_id = ".$_SESSION['id']." AND star=1

  union all

  SELECT id, name, qty, login_id, star, 'Dining Room' as Source
  FROM dining_room 
  where login_id = ".$_SESSION['id']." AND star=1

  union all

  SELECT id, name, qty, login_id, star, 'Laundry Room' as Source
  FROM laundry 
  where login_id = ".$_SESSION['id']." AND star=1

  union all

  SELECT id, name, qty, login_id, star, 'Storage Room' as Source
  FROM 	storageroom 
  where login_id = ".$_SESSION['id']." AND star=1

  union all

  SELECT id, name, qty, login_id, star, 'Family' as Source
  FROM family 
  where login_id = ".$_SESSION['id']." AND star=1;";
  $users = $dbh->query($sql);
  echo '<table class="table container" id="st">
                 <tr class="hover">
                  <td onclick="sortTable(0)"><b>Name</b></td>
                  <td onclick="sortTable(1)"><b>Quantity</b></td>
                  <td onclick="sortTable(2)" style="width:15%"><b>Room</b></td>
                 </tr>';
  foreach ($users as $row) {

?>
<tr>
<td class='cursor-pointer' onclick='copyToClipboard(this.innerText)'><?=decrypt(strip_tags($row['name']))?></td><td class='cursor-pointer' onclick='copyToClipboard(this.innerText)'><?=decrypt(strip_tags($row['qty']))?></td><td class='cursor-pointer' onclick='copyToClipboard(this.innerText)'></td>
  <td><?=(strip_tags($row['Source']))?></td>
</tr>
<?php
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