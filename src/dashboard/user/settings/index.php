<?php
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();

foreach ($users as $row) {
    $_SESSION['avatar'] = $row['user_avatar'];
    $theme = $row['theme'];
    $_SESSION['syncid'] = $row["syncid"];
    $_SESSION["number_notify"] = $row['remind'];
    $_SESSION["welcome"] = $row['welcome'];
    $_SESSION["studentMode"] = $row['studentMode'];
    $_SESSION['homePage'] = $row['defaultpage'];
    $_SESSION['purpose'] = $row['purpose'];
    $goal = $row["goal"];
}
?>
<style>
  .settingsContainer .collection-item:not(.borderVisible) {
    border: 0 !important;
    border-radius: 28px;
  }
  .range-field span {
    color: white !important;
    /* margin: 0 !important;*/
  }
  #searchSettings {
    width: calc(100% - 300px);
    left: 300px
  }
  #settings_nav {transition: background .25s;}
  #Settings {transition: all .2s;opacity:0}
  #settings_nav:not(.blue-grey) {background:transparent}
  ._darkTheme #settings_nav.blue-grey {background: #404040!important}
  #settings_nav {padding-top: 5px!important;padding-bottom: 5px!important;height:auto!important;}
  @media only screen and (max-width: 992px) {
    #settings_nav {padding-top: 3px!important;padding-bottom: 3px!important}
  }
</style>
<div style="position: fixed;top:0;left: 0;z-index: 9999999;width: 100%;height: 100%;background: var(--bg-color);overflow-y: scroll" id="settingsCC">
  <nav class="lighten-5 z-depth-0" id="settings_nav">
    <ul>
    <li><a href="#/user-dashboard" id="backBTN" style="line-height: 40px!important;border-radius: 99999px;" class="btn-floating btn btn-flat waves-effect nav_scaleIconOnHover"><i class="material-icons grey-text text-darken-1" style="line-height: 40px!important">arrow_back</i></a></li>
      <li><a class="grey-text"><b><span id="Settings">Settings</span></b></a></li>
    </ul>
    <ul class="right">
      <li><a href="//support.smartlist.ga" target="_blank" style="line-height: 40px!important" class="nav_scaleIconOnHover btn-floating btn btn-flat waves-effect"><i class="material-icons grey-text text-darken-1" style="line-height: 40px!important;margin-right: 2px !important;">help</i></a></li>
    </ul>
  </nav>
  <br><br><br>
  <div class="container settingsContainer" id="settingsContainer">
  <center>
    <div class="loader">
    <svg viewBox="0 0 32 32" width="42" height="42">
    <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
    </svg>
    </div>
    </center>
  </div>
  <script>
    new loadPage('./user/settings/home.php', '#settingsContainer');
    function toggleNavBack() {
      document.getElementById('backBTN').href="javascript:void(0)"
      document.getElementById('backBTN').onclick = function() {new loadPage('./user/settings/home.php', '#settingsContainer');document.getElementById('backBTN').onclick= function() {document.getElementById('backBTN').href="#/user-dashboard"}}
      document.getElementById("settingsContainer").innerHTML = `
      <center>
<div class="loader">
<svg viewBox="0 0 32 32" width="42" height="42">
<circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
</svg>
</div>
</center>
      `
    }

    document.getElementById('settingsCC').onscroll = function() {scrollFunction()};
    document.querySelector('meta[name="theme-color"]').setAttribute('content',  (document.documentElement.classList.contains("_darkTheme") ? "#101010": "#fff"));
    function scrollFunction() {
      if(document.getElementById("settingsCC").scrollTop==0) {
        document.getElementById("settings_nav").classList.remove('blue-grey');
        document.querySelector('meta[name="theme-color"]').setAttribute('content',  (document.documentElement.classList.contains("_darkTheme") ? "#101010": "#fff"));
      }
      else {
        document.getElementById("settings_nav").classList.add('blue-grey');
        document.querySelector('meta[name="theme-color"]').setAttribute('content',  (document.documentElement.classList.contains("_darkTheme") ? "#404040": "#cfd8dc"));
      }

      if (document.getElementById('settingsCC').scrollTop > 180) {
        document.getElementById("Settings").style.opacity = "1";
        document.getElementById("Settings").style.marginLeft = ""
      } else {
        document.getElementById("Settings").style.marginLeft = "-10px"
        document.getElementById("Settings").style.opacity = "0";
      }
    }
    function darkMode() {
   document.documentElement.classList.toggle("_darkTheme");
   localStorage.setItem(
      "theme",
      document.documentElement.classList.contains("_darkTheme") === true
         ? "true"
         : "false"
   );
   document.cookie = "dark=" + (document.documentElement.classList.contains("_darkTheme") === true ? "true" : "false");
}
  </script>
</div>