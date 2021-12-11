<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_set_cookie_params(0, '/', ".smartlist.ga", false, false);
session_start();
include "cred.php";

$app = false;
if (isset($_GET['auth']))
{
    $dbname = "smartlis_api";
    $conn = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM apps");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $d = $stmt->fetchAll();
    foreach ($d as $r)
    {
        if (hash("sha512", $r['id']) == $_GET['appId'])
        {
            $app = true;
            $name = $r['appName'];
            break;
        }
    }
    if (!$app)
    {
        $invalidAPP = true;
    }
    $conn = null;
}
if (isset($_COOKIE['attempts']) && $_COOKIE['attempts'] >= 4)
{
    $invalid = 1;
}
else if (isset($invalid))
{
    unset($invalid);
}
if (!isset($_COOKIE['attempts']))
{
    setcookie('attempts', 0, time() + (86400 * 30) , "/");
}
?>

<!DOCTYPE html>
<html lang="en" class="<?=(isset($_COOKIE['dark']) ? '_darkTheme' : '')?>">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="shortcut icon" href="https://i.ibb.co/HPtyvJS/logo-z3yoqm-modified-removebg-preview-modified.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="title" content="Login | Smartlist">
    <meta name="description" content="Sign into your Smartlist account and access your entire home at the tap of a button!">
    <meta property="og:type" content="website">
    <link rel="manifest" href="/dashboard/manifest.webmanifest">
    <meta property="og:url" content="https://metatags.io/">
    <meta name="viewport" content="width=device-width">
    <meta property="og:title" content="Login | Smartlist">
    <meta property="og:description" content="Sign into your Smartlist account and access your entire home at the tap of a button!">
    <meta property="og:image" content="https://i.ibb.co/1nW9xMJ/banner.png">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta name="theme-color" content="#fff">
    <meta property="twitter:title" content="Login | Smartlist">
    <meta property="twitter:description" content="Sign into your Smartlist account and access your entire home at the tap of a button!">
    <meta property="twitter:image" content="https://i.ibb.co/1nW9xMJ/banner.png">
    <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
          />
    <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css"
          />
    <link rel="stylesheet" href="https://smartlist.ga/dashboard/css/login.css">
    <style>
      :root {--navbar-color:#37474f}
      .card,.modal {box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)!important;}
      .card {border-radius: 28px;}
      .modal {
        position: fixed;
        top: 50% !important;
        left: 50% !important;
        width: 100%;
        max-width: 500px;
        border-radius: 28px !important;
        min-height: 90vh;
        margin: 0 !important;
        transform: translate(-50%, -50%) scale(1) !important;
      }
      @media (prefers-color-scheme: dark) {
        :root {--navbar-color:#fff!important}
        .progress {background:rgba(255,255,255,.2)!important} ._darkTheme .indeterminate{background:#fff!important}
        .modal { background: #212121 !important; }
      }
    </style>
  </head>
  <body class="class="<?=(isset($_COOKIE['dark']) ? '_darkTheme' : '')?>">
    <div id="app">
      <div class="card z-depth-3">
        <div class="progress hide" id="progress"> <div class="indeterminate"></div> </div>
        <div class="card-content">
          <?php if (!isset($invalid) || $invalidAPP === true)
{ ?>
          <form action="" id="_root" autocomplete="off" onsubmit="handleSubmit(); return false;">
            <div class="center">
              <?php if (!$app)
    { ?>
              <?php if (!isset($_GET['logout']) && !isset($_GET['new']) && !isset($_GET['confirmed']))
        { ?>
              <img
                   src="https://i.ibb.co/HPtyvJS/logo-z3yoqm-modified-removebg-preview-modified.png"
                   width="70px"
                   style="margin-top: 10px;margin-bottom: 10px;"
                   alt="Logo"
                   />
              <?php
        } ?>
              <?php
    } ?>
              <?php if (!isset($_GET['logout']) && !isset($_GET['new']) && !isset($_GET['confirmed']))
    { ?>
              <h5><b><?=($app ? "Sign into " . $name : "Sign in") ?></b></h5>
              <p><?=($app ? "With your Smartlist account" : "Using your Smartlist account") ?></p>
              <?php
    } ?>
            </div>
            <?php if (isset($_GET['logout']))
    { ?>
            <div id="p_logout" class="page">
              <h5>Signed out!</h5><p>You are now signed out of Smartlist and it's related apps</p>
              <a href="/dashboard/auth" style="margin-top: 15px;" class="btn btn-round btn-flat waves-effect waves-light red darken-3 white-text">Sign back in</a>
            </div>
            <?php
    } ?>
            <?php if (isset($_GET['confirmed']))
    { ?>
            <div id="p_confirmed" class="page">
            <img src="https://cdn.dribbble.com/users/1088756/screenshots/9325233/media/2622b00ad677440df16b8301f9ca6b6b.png?compress=1&resize=1200x900" style="width: 50%;margin:auto;display:block;border-radius: 4px;"><br>
              <h5>Confirmed location!</h5><p>This helps us make sure that only you can access your account, and people from random locations don't have access. You may now go back to the desktop, mobile, or web app, and sign back in</p>
            </div>
            <?php
    } ?>
            <?php if (isset($_GET['new']))
    { ?>
            <div id="p_new" class="page">
              <h5>Account created! 🥳</h5><p>You may now <a href="https://smartlist.ga/login">sign into your account</a></p>
            </div>
            <?php
    } ?>
            <div id="p1" class="page">
              <?php if (isset($_SESSION['valid']))
    { ?>
              <ul class="collection" style="border:0;background:transparent!important">
                <li class="collection-item avatar waves-effect" style="overflow:hidden!important;width:100%" onclick="currentPage=1;$('form').submit()">
                  <img src="<?=$_SESSION['avatar']; ?>" alt="" class="circle">
                  <span class="title"><?=$_SESSION['name']; ?></span>
                  <p><?=$_SESSION['email']; ?>
                  </p>
                  <a href="#!" class="secondary-content" style="margin-bottom:-10px!important;">Signed in</a>
                </li>
              </ul>
              <?php
    } ?>
              <?php if ($app == true)
    { ?><input name="app" type="hidden" value="<?=$_GET['appId'] ?>"><?php
    }
    if ($app == true && !isset($_SESSION['valid']))
    { ?>
              <div
                   class="input-field input-border"
                   onclick="this.querySelector('input').focus()"
                   >
                <input type="text" id="i1" name="username"/>
                <label for="i1">Username or email</label>
              </div>
              <p>Don't have an account? <a href="https://smartlist.ga/signup">Sign Up!</a></p>
              <?php
    }
    if ($app == false && !isset($_SESSION['valid']))
    { ?>
              <div
                   class="input-field input-border"
                   onclick="this.querySelector('input').focus()"
                   >
                <input type="text" id="i1" name="username"/>
                <label for="i1">Username or email</label>
              </div>
              <p>Don't have an account? <a href="https://smartlist.ga/signup">Sign Up!</a></p>
              <?php
    } ?>
            </div>
            <div id="p2" class="page">
              <div
                   class="input-field input-border"
                   onclick="this.querySelector('input').focus()"
                   >
                <input type="password" id="i1" name="password"/>
                <label for="i1">Password</label>
              </div>
              <a class="align-right modal-trigger" href="#forgotPassword">Forgot Password?</a>
            </div>

            <div style="text-align: right">
              <?php if (!isset($_GET['logout']) && !isset($_GET['new']) && !isset($_GET['confirmed']))
    { ?>

              <?php
        if ($app == true && !isset($_SESSION['valid']))
        { ?>
              <button
                      class="btn-round btn blue-grey darken-3 waves-light waves-effect"
                      >
                Next <i class="material-icons right">arrow_forward_ios</i>
              </button>
              <?php
        }
        if ($app == false && !isset($_SESSION['valid']))
        { ?>
              <button
                      class="btn-round btn blue-grey darken-3 waves-light waves-effect"
                      >
                Next <i class="material-icons right">arrow_forward_ios</i>
              </button><?php
        } ?>
              <?php
    } ?>

            </div>
          </form>
          <?php
}
else if ($invalid)
{ ?>
          <h5>Too many attempts</h5>
          <p>Your account is locked. Please try again later</p>
          <br>
          <?php
}
if (isset($invalidAPP))
{ ?>
          <h5>Invalid oAuth URL</h5>
          <p>Please refer to the developer documentation on how to create an oauth url.</p>
          <br>
          <?php
}
if ($app)
{ ?><br><p><i>After signing in, your name, email, and profile picture will be shared with "<?=htmlspecialchars($name); ?>". Make sure to trust this service before signing in</i></p><?php
} ?>
        </div>
      </div>
    </div>
    <div id="forgotPassword" class="modal modal-fixed-footer">
      <form action="/dashboard/login/send-forgot-password.php" id="fp" method="POST">
      <div class="modal-content">
      <br>
        <h5>Forgot your password?</h5>
        <p>Please type it here to reset your password</p>
        <br>
          <div class="input-field input-border">
            <input type="email" name="email">
            <label>Email</label>
          </div>
      </div>
      <div class="modal-footer right-aligned transparent">
        <a class="modal-close btn waves-effect waves-light btn-round" style="background: rgba(200, 200, 200, .1)!important">Cancel</a>
        <button class="btn blue-grey darken-5 waves-effect waves-light btn-round">Send</button>
      </div>
      </form>
    </div>

    <div id="forgotPasswordCode" class="modal modal-fixed-footer">
      <form action="/dashboard/login/verify-password.php" id="fp1" method="POST">
      <div class="modal-content">
      <br>
        <h5>We emailed you a code.</h5>
        <p>Please type it here to reset your password</p>
        <br>
          <div class="input-field input-border">
            <input type="number" name="code">
            <label>Code</label>
          </div>
      </div>
      <div class="modal-footer right-aligned transparent">
        <button class="btn blue-grey darken-3 waves-effect waves-light btn-round">Verify</button>
      </div>
      </form>
    </div>

    <div id="resetPassword" class="modal modal-fixed-footer">
      <form action="/dashboard/login/change-password.php" id="fp2" method="POST">
      <div class="modal-content">
      <br>
        <h5>Reset your password</h5>
        <p>Your password should contain at least 8 characters, numbers, digits, and at least one special character</p>
        <br>
          <div class="input-field input-border">
            <input type="text" name="password" id="passwordCheck">
            <label>New password</label>
          </div>
      </div>
      <div class="modal-footer right-aligned transparent">
        <button class="btn blue-grey darken-3 waves-effect waves-light btn-round" id="passwordButton">Save</button>
      </div>
      </form>
    </div>


    <script src="https://essentials.manuthecoder.ml/essentials.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script src="https://smartlist.ga/dashboard/js/login.js"></script>
    <?php if (isset($_GET['logout']))
{ ?>
    <script>page('#p_logout')</script>
    <?php
} ?>
      <?php if (isset($_GET['new']))
{ ?>
    <script>page('#p_new')</script>
    <?php
} ?>
    <?php if (isset($_GET['confirmed']))
{ ?>
    <script>page('#p_confirmed')</script>
    <?php
} ?>
<?php if($app == false && !isset($_GET['new']) && !isset($_GET['confirmed']) && !isset($_GET['logout'])) {?>
<script>document.getElementById('i1').addEventListener("keyup", function() {localStorage.setItem("i1", document.getElementById('i1').value)});window.addEventListener("load", function() {document.getElementById('i1').value=localStorage.getItem("i1")});</script>
<?php } ?>
<script>
M.Modal.init(document.querySelectorAll(".modal"), {
  dismissible: false
});
if ('serviceWorker' in navigator) { navigator.serviceWorker.register('/dashboard/sw.js'); }

$("#fp").submit(function(e) {
// alert("step1")
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data) {
             if(!data.includes("Invalid email")) {
              M.Modal.getInstance(document.getElementById("forgotPassword")).close();
              M.Modal.getInstance(document.getElementById("forgotPasswordCode")).open();
              // M.toast({html:data})
             }
             else {
              M.toast({text:data});
             }
           }
         });

    
});

$("#fp1").submit(function(e) {
// alert("step1")
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data) {
             if(data == 'true'){
              M.Modal.getInstance(document.getElementById("forgotPasswordCode")).close();
              M.Modal.getInstance(document.getElementById("resetPassword")).open();  
             }
             else {
               M.toast({text: "Invalid code!"})
             }
              //  alert(data); // show response from the php script.
           }
         });
});

$("#fp2").submit(function(e) {
// alert("step1")
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data) {
              if(data === "Success") M.Modal.getInstance(document.getElementById("resetPassword")).close();
              M.toast({html: data})
           }
         });
});
</script>
  </body>
</html>