<?
require_once("book_sc_fns.php");
require_once("output_fns.php");
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
                if (check_admin_user()){	
                    
                    if(isset($_POST['catid']))$catid=$_POST['catid'];
                    if(isset($_POST['catname']))$catname=$_POST['catname'];
                    if(isset($_POST['catid'])&&isset($_POST['catname'])){
                    
                          if (filled_out($_POST))
                          {
                            if(update_category($catid, $catname))
                              echo "<p>La categor&iacute;a '$catname' ha sido actualizada.</p>";
                            else
                              echo "<p>La categor&iacute;a '$catname' no ha podido ser actualizada.</p>";		
                          }
                          else{
                            echo "<p>No has cubierto el formulario.  Prueba de nuevo por favor.</p>";
                        	display_enlacesimple("edit_category_form.php?catid=$catid", "Volver");
						  }
                
                        }
                		else{
							echo "<p>No has especificado categor&iacute;a.  Prueba de nuevo por favor.</p>";
							display_enlacesimple("../admin/index_admin.php", "Volver");                
                			}	
                }
                else{
					echo "<p>No est&aacute;s autorizado a ver esta p&aacute;gina.</p>";
					display_enlacesimple("login_admin.php", "Login");
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