<?php
function displayForm( $errorMessages, $missingFields, $user ) {

$logEntries = LogEntryUser::getLogEntriesUsers( $user->getValue( "user_id" ) );
echo  "<h2>Edici&oacute;n del cliente con nombre de usuario: " . $user->getValueEncoded( "username" )."</h2>";
  if ( $errorMessages ) {
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  }

  $start = isset( $_REQUEST["start"] ) ? (int)$_REQUEST["start"] : 0;
  $order = isset( $_REQUEST["order"] ) ? preg_replace( "/[^ a-zA-Z]/", "", $_REQUEST["order"] ) : "username";
  
?>
    <form action="view_user.php" method="post" style="margin-bottom: 50px;" id="registro">
      <div style="width: 500px;">
        <input type="hidden" name="userId" id="userId" value="<?php echo $user->getValueEncoded( "user_id" ) ?>" />
        <input type="hidden" name="start" id="start" value="<?php echo $start ?>" />
        <input type="hidden" name="order" id="order" value="<?php echo $order ?>" />
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->getValueEncoded( "user_id" ) ?>" />

        <fieldset>
        <legend >Datos personales</legend>

        <label for="user_id"<?php validateField( "user_id", $missingFields ) ?>>C&oacute;digo cliente *</label>
        <input type="text" disabled="disabled" name="user_id" id="user_id"  value="<?php echo $user->getValueEncoded( "user_id" ) ?>" />

        <label for="emailAddress"<?php validateField( "emailAddress", $missingFields ) ?>>Correo electr&oacute;nico *</label>
        <input type="text" name="emailAddress" id="emailAddress" value="<?php echo $user->getValueEncoded( "emailAddress" ) ?>" />
       
        <label for="firstName"<?php validateField( "firstName", $missingFields ) ?>>Nombre *</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo $user->getValueEncoded( "firstName" ) ?>" />
        
        <label for="address_postal"<?php validateField( "address_postal", $missingFields ) ?>>Direcci&oacute;n </label>
        <input type="text" name="address_postal" id="address_postal"  value="<?php echo $user->getValueEncoded( "address_postal" ) ?>" />
         
        <label for="zip_postal"<?php validateField( "zip_postal", $missingFields ) ?>>C&oacute;digo Postal * </label>
        <input type="text" name="zip_postal" id="zip_postal" value="<?php echo $user->getValueEncoded( "zip_postal" ) ?>" />

        <label for="RE_Prov"<?php validateField( "RE_Prov", $missingFields ) ?>>Provincia *</label>
      	<select name="RE_Prov" id="RE_Prov" style="width:308px" >
		 <?
         if($edit=get_provincias_todo($user->getValueEncoded( "RE_Prov" )) ){
                
			foreach ($edit as $provincia){  
          
          	  $edit = is_array($provincia);
              // lista de las provincias enviadas por la base de datos
              $provincias_array=get_provincias();
              
              foreach ($provincias_array as $thisprovincia){
				  
                   echo "<option value=\"";
                   echo $thisprovincia["id"];
                   echo "\"";
                   if ($edit && $thisprovincia["id"] == $provincia["id"])
                       echo " selected";
                   echo ">";
                   echo $thisprovincia["provincia"];
                   echo "</option>";
                   echo "\n";
          		}
			}
		}
        ?>
       	</select>
        
        <label for="RE_pobla"<?php validateField( "RE_pobla", $missingFields ) ?>>Poblaci&oacute;n *</label>
        <select name="RE_pobla" id="RE_pobla" style="width:308px">
      	<?
			if($edit=get_municipios_todo($user->getValueEncoded("RE_pobla")) ){
					
				foreach ($edit as $municipio){  
			  
			  	$edit = is_array($municipio);
				// lista de las poblaciones enviadas por la base de datos
				$municipios_array=get_municipios($user->getValueEncoded("RE_Prov"));
				  
					foreach ($municipios_array as $thismunicipio){
					
					   echo "<option value=\"";
					   echo $thismunicipio["id"];
					   echo "\"";
 
 					   if ($edit && $thismunicipio[0] == $municipio["id"])
						   echo " selected";
					   echo ">";
					   echo $thismunicipio["municipio"];
					   echo "</option>";
					   echo "\n";
				  }
				}	
			}
        ?>
        </select>

        <label for="joinDate"<?php validateField( "joinDate", $missingFields ) ?>>Fecha de registro *</label>
        <input type="text" name="joinDate" id="joinDate" value="<?php echo $user->getValueEncoded( "joinDate" ) ?>" />

        <label for="txtBthDay"<?php validateField( "txtBthDay", $missingFields ) ?>>Fecha de nacimiento *</label>
        <input type="text" name="txtBthDay" id="txtBthDay" value="<?php echo $user->getValueEncoded( "txtBthDay" ) ?>" />

        <label<?php validateField( "gender", $missingFields ) ?>>G&eacute;nero *</label>
        <label for="genderMale">Hombre</label>
        <input type="radio" name="gender" id="genderMale" value="m"<?php setChecked( $user, "gender", "m" )?>/>
        <label for="genderFemale">Mujer</label>
        <input type="radio" name="gender" id="genderFemale" value="f"<?php setChecked( $user, "gender", "f" )?> />
        
        <label for="favoriteGenre">&#191;C&oacute;mo nos conoci&oacute;?</label>
        <select name="favoriteGenre" id="favoriteGenre" size="1" style="width:308px">
        	<?php 
			foreach ( $user->getConocer() as $value => $label ) { ?>
          	
            	<option value="<?php echo $value ?>"<?php setSelected( $user, "favoriteGenre", $value ) ?>><?php echo $label ?></option>
        	<?php 
			} ?>
        </select>
        
        <label for="otherInterests">&#191;Cu&aacute;ntos d&iacute;as compra al mes?&#191;D&oacute;nde?</label>
        <textarea name="otherInterests" id="otherInterests" rows="4" cols="50"><?php echo $user->getValueEncoded( "otherInterests" ) ?></textarea>
        
        </fieldset> <fieldset>
        <legend>Datos de autentificaci&oacute;n</legend>
        
        <label for="username"<?php validateField( "username", $missingFields ) ?>>Usuario *</label>
        <input type="text" name="username" id="username" value="<?php echo $user->getValueEncoded( "username" ) ?>" />
        
        <label for="password">Nueva contrase&ntilde;a</label>
        <input type="password" name="password" id="password" value="" />
        
        </fieldset> <fieldset>
        <legend>Datos de contacto</legend>
        
        <label for="emailAddress"<?php validateField( "emailAddress", $missingFields ) ?>>Correo electr&oacute;nico *</label>
        <input type="text" name="emailAddress" id="emailAddress" value="<?php echo $user->getValueEncoded( "emailAddress" ) ?>" />

        <label for="txtPhone"<?php validateField( "txtPhone", $missingFields ) ?>>Tel&eacute;fono *</label>
        <input type="text" name="txtPhone" id="txtPhone" value="<?php echo $user->getValueEncoded( "txtPhone" ) ?>" />
        
        <label for="txtMobile"<?php validateField( "txtMobile", $missingFields ) ?>>M&oacute;vil *</label>
        <input type="text" name="txtMobile" id="txtMobile" value="<?php echo $user->getValueEncoded( "txtMobile" ) ?>" />

        </fieldset>

        <div style="clear: both;">
          <input class="envio" type="submit" name="action" id="saveButton" value="Salvar Cambios" />
          <input class="envio" type="submit" onclick="return confirm('&iquest;Est&aacute;s seguro?');" name="action" id="deleteButton" value="Borrar Cliente" style="margin-right: 20px;" />
        </div>
      </div>
    </form>
        	 	<div class="clear"></div>  

    <h2>Registro de accesos</h2>

    <table cellspacing="0" style="width: 530px; border: 1px solid #666;">
      <tr>
        <th>P&aacute;gina web</th>
        <th>N&uacute;mero de visitas</th>
        <th>&Uacute;ltima visita</th>
      </tr> 
      
      
      
      
      
      
<?php
$rowCount = 0;

foreach ( $logEntries as $logEntry ) {
  $rowCount++;
?>
      <tr<?php if ( $rowCount % 2 == 0 ) echo ' class="alt"' ?>>
        <td><?php echo $logEntry->getValueEncoded( "pageUrl" ) ?></td>
        <td><?php echo $logEntry->getValueEncoded( "numVisits" ) ?></td>
        <td><?php echo $logEntry->getValueEncoded( "lastAccess" ) ?></td>
      </tr>
<?php
}
?>
    </table>
  

    <div style="width: 30em; margin-top: 20px; text-align: center;">
      <a class="avance" href="../users/view_users.php?start=<?php echo $start ?>&amp;order=<?php echo $order ?>">Volver</a>
    </div>

<?php
 
}

function saveUser() {
  $requiredFields = array( "firstName","RE_Prov", "RE_pobla", "zip_postal","username",  "emailAddress",  "gender","txtBthDay", "favoriteGenre","otherInterests" );
  $missingFields = array();
  $errorMessages = array();

	if (validateaddress($_POST["address_postal"])==0)
	$_POST["address_postal"]="";

		if (validatearea($_POST["otherInterests"])==0)
	{
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

	   	if (validateZip($_POST["zip_postal"])==0)
	$_POST["zip_postal"]="";

       	if (validateEmail($_POST["emailAddress"])==0)
	$_POST["emailAddress"]="";	
	
		if (validatePhone($_POST["txtPhone"])==0)
	$_POST["txtPhone"]="";
	
		if (validateMobile($_POST["txtMobile"])==0)
	$_POST["txtMobile"]="";
		 
		if (validateBthDay2($_POST["txtBthDay"])==0)
	$_POST["txtBthDay"]="";
	
			
			
  $user = new User( array(
  		"user_id" => isset( $_POST["user_id"] ) ?  preg_replace( "/[^ 0-9]/", "", $_POST["user_id"] ) : "",
		"firstName" =>isset( $_POST["firstName"] ) ?  delete_format($_POST["firstName"])  : "",
		"address_postal" => isset( $_POST["address_postal"] ) ? delete_format($_POST["address_postal"]) : "",
		"zip_postal" => isset( $_POST["zip_postal"] ) ? $_POST["zip_postal"]:"",
		"RE_Prov" => isset( $_POST["RE_Prov"] ) ?  $_POST["RE_Prov"]   : "",
		"RE_pobla" => isset( $_POST["RE_pobla"] ) ? $_POST["RE_pobla"]   : "",
	    "username" => isset( $_POST["username"] ) ?  delete_format($_POST["username"])  : "",
		"password" =>  isset( $_POST["password"] ) ?  delete_format($_POST["password"])  : "",
		"joinDate" =>isset( $_POST["joinDate"] ) ? $_POST["joinDate"] : "",
		"gender" => isset( $_POST["gender"] ) ? $_POST["gender"] : "",
		"txtBthDay"=>isset( $_POST["txtBthDay"] ) ?$_POST["txtBthDay"]  : "",
		"favoriteGenre" => isset( $_POST["favoriteGenre"] ) ? preg_replace( "/[^ \á\Á\é\É\í\Í\ó\Ó\ú\Ú\ñ\Ña-zA-Z]$/i", "", $_POST["favoriteGenre"] ) : "",
		"otherInterests" => isset( $_POST["otherInterests"] ) ? delete_format($_POST["otherInterests"]) : "",
		"emailAddress" => isset( $_POST["emailAddress"] )? $_POST["emailAddress"]:"",
		"txtPhone" => isset( $_POST["txtPhone"] ) ?  $_POST["txtPhone"]  : "",
		"txtMobile" => isset( $_POST["txtMobile"] ) ?  $_POST["txtMobile"]  : "",
  ) );




  foreach ( $requiredFields as $requiredField ) {
    if ( !$user->getValue( $requiredField ) ) {
      $missingFields[] = $requiredField;
    }
  }

  if ( $missingFields ) {
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os o incorrectos en el formulario. Por favor, completa los campos se&ntilde;alados abajo y pulsa Enviar.</p>';
  }

  if ( $existingUser = User::getByUsername2( $user->getValue( "username" ) ) and $existingUser->getValue( "user_id" ) != $user->getValue( "user_id" ) ) {
    $errorMessages[] = '<p class="error">Ya existe un cliente con ese usuario en la base de datos. Por favor, elige otro usuario.</p>';
  }


  if ( $existingUser = User::getByEmailAddress( $user->getValue( "emailAddress" ) ) and $existingUser->getValue( "user_id" ) != $user->getValue( "user_id" ) ) {
    $errorMessages[] = '<p class="error">Ya existe un cliente con ese correo en la base de datos. Por favor, elige otro correo o contacta con la asociaci&oacute;n.</p>';
  }

  if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $user );
  } else {
    $user->update();
    displaySuccess();
  }
}

function deleteUser() {
  $user = new User( array(
    "id" => isset( $_POST["userId"] ) ? (int) $_POST["userId"] : "",
	    "user_id" => isset( $_POST["user_id"] ) ? (int) $_POST["user_id"] : "",

  ) );
  LogEntryUser::deleteAllForUser( $user->getValue( "user_id" ) );
  $user->delete();
  displaySuccess();
}

function displaySuccess() {
  $start = isset( $_REQUEST["start"] ) ? (int)$_REQUEST["start"] : 0;
  $order = isset( $_REQUEST["order"] ) ? preg_replace( "/[^ a-zA-Z]/", "", $_REQUEST["order"] ) : "username";
?>
    <p>Los cambios se han guardado correctamente <a href="../users/view_users.php?start=<?php echo $start ?>&amp;order=<?php echo $order ?>">Volver a la lista de clientes</a></p>
<?php
		display_enlace("../tienda/index.php", "Volver a p&aacute;gina central de comercios");
		display_enlace("index_admin.php", "Volver a p&aacute;gina central de edici&oacute;n");
}
?>