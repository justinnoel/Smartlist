<?php
session_start(); 
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    include("../../cred.php");
    $id = $_GET['id'];
    $_GET['id'] = intval($_GET['id']);
    $_SESSION['id'] = intval($_SESSION['id']);
    $name = $_GET['name'];
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      // sql to delete a record
      $sql = "DELETE FROM roomnames WHERE id=".$_GET['id']. " AND login_id=".$_SESSION['id'];
    
      // use exec() because no results are returned
      $conn->exec($sql);
      
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      // sql to delete a record
      $sql = "DELETE FROM custom_room_items WHERE price=".$_GET['id']. " AND login_id=".$_SESSION['id'];
    
      // use exec() because no results are returned
      $conn->exec($sql);
      
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    
    header('Location: ../../');
    
    
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-S0PH6N0Z7E"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-S0PH6N0Z7E');
    </script>
<style>
a {text-decoration:none}
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
form {
    height: 100%;
}
* {
-webkit-touch-callout:none; 
-webkit-text-size-adjust:none;
-webkit-tap-highlight-color:rgba(0,0,0,0); 
}

form {
width:40vw;
position:relative;
margin: auto;
padding: 10px;
box-shadow: 25px 25px 100px #eee;
border-radius: 4px;
animation: form .2s forwards;
animation-delay: .5s;
transform: scale(.8);
opacity: 0;
transition: all .2s !important;
}
@keyframes form {
0% {
    opacity: 0;
}
100% {
    opacity: 1;
    transform: scale(1)
}
}
* {
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}
input {background: whitesmoke;outline: 0;border: 0;padding: 15px;width: 100%;transition: all .2s}
input:hover {background: #ddd}
input:focus {background: #eee}
.blue {background: #1e88e5;outline: 0;border: 0;padding: 15px;width: 48%;margin-top: 10px;color:white;cursor: pointer;transition: all .2s}
.blue:hover {background: #1565c0}
.blue:active {background: #0d47a1;transform: scale(.98)}
form:before {
    background:linear-gradient(to left, #c4268c, #9a0b72);
    content: "";
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 4px;
    height: 5px
}
a {
    display: inline-block;
    margin:0;
}
.gray {outline: 0;border: 0;padding: 15px;width: 48%;margin-top: 10px;cursor: pointer;transition: all .2s;color:gray;}
.gray:hover {
   background: #eee;
}
@media only screen and (max-width: 900px) {
form {
width: 75vw
}
@media only screen and (max-width: 600px) {
form {
width: 95vw
}
}
</style>
</head>
<body>
<div style="text-align:center;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);font-family: 'Open Sans', sans-serif;" >
<form>
    <h2>Delete?</h2>
    <p>This action is <strong>irreversible</strong>! All items in this room will be deleted</p>
<a href="<?php echo $actual_link;?>&confirm=true" class="blue">Delete</a>
<a href="https://smartlist.ga/dashboard/beta" class="gray">Back</a>
</form>
</div>
</body>
</html>