
<?php
require_once("bookmark_fns.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once ('../admin/book_sc_fns.php');
require_once("../admin/output_fns.php");
require_once("../admin/admin_fns.php");
require_once("../display_partes.php");
   
session_start();
checkLogin_user();

displayPageHeaders( "Cambio Contrase&ntilde;a Clientes AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);

	?>
	<body id="tab3">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
 	displaySolapas( $membersArea = true);
	displayCentral( $membersArea = true, $menu=false, "Cambio de contrase&ntilde;a clientes");
	?>

        <!-- CONTENT -->
        
        <div id="content">
    <?php if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
        	<div id="global_lateralycontenido"> <!-- igualar columnas -->
         	<?php display_menu_gral_admin(); ?>
       
                <!-- LATERAL -->
                 <div id="lateral">
                  	<div id="cat2" >
            		<?php  require_once("../users/menu_cat_area_clientes.php"); ?>
                 	</div>
                </div><!-- //LATERAL -->
                
                <!-- CONTENIDO -->
                <div id="contenido">
                	<div id="registro" style="float:left; margin-left: 150px; margin-bottom: 30px;">                
                   	<?php                 
                 	display_password_form();
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


    









    




