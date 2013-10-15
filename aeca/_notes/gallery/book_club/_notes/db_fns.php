<?

function db_connect()
{
	
//$result = mysql_pconnect("mysql2.000webhost.com","a6769825_silvia","160989london");
   $result = mysql_pconnect("localhost","root","140573");
   if (!$result)
      return false;
	 //if (!mysql_select_db("a6769825_ddbb"))
  if (!mysql_select_db("mydatabase"))
      return false;

   return $result;
}

?>