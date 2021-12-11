<?php
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();

foreach ($users as $row) {
  $_SESSION['name'] = decrypt($row['name']);
  $_SESSION['email'] = decrypt($row['email']);
}
?>
<style>
.select-wrapper> input.select-dropdown {border:1px solid rgba(200, 200, 200, .3)!important;padding-left: 10px!important;border-radius: 10px!important}
</style>
<div class="container">
  <form action="./user/settings/editProfile.php" method="POST" id="editProfile">
    <h5>Edit profile</h5>
    <div class="input-field input-border">
      <label>Name</label>
      <input type="text" name="name" autocomplete="off" value="<?=($_SESSION['name']);?>" autofocus>
    </div>
    <div class="input-field input-border">
      <label>Email</label>
      <input type="text" name="email" autocomplete="off" value="<?=($_SESSION['email']);?>" autofocus>
    </div>
    <button class="btn blue-grey waves-effect waves-light btn-round darken-3"><i class="material-icons left">save</i> Save</button>
  </form>
  <div class='collection'>
  <a href="javascript:void(0)" class="collection-item borderVisible selectable" draggable="false">
    <p><b>User mode</b><br>
    This changes the user interface for you. If you choose business, rooms will be hidden, and Smartlist will be more focused on finance tracking. </p>
    <select onchange='$("#ajaxLoader").load("https://smartlist.ga/dashboard/user/settings/setPurpose.php?value="+this.value)'>
      <option value="" <?=($_SESSION['currency'] == "personal" ? "selected" : "")?>>Personal</option>
      <option value="business" <?=($_SESSION['currency'] == "business" ? "selected" : "")?>>Business</option>
    </select>
  </a>
   <a href="javascript:void(0)" class="collection-item borderVisible selectable" draggable="false">
    <p><b>Currency</b><br>
    Change the currency to another type...</p>
    <select onchange='$("#ajaxLoader").load("https://smartlist.ga/dashboard/user/settings/changeCurrency.php?value="+this.value)'>
      <option value="$" <?=($_SESSION['purpose'] == "$" ? "selected" : "")?>>$ (USD)</option>
      <option value="&#8369;" <?=($_SESSION['purpose'] == "&#8369;" ? "selected" : "")?>>&#8369; (Peso)</option>
      <option value="&#163;" <?=($_SESSION['purpose'] == "&#163;" ? "selected" : "")?>>&#163; (Pounds)</option>
      <option value="&#165;" <?=($_SESSION['purpose'] == "&#165;" ? "selected" : "")?>>&#165; (Yen/Yuan)</option>
      <option value="&#8377;" <?=($_SESSION['purpose'] == "&#8377;" ? "selected" : "")?>>&#8377; (INR)</option>
      <option value="&#8383;" <?=($_SESSION['purpose'] == "&#8383;" ? "selected" : "")?>>&#8383; (Bitcoin)</option>
      <option value="&#8361;" <?=($_SESSION['purpose'] == "&#8361;" ? "selected" : "")?>>&#8361; (원 Won)</option>
      <option value="&#8372;" <?=($_SESSION['purpose'] == "&#8372;" ? "selected" : "")?>>&#8372; (Hryvnia)</option>
      <option value="&#8376;" <?=($_SESSION['purpose'] == "&#8376;" ? "selected" : "")?>>&#8376; (Tenge)</option>
      <option value="&#8363;" <?=($_SESSION['purpose'] == "&#8363;" ? "selected" : "")?>>&#8363; (Dong)</option>
      <option value="&#3647;" <?=($_SESSION['purpose'] == "&#3647;" ? "selected" : "")?>>&#3647; (Baht)</option>
      <option value="&#65020;" <?=($_SESSION['purpose'] == "&#65020;" ? "selected" : "")?>>&#65020; (Rial)</option>
      <option value="&euro;" <?=($_SESSION['purpose'] == "&euro;" ? "selected" : "")?>>€ (Euro)</option>
    </select>
  </a>
    <!--<a href="https://smartlist.ga/dashboard/resources/reset-password.php" class="collection-item waves-effect">
      Change my password
    </a>-->
  <a href="javascript:void(0)" class="selectable collection-item waves-effect borderVisible" draggable="false" onclick="navigator.clipboard.writeText(this.getElementsByTagName('input')[0].value)">
    <b style="vertical-align: middle">User ID</b><br>For syncing your account. Do not share this with anyone else. Click to Copy.
    <input value="<?=encrypt($_SESSION['id']);?>" readonly style="box-shadow: none;border: 0;pointer-events: none;font-family: monospace" id="id"> 
  </a>
  <a href="#avatarChange" class="collection-item waves-effect modal-trigger">
      Change my profile picture
</a>
<a href="https://smartlist.ga/security" target="_blank" class="collection-item waves-effect">
    Learn how your data is secure
</a>
  </div>
</div>
<script>
document.getElementById("editProfile").addEventListener("submit", (event) =>
  sendData(event)
    .then((res) => M.toast({html:res}) )
);
  $('select').formSelect();
</script>