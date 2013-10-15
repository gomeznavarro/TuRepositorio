<?php
include("dbConnector.php");
$connector = new DbConnector();

$txtRazon = trim(strtolower($_POST['txtRazon']));
$txtRazon = mysql_escape_string($txtRazon);

$shopname = trim(strtolower($_POST['shopname']));
$shopname = mysql_escape_string($shopname);

$query = "SELECT shopname FROM empresas, shops WHERE shops.shopname = '$shopname' AND empresas.txtRazon= '$txtRazon' AND shops.empresaid=empresas.empresaid LIMIT 1";
$result = $connector->query($query);
$num = mysql_num_rows($result);

echo $num;
mysql_close();