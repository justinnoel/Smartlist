<?php
session_start();
include("../../cred.php");
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $sql = "DELETE FROM notes WHERE id=".$_GET['id']. " AND login_id=".$_SESSION['id'];

  // use exec() because no results are returned
  $conn->exec($sql);
  ?>
  <script>
  M.toast({
      html: "Deleted note successfully!"
  })
  </script>
  <?php
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;