<?php 
session_start();
include('../cred.php');
$number_notify = $_SESSION['number_notify'];
$month = date('M');
?>
<style>
#ERR_EMPTY_NOTIFICATION_TITLE1 .waves-ripple {
    transition-duration: .4s !important;
    top: 40% !important;
    left: 53% !important;
}
.__nt2 span{
    opacity: .3 !important;
}
</style>
<div class='container'>
    <h5 id="ERR_EMPTY_NOTIFICATION_TITLE1" style="margin-top: 30px;margin-bottom:30px"><span>Maintenance </span><a href='javascript:void(0)' id="rn" class="right waves-effect" style="overflow: visible!important;color: #eee !important" onclick="this.parentElement.classList.toggle('__nt2');document.getElementById('mtn_notifications').classList.toggle('hide'); this.classList.toggle('nactive');if($(this).hasClass('nactive')) {localStorage.setItem('hide', 'a');this.getElementsByTagName('i')[0].innerHTML = 'visibility'} else {localStorage.setItem('hide', 'b');this.getElementsByTagName('i')[0].innerHTML = 'visibility_off'}"><i class="material-icons-round">visibility_off</i></a></h5>
    <div id="mtn_notifications">
        <ul class='collection' style='border: 0 !important;background: var(--bg-color);'>
            <?php switch($month) {
                case "Jan":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Inspect attic for leaks during heavy rain</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Flush water in hot water heaters</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Remove lint from dryer exhaust duct</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Seal exterior wooden decks and balconies</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Inspect automatic garage door safety shutoff</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Make sure your AC and Heaters work.</p></li>
            <?php 
            break;
            case "Feb":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your stove. Make sure to avoid filling water in small crevices.</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your couches. </p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Take your car to a car wash!</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Inspect your pipes</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean shower heads</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Pressure wash decks, patios and driveways</p></li>
            <?php break; 
            case "Mar":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Remove expired food</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your pantry</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your fridge</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your dining table</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Wipe down shelves/countertops</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your rooms</p></li>
            <?php break; 
            case "Apr":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Make sure to check every room in your home and clean out the clutter!</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean out your mail</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Make sure your AC filters are working properly</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Check Sprinklers</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Dust your TV</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Descale Coffee maker</p></li>
            <?php break; 
            case "May":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Reseal stone surfaces</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Check fire extinguishers pressure</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Trim shrubs around air conditioning units</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Replace batteries in smoke detectors</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Steam clean carpets</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Pressure wash decks, patios and driveways</p></li>
            <?php break; 
            case "Jun":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Inspect attic for leaks during heavy rain</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Flush water in hot water heaters</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Remove lint from dryer exhaust duct</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Seal exterior wooden decks and balconies</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Inspect automatic garage door safety shutoff</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Inspect heating and cooling systems</p></li>
            <?php break; 
            case "Aug":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Wash and fold your blankets</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Fold the clothes in your laundry room</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Check and Vacuum floors</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your gutters</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Prune your plants</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Descale Coffee maker</p></li>
            <?php break; 
            case "Sep":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Remove any stale/expired food</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your pantry</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your fridge</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your shelves/countertops</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your dining table</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your stairs</p></li>
            <?php break; 
            case "Nov":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your stove</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your couches. Wash any throws and pillow cases</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean your car</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Inspect your pipes</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Clean shower heads</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Pressure wash decks, patios and driveways</p></li>
            <?php break; 
            case "Dec":?>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Reseal stone surfaces</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Check fire extinguishers pressure</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Trim shrubs around air conditioning units</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Replace batteries in smoke detectors</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Steam clean carpets</p></li>
            <li class="collection-item avatar"><i class="material-icons circle waves-effect red darken-3" style="color:white !important">construction</i><p><b>Maintenance</b><br>Pressure wash decks, patios and driveways</p></li>
            <?php break; 
            ?>
            <?php } ?>
        </ul>
    </div>
<style>.mcard span { font-weight: bold !important } .mcard .card-image img { height: 250px !important; object-fit: cover; }</style>
<div class="container">
<?php switch($montha) {
  case "Jan": break;?>
 <?php
    break;
    case "Dec":
  ?>
  <div class="card"><div class="card-content"> <span class="card-title">Reseal stone surfaces</span> <p>Reseal the countertops in your home</p> </div> <div class="card-action"> <a class="btn btn-flat waves-effect" href="javascript:void(0)" onclick="AJAX_LOAD('#STARRED_ITEMS', './rooms/maintenance.php?q='+encodeURI('Reseal stone surfaces'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img src="https://assets.spe.org/dims4/default/b1d4e21/2147483647/strip/true/crop/500x250+0+0/resize/800x400!/quality/90/?url=http%3A%2F%2Fspe-brightspot.s3.amazonaws.com%2Fc4%2F02%2F3f6f4109bd02db0f466fc8b6273e%2Ffireextinguishers.jpg"> </div> <div class="card-content"> <span class="card-title">Check fire extinguishers pressure</span> <p>Make sure the pointer is within the green range</p> </div> <div class="card-action"> <a class="btn btn-flat waves-effect" href="javascript:void(0)" onclick="AJAX_LOAD('#STARRED_ITEMS', './rooms/maintenance.php?q=' + encodeURI('Check fire extinguishers'))">View More</a> </div>  <div class="card-image"> <img src="https://kglandscape.com/wp-content/uploads/2017/12/holmstrup-arborvitae-1.jpg"> </div> <div class="card-content"> <span class="card-title">Trim shrubs around air conditioning units</span> <p>Don't let any overgrown shrubs come into contact with the air conditioning unit.</p> </div> <div class="card-action"> <a class="btn btn-flat waves-effect" href="javascript:void(0)" onclick="AJAX_LOAD('#STARRED_ITEMS', './rooms/maintenance.php?q='+encodeURI('Trim shrubs around air conditioning units'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img src="https://zionssecurity.com/wp-content/uploads/2015/07/Chirping-Smoke-Alarm-Battery-Cover.jpg"> </div> <div class="card-content"> <span class="card-title">Replace batteries in smoke detectors</span> <p>Don't want to hear an annoying chirping sound???</p> </div> <div class="card-action"> <a class="btn btn-flat waves-effect" href="javascript:void(0)" onclick="AJAX_LOAD('#STARRED_ITEMS', './rooms/maintenance.php?q=' + encodeURI('Replace batteries in smoke detectors'))">View More</a> </div>  <div class="card-image"> <img src="https://www.thecarpetlegacy.com/wp-content/uploads/2018/05/What-is-a-Steam-Cleaner-and-How-Does-it-Clean-My-Carpets.jpg"> </div> <div class="card-content"> <span class="card-title">Steam clean carpets</span> <p>Reseal the countertops in your home</p> </div> <div class="card-action"> <a class="btn btn-flat waves-effect" href="javascript:void(0)" onclick="AJAX_LOAD('#STARRED_ITEMS', './rooms/maintenance.php?q='+encodeURI('Steam clean carpets'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img src="https://washh.com/wp-content/uploads/2019/08/Patio-Pressure-Washing.jpg"> </div> <div class="card-content"> <span class="card-title">Pressure wash decks, patios and driveways</span> <p>Cover all areas of the driveway. Wash all the dirt</p> </div> <div class="card-action"> <a class="btn btn-flat waves-effect" href="javascript:void(0)" onclick="AJAX_LOAD('#STARRED_ITEMS', './rooms/maintenance.php?q='+encodeURI('Pressure wash decks, patios and driveways'))">View More</a> </div>
  <?php
    break;
}?>
</div>
    </ul>
    <h5 id="ERR_EMPTY_NOTIFICATION_TITLE" style="margin-top: 30px;margin-bottom:30px">All</h5></div>
  <div id="ERR_EMPTY_NOTIFICATION" style="display:none">
    <img src="https://i.pinimg.com/originals/93/c7/44/93c744bcde1780c94bb1d3f03991f8a7.gif" style="width:50vw;display:block;margin:auto;height:auto" loading="lazy"><br>
    <p style="text-align:center">No notifications</p>
  </div>
  <div class="container">
    <ul class="collection" style="border:0 !important;background:var(--bg-color); " id="menu">
          <?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM login WHERE syncid=" . $_SESSION['id']." AND accept=1";
  $users = $dbh->query($sql);
  foreach ($users as $row)
  {
      echo ' <li class="collection-item avatar waves-effect" style="width:100%" onclick=\'sm_page("pair2", this, "")\'> <i class="material-icons circle waves-effect teal darken-3" style="color:white !important">verified_user</i> <span class="title"><b>Security</b></span> <p><b>'.decrypt($row['email']).'</b> is requesting access to <b>sync</b> to your account<br><b>More details:</b> <br> <b>Name: </b>'.decrypt($row['name']).'<br><b>ID: </b>'.$row['id'].'</p></li>';
  }
  $dbh = null;
}
      catch(PDOexception $e)
      {
        echo "Error is: " . $e->etmessage();
      } ?>
      <?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM products WHERE login_id = :login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $numbervarnotify)
  {
    if (preg_replace("/[^0-9]/", "", decrypt($numbervarnotify['qty'])) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect blue darken-3" style="color:white !important">blender</i> <span class="title"><b>Kitchen</b></span> <p>You\'re going to run out of ';
      echo decrypt($numbervarnotify['name']);
      echo " soon</p></li>";
    }
  }
  $dbh = null;
}
      catch(PDOexception $e)
      {
        echo "Error is: " . $e->etmessage();
      } ?> <?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM bedroom WHERE login_id=:login_id OR login_id=:syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $numbervarnotify)
  {
    if (preg_replace("/[^0-9]/", "", decrypt($numbervarnotify['qty'])) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect red darken-3" style="color:white !important">bed</i> <span class="title"><b>Bedroom</b></span> <p>You\'re going to run out of ';
      echo decrypt($numbervarnotify['name']);
      echo " soon</p></li>";
    }
  }
  $dbh = null;
}
      catch(PDOexception $e)
      {
        echo "Error is: " . $e->etmessage();
      } ?> <?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM bathroom WHERE login_id=:login_id OR login_id=:syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $numbervarnotify)
  {
    if (preg_replace("/[^0-9]/", "", decrypt($numbervarnotify['qty'])) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect green darken-3" style="color:white !important">wc</i> <span class="title"><b>Bathroom</b></span> <p>You\'re going to run out of ';
      echo decrypt($numbervarnotify['name']);
      echo " soon</p></li>";
    }
  }
  $dbh = null;
}
      catch(PDOexception $e)
      {
        echo "Error is: " . $e->etmessage();
      } ?> <?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM garage WHERE login_id=:login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $numbervarnotify)
  {
    if (preg_replace("/[^0-9]/", "", decrypt($numbervarnotify['qty'])) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect yellow darken-3" style="color:white !important">build</i> <span class="title"><b>Garage</b></span> <p>You\'re going to run out of ';
      echo decrypt($numbervarnotify['name']);
      echo " soon</p></li>";
    }
  }
  $dbh = null;
}
      catch(PDOexception $e)
      {
        echo "Error is: " . $e->etmessage();
      } ?> <?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM family WHERE login_id=:login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $numbervarnotify)
  {
    if (preg_replace("/[^0-9]/", "", decrypt($numbervarnotify['qty'])) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect pink darken-3" style="color:white !important">chair</i> <span class="title"><b>Family Room</b></span> <p>You\'re going to run out of ';
      echo decrypt($numbervarnotify['name']);
      echo " soon</p></li>";
    }
  }
  $dbh = null;
}
      catch(PDOexception $e)
      {
        echo "Error is: " . $e->etmessage();
      } ?> <?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM dining_room WHERE login_id=:login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $numbervarnotify)
  {
    if (preg_replace("/[^0-9]/", "", decrypt($numbervarnotify['qty'])) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect purple darken-3" style="color:white !important">restaurant</i> <span class="title"><b>Dining Room</b></span> <p>You\'re going to run out of ';
      echo decrypt($numbervarnotify['name']);
      echo " soon</p></li>";
    }
  }
  $dbh = null;
}
      catch(PDOexception $e)
      {
        echo "Error is: " . $e->etmessage();
      } ?> <?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM storageroom WHERE login_id=:login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $numbervarnotify)
  {
    if (preg_replace("/[^0-9]/", "", decrypt($numbervarnotify['qty'])) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect cyan darken-3" style="color:white !important">domain</i> <span class="title"><b>Storage Room</b></span> <p>You\'re going to run out of ';
      echo decrypt($numbervarnotify['name']);
      echo " soon</p></li>";
    }
  }
  $dbh = null;
}
      catch(PDOexception $e)
      {
        echo "Error is: " . $e->etmessage();
      } ?>
        
        <?php 
        // try
// {
//   $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// //   $dbh->prepare("SELECT * FROM login WHERE syncid=:login_id AND accept=0");
//   $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
//   $sql->execute();
//   $users = $sql->fetchAll();
//   foreach ($users as $row)
//   {
//       echo ' <li class="collection-item avatar waves-effect" style="width:100%" onclick=\'sm_page("pair2", this, "")\'> <i class="material-icons circle waves-effect teal darken-3" style="color:white !important">verified_user</i> <span class="title"><b>Security</b></span> <p>'.$row['email'].' is syncing their account to yours. To turn this off, go to settings &gt; sync</p></li>';
//   }
//   $dbh = null;
// }
//       catch(PDOexception $e)
//       {
//         echo "Error is: " . $e->etmessage();
//       } 
?>
    </ul>
  </div>
  <script>
  window.onerror = function(msg, url, linenumber) {
    alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
    return true;
}
   function isEmpty(tag) {
  return document.getElementById(tag).innerHTML.trim() == ""
}
if(localStorage.getItem('hide') == "a") { 
    document.getElementById('mtn_notifications').classList.toggle('hide');
    $('#ERR_EMPTY_NOTIFICATION_TITLE1').addClass('__nt2');
    $('#rn').addClass('nactive')
    document.getElementById('rn').getElementsByTagName('i')[0].innerHTML = 'visibility'
}
var empty = isEmpty("menu");
if (empty == true) {
        document.getElementById('ERR_EMPTY_NOTIFICATION').style.display = 'block';
        document.getElementById('ERR_EMPTY_NOTIFICATION_TITLE').style.display = 'none';
    }
  </script>