<?
require_once("book_sc_fns.php");
require_once("output_fns.php");
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Administraci&oacute;n AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body>
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Borrar categor&iacute;a", $foto=false);
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
            //do_html_header2("Borrando categoría");
            
            
            if (check_admin_user()){
              if (isset($_POST['catid'])&& $catid=$_POST['catid']){
                  
                if(delete_category($catid))
                  echo "<p>La categor&iacute;a $catid ha sido borrada.</p>";
                else{
                    echo "<p>La categor&iacute;a $catid no ha podido ser borrada, seguramente porque no se encuentra vac&iacute;a.</p>";
                    display_enlacesimple("index_admin.php", "Ir a edici&oacute;n"); ?>
					<div style="width: 30em; margin-top: 20px; text-align: center;">
					<a class="avance" href="javascript:history.go(-1)"><<< Volver</a>
					</div>
                    <? }
            
              }
             else{
                    echo "<p>No has especificado categor&iacute;a.  Prueba de nuevo por favor.</p>";
                          display_enlacesimple("edit_category_form.php?catid=$catid", "Volver");
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