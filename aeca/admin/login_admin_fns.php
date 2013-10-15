<?php function displayForm( $errorMessages, $missingFields, $admin ) {
  //displayPageHeader( "Login to the book club members' area", true );

  if ( $errorMessages ) {
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  } else {
?>
                	    <h2>Acceso administraci&oacute;n</h2>

    <p>Para entrar al &aacute;rea de administraci&oacute;n, introduce tu usuario y contrase&ntilde;a y pulsa Login.</p>
<?php } ?>

    <form action="login_admin.php" method="post" style="float:left; margin-left: 100px; margin-bottom: 10px;">
      <div style="width: 300px;">
        <input type="hidden" name="action" value="login" />

        <label for="username"<?php validateField( "username", $missingFields ) ?>>Usuario</label>
        <input type="text" name="username" id="username" value="<?php echo $admin->getValueEncoded( "username" ) ?>" />

        <label for="password"<?php if ( $missingFields ) echo ' class="error"' ?>>Contrase&ntilde;a</label>
        <input type="password" name="password" id="password" value="" />

        <div style="clear: both;">
          <input type="submit" name="submitButton" id="submitButton" value="Login" />
          
          
        </div>
      </div>
    </form>

<?php
  //displayPageFooter();
}

function processForm() {
  $requiredFields = array( "username", "password" );
  $missingFields = array();
  $errorMessages = array();

  $admin = new Admin( array( 
    "username" => isset( $_POST["username"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["username"] ) : "",
    "password" => isset( $_POST["password"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["password"] ) : "",
  ) );

  foreach ( $requiredFields as $requiredField ) {
    if ( !$admin->getValue( $requiredField ) ) {
      $missingFields[] = $requiredField;
    }
  }

  /*if ( $missingFields ) {
	echo "missing fields!";
    $errorMessages[] = '<p class="error">There were some missing fields in the form you submitted. Please complete the fields highlighted below and click Login to resend the form.</p>';
  } elseif ( !$loggedInMember = $member->authenticate() ) {
    $errorMessages[] = '<p class="error">Sorry, we could not log you in with those details. Please check your username and password, and try again.</p>';
  }

/* spiros start*/
  if ( $missingFields ) {
	echo "missing fields!";
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os en el formulario. Por favor, completa los campos se&ntilde;alados abajo y pulsa Login de nuevo.</p>';
  } else {
  	$loggedInMember = $admin->authenticate();
	if ( !$loggedInMember ) {
		$errorMessages[] = '<p class="error">Lo sentimos, pero no puedes acceder con esos datos. Por favor, comprueba tu usuario y contrase&ntilde;a y prueba de nuevo.</p>';
	}
	
  }
// spiros end*/
    
  if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $admin );
  } else {
	  //incluyo desde aquí para cerrar sesiones
//$_SESSION['tiempo']=time(); 
	  //hasra aquí para cerrar sesiones
	 

    $_SESSION["admin_user"] = $loggedInMember;
	
//header('Location: '.$_SERVER['HTTP_REFERER']);


    displayThanks();
  }
}

function displayThanks() {
//displayPageHeader( "Thanks for logging in!", true );
?>
    <p>Gracias por autentificarte. Puedes acceder al <a class="avance" href="index.php">&aacute;rea de administraci&oacute;n</a>.</p>
   
<?php
  //displayPageFooter();
}