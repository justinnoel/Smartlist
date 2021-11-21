<?php
session_start();
include("../dashboard/cred.php");
$d = (isset($_GET['id']) ? $_GET['id'] : "kitchen/1");
$d = explode("/", $d);
$room_def = $room = $d[0];
$qty = str_replace("-", " ", ucfirst($d[2]));
$name = str_replace("-", " ", ucfirst($d[1]));
$categories = str_replace("-", " ", ucfirst($d[3]));
$id = $d[4];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Share</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <style>
      body {background: url(https://i.ibb.co/YTDmRdY/blurry-gradient-haikei-2.png);background-size: cover;background-repeat:no-repeat;}
      .btn {
        height: auto !important;
        width: auto;
        padding: 2px 40px !important;
        border-radius: 999px;
        line-height: 40px !important;
        box-shadow: none !important;
        margin-top: 10px;
        display:block;
        font-family: 'Poppins', sans-serif !important;
      }
      body {
        font-family: 'Poppins', sans-serif !important;
      }
      .btn:not(.blue) {
        background: transparent !important;
      }
      * {-webkit-tap-highlight-color: transparent;box-sizing: border-box;}
      *:not(.waves-light) .waves-ripple {
        background: rgba(0, 0, 0, .4) !important;
      }
      .waves-light .waves-ripple {
        background: rgba(255, 255, 255, .4) !important;
      }

      .waves-ripple {
        transition: transform .8s cubic-bezier(0.4, 0, 0.2, 1), opacity .4s !important
      }
      .blue-outline {
        border: 2px solid #1565c0 !important;
        color: #1565c0 !important
      }
      iframe {
        height: 400px;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 0;
      }
      html,body {height:100vh}
      body {
        padding: 10px;
      }
      .card {
        width: 100%;
        height: 100%;
      }
      @media (prefers-color-scheme: dark) {
        .btn {color: white !important;}
        iframe {background: rgba(255,255,255,.8) !important}
        body {
          background: url(https://i.ibb.co/GWVHHnS/blurry-gradient-haikei-4.png);
          background-size: cover;
          background-repeat:no-repeat;
          color: white;
          background-attachment: fixed
        }
        .black-text {color: white !important}
      }
      @media only screen and (max-width: 992px) {
        .ifr {
          margin-top: 30px
        }
        body {
          background: url(https://i.ibb.co/2q9XBxX/blurry-gradient-haikei-3.png);
          background-size: cover;background-repeat:no-repeat;
          background-attachment: fixed
        }
        .valign-wrapper {
          display:-webkit-unset !important;display:-webkit-flex;display:-ms-unset !important;display:unset !important;-webkit-box-align:unset !important;-webkit-align-items:center;-ms-flex-align:unset !important;align-items:unset !important
        }

        @media (prefers-color-scheme: dark) {
          body {
            background: url(https://i.ibb.co/cYLdP72/blurry-gradient-haikei-5.png);
            background-size: cover;background-repeat:no-repeat;
            background-attachment: fixed
          }
        }
      }
    </style>
  </head>
  <div style="position: fixed;top: 0;left:0;width:100%;padding:15px;background-filter:blur(10px);border-bottom:1px solid #aaa">
    <a href="https://smartlist.ga" target="_blank" class="black-text">
      <img src="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg" width="40px" style="vertical-align:middle"> Smartlist
    </a>
  </div>
  <body class="valign-wrapper" style="padding-top: 70px">
    <div class="container">
      <?php if(!isset($_SESSION['valid'])) {?>
      <br>
      <div style="padding: 10px" class="blue-grey white-text">
        Want to keep track of your home's inventory? Check out <a class="white-text" href="https://smartlist.ga/">Smartlist</a>!
      </div>
      <br>
      <?php } ?>
      <div class="row">
        <div class="col s12 m6">
          <h1><?=$name;?></h1>
          <h5>Quantity: <?=$qty;?></h5>
          <h5>Room: <?=ucfirst($room_def);?></h5>
          <?php
          $categories = explode(",", $categories);
          foreach ($categories as $t) {
          ?>
          <div class="chip"><?=$t;?></div>
          <?php } ?>
          <br>
          <button class="btn blue waves-effect waves-light" disabled>Add to my inventory</button>
          <button class="btn waves-effect blue-outline" disabled>Add to shopping list</button>

        </div>
        <div class="col s12 m6 ifr">
          <iframe src="https://chatserver.manuthecoder.repl.co/?id=<?=$id;?>&name=Anonymous" class="z-depth-2" style="backdrop-filter:blur(50px);background: rgba(255,255,255,.3)"></iframe>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
  </body>
</html>