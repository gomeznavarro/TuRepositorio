<?
require_once("book_sc_fns.php");
require_once("output_fns.php");
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Administraci&oacute;n AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body >
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Borrar subcategor&iacute;a", $foto=false);
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
            <?php
            
            if (check_admin_user()){
				
              if (isset($_POST['subcatid'])&&$subcatid=$_POST['subcatid']){
				  
                if(delete_subcategory($subcatid))
                  echo "La Subcategor&iacute;a $subcatid ha sido borrada.<br>";
                else{
                  echo "La Subcategor&iacute;a $subcatid no ha podido ser borrada.<br>"
                       ."Esto suele ser porque no se encuentra vac&iacute;a.<br>";
                          display_enlacesimple("edit_subcategory_form.php?subcatid=$subcatid", "Volver");
                }
            
              }
              else{
                echo "No ha especificado subcategor&iacute;a.  Prueba de nuevo por favor.<br>";
                    
                          display_enlacesimple("index_admin.php", "Volver");
              }
            }
            else
             { echo "No est&aacute;s autorizado a ver esta p&aacute;gina.";
              display_enlacesimple("login_admin.php", "Login");}
            
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