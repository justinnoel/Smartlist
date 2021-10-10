<?php 
session_set_cookie_params(0, '/', ".smartlist.ga",false, false);
session_start(); 
include('cred.php');
if(isset($_SESSION['valid']) && !isset($_GET['auth'])) {
  header("Location: https://smartlist.ga/dashboard/");
  exit;
}
$app = false;
if(isset($_GET['auth'])) {
  $dbname = "bcxkspna_smartlist_api";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM apps");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $d = $stmt->fetchAll();
  foreach($d as $r) {
    if(hash("sha512", $r['id']) == $_GET['appId']) {
      $app = true;
      $name = $r['appName'];
    }
  }
  $conn = null;
}
if(isset($_COOKIE['attempts']) && $_COOKIE['attempts'] >= 4) {$invalid = 1;} 
if(!isset($_COOKIE['attempts'])) {setcookie('attempts', 0, time() + (86400 * 30), "/");}
?>
<?php if(!isset($invalid)) {?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Login | Smartlist</title>
    <meta name="theme-color" content="#ddd">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="https://smartlist.ga/dashboard/icon/roofing.svg">
    <link rel="favicon" href="https://smartlist.ga/dashboard/icon/roofing.svg">
    <link rel="stylesheet" href="https://matthias-vogt.github.io/legitRipple.js/css/ripple.css">
    <meta name="title" content="Login | Smartlist">
    <meta name="description" content="Log in to your Smartlist account and access your entire home at the tap of a button!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="Login | Smartlist">
    <meta property="og:description" content="Log in to your Smartlist account and access your entire home at the tap of a button!">
    <meta property="og:image" content="https://i.ibb.co/2kSY71Q/Screenshot-2021-04-08-1-57-23-PM.png">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta name="theme-color" content="#fff">
    <meta property="twitter:title" content="Login | Smartlist">
    <meta property="twitter:description" content="Log in to your Smartlist account and access your entire home at the tap of a button!">
    <meta property="twitter:image" content="https://i.ibb.co/2kSY71Q/Screenshot-2021-04-08-1-57-23-PM.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
    <!-- Hotjar Tracking Code for smartlist.ga -->
    <script>
      (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2386239,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
      })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <style>
      * {
        box-sizing: border-box !important;
      }
      body, html {
        margin: 0;
        padding: 0;
        overflow: hidden;
      }
      .row {
        height: 100vh;
      }
      .col {
        height: 100%;
      }
      .input-field {
        max-width: 100%;
        overflow: scroll 
      }
      input {
        border: 1px solid #aaa !important;
        border-radius: 3px !important;
        padding-left: 10px !important;
        width: 100%;
        display: block;
        max-width: 100%;
      }
      label {
        margin-left: 10px !important;
        background: white;
        transition: all .2s !important;
        padding: 0 4px;
        display: inline-block;
      }
      *:not(html,body) {overflow:visible !important}
      input:focus {
        border-color: #6727ab !important;
        /*box-shadow:  0px -1px 0px 0px rgba(103,39,171,1) inset !important;*/
        box-shadow: 0px 0px 0px 1px rgba(103,39,171,1) inset !important;
      }
      .input-field input:focus + label.active {
        color: #6727ab !important;
      }
      label.active {
        margin-left: 7px !important;
        margin-top: 8px !important
      }
      .waves-ripple {
        background: rgba(255, 255, 255, .4) !important
      }
      .darkTheme body {
        background: #212121;
        color: #fff;
      }
      .darkTheme .white {
        background: #212121 !important
      }
      .darkTheme input {
        color: white !important;
      }
      @keyframes fade-up
      {
        0% {
          transform: translateY(5px);
          opacity: 0
        }
        100% {
          transform: translateY(0);
          opacity: 1
        }
      }
      .fade-up {
        animation: fade-up .2s forwards;
        opacity: 0;
        transform: translateY(5px)
      }
      .darkTheme input:not(:focus) {
        border-color: #303030 !important
      }
      .darkTheme label {
        background: #212121 !important
      }
      .bg {
        background-size: 100vw;
        background-repeat: no-repeat !important;
      }
      .bar {
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        background: #1565c0;
        width: 0%;
        transition: all 20s;
      }
      * {
        -webkit-touch-callout:none;
        -webkit-text-size-adjust:none;
        -webkit-tap-highlight-color:rgba(0,0,0,0);
      }
      .waves-ripple {background: rgba(255, 255, 255, .6) !important;  transition: transform .8s cubic-bezier(0.4, 0, 0.2, 1), opacity .4s !important}
      .i1  {background-image: url("https://wallpaperaccess.com/full/31193.jpg");}
      .i2  {background-image: url("https://cdn.wallpapersafari.com/70/1/yGSYxk.jpg");}
      .i3  {background-image: url("https://thewallpaper.co/wp-content/uploads/2020/08/landscape-desktop-images-quality-beautiful-full-hd-free-smart-phone-background-nature-wallpaper-4k-1920x1080-1-1200x675.jpg");}
      .i4  {background-image: url("https://i.ibb.co/wJcrLJF/morning-yosemite-3840x2400.jpg");}
      .i5  {background-image: url("https://c4.wallpaperflare.com/wallpaper/384/818/513/himalayas-mountains-landscape-nature-wallpaper-preview.jpg");}
      .i6  {background-image: url("https://free4kwallpapers.com/uploads/originals/2019/05/18/awesome-himalayas-wallpaper.jpg");}
      .i7  {background-image: url("https://free4kwallpapers.com/uploads/originals/2019/05/20/hd-nature--wallpaper.jpg");}
      .i8  {background-image: url("https://3.bp.blogspot.com/-eilZTdgbWPA/XFUltCS4Z1I/AAAAAAAABz0/feDxTa3Emtsb3Wx4xxu0hWnFrohqtwQfwCKgBGAs/w2560-h1440-c/mountain-lake-scenery-nature-cottage-25-4K.jpg");}
      .i9  {background-image: url("https://wallpapers.com/images/high/4k-ultra-hd-nature-high-resolution-wallpaper-5n3jp9psonuimymd.jpg");}
      .i10 {background-image: url("https://www.pxwall.com/wp-content/uploads/2018/06/Wallpaper%20autumn,%20forest,%20mountain,%204k,%20Nature%20461537031.jpg");}
      .i11 {background-image: url("https://images.unsplash.com/photo-1606055854326-12a2fdcac6c0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80");}
      .darkTheme .i1  {background-image: url("https://www.androidguys.com/wp-content/uploads/2015/11/milky_way_sky-wide.jpg") !important}
      .darkTheme .i2  {background-image: url("https://wallpaperaccess.com/full/1685406.jpg") !important}
      /* https://images.unsplash.com/photo-1505322022379-7c3353ee6291?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bmlnaHR8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80 */
      .darkTheme .i3  {background-image: url("https://i.pinimg.com/originals/33/f3/bd/33f3bda341b51f505bb54f10b5e83b2f.jpg") !important}
      .darkTheme .i4  {background-image: url("https://images.hdqwalls.com/download/mountains-landscape-dark-nature-4k-i0-2880x1800.jpg") !important}
      .darkTheme .i5  {background-image: url("https://i.pinimg.com/originals/51/82/ac/5182ac536727d576c78a9320ac62de30.jpg") !important}
      .darkTheme .i6  {background-image: url("https://images.unsplash.com/photo-1528353518104-dbd48bee7bc4?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fG5pZ2h0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80") !important}
      .darkTheme .i7  {background-image: url("https://i.pinimg.com/originals/41/04/19/4104195a45059c28093f0f5ca7edfac5.jpg") !important}
      .darkTheme .i8  {background-image: url("https://cdn.wallpapersafari.com/30/71/gUeW2o.jpg") !important}
      .darkTheme .i9  {background-image: url("https://cdn.wallpapersafari.com/51/0/jwTGxo.jpg") !important}
      .darkTheme .i10 {background-image: url("https://wallpapercave.com/wp/wp2604216.jpg") !important}
      .darkTheme .i11 {background-image: url("https://www.pxwall.com/wp-content/uploads/2018/06/Wallpaper%20night,%20mountains,%20sky,%20stars,%204k,%20Nature%20564649069.jpg") !important}

      .logo {
        float: right;
        padding: 15px;
        padding-top: 30px;
      }
      .checkbox-orange[type="checkbox"].filled-in:checked + label:after{
        border: 2px solid #ff9800;
        background-color: #ff9800;
      }
      [type="checkbox"]:checked+span:not(.lever):before,[type="checkbox"]:checked:not(.filled-in)+span:not(.lever):after {
        border-right-color: #6727ab !Important;
        border-bottom-color: #6727ab !Important;
        border-radius: 1px;
      }
      html, 
      body {
        overflow-x: hidden !important;
      }
      .consadftainer {
        padding: 20px;
        padding-top: 20vh;
      }
      @media only screen and (max-width: 992px) {
        .consadftainer {
          padding-top: 15vh !important;
          padding: 20px;
          width: 100%;
          margin: 0;
          padding-right: 20px;
        }
        body,html {
          overflow-y: scroll;
        }
        .hello {
          display: none;
        }
        .logo {
          float: none;
        }
      }
      .hello:hover {
        animation: r 1s;
      }
      @keyframes r {
        50% {
          transform: rotate(-45deg)
        }
        100% {
          transform: rotate(0deg)
        }
      }
      .darkTheme .l_a, .darkTheme .l_a * {
        color: white !important;
        stroke: white;
      }
      .collection *:not(.waves-ripple) {background :transparent!important};
    </style>
  </head>
  <body>
    <div class="bar" id="bar"></div>
    <div class="row">
      <div class="col s12 m6 bg grey lighten-3 hide-on-small-only"></div>
      <div class="col s12 m6 white">
        <div class="logo fade-up">
          <a href="https://smartlist.ga" style="font-weight:bold;color: #212121" class="l_a"><img src="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg" width="30px" id="logoImg" style="display:inline-block;margin: 0 10px;vertical-align: middle">Smartlist</a>
        </div>
        <div class="consadftainer">
          <h4 class="fade-up" style="animation-delay: .05s"><b><?php if($app == false) {?>Hi there, welcome back! <img class="right hello" src="http://cdn.shopify.com/s/files/1/1061/1924/products/Waving_Hand_Sign_Emoji_Icon_ios10_grande.png?v=1571606113" width="40px"><?php } else {?>Sign into <?=$name;?><?php } ?></b></h4>
          <p class="fade-up" style="animation-delay: .1s"><?php if($app == false) {?>Log in to access your inventory, tasks, lists, and more!<?php } else { ?>With your Smartlist account<?php } ?></p>
          <form method="POST" id="__login" action="https://smartlist.ga/dashboard/login_auth.php">
            <?php if(!isset($_SESSION['valid'])) {?>
            <div class="fade-up input-field" style="animation-delay: .15s" onclick="this.getElementsByTagName('input')[0].focus()">
              <?php } ?>
              <input type="<?php if(isset($_SESSION['valid'])) { echo "hidden"; } else {echo "text"; } ?>" id="u1" name='username' autocomplete="off" spellcheck="off" autofocus>
              <?php if(!isset($_SESSION['valid'])) {?> <label>Username/Email</label> 
            </div>
            <?php } ?>
            <?php if(!isset($_SESSION['valid'])) {?>
            <div class="input-field fade-up" style="animation-delay: .2s" onclick="this.getElementsByTagName('input')[0].focus()">
              <?php } ?>
              <input type="<?php if(isset($_SESSION['valid'])) { echo "hidden"; } else {echo "password"; } ?>" id="u2" name='password' spellcheck="off" autocomplete="new-password">
              <?php if(!isset($_SESSION['valid'])) {?><label>Password</label> 
            </div>
            <?php } ?>
            <?php if(!isset($_SESSION['valid'])) {?>
            <label style="margin-bottom: 20px;animation-delay:.25s;margin-left: -3px !important" class="checkbox-orange fade-up">
              <input type="checkbox" oninput="showPassword()">
              <span>Show password</span>
            </label>
            <br><br>
            <?php } ?>
            <?php if(isset($_SESSION['valid'])) {?>
            <ul class="collection" style="border:0;background:transparent!important">
              <li class="collection-item avatar waves-effect" style="overflow:hidden!important;width:100%" onclick="$('#submitBtn').click()">
                <img src="<?=$_SESSION['avatar'];?>" alt="" class="circle">
                <span class="title"><?=$_SESSION['name'];?></span>
                <p><?=$_SESSION['email'];?>
                </p>
                <a href="#!" class="secondary-content">Logged in</a>
              </li>
            </ul>
            <?php } ?>
            <?php if($app == true) { ?><input name="app" type="hidden" value="<?=$_GET['appId']?>"><?php } ?>
            <button class="fade-up btn purple btn-large darken-3 waves-effect" style="<? if(isset($_SESSION['valid'])) { echo "display:none;"; }?>overflow:hidden!important; animation-delay: .3s;width: 100%;height: 50px;line-height: 40px" id="submitBtn" name='submitBtnLogin'>Login</button>
          </form>
          <br><br>
          <?php if($app == false) {
          ?>
          <div class="col s12">
            <span class='fade-up hide-on-small-only' style="animation-delay: .35s">Don't have an account yet? <a href="https://smartlist.ga/signup">Sign up!</a> </span>
            <div class="right fade-up" style="animation-delay: .4s">
              <a href="https://smartlist.ga/dashboard/resources/fp.php">Forgot Password?</a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script src="https://matthias-vogt.github.io/legitRipple.js/js/ripple.js"></script>
    <script>
      $("#__login").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        document.getElementById('bar').style.transitionDuration = '20s';
        document.getElementById('bar').style.width='100%';
        $.ajax({
          type: "POST",
          url: url,
          data: form.serialize(),
          success: function(data) {
            console.log(data)
            if(data == 'Invalid') {
              M.toast({text: 'Invalid username or password'});
              document.getElementById('bar').style.transitionDuration = '.2s';
              document.getElementById('bar').style.width='0%';
              reset();
            }
            else if(data.includes("confirm_email")) {
              M.toast({text: "New login location detected, please check your email, "+data.replace("confirm_email", "")})
            }
            else if(data == 'Empty') {
              M.toast({text: 'Both fields are required'});
              reset();
            }
            else if (data == 'Valid') {
              document.getElementById('bar').style.transitionDuration = '.2s';
              document.getElementById('bar').style.width='100vw';
              var x = document.getElementById('submitBtn');
              x.innerHTML = "Decrypting your account...";
              setTimeout(function() {
                x.innerHTML = "Cross-verifying your request...";
                setTimeout(function() {
                  x.innerHTML = "Retrieving your data from our servers"
                }, 100);
              }, 300)
              sessionStorage.setItem('status','loggedIn');
              history.pushState(null, null, 'https://smartlist.ga/dashboard/')
              setTimeout(function() {
                window.location.href='https://smartlist.ga/dashboard';
              }, 300);
            }
            else if(data == "Welcome") {
              window.location.href = "https://smartlist.ga/dashboard/welcome"
            }
            else if (data =="verify") {
              window.location.href = "https://smartlist.ga/signup?auth"
            }
            else if (data == 'max') {
              window.location.reload();
              document.cookie = "attempts=5";
            }
            else {
              // M.toast({html:data});
              if(data.includes('__AUTH__')) {
                data = data.replace("__AUTH__", "");
                window.location.href = data.split("|")[0]+"?token="+data.split("|")[1]
              }
              reset()
            }
          }
        });
      });
      history.pushState(null, null, 'https://smartlist.ga/dashboard/auth')
      function bar0() {
        document.getElementById('bar').style.width="0%"
        document.getElementById('bar').style.width="100%"
      }
      $(document).ready(function() {
        document.getElementById('submitBtn').addEventListener('click', function() {
          //   bar0();
          var x = document.getElementById('submitBtn')
          setTimeout(function() {
            x.disabled = true;
          }, 500);
        });
      })
      if($(window).width() > 922) {
        setInterval(function() {
          window.scrollTo(0, 0)
        }, 10)
      }
      function showPassword() {
        var x = document.getElementById("u2");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      $(".ripple").ripple({
        maxDiameter: "100%"
      });
      $(document).ready(function() {
        $('input').keydown(function(event){
          if(event.keyCode == 2987) {
            event.preventDefault();
            return false;
          }
        });
      });
      if($(window).width() > 922) {
        $(document).ready(function(){
          var classCycle = ['i1','i2', 'i3', 'i4', 'i5', 'i6', 'i6', 'i7', 'i8', 'i9', 'i10', 'i11'];
          var randomNumber = Math.floor(Math.random() * classCycle.length);
          var classToAdd = classCycle[randomNumber];
          $('.bg').addClass(classToAdd);
        });
      }
      if(localStorage.getItem('theme') == "dark") {
        $('html').addClass("darkTheme")
      }
      if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        $('html').addClass("darkTheme");
        document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#303030');
        document.getElementById("logoImg").src = "data:image/svg+xml,%0A%3Csvg xmlns='http://www.w3.org/2000/svg' version='1.2' baseProfile='tiny' width='270.4838718484766' height='263.7741935731965' style=''%3E%3Crect id='backgroundrect' width='100%25' height='100%25' x='0' y='0' fill='none' stroke='none' class='selected' style=''/%3E%3Cmetadata%3E%3Crdf:RDF xmlns:rdf='http://www.w3.org/1999/02/22-rdf-syntax-ns%23' xmlns:rdfs='http://www.w3.org/2000/01/rdf-schema%23' xmlns:dc='http://purl.org/dc/elements/1.1/'%3E%3Crdf:Description about='https://iconscout.com/legal%23licenses' dc:title='roofing,contractor' dc:description='roofing,contractor' dc:publisher='Iconscout' dc:date='2017-09-24' dc:format='image/svg+xml' dc:language='en'%3E%3Cdc:creator%3E%3Crdf:Bag%3E%3Crdf:li%3EScott De Jonge%3C/rdf:li%3E%3C/rdf:Bag%3E%3C/dc:creator%3E%3C/rdf:Description%3E%3C/rdf:RDF%3E%3C/metadata%3E%3Cg class='currentLayer' style=''%3E%3Ctitle%3ELayer 1%3C/title%3E%3Cpath d='M90.02969540151386,106.6231528191286 h17.361412403869622 l-0.15184073554539457,9.5813841632138 l-17.209571668324223,14.488660919254208 v-24.070045082468013 zm48.01032162773054,-5.30393265986017 L69.54838562011719,157.83196602375125 L76.7679828573699,165.4193502380333 l61.55279628665656,-50.798756763511705 L199.86211575252864,165.4193502380333 L207.0645234725498,157.83196602375125 L138.58435174157697,101.31922015926843 L138.3064545463335,101.09677124023438 l-0.26643751708908836,0.22244891903405475 z' id='svg_1' class='' stroke='%23fff' fill='%23fff'/%3E%3Crect fill='none' stroke-dashoffset='' fill-rule='nonzero' id='svg_3' x='6.419353485107422' y='4.387096881866455' width='257.70965576171875' height='257' style='color: %23fff;' class='' stroke='%23fff' stroke-opacity='1' stroke-width='3' rx='29' ry='29'/%3E%3C/g%3E%3C/svg%3E";
      }
      function reset() {
        document.getElementById('u1').innerHTML = "";
        document.getElementById('u2').innerHTML = "";
        document.getElementById('submitBtn').disabled = false;
        setTimeout(function() {
          document.getElementById('submitBtn').innerHTML = "Login";
        }, 200);
        // M.toast({text: "Invalid Username or Password"})
      }
      const user = {
        loggedIn: function() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(xhttp.responseText.toString())
              if(xhttp.responseText.toString() == "true") {
                window.location = "https://smartlist.ga/dashboard/beta/"
              }
            }
          };
          xhttp.open("GET", "https://smartlist.ga/dashboard/user/check_if_loggd_in.php", true);
          xhttp.send();
        }
      }
      <?php
                            if(!isset($_GET['auth'])) {?>
      if(localStorage.getItem('theme') == "dark") {
        $('html').addClass("darkTheme")
      }
      window.addEventListener('load', function(){
        var interval = setInterval(function() {
          user.loggedIn()
        }, 5000)
        })
      <?php } ?>
    </script>
    <?php if(isset($_GET['logout'])) {?>
    <script>
      window.onload=function() {M.toast({text: 'Successfully logged out of your account'})}
    </script>
    <?php } ?>

    <?php if(isset($_GET['inactive'])) {?>
    <script>
      window.onload=function() {M.toast({text: 'You have been logged out due to inactivity!'})}
    </script>
    <?php } ?>


    <?php if(isset($_GET['new'])) {?>
    <script>
      window.onload=function() {M.toast({text: 'Successfully signed up! Please log in to your account!'})}
    </script>
    <?php } ?>
    <?php if(isset($_GET['confirmed'])) {?>
    <script>
      window.onload=function() {M.toast({text: 'Verified IP address!'})}
    </script>
    <?php } ?>
    <?php if(isset($_GET['incorrect'])) {?>
    <script>
      window.onload=function() {M.toast({text: 'Incorrect Username or Password'})}
    </script>
    <?php } ?>
    <?php if(isset($_GET['reset'])) {?>
    <script>
      window.onload=function() {M.toast({text: 'Changed password successfully. Please log in again'})}
    </script>
    <?php } ?>
    <?php if(isset($_GET['sett'])) {?>
    <script>
      window.onload=function() {M.toast({text: 'Successfully updated your settings. Please log in again'})}
    </script>
    <?php } ?>
  </body>
</html>
<?php }
else {?>
<!DOCTYPE html>
<html>
  <head><title>Account Locked | Smartlist</title><link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>* {font-family: 'Nunito', sans-serif;}</style></head>
  <body>
    <center style="position:fixed;top: 50%;left:50%;transform:translate(-50%,-50%)">
      <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/08aea422-eab9-428b-82c9-9c04e411bb8c/dbf6x7m-54540852-db91-4898-95b4-550d598cb906.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvMDhhZWE0MjItZWFiOS00MjhiLTgyYzktOWMwNGU0MTFiYjhjXC9kYmY2eDdtLTU0NTQwODUyLWRiOTEtNDg5OC05NWI0LTU1MGQ1OThjYjkwNi5qcGcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.V5CQTr_KCILLH9Wa-gTjzxyuJFnURD2RTpOUyJnqit8" width="300px">
      <h1>Account Locked</h1>
      <h4>Please wait 1 day for your account to be unlocked, or use a different device or <a href="mailto:hello@homebase.rf.gd">contact support</a></h4>
    </center>
  </body>
</html>
<?php } ?>