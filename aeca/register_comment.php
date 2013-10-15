

<?php
require_once( "common.inc.php" );
require_once("display_partes.php");
include_once("admin/db_fns.php"); 
include_once("admin/output_fns.php");
include_once("admin/book_fns.php");
include_once("registro_comments_fns.php");

displayPageHeaders( "Contacto AECA", $membersArea = false, $gallery=false);
displaygalleryppal($membersArea = false, $gallery=false);

?>
<body id="tab7">
<?php
displayPageHeadings($membersArea = false, $noticias = false, $gallery=false);
displaySolapas( $membersArea = false);
displayCentral( $membersArea = false, $menu=false, "Contacto", $foto=false, $gallery=false);
?>

    <!-- CONTENT -->
    <div id="content">
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
    
        	<!-- CONTENIDO -->
            <div id="contenide" >
            
            	<div id="global_2colysecundario" style="float:left; width:900px; margin-bottom:0"> <!-- igualar columnas centrales -->
                        
                	<div id="principal_2col" class="comentario" style="float:left; margin-left:60px; width:500px">
					<?php		
                    if ( isset( $_POST["action"] ) and $_POST["action"] == "register" ) {
                      processForm();
                    } 
                    else {
                      displayForm( array(), array(), new Commentss( array() ) );
                    }
                    ?>
     				</div>
                            
                    <div id="secundario" style="float:right;width:240px" class="comentario">
                    	<div>
                                <h4>AECA</h4>
                                <p>Calle Las Delicias, 1</p>
                                <p>28045 Madrid </p>
                                <p>91 467 60 75</p>
                                <p>asoc@atocha.es</p>
                        </div>
                        <div style="margin-right:0px; padding-right:0">
                                <iframe width="250" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Calle+Las+Delicias,+1,+Madrid&amp;aq=&amp;sll=40.406569,-3.695698&amp;sspn=0.036142,0.084543&amp;ie=UTF8&amp;hq=&amp;hnear=Calle+de+Las+Delicias,+1,+28045+Madrid,+Comunidad+de+Madrid&amp;t=m&amp;z=14&amp;ll=40.404227,-3.695656&amp;output=embed"></iframe>
                                    <p><a href="https://maps.google.es/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=Calle+Las+Delicias,+1,+Madrid&amp;aq=&amp;sll=40.406569,-3.695698&amp;sspn=0.036142,0.084543&amp;ie=UTF8&amp;hq=&amp;hnear=Calle+de+Las+Delicias,+1,+28045+Madrid,+Comunidad+de+Madrid&amp;t=m&amp;z=14&amp;ll=40.404227,-3.695656">Ver mapa m&aacute;s grande</a></p>
                        </div>
                  	</div>
            	</div><!-- //igualar columnas centrales -->
                
			</div><!-- //CONTENIDO -->
                
                            <div class="clear"></div>
                         
		</div><!-- //igualar columnas -->
        <!-- MENU_INFERIOR -->			
        <?php 
		displayMenuInf( $membersArea = false); 
		?>
    
    </div><!-- //CONTENT -->        
        
<!-- PIE -->  
<?php displayFooter( $membersArea = false); ?>
