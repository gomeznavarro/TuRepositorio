<?
  //incluye nuestro conjunto de funciones
  include ('../admin/book_sc_fns.php');
  require_once("../display_partes.php");


  // El carrito de compra necesita sesiones, así que empezar una
  session_start();
  displayPageHeaders( "Tienda", $membersArea = true);

	 displaygalleryppal($membersArea = true);	  			?>
	<body id="tab4">
    <?php

  displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
 


 displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false,"Caja de pago", $banner=false, $foto=false );
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
  
<? 
 
  
 if(isset ($_SESSION['cart']))
$cart=$_SESSION['cart'];

  do_html_header2("Caja de pago");

  if(isset ($_SESSION['cart'])){
  if(array_count_values($cart))
  {
    display_cart($cart, false, 0);
    display_checkout_form();
  }}
  else
    echo "<p>No hay art&iacute;culos en su carrito";

  //display_button("show_cart.php", "continue-shopping", "Continue Shopping");

	display_enlace("show_cart.php", "Seguir de compras");

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
