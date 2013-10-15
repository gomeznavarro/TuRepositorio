<?
require_once("book_sc_fns.php");
include_once("output_fns.php");
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Editar Categor&iacute;a AECA", $membersArea = true);
displaygalleryppal($membersArea = true);
?>
<body>
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Editar categor&iacute;a", $foto=false);
?>

    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        	<?php
            if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
            display_menu_gral_admin(); 
            }?> 
        
            	<div id="lateral"></div>
            	
                <!-- CONTENIDO -->
            	<div id="contenido">
                    <div id="edicion">
                
                    <?php
                    $catid=$_GET['catid'];
                    
                    if (check_admin_user())
                    {
                      if ($catname = get_category_name($catid)){
						  
                        $cat = compact("catname", "catid");
                        display_category_form($cat);
                      }
                      else
                        echo "<p>No se han podido recuperar los detalles de la categor&iacute;a.</p>";
						?><div class="clear"></div><?		
						display_enlacesimple2("../tienda/show_cat.php?catid=$catid", "Ir a la categor&iacute;a");
                    
                    }
                    else{
                      echo "No est&aacute;s autorizado a ver esta p&aacute;gina.";
                      display_enlacesimple("login_admin.php", "Login");
                      }
                    ?>
                    <div style="width: 30em; margin-top: 20px; text-align: center;">
					<a class="avance" href="javascript:history.go(-1)"><<< Volver</a>
					</div>
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