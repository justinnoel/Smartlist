<?php 
session_start();
if(!isset($_SESSION['valid'])) {
    header('Location: https://smartlist.ga/dashboard/auth');
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("../../../../cred.php");
if(isset($_POST['submit'])) {
    $file = file_get_contents($_FILES['userfile']['tmp_name']);
    $array = explode(PHP_EOL, $file);
    foreach($array as $a) {
        $item = explode(', ', $a);
        $name = encrypt($item[0]);
        $qty = encrypt((isset($item[1]) ? $item[1] : ""));
        $price = encrypt('Uploaded Item');
        $loginId = $_SESSION['id'];
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO products(name, qty, price, login_id) 
          VALUES(".json_encode($name).",".json_encode($qty).", ".json_encode($price).", '$loginId')";
          $conn->exec($sql);
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        
        $conn = null;
    }
    header('Location: https://smartlist.ga/dashboard/beta');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Upload Files
        </title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
    </head>
    <body class="container" style="padding-top: 30px;">
        <form method="POST" enctype="multipart/form-data">
            <h5>Upload files</h5>
            <p>Choose a .csv file to upload to your <b>kitchen.</b></p>
            <input type="file" name="userfile" style="padding: 2px;" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
            <br>
            <br>
            <button name="submit" class="btn green darken-2" onclick="var e=this;setTimeout(function() {e.disabled = true;return true}, 200)">Upload files</button>
        </form>
    </body>
</html>