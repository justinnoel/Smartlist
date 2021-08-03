<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Recipe Generator!</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.1/showdown.min.js">
	</script>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
	</script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="./css/app.min.css">
	<style>
		
.spinner {
  -webkit-animation: rotator 1.4s linear infinite;
          animation: rotator 1.4s linear infinite;
}

@-webkit-keyframes rotator {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(270deg);
  }
}

@keyframes rotator {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(270deg);
  }
}
.path {
  stroke-dasharray: 187;
  stroke-dashoffset: 0;
  transform-origin: center;
  -webkit-animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
          animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
}

@-webkit-keyframes colors {
  0% {
    stroke: #4285F4;
  }
  25% {
    stroke: #DE3E35;
  }
  50% {
    stroke: #F7C223;
  }
  75% {
    stroke: #1B9A59;
  }
  100% {
    stroke: #4285F4;
  }
}

@keyframes colors {
  0% {
    stroke: #4285F4;
  }
  25% {
    stroke: #DE3E35;
  }
  50% {
    stroke: #F7C223;
  }
  75% {
    stroke: #1B9A59;
  }
  100% {
    stroke: #4285F4;
  }
}
@-webkit-keyframes dash {
  0% {
    stroke-dashoffset: 187;
  }
  50% {
    stroke-dashoffset: 46.75;
    transform: rotate(135deg);
  }
  100% {
    stroke-dashoffset: 187;
    transform: rotate(450deg);
  }
}
@keyframes dash {
  0% {
    stroke-dashoffset: 187;
  }
  50% {
    stroke-dashoffset: 46.75;
    transform: rotate(135deg);
  }
  100% {
    stroke-dashoffset: 187;
    transform: rotate(450deg);
  }
}
@media only screen and (max-width: 992px) {
	.bottom_nav {
		position: fixed;
		bottom: 0;
		left: 0;
		width: 100%;
		background: #37474f 
	}
	.bottom_nav .btn {
		width: 49%;
		box-shadow: none !important;
		margin: 0 !important
	}
}
* {
	box-sizing: border-box
}
	</style>
</head>

<body>
	<nav class="indigo darken-3">
		<ul>
			<li class="right"><a href="#" class="sidenav-trigger" style="display: block !important;margin:0 !Important" data-target="slide-out"><i class="material-icons">settings</i></a></li>
			<li class="right"><a href="#categories" class="modal-trigger" style="display: block !important;margin:0 !Important">Search
					by Ingredients</a></li>
			<li><a href="#">Smartlist</a></li>
		</ul>
	</nav>
	<center>
		<div class="container">
			<h3 id="res" class="fade-up"></h3>
		</div>
		<div style="dll">
			<div class="container">
				<div id="demo" class="row"></div>
				<ul id="slide-out" class="sidenav" style="padding: 10px;z-index:999999999999999">
					<p><b>General Options</b></p>
					<div class="col s12 input-field">
					<label>
						<input type="checkbox" onclick="darkMode();localStorage.setItem('dmode', this.checked)" id="d">
						<span>Dark Mode</span>
					</label>
				</div>
				<br>
				<br>
				<br>
          <p><b>Recipe Options</b></p>
        <div class="input-field col s12">
          <select id="culture" oninput="random()" onchange="random()">
            <option id="" value="" disabled>Culture</option>
            <option selected>American</option>
            <option>British</option>
            <option>Chinese</option>
            <option>Dutch</option>
            <option>Egyptian</option>
            <option>French</option>
            <option>Greek</option>
            <option>Indian</option>
            <option>Irish</option>
            <option>Italian</option>
            <option>Jamaican</option>
            <option>Japanese</option>
            <option>Kenyan</option>
            <option>Malaysian</option>
            <option>Mexican</option>
            <option>Moroccan</option>
            <option>Polish</option>
            <option>Portuguese</option>
            <option>Russian</option>
            <option>Spanish</option>
            <option>Thai</option>
            <option>Tunisian</option>
            <option>Turkish</option>
            <option>Vietnamese</option>
          </select>
        </div>
				<div class="col s12 input-field">
					<label>
						<input type="checkbox" id="vegetarian">
						<span>Vegetarian?</span>
					</label>
				</div>
        </ul>
    </center>
    </div></div>
    <div class="fade"></div>
    <div style="z-index:99999999;position:fixed;bottom: 20px;left: 50%;transform: translateX(-50%)">
			<a class="s-effect btn-floating btn-large blue-grey darken-3" onclick="random()" tabindex="0" style="transform: none !important">
        <i class="large material-icons" style="font-size: 30px">search</i>
      </a>
			<a class="s-effect btn-floating btn-large blue-grey darken-3" style="transform: scale(.7) !important" onclick="random(true)" tabindex="0">
        <i class="large material-icons" style="font-size: 30px">casino</i>
      </a>
    </div>
		<div class="modal bottom-sheet" id="popup" style="background:white;min-height: calc(100vh - 55px) !important;height: calc(100vh - 5px) !important;max-height: calc(100vh - 55px) !important">
		</div>
		<div class="modal bottom-sheet" id="categories"><div class='modal-content'><div class='container'></div></div></div>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js"></script>
		<script src="./js/lazyLoad.js"></script>
    <script src="./js/script.min.js"></script>
  </body>
</html>