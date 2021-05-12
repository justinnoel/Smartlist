<?php session_start();include('../cred.php');$number_notify = $_SESSION['number_notify'];?>
<div class='container'><h5 id="ERR_EMPTY_NOTIFICATION_TITLE" style="margin-left: 15px;margin-top: 30px;margin-bottom:30px">All</h5></div>
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
      echo ' <li class="collection-item avatar waves-effect" style="width:100%" onclick=\'sm_page("pair2", this, "")\'> <i class="material-icons circle waves-effect teal darken-3" style="color:white !important">verified_user</i> <span class="title"><b>Security</b></span> <p><b>'.$row['email'].'</b> is requesting access to <b>sync</b> to your account<br><b>More details:</b> <br> <b>Name: </b>'.$row['name'].'<br><b>ID: </b>'.$row['id'].'</p></li>';
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
    if (preg_replace("/[^0-9]/", "", $numbervarnotify['qty']) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect blue darken-3" style="color:white !important">blender</i> <span class="title"><b>Kitchen</b></span> <p>You\'re going to run out of ';
      echo $numbervarnotify['name'];
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
    if (preg_replace("/[^0-9]/", "", $numbervarnotify['qty']) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect red darken-3" style="color:white !important">bed</i> <span class="title"><b>Bedroom</b></span> <p>You\'re going to run out of ';
      echo $numbervarnotify['name'];
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
    if (preg_replace("/[^0-9]/", "", $numbervarnotify['qty']) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect green darken-3" style="color:white !important">wc</i> <span class="title"><b>Bathroom</b></span> <p>You\'re going to run out of ';
      echo $numbervarnotify['name'];
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
    if (preg_replace("/[^0-9]/", "", $numbervarnotify['qty']) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect yellow darken-3" style="color:white !important">build</i> <span class="title"><b>Garage</b></span> <p>You\'re going to run out of ';
      echo $numbervarnotify['name'];
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
    if (preg_replace("/[^0-9]/", "", $numbervarnotify['qty']) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect pink darken-3" style="color:white !important">chair</i> <span class="title"><b>Family Room</b></span> <p>You\'re going to run out of ';
      echo $numbervarnotify['name'];
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
    if (preg_replace("/[^0-9]/", "", $numbervarnotify['qty']) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect purple darken-3" style="color:white !important">restaurant</i> <span class="title"><b>Dining Room</b></span> <p>You\'re going to run out of ';
      echo $numbervarnotify['name'];
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
    if (preg_replace("/[^0-9]/", "", $numbervarnotify['qty']) < $number_notify)
    {
      echo ' <li class="collection-item avatar"> <i class="material-icons circle waves-effect cyan darken-3" style="color:white !important">domain</i> <span class="title"><b>Storage Room</b></span> <p>You\'re going to run out of ';
      echo $numbervarnotify['name'];
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
var empty = isEmpty("menu");
if (empty == true) {
        document.getElementById('ERR_EMPTY_NOTIFICATION').style.display = 'block';
        document.getElementById('ERR_EMPTY_NOTIFICATION_TITLE').style.display = 'none';
    }
  </script>