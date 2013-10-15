<?php
//se utiliza en listar y descargar archivos
//$conn = mysql_connect("localhost","root","140573");
// mysql_select_db("mydatabase");
 
 
 $conn = mysql_connect("mysql7.000webhost.com","a5899716_silvia","160989london");
 mysql_select_db("a5899716_ddbb");
 
 if (!mysql_set_charset('utf8', $conn)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
} 
  

?>
