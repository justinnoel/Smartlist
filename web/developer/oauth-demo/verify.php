<?php

$url = "https://api.smartlist.ga/v1/oauth/credentials/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
  "Authorization: Bearer nice_try_lol",
  "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "token=".$_GET['token'];

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$resp = json_decode($resp);
$name = $resp->name;
$email = $resp->email;
$avatar = $resp->user_avatar;
$color = $resp->theme;
$id = $resp->id;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Success!</title>
    <style>
      #circle__explode {
        position: fixed;
        top:50%;
        left:50%;
        z-index: -999;
        transform:scale(200);
        transform:translate(-50%,-50%);
        width:10px;
        height:10px;
        border-radius: 100%;
        background:#2e7d32;
        animation: circle__explode 1s forwards;
      }
      @keyframes circle__explode {
        0% {transform:scale(0);opacity:1}
        50% {transform:scale(200);;opacity:1}
        100% {opacity:0;transform:scale(200);}
      }
      @keyframes scale {
        0% {transform:scale(.9);opacity:.95}
        100% {transform:scale(1);opacity:1}
      }
    </style>
  </head>
  <body style="font-family:arial">
    <div id="circle__explode"></div>
    <center style="position: fixed;top:50%;left:50%;transform:translate(-50%,-50%)">
      <img src="<?=$avatar;?>" style="width: 300px;border-radius:9999px;height:300px;object-fit:cover;animation: scale .2s;">
      <h1><?=$name;?></h1>
      <h2><?=$email;?></h2>
      <p>User ID: <?=$id;?></p>
      <p>Theme color: <?=$color;?></p>
    </center>
  </body>
</html>