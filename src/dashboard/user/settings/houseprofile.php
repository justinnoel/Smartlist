<?php
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
$sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();

foreach ($users as $row) {
  $_SESSION['houseName'] = decrypt($row['houseName']);
}
?>
<style>#emojiChips .chip {font-size:18px!important}</style>
<div class="container">
  <form action="./user/settings/editHouseProfile.php" method="POST" id="editProfile">
    <h5>Edit profile</h5>
    <div class="input-field input-border">
      <label>House Name</label>
      <input oninput="document.getElementById('houseName').getElementsByTagName('span')[0].innerHTML=this.value;document.getElementById('houseName1').innerHTML = this.value" type="text" name="name" autocomplete="off" value="<?=($_SESSION['houseName']);?>" autofocus id="d">
    </div>
    <div class="chip-suggestions" id="emojiChips">
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#10084;'">&#10084;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#127969;'">&#127969;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#127972;'">&#127972;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128150;'">&#128150;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128165;'">&#128165;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128169;'">&#128169;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128172;'">&#128172;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128176;'">&#128176;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128178;'">&#128178;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128179;'">&#128179;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128214;'">&#128214;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128215;'">&#128215;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128216;'">&#128216;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128217;'">&#128217;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128213;'">&#128213;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128212;'">&#128212;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128211;'">&#128211;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128210;'">&#128210;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128209;'">&#128209;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128208;'">&#128208;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128207;'">&#128207;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128206;'">&#128206;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128218;'">&#128218;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128219;'">&#128219;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128220;'">&#128220;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#127968;'">&#127968;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128106;'">&#128106;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#127808;'">&#127808;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128536;'">&#128536;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128466;'">&#128466;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128452;'">&#128452;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128451;'">&#128451;</div>
      <div class="chip waves-effect" onclick="var d = document.getElementById('d');d.focus();d.value+=' &#128421;'">&#128421;</div>
    </div>
    <p>Changing the house's name sets the default title on the tablet/mobile app to your house's name</p>

    <h5>How many people do you live with?</h5>
    <p>Smartlist will help you based on the number of people you live with</p>
    <p class="range-field">
      <input type="range" name="number" min="0" max="10" />
    </p>

    <button class="btn blue-grey waves-effect waves-light btn-round darken-3"><i class="material-icons left">save</i> Save</button>
  </form>
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
  $("#d").focus()
    var elems  = document.querySelectorAll("input[type=range]");
    M.Range.init(elems);
</script>