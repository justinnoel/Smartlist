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
        foreach ($users as $row) {
          echo "
          { \"name\": ". json_encode(trim(decrypt($row['name']))) . ",  \"qty\": ". json_encode(trim(decrypt($row['qty']))). 
          "},
";
        }
        $dbh = null;
        ?>
]
}