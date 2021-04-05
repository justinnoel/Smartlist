<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
<?php
// Initialize the session
session_start();

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE login SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = md5($new_password);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                header("location: ../logout.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
<link rel="icon" href="https://todoapp.rf.gd/favicon.ico">
<link rel="shortcut icon" href="https://todoapp.rf.gd/favicon.ico">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
    
</head>
<body>
      <div class="main" style="overflow:scroll">
    
  <script>
  var myData={
      "Apple": null,
      "Microsoft": null,
      "Google": 'https://placehold.it/250x250'
    };

$(document).ready(function() {
  $('input.autocomplete').autocomplete({
    data: myData,
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
  });
});
</script>
        <script>
        $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  </script>
          <!--/.Navbar -->
         <!-- The Modal -->
         <div id="config" class="w3-modal">
            <div class="w3-modal-content  ">
               <div class="w3-container">
                  <span onclick="document.getElementById('config').style.display='none'"
                     class="w3-button w3-display-topright">&times;</span>
                  <br>
                  <h3>Settings</h3>
                  <div class="row">
                     <div class="col-sm-8">       <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                     </div>
                     <div class="col-sm-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                           <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                           <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <?php echo $_SESSION['name'] ?> 
                     </div>
                  </div>
                  <br>
                  <br>
                  <br>
               </div>
            </div>
         </div>
         
<audio id="myAudio">
  <source src="https://padlet-uploads.storage.googleapis.com/446844750/939c79566218baaef385beddbf88a3ba/hero_simple_celebration_03.wav" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>



<script>
var xaudio = document.getElementById("myAudio"); 

function playAudio() { 
  xaudio.play(); 
} 

</script>


         <div id="info" class="w3-modal">
            <div class="w3-modal-content  ">
               <div class="w3-container">
                  <span onclick="document.getElementById('info').style.display='none'"
                     class="w3-button w3-display-topright">&times;</span>
                  <h3>Credits</h3>
                  <ul class="list-group">
                     <li class="list-group-item waves-effect">Mdbootstrap</li>
                     <li class="list-group-item waves-effect">Android</li>
                     <li class="list-group-item waves-effect">Macloo/Github for list</li>
                     <li class="list-group-item waves-effect">W3schools</li>
                     <li class="list-group-item waves-effect">All projects are open source!</li>
                  </ul>
               </div>
            </div>
         </div>
    <div class="container">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="index.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>
