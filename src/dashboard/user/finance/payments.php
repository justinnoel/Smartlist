<?php
session_start();
include("../../cred.php");
$totalPaid = 0;
$totalMoney = array(
  'bills' => 0,
  'payment' => 0,
  'subscription' => 0
);

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM payment_subs WHERE login_id=" . $_SESSION['id']. " ORDER BY id DESC";
$r = $dbh->query($sql);
foreach($r as $d) {
  // $totalMoney += decrypt($d['price']);
  $totalMoney[$d['paymentType']] += decrypt($d['price']);
}

?>
<style>
.tab {text-transform: none !important;}
.header {
  padding-top: 30px;
  padding-bottom: 30px;
  text-align: center;
}
._pc .collection {padding-left: 3px !important}
</style>

<div class="container _pc">
<br><br>
  <h5><b>Payments</b></h5>
  <br>
  <a href="#/add/subscription" class="btn btn-round blue-grey darken-3 white-text btn-flat waves-effect"><i class="material-icons left">add</i>Create new</a>
<div class="row">
  <div class="col s12">
    <ul class="tabs tabs-fixed-width">
      <li class="tab col s3"><a class="waves-effect" href="#_1">Bills</a></li>
      <li class="tab col s3"><a class="waves-effect" href="#_2">Payments</a></li>
      <li class="tab col s3"><a class="waves-effect" href="#_3">Subscriptions</a></li>
    </ul>
  </div>
  <div id="_1" class="col s12">
  <div class="header">
    <h5>$<?=$totalMoney['bills'];?></h5>
    <p>Bills worth</p>
  </div>
  <ul class="collection">
  <?php
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM payment_subs WHERE login_id=" . $_SESSION['id']. " AND paymentType='bills' ORDER BY id DESC";
      $users = $dbh->query($sql);
      if($users->rowCount() === 0) {
        echo "<li>No results found!</li>";
      }
      foreach($users as $row) {
    ?> 
    <li class="collection-item">
    <a class="secondary-content">$<?=decrypt($row['price']);?></a>
      <p>
        <b><?=decrypt($row['name']);?></b><br>
        <?=ucfirst(decrypt($row['type']));?><br>
        <?=decrypt($row['date']);?>
        <br><a href="javascript:void(0)" onclick="if(confirm('Delete?') === true) {$('#ajaxLoader').load('./user/finance/delete.php?id=<?=$row['id'];?>',getHashPage);}">Delete</a>
      </p>
    </li>
    <?php
    }
    ?>
    </ul>
  </div>
  <div id="_2" class="col s12">
  <div class="header">
    <h5>$<?=$totalMoney['payment'];?></h5>
    <p>Payments worth</p>
  </div>
  <ul class="collection">

  <?php
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM payment_subs WHERE login_id=" . $_SESSION['id']. " AND paymentType='payment' ORDER BY id DESC";
      $users = $dbh->query($sql);
      if($users->rowCount() === 0) {
        echo "<li>No results found!</li>";
      }
      foreach($users as $row) {
    ?> 
    <li class="collection-item">
    <a class="secondary-content">$<?=decrypt($row['price']);?></a>
      <p>
        <b><?=decrypt($row['name']);?></b><br>
        <?=ucfirst(decrypt($row['type']));?><br>
        <?=decrypt($row['date']);?>
        <br><a href="javascript:void(0)" onclick="if(confirm('Delete?') === true) {$('#ajaxLoader').load('./user/finance/delete.php?id=<?=$row['id'];?>',getHashPage);}">Delete</a>
      </p>
    </li>
    <?php
    }
    ?>
    </ul>
  </div>
  <div id="_3" class="col s12">
  <div class="header">
    <h5>$<?=$totalMoney['subscription'];?></h5>
    <p>Subscriptions worth</p>
  </div>
  <ul class="collection">

      <?php
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM payment_subs WHERE login_id=" . $_SESSION['id']. " AND paymentType='subscription' ORDER BY id DESC";
      $users = $dbh->query($sql);
      if($users->rowCount() === 0) {
        echo "<li>No results found!</li>";
      }
      foreach($users as $row) {
    ?> 
    <li class="collection-item">
    <a class="secondary-content">$<?=decrypt($row['price']);?></a>
      <p>
        <b><?=decrypt($row['name']);?></b><br>
        <?=ucfirst(decrypt($row['type']));?><br>
        <?=decrypt($row['date']);?>
        <br><a href="javascript:void(0)" onclick="if(confirm('Delete?') === true) {$('#ajaxLoader').load('./user/finance/delete.php?id=<?=$row['id'];?>',getHashPage);}">Delete</a>
      </p>
    </li>
    <?php
    }
    ?>
    </ul>
  </div>
</div>
</div>
<script>
  $(document).ready(function(){
    $(".tabs").tabs();
  });
</script>