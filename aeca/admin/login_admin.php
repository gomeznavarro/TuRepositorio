<?php
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Admin.class.php" );
require_once ('book_sc_fns.php');
require_once("output_fns.php");
require_once("admin_fns.php");
require_once( "login_admin_fns.php" ); //funciones display y proccess form
require_once("../display_partes.php");

session_start();
?>
<?php
displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = true);
		?>
	<body >
    <?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);

 displaySolapas( $membersArea = true);
 displayCentral( $membersArea = true, $menu=false, "Acceso administraci&oacute;n", $foto=false);
?>

<!-- CONTENT -->

<div id="content">

<div id="global_lateralycontenido"> <!-- igualar columnas -->

	<!-- LATERAL -->
    
	<?php
//displayLateral( $membersArea = true);?>
	<!-- CONTENIDO -->
 <div id="contenido">
         	<div id="registro" style="float:left; margin-left: 150px; ">

 	<?php
	
	if ( isset($_SESSION["admin_user"]) && $_SESSION["admin_user"]!=''){
		echo "<p><span style=\"font-weight:bold\">".$_SESSION["admin_user"]->getValue( "username" )."</span>! Ya est&aacute;s logged in! </p>";
	?>
     
 <p>Puedes acceder al <a class="avance" href="index.php"> &aacute;rea de administraci&oacute;n</a> o hacer <a class="avance" href="logout.php">logout</a></p>
	
  
  
   <?
	}
	
	else{
	
    
	

if ( isset( $_POST["action"] ) and $_POST["action"] == "login" ) {
  processForm();
} else {
  displayForm( array(), array(), new Admin( array() ) );
}
	}


?>
</div>
 </div>
    <!-- //CONTENIDO -->

			<div class="clear"></div>
         
         </div><!-- //igualar columnas -->
			
	<!-- MENU_INFERIOR -->			

	<?php
displayMenuInf( $membersArea = true)?>


        </div><!-- //CONTENT -->
        
        
     <!-- PIE -->  

<?php
displayFooter( $membersArea = true)?>


    





