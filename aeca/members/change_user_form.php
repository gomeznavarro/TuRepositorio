
<?php

require_once("bookmark_fns.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once ('../admin/book_sc_fns.php');
require_once("../admin/output_fns.php");
require_once("../admin/admin_fns.php");
require_once("../admin/result_array.php");

require_once("../display_partes.php");
  
session_start();
checkLogin();

displayPageHeaders( "Socios AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);
?>
<body id="tab2">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);

displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Cambio de usuario de socios");
?>

<!-- CONTENT -->

    <div id="content">
    <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
         <?php display_menu_gral_socios();?>
        
            <!-- LATERAL -->
             <div id="lateral">
                <div id="cat" >
                <?php  require_once("../members/menu_cat_area_socios.php"); ?>
                </div>
             </div><!-- //LATERAL -->
        
            <!-- CONTENIDO -->
            <div id="contenido">
                <div id="registro" style="float:left; margin-left: 100px; margin-bottom: 30px;">
                <?php display_user_form(); ?>
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


    



    




