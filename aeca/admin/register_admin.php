

<?php
require_once( "../common.inc.php" );
require_once("../display_partes.php");
include_once("db_fns.php"); 
include_once("output_fns.php");
include_once("book_fns.php");
require_once( "../config.php" );
require_once( "../clases/Admin.class.php" );
require_once("registro_admin_fns.php");

session_start();
checkLogin_admin();

displayPageHeaders( "Registro Admin AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);

?>
<body>
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Nuevo administrador", $foto=false);
?>

    <!-- CONTENT -->
    
    <div id="content">
        <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
                    <?php display_menu_gral_admin(); ?>
            
            <!-- CONTENIDO -->
            <div id="contenido">
            <?php         
            if ( isset( $_POST["action"] ) and $_POST["action"] == "register" ) {
              processForm();
            } else {
              displayForm( array(), array(), new Admin( array() ) );
            }
            ?>
            	<div class="clear"></div><!-- /NO TOCAR -->
                        
            </div> <!-- //CONTENIDO -->
          
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
