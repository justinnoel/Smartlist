var form = document.querySelector("form");
var currentPage = 0;

function page(el) {
  document
    .querySelectorAll(".page")
    .forEach((e) => e.classList.remove("loginActive"));
  document.querySelectorAll(el).forEach((e) => e.classList.add("loginActive"));
}

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
      url: 'https://smartlist.ga/dashboard/login_auth.php',
      data: $(form).serialize(),
      processData: false,
      type: 'POST',
      success: function ( data ) {
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

function reset() {
  page("#p1");
  currentPage=0;
  setTimeout(function () {
    document.getElementById("p1").getElementsByTagName("input")[0].focus();
  }, 200);
}
$('input').focus()
if(_e.isDarkMode()) {document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#000');}
else {document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#eee');}
