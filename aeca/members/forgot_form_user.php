


<?php

// include function files for this application
require_once("bookmark_fns.php");
require_once("../display_partes.php");
  include_once("../admin/output_fns.php");
  include_once("../admin/book_fns.php");
  include_once("../admin/result_array.php");




displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = true);
displaygalleryppal( $membersArea = true);

		?>
	<body id="tab2">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);

 displaySolapas( $membersArea = true);
 displayCentral( $membersArea = true, $menu=false, "Recordatorio usuario socios");

?>

<!-- CONTENT -->

<div id="content">

<div id="global_lateralycontenido"> <!-- igualar columnas -->

	<!-- LATERAL -->
    <div id="lateral">
             <?php require_once ("../socios_log.php"); ?>   
               </div><!-- //LATERAL -->
	<!-- CONTENIDO -->
 <div id="contenido">
        <div id="registro" style="float:left; margin-left: 150px; margin-bottom: 30px;">

 	<?php 


 display_forgot_form_user(); // en output_fns.php

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
