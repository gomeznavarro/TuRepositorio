<?

// incluir archivos de función para esta aplicación
require_once("book_sc_fns.php");
include_once("output_fns.php");
require_once("../display_partes.php");

session_start();
displayPageHeaders( "Administraci&oacute;n", $membersArea = true);
?>
	<body >
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
	displaySolapas( $membersArea = true, $adminArea=true);
	displayCentral( $membersArea = true, $menu=false, "Insertar art&iacute;culo", $foto=false);
	?>

        <!-- CONTENT -->
        
        <div id="content">
<?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
            
            <div id="global_lateralycontenido"> <!-- igualar columnas -->
            	<?php
                if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
                display_menu_gral_admin(); 
                }?> 
                <!-- CONTENIDO -->
                   <div id="contenido">
                      <div id="margen">
                      <?php
                    //do_html_header2("A&ntilde;adir una oferta");
                    if (check_admin_user())
                    {
                      if (filled_out($_POST))
                      {
                         $title=$_POST['title'];
                         $author=$_POST['author'];
                         $shopid=$_POST['shopid'];
                         $price=$_POST['price']; 
                         $description =$_POST['description']; 
                        if(insert_book($title, $author, $shopid, $price, $description))
                          echo "La oferta '$title' ha sido a&ntilde;adida a la base de datos.<br>";
                        else
                          echo "La oferta '$title' no ha podido ser a&ntilde;adida a la base de datos.<br>";
                      }
                      else
                        echo "No has cubierto el formulario.  Prueba de nuevo por favor.";
                    }
					else {
						echo "No est&aacute;s autorizado a ver esta p&aacute;gina.";
				  		do_html_url2("login_admin.php", "Login");
						}                    
                    ?>
                    </div>
                    
                  </div>
                  <!-- //CONTENIDO -->
            
                        <div class="clear"></div>
                     
            </div><!-- //igualar columnas -->
                        
            <!-- MENU_INFERIOR -->			
            
           	<?php displayMenuInf( $membersArea = true); ?>

        </div><!-- //CONTENT -->
        
   <!-- PIE -->  

 	<?php displayFooter( $membersArea = true); ?>