<?php 
die("Coming soon...");
session_start();
setcookie("p", $_GET['u']);
include('../cred.php');
if(isset($_POST['pwd'])) {
    $hash = password_hash($_POST['pwd'], PASSWORD_ARGON2I);
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, App::passwordwordword);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE login SET password=".json_encode($hash)." WHERE id=".$_GET['u'];
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "Success";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Reset Your Password | Smartlist</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>body {background: #fafafa}</style>
  </head>
  <body>
    <div class="container">
      <div class="container">
        <div class="container" style="background: #fff;-webkit-box-shadow:0 2px 0 0 #f5f5f5;box-shadow:0 16px 50px rgba(10,10,10,.05) !important;padding: 40px 10px;border-radius: 5px;margin-top: 30px;">
          <center>
            <div class="container">
              <div id="lock"></div>
            </div>
            <h4>
              Reset Your Password
            </h4>
            <p>
              Please fill this form out to reset your password
            </p>
            <form class="col s12" method="POST" id="reset_form">
              <div class="row">
                <div class="input-field col s12" id="pre_1">
                  <i class="material-icons prefix" style="color:gray">lock_outline</i>
                  <input id="password" type="text" class="" name='pwd' autocomplete="off">
                  <label for="password">New Password</label>
                </div>
                <div class="input-field col s12" id="pre_1">
                  <i class="material-icons prefix" style="color:gray">lock_outline</i>
                  <input id="password_confirm" type="text" class="" name='pwd1' autocomplete="off">
                  <label for="password_confirm">Confirm</label>
                </div>
                <div class='col s12' id='load' style='padding: 0 !important;background:white'>
                </div>
                <div class="col s12">
                  <button class="btn purple darken-3 waves-effect waves-light" name='submitBtnLogin' id="submit">Save</button>
                </div>
              </div>
            </form>
          </center>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js"></script>
    <script>
      window.onerror = function(msg, url, linenumber) {
          alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
          return true;
      }
      var lock = `<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>`;
      var unlock = `<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-unlock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 9.9-1"></path></svg>`;
      document.getElementById('lock').innerHTML = unlock;
      document.getElementById('reset_form').addEventListener('submit', function(event) {
        event.preventDefault();
        var x = document.getElementById('password');
        var y = document.getElementById('password_confirm');
        if(x.value !== "" && y.value !== "") {
            if(x.value == y.value) {
              switch(validatePassword()) {
                  case "length": M.toast({html: "Password must be at least 8 digits long"}); return false; break;
                  case "letter": M.toast({html: "Password must be at contain at least 1 letter"}); return false; break;
                  case "number": M.toast({html: "Password must be at least 1 number"}); return false; break;
              }
              var xxxxe = document.getElementById('submit');
              setTimeout(function(){
                xxxxe.disabled=true; 
                setTimeout(function(){
                  xxxxe.innerHTML = 'Encrypting your account...' ;
                  setTimeout(function(){
                    xxxxe.innerHTML = 'Cross-verifying your request...' }, 0700);
                }, 0700);
              },0200);
               var form = $('form');
                $.ajax({
                   type: "POST",
                   url: 'https://smartlist.ga/dashboard/resources/reset-password.php?u=<?php echo $_GET['u'];?>',
                   data: form.serialize(),
                   success: function(data)
                   {
                       if(data == "Success") {
                           window.location = "https://smartlist.ga/dashboard/login.php?reset";
                       }
                       else {
                           M.toast({html: "Error resetting Password. Please Contact Support"});
                       }
                   }
                 });
            }
            else {
              M.toast({html: "Passwords do not match"})
            }
        }
        else {
            M.toast({html: "Please type a password"});
        }
        document.getElementById('lock').innerHTML = lock;
      });
      function validatePassword() {
        var p = document.getElementById('password').value,
            errors = [];
        if (p.length < 8) {
          return "length";
        }
        if (p.search(/[a-z]/i) < 0) {
          return "letter"
        }
        if (p.search(/[0-9]/) < 0) {
          return "number";
        }
        if (errors.length > 0) {
          alert(errors.join("\n"));
          return false;
        }
        return true;
      }

    </script>
  </body>
</html>