<?
require_once("book_sc_fns.php");
require_once("output_fns.php");
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Insertar Categor&iacute;a AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body>
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
                  display_category_form();                
                }
                else{
                  echo "No est&aacute;s autorizado a entrar en el &aacute;rea de administraci&oacute;n";  
                       display_enlacesimple("../admin/login_admin.php", "Login");
                }
                ?>
                
                </div>
                
            </div><!-- //CONTENIDO -->
    
                <div class="clear"></div>
             
        </div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
    
        <?php displayMenuInf( $membersArea = true); ?>
    
    
    </div><!-- //CONTENT -->
        
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>