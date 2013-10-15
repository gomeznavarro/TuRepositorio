<?php 

function displayForm( $errorMessages, $missingFields, $comment ) {
 // displayPageHeader( "Sign up for the book club!" );

  if ( $errorMessages ) {
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  } else {?><?
 } ?>
 <style type="text/css">

 </style>
 <div id="formulario">
  <p>Déjanos aquí tu mensaje y te contestaremos lo antes posible.</p>

    <form action="register_comment.php" method="post"  id="registro" name="registro" >

    <div id="insideform"> 
    
        <input type="hidden" name="action" value="register" />

        <fieldset>

        <legend>Contacto</legend>
        
        <label for="firstName"<?php validateField( "firstName", $missingFields ) ?> >Nombre *</label>
        <input type="text" name="firstName" id="firstName"  value="<?php echo $comment->getValueEncoded( "firstName" ) ?>" />

        <label for="emailAddress"<?php validateField( "emailAddress", $missingFields ) ?> >Correo electr&oacute;nico *</label>
        <input type="text" name="emailAddress" id="emailAddress"  value="<?php echo $comment->getValueEncoded( "emailAddress" ) ?>" />


        <label for="otherInterests"<?php validateField( "otherInterests", $missingFields ) ?> >Comentario</label>
        <textarea name="otherInterests" id="otherInterests" rows="4" cols="50" style="height:150px"><?php echo $comment->getValueEncoded( "otherInterests" ) ?></textarea>
        <span style="float:left; font-size:10px; margin-left:10px;">M&aacute;x. 255 caracteres</span>
      
       

        <div style="clear: both;">
          <input type="submit" name="submitButton" id="submitButton" value="Enviar" style="font-weight:bold; " />
          <label style="display:none" for="resetButton">Limpiar</label>  
          <input type="reset" name="resetButton" id="resetButton" value="Limpiar" />
        </div>
 </fieldset>
      </div>
    </form>    
</div>
<?php
}

function processForm() {
  $requiredFields = array( "firstName", "emailAddress","otherInterests" );
  $missingFields = array();
  $errorMessages = array();
  
	
	

		if (validatearea($_POST["otherInterests"])==0)
	{
		$non=$_POST["otherInterests"];
	$_POST["otherInterests"]=substr($non,0,255);
	$errorMessages[] = '<p class="error">Hemos recortado a 255 caracteres tu respuesta comentario. Comprueba que lo que está en la caja es lo que quieres enviarnos, por favor. Si necesitas más espacio, por favor envía un email a nuestra dirección de correo.</p>';

	}
		if (validatetxtNombre($_POST["firstName"])==0){
	$_POST["firstName"]="";
	}
	
 		

       	if (validateEmail($_POST["emailAddress"])==0)
	$_POST["emailAddress"]="";	
	
	
		
  	$comment = new Commentss( array( 
			
		"firstName" =>isset( $_POST["firstName"] ) ?  delete_format($_POST["firstName"])  : "",
		"joinDate" => date( "Y-m-d H:i:s" ),
		"otherInterests" => isset( $_POST["otherInterests"] ) ? delete_format_text($_POST["otherInterests"]) : "",
		"emailAddress" => isset( $_POST["emailAddress"] )? $_POST["emailAddress"]:"",
  ) );

  foreach ( $requiredFields as $requiredField ) {
    			if ( !$comment->getValue( $requiredField ) ) {
     				$missingFields[] = $requiredField;
    			}
  }
  

  if ( $missingFields ) {
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os o incorrectos en el formulario. Por favor, completa los campos se&ntilde;alados abajo y pulsa Enviar.</p>';
  }

  
   	if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $comment );
	echo "<h2>".validatetxtNombre2($_POST["firstName"])."</h2>";
  	} 
	else {
	
	$comment->insert44();
	
	
	
	$joinDate=$comment->getValueEncoded( "joinDate");
	$joinDate=(string)$joinDate;
	$registro=explode(' ', $joinDate);
	$fecha=explode('-', $registro[0]);
	$joinDate="$fecha[2]/$fecha[1]/$fecha[0] - $registro[1]";	
	
	
	?>

    <p>Gracias por contactar con nosotros.</p> 	
    <p>A continuaci&oacute;n te mostramos la informaci&oacute;n que hemos recibido:</p>
	
    <h5 style="font-size:1.1em">Contacto</h5>
      	<dl class="contacto" style="width: 30em;">        
          <dt>Nombre</dt>
          <dd><?php echo $nombre=$comment->getValueEncoded( "firstName" )?></dd>
          <dt>Email</dt>
          <dd><?php echo $email=$comment->getValueEncoded( "emailAddress" ) ?></dd>
          <dt>Comentario</dt>
          <dd><?php echo $otherInterests=$comment->getValueEncoded( "otherInterests" )?></dd>         
          <dt>Fecha de registro:</dt>
          <dd><?php echo $joinDate ?></dd>
      	</dl>
    
    
    
           
    

  
    <p>Hemos enviado un email con esta misma informaci&oacute;n a tu correo. Responderemos a tu comentario lo antes posible.</p>
    <p>Un saludo del equipo de AECA </p>
    <p>Asociaci&oacute;n de Empresarios y Comerciantes de Atocha<p>
	<?
	
	
      

	$adireccion  = 'silvia@salcedomacias.netii.net' . ', ';  //me envío una copia a mi correo del servidor
	$adireccion .= "$email"; //se le manda al cliente también
	$asunto="Comentario de contacto";
	$contenido="Nombre cliente ".$nombre."\n"."Comentario: ".$otherInterests."\n";
	$dedireccion="silvia@salcedomacias.netii.net"; // la del servidor web
 
 	mail($adireccion, $asunto, $contenido, $dedireccion);
    
 //envío apunte a archivo de texto, con usuario generado, email y nombre de contacto

 	  	$hoy="\r\n".date('j')."/".date('m')."/".date('Y')." - ".date('H:i');
	$salida=$hoy."\r\nComentario: ".$otherInterests."\r\nCorreo: ".$email."\r\nNombre: ".$nombre."\r\n";
	$salida=utf8_decode($salida); 
	$fp=fopen("admin/comentarios.txt", "a");
	flock($fp,2);
	if(!$fp){echo "error";}
	fwrite($fp,$salida);
	flock($fp,3);
	fclose($fp);  
  }
}
	

function displayThanks() {
?> 
        <p>Gracias, ya est&aacute;s registrado como cliente.</p>

    <a href="users/login_user.php">Haz login</a>
<?php
}


