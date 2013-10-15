<?php
require_once( "../common.inc.php" );
 require_once("book_sc_fns.php");

require_once("../display_partes.php");
session_start();


 displayPageHeaders( "Asociaci&oacute;n Atocha - Admin", $membersArea = true);
 ?>
	<body id="tab">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);

 displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Cierre sesi&oacute;n administraci&oacute;n"); 
 

$_SESSION["admin_user"] = "";
unset ($_SESSION["admin_user"]);

session_destroy();
?>


<!-- CONTENT -->

<div id="content">

<div id="global_lateralycontenido"> <!-- igualar columnas -->

   	<!-- LATERAL -->
    <div id="lateral"> 
	</div>
	
	<!-- CONTENIDO -->
 <div id="contenido">
	    <h2>Sesi&oacute;n cerrada</h2>

    <p>Gracias, la sesi&oacute;n se ha cerrado correctamente. Hacer <a class="avance" href="login_admin.php">login</a> de nuevo.</p>

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
