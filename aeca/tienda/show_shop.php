<?
require_once ('../admin/book_sc_fns.php');
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Establecimientos AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body id="tab4">
<?php

displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
 
$shopid=$_GET['shopid'];
$shopname = get_shop_name($shopid);
$subcatname=get_subcatname_by_shopid($shopid);
$name="<span style='font-size:.8em'>$subcatname > </span>$shopname";

displayCentral( $membersArea = true, $menu=true, $name, $banner=false,$foto=false, $gallery=false, $socios_menu=false, $clientes_menu=false);
?>

<!-- CONTENT -->

<div id="content">
            <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>

	<div id="global_lateralycontenido" style="border-top:0"> <!-- igualar columnas //style border para IE7-->
	<?php do_html_header2(); ?>
    	<!-- LATERAL -->
 		<div id="lateral" >
	 		<div id="cat" >
				<?php			
                $book_array = get_books($shopid);
                display_books_indice($book_array); 
                ?>
            </div>
		</div><!-- //LATERAL -->
        
		<!-- CONTENIDO -->
 		<div id="contenido" style="width:670px">
			<div id="principal" style="width:600px">

		   <?php 
		   if(isset($_SESSION['admin_user'])&&$_SESSION['admin_user']!=''){			
    
		display_enlace_ppal("../admin/view_member.php?memberId=$shopid&start=0&order=username", "Editar establecimiento");}
		
            $todo=get_shop_todo($shopid);
			do_html_heading2($shopname);
            echo '<p class="muestra">'.$todo[0][7].'</p>';
            echo '<p class="muestra2">'.$todo[0][4].'</p>';
            echo '<p class="muestra2"><a href="http://www.google.es">'. $todo[0][6]."</a></p>";
            echo '<p class="oferta">Ofertas actuales:</p>';

			  // obener la información del articulo de la base de datos
			  $book_array = get_books($shopid);
			  display_books($book_array);
	
	
			  // si está loqueado como admin, mostrar enlaces añadir y borrar libros
			  if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!="")
			  {

		display_enlace("../admin/index_admin.php", "P&aacute;gina central de edici&oacute;n");
 		display_enlace("../admin/index.php", "Men&uacute; de administraci&oacute;n");
			  }
			  else{
				display_enlace("index.php", "Seguir de compras");
				display_enlace("salir_sin_comprar.php", "Salir sin comprar");					
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
