<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "140573";
$mysql_database = "mydatabase";

/*
$mysql_hostname = "mysql7.000webhost.com";
$mysql_user = "a5899716_silvia";
$mysql_password = "160989london";
$mysql_database = "a5899716_ddbb";
*/

$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Error conectando a la base de datos");
mysql_select_db($mysql_database, $bd) or die("Error seleccionando la base de datos");

  if (!mysql_set_charset('utf8', $bd)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
	}
?>