<?

function db_connect(){
	
$connect = mysql_pconnect("mysql7.000webhost.com","a5899716_silvia","160989london");

//$connect = mysql_pconnect("localhost","root","140573");

   if (!$connect)
      return false;
	if (!mysql_select_db("a5899716_ddbb",$connect))
   //if (!mysql_select_db("mydatabase",$connect))
      return false;
if (!mysql_set_charset('utf8', $connect)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;}

   return $connect;
}

?>