<?php
session_start();
if(isset($_SESSION['valid'])) {header('Location: https://smartlist.ga/dashboard/beta');}
include('cred.php');
if(isset($_POST['submit'])){
try {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT COUNT(username) FROM login WHERE username = '".$_POST['uname']."'";
$users = $dbh->query($sql);
foreach ($users as $row) {
$USERNAME_OCCIPIED = $row['COUNT(username)'];
// echo $USERNAME_OCCIPIED;
}
$dbh = null;
}
catch (PDOexception $e) { echo "Error is: " . $e-> etmessage(); }
if($USERNAME_OCCIPIED > 0) {
header('Location: https://smartlist.ga/dashboard/register.php?exists');
exit;
}
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$u_name = $_POST['name'];
$u_email = $_POST['email'];
$u_uname = $_POST['uname'];
$u_pwd = password_hash($_POST['pass'], PASSWORD_ARGON2I);
$check_email = "SELECT * FROM login WHERE username = ':username'";
$check_email = $conn->prepare($check_email);
$check_email->execute(array(':username'=>$u_uname));
if($check_email->rowCount() !== 0){
echo "Username exists";
exit();
}
// echo $check_email->rowCount();
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO login(name,email,username, password, syncid, avatar, user_avatar, welcome, theme, dark_mode, notifications, remind, goal, accept)
VALUES (".json_encode(encrypt($u_name)).", ".json_encode(encrypt($u_email)).", ".json_encode($u_uname).", ".json_encode($u_pwd).", -1, '', 'https://icon-library.com/images/google-user-icon/google-user-icon-21.jpg', '', '37474f', '37474f', '', 20, '0', 0)";
    $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$to = ($_POST['email']);
$subject = 'Welcome to Smartlist!!!';
$message = '
<!doctype html>
<html lang="en-US">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Welcome to Smartlist!</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
      @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAnsSUbOvISTs.woff2) format(\'woff2\'); unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F; } /* cyrillic */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAnsSUZevISTs.woff2) format(\'woff2\'); unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; } /* vietnamese */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAnsSUbuvISTs.woff2) format(\'woff2\'); unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB; } /* latin-ext */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAnsSUb-vISTs.woff2) format(\'woff2\'); unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF; } /* latin */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAnsSUYevI.woff2) format(\'woff2\'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; } /* cyrillic-ext */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofIOOaBXso.woff2) format(\'woff2\'); unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F; } /* cyrillic */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofIMeaBXso.woff2) format(\'woff2\'); unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; } /* vietnamese */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofIOuaBXso.woff2) format(\'woff2\'); unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB; } /* latin-ext */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofIO-aBXso.woff2) format(\'woff2\'); unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF; } /* latin */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofINeaB.woff2) format(\'woff2\'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; } /* cyrillic-ext */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUbOvISTs.woff2) format(\'woff2\'); unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F; } /* cyrillic */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUZevISTs.woff2) format(\'woff2\'); unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; } /* vietnamese */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUbuvISTs.woff2) format(\'woff2\'); unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB; } /* latin-ext */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUb-vISTs.woff2) format(\'woff2\'); unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF; } /* latin */ @font-face { font-family: \'Nunito\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUYevI.woff2) format(\'woff2\'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; } /* cyrillic-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN_r8OX-hpOqc.woff2) format(\'woff2\'); unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F; } /* cyrillic */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN_r8OVuhpOqc.woff2) format(\'woff2\'); unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; } /* greek-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN_r8OXuhpOqc.woff2) format(\'woff2\'); unicode-range: U+1F00-1FFF; } /* greek */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN_r8OUehpOqc.woff2) format(\'woff2\'); unicode-range: U+0370-03FF; } /* vietnamese */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN_r8OXehpOqc.woff2) format(\'woff2\'); unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB; } /* latin-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN_r8OXOhpOqc.woff2) format(\'woff2\'); unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF; } /* latin */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 300; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN_r8OUuhp.woff2) format(\'woff2\'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; } /* cyrillic-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2) format(\'woff2\'); unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F; } /* cyrillic */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFUZ0bbck.woff2) format(\'woff2\'); unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; } /* greek-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWZ0bbck.woff2) format(\'woff2\'); unicode-range: U+1F00-1FFF; } /* greek */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFVp0bbck.woff2) format(\'woff2\'); unicode-range: U+0370-03FF; } /* vietnamese */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWp0bbck.woff2) format(\'woff2\'); unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB; } /* latin-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFW50bbck.woff2) format(\'woff2\'); unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF; } /* latin */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFVZ0b.woff2) format(\'woff2\'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; } /* cyrillic-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UNirkOX-hpOqc.woff2) format(\'woff2\'); unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F; } /* cyrillic */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UNirkOVuhpOqc.woff2) format(\'woff2\'); unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; } /* greek-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UNirkOXuhpOqc.woff2) format(\'woff2\'); unicode-range: U+1F00-1FFF; } /* greek */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UNirkOUehpOqc.woff2) format(\'woff2\'); unicode-range: U+0370-03FF; } /* vietnamese */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UNirkOXehpOqc.woff2) format(\'woff2\'); unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB; } /* latin-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UNirkOXOhpOqc.woff2) format(\'woff2\'); unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF; } /* latin */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UNirkOUuhp.woff2) format(\'woff2\'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; } /* cyrillic-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOX-hpOqc.woff2) format(\'woff2\'); unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F; } /* cyrillic */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOVuhpOqc.woff2) format(\'woff2\'); unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; } /* greek-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOXuhpOqc.woff2) format(\'woff2\'); unicode-range: U+1F00-1FFF; } /* greek */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOUehpOqc.woff2) format(\'woff2\'); unicode-range: U+0370-03FF; } /* vietnamese */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOXehpOqc.woff2) format(\'woff2\'); unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB; } /* latin-ext */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOXOhpOqc.woff2) format(\'woff2\'); unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF; } /* latin */ @font-face { font-family: \'Open Sans\'; font-style: normal; font-weight: 700; src: url(https://fonts.gstatic.com/s/opensans/v18/mem5YaGs126MiZpBA-UN7rgOUuhp.woff2) format(\'woff2\'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; }
    </style>
  </head>
  <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
           style="font-family: \'Nunito\', sans-serif;">
      <tr>
        <td>
          <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                 align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td style="height:80px;">&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align:center;">
                <a href="https://smartlist.ga" title="logo" target="_blank" style="text-decoration:none;color: inherit">
                  <img width="60" src="https://i.ibb.co/8bNKQw0/roofing.png" title="logo" alt="logo" style="vertical-align:middle;margin-right: 10px;">
                  <span style="font-size: 20px;display: inline-block;vertical-align:middle">
                  Smartlist
                </span>
                </a>
              </td>
            </tr>
            <tr>
              <td style="height:20px;">&nbsp;</td>
            </tr>
            <tr>
              <td>
                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                       style="max-width:670px;background:#fff; border-radius:3px;box-shadow: 0 0 10px rgba(0,0,0,0.1);text-align:left">
                  <tr>
                    <td style="height:40px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="padding:0 35px;">
                      <img src="https://media3.giphy.com/media/fU4elxKlRsulB4Jy7w/200.gif" width="100%"><h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:\'Nunito\',sans-serif;"><br>Welcome to Smartlist!</h1>
                      <br>
                      <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                        Hey, <br>
                        Thanks for signing up for Smartlist! We welcome you to Smartlist! Feel free to explore the dashboard, add an item, and track your expenses using our budget meter! If you want to read the knowledge base, you can do so <a href="http://support.smartlist.ga/" style="text-decoration: none;color: #2196f3">here</a>. If you have any further questions, visit our <a href="https://community.smartlist.ga/" style="text-decoration: none;color: #2196f3">community forum</a>
                      </p>
                      <a href="https://smartlist.ga/dashboard/resources/recovery.php?u='.urlencode($id).'"
                         style="background:#4527a0;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:5px;">View my Dashboard</a>
                      <br><br>
                      <p style="color:#aaa; font-size:15px;line-height:24px; margin:0;">
                        Questions? Email us at hello@smartlist.ga or visit our community forum
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td style="height:40px;">&nbsp;</td>
                  </tr>
                </table>
              </td>
            <tr>
              <td style="height:20px;">&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align:center;">
                <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; 2021</p>
              </td>
            </tr>
            <tr>
              <td style="height:80px;">&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <hello@smartlist.ga>' . "\r\n";

mail($to,$subject,$message,$headers);
header('Location: https://smartlist.ga/dashboard/login.php?reg');
exit();
}
?>
<title>Signup | Smartlist</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<meta name="google-signin-client_id" content="467388058520-amitih3gsi5ivao510gui9ujmskpdalq.apps.googleusercontent.com">
<!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "3d832d4dead94e2dbb026d0270446990"}'></script><!-- End Cloudflare Web Analytics -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
 <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="672647195502-dh11ue2n9b07adod6vq249qo4e5m6v0n.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S0PH6N0Z7E"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-S0PH6N0Z7E');
    </script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<style>
  .s100vh {
    height: 104vh;
  }
  .btn:focus {
    box-shadow:0 9px 12px -6px rgba(0,0,0,.2),0 19px 29px 2px rgba(0,0,0,.14),0 7px 36px 6px rgba(0,0,0,.12)!important
  }
  body {
    overflow:hidden;
  }
  *:not(.material-icons) {font-family: 'Poppins', sans-serif !important;}
  .bg {
    /*background: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1);*/
    background-size: cover;background-repeat: no-repeat;
  }
  .btn {
    box-shadow:0 5px 6px -3px rgba(0,0,0,.2),0 9px 12px 1px rgba(0,0,0,.14),0 3px 16px 2px rgba(0,0,0,.12)!important;
    line-height: 50px;
    height: auto;
    width:100%;
  }
  .i1 {background: url(https://cdn.the-scientist.com/assets/articleNo/66864/aImg/35078/foresttb-m.jpg);background-size: cover;background-repeat: no-repeat;}
  .i2 {background:url(https://www.youandthemat.com/wp-content/uploads/nature-2-26-17.jpg);background-size: cover;background-repeat: no-repeat;}
  .i4 {background: url(https://imgproxy.natucate.com/PAd5WVIh-tjEKQM4Z6tm6W1J4Yc2JIYWrKEroD1c7mM/rs:fill/g:ce/w:3840/h:2160/aHR0cHM6Ly93d3cubmF0dWNhdGUuY29tL21lZGlhL3BhZ2VzL3JlaXNlYXJ0ZW4vNmMwODZlYmEtNzk3Yi00ZDVjLTk2YTItODhhNGM4OWUyODdlLzM3NjYwMTQ2NjMtMTU2NzQzMzYxMi8xMl9kYW5pZWxfY2FuX2JjLTIwNy5qcGc);}
  .i3 {background: url(https://dynaimage.cdn.cnn.com/cnn/c_fill,g_auto,w_1200,h_675,ar_16:9/https%3A%2F%2Fcdn.cnn.com%2Fcnnnext%2Fdam%2Fassets%2F191014133527-saba-nature-2.jpg);background-size: cover;background-repeat: no-repeat;}
  .i4 {background:url(https://www.atlasandboots.com/wp-content/uploads/2019/05/ama-dablam2-most-beautiful-mountains-in-the-world.jpg);}
  .i5 {background: url(https://cms.hostelworld.com/hwblog/wp-content/uploads/sites/2/2018/12/kirkjufell.jpg);}
  .i6 {background: url(https://www.teahub.io/photos/full/0-8009_yosemite-national-park-wallpaper-4k.jpg);}
  .i7 {background: url(https://images.unsplash.com/photo-1606055854326-12a2fdcac6c0?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8NGslMjBtb3VudGFpbnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80);}
  .i8 {background: url(https://i.pinimg.com/originals/04/ef/5e/04ef5e1743f2123165f573616c533885.jpg);}
  .i9 {background: url(https://wallpaperaccess.com/full/38582.jpg);}
  .i10 {background: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc.pxhere.com%2Fphotos%2Fdf%2F33%2Fmountains_snowy_peaks_mountain_top_scenery_top_range_slopes-543415.jpg!d&f=1&nofb=1);}
  .i11 {background: url(https://3.bp.blogspot.com/-_wFRydnnl9E/WtTUN_X0RpI/AAAAAAAABLw/iJKhQKYMLBMRdJfd1nDAqdIfhgUqyF19ACEwYBhgL/s1600/1.jpg);}
  * {
    background-size: cover !important;background-repeat: no-repeat !important;outline:0;
  }
  .col s6 {margin:0 !important;}
  i, h1, h2, h3, h4, a,#toast-container,label,span, p,br {user-select:none;}
  .btn:hover {
    width: 100%;
    box-shadow:0 8px 9px -5px rgba(0,0,0,.2),0 15px 22px 2px rgba(0,0,0,.14),0 6px 28px 5px rgba(0,0,0,.12)!important;
  }
  .col s6 .col s6 {
    margin: 5px 0 !important;
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
  .btn {
    border-radius: 4px;
  }
  p {
    col s6or: #9d9fa6;
  }
  h4 {
    col s6or: #11203f;
    font-weight: bold;
  }
  input {
    background-col s6or: #fff !important;
    background-image:none !important;
    -webkit-box-shadow: 0 0 0px 1000px #fff inset;

    col s6or: #000000 !important;
  }
  input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill { box-shadow: 0 0 0px 1000px white inset; }

  .circular { -webkit-animation: rotate 2s linear infinite; animation: rotate 2s linear infinite; height: 50px; width: 50px; } .path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; -webkit-animation: dash 1.5s ease-in-out infinite, col s6or 6s ease-in-out infinite; animation: dash 1.5s ease-in-out infinite, col s6or 6s ease-in-out infinite; stroke-linecap: round; stroke: #3f88f8; } @-webkit-keyframes rotate { 100% { transform: rotate(360deg); } } @keyframes rotate { 100% { transform: rotate(360deg); } } @-webkit-keyframes dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 89, 200; stroke-dashoffset: -35; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124; } } @keyframes dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 89, 200; stroke-dashoffset: -35; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124; } }
  * {font-smooth: always;}
  @media only screen and (max-width: 600px) { 
    #toast-container {
      top: auto !important;
      right: auto !important;
      bottom: 0;
      left:0;  
    }
    body {
      overflow:scroll;
      padding-bottom: 20px;
    }
  }
</style>

<body onload="load();">
  <!--name email uname pass-->
  <div class="row">
    <div class="col s12 m6 container"style="overflow:scroll !important;height: 100%;">
        <div style="padding:20px;padding-bottom:0;"><h4>Hi there, welcome to the party! <img src="https://i.pinimg.com/originals/21/f2/07/21f2078d23f9195570a3711c018328b2.png" width="30px"></h4><p>Fill out this form to get started!</p></div>
        <form method="POST" action="https://smartlist.ga/signup" autocomplete="off">
            <div style="padding:20px;padding-top:0;">
              <div class="row">
                    <div class="input-field col s12" style="margin-bottom: 0 !important">
                      <i class="material-icons prefix">person</i>
                      <input id="icon_prefix" type="text" name="name" class="validate">
                      <label for="icon_prefix">Name</label>
                      <span class="helper-text" data-error="This field is required" data-success="Correct! Move on to the next step">This is how we'll address you</span>
                    </div>
                    <div class="input-field col s12" style="margin-bottom: 0 !important">
                      <i class="material-icons prefix">email_outline</i>
                      <input id="icon_telephone" name="email" type="email" class="validate">
                      <label for="icon_telephone">Email</label>
                      <span class="helper-text" data-error="Invalid email. Typo?" data-success="Correct email! Move on to the next step">Make sure you provide us a valid email, in case you forget your password</span>
                    </div>
                    <div class="input-field col s12" style="margin-bottom: 0 !important">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="uname" type="text" name="uname" class="validate">
                      <label for="uname">Your username</label>
                      <span class="helper-text" data-error="Invalid email. Typo?" data-success="Correct! Move on to the next step">Choose a catchy account username. You'll use this to log in</span>
                    </div>
                    <div class="input-field col s12" style="margin-bottom: 0 !important">
                      <i class="material-icons prefix">lock_outline</i>
                      <input id="pwd" type="password" name="pass" autocomplete="new-password" class="validate">
                      
                      <label for="pwd">Password</label>
                    </div>
                      <p style="margin-left: 50px;">
                      <label>
                        <input id="indeterminate-checkbox" type="checkbox" onchange="TOGGLE_P()"/>
                        <span>Show my password</span>
                      </label>
                    </p>
                  <label style="position:relative;left: 20px;"><i class="material-icons left">verified_user</i>Password <b>must</b> contain at least 1 uppercase character, 1 lowercase character, 1 number, and must be at least 8 digits long.</label>
                </div>
              </div>
            <div class="container"><button class="btn purple darken-3 waves-effect waves-light" name='submit' onclick="load();var e=this;setTimeout(function(){e.disabled=true; setTimeout(function(){ e.innerHTML = 'Encrypting your account...' ; setTimeout(function(){ e.innerHTML = 'Cross-verifying your request...' }, 0700);}, 0700);},0200);return true;">Sign Up!</button>    <br> <br><div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div></div>
        </form>
    </div>
    <div class="col s6 hide-on-small-only bg s100vh"></div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    window.onload= function() {window.scrollTo(0, 0);}
    $(document).ready(function(){
      var classCycle=['i1','i2', 'i3', 'i4', 'i5', 'i6', 'i6', 'i7', 'i8', 'i9', 'i10', 'i11'];
      var randomNumber = Math.floor(Math.random() * classCycle.length);
      var classToAdd = classCycle[randomNumber];
      $('.bg').addClass(classToAdd);

    });
    function TOGGLE_P() {
      var x = document.getElementById("pwd");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    function load() {
      document.querySelector('#pre_1').style.opacity = 0;
      document.querySelector('#pre_2').style.opacity = 0;
      document.getElementById('load').innerHTML = '<div style="width: 100%;background-color:#fff;positon:fixed;height: 200px;margin-top: -200px;z-index:99999"><center><br><svg class="circular" height="50" width="50"> <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" /> </svg></center><br><br><br></div>';
    }
  </script>
  <?php if(isset($_GET['exists'])) {?>
  <script>
      M.toast({html: 'Uh oh. Username exists. Maybe try another one?'})
  </script>
  <?php } ?>
    <script>
      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        // alert("ID: " + profile.getId()); 
        document.getElementById('icon_prefix').value = profile.getName();
        document.getElementById('icon_prefix').focus();
        // alert('Given Name: ' + profile.getGivenName());
        // alert('Family Name: ' + profile.getFamilyName());
        // alert("Image URL: " + profile.getImageUrl());
        document.getElementById('icon_telephone').value = profile.getEmail();
        document.getElementById('icon_telephone').focus();
        document.getElementById('uname').value = profile.getGivenName();
        document.getElementById('uname').focus();
        document.getElementById('pwd').focus();
        var id_token = googleUser.getAuthResponse().id_token;
        // alert("ID Token: " + id_token);
      }
    </script>
</body>
</html>