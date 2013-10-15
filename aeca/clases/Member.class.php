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
  
  
class Member extends DataObject {

	protected $data = array
 	(
    "id" => "",
	"empresaid"=>"",
    "txtRazon" => "",
    "cif" => "",
	"RE_Prov" => "",
	"RE_pobla" => "",
    "address_postal" => "",
    "zip_postal" => "",
	
	"shopid" => "",
    "subcatid" => "",
	"shopname" => "",
    "address" => "",
    "zip" => "",
	"web" => "",
	"description" => "",
	
    "username" => "",
    "password" => "",
	"emailAddress" => "",
    "joinDate" => "",
	"alta" => "",
	
	"firstName2"=>"",
	"txtPhone" => "",
	"txtMobile" => "",
	"email" => "",
	
	"favoriteGenre" => "",
    "otherInterests" => "",
	
	"termin" => "" //IMPORTANTE!! NO VA A DB, PERO FIGURA COMO MEMBER
	
  );
  

	private $_conocer = array(
  	"0"=>'[-selecciona-]',
    "sitio" => "Sitio web",
    "google" => "Google",
    "buscador" => "Otros buscadores",
    "prensa" => "Prensa",
    "radio" => "Radio",
    "conocidos" => "Conocidos",
    "otros" => "Otros"
  );
  //ya no utilizo lo siguiente, viene siempre desde base de datos
	private $_subcat = array(
		'0'=>'[-selecciona-]',
		'1'=>'Moda',
		'2'=>'Est&eacute;tica',
		'3'=>'Zapater&iacute;as',
		'4'=>'Complementos',
		'5'=>'Florister&iacute;as',
		'6'=>'Alimentaci&oacute;n',
		'7'=>'Restaurantes',
		'8'=>'Cafeter&iacute;as',
		'9'=>'Hoteles',
		'10'=>'Hostales',
		'11'=>'Consultor&iacute;as',
		'12'=>'Aparcamientos',
		'13'=>'Reparaciones',	
	  	'14'=>'Bares de Copas',
	  	'15'=>'Discotecas',
		'16'=>'Galer&iacute;as de Arte',
		'17'=>'Deportes'
		
	);
  //tampoco utilizo este metodo
	public function getSubcat() {
    return $this->_subcat;
  }

	public static function getMembers( $startRow, $numRows, $order ) {
    $conn = parent::connect();
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM members, contacto_member, shops, otros_members, empresas WHERE empresas.empresaid=shops.empresaid and shops.shopid=members.shopid and members.shopid=contacto_member.shopid and otros_members.shopid=shops.shopid and alta='s' ORDER BY $order LIMIT :startRow, :numRows" ;

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":startRow", $startRow, PDO::PARAM_INT );
      $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
      $st->execute();
      $members = array();
      foreach ( $st->fetchAll() as $row ) {
        $members[] = new Member( $row );
      }
      $st = $conn->query( "SELECT found_rows() as totalRows" );
      $row = $st->fetch();
      parent::disconnect( $conn );
      return array( $members, $row["totalRows"] );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

public static function getEmpresas( $startRow, $numRows, $order ) {
    $conn = parent::connect();
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM empresas ORDER BY $order LIMIT :startRow, :numRows" ;

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":startRow", $startRow, PDO::PARAM_INT );
      $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
      $st->execute();
      $members = array();
      foreach ( $st->fetchAll() as $row ) {
        $members[] = new Member( $row );
      }
      $st = $conn->query( "SELECT found_rows() as totalRows" );
      $row = $st->fetch();
      parent::disconnect( $conn );
      return array( $members, $row["totalRows"] );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  	public static function getSolicitMembers( $startRow, $numRows, $order ) {
    $conn = parent::connect();
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM members, otros_members, contacto_member, shops, empresas WHERE empresas.empresaid=shops.empresaid and shops.shopid=members.shopid and members.shopid=contacto_member.shopid and otros_members.shopid=shops.shopid and alta='n' ORDER BY $order LIMIT :startRow, :numRows" ;

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":startRow", $startRow, PDO::PARAM_INT );
      $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
      $st->execute();
      $members = array();
      foreach ( $st->fetchAll() as $row ) {
        $members[] = new Member( $row );
      }
      $st = $conn->query( "SELECT found_rows() as totalRows" );
      $row = $st->fetch();
      parent::disconnect( $conn );
      return array( $members, $row["totalRows"] );
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
      $members = array();
      foreach ( $st->fetchAll() as $row ) {
        $members[] = new Member( $row );
      }
      $st = $conn->query( "SELECT found_rows() as totalRows" );
      $row = $st->fetch();
      parent::disconnect( $conn );
      return array( $members, $row["totalRows"] );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  	public static function getMember( $shopid ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM members, contacto_member, shops, otros_members, empresas WHERE empresas.empresaid=shops.empresaid and shops.shopid=members.shopid and members.shopid=contacto_member.shopid  and  otros_members.shopid=shops.shopid and alta='s' and
	members.shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $shopid, PDO::PARAM_INT );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
 
 public static function getEmpresa( $empresaid ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM empresas WHERE empresaid = :empresaid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":empresaid", $empresaid, PDO::PARAM_INT );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  	public static function getSolicitMember( $shopid ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM members, contacto_member, shops, otros_members, empresas WHERE empresas.empresaid=shops.empresaid and shops.shopid=members.shopid and members.shopid=contacto_member.shopid  and  otros_members.shopid=shops.shopid and alta='n' and
	members.shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $shopid, PDO::PARAM_INT );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

    public static function getByUsername( $username ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_MEMBERS . " WHERE username = :username";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $username, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  
  public static function getByMunicipioProvincia( $RE_pobla, $RE_Prov ) {
    $conn = parent::connect();
    $sql = "SELECT municipio FROM municipios WHERE id = :RE_pobla and idprovincia= :RE_Prov";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":RE_pobla", $RE_pobla, PDO::PARAM_STR );
	        $st->bindValue( ":RE_Prov", $RE_Prov, PDO::PARAM_STR );

      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
	  else return 0;
	  //return $row[0];
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  } 
  
  
  
  
  
  
  
  
  
  
  
  
    public static function getByUsername2( $username ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM members, contacto_member WHERE members.shopid=contacto_member.shopid and members.username = :username";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $username, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  	public static function getByEmailAddress( $emailAddress ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_MEMBERS . " WHERE emailAddress = :emailAddress";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":emailAddress", $emailAddress, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  	public static function getByShopnameEmpresaid( $shopname,$txtRazon ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM empresas, shops WHERE shops.shopname = :shopname AND empresas.txtRazon= :txtRazon AND shops.empresaid=empresas.empresaid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopname", $shopname, PDO::PARAM_STR );
	  $st->bindValue( ":txtRazon", $txtRazon, PDO::PARAM_STR );

      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  
  	public static function getBytxtRazon( $txtRazon ) {
    $conn = parent::connect();
    $sql = "SELECT txtRazon FROM empresas WHERE txtRazon = :txtRazon";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":txtRazon", $txtRazon, PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
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
   	public function getSubcatOptions() {
    return $this->_subcatOptions;
  }
	public function getEmpresaBytxtRazon( $txtRazon ) {
    $conn = parent::connect();
    $sql = "SELECT txtRazon FROM " . TBL_EMPRESA ;

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":txtRazon", $txtRazon, PDO::PARAM_STR );
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
 
	public function insert() {
	  
	$conn = parent::connect();
	    $sql = "SELECT txtRazon FROM " . TBL_EMPRESA . " WHERE txtRazon=:txtRazon";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":txtRazon", $this->data["txtRazon"], PDO::PARAM_STR );
      $st->execute();

      if ( !$st->fetch() ) { //si no existe ya la emperesa en la base, la inserto
       
 
    $sql = "INSERT INTO " . TBL_EMPRESA . " (
	              
              txtRazon,
			  cif,
			  address_postal,	  
              RE_Prov,
              RE_pobla,
              zip_postal
            ) VALUES (
              :txtRazon,
              :cif, 
 		      :address_postal,
              :RE_Prov,
              :RE_pobla,
              :zip_postal
			  
            )";
			        $st = $conn->prepare( $sql );
 	  $st->bindValue( ":txtRazon", $this->data["txtRazon"], PDO::PARAM_STR );
	  $st->bindValue( ":cif", $this->data["cif"], PDO::PARAM_STR );
	  $st->bindValue( ":address_postal", $this->data["address_postal"], PDO::PARAM_STR );
      $st->bindValue( ":RE_Prov", $this->data["RE_Prov"], PDO::PARAM_STR );
      $st->bindValue( ":RE_pobla", $this->data["RE_pobla"], PDO::PARAM_STR );
      $st->bindValue( ":zip_postal", $this->data["zip_postal"], PDO::PARAM_STR );

        $st->execute();
      }

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }

    $conn = parent::connect();
	
		 //obtengo el empresaid de txtRazon, para insertarlo en la tabla shops

		  	  $this->data["empresaid"] = $this->getEmpresaidBytxtRazon($this->data["txtRazon"]);

    $sql = "INSERT INTO " . TBL_SHOPS . " (
              subcatid,
              empresaid,
              shopname,
              address,
			  zip,
              web
            ) VALUES(
              :subcatid,
              :empresaid,
              :shopname,
              :address,
			  :zip,
              :web
            )";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":subcatid", $this->data["subcatid"], PDO::PARAM_STR );
      $st->bindValue( ":empresaid", $this->data["empresaid"], PDO::PARAM_STR );
	  $st->bindValue( ":shopname", $this->data["shopname"], PDO::PARAM_STR );
	  $st->bindValue( ":address", $this->data["address"], PDO::PARAM_STR );
	  $st->bindValue( ":zip", $this->data["zip"], PDO::PARAM_STR );
	  $st->bindValue( ":web", $this->data["web"], PDO::PARAM_STR );

      $st->execute();


      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
	
    $conn = parent::connect();
	
			 //obtengo el shopid de shopname y txtRazon, para insertarlo en la tabla members
	
		  $this->data["shopid"] = $this->getShopidByShopname_txtRazon($this->data["shopname"], $this->data["txtRazon"]);

    $sql = "INSERT INTO " . TBL_MEMBERS . " (
	  		  shopid,
              username,
              joinDate,
              emailAddress,
			   alta
            ) VALUES(
				:shopid,
              :username,
              :joinDate,
              :emailAddress,
			  :alta
            )";

    try {
      $st = $conn->prepare( $sql );
	        $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_STR );

      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      $st->bindValue( ":joinDate", $this->data["joinDate"], PDO::PARAM_STR );
	  $st->bindValue( ":emailAddress", $this->data["emailAddress"], PDO::PARAM_STR );
	  $st->bindValue( ":alta", $this->data["alta"], PDO::PARAM_STR );

      $st->execute();

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
			
	$conn = parent::connect();
    $sql = "INSERT INTO " . TBL_OTROS . " (
              shopid,
              favoriteGenre,
              otherInterests			 
            ) VALUES(
			 :shopid,
              :favoriteGenre,
              :otherInterests

            )";
 
     try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_STR );
	  $st->bindValue( ":favoriteGenre", $this->data["favoriteGenre"], PDO::PARAM_STR );
      $st->bindValue( ":otherInterests", $this->data["otherInterests"], PDO::PARAM_STR );
      $st->execute();
	
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    } 
	  $conn = parent::connect();
	  
    $sql4 = "INSERT INTO " . TBL_CONTACTO . " (
	          shopid,
			  txtPhone,
			  txtMobile,
			  email, 
			  firstName2		 

            ) VALUES(
			  :shopid,
			  :txtPhone,
			  :txtMobile,
			  :email,
			  :firstName2

            )";

    try {
      $st = $conn->prepare( $sql4 );
      $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_STR );
      $st->bindValue( ":txtPhone", $this->data["txtPhone"], PDO::PARAM_STR );    
	  $st->bindValue( ":txtMobile", $this->data["txtMobile"], PDO::PARAM_STR );
      $st->bindValue( ":email", $this->data["email"], PDO::PARAM_STR );
      $st->bindValue( ":firstName2", $this->data["firstName2"], PDO::PARAM_STR );

      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public function update_empresa() {
	  
	$conn = parent::connect();
    $sql = "UPDATE " . TBL_EMPRESA . " SET
			empresaid= :empresaid,
            txtRazon = :txtRazon,
            cif = :cif,
            address_postal = :address_postal,
		    zip_postal = :zip_postal,
			RE_Prov = :RE_Prov,
			RE_pobla = :RE_pobla
            WHERE empresaid = :empresaid";

    try {
      $st = $conn->prepare( $sql );
	        $st->bindValue( ":empresaid", $this->data["empresaid"], PDO::PARAM_INT );     

      $st->bindValue( ":txtRazon", $this->data["txtRazon"], PDO::PARAM_STR );     
      $st->bindValue( ":cif", $this->data["cif"], PDO::PARAM_STR );
      $st->bindValue( ":address_postal", $this->data["address_postal"], PDO::PARAM_STR );
      $st->bindValue( ":zip_postal", $this->data["zip_postal"], PDO::PARAM_STR );
      $st->bindValue( ":RE_Prov", $this->data["RE_Prov"], PDO::PARAM_STR );
      $st->bindValue( ":RE_pobla", $this->data["RE_pobla"], PDO::PARAM_STR );

      $st->execute();
	  
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
 
  }
  public function update() {
 
 $conn = parent::connect();
    $passwordSql = $this->data["password"] ? "password = password(:password), " : "";
    $sql = "UPDATE " . TBL_MEMBERS . " SET
	              shopid = :shopid,

              username = :username,
			   $passwordSql        
              joinDate = :joinDate,
              emailAddress = :emailAddress,
			  alta=:alta
            WHERE shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
	        $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_INT );

      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      if ( $this->data["password"] ) $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
      $st->bindValue( ":joinDate", $this->data["joinDate"], PDO::PARAM_STR );
      $st->bindValue( ":emailAddress", $this->data["emailAddress"], PDO::PARAM_STR );
      $st->bindValue( ":alta", $this->data["alta"], PDO::PARAM_STR );

      $st->execute();
	  
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }	  
   $conn = parent::connect();
   		  	  $this->data["empresaid"] = $this->getEmpresaidBytxtRazon($this->data["txtRazon"]);

    $sql = "UPDATE " . TBL_SHOPS . " SET
		       shopid = :shopid,
			   			  		      subcatid = :subcatid,
                           empresaid = :empresaid,

			  		      shopname = :shopname,
			  		      address = :address,
			  		      zip = :zip,
			  		      web = :web

            
            WHERE shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_INT );
	        $st->bindValue( ":empresaid", $this->data["empresaid"], PDO::PARAM_INT );

      $st->bindValue( ":shopname", $this->data["shopname"], PDO::PARAM_STR );
      $st->bindValue( ":address", $this->data["address"], PDO::PARAM_STR );
      $st->bindValue( ":zip", $this->data["zip"], PDO::PARAM_STR );
      $st->bindValue( ":subcatid", $this->data["subcatid"], PDO::PARAM_STR );
      $st->bindValue( ":web", $this->data["web"], PDO::PARAM_STR );

      $st->execute();
	  
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
	    $conn = parent::connect();
    $sql = "UPDATE " . TBL_CONTACTO . " SET
		       shopid = :shopid,

              firstName2 = :firstName2,
              txtPhone = :txtPhone,
			  txtMobile = :txtMobile

              WHERE shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_INT );

      $st->bindValue( ":firstName2", $this->data["firstName2"], PDO::PARAM_STR );
      $st->bindValue( ":txtPhone", $this->data["txtPhone"], PDO::PARAM_STR );
      $st->bindValue( ":txtMobile", $this->data["txtMobile"], PDO::PARAM_STR );

      $st->execute();
	  
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }

	    $conn = parent::connect();
    $sql = "UPDATE " . TBL_OTROS . " SET
		       shopid = :shopid,

              favoriteGenre = :favoriteGenre,
              otherInterests = :otherInterests
              WHERE shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_INT );

      $st->bindValue( ":favoriteGenre", $this->data["favoriteGenre"], PDO::PARAM_STR );
      $st->bindValue( ":otherInterests", $this->data["otherInterests"], PDO::PARAM_STR );
      $st->execute();
	  
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
 
  	public function delete() {
    $conn = parent::connect();
    $sql = "DELETE FROM " . TBL_MEMBERS . " WHERE shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_INT );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
	   $conn = parent::connect();
    $sql = "DELETE FROM " . TBL_CONTACTO . " WHERE shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_INT );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
	
		   $conn = parent::connect();
    $sql = "DELETE FROM " . TBL_OTROS . " WHERE shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_INT );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }

		   $conn = parent::connect();
    $sql = "DELETE FROM " . TBL_SHOPS . " WHERE shopid = :shopid";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":shopid", $this->data["shopid"], PDO::PARAM_INT );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
		$conn = parent::connect();
	    $sql = "SELECT shopid FROM " .  TBL_SHOPS . " WHERE  empresaid=:empresaid";

        try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":empresaid", $this->data["empresaid"], PDO::PARAM_STR );
      $st->execute();

      if ( !$st->fetch() ) { //si no existe ya ninguna tienda de la empresa en la base, la borro
       
 
    $sql = "DELETE FROM " . TBL_EMPRESA . " WHERE empresaid = :empresaid";
	              
			        $st = $conn->prepare( $sql );
 	  $st->bindValue( ":empresaid", $this->data["empresaid"], PDO::PARAM_INT );

        $st->execute();
		echo "Se ha borrado el establecimiento. Se ha borrado también la empresa porque no tenía más establecimientos asociados.";
      }
	  else
	  {echo "Se ha borrado el establecimiento. Mantendremos la empresa porque tiene más establecimientos asociados en la base de datos.";
	  }

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }	
	

	}

	public function delete_empresa() {
    		$conn = parent::connect();
	    $sql = "SELECT shopid FROM " .  TBL_SHOPS . " WHERE  empresaid=:empresaid";

        try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":empresaid", $this->data["empresaid"], PDO::PARAM_STR );
      $st->execute();

      if ( !$st->fetch() ) { //si no existe ya ninguna tienda de la empresa en la base, la borro
       
 
    $sql = "DELETE FROM " . TBL_EMPRESA . " WHERE empresaid = :empresaid";
	              
			        $st = $conn->prepare( $sql );
 	  $st->bindValue( ":empresaid", $this->data["empresaid"], PDO::PARAM_INT );

        $st->execute();
		echo "Se ha borrado la empresa.";
      }
	  else
	  {echo "No se puede borrar la empresa porque tiene comercios asociados en la base de datos.";
	  }

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }

	}
	
	
	
	
	
   public function update2() {
    $conn = parent::connect();
    $sql = "UPDATE " . TBL_USERS . " SET
              user_name = :user_name,
              email = :email,
            WHERE id = :id";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":id", $this->data["id"], PDO::PARAM_INT );
      $st->bindValue( ":user_name", $this->data["user_name"], PDO::PARAM_STR );
      $st->bindValue( ":email", $this->data["email"], PDO::PARAM_STR );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  
  public function delete2() {
    $conn = parent::connect();
    $sql = "DELETE FROM " . TBL_USERS . " WHERE id = :id";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":id", $this->data["id"], PDO::PARAM_INT );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }
  
 	 public function authenticate() {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_MEMBERS . " WHERE username = :username AND password = password(:password)";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $this->data["username"], PDO::PARAM_STR );
      $st->bindValue( ":password", $this->data["password"], PDO::PARAM_STR );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Member( $row );
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
      //if ( $row ) echo new Member( $row );
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
      //if ( $row ) echo new Member( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    } 
	} 
	
public function getPersonaidByDNI( $dni ) {
    $conn = parent::connect();
    $sql = "SELECT firstName2 FROM " . TBL_PERSONA . " WHERE dni = :dni";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":dni", $dni, PDO::PARAM_STR );
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
      //if ( $row ) echo new Member( $row );
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
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

} //fin clase Member
?>
