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
        $item = explode(',', $a);
        $name = encrypt($item[0]);
        $qty = encrypt((isset($item[1]) ? $item[1] : ""));
        $price = encrypt('Uploaded Item');
        $loginId = $_SESSION['id'];
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO ".$_POST['room']."(name, qty, price, login_id) 
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <style>
            .dropzone {
  padding: 30px 20px;
  margin-bottom 10px;
  border: 3px dashed #aaa;
  transition: all .2s;
}
.dropzone.dragover {
    background: #fafafa;
  border-color: #919090;
}
.success {
    border-style: solid;
    border-color: #388e3c;
}
        </style>
    </head>
    <body class="container" style="padding-top: 30px;">
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col s12 m6">
                <h5>Upload files</h5>
                <p>Choose a .csv file to upload. </p>
                <div class="dropzone" onclick="input.click()">Click here or drag and drop to upload. </div>
                <input type="file" name="userfile" style="display: none" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" id="file-upload" style="dispalay:none;">
                <select name="room" required>
                  <option value="" disabled selected>Room</option>
                  <option value="products">Kitchen</option>
                  <option value="bedroom">Bedroom</option>
                  <option value="bathroom">Bathroom</option>
                  <option value="garage">Garage</option>
                  <option value="laundry">Laundry Room</option>
                  <option value="dining_room">Dining Room</option>
                  <option value="camping">Camping Supplies</option>
                </select>
            </div>
            </div>
            <button name="submit" class="btn green darken-2">Upload files</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
        <script>
         $(document).ready(function(){
            $('select').formSelect({
              // specify options here
            });
          });
          var $dropzone = document.querySelector('.dropzone');
        var input = document.getElementById('file-upload');
        
        $dropzone.ondragover = function (e) { 
          e.preventDefault(); 
          this.classList.add('dragover');
        };
        $dropzone.ondragleave = function (e) { 
            e.preventDefault();
            this.classList.remove('dragover');
        };
        $dropzone.ondrop = function (e) {
            e.preventDefault();
            this.classList.remove('dragover');
            this.classList.add('green');
            this.classList.add('success');
            this.classList.add('white-text');
            this.innerHTML = "file.csv";
            input.files = e.dataTransfer.files;
        }
        </script>
    </body>
</html>