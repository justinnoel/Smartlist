
<!--
   DO NOT DELETE OR MODIFY THIS FILE
   This project is released under the Apache License
   Copyright 2021 Manusvath Gurudath
   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at
   https://www.apache.org/licenses/LICENSE-2.0
   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
   -->
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="#2a1782">
      <meta name="apple-mobile-web-app-capable" content="yes"/>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> 
      <link rel="search" href="https://homebase.rf.gd/search.xml" type="application/opensearchdescription+xml" title="your home (Homebase)"/>
      <link rel="shortcut icon" href="https://i.ibb.co/8sM4M19/icon-1.png" type="image/png" />
      <link rel="apple-touch-icon" href="https://i.ibb.co/8sM4M19/icon-1.png" />
      <link rel="apple-touch-icon" sizes="57x57" href="https://i.ibb.co/8sM4M19/icon-1.png" />
      <link rel="apple-touch-icon" sizes="72x72" href="https://i.ibb.co/8sM4M19/icon-1.png" />
      <link rel="apple-touch-icon" sizes="76x76" href="https://i.ibb.co/8sM4M19/icon-1.png" />
      <link rel="apple-touch-icon" sizes="114x114" href="https://i.ibb.co/8sM4M19/icon-1.png" />
      <link rel="apple-touch-icon" sizes="120x120" href="https://i.ibb.co/8sM4M19/icon-1.png" />
      <link rel="apple-touch-icon" sizes="144x144" href="https://i.ibb.co/8sM4M19/icon-1.png" />
      <link rel="apple-touch-icon" sizes="152x152" href="https://i.ibb.co/8sM4M19/icon-1.png" />
      <link rel="apple-touch-icon" sizes="180x180" href="https://i.ibb.co/8sM4M19/icon-1.png" />
      <script src="https://dragselect.com/ds.min.js"></script> <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
      <title>Dashboard</title>
      <!-- <script src="https://unpkg.com/ml5@0.4.3/dist/ml5.min.js" defer></script> <script src="./upload/script.js" defer></script>--> <!--Import Google Icon Font--> 
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified CSS --> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> <!-- Compiled and minified JavaScript -->
      <meta name="theme-color" content="#2a1782">
      <meta name="title" content="Homebase - the free home inventory database">
      <meta name="description" content="Ever wanted to keep track of what you have in your home for free? Homebase lets you track what's in your home, anywhere, anytime, for free!">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <meta name="author" content="manu792">
      <!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "047864006fdb4ab685473b1c22abd1e1"}'></script><!-- End Cloudflare Web Analytics --> 
      <meta property="og:site_name" content="trinket.io" />
      <meta property="og:title" content="Homebase" />
      <meta property="og:type" content="website" />
      <meta property="og:description" content="The sophisticated home inventory app" />
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:site" content="@homebase">
      <meta name="twitter:title" content="Homebase">
      <meta name="twitter:description" content="The sophisticated home inventory app">
      <meta name="twitter:domain" content="homebase.rf.gd">
      <meta name="keywords" content="Home, Database, Inventory, free ">
      <meta name="robots" content="noindex, follow">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="language" content="English">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>.demo {display:none}.content{display:none;outline:0;background:#fff;z-index:99999;position:relative;top:-20px;left:-50px;font-size:20px!important;box-shadow:0 0 50px #eee;width:200px;animation-name:menu;animation-fill-mode:forwards;animation-duration:.2s}@keyframes menu{0%{opacity:0;transform:scale(.9)}100%{opacity:1;transform:scale(1)}}.content div{padding:10px;line-height:40px;width:100%}.content div:hover{background:#eee}.sropdown:focus-within>.content{display:block}.sropdown{outline:0;color:#2BBBAD;cursor:pointer}.d-none{display:none!important}::-webkit-scrollbar{width:0}::-webkit-scrollbar-thumb{background:0 0}.sidenav-overlay {z-index: 10000}.sidenav{z-index: 999999 !important} .sidenav::-webkit-scrollbar{width:0}::-webkit-scrollbar-thumb{background:0 0}dialog{position:fixed;max-height:90%;overflow:scroll;border:0;border-radius:10px}#toast-container{top:auto!important;right:auto!important;bottom:3%;left:2%}@media only screen and (max-width:600px){#toast-container{top:auto!important;right:auto!important;bottom:0;left:0}}dialog::backdrop{background:rgba(0,0,0,.8)}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0)}100%{-webkit-transform:rotate(360deg)}}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.animate-bottom{position:relative;-webkit-animation-name:animatebottom;-webkit-animation-duration:1s;animation-name:animatebottom;animation-duration:1s}*{box-sizing:border-box}tr{user-select:none}body,html{height:100%;margin:0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;background:var(--bg-color)}.tabcontent{display:none;height:100%;background:var(--bg-color)!important;padding-top:45px}.drag-target{width:50px}.tabs{background:var(--bg-color)}.bottom-sheet{max-height:90%!important}@-webkit-keyframes animatebottom{from{bottom:0;opacity:0}to{bottom:0;opacity:1}}@keyframes animatebottom{from{bottom:0;opacity:0}to{bottom:0;opacity:1}}#myDiv{display:none}.content{display:none;outline:0;background:#fff;z-index:99999;position:relative;top:-20px;left:-50px;font-size:20px!important;box-shadow:0 0 50px rgba(0,0,0,0.3);width:200px;animation-name:menu;animation-fill-mode:forwards;animation-duration:.2s}@keyframes menu{0%{opacity:0;transform:scale(.9)}100%{opacity:1;transform:scale(1)}}.content div{padding:10px;line-height:40px;width:100%}.content div:hover{background:#eee}.sropdown:focus-within>.content{display:block;background: var(--sidenav-color)}.sropdown{outline:0;color:#2BBBAD;cursor:pointer}.modal-overlay{z-index:9999999!important}.modal,.modal-fixed-footer{z-index:999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999!important}*{box-sizing:border-box}#myInput{background-position:10px 12px;background-repeat:no-repeat;width:100%;font-size:16px;padding:12px 20px 12px 40px;border:1px solid #ddd;margin-bottom:12px}.brand-logo{margin-left:-170px}@media only screen and (max-width:900px){.onup100{width:100%!important}.brand-logo{margin-left:-20px!important}.tabcontent{margin-left:0}}.message{background:rgba(200,200,200,.3);text-align:center;padding:30px;font-size:30px;margin-top:30px}body,footer,header{padding-left:300px}@media only screen and (max-width :992px){body,footer,header{padding-left:0}.medianopadding { padding: 0 !important; width: 100%; margin: 0; } .mediapadding { padding: 20px; }.label-icon{margin-bottom:-5px!important}.brand-logo{margin-top:5px;margin-left:0}}::-webkit-details-marker{display:none}.ds-selected{background: #eee !important}#myDIVa{animation-name:notify;animation-duration:.2s;animation-fill-mode:forwards}@keyframes notify{0%{opacity:0;transform:scale(.9)}100%{opacity:1;transform:scale(1)}}.tap-target-wrapper{z-index:99999999999999999999999999999999999999999999999999999999999}.sropdown,td{z-index:-1!important}.btn{color:#fff!important}.btn-flat {color: #000 !important}table,.btn-flat:hover {background: transparent !important}#fab {transition: all .2s;} .FLOATING_ACTION_BUTTON,#hide{transition: all .2s;animation: btn .2s forwards ease-out;animation-delay:1s;transform: scale(0);} @keyframes btn { 0% {transform:scale(0)} 100% {transform: scale(1)} } nav { left: 300px; width: calc(100% - 300px) } @media only screen and (max-width : 992px) { header, main, footer { padding-left: 0; } nav {left: 0; width: 100%; } } .sidenav a,.sidenav i { color: var(--sidenavf-color) !important; } .waves-effect .waves-ripple { background-color: var(--waves-color); } .sidenav { background-color: var(--sidenav-color); }.material-icons,img {user-select: none}html {scroll-behavior: smooth}.card-new { animation: cnew 2s forwards; } @keyframes cnew { 0% { background: rgba(200,200,200,.5) } 25% { background: rgba(200,200,200,.5) } 26% { background: rgba(255,255,255,0) } 50% { background: rgba(255,255,255,0) } 51% { background: rgba(200,200,200,.5) } 75% { background: rgba(200,200,200,.5) } 76% { background: rgba(255,255,255,0) } 100% { background: rgba(255,255,255,0) } }* { -webkit-touch-callout:none;                /* prevent callout to copy image, etc when tap to hold */ -webkit-text-size-adjust:none;             /* prevent webkit from resizing text to fit */ -webkit-tap-highlight-color:rgba(0,0,0,0); /* prevent tap highlight color / shadow */ }.divider {background: rgba(0,0,0,0.1)}#hide { transform: scale(0); animation-delay: 1s; } #myDIVa li{ width: 100%; border-color: rgba(0,0,0,0.1) } .collapsible-header { border: 0 !Important; background: var(--sidenav-color) !important; color: var(--sidenavf-color) } .collapsible,.collapsible li { border-color: rgba(0,0,0,0.1) !important } :root { --primary-color: #302AE6; --secondary-color: #0099CC; --font-color: #424242; --bg-color: #fff; --heading-color: #292922; --navbar-color:#311b92; --bnav-color:#fff; --check-color:#eee; --modal-color:white; --todo-color:white; --overlay-color:rgba(0,0,0,0.9); --waves-color: rgba(0,0,0,0.2); --sidenav-color:#fff; --sidenavf-color: #616161; } [data-theme="dark"] { --primary-color: #9A97F3; --secondary-color: rgba(28, 35, 49, 0.5); --font-color: #e2e0e1; --waves-color: rgba(255,255,255,0.3); --bg-color: #1c1b1b; --heading-color: #818cab; --navbar-color:#232323; --bnav-color:#3c3d3b; --check-color:#263238; --modal-color:#263238; --sidenav-color:#232323; --overlay-color:rgba(255,255,255,0.9); --todo-color:rgba(0,0,0,0.87); --sidenavf-color: var(--font-color); } #searcha { max-height: 100%; height: 100%; width: 100% } .dd { display: none } .card *,table *,.collection-item,.modal *,.modal-footer,p,h1,h2,h3 { color: var(--font-color); } .collection-item,.modal,.modal-footer { background: var(--sidenav-color) !important; }.tabcontent {animation: tab .7s forwards} @keyframes tab {from {opacity: 0;margin-top: 30px;}to{opacity: 1;margin-top: 0;}}.dropdown { position: relative; display: inline-block; } .dropdown-contenta { position: absolute; background-color: #fff; min-width: 160px; box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12); z-index: 1; animation-name: dropdoaasdaswna; animation-duration: .2s; animation-fill-mode: forwards; outline: 0; border-radius: 3px; transition: all .2s; transform-origin: top right; margin-left: -120px; opacity: 0; transform: scale(0) } @keyframes dropdoaasdaswn { 0% { opacity: 0; transform: scale(0) } 100% { opacity: 1; transform: scale(1) } } .dropdown-contenta a { color: black; padding: 12px 16px; outline: 0; text-decoration: none; display: block; cursor: pointer } .dropdown-contenta a:focus { background: #f1f1f1 } .dropdown { outline: 0; } .dropdown-contenta i { font-size: inherit; margin-right: 10px } .dropdown-contenta a:hover {background-color: #f1f1f1} .dropdown:focus-within .dropdown-contenta { opacity: 1; transform: scale(1) }.ctnt { display: block; position: fixed; top: -200px; left: 0; color: white; text-align: center; background: #000; padding: 20px; border: 0; text-decoration: none; width: 100%; transition: all .2s; } .ctnt:focus { top: 0; }</style>
      <script>
         var map = {}; onkeydown = onkeyup = function(e){ e = e || event; map[e.keyCode] = e.type == 'keydown'; if(map["191"]==true){ e.preventDefault(); showsearch();document.getElementById('search').focus(); } }
               
      </script>
      <script>
         /* Enable pusher logging - don't include this in production*/ Pusher.logToConsole = true; var pusher = new Pusher('f7793ae32c2ecf8e787f', { cluster: 'us3' }); var channel = pusher.subscribe('my-channel'); channel.bind('Admin', function(data) { //*alert(JSON.stringify(data));*/ syncalertplayAudio(); var notification = new Notification("Homebase | " + data); });
               
      </script>
   </head>
   <body onload="notifyMe()" onunload="$('.bottom-sheet').modal('close'); ">
               <div style="position: fixed;bottom:0;left:0;width:100%;text-align:center;color:white;padding:10px;background: red;z-index: 9999999999999999999999999999999999999999999999999999999999999999">You are using the demo version, so some features are hidden. Please sign up or sign in to view the regular version</div>

      <a href="#CONTENT" class="ctnt" style="z-index: 99999999999999999999999999999999999999999">Skip to content</a>
      <nav  style="position:fixed;background: var(--navbar-color) ;z-index:9999;display:none;box-shadow:none !important" id="searchbar">
         <div class="nav-wrapper">
            <form onsubmit="openPage('searchresults',this, '');return false;">
               <div class="input-field">
                  <input id="search" type="search" required  onkeyup='changeValue();filter()' class="autocompletae" autocomplete="off" onblur="showsearch();" value="">
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
               </div>
            </form>
         </div>
      </nav>
      <nav style="position:fixed;background: var(--navbar-color);z-index:999">
         <div class="nav-wrapper">
            <ul class="right">
               <li onclick="$('#slide-out').scrollTop(0);"><a class=" sidenav-trigger brand-logo left" style="margin-left:0px !important" data-target="slide-out"><i class="material-icons">menu</i><span style="font-size: 23px;position: relative;top: -2px;left: -5px;" id="brandlogo">Homebase</span></a></li>
               <li>
                  <a  id="notification" class="right"  onclick='openPage("myDIVa", this, "")'>
                     <i class="material-icons">notifications</i>
                     <div id="hide" style="background:red;width:10px;height:10px;border-radius:999px;position:relative;top:-20px;left:-10px;margin-top: -24px;margin-right: -10px !important;float:right"></div>
                  </a>
               </li>
               <li><a class="right " onclick="showsearch();document.getElementById('search').focus();"><i class="material-icons">search</i></a></li>
            </ul>
         </div>
      </nav>
      <div id="modal2" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Heads Up!</h4>
            <p>Are you sure you want to delete your account???</p>
         </div>
         <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect waves-green btn-flat modal-trigger">Go back</a> <a class="waves-effect waves-light btn red modal-trigger" href="#modal5" class="red btn waves-effect waves-light">Delete My account</a> </div>
      </div>
      <div id="bmmodal" class="modal">
         <form action="https://homebase.rf.gd/scalesize/bm/addx.php" method="post" name="form1">
            <table width="100%" border="0" class="table">
               <tr >
                  <td>Name</td>
                  <td><input type="text" name="name" class="form-control" value="01/21/2021" readonly></td>
               </tr>
               <tr>
                  <td>Price you spent</td>
                  <td><input type="text" name="qty" class="form-control"></td>
               </tr>
               <tr class="d-none">
                  <td>Price</td>
                  <td><input type="text" name="price" class="form-control" value="1"></td>
               </tr>
               <tr>
                  <td></td>
                  <td><input type="submit" name="Submit" value="Add" class="text-center btn btn-warning d-block m-auto" style="box-shadow:none !important"> <a href="view.php" class="text-center btn btn-outline-danger" style="box-shadow:none !important">Back</a> </td>
               </tr>
            </table>
         </form>
      </div>
      </div>
      <div id="kitchenmodal" class="modal ">
         <div class="modal-content">
           <!-- <form onsubmit="return false" method="GET" name="form1">
               <table class="table">
                  <tr>
                     <td>Name</td>
                     <div class="ui-widget">
                        <td>
                           <div class="row">
                              <div class="col s9 input-field "> <input type="text" name="name" class="form-control autocomplete" id="tags" value="" placeholder="Item name..." class="autocomplete"> </div>
                              <div class="col s3"> <a href="./upload/upload.php" style="float:right;display:inline-block;font-size: 30px;" class=" modal-close"><i class="material-icons">camera_alt</i></a> </div>
                           </div>
                     </div>
                     </td> 
                  </tr>
                  <tr>
                     <td>Quantity</td>
                     <td><input type="text" name="qty"  id="qty" class="form-control" value="1"></td>
                  </tr>
                  <tr style="height:0;width:0;display:none">
                     <td>Price</td>
                     <td><input type="text" name="price" id="date" class="form-control" value="1"></td>
                  </tr>
                  <tr>
                     <td><button type="submit" name="Submit" value="Add" class="btn btn-success" onclick="add()">Add</button></td>
                     <td></td>
                  </tr>
               </table>
            </form>-->
         </div>
      </div>
      <div id="pair" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Heads Up!</h4>
            <p>Are you sure you want to pair your account? Pairing your account will you see everything in their inventory!</p>
         </div>
         <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect waves-green btn-flat modal-trigger">Go back</a> <a class="waves-effect waves-light btn red modal-trigger modal-close" href="#pair2" class="red btn waves-effect waves-light">Pair my account!</a> </div>
      </div>
      <div id="camera" class="modal modal-fixed-footear">
         <div class="modal-content">
            <div class="logo">
               <img class="image waves-effect" src="https://i.pinimg.com/originals/51/11/d8/5111d818140cbaef5459ce331151463f.gif" onclick='document.getElementById("myCheck").click();'style="display:block;margin:auto;width:100%" /> 
               <div class="result">
                  <h2></h2>
               </div>
               <div class="capture">
                  <div class="record waves-effect waves-light" /> <input class="input" type="file" accept="image/*" onchange="handleUpload(this.files);myFunction()" id="myCheck" style="opacity:0;" /> </div>
               </div>
            </div>
         </div>
         <div class="modal-footer"> <a href="#kitchennmodal" class="modal-close waves-effect waves-green btn-flat modal-trigger">Go back</a> </div>
      </div>
      <div id="pair2" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Pair your account</h4>
            <br> 
            <form action="pair.php" method="GET">
               <input type="text" name="pairingaccountid" placeholder="Login ID..."> 
               <p>To pair, you will need to know the other person's login ID. You can find yours in the settings page</p>
         </div>
         <div class="modal-footer"> <button type="submit"class="btn btn-flat waves-effect">Change</button> </form> <a class="waves-effect waves-light btn btn-flat modal-trigger modal-close" href="#modal1" class="red btn waves-effect waves-light">Never mind</a> </div> 
      </div>
      <div id="budgetmetermodala" class="modal modal-fixed-s"  style="width:90%">
         <div class="modal-content">
            <h3 class="center">Add an item  (CTRL S)</h3>
            <div class="collection">
               <a onclick="openPage('addkitchen', this, '')" class="modal-trigger collection-item waves-effect modal-close" id="kitchentoggle">Kitchen</a>
               <a href="https://homebase.rf.gd/homebase//bedroom/addx.php" class="collection-item waves-effect">Bedroom</a>
               <a href="https://homebase.rf.gd/homebase//bathroom/add.html" class="collection-item waves-effect">Bathroom</a>
               <a href="https://homebase.rf.gd/homebase//garage/add.html" class="collection-item waves-effect">Garage</a>
               <a href="./family/add.html" class="collection-item waves-effect">Family</a>
               <a href="./storage/add.html" class="collection-item waves-effect">Storage Room</a>
               <a href="./dining_room/add.html" class="collection-item waves-effect">Dining Room</a>
               <a href="./todo/add.html" class="collection-item waves-effect">Todo list</a>
               <a href=".//grocerylist/add.html" class="collection-item waves-effect">Grocery List</a>
               <a href="./camping/add.html" class="collection-item waves-effect">Camping Supplies</a>
               <a href=".add.html" class="collection-item waves-effect">Laundry room</a>
               <a href="https://homebase.rf.gd/scalesize/bm/add.php" class="collection-item waves-effect">Budget Meter</a>
            </div>
         </div>
      </div>
      
      <div id="modal5" class="modal modal-fixed-footer">
         <script src="https://www.google.com/recaptcha/api.js" async defer></script>
         <div class="modal-content">
            <h4>Heads Up (again)!</h4>
            <p>We want to confirm this is you, so please do the reCAPTCHA</p>
            <div class="g-recaptcha" data-sitekey="6LdSGPAZAAAAAMs85kHIOqrMKV7W_nDcJ-V0n2g7"></div>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Go back</a>
            <a class="waves-effect waves-light btn red modal-trigger" href="#modal3" class="red btn waves-effect waves-light">Delete My account</a>
         </div>
      </div>
      <div id="modal3" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Are you very, very, very sure?</h4>
            <p>Don't blame us because we didn't warn you........</p>
            <ul style="list-style-type:circle !important;">
               <li style="list-style-type:circle !important;">Your todos will vanish into thin air</li>
               <li style="list-style-type:circle !important;">Your inventory will vanish into thin air</li>
               <li style="list-style-type:circle !important;">Your  will vanish into thin air</li>
               <li style="list-style-type:circle !important;">Your homes will vanish into thin air</li>
               <li style="list-style-type:circle !important;">You will not be able to ever log in again with these credentials</li>
               <li style="list-style-type:circle !important;">You will not be able use the desktop or mobile app</li>
            </ul>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">That's scary. Never mind</a>
            <a href="./resources/deleted.php?fake=1" class="red btn waves-effect waves-light">I choose to permanently delete my account</a>
         </div>
      </div>
      <div class="tap-target blue text-white" data-target="ienqfj">
         <div class="tap-target-content">
            <h5 style="color:white !important">Hello!</h5>
            <p style="color:white !important">Get started by adding your first item!</p>
         </div>
      </div>
      <div id="credits" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Credits</h4>
            <ul>
               <li>Materialize</li>
               <li>InfinityFree</li>
               <li>CodePen</li>
               <li>Cloudflare</li>
               <li>SQL</li>
               <li>Materialize</li>
               <li>Materialize</li>
               <li>Webestools - for the forum</li>
               <li><a href="https://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/">Very Simple Add, Edit, Delete, View (CRUD) in PHP & MySQL [Beginner Tutorial]</a></li>
               <h5>People</h5>
            </ul>
         </div>
         <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">ok</a> </div>
      </div>
      <div id="security" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Privacy</h4>
            <p>Yes, your data is encrypted end-to-end. We hash your items, so even if a hacker gets access to the database, it will be rendered useless!</p>
         </div>
         <div class="modal-footer"> <a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">ok</a> </div>
      </div>
      <div id="avarar" class="modal modal-fixed-footer">
         <div class="modal-content">
            <a href="#user"><img class="materialboxed" class="circle" src="https://i.ibb.co/1KhCks5/test-png.png" style="display:block;margin:auto;width:80px;"></a><br> 
            <div class="row">
               <div class="col s6 center">
                  <h4 class="center">Upload an image</h4>
                  <a href="https://homebase.rf.gd/playground/imgbb.php" class="btn btn-large red center">Upload an image</a> 
               </div>
               <div class="col s6">
                  <h4 class="center">Or paste an image URL</h4>
                  <form action="avatar.php" method="GET"><input type="text" name="pairingaccountid" placeholder="Avatar (Image URL)"></form>
               </div>
            </div>
         </div>
         <div class="modal-footer"> <button type="submit"class="btn btn-flat waves-effect">Change</button> <a href="#modal1" class="modal-close waves-effect btn-flat modal-trigger">Cancel</a> </div>
      </div>
      <ul id="slide-out" class="sidenav sidenav-fixed">
         <li>
            <div class="user-view">
               <div class="background">
                  <img src="https://besthqwallpapers.com/Uploads/9-8-2019/100569/thumb2-dark-violet-lines-4k-material-design-creative-geometric-shapes.jpg" id ="imageid">
               </div>
               <a href="#user"><img class="circle materialboxed" src="https://i.ibb.co/1KhCks5/test-png.png"></a><!--https://icon-library.com/images/google-user-icon/google-user-icon-21.jpg-->
               <details>
                  <summary><span class="white-text name">Admin</span></summary>
                  <p style="background: white;padding:10px;">Not you? <a href="logout.php">Logout</a></p>
               </details>
               <a href="#email"><span class="white-text email">hello@homebase.rf.gd</span></a>
               <!-- Modal Trigger
                  <a class="waves-effect waves-light btn modal-trigger btn-flat" href="#modal1" style="color:white;margin:0;">Profile</a> -->
            </div>
         </li>
         <li><a class="waves-effect sidenav-close" href="#!"onclick="openPage('News', this, );brandlogotext.innerHTML = 'Homebase'" id="defaultOpen"><i class="material-icons">home</i>Home   </a></li>
         <li style="height:0;opacity:0;width:0;"><a class="waves-effect"onclick="openPage('loader', this, );" ><i class="material-icons">home</i>Home   </a></li>
         <li><a class="waves-effect" onclick="addOrUpdateUrlParam('room', 1);openPage('Contact', this, '');brandlogotext.innerHTML = 'Kitchen';"><i class="material-icons">kitchen</i>Kitchen</a></li>
         <li><a class="waves-effect sidenav-close" onclick="openPage('Home', this, '');brandlogotext.innerHTML = 'Bedroom'"><i class="material-icons">bed</i>Bedroom</a></li>
         <li>
            <div class="divider">
            </div>
         </li>
         <li><a class="subheader">Profile</a></li>
         <li><a class="waves-effect " href="#modal1"onclick="openPage('myDIVa', this, '');brandlogotext.innerHTML = 'Inbox'"><i class="material-icons">inbox</i>Notifications <span id="badge" class="badge"></span>
</a></li>
      </ul>
      <div class="fixed-action-btn" id="fab">
         <a class="btn-floating btn-large waves-effect waves-light FLOATING_ACTION_BUTTON" style="background:var(--navbar-color);z-index:99999999999999999999999999999999999999 !important" id="ienqfj">
         <i class="large material-icons" style="color:white !important">add</i>
         </a>
      </div>
      <!--CONTENT BEGINS-->
      <div id="CONTENT" tabindex="0" style="outline: 0;">
      <div id="div1"></div>
      <div class="loader" class="tabcontent">
         <div style="width:100%;height:63vh;background: rgba(200,200,200,0.3)" class="demoa"></div>
         <div class="row">
            <div class="col s6 onup100">
               <div class="demo" style="display:block !important;height:35vh;overflow:hidden"></div>
            </div>
            <div class="col s6 hide-on-small-only">
               <div class="demo" style="display:block !important;height:35vh;overflow:hidden"></div>
            </div>
         </div>
         <div id="laundryroom" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                     <td>Name</td>
                     <td>Quantity</td>
                     <td class="d-none">Price</td>
                     <td style="width:10%">Actions</td>
                  </tr>
                  <tr><td>Laundry</td><td>443298</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                     <a class="dropbtn"><i class='material-icons'>more_vert</i></a><div class='dropdown-contenta' style='float:right'></a>
                     <a href="edit.php?fake=2" style="float:none">
                     <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                     </a>
                     <div><a href=".delete.php?fake2" onClick="return confirm('Are you sure you want to delete?')">
                     <i class='material-icons'>delete</i> Delete
                     </a></div>
                     </div> </div>
                     </td><tr><td>hi</td><td>hi</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                     <a class="dropbtn"><i class='material-icons'>more_vert</i></a><div class='dropdown-contenta' style='float:right'></a>
                     <a href="edit.php?fake=1" style="float:none">
                     <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                     </a>
                     <div><a href=".delete.php?fake1" onClick="return confirm('Are you sure you want to delete?')">
                     <i class='material-icons'>delete</i> Delete
                     </a></div>
                     </div> </div>
                     </td>               </table>
            </div>
         </div>
         <div id="budgetmetermodal" class="tabcontent">
            <div class='container'>
            <a href="#bmmodal" class="btn modal-close waves-effect waves-light right green modal-trigger">Add a point</a>
            <h4>My budget meter</h4>
            <table class="table table-striped " id="myTable">
               <tr >
                  <!--<td>Name</td>-->
                  <td>Price</td>
                  <td class="d-none">Price</td>
                  <td style="width:10%">Actions</td>
               </tr>
               <tr><td>14</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=119" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake119"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>12</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=118" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake118"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>12</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=103" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake103"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>12</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=80" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake80"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>23</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=78" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake78"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>21</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=77" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake77"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>12</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=76" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake76"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>5</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=75" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake75"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>4</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=70" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake70"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>2</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=69" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake69"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>9</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=68" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake68"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>6</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=67" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake67"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>5</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=66" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake66"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>4</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=64" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake64"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>4</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=63" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake63"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td><tr><td>5</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                  <i class='material-icons'>more_vert</i><div class='dropdown-contenta' style='float:right'></a>
                  <a href="edit.php?fake=62" style="float:none">
                  <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                  </a>
                  <div><a href="https://homebase.rf.gd/scalesize/bm/delete.php?fake62"">
                  <i class='material-icons'>delete</i> Delete
                  </a></div>
                  </div> </div>
                  </td>            </table>
            </div>
      </div>
         <div id="addkitchen" class="tabcontent">
         <div class="container">
         <h5>Add an item (Kitchen)</h5>
          <form onsubmit="return false" method="GET" name="form1">
   <div class="row">
      <div class="input-group col s10 input-field "> 
         <label onclick="this.nextSibling.focus()">Item Name</label><input type="text" name="name" autocomplete="off" class="form-control autocomplete" id="tags" value="" class="autocomplete"> 
      </div>
      <div class="col s2"> 
         <a href="./upload/upload.php"class="btn btn-flat waves-effect btn-large" style='position: relative;bottom: -10px;'><i class="material-icons">camera_alt</i></a> 
      </div>
      <div class="col s12">
      <div class="input-field">
      <label>Quantity</label>
      <input type="text" name="qty"  id="qty" class="form-control" value="1" autocompletae="off">
   </div>
   </div>
   </div>
   <div style="height:0;width:0;display:none">
      <input type="text" name="price" id="date" class="form-control" value="1">
   </div>
   <button type="submit" name="Submit" value="Add" class="btn green waves-effect waves-light btn-large" onclick="add()">Add</button>
</form>
</div>
            </div>
         <div id="cs" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                     <td>Name</td>
                     <td>Quantity</td>
                     <td class="d-none">Price</td>
                     <td style="width:10%">Actions</td>
                  </tr>
                  <tr><td>Something Clever......</td><td>53</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                     <a class="dropbtn"><i class='material-icons'>more_vert</i></a><div class='dropdown-contenta' style='float:right'></a>
                     <a href="./camping/edit.php?fake=1" style="float:none">
                     <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                     </a>
                     <div><a href="./camping/delete.php?fake1" onClick="return confirm('Are you sure you want to delete?')">
                     <i class='material-icons'>delete</i> Delete
                     </a></div>
                     </div> </div>
                     </td>               </table>
            </div>
         </div>
         <div id="Home" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                     <td>Name</td>
                     <td>Quantity</td>
                     <td class="d-none">Price</td>
                     <td style="width:10%">Actions</td>
                  </tr>
                  <tr><td>Item </td><td>qty</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                     <a class="dropbtn"><i class='material-icons'>more_vert</i></a><div class='dropdown-contenta' style='float:right'></a>
                     <a href="./bedroom/edit.php?fake=14" style="float:none">
                     <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                     </a>
                     <div><a href="./bedroom/delete.php?fake14" onClick="return confirm('Are you sure you want to delete?')">
                     <i class='material-icons'>delete</i> Delete
                     </a></div>
                     </div> </div>
                     </td><tr><td>Item name </td><td>qty</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                     <a class="dropbtn"><i class='material-icons'>more_vert</i></a><div class='dropdown-contenta' style='float:right'></a>
                     <a href="./bedroom/edit.php?fake=13" style="float:none">
                     <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                     </a>
                     <div><a href="./bedroom/delete.php?fake13" onClick="return confirm('Are you sure you want to delete?')">
                     <i class='material-icons'>delete</i> Delete
                     </a></div>
                     </div> </div>
                     </td><tr><td>Item name </td><td>qty</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                     <a class="dropbtn"><i class='material-icons'>more_vert</i></a><div class='dropdown-contenta' style='float:right'></a>
                     <a href="./bedroom/edit.php?fake=12" style="float:none">
                     <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                     </a>
                     <div><a href="./bedroom/delete.php?fake12" onClick="return confirm('Are you sure you want to delete?')">
                     <i class='material-icons'>delete</i> Delete
                     </a></div>
                     </div> </div>
                     </td><tr><td>Hi there!</td><td>bye</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                     <a class="dropbtn"><i class='material-icons'>more_vert</i></a><div class='dropdown-contenta' style='float:right'></a>
                     <a href="./bedroom/edit.php?fake=10" style="float:none">
                     <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                     </a>
                     <div><a href="./bedroom/delete.php?fake10" onClick="return confirm('Are you sure you want to delete?')">
                     <i class='material-icons'>delete</i> Delete
                     </a></div>
                     </div> </div>
                     </td><tr><td>hi</td><td>1</td><td class="d-none">1</td><td><div class='dropdown' tabindex='0'>
                     <a class="dropbtn"><i class='material-icons'>more_vert</i></a><div class='dropdown-contenta' style='float:right'></a>
                     <a href="./bedroom/edit.php?fake=9" style="float:none">
                     <div><i class='material-icons' style="float:none">edit</i> Edit</div>
                     </a>
                     <div><a href="./bedroom/delete.php?fake9" onClick="return confirm('Are you sure you want to delete?')">
                     <i class='material-icons'>delete</i> Delete
                     </a></div>
                     </div> </div>
                     </td>               </table>
            </div>
         </div>
         <div id="modal1" class="tabcontent" style="min-height:80%;min-width:90%">
            <!--SETTINGS MODAL-->
            <div class="container medianopadding">
            <div class="mediapadding">
               <a href="#user"><img class="materialboxed" class="circle" src="https://i.ibb.co/1KhCks5/test-png.png" style="float:right;width:80px;border-radius:9999px"></a>
               <!-- Tap Target Structure -->
               <h4 style="color: var(--font-color)">Admin</h4>
               <p>Email: hello@homebase.rf.gd</p>
               <p>Your login ID: 1</p>
               </div>
               <form action="darken.php" method="GET">
                  <div class="collection">
                     <script>
                        window.onload = function() {
                                var elems  = document.querySelectorAll("input[type=range]");
                                M.Range.init(elems);
                        };
                     </script>
                  </div>
                  <ul class="collapsible">
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">filter_drama</i>Preferences</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a class="collection-item">
                                 Dark mode
                                 <div class="switch" style="float:right">
                                    <label>
                                    <input type="checkbox" name="pairingaccountid" value="dark" id="darkmode">
                                    <span class="lever"></span>
                                    </label>
                                 </div>
                              </a>
                              <a class="waves-effect collection-item modal-trigger  modal-close" href="#avarar" >Change my avatar</a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">verified_user</i>Privacy</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a class="collection-item">
                                 Send stats to us for development purposes
                                 <div class="switch" style="float:right">
                                    <label>
                                    <input type="checkbox" name="notificationssettings" value="on" >
                                    <span class="lever"></span>
                                    </label>
                                 </div>
                              </a>
                              <a class="waves-effect collection-item modal-trigger  modal-close" href="#security" >Privacy</a>
                              <a class="waves-effect collection-item modal-trigger  modal-close" href="#pair" onclick="syncalertplayAudio();">Pair my account</a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">help</i>Help</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a onclick="$('.tap-target').tapTarget('open')" class="modal-close collection-item waves-effect"> How do I add an item </a>
                              <a class="collection-item" href="https://homebase.rf.gd/forum/index.php">Forum</a>
                              <a class="collection-item" href="https://homebase.rf.gd/blog/index.php">Blog</a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">notifications</i>Notifications</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a class="collection-item">
                                 Notifications
                                 <div class="switch" style="float:right">
                                    <label>
                                    <input type="checkbox" name="notificationssettings" value="on" >
                                    <span class="lever"></span>
                                    </label>
                                 </div>
                              </a>
                              <a class="collection-item" onclick="$('.modal').modal('close');$('#key').modal('open');">Keyboard Shortcuts</a> 
                              <a class="collection-item">
                                 <div class="row">
                                    <div class="col s10">
                                       Only remind me when I have anything less than <u>97 items</u>
                                    </div>
                                    <div class="col s2">
                                       <div class="range-field" style="width:100%;float:right; margin-top:-10px;background:transparent;max-height:20px;">
                                          <input type="range" min="0" max="100" step="1" oninput="showVal(this.value)" onchange="showVal(this.value)" name="number_notify" value="97">
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">info</i>More</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a class="waves-effect collection-item modal-trigger modal-close" href="#credits">Credits</a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">keyboard</i>Keyboard Shortcuts</div>
                        <div class="collapsible-body">
                           <h4 style="color: var(--font-color)">Keyboard Shortcuts</h4>
                           <p>CTRL F - Focus on search bar</p>
                           <p>CTRL B - View Notifications</p>
                           <p>CTRL S - Add item</p>
                           <p>CTRL E - Open settings</p>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">code</i>Developer</div>
                        <div class="collapsible-body">
                           <p>Coming Soon!</p>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">sync</i>Sync your account </div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <a class="waves-effect collection-item modal-trigger  modal-close" href="#pair" onclick="syncalertplayAudio();">Pair my account</a>
                           </ul>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">get_app</i>Download the App! </div>
                        <div class="collapsible-body">
                           <p><a href="#">Desktop App</a></p>
                           <p><a href="#">Phone App</a></p>
                        </div>
                     </li>
                     <li>
                        <div class="collapsible-header waves-effect"><i class="material-icons">warning</i>Delete my account</div>
                        <div class="collapsible-body">
                           <ul class="collection">
                              <p style="color:red">Please note that this is an irreversible action</p>
                              <a class="waves-effect collection-item modal-trigger modal-close" href="#modal2">Delete My Account</a>
                           </ul>
                        </div>
                     </li>
                  </ul>
                  <button type="submit" class="btn green waves-effect btn-large waves-light">Save (Requires login)</button><br><br>
            </div>
            </form>
         </div>
         <div id="News" class="tabcontent" style=" background:var(--bg-color);color:  background:var(--font-color)">
            <div style="width: 100%;height:400px !important;background:var(--chart-color) !important;">
                           <canvas id="myChart" style="width: 100%;height:200px !important;background: background:var(--chart-color) !important;" class="ree"></canvas>            </div>
            <div class="row" style="margin:0 !important">
               <div class="col s6 hide-on-small-only" style="margin:0 !important">
                  <p class='center'>Todo </p>
                  <div class='card'>
                     <div class='card-content'>
                     <span class='card-title activator'>Make homebase more user friendly
                     <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                     <span>Priority: High</span><br> 
                     </div>
                     <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                           <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                     <span>Description: </span>
                     </div>
                     <div class='card-action' style='z-index: 0 !important;'>
                     <a href="./todo/edit.php?fake=81" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>edit</i>
                     </a> <a onclick='$("#div1").load("./todo/delete.php?fake81");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>delete</i>
                     </a>
                     </div></div><div class='card'>
                     <div class='card-content'>
                     <span class='card-title activator'>Fix bug in homebase
                     <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                     <span>Priority: High</span><br> 
                     </div>
                     <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                           <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                     <span>Description: </span>
                     </div>
                     <div class='card-action' style='z-index: 0 !important;'>
                     <a href="./todo/edit.php?fake=80" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>edit</i>
                     </a> <a onclick='$("#div1").load("./todo/delete.php?fake80");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>delete</i>
                     </a>
                     </div></div><div class='card'>
                     <div class='card-content'>
                     <span class='card-title activator'>Finish history hw
                     <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                     <span>Priority: Lowest</span><br> 
                     </div>
                     <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                           <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                     <span>Description: </span>
                     </div>
                     <div class='card-action' style='z-index: 0 !important;'>
                     <a href="./todo/edit.php?fake=79" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>edit</i>
                     </a> <a onclick='$("#div1").load("./todo/delete.php?fake79");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>delete</i>
                     </a>
                     </div></div><div class='card'>
                     <div class='card-content'>
                     <span class='card-title activator'>Finish ELA hw
                     <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                     <span>Priority: Lowest</span><br> 
                     </div>
                     <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                           <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                     <span>Description: </span>
                     </div>
                     <div class='card-action' style='z-index: 0 !important;'>
                     <a href="./todo/edit.php?fake=78" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>edit</i>
                     </a> <a onclick='$("#div1").load("./todo/delete.php?fake78");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>delete</i>
                     </a>
                     </div></div><div class='card'>
                     <div class='card-content'>
                     <span class='card-title activator'>Play minecraft
                     <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                     <span>Priority: Lowest</span><br> 
                     </div>
                     <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                           <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                     <span>Description: </span>
                     </div>
                     <div class='card-action' style='z-index: 0 !important;'>
                     <a href="./todo/edit.php?fake=77" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>edit</i>
                     </a> <a onclick='$("#div1").load("./todo/delete.php?fake77");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>delete</i>
                     </a>
                     </div></div><div class='card'>
                     <div class='card-content'>
                     <span class='card-title activator'>Finish math HW
                     <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                     <span>Priority: High</span><br> 
                     </div>
                     <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                           <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                     <span>Description: </span>
                     </div>
                     <div class='card-action' style='z-index: 0 !important;'>
                     <a href="./todo/edit.php?fake=76" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>edit</i>
                     </a> <a onclick='$("#div1").load("./todo/delete.php?fake76");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>delete</i>
                     </a>
                     </div></div><div class='card'>
                     <div class='card-content'>
                     <span class='card-title activator'>Walk the dog
                     <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                     <span>Priority: High</span><br> 
                     </div>
                     <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                           <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                     <span>Description: </span>
                     </div>
                     <div class='card-action' style='z-index: 0 !important;'>
                     <a href="./todo/edit.php?fake=75" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>edit</i>
                     </a> <a onclick='$("#div1").load("./todo/delete.php?fake75");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                     <i class='material-icons'>delete</i>
                     </a>
                     </div></div>               </div>
               <div class="col s6 hide-on-small-only ">
                  <style>.search {width: 50%}
                     input {color: var(--font-color)}
                     ::placeholder {color: var(--font-color)}
                     .new:after{display:none}.card{background:rgba(255,255,255,0)!important}.card-reveal{background:var(--bg-color)!important}.demo{margin:auto;width:100%;height:600px;position:relative;left:-50px;margin-top:20px;background-image:radial-gradient(circle 0 at 0 0,#fff 99%,transparent 0),linear-gradient(100deg,transparent,var(--bg-color) 50%,transparent 100%),linear-gradient(var(--skeleton-color) 20px,transparent 0),linear-gradient(var(--skeleton-color) 20px,transparent 0);background-repeat:repeat-y;background-size:90px 90px,100px 90px,150px 90px,100% 90px,500px 90px,100% 90px;background-position:0 0,0 0,120px 0,120px 40px,120px 80px,120px 120px;animation:shine 2s infinite}@keyframes shine{to{background-position:0 0,150% 0,120px 0,120px 40px,120px 80px,120px 120px}}
                  </style>
                  <p class='center'>Grocery list</p>
                  <div class='card'>
                        <div class='card-content'>
                        <div style='float:right'>
                        <a href="edit.php?fake=36" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>edit</i>
                        </a> <a onclick='$("#div1").load("delete.php?fake36");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>delete</i>
                        </a>
                        </div><span class='card-title'>Apples
                        </span>
                        <span>Quantity: 1</span><br> 
                        </div>
                        </div>               </div>
            </div>
            <div class="s6 hide-on-med-and-up" >
               <div class="col s12" style="margin:0 !important">
                  <ul class="tabs" style="margin:0 !important">
                     <li class="tab col s3 active"><a href="#test1" class="active">Todo</a></li>
                     <li class="tab col s3"><a href="#test4">Grocery List</a></li>
                  </ul>
               </div>
               <div id="test1" class="col s12" >
                  <div style="padding: 30px;">
                     <div class="dd">
                        <img src='https://i.ibb.co/KX0bKPk/gummy-coffee.png'width='300px' style='display:block;margin:auto;'><br>
                        <p class='center'>Great job - you finished all tasks! Why not take this time to drink some coffee or go for a walk?</p>
                     </div>
                     <div class='card'>
                        <div class='card-content'>
                        <span class='card-title activator'>Make homebase more user friendly
                        <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                        <span>Priority: High</span><br> 
                        </div>
                        <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                              <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                        <span>Description: </span>
                        </div>
                        <div class='card-action' style='z-index: 0 !important;'>
                        <a href="./todo/edit.php?fake=81" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>edit</i>
                        </a> <a onclick='$("#div1").load("./todo/delete.php?fake81");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>delete</i>
                        </a>
                        </div></div><div class='card'>
                        <div class='card-content'>
                        <span class='card-title activator'>Fix bug in homebase
                        <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                        <span>Priority: High</span><br> 
                        </div>
                        <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                              <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                        <span>Description: </span>
                        </div>
                        <div class='card-action' style='z-index: 0 !important;'>
                        <a href="./todo/edit.php?fake=80" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>edit</i>
                        </a> <a onclick='$("#div1").load("./todo/delete.php?fake80");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>delete</i>
                        </a>
                        </div></div><div class='card'>
                        <div class='card-content'>
                        <span class='card-title activator'>Finish history hw
                        <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                        <span>Priority: Lowest</span><br> 
                        </div>
                        <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                              <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                        <span>Description: </span>
                        </div>
                        <div class='card-action' style='z-index: 0 !important;'>
                        <a href="./todo/edit.php?fake=79" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>edit</i>
                        </a> <a onclick='$("#div1").load("./todo/delete.php?fake79");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>delete</i>
                        </a>
                        </div></div><div class='card'>
                        <div class='card-content'>
                        <span class='card-title activator'>Finish ELA hw
                        <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                        <span>Priority: Lowest</span><br> 
                        </div>
                        <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                              <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                        <span>Description: </span>
                        </div>
                        <div class='card-action' style='z-index: 0 !important;'>
                        <a href="./todo/edit.php?fake=78" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>edit</i>
                        </a> <a onclick='$("#div1").load("./todo/delete.php?fake78");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>delete</i>
                        </a>
                        </div></div><div class='card'>
                        <div class='card-content'>
                        <span class='card-title activator'>Play minecraft
                        <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                        <span>Priority: Lowest</span><br> 
                        </div>
                        <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                              <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                        <span>Description: </span>
                        </div>
                        <div class='card-action' style='z-index: 0 !important;'>
                        <a href="./todo/edit.php?fake=77" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>edit</i>
                        </a> <a onclick='$("#div1").load("./todo/delete.php?fake77");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>delete</i>
                        </a>
                        </div></div><div class='card'>
                        <div class='card-content'>
                        <span class='card-title activator'>Finish math HW
                        <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                        <span>Priority: High</span><br> 
                        </div>
                        <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                              <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                        <span>Description: </span>
                        </div>
                        <div class='card-action' style='z-index: 0 !important;'>
                        <a href="./todo/edit.php?fake=76" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>edit</i>
                        </a> <a onclick='$("#div1").load("./todo/delete.php?fake76");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>delete</i>
                        </a>
                        </div></div><div class='card'>
                        <div class='card-content'>
                        <span class='card-title activator'>Buy new domain
                        <span style='float:right' class='badge'>Due on 1/1/1</span></span>
                        <span>Priority: High</span><br> 
                        </div>
                        <div class="card-reveal" style='z-index:1;overflow:scroll !important'>
                              <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                        <span>Description: </span>
                        </div>
                        <div class='card-action' style='z-index: 0 !important;'>
                        <a href="./todo/edit.php?fake=75" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>edit</i>
                        </a> <a onclick='$("#div1").load("./todo/delete.php?fake75");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>delete</i>
                        </a>
                        </div></div>                  </div>
               </div>
               <div id="test4" class="col s12 container">
                  <div class='card'>
                        <div class='card-content'>
                        <div style='float:right'>
                        <a href="edit.php?fake=36" class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>edit</i>
                        </a> <a onclick='$("#div1").load("delete.php?fake36");this.parentElement.parentElement.style.display="none";'  class='btn btn-flat waves-effect 'style='z-index: 0 !important;margin:0 !important'>
                        <i class='material-icons'>delete</i>
                        </a>
                        </div><span class='card-title'>Buy new domain
                        </span>
                        <span>Quantity: 1</span><br> 
                        </div>
                        </div>               </div>
            </div>
         </div>
         <div id="searchresults" class="tabcontent">
            <div class="container">
            <h4 class="center">Search results for "<span id="sr"></span>"</h4>
               <ul class="collection with-header" id="myUL">
                  <li class="collection-item"><a href="#!" >Kitchen<span class="new badge">Room</span></a></li>
                  <li class="collection-item"><a href="#!" >Bedroom<span class="new badge">Room</span></a></li>
                  <li class="collection-item"><a href="#!" >Bathroom<span class="new badge">Room</span></a></li>
                  <li class="collection-item"><a href="#!" >Dining room<span class="new badge">Room</span></a></li>
                  <li class="collection-item"><a href="#!" >Grocery list<span class="new badge">Addon</span></a></li>
                  <li class="collection-item"><a href="#!" >Garage<span class="new badge">Room</span></a></li>
                  <li class="collection-item"><a href="#!" >Family room<span class="new badge">Room</span></a></li>
                  <li class="collection-item"><a href="#!" >My todo list<span class="new badge">Addon</span></a></li>
                  <li class="collection-item"><a href="#!" >Storage room<span class="new badge">Room</span></a></li>
                  <li class="collection-item"><a href="#!" >Settings<span class="new badge">Page</span></a></li>
                  <li class="collection-item"><a href="#!" >My Profile<span class="new badge">Page</span></a></li>
                  <li class="collection-item" onclick="openPage('gl', this, '');M.toast({html: 'Grocery List'})"><a>Buy new domain<span class="new badge red">Grocery List</span><span class="new badge red">1</span></a></li> <li class="collection-item" onclick="openPage('About', this, '');M.toast({html: 'Garage'})"><a>a<span class="new badge green">Garage</span><span class="new badge green">2147483647</span></a></li><li class="collection-item" onclick="openPage('About', this, '');M.toast({html: 'Garage'})"><a>Something <span class="new badge green">Garage</span><span class="new badge green">12</span></a></li><li class="collection-item" onclick="openPage('About', this, '');M.toast({html: 'Garage'})"><a>reeeeeee<span class="new badge green">Garage</span><span class="new badge green">1234</span></a></li><li class="collection-item" onclick="openPage('About', this, '');M.toast({html: 'Garage'})"><a>ADMIN<span class="new badge green">Garage</span><span class="new badge green">1</span></a></li><li class="collection-item" onclick="openPage('About', this, '');M.toast({html: 'Garage'})"><a>wrench<span class="new badge green">Garage</span><span class="new badge green">1</span></a></li><li class="collection-item" onclick="openPage('About', this, '');M.toast({html: 'Garage'})"><a>wrench<span class="new badge green">Garage</span><span class="new badge green">12</span></a></li><li class="collection-item" onclick="openPage('About', this, '');M.toast({html: 'Garage'})"><a>hi<span class="new badge green">Garage</span><span class="new badge green">1</span></a></li> <li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Napa<span class="new badge blue">Kitchen</span><span class="new badge blue">91</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Perl<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>JavaScript<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Asian Pear<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Asparagus<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>php<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Zucchini Squash<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Coriander<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Loquat<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Orange<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Kidney beans<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Broccoflower<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Kumquat<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Python<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>sasasasasasadsas<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>https://josiasdev.best/free-hosting-services-for-web-developers<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>asd<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>afd;jlks<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>d<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>added<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Item eh<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>Item name<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li><li class="collection-item" onclick="openPage('Contact', this, '');M.toast({html: 'Kitchen'})"><a>item<span class="new badge blue">Kitchen</span><span class="new badge blue">1</span></a></li>  <li class="collection-item" onclick="openPage('storage', this, '');M.toast({html: 'Storage Room'})"><a>Storage room<span class="new badge green" style="background: #d81b60 !important">Storage</span><span class="new badge green" style="background: #d81b60 !important">213</span></a></li><li class="collection-item" onclick="openPage('storage', this, '');M.toast({html: 'Storage Room'})"><a>STORAGE<span class="new badge green" style="background: #d81b60 !important">Storage</span><span class="new badge green" style="background: #d81b60 !important">2</span></a></li><li class="collection-item" onclick="openPage('storage', this, '');M.toast({html: 'Storage Room'})"><a>meh<span class="new badge green" style="background: #d81b60 !important">Storage</span><span class="new badge green" style="background: #d81b60 !important">bleb</span></a></li> <li class="collection-item" onclick="openPage('Home', this, '');M.toast({html: 'Bedroom'})"><a>Item <span class="new badge green" style="background: #00bcd4 !important">Bedroom</span><span class="new badge green" style="background: #00bcd4 !important">qty</span></a></li><li class="collection-item" onclick="openPage('Home', this, '');M.toast({html: 'Bedroom'})"><a>Item name <span class="new badge green" style="background: #00bcd4 !important">Bedroom</span><span class="new badge green" style="background: #00bcd4 !important">qty</span></a></li><li class="collection-item" onclick="openPage('Home', this, '');M.toast({html: 'Bedroom'})"><a>Item name <span class="new badge green" style="background: #00bcd4 !important">Bedroom</span><span class="new badge green" style="background: #00bcd4 !important">qty</span></a></li><li class="collection-item" onclick="openPage('Home', this, '');M.toast({html: 'Bedroom'})"><a>Hi there!<span class="new badge green" style="background: #00bcd4 !important">Bedroom</span><span class="new badge green" style="background: #00bcd4 !important">bye</span></a></li><li class="collection-item" onclick="openPage('Home', this, '');M.toast({html: 'Bedroom'})"><a>hi<span class="new badge green" style="background: #00bcd4 !important">Bedroom</span><span class="new badge green" style="background: #00bcd4 !important">1</span></a></li>               </ul>
            </div>
         </div>
         <div id="myDIVa" class="tabcontent">
            <h3 class="center">Inbox</h3>
            <div class="container">
               <ul class="collection" style="border:0 !important;background:var(--bg-color); " id="menu">
                   
                  
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Napa soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Perl soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of JavaScript soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Asian Pear soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Asparagus soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of php soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Zucchini Squash soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Coriander soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Loquat soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Orange soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Kidney beans soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Broccoflower soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Kumquat soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Python soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of sasasasasasadsas soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of https://josiasdev.best/free-hosting-services-for-web-developers soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of asd soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of afd;jlks soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of d soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of added soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Item eh soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of Item name soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle blue" style="color:white !important">kitchen</i>
                     <span class="title">Kitchen</span>
                     <p>You're going to run out of item soon</p> 
                  </li>
                  
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle red" style="color:white !important">bed</i>
                     <span class="title">Bedroom</span>
                     <p>You're going to run out of hi soon</p> 
                  </li>
                   
                  </li>
                  
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle yellow" style="color:white !important">directions_car</i>
                     <span class="title">Garage</span>
                     <p>You're going to run out of Something  soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle yellow" style="color:white !important">directions_car</i>
                     <span class="title">Garage</span>
                     <p>You're going to run out of ADMIN soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle yellow" style="color:white !important">directions_car</i>
                     <span class="title">Garage</span>
                     <p>You're going to run out of wrench soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle yellow" style="color:white !important">directions_car</i>
                     <span class="title">Garage</span>
                     <p>You're going to run out of wrench soon</p>
                     <li class="collection-item avatar waves-effect">
                     <i class="material-icons circle yellow" style="color:white !important">directions_car</i>
                     <span class="title">Garage</span>
                     <p>You're going to run out of hi soon</p> 
                  </li>
                  <li class="collection-item avatar" onclick="$('.tap-target').tapTarget('open')" >
                     <i class="material-icons circle green" style="color:white !important">insert_chart</i>
                     <span class="title">Welcome to homebase</span>
                     <a href="https://homebasedocs.gitbook.io/docs/">
                        <p>Click here to get started
                        </p>
                     </a>
                  </li>
                  <li class="collection-item avatar" onclick="$('.tap-target').tapTarget('open')" >
                     <i class="material-icons circle red" style="color:white !important">help</i>
                     <span class="title">Nothing more</span>
                     <p>Click here to add your first item
                     </p>
                  </li>
               </ul>
            </div>
         </div>
         <div id="Contact" class="tabcontent">
            
                   <div class="right search"><input type="search" id="kitchen_search" placeholder="Search..."></div>
                    <table class="table container" id="kitchen_table">
               <tr >
               <td>Name</td>
               <td>Quantity</td>
               <td class="d-none">Price</td>
               <td style="width:10%">Actions</td>
               </tr><tr><td>Napa</td><td>91</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=206" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Napa", "91");$("#div1").load("delete.php?fake206");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Napa&personname=Admin&itemqty=91&room=kitchen&id=206&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Asian Pear</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=203" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Asian Pear", "1");$("#div1").load("delete.php?fake203");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Asian Pear&personname=Admin&itemqty=1&room=kitchen&id=203&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Asparagus</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=202" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Asparagus", "1");$("#div1").load("delete.php?fake202");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Asparagus&personname=Admin&itemqty=1&room=kitchen&id=202&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Zucchini Squash</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=200" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Zucchini Squash", "1");$("#div1").load("delete.php?fake200");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Zucchini Squash&personname=Admin&itemqty=1&room=kitchen&id=200&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Coriander</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=199" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Coriander", "1");$("#div1").load("delete.php?fake199");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Coriander&personname=Admin&itemqty=1&room=kitchen&id=199&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Loquat</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=198" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Loquat", "1");$("#div1").load("delete.php?fake198");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Loquat&personname=Admin&itemqty=1&room=kitchen&id=198&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Orange</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=197" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Orange", "1");$("#div1").load("delete.php?fake197");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Orange&personname=Admin&itemqty=1&room=kitchen&id=197&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Kidney beans</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=196" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Kidney beans", "1");$("#div1").load("delete.php?fake196");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Kidney beans&personname=Admin&itemqty=1&room=kitchen&id=196&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Broccoflower</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=195" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Broccoflower", "1");$("#div1").load("delete.php?fake195");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Broccoflower&personname=Admin&itemqty=1&room=kitchen&id=195&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Kumquat</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=194" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Kumquat", "1");$("#div1").load("delete.php?fake194");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Kumquat&personname=Admin&itemqty=1&room=kitchen&id=194&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Python</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=193" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Python", "1");$("#div1").load("delete.php?fake193");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Python&personname=Admin&itemqty=1&room=kitchen&id=193&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>sasasasasasadsas</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=192" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("sasasasasasadsas", "1");$("#div1").load("delete.php?fake192");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=sasasasasasadsas&personname=Admin&itemqty=1&room=kitchen&id=192&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>https://josiasdev.best/free-hosting-services-for-web-developers</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=191" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("https://josiasdev.best/free-hosting-services-for-web-developers", "1");$("#div1").load("delete.php?fake191");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=https://josiasdev.best/free-hosting-services-for-web-developers&personname=Admin&itemqty=1&room=kitchen&id=191&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>asd</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=182" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("asd", "1");$("#div1").load("delete.php?fake182");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=asd&personname=Admin&itemqty=1&room=kitchen&id=182&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>afd;jlks</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=181" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("afd;jlks", "1");$("#div1").load("delete.php?fake181");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=afd;jlks&personname=Admin&itemqty=1&room=kitchen&id=181&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>d</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=180" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("d", "1");$("#div1").load("delete.php?fake180");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=d&personname=Admin&itemqty=1&room=kitchen&id=180&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>added</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=178" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("added", "1");$("#div1").load("delete.php?fake178");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=added&personname=Admin&itemqty=1&room=kitchen&id=178&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Item eh</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=177" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Item eh", "1");$("#div1").load("delete.php?fake177");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Item eh&personname=Admin&itemqty=1&room=kitchen&id=177&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>Item name</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=170" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("Item name", "1");$("#div1").load("delete.php?fake170");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=Item name&personname=Admin&itemqty=1&room=kitchen&id=170&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
               <tr><td>item</td><td>1</td><td class="d-none">1.00</td><td> 
               <div class="dropdown" tabindex='0'>
               <a class="dropbtn"><i class='material-icons'>more_vert</i></a>
               <div class="dropdown-contenta">
               <a href="edit.php?fake=162" class='waves-effect'><i class='material-icons'>edit</i>Edit</a>
               <a onclick='toast("item", "1");$("#div1").load("delete.php?fake162");this.parentElement.parentElement.parentElement.parentElement.style.display="none";' class='waves-effect'><i class='material-icons'>delete</i>Delete</a><a href='https://homebase.rf.gd/homebase//share/?name=item&personname=Admin&itemqty=1&room=kitchen&id=162&new=true' class='waves-effect'><i class='material-icons'>share</i>Share</a>
               </div>
               </div></td>
                           </table>
         </div>
         <div id="dining_room" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                     <td>Name</td>
                     <td>Quantity</td>
                     <td class="d-none">Price</td>
                     <td style="width:10%">Actions</td>
                  </tr>
                  <tr><td>HI THERE<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span></td><td>BYE</td><td class="d-none">1</td><td><a href="./dining_room/edit.php?fake=4"><i class='material-icons'>edit</i></a> <a href="./dining_room/delete.php?fake4" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>HI THERE<span clas='badge red' style='float:right;color:white;padding: 4px;background: #2BBBAD !Important'>Synced</span></td><td>BYE</td><td class="d-none">1</td><td><a href="./dining_room/edit.php?fake=3"><i class='material-icons'>edit</i></a> <a href="./dining_room/delete.php?fake3" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>FORK</td><td>12</td><td class="d-none">1</td><td><a href="./dining_room/edit.php?fake=2"><i class='material-icons'>edit</i></a> <a href="./dining_room/delete.php?fake2" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td>               </table>
            </div>
         </div>
         <div id="family" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                  <td>Name</td>
                  <td>Quantity</td>
                  <td class="d-none">Price</td>
                  <td style="width:10%">Actions</td>
                  </tr><tr><td>FAMILY ROOM</td><td>912847981274891</td><td class="d-none">1</td><td><a href="./family/edit.php?fake=6"><i class='material-icons'>edit</i></a> <a href="./family/delete.php?fake6" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>FAMILY ROOM</td><td>12</td><td class="d-none">1</td><td><a href="./family/edit.php?fake=5"><i class='material-icons'>edit</i></a> <a href="./family/delete.php?fake5" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td>               </table>
            </div>
         </div>
         <div id="bathroom" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                     <td>Name</td>
                     <td>Quantity</td>
                     <td class="d-none">Price</td>
                     <td style="width:10%">Actions</td>
                  </tr>
                                 </table>
            </div>
         </div>
         <div id="storage" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                     <td>Name</td>
                     <td>Quantity</td>
                     <td class="d-none">Price</td>
                     <td style="width:10%">Actions</td>
                  </tr>
                  <tr><td>Storage room</td><td>213</td><td class="d-none">1</td><td><a href="./storage/edit.php?fake=4"><i class='material-icons'>edit</i></a> <a href="./storage/delete.php?fake4" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>STORAGE</td><td>2</td><td class="d-none">1</td><td><a href="./storage/edit.php?fake=3"><i class='material-icons'>edit</i></a> <a href="./storage/delete.php?fake3" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>meh</td><td>bleb</td><td class="d-none">1</td><td><a href="./storage/edit.php?fake=2"><i class='material-icons'>edit</i></a> <a href="./storage/delete.php?fake2" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td>               </table>
            </div>
         </div>
         <div id="gl" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                     <td>Name</td>
                     <td>Quantity</td>
                     <td class="d-none">Price</td>
                     <td style="width:10%">Actions</td>
                  </tr>
                  <tr><td>Buy new domain</td><td>1</td><td class="d-none">1.00</td><td><a href="edit.php?fake=36"><i class='material-icons'>edit</i></a> <a href="delete.php?fake36" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td>               </table>
            </div>
         </div>
         <div id="todo_list" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                     <td>Name</td>
                     <td>Quantity</td>
                     <td class="d-none">Price</td>
                     <td style="width:10%">Actions</td>
                  </tr>
                  <tr><td>Make homebase more user friendly</td><td>High</td><td class="d-none">1/1/1</td><td><a href="./todo/edit.php?fake=81"><i class='material-icons'>edit</i></a> <a href="./todo/delete.php?fake81" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>Fix bug in homebase</td><td>High</td><td class="d-none">1/1/1</td><td><a href="./todo/edit.php?fake=80"><i class='material-icons'>edit</i></a> <a href="./todo/delete.php?fake80" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>Finish history hw</td><td>Lowest</td><td class="d-none">1/1/1</td><td><a href="./todo/edit.php?fake=79"><i class='material-icons'>edit</i></a> <a href="./todo/delete.php?fake79" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>Finish ELA hw</td><td>Lowest</td><td class="d-none">1/1/1</td><td><a href="./todo/edit.php?fake=78"><i class='material-icons'>edit</i></a> <a href="./todo/delete.php?fake78" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>Play minecraft</td><td>Lowest</td><td class="d-none">1/1/1</td><td><a href="./todo/edit.php?fake=77"><i class='material-icons'>edit</i></a> <a href="./todo/delete.php?fake77" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>Finish math HW</td><td>High</td><td class="d-none">1/1/1</td><td><a href="./todo/edit.php?fake=76"><i class='material-icons'>edit</i></a> <a href="./todo/delete.php?fake76" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>Buy new domain</td><td>High</td><td class="d-none">1/1/1</td><td><a href="./todo/edit.php?fake=75"><i class='material-icons'>edit</i></a> <a href="./todo/delete.php?fake75" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td>               </table>
            </div>
         </div>
         <div id="About" class="tabcontent">
            <div class="container">
               <table class="table">
                  <tr >
                     <td>Name</td>
                     <td>Quantity</td>
                     <td class="d-none">Price</td>
                     <td style="width:10%">Actions</td>
                  </tr>
                  <tr><td>a</td><td>2147483647</td><td class="d-none">1</td><td><a href="./garage/edit.php?fake=7"><i class='material-icons'>edit</i></a> <a href="./garage/delete.php?fake7" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>Something </td><td>12</td><td class="d-none">1</td><td><a href="./garage/edit.php?fake=6"><i class='material-icons'>edit</i></a> <a href="./garage/delete.php?fake6" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>reeeeeee</td><td>1234</td><td class="d-none">53</td><td><a href="./garage/edit.php?fake=5"><i class='material-icons'>edit</i></a> <a href="./garage/delete.php?fake5" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>ADMIN</td><td>1</td><td class="d-none">1</td><td><a href="./garage/edit.php?fake=4"><i class='material-icons'>edit</i></a> <a href="./garage/delete.php?fake4" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>wrench</td><td>1</td><td class="d-none">1</td><td><a href="./garage/edit.php?fake=3"><i class='material-icons'>edit</i></a> <a href="./garage/delete.php?fake3" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>wrench</td><td>12</td><td class="d-none">1</td><td><a href="./garage/edit.php?fake=2"><i class='material-icons'>edit</i></a> <a href="./garage/delete.php?fake2" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td><tr><td>hi</td><td>1</td><td class="d-none">12</td><td><a href="./garage/edit.php?fake=1"><i class='material-icons'>edit</i></a> <a href="./garage/delete.php?fake1" onClick="return confirm('Are you sure you want to delete?')"><i class='material-icons'>delete</i></a></td>               </table>
            </div>
         </div>
         <!--CONTENT ENDS-->
      </div>
      <script defer>
function showsearch() {
    var oijw = document.getElementById("searchbar");
    if (oijw.style.display === "none") {
        oijw.style.display = "block";
    } else {
        oijw.style.display = "none";
    }
}
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['','01/19/2021','01/19/2021','12/19/2020','12/03/2020','12/01/2020','12/01/2020','12/01/2020','12/01/2020','12/01/2020','12/01/2020','12/01/2020','12/01/2020','12/01/2020','12/01/2020','12/01/2020','12/01/2020',],
datasets: [{
label: 'Amount you spent',
data: [0,14,12,12,12,23,21,12,5,4,2,9,6,5,4,4,5,],
 backgroundColor : ['rgba(255, 99, 132, 0.1)'],
                borderColor : ['rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'You spent '
                }
            }],
            annotation: {
                annotations: [{
                    type: 'line',
                    mode: 'horizontal',
                    scaleID: 'y-axis-0',
                    value: 5,
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 4,
                    label: {
                        enabled: false,
                        content: 'Test label'
                    }
                }]
            },
            xAxes: [{
                gridLines: {
                    color: "rgba(0, 0, 0, 0)",
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Day'
                }
            }]
        },
        tooltips: {
            titleFontSize: 16,
            caretPadding: 10,
            bodyFontSize: 14,
            mode: 'x',
            displayColors: false,
            callbacks: {
                label: function(tooltipItems, data) {
                    return data.datasets[tooltipItems.datasetIndex].label + ': ' + tooltipItems.yLabel + ' dollars';
                },
            },
        },
        elements: {
            animationEasing: 'easeIn',
            line: {
                tension: 0
            },
            point: {
                radius: 0
            }
        },
    }
});
ctx.height = 500;      </script><script>var brandlogotext = document.getElementById("brandlogo"); if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) { } else { var ds = new DragSelect({ selectables: document.getElementsByClassName('td'), area: document.getElementById('Contact') }); } $(document).ready(function(){ $('input.autocomplete').autocomplete({ data: { "Apple": null, "Banana": null, "Orange": null, "Coriander": null, "Kale": null, "Watermelon": null, "Mango": null, "Noodles": null, "Juice": null, "Dal": null, "Black beans": null, "Kidney beans": null, "Coconuts": null, "Dark Chocolate": null, "Bread": null, "Chocolate": null, "Apple": null, "Orange": null, "Yogurt": null, "Milk": null, "Coriander": null, "Cilantro": null, "Sooji fine": null, "Saaru powder": null, "Banana": null, "Pineapple": null, "Watermelon": null, "Almond": null, "Carrot": null, "Brocolli": null, "JavaScript": null, "Lisp": null, "Perl": null, "PHP": null, "Python": null, "Ruby": null, "Scala": null, "Scheme": null, "Apple": null, "Apricot": null, "Artichoke": null, "Asian Pear": null, "Asparagus": null, "Atemoya": null, "Avocado": null, "Bamboo Shoots": null, "Banana": null, "Bean Sprouts": null, "Beans": null, "Beets": null, "Belgian Endive": null, "Bell Peppers": null, "Bitter Melon": null, "Blackberries": null, "Blueberries": null, "Bok Choy": null, "Boniato": null, "Boysenberries": null, "Broccoflower": null, "Broccoli": null, "Brussels Sprouts": null, "Cabbage": null, "Cactus Pear": null, "Cantaloupe": null, "Carambola": null, "Carrots": null, "Casaba Melon": null, "Cauliflower": null, "Celery": null, "Chayote": null, "Cherimoya": null, "Cherries": null, "Coconuts": null, "Collard Greens": null, "Corn": null, "Cranberries": null, "Cucumber": null, "Dates": null, "Dried Plums": null, "Eggplant": null, "Endive": null, "Escarole": null, "Feijoa": null, "Fennel": null, "Figs": null, "Garlic": null, "Gooseberries": null, "Grapefruit": null, "Grapes": null, "Green Beans": null, "Green Onions": null, "Greens": null, "Guava": null, "Hominy": null, "Honeydew Melon": null, "Horned Melon": null, "Iceberg Lettuce": null, "Jerusalem Artichoke": null, "Jicama": null, "Kale": null, "Kiwifruit": null, "Kohlrabi": null, "Kumquat": null, "Leeks": null, "Lemons": null, "Lettuce": null, "Lima Beans": null, "Limes": null, "Longan": null, "Loquat": null, "Lychee": null, "Madarins": null, "Malanga": null, "Mandarin Oranges": null, "Mangos": null, "Mulberries": null, "Mush": null, "Napa": null, "Nectarines": null, "Okra": null, "Onion": null, "Oranges": null, "Papayas": null, "Parsnip": null, "Passion Fruit": null, "Peaches": null, "Pears": null, "Peas": null, "Peppers": null, "Persimmons": null, "Pineapple": null, "Plantains": null, "Plums": null, "Pomegranate": null, "Potatoes": null, "Prickly Pear": null, "Prunes": null, "Pummelo": null, "Pumpkin": null, "Quince": null, "Radicchio": null, "Radishes": null, "Raisins": null, "Raspberries": null, "Red Cabbage": null, "Rhubarb": null, "Romaine Lettuce": null, "Rutabaga": null, "Shallots": null, "Snow Peas": null, "Spinach": null, "Sprouts": null, "Squash": null, "Strawberries": null, "String Beans": null, "Sweet Potato": null, "Tangelo": null, "Tangerines": null, "Tomatillo": null, "Tomato": null, "Turnip": null, "Ugli Fruit": null, "Water Chestnuts": null, "Watercress": null, "Watermelon": null, "Waxed Beans": null, "Yams": null, "Yellow Squash": null, "Yuca/Cassava": null, "Zucchini Squash": null, }, limit: 3, }); });$(document).ready(function(){$('.sidenav').sidenav();$('.collapsible').collapsible();});$('.tap-target').tapTarget();$(document).ready(function(){$('.fixed-action-btn').floatingActionButton({/*hoverEnabled: false*/});});$(document).ready(function(){ $("#kitchen_search").on("keyup", function() { var value = $(this).val().toLowerCase(); $("#kitchen_table tr").filter(function() { $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1) }); }); }); $("#notification").on("click", function(){ $("#hide").css('display', 'none'); localStorage.setItem("hidea", $("#hide").is(":visible")); }); localStorage.hidea == "false" ? $("#hide").css('display', 'none') : $("#hide").show();         function myFunction() { var x = document.getElementById("myDIV"); if (x.style.display === "none") { x.style.display = "block"; } else { x.style.display = "none"; } } /*function myFunctiona() { var xt = document.getElementById("myDIVa"); if (xt.style.display === "none") { xt.style.display = "block"; } else { xt.style.display = "none"; } }*/
         $(document).ready(function(){ $('.sidenav') .sidenav() .on('click tap', 'li a', () => { /*$('.sidenav').sidenav('close');*/ if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) { $('.sidenav').sidenav('close'); } }); });$(document).ready(function(){$('.modal').modal();});var animals = []; function openPage(pageName,elmnt,color) { var i, tabcontent, tablinks; tabcontent = document.getElementsByClassName("tabcontent"); for (i = 0; i < tabcontent.length; i++) { tabcontent[i].style.display = "none"; } tablinks = document.getElementsByClassName("tablink"); for (i = 0; i < tablinks.length; i++) { } document.getElementById(pageName).style.display = "block"; $(pageName).scrollTop(0); window.scrollTo(0, 0); animals.push(pageName); } document.getElementById("defaultOpen").click();function filter() { var input, filter, ul, li, a, i, txtValue; input = document.getElementById("search"); filter = input.value.toUpperCase(); ul = document.getElementById("myUL"); li = ul.getElementsByTagName("li"); for (i = 0; i < li.length; i++) { a = li[i].getElementsByTagName("a")[0]; txtValue = a.textContent || a.innerText; if (txtValue.toUpperCase().indexOf(filter) > -1) { li[i].style.display = ""; } else { li[i].style.display = "none"; } } }const toggleSwitch = document.querySelector('#darkmode'); const currentTheme = localStorage.getItem('theme'); if (currentTheme) { document.documentElement.setAttribute('data-theme', currentTheme); if (currentTheme === 'dark') { toggleSwitch.checked = true; var metaThemeColor = document.querySelector("meta[name=theme-color]"); metaThemeColor.setAttribute("content", "#191918"); document.getElementById("imageid").src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.whatswithtech.com%2Fwp-content%2Fuploads%2F2015%2F09%2Fblack-and-blue-material-design-wallpaper.png&f=1&nofb=1"; } }
         function switchTheme(e) { if (e.target.checked) { document.documentElement.setAttribute('data-theme', 'dark'); localStorage.setItem('theme', 'dark'); var metaThemeColor = document.querySelector("meta[name=theme-color]"); metaThemeColor.setAttribute("content", "#191918"); document.getElementById("imageid").src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.whatswithtech.com%2Fwp-content%2Fuploads%2F2015%2F09%2Fblack-and-blue-material-design-wallpaper.png&f=1&nofb=1"; } else { document.documentElement.setAttribute('data-theme', 'light'); localStorage.setItem('theme', 'light'); var metaThemeColor = document.querySelector("meta[name=theme-color]"); metaThemeColor.setAttribute("content", "#2a1782"); } } toggleSwitch.addEventListener('change', switchTheme, false);
         $(window).bind('keydown', function(event) { if (event.ctrlKey || event.metaKey) { switch (String.fromCharCode(event.which).toLowerCase()) { case 'f': event.preventDefault(); showsearch();document.getElementById('search').focus(); break; case 'd': event.preventDefault(); $('.modal').modal('close'); $('#key').modal('open'); break; case 'e': event.preventDefault(); $('.modal').modal('close'); openPage('modal1', this, '');brandlogotext.innerHTML = 'Settings'; break; case 'b': event.preventDefault(); $('.modal').modal('close'); openPage('budgetmetermodal', this, ''); break; case 's': event.preventDefault(); $('.modal').modal('close'); $('#budgetmetermodala').modal('open'); break; } } });var length = $('ul#menu li').length;document.getElementById('badge').innerHTML = length;
               
      </script>
      <script>
         /*!
         * Run a callback function after scrolling has stopped
         * (c) 2017 Chris Ferdinandi, MIT License, https://gomakethings.com
         * @param  {Function} callback The function to run after scrolling
         */
         var scrollStop = function (callback) {
         // Make sure a valid callback was provided
         if (!callback || typeof callback !== 'function') return;
         // Setup scrolling variable
         var isScrolling;
         // Listen for scroll events
         window.addEventListener('scroll', function (event) {
         // Clear our timeout throughout the scroll
         window.clearTimeout(isScrolling);
         // Set a timeout to run after scrolling ends
         isScrolling = setTimeout(function() {
         // Run the callback
         callback();
         }, 66);
         }, false);
         };
      </script>
      <script type="text/javascript">
         var inactivityTime = function () {
             var time;
             window.onload = resetTimer;
             document.onmousemove = resetTimer;
             document.onkeypress = resetTimer;
         var inactivitya = 1;
             function logout() {
                 M.toast({html: 'You will be logged out due to inactivity. Please confirm that you are still there by clicking anywhere, or doing anything'});
             if (inactivitya > 2) {
           window.location = "logout.php?inactive=true";
         }
         else {
             inactivitya = 3;
         }
             }    function resetTimer() {
                 clearTimeout(time);
                 time = setTimeout(logout, 60000)
             }
         };
         window.onload = function() {
           inactivityTime(); 
         }document.addEventListener('touchstart', handleTouchStart, false);        
         document.addEventListener('touchmove', handleTouchMove, false);var xDown = null;                                                        
         var yDown = null;function getTouches(evt) {
           return evt.touches ||            
                  evt.originalEvent.touches;
         }                                                     function handleTouchStart(evt) {
             const firstTouch = getTouches(evt)[0];                                      
             xDown = firstTouch.clientX;                                      
             yDown = firstTouch.clientY;                                      
         };                                                function handleTouchMove(evt) {
             if ( ! xDown || ! yDown ) {
                 return;
             }    var xUp = evt.touches[0].clientX;                                    
             var yUp = evt.touches[0].clientY;    var xDiff = xDown - xUp;
             var yDiff = yDown - yUp;    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
                 if ( xDiff > 0 ) {
                     /* left swipe */ 
                 } else {
                     /* right swipe */
                 }                       
             } else {
                 if ( yDiff > 0 ) {
                     /* up swipe */ 
                 } else { 
                                 $('.bottom-sheet').modal('close');   scrollStop(function () {
             console.log('Scrolling has stopped.');
         });
                 }                                                                 
             }
             /* reset values */
             xDown = null;
             yDown = null;                                             
         };
      </script>   
            <script defer>
         $(document).ready(function(){
            $('#birthday').modal();
            //$('#birthday').modal('open'); 
         });
      </script>
      <script defer>
         $(document).ready(function(){
           $('.tabs').tabs();
         });
      </script>
      <script defer>
         $(document).ready(function(){
            $('#modal').modal();
                $('.materialboxed').materialbox();
            //$('#modal').modal('open'); 
         });
      </script>
      <script>
         function hide() {
             document.getElementById("fab").style.transform = "scale(0)";
         }
         function show() {
             document.getElementById("fab").style.transform = "scale(1)";
         }
      </script>
      <script type="text/javascript">
         var trigger_flag = localStorage.getItem('trigger_flag');
         if( !trigger_flag ) {
         // invoke your function here
         localStorage.setItem('trigger_flag', 'flag_is_set');
         }
      </script>
      <script id="rendered-js">
         window.oncontextmenu = function(event) {
              event.preventDefault();
              event.stopPropagation();
              return false;
         };var now = new Date();
         var hrs = now.getHours();
         var msg = "";
         //if (hrs >  0) msg = localStorage.setItem('theme', 'dark');      // REALLY early
         //if (hrs >  6) msg = localStorage.setItem('theme', 'dark');      // After 6am
         //if (hrs > 17) msg = localStorage.setItem('theme', 'dark');      // After 5pm
         //if (hrs > 22) msg = localStorage.setItem('theme', 'dark');      // After 10pm//alert(msg);
      </script>
      <script> 
function changeValue(){ 
document.getElementById("sr").innerHTML = document.getElementById("search").value
}
         function addItem(history) { 
               let type = document. 
                 getElementById("type").value; 
             let value = document. 
                 getElementById("value").value; 
             type = document.createElement(type); 
               type.appendChild( 
                 document.createTextNode(value)); 
               document.getElementById( 
                 "parent").appendChild(type); 
         } 
      </script>
      <script defer>
         setTimeout(function(){
            $('.demo').hide();// or fade, css display however you'd like.
            $('.demoa').hide();// or fade, css display however you'd like.
            window.scrollTo(0, 0);
            openPage('News', this, );  
         }, 00);
      </script>
      <script defer>
         $(document).ready(function(){
           // $('.tooltipped').tooltip();
          });
      </script>
      <audio id="syncalert">
         <source src="https://padlet-uploads.storage.googleapis.com/446844750/abff4e01e3d7691aa96889855e09afaa/notification_simple_02.wav" type="audio/mpeg">
         Your browser does not support the audio element.
      </audio>
      <script defer>
         var syncalertx = document.getElementById("syncalert"); 
         function syncalertplayAudio() { 
           syncalertx.play(); 
         } 
      </script>
      <script>
         var modal = document.getElementById('myDIVa');
         window.onclick = function(event) {
           if (event.target == modal) {
             //modal.style.display = "none";
           }
         }
      </script>
      <script defer>
         function notifyMe() {
           // Let's check if the browser supports notifications
           if (!("Notification" in window)) {
             alert("This browser does not support desktop notifications. Please use Chrome");
           }
           // Let's check whether notification permissions have already been granted
           else if (Notification.permission === "granted") {
             // If it's okay let's create a notification
             //var notification = new Notification("Welcome to Homebase!");
           }
           // Otherwise, we need to ask the user for permission
           else if (Notification.permission !== "denied") {
             Notification.requestPermission().then(function (permission) {
               // If the user accepts, let's create a notification
               if (permission === "granted") {
                 var notification = new Notification("Nice! Notifications are enabled!");
               }
             });
           }
           // At last, if the user has denied notifications, and you 
           // want to be respectful there is no need to bother them any more.
         }
      </script>
      <div id="key" class="modal modal-fixed-a">
         <div class="modal-content">
            <h4>Keyboard Shortcuts</h4>
            <p>CTRL F - Focus on search bar</p>
            <p>CTRL B - View Notifications</p>
            <p>CTRL S - Add item</p>
            <p>CTRL E - Open settings</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cool!</a>
         </div>
      </div>
      <div id="modal" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Welcome to your brand-new account</h4>
            <p>Here are a few tips and tricks</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
         </div>
      </div>
      <div id="birthday" class="modal modal-fixed-a">
         <div class="modal-content">
            <h4 class=center>Homebase beta is almost here!</h4>
            <p class=center>On Jan 1, 2021, we'll present to you the best new features!</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cool!</a>
         </div>
      </div>
      <div id="modal" class="modal modal-fixed-footer">
         <div class="modal-content">
            <h4>Welcome to your brand-new account</h4>
            <p>Here are a few tips and tricks</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
         </div>
      </div>
      <!--JavaScript at end of body for optimized loading-->
      <script>
         function addOrUpdateUrlParam(name, value)
         {
         var href = window.location.href;
         var regex = new RegExp("[&\\?]" + name + "=");
         if(regex.test(href))
         {
         regex = new RegExp("([&\\?])" + name + "=\\d+");
         window.location.href = href.replace(regex, "$1" + name + "=" + value);
         }
         else
         {
         if(href.indexOf("?") > -1)
         window.location.href = href + "&" + name + "=" + value;
         else
         window.location.href = href + "?" + name + "=" + value;
         }
         }
      </script>
      <script>
         //var name = 'Apples';
         //var qty = 1;
         function toast(name, qty) {
         M.toast({html: "Deleted \"" + name + '" <a class="btn-flat toast-action waves-effect waves-orange text-white" style="color: white !important" href="http://homebase.rf.gd/homebase/exe.php?name='+ name +'&qty='+ qty +'&price=1">Undo</a>'});
         }
      </script>
      <script>
         function add() {
         $('.modal').modal('close'); 
         openPage('Contact', this, '');
         var searcha = document.getElementById("tags").value;
         document.getElementById("tags").value = null;
         var qtay = document.getElementById("qty").value;
         var date = document.getElementById("date").value;
         $("#kitchen_table").append("<tr class='card-new'><td>"+ searcha +"</td><td>"+qtay+"</td><td>Refresh to see options</td></tr>");
         $("#div1").load("https://homebase.rf.gd/homebase/modal.php?name="+encodeURI(searcha)+"&qty="+encodeURI(qtay)+"&price=1");
         //window.scrollTo(0,document.body.scrollHeight);
         }
      </script>   
   </body>
</html>
 
