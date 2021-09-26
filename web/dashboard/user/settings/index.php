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
}
?>
<style>
  .settingsContainer .collection-item:not(.borderVisible) {
    border: 0 !important;
  }
  .range-field span {
    color: white !important;
    /* margin: 0 !important;*/
  }
  #searchSettings {
    width: calc(100% - 300px);
    left: 300px
  }
</style>
<div style="position: fixed;top:0;left: 0;z-index: 9999999;width: 100%;height: 100%;background: var(--bg-color);overflow-y: scroll">
  <nav class="white">
    <ul>
      <li><a href="#/dashboard" class="teal-text" id="backBTN"><b><i class="material-icons left btn-floating btn btn-flat waves-effect teal-text">arrow_back</i>Settings</b></a></li>
    </ul>
    <ul class="right">
      <li><a href="javascript:void(0)" class="teal-text waves-effect" onclick="window.open('https://support.smartlist.ga')"><b><i class="material-icons">help</i></b></a></li>
      <li><a href="javascript:void(0)" class="teal-text waves-effect" onclick="// $('#searchSettings').removeClass('hide')"><b><i class="material-icons">search</i></b></a></li>
    </ul>
  </nav>
  <!-- <nav class="hide" id="searchSettings">
  <div class="nav-wrapper">
    <form id="searchForm1" action="./user/search.php">
      <div class="input-field">
        <input id="search234098" type="search" name="query" autocomplete="off" class="autocomplete" name="query" required autofocus onblur="$('#searchBar').toggleClass('hide')" >
        <label class="label-icon" for="search"><i class="material-icons search1" style="color: var(--font-color) !important;position: fixed;z-index: 999999999999999;" onclick="$('#searchSettings').addClass('hide')">arrow_back</i><i class="material-icons searchClose" style="color: var(--font-color) !important;position: fixed;z-index: 999999999999999;">search</i></label>
        <i class="material-icons hide-on-small-only close" style="color: var(--font-color) !important;backround: red !important;z-index: 999999999999999;position: fixed" onclick="$('#searchSettings').addClass('hide')">close</i>
      </div>
    </form>
  </div>
</nav>-->
  <br><br><br>
  <div class="container settingsContainer" id="settingsContainer"></div>
  <script>
    $('#settingsContainer').load('./user/settings/home.php')
    function toggleNavBack() {
      document.getElementById('backBTN').href="javascript:void(0)"
      document.getElementById('backBTN').onclick = function() {$('#settingsContainer').load('./user/settings/home.php');document.getElementById('backBTN').onclick= function() {document.getElementById('backBTN').href="#/dashboard"}}
    }
  </script>
</div>