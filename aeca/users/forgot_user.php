<?php 
 require_once("bookmark_fns.php");
 require_once("../display_partes.php");
   include_once("../admin/book_fns.php");
  include_once("../admin/result_array.php");
  include_once("../admin/output_fns.php");

displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = true);
		?>
	<body id="tab2">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);

 displaySolapas( $membersArea = true);
 displayCentral( $membersArea = true, $menu=false, "Recordatorio de usuario");
?>

<!-- CONTENT -->

<div id="content">

<div id="global_lateralycontenido"> <!-- igualar columnas -->

		<!-- LATERAL -->
    <div id="lateral">
             <?php require_once ("../clientes_log.php"); ?>   
        </div><!-- //LATERAL -->

	<!-- CONTENIDO -->
 <div id="contenido">
  <div id="principal" class="letreros">

 	<?php 
if (isset($_POST['emailAddress'])&& $emailAddress=$_POST['emailAddress']){
    if (notify_user($emailAddress)){
      echo "<p>Tu usuario ha sido enviado a tu direcci&oacute;n email.</p>";
			    do_html_url("login_user.php", "Login");
	}else{
      echo "<p>Tu usuario no ha podido ser enviado por email.</p>";	
	}
}
else{
	 echo "<p>No has rellenado el formulario</p>";
	 display_enlacesimple("forgot_form_user.php", "Ir al formulario");
	
}
 ?></div>
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
