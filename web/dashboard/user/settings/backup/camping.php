<?php
session_start();
include('../../../cred.php');
?>
<script>
    var data = `<?php 
    try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM camping WHERE login_id=" . $_SESSION['id'];
    $users = $dbh->query($sql);
    foreach ($users as $row) {
      echo str_replace(',', '', $row['name']). ", ". str_replace(',', '', $row['qty']). "\n";
    }
    $dbh = null;
  }
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>`;
  downloadFile('camping.csv', 'data:text/csv;charset=UTF-8,' + encodeURIComponent(data));
</script>