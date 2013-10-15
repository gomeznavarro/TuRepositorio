<?
include ('../admin/book_sc_fns.php');
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Carrito Compra AECA", $membersArea = true);
displaygalleryppal($membersArea = true);
	  			
?>
<body id="tab4">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false,"Carrito de compra", $banner=false, $foto=false );
?>
<style type="text/css">
#global_lateralycontenido {
	
	font-size:.9em
	
}
</style>

<!-- CONTENT -->

<div id="content">
<?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../users/logout.php">Logout</a></div>';
else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>


<div id="global_lateralycontenido"style="background-color:#FFF; padding:20px; width:920px;"> <!-- igualar columnas -->

	
   
    
    
    
  <?php 
@$new=$_GET['new'];

  if($new)
  {
    //nuevo artículo seleccionado
    //if(!session_is_registered("cart"))lo cambio por siguiente
  if(!isset($_SESSION['cart']))
    {
      //$cart = array();
     // session_register("cart"); cambio esta y la anterior por la siguiente
	 $_SESSION["cart"]=array();
	 $_SESSION["items"]=0;
	  $_SESSION["total_price"]="0.00";
      //$items = 0;cambio estas 4 por las anteriores
      //session_register("items");
      //$total_price = "0.00";
      //session_register("total_price");
    }
    if(isset($_SESSION['cart'][$new]))
     $_SESSION['cart'][$new]++;
    else
      $_SESSION['cart'][$new] = 1;
    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
     $_SESSION['items']= calculate_items($_SESSION['cart']);

  }
  
if(isset($_POST['save'])) 
{ 
  
    foreach ($_SESSION['cart'] as $isbn => $qty) 
    { 
        if($_POST[$isbn] == "0") 
        { 
            unset($_SESSION['cart'][$isbn]); 
        } 
        else 
        { 
            $_SESSION['cart'][$isbn] = $_POST[$isbn]; 
        } 
        
    } 
    $_SESSION['total_price'] = calculate_price ($_SESSION['cart']); 
     $_SESSION['items'] = calculate_items($_SESSION['cart']); 
}  
  do_html_header2("Tu carro de compra");

 if(isset($_SESSION['cart']) &&array_count_values($_SESSION['cart']))
    display_cart($_SESSION['cart']);
 
    
  else
  {
    echo "<p>No hay art&iacute;culos en tu carro";
    echo "<hr>";
  }
  $target = "index.php";

  // si hemos añadido un artículo al carro, continuar comprando en esa categoría
  if($new)
  {
    $details =  get_book_details($new);
    if($details["shopid"])
      $target = "show_shop.php?shopid=".$details["shopid"];
  }
  //display_button($target, "continue-shopping", "Continue Shopping");
  display_enlace($target, "Seguir de compras");
  /*$path = $_SERVER['PHP_SELF'];
  $server=$_SERVER['SERVER_NAME'];
  $path = str_replace("show_cart.php", "", $path);
  display_button("http://".$server.$path."checkout.php", "go-to-checkout", "Go To Checkout");*/
	
	//display_button("salir_sin_comprar.php", "salir", "Final Shopping");
				
				
				display_enlace("salir_sin_comprar.php", "Salir sin comprar");					
				display_enlacecaja("checkout.php", "Ir a la caja");		

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
