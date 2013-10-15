<?
require_once ('../admin/book_sc_fns.php');
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Ofertas AECA", $membersArea = true, $noticias=false, $gallery=false);
displaygalleryppal($membersArea = true);	
  	?>
	<body id="tab4"> 
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
 	displaySolapas( $membersArea = true);
	displayCentral( $membersArea = true, $menu=true, "Ofertas", $foto=false);
	?>

        <!-- CONTENT -->
        <div id="content" >
            <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
            <div id="global_lateralycontenido" style=" padding-left:20px; padding-top:20px; width:940px; border-top:0"> <!-- igualar columnas //style border para IE7-->
            
                <!-- LATERAL -->
                <div id="lateral" style="padding-top:50px; width:240px">
                        <div id="catnoticias" style="width:100%; ">
                            <?php			
                            $book_array = get_all_ofertas();
                            display_books_indice($book_array); 
                            ?>
                        </div>
                </div><!-- //LATERAL -->
                <!-- CONTENIDO -->
             	<div id="contenido" style="width:650px;">
                    <div id="principal_1col">
            
                        <p>Nuestros asociados ofrecen en este momento las siguientes ofertas.</p>
                        <p>&#161;C&oacute;mpralas online!</p>
                        
                        <?php
                          // obener la información del articulo de la base de datos
                        $ofertas_array=get_shops_ofertas();
                        display_ofertas($ofertas_array);
                        
                          // si está loqueado como admin, mostrar enlaces añadir y borrar libros
                          if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!=""){
                            display_enlace("index.php", "Ir a p&aacute;gina central de comercios");
                            display_enlace("../admin/index_admin.php", "Ir a p&aacute;gina general de edici&oacute;n");
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
