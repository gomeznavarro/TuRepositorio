<?
require_once("book_sc_fns.php");
require_once("../display_partes.php");
require_once( "../config.php" );
require_once( "../common.inc.php" );
require_once( "../clases/Admin.class.php" );

session_start();
checkLogin_admin();

displayPageHeaders( "&Aacute;rea Administraci&oacute;n AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);

?>
<body >
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "&Aacute;rea de administraci&oacute;n", $foto=false);
?>

	<!-- CONTENT -->

    <div id="content">
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
    
            <!-- LATERAL -->
            <div id="contenido" style="margin-left:150px">
                <div id="cat3" >	
                    <?php  display_admin_menu(); //output 532
                    ?>
                </div>
         	</div>
                    <div class="clear"></div>
             
        </div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
        <?php displayMenuInf( $membersArea = true); ?>
    
    </div><!-- //CONTENT -->
        
<!-- PIE -->  
<?php displayFooter( $membersArea = true); ?>
