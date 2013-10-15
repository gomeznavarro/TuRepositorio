<?

// incluye archivos de función para esta aplicación
require_once("book_sc_fns.php");
include_once("output_fns.php");
require_once("../display_partes.php");

session_start();
displayPageHeaders( "Administraci&oacute;n AECA", $membersArea = true);
?>
	<body >
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
	displaySolapas( $membersArea = true, $adminArea=true);
	displayCentral( $membersArea = true, $menu=false, "Editar oferta", $foto=false);
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
                	<div id="margen">
							<?php
                        if(isset($_POST['oldisbn']))$oldisbn=$_POST['oldisbn'];
                        if(isset($_POST['isbn']))$isbn=$_POST['isbn'];
                        if(isset($_POST['title']))$title=$_POST['title'];
                        if(isset($_POST['author']))$author=$_POST['author'];
                        if(isset($_POST['shopid']))$shopid=$_POST['shopid'];
                        if(isset($_POST['price']))$price=$_POST['price']; 
                        if(isset($_POST['description']))$description=$_POST['description'];
                        //do_html_header2("Actualizar libro");
                        if (check_admin_user()){
							
                          if (filled_out($_POST)){
							  
                            if(update_book($oldisbn, $isbn, $title, $author, $shopid,
                                              $price, $description))
                              echo "La oferta $isbn ha sido actualizada.<br>";
                            else
                              echo "La oferta $isbn no ha podido ser actualizada.<br>";
                          }
                          else{
                            echo "No has cubierto el formulario.  Prueba de nuevo por favor."; ?>
					   		<a class="avance" href="edit_book_form.php?isbn=$isbn">< Volver</a>      					
                      <? }
					  }
                       else
                          {echo "No est&aacute;s autorizado a ver esta p&aacute;gina.";?>
                      
					   <a class="avance" href="login_admin.php">Login</a>
                        <? }?>
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