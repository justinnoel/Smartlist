<?php
session_start();
include("../../cred.php");
?>
<div class="container">
  <br><br>
  <a href="#/my-finances">&lt; Back</a>
  <h5><b>Payments</b></h5>
  <a href="#/add/subscription">Add</a>
  <br>
  <ul class="collapsible">
    <?php
    try {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM payment_subs WHERE login_id=" . $_SESSION['id']. " ORDER BY id DESC";
      $users = $dbh->query($sql);
      if($users->rowCount() === 0) {
        echo "No payments!";
      }
      else {
        foreach($users as $row) {
          // echo decrypt($row['name']);
    ?> 
    <li>
      <div class="collapsible-header waves-effect"><p style="margin:0"><b><?=decrypt($row['name']);?></b><br><?=ucfirst(decrypt($row['type']));?></p></div>
      <div class="collapsible-body">
        <p><b>$<?=decrypt($row['price']);?></b> <br>
          <?=ucfirst(decrypt($row['type']));?> at <?=decrypt($row['date']);?><br><br>
          <a href="#/my-finances/payments" onclick="if(confirm('Delete?') === true) {$('#ajaxLoader').load('./user/finance/delete.php?id=<?=($row['id']);?>')}" class="red-text">Delete</a>
        </p>
      </div>
    </li>
    <?php
        }
      }
    }
    catch (PDOexception $e) {
      echo "Error is: " . $e->getmessage();
    }
    ?>
  </ul>
</div>
<style>
  .collapsible {
    box-shadow: none !important;
    border: none !important;
  }
</style>
<script>
  $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion: false
    });
  });
</script>