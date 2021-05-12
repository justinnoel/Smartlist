<?php 
session_start();
include('../cred.php');
$number_notify = $_SESSION['number_notify'];
?>
<div class="container" style="width: 90%;margin-top: 10px;">
    <div class="row">
        <div class="col s12"><p class="resd-text">Quantity: You're running out of: </p></div>
        <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM products WHERE login_id = :login_id OR login_id= :syncid LIMIT 3");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) < $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="red-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
      
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM garage WHERE login_id = :login_id OR login_id= :syncid LIMIT 3");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) < $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="red-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
        <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM bedroom WHERE login_id = :login_id OR login_id= :syncid LIMIT 3");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) < $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="red-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM bathroom WHERE login_id = :login_id OR login_id= :syncid LIMIT 3");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) < $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="red-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM camping WHERE login_id = :login_id OR login_id= :syncid LIMIT 3");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) < $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="red-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM storageroom WHERE login_id = :login_id OR login_id= :syncid LIMIT 3");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) < $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="red-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM dining_room WHERE login_id = :login_id OR login_id= :syncid LIMIT 3");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) < $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="red-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM laundry WHERE login_id = :login_id OR login_id= :syncid LIMIT 3");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) < $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="red-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM custom_room_items WHERE login_id = :login_id OR login_id= :syncid LIMIT 3");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) < $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="red-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
    <div class="col s12"><p class="resd-text">Quantity: You have enough of:  </p></div>
        <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM products WHERE login_id = :login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) > $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="green-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
      
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM garage WHERE login_id = :login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) > $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="green-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM bedroom WHERE login_id = :login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) > $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="green-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM bathroom WHERE login_id = :login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) > $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="green-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM garage WHERE login_id = :login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) > $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="green-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM laundryroom WHERE login_id = :login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) > $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="green-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM storageroom WHERE login_id = :login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) > $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="green-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
              <?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM custom_room_items WHERE login_id = :login_id OR login_id= :syncid");
  $sql->bindValue(':login_id', $_SESSION['id'], PDO::PARAM_STR);
  $sql->bindValue(':syncid', $_SESSION['syncid'], PDO::PARAM_STR);
  $sql->execute();
  $users = $sql->fetchAll();
  foreach ($users as $row) {
    if (preg_replace("/[^0-9]/", "", $row['qty']) > $number_notify){
      echo '<div class="col s12 m4">
            <div class="card" style="width:100%;box-shadow:none;border: 1px solid #ccc;border-radius: 5px;height: 120px;">
                <div class="card-content">
                    <span class="card-title" style="width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        '.$row['name'].'
                    </span>
                    <p class="green-text">Quantity: '.$row['qty'].'</p>
                </div>
            </div>
        </div>';
    }
  }
  $dbh = null;
}
      catch(PDOexception $e){echo "Error is: " . $e->etmessage();} ?> 
        </div>    
    </div>
</div>