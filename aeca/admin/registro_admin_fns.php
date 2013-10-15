<?php 
function displayForm( $errorMessages, $missingFields, $admin ) {

  if ( $errorMessages ) {
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  } else {
?>
<?php } ?>
    <form action="register_admin.php" method="post" style="margin-left: 100px; margin-bottom: 50px;" id="registro" name="registro" >

    <div style="width: 30em;">
    
        <input type="hidden" name="action" value="register" />

        <fieldset>

        <legend style="font-size:20px;">Datos de autentificaci&oacute;n</legend>

        <label for="username"<?php validateField( "username", $missingFields ) ?>>Elige usuario *</label>
        <input type="text" name="username" id="username" value="<?php echo $admin->getValueEncoded( "username" ) ?>" />

        <label for="password"<?php if ( $missingFields ) echo ' class="error"' ?>>Elige contrase&ntilde;a *</label>
        <input type="password" name="password" id="password" value="" />
        <label for="password2"<?php if ( $missingFields ) echo ' class="error"' ?>>Repite contrase&ntilde;a *</label>
        <input type="password" name="password2" id="password2" value="" />
        
        </fieldset>


        <div style="clear: both;">
          <input type="submit" name="submitButton" id="submitButton" value="Send Details" />
          <input type="reset" name="resetButton" id="resetButton" value="Reset Form" style="margin-right: 20px;" />
        </div>

      </div>
    </form>
    
   
    
    
    

<?php
}




function processForm() {
  $requiredFields = array( "username", "password" );
  $missingFields = array();
  $errorMessages = array();
  
  	$admin = new Admin( array( 
	    "username" => isset( $_POST["username"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["username"] ) : "",
		"password" => ( isset( $_POST["password"] ) and isset( $_POST["password2"] ) and $_POST["password"] == $_POST["password2"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["password"] ) : ""


  ) );

  foreach ( $requiredFields as $requiredField ) {
    			if ( !$admin->getValue( $requiredField ) ) {
     				$missingFields[] = $requiredField;
    			}
  }
  

  if ( $missingFields ) {
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os en el formulario. Por favor, completa los campos se&ntilde;alados abajo y pulsa Enviar</p>';
  }

  if ( !isset( $_POST["password"] ) or !isset( $_POST["password2"] ) or !$_POST["password"] or !$_POST["password2"] or ( $_POST["password"] != $_POST["password2"] ) ) {
    $errorMessages[] = '<p class="error">Aseg&uacute;rate de que has introducido correctamente la contrase&ntilde;a en los dos campos</p>';
  }

  if ( Admin::getByUsername( $admin->getValue( "username" ) ) ) {
    $errorMessages[] = '<p class="error">Ya hay un administrador con ese usuario. Por favor, elige otro.</p>';
  }

 
  if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $admin );
  } else {
	
	$admin->insert();	
	
	displayThanks();
  }
}

function displayThanks() {
?>
<p>El nuevo administrador se ha registrado correctamente</p>
    <a class="avance" href="register_admin.php">Volver</a>
<?php
}