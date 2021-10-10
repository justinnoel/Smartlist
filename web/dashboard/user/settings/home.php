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
  $homePage = $row['defaultpage'];
  $_SESSION["number_notify"] = $row['remind'];
}
?>
<style>
  #id::selection {background: transparent}
  #colorModal {position: fixed !important;top: 50% !important;left: 50% !important;transform: translate(-50%, -50%) scale(1)  !important}
</style>
<div class="collection" id="searchResSettings">
  <br><br>
  <h1 style="margin-left: 13px;background: -webkit-linear-gradient(30deg, #FF416C, #FF4B2B); -webkit-background-clip: text; -webkit-text-fill-color: transparent;line-height:auto!important"><b>Settings</b></h1>
  <br>
  <a href="javascript:void(0)" class="collection-item" draggable="false">
    <div class="switch"> <b>Notifications</b><br>After item's quanity is less than <span id="count1"></span>
      <p class="range-field">
        <input type="range" id="test5" name="remind" min="0" max="100" sonmousedown='this.focus()' oninput="document.getElementById('count1').innerHTML = this.value" value='<?=$_SESSION["number_notify"];?>' onmouseup='$("#ajaxLoader").load("./user/notifications.php/?remind="+this.value)'/>
      </p>
    </div>
  </a>
  <a href="javascript:void(0)" class="collection-item borderVisible" draggable="false">
    <b>Default Home Page</b>
    <select onchange='$("#ajaxLoader").load("https://smartlist.ga/dashboard/user/settings/setHomePage.php?value="+this.value)'>
      <option value="dashboard" <?=($homePage == "dashboard" ? "selected" : "")?>>Dashboard (Default)</option>
      <option value="finances" <?=($homePage == "finances" ? "selected" : "")?>>Finances</option>
    </select>
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
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/profile.php')"><b>Profile</b><br>Edit your Profile</a>
  <a class='modal-trigger collection-item waves-effect' href='#colorModal'>
    <b>Theme</b><br> #<?=$theme;?>
  </a>
  <form action="./user/color.php" id="__colorform" method="POST"> <input type='hidden' name='color' id='color' value="37474f"> </form> 
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/privacy.php')"><b>Privacy &amp; Security</b><br>Manage password, and read about privacy statements</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/notifications.php')"><b>Notifications</b><br>Manage your notification settings</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/rooms.php')"><b>Rooms</b><br>View and manage custom rooms</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/categories.php')"><b>Categories</b><br>View and manage custom categories/tags</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/developer.php')"><b>Developer</b><br>View and manage API keys. Head on over to the dev zone for more options</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/sync.php')"><b>Sync</b><br>Sync your inventory!</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/support.php')"><b>Support</b><br>Need Help? </a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();$('#settingsContainer').load('./user/settings/backup.php')"><b>Backup</b><br>Backup your data</a>
  <a href="https://smartlist.ga/dashboard/logout.php" class="collection-item waves-effect" onclick="document.body.insertAdjacentHTML('beforebegin', `<div style='position:fixed;top:0;left:width:100%;height:100%;background:rgba(0,0,0,0.3);backdrop-filter:blur(10px);z-index:9999999999999999999999999999999'></div>`)"><b>Logout</b><br>Log Out</a>
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
  $('select').formSelect();
</script>
<script>
  $(document).ready(function(){
    $("#search234098").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#searchResSettings .collection-item").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>