<?php 
session_start();
include_once("../cred.php");
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM trash WHERE login=".$_SESSION['id']. " ORDER by id DESC";
  $users = $dbh->query($sql);
  $lr_count = $users->rowCount();
  if($lr_count > 0) {
  echo '<div class="container"><h5>Latest</h5><div style="max-width: 100%;overflow-x:scroll"><table class="table">
            <tr>
             <td>Name</td>
             <td>Quantity</td>
             <td>Room</td>
             <td>Actions</td>
            </tr>';
          foreach ($users as $row) {
              echo "<tr class='zoom'>";
              print "<td>".$row["name"] . "</td><td>" . $row["qty"] ."";
              echo "</td><td>".$row["room"] . "</td><td><a href='restore.php?id=".$row['id']."' class='waves-effect' style='height: 100%:width: 100%'><i class='material-icons'>restore</i></a></td></tr>";
          }
          $dbh = null;
        }
  else {
 echo "<img alt='image' src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items in trash</p>";
 }
}
catch (PDOexception $e) {
  echo "Error is: " . $e-> etmessage();
}
?>
</table>
</div>
</div>
