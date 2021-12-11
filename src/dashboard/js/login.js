'use strict';
var form = document.querySelector("form");
var currentPage = 0;

/**
 * 
 * @param {*} el - The element to be animated
 */
function page(el) {
   document
      .querySelectorAll(".page")
      .forEach((e) => e.classList.remove("loginActive"));
   document.querySelectorAll(el).forEach((e) => e.classList.add("loginActive"));
}
/**
 * 
 * @returns {boolean} - Returns true if the form is valid
 */
function handleSubmit() {
  if (currentPage === 0 && document.getElementById("p1").getElementsByTagName("input")[0].value.trim()!=="") {
    setTimeout(() => {
      page("#p2");
      setTimeout(function () {
        document.getElementById("p2").getElementsByTagName("input")[0].focus();
      }, 200);
    }, 200);
    currentPage = 1
  }
  else {
    document.getElementById("progress").classList.remove("hide")
    $.ajax({
      url: 'https://smartlist.ga/dashboard/login/auth.php',
      data: $(form).serialize(),
      processData: false,
      type: 'POST',
      success: function ( data ) {
        M.toast({html:data})
        var parts = window.location.search.substr(1).split("&");
        var $_GET = {};
        for (var i = 0; i < parts.length; i++) {
            var temp = parts[i].split("=");
            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        }
        if($_GET['close']) {
          window.close();
        }
        // alert(data);
        document.getElementById("progress").classList.add("hide")
        if(data == 'Invalid') {
          M.toast({text: 'Invalid username or password'});
          reset();
        }
        else if(data.includes("confirm_email")) {
          // alert(data)
          M.toast({text: "New login location detected, please check your email, "+data.replace("confirm_email", "")})
        }
        else if(data == 'Empty') {
          M.toast({text: 'Both fields are required'});
          reset();
        }
        else if (data == 'Valid') {
          document.getElementById("progress").classList.remove("hide")
          sessionStorage.setItem('status','loggedIn');
          history.pushState(null, null, 'https://smartlist.ga/dashboard/')
          setTimeout(function() {
            window.location.href='https://smartlist.ga/dashboard';
          }, 300);
        }
        else if(data == "Welcome") {
          window.location.href = "https://smartlist.ga/dashboard/welcome"
        }
        else if (data =="verify") {
          window.location.href = "https://smartlist.ga/signup?auth"
        }
        else if (data == 'max') {
          window.location.reload();
          document.cookie = "attempts=5";
        }
        else {
          if(data.includes('__AUTH__')) {
            data = data.replace("__AUTH__", "");
            window.location.href = data.split("|")[0]+"?token="+data.split("|")[1]
          }
          reset()
        }


      }
    });
    event.preventDefault();
    return false;
  }
}

page("#p1");
setTimeout(function () {
  document.getElementById("p1").getElementsByTagName("input")[0].focus();
}, 200);

/**
 * @description - Resets the form
 */
function reset() {
  page("#p1");
  currentPage=0;
  setTimeout(function () {
    document.getElementById("p1").getElementsByTagName("input")[0].focus();
  }, 200);
}
$('input').focus()
/**
 * @description - Toggles dark theme
 */
if(_e.isDarkMode()) {document.cookie="dark=true";document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#000');document.documentElement.classList.add("_darkTheme")}
else {document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#eee');}
