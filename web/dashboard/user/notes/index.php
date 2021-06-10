<?php
session_start();
include "../../cred.php";
?>
<div class="container">
  <br><br>
  <a href="#addNote" class="modal-trigger" onclick="$('.validate').characterCounter()">Add note</a>
  <div class="row">
    <?php
    try {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM notes WHERE login_id= " . $_SESSION['id'];
      $users = $dbh->query($sql);
      foreach ($users as $row){
    ?>
    <div class="col s6 m4">
      <div class="card waves-effect" onclick="viewNote('<?=$row['id'];?>')">
        <div class="card-content">
          <span class="card-title" style="font-weight:bold !important"><?=$row['title'];?></span>
        </div>
      </div>
    </div>
    <?php
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
  $("#addNoteForm").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        M.toast({html: data});
        $(".modal").modal("close");
        sm_page('gl');
        window.onbeforeunload = null;
        AJAX_LOAD('#gl', './user/notes/index.php');
        change_title('Notes')
      }
    });
  });
  function viewNote(id) {
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