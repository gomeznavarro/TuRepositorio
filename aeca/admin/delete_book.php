<?
require_once("book_sc_fns.php");
require_once("output_fns.php");
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Borrar art&iacute;culo AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body>
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Borrar art&iacute;culo", $foto=false);
?>
 
    <div id="content">
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        <?php
            if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
            display_menu_gral_admin(); 
            }?> 
            
             <!-- CONTENIDO -->
             <div id="contenido">
             <div id="edicion">
             <?php
            if (check_admin_user())
            {
              if ($isbn=$_POST['isbn'])
              {
                if(delete_book($isbn))
                  echo "<p>El art&iacute;culo '$isbn' ha sido borrado.</p>";
                else
                  echo "<p>El art&iacute;culo '$isbn' no ha podido ser borrado.</p>";
              }
              else
                echo "<p>Necesitamos el c&oacute;digo para borrar un art&iacute;culo.  Por favor int&eacute;ntalo de nuevo.</p>";
                    display_enlace("../admin/index.php", "Men&uacute; de administraci&oacute;n");
                    display_enlace("../admin/index_admin.php", "P&aacute;gina central de edici&oacute;n");
            }
            else{
				echo "No est&aacute;s autorizado a ver esta p&aacute;gina.";
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