    <?php
$databaseHost = 'localhost';
$databaseName = 'bcxkspna_test';
$databaseUsername = 'bcxkspna';
$databasePassword = 'Q$J~:4GI!7+E'; // Q$J~:4GI!7+E
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (mysqli_connect_errno()) {
     echo '<!DOCTYPE html> <html> <head> <meta name="viewport" content="width=device-width, initial-scale=1"> <title>404</title> <style> form { height: 100%; } form { width:50vw; position:relative; margin: auto; padding: 10px; box-shadow: 25px 25px 100px #eee; border-radius: 4px; animation: form .2s forwards; animation-delay: .5s; transform: scale(.8); opacity: 0; transition: all .2s !important; } @keyframes form { 0% { opacity: 0; } 100% { opacity: 1; transform: scale(1) } } * { box-sizing: border-box; font-family: \'Open Sans\', sans-serif; } input {background: whitesmoke;outline: 0;border: 0;padding: 15px;width: 100%;transition: all .2s} input:hover {background: #ddd} input:focus {background: #eee} button {background: #1e88e5;outline: 0;border: 0;padding: 15px;width: 100%;margin-top: 10px;color:white;cursor: pointer;transition: all .2s} button:hover {background: #1565c0} button:active {background: #0d47a1;transform: scale(.98)} form:before { background:linear-gradient(to left, #c4268c, #9a0b72); content: ""; width: 100%; position: absolute; top: 0; left: 0; border-radius: 4px; height: 5px } @media only screen and (max-width: 900px) { form { width: 75vw } @media only screen and (max-width: 600px) { form { width: 95vw } </style> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <script> $(document).ready(function(){ $("button").click(function(){ $("#div1").load("action.php"); }); }); </script> </head> <body> <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> <div style="text-align:center;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);font-family: \'Open Sans\', sans-serif;" > <div id="form"> <form method="POST"> <h1 style="text-align:center">500</h1> <p style="text-align:center">Internal Server Error</p> <p>'.mysqli_connect_error().'</p></form> </div> </div> <div id="div1"></div> </body> </html>';
  exit();
}
?>