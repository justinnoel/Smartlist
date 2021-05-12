<?php 
    session_start();
    include('../../cred.php');
    $id = $_GET['id'];
    try {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM camping WHERE id=".$id;
      $users = $dbh->query($sql);
      foreach ($users as $row) {
          $star  = $row['star'];
      }
      $dbh = null;
    }
    catch (PDOexception $e) {
      echo "Error is: " . $e-> etmessage();
    }
    if($star == 0) {
         try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "UPDATE camping SET star='1' WHERE id=$id";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        
        $conn = null;
    }
    elseif($star == 1) {
         try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "UPDATE camping SET star='0' WHERE id=$id";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        
        $conn = null;
    }
?>