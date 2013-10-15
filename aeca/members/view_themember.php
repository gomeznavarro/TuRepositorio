<?php

require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/user_auth_fns.php");
require_once("../admin/output_fns.php");
require_once("../admin/result_array.php");
require_once("../members/view_themember_fns.php");

session_start();
checkLogin();

displayPageHeaders( "Edici&oacute;n Socio AECA", $membersArea = true, $noticias=false);
displaygalleryppal($membersArea = true, $noticias=false);

?>
<body id="tab2">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Edici&oacute;n de Datos de Socios", $foto=false, $gallery=false);
?>

    <!-- CONTENT -->
    
    <div id="content">
        <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        <?php 
		display_menu_gral_socios();
        display_menu_gral_admin(); 
		?> 
    
            <!-- CONTENIDO -->
         	<div id="contenido">
            	<div id="principal" class="letreros">
    
                <?php
    
                $memberId = isset( $_REQUEST["memberId"] ) ? (int)$_REQUEST["memberId"] : 0;
    
                if ( !$member = Member::getMember( $memberId ) ) {
                  	echo "<p>No se ha podido recuperar la información solicitada</p>";
                  	display_enlacesimple("../members/view_members.php", "Volver al listado de socios");			     
                	?>
             		</div></div></div>                
            		<?php displayMenuInf( $membersArea = true); ?>    
            		</div>   
            		<?php displayFooter( $membersArea = true);
                  	exit;
                }
    
                if ( isset( $_POST["action"] ) and $_POST["action"] == "Salvar Cambios" ) {
                  saveMember();
                } elseif ( isset( $_POST["action"] ) and $_POST["action"] == "Borrar Socio" ) {
                  deleteMember();
                } else {
                  displayForm( array(), array(), $member );
                }
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

