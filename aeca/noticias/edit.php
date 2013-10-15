
<? 
require_once("../admin/book_sc_fns.php");

//recibimos las variables enviadas por el formulario 
$id=$_POST['id']; 
$titulo=$_POST['titulo']; 
$autor=$_POST['autor']; 
$categoria=$_POST['categoria']; 
$noticia=$_POST['noticia'];
$fecha_public=$_POST['fecha_public'];
$fecha_fin=$_POST['fecha_fin'];


//conectamos a la base 

//$connect=mysql_connect("localhost","root","140573");  
//mysql_select_db("mydatabase",$connect);

$connect=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london"); 
mysql_select_db("a5899716_ddbb",$connect);

                 if (!mysql_set_charset('utf8', $connect)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
}

//echo 'El conjunto de caracteres actual es: ' .  mysql_client_encoding($connect);


//modificamos los datos de la base según variables recibidas

$result=mysql_query("update noticias Set noticia='$noticia', autor='$autor', fecha_public='$fecha_public', fecha_fin='$fecha_fin', categoria='$categoria', titulo='$titulo' where id_noticia='$id'", $connect);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
			mysql_query("SET NAMES 'utf8'");




header("location: ver.php?id=$id"); 
?>
