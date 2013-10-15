<?

function db_connect()
{
  /* $result = @mysql_pconnect("localhost", "root", "140573");
   if (!$result)
      return false;
   /*if (!@mysql_select_db("mydatabase"))
      return false;*/
$connect=mysql_pconnect("localhost","root","140573"); 
mysql_select_db("mydatabase",$connect);

//$connect=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london");  
//mysql_select_db("a5899716_ddbb",$connect);

if (!mysql_set_charset('utf8', $connect)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
}
  return $connect; //ANADO ESTO NO ESTABA-19-10-2012
}

function db_result_to_array($result)
{
   //$res_array = array();

   for ($count=0; $row = @mysql_fetch_array($result); $count++)
     $res_array[$count] = $row;

   return $res_array;
}

?>