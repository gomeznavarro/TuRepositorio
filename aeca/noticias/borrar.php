<? 
//recibimos la variable $id 
$id=$_POST['id'];

//conectamos a bd 
//$connect=mysql_connect("localhost","root","140573");  
//mysql_select_db("mydatabase",$connect);

$connect = mysql_connect("mysql7.000webhost.com","a5899716_silvia","160989london");
mysql_select_db("a5899716_ddbb",$connect);


//borramos los registros pertenecientes a la id 
$result2=mysql_query("delete from comentarios where id='$id'",$connect); 

if (!$result2) { // add this check.
die('Invalid query: ' . mysql_error());
}

$result=mysql_query("delete from noticias where id_noticia='$id'",$connect); 
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}


header("location: index.php"); 
?>