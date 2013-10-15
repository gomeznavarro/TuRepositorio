<?
require_once("book_sc_fns.php");
require_once("output_fns.php");
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Insertar Subcategor&iacute;a AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body>
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Insertar subcategor&iacute;a", $foto=false);
?>

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
             
            <?php
            if (check_admin_user()){
				
             	if (filled_out($_POST)){
				  
					  $subcatname=$_POST['subcatname'];
					  $catid=$_POST['catid'];
				
						if(insert_subcategory($subcatname,$catid))
						  echo "La subcategor&iacute;a '$subcatname' ha sido a&ntilde;adida a la base de datos.<br>";
						else
						  echo "La subcategor&iacute;a '$subcatname' no ha podido ser a&ntilde;adida a la base de datos.<br>";
						}
						else{
							echo "No has cubierto el formulario.  Prueba de nuevo, por favor.";
							display_enlacesimple("insert_subcategory_form.php", "Volver");  
						}
					}
				else{
				  echo "No est&aacute;s autorizado a ver esta p&aacute;gina.";
				  display_enlacesimple("login_admin.php", "Login");
				  }
            ?>
            
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