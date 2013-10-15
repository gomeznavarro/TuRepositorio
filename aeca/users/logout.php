<?php
require_once( "../common.inc.php" );
require_once( "../config.php" );
//require_once( "../clases/User.class.php" );
//require_once( "../clases/LogEntry.class.php" );
require_once("../display_partes.php");
require_once('../admin/book_sc_fns.php');
require_once("../admin/output_fns.php");
require_once("../admin/admin_fns.php");
  
session_start();

displayPageHeaders( "Asociaci&oacute;n Atocha - Clientes", $membersArea = true);
?>
<body id="tab3">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Cierre sesi&oacute;n clientes");
 
$_SESSION["user"] = "";
unset ($_SESSION["user"]);

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
            	<p>Gracias, la sesi&oacute;n se ha cerrado correctamente. Hacer <a class="avance" href="login_user.php">login</a> de nuevo.</p>
        
        	</div>
            <!-- //CONTENIDO -->
        
                    <div class="clear"></div>
             
        </div><!-- //igualar columnas -->
                
  		<!-- MENU_INFERIOR -->			
 		<?php displayMenuInf( $membersArea = true); ?>

	</div><!-- //CONTENT -->
        
<!-- PIE -->  
<?php displayFooter( $membersArea = true); ?>



