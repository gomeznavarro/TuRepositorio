<?
include ('../admin/book_sc_fns.php');
require_once("../display_partes.php");

// El carro de compra necesita sesiones, así que empezar una
session_start();
displayPageHeaders( "Tienda", $membersArea = true);
displaygalleryppal($membersArea = true);	
	?>
	<body id="tab4">
    <?php

  		displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);

 		displaySolapas( $membersArea = true);
		displayCentral( $membersArea = true, $menu=false,"Compra", $banner=false, $foto=false );
?>

		<!-- CONTENT -->

        <div id="content">
        <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div style="margin-top:5px; margin-bottom:5px; text-align:right">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a style="color:#000" href="../admin/logout.php">Logout</a> | <a style="color:#000" href="../admin/index.php">Men&uacute; de administraci&oacute;n</a></div>'?>

			<div id="global_lateralycontenido"style="background-color:#FFF; padding:20px; width:920px; font-size:.9em"> <!-- igualar columnas --> 
  				
				<?php do_html_header2("Caja de pago");
  
				$cart=$_SESSION['cart'];
 				$card_type=$_POST['card_type'];
    			$card_number=$_POST['card_number'];
  				$card_month=$_POST['card_month'];
  				$card_year=$_POST['card_year'];
  				$card_name=$_POST['card_name'];
				
				  if($cart&&$card_type&&$card_number&&$card_month&&$card_year&&$card_name )
				  {
					//mostrar carro, no permitir cambios y sin imágenes
					display_cart($cart, false, 0);
				
					display_shipping(calculate_shipping_cost());
				
					//if(process_card($HTTP_POST_VARS))cambio por siguiente
						if(process_card($_POST))
				
					{
					  //Vaciar carro de compra
					  session_destroy();
					  echo "Gracias por confiar en nosotros.  Su pedido ha sido tramitado.";
					  display_enlace("index.php", "Seguir de compras");
					  display_enlace("../index.php", "Ir a inicio");
		  
					}
					else
					{
					  echo "No hemos podido procesar su tarjeta, Por favor contacte con los emisores de la tarjeta o int&eacute;ntalo de nuevo.";
					  display_enlace_centro("purchase.php", "< Volver");

					}
				  }
				  else
				  {
					echo "No has cubierto todos los campos, por favor, int&eacute;ntalo de nuevo.<hr>";
					display_enlace_centro("purchase.php", "< Volver");
				  }
				
				?>
				<div class="clear"></div>
         
         	</div><!-- //igualar columnas -->
			
		<!-- MENU_INFERIOR -->			

		<?php displayMenuInf( $membersArea = true); ?>

        </div><!-- //CONTENT -->
        
        
     <!-- PIE -->  

<?php
displayFooter( $membersArea = true);
?>
