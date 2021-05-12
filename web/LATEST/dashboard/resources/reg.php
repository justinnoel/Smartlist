<?php 
session_start();
if(isset($_SESSION['valid'])) {
header("Location: test.php");
}
?>
<html>
<head>
    <title>Register</title>
 <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "047864006fdb4ab685473b1c22abd1e1"}'></script><!-- End Cloudflare Web Analytics -->    <script src="https://www.google.com/recaptcha/api.js"
    async defer>
</script>
<script>
function doSomething() { setTimeout(function(){ $('#modal1').modal('close');  }, 1000);}

function get_action(form) 
{
    var v = grecaptcha.getResponse();
    if(v.length == 0)
    {
        document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
        return false;
    }
    else
    {
        document.getElementById('captcha').innerHTML="Captcha completed";
        return true; 
    }
}
</script>
  <div id="modal1" style="margin-top:-10vh !important;position:fixed;top: -100px;left: 0;width: 100%;height: 100%;background: rgba(0,0,0,0.3);z-index: 9999;outline:0;">
    <div style="position: fixed;top: 10%;left: 50%;width:50%;transform: translateX(-50%);background: white;padding: 30px;border-radius: 2px;    box-shadow: 0 20px 50px rgba(0,0,0,0.57);">
      <h4>Hello!</h4>
      <p>Please confirm that you aren't a robot. They are remarkably lifelike these days, and sorry for the confusion</p>
      <div class="g-recaptcha" data-sitekey="6LdSGPAZAAAAAMs85kHIOqrMKV7W_nDcJ-V0n2g7"  data-callback='doSomething'>></div>
    </div>
  </div>
<style>
 body{ font: 14px sans-serif;overflow-x:hidden}
        .wrapper{ width: 350px; padding: 0px;background-color:aliceblue;position: absolute;
  top: 50%;
  left: 50%;
  border-radius:10px;
  text-align:center;
  
  }
  #rc-anchor-container,.rc-anchor-normal {
      width: 100%;
  }
  @media only screen and (max-width: 900px) {
  .r {
    display:none;
  }
  .m {
      display:block;
  }
  .wrapper {
      top: 0%;
  left: 0%;
  //text-align:center;
  height:100%;
  width:100%;
  border-radius:0;
  background:transparent;
   
background-size: cover;
  }
  body {
   
  background-attachment: fixed;
background-repeat: no-repeat;
position:relative;
height:100vh;
  }

  .help-block {
      animation-duration:0s !important;
  }
  @keyframes help {
    0% {
        bottom:-300px;
    }
9% {
    bottom:-100px;
}
90% {
    bottom:-100px;
}
100% {
    bottom:-100px;
}
}
}
@media only screen and (min-width: 600px) {
  .r {
display:block;

  }
       .wrapper{ 
        width: 50%; 
       padding: 20px;
       background-color:white;
       backdrop-filter:blur(0px);
         transform: translate(-50%, -50%); 

       position: absolute;
  top: 50%;
  right: 0px !important;
  border-radius:10px;
  height:100%;
  border-radius:0px;
  text-align:center;
  margin-left:25%;
}
.m {
    display:none;
}
.form-control {

}
}
.intro {
    width:100%;
    background:#f1f1f1;
    height:100%;
        transform: scaleX(-1);;
    background-image: url(https://wallpaperaccess.com/full/38582.jpg);backdrop-filter:blur(10px);background-color: #cccccc;
  background-attachment: fixed;
background-repeat: no-repeat;
background-size: cover;
position: relative;
    position:absolute;
    top:0;
    padding:20px;
    left:0;
}
.help-block {
    position:fixed;
    bottom:-300px;
left: 0%;
  transform: translate(0%, -50%);    animation-name:err;
    background-color:red;
   color:white;
   width:100%;
   animation-name:help;
   animation-fill-mode:forwards;
   animation-duration:5s;
   animation-delay:.5s;
}
/* The snackbar - position it at the bottom and in the middle of the screen */
@keyframes help {
    0% {
        bottom:-300px;
    }
9% {
    bottom:-30px;
}
90% {
    bottom:-30px;
}
100% {
    bottom:-100px;
}
}
@keyframes err {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 0px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
output {
    padding:20px 20px 20px 15px;
    z-index:9999999;
}
</style>
<style>
/* Style all input fields */

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}


/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  color: #000;
  position: fixed;
  top: 0%;
  padding:30px;
  width: 0%;
  height: 100%;
  width: 53%;
  border-radius:0px;
  background: whitesmoke;
  backdrop-filter: blur(10px);
  animation-name:zoom;
  animation-fill-mode:forwards;
  animation-duration:1s;
}
@keyframes zoom {
    0% {
        transform: scale(.1), translate(-50%, -50%);
    }
    100% {
        transform:scale(1),translate(-50%, -50%);
    }
}
#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✓";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "\00d7";
}
  @media only screen and (max-width: 900px) {
  
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  color: #000;
  position: fixed;
  margin-top: 0px;
  top: 0%;
  padding:10px;
  left: 0%;
  border-radius:0px;
  background: whitesmoke;
  backdrop-filter: blur(10px);
  transform: translate(-0%, -0%);
  animation-name:zoom;
  animation-fill-mode:forwards;
  width: 100%;
  animation-duration:1s;
}
#message p {
  padding: 0px 35px;
  font-size: 18px;
}
  }
</style>

</head>

<body>
    <?php
    include("connection.php");
    if(isset($_POST['submit'])) {
        $result = mysqli_query($mysqli, "SELECT FROM login WHERE username='$name'");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if($user == "" || $pass == "" || $name == "" || $email == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register.php'>Go back</a>";
        } 
        else {
            if (mysqli_num_rows($result) <= 1) {
            mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
            or die("Could not execute the insert query.");
           echo "<script type='text/javascript'>window.top.location='login.php?register=true';</script>"; exit;
           }
           else {
               echo "<script>window.top.location='register.php?utaken=true';</script>";
           }
        }
    } else {
?><div id="message" style="z-index:99999999;">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<div class="intro r">

</div>
        <div class="wrapper">
    <div class="container" style="text-align:center">

           
        <h2 class="">Sign Up</h2>
        <p class="">To access your inventory anywhere, anytime!</p>
        <form name="form1" method="post" action="">
<div class="form-group w-75 d-inline-block input-field  ">
                <label style="display:inline-block;float:left;" data-error="wrong" data-success="right" autofocus>Full Name</label>
                    <input type="text" name="name" class="form-control validate m-0" id="a" required autocomplete="chrome-off" data-length="20">

    </div>
                    <div class="form-group w-75 d-inline-block input-field  ">
                <label style="display:inline-block;float:left;" data-error="wrong" data-success="right">Email</label>
                    <input type="text" name="email" class="form-control validate m-0" id="b" required autocomplete=" chrome-off" data-length="50">

        </div>

                   <div class="form-group w-75 d-inline-block input-field  ">
                <label style="display:inline-block;float:left;" data-error="wrong" data-success="right">Username</label> 
                    <input type="text" name="username" class="form-control validate m-0" id="c" required autocomplete="chrome-off" data-length="10"></td>

     </div>

                   <div class="form-group w-75 d-inline-block input-field  md-outline">
                <label style="display:inline-block;float:left;" data-error="wrong" data-success="right" autocomplete="chrome-off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">Password</label> 
                <input type="password" name="password" class="form-control validate m-0" id="d" required autocomplete="new-password">

    </div><br>

  <!-- Modal Trigger -->

                    <input type="submit" name="submit" value="Submit" class="btn btn-dark">
                      <p>Already have an account? <a style="" href="login.php">Login!</a></p>

<script>
$(document).ready(function() {
    $('input').characterCounter();
  });
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
$('#modaal1').modal({
            dismissible: false
});
</script>
<script type="text/javascript">
  var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
   $(document).ready(function(){
    $('#modal1').modal();
 });
</script>
<script>
var correctCaptcha = function(response) {
        alert(response);
};
var myInput = document.getElementById("d");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
 <?php
 if(isset($_GET['utaken'])) {
?>
<script>
M.toast({html: 'Username Already Taken'});
    $('#modal1').modal('close'); 
</script>
<?php 
 }
 ?>
        </form>
          <!-- Modal Structure -->

    <?php
    }
    ?>
</body>
</html>