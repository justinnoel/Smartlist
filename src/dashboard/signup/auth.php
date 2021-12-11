<?php
session_start();
include "../cred.php";
include'../lib/phpmailer/phpmailer.php';
include'../lib/phpmailer/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
try {
    $dbh = new PDO(
        "mysql:host=".App::server.";dbname=".App::database,
        App::username,
        App::password
    );
    $dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
    $sql = $dbh->prepare("SELECT * FROM login");

    $sql->execute();
    $users = $sql->fetchAll();
    foreach($users as $user) {
      if($user['username'] == $_POST['username'] || decrypt($user['email']) == $_POST['email']) {
        die("exists");
      }
    }

        try {
            $userPassword = password_hash($_POST["password"], PASSWORD_ARGON2I);
            $conn = new PDO(
                "mysql:host=".App::server.";dbname=".App::database,
                App::username,
                App::password
            );
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO login(name, email,username, password, syncid, user_avatar, welcome, theme, remind, goal, accept) VALUES (:name, :email, :username, :password, -1, 'https://icon-library.com/images/google-user-icon/google-user-icon-21.jpg', '', '37474f', 20, 0, 0)");
            $stmt->bindParam(':name', $_name);
            $stmt->bindParam(':email', $_email);
            $stmt->bindParam(':username', $_username);
            $stmt->bindParam(':password', $_password);

            // insert a row
            $_name = encrypt($_POST['name']);
            $_email = encrypt($_POST['email']);
            $_username = ($_POST['username']);
            $_password = $userPassword;
            $stmt->execute();
            $USERID = $conn->lastInsertId();
            
            $json = json_decode(file_get_contents( "https://ipinfo.io/" . $_SERVER["REMOTE_ADDR"] . "/geo" ), true);
            $country = ($json ? $json["country"]:"Error");
            $region = ($json ? $json["region"]:"Error");
            $city = ($json ? $json["city"]:"Error");
            
            $stmt_location = $conn->prepare("INSERT into auth_ip(ip, login) VALUES (:ip, :login)");
            $stmt_location->bindParam(':ip', md5($city));
            $stmt_location->bindParam(':login', $USERID);
            $stmt_location->execute();


            $_SESSION["re_id"] = $USERID;
            $_SESSION["re_email"] = $_POST["email"];
            $mail = new PHPMailer(true);

            try {
              $mail->setFrom('hello@smartlist.ga', 'Smartlist');
              $mail->addAddress($_POST['email']);

              $mail->isHTML(true);
              $mail->Subject = 'Welcome to Smartlist!';
              $mail->Body    = '<!doctype html>
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
                                  <a href="https://smartlist.ga/dashboard/user/verify-new-account.php?u=' .
                            urlencode(hash("sha256", $USERID)) .
                            '"
                                    style="background:#4527a0;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:5px;">Verify my account</a>
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
            </html>';
            $mail->AltBody = 'Click here to verify your login: https://smartlist.ga/dashboard/user/verify-new-account.php?u='. urlencode(hash("sha256", $USERID));

            $mail->send();
          } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
          echo $USERID;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>