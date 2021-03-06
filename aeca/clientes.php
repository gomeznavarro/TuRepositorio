<?php
require_once("display_partes.php");
require_once("admin/db_fns.php"); 
require_once("admin/output_fns.php");
require_once("admin/book_fns.php");
require_once("common.inc.php");

session_start();

displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = false, $noticias = false, $gallery=false);
displaygalleryppal( $membersArea = false, $noticias = false, $gallery=false);

?>
<body id="tab3">
<?php 
displayPageHeadings($membersArea = false, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = false);
displayCentral($membersArea = false, $menu=false, "Clientes", $banner=false, $foto=true, $gallery=false, $socios_menu=false, $clientes_menu=true);
?>

    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="members/logout.php">Logout</a></div>';
    else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="users/logout.php">Logout</a></div>';
    else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido" style="border-top:0"> <!-- igualar columnas -->
        
            <!-- LATERAL -->
            <div id="lateral">
                <div id="cat">
                    <?php require ("menu_cat_clientes.inc.php"); ?>
                </div>
            </div><!-- //LATERAL -->
            
            <!-- CONTENIDO -->
            <div id="contenido">
    			
                <!-- ARTICULOS -->
            	<div id="principal_1col">
    
                <h2>Ventajas de ser cliente</h2>
    
                <p class="articulo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam auctor laoreet egestas. Nam vitae lorem dui. Ut viverra magna non erat blandit eleifend. Ut felis felis, varius commodo dictum nec, molestie sit amet lectus. Morbi eget magna urna, sed dignissim purus. Donec sit amet tellus tellus, nec tempor nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam.</p> 
            	
                </div>
                
            <?php                 
			require_once ("cierre_fotos.inc.php"); 
			?> 
      
            </div>
            <!-- //CONTENIDO -->
        
                    <div class="clear"></div>
             
		</div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
        <?php 
		displayMenuInf( $membersArea = false); 
		?>
        
	</div><!-- //CONTENT -->
        
<!-- PIE -->  
<?php 
displayFooter( $membersArea = false); 
?>


    










