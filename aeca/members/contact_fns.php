<?php 
function displayForm( $errorMessages, $missingFields, $comment ) {

  if ( $errorMessages ) {
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  } else {?><?
 } ?>
 <style type="text/css">

 </style>
 <div id="formulario">
  <p>También puedes dejarnos aquí tu mensaje y te contestaremos lo antes posible.</p>

    <form action="contact.php" method="post"  id="registro" name="registro" >

    <div id="insideform"> 
    
        <input type="hidden" name="action" value="register" />

        <fieldset style="border:0">

        <legend>Contacto</legend>
        
        <input type="hidden" name="firstName" id="firstName"  value="<?php $_SESSION['member']->getValue('username') ?>" />

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
  $requiredFields = array( "otherInterests" );
  $missingFields = array();
  $errorMessages = array();

		if (validatearea($_POST["otherInterests"])==0)
	{
		$non=$_POST["otherInterests"];
	$_POST["otherInterests"]=substr($non,0,255);
	$errorMessages[] = '<p class="error">Hemos recortado a 255 caracteres tu mensaje. Comprueba que lo que está en la caja es lo que quieres enviarnos, por favor. Si necesitas más espacio, envía un email a nuestra dirección de correo.</p>';

	}
	
  	$comment = new Commentss( array( 
		"firstName"=>	$_SESSION['member']->getValue('username'),
		"joinDate" => date( "Y-m-d H:i:s" ),
		"otherInterests" => isset( $_POST["otherInterests"] ) ? delete_format_text($_POST["otherInterests"]) : ""
  ) );

  foreach ( $requiredFields as $requiredField ) {
    			if ( !$comment->getValue( $requiredField ) ) {
     				$missingFields[] = $requiredField;
    			}
  }
  
  if ( $missingFields ) {
    $errorMessages[] = '<p class="error">El comentario est&aacute; vac&iacute;o o hay caracteres no permitidos.</p>';
  }
  
   	if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $comment );
  	} 
	else {
	
	$comment->insert_mens_socios();
	

	$joinDate=$comment->getValueEncoded( "joinDate");
	$joinDate=(string)$joinDate;
	$registro=explode(' ', $joinDate);
	$fecha=explode('-', $registro[0]);
	$joinDate="$fecha[2]/$fecha[1]/$fecha[0] - $registro[1]";	
	$email=$_SESSION['member']->getValue('emailAddress');	
	?>

    <p>Gracias por contactar con nosotros.</p> 	
    <p>A continuaci&oacute;n te mostramos la informaci&oacute;n que hemos recibido:</p>
	
    <h5 style="font-size:1.1em">Contacto</h5>
      	<dl class="contacto" style="width: 30em;">        
          <dt>Usuario:</dt>
          <dd><?php echo $nombre=$_SESSION['member']->getValue('username')?></dd>
          <dt>Mensaje:</dt>
          <dd><?php echo $otherInterests=$comment->getValueEncoded( "otherInterests" )?></dd>         
          <dt>Fecha del mensaje:</dt>
          <dd><?php echo $joinDate ?></dd>
      	</dl>
  
    <p>Hemos enviado un email con esta misma informaci&oacute;n a tu correo. Responderemos a tu comentario lo antes posible.</p>
    <p>Un saludo del equipo de AECA </p>
    <p>Asociaci&oacute;n de Empresarios y Comerciantes de Atocha<p>
	<?

	$adireccion  = 'silvia@salcedomacias.netii.net' . ', ';  //me envío una copia a mi correo del servidor
	$adireccion .= "$email"; //se le manda al cliente también
	$asunto="Comentario de contacto";
	$contenido="Usuario ".$nombre."\n"."Comentario: ".$otherInterests."\n";
	$dedireccion="silvia@salcedomacias.netii.net"; // la del servidor web
 
 	mail($adireccion, $asunto, $contenido, $dedireccion);
    
 //envío apunte a archivo de texto, con usuario generado, email y nombre de contacto

 	$hoy="\r\n".date('j')."/".date('m')."/".date('Y')." - ".date('H:i');
	$salida=$hoy."\r\nUsuario: ".$nombre."\r\nCorreo: ".$email."\r\nComentario: ".$otherInterests."\r\n";
	$salida=utf8_decode($salida); 
	$fp=fopen("mensajes.txt", "a");
	flock($fp,2);
	if(!$fp){echo "error";}
	fwrite($fp,$salida);
	flock($fp,3);
	fclose($fp);  
  }
}
	


