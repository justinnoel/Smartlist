<?php
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login WHERE id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
  $_SESSION['name'] = decrypt($row['name']);
  $_SESSION['email'] = decrypt($row['email']);
}
?>

<div class="container">
  <form action="./user/settings/editProfile.php" method="POST" id="editProfile">
    <h5>Edit profile</h5>
    <div class="input-field">
      <label>Name</label>
      <input type="text" name="name" autocomplete="off" value="<?=($_SESSION['name']);?>" autofocus>
    </div>
    <div class="input-field">
      <label>Email</label>
      <input type="text" name="email" autocomplete="off" value="<?=($_SESSION['email']);?>" autofocus>
    </div>
    <button class="btn blue-grey waves-effect waves-light"><i class="material-icons left">save</i> SAVE</button>
  </form>
  <h6>Looking for something else? </h6>
  <div class='collection'>
    <a href="https://smartlist.ga/dashboard/resources/reset-password.php" class="collection-item waves-effect">
      Change my password
    </a>
    <a href="#avatarChange" class="collection-item waves-effect modal-trigger">
      Change my profile picture
    </a>
  </div>
</div>
<script>
  $("#editProfile").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(), // serializes the form's elements.
      success: function(data) {
        M.toast({html:data}); // show response from the php script.
      }
    });
  });
</script>