<?php
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
$sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();

foreach ($users as $row) {
  $goal = $row["goal"];
  $welcome = $row['welcome'];
  $_SESSION['avatar'] = $row['user_avatar'];
  $theme = $row['theme'];
  $homePage = $row['defaultpage'];
  $studentMode = $row['studentMode'];
  $_SESSION["number_notify"] = $row['remind'];
  $_SESSION["purpose"] = $row['purpose'];
  $_SESSION['currency'] = $row['currency'];
}
include('../../colorSwitch.php');
?>
<style>
.select-wrapper> input.select-dropdown {border:1px solid rgba(200, 200, 200, .3)!important;padding-left: 10px!important;border-radius: 10px!important}
  #id::selection {background: transparent}
  a.collection-item.selectable {cursor: auto!important;user-select: text !important}
  #colorModal {position: fixed !important;top: 50% !important;left: 50% !important;transform: translate(-50%, -50%) scale(1)  !important}
  ._darkTheme .header {color:#fff!important}
</style>
<div class="collection" id="searchResSettings">
  <br><br>
  <h1 class="center header" style="margin-left: 13px;background: -webkit-linear-gradient(30deg, #<?=$userTheme['top'];?>, #<?=$userTheme['light'];?>); -webkit-background-clip: text; -webkit-text-fill-color: transparent;line-height:150px!important">Settings</h1>
  <br>
  <?php if($_SESSION['purpose']!=='business') { ?>
  <a href="javascript:void(0)" class="collection-item borderVisible" draggable="false">
    <div class="switch"><b>Notifications</b><br>After item's quanity is less than <span id="count1"></span> (except for items manually marked in stock)
      <p class="range-field">
        <input type="range" id="test5" name="remind" min="0" max="100" sonmousedown='this.focus()' oninput="document.getElementById('count1').innerHTML = this.value" value='<?=$_SESSION["number_notify"];?>' onmouseup='loadURL("./user/settings/setNotifications.php/?remind="+this.value)'/>
      </p>
    </div>
  </a>
  <?php } ?>
  <a href="javascript:void(0)" class="collection-item selectable borderVisible" draggable="false">
    <p>Home Page</p>
    <select onchange='loadURL("https://smartlist.ga/dashboard/user/settings/setHomePage.php?value="+this.value)'>
      <option value="dashboard" <?=($homePage == "dashboard" ? "selected" : "")?>>Dashboard (Default)</option>
      <option value="finances" <?=($homePage == "finances" ? "selected" : "")?>>Finances</option>
    </select>
  </a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="this.getElementsByTagName('input')[0].click();">
    <div class="switch" style="pointer-events: none"><label style="vertical-align: middle"><input onclick="darkMode()" type="checkbox" value="dark" id="darkmode" onmousedown="this.click()"><span class="lever right"></span> </label> <span style="vertical-align: middle">Dark mode</span></div>
  </a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="this.getElementsByTagName('input')[0].click()">
    <div class="switch" style="pointer-events: none"> Dark sidenav<label style="vertical-align: middle"><input type="checkbox" onclick="darkSidenav()" value="dark" id="_darkSidenav"><span class="lever right"></span> </label> </div>
  </a>
  <a class='modal-trigger collection-item waves-effect' href='#colorModal'>
    Theme color
  </a>
  <?php if($_SESSION['purpose']!=='business') { ?>
    <a href="javascript:void(0)" class="collection-item waves-effect" onclick="this.getElementsByTagName('input')[0].click();getHashPage()">
    <div class="switch" style="pointer-events: none"> <b style="vertical-align: middle">Student Mode <span class="badge new purple" style="float:none"></span></b><br>Are you a student in college living in a dorm? Turn this mode on to hide all rooms, except for the ones you might need<label style="vertical-align: middle"><input onclick="loadURL('./user/settings/studentMode.php?checked='+(this.checked==true?'true':'false'))" type="checkbox" value="true" onmousedown="this.click()" <?=($studentMode == "true" ? "checked" : "")?>><span class="lever right"></span> </label> </div>
  </a>
  <?php } ?>
  <form action="./user/settings/changeColor.php" id="__colorform" method="POST"> <input type='hidden' name='color' id='color' value="37474f"> </form> 
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();new loadPage('./user/settings/rooms.php', '#settingsContainer')">Rooms</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();new loadPage('./user/settings/categories.php','#settingsContainer')">Categories</a>
  <?php if ($_SESSION['purpose'] !== 'business') {?>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();new loadPage('./user/settings/sync.php', '#settingsContainer')">Sync</a>
  <?php } ?>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();new loadPage('./user/settings/profile.php', '#settingsContainer')">Profile</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();new loadPage('./user/settings/houseprofile.php', '#settingsContainer')"><?=($_SESSION['purpose'] !== 'business' ? "House profile" : "Business profile")?></a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();new loadPage('./user/settings/developer.php', '#settingsContainer')">Developer</a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();new loadPage('./user/settings/support.php','#settingsContainer')">Support</b></a>
  <a href="javascript:void(0)" class="collection-item waves-effect" onclick="toggleNavBack();new loadPage('./user/settings/backup.php','#settingsContainer')">Backup</a>
  <a href="https://smartlist.ga/dashboard/logout.php" class="collection-item waves-effect" onclick="document.body.insertAdjacentHTML('beforebegin', `<div style='position:fixed;top:0;left:width:100%;height:100%;background:rgba(0,0,0,0.3);backdrop-filter:blur(10px);z-index:9999999999999999999999999999999'></div>`)">Sign out</a>
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
      <li><a class="collection-item waves-effect" onclick="_color.value = 'ef6c00';document.getElementById('__colorform').submit()" href="javascript:void(0)">Brown <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEVtTEH///+vGAlJAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = 'ad1457';document.getElementById('__colorform').submit()" href="javascript:void(0)">Pink <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWtFFf////D4Zu0AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='right' /></a></li>
      <li><a class="collection-item waves-effect" onclick="_color.value = '37474f';document.getElementById('__colorform').submit()" href="javascript:void(0)">Blue-gray <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEU3R0////+VAmT6AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='right' /></a></li>
    </ul>
  </div>
</div>

<script>
  var _color = document.getElementById("color");
  M.Modal.init(document.querySelectorAll("#colorModal"));
  <?php if($_SESSION['purpose']=='personal') { ?>
  var elems = document.querySelectorAll("input[type=range]");
  M.Range.init(elems);
  document.getElementById('count1').innerHTML = document.getElementById('test5').value;
  <?php } ?>
  if(localStorage.getItem('theme') && localStorage.getItem('theme') == "true") {
    document.getElementById('darkmode').checked = true
  }
  if(localStorage.getItem('_darkSidenav') && localStorage.getItem('_darkSidenav') == "true") {
    document.getElementById('_darkSidenav').checked = true
  }
  M.FormSelect.init(document.querySelectorAll("select"), {
    constrainWidth: false
  })
</script>