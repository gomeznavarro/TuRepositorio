<?php
require_once("display_partes.php");
include_once("admin/db_fns.php"); 
include_once("admin/output_fns.php");
include_once("admin/book_fns.php");
require_once("admin/user_auth_fns.php");
require_once( "common.inc.php" );

session_start();

displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = false, $noticias = false, $gallery=false);
displaygalleryppal( $membersArea = false, $noticias = false, $gallery=false);

?>
<body id="tab2">
<?php 
displayPageHeadings($membersArea = false, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = false);
displayCentral($membersArea = false, $menu=false, "Servicios", $banner=false, $foto=false, $gallery=false, $socios_menu=true, $clientes_menu=false);
?>

    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="members/logout.php">Logout</a></div>';
    else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="users/logout.php">Logout</a></div>';
    else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
    
            <!-- LATERAL -->
            <div id="lateral">
                <div id="cat">
                   	<ul style="width:170px"> 
                        <li class="nivel1 aa"><a href="#" class="nivel1" >Asesoramiento</a></li>
                        <li class="nivel1 bb"><a href="#" class="nivel1">Publicidad conjunta</a></li>                                
                        <li class="nivel1 cc"><a href="#" class="nivel1">Ahorro de costes</a></li>
                	</ul>			
                </div>
            </div><!-- //LATERAL -->
    
            <!-- CONTENIDO -->
            <div id="contenido">
            
            <script type="text/javascript">
			$(document).ready(function(){
			  $(".btn1").click(function(){
			  $("p").animate({height:"100%"});
			  });
			  $(".btn2").click(function(){
			  $("p").animate({height:"100px"});
			  });
			});
            $(document).ready(function(){
                
                $('.aa').click(function(){
                    $('.a').hide();
                    $('.b').show();
                    $('.c').hide();
                    $('.d').hide();
                });
                $('.bb').click(function(){
                    $('.c').show();
                    $('.a').hide();
                    $('.b').hide();
                    $('.d').hide();
                });
                $('.cc').click(function(){
                    $('.d').show();
                    $('.a').hide();
                    $('.b').hide();
                    $('.c').hide();
                })
            });
            </script>
            
        	<!-- ARTICULOS -->
             <div id="principal_1col" > 
            <div class="a">
    
                <h2>Servicios</h2>
    
                <p class="articulo">Ofrecemos una gran variedad de servicios y gratselis felis, varius commodo dictum nec, molestie sit amet lectus. Morbi eget magna urna, sed dignissim purus. Donec sit amet tellus tellus, nec tempor nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam.</p> 
           </div>
           
          
           
               <div class="b ">
        
                    <h3>Asesoramiento</h3>
        
                    <p class="articulo">Nuestros asesores estar&aacute;n a su disposici&oacute; dictum nec, molestie sit amet lectus. Morbi eget magna urna, sed dignissim purus. Donec sit amet tellus tellus, nec tempor nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam.</p>
                    <ul class="listado">
                        <li>Jur&iacute;dico, Laboral, Fiscal y Contable</li>
                        <li>Creaci&oacute;n de empresas,contratos,n&oacute;minas y Seguridad Social</li>
                        <li>Impuestos</li>
                        <li>Contabilidad mercantil</li>
                        <li>Recursos y reclamaciones administrativas</li>
                        <li>Tramitaci&oacute;n de subvenciones a la creaci&oacute;n de empresas, inversi&oacute;n, autoempleo y contrataci&oacute;n laboral</li>
                        <li>Entrega de documentaci&oacute;n en la sede de la empresa</li>
                    </ul>
                </div>
                
                <div class="c ">
        
                    <h3>Publicidad conjunta</h3>
        
                    <p class="articulo">La publicidad es importante. Somos comercios peque&ntilde;os, pero juntos tenemos la posibilidad de dictum nec, molestie sit amet lectus. Morbi eget magna urna, sed dignissim purus. Donec sit amet tellus tellus, nec tempor nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum.</p> 
                     <ul class="listado">
                        <li>Dinamizaci&oacute;n comercial</li>
                        <li>Campa&ntilde;as de publicidad en prensa, radio, televisi&oacute;n, mobiliario urbano,etc</li>
                        <li>Gu&iacute;as comerciales</li>
                        <li>Ferias monogr&aacute;ficas: Feria de  Stocks del comercio de Gij&oacute;n</li>
                        <li>Promoci&oacute;n de la calidad en la atenci&oacute;n al cliente mediante la norma UNE175001</li>
                        <li>Concurso Navide&ntilde;o de Escaparates</li>
                        <li>Premios a la Innovaci&oacute;n en el comercio</li>
                        <li>Iluminaci&oacute;n festiva de calles</li>
                        <li>Programas de fidelizaci&oacute;n de clientes: Tarjeta de puntos/decuentos "Gij&oacute;n todo un Regalo" www.gijontodounregalo.es y tienda virtual de tarjetas regalo</li>            
                        <li>Sorteos y regalos</li>
                    </ul>
                </div>
                
                <div class="d ">
        
                    <h3>Ahorro de costes</h3>
        
                    <p class="articulo">Una empresa conlleva una gran cantidad de costes adicionales. Nuesta asociaci&oacute;n le ayudar&aacute; a varius commodo dictum nec, molestie sit amet lectus. Morbi eget magna urna, sed dignissim purus. Donec sit amet tellus tellus, nec tempor nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam.</p> 
                    
                </div>	
            
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
		displayMenuInf( $membersArea = true);
		?>

	</div><!-- //CONTENT -->
        
<!-- PIE -->  
<?php
displayFooter( $membersArea = true);
?>







