<?php
session_start();
include("../../cred.php");
$totalPaid = 0;
$totalMoney = array(
   'bills' => 0,
   'payment' => 0,
   'subscription' => 0
);
$totalMoney1 = 0;

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM payment_subs WHERE login_id=" . $_SESSION['id'] . " ORDER BY id DESC";
$r = $dbh->query($sql);
foreach ($r as $d) {
   $totalMoney1 += decrypt($d['price']);
   $totalMoney[$d['paymentType']] += decrypt($d['price']);
}

?>
<div class="container">
<br><br>
<h5>Subscriptions, bills &amp; payments</h5>
<?php
if(!empty($_SESSION['income'])) {
  if($totalMoney1 > ($_SESSION['income'])) {
    ?><p class="red-text">Your bills are greater than your monthly income by <?=$_SESSION['currency'];?><?=$totalMoney1-$_SESSION['income'];?>! Make sure you're spending wisely!</p><?php
  }
}
?><br>
<?php
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM payment_subs WHERE login_id=" . $_SESSION['id'] . " ORDER BY id DESC";
$users = $dbh->query($sql);
if ($users->rowCount() === 0) {
   echo "<li>No results found!</li>";
}
foreach ($users as $row) {
   ?>
   <div class="card">
      <div class="card-content">
         <p>
            <b><?= decrypt($row['name']); ?></b><br><?= $_SESSION['currency']; ?><?= decrypt($row['price']); ?><br>
            <?= ucfirst(decrypt($row['type'])); ?><br>
            <?= decrypt($row['date']); ?>
            <br><a class="btn align-right text-right red darken-3 btn-round waves-effect focus-outline-1" href="javascript:void(0)" onclick="if(confirm('Delete?') === true) {$('#ajaxLoader').load('./user/finance/delete.php?id=<?= $row['id']; ?>',getHashPage);}">Delete</a>
         </p>
      </div>
   </div>
<?php
}
?>
</div>