<?php
include_once "/home/smartlis/public_html/dashboard/cred.php";
include_once '/home/smartlis/public_html/dashboard/lib/phpmailer/phpmailer.php';
include_once '/home/smartlis/public_html/dashboard/lib/phpmailer/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
header("Content-Type: text/plain");
$mail = new PHPMailer(true);


$oldFigure = 14;
$newFigure = 15.50;

$percentChange = round((1 - $oldFigure / $newFigure) * 100, 2);

$userNotificationRemider = 0;
$tasksCount = 0;
$todo_i = '';
$tasksCount = $shoppingListCount = $bmCount = 0;
$to = "";
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM `login` WHERE id=1 OR id=161 OR id=162 ORDER BY `login`.`id` ASC";
$users = $dbh->query($sql);
/* 
foreach ($users as $current_user) {
  echo decrypt($current_user['email'])."<br>";
}
exit();
*/ 
foreach ($users as $current_user) {
  $userNotificationRemider = $current_user['remind'];
  $to = decrypt($current_user['email']);	
  $s = "
  SELECT id, name, qty, login_id, star, 'Kitchen' as Source
  FROM products 
  where login_id = ".$current_user['id']."
  union all


  SELECT id, name, qty, login_id, star, 'Bedroom' as Source
  FROM bedroom 
  where login_id = ".$current_user['id']."

  union all

  SELECT id, name, qty, login_id, star, 'Bathroom' as Source
  FROM bathroom 
  where login_id = ".$current_user['id']."

  union all

  SELECT id, name, qty, login_id, star, 'Garage' as Source
  FROM garage 
  where login_id = ".$current_user['id']."

  union all

  SELECT id, name, qty, login_id, star, 'Dining Room' as Source
  FROM dining_room 
  where login_id = ".$current_user['id']."

  union all

  SELECT id, name, qty, login_id, star, 'Laundry Room' as Source
  FROM laundry 
  where login_id = ".$current_user['id']."

  union all

  SELECT id, name, qty, login_id, star, 'Storage Room' as Source
  FROM 	storageroom 
  where login_id = ".$current_user['id']."

  union all

  SELECT id, name, qty, login_id, star, 'Family' as Source
  FROM family 
  where login_id = ".$current_user['id'].";
  ";
  $u = $dbh->query($s);
  foreach ($u as $res) {
    if (intval(preg_replace("/[^0-9]/", "", decrypt($res['qty']))) < $userNotificationRemider) {
      $todo_i .= '<p style="border-bottom: 1px solid #eee;padding-bottom: 10px;display: block;"><b>'.strip_tags(($res['Source'])).'</b><br> '.strip_tags(decrypt($res['name'])).'  ('.strip_tags(decrypt($res['qty'])).')</p>';
    }
  }
  if(trim($todo_i) == "" || empty($todo_i)) {
    $todo_i = '<p style="padding-bottom: 10px;display: block;">You\'re not running out of anything! </p>';
  }

  $s1 = "SELECT * FROM todo WHERE login_id=". $current_user['id'];
  $tasks = $dbh->query($s1);
  $tasksCount = $tasks->rowCount();

  $g1 = "SELECT * FROM grocerylist WHERE login_id=". $current_user['id'];
  $shoppingList = $dbh->query($g1);
  $shoppingListCount = $shoppingList->rowCount();

  $b1 = "SELECT * FROM bm WHERE login_id=". $current_user['id'];
  $bmCount1 = $dbh->query($b1);
  foreach($bmCount1 as $bmCounts) {
    $bmCount += intval(decrypt($bmCounts['qty']));
  }
  try {
    $mail->setFrom('donotreply@smartlist.ga', 'Smartlist');
    $mail->clearAllRecipients();
    $mail->addAddress($to, decrypt($current_user['name']));
    // var_dump( $mail );
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Smartlist Digest';
    echo "";
    $mail->Body = '
<!doctype html>
<html lang="en-US">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Smartlist Digest</title>
    <meta name="description" content="Daily Digest!">
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
                      <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:\'Nunito\',sans-serif;"><br>Smartlist Daily Digest</h1>
                      <br>
                      <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                       <table style="width:100%">
                       <tr>
                       <td style="width: 33.33%;">
                       <b>'.$tasksCount.'</b><br>
                       Tasks
                       </td>

                       <td style="width: 33.33%;">
                       <b>'.$shoppingListCount.'</b><br>
                       Items in shopping list
                       </td>

                       <td style="width: 33.33%;">
                       <b>$'.$bmCount.'</b><br>
                       Spent overall
                       </td>


                       </tr>
                       <tr>
                       <td colspan="3">
                       <br><br>
                        <b>Items you\'re running out of</b>
                        '.$todo_i.'
                       </td>
                       </tr>
                       </table>
                      </p>
                      <a href="https://smartlist.ga/dashboard/beta"
                         style="background:#4527a0;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:5px;">Visit my dashboard</a>
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
                <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; 2021. User id: '.$current_user['id'].' | Email: '.decrypt($current_user['email']).'</p>
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

    $mail->send();
    echo 'Message has been sent to '.decrypt($current_user['email'])."\n";
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  $tasksCount = 0; $shoppingListCount = 0;$bmCount = 0;$todo_i="";
}
?>
