<?php
session_start();
include("../../dashboard/cred.php");
$dbname = "smartlis_api";
?>
<table>
  <tr>
    <td><b>Name</b></td>
    <td><b>Usage</b></td>
    <td class="center"><b>API Key</b></td>
  </tr>
  <?php
  try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM api_keys WHERE login_id=:sessid");

  $sql->execute(array( ':sessid' => $_SESSION['id'] ));
  $d = $sql->fetchAll();

    foreach($d as $v) {
  ?>
  <tr>
    <td><?=$v['name'];?></td>
    <td><?=$v['ratelimit'];?>/500</td>
    <td><?=$v['apiKey'];?></td>
    <td><a class="del" href="#" onclick='$("#app").load("./pages/delKey.php?id=<?=$v['id'];?>")'>Delete</a></td>
  </tr>
  <?php
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  ?>
</table>