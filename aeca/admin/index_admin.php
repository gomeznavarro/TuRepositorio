<?
require_once("../admin/book_sc_fns.php");
require_once("../display_partes.php");
require_once( "../config.php" );
require_once( "../common.inc.php" );
require_once( "../clases/Admin.class.php" );

session_start();

displayPageHeaders( "Edici&oacute;n general AECA", $membersArea = true, $noticias=false, $gallery=false);
displaygalleryppal($membersArea = true);
?>
  	<body id="tab">
	<?php 
    displayPageHeadings($membersArea = true, $noticias = false, $gallery=false, $foto=true);    
    displaySolapas( $membersArea = true);
    displayCentral( $membersArea = true, $menu=false, "Edici&oacute;n categor&iacute;as / socios / ofertas", $foto=false, $gallery=false, $socios_menu=false, $clientes_menu=true);
    ?>
        <!-- CONTENT -->
        
        <div id="content">
        <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
            <div id="global_lateralycontenido" style="border-bottom:0px"> <!-- igualar columnas -->
            <?php
            if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
                    display_menu_gral_admin();
            ?>	
            </div>
            
            <div id="global_lateralycontenido1" style="padding-bottom:10px; border-top:0px"> <!-- igualar columnas -->
            
                 <!-- CONTENIDO -->
                 <div id="contenido" style="width:900px"; >
                 <?php
                 $cat_array = get_categories();
				 // se muestran en forma de arbol los enlaces para cambiar categorias, subcat, comercios y ofertas					 
				 display_categories_subcategories_admin($cat_array);                
				 display_enlace("../admin/index.php", "Inicio Admin");                
                 ?>
                  </div>
                  <!-- //CONTENIDO -->
                        <div class="clear"></div><?php 
			}
            else {
                  echo '<p style="margin-left:150px; padding:30px">No est&aacute;s autorizado a ver esta p&aacute;gina.</p>';
            } ?> 
            </div><!-- //igualar columnas -->
                    
            <!-- MENU_INFERIOR -->			
        
            <?php displayMenuInf( $membersArea = true); ?>
        
		</div><!-- //CONTENT -->
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>
