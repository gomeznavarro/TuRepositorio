<?php require_once("../display_partes.php");
require_once("../admin/book_sc_fns.php");
// iniciamos sesión para seguir a admin, socios y clientes
session_start(); 

displayPageHeaders( "Noticias", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

?>
<body id="tab5">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Editar comentarios", $foto=false);
?>


<!-- CONTENT -->

<div id="content">
<?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div style="margin-top:5px; margin-bottom:5px; text-align:right">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a style="color:#000" href="../admin/logout.php">Logout</a> | <a style="color:#000" href="../admin/index.php">Men&uacute; de administraci&oacute;n</a></div>';?>
<div id="global_lateralycontenido" > <!-- igualar columnas -->
<?php
if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){?>
		<div id="menu_admin">
			<ul>				
				<li class="nivel1"><a href="../admin/index.php">Men&uacute; de administraci&oacute;n</a></li>
				<li class="nivel1"><a href="../admin/index_admin.php">P&aacute;gina central de edici&oacute;n</a></li>
                <li class="nivel1"><a href="../noticias/index.php">Edici&oacute;n general de noticias</a></li>
			</ul>
		</div>	 

<? }?>
	<!-- LATERAL -->
    <div id="lateral"></div>
	<?php
//displayLateral( $membersArea = true);
?>
	<!-- CONTENIDO -->
 <div id="contenido">
 <div id="principal">
 <? 
 
 function get_comentariosByid($id_comentario)
{
   // Petición a la base de datos de una lista de categorías
   //$conn = db_connect(); 
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
//echo 'El conjunto de caracteres actual es: ' .  mysql_client_encoding($connect);
//hacemos las consultas 
	$query = "SELECT *
FROM comentarios, noticias WHERE 
 noticias.id_noticia = comentarios.id and 
comentarios.id_comentario =$id_comentario
ORDER BY comentarios.id_comentario";	
	
   $result = mysql_query($query);
   if (!$result)
     return false;
   $num_comentarios = mysql_num_rows($result);
   if ($num_comentarios ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
   
   //mysql_free_result($result);*/

}
function display_comentarios_edit($comentario_array)
{
  if (!is_array($comentario_array))
  {
     echo "Actualmente no hay comentarios disponibles<br>";
     return;
  }
  foreach ($comentario_array as $row)
  {?>
<form id="borrado" name="borrado" action="borrar_comentario.php" method="post">
<input type="hidden"  name="id_comentario" value="<? echo $row['id_comentario']?>">
<input class="edicion" type="button" onClick="pregunta()" value="Borrar comentario"> 
</form> 
        <div class="clear"></div>

<form action="edit_comentario.php" method="post" id="registro" name="registro">
    <div style="width: 300px; float:left; margin-bottom:20px">
<fieldset>
<input type="hidden"  name="id_comentario" value="<? echo $row['id_comentario']?>">
<input type="hidden"  name="id" value="<? echo $row['id']?>">

<label for="nick">Autor</label>
<input type="text" id="nick" name="nick" value="<? echo $row['nick']?>">
<label for="publicacion">Publicaci&oacute;n</label>
<input type="text" id="publicacion" name="publicacion" value="<? echo $row['publicacion']?>">

<label for="fecha_com">Fecha de inserci&oacute;n (yyyy/mm/dd)</label>
<input type="text" id="fecha_com" name="fecha_com" value="<? echo $row['fecha_com']?>">

<label for="comentario">Comentario</label>
<textarea id="comentario" name="comentario" cols="50" rows="10"><? echo $row['comentario']?></textarea> 
</fieldset>
        <div class="clear"></div>

<input class="botonb" type="submit" value="Guardar">

</form>
        	 


</div>
            	 	<div class="clear"></div>  


<? 


}
}
 
 
 
 
 
 //recibimos la variable id enviada en el enlace por GET 
$id_comentario=$_GET['id_comentario'];                 
$id=get_idnoticia($id_comentario);




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
//echo 'El conjunto de caracteres actual es: ' .  mysql_client_encoding($connect);*/
//hacemos las consultas 
//mysql_free_result($result);
//******

  $comentario_array = get_comentariosByid($id_comentario);
  display_comentarios_edit($comentario_array);
 		display_enlace("../noticias/editar.php?id=$id", "Seguir editando la noticia");


//mysql_close($connect) ;
?>
</div>
 </div>
    <!-- //CONTENIDO -->

			<div class="clear"></div>
         
         </div><!-- //igualar columnas -->
			
	<!-- MENU_INFERIOR -->			

	<?php
displayMenuInf( $membersArea = true);
?>


        </div><!-- //CONTENT -->
        
        
     <!-- PIE -->  

<?php
displayFooter( $membersArea = true);
?>