<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Upload an image</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
       <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    <script src="https://unpkg.com/ml5@0.4.3/dist/ml5.min.js" defer></script>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <style>
    .progress, progress[value] {
  width: 100%;
  border: none;
  height: 5px;
  display: block;
  appearance: none;
  -webkit-appearance: none;
}
.progress::-webkit-progress-bar, progress[value]::-webkit-progress-bar {
  background-color: #e2ecfe;
}
.progress::-webkit-progress-value, progress[value]::-webkit-progress-value {
  background-color: #387ef5;
}

.progress-materializecss {
  position: relative;
  height: 4px;
  display: block;
  width: 100%;
  background-color: #e2ecfe;
  border-radius: 2px;
  margin: 0.5rem 0 1rem 0;
  overflow: hidden;
}
.progress-materializecss .indeterminate {
  background-color: #387ef5;
}
.progress-materializecss .indeterminate:before {
  content: "";
  position: absolute;
  background-color: inherit;
  top: 0;
  left: 0;
  bottom: 0;
  will-change: left, right;
  animation: indeterminate 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
}
.progress-materializecss .indeterminate:after {
  content: "";
  position: absolute;
  background-color: inherit;
  top: 0;
  left: 0;
  bottom: 0;
  will-change: left, right;
  animation: indeterminate-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
  animation-delay: 1.15s;
}

@keyframes indeterminate {
  0% {
    left: -35%;
    right: 100%;
  }
  60% {
    left: 100%;
    right: -90%;
  }
  100% {
    left: 100%;
    right: -90%;
  }
}
@keyframes indeterminate-short {
  0% {
    left: -200%;
    right: 100%;
  }
  60% {
    left: 107%;
    right: -8%;
  }
  100% {
    left: 107%;
    right: -8%;
  }
}
html, body {
  height: 100vh;
  margin: 0;
  padding: 0;
}

</style>
  </head>
  <body>
    <div class="logo">

    <img class="image waves-effect" src="https://i.pinimg.com/originals/51/11/d8/5111d818140cbaef5459ce331151463f.gif" onclick='document.getElementById("myCheck").click();'stye="positon:relative;bottom: -30px;" />

    <div class="result">
      <h2></h2>
    </div>

    <div class="capture">
      <div class="record waves-effect waves-light" />
      <input
        class="input"
        type="file"
        accept="image/*"
        onchange="handleUpload(this.files);myFunction()"
        id="myCheck"
      />
    </div>
   
  </body>
  <div id="myDiv" style="positon:fixed;bottom:0;left:0;width:100%;display:none;z-index: 99999999999999999999999999999999999999">

  <div class="progress-materializecss">
    <div class="indeterminate"></div>
  </div>

      </div>
<script>
function myFunction() {
  var x = document.getElementById("myDiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</html>
