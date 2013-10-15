<?php 
function displayForm( $errorMessages, $missingFields, $user ) {
 // displayPageHeader( "Sign up for the book club!" );

  if ( $errorMessages ) {
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  } else {
 if (!isset ($_SESSION['admin_user'])){
?>	
	<div class="inform" style="float:left; margin:20px 0px 20px 100px;">
    <p>Gracias por tu inter&eacute;s</p>
    <p>Para registrarte introduce tus detalles y pulsa Enviar.</p>
    <p>Los campos marcados con un asterisco (*) son obligatorios.</p>
    </div>
<?php } } ?>
    <form action="register_user.php" method="post" style="margin-left: 100px; margin-bottom: 50px; float:left" id="registro" name="registro" >

    <div style="width: 500px">
    
        <input type="hidden" name="action" value="register" />

        <fieldset>

        <legend >Datos personales</legend>
        
        <label for="firstName"<?php validateField( "firstName", $missingFields ) ?>>Nombre *</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo $user->getValueEncoded( "firstName" ) ?>" />

        <label for="address_postal"<?php validateField( "address_postal", $missingFields ) ?>>Direcci&oacute;n </label>
        <input type="text" name="address_postal" id="address_postal" value="<?php echo $user->getValueEncoded( "address_postal" ) ?>" />
        <span style="float:left; font-size:9px; ">Por favor, no escriba el tipo de v&iacute;a</span>

        <?php $link=Conectarse();?>
      
        <label for="RE_Prov"<?php validateField( "RE_Prov", $missingFields ) ?>>Provincia *</label>
		<select name='RE_Prov' id="RE_Prov" style="width:308px">
		<option value='0'>Seleccione provincia...</option>
               
        <?php
			$query= mysql_query ("SELECT * FROM provincias order by provincia asc",$link);
			$array=mysql_fetch_assoc($query);
			$num=mysql_num_rows($query);
			$suma=0;
			do{ ++$suma;
			echo "<option value='".$array['id']."'>".$array['provincia']."</option>";
			}while($array=mysql_fetch_assoc($query));?>
            
		</select><span style="position:absolute; top:540px; left:30px;color:#900" id='Buscando'> </span>

        <label for="RE_pobla"<?php validateField( "RE_pobla", $missingFields ) ?>>Poblaci&oacute;n *</label>
		<select name='RE_pobla' id="RE_pobla" class="pobla" style="width:308px" >
		<option value='0' >-seleccione provincia-</option>
		</select>            
               
        <label for="zip_postal"<?php validateField( "zip_postal", $missingFields ) ?>>C&oacute;digo Postal *</label>
        <input type="text" name="zip_postal" id="zip_postal" value="<?php echo $user->getValueEncoded( "zip_postal" ) ?>" />
        
        <label<?php validateField( "gender", $missingFields ) ?>>G&eacute;nero *</label>
        <label for="genderMale">Hombre</label>
        <input type="radio" name="gender" id="genderMale" value="m"<?php setChecked( $user, "gender", "m" )?>/>
        <label for="genderFemale">Mujer</label>
        <input type="radio" name="gender" id="genderFemale" value="f"<?php setChecked( $user, "gender", "f" )?> />
       
        <label <?php validateField( "txtBthDay", $missingFields) ?> for="txtBthDay" >Fecha de nacimiento * <br/>(dd-mm-yyyy)</label>
        <input type="text" name="txtBthDay" id="txtBthDay" value="<?php if(isset( $_POST['txtBthDay'] )) echo $_POST['txtBthDay'];else echo ''?>" />    
      
        <label for="favoriteGenre" <?php validateField( "favoriteGenre", $missingFields ) ?>>&#191;C&oacute;mo nos conociste? *</label>
        <select name="favoriteGenre" id="favoriteGenre" size="1" style="width:308px">
			<?php 
			foreach ( $user->getConocer() as $value => $label ) { ?>
            <option value="<?php echo $value ?>"<?php setSelected( $user, "favoriteGenre", $value ) ?>><?php echo $label ?></option>
            <?php 
			} ?>
        </select>    

        <label for="otherInterests"<?php validateField( "otherInterests", $missingFields ) ?>>&#191;Compras en peque&ntilde;o comercio o en grandes almacenes?&#191;Por qu&eacute;?&#191;Con qu&eacute; frecuencia? *</label>
        <textarea name="otherInterests" id="otherInterests" rows="6" cols="50"><?php echo $user->getValueEncoded( "otherInterests" ) ?></textarea>
                	 	<div class="clear"></div>  

        <span style="float:right; font-size:9px; ">M&aacute;x. 255 caracteres</span>
        
        </fieldset> 
        <fieldset>
        
        <legend>Datos de autentificaci&oacute;n</legend>

        <label for="username"<?php validateField( "username", $missingFields ) ?>>Elige un usuario *</label>
        <input type="text" name="username" id="username" value="<?php echo $user->getValueEncoded( "username" ) ?>" />

        <label for="password"<?php if ( $missingFields ) echo ' class="error"' ?>>Elige una contrase&ntilde;a *</label>
        <input type="password" name="password" id="password" value="" />
       
        <label for="password2"<?php if ( $missingFields ) echo ' class="error"' ?>>Escribe de nuevo la contrase&ntilde;a *</label>
        <input type="password" name="password2" id="password2" value="" />
        
        </fieldset>
        <fieldset>
        
        <legend>Datos de contacto</legend>
        
        <label for="emailAddress"<?php validateField( "emailAddress", $missingFields ) ?>>Correo electr&oacute;nico *</label>
        <input type="text" name="emailAddress" id="emailAddress" value="<?php echo $user->getValueEncoded( "emailAddress" ) ?>" />
        
        <label for="txtPhone"<?php validateField( "txtPhone", $missingFields ) ?>>Tel&eacute;fono </label>
        <input type="text" name="txtPhone" id="txtPhone" value="<?php echo $user->getValueEncoded( "txtPhone" ) ?>" />
        
        <label for="txtMobile"<?php validateField( "txtMobile", $missingFields ) ?>>M&oacute;vil </label>
        <input type="text" name="txtMobile" id="txtMobile" value="<?php echo $user->getValueEncoded( "txtMobile" ) ?>" />
               
        </fieldset>
        <fieldset>
        
        <legend>Aceptaci&oacute;n de t&eacute;rminos</legend>

        <!-- Checkbox Leer Condiciones -->
        <label for="termin" <?php validateField( "termin", $missingFields ) ?>>He le&iacute;do y acepto los <a target="_blank" href="terminos.php">t&eacute;rminos de uso</a> *</label>       
        <input type="checkbox" value="1" name="termin" id="termin" <?php setChecked( $user, "termin", "1" )?>/>
        </fieldset>

        <div style="clear: both;">
          <input type="submit" name="submitButton" id="submitButton" value="Enviar" style="padding:4px; font-weight:bold" />
          <label style="display:none" for="resetButton">Limpiar</label>  
          <input type="reset" name="resetButton" id="resetButton" value="Limpiar" style="margin-right: 20px; padding:4px;" />
        </div>

      </div>
    </form>    
<?php
}

function processForm() {
  $requiredFields = array( "firstName","RE_Prov", "RE_pobla", "zip_postal","username", "password", "emailAddress",  "gender","txtBthDay", "favoriteGenre","otherInterests","termin" );
  $missingFields = array();
  $errorMessages = array();
	
		if (validateaddress($_POST["address_postal"])==0)
	$_POST["address_postal"]="";

		if (validatearea($_POST["otherInterests"])==0){
			
	$non=$_POST["otherInterests"];
	$_POST["otherInterests"]=substr($non,0,255);
	$errorMessages[] = '<p class="error">Hemos recortado a 255 caracteres tu respuesta a &#191;Compras en...?. Comprueba que lo que está en la caja es lo que quieres enviarnos, por favor. </p>';
	}
	
		if (validatetxtNombre($_POST["firstName"])==0){
	$_POST["firstName"]="";
	}
	
 		if ( validateAuth($_POST["username"])==0)
 	$_POST["username"]="";

   		if ( validateAuth($_POST["password"])==0)
 	$_POST["password"]="";

   		if ( validateAuth($_POST["password2"])==0)
 	$_POST["password2"]="";

	   	if (validateZip($_POST["zip_postal"])==0)
	$_POST["zip_postal"]="";

       	if (validateEmail($_POST["emailAddress"])==0)
	$_POST["emailAddress"]="";	
	
		if (validatePhone($_POST["txtPhone"])==0)
	$_POST["txtPhone"]="";
	
		if (validateMobile($_POST["txtMobile"])==0)
	$_POST["txtMobile"]="";
		 
		if (validateBthDay($_POST["txtBthDay"])==0)
	{$_POST["txtBthDay"]="";
	$birthday='';}
			
			if (isset ($_POST["txtBthDay"])&& $_POST["txtBthDay"]!="")
			{
			$txtBthday=$_POST["txtBthDay"];
			$txtBthday=(string)$txtBthday;
			$bthday=explode('-', $txtBthday);
			$birthday="$bthday[2]-$bthday[1]-$bthday[0]";			
			}
  	$user = new User( array( 
			
		"firstName" =>isset( $_POST["firstName"] ) ?  delete_format($_POST["firstName"])  : "",
		"address_postal" => isset( $_POST["address_postal"] ) ? delete_format_address($_POST["address_postal"]) : "",
		"zip_postal" => isset( $_POST["zip_postal"] ) ? $_POST["zip_postal"]:"",
		"RE_Prov" => isset( $_POST["RE_Prov"] ) ?   $_POST["RE_Prov"]   : "",
		"RE_pobla" => isset( $_POST["RE_pobla"] ) ?  $_POST["RE_pobla"]  : "",
	    "username" => isset( $_POST["username"] ) ?  delete_format($_POST["username"])  : "",
		"password" => ( isset( $_POST["password"] ) and isset( $_POST["password2"] ) and $_POST["password"] == $_POST["password2"] ) ? delete_format($_POST["password"])  : "",
		"joinDate" => date( "Y-m-d" ),
		"gender" => isset( $_POST["gender"] ) ? preg_replace( "/[^mf]/", "", $_POST["gender"] ) : "",
		"txtBthDay"=>"$birthday",
		"favoriteGenre" => isset( $_POST["favoriteGenre"] ) ? preg_replace( "/[^ \á\Á\é\É\í\Í\ó\Ó\ú\Ú\ñ\Ñ\ü\Üa-zA-Z]$/i", "", $_POST["favoriteGenre"] ) : "",
		"otherInterests" => isset( $_POST["otherInterests"] ) ? delete_format_text($_POST["otherInterests"]) : "",
		"emailAddress" => isset( $_POST["emailAddress"] )? $_POST["emailAddress"]:"",
		"txtPhone" => isset( $_POST["txtPhone"] ) ?  $_POST["txtPhone"]  : "",
		"txtMobile" => isset( $_POST["txtMobile"] ) ?  $_POST["txtMobile"]  : "",
		"termin"=> isset ($_POST["termin"])? $_POST["termin"]:""
  ) );

  foreach ( $requiredFields as $requiredField ) {
    			if ( !$user->getValue( $requiredField ) ) {
     				$missingFields[] = $requiredField;
    			}
  }
  

  if ( $missingFields ) {
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os o incorrectos en el formulario. Por favor, completa los campos se&ntilde;alados abajo y pulsa Enviar.</p>';
  }

  if ( !isset( $_POST["password"] ) or !isset( $_POST["password2"] ) or !$_POST["password"] or !$_POST["password2"] or ( $_POST["password"] != $_POST["password2"] ) ) {
    $errorMessages[] = '<p class="error">Aseg&uacute;rate de introducir la contrase&ntilde;a correctamente en los dos campos</p>';
  }

  if ( User::getByUsername( $user->getValue( "username" ) ) ) {
    $errorMessages[] = '<p class="error">Ya existe un cliente con ese usuario en la base de datos. Por favor, elige otro usuario.</p>';
  }

  if ( User::getByEmailAddress( $user->getValue( "emailAddress" ) ) ) {
    $errorMessages[] = '<p class="error">Ya existe un cliente con ese correo en la base de datos. Por favor, elige otro correo o contacta con la asociaci&oacute;n.</p>';
  }
  
   	if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $user );
  	} 
	else {
	
	$user->insert2();
	
	$RE_pobla=$user->getValue("RE_pobla");
	$RE_Prov=$user->getValue("RE_Prov")."<br/>";
	
	$joinDate=$user->getValueEncoded( "joinDate");
	$joinDate=(string)$joinDate;
	$registro=explode('-', $joinDate);
	$joinDate="$registro[2]-$registro[1]-$registro[0]";	
	
	$txtBthDay=$user->getValueEncoded( "txtBthDay" );
	$txtBthDay=(string)$txtBthDay;
	$birth=explode('-', $txtBthDay);
	$txtBthDay="$birth[2]-$birth[1]-$birth[0]";	
	
	?>
        <div style="margin-top:20px; margin-bottom:20px; margin-left:100px">

    <p>Gracias por registrarte en nuestra asociaci&oacute;n.</p> 	
    <p>A continuaci&oacute;n te mostramos la informaci&oacute;n que hemos recibido. Puedes editar tus datos desde el portal, accediendo con tu usuario y la contrase&ntilde;a que elegiste.</p>
	
        <h5 style="font-size:1.1em">Datos personales</h5>

      	<dl style="width: 30em;">        
          <dt>Nombre</dt>
          <dd><?php echo $nombre=$user->getValueEncoded( "firstName" )?></dd>
          <dt>Direcci&oacute;n</dt>
          <dd><?php echo $address=$user->getValueEncoded( "address_postal" ) ?></dd>
          <dt>C&oacute;digo postal</dt>
          <dd><?php echo $zip=$user->getValueEncoded( "zip_postal" ) ?></dd>
          <dt>Poblaci&oacute;n</dt>
          <dd><?php echo $municipio=$user->getmunicipioByRE_pobla($RE_pobla); ?></dd>
          <dt>Provincia</dt>
          <dd><?php echo $provincia=$user->getprovinciaByRE_Prov(	$RE_Prov);?></dd>
          <dt>G&eacute;nero</dt>
          <dd><?php echo $gender=$user->getGenderString() ?></dd>
          <dt>Fecha de nacimiento</dt>
          <dd><?php echo $txtBthDay ?></dd>
          <dt>Nos conociste por:</dt>
          <dd><?php echo $favoriteGenre=$user->getFavoriteConocer()?></dd>
          <dt>Cada cu&aacute;nto y d&oacute;nde compras</dt>
          <dd><?php echo $otherInterests=$user->getValueEncoded( "otherInterests" )?></dd>         
          <dt>Fecha de registro:</dt>
          <dd><?php echo $joinDate ?></dd>
      	</dl>
    
    <h5 style="font-size:1.1em">Datos de autentificaci&oacute;n</h5>
    	<dl style="width: 30em;">
          <dt>Usuario</dt>
          <dd><?php echo $username=$user->getValueEncoded( "username" )?></dd>
          <dt>Contrase&ntilde;a</dt>
          <dd><?php echo "**********"?></dd>
        </dl>
   
   	<h5 style="font-size:1.1em">Datos de contacto</h5>
        <dl style="width: 30em;">
          <dt>Tel&eacute;fono</dt>
          <dd><?php echo $txtPhone=$user->getValueEncoded( "txtPhone" )?></dd>
          <dt>M&oacute;vil</dt>
          <dd><?php echo $txtMobile=$user->getValueEncoded( "txtMobile" )?></dd>
          <dt>Correo electr&oacute;nico</dt>
          <dd><?php echo $email=$user->getValueEncoded( "emailAddress" ) ?></dd>
        </dl>
  
    <p>Hemos enviado un email de confirmaci&oacute;n de registro a tu correo.</p>
    <p>Un saludo del equipo de AECA - Asociaci&oacute;n de Empresarios y Comerciantes de Atocha<p>
    </div>
	<?
	$adireccion  = 'silvia@salcedomacias.netii.net' . ', ';  //me envío una copia a mi correo del servidor
	$adireccion .= "$email"; //se le manda al cliente también
	$asunto="Registro cliente";
	$contenido="Bienvenido. Ya eres cliente de AECA: \n"."Nombre cliente ".$nombre."\n". "Usuario: ".$username. "\n"."Un saludo del equipo de AECA";
	$dedireccion="silvia@salcedomacias.netii.net"; // la del servidor web
 
 	mail($adireccion, $asunto, $contenido, $dedireccion);
    
 //envío apunte a archivo de texto, con comentario, email y nombre de contacto

  	$hoy="\r\n".date('j')."/".date('m')."/".date('Y')." - ".date('H:i');
	$salida=$hoy."\r\nCorreo: ".$email."\r\nNombre: ".$nombre."\r\nComentario: ".$otherInterests."\r\n";
	$salida=utf8_decode($salida); 
	$fp=fopen("users/users.txt", "a");
	flock($fp,2);
	if(!$fp){echo "Se ha producido un error";}
	fwrite($fp,$salida);
	flock($fp,3);
	fclose($fp);  
  }
}

function displayThanks() {
?> 
        <p>Gracias, ya est&aacute;s registrado como cliente.</p>

    	<a class="avance" href="users/login_user.php">Haz login</a>
<?php
}
?>


