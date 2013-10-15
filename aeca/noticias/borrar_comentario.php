<?php require_once("../display_partes.php");
require_once("../admin/book_sc_fns.php");
// iniciamos sesión para seguir a admin, socios y clientes
session_start(); 

displayPageHeaders( "Noticias", $membersArea = true, $noticias=false);
?>
<body id="tab5">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Editar comentarios", $foto=false);
?>


<!-- CONTENT -->

<div id="content">
<?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div style="margin-top:5px; margin-bottom:5px; text-align:right">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a style="color:#000" href="../admin/logout.php">Logout</a> | <a style="color:#000" href="index.php">Men&uacute; de administraci&oacute;n</a></div>';?>
<div id="global_lateralycontenido" > <!-- igualar columnas -->



	<!-- LATERAL -->
<div id="lateral"></div>

<?php if (check_admin_user()){
?>
	<!-- CONTENIDO -->
 <div id="contenido">
<? 
//recibimos la variable $id 
$id_comentario=$_POST['id_comentario']; 

//conectamos a bd 
//$connect=mysql_connect("localhost","root","140573");  
//mysql_select_db("mydatabase",$connect);


$connect=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london"); 
mysql_select_db("a5899716_ddbb",$connect);

$result=mysql_query("delete from comentarios where id_comentario='$id_comentario'",$connect); 

if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
	echo "El comentario no ha sido borrado";

}
echo "El comentario ha sido borrado";
do_html_url2("index.php", "Volver a noticias");

//header("location: index.php"); 
?>
 </div>
    <!-- //CONTENIDO -->

			<div class="clear"></div>
   <? } 
   else{
	   echo "No tiene permiso para ver esta p&aacute;gina";
   }?>
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