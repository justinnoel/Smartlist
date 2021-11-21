<?php
session_start();
include("/home/smartlis/public_html/dashboard/cred.php");
$dbname = "smartlis_api";
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM api_keys WHERE login_id=:sessid");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$d = $sql->fetchAll();
?>
<style>.e {float:none !important;color: white !important;vertical-align:middle; margin-right: 10px;padding: 1px 10px;border-radius: 999px} code {background: #eee;color: #303030;padding: 2px;display:block;width:auto} span {vertical-align:middle;}</style>
<h4><b>Dashboard</b></h4>
<p>Manage your APIs!</p>
<div class="row">
  <div class="col s12 m6" style="overflow:scroll!important">
    <h5>My API keys</h5>
    <table>
      <tr>
        <td><b>Name</b></td>
        <td><b>Usage</b></td>
        <td class="center"><b>API Key</b></td>
      </tr>
      <?php
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
      $conn = null;
      ?>
    </table>
  </div>
  <div class="col s12 m6" style="overflow:scroll!important">
    <h5>My Apps</h5>
    <table>
      <tr>
        <td><b>App Name</b></td>
        <td><b>Redirect URI</b></td>
        <td class="center"><b>ID</b></td>
      </tr>
      <?php
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = $dbh->prepare("SELECT * FROM apps WHERE login_id=:sessid");

      $sql->execute(array( ':sessid' => $_SESSION['id'] ));
      $d = $sql->fetchAll();


      $d = $stmt->fetchAll();
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
<h5><b>API reference</b></h5>
<div id="embed"></div>
<script>
  $("#embed").load('./pages/options.php', function(){
    $('.collapsible').collapsible({
      // specify options here
    });
  });
</script>