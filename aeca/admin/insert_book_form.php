<?
require_once("book_sc_fns.php");
require_once("../display_partes.php");
require_once( "../config.php" );
require_once( "../common.inc.php" );
require_once( "../clases/Admin.class.php" );

session_start();
displayPageHeaders( "Administraci&oacute;n", $membersArea = true);
?>
<body onLoad="document.edicion.isbn.focus()">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Insertar art&iacute;culo", $foto=false);
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
    
		<!-- CONTENIDO -->
 		<div id="contenido">
    		<div id="edicion">
    			<?php
				if (check_admin_user()){
  					display_book_form();
				}
				else
  					echo "No est&aacute;s autorizado a entrar en el área de administraci&oacute;n";
				?>
			</div>
 		</div><!-- //CONTENIDO -->

			<div class="clear"></div>
         
	</div><!-- //igualar columnas -->
			
	<!-- MENU_INFERIOR -->			

	<?php displayMenuInf( $membersArea = true); ?>

</div><!-- //CONTENT -->        
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>