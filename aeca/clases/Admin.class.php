<?php

require_once "DataObject.class.php";

$con = mysql_connect("localhost","root","140573");
//$con = mysql_connect("mysql7.000webhost.com","a5899716_silvia","160989london");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
  
class Admin extends DataObject {
protected $data = array
 (
    "username" => "",
    "password" => ""
  );
  
  

  public static function getAdmin( $username ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM admin WHERE 
	username = :username";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $username, PDO::PARAM_INT );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Admin( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public static function getByUsername( $username ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM admin WHERE username = :username";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $username, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Admin( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public function insert() {
	  
	$conn = parent::connect();	

    $sql = "INSERT INTO admin (	  		  
             	username,
          		passwd
            ) VALUES(				
              :username,
              password(:password)
            )";

    try {
      $st = $conn->prepare( $sql );

      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );

      $st->execute();

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }			
			  }

  public function update() {
    $conn = parent::connect();
    $passwordSql = $this->data["password"] ? "passwd = password(:password)" : "";
    $sql = "UPDATE admin SET
              username = :username,
              $passwordSql             
            WHERE username = :username";

    try {
      $st = $conn->prepare( $sql );

      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      if ( $this->data["password"] ) $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
     

      $st->execute();
	  
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
	   
  }

  public function delete() {
    $conn = parent::connect();
    $sql = "DELETE FROM admin WHERE username = :username";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }

  }
  public function authenticate() {
    $conn = parent::connect();
    $sql = "SELECT * FROM admin WHERE username = :username AND passwd = password(:password)";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Admin( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }



 












}




?>
