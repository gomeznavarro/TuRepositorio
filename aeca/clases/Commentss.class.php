<?php

require_once "DataObject.class.php";

  
//$con = mysql_connect("mysql7.000webhost.com","a5899716_silvia","160989london");
//$bd   =mysql_select_db("a6769825_ddbb",$con);

$con = mysql_connect("localhost","root","140573");
$bd   = mysql_select_db("mydatabase");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
if (!mysql_set_charset('utf8', $con)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
} 
  



class Commentss extends DataObject {
protected $data = array
 (
 
    "firstName" => "",
	"emailAddress" => "",
		"joinDate" => "",
   	"otherInterests" => ""

  );
  
  
 protected $data_socios = array
 (
 
    "username" => "",
		"mensDate" => "",
   	"otherInterests" => ""

  );



  
  


  
    

  

  
public function insert44() {	  

    $conn = parent::connect();

    $sql = "INSERT INTO " . TBL_COMMENTS . " (
              joinDate,
              emailAddress,
              firstName,
              otherInterests

            ) VALUES(
              :joinDate,
              :emailAddress,
              :firstName,
              :otherInterests


            )";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":joinDate", $this->data["joinDate"], PDO::PARAM_STR );
	  $st->bindValue( ":emailAddress", $this->data["emailAddress"], PDO::PARAM_STR );
      $st->bindValue( ":firstName", $this->data["firstName"], PDO::PARAM_STR );
      $st->bindValue( ":otherInterests", $this->data["otherInterests"], PDO::PARAM_STR );


      $st->execute();

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
}
public function insert_mens_socios() {	  

    $conn = parent::connect();

    $sql = "INSERT INTO mensajes_socios (

              joinDate,
              firstName,
              otherInterests

            ) VALUES(
              :joinDate,
              :firstName,
              :otherInterests


            )";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":joinDate", $this->data["joinDate"], PDO::PARAM_STR );
      $st->bindValue( ":firstName", $this->data["firstName"], PDO::PARAM_STR );
      $st->bindValue( ":otherInterests", $this->data["otherInterests"], PDO::PARAM_STR );


      $st->execute();

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
}









} //fin clase




?>
