<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Recipe Generator!</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
      .btn-floating {transition: transform .2s;z-index:9999999;box-shadow: none !important;user-select:none;overflow:hidden}
      .fixed-action-btn {
        z-index: 99999999
      }
      .fade {position: fixed;bottom: 0;left:0;width: 100%;height: 100px;background-image: linear-gradient(to bottom, rgba(255,255,255, 0), rgba(255,255,255, 1) 90%);z-index:999999 }
      .btn-floating:hover,.btn-floating:focus {transform: scale(1.1) rotate(-95deg)}
      .btn-floating:active {transform: rotate(90deg)}
      .fade-up {animation: fade-up .3s forwards}
      @keyframes fade-up {
        0% {transform: translateY(10px);opacity: 0;}
      }
      .sidenav-overlay {
        z-index: 999999
      }
      .card .waves-ripple {
          transition-duration: .4s !important;
          padding: 15px;
      }
    </style>
  </head>
  <body>
      <nav class="indigo darken-3">
        <ul>
          <li class="right"><a href="#" class="sidenav-trigger" style="display: block !important;margin:0 !Important" data-target="slide-out">Options</a></li>
         <li><a href="#">Smartlist</a></li>
        </ul>
      </nav>
      <center>
      <h2 id="res" class="fade-up"></h2>
      <div style="dll">
          <div class="container">
      <button href="#" id="btn_recipe" class="btn blue-grey darken-3">Find Recipes</button><br><br>
      <div id="demo" class="row"></div>
        <ul id="slide-out" class="sidenav" style="padding: 10px;z-index:999999999999999">
          <p><b>Recipe Options</b></p>
        <div class="input-field col s12">
          <select id="culture" oninput="random()" onchange="random()">
            <option id="" value="" disabled>Culture</option>
            <option id="American" selected value="American">American</option>
            <option id="British" value="British">British</option>
            <option id="Asian" value="3">Asian</option>
            <option id="Chinese" value="3">Chinese</option>
            <option id="Indian" value="Indian">Indian</option>
          </select>
        </div>
        <select id="type" oninput="random()" onchange="random()">
            <option value="0" disabled>Type</option>
            <option value="1">Breakfast</option>
            <option value="2" selected>Lunch</option>
            <option value="3">Dinner</option>
          </select>
        </ul>
    </center>
    </div></div>
    <div class="fade"></div>
    <div style="z-index:99999999;position:fixed;bottom: 20px;left: 50%;transform: translateX(-50%)">
      <a class="s-effect btn-floating btn-large blue-grey darken-3" onclick="random()" tabindex="0">
        <i class="large material-icons" style="font-size: 30px">casino</i>
      </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js"></script>
    <script src="script.js"></script>
    <script>random();</script>
  </body>
</html>