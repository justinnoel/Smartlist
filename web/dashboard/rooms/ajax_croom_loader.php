<?php 
session_start();
include_once("../cred.php");
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM custom_room_items WHERE login_id=".$_SESSION['id']." AND price = '".$_GET['room']."'";
  $users = $dbh->query($sql);
  $lr_count = $users->rowCount();
  if($lr_count > 0) {
  echo '<div class="container"><table class="table">
            <tr>
             <td>Name</td>
             <td>Quantity</td>
             <td class="d-none">Price</td>
            </tr>';
  foreach ($users as $row) {
      echo "<tr id='croomtr_".$row['id']."' onclick=\"item('".$row['id']."', '".$row['name']."', '".$row['qty']."', '".$row['price']."', 'https://smartlist.ga/dashboard/rooms/laundry/', 'custom_room', '".$row['star']."')";
      if($row['star'] == 1) {
          echo "\" style='background: #f2f2aa'>";
      }
      else {echo "\">";}
      print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
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
