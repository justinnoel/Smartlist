<?php
session_start();
include("../../dashboard/cred.php");
$dbname = "smartlis_api";
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM apps WHERE login_id=:sessid");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$d = $sql->fetchAll();

?>
<h5><b>Apps</b></h5>
<p>Manage your apps here. To create one, go to the "Login API" option in the sidebar</p>
<div class="row">
  <div class="col s12 m6">
    <table>
      <tr>
        <td><b>App Name</b></td>
        <td><b>Redirect URI</b></td>
        <td class="center"><b>ID</b></td>
      </tr>
      <?php
        foreach($d as $v) {
      ?>
      <tr>
        <td><?=$v['appName'];?></td>
        <td><?=$v['redirectURI'];?></td>
        <td><?=hash('sha512', $v['id']);?></td>
        <td onclick="loadPage('deleteApp.php?id='+<?=$v['id']?>)">Delete</td>
      </tr>
      <?php
        }
        $conn = null;
      ?>
    </table>
  </div>
</div>