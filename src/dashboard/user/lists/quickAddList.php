<?php 
session_start();
include("../../cred.php");
?>
<style>#fab{display:none}</style>
<br><br><div class="container">
  <form action="https://smartlist.ga/dashboard/user/lists/add.php" method="POST" id="listAddForm">
    <h5>Create list</h5>
    <div class="input-field input-border">
      <label onclick="this.nextElementSibling.focus()">List name</label>
      <input type="text" name="name" autofocus autocomplete="off" required>
    </div>
    <p>
      <label>
        <input type="checkbox" name="star" class="filled-in" />
        <span>Favorite?</span>
      </label>
    </p>
    <br>
    <button class="btn blue-grey darken-3 btn-round waves-effect waves-light">
      <i class="material-icons-round left">save</i> Save
    </button>
    <br>
  </form>
</div>
<script>
  $("#listAddForm").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        document.getElementById('listAddForm').reset();
        $('input').focus();
        M.toast({html: data});
      }
    });
  });
</script>