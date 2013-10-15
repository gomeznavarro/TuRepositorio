<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/LogEntry.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/output_fns.php");
require_once("../admin/user_auth_fns.php");

session_start();
if (check_admin_user()){
	checkLogin_admin();
}
else checkLogin();

displayPageHeaders( "Socios AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);
?>
<body id="tab2">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "&Aacute;rea de Socios");
?>
    <!-- CONTENT -->
    
    <div id="content">
     <?php 
	 if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
	 else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>

		<div id="global_lateralycontenido"> <!-- igualar columnas -->
        <?php 
		display_menu_gral_socios();
		display_menu_gral_admin(); 
		?>
 
  			<!-- LATERAL -->
                 <div id="lateral">
                   	<div id="cat">
            
                         <?php  
						 
						 require_once("../members/menu_cat_area_socios.php"); ?>
                 	</div>
                </div><!-- //LATERAL -->
                
                <!-- CONTENIDO -->
                <div id="contenido">
                
                	<div id="global_2colysecundario"> <!-- igualar columnas centrales -->
            
            			<div id="principal_2col" style="padding-left:20px; border-left:1px solid #666; width:480px;">	
                        
                   			<h2>Aniversario de la Asociación </h2>
    
                                <p class="articulo"><img src="../images/logotipo.jpg" alt="barrio" width="150px"/>Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam auctor laoreet egestas. Nam vitae lorem dui. Quisque turpis. Praesent condimentum justo sit amet libero. Praesent rhoncus. Suspendisse potenti. Vivamus mollis magna a nulla. Donec elementum consectetur ligula. Sed nulla. Nunc pulvinar luctus ante. Nullam aliquam facilisis odio. Nam hendrerit justo non risus. Proin sed velit vitae leo dapibus fermentum. Nunc nec est eget ante volutpat faucibus. Cras bibendum. In vitae purus.</p> 
                                <p class="articulo interior">Aenean fringilla tortor nec nunc. Vivamus a metus a nulla sagittis hendrerit. Phasellus libero sapien, posuere vehicula, viverra ut, ultrices eget, augue. Sed felis. Fusce fermentum tincidunt turpis. Fusce facilisis, nisi at varius pretium, dolor lectus gravida mi, sit amet luctus enim erat sit amet enim. Integer convallis. Ut porta lectus. Aenean porta justo in est. Suspendisse a eros et enim porta pulvinar. Suspendisse potenti.</p>  
                                <p class="articulo interior"> Nam auctor laoreet egestas. Nam vitae lorem dui. Quisque turpis. Praesent condimentum justo sit amet libero. Praesent rhoncus. Suspendisse potenti. Vivamus mollis magna a nulla. Donec elementum consectetur ligula. Sed nulla. Nunc pulvinar luctus ante. Nullam aliquam facilisis odio. Nam hendrerit justo non risus. Proin sed velit vitae leo dapibus fermentum.</p>
                    	</div>
         
                        <!-- NOTICIAS -->    
                        <div id="secundario">   
                        <script id="NP_orgnwall" type="text/javascript" src="https://secure.neopromociones.com/widgets/js/NP_newsall.js" np_estilo="2" np_numnews="1"></script>        
                        </div><!-- //NOTICIAS -->
                                    <div class="clear"></div><!-- /NO TOCAR -->
                  </div><!-- //igualar columnas centrales -->
               </div>
               <!-- //CONTENIDO -->

			<div class="clear"></div>
         
		</div><!-- //igualar columnas -->
			
		<!-- MENU_INFERIOR -->			

		<?php displayMenuInf( $membersArea = true); ?>

	</div><!-- //CONTENT -->        
        
<!-- PIE -->  
<?php displayFooter( $membersArea = true); ?>


    






