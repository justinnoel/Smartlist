<?php 
session_start();
if(isset($_SESSION['valid'])) {
    header("Location: https://smartlist.ga/dashboard/beta");
    exit;
}
if(isset($_POST['username'])){
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM login WHERE email='".$_POST['username']."' AND username='".$_POST['uname']."'";
  $users = $dbh->query($sql);
  $lr_count = $users->rowCount();
  if($lr_count > 0) {
  foreach ($users as $row) {
      $hash = md5($row['password']);
      $id = $row['id'];
  }
  $to = ($_POST['username']);
$subject = 'Reset your Password | Smartlist ';
$message = '<!DOCTYPE html> 
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Email Confirmation</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style type="text/css"> /** * Google webfonts. Recommended to include the .woff version for cross-client compatibility. */ @media screen { @font-face { font-family: \'Source Sans Pro\'; font-style: normal; font-weight: 400; src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\'); } @font-face { font-family: \'Source Sans Pro\'; font-style: normal; font-weight: 700; src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\'); } } /** * Avoid browser level font resizing. * 1. Windows Mobile * 2. iOS / OSX */ body, table, td, a { -ms-text-size-adjust: 100%; /* 1 */ -webkit-text-size-adjust: 100%; /* 2 */ } /** * Remove extra space added to tables and cells in Outlook. */ table, td { mso-table-rspace: 0pt; mso-table-lspace: 0pt; } /** * Better fluid images in Internet Explorer. */ img { -ms-interpolation-mode: bicubic; } /** * Remove blue links for iOS devices. */ a[x-apple-data-detectors] { font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important; } /** * Fix centering issues in Android 4.4. */ div[style*="margin: 16px 0;"] { margin: 0 !important; } body { width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important; } /** * Collapse table borders to avoid space between cells. */ table { border-collapse: collapse !important; } a { color: #1a82e2; } img { height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none; } </style>
   </head>
   <body style="background-color: #e9ecef;">
      <!-- start preheader --> 
      <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> Reset your Password. </div>
      <!-- end preheader --> <!-- start body --> 
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
         <!-- start logo --> 
         <tr>
            <td align="center" bgcolor="#e9ecef">
               <!--[if (gte mso 9)|(IE)]> 
               <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                  <tr>
                     <td align="center" valign="top" width="600">
                        <![endif]--> 
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                           <tr>
                              <td align="center" valign="top" style="padding: 36px 24px;"> <a href="https://smartlist.ga" target="_blank" style="display: inline-block;"> <img src="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png" alt="Logo" border="0" width="48" style="display: block; width: 48px; max-width: 48px; min-width: 48px;"> </a> </td>
                           </tr>
                        </table>
                        <!--[if (gte mso 9)|(IE)]> 
                     </td>
                  </tr>
               </table>
               <![endif]--> 
            </td>
         </tr>
         <!-- end logo --> <!-- start hero --> 
         <tr>
            <td align="center" bgcolor="#e9ecef">
               <!--[if (gte mso 9)|(IE)]> 
               <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                  <tr>
                     <td align="center" valign="top" width="600">
                        <![endif]--> 
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                           <tr>
                              <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                                 <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Reset your password</h1>
                              </td>
                           </tr>
                        </table>
                        <!--[if (gte mso 9)|(IE)]> 
                     </td>
                  </tr>
               </table>
               <![endif]--> 
            </td>
         </tr>
         <!-- end hero --> <!-- start copy block --> 
         <tr>
            <td align="center" bgcolor="#e9ecef">
               <!--[if (gte mso 9)|(IE)]> 
               <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                  <tr>
                     <td align="center" valign="top" width="600">
                        <![endif]--> 
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                           <!-- start copy --> 
                           <tr>
                              <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                 <p style="margin: 0;">You have requested to reset your password. Please click on the link below within 24 hours</p>
                              </td>
                           </tr>
                           <!-- end copy --> <!-- start button --> 
                           <tr>
                              <td align="left" bgcolor="#ffffff">
                                 <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                       <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                                          <table border="0" cellpadding="0" cellspacing="0">
                                             <tr>
                                                <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;"> <a href="https://smartlist.ga/dashboard/recovery.php?t='.$hash.'&a='.$id.'" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Reset my Password</a> </td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <!-- end button --> <!-- start copy --> 
                           <tr>
                              <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
                                 <p style="margin: 0;">Cheers,<br> Smartlist</p>
                              </td>
                           </tr>
                           <!-- end copy --> 
                        </table>
                        <!--[if (gte mso 9)|(IE)]> 
                     </td>
                  </tr>
               </table>
               <![endif]--> 
            </td>
         </tr>
         <!-- end copy block --> <!-- start footer --> 
         <tr>
            <td align="center" bgcolor="#e9ecef" style="padding: 24px;">
               <!--[if (gte mso 9)|(IE)]> 
               <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                  <tr>
                     <td align="center" valign="top" width="600">
                        <![endif]--> 
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                           <!-- start permission --> 
                           <tr>
                              <td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                                 <p style="margin: 0;">You received this email because you registered for Smartlist. Email us at hello@homebase.rf.gd if you have any questions</p>
                              </td>
                           </tr>
                           <!-- end permission --> <!-- start unsubscribe --> 
                           <tr>
                              <td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                                 <p style="margin: 0;">To stop receiving these emails, you can <a href="https://smartlist.ga/dashboard/resources/unsubscribe.php?mail=" target="_blank">unsubscribe</a> at any time.</p>
                              </td>
                           </tr>
                           <!-- end unsubscribe --> 
                        </table>
                        <!--[if (gte mso 9)|(IE)]> 
                     </td>
                  </tr>
               </table>
               <![endif]--> 
            </td>
         </tr>
         <!-- end footer --> 
      </table>
      <!-- end body --> 
   </body>
</html>';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <hello@homebase.rf.gd>' . "\r\n";

mail($to,$subject,$message,$headers);
  $dbh = null;
}
}
catch (PDOexception $e) {
  echo "Error is: " . $e-> etmessage();
}
header('Location: https://smartlist.ga/dashboard/resources/fp.php?done');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Login | Smartlist
        </title>
        <link rel="favicon" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png">
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" as="style">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="style">
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" as="script">
        <link rel="preload" href="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png" as="image"> 
        <link rel="preload" href="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1" as="image">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style>
            .s100vh {
                height: 100vh;
            }
            .btn:focus {
                box-shadow:0 9px 12px -6px rgba(0,0,0,.2),0 19px 29px 2px rgba(0,0,0,.14),0 7px 36px 6px rgba(0,0,0,.12)!important
            }
            body {
                overflow:hidden;
            }
            *:not(.material-icons) {font-family: 'Poppins', sans-serif !important;}
            .bg {
                background: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1);
            }
            .btn {
                box-shadow:0 5px 6px -3px rgba(0,0,0,.2),0 9px 12px 1px rgba(0,0,0,.14),0 3px 16px 2px rgba(0,0,0,.12)!important;
                line-height: 50px;
                height: auto;
                width:100%;
            }
            .btn:hover {
                width: 100%;
                box-shadow:0 8px 9px -5px rgba(0,0,0,.2),0 15px 22px 2px rgba(0,0,0,.14),0 6px 28px 5px rgba(0,0,0,.12)!important;
            }
            .btn[disabled] {
                box-shadow: none !important;
            }
            #toast-container {
              top: auto !important;
              bottom: 5%;
              right: 5%;
            }
            .waves-ripple {
                transition-duration: .6s !important;
                transition-timing-function: cubic-bezier(.41,1.3,.77,1.2) !important
            }
            p {
                color: #9d9fa6;
            }
            h4 {
                color: #11203f;
                font-weight: bold;
            }
            .circular { -webkit-animation: rotate 2s linear infinite; animation: rotate 2s linear infinite; height: 50px; width: 50px; } .path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; -webkit-animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite; animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite; stroke-linecap: round; stroke: #3f88f8; } @-webkit-keyframes rotate { 100% { transform: rotate(360deg); } } @keyframes rotate { 100% { transform: rotate(360deg); } } @-webkit-keyframes dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 89, 200; stroke-dashoffset: -35; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124; } } @keyframes dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 89, 200; stroke-dashoffset: -35; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124; } }
            * {font-smooth: always;}
            @media only screen and (max-width: 600px) { 
                #toast-container {
                  top: auto !important;
                  right: auto !important;
                  bottom: 0;
                  left:0;  
                }
            }
        </style>
    </head>
    <body>
        <div class="row">
            
            <div class="col s12 m6 s100vh">
                <div style="float:left;padding:20px;padding-left: 10px;">
                    <a href="https://smartlist.ga/" class="brand-logo left"><img class="materialboxed" style="display:inline-block;vertical-align:middle;margin: 0 10px" src="https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png" width="30px" ><span style="vertical-align:middle;font-size: 20px;color:gray">Smartlist</span></a>
                </div><br>
                <div style='padding: 20px;display: table; margin: 0 auto;margin-top: 15vh;'>
                    <?php if(!isset($_GET['done'])) {?><h4>Reset your password</h4>
                    <p>Access your entire home at the tap of a button!</p>
                      <div class="row">
                        <form class="col s12" method="POST">
                          <div class="row">
                              <div class="input-field col s12" id="pre_1">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="icon_prefix" type="text" class="validate" name='uname' autocomplete="off">
                              <label for="icon_prefix">Username</label>
                            </div>
                            <div class="input-field col s12" id="pre_1">
                              <i class="material-icons prefix">email</i>
                              <input id="icon_prefix" type="text" class="validate" name='username' autocomplete="off">
                              <label for="icon_prefix">Email</label>
                            </div>
                            <div class='col s12' id='load' style='padding: 0 !important;background:white'>
                            </div>
                            <div class="col s12">
                                <button class="btn purple darken-3 waves-effect waves-light" name='submitBtnLogin' onclick="load();var e=this;setTimeout(function(){e.disabled=true; setTimeout(function(){ e.innerHTML = 'Decrypting your account...' ; setTimeout(function(){ e.innerHTML = 'Cross-verifying your request...' }, 0700);}, 0700);},0200);return true;">Reset</button>
                            </div>
                          </div>
                        </form>
                      <div class="col s12">
                          Don't have an account yet? <a href="https://smartlist.ga/signup">Sign up!</a>
                      </div>
                     </div>
                     <?php } else {?>
                     <h4>Email sent!</h4>
                     <p>Please check your email and click on the link within 24 hours</p>
                     <?php }?>
                </div>
            </div>
            <div class="col s6 hide-on-med-and-down bg s100vh"></div>
        </div>
        <script>
            window.onload= function() {window.scrollTo(0, 0);}
        function load() {
            document.querySelector('#pre_1').style.opacity = 0;
            document.querySelector('#pre_2').style.opacity = 0;
            document.getElementById('load').innerHTML = '<div style="width: 100%;background-color:#fff;positon:fixed;height: 200px;margin-top: -200px;z-index:99999"><center><br><svg class="circular" height="50" width="50"> <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="6" stroke-miterlimit="10" /> </svg></center><br><br><br></div>';
        }
        </script>
        <?php if(isset($_GET['empty'])) {?>
        <script>
              window.onload=function() {M.toast({html: 'Login Details are empty. Please try again'})}
        </script>
        <?php } ?>
        <?php if(isset($_GET['incorrect'])) {?>
        <script>
              window.onload=function() {M.toast({html: 'Incorrect Email'})}
        </script>
        <?php } ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
