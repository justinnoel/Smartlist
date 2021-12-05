<?php
session_start();
include('../cred.php');
if(isset($_SESSION['id'])) {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM auth_ip WHERE login=" . $_SESSION['id']. " AND ip='".md5($_GET['u']). "'";
$users = $dbh->query($sql);
if($users->rowCount() > 1) {header("Location: https://smartlist.ga/dashboard/test.php?IP_whitelisted_already"); exit();}



try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $conn->prepare("INSERT INTO auth_ip(ip, login) 
  VALUES(:u, :sessid)");
  $sql->execute(array(
    ":u" => $_GET['u'],
    ":sessid" => $_SESSION['id']
  ));
  header("Location: https://smartlist.ga/dashboard/login.php?confirmed");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
} 
else {
    ?>
    <!DOCTYPE html>
<html>
  <head>
  <title>Session expired</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
    <style>
      * {
        -webkit-tap-highlight-color: transparent;
        box-sizing: border-box;
      }
      body {
        background: #b0bec5;
      }
      #app {
        position: fixed;
        top: 50%;
        left: 50%;
        background: #fff;
        padding: 40px 30px;
        display: block;
        border-radius: 9px;
        width: 450px;
        text-align: left;
        transform: translate(-50%, -50%);
        transform-origin: center;
        animation: zoom 0.2s forwards;
        font-family: 'Outfit', sans-serif;
      }
      @keyframes zoom {
        0% {
          transform: translate(-50%, -50%) scale(1.1);
          opacity: 0;
        }
        100% {
          opacity: 1;
          transform: translate(-50%, -50%) scale(1);
        }
      }
      #app h5 {
        font-weight: bold;
        line-height: 0;
        font-size: 18px;
      }
      #app p {
        color: #505050;
        font-size: 15px;
      }
      #app button {
        font-family: 'Outfit', sans-serif;
        font-size: 15px;
        margin-top: 15px;
        background: #f54e42;
        color: white;
        cursor: pointer;
        user-select: none;
        padding: 13px 10px;
        border-radius: 10px;
        width: 100%;
        outline: 0;
        border: 0;
      }
      #app button:focus {
        box-shadow: 0px 0px 0px 3px #f7ccc8;
      }
      .circle {
        width: 50px;
        background: #e8f5e9;
        padding: 10px;
        border-radius: 9999px;
        height: 50px;
        display: inline-block;
        background: ;
      }
      .items {
        max-height: 30vh;
        padding-left: 10px;
        overflow: overlay;
        box-shadow: 0px -10px 14px -10px #aaa inset;
        position: relative;
      }
      ::-webkit-scrollbar {
        width: 19px;
      }

      ::-webkit-scrollbar-thumb {
        border: 5px solid rgba(0, 0, 0, 0);
        background-clip: padding-box;
        border-radius: 9999px;
        background-color: #aaaaaa;
      }
      ::-webkit-scrollbar-thumb:hover {
        background-color: #808080;
      }
      ::-webkit-scrollbar-thumb:active {
        background-color: #707070;
      }
      .item i {
        position: relative;
        top: 5px;
        left: 15px;
      }
      .item i {
        user-select: none;
        padding: 3px;
        border: 1px solid rgba(0, 0, 0, 0);
        outline: 0;
        border-radius: 9999px;

        cursor: pointer;
      }
      .item i:hover {
        background: #eee;
      }
      .item i:focus {
        border: 1px solid rgba(0, 0, 0, 1);
        background: #eee;
      }
      @media only screen and (max-width: 500px) {
        #app {
          width: calc(100% - 10px);
        }
      }
      .loader {
        border: 2px solid #000;
        border-top: 2px solid transparent;
        width: 15px;
        height: 15px;
        border-radius: 999px;
        display: inline-block;
        animation: spin 0.5s linear infinite;
      }
      button[disabled] {
        cursor: auto !important;
        background: #eceff1 !important;
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }
    </style>
  </head>
  <body>
    <div id="app">
    	<div id="main">
      <center>
        <div class="circle" style="background:#eee">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
</svg>
        </div>
        <h5 id="title">Error</h5>
        <p id="desc">
          Your session has expired. Try re-verifying your email again. <b>If you've logged in from an incognito or guest mode, copy and paste this link in your incognito/guest window. </b>
        </p>
      </center>
      <div class="items" id="items"></div>
      <button onclick="window.location='https://smartlist.ga/login'" id="addButton">Login</button>
    </div>
    </div>
  </body>
</html>

    <?php
}
?>