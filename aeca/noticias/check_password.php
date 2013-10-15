<?php
session_start();
require_once( "../clases/Member.class.php" );

include("../dbConnector.php");
$connector = new DbConnector();

$username = trim(strtolower($_POST['username']));
$username = mysql_escape_string($username);
$password = trim(strtolower($_POST['password']));
$password = mysql_escape_string($password);
$query = "SELECT username, password FROM members WHERE username = '$username' and password=password('$password')LIMIT 1";
$result = $connector->query($query);
$num = mysql_num_rows($result);

echo $num;
mysql_close();