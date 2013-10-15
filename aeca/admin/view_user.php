<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/User.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/user_auth_fns.php");
require_once("../admin/output_fns.php");
require_once("../admin/view_user_fns.php");

session_start();
checkLogin_admin();

displayPageHeaders( "Edición Clientes AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

 	?>
	<body>
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
	displaySolapas( $membersArea = true);
	displayCentral( $membersArea = true, $menu=false, "Edici&oacute;n de clientes", $foto=false, $gallery=false);
	?>

        <!-- CONTENT -->
        
        <div id="content">
        <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
            <div id="global_lateralycontenido"> <!-- igualar columnas -->
            <?php display_menu_gral_admin(); ?>
                	
                    <!-- LATERAL -->
                     <div id="lateral">
                     	
                    </div><!-- //LATERAL -->
                	
                    <!-- CONTENIDO -->
             		<div id="contenido">
                    	<div id="principal" class="letreros">
            
								<?php
                            if (!isset ($_SESSION['admin_user'])){
                            echo "No est&aacute; autorizado para acceder al &aacute;rea de administraci&oacute;n <br/>";
                            echo '<a href="../admin/login.php">Por favor, haga Log in</a>';
                            return;}
                            
                            $userId = isset( $_REQUEST["userId"] ) ? (int)$_REQUEST["userId"] : 0;
                            
                                            if ( !$user = User::getUser( $userId ) ) {
                                              echo "<div>No se ha podido recuperar la información solicitada</div>";			     
                                                        ?>
                                                     </div></div></div>	
                                                        
                                                    <?php displayMenuInf( $membersArea = true); ?>
                                            
                                                    </div>      
                                            
                                                    <?php displayFooter( $membersArea = true);
                                            
                                                          exit;
                                            }
                            
                            if ( isset( $_POST["action"] ) and $_POST["action"] == "Salvar Cambios" ) {
                              saveUser();
                            } elseif ( isset( $_POST["action"] ) and $_POST["action"] == "Borrar Cliente" ) {
                              deleteUser();
                            } else {
                              displayForm( array(), array(), $user );
                            }
                            
                            ?>
                    </div>
              	</div>
                <!-- //CONTENIDO -->
            
                        <div class="clear"></div>
                     
			</div><!-- //igualar columnas -->
                    
            <!-- MENU_INFERIOR -->			
        
            <?php displayMenuInf( $membersArea = true); ?>
        
		</div><!-- //CONTENT -->
        
	<!-- PIE -->  

	<?php displayFooter( $membersArea = true); ?>

