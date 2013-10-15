<? 
//recibimos las variables enviadas por el formulario 
$titulo=$_POST['titulo']; 
$autor=$_POST['autor']; 
$categoria=$_POST['categoria']; 
$articulo=$_POST['noticia'];
$fecha_public=$_POST['fecha_public']; 
$fecha_fin=$_POST['fecha_fin']; 
 
//conectamos a la base 
//$connect=mysql_connect("localhost","root","140573"); 
//mysql_select_db("mydatabase",$connect); 

$connect=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london"); 
mysql_select_db("a5899716_ddbb",$connect);

//insertamos los registros almacenados en las variables 
mysql_query("insert into noticias(titulo, autor, categoria, noticia,fecha_public, fecha_fin,fecha)values('$titulo','$autor','$categoria','$articulo','$fecha_public', '$fecha_fin', NOW())",$connect);
header("location: index.php"); 
?>
