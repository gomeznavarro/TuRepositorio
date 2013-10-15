<?php
require_once("display_partes.php");
require_once("admin/db_fns.php"); 
require_once("admin/output_fns.php");
require_once("admin/book_fns.php");
require_once( "common.inc.php" );

session_start();

displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = false, $gallery=false, $gallery_portada=true);
displayfotoppal($membersArea = false);
displaygalleryppal( $membersArea = false, $gallery=false, $gallery_portada=true);

?>
<body id="tab1">
<?php
displayPageHeadings($membersArea = false, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = false);
displayCentral( $membersArea = false, $menu=true, $heading = false, $banner=true, $foto=false, $gallery=false, $socios_menu=false, $clientes_menu=false);
?> 

    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="members/logout.php">Logout</a></div>';
    else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="users/logout.php">Logout</a></div>';
    else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas //style border para IE7-->
    
                <!-- LATERAL -->
                <div id="lateral">
                     <?php	displayLateral( $membersArea = false, $clientes1=true, $socios1=true, $socios=false, $ventajas=false); ?>   
                </div><!-- //LATERAL -->
                
                <!-- CONTENIDO -->
                <div id="contenido">
                    <?php
                    require_once ("contenido_en.inc.php");
                    require_once ("cierre_fotos.inc.php");
                    ?>       
                </div><!-- //CONTENIDO -->
            
                        <div class="clear"></div>
             
        </div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
        <?php 
		displayMenuInf( $membersArea = false); 
		?>
        <!-- //MENU_INFERIOR -->
            
    </div><!-- //CONTENT -->
        
<!-- PIE -->  
<?php 
displayFooter( $membersArea = false); 
?>
