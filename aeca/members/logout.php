<?php
require_once( "../common.inc.php" );
//como no estoy en carpeta book_club, añado los tres require de abajo
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/LogEntry.class.php" );
require_once("../display_partes.php");
  include ('../admin/book_sc_fns.php');
  include_once("../admin/output_fns.php");
  include_once("../admin/admin_fns.php");
  include_once("../admin/result_array.php");
  

session_start();

displayPageHeaders( "Asociaci&oacute;n Atocha - Socios", $membersArea = true);
displaygalleryppal( $membersArea = true);

?>
	<body id="tab2">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
 displaySolapas( $membersArea = true);
 displayCentral( $membersArea = true, $menu=false, "Cierre sesi&oacute;n socios");
 
$_SESSION["member"] = "";
unset ($_SESSION["member"]);

session_destroy();
?>

<!-- CONTENT -->

<div id="content">

<div id="global_lateralycontenido"> <!-- igualar columnas -->

		<!-- LATERAL -->
    <div id="lateral">
	</div><!-- //LATERAL -->

	<!-- CONTENIDO -->
 <div id="contenido">
 	
	    <h2>Sesi&oacute;n cerrada</h2>

    <p>Gracias, la sesi&oacute;n se ha cerrado correctamente. Hacer <a class="avance" href="login.php">login</a> de nuevo.</p>

</div>
    <!-- //CONTENIDO -->

			<div class="clear"></div>
         
         </div><!-- //igualar columnas -->
			
	<!-- MENU_INFERIOR -->			

	<?php
displayMenuInf( $membersArea = true)?>


        </div><!-- //CONTENT -->
        
        
     <!-- PIE -->  

<?php
displayFooter( $membersArea = true)?>





