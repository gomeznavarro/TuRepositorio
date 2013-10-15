<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/User.class.php" );
require_once( "../clases/LogEntryUsers.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/output_fns.php");
require_once("../admin/user_auth_fns.php");

session_start();
if (check_admin_user()){
	checkLogin_admin();
}
else 
checkLogin_user(); 

displayPageHeaders( "&Aacute;rea Clientes AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

	?>
	<body id="tab3">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
	displaySolapas( $membersArea = true);
	displayCentral( $membersArea = true, $menu=false, "&Aacute;rea de Clientes");
?>
        <!-- CONTENT -->
        
        <div id="content">
		<?php 
		if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../users/logout.php">Logout</a></div>';
        else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';
		?>        
            <div id="global_lateralycontenido"> <!-- igualar columnas -->
			<? if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
            display_menu_gral_admin($membersArea=true);        
            }?>    
                
                 <!-- CONTENIDO -->
                 <div id="contenido">
                 	<div id="principal">
                    
						<?php if(isset($_SESSION['user'])&& $_SESSION['user']!='') {?>                        
                        <p>Bienvenido al &aacute;rea de clientes, <?php echo $_SESSION["user"]->getValue( "username" ) ?>!</p><?php 
						}?>
                    
                      	<div id="cat3">
                        <?php  require_once("../users/menu_cat_area_clientes.php"); ?>
                    	</div>
                    
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


    






