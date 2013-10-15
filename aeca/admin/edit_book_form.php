<?

// incluye archivos de función para esta aplicación
require_once("book_sc_fns.php");
include_once("output_fns.php");

session_start();

require_once("../display_partes.php");
displayPageHeaders( "Administraci&oacute;n AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);

?>
	<body >
    <?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Editar oferta", $foto=false);
 ?>

<!-- CONTENT -->

<div id="content">
<?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>

<div id="global_lateralycontenido"> <!-- igualar columnas -->
<?php
    if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
	display_menu_gral_admin(); 
	}?> 
	<!-- LATERAL -->
    
	<?php
?>
	<!-- CONTENIDO -->
 <div id="contenido">
  <div id="edicion">




<?php
if (check_admin_user())
{
	  $isbn=$_GET['isbn'];

  if ($book = get_book_details($isbn))
  {
    display_book_form($book);

  }
  else
    echo "<p>No se han podido recuperar los detalles de la oferta.</p>";
do_html_url2("../tienda/show_book.php?isbn=$isbn", "Ver la oferta");
}
else
  {echo "<p>No est&aacute;s autorizado para entrar en el &aacute;rea de administraci&oacute;n.</p>";
	do_html_url2("login_admin.php", "Login");}

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