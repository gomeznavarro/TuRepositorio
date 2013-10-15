<?php
include("dbConnector.php");
$connector = new DbConnector();

$emailAddress = trim(strtolower($_POST['emailAddress']));
$emailAddress = mysql_escape_string($emailAddress);

$query = "SELECT emailAddress FROM members WHERE emailAddress = '$emailAddress' LIMIT 1";
$result = $connector->query($query);
$num = mysql_num_rows($result);

echo $num;
mysql_close();