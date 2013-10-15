<?php

session_start();

require_once( "../clases/Member.class.php" );
require_once("../admin/book_sc_fns.php");
require_once( "../config.php" );

if(!isset($_SESSION['member'])){
    if(isset($_POST['username'])){
		
		
			
	$member = new Member( array( 
	    "id" => isset( $_POST["id"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["id"] ) : "",

    "username" => isset( $_POST["username"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["username"] ) : "",
    "password" => isset( $_POST["password"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["password"] ) : "",
  ) );
  
  $loggedInMember = $member->authenticate();
	if ( !$loggedInMember ) {
		echo "0";
	}
	else {
		$_SESSION["member"] = $loggedInMember;
		echo "1";
		
	
  }
	
	
	
	
	
	
   }
	
}

?>