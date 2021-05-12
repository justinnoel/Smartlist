<!DOCTYPE html>
<html lang="en" >
	<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><meta name="viewport" content="width=device-width, initial-scale=1">

		<style>
		body {margin:0;}
section { opacity: 1; transition: opacity 500ms ease-in-out; } header, footer { clear: both; } .removed { display: none; } .invisible { opacity: 0.2; } .note { font-style: italic; font-size: 130%; }  .videoView p, .classifyOnClick p { position: absolute; padding: 5px; background-color: rgba(255, 111, 0, 0.85); color: #FFF;  z-index: 2; font-size: 12px; margin: 0; } .highlighter { background: rgba(0, 255, 0, 0.25); z-index: 1; position: absolute; } .classifyOnClick { z-index: 0; } .classifyOnClick img { width: 100%; }
.collection-item {width:100%}
@media only screen and (max-width: 992px) {
    video {
        position: fixed;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
        z-index: -1;
    }
    body {
        overflow: hidden;
        background: #101010;
    }
    .predictions {
        position: fixed;
        bottom: 0;
        background: white;
        left: 0;
        padding: 15px;
        max-height: 40vh;
        transition: all .2s;
        overflow: hidden;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        z-index:999999;
    }
    .collection {
        border:0;   
    }
}
		</style>
	</head>
    <div id="AJAX_LOADER"></div>
	<body translate="no">
    <div class="row">
      <div class="col s12 m6 center">
        <button id="webcamButton" class="btn blue-grey darken-3 waves-effect waves-light" disabled style="margin-top: 50px">Loading, Please wait...</button>
				<section id="demos" class="invisible">
					<div id="liveView" class="videoView">
						<video id="webcam" autoplay width="100%"></video>
					</div>
				</section>
      </div>
      <div class="col s12 m6 z-depth-5 predictions">
        <h5>Items detected</h5>
        <ul id="__predictions" class="collection"></ul>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js"></script>
    <script src="/script.js" defer></script>
		<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
		<script id="rendered-js" >
      function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
			const demosSection = document.getElementById('demos');
			var model = undefined;
			cocoSsd.load().then(function (loadedModel) {
				model = loadedModel;
        document.getElementById('webcamButton').disabled = false;
        document.getElementById('webcamButton').innerHTML = 'Enable webcam!';
				demosSection.classList.remove('invisible');
			});
			const video = document.getElementById('webcam');
			const liveView = document.getElementById('liveView');
			function hasGetUserMedia() {
				return !!(navigator.mediaDevices &&
									navigator.mediaDevices.getUserMedia);
			}
			var children = [];
			if (hasGetUserMedia()) {
				const enableWebcamButton = document.getElementById('webcamButton');
				enableWebcamButton.addEventListener('click', enableCam);
				enableWebcamButton.addEventListener('click', function() {
				    confirm('Are you sure you want to turn on your webcam? \n\n Your device may experience lag')
				});
			} else {
				console.warn('getUserMedia() is not supported by your browser');
			}
			function enableCam(event) {
				if (!model) {
					console.log('Wait! Model not loaded yet.')
					return;
				}
				event.target.classList.add('removed');  
				const constraints = {
					video: true
				};
				navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
					video.srcObject = stream;
					video.addEventListener('loadeddata', predictWebcam);
				});
			}
			function predictWebcam() {
				model.detect(video).then(function (predictions) {
					for (let i = 0; i < children.length; i++) {
						liveView.removeChild(children[i]);
					}
					children.splice(0);
					for (let n = 0; n < predictions.length; n++) {
						if (predictions[n].score > 0.50) {
                            document.getElementById('__predictions').insertAdjacentHTML ('beforeend', `
                            <li class="collection-item">
                                ${capitalizeFirstLetter(predictions[n].class)} 
                                <a class="btn blue-grey waves-effect right waves-light" onclick="M.toast({html: 'Added item successfully!'});$('#AJAX_LOADER').load('add.php?name=${encodeURI(predictions[n].class)}')">Add to inventory</a>
                            </li>`);
                            $(".predictions").scrollTop($(".predictions")[0].scrollHeight);
							const p = document.createElement('p');
							p.innerText = capitalizeFirstLetter(predictions[n].class);
							p.style = 'left: ' + predictions[n].bbox[0] + 'px;' +
								'top: ' + predictions[n].bbox[1] + 'px;' + 
								'width: ' + (predictions[n].bbox[2] - 0) + 'px;';
							const highlighter = document.createElement('div');
							highlighter.setAttribute('class', 'highlighter');
							highlighter.style = 'left: ' + predictions[n].bbox[0] + 'px; top: '
								+ predictions[n].bbox[1] + 'px; width: ' 
								+ predictions[n].bbox[2] + 'px; height: '
								+ predictions[n].bbox[3] + 'px;';

							liveView.appendChild(highlighter);
							liveView.appendChild(p);
							children.push(highlighter);
							children.push(p);
						}
					}
					window.requestAnimationFrame(predictWebcam);
				});
			}
		</script>
	</body>
</html>