  <?
  include ('../admin/book_sc_fns.php');
    require_once("../display_partes.php");

  // empiezo sesión
  session_start();
  // cierro la sesion de compra (variables de sesion) pero no destruyo
  // la sesion para que puedan seguir logged in los socios y clientes
unset ($_SESSION["cart"], $_SESSION["items"], $_SESSION["total_price"]);


    displayPageHeaders( "Tienda", $membersArea = true);
		  			?>
	<body id="tab4">
    <?php

  displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);

 displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false,"Salida sin compra", $banner=false, $foto=false );?>
<div id="content">
<?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div style="margin-top:5px; margin-bottom:5px; text-align:right">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a style="color:#000" href="../admin/logout.php">Logout</a> | <a style="color:#000" href="../admin/index.php">Men&uacute; de administraci&oacute;n</a></div>'?>

	<div id="global_lateralycontenido"> <!-- igualar columnas -->
    
 		<div id="lateral" >
	 		<?php	displayLateral( $membersArea = true, $clientes1=true, $socios1=false, $socios=false,$ventajas=false); ?>   
		</div><!-- //LATERAL -->
        
		<!-- CONTENIDO -->
 		<div id="contenido">
			<div id="principal">

				<h2>Salida de la zona de compra on line</h2>
      			<p style="margin-top:50px; margin-left:100px">Gracias por visitar nuestro sitio.  Esperamos verle pronto de nuevo.</p>
  
			</div>
         </div>
         
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
