<?
require_once('../admin/book_sc_fns.php');
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Art&iacute;culos AECA", $membersArea = true);
displaygalleryppal($membersArea = true);	

	?>
	<body id="tab4">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
	displaygalleryppal($membersArea = true, $noticias = false, $gallery=false);
	displaySolapas( $membersArea = true);
	$isbn=$_GET['isbn'];
	$title = get_book_name($isbn);
	$shopname=get_shopname_by_isbn($isbn);
	$name="<span style='font-size:.8em'>$shopname > </span>$title";
	displayCentral( $membersArea = true, $menu=true, $name, $foto=false);
	?>

        <!-- CONTENT -->
        <div id="content">
            <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
        	<div id="global_lateralycontenido"style="padding-left:20px; padding-top:20px; width:940px; border-top:0"> <!-- igualar columnas //style border para IE7-->
            
                <!-- LATERAL -->
                <div id="lateral">
                </div>
                <!-- CONTENIDO -->
                <div id="contenido">
                 <?php 
                 if(isset($_SESSION['admin_user'])&&$_SESSION['admin_user']!=''){			
                       // si estás logueado como un admin, mostrar enlaces editar articulo
                        display_enlace_ppal("../admin/edit_book_form.php?isbn=$isbn", "Editar el art&iacute;culo");}
                 
                  // obtener este articulo de la base de datos
                  $isbn=$_GET['isbn'];
                  $book = get_book_details($isbn);
                  ?><div><?
                  do_html_header2($book["title"]);
                  display_book_details($book);              
                  ?></div><?
                  // configurar url para "botón continuar"
                  $target = "index.php";
                  if($book["shopid"])
                  {
                  $target = "show_shop.php?shopid=".$book["shopid"];
                  }
                  // si estás logueado como un admin, mostrar enlaces admin y edicion
                  if( check_admin_user()){
                    display_enlace("../admin/index.php", "Men&uacute; de administraci&oacute;n");
                    display_enlace("../admin/index_admin.php", "P&aacute;gina central de edici&oacute;n");
                  }
                  else
                  {
                    display_enlacerojo("show_cart.php?new=$isbn", "A&ntilde;adir al carro");
                    display_enlace($target, "Seguir de compras");
                    display_enlace("salir_sin_comprar.php", "Salir sin comprar");	
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
