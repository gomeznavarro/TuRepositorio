<?php

require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/User.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/user_auth_fns.php");
require_once("../admin/output_fns.php");
require_once("../users/view_theuser_fns.php");

session_start();
checkLogin_user();

displayPageHeaders( "Datos Clientes AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

 	?>
	<body id="tab3">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
 	displaySolapas( $membersArea = true);
 	displayCentral( $membersArea = true, $menu=false, "Datos de Clientes", $foto=false, $gallery=false);
	?>

        <!-- CONTENT -->
        
        <div id="content">
            <?php if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../users/logout.php">Logout</a></div>';?>
        
            <div id="global_lateralycontenido" > <!-- igualar columnas -->
            
            	<!-- CONTENIDO -->
             	<div id="contenido">
                <?php
            
				$userId = isset( $_REQUEST["userId"] ) ? (int)$_REQUEST["userId"] : 0;
				
				if ( !$user = User::getUser( $userId ) ) {
					
				  	echo "<div>No se ha podido recuperar la información solicitada</div>";			     
					?>
					</div></div>								
					<?php displayMenuInf( $membersArea = true); ?>				
					</div>    
					<?php displayFooter( $membersArea = true);				
					exit;
				}
				
				if ( isset( $_POST["action"] ) and $_POST["action"] == "Save Changes" ) {
				  saveUser();
				} elseif ( isset( $_POST["action"] ) and $_POST["action"] == "Delete User" ) {
				  deleteUser();
				} else {
				  displayForm( array(), array(), $user );
				}
				?>
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

