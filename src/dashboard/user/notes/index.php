<?php
session_start();
include "../../cred.php";
?>
<div class="container">
<br><br>
    <?php
    try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("SELECT * FROM notes WHERE login_id=:sessid");

    $sql->execute(array( ':sessid' => $_SESSION['id'] ));
    $users = $sql->fetchAll();
      if(count($users) == 0) {
    ?>
    <center>
      <img src="https://i.ibb.co/nc9rBgr/fogg-deltaplan.png" style="width:100%;margin-top: 20px;max-width:400px;margin-bottom: 20px;display:block;"><br>No notes<br><br>
    <p class="hoverP">
    Illustration by <a href="https://icons8.com/illustrations/author/5ddea3b001d036001345e529">Dmitry Nikulnikov</a> from <a href="https://icons8.com/illustrations">Ouch!</a>
    </p>
    </center>
    <?php
        exit();
      }
      ?>
      <h5><b>Recent</b></h5>
  <a href="#addNote" class="btn modal-trigger waves-effect waves-light blue-grey darken-3 btn-round" style="margin-top: 10px!important"><i class="material-icons-round left ">add</i>Add note</a><br><br>
  <div class="row">
  <?php
      foreach ($users as $row){
        if(!empty(decrypt($row['banner'])) && file_get_contents(decrypt($row['banner']))) {
    ?>
    <div class="col s12">
      <div class="card waves-effect waves-light" onclick="viewNote('<?=$row['id'];?>')">
        <div class="card-image">
          <img src="<?=decrypt($row['banner']);?>" style="max-height: 100px;object-fit:cover">
        </div>
        <div class="card-content">
          <span class="card-title" style="font-weight:bold !important"><?=decrypt($row['title']);?></span>
          <p><?=substr(strip_tags(decrypt($row['content'])), 0, 40)?>...</p>
        </div>
      </div>
    </div>
    <?php
          }
        else {
    ?>
    <div class="col s12">
      <div class="card waves-effect" onclick="viewNote('<?=$row['id'];?>')">
        <div class="card-content">
          <span class="card-title" style="font-weight:bold !important"><?=decrypt($row['title']);?></span>
          <p><?=substr(strip_tags(decrypt($row['content'])), 0, 40)?>...</p>
        </div>
      </div>
    </div>
    <?php
          }
      }
      $dbh = null;
    }
    catch(PDOexception $e)
    {
      echo "Error is: " . $e->etmessage();
    }
    ?>
  </div>
</div>
