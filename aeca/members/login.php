<?php
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/LogEntry.class.php" );
require_once ('../admin/book_sc_fns.php');
require_once("../admin/output_fns.php");
require_once("../admin/admin_fns.php");
require_once("../admin/result_array.php");
require_once( "login_fns.php" ); //funciones display y proccess form
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Acceso Socios AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);

?>
<body id="tab2">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Acceso socios", $banner=false, $foto=true, $gallery=false);
?>

    <!-- CONTENT -->
    <div id="content">
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
    
            <!-- CONTENIDO -->
            <div id="contenido">
                <div id="registro" style="float:left; margin-left: 150px; margin-bottom: 30px;">
            	<?php
            
            	if ( isset($_SESSION["member"]) && $_SESSION["member"]!=''){
					
                	echo "<p>".$_SESSION["member"]->getValue( "username" )."! Ya est&aacute;s logged in! </p>";
                	?>     
                	<p>Puedes acceder al <a class="avance" href="index.php">&aacute;rea de socios</a> o hacer <a class="avance"  href="logout.php">logout</a> </p>           		<?
            	}	
            	else{	
        
					if ( isset( $_POST["action"] ) and $_POST["action"] == "login" ) {
					  processForm();
					} 
					else {
					  displayForm( array(), array(), new Member( array() ) );
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
		displayMenuInf( $membersArea = true)
		?>
    
    </div><!-- //CONTENT -->
        
<!-- PIE -->  
<?php 
displayFooter( $membersArea = true)
?>


    





