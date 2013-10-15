 <?php 
require_once("../display_partes.php");
require_once( "../config.php" );
require_once( "../common.inc.php" );
require_once( "../clases/Admin.class.php" );
require_once("../admin/book_sc_fns.php");

session_start();
checkLogin_admin();

displayPageHeaders("Edici&oacute;n de Galer&iacute;a",$membersArea = true, $gallery=false, $gallery_portada=false, $gallery_tiendas=false, $gallery_socios=false, $docum=false, $editfoto=true);
displayedicionfotos($membersArea = true);
displaygalleryppal($membersArea = true)

?>
<body id="tab6">
<?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=true, $foto=true);
 	displaySolapas( $membersArea = true);
 	displayCentral( $membersArea = true, $menu=false, "Edici&oacute;n de galer&iacute;a de fotos", $banner=false, $foto=false, $gallery=true)
?>
    
    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>

        <div id="global_lateralycontenido" > <!-- igualar columnas -->	            
		<?php   
		display_menu_gral_admin(); 
		?> 
           <div id ="block"></div>
            <div class="container">
                <div id="popupbox"></div>
                <div id="contents" style="background-color:#f3f3f3">
                    <?php include_once ($view->contentoTemplate); // incluyo el template que corresponda ?>
                </div>
            </div>
    
			<div class="clear"></div>
         
        </div><!-- //igualar columnas -->
			
		<!-- MENU_INFERIOR -->			

		<?php displayMenuInf( $membersArea = true); ?>

		<!-- //MENU_INFERIOR -->
    	
	</div><!-- //CONTENT -->
        
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>
