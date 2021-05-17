<!DOCTYPE html>
<html>
  <head>
    <title>Server Statuses</title>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
    <meta name="keywords" content="Smartlist, Homebase, KeepInventory, Smartlist dashboard, Smart List, List, Inventory, Home, Smartlist app, Smart list app, Smartlist Dashboard, Smartlist login, Smartlist Signup, Smart list login, Smart list sign up, Smart list signup, smart list register, Smartlist logo, smartist, smarst, smatist">
    <link rel="shortcut icon" href="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg">
    <link rel="favicon" href="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b4d3efb29c.js" crossorigin="anonymous" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smartlist</title>
    <meta name="title" content="Smartlist">
    <meta name="description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta property="og:type" content="website">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S0PH6N0Z7E"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-S0PH6N0Z7E');
    </script>
    <meta property="og:url" content="https://smartlist.ga/">
    <meta property="og:title" content="Smartlist">
    <meta property="og:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta property="og:image" content="https://i.ibb.co/2kSY71Q/Screenshot-2021-04-08-1-57-23-PM.png">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://smartlist.ga/">
    <meta property="twitter:title" content="Smartlist">
    <meta property="twitter:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money">
    <meta property="twitter:image" content="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg">
    <style>
      body {font-family: 'Nunito', sans-serif;overflow-x: hidden;}
      nav {-webkit-box-shadow:0 2px 0 0 #f5f5f5;box-shadow:0 8px 16px rgba(10,10,10,.05) !important;position:fixed;top:0;transition: all .5s;z-index:2}
      .show-on-small-only {display: none}
      .bottom-sheet{width: 70% !important;margin: auto !important}
      body {padding-top: 65px;}
      nav a {color: black !important}
      .btn-flat {background: transparent !important}
      .btn-outlined {border: 1px solid gray}
      .btn-outlined:hover {border: 1px solid black}
      .btn-outlined:active {background: rgba(0,0,0,0.1)}
      .__radius {border-radius: 999px;user-select: none;}
      .btn.__radius {line-height: 45px;height: 45px;padding: 0 30px;margin: 3px;box-shadow: none;text-transform: none;font-weight: bold;font-family: 'Roboto'}
      .blue.lighten-2:hover {opacity: .8}
      .green.circle {width: 10px;height: 10px;background: green;display: inline-block}
      nav a:hover {background: rgba(0,0,0,0.02) !important}
      .blue.lighten-2 {transition-duration: .2s !important;transition-delay: 0}
      .__padding {padding-top: 7vw !important}
      .slide-img {position: absolute;border-radius: 10px;}
      .__icons i {font-size: 25px;padding: 16px;border: 1px solid #eee;border-radius: 999px;width: 60px;height: 60px;}
      .__icons h6 {margin-bottom:10px;font-weight: bold}
      .__icons p {margin-top:0;}
      @media only screen and (max-width: 600px) {
        .show-on-small-only {display: block}
        .__container {padding: 0 !important}
        .container {min-height: auto !important}
        .bottom-sheet {width: 100% !important}
      }
      .error {padding: 10px 20px;border-radius:3px;}
      .error a {color:white;text-decoration: underline;}
    </style>
  </head>
  <body>
    <nav class="white" id="navbar">
      <ul>
        <li><a href="https://smartlist.ga"> <img src="https://res.cloudinary.com/smartlist/image/upload/v1617905788/logo_z3yoqm.svg" width="30px" style="vertical-align:middle"> <span style="margin-left: 5px;font-family: 'Exo', sans-serif;position:relative;bottom: -3px;">Smartlist</span></a></li>
      </ul>
      <ul class='right'>
        <li><a class="hide-on-small-only" href="./join">Join the team!</a></li>
        <li><a class="hide-on-small-only" href="https://help.smartlist.ga">Knowledge Base</a></li>
        <li><a class="hide-on-small-only" href="https://community.smartlist.ga">Community Forum</a></li>
        <li><a class="hide-on-small-only" href="https://stats.uptimerobot.com/g85lwSl9Lk">Server Status <div class="green circle"></div></a></li>
        <li><a href="./login">Login</a></li>
        <li><a href="./signup">Sign Up!</a></li>
      </ul>
    </nav>
    <div class="container"><br>
      <div id="root"></div>
    </div>
        <footer class="page-footer blue lighten-1">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Smartlist</h5>
            <p class="grey-text text-lighten-4">The <b>sophisticated</b> home inventory app</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="https://community.smartlist.ga/">Forum</a></li>
              <li><a class="grey-text text-lighten-3" href="https://help.smartlist.ga/">Knowledge base</a></li>
              <li><a class="grey-text text-lighten-3" href="https://smartlist.ga/dashboard/beta">Dashboard</a></li>
              <li><a class="grey-text text-lighten-3" href="https://smartlist.ga/signup">Signup</a></li>
              <li><a class="grey-text text-lighten-3" href="https://smartlist.ga/login">Login</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          © 2021 Copyright Text
          <a class="grey-text text-lighten-4 right" href="https://manuthecoder.ml">An app by ManuTheCoder</a>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    var __ROOT = document.getElementById('root');
    window.onerror = function(msg, url, linenumber) {
        __ROOT.innerHTML += `<div class="red darken-2 white-text error">Error. If this problem persists, please <a href="https://community.smartlist.ga">contact support. </a><br> ${msg}<br>URL: ${url}<br>Line number: ${linenumber}<br></a></div>`
        return true;
      }
      var __s = `{"${new Date().getFullYear()}":{"Uptime":"`
      var __data = JSON.parse(`<?php echo file_get_contents("https://api.hetrixtools.com/v1/da57e66f2ea1b09a5408082d1a621352/uptime/monitors/0/30");?>`);
      __ROOT.innerHTML = `
      <h2>Servers are currently ${__data[0][0].Uptime_Status.toLowerCase()}</h2>
      <h4>${__data[0][0].Uptime_Stats.Total.Uptime}% Uptime</h4>
      <h5>ID: ${__data[0][0].ID}</h5>
      <p>Uptime since ${new Date().getFullYear()}: ${JSON.stringify(__data[0][0].Uptime_Stats.Year).slice(19).substring(0,7)}% </p>
      <p>Uptime today: ${JSON.stringify(__data[0][0].Uptime_Stats.Day).slice(25).substring(0,7)}% </p>
      <br><br>
      <table>
        <tr>
            <td><b>Server</b></td>
            <td><b>Response Time</b></td>
            <td><b>Average Response Time</b></td>
          </tr>
          <tr>
            <td>New York</td>
            <td>${__data[0][0].Response_Time.New_York}</td>
            <td>${__data[0][0].Average_Response_Time.New_York}</td>
          </tr>
          <tr>
            <td>San Francisco</td>
            <td>${__data[0][0].Response_Time.San_Francisco}</td>
            <td>${__data[0][0].Average_Response_Time.San_Francisco}</td>
          </tr>
          <tr>
            <td>London</td>
            <td>${__data[0][0].Response_Time.London}</td>
            <td>${__data[0][0].Average_Response_Time.London}</td>
          </tr>
          <tr>
            <td>Dallas</td>
            <td>${__data[0][0].Response_Time.Dallas}</td>
            <td>${__data[0][0].Average_Response_Time.Dallas}</td>
          </tr>
      </table>
      `;
      AOS.init();
      var prevScrollpos = window.pageYOffset;
      window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
          document.getElementById("navbar").style.top = "0";
        } else {
          document.getElementById("navbar").style.top = `-${window.pageYOffset}px`;
        }
        prevScrollpos = currentScrollPos;
      }
      $('.modal').modal();
    </script>
  </body>
</html>