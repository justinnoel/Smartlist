<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
      .waves-effect:not(.waves-light, ._darkTheme .waves-effect) .waves-ripple {
        background: rgba(0, 0, 0, .2) !important
      }
      ._darkTheme .waves-ripple {background: rgba(255, 255, 255, .2) !important}
      .waves-light .waves-ripple {background: rgba(255, 255, 255, .2) !important}
      nav a,nav a i {
        background: transparent !important;
        line-height: 65px !important
      }
      code {overflow-x: scroll;}
      nav .waves-ripple {
        transition: all .5s !important
      }
      .waves-ripple {
        transition: transform .8s cubic-bezier(0.4, 0, 0.2, 1), opacity .4s !important
      }
      #main {
        position: fixed;
        top: 50%;
        left: 50%;
        width: 100%;
        transform: translate(-50%, -50%);
      }
      .alert .row {margin: 0!important}
      .alert {
        background: rgba(100, 100, 255, .1);
        padding: 10px;
        display: inline-block;
        border: 1.5px solid  rgba(100, 100, 255, .9);
        border-radius: 4px;
      }
      .btn {margin: 3px!important;margin-left: 2x!important}
      .alert .col {padding-bottom:: 0!important;}
      .alert p {margin-bottom: 0;}
      .btn-round {border-radius: 999px;height: auto!important;line-height:40px;text-transform:none !important;padding-left: 20px !important;padding-right: 20px !important;box-shadow: none !important}
      .modal {
        position: fixed!important;
        top: 50%!important;
        left: 50% !important;
        transform: translate(-50%, -50%)!important;
      }
    </style>
  </head>
  <body>
    <div id="debug" class="modal">
      <div class="modal-content">
        <h5>
        Debug info
        </h5>
        <p>
        This information will be helpful when reporting it to us
        </p>
        <code>
        {"HTTP_USER_AGENT": <?=json_encode($_SERVER['HTTP_USER_AGENT']);?>, "HTTP_COOKIE": <?=json_encode($_SERVER['HTTP_COOKIE']);?>, "REQUEST_TIME_FLOAT": <?=json_encode($_SERVER['REQUEST_TIME_FLOAT'])?>}
        </code>
      </div>
    </div>
    <div id="main">
      <div class="row">
        <div class="container">
          <div class="col s12 m6">
            <h2>
              <b>403</b>
            </h2>
            <p>
              Access denied. You are not allowed to view this page :(
            </p>
            <div class="alert">
              <div class="row">
                <div class="col s1" style="padding: 0!important">
                  <i class="material-icons">lightbulb</i>
                </div>
                <div class="col s11">
                  Did you know the average American spends $500,000 a year buying things they already have? Smartlist can help you cut down your montly expenses by more than <b>50%</b>, <i>for free!</i>
                </div>
              </div>
            </div>
            <a href="/" class="btn blue-grey darken-3 waves-effect waves-light btn-round"><i class="material-icons-outlined left">home</i>Take me home...</a>
            <a href="/dashboard" class="btn btn-outlined blue-grey black-text lighten-5 waves-effect btn-round"><i class="material-icons-outlined left">dashboard</i>Dashboard</a>
            <a href="#debug" class="modal-trigger btn btn-outlined blue-grey black-text lighten-5 waves-effect btn-round"><i class="material-icons-outlined left">bug_report</i>Page info</a>
          </div>
          <div class="col s12 m6 hide-on-small-only">

            <img src="https://i.ibb.co/DYc7w17/conifer-access-denied.png" style="width:100%">
            <br><br>
Illustration by <a href="https://icons8.com/illustrations/author/6023ee3f123f99199963c90f">Елизавета Губа</a> from <a href="https://icons8.com/illustrations">Ouch!</a>
</div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/ManuTheCoder/JS-Essentials/essentials.min.js"></script>
    <script>
      $(".modal").modal()
    </script>
  </body>
</html>