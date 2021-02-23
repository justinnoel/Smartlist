<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root")
or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test2",$conn);
*/

/**
* mysql_connect is deprecated
* using mysqli_connect instead
*/

$databaseHost = 'sql204.epizy.com';
$databaseName = 'epiz_26877943_admin';
$databaseUsername = 'epiz_26877943';
$databasePassword = 'pYLIZRktLbr';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
?>