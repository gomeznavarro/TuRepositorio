<?php
function displayPageHeaders( $pageTitle, $membersArea = false, $gallery=false, $gallery_portada=false, $gallery_tiendas=false, $gallery_socios=false, $docum=false, $editfoto=false) {
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<title><?php echo $pageTitle?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />						
<meta http-equiv="content-language" content="es" />
<meta name="copyright" content="Design/Code:Silvia Salcedo Macías" />
<meta name="author" content="Silvia Salcedo Macías" />
<meta name="description" content="Asociaci&oacute;n de Empresarios y Comerciantes de Atocha" />
<meta name="keywords" content="asociaci&oacute;n, empresarios, comerciantes, tiendas, restaurantes, hoteles, ocio, servicios, formaci&oacute;n, turismo, atocha" />
<link lang="en" xml:lang="en" title="English version" type="text/html" rel="alternate" hreflang="en" href="#" />

<link rel="shorcut icon" href="<?php if ( $membersArea && !$editfoto ) echo "../"; if($membersArea && $editfoto)echo "../../" ?>favicon.ico" type="image/ico" />

<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>css/proyecto.css" type="text/css" />

<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>css/buscador_tiendas.css" type="text/css" />
<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>css/menu.css" type="text/css" />
<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>css/lateral.css" type="text/css" />
<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>css/form.css" type="text/css" />

<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>css/style.css" type="text/css" /> 

<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>gallery/css/layout.css" type="text/css"  />
<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>gallery/css/jd.gallery.css" type="text/css"  />
  
<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>css/edicion.css" type="text/css" /> 
<?php if($docum){?>   
<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>members/miscelanea.css" type="text/css" media="screen" />
<? } ?>

<?php }
//<!--END displayPageHeaders - todos los archivos-->

	
function displaygallerytiendas($membersArea = false){
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php if ( $membersArea ) echo "../" ?>gallery/otroslide/photoslider.css" />  
<? }
//<!-- END displaygallerytiendas - galeria tienda-->


function displaygallerysocios($membersArea = false){
?>
<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>gallery/phpgallery/css/screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php if ( $membersArea ) echo "../" ?>gallery/phpgallery/css/lightbox.css" type="text/css" media="screen" />
<?php }
//<!-- END displaygallerysocios - galeria socios-->


function displayfotoppal($membersArea = false){ 

 ?>
 <link href="<?php if ( $membersArea ) echo "../" ?>gallery/tiendas_slide/main.css" type="text/css" rel="stylesheet" media="all" />
 <link href="<?php if ( $membersArea ) echo "../" ?>gallery/tiendas_slide/flexslider.css" type="text/css" rel="stylesheet" media="all" />
<!--//galeria pagina ppal-->
<? }
//<!-- END displayfotoppal - galeria pagina ppal -->


function displayedicionfotos($membersArea = false){ 
 ?>
 	<!-- incluyo el framework css , blueprint. -->
   	<link rel="stylesheet" type="text/css" href="resources/screen.css" charset="utf-8" />
    <!-- incluyo mis estilos css -->
  	<link rel="stylesheet" type="text/css" href="resources/styles.css" charset="utf-8"/>
   	<!-- incluyo la libreria jQuery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js" charset="utf-8"></script>
    <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>

    <!-- incluyo el archivo que tiene mis funciones javascript -->
    <script type="text/javascript" src="resources/functions.js" charset="utf-8"></script>
    
<? }

//<!-- END displayedicionfotos - galeria gral y socios -->

function displayscriptsdiccion(){ ?>   
<script src="jquery.js" type="text/javascript"></script>
<script src="miscelanea.js" type="text/javascript"></script>
<? }
//<!-- END displayedicionfotos - miscalanea-->

// <!--GALLERY MOOTOOLS -->
function displaygallery(){ ?>

		<script src="scripts/mootools_1.2.1_core_yc.js" type="text/javascript"></script>
        <script src="scripts/mootools_1.2_more.js" type="text/javascript"></script>
        <script src="scripts/jd.gallery.js" type="text/javascript"></script>
        <script src="scripts/jd.gallery.transitions.js" type="text/javascript"></script>
        <script src="scripts/funciones.js" type="text/javascript"></script>       
<?php } 
//<!-- END MOTOOLS displaygallery - galeria gral -->
function displayscriptsnoticias(){ ?>
	<script type="text/javascript" language="javascript" src="../jquery-1.7.1.min.js"></script>  

<script type="text/javascript" language="javascript" src="../noticias/login_noticias.js"></script>
<script type="text/javascript" language="javascript" src="../noticias/comentarios_noticias.js"></script>
	
<? }
function displaygalleryppal($membersArea = false, $gallery=false, $gallery_portada=false, $gallery_tiendas=false, $gallery_socios=false, $docum=false){ ?>       
<script type="text/javascript" src="<?php if ( $membersArea ) echo "../" ?>busqueda_head.js" charset="utf-8"></script>
<script type="text/javascript" src="contacto.js" charset="utf-8"></script> 
 
<!--FUNCION BORRADO DEL ADMINISTRADOR - formulario name "borrado"-->
<script type="text/javascript" language="JavaScript"> 
function pregunta(){ 
    if (confirm('¿Estás seguro de querer borrarlo?')){ 
       document.borrado.submit() 
    } 
} 
</script>      
<!-- Funciones para las galerias -->
<?php if(!$gallery && !$docum){?>
    <script type="text/javascript" language="javascript" src="<?php if ( $membersArea ) echo "../" ?>jquery-1.7.1.min.js"></script>  
    
    	<?php if($gallery_portada){?>    
 		<script type="text/javascript" language="javascript" src="<?php if ( $membersArea ) echo "../" ?>gallery/tiendas_slide/jquery.flexslider-min.js"></script>
        <script type="text/javascript" language="javascript" src="<?php if ( $membersArea ) echo "../" ?>gallery/tiendas_slide/actions.js"></script>
		
    	<?php }
		if($gallery_tiendas){?>    
        <script type="text/javascript" language="javascript" src="<?php if ( $membersArea ) echo "../" ?>gallery/otroslide/photoslider.js"></script>  
		<?php }	 
        if ( $gallery_socios){?>
		<script type="text/javascript" language="javascript" src="<?php if ( $membersArea ) echo "../" ?>gallery/phpgallery/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script type="text/javascript" language="javascript" src="<?php if ( $membersArea ) echo "../" ?>gallery/phpgallery/js/jquery.smooth-scroll.min.js"></script>
        <script type="text/javascript" language="javascript" src="<?php if ( $membersArea ) echo "../" ?>gallery/phpgallery/js/lightbox.js"></script>
        <?php }?>
        
<!-- Funciones para registro y comentarios -->

 		<?php
		$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
					if(preg_match ('/aeca\/register.php/', $url)){ 	?>		 
  							<script type="text/javascript" language="javascript" src="validate.js" charset="utf-8"></script>
                                     	
        					<?php }

					if(preg_match ('/aeca\/register_user.php/', $url)){ ?>
							<script type="text/javascript" language="javascript" src="validate_users.js" charset="utf-8"></script>
  							<?php }
							
					if(preg_match ('/aeca\/register_comment.php/', $url)){ ?>
							<script type="text/javascript" language="javascript" src="validate_comments.js" charset="utf-8"></script>
  							<?php }	
							?>
                            
 		<!-- posibilidad cierre foto -->                           
		<script type="text/javascript" language="javascript" src="<?php if ( $membersArea ) echo "../" ?>mostrar_jquery.js" charset="iso-8859-1"></script>
		<script type="text/javascript" language="javascript">
       
        </script>
		<!--login con jquery/ajax en noticias -->   
		<script type="text/javascript" src="../noticias/login_members.js" charset="utf-8"></script>
		<script type="text/javascript" src="../noticias/login_users.js" charset="utf-8"></script>

<?php }?>
</head>

<? } //end function displaygalleryppal -todos los archivos


function displayPageHeadings($membersArea = false, $noticias = false, $gallery=false, $foto=false) {?>

<div id="contenedor">

<!-- CABECERA -->

<div id="cabecera">
   
    <div id="cabecera_izda">
    
        <div id="menu_cabecera">

 			<ul class="menu_horizontal">

                <li><a href="<?php if ( $membersArea ) echo "../" ?>members/index.php">&Aacute;rea de socios</a></li>            
                <li><a class="ultimo" href="<?php if ( $membersArea ) echo "../" ?>mapa_sitio.php">Mapa del sitio</a></li>              

     		</ul>                            

        	 	<div class="clear"></div>  
		</div>
		
 
  		<div id="tren">  
      
            <div id="aeca">
            <a href="<?php if ( $membersArea ) echo "../" ?>index.php" title="Asociaci&oacute;n de Empresarios y Comerciantes de Atocha" style="font-size:40px; margin-left:0px; color:#000;  text-decoration:none"><img src="<?php if ( $membersArea ) echo "../" ?>images/model3_negro.jpg" alt="AECA" name="AECA" width="150"/></a>
			</div>        
        
            <div id="aeca2">
                <p style="font-size:.7em; float:right; text-align:right ">Nos encontrar&aacute;s en:</p>
                <div class="clear"></div> <!-- NO TOCAR necesario en Firefox-->       
                <p style="font-size:.7em; float:right ">C/ Delicias, 1 - 28045 Madrid</p>
                <div class="clear"></div> <!-- NO TOCAR necesario en Firefox-->
                <p style="font-size:.7em; float:right">asoc@atocha.es - 914676075 </p>
            
            </div>
			<div class="clear"></div> <!-- NO TOCAR necesario en Firefox-->
		</div>
       		 				
		<div class="clear"></div>

		<div id="buscador">
			<?php
            $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
                        
            if(preg_match ('/aeca\/register_sin.php/', $url)){ ?>
            
            <form id="busqueda" name="busqueda"  action="http://www.google.com/search" method="get">
             <fieldset>            
                            <legend> B&uacute;squeda</legend>                
                            <label class="no_visible" for="buscar">Buscador</label>
                            <label class="no_visible" for="busqueda">Buscador</label>
                        <input id="buscar" class="buscar" maxlength="2000" name="q"  value="Escribe aqu&iacute; tu b&uacute;squeda..."/>
                        
                                    <div class="clear"></div> <!-- NO TOCAR necesario en Firefox-->
                    
                            <div class="botones">        
                                
                         
                                <input class="boton_buscar" type="submit" value="Buscar"/>
                         
                                    <div class="clear"></div> 
                                    
                            </div>            
                   
                        </fieldset>
                    </form>
            
            
            <? }
            else{		 
                    if ( !$membersArea ) echo '<form id="busqueda" name="busqueda"  onsubmit="return OnSubmitForm();" action="">'; 			
                    else echo '<form id="busqueda" name="busqueda"  onsubmit="return OnSubmitForm2();" action="">';
                    ?>
                        
                        <fieldset>            
                            <legend> B&uacute;squeda</legend>                
                            <label class="no_visible" for="busqueda">Buscador</label>
                            <input id="buscar" class="buscar" maxlength="2000" name="q" onfocus="if (this.value=='Escribe aqu&iacute; tu b&uacute;squeda...') this.value='';" value="Escribe aqu&iacute; tu b&uacute;squeda..."/>
                        
                                    <div class="clear"></div> <!-- NO TOCAR necesario en Firefox-->
                    
                            <div class="botones">
                       
                                <label class="no_visible" for="busca_google">Busca en Google</label>
                                <input  id="busca_google" tabindex="1" title="Busca en Google" type="radio" name="sitesearch" value=""/> 
                     
                                <img  src="<?php if ( $membersArea ) echo "../" ?>images/goonegro.jpg" alt="Google" name="Google" width="40"/>
                        
                                <label class="no_visible" for="busca_sitio">Busca en AECA</label>  
                                <input id="busca_sitio"  tabindex="2" title="Busca en AECA" type="radio" name="sitesearch" checked="checked" value="1"/> 
                                <img  src="<?php if ( $membersArea ) echo "../" ?>images/model3_negro.jpg" alt="AECA" name="AECA" width="30"/>
                         
                                <input class="boton_buscar" type="submit" value="Buscar"/>
                         
                                    <div class="clear"></div> 
                                    
                            </div>            
                   
                        </fieldset>
                    </form>
             <? }?>    
                    
         </div>	 <!--//BUSCADOR-->  
    	
	</div> <!--//cabecera izda-->
    
    <div id="cabecera_dcha"> 
     
       <a href="<?php if ( $membersArea ) echo "../" ?>index.php" title="Asociaci&oacute;n de Empresarios y Comerciantes de Atocha"><img src="<?php if ( $membersArea ) echo "../" ?>images/logo2.jpg" alt="logo" name="Logo_Asociaci&oacute;n" height="85"/></a>
       
    </div>
    	
</div>  <!-- //CABECERA -->
<?php
} //<!-- END displayPageHeadings - cabecera todos archivos-->


function displaySolapas( $membersArea = false) {?>

<!-- MENU_SOLAPAS -->

<div id="menu_solapas">

 	<noscript>
        <p style="color:#f7f7f7; background:#000;  font-weight:bold">Bienvenido al portal de AECA.</p>
        <p style="color:#f7f7f7;  background:#000; margin-bottom:10px">La p&aacute;gina que est&aacute;s viendo requiere para su mejor funcionamiento el uso de JavaScript. Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo para disfrutar de todas las funcionalidades.</p>
        <?php 
		$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		if(preg_match ('/aeca\/register.php/', $url)){ ?><p style="color:#f7f7f7;  background:#000; margin-bottom:10px">Si no puedes habilitar JavaScript, <a href="register_sin.php" style="color:#f7f7f7; background:#000;  font-weight:bold">reg&iacute;strate</a> aquí</p> <? }?>
	</noscript>

 	<div class="izdo"> 
     
    	<ul class="menu_banderas">             
				
               	<li><a class="banderas" title="Espa&ntilde;ol" href="<?php if ( $membersArea ) echo "../" ?>index.php"><img src="<?php if ( $membersArea ) echo "../" ?>images/bandera_espana.jpg" alt="Espa&ntilde;ol" width="25" height="15"/></a></li>

            	<li><a class="banderas" title="English" href="<?php if ( $membersArea ) echo "../" ?>index_en.php" hreflang="en"><img src="<?php if ( $membersArea ) echo "../" ?>images/bandera_britanica.jpg" alt="English" width="25" height="15"/></a></li>

            	<li><span>S&iacute;guenos en: </span></li>
                <li><a class="banderas sociales" title="S&iacute;guenos en Twitter" href="https://twitter.com/asoc_atocha"><img src="<?php if ( $membersArea ) echo "../" ?>images/twitter.jpg"  height="15" alt="S&iacute;guenos en Twitter"/></a></li>

				<li><a class="banderas sociales" title="S&iacute;guenos en Facebook" href="http://www.facebook.com/pages/Asociaci%C3%B3n-Empresarios-y-Comerciantes-de-Atocha/408269435899290"><img src="<?php if ( $membersArea ) echo "../" ?>images/facebook.jpg" height="15" alt="S&iacute;guenos en Facebook"/></a></li>
                <li>
                <script type="text/javascript" language="javascript">
//<![CDATA[
var f=new Date();
var meses = new Array ("ene","feb","mar","abr","may","jun","jul","ago","sep","oct","nov","dic");
document.write('<div class="mifecha">');
document.write('<div class="ano">' + f.getFullYear() + '</div>');
document.write('<div class="mes">' + meses[f.getMonth()] + '</div>');
document.write('<div class="dia">' + f.getDate() + '</div>');

document.write('</div>');
//]]>
</script>
</li>
                
     	</ul>
              
	</div>                
 	
    <div class="dcho"> 

 		<ul class="solapas">                
                
                <li class="tab1"><a href="<?php if ( $membersArea ) echo "../" ?>index.php" title="Inicio">Inicio</a></li>
                <li class="tab2"><a href="<?php if ( $membersArea ) echo "../" ?>socios.php" title="Socios">Socios</a></li>
                <li class="tab3"><a href="<?php if ( $membersArea ) echo "../" ?>clientes.php" title="Clientes">Clientes</a></li>
                <li class="tab4"><a href="<?php if ( $membersArea ) echo "../" ?>tienda/index.php" title="Nuestros asociados">Nuestros asociados</a></li>
                <li class="tab5"><a href="<?php if ( $membersArea ) echo "../" ?>noticias/index.php" title="Noticias">Noticias</a></li>
                <li class="tab6"><a href="<?php if ( $membersArea ) echo "../" ?>gallery/gallery.php" title="Galer&iacute;a">Galer&iacute;a</a></li>
                <li class="tab7"><a href="<?php if ( $membersArea ) echo "../" ?>register_comment.php" title="Contacto">Contacto</a></li>              
                
         </ul>
 
 	</div>  
  
</div><!-- //MENU_SOLAPAS -->
           
          		 <div class="clear"></div>
<?php
} //<!-- END displaySolapas - cabecera todos archivos-->


function displayCentral( $membersArea = false, $menu=false, $heading='', $banner=false, $foto=false, $gallery=false, $socios_menu=false, $clientes_menu=false) {
?>
                
<!-- MENU_CENTRAL -->
                                    
<div id="menu_central">
                
	<div id="imagen"><?php 
		
		if ( $banner ) {?>          
        
        	<div id="contentA" style="float:left; width:100%">

				<div class="carrusel flexslider">
                        <ul class="slides">
                            <li><img src="<?php if ( $membersArea ) echo "../" ?>images/montaje.jpg" alt="Collage I" width="960" /><a href="<?php if ( $membersArea ) echo "../" ?>index.php">Bienvenidos a AECA</a></li>
                            <li><img src="<?php if ( $membersArea ) echo "../" ?>images/montaje2.jpg" alt="Collage II" width="960" /><a href="<?php if ( $membersArea ) echo "../" ?>tienda/show_shop.php?shopid=21">Espacios para el arte...<span style="color:#9FF;  display:inline; top:200px; right:50px;text-decoration:underline;width:300px">Galer&iacute;a Trazos</span></a></li>
                            <li><img src="<?php if ( $membersArea ) echo "../" ?>images/montaje3.jpg" alt="Collage III"  width="960"  /><a href="tienda/index.php">Visita nuestras tiendas</a></li>
                            <li><img src="<?php if ( $membersArea ) echo "../" ?>images/montaje4.jpg" alt="Collage IV" width="960" /><a href="<?php if ( $membersArea ) echo "../" ?>register.php">Hazte socio</a></li>
                         </ul>
                         <ul class="steps ">
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                         </ul>
             	</div>
            </div> 
        
        	<?php } //if $banner 
        	
			if ( $foto ) {?> 
        
        <a id="foto_ppal"  title="Zona de Atocha" href="#"><img src="<?php if ( $membersArea ) echo "../" ?>images/montaje.jpg" alt="Im&aacute;genes de Atocha" name="Zona_Atocha" width="960" /></a><?php 
			} ?>
 		        <div class="clear"></div><?php 
				
			if(!$banner){?>
            
			<div style="width:900px; background:#0CC"> <?php do_html_heading1($heading);	?> 
			</div>    <? } 
			
			//BUSCADOR TIENDAS (solo para "Nuestros Asociados"-->        
		
			$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
			
			if(preg_match ('/aeca\/tienda\/index.php/', $url)){ 			 
			require_once("buscador.php"); ?>
			<a id="enlaceocultarbusca" href="#" style="text-decoration:none; color:#d2d2d2; font-size:12px; float:right; margin-right:5px">Ocultar buscador</a>
            <a id="enlacemostrarbusca" href="#" style="text-decoration:none; color:#d2d2d2; font-size:12px; float:right;  margin-right:5px">Mostrar buscador</a>
			<? }
			// end BUSCADOR TIENDAS
			
 			if (!$gallery && $foto){ ?> 
            	<a id="enlaceocultar" href="#" style="text-decoration:none; color:#d2d2d2; font-size:12px; float:right;  margin-right:5px">Ocultar foto</a>
            	<a id="enlacemostrar" href="#" style="text-decoration:none; color:#d2d2d2; font-size:12px; float:right; margin-right:5px">Mostrar foto</a>
            <? }?>               
                        <div class="clear"></div>
                       
	</div> <!-- //IMAGEN -->


	<!-- MENU -->

    <div id="menu"  
	<?php if( $membersArea && $menu  ) echo 'style="height:105px;"'; 
		else if($membersArea && !$menu) echo 'style="display:none"'; 
		else if(!$membersArea && !$menu && !$socios_menu && !$clientes_menu) echo 'style="display:none"';?>
        >
                	<?php if ( $menu && !$socios_menu && !$clientes_menu){ 				
									require_once("menu.inc.php");
				 					}  
               
                	 if (  !$menu && $socios_menu ){ 				 
				 					require_once("menu_socios.inc.php");				 
				 					} 
                 
                  	if (  !$menu && $clientes_menu ){ 				 
				 					require_once("menu_clientes.inc.php");				 
					 				} 
					 ?> 
                                
                 
 	</div> <!-- //MENU -->
              
</div> <!-- //MENU CENTRAL -->
  
<?php } //<!-- END displayCentral - cabecera todos archivos-->

function displayLateral( $membersArea = false,$clientes1=true,$socios1=true, $socios=true, $ventajas=true) {
?>

	<!-- CLIENTES Y SOCIOS -->
			<div id="clientes_socios">

				<ul class="enlaces_fotos">
<?php if($clientes1){?>
					<li class="titular"><a href="<?php if ( $membersArea ) echo "../" ?>clientes.php" title="Clientes"><img src="<?php if ( $membersArea ) echo "../" ?>images/comprasF3F3F3.jpg" alt="Clientes" width="170"/></a></li>
<? };?>
 <?php 
 if($socios1){?>
					<li><a href="<?php if ( $membersArea ) echo "../" ?>socios.php" title="Socios"><img src="<?php if ( $membersArea ) echo "../" ?>images/formacionF3F3F3.jpg" alt="Socios" width="170"/></a></li>
<? };?>

				</ul>
                 
			</div><!-- //CLIENTES_SOCIOS -->
            
        <div class="clear"></div>


			<!-- SOCIOS -->
    
 			<?php 
 			if($socios){?>
            
  			<div id="socios">              
 			<? require_once ("socios_acord.php");?>
    		</div>
		  
   				<div class="clear"></div>
         	<!-- //SOCIOS -->
			<? }?>	
			
			<!-- VENTAJAS -->
 			<?php 
 			if($ventajas){?> 
              
			<div id="ventajas">                                  
    
                <ul>
                
					<li><h6>Hazte socio</h6> </li>

                    <li class="seleccionado"><a href="<?php if ( $membersArea ) echo "../" ?>register.php">As&oacute;ciate</a></li>

                    <li><a href="<?php if ( $membersArea ) echo "../" ?>index.php">La Asociaci&oacute;n</a></li>

                    <li><a href="<?php if ( $membersArea ) echo "../" ?>socios.php">Ventajas</a></li>

                    <li><a href="<?php if ( $membersArea ) echo "../" ?>formacion.php">Formaci&oacute;n</a></li>

                    <li><a href="<?php if ( $membersArea ) echo "../" ?>register_comment.php">Contacto</a></li>

                </ul>

			</div> <!-- //VENTAJAS -->
            <?php
 }
}  //<!-- END displayLateral--> 
        
function displayMenuInf( $membersArea = false) {
?>

		<div class="pie_menu">

            <ul class="pie_enlaces">

                <li class="titular">Nuestros socios</li>
                
                <li><a href="<?php if ( $membersArea ) echo "../" ?>tienda/show_cat.php?catid=1">Tiendas</a></li>
                
                <li><a href="<?php if ( $membersArea ) echo "../" ?>tienda/show_cat.php?catid=2">Restauraci&oacute;n</a></li>

                <li><a href="<?php if ( $membersArea ) echo "../" ?>tienda/show_cat.php?catid=3">Hosteler&iacute;a</a></li>
                
                <li><a href="<?php if ( $membersArea ) echo "../" ?>tienda/show_cat.php?catid=4">Servicios</a></li>

                <li><a href="<?php if ( $membersArea ) echo "../" ?>tienda/show_cat.php?catid=5">Ocio</a></li>

            </ul>

            <ul class="pie_enlaces">

                <li class="titular">Hazte cliente</li>

                <li><a href="<?php if ( $membersArea ) echo "../" ?>clientes.php">Ventajas </a></li>

                <li><a href="<?php if ( $membersArea ) echo "../" ?>tarjeta.php">Tarjeta cliente</a></li>

                <li><a href="<?php if ( $membersArea ) echo "../" ?>tienda/oferton.php">Ofertas</a></li>
                
             	<li><a href="<?php if ( $membersArea ) echo "../" ?>personal_shopping.php">De compras</a></li>
                
                <li><a href="<?php if ( $membersArea ) echo "../" ?>register_comment.php">C&oacute;mo llegar</a></li>

            </ul>

            <ul class="pie_enlaces">  

                <li class="titular">Hazte socio</li>

                <li><a href="<?php if ( $membersArea ) echo "../" ?>index.php">La Asociaci&oacute;n</a></li>

                <li><a href="<?php if ( $membersArea ) echo "../" ?>register.php">As&oacute;ciate</a></li>
                
                <li><a href="<?php if ( $membersArea ) echo "../" ?>servicios.php">Ventajas</a></li>
                
                <li><a href="<?php if ( $membersArea ) echo "../" ?>formacion.php">Formaci&oacute;n</a></li>

                <li><a href="<?php if ( $membersArea ) echo "../" ?>register_comment.php">Contacto</a></li>
      

            </ul>            
             
            <ul class="pie_enlaces ultimo">

               <li class="titular">Enlaces de inter&eacute;s</li>

               <li><a href="http://www.madrid.org">Comunidad de Madrid</a></li>

			   <li><a href="http://www.madrid.es">Ayuntamiento</a></li>
               
               <li><a href="http://www.facua.org/">Asociaci&oacute;n de Consumidores</a></li>

               <li><a href="http://www.turismomadrid.es/">Oficina de Turismo</a></li>

               <li><a href="http://www.renfe.com/">Renfe</a></li>
               
            </ul>

        </div>
        
        <div class="clear"></div>

<?php   
}//<!-- END displayMenuInf--> 

function displayFooter( $membersArea = false) {
?>

	<div id="pie">

		<ul class="izdo menu_inferior">

            <li><address>Dise&ntilde;o<a href="https://sites.google.com/site/salcedomacias/">S.Salcedo Webs</a></address></li>    
               <li><a href="<?php if ( $membersArea ) echo "../" ?>terminos.php"> T&eacute;rminos de uso</a></li>  
                <li><a class="ultimo" href="<?php if ( $membersArea ) echo "../" ?>mapa_sitio.php"> Mapa del sitio</a></li>  
           	<li><a class="ultimo" href="http://www.w3.org/WAI/WCAG1AA-Conformance" title="Explicaci&oacute;n del Nivel Doble-A de Conformidad"><img src="<?php if ( $membersArea ) echo "../" ?>images/wcag1AA-blue.gif" alt="Icono de conformidad con el Nivel Triple-A, de las Directrices de Accesibilidad para el Contenido Web 1.0 del W3C-WAI" height="20" width="60" /></a></li>
            <li><a class="ultimo" href="http://validator.w3.org/check?uri=referer" title="Documento XHTML 1.0 Transitional v&aacute;lido por entrada directa"><img src="<?php if ( $membersArea ) echo "../" ?>images/valid-xhtml10-blue.png" alt="Valid XHTML 1.0 Transitional" width="60" height="20"/></a></li>
            <li><a class="ultimo" href="http://jigsaw.w3.org/css-validator/check/referer" title="Documento CSS version 2.1 v&aacute;lido por entrada directa"><img src="<?php if ( $membersArea ) echo "../" ?>images/valid-css-blue.png" alt="?CSS V?lido!" width="60" height="20" /></a></li>
             

    	</ul> 
 
		<ul class="dcho menu_inferior">
        
 			<li><span>Recuerda que puedes seguirnos en:</span></li>
            <li><a title="S&iacute;guenos en Twitter" href="https://twitter.com/asoc_atocha"><img class="middle" src="<?php if ( $membersArea ) echo "../" ?>images/twitter.jpg" height="15px" alt="S&iacute;guenos en Twitter"/></a></li>
            <li><a title="S&iacute;guenos en Facebook" href="http://www.facebook.com/pages/Asociaci%C3%B3n-Empresarios-y-Comerciantes-de-Atocha/408269435899290"><img class="middle" src="<?php if ( $membersArea ) echo "../" ?>images/facebook.jpg"  height="15px" alt="S&iacute;guenos en Facebook"/></a></li>

		</ul>
 
	</div><!-- //PIE -->

 	<div class="clear"></div> 
    
</div>

</body>

</html>

<?php        
}//<!-- END displayFooter - todos archivos--> 
?>

