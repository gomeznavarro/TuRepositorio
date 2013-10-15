<?
require_once("../admin/book_sc_fns.php");
require_once("../display_partes.php");

session_start();
displayPageHeaders( "Asociados", $membersArea = true, $gallery=false, $gallery_portada=false, $gallery_tiendas=true);
displaygallerytiendas($membersArea = true);
    //	displayscriptsnoticias();

displaygalleryppal($membersArea = true, $gallery=false, $gallery_portada=false, $gallery_tiendas=true);

?>
<body id="tab4">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=true, "Nuestros asociados", $foto=false, $gallery=false, $socios_menu=false, $clientes_menu=false);
?>

    <!-- CONTENT -->
    <div id="content">
<?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../users/logout.php">Logout</a></div>';
else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido" style="border-top:0"> <!-- igualar columnas //style border para IE7-->
        <?php do_html_header2(); ?>
        
            <!-- LATERAL -->
            <div id="lateral" >
                <?php
                displayLateral( $membersArea = true, $socios=false, $ventajas=false);
                $cat_array = get_categories();
                display_categories($cat_array); 
                ?>
            </div><!-- //LATERAL -->
    
            <!-- CONTENIDO -->
            <div id="contenido" >
    
            <?php		
            if(isset($_SESSION['admin_user']) and $_SESSION['admin_user']!=''){
            echo '<p style="color: #900 "><strong>'.$_SESSION['admin_user']->getValue('username').'</strong>, puedes utilizar los men&uacute;s para acceder a las diferentes categor&iacute;as, subcategor&iacute;as, tiendas y ofertas, para su edici&oacute;n y borrado, o utilizar el bot&oacute;n hacia la p&aacute;gina general de edici&oacute;n';
			
			 

                    display_enlace("../admin/index.php", "Men&uacute; de administraci&oacute;n");
                    display_enlace("../admin/index_admin.php", "P&aacute;gina general de edici&oacute;n");
    
            }
			/* if((!isset($_SESSION['user'])|| $_SESSION['user']=='') &&  (!isset($_SESSION['member'])|| $_SESSION['member']=='')  ){
	echo "<p>Si eres socio o cliente haz <a href=\"../members/login.php\">login-socios</a> o <a href=\"../users/login_user.php\">login-clientes</a> para obtener el descuento en tu compra</p>"; 
	 require_once ("../noticias/login.html");}*/
    
            if (isset ($_POST['tienda']) and $_POST['tienda']!=''){
        
                if ($_POST['tienda']=='tiendas'){
                            $shopname= $_POST["buscar"];
                            $shop_array = get_shops_shopname($shopname);
                            display_shops($shop_array);	
                }
                if ($_POST['tienda']=='codigo'){
                            $zip= $_POST["buscar"];
                            $shop_array = get_shops_zip($zip);
                            display_shops($shop_array);	
                }
                if ($_POST['tienda']=='subcat'){
                            $subcatname= $_POST["buscar"];
                            $shop_array = get_shops_subcatname($subcatname);
                            display_shops($shop_array);	
                }
            }
              
            if (isset ($_POST['sitesearch']) and $_POST['sitesearch']!=''){	
        
                if ($_POST['sitesearch']=='1'){
                    $algo=$_POST["q"];
                	$shop_array = get_shops_poralgo($algo);
                    display_shops($shop_array);	
                }
            } ?>
                
                <div id="global_2colysecundario" > <!-- igualar columnas centrales -->		
            
                    <h2>Nuestros comercios</h2>
                    <p>Hay una gran diferencia entre un peque&ntilde;o comercio y una gran superficie, y aqu&iacute; te invitamos a que descubras las ventajas del comercio de siempre a los mejores precios.</p>
                    <p style="margin:20px">Desde los men&uacute;s superior y lateral podr&aacute;s:</p>
                    <ul style="margin:20px">
                    <li>Navegar por los comercios, conocer sus direcciones, contacto... e incluso comprar las ofertas que se ofrecen.</li>
                    <li>Visitar nuestra tienda de <a style="font-weight:bold" href="/aeca/tienda/oferton.php">ofertas</a> directamente</li>
                    </ul>
                    <?php
					if((!isset($_SESSION['member'])||$_SESSION['member']=='')&&(!isset($_SESSION['user'])||$_SESSION['user']=='')){
					?>
                    <p style="color:#039; font-weight:bold">¡Recuerda hacer login si eres socio o cliente antes de pasar por caja para obtener el descuento en tus compras!</p>
                    <p><a href="../register_user.php" style="font-weight:bold">Regístrate</a> como cliente si aún no lo has hecho y pagarás sólo la mitad de los gastos de envío.</p>
                    <? }?>
         			<p class="photoslider" style="margin:20px">Puedes ir echando un ojo a nuestros asociados...</p>
    
        			<div class="photoslider" id="default"></div>  
                </div>  
                            <div class="clear"></div>
                     
    
            </div><!-- //CONTENIDO -->  
    
                <div class="clear"></div>
      
        <script type="text/javascript">  
            $(document).ready(function(){  
                //change the 'baseURL' to reflect the host and or path to your images  
               FOTO.Slider.baseURL = '/aeca/photos/';  
              
                //set images by filling our bucket directly  
                FOTO.Slider.bucket = {  
                    'default': {  
                        0: {'thumb': 'cafeteria55_mini.jpg', 'main': 'cafeteria.jpg', 'caption': 'Cafeter&iacute;a Puro Gusto', 'des':'Estaci&oacute;n, puesto 23 - purogusto.es'},  
                        1: {'thumb': 'restaurante55_mini.jpg', 'main': 'restaurante.jpg', 'caption': 'Casa Adela', 'des':'Calle Canarias, 2 - adela.org'},  
                        2: {'thumb': 'terraza55_mini.jpg', 'main': 'terraza.jpg', 'caption': 'Terraza Atocha', 'des':'Calle Atocha, 1 - terrazaatocha.es'},  
                        3: {'thumb': 'griego55_mini.jpg', 'main': 'griego.jpg', 'caption': 'Restaurante El Greco', 'des':'Calle Canarias, 1 - www.elgreco.es'},  
                        4: {'thumb': 'catalonia55_mini.jpg', 'main': 'catalonia.jpg', 'caption': 'Hotel Catalonia', 'des':'Paseo Delicias, 124 - hotelcatalonia.es'}  
    
                    }  
                };  
                FOTO.Slider.reload('default');  
                FOTO.Slider.preloadImages('default');  
           		FOTO.Slider.enableSlideshow('default');    
                FOTO.Slider.play('default'); 
            
        });  
        </script>  
       
        </div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
        <?php displayMenuInf( $membersArea = true); ?>
    
    </div><!-- //CONTENT -->        
        
<!-- PIE -->  
<?php displayFooter( $membersArea = true); ?>
