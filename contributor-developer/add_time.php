<?php 
session_start();
// echo $_SESSION['id'];
if(isset($_POST['submit'])){
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO c_time(name, qty, price, login_id) 
  VALUES('$name','$qty','$loginId', '1')";
  $conn->exec($sql);
header('Location: ./?time_check');
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
// echo "Name: $name <br>";
// echo "Desc: $qty <br>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <title>Add yourself!</title>
</head>
<style>
@media only screen and (max-width: 600px) {
.col {
    width: 100% !important
}
}
input,textarea {
    border-color: #e0e7ee !important
}
</style>
<form method="POST" class="container">
    <h3 class="center">New Time Record</h3>
<input name="name" placeholder="How did you contribute?" autocomplete="off"> 
<div><input name="qty" type="number" placeholder="How much time did you spend on this (in minutes)" autocomplete="off">
<label>Be truthful, please!</label>
</div>
<input name="price" type="hidden" value=''> 
<button type="submit" name="submit" class="btn purple darken-3" style="z-index: 0 !important">Submit</button>
<button type="reset" class="btn btn-flat" style="z-index: 0 !important;background:transparent !important">Reset</button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
  $('select').niceSelect();
});
</script>
