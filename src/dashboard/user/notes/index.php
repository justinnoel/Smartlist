<?php
session_start();
include "../../cred.php";
?>
<div class="container">
<br><br>
  <h5><b>Recent</b></h5>
  <a href="#addNote" class="btn modal-trigger waves-effect waves-light blue-grey darken-3 btn-round" onclick="$('.validate').characterCounter()" style="margin-top: 10px!important"><i class="material-icons-round left ">add</i>Add note</a><br><br>
  <div class="row">
    <?php
    try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("SELECT * FROM notes WHERE login_id=:sessid");

    $sql->execute(array( ':sessid' => $_SESSION['id'] ));
    $users = $sql->fetchAll();
      if(count($users) == 0) {
    ?>
    <center> No notes! Create one? </center>
    <?php
        return false;
      }
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

<script>
  function viewNote(id) {
    $("#noteView").modal({ 
      dismissible: false, 
      onCloseEnd: function() {
        window.onbeforeunload = function() {return "";}
      } 
    })
    $('#noteView').modal('open');
    document.getElementById("noteView").innerHTML = `
<div class="modal-content center">
<center style="padding-top: 100px;">
<svg class='circular' height='50' width='50'>
<circle class='path' cx='25' cy='25' r='20' fill='none' stroke-width='3' stroke-miterlimit='10' />
  </svg>
  </center>
  </div>
`;
    $('#noteView').load('./user/notes/view.php?id='+id);
  }
</script>