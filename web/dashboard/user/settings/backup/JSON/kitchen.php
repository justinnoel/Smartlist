<?php
session_start();
include('../../../../cred.php');
header('Content-Type: application/json');
?>
{
    "room": "kitchen",
    "items": [<?php
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "SELECT * FROM products WHERE login_id=" . $_SESSION['id'];
        $users = $dbh->query($sql);
		$usersKey = $users->rowCount() - 1;
        foreach ($users as $k=>$row) {
          if($usersKey !== $k) {
          echo "
          { \"name\": ". json_encode(trim(decrypt($row['name']))) . ",  \"qty\": ". json_encode(trim(decrypt($row['qty']))). 
          "},
";
          }
             else {
             echo "
          { \"name\": ". json_encode(trim(decrypt($row['name']))) . ",  \"qty\": ". json_encode(trim(decrypt($row['qty']))). 
          "}
";
             }
        }
        $dbh = null;
        ?>
]
}