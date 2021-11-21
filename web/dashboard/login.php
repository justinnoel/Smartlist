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
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="shortcut icon" href="https://i.ibb.co/HPtyvJS/logo-z3yoqm-modified-removebg-preview-modified.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="title" content="Login | Smartlist">
    <meta name="description" content="Log in to your Smartlist account and access your entire home at the tap of a button!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta name="viewport" content="width=device-width">
    <meta property="og:title" content="Login | Smartlist">
    <meta property="og:description" content="Log in to your Smartlist account and access your entire home at the tap of a button!">
    <meta property="og:image" content="https://i.ibb.co/2kSY71Q/Screenshot-2021-04-08-1-57-23-PM.png">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta name="theme-color" content="#fff">
    <meta property="twitter:title" content="Login | Smartlist">
    <meta property="twitter:description" content="Log in to your Smartlist account and access your entire home at the tap of a button!">
    <meta property="twitter:image" content="https://i.ibb.co/2kSY71Q/Screenshot-2021-04-08-1-57-23-PM.png">
    <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
          />
    <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css"
          />
    <link rel="stylesheet" href="https://smartlist.ga/dashboard/css/login.css">
  </head>
  <body>
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
                   width="50px"
                   alt="Logo"
                   />
              <?php
        } ?>
              <?php
    } ?>
              <?php if (!isset($_GET['logout']) && !isset($_GET['new']) && !isset($_GET['confirmed']))
    { ?>
              <h5><b><?=($app ? "Sign into " . $name : "Login") ?></b></h5>
              <p><?=($app ? "With your Smartlist account" : "Access your home's inventory, finances, and more!") ?></p>
              <?php
    } ?>
            </div>
            <?php if (isset($_GET['logout']))
    { ?>
            <div id="p_logout" class="page">
              <h5>Logged out!</h5><p>You are now logged out of Smartlist and it's related apps</p>
              <a href="/dashboard/auth" style="margin-top: 15px;" class="btn btn-round btn-flat waves-effect waves-light red darken-3 white-text">Log back in</a>
            </div>
            <?php
    } ?>
            <?php if (isset($_GET['confirmed']))
    { ?>
            <div id="p_confirmed" class="page">
            <img src="https://cdn.dribbble.com/users/1088756/screenshots/9325233/media/2622b00ad677440df16b8301f9ca6b6b.png?compress=1&resize=1200x900" style="width: 50%;margin:auto;display:block;border-radius: 4px;"><br>
              <h5>Confirmed login!</h5><p>This helps us make sure that only you can access your account, and people from random locations don't have access. You may now go back to the desktop, mobile, or web app, and log back in</p>
            </div>
            <?php
    } ?>
            <?php if (isset($_GET['new']))
    { ?>
            <div id="p_new" class="page">
              <h5>Account created! 🥳</h5><p>You may now <a href="https://smartlist.ga/login">log into your account</a></p>
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
                  <a href="#!" class="secondary-content" style="margin-bottom:-10px!important;">Logged in</a>
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
          <p>Your account is locked. Please try again after a day or two.</p>
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
{ ?><br><br><p><i>You are sharing your name, email, and profile picture with "<?=htmlspecialchars($name); ?>". Make sure you trust this website before using your Smartlist account.</i></p><?php
} ?>
        </div>
      </div>
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
  </body>
</html>