<?php
include('../../header.php');
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login WHERE id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
  $goal = $row["goal"];
  $welcome = $row['welcome'];
  $_SESSION['avatar'] = $row['user_avatar'];
  $theme = $row['theme'];
  $_SESSION["number_notify"] = $row['remind'];
}
?>
<style>
  #id::selection {background: transparent}
  #colorModal {position: fixed !important;top: 50% !important;left: 50% !important;transform: translate(-50%, -50%) scale(1)  !important}
</style>
<div class="collection">
  <a class="collection-item waves-effect" href="https://smartlist.ga/dashboard/resources/reset-password.php"><b>Reset your Password</b><br>1 saved password</a>
  <a href="javascript:void(0)" class="collection-item borderVisible" draggable="false">
    <div class="switch"> <b>Notification</b><br>After item's quanity is less than <span id="count1"></span>
      <p class="range-field">
        <input type="range" id="test5" name="remind" min="0" max="100" sonmousedown='this.focus()' oninput="document.getElementById('count1').innerHTML = this.value" value='<?=$_SESSION["number_notify"];?>' onmouseup='$("#ajaxLoader").load("./user/notifications.php/?remind="+this.value)'/>
      </p>
    </div>
  </a>
  <a href="javascript:void(0)" class="collection-item waves-effect borderVisible" draggable="false" onclick="copyToClipboard()">
    <b style="vertical-align: middle">User ID</b><br>For syncing your account. Do not share this with anyone else. Click to Copy.
    <input value="<?=encrypt($_SESSION['id']);?>" readonly style="box-shadow: none;border: 0;pointer-events: none;font-family: monospace" id="id"> 
  </a>
    <a href="#avatarChange" class="collection-item waves-effect modal-trigger" draggable="false">
    <b style="vertical-align: middle">Change Avatar</b><br>Currently <?=$_SESSION['avatar'];?>
  </a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="this.getElementsByTagName('input')[0].click();getHashPage()">
    <div class="switch" style="pointer-events: none"> <b style="vertical-align: middle">Dark mode</b><br>For awesome people :)<label style="vertical-align: middle"><input onclick="dark_mode()" type="checkbox" value="dark" id="darkmode" onmousedown="this.click()"><span class="lever right"></span> </label> </div>
  </a>

  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="this.getElementsByTagName('input')[0].click()">
    <div class="switch" style="pointer-events: none"> <b style="vertical-align: middle">Dark sidenav</b><br>Improves Accessibility<label style="vertical-align: middle"><input type="checkbox" onclick="darkSidenav()" value="dark" id="_darkSidenav"><span class="lever right"></span> </label> </div>
  </a>
  <a class='modal-trigger collection-item waves-effect' href='#colorModal'>
    <strong>Theme</strong><br> #<?=$theme;?>
  </a>
  <form action="./user/color.php" id="__colorform" method="POST"> <input type='hidden' name='color' id='color' value="37474f"> </form> 
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/privacy.php')"><b>Privacy &amp; Security</b><br>Manage password, and read about privacy statements</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/rooms.php')"><b>Rooms</b><br>View and manage custom rooms</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/categories.php')"><b>Categories</b><br>View and manage custom categories/tags</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/developer.php')"><b>Developer</b><br>API functionality coming soon!</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/sync.php')"><b>Sync</b><br>Sync your inventory!</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/support.php')"><b>Support</b><br>Need Help? </a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/backup.php')"><b>Backup</b><br>Backup your data</a>
  <a href="https://smartlist.ga/dashboard/logout.php" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/backup.php')"><b>Logout</b><br>Log Out</a>
</div>
<div id="colorModal" class="modal">
  <div class="modal-content">
    <ul class="collection">
      <li><a class="collection-item waves-effect" onclick="_color.value = '41308a';document.getElementById('__colorform').submit()" href="javascript:void(0)">Default <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEVFJ6D////Exu4TAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = '6200ea';document.getElementById('__colorform').submit()" href="javascript:void(0)">Purple <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEViAOr///9ZJ5DQAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = 'B00020';document.getElementById('__colorform').submit()" href="javascript:void(0)">Red <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWwACD///8fISOWAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = '00695c';document.getElementById('__colorform').submit()" href="javascript:void(0)">Teal <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAaVz///+wIDr7AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = '00838f';document.getElementById('__colorform').submit()" href="javascript:void(0)">Cyan <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAg4/////mpfPyAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = '0277bd';document.getElementById('__colorform').submit()" href="javascript:void(0)">Blue <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUCd73///9M+5ROAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = '2e7d32';document.getElementById('__colorform').submit()" href="javascript:void(0)">Green <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUufTL////DH+/PAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = 'ef6c00';document.getElementById('__colorform').submit()" href="javascript:void(0)">Orange <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEXvbAD///8eCazGAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = 'ad1457';document.getElementById('__colorform').submit()" href="javascript:void(0)">Pink <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWtFFf////D4Zu0AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = '37474f';document.getElementById('__colorform').submit()" href="javascript:void(0)">Blue-gray <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEU3R0////+VAmT6AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='right' /></a></li>
    </ul>
  </div>
</div>

<script>
  function copyToClipboard() {
    var textBox = document.getElementById("id");
    textBox.select();
    document.execCommand("copy");
    M.toast({html: "Copied!"})
  }
  var _color = document.getElementById("color");
  $('#colorModal').modal()
  var elems = document.querySelectorAll("input[type=range]");
  M.Range.init(elems);
  document.getElementById('count1').innerHTML = document.getElementById('test5').value
  if(localStorage.getItem('theme') && localStorage.getItem('theme') == "true") {
    document.getElementById('darkmode').checked = true
  }
  if(localStorage.getItem('_darkSidenav') && localStorage.getItem('_darkSidenav') == "true") {
    document.getElementById('_darkSidenav').checked = true
  }
</script>