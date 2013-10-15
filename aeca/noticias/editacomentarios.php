<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<? 
require_once( "../common.inc.php" );

//editacomentarios.php 
//recibimos las variables enviadas por el formulario 
$id=$_POST['id']; 
$nick=$_POST['nick']; 
$tipo=$_POST['tipo']; 
$fecha_com=$_POST['fecha_com']; 
$publicacion=$_POST['publicacion']; 

$comentario=delete_format_text($_POST['comentario']);

if($comentario!='') {
//conectamos a la base 

//$connect=mysql_connect("localhost","root","140573"); 
$connect=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london"); 

//Seleccionamos la base 
//mysql_select_db("mydatabase",$connect);
mysql_select_db("a5899716_ddbb",$connect);
                 if (!mysql_set_charset('utf8', $connect)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
}

//Ingresamos los comentarios a su tabla 
$result=mysql_query("insert into comentarios(id,nick,fecha_com,publicacion, comentario, tipo) 
values('$id','$nick',NOW(),'$publicacion','$comentario','$tipo')",$connect); 
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
}
header("location: ver.php?id=$id"); 
?>
</body>
</html>