<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&amp;display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
      .btn {border-radius: 999px;height: auto!important;line-height:40px;text-transform:none !important;padding-left: 20px !important;padding-right: 20px !important;box-shadow: none !important}
      nav a {color: black !important;height:100%;} 
      .w_page {padding-bottom: 100px}
      body {padding-top: 100px}
      nav {box-shadow:none;} 
      nav .waves-ripple {transition-duration: .2s !important;padding:5px;} 
      * {font-family: 'Nunito', sans-serif;}
      .circle {width:50px;height:50px;cursor:pointer;display:inline-block;margin:4px;transition: all .2s;} 
      /*.circle:hover {box-shadow: 0px 0px 0px 1px rgba(0,0,0,0.75);} */
      .w_page {display:none}
      .selected {box-shadow:  0px 0px 0px 2px inset #1976d2;pointer-events:none;border-radius:4px;border-color:#1976d2!important}
      #w1 {display: block}
      .__navI .waves-ripple {top: 50% !important; left: 50% !important; transition-duration: .7s !important;background: rgba(0,0,0,0.3)}
      .fade-up {animation: fadeUp .3s forwards;opacity:0;transform:translateY(30px)}
      @keyframes fadeUp {0% {opacity:0;transform:translateY(15px)} 100% {opacity:1;transform: translateY(0)}}
      .w_circle {transition: background .2s;background: #eee;display:block;width: 80px;height:80px;text-align:center;border-radius:999px;margin:auto}
      .w_circle div {color:black;user-select:none;cursor:pointer}
      .w_circle div i {margin-top: 27px;transition: all .2s}
      .w_circle:hover {background: #ddd}
      * {box-sizing: border-box}
      .w_circle input:checked ~ div {color:green}
      .w_circle .span::before {content: ""; opacity:0; animation: opacity 1s forwards;margin-left: -28px;border-radius:999px;width: 80px;height:80px;position:absolute;border: 2px solid green;transition: all .2s}
      .w_circle .span::after {content: ""; position: absolute; width: 10px; opacity:0; height: 20px; border: solid green; margin-left: -17px; margin-top: 28px; border-width: 0 5px 5px 0; -webkit-transform: rotate(45deg); -ms-transform: rotate(45deg); transform: scale(.2) rotate(45deg); transition: all .2s}
      .w_circle .waves-ripple {top: 50% !important;left: 50% !important;transition-duration: .9s !important}
      .center_56 {text-align:center;color:gray;font-size: 15px;display:inline-block;margin-right: 10px;}
      .center_56 span {margin-bottom: -10px}
      .w_circle input:checked ~ div::before {opacity:1}
      .w_circle input:checked ~ div i {opacity:.1}
      .w_circle input:checked ~ div::after {opacity:1; transform:scale(1) rotate(45deg)}
      [data-delay] {animation-delay: attr(data-delay)}
      h1 {font-size: 50px}
      * { -webkit-touch-callout:none; -webkit-text-size-adjust:none; -webkit-tap-highlight-color:rgba(0,0,0,0); }
      .zoom {transition: all .2s}
      .zoom:hover {opacity: .8 !important}
      .w_page {padding-top: 10vh}
      @media only screen and (max-width: 900px) {.w_page {padding-top:0 !important;} h1 {font-size: 40px}.row,.col {padding: 0 !important}}
      .waves-effect:not(.waves-light, ._darkTheme .waves-effect) .waves-ripple {
          background: rgba(0, 0, 0, .1) !important
        }
        ._darkTheme .waves-ripple {background: rgba(255, 255, 255, .2) !important}
        .waves-light .waves-ripple {background: rgba(255, 255, 255, .2) !important}
        .waves-ripple { transition: transform .8s cubic-bezier(0.4, 0, 0.2, 1), opacity .4s !important }
    </style>
  </head>
  <body>
    <nav class="white" style="position:fixed;top:0;z-index:999">
      <ul>
        <li><a href="https://smartlist.ga/dashboard/beta" class="waves-effect __navI" style="border-radius:999px;width:56px;height:56px;margin: 3px"><i class="material-icons">close</i></a></li>
      </ul>
      <ul class="right">
        <li><a href="#!" class="__navI waves-effect" style="border-radius:999px;width:56px;height:56px;margin: 3px" onclick="__smPage('w1')"><i class="material-icons">refresh</i></a></li>
      </ul>
    </nav>
    <div class="container">
      <div class="container">
        <form method="POST" action="action.php">
          <div class="w_page" id="w1">
            <p class="fade-up">
              Let's get started!
            </p>
            <h1 class="fade-up" style="margin-top:0;animation-delay: 100ms">
              <?php echo $_SESSION['name']; ?>, what's<br> your favorite color?
            </h1>
            <div class="circle __navI fade-up zoom" style="background: #41308a;animation-delay: 300ms;" onclick="colorInputV('41308a');"></div>
            <div class="circle __navI fade-up zoom" style="background: #6200ea;animation-delay: 340ms;" onclick="colorInputV('6200ea');"></div>
            <div class="circle __navI fade-up zoom" style="background: #B00020;animation-delay: 380ms;" onclick="colorInputV('B00020');"></div>
            <div class="circle __navI fade-up zoom" style="background: #00695c;animation-delay: 420ms;" onclick="colorInputV('00695c');"></div>
            <div class="circle __navI fade-up zoom" style="background: #00838f;animation-delay: 460ms;" onclick="colorInputV('00838f');"></div>
            <div class="circle __navI fade-up zoom" style="background: #0277bd;animation-delay: 500ms;" onclick="colorInputV('0277bd');"></div>
            <div class="circle __navI fade-up zoom" style="background: #2e7d32;animation-delay: 540ms;" onclick="colorInputV('2e7d32');"></div>
            <div class="circle __navI fade-up zoom" style="background: #ef6c00;animation-delay: 580ms;" onclick="colorInputV('ef6c00');"></div>
            <div class="circle __navI fade-up zoom" style="background: #ad1457;animation-delay: 620ms;" onclick="colorInputV('ad1457');"></div>
            <input name="color" type="hidden" value="41308a" id="__colorInput">
            <input name='id' type='hidden' value="<?php echo $_SESSION['id']; ?>">
          </div>
          <div id="w2" class="w_page">
            <h3 class="fade-up">
              Set a goal
            </h3>
            <p class="fade-up" style="animation-delay: 100ms">
              What's your hard limit for expenses?
            </p>
            <div>
              <input class="fade-up" style="animation-delay: 300ms" type="range" value="50" max="100" min="1" oninput="document.getElementById('output').value = '$' + this.value" name="amount">
              <h5 class="fade-up" style="animation-delay: 400ms"><b><output id="output">$50</output></b></h5>
              <button type="button" class="fade-up btn blue-grey right darken-3 waves-effect waves-light" onclick="__smPage('w3')" style="animation-delay: 500ms">
                Next
              </button>
            </div>
          </div>
          
          
          <div id="w4" class="w_page">
            <h3 class="fade-up">
              What are you using Smartlist for?
            </h3>
            <p class="fade-up" style="animation-delay: 100ms">
              This will help us decide a few settings for you. You can change this in your preferences
            </p>
            <input type="hidden" name="purpose" id="purpose" value="personal">
            <div class="row">
                <div class="col s12 m6 fade-up" style="animation-delay: 200ms;padding: 3px!important">
                    <div class="card selected waves-effect" style="width:100%" onclick="$('.selected').removeClass('selected');this.classList.add('selected');document.getElementById('purpose').value='personal'">
                        <div class="card-content">
                                <h5><b>Personal</b></h5>
                                <p>
                                Smartlist will help you save money and track your home's inventory, give you maintenance reminders, and more. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 fade-up" style="animation-delay: 200ms;padding: 3px!important">
                    <div class="card waves-effect" style="width:100%" onclick="$('.selected').removeClass('selected');this.classList.add('selected');document.getElementById('purpose').value='business'">
                        <div class="card-content">
                                <h5><b>Business</b></h5>
                                <p>
                                Instead of focusing on tracking your home's inventory, you can focus on your finance management
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
              <button type="button" class="fade-up btn blue-grey right darken-3 waves-effect waves-light" onclick="__smPage('w5')" style="animation-delay: 500ms">
                Next
              </button>
            </div>
          </div>
          
          <div id="w3" class="w_page" style="padding-top: 1vh">
            <h3 class="fade-up center">
              Creating inventory
            </h3>
            <h5 class="fade-up center" style="animation-delay: 100ms">
              Select items you have at home
            </h5><br>
            <div class="section row center fade-up" style="animation-delay: 200ms">
              <div class="col s4 m3 center">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="fridge"/>
                  <div class="span"><i class="material-icons">kitchen</i></div>
                </label>
                <span>Fridge</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 250ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Forks"/>
                  <div class="span"><i class="material-icons">kitchen</i></div>
                </label>
                <span>Forks</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 300ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Washing Machine"/>
                  <div class="span"><i class="material-icons">local_laundry_service</i></div>
                </label>
                <span>Washing Machine</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 350ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Construction"/>
                  <div class="span"><i class="material-icons">construction</i></div>
                </label>
                <span>Hammer &amp; nails</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 400ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Video games"/>
                  <div class="span"><i class="material-icons">sports_esports</i></div>
                </label>
                <span>Video games</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 450ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Masks"/>
                  <div class="span"><i class="material-icons">masks</i></div>
                </label>
                <span>Masks</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 500ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Sanitizer"/>
                  <div class="span"><i class="material-icons">sanitizer</i></div>
                </label>
                <span>Sanitizer</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 550ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Cups"/>
                  <div class="span"><i class="material-icons">free_breakfast</i></div>
                </label>
                <span>Cups</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 600ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Stroller"/>
                  <div class="span"><i class="material-icons">stroller</i></div>
                </label>
                <span>Stroller</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 700ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Fire extinguisher"/>
                  <div class="span"><i class="material-icons">fire_extinguisher</i></div>
                </label>
                <span>Fire Extinguisher</span>
              </div>
              <div class="col s4 m3 center fade-up" style="animation-delay: 750ms">
                <label class="w_circle wasves-effect">
                  <input type="checkbox" name="items[]" value="Backpack"/>
                  <div class="span"><i class="material-icons">backpack</i></div>
                </label>
                <span>Backpack</span>
              </div>
            </div>
            <button type="button" onclick="__smPage('w4')" class="right btn blue-grey darken-4 fade-up" style="animation-delay: 800ms">
              Next
            </button>
          </div>
          <div id="w5" class="w_page center">
            <h1 class="fade-up">
              You're all set!
            </h1>
            <p class="fade-up" style="animation-delay: 100ms">
              Click the button below to get started!
            </p><br>
            <button class="waves-effect waves-light btn blue-grey darken-3 fade-up" style="animation-delay: 200ms" onclick="this.innerHTML = 'We\'re setting up your account. Hang on a sec...'">
              Save, and continue to dashboard
            </button>
          </div>
        </form>
      </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js"></script>
    <script>
      AOS.init();
      window.onerror = function(msg, url, linenumber) {
        M.toast({html: 'Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber});
        return true;
      }
      function colorInputV(data) {
        document.getElementById('__colorInput').value = data;
        __smPage('w2');
      }
      function __smPage(pageName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("w_page");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        document.getElementById(pageName).style.display = "block";
      }
    </script>
  </body>
</html>