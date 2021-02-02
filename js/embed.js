// Get webview element
var webview = document.getElementById('webview');

// Get find box elements
var findBox = document.getElementById('find-box');
var findInput = document.getElementById('find-text');

// Get dialog box elements
var dialogBox = document.getElementById("dialog-box");
var dialogOk = document.getElementById("dialog-box-ok");
var dialogText = document.getElementById("dialog-box-text");
var dialogInput = document.getElementById("dialog-box-input");
var dialogCancel = document.getElementById("dialog-box-cancel");

// Initial page zoom factor
var zoomFactor = 1.0;

// Listen to keydown event
window.onkeydown = function (e) {
    // Check whether CTRL on Windows or CMD on Mac is pressed
    var modifierActive = (navigator.platform.startsWith('Mac')) ? e.metaKey : e.ctrlKey;
    var altModifierActive = (navigator.platform.startsWith('Mac')) ? e.ctrlKey : e.altKey;

    // Enter full screen mode (CMD/ALT + CTRL + F)
    if (modifierActive && altModifierActive && e.keyCode == 'F'.charCodeAt(0)) {
        // Get current focused window
        var window = chrome.app.window.current();

        // Check if currently full screen
        if (!window.isFullscreen()) {
            // Enter full screen mode
            window.fullscreen();
        }
        else {
            // Exit full screen mode
            window.restore();
        }

        // Prevent other shortcut checks
        return;
    }

    // Refresh the page (CTRL/CMD + R)
    if (modifierActive && e.keyCode == 'R'.charCodeAt(0)) {
        webview.reload();
    }

    // Find in page (CTRL/CMD + F)
    if (modifierActive && e.keyCode == 'F'.charCodeAt(0)) {
        // Show the find box
        findBox.style.display = 'block';

        // Focus the find input
        findInput.focus();

        // Select all existing text (if any)
        findInput.select();
    }

    // Copy URL (CTRL/CMD + L)
    if (modifierActive && e.keyCode == 'L'.charCodeAt(0)) {
        // Copy webview source to clipboard
        copyToClipboard(webview.src, 'text/plain');
       // var notification = new Notification("Copied Url!");
        myFunction();
    }

    // Print (CTRL/CMD + P)
    if (modifierActive && e.keyCode == 'P'.charCodeAt(0)) {
        webview.print();
    }

    // Zoom in (CTRL/CMD +)
    if (modifierActive && e.keyCode == 187) {
        zoomFactor += 0.1;
        webview.setZoom(zoomFactor);
        printpreview();
    }

    // Zoom out (CTRL/CMD -)
    if (modifierActive && e.keyCode == 189) {
        zoomFactor -= 0.1;
        zoomout();
        // Don't let zoom drop below 0.2
        if (zoomFactor <= 0.2) {
            zoomFactor = 0.2;
            maxzoom();
        }

        webview.setZoom(zoomFactor);
    }

    // Reset zoom (CTRL/CMD + 0)
    if (modifierActive && e.keyCode == '0'.charCodeAt(0)) {
        zoomFactor = 1.0;
        webview.setZoom(zoomFactor);
        var notification = new Notification("Zoom reset");

    }
};

// Listen for webview load event
webview.addEventListener('contentload', function () {
    // Execute JS script within webview
    webview.executeScript({
        // Send a Chrome runtime message every time the keydown event is fired within webview
        code: `window.addEventListener('keydown', function (e) {
            chrome.runtime.sendMessage({ event: 'keydown', params: { ctrlKey: e.ctrlKey, metaKey: e.metaKey, altKey: e.altKey, keyCode: e.keyCode } });
        });`});
});

// Listen for Chrome runtime messages
chrome.runtime.onMessage.addListener(
    function (request, sender, sendResponse) {
        // Check for keydown event
        if (request.event === 'keydown') {
            // Invoke the local window's keydown event handler
            window.onkeydown(request.params);
        }
    }
);

// Find input: listen to keydown event
findInput.addEventListener('keyup', function (e) {
    // Search for current input text
    webview.find(findInput.value, { matchCase: false });

    // Escape key
    if (e.keyCode === 27) {
        webview.stopFinding();
        findBox.style.display = 'none';
    }
});

function copyToClipboard(str, mimetype) {
    // Listen for 'oncopy' event
    document.oncopy = function (event) {
        event.clipboardData.setData(mimetype, str);
        event.preventDefault();
    };

    // Execute browser command 'Copy'
    document.execCommand("Copy", false, null);
}

// Custom alert dialog popup
var dialogController;

// Listen for dialog cancellation button click
dialogCancel.addEventListener('click', function () {
    // Send cancellation
    dialogController.cancel();

    // Hide dialog box
    dialogBox.style.display = 'none';
        // Escape key
        dialogBox.addEventListener('keyup', function (e) {

        if (e.keyCode === 27) {
            webview.stopFinding();
            dialogBox.style.display = 'none';
        }    
    });

});

// Listen for dialog OK button click
dialogOk.addEventListener('click', function () {
    // Send OK value
    dialogController.ok(dialogInput.value);

    // Hide dialog box
    dialogBox.style.display = 'none';
});

// Listen for dialog event on webview for new alert dialogs
webview.addEventListener('dialog', function (e) {
    // Prevent default logic
    e.preventDefault();

    // Extract dialog type and text
    var text = e.messageText;
    var dialogType = e.messageType;

    // Keep a reference to dialog object
    dialogController = e.dialog;

    // Set dialog text
    dialogText.innerHTML = text;

    // Reset dialog input
    dialogInput.value = '';

    // Hide it by default
    dialogInput.style.display = 'none';

    // Alert?
    if (dialogType == 'alert') {
        // Hide cancel button
        dialogCancel.style.display = 'none';
    }
    else {
        // Another type of dialog, show cancel button
        dialogCancel.style.display = 'block';

        // Prompt?
        if (dialogType == 'prompt') {
            // Show text input field
            dialogInput.style.display = 'block';
        }
    }

    // Show dialog box
    dialogBox.style.display = 'block';
    dialogBox.addEventListener('keyup', function (e) {

        if (e.keyCode === 27) {
            webview.stopFinding();
            dialogBox.style.display = 'none';
        }    
    });

});
function notifyMe() {
    // Let's check if the browser supports notifications
    if (!("Notification" in window)) {
      alert("This browser does not support desktop notifications. Please use Chrome");
    }
  
    // Let's check whether notification permissions have already been granted
    else if (Notification.permission === "granted") {
      // If it's okay let's create a notification
      var notification = new Notification("Welcome to Homebase!");
      playAudio();
    }
  
    // Otherwise, we need to ask the user for permission
    else if (Notification.permission !== "denied") {
      Notification.requestPermission().then(function (permission) {
        // If the user accepts, let's create a notification
        if (permission === "granted") {
          var notification = new Notification("Hello!");
        }
      });
    }
  
    // At last, if the user has denied notifications, and you 
    // want to be respectful there is no need to bother them any more.
  }
  function spawnNotification(theBody,theIcon,theTitle) {
    var options = {
        body: theBody,
        icon: theIcon
    }
  
    var n = new Notification(theTitle,options);
  
    console.log(n.title)
  }
  function b() {
    new Notification("Welcome to Homebase beta!");
    playAudio();
  }
  function c() {
    new Notification("We're sorry you left Homebase. You can sign up by clicking the launch icon in the front page. If you want to give feedback, please email the developer at coolbitmoji@gmail.com!");
    event.preventDefault(); // prevent the browser from focusing the Notification's tab
    notification.onclick.open('http://www.mozilla.org', '_blank');
    
  }
  function d() {
    notification.onclick = function(event) {
    event.preventDefault(); // prevent the browser from focusing the Notification's tab
    window.open('http://www.mozilla.org', '_blank');
  }
  }
  function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
  function printpreview() {
    var ax = document.getElementById("snackbara");
    ax.className = "show";
    setTimeout(function(){ ax.className = ax.className.replace("show", ""); }, 3000);
  } 
   function zoomout() {
    var asx = document.getElementById("snackbarab");
    asx.className = "show";
    setTimeout(function(){ asx.className = asx.className.replace("show", ""); }, 3000);
  }
  function maxzoom() {
    var asxc = document.getElementById("snackbarabc");
    asxc.className = "show";
    setTimeout(function(){ ascx.className = asxc.className.replace("show", ""); }, 3000);
  }