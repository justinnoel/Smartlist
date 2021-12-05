<?php
  session_start();
?>
<div id="accountDropdown" class="z-depth-3 center" style="padding: 10px;border-radius: 28px">
<br><br>
  <a class="modal-trigger" href="#avatarChange"><img src="<?=$_SESSION['avatar'];?>" style="width:100px" class="circle"></a>
  <br>
  <a class="btn waves-effect blue-grey btn-round lighten-5 black-text" style="margin-top:10px;" href="#/settings">Settings</a>
  <h4><?=$_SESSION['name'];?></h4>
  <h5><?=$_SESSION['username'];?></h5>
  <p><?=$_SESSION['email'];?></p>
</div>