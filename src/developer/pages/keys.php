<?php
session_start();
include("../../dashboard/cred.php");
$dbname = "smartlis_api";
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM api_keys WHERE login_id=:sessid");

  $sql->execute(array( ':sessid' => $_SESSION['id'] ));
  $d = $sql->fetchAll();

?>
<button <?php if(count($d) >= 5) {?>disabled data-tooltip="You've used up all your API keys. Delete your keys to add more. " <?php } else { ?> data-tooltip="Create an API key!"<?php } ?> onclick="loadPage('./pages/addKey.php')" class="tooltipped right btn blue-grey darken-3 waves-effect waves-light"><i class="material-icons left">add</i>Create</button>
<h5><b>API keys</b></h5>
<p>Manage your API keys. Also, note these are different from "App IDs"!</p>
<div class="row">
  <div class="col s12 m6">
    <table id="k">
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
</div>

<script>
  $('.tooltipped').tooltip();
  window.addEventListener('focus', () => $('#k').load('./pages/table.php'), false)
</script>