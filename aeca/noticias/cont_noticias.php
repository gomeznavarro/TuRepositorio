<?php
$url_current = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

 	if(isset($_SESSION['member']) && $_SESSION['member']!=''){
	 $a=  $_SESSION["member"]->getValue( "firstName2" ); 
	}
	
//conectamos a la base 

$connect=mysql_connect("localhost","root","140573"); 
mysql_select_db("mydatabase",$connect);

//$connect=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london"); 
//mysql_select_db("a5899716_ddbb",$connect);

if (!mysql_set_charset('utf8', $connect)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
}
//echo 'El conjunto de caracteres actual es: ' .  mysql_client_encoding($connect);

//hacemos las consultas 

if(preg_match('/aeca\/index.php/',$url_current)) { 

	$result=mysql_query("SELECT titulo, autor, noticia, id_noticia, categoria, fecha,(
	SELECT COUNT( comentario ) 
	FROM comentarios 
	WHERE noticias.id_noticia = comentarios.id
	AND publicacion =  's' group by comentarios.id
	) AS count 
	FROM noticias
	LEFT JOIN comentarios ON noticias.id_noticia = comentarios.id
	where fecha_public < NOW() and fecha_fin > now()
	GROUP BY id_noticia
	ORDER BY fecha DESC 
	LIMIT 0 , 2", $connect);
}

if(preg_match('/aeca\/noticias\/index.php/',$url_current)) {

	$result=mysql_query("SELECT titulo, autor, noticia, id_noticia, categoria, fecha,(
	SELECT COUNT( comentario ) 
	FROM comentarios 
	WHERE noticias.id_noticia = comentarios.id
	AND publicacion =  's' group by comentarios.id
	) AS count
	FROM noticias
	LEFT JOIN comentarios ON noticias.id_noticia = comentarios.id
	WHERE fecha_public < NOW( ) 
	AND fecha_fin > NOW( ) 
	GROUP BY noticias.id_noticia
	ORDER BY fecha DESC 
	LIMIT 0 , 30");
}

if (!$result) { 
    die('Error en la consulta: ' . mysql_error());
	}
$num_rows=mysql_num_rows($result); 
if ($num_rows == 0){ 
    echo "error"; 
    exit; 
    } 

if((isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != "")||(((isset($_SESSION["member"])&& $_SESSION["member"] != "") && (isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != "")))) {?>
	
	<a class="edicion" style="color:#fff" href="<?php if ( $membersArea ) echo "../" ?>noticias/administrar.php">Insertar nueva noticia</a>
	
    <div class="clear"></div>

	<p class="informacion">Pulse sobre las noticias para su edici&oacute;n o borrado</p>
	<? }

//Recogemos las consultas en un array y las mostramos 

while($row=mysql_fetch_array($result)) 
	{ 
		echo '<h4>';?>
		<a href="<?php Ruta_noticias('/aeca\/index.php/')?>ver.php?id=<?php echo $row['id_noticia']?>"><?php echo $row['titulo']?></a>
		<?php
		$fecha=$row['fecha'];
					$fecha=(string)$fecha;
					$fechas=explode('-', $fecha);
					$primero=substr( $fechas[2],0,2);
					$hora=substr( $fechas[2],3,8);
					$fecha="$primero-$fechas[1]-$fechas[0] / $hora";
		echo '</h4>'.'<p class="fecha">'.$fecha.' | '.$row['categoria'].'  </p>';
			if($row['count']==0){
				echo '<p class="fecha" >0 comentarios  </p>';
			}
			else if($row['count']==1){
				echo '<p class="fecha" >'.$row['count'].' comentario </p>';
			}
			else
			echo '<p class="fecha">'.$row['count'].' comentarios </p>';

		echo '<p class="noticias">'.nl2br (substr(($row['noticia']),0,100)) . "...</p>";  
 
  		echo '<p class="leer_mas">'; ?>
  		<a href="<?php Ruta_noticias('/aeca\/index.php/')?>ver.php?id=<?php echo $row['id_noticia']?>">Seguir leyendo...</a></p>
  		<?php  
} 
mysql_free_result($result) 
?>
