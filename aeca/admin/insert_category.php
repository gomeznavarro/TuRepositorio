<?
require_once("book_sc_fns.php");
require_once("output_fns.php");
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Insertar Categor&iacute;a AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body >
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Insertar categor&iacute;a", $foto=false);
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
					
					  if (filled_out($_POST)){
					  
						  $catname=$_POST['catname'];
						  
						if(insert_category($catname))
						  echo "<p>La categor&iacute;a '$catname' ha sido a&ntilde;adida a la base de datos.</p>";
						else
						  echo "<p>La categor&iacute;a '$catname' no ha podido ser a&ntilde;adida a la base de datos.</p>";
					  }
					  else{
						echo "<p>No has cubierto el formulario.  Prueba de nuevo, por favor.</p>";										
						display_enlacesimple("insert_category_form.php", "Volver");
					  }
					}
					else{
					  	echo "<p>No est&aacute;s autorizado a ver esta p&aacute;gina.</p>";
						display_enlacesimple("../admin/login_admin.php", "Login");
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