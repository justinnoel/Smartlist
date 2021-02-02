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
  chrome.omnibox.onInputChanged.addListener(
    function(text, suggest)
    {
        text = text.replace(" ", "");

        // Add suggestions to an array
        var suggestions = [];
        suggestions.push({ content: "http://reddit.com/r/" + text, description: "reddit.com/r/" + text });
        suggestions.push({ content: "http://imgur.com/r/" + text, description: "imgur.com/r/" + text });

        // Set first suggestion as the default suggestion
        chrome.omnibox.setDefaultSuggestion({description:suggestions[0].description});

        // Remove the first suggestion from the array since we just suggested it
        suggestions.shift();

        // Suggest the remaining suggestions
        suggest(suggestions);
    }
);

chrome.omnibox.onInputEntered.addListener(
    function(text)
    {
        chrome.tabs.getSelected(null, function(tab)
        {
            var url;
            if (text.substr(0, 7) == 'http://') {
                url = text;

            // If text does not look like a URL, user probably selected the default suggestion, eg reddit.com for your example
            } else {
                url = 'http://reddit.com/r/' + text;
            }
            chrome.tabs.update(tab.id, {url: url});
        });
    }
);