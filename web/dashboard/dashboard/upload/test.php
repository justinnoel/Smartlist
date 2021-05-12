

<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

<link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />


  <title>CodePen - Multiple object detection using pre trained model in TensorFlow.js</title>
  
  
  <style> * { box-sizing: border-box; } body{ overflow:hidden; background-color: transparent !important; } .zoom { padding: 10px; background-color: whitesmoke; transition: transform .2s; width: 100px; z-index:-1; height: 100px; margin: 0 auto; border-radius:100%; animation-name:zoom; animation-duration:1s; animation-fill-mode:forwards; animation-delay:3s; position: absolute; top:40%; left: 45%; opacity:0; transform: translate(-40%, -45%); } @keyframes zoom { 0% { transform: scale(1); opacity:0; } 50% { transform: scale(100%); opacity:.6 } 100% { opacity:0; transform: scale(20); } } .img { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); } #myProgress { width: 37%; background-color: #ddd; border-radius: 100px !important; text-align:center; display:block; margin:auto; position: absolute; top: 80%; left: 50%; transform: translate(-50%, -50%); display: none; } #myBar { width: 0%; height: 5px; background-color:#212121 ; border-radius:100px; } @keyframes a { 0% { transform: scale(10%); } } .a { padding: 10px; background-color: red; width: 100px; z-index:1; height: 100px; margin: 0 auto; border-radius:100%; animation-name:a; animation-duration:1s; animation-fill-mode:forwards; animation-delay:1s; position: absolute; top:50%; left: 50%; transform: translate(-40%, -45%); } /*eg*/ body { background-color: #fff; } svg { width: 66vw; height: 66vh; margin-left: 16.666vw; margin-top: 16.666vh; } /*main-logo*/ .ha-logo { background-color: transparent; } .ha-logo path, .ha-logo .house, .ha-logo g > circle { fill: none; stroke: #038fc7; stroke-width: 0.13px; stroke-dasharray: 10 0; } .ha-logo path.house, .ha-logo .house.house, .ha-logo g > circle.house { stroke-width: 0.25px; stroke-linejoin: round; stroke-linecap: round; } @keyframes house { 0% { stroke-dasharray: 50 50; stroke-dashoffset: -50; } 15% { fill: #fff; } 25% { fill: #038fc7; } 45% { stroke-dashoffset: -100; } 80% { stroke-dashoffset: -100; } 73% { fill: #038fc7; } 76% { fill: #fff; } 100% { stroke-dashoffset: -130; stroke-dasharray: 50 50; } } @keyframes circut { 0% { stroke: #038fc7; stroke-dasharray: 20 20; stroke-dashoffset: -20; } 10% { stroke: #038fc7; } 15% { stroke: #fff; stroke-dashoffset: -20; } 50% { stroke: #fff; stroke-dashoffset: -40; } 70% { stroke: #fff; } 80% { stroke: #038fc7; } 85% { stroke-dashoffset: -40; } 100% { stroke-dashoffset: -60; stroke-dasharray: 20 20; } } .ha-logo circle { animation: nodes 5s linear infinite; } .ha-logo .house { animation: house 5s ease infinite; } .ha-logo .circut { stroke-width: .176px; animation: circut 5s cubic-bezier(0.7, 0.1, 0.1, 0.9) infinite; } @keyframes nodes { 0% { stroke: #fff; stroke-dasharray: 0 4; } 25% { stroke-dasharray: 0 4; } 40% { stroke: #fff; stroke-dasharray: 4 0; } 41% { fill: none; } 42% { fill: #fff; } 55% { stroke: #fff; fill: none; } 65% { fill: #038fc7; } 75% { fill: none; stroke-dasharray: 4 0; } 83% { stroke: #fff; } 85% { stroke: #038fc7; fill: #038fc7; stroke-width: .15px; } 93% { fill: none; stroke-dasharray: 4 0; } 100% { stroke-dashoffset: 2; stroke-dasharray: 0 4; } } g circle:nth-child(1n) { animation-delay: -0.045s; } g circle:nth-child(2n) { animation-delay: -0.09s; } g circle:nth-child(3n) { animation-delay: -0.135s; } g circle:nth-child(4n) { animation-delay: -0.18s; } g circle:nth-child(5n) { animation-delay: -0.225s; } g circle:nth-child(6n) { animation-delay: -0.27s; } g circle:nth-child(7n) { animation-delay: -0.315s; } g circle:nth-child(8n) { animation-delay: -0.36s; } g circle:nth-child(9n) { animation-delay: -0.405s; } g circle:nth-child(10n) { animation-delay: -0.45s; } g circle:nth-child(11n) { animation-delay: -0.495s; } g circle:nth-child(12n) { animation-delay: -0.54s; } g circle:nth-child(13n) { animation-delay: -0.585s; } g circle:nth-child(14n) { animation-delay: -0.63s; } </style>
  
<style>
/**
 * @license
 * Copyright 2018 Google LLC. All Rights Reserved.
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * =============================================================================
 */

/******************************************************
 * Stylesheet by Jason Mayes 2020.
 *
 * Got questions? Reach out to me on social:
 * Twitter: @jason_mayes
 * LinkedIn: https://www.linkedin.com/in/creativetech
 *****************************************************/
* {
    transition: all .5s;
    box-sizing: border-box;
}
body {
  font-family: helvetica, arial, sans-serif;
  margin: 2em;
  color: #3D3D3D;
}

h1 {
  font-style: italic;
  color: #FF6F00;
}

h2 {
  clear: both;
}

em {
  font-weight: bold;
}

video {
  clear: both;
  display: block;
}

section {
  opacity: 1;
  transition: opacity 500ms ease-in-out;
}

header, footer {
  clear: both;
}

.removed {
  display: none;
}

.invisible {
  opacity: 0.2;
}

.note {
  font-style: italic;
  font-size: 130%;
}

.videoView, .classifyOnClick {
  position: relative;
  float: left;
  width: 48%;
  margin: 2% 1%;
  cursor: pointer;
}

.videoView p, .classifyOnClick p {
  position: absolute;
  display: block;
  padding: 7px;
  background-color: rgba(255, 111, 0, 0.85);
  color: #FFF;
  border: 1px solid rgba(255, 255, 255, 0.7);
  width: 100%;
  z-index: 2;
  font-size: 12px;
  margin: 0;
}

.highlighter {
  background: rgba(0, 255, 0, 0.25);
  border: 1px solid #fff;
  z-index: 1;
  position: absolute;
}

.classifyOnClick {
  z-index: 0;
}

.classifyOnClick img {
  width: 100%;
}
</style>

  
  
  
  

</head>

<body translate="no" >
  <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Upload!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  </head>  
  <body>
   <svg class="ha-logo" 
     xmlns="http://www.w3.org/2000/svg" 
     viewBox="0 0 10 10"
     id="svg"
      >
 
    
  <path
     class="house" 
     d="m 1.9,8.5 0,-3.2 -1,0 4,-4.3 2.2,2.1 0,-0.6 1,0 0,1.7 1,1.1 -1.2,0 0,3.2 z"   /> 

  <path 
     class="circut"
     d="M 5,8.7 5,4 M 5,7.5 6.6,5.9 6.6,4.3 M 5,6.3 3.5,4.9 3.5,4.3 M 6.2,5 6.6,5.4 7,5 m -1.1,1.1 0,0.5 0.5,0 M 4.2,5 l 0,0.5 -0.9,0 m 1.1,1.5 0,0.6 -0.6,0 M 5,8.4 3.6,6.7 M 5,8.4 6,7.5 6.7,7.5 M 4.6,3.6 5,4 5.4,3.6" />
  <g>
    <circle cx="5.5" cy="3.4" r="0.21" />
    <circle cx="4.5" cy="3.4" r="0.21" />
    <circle cx="6.6" cy="4.1" r="0.21" />
    <circle cx="3.5" cy="4.1" r="0.21" />
    <circle cx="4.2" cy="4.8" r="0.21" />
    <circle cx="6.1" cy="4.8" r="0.21" />
    <circle cx="7.1" cy="4.8" r="0.21" />
    <circle cx="6.6" cy="6.6" r="0.21" />
    <circle cx="5.9" cy="5.9" r="0.21" />
    <circle cx="3.2" cy="5.5" r="0.21" />
    <circle cx="3.5" cy="6.5" r="0.21" />
    <circle cx="4.4" cy="6.8" r="0.21" />
    <circle cx="3.6" cy="7.6" r="0.21" />
    <circle cx="6.9" cy="7.5" r="0.21" />
  </g>
  
  
  

</svg>
<h1 style="text-align:center" id="h1">Loading the image recognition...</h1>
    <section id="demos" class="invisible">
      <h2>Demo: Classifying Images</h2>
      <p><em>Click on the button below</em> to try and recognize what is in the image using the power of Machine Learning!</p>
      <div id="liveView" class="videoView">
        <button id="webcamButton">Enable Webcam</button>
        <video id="webcam" autoplay></video>
      </div>
    </section>

    <!-- Import TensorFlow.js library -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js" type="text/javascript"></script>
    
    <!-- Load the coco-ssd model to use to recognize things in images -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
  </body>
</html>
  
  
      <script id="rendered-js" >
/**
 * @license
 * Copyright 2018 Google LLC. All Rights Reserved.
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * =============================================================================
 */


const demosSection = document.getElementById('demos');

var model = undefined;

// Before we can use COCO-SSD class we must wait for it to finish
// loading. Machine Learning models can be large and take a moment to
// get everything needed to run.
cocoSsd.load().then(function (loadedModel) {
  model = loadedModel;
  // Show demo section now model is ready to use.
  demosSection.classList.remove('invisible');
  document.getElementById("svg").style.display="none";
  document.getElementById("h1").style.display="none";
});


/********************************************************************
// Demo 1: Grab a bunch of images from the page and classify them
// upon click.
********************************************************************/

// When an image is clicked, let's classify it and display results!
function handleClick(event) {
  if (!model) {
    console.log('Wait for model to load before clicking!');
    return;
  }
  
  // We can call model.classify as many times as we like with
  // different image data each time. This returns a promise
  // which we wait to complete and then call a function to
  // print out the results of the prediction.
  model.detect(event.target).then(function (predictions) {
    // Lets write the predictions to a new paragraph element and
    // add it to the DOM.
    console.log(predictions);
    for (let n = 0; n < predictions.length; n++) {
      // Description text
      const p = document.createElement('p');
      p.innerText = predictions[n].class  + ' - with ' 
          + Math.round(parseFloat(predictions[n].score) * 100) 
          + '% confidence.';
      // Positioned at the top left of the bounding box.
      // Height is whatever the text takes up.
      // Width subtracts text padding in CSS so fits perfectly.
      p.style = 'left: ' + predictions[n].bbox[0] + 'px;' + 
          'top: ' + predictions[n].bbox[1] + 'px; ' + 
          'width: ' + (predictions[n].bbox[2] - 10) + 'px;';

      const highlighter = document.createElement('div');
      highlighter.setAttribute('class', 'highlighter');
      highlighter.style = 'left: ' + predictions[n].bbox[0] + 'px;' +
          'top: ' + predictions[n].bbox[1] + 'px;' +
          'width: ' + predictions[n].bbox[2] + 'px;' +
          'height: ' + predictions[n].bbox[3] + 'px;';

      event.target.parentNode.appendChild(highlighter);
      event.target.parentNode.appendChild(p);
    }
  });
}



/********************************************************************
// Demo 2: Continuously grab image from webcam stream and classify it.
// Note: You must access the demo on https for this to work:
// https://tensorflow-js-image-classification.glitch.me/
********************************************************************/

const video = document.getElementById('webcam');
const liveView = document.getElementById('liveView');

// Check if webcam access is supported.
function hasGetUserMedia() {
  return !!(navigator.mediaDevices &&
    navigator.mediaDevices.getUserMedia);
}

// Keep a reference of all the child elements we create
// so we can remove them easilly on each render.
var children = [];


// If webcam supported, add event listener to button for when user
// wants to activate it.
if (hasGetUserMedia()) {
  const enableWebcamButton = document.getElementById('webcamButton');
  enableWebcamButton.addEventListener('click', enableCam);
} else {
  console.warn('getUserMedia() is not supported by your browser');
}


// Enable the live webcam view and start classification.
function enableCam(event) {
  if (!model) {
    console.log('Wait! Model not loaded yet.')
    return;
  }
  
  // Hide the button.
  event.target.classList.add('removed');  
  
  // getUsermedia parameters.
  const constraints = {
    video: true
  };

  // Activate the webcam stream.
  navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
    video.srcObject = stream;
    video.addEventListener('loadeddata', predictWebcam);
  });
}


function predictWebcam() {
  // Now let's start classifying the stream.
  model.detect(video).then(function (predictions) {
    // Remove any highlighting we did previous frame.
    for (let i = 0; i < children.length; i++) {
      liveView.removeChild(children[i]);
    }
    children.splice(0);
    
    // Now lets loop through predictions and draw them to the live view if
    // they have a high confidence score.
    for (let n = 0; n < predictions.length; n++) {
      // If we are over 66% sure we are sure we classified it right, draw it!
      if (predictions[n].score > 0.66) {
        const p = document.createElement('p');
        p.innerText = predictions[n].class  + ' - with ' 
            + Math.round(parseFloat(predictions[n].score) * 100) 
            + '% confidence.';
        // Draw in top left of bounding box outline.
        p.style = 'left: ' + predictions[n].bbox[0] + 'px;' +
            'top: ' + predictions[n].bbox[1] + 'px;' + 
            'width: ' + (predictions[n].bbox[2] - 10) + 'px;';

        // Draw the actual bounding box.
        const highlighter = document.createElement('div');
        highlighter.setAttribute('class', 'highlighter');
        highlighter.style = 'left: ' + predictions[n].bbox[0] + 'px; top: '
            + predictions[n].bbox[1] + 'px; width: ' 
            + predictions[n].bbox[2] + 'px; height: '
            + predictions[n].bbox[3] + 'px;';

        liveView.appendChild(highlighter);
        liveView.appendChild(p);
        
        // Store drawn objects in memory so we can delete them next time around.
        children.push(highlighter);
        children.push(p);
      }
    }
    
    // Call this function again to keep predicting when the browser is ready.
    window.requestAnimationFrame(predictWebcam);
  });
}
    </script>

  

</body>

</html>
 
