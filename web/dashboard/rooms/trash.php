<?php 
session_start();
include_once("../cred.php");?>
<br>
<div class="container">
  <div class="alert" style="border-bottom: 1px solid rgba(0, 0, 0, .1)">
    <div class="row">
      <div class="col s10">
        <h4>All items in trash will be deleted weekly</h4>  
        <p>To maintain our servers and provide the best possible experience for you, all items in your trash will be deleted weekly on Friday 12:00</p>
      </div>
      <div class="col s2">
        <img src="https://freeiconshop.com/wp-content/uploads/edd/trash-var-flat.png" style="width: 100%">
      </div>
    </div>
  </div>
</div>
<?php
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM trash WHERE login=".$_SESSION['id']. " ORDER by id DESC";
  $users = $dbh->query($sql);
  $lr_count = $users->rowCount();
  if($lr_count > 0) {
    echo '<div class="container"><a href="javascript:void(0)" class="btn blue-grey darken-3 right" onclick="if(confirm(\'Delete trash? '.$lr_count.' items will be permanently deleted!\') == true){ $(\'#ajaxLoader\').load(\'https://smartlist.ga/dashboard/rooms/delete-trash.php?item_count='.$lr_count.'\', () => {M.toast({html:\'Deleted!\'})})}">Clear trash</a><br><h5>Latest</h5>
  <div style="max-width: 100%;overflow-x:scroll">
  <table class="table">
            <tr>
             <td style="width: 40% !important">Name</td>
             <td style="width: 40% !important">Quantity</td>
             <td style="width: 10% !important">Room</td>
             <td style="width: 10% !important">Actions</td>
            </tr>';
    foreach ($users as $row) {
      echo "<tr class='zoom'>";
      print "<td>".decrypt($row["name"]) . "</td><td>" . decrypt($row["qty"]) ."";
      echo "</td><td>".$row["room"] . "</td></tr>";
    }
    $dbh = null;
  }
  else {
    echo "<img alt='image' src='https://cdn.dribbble.com/users/129991/screenshots/4739382/delete.png?compress=1&resize=1500x700' width='100%' style='display:block;margin:auto;'><br><p class='center'>No items in trash</p>";
  }
} 
catch (PDOexception $e) {
  echo "Error is: " . $e-> etmessage();
}
?>
</table>
</div>
</div>