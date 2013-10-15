
<? 
require_once("../admin/book_sc_fns.php");

//recibimos las variables enviadas por el formulario 
$id_comentario=$_POST['id_comentario']; 
$nick=$_POST['nick']; 
$publicacion=$_POST['publicacion']; 
$fecha_com=$_POST['fecha_com']; 
$comentario=$_POST['comentario'];

//conectamos a la base 
//$connect=mysql_connect("localhost","root","140573");
//mysql_select_db("mydatabase",$connect);

$connect=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london"); 
mysql_select_db("a5899716_ddbb",$connect);

                 if (!mysql_set_charset('utf8', $connect)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
}

//modificamos los datos de la base según variables recibidas

$result=mysql_query("update comentarios Set comentario='$comentario',nick='$nick' 
,fecha_com='$fecha_com', publicacion='$publicacion' where id_comentario='$id_comentario'", $connect);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$id=get_idnoticia($id_comentario);

header("location: ver.php?id=$id"); 
?>
