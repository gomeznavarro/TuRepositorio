<?php
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/LogEntry.class.php" );

require_once("../display_partes.php");
require_once("../admin/book_sc_fns.php");
include_once("../admin/output_fns.php");
require_once("../admin/user_auth_fns.php");

session_start();
if (check_admin_user()){
	checkLogin_admin();
}
else checkLogin();

displayPageHeaders( "Socios AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

?>
	<body id="tab2">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
 	displaySolapas( $membersArea = true);
 	displayCentral( $membersArea = true, $menu=false, "Pr&oacute;ximos eventos");
	?>

		<!-- CONTENT -->

        <div id="content">
        <?php 
		if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
        else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
        	<div id="global_lateralycontenido"> <!-- igualar columnas -->
			 <?php 
			 display_menu_gral_socios();
             display_menu_gral_admin(); 
			 ?>
                <!-- LATERAL -->
                 <div id="lateral">
                             <div id="cat">            
                         	<?php  require_once("../members/menu_cat_area_socios.php"); ?>
                 			</div>
                </div><!-- //LATERAL -->
                
                <!-- CONTENIDO -->
                <div id="contenido">
                    <div id="principal" class="letreros">
         
                        <dl>
                          <dt style="width:10%" >04 / 11 </dt>
                          <dd>Inauguraci&oacute;n de Floralia</dd>
                          <dt style="width:10%">10 / 11 </dt>
                          <dd>Entrada en vigor de la Ley Seca</dd>
                          <dt style="width:10%">03 / 12</dt>
                          <dd>Junta General en la sede de la Asociaci&oacute;n</dd>                          
                        </dl>        
                
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







