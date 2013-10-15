<!-- CABECERA -->

<?php

// include function files for this application
require_once("bookmark_fns.php");
session_start();
require_once("display_partes.php");


displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = false);
 displaySolapas( $membersArea = false);
 displayCentral( $membersArea = false);


?>

<!-- CONTENT -->

<div id="content">

<div id="global_lateralycontenido"> <!-- igualar columnas -->

	<!-- LATERAL -->
    
	<?php
require ("lateral2.inc.php");
?>
	<!-- CONTENIDO -->
 <div id="contenido">
    
   	<script type="text/javascript" language="javascript"><!--//--><![CDATA[//><!--

	function validar(){	
		
		nombre = document.getElementById('nombre_usuario').value;		
 		nombre = nombre.replace(/^\s*|\s*$/g,""); //para quitar espacios al principio o final 
		
		
		
		correo = document.getElementById('correo_usuario').value;
		correo = correo.replace(/^\s*|\s*$/g,""); //para que valide correos con espacios al principio o final (pero enviarlos sin ellos)
		
		
		 	
		//comprobación general
		
		if( correo==""){
			alert("Por favor, inserta un email para que pueda contestarte");
			document.registro.name.focus()		
			return false;
		}
		
		//comprueba nombre
			
		else if(nombre.length<3||/^\s+$/.test(nombre)){
			
			alert("El campo 'Nombre' ha de tener m\xe1s de 2 caracteres, y no admite n\xfameros, ni caracteres distintos de espacios, guiones (\-) o ap\xf3strofos (\')");
			document.registro.name.focus()			
			return false;
		}	
		else if( !(/^\D{2,}$/.test(nombre))){
			alert("El campo 'Nombre' no puede contener n\xfameros");
			document.registro.name.focus()			
			return false;
		}	
			
		else if( !(/^[a-zA-Z\u00f1\u00d1\u00e9\u00ed\u00f3\u00fa\u00e1\u00c1\u00c9\u00cd\u00d3\u00da\u00fc\s\-\']+$/.test(nombre))){	
			alert("Ha introducido caracteres no permitidos en el campo 'Nombre'");
			document.registro.name.focus()			
			return false;}
			
				
		
		//comprueba email
		
		else if( !(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(correo))){
	
			alert('Por favor, introduzca un correo electr\xf3nico v\xe1lido');
			document.registro.email.focus()			
			return false;
		}

		
		
		
	
		else{
			document.getElementById('nombre_usuario').value=nombre	
			document.getElementById('correo_usuario').value=correo	
			
			
			alert('Me pondré en contacto contigo. Gracias.')		 
			return true;//cambiar a 'return true' si quiero enviar el formulario
		} 
	}

//--><!]]></script>
<form name="registro" action="../mostrar/mostrar.php" method="post" onsubmit="return validar()" )> 
      
        
        
              <label for="nombre_usuario">Nombre</label>
			  <input type="text" name="name" id="nombre_usuario" tabindex="1" size="20"/>
           
              
           
              <label for="correo_usuario">Correo</label>
			  <input type="text" name="email" id="correo_usuario" tabindex="3" size="20"/>
            
             
              
             <label  for="te">Comentario</label>
			  <textarea  name="text" id="te" tabindex="6" cols="35" rows="5"></textarea>
         
        <label id="label" for="validacion">Validaci&oacute;n</label>
          
          
       <!-- Si se va a enviar:<input type="button" value="Validar datos" id="validacion" name="valida" onclick="validar()" onkeypress=""/> -->   
                   
		
        <input type="submit" value="Validar datos" id="validacion" name="valida"/>
            
    </form>
    </div>
    <!-- //CONTENIDO -->

			<div class="clear"></div>
         
         </div><!-- //igualar columnas -->
			
	<!-- MENU_INFERIOR -->			

	<?php
require ("menuinf.inc.php");
?>


        </div><!-- //CONTENT -->
        
        
     <!-- PIE -->  

<?php
require ("footer.inc.php");
?>


    




