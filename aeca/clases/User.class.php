<?php

require_once "DataObject.class.php";

$con = mysql_connect("localhost","root","140573");
//$con = mysql_connect("mysql7.000webhost.com","a5899716_silvia","160989london");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
   if (!mysql_set_charset('utf8', $con)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
}




class User extends DataObject {
protected $data = array
 (
    "id" => "",
 
    "user_id" => "",
    "username" => "",
    "password" => "",
	"joinDate" => "",

    "firstName" => "",
	"address_postal" => "",
    "zip_postal" => "",
	"RE_Prov" => "",
	"RE_pobla" => "",
    
	"gender" => "",	
	"txtBthDay" => "",
    
	"emailAddress" => "",
	"txtPhone" => "",
	"txtMobile" => "",
	
	"favoriteGenre" => "",
    "otherInterests" => "",
	"termin" => ""

  );
  
 /* private $_genres = array(
  '0'=>'[-selecciona-]',
    "crime" => "Crime",
    "horror" => "Horror",
    "thriller" => "Thriller",
    "romance" => "Romance",
    "sciFi" => "Sci-Fi",
    "adventure" => "Adventure",
    "nonFiction" => "Non-Fiction"
  );*/

private $_conocer = array(
  '0'=>'[-selecciona-]',
    "sitio" => "Sitio web",
    "google" => "Google",
    "buscador" => "Otros buscadores",
    "prensa" => "Prensa",
    "radio" => "Radio",
    "conocidos" => "Conocidos",
    "otros" => "Otros"
  );

  public static function getUsers( $startRow, $numRows, $order ) {
    $conn = parent::connect();
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM users ORDER BY $order LIMIT :startRow, :numRows" ;

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":startRow", $startRow, PDO::PARAM_INT );
      $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
      $st->execute();
      $users = array();
      foreach ( $st->fetchAll() as $row ) {
        $users[] = new User( $row );
      }
      $st = $conn->query( "SELECT found_rows() as totalRows" );
      $row = $st->fetch();
      parent::disconnect( $conn );
      return array( $users, $row["totalRows"] );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
   
 public static function getProv( $startRow, $numRows, $order ) {
    $conn = parent::connect();
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . TBL_CLIENTES . " ORDER BY $order LIMIT :startRow, :numRows";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":startRow", $startRow, PDO::PARAM_INT );
      $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
      $st->execute();
      $users = array();
      foreach ( $st->fetchAll() as $row ) {
        $users[] = new User( $row );
      }
      $st = $conn->query( "SELECT found_rows() as totalRows" );
      $row = $st->fetch();
      parent::disconnect( $conn );
      return array( $users, $row["totalRows"] );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  public static function getUser( $user_id ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM users WHERE user_id = :user_id";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":user_id", $user_id, PDO::PARAM_INT );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new User( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

    public static function getByUsername( $username ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_USERS . " WHERE username = :username";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $username, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new User( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
    

public static function getByUsername2( $username ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM users WHERE users.username = :username";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $username, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new User( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public static function getByEmailAddress( $emailAddress ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_USERS . " WHERE emailAddress = :emailAddress";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":emailAddress", $emailAddress, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new User( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public function getGenderString() {
    return ( $this->data["gender"] == "f" ) ? "Mujer" : "Hombre";
  }

  /*public function getFavoriteGenreString() {
    return ( $this->_genres[$this->data["favoriteGenre"]] );
  }

  public function getGenres() {
    return $this->_genres;
  }*/

    public function getConocer() {
    return $this->_conocer;
  }
  public function getFavoriteConocer() {
    return ( $this->_conocer[$this->data["favoriteGenre"]] );
  }

	public function getFavoriteSubcatOption() {
    return ( $this->_subcatOptions[$this->data["subcatid"]] );
  }

  
	public function insert2() {	  

    $conn = parent::connect();

    $sql = "INSERT INTO " . TBL_USERS . " (
	  		  user_id,
              username,
			  password,
              joinDate,
              emailAddress,
              firstName,
              gender,
			  txtBthDay,
              favoriteGenre,
              otherInterests,
			  address_postal,
			  zip_postal,
			  RE_Prov,
			  RE_pobla,
			  txtPhone,
			  txtMobile		 

            ) VALUES(
			  :user_id,
              :username,
			  password(:password),
              :joinDate,
              :emailAddress,
              :firstName,
              :gender,
			  :txtBthDay,
              :favoriteGenre,
              :otherInterests,
			  :address_postal,
			  :zip_postal,
			  :RE_Prov,
			  :RE_pobla,
			  :txtPhone,
			  :txtMobile	

            )";

    try {
      $st = $conn->prepare( $sql );
	  $st->bindValue( ":user_id", $this->data["user_id"], PDO::PARAM_STR );
      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
	  $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
      $st->bindValue( ":joinDate", $this->data["joinDate"], PDO::PARAM_STR );
	  $st->bindValue( ":emailAddress", $this->data["emailAddress"], PDO::PARAM_STR );
      $st->bindValue( ":firstName", $this->data["firstName"], PDO::PARAM_STR );
	  $st->bindValue( ":gender", $this->data["gender"], PDO::PARAM_STR );
      $st->bindValue( ":txtBthDay", $this->data["txtBthDay"], PDO::PARAM_STR );
	  $st->bindValue( ":favoriteGenre", $this->data["favoriteGenre"], PDO::PARAM_STR );
      $st->bindValue( ":otherInterests", $this->data["otherInterests"], PDO::PARAM_STR );
	  $st->bindValue( ":address_postal", $this->data["address_postal"], PDO::PARAM_STR );
      $st->bindValue( ":zip_postal", $this->data["zip_postal"], PDO::PARAM_STR );
	  $st->bindValue( ":RE_Prov", $this->data["RE_Prov"], PDO::PARAM_STR );
      $st->bindValue( ":RE_pobla", $this->data["RE_pobla"], PDO::PARAM_STR );
      $st->bindValue( ":txtPhone", $this->data["txtPhone"], PDO::PARAM_STR );
      $st->bindValue( ":txtMobile", $this->data["txtMobile"], PDO::PARAM_STR );


      $st->execute();

      parent::disconnect( $conn );
    } 
	catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "La consulta fall&oacute;: " . $e->getMessage() );
    }
  }

  public function update() {
		$conn = parent::connect();
	    $passwordSql = $this->data["password"] ? "password = password(:password), " : "";

    $sql = "UPDATE " . TBL_USERS . " SET
	 				
			  user_id=:user_id,
              username = :username,
			  $passwordSql        
              joinDate = :joinDate,
              emailAddress = :emailAddress,
			  firstName=:firstName,
              gender=:gender,
			  txtBthDay=:txtBthDay,
			  favoriteGenre=:favoriteGenre,
              otherInterests=:otherInterests,
			  address_postal=:address_postal,
			  zip_postal=:zip_postal,
			  RE_Prov=:RE_Prov,
			  RE_pobla= :RE_pobla,
			  txtPhone= :txtPhone,
			  txtMobile= :txtMobile	
			  			
            WHERE user_id = :user_id";

    try {
      $st = $conn->prepare( $sql );
	  $st->bindValue( ":user_id", $this->data["user_id"], PDO::PARAM_INT );
      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      if ( $this->data["password"] ) $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
      $st->bindValue( ":joinDate", $this->data["joinDate"], PDO::PARAM_STR );
	  $st->bindValue( ":emailAddress", $this->data["emailAddress"], PDO::PARAM_STR );
      $st->bindValue( ":firstName", $this->data["firstName"], PDO::PARAM_STR );
      $st->bindValue( ":gender", $this->data["gender"], PDO::PARAM_STR );
      $st->bindValue( ":txtBthDay", $this->data["txtBthDay"], PDO::PARAM_STR );
	  $st->bindValue( ":favoriteGenre", $this->data["favoriteGenre"], PDO::PARAM_STR );
      $st->bindValue( ":otherInterests", $this->data["otherInterests"], PDO::PARAM_STR );
	  $st->bindValue( ":address_postal", $this->data["address_postal"], PDO::PARAM_STR );
      $st->bindValue( ":zip_postal", $this->data["zip_postal"], PDO::PARAM_STR );
	  $st->bindValue( ":RE_Prov", $this->data["RE_Prov"], PDO::PARAM_STR );
      $st->bindValue( ":RE_pobla", $this->data["RE_pobla"], PDO::PARAM_STR );
      $st->bindValue( ":txtPhone", $this->data["txtPhone"], PDO::PARAM_STR );
      $st->bindValue( ":txtMobile", $this->data["txtMobile"], PDO::PARAM_STR );
 
      $st->execute();
	  
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }	  
    
  }
 
  public function delete() {
    $conn = parent::connect();
    $sql = "DELETE FROM users WHERE user_id = :user_id";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":user_id", $this->data["user_id"], PDO::PARAM_INT );
      $st->execute();
	  echo "Se ha borrado el cliente.";

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  
  public function authenticate() {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_USERS . " WHERE username = :username AND password = password(:password)";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new User( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

    public function getidByUsername( $username ) {
    $conn = parent::connect();
    $sql = "SELECT id FROM " . TBL_MEMBERS . " WHERE username = :username";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $username, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
	  return $row[0];
      //if ( $row ) echo new User( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

 	public function getEmpresaidBytxtRazon( $txtRazon ) {
    $conn = parent::connect();
    $sql = "SELECT empresaid FROM " . TBL_EMPRESA . " WHERE txtRazon = :txtRazon";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":txtRazon", $txtRazon, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
	  return $row[0];
      //if ( $row ) echo new User( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  } 

	public function getPersonaidByDNI( $dni ) {
    $conn = parent::connect();
    $sql = "SELECT firstName FROM " . TBL_PERSONA . " WHERE dni = :dni";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":dni", $dni, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
	  return $row[0];
      //if ( $row ) echo new User( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  } 

 	public function getShopidByShopname_txtRazon( $shopname, $txtRazon ) {
    $conn = parent::connect();
    $sql = "SELECT shopid FROM shops, empresas WHERE shopname = :shopname AND txtRazon=:txtRazon and shops.empresaid=empresas.empresaid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopname", $shopname, PDO::PARAM_STR );
	        $st->bindValue( ":txtRazon", $txtRazon, PDO::PARAM_STR );

      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
	  return $row[0];
      //if ( $row ) echo new User( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    } 
  } 

 	public function getprovinciaByRE_Prov( $RE_Prov ) {
    $conn = parent::connect();
    $sql = "SELECT provincia FROM provincias WHERE id = :RE_Prov";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":RE_Prov", $RE_Prov, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
	  return $row[0];
      //if ( $row ) echo new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    } 
  } 	
	
	public function getmunicipioByRE_pobla( $RE_pobla ) {
    $conn = parent::connect();
    $sql = "SELECT municipio FROM municipios WHERE id = :RE_pobla";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":RE_pobla", $RE_pobla, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
	  return $row[0];
      //if ( $row ) echo new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    } 
  } 	

} //fin clase
?>
