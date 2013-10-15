<?

  include ('../admin/book_sc_fns.php');
    require_once("../display_partes.php");

  // El carro de compra necesita sesiones, así que empezar una
  session_start();
    displayPageHeaders( "Tienda", $membersArea = true);

		  			?>
	<body id="tab4">
    <?php

  displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);

 displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false,"Proceso de compra", $banner=false, $foto=false );
?>
<style type="text/css">
#global_lateralycontenido {
	
	font-size:.9em
	
}
</style>

<!-- CONTENT -->

<div id="content">
<?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div style="margin-top:5px; margin-bottom:5px; text-align:right">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a style="color:#000" href="../admin/logout.php">Logout</a> | <a style="color:#000" href="../admin/index.php">Men&uacute; de administraci&oacute;n</a></div>'?>

<?php




  ?>



<div id="global_lateralycontenido"style="background-color:#FFF; padding:20px; width:920px;"> <!-- igualar columnas --> 
  
  
  <?php

  do_html_header2("Caja de pago");

  // si cubierto
  
  $cart=$_SESSION['cart'];
  
  if(isset($_POST['name']))  
  $name=$_POST['name'];
  
  if(isset($_POST['address']))
  $address=$_POST['address'];
  
  if(isset($_POST['city']))
  $city=$_POST['city'];
  
  if(isset($_POST['zip']))
  $zip=$_POST['zip'];
  
  if(isset($_POST['country']))
  $country=$_POST['country'];

   if(isset($_POST['name'])&&isset($_POST['address'])&&isset($_POST['city'])&&isset($_POST['zip'])&&isset($_POST['country']))

  
  
  {
    // se ha podido insertar en la base de datos
	    if( insert_order($_POST)!=false )

    {
      //mostrar carro, no permitir cambios y sin imágenes
      display_cart($cart, false, 0);
	  
	
	display_shipping(calculate_shipping_cost());

      //obtener detalles de la tarjeta de crédito
      	display_card_form($name);
		
		
		display_enlace("show_cart.php", "Seguir de compras");
		display_enlace("salir_sin_comprar.php", "Salir sin comprar");	
      //display_button("show_cart.php", "continue-shopping", "Continue Shopping");
    }
    else
    {
      echo "<p>No hemos podido guardar tus datos. Por favor, prueba de nuevo.</p>";
      display_button("checkout.php", "back", "Back");
    }
  }
  else
  {
    echo "<p>Por favor, rellena todos los campos.</p>";
    //display_button("checkout.php", "back", "Back");
		display_enlace_centro("checkout.php", "< Volver");

  }

  //do_html_footer2();
?>
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
