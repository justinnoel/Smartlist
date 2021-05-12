<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">
<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
  <title>Scan QR code</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css">
<style>
body, input {font-size:14pt}
input, label {vertical-align:middle}
.qrcode-text {padding-right:1.7em; margin-right:0}
.qrcode-text-btn {display:inline-block; background:url(//dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat; height:1em; width:1.7em; margin-left:-1.7em; cursor:pointer}
.qrcode-text-btn > input[type=file] {position:absolute; overflow:hidden; width:1px; height:1px; opacity:0}
</style>
</head>
<body translate="no" >
    <div class="container">
        <form action="add.php" method="POST">
  <input type=text size=16 placeholder="Tracking Code" name="name" class=qrcode-text><label class=qrcode-text-btn><input type=file accept="image/*" capture=environment onclick="return showQRIntro();" onchange="openQRCamera(this);" tabindex=-1></label> 
<input type=button value="Add">
</form>
</div>
  <script src='https://dmla.github.io/jsqrcode/src/qr_packed.js'></script>
      <script id="rendered-js" >
function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function () {
    node.value = "";
    qrcode.callback = function (res) {
      if (res instanceof Error) {
        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
      } else {
        node.parentNode.previousElementSibling.value = res;
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}

function showQRIntro() {
  return true;
}
//# sourceURL=pen.js
    </script>
        <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js"></script>

</body>

</html>
 
