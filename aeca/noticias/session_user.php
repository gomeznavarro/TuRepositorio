<?php

session_start();

require_once( "../clases/User.class.php" );
require_once("../admin/book_sc_fns.php");
require_once( "../config.php" );

if(!isset($_SESSION['user'])){
    if(isset($_POST['username'])){
		
		
			
	$user = new User( array( 
	    "id" => isset( $_POST["id"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["id"] ) : "",

    "username" => isset( $_POST["username"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["username"] ) : "",
    "password" => isset( $_POST["password"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["password"] ) : "",
  ) );
  
  $loggedInUser = $user->authenticate();
	if ( !$loggedInUser ) {
		echo "0";
	}
	else {
		$_SESSION["user"] = $loggedInUser;
		echo "1";
		
	
  }
	
	
	
	
	
	
   }
	
}

?>