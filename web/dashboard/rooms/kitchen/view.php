<?php
session_start();
include('../../cred.php');
  try
  {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM products WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
    $users = $dbh->query($sql);
    $KITCHEN_VAR_COUNT = $users->rowCount();
    if ($KITCHEN_VAR_COUNT > 0)
    {
    }
    else
    {
      echo "<div id='KITCHEN_VAR_COUNT' style='height: 90vh'><img alt='image' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='300px' style='display:block;margin:auto;'><br><p class='center'>No items here! Why not try adding something...</p></div>";
    }
    echo '<table class="table container" id="kitchen_table">
      <div class="container"><input type="search" style="display:none" id="kitchen_search" placeholder="Search..."></div></div>
      <tr>
      <td><b>Name</b></td>
      <td><b>Quantity</b></td>
      </tr>
';
foreach ($users as $row)
    {
      echo "<tr class=\"draggable\" id='kitchentr_".$row['id']."' onclick='item(".$row['id'].", ".json_encode($row['name']).", ".json_encode($row['qty'])." , ".json_encode($row['price']).",  \"\", \"kitchen\", ".json_encode($row['star']).")' ".($row['star'] == 1 ? 'style=\'border-left: 3px solid #f57f17;\'' : '')."><td>".$row['name']."</td><td> ".$row['qty']." </td></tr>";
    }
    $dbh = null;
  }
  catch(PDOexception $e)
  {
    echo "Error is: " . $e->etmessage();
  }
  ?>
