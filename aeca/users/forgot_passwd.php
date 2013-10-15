<?php 
require_once("bookmark_fns.php");
require_once("../display_partes.php");
require_once("../admin/book_fns.php");
require_once("../admin/result_array.php");
require_once("../admin/output_fns.php");

displayPageHeaders( "Cambio contrase&ntilde;a Clientes AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);

?>
	<body id="tab2">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);

 displaySolapas( $membersArea = true);
 displayCentral( $membersArea = true, $menu=false, "Cambio de contrase&ntilde;a clientes");
?>

<!-- CONTENT -->

<div id="content">
<?php if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div style="margin-top:5px; margin-bottom:5px; text-align:right">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a style="color:#000" href="../users/logout.php">Logout</a></div>'?>

<div id="global_lateralycontenido"> <!-- igualar columnas -->

<!-- LATERAL -->
    <div id="lateral">
		 <?php		
	 require_once ("../clientes_log.php");
         ?>   
        </div><!-- //LATERAL -->

	<!-- CONTENIDO -->
 <div id="contenido">
  <div id="principal" class="letreros">

 	<?php 
	if (isset($_POST['username'])&& $username=$_POST['username']){

 if ($password=reset_password($username))
 {
    if (notify_password($username, $password))
      echo "<p>Tu nueva contrase&ntilde;a ha sido enviada a tu direcci&oacute;n email.</p>";
    else
      echo "<p>Tu contrase&ntilde;a no ha podido ser enviada por email.</p>";
         
 }
 else
   echo "Tu contrase&ntilde;a no ha podido modificarse. ";

}
else{
	 echo "<p>No has rellenado el formulario</p>";
	 display_enlacesimple("forgot_form_user.php", "Ir al formulario");

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
