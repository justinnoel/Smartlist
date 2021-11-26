<?php
ini_set("display_errors", 1);
session_set_cookie_params(0, "/", ".smartlist.ga", false, false);
session_start();

include "./lib/phpmailer/phpmailer.php";
include "./lib/phpmailer/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_COOKIE["attempts"])) {
    setcookie("attempts", 0, time() + 86400 * 1, "/");
}
if (isset($_COOKIE["attempts"]) && $_COOKIE["attempts"] >= 4) {
    echo "max";
    exit();
}
if (isset($_COOKIE["attempts"])) {
    $_COOKIE["attempts"]++;
}
if (isset($_SESSION["valid"]) && !isset($_POST["app"])) {
    echo "Valid";
    exit();
}
function gen_uuid()
{
    return sprintf(
        "%04x%04x-%04x-%04x-%04x-%04x%04x%04x",
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}
include "cred.php";
if (isset($_GET["sett"])) {
    $msg1 = "Please login again";
}
try {
    $db = new PDO(
        "mysql:host=" . App::server . ";dbname=" . App::database . ";charset=utf8mb4",
        App::username,
        App::password
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}
$msg = "";
$pwd_hash = password_hash($_POST["password"], PASSWORD_ARGON2I);
$username1 = isset($_POST["username"]) ? trim($_POST["username"]) : "";
$password1 = trim($pwd_hash);
if (isset($_SESSION["valid"])) {
    $conn1 = new PDO(
        "mysql:host=".App::server.";dbname=smartlis_api",
        App::username,
        App::password
    );
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt1 = $conn1->prepare("SELECT * FROM apps");
    $stmt1->execute();
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    $d = $stmt1->fetchAll();
    foreach ($d as $r) {
        if (isset($_POST["app"]) && hash("sha512", $r["id"]) == $_POST["app"]) {
            $token = gen_uuid();

            try {
                $conn = new PDO(
                    "mysql:host=".App::server.";dbname=smartlis_api",
                    App::username,
                    App::password
                );
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // prepare sql  and bind parameters
                $stmt = $conn->prepare(
                    $sql = "INSERT INTO tokens (name, email, username, user_avatar, app, userID, color)
        VALUES (:name, :email, :username, :avatar, :token, :sessid, :color)"
                );
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":username", $uname1);
                $stmt->bindParam(":avatar", $av);
                $stmt->bindParam(":token", $token);
                $stmt->bindParam(":sessid", $id);
                $stmt->bindParam(":color", $color);

                // insert a row
                $name = $_SESSION["name"];
                $email = $_SESSION["email"];
                $uname1 = $_SESSION["username"];
                $av = $_SESSION["avatar"];
                $color = "#" . $_SESSION["theme"];
                $id = md5(md5(md5($_SESSION["id"])));
                $stmt->execute();
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }

            $conn1 = null;

            echo $r["redirectURI"] . "__AUTH__|" . $token;
            exit();
        }
    }
}
if ($username1 != "" && $password1 != "") {
    try {
        $query =
            "SELECT * from `login` WHERE `username`=:username OR `email` =:usernamea";
        $stmt = $db->prepare($query);
        $stmt->bindParam("username", $username1, PDO::PARAM_STR);
        $stmt->bindParam("usernamea", $username1, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($count == 1 && !empty($row)) {
            $auth_email = $row["email"];
            $auth_pwd = $row["password"];
            if (password_verify($_POST["password"], $auth_pwd)) {
                $dbh = new PDO(
                    "mysql:host=".App::server.";dbname=".App::database,
                    App::username,
                    App::password
                );
                $json = file_get_contents(
                    "https://ipinfo.io/" . $_SERVER["REMOTE_ADDR"] . "/geo"
                );
                if ($json) {
                    $json = json_decode($json, true);
                    $country = $json["country"];
                    $region = $json["region"];
                    $city = $json["city"];
                } else {
                    $country = "Error";
                    $region = "Error";
                    $city = "Error";
                }
                date_default_timezone_set($json["timezone"]);

                $sql =
                    "SELECT * FROM auth_ip WHERE ip='" .
                    md5($city) .
                    "' AND login=" .
                    $row["id"];
                $users = $dbh->query($sql);
                // $users->rowCount() >= 1
                // This feature is known to have bugs.
                if ($users->rowCount() >= 1) {
                    if ($row["accept"] === 1) {
                        $validuser = $row["username"];
                        $_SESSION["valid"] = $validuser;
                        $_SESSION["name"] = htmlspecialchars(
                            decrypt($row["name"])
                        );
                        $_SESSION["id"] = htmlspecialchars($row["id"]);
                        $_SESSION["email"] = htmlspecialchars(
                            decrypt($row["email"])
                        );
                        $_SESSION["username"] = htmlspecialchars(
                            $row["username"]
                        );
                        $_SESSION["number_notify"] = htmlspecialchars(
                            $row["remind"]
                        );
                        $t = htmlspecialchars($row["syncid"]);
                        if (empty($t)) {
                            $_SESSION["syncid"] = -1;
                        } else {
                            $_SESSION["syncid"] = $t;
                        }
                        $ta = $row["user_avatar"];
                        if (empty($ta)) {
                            $_SESSION["avatar"] =
                                "https://i.stack.imgur.com/34AD2.jpg";
                        } else {
                            $_SESSION["avatar"] = htmlspecialchars($ta);
                        }
                        $_SESSION["welcome"] = htmlspecialchars(
                            $row["welcome"]
                        );
                        $_SESSION["theme"] = htmlspecialchars($row["theme"]);
                        if ($row["welcome"] === "1") {
                            setcookie("attempts", 0, time() + 86400 * 30, "/");
                            if (!isset($_POST["app"])) {
                                echo "Valid";
                            } else {
                                $conn1 = new PDO(
                                    "mysql:host=".App::server.";dbname=smartlis_api",
                                   App::username,
                                   App::password
                                );
                                $conn1->setAttribute(
                                    PDO::ATTR_ERRMODE,
                                    PDO::ERRMODE_EXCEPTION
                                );
                                $stmt1 = $conn1->prepare("SELECT * FROM apps");
                                $stmt1->execute();
                                $result1 = $stmt1->setFetchMode(
                                    PDO::FETCH_ASSOC
                                );
                                $d = $stmt1->fetchAll();
                                foreach ($d as $r) {
                                    if (
                                        hash("sha512", $r["id"]) ==
                                        $_POST["app"]
                                    ) {
                                        $token = gen_uuid();
                                        try {
                                            $conn = new PDO(
                                                "mysql:host=".App::server.";dbname=smartlis_api",
                                                App::username,
                                                App::password
                                            );
                                            // set the PDO error mode to exception
                                            $conn->setAttribute(
                                                PDO::ATTR_ERRMODE,
                                                PDO::ERRMODE_EXCEPTION
                                            );
                                            // prepare sql  and bind parameters
                                            $stmt = $conn->prepare(
                                                $sql = "INSERT INTO tokens (name, email, username, user_avatar, app, userID, color)
        VALUES (:name, :email, :username, :avatar, :token, :sessid, :color)"
                                            );
                                            $stmt->bindParam(":name", $name);
                                            $stmt->bindParam(":email", $email);
                                            $stmt->bindParam(
                                                ":username",
                                                $uname1
                                            );
                                            $stmt->bindParam(":avatar", $av);
                                            $stmt->bindParam(":token", $token);
                                            $stmt->bindParam(":sessid", $id);
                                            $stmt->bindParam(":color", $color);

                                            // insert a row
                                            $name = $_SESSION["name"];
                                            $email = $_SESSION["email"];
                                            $uname1 = $_SESSION["username"];
                                            $av = $_SESSION["avatar"];
                                            $color = "#" . $_SESSION["theme"];
                                            $id = md5(
                                                md5(md5($_SESSION["id"]))
                                            );
                                            $stmt->execute();
                                        } catch (PDOException $e) {
                                            echo $sql .
                                                "<br>" .
                                                $e->getMessage();
                                        }

                                        $conn1 = null;

                                        echo $r["redirectURI"] .
                                            "__AUTH__|" .
                                            $token;
                                    }
                                }
                            }
                        } else {
                            echo "Welcome";
                        }
                    } else {
                        $_SESSION["re_id"] = $row["id"];
                        $_SESSION["re_email"] = decrypt($row["email"]);
                        echo "verify";
                        exit();
                    }
                } else {
                    $_SESSION["id"] = htmlspecialchars($row["id"]);
                    $to = decrypt($row["email"]);
                    $mail = new PHPMailer(true);

                    try {
                        $mail->setFrom("hello@smartlist.ga", "Smartlist");
                        $mail->addAddress($to);
                        $mail->isHTML(true); //Set email format to HTML
                        $mail->Subject = "Verify new login location";
                        $mail->Body =
                            '
<!doctype html>
<html lang="en-US">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Verify New IP</title>
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
                      <br>
                      <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                        Hey, <br>
                        Someone (hopefully you) has tried logging in from the following IP: ' .
                            $_SERVER["REMOTE_ADDR"] .
                            '
                        <br>
                        If this isn\'t you, don\'t worry, that user doesn\'t have access to your account until you log in. 
                        <br>
                        <br>
                        <b style="font-weight: bold !importannt">Country</b>: ' .
                            $country .
                            '<br>
                        <b style="font-weight: bold !importannt">City:</b> ' .
                            $city .
                            '<br>
                        <b style="font-weight: bold !importannt">Region:</b> ' .
                            $region .
                            '<br>
                        <b style="font-weight: bold !importannt">Location:</b> ' .
                            $json["loc"] .
                            '<br>
                        <b style="font-weight: bold !importannt">Postal Code:</b> ' .
                            $json["postal"] .
                            '<br>
                        <b style="font-weight: bold !importannt">Time:</b> ' .
                            date("Y-m-d h:i", time()) .
                            '<br>
                      </p>
                      <a href="https://smartlist.ga/dashboard/resources/verify_email.php?u=' .
                            md5($city) .
                            '"
                         style="background:#4527a0;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:5px;">Authorize login</a>
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
                        $mail->AltBody =
                            "Verify your email here: https://smartlist.ga/dashboard/resources/verify_email.php?u=" .
                            md5($city);

                        $mail->send();
                        //   echo 'Success!';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "confirm_email " . $to;
                }
            } else {
                //   Invalid Password
                setcookie(
                    "attempts",
                    $_COOKIE["attempts"]++,
                    time() + 86400 * 30,
                    "/"
                );
                echo "Invalid";
            }
        } else {
            //   Invalid Username
            setcookie(
                "attempts",
                $_COOKIE["attempts"]++,
                time() + 86400 * 30,
                "/"
            );
            echo "Invalid";
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
} else {
    echo "Empty";
}
?>