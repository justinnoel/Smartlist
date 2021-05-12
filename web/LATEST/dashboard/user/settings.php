<?php 
session_start();
include('../cred.php');
?>
  <nav style="position:fixed;top:0;left:0;z-index:2;width:100%;background: #303030">
            <ul>
              <li>
                <a href="#!" class="waves-efsfect waves-slight" onclick="sm_page('News')" id="capitalizeFirstLetter" style="font-size: 20px"><i class="material-icons-round left" id="settings-icon" style="color:white;top:20px">arrow_back</i>  Settings</a>
              </li>
            </ul>
          </nav>
          <div class="container" id="settingsContainer">
            <div class="row" style="margin-top: 10px"> <div style="padding: 0 !important" class="col s12 m3 __sidebar"> <div class="collection" style="border:1px solid #ccc;border-radius: 5px;" id='_settingsmenu'> <a href="#!" id="__def" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Account</span></a> <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''));AJAX_LOAD('#_smSettingsPage_privacy', './user/settings/privacy.php')" class="collection-item waves-effect"><span>Privacy</span></a> <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Notifications</span></a> <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Rooms</span></a> <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Appearance</span></a> <a href="#!" onclick="sm_page('pair2')" class="collection-item waves-effect"><span>Sync</span></a> <a href="#!" class="collection-item waves-effect" style="opacity:.8;pointer-events:none"><span>Labels - Coming Soon!</span></a> <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>App</span></a> <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Developer</span></a> <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Support</span></a> <a href="logout.php" class="collection-item waves-effect">Log Out</a> <a href="#!" onclick="_settingsLoad(this, this.getElementsByTagName('span')[0].innerHTML.toLowerCase().replace(' ', ''))" class="collection-item waves-effect"><span>Other</span></a> </div> </div>
          <div class="col s12 m9">
            <div id="_smSettingsPage_account" class="__SETTINGSPAGE">
            <div class="row"> <div class="col s12 m10"> <h1 style="margin:0;width:100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $_SESSION['name']; ?></h1> <h5>ID: <?php echo $_SESSION['id']; ?></h5><h6>Your email: <span style="background:#ccc;color:#ccc;transition: all .2s;cursor:pointer" onclick="this.style.color='black';this.style.backgroundColor = 'transparent'"><?php echo $_SESSION['email']; ?></span></h6> </div> <div class="col s2 hide-on-small-only"> <div class="container"><img src="<?php echo $_SESSION['avatar']; ?>" width="100px" height="100px" style="border-radius:999px;"/></div> </div> </div> </div> <div id="_smSettingsPage_privacy" class="__SETTINGSPAGE"></div>
            <div id="_smSettingsPage_rooms" class="__SETTINGSPAGE"> <ul class="collection"> 
            <h5>Rooms</h5><br> <?php try
    {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
    $users = $dbh->query($sql);
    foreach ($users as $row)
        {
        print "<li class=\"collection-item\" style='width:100%;'><i class='material-icons-round left'>" . $row['qty'] . "</i>" . $row["name"] . " <a class='secondary-content waves-effect _room' href='https://smartlist.ga/dashboard/rooms/custom_room_delete.php?id=" . $row['id'] . "&name=" . urlencode($row['name']) . "'><i class='material-icons-round'>delete</i></a></li>";
        }
    $dbh = null;
    }
catch(PDOexception $e)
    {
    echo "Error is: " . $e->etmessage();
    } ?> </ul> </div> <div id="_smSettingsPage_appearance" class="__SETTINGSPAGE">
        <h5>Appearance</h5><br>
          <div class="switch" style="margin-bottom: 10px">
            <label>
              Dark mode 
              <input type="checkbox" value="dark" id="darkmode">
              <span class="lever right"></span>
            </label>
          </div>
           <div class="switch" style="margin-bottom: 10px">
            <label>
              Dark Sidenav (Coming Soon!)
              <input type="checkbox" value="dark" id="darksidenav" disabled>
              <span class="lever right"></span>
            </label>
          </div>
            <div class="switch" style="margin-bottom: 10px">
            <label>
              Hide Starred Items (Coming Soon!)
              <input type="checkbox" value="dark" id="htarreditems" disabled>
              <span class="lever right"></span>
            </label>
          </div>
            <div class="switch" style="margin-bottom: 10px">
            <label>
              Reduced Motion (Coming Soon!)
              <input type="checkbox" value="dark" id="rmotion" disabled>
              <span class="lever right"></span>
            </label>
          </div>
         <div class="collection"> 
              <a class='dropdown-trigger collection-item waves-effect' href='#' data-target='dropdown1'><b>Theme</b><span style="color:gray"><br>Fair warning (for mobile users only): Changing the theme color can have unexpected results.</span></a> <ul id='dropdown1' class='dropdown-content' style='min-width: 30vw;max-height: 300px;min-height: 300px;position:fixed !important;z-index:99999'> <li><a onclick='_color.value = "41308a";document.getElementById("__colorform").submit()' href="#!">Default <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEVFJ6D////Exu4TAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li> <li><a onclick='_color.value = "6200ea";document.getElementById("__colorform").submit()' href="#!">Purple <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEViAOr///9ZJ5DQAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li> <li><a onclick='_color.value = "B00020";document.getElementById("__colorform").submit()' href="#!">Red <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWwACD///8fISOWAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li> <li><a onclick='_color.value = "00695c";document.getElementById("__colorform").submit()' href="#!">Teal <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAaVz///+wIDr7AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li> <li><a onclick='_color.value = "00838f";document.getElementById("__colorform").submit()' href="#!">Cyan <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUAg4/////mpfPyAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li> <li><a onclick='_color.value = "0277bd";document.getElementById("__colorform").submit()' href="#!">Blue <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUCd73///9M+5ROAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li> <li><a onclick='_color.value = "2e7d32";document.getElementById("__colorform").submit()' href="#!">Green <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUufTL////DH+/PAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li> <li><a onclick='_color.value = "ef6c00";document.getElementById("__colorform").submit()' href="#!">Orange <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEXvbAD///8eCazGAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li> <li><a onclick='_color.value = "ad1457";document.getElementById("__colorform").submit()' href="#!">Pink <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEWtFFf////D4Zu0AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" class='circle right'/></a></li> <li><a onclick='_color.value = "37474f";document.getElementById("__colorform").submit()' href="#!">Blue-gray <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEU3R0////+VAmT6AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='circle right'/></a></li> <!--<li><a onclick='_color.value = "212121";document.getElementById("__colorform").submit()' href="#!">Black <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEUhISH///+NBoehAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='circle right'/></a></li>--> <!--<li><a onclick='_color.value = "6d4c41";document.getElementById("__colorform").submit()' href="#!">Brown <img loading="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAABlBMVEVtTEH///+vGAlJAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAACklEQVQImWNgAAAAAgAB9HFkpgAAAABJRU5ErkJgggo=" width="20px" width="20px" class='circle right'/></a></li>--> </ul> <form action="./user/color.php" id="__colorform" method="POST"> <input type='hidden' name='color' id='color' value="<?php echo $theme; ?>"> </form> <a class="waves-effect collection-item modal-trigger  modal-close" href="#avarar" >Change my avatar</a> </div> </div> <div id="_smSettingsPage_labels" class="__SETTINGSPAGE">Labels</div> <div id="_smSettingsPage_notifications" class="__SETTINGSPAGE"><h5>Notifications</h5><br> <form action="./user/turn_on_notifications.php">  <div class="switch">
    <label style="display: block;margin-bottom: 10px;">
      Push Notifications
      <input type="checkbox" name="notifications" oninput="this.parentElement.parentElement.submit()" value="on">
      <span class="lever right"></span>
    </label>
    <label style="display: block;margin-bottom: 10px;">
      Mobile Notifications (Coming Soon!)
      <input type="checkbox" name="notifications1" oninput="this.parentElement.parentElement.submit()" value="on" disabled>
      <span class="lever right"></span>
    </label>
    <label style="display: block;margin-bottom: 10px;">
      Remind me only once a week
      <input type="checkbox" name="notifications2" oninput="this.parentElement.parentElement.submit()" value="on" disabled checked>
      <span class="lever right"></span>
    </label>
  </div></form><br> <form action="./user/notifications.php" method="POST"> <p>Minimum # of items per notifications</p> <p class="range-field"> <input type="range" name="remind" min="0" max="100" onmouseup="this.parentElement.parentElement.submit()" value="<?php echo $number_notify; ?>"/> </p> </form><button class="btn grey darken-3" id="test_notifications">Test push notifications</button> </div>
            <div id="_smSettingsPage_app" class="__SETTINGSPAGE"><h5>App</h5><br>
            <button class="add-button btn blue-grey darken-3">Install app</button>
            </div>
            <div id="_smSettingsPage_developer" class="__SETTINGSPAGE"><h5>Developer</h5><p>Coming Soon! </p></div>
            <div id="_smSettingsPage_support" class="__SETTINGSPAGE"><h5>Support</h5><div class="collection"><a class="collection-item" href="https://community.smartlist.ga">Smartlist Community</a><a class="collection-item" href="https://help.smartlist.ga">Smartlist knowledge base</a></div></div>
            <div id="_smSettingsPage_other" class="__SETTINGSPAGE"><h5>Other</h5>
            <a href="https://github.com/Smartlist-app/Smartlist" target="_blank">Smartlist on GitHub</a><br>
            <a href="http://help.smartlist.ga/docs/#/terms-and-conditions" target="_blank">Terms &amp; Conditions</a><br>
            <a href="https://help.smartlist.ga/docs/#/privacy-policy" target="_blank">Privacy Policy</a><br>
            </div>
            <!--<button onclick="$('#capitalizeFirstLetter').click()" class="hide-on-med-and-up btn blue-grey darken-3">Back</button>-->
          </div>
        </div>
        </div>