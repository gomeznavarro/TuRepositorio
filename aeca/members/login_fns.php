<?php 
function displayForm( $errorMessages, $missingFields, $member ) {

  if ( $errorMessages ){
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  } 
  else{
 ?>
  	<h2>Acceso socios</h2>

    <p>Para entrar al &aacute;rea de socios, introduce tu usuario y contrase&ntilde;a y pulsa Login.</p>
<?php } ?>

    <form action="login.php" method="post" style="float:left; margin-left: 100px; margin-bottom: 10px;">
      <div style="width: 300px;">
        <input type="hidden" name="action" value="login" />

        <label for="username"<?php validateField( "username", $missingFields ) ?>>Usuario</label>
        <input style="margin-top: 7px;" type="text" name="username" id="username" value="<?php echo $member->getValueEncoded( "username" ) ?>" />

        <label for="password"<?php if ( $missingFields ) echo ' class="error"' ?>>Contrase&ntilde;a</label>
        <input style="margin-top: 7px;" type="password" name="password" id="password" value="" />

        <div style="clear: both;">
          <input type="submit" name="submitButton" id="submitButton" value="Login" />
          
        </div>
      </div>
    </form>
            	 	<div class="clear"></div>  

    <a class="usuario" href="../register.php">&iquest;A&uacute;n no eres miembro?</a>
    <a class="usuario" href="forgot_form_user.php">&iquest;Olvidaste tu usuario?</a>
    <a class="usuario" href="forgot_form.php">&iquest;Olvidaste tu contrase&ntilde;a?</a>

<?php
}

function processForm() {
  $requiredFields = array( "username", "password" );
  $missingFields = array();
  $errorMessages = array();

  $member = new Member( array( 
    "username" => isset( $_POST["username"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["username"] ) : "",
    "password" => isset( $_POST["password"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["password"] ) : "",
  ) );

  foreach ( $requiredFields as $requiredField ) {
    if ( !$member->getValue( $requiredField ) ) {
      $missingFields[] = $requiredField;
    }
  }

    if ( $missingFields ) {
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os en el formulario. Por favor, completa los campos se&ntilde;alados abajo y pulsa Login de nuevo.</p>';
  } else {
  	$loggedInMember = $member->authenticate();
	if ( !$loggedInMember ) {
		$errorMessages[] = '<p class="error">Lo sentimos, pero no puedes acceder con esos datos. Por favor, comprueba tu usuario y contrase&ntilde;a y prueba de nuevo.</p>';
	}
	
  }
    
  if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $member );
  } else {

    $_SESSION["member"] = $loggedInMember;
    displayThanks();
  }
}

function displayThanks() {
//displayPageHeader( "Thanks for logging in!", true );
?>
    <p>Gracias por autentificarte. Puedes acceder al <a class="avance" href="index.php">&aacute;rea de socios</a>.</p>
<?php
  //displayPageFooter();
}