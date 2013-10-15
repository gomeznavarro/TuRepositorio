<?

require_once("book_sc_fns.php");
require_once("output_fns.php");
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Editar Subcategor&iacute;a AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body>
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Editar subcategor&iacute;a", $foto=false);
?>

    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        <?php
            if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
            display_menu_gral_admin(); 
            }?> 
        
            <!-- LATERAL -->
            
           	<div id="lateral"></div>
            <!-- CONTENIDO -->
         	<div id="contenido">
                <div id="edicion">
                <?php
              
                if (check_admin_user()){
                        if(isset($_POST['catid']))$catid=$_POST['catid'];
                        if(isset($_POST['subcatid']))$subcatid=$_POST['subcatid'];
                        if(isset($_POST['subcatname']))$subcatname=$_POST['subcatname'];
                        
                        if(isset($_POST['catid'])&&isset($_POST['subcatname'])&&isset($_POST['subcatname'])){
                                
                                  if (filled_out($_POST)){
									  
                                    if(update_subcategory($subcatid, $subcatname,$catid))
                                      echo "<p>La subcategor&iacute;a '$subcatname' ha sido actualizada.</p>";
                                    else
                                      echo "<p>La subcategor&iacute;a '$subcatname' no ha podido ser actualizada.</p>";
                                  	}
                                  else
                                    echo "<p>No has cubierto el formulario.  Prueba de nuevo por favor.</p>";
                                	display_enlacesimple("edit_subcategory_form.php?subcatid=$subcatid", "Ir al formulario");	
                                	}
                
                        else{
                            echo "<p>No has especificado subcategor&iacute;a.  Prueba de nuevo por favor.</p>";
                            display_enlacesimple("../admin/index_admin.php", "Ir a edici&oacute;n");		
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