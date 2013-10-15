<?php 
function displayForm( $errorMessages, $missingFields, $user ) {

  if ( $errorMessages ) {
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  } 
  else {
  ?> 
  	<h2>Acceso clientes</h2>
  
    <p>Para acceder al &aacute;rea de clientes, introduce tu usuario y contrase&ntilde;a y pulsa Login.</p>
	<?php } ?>

    <form action="login_user.php" method="post" style="float:left; margin-left: 100px; margin-bottom: 10px;">
      	<div style="width: 300px;">
        <input type="hidden" name="action" value="login" />

        <label for="username2"<?php validateField( "username", $missingFields ) ?>>Usuario</label>
        <input type="text" name="username" id="username2" value="<?php echo $user->getValueEncoded( "username" ) ?>" />

        <label for="password2"<?php if ( $missingFields ) echo ' class="error"' ?>>Contrase&ntilde;a</label>
        <input type="password" name="password" id="password2" value="" />

        <div style="clear: both;">
        <input type="submit" name="submitButton" id="submitButton" value="Login" />         
          
        </div>
      	</div>
    </form>
            	 	<div class="clear"></div>  

    <a class="usuario" href="../register_user.php">&iquest;A&uacute;n no eres cliente?</a>
    <a class="usuario" href="forgot_form_user.php">&iquest;Olvidaste tu usuario?</a>
    <a class="usuario" href="forgot_form.php">&iquest;Olvidaste tu contrase&ntilde;a?</a>

<?php
}

function processForm() {
  $requiredFields = array( "username", "password" );
  $missingFields = array();
  $errorMessages = array();

  $user = new User( array( 
    "username" => isset( $_POST["username"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["username"] ) : "",
    "password" => isset( $_POST["password"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["password"] ) : "",
  ) );

  foreach ( $requiredFields as $requiredField ) {
    if ( !$user->getValue( $requiredField ) ) {
      $missingFields[] = $requiredField;
    }
  }
  
  if ( $missingFields ) {
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os en el formulario. Por favor, completa los campos se&ntilde;alados abajo y pulsa Login de nuevo.</p>';
  } 
  else {
  	$loggedInUser = $user->authenticate();
		if ( !$loggedInUser ) {
		$errorMessages[] = '<p class="error">Lo sentimos, pero no puedes acceder con esos datos. Por favor, comprueba tu usuario y contrase&ntilde;a y prueba de nuevo.</p>';
		}
	 }
  
if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $user );
  } 
else {
	$_SESSION["user"] = $loggedInUser;
	displayThanks();
	}
}

function displayThanks() {
?>
    <p>Gracias por autentificarte. Puedes acceder al <a class="avance" href="index.php">&aacute;rea de clientes</a>.</p>
   
<?php
}