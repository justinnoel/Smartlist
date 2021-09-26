<?php 
session_start();
if(!isset($_SESSION["id"])) {header('Location: https://smartlist.ga/dashboard/auth');exit();}
$user = array(
	"name" => $_SESSION['name'],
	"email" => $_SESSION['email'],
	"id" => $_SESSION['id'],
	"avatar" => $_SESSION['avatar'],
	"theme" => $_SESSION['theme'],
	"remind" => $_SESSION['notifications'],
	"goal" => $_SESSION['number_notify'],
);
?>