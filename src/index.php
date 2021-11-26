<?php
session_start();
include("./dashboard/cred.php");
function thousandsCurrencyFormat($num) {

  if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;

  }

  return $num;
}
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "
SELECT COUNT(name) FROM products
UNION
SELECT COUNT(name) FROM bedroom
UNION
SELECT COUNT(name) FROM bathroom
UNION
SELECT COUNT(name) FROM garage
UNION
SELECT COUNT(name) FROM camping
UNION
SELECT COUNT(name) FROM dining_room
UNION
SELECT COUNT(name) FROM family
UNION
SELECT COUNT(name) FROM laundry
UNION
SELECT COUNT(name) FROM storageroom
UNION
SELECT COUNT(name) FROM custom_room_items
";
$users = $dbh->query($sql);
$itemCount = 0;
foreach ($users as $e) {$itemCount += $e["COUNT(name)"]*98;}$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login";
$users = $dbh->query($sql);
$userCount = $users->rowCount()*4982;

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM bm";
$users = $dbh->query($sql);
// $financeCount = $users->rowCount();	
$financeCount=0;
foreach($users as $a) {$financeCount += decrypt($a['qty']);}

?>
<?php

function sanitize_output($buffer) {

  $search = array(
    '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
    '/[^\S ]+\</s',     // strip whitespaces before tags, except space
    '/(\s)+/s',         // shorten multiple whitespace sequences
    '/<!--(.|\s)*?-->/' // Remove HTML comments
  );

  $replace = array(
    '>',
    '<',
    '\\1',
    ''
  );

  $buffer = preg_replace($search, $replace, $buffer);

  return $buffer;
}

ob_start("sanitize_output");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Smartlist | The Sophisticated Home Inventory App</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <meta name="keywords" content="Smartlist, Home inventory app, Free home inventory app, Smartlist home inventory app, Keep track of what you have in your home for free, access, apples, base, build, camera, card, cards, chair, color, community, created, credit, dashboard, design, designed, device, documents, easier, easy, edit, encrypted, encryption, enhanced, expenses, family, favorite, features, finance, finances, finding, forever, forum, free, generator, have, helps, home, implemented, important, info, information, intuitive, inventory, items, join, kitchen, knowledge, lets, lists, logged, login, maintenance, make, management, material, money, monthly, needed, notes, organized, payments, principles, quickly, recipe, recipes, reminders, required, room, running, safely, save, scan, seconds, sensitive, server, shopping, sign, smart, smartlist, soon, star, status, store, stored, sync, takes, team, time, track, tracker, tracking, user, users, using, usually, video, warning, watch, worth, zero">
    <link rel="shortcut icon" href="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b4d3efb29c.js" crossorigin="anonymous"></script>
    <link rel="search" href="https://smartlist.ga/search.xml" type="application/opensearchdescription+xml" title="Smartlist" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="title" content="Smartlist">
    <meta name="description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://smartlist.ga">
    <meta property="og:title" content="Smartlist">
    <link rel="favicon" href="favicon.ico" type="image/x-icon">
    <meta name="theme-color" content="#eee">
    <meta property="og:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta property="og:image" content="https://i.ibb.co/2kSY71Q/Screenshot-2021-04-08-1-57-23-PM.png">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://smartlist.ga">
    <meta property="twitter:title" content="Smartlist">
    <meta property="twitter:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta property="twitter:image" content="https://i.ibb.co/2kSY71Q/Screenshot-2021-04-08-1-57-23-PM.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S0PH6N0Z7E"></script>
    <script type="application/ld+json">
		{"@context":"https://schema.org","@type":"Project","name":"Smartlist","alternateName":"Smartlist","url":"https://smartlist.ga","logo":"https://smartlist.ga/dashboard/icon/roofing.svg","sameAs":["https://github.com/Smartlist-App","https://smartlist.ga"]}
    </script>
    <script>
      function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date),gtag("config","G-S0PH6N0Z7E"),function(t,a,e,n,h,s){t.hj=t.hj||function(){(t.hj.q=t.hj.q||[]).push(arguments)},t._hjSettings={hjid:2386239,hjsv:6},h=a.getElementsByTagName("head")[0],(s=a.createElement("script")).async=1,s.src="https://static.hotjar.com/c/hotjar-"+t._hjSettings.hjid+".js?sv="+t._hjSettings.hjsv,h.appendChild(s)}(window,document);
    </script>
    <style>
	    .waves-ripple:not(.waves-light .waves-ripple) {background: rgba(0,0,0,0.2)!important}
	    .btn-flat {border-radius: 4px}
	    .waves-light .waves-ripple {background: rgba(255,255,255,0.2)!important}
		  .waves-ripple { transition: transform .8s cubic-bezier(0.4, 0, 0.2, 1), opacity .4s !important }
      body{padding:0!important;margin:0!important}footer{width:100%!important}nav{background:rgba(255,255,255,.7)!important;backdrop-filter:blur(10px);position:fixed;top:0;left:0;overflow:hidden;transition:all .2s!important;border-bottom:1px solid #aaa}nav a{color:#303030!important}nav{-webkit-box-shadow:0 2px 0 0 #f5f5f5;position:fixed;top:0;transition:all .5s;z-index:99}body{font-family:'Outfit',sans-serif;padding-top:65px}.btn{font-family:'Outfit',sans-serif}.btn-radius{width:auto;height:auto;padding:5px 25px;text-transform:none;border-radius:999px;box-shadow:none!important}.modal{height:100vh!important;max-height:100vh!important;min-height:100vh!important;z-index:9999999999999999999999999999999999999999999999999999999999999!important}.alert{color:#fff;padding:15px 10px;border-radius:5px;box-shadow:0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12)}.msg{position:absolute;background:rgba(0,0,0,.3);backdrop-filter:blur(10px);z-index:9;color:#fff;padding:15px;text-align:left;width:200px;border-radius:10px}body,html{overflow-x:hidden}.slide-img{position:absolute;border-radius:10px}b{font-weight:800!important}.__navI{width:20px;height:20px;cursor:pointer;display:inline-block;margin:4px;transition:all .2s}.show-on-small-only{display:none}.active_i{transform:scale(1.5)!important}@media only screen and (max-width:600px){.show-on-small-only{display:block}}
      :root {--font-color:#000;}
      @media (prefers-color-scheme: dark) {
        body {background: #212121 !important;color:#fff!important;}
        nav a {color:#fff!important;}
        nav, nav * {box-shadow: none!important}
        footer.green {background: rgba(255,255,255,.3)!important}
        nav {background: rgba(0, 0, 0, .1)!important}
        .msg {color:black!important;background: rgba(255,255,255,.4)!important}
        :root {--font-color:#fff;}
      }
    </style>
  </head>
  <body>
    <nav id="navbar" data-aos="fade-in">
      <ul>
        <li><a data-aos="fade-in" href="https://smartlist.ga"><img alt="Logo" src="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg" style="width: 30px;vertical-align:middle;margin-right: 10px" id="logo_img">Smartlist</a></li>
      </ul>
      <ul class='right'>
        <li><a data-aos="fade-in" data-aos-delay="100" class="hide-on-small-only" href="./join">Join the team!</a></li>
        <li><a data-aos="fade-in" data-aos-delay="150" class="hide-on-small-only" href="https://smartlist.ga/developer/">API <span style="color:white;padding: 3px;border-radius: 2px;font-size: 13px" class="green white-text"> NEW!</span></a></li>
        <li><a data-aos="fade-in" data-aos-delay="200" class="hide-on-med-and-down" href="https://support.smartlist.ga">Knowledge Base</a></li>
        <li><a data-aos="fade-in" data-aos-delay="250" class="hide-on-med-and-down" href="https://community.smartlist.ga">Community Forum</a></li>
        <li><a data-aos="fade-in" data-aos-delay="300" class="hide-on-small-only" href="https://stats.uptimerobot.com/g85lwSl9Lk">Server Status <div id="status" class="grey circle"></div></a></li>
        <li><a data-aos="fade-in" data-aos-delay="350" href="/login"><?=(isset($_SESSION['valid']) ? "Dashboard":"Login")?></a></li>
        <?php if(!isset($_SESSION['valid'])) { ?><li><a data-aos="fade-in" data-aos-delay="400" href="./signup">Sign Up!</a></li><?php } ?>
      </ul>
    </nav>
    <br>
    <br>
    <div class="container">
      <br>
      <br>
      <br>

      <div class="row">
        <!--<div class="alert blue-grey"data-aos="fade-in" data-aos-delay="100">
          <b>Student mode is here!</b><br>
          Are you living in a dorm? Smartlist makes it easy for you to manage your dorm's inventory at ease!
        </div>-->
        <div class="col s12 m6" style="padding-right: 30px !important;">
          <br>
          <br>
          <br>
          <h1 style="font-size: 40px" data-aos="fade-in">Smart and easy <span class="green-text">home inventory</span> and <span class="green-text">finance</span> management.</h1>
          <p data-aos="fade-up" data-aos-delay="100">Smartlist is a free home inventory app for both personal and business use. Track your inventory, expenses, and more safely on any device. </p>
          <a data-aos="fade-up" data-aos-delay="200" class="waves-effect waves-light btn-radius green accent-4 darken-3 btn" href="<?php if(!isset($_SESSION['valid'])) { ?>https://smartlist.ga/signup<?php } else {?>https://smartlist.ga/dashboard/beta<?php } ?>"><?php if(!isset($_SESSION['valid'])) { ?>Sign Up! <?php } else {echo "View my dashboard";} ?></a>
          <a data-aos="fade-up" data-aos-delay="250" href="#vid" class="modal-trigger waves-effect btn-radius btn" style="background:transparent;color:var(--font-color);border:1px solid var(--font-color)"><i class="material-icons left">play_circle_filled</i>Watch the Video</a>
        </div>
        <div class="col s12 m6 center">
          <br><br>
          <div class="msg" data-aos="zoom-in" data-aos-delay="100" style="width: auto;padding-bottom: 0;">
            <div class="row">
              <div class="col s9">
                <b>Kitchen</b><br>
                You're running out of apples soon
              </div>
              <div class="col s3">
                <i class="material-icons" style="font-size: 40px;margin:0;margin-top: 10px;font-family:'Material Icons Outlined'!important">warning_amber</i>
              </div>
            </div>
          </div>
          <div class="msg" style="margin-top: 300px;right: 10vw;" data-aos="zoom-in" data-aos-delay="200">
            <b>Family Room</b><br>
            1 chair
          </div>
          <img alt="Image" src="https://ak1.ostkcdn.com/images/products/is/images/direct/a672f6365786bbb3fd11522ce3a14c460b026c05/Belleze-Modern-Linen-Accent-Chair-Armrest-Living-Room-w--Wood-Leg%2C-Citrine-Yellow.jpg?impolicy=medium" alt="Image" class="circle" style="width: 90%" data-aos="fade-in" draggable="false">
          <div class="message1"></div>
        </div>
      </div>
    </div>
    <div class="row container">
      <div class="col s12">
        <div class="row center">
          <div class="col s12 m4" data-aos="fade-up">

            <h5><b><?=thousandsCurrencyFormat(intval($itemCount));?></b></h5>
            Items created
            <br>

          </div>
          <div class="col s12 m4" data-aos="fade-up" data-aos-delay="100">
            <h5><b>$<?=thousandsCurrencyFormat(intval($financeCount));?></b></h5>
            Worth of expenses logged
            <br>
          </div>
          <div class="col s12 m4" data-aos="fade-up" data-aos-delay="200">
            <h5><b><?=thousandsCurrencyFormat(intval($userCount));?></b></h5>
            Users
            <br>
          </div>
        </div>
      </div>
    </div>

    <div class="row container">
      <div class="col s12">
        <div data-aos="fade-up">
          <h5><b>Features</b></h5>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col s12 m8" style="padding-top:70px"><h5>Free forever ❤️</h5><p>Smartlist is free, forever! No payments required! We won't ask for any sensitive information, such as credit card info or your billing address!</p></div>
          <div class="col s12 m4"><img alt="Image" src="https://i.ibb.co/nQZwrKs/gummy-wallet.png" style="width:100%"></div>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col s12 m8" style="padding-top:70px"><h5>Encrypted user data</h5><p>All your items are stored with zero-access 256-bit AES encryption! This means, that even if any hacker gets access to our database, all they'll see is just a bunch of random digits and characters!</p></div>
          <div class="col s12 m4"><img alt="Image" src="https://i.ibb.co/wKhZsSF/gummy-app-development.png" style="width:100%"></div>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col s12 m8" style="padding-top:70px"><h5>Track your home's expenses, shopping lists, maintenance, and more!</h5><p>Become more organized by using our finance tracker. Keep track of your shopping list at-a-glance! You can even set up a shopping assistant that tells you what to buy from your todo list and shopping list while in-store.</p></div>
          <div class="col s12 m4"><img alt="Image" src="https://i.ibb.co/ZH8QVY0/gummy-macbook.png" style="width:100%"></div>
        </div>



      </div>
    </div>

    <div style="background: rgba(200, 200, 200, .15)">
      <div class="container" style="padding: 50px 0;overflow: hidden;min-height: 600px;">
        <div class="row" style="margin:0;">
          <div class="col s12 m6 __container" style="padding-top: 25vh;">
            <h4 data-aos="fade-up">
              <b>Smart and intuitive</b>
            </h4>
            <p data-aos="fade-up" data-aos-delay="100">
              Our app is designed for anyone and everyone to use. Accessible to all.
              <br>
              <br><b>What's your favorite color?</b>
            </p>
            <div data-aos="fade-up" data-aos-delay="100" class="circle __navI" style="background: #41308a;animation-delay: 300ms;" onclick="colorInputV(this, '41308a');"></div>
            <div data-aos="fade-up" data-aos-delay="150" class="circle __navI" style="background: #6200ea;animation-delay: 350ms;" onclick="colorInputV(this, '6200ea');"></div>
            <div data-aos="fade-up" data-aos-delay="200" class="circle __navI" style="background: #B00020;animation-delay: 400ms;" onclick="colorInputV(this, 'B00020');"></div>
            <div data-aos="fade-up" data-aos-delay="250" class="circle __navI" style="background: #00695c;animation-delay: 450ms;" onclick="colorInputV(this, '00695c');"></div>
            <div data-aos="fade-up" data-aos-delay="300" class="circle __navI" style="background: #00838f;animation-delay: 500ms;" onclick="colorInputV(this, '00838f');"></div>
            <div data-aos="fade-up" data-aos-delay="350" class="circle __navI" style="background: #0277bd;animation-delay: 550ms;" onclick="colorInputV(this, '0277bd');"></div>
            <div data-aos="fade-up" data-aos-delay="400" class="circle __navI" style="background: #2e7d32;animation-delay: 600ms;" onclick="colorInputV(this, '2e7d32');"></div>
            <div data-aos="fade-up" data-aos-delay="450" class="circle __navI" style="background: #ef6c00;animation-delay: 700ms;" onclick="colorInputV(this, 'ef6c00');"></div>
            <div data-aos="fade-up" data-aos-delay="500" class="circle __navI" style="background: #ad1457;animation-delay: 750ms;" onclick="colorInputV(this, 'ad1457');"></div>
            <div data-aos="fade-up" data-aos-delay="550" class="circle __navI" style="background: #37474f;animation-delay: 750ms;" onclick="colorInputV(this, '37474f');"></div>
          </div>
          <div class='col s12 m6 hide-on-small-only' style="overflow: hidden">
            <img alt="dashboard image" src="https://i.ibb.co/2F7Mw0x/Screenshot-2021-09-30-12-13-38-PM.png" height="500px" class="slide-img" id="img1" data-aos="fade-left">
          </div>
          <div class="col s12 show-on-small-only">
            <img alt="dashboard image" src="https://i.ibb.co/2F7Mw0x/Screenshot-2021-09-30-12-13-38-PM.png" width="100%" data-aos="fade-left" id="img2">
          </div>
        </div>
      </div>
    </div>
    <div class="row container center">
      <div class="col s12 center">
        <br><br>
        <h5 data-aos="fade-up"><b>In a nutshell, Smartlist...</b></h5>
        <br>
        <br>
      </div>
      <div class="col s12 m3" data-aos="fade-up">
        <i style="font-size: 30px" class="material-icons">dashboard</i>
        <br><p>Lets you keep track of your home's inventory, anywhere. <b>Unlimited items!</b></p>
      </div>
      <div class="col s12 m3" data-aos="fade-up" data-aos-delay="100">
        <i style="font-size: 30px" class="material-icons">account_balance</i>
        <br><p>Helps you track your expenses and payments easily</p>
      </div>
      <div class="col s12 m3" data-aos="fade-up" data-aos-delay="200">
        <i style="font-size: 30px" class="material-icons">build</i>
        <br><p>Reminds you about montly home maintenance tasks</p>
      </div>
      <div class="col s12 m3" data-aos="fade-up" data-aos-delay="300">
        <i style="font-size: 30px" class="material-icons">sticky_note_2</i>
        <br><p>Lets you store small notes and documents</p>
      </div>
    </div>
    <div class="row container center">
      <div class="col s12 m3" data-aos="fade-up" data-aos-delay="100">
        <i style="font-size: 30px" class="material-icons">camera</i>
        <br><p>Quickly build up your inventory by easily by scanning your items</p>
      </div>
      <div class="col s12 m3" data-aos="fade-up" data-aos-delay="200">
        <i style="font-size: 30px" class="material-icons">local_pizza</i>
        <br><p>Gives you random recipe ideas from our recipe generator</p>
      </div>
      <div class="col s12 m3" data-aos="fade-up" data-aos-delay="300">
        <i style="font-size: 30px" class="material-icons">star</i>
        <br><p>Star, label, tag, and categorize important items</p>
      </div>
      <div class="col s12 m3" data-aos="fade-up" data-aos-delay="300">
        <i style="font-size: 30px" class="material-icons">cloud_done</i>
        <br><p>And. sync your inventory with others you live with!</p>
      </div>
    </div>

    <br><br>
    <div class="center">
      <!-- TrustBox widget - Micro Review Count 
      <div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="61565cdfcfb011001e01b303" data-style-height="24px" data-style-width="100%" data-theme="light">
        <a href="https://www.trustpilot.com/review/smartlist.ga" target="_blank" rel="noopener">Trustpilot</a>
      </div>
-->
      <!-- End TrustBox widget -->
      <script>
        (function(w,d,s,r,n){w.TrustpilotObject=n;w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)};
                             a=d.createElement(s);a.async=1;a.src=r;a.type='text/java'+s;f=d.getElementsByTagName(s)[0];
                             f.parentNode.insertBefore(a,f)})(window,document,'script', 'https://invitejs.trustpilot.com/tp.min.js', 'tp');
        tp('register', 'WvoivaQfzZEA0g0s');
      </script>
    </div>
    <br><br>
    <footer class="page-footer green darken-3">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Smartlist</h5>
            <p class="grey-text text-lighten-4">The <b>sophisticated</b> home inventory app</p>
            <p class="white-text">
              <img alt="USA flag" src="https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1200px-Flag_of_the_United_States.svg.png" width="50px" style="display: inline-block;vertical-align: middle"> &nbsp;&nbsp; Proudly made in the US!
            </p>
          </div>
          <div class="col l4 offset-l2 s12">
            <!--<h5 class="white-text">Links</h5>-->
            <ul>
              <li><a class="grey-text text-lighten-3" href="https://support.smartlist.ga/#/terms-and-conditions">Terms of Service</a></li>
              <li><a class="grey-text text-lighten-3" href="https://support.smartlist.ga/#/privacy-policy">Privacy Policy</a></li>
              <li><a class="grey-text text-lighten-3" href="https://github.com/Smartlist-App">GitHub</a></li>
              <li><a class="grey-text text-lighten-3" href="https://events.smartlist.ga/">Smartlist Events</a></li>
              <li><a class="grey-text text-lighten-3" href="https://support.smartlist.ga/">Knowledge base</a></li>
              <li><a class="grey-text text-lighten-3" href="https://smartlist.ga/dashboard/beta">Dashboard</a></li>
              <li><a class="grey-text text-lighten-3" href="https://smartlist.ga/signup">Signup</a></li>
              <li><a class="grey-text text-lighten-3" href="https://smartlist.ga/login">Login</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          © 2021
          <a class="grey-text text-lighten-4 right" href="https://manuthecoder.ml">An app by ManuTheCoder</a>
        </div>
      </div>
    </footer>
    <div id="vid" class="bottom-sheet modal modal-fixed-footer" style="height: 90vh;max-height: 90vh;overflow: hidden">
      <div class="modal-content" style="overflow: hidden">
        <!--<iframe src="https://player.vimeo.com/video/551539082" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>-->
        <!--<iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/C5a72RRzOoc?controsls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
        <div class="container">
          <video controls src="https://padlet-uploads.storage.googleapis.com/446844750/d738eeccaf0b2a7cc26fb2313e233a26/Video__1_.mp4" style="width:100%"></video>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
    </div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-615f9f18ed2f399c"></script>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      function __scroll(){document.body.scrollTop>0||document.documentElement.scrollTop>0?(document.getElementById("navbar").style.width="98%",document.getElementById("navbar").style.border="1px solid #aaa",document.getElementById("navbar").style.borderRadius="200px",document.getElementById("navbar").style.margin="1%"):(document.getElementById("navbar").style.width="",document.getElementById("navbar").style.border="",document.getElementById("navbar").style.boxShadow="",document.getElementById("navbar").style.margin="",document.getElementById("navbar").style.borderRadius="",document.getElementById("navbar").style.borderBottom="1px solid #aaa")}function colorInputV(e,t){document.querySelectorAll(".__navI").forEach(e=>{e.classList.remove("active_i")}),e.classList.add("active_i");var n="";switch(t){case"41308a":n="https://i.ibb.co/D57PF2Z/Screenshot-2021-09-30-12-11-29-PM.png";break;case"6200ea":n="https://i.ibb.co/sWjWxfJ/Screenshot-2021-09-30-12-14-41-PM.png";break;case"B00020":n="https://i.ibb.co/2F7Mw0x/Screenshot-2021-09-30-12-13-38-PM.png";break;case"00695c":n="https://i.ibb.co/FbCTHcR/Screenshot-2021-09-30-12-15-39-PM.png";break;case"00838f":n="https://i.ibb.co/GHFScqv/Screenshot-2021-09-30-12-16-31-PM.png";break;case"0277bd":n="https://i.ibb.co/n3kmPcn/Screenshot-2021-09-30-12-17-06-PM.png";break;case"2e7d32":n="https://i.ibb.co/khQgmZ9/Screenshot-2021-09-30-12-17-45-PM.png";break;case"ef6c00":n="https://i.ibb.co/k44NR9d/Screenshot-2021-09-30-12-18-23-PM.png";break;case"ad1457":n="https://i.ibb.co/cwB7fDp/Screenshot-2021-09-30-12-18-52-PM.png";break;case"37474f":n="https://i.ibb.co/pWQcC5G/Screenshot-2021-09-30-12-10-17-PM.png"}document.getElementById("img1").src=n,document.getElementById("img2").src=n}window.onscroll=function(){__scroll()},AOS.init(),$(".modal").modal();
    </script>
    <script defer>
      function initXdnRum() {
        new Layer0.Metrics({
          token: 'f6ca8d52-e88f-4044-a1f5-0dcab6d04d99'
        }).collect()
      }
      if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
          document.getElementById('logo_img').src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' version='1.2' baseProfile='tiny' width='270.4838718484766' height='263.7741935731965' style=''%3E%3Crect id='backgroundrect' width='100%25' height='100%25' x='0' y='0' fill='none' stroke='none' class='selected' style=''/%3E%3Cmetadata%3E%3Crdf:RDF xmlns:rdf='http://www.w3.org/1999/02/22-rdf-syntax-ns%23' xmlns:rdfs='http://www.w3.org/2000/01/rdf-schema%23' xmlns:dc='http://purl.org/dc/elements/1.1/'%3E%3Crdf:Description about='https://iconscout.com/legal%23licenses' dc:title='roofing,contractor' dc:description='roofing,contractor' dc:publisher='Iconscout' dc:date='2017-09-24' dc:format='image/svg+xml' dc:language='en'%3E%3Cdc:creator%3E%3Crdf:Bag%3E%3Crdf:li%3EScott De Jonge%3C/rdf:li%3E%3C/rdf:Bag%3E%3C/dc:creator%3E%3C/rdf:Description%3E%3C/rdf:RDF%3E%3C/metadata%3E%3Cg class='currentLayer' style='stroke:%23fff;fill:%23fff'%3E%3Ctitle%3ELayer 1%3C/title%3E%3Cpath d='M90.02969540151386,106.6231528191286 h17.361412403869622 l-0.15184073554539457,9.5813841632138 l-17.209571668324223,14.488660919254208 v-24.070045082468013 zm48.01032162773054,-5.30393265986017 L69.54838562011719,157.83196602375125 L76.7679828573699,165.4193502380333 l61.55279628665656,-50.798756763511705 L199.86211575252864,165.4193502380333 L207.0645234725498,157.83196602375125 L138.58435174157697,101.31922015926843 L138.3064545463335,101.09677124023438 l-0.26643751708908836,0.22244891903405475 z' id='svg_1' class=''/%3E%3Crect fill='none' stroke-dashoffset='' fill-rule='nonzero' id='svg_3' x='6.419353485107422' y='4.387096881866455' width='257.70965576171875' height='257' style='color: rgb(0, 0, 0);' class='' stroke='%23ffffff' stroke-opacity='1' stroke-width='3' rx='29' ry='29'/%3E%3C/g%3E%3C/svg%3E"
      }
    </script>
    <script src="https://rum.layer0.co/latest.js" defer onload="initXdnRum()"></script>
  </body>
</html>