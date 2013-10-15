<?php
/*$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "140573";
$mysql_database = "mydatabase";
*/

$mysql_hostname = "mysql7.000webhost.com";
$mysql_user = "a5899716_silvia";
$mysql_password = "160989london";
$mysql_database = "a5899716_ddbb";

$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>

