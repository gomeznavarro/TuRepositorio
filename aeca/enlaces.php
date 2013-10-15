<?php

require_once("display_partes.php");
require_once("admin/db_fns.php"); 
require_once("admin/output_fns.php");
require_once("admin/book_fns.php");

displayPageHeaders( "Enlaces Inter&eacute;s AECA", $membersArea = false, $noticias = false, $gallery=false);
displaygalleryppal( $membersArea = false, $noticias = false, $gallery=false);

?>
<body id="tab3">
<?php 
displayPageHeadings($membersArea = false, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = false);
displayCentral($membersArea = false, $menu=false, "Enlaces de inter&eacute;s", $banner=false, $foto=true, $gallery=false, $socios_menu=false, $clientes_menu=true);
?>

    <!-- CONTENT -->
    
    <div id="content">
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        
            <!-- LATERAL -->
            
             <div id="lateral">
                <div id="cat">
                    <?php require ("menu_cat_clientes.inc.php"); ?>
                </div>
            </div><!-- //LATERAL -->
            
            <!-- CONTENIDO -->
            <div id="contenido">
    		
                <!-- ARTICULOS -->
                <div id="principal">
        
                    <h2>Enlaces de inter&eacute;s</h2>
        
                    <ul class="interes">
        
                       <li><a href="http://www.madrid.org">Comunidad de Madrid</a></li>
        
                       <li><a href="http://www.madrid.es">Ayuntamiento</a></li>
                       
                       <li><a href="http://www.facua.org/">Asociaci&oacute;n de Consumidores</a></li>
        
                       <li><a href="http://www.turismomadrid.es/">Oficina de Turismo</a></li>
        
                       <li><a href="http://www.renfe.com/">Renfe</a></li>
                       
                    </ul>
                
                </div>                
                
              	<?php                 
				require_once ("cierre_fotos.inc.php"); 
				?> 
      
            </div>
            <!-- //CONTENIDO -->
        
                    <div class="clear"></div>
             
		</div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
        <?php 
        displayMenuInf( $membersArea = false); 
        ?>
        
	</div><!-- //CONTENT -->
        
<!-- PIE -->  
<?php 
displayFooter( $membersArea = false); 
?>










