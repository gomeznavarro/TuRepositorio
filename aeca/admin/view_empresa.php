<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/user_auth_fns.php");
require_once("../admin/output_fns.php");
require_once("../admin/view_empresa_fns.php");

session_start();
checkLogin_admin();

displayPageHeaders( "Edición Empresas AECA", $membersArea = true, $noticias=false);
displaygalleryppal($membersArea = true, $noticias=false);

?>
    <body>
    <?php
    displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
    displaySolapas( $membersArea = true);
    displayCentral( $membersArea = true, $menu=false, "Edici&oacute;n de Empresa", $foto=false, $gallery=false);
    ?>
    
        <!-- CONTENT -->
        
        <div id="content">
        <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
           
            <div id="global_lateralycontenido"> <!-- igualar columnas -->
            <?php display_menu_gral_admin(); ?>
               
                <!-- LATERAL -->
                <div id="lateral"></div>        
                <!-- //LATERAL -->		
                
                <!-- CONTENIDO -->
                 <div id="contenido">
                    <?php
						if (!isset ($_SESSION['admin_user'])){
						echo "<p>No est&aacute; autorizado para acceder al &aacute;rea de administraci&oacute;n </p>";
						echo '<a href="../admin/login.php">Por favor, haga Log in</a>';
						return;
					}
                    $memberId = isset( $_REQUEST["memberId"] ) ? (int)$_REQUEST["memberId"] : 0;
                    
					if ( !$member = Member::getEmpresa( $memberId ) ) {
                      	echo "<div>No se ha podido recuperar la información solicitada</div>";			     
						?>
						</div></div>                    
						<?php displayMenuInf( $membersArea = true); ?>        
						</div>         
						<?php displayFooter( $membersArea = true);
						exit;
                    }
        
                    if ( isset( $_POST["action"] ) and $_POST["action"] == "Salvar Cambios" ) {
                      	saveEmpresa();
                    } 
					elseif ( isset( $_POST["action"] ) and $_POST["action"] == "Borrar Empresa" ) {
                      	deleteEmpresa();
                    } 
					else {
                      	displayForm( array(), array(), $member );
                    }
				?>
				</div>
				<!-- //CONTENIDO -->
        
                    <div class="clear"></div>
                 
              </div><!-- //igualar columnas -->
                        
              <!-- MENU_INFERIOR -->			
            
              <?php displayMenuInf( $membersArea = true); ?>
        
        	</div><!-- //CONTENT -->
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>