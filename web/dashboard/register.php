<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Signup | Smartlist</title>
    <link rel="shortcut icon" href="https://smartlist.ga/dashboard/icon/roofing.svg">
    <link rel="favicon" href="https://smartlist.ga/dashboard/icon/roofing.svg">
    <meta name="viewport" content="width=device-width">
    <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css"
          />
    <meta name="theme-color" content="#fff" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
      .btn {
        background: #7200ca !important;
        height: auto !important;
        line-height: 40px !important;
        /* width: 100% !important; */
        float: right;
        border-radius: 9999px;
        box-shadow: none !important;
        text-transform: none !important;
        padding: 0 30px;
      }

      .waves-ripple {
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s !important;
      }

      .card {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: calc(100% - 100px);
      }

      body {
        /* background: url(https://i.ibb.co/kMKRBZR/blurry-gradient-haikei-1.png); */
        background: #eee;
        background-repeat: no-repeat;
        background-size: cover;
      }

      .h100 {
        height: 100vh;
      }

      .pd {
        padding: 20px;
      }

      .i1 {
        background-image: url("https://wallpaperaccess.com/full/31193.jpg");
      }

      .i2 {
        background-image: url("https://cdn.wallpapersafari.com/70/1/yGSYxk.jpg");
      }

      .i3 {
        background-image: url("https://thewallpaper.co/wp-content/uploads/2020/08/landscape-desktop-images-quality-beautiful-full-hd-free-smart-phone-background-nature-wallpaper-4k-1920x1080-1-1200x675.jpg");
      }

      .i4 {
        background-image: url("https://i.ibb.co/wJcrLJF/morning-yosemite-3840x2400.jpg");
      }

      .i5 {
        background-image: url("https://c4.wallpaperflare.com/wallpaper/384/818/513/himalayas-mountains-landscape-nature-wallpaper-preview.jpg");
      }

      .i6 {
        background-image: url("https://free4kwallpapers.com/uploads/originals/2019/05/18/awesome-himalayas-wallpaper.jpg");
      }

      .i7 {
        background-image: url("https://free4kwallpapers.com/uploads/originals/2019/05/20/hd-nature--wallpaper.jpg");
      }

      .i8 {
        background-image: url("https://3.bp.blogspot.com/-eilZTdgbWPA/XFUltCS4Z1I/AAAAAAAABz0/feDxTa3Emtsb3Wx4xxu0hWnFrohqtwQfwCKgBGAs/w2560-h1440-c/mountain-lake-scenery-nature-cottage-25-4K.jpg");
      }

      .i9 {
        background-image: url("https://wallpapers.com/images/high/4k-ultra-hd-nature-high-resolution-wallpaper-5n3jp9psonuimymd.jpg");
      }

      .i10 {
        background-image: url("https://www.pxwall.com/wp-content/uploads/2018/06/Wallpaper%20autumn,%20forest,%20mountain,%204k,%20Nature%20461537031.jpg");
      }

      .i11 {
        background-image: url("https://images.unsplash.com/photo-1606055854326-12a2fdcac6c0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80");
      }

      .darkTheme .i1 {
        background-image: url("https://www.androidguys.com/wp-content/uploads/2015/11/milky_way_sky-wide.jpg") !important;
      }

      .darkTheme .i2 {
        background-image: url("https://wallpaperaccess.com/full/1685406.jpg") !important;
      }
      .darkTheme .white {
        background: #212121 !important
      }

      /* https://images.unsplash.com/photo-1505322022379-7c3353ee6291?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bmlnaHR8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80 */
      .darkTheme .i3 {
        background-image: url("https://i.pinimg.com/originals/33/f3/bd/33f3bda341b51f505bb54f10b5e83b2f.jpg") !important;
      }

      .darkTheme .i4 {
        background-image: url("https://images.hdqwalls.com/download/mountains-landscape-dark-nature-4k-i0-2880x1800.jpg") !important;
      }

      .darkTheme .i5 {
        background-image: url("https://i.pinimg.com/originals/51/82/ac/5182ac536727d576c78a9320ac62de30.jpg") !important;
      }

      .darkTheme .i6 {
        background-image: url("https://images.unsplash.com/photo-1528353518104-dbd48bee7bc4?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fG5pZ2h0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80") !important;
      }

      .darkTheme .i7 {
        background-image: url("https://i.pinimg.com/originals/41/04/19/4104195a45059c28093f0f5ca7edfac5.jpg") !important;
      }

      .darkTheme .i8 {
        background-image: url("https://cdn.wallpapersafari.com/30/71/gUeW2o.jpg") !important;
      }

      .darkTheme .i9 {
        background-image: url("https://cdn.wallpapersafari.com/51/0/jwTGxo.jpg") !important;
      }

      .darkTheme .i10 {
        background-image: url("https://wallpapercave.com/wp/wp2604216.jpg") !important;
      }

      .darkTheme .i11 {
        background-image: url("https://www.pxwall.com/wp-content/uploads/2018/06/Wallpaper%20night,%20mountains,%20sky,%20stars,%204k,%20Nature%20564649069.jpg") !important;
      }

      .bg {
        background-size: 100vw;
        background-repeat: no-repeat !important;
      }
      .main {
        padding: 20px;
        padding-top: 20vh;
      }

      .logo {
        float: right;
        padding: 15px;
        padding-top: 30px;
      }
      .darkTheme body, .darkTheme body * {
        color: white !important;
        stroke: white;
      }
      body {
        overflow: hidden;
      }
      .input-field {
        max-width: 100%;
        /* overflow: scroll */
      }
      /*input {*/
      /*  border: 1px solid #aaa !important;*/
      /*  border-radius: 3px !important;*/
      /*  padding-left: 10px !important;*/
      /*  width: 100%;*/
      /*  display: block;*/
      /*  max-width: 100%;*/
      /*}*/
      /*label {*/
      /*  margin-left: 10px !important;*/
      /*  background: white;*/
      /*  transition: all .2s !important;*/
      /*  padding: 0 4px;*/
      /*  display: inline-block;*/
      /*}*/
      input:focus {
        border-color: #6727ab !important;
        box-shadow:  0px -1px 0px 0px rgba(103,39,171,1) inset !important;
      }
      label.active {
        color: #6727ab !important;
      }
      /*label.active {*/
      /*  margin-left: 7px !important;*/
      /*  margin-top: 8px !important*/
      /*}*/
      .waves-ripple {
        background: rgba(255, 255, 255, .4) !important
      }
      @media only screen and (max-width: 992px) {
        .main {
          padding-top: 15vh !important;
          padding: 20px;
          width: 100%;
          margin: 0;
          padding-right: 20px;
        }
      }
    </style>
  </head>

  <body>
    <div class="row">
      <div class="col s12 bg m6 h100 hide-on-med-and-down"></div>
      <div class="col s12 m6 h100 white" style="overflow-y:scroll">

        <div class="logo fade-up">
          <a href="https://smartlist.ga" style="font-weight:bold;color: #212121" class="l_a"><img src="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg" width="30px" id="logoImg" style="display:inline-block;margin: 0 10px;vertical-align: middle">Smartlist</a>
        </div>


        <div class="pd main">
          <b><h4>Hey there!</h4></b>
          <p>Welcome to the party! Let's get started.</p>
          <form action="https://smartlist.ga/dashboard/signup_auth.php" method="POST" id="form1">
            <div class="input-field">
              <label>Name</label>
              <input type="text" name="name" autocomplete="off" />
            </div>
            <div class="input-field">
              <label>Email</label>
              <input type="text" name="email" autocomplete="off" />
            </div>
            <div class="input-field">
              <label>Username</label>
              <input type="text" name="username" autocomplete="off" />
            </div>
            <div class="input-field">
              <label>Password</label>
              <input type="password" name="password" autocomplete="off" />
            </div>
            <button class="btn waves-effect waves-light" onclick="setTimeout(() => {this.disabled = true}, 200)">Next</button>
          </form>
          <br>
          <br>
        </div>
      </div>
    </div>
    <div id="ajaxLoader"></div>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script>
      $(document).ready(function () {
        $(".tabs").tabs();
      });

      const loader = document.getElementById("determinate");

      $("#form1").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        $.ajax({
          type: "POST",
          url: url + (document.documentElement.classList.contains('darkTheme') ? "?d=1" : ""),
          data: form.serialize(),
          success: function (data) {
            console.log(data);
            if(data =="exists") {M.toast({ html: "Username exists!"})}
            else {$('.pd').load("https://smartlist.ga/dashboard/email.php");}

          },
        });
      });
      if ($(window).width() > 922) {
        $(document).ready(function () {
          var classCycle = [
            "i1",
            "i2",
            "i3",
            "i4",
            "i5",
            "i6",
            "i6",
            "i7",
            "i8",
            "i9",
            "i10",
            "i11",
          ];
          var randomNumber = Math.floor(Math.random() * classCycle.length);
          var classToAdd = classCycle[randomNumber];
          $(".bg").addClass(classToAdd);
        });
      }
      if (
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
      ) {
        $("html").addClass("darkTheme");
        document
          .querySelector('meta[name="theme-color"]')
          .setAttribute("content", "#303030");
        document.getElementById("logoImg").src = "data:image/svg+xml,%0A%3Csvg xmlns='http://www.w3.org/2000/svg' version='1.2' baseProfile='tiny' width='270.4838718484766' height='263.7741935731965' style=''%3E%3Crect id='backgroundrect' width='100%25' height='100%25' x='0' y='0' fill='none' stroke='none' class='selected' style=''/%3E%3Cmetadata%3E%3Crdf:RDF xmlns:rdf='http://www.w3.org/1999/02/22-rdf-syntax-ns%23' xmlns:rdfs='http://www.w3.org/2000/01/rdf-schema%23' xmlns:dc='http://purl.org/dc/elements/1.1/'%3E%3Crdf:Description about='https://iconscout.com/legal%23licenses' dc:title='roofing,contractor' dc:description='roofing,contractor' dc:publisher='Iconscout' dc:date='2017-09-24' dc:format='image/svg+xml' dc:language='en'%3E%3Cdc:creator%3E%3Crdf:Bag%3E%3Crdf:li%3EScott De Jonge%3C/rdf:li%3E%3C/rdf:Bag%3E%3C/dc:creator%3E%3C/rdf:Description%3E%3C/rdf:RDF%3E%3C/metadata%3E%3Cg class='currentLayer' style=''%3E%3Ctitle%3ELayer 1%3C/title%3E%3Cpath d='M90.02969540151386,106.6231528191286 h17.361412403869622 l-0.15184073554539457,9.5813841632138 l-17.209571668324223,14.488660919254208 v-24.070045082468013 zm48.01032162773054,-5.30393265986017 L69.54838562011719,157.83196602375125 L76.7679828573699,165.4193502380333 l61.55279628665656,-50.798756763511705 L199.86211575252864,165.4193502380333 L207.0645234725498,157.83196602375125 L138.58435174157697,101.31922015926843 L138.3064545463335,101.09677124023438 l-0.26643751708908836,0.22244891903405475 z' id='svg_1' class='' stroke='%23fff' fill='%23fff'/%3E%3Crect fill='none' stroke-dashoffset='' fill-rule='nonzero' id='svg_3' x='6.419353485107422' y='4.387096881866455' width='257.70965576171875' height='257' style='color: %23fff;' class='' stroke='%23fff' stroke-opacity='1' stroke-width='3' rx='29' ry='29'/%3E%3C/g%3E%3C/svg%3E";
      }
      <?php if(isset($_SESSION['re_id'])) {?>$('.pd').load('https://smartlist.ga/dashboard/email.php')<?php }?>
    </script>
  </body>
</html>
