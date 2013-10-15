<?php

require_once( "config.php" );
require_once( "clases/Admin.class.php" );
require_once( "clases/Member.class.php" );
require_once( "clases/User.class.php" );
require_once( "clases/Commentss.class.php" );
require_once( "clases/LogEntry.class.php" );
require_once( "clases/LogEntryUsers.class.php" );

function validateField( $fieldName, $missingFields ) {
  if ( in_array( $fieldName, $missingFields ) ) {
    echo ' class="error"';
  }
}

function setChecked( DataObject $obj, $fieldName, $fieldValue ) {
  if ( $obj->getValue( $fieldName ) == $fieldValue ) {
    echo ' checked="checked"';
  }
}

function setSelected( DataObject $obj, $fieldName, $fieldValue ) {
  if ( $obj->getValue( $fieldName ) == $fieldValue ) {
    echo ' selected="selected"';
  }
}

function checkLogin() {
  //session_start();

  if ( !$_SESSION["member"] or !$_SESSION["member"] = Member::getMember( $_SESSION["member"]->getValue( "shopid" ) ) ) {
    $_SESSION["member"] = "";
    header( "Location: login.php" );
    exit;
  } 
  else {
    $logEntry = new LogEntry( array (
      "memberId" => $_SESSION["member"]->getValue( "shopid" ),
      "pageUrl" => basename( $_SERVER["PHP_SELF"] )
    ) );
    $logEntry->record();  
  }
}

function checkLogin_user() {
 // session_start();

  if ( !$_SESSION["user"] or !$_SESSION["user"] = User::getUser( $_SESSION["user"]->getValue( "user_id" ) ) ) {
    $_SESSION["user"] = "";
    header( "Location: login_user.php" );
    exit;
  } 
  else {
    $logEntryUser = new LogEntryUser( array (
      "userId" => $_SESSION["user"]->getValue( "user_id" ),
      "pageUrl" => basename( $_SERVER["PHP_SELF"] )
    ) );
    $logEntryUser->record_user();	
  }
}

function checkLogin_admin() {
  //session_start();
  
  if ( !$_SESSION["admin_user"] or !$_SESSION["admin_user"] = Admin::getAdmin( $_SESSION["admin_user"]->getValue( "username" ) ) ) {
    $_SESSION["admin_user"] = "";
    header( "Location: ../admin/login_admin.php" );
    exit;
  } 
}
function checkLogin_admin2() {
  //session_start();
  
  if ( !$_SESSION["admin_user"] or !$_SESSION["admin_user"] = Admin::getAdmin( $_SESSION["admin_user"]->getValue( "username" ) ) ) {
    $_SESSION["admin_user"] = "";
    header( "Location: ../admin/login_admin.php" );
    exit;
  } 
}

function checkLogin2() {
  session_start();
  
  if ( !$_SESSION["member"] or !$_SESSION["member"] = Member::getMember( $_SESSION["member"]->getValue( "shopid" ) ) ) {
    $_SESSION["member"] = "";
    header( "Location: login.php" );
    exit;
  } else {
    $logEntry = new LogEntry( array (
      "memberId" => $_SESSION["member"]->getValue( "shopid" ),
      "pageUrl" => basename( $_SERVER["PHP_SELF"] )
    ) );
    $logEntry->record();
header('Location: '.$_SERVER['HTTP_REFERER']);

  }
}
function validatetitulo($value)
  {
    return (!preg_match('/[ \-\_\'\"\ª\º\,\.\;\:\¡\!\¿\?\(\)\€\$\&\á\Á\é\É\í\Í\ó\Ó\ú\Ú\ñ\Ñ\ü\Üa-zA-Z0-9]{2,100}$/i', $value) )? 0 : 1;
  }

function validateaddress($value)
  {
    return (!preg_match('/[ \/\.\'\ª\º\-\,\&\á\Á\é\É\í\Í\ó\Ó\ú\Ú\ñ\Ñ\ü\Üa-zA-Z0-9]{2,100}$/i', $value)|| $value==null) ? 0 : 1;
  }
 //\á\Á\é\É\í\Í\ó\Ó\ú\Ú\ñ\Ñ
  
function validatetxtNombre($value)
  {
    return (!preg_match('/[ \ª\º\.\-\'\&\á\Á\é\É\í\Í\ó\Ó\ú\Ú\ñ\Ñ\ü\Üa-zA-Z]{2,100}$/i', $value)) ? 0 : 1;
  }

function validateAuth($value)
  {
    return (!preg_match('/[ \-\_\a-zA-Z0-9]{6,16}$/i', $value)) ? 0 : 1;
  }
function validatearea($value)
  {
    return (strlen($value)>255) ? 0 : 1;
  }
/*
function validatearea($value)
  {
    return (!preg_match('/[ \-\_\'\"\ª\º\,\.\;\:\¡\!\¿\?\(\)\€\$\&\&aacute;\&Aacute;\&eacute;\&Eacute;\&iacute;\&Iacute;\&oacute;\&Oacute;\&uacute;\&Uacute;\&ntilde;\&Ntilde;a-zA-Z0-9]{3,255}$/i', $value)||strlen($value)>255) ? 0 : 1;
  }*/
function validateCif($cif)
  {
            $cif = strtoupper($cif);
			$cif=preg_replace( "/[^A-Z0-9]/", "", $cif );
         for ($i = 0; $i < 10; $i ++)
         {
                  $num[$i] = substr($cif, $i, 1);
				  
         }
//si no tiene un formato valido devuelve error
         if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[XYZ]{1}[0-9]{8}[A-Z]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif))
         {
                  return 0;
         }
//comprobacion de NIFs estandar
         if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif))
         {
                  if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1))
                  {
                           return 1;
                  }
                  else
                  {
                           return -1;
                  }
         }
//algoritmo para comprobacion de codigos tipo CIF
         $suma = $num[2] + $num[4] + $num[6];
         for ($i = 1; $i < 8; $i += 2)
         {
                  $suma += substr((2 * $num[$i]),0,1) + substr((2 * $num[$i]), 1, 1);
         }
         $n = 10 - substr($suma, strlen($suma) - 1, 1);
//comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
         if (preg_match('/^[KLM]{1}/', $cif))
         {
                  if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1))
                  {
                           return 1;
                  }
                  else
                  {
                           return -1;
                  }
         }
//comprobacion de CIFs
         if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif))
         {
                  if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1))
                  {
                           return 2;
                  }
                  else
                  {
                           return -2;
                  }
         }
//comprobacion de NIEs
//T
         if (preg_match('/^[T]{1}/', $cif))
         {
                  if ($num[8] == preg_match('/^[T]{1}[A-Z0-9]{8}$/', $cif))
                  {
                           return 3;
                  }
                  else
                  {
                           return -3;
                  }
         }
//XYZ
         if (preg_match('/^[XYZ]{1}[0-9]{7}[A-Z]{1}/', $cif))
         {
                  if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X','Y','Z'), array('0','1','2'), $cif), 0, 8) % 23, 1))
                  {
                           return 3;
                  }
                  else
                  {
                           return -3;
                  }
         }
		 if (preg_match('/^[XYZ]{1}[0-9]{8}[A-Z]{1}/', $cif))
         {
                  if ($num[9] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X','Y','Z'), array('0','1','2'), $cif), 0, 9) % 23, 1))
                  {
                           return 3;
                  }
                  else
                  {
                           return -3;
                  }
         }
//si todavia no se ha verificado devuelve error
         return 0;	 

  }
  
 	function validateProv($value)
  {  
  if (preg_match('/^[0]{1}$/i', $value))
  return 0;
  else 
  return 1;
  }  

    function validateZip($value)
  {  
  if (!preg_match('/^[0-5]{1}[0-9]{4}$/i', $value))
  return 0;
  else 
  return 1;
  }

 function validateZip2($value)
  {  
  if (!preg_match('/^[280]{3}[0-9]{2}$/i', $value))
  return 0;
  else 
  return 1;
  }

  function validateWeb($value)
  {
    return (!preg_match('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/ i', $value)) ? 0 : 1;
  }
  
  	function validateEmail($value)
  {  
  if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $value))
  return 0;
  else 
  return 1;
  }
  
function validatePhone($value)
  {
    return (!preg_match('/^[0-9]{9}$/i', $value)) ? 0 : 1;
  }

function validateMobile($value)
  {
    return (!preg_match('/^[6]{1}[0-9]{8}$/i', $value)) ? 0 : 1;
  }

  function validateBthDay($value)
  {  
    // validación año nacimiento está entre 1900 y 2000 
    // obtener fecha completa (dd#mm#yyyy)
	 if (!preg_match('/^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$/i', $value)){
		 return 0;
	 }
	 else{
	
    $date = explode('-', $value);
    // la fecha no puede ser validada si no hay día, mes o año  
    if (!$date[0] || !is_numeric($date[0])|| !$date[1] || !is_numeric($date[1])|| !$date[2] || !is_numeric($date[2])) return 0;
    // comprueba la fecha
    return (checkdate($date[1], $date[0], $date[2])) ? 1 : 0;
	 }
  }  
 
  function validateBthDay2($value)
  {  
    // validación año nacimiento está entre 1900 y 2000 
    // obtener fecha completa (dd#mm#yyyy)
	 if (!preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/i', $value)){
		 return 0;
	 }
	 else{
	
    $date = explode('-', $value);
    // la fecha no puede ser validada si no hay día, mes o año  
    if (!$date[0] || !is_numeric($date[0])|| !$date[1] || !is_numeric($date[1])|| !$date[2] || !is_numeric($date[2])) return 0;
    // comprueba la fecha
    return (checkdate($date[1], $date[2], $date[0])) ? 1 : 0;
	 }
  }  
  
  
  
  
/*function validateshopname($value){

$result="SELECT shoname FROM shops, empresas WHERE shopname = :shopname AND shops.empresaid=empresas.empresaid";
return ($result)? 0:1;
}*/

function get_random_word($min_length, $max_length)
// grab a random word from dictionary between the two lengths
// and return it
{
   // generate a random word
  $word = "";
  $dictionary = "members/words.txt";  // the ispell dictionary
  $fp = fopen($dictionary, "r");
  $size = filesize($dictionary);

  // go to a random location in dictionary
  srand ((double) microtime() * 1000000);
  $rand_location = rand(0, $size);
  fseek($fp, $rand_location);

  // get the next whole word of the right length in the file
  while (strlen($word)< $min_length || strlen($word)>$max_length)
  {
     if (feof($fp))
        fseek($fp, 0);        // if at end, go to start
     $word = fgets($fp, 80);  // skip first word as it could be partial
     $word = fgets($fp, 80);  // the potential password
  };
  $word=trim($word); // trim the trailing \n from fgets
  return $word;
}



function new_user()
// set password for username to a random value
// return the new password or false on failure
{
  // get a random dictionary word b/w 6 and 13 chars in length
/*****************************
/*$new_user = date("Ymd");
  // add a number  between 0 and 999 to it
  // to make it a slightly better password
  srand ((double) microtime() * 1000000);
  $rand_number = rand(0, 9999);
  $new_user .= $rand_number;*/

/*********************/
 $new_user = get_random_word(6, 13);

  // add a number  between 0 and 999 to it
  // to make it a slightly better password
  srand ((double) microtime() * 1000000);
  $rand_number = rand(0, 999);
  $new_user .= $rand_number;
  return $new_user;  // changed successfully	
}

  
  // validación año nacimiento y la fecha completa

    
  function delete_format($cadena) {
	$cadena = trim($cadena);
	$cadena = str_replace('&nbsp;', ' ', $cadena);
	$cadena = preg_replace('/\s\s+/', ' ', $cadena);
	return $cadena;
}
function delete_format_text($cadena) {

	$cadena = trim($cadena);
		$cadena=preg_replace( "/[^ \'\"\ª\º\-\_\á\Á\é\É\í\Í\ó\Ó\ú\Ú\ñ\Ñ\ü\Ü\,\.\;\:\¡\!\¿\?\(\)\€\$\%\&a-zA-Z0-9]/", "", $cadena );	
		$cadena = str_replace('&nbsp;', ' ', $cadena);
	$cadena = preg_replace('/\s\s+/', ' ', $cadena);

		return $cadena;

	  } 
	  
function delete_format_address($cadena) {

	$cadena = trim($cadena);
	$cadena=preg_replace( "/\//", " ", $cadena );	
		$cadena = str_replace('&nbsp;', ' ', $cadena);
	$cadena = preg_replace('/\s\s+/', ' ', $cadena);

		return $cadena;

	  }
function delete_format_cif($cadena) {

	$cadena = trim($cadena);
	$cadena=preg_replace( "/\-/", "", $cadena );	
	$cadena = str_replace('&nbsp;', ' ', $cadena);
	$cadena = str_replace(' ', '', $cadena);
	$cadena = preg_replace('/\s\s+/', '', $cadena);

		return $cadena;

	  }
	  
function delete_firm($empresaid)
// Elimina la categoría identificada por catid de la base de datos
// Si hay libros en la categoría, no
// será eliminada y la función devolvera falso.
{
   $conn = db_connect();

   // comprueba si hay algunos libros en la categoría
   // para evitar borrados anómalos
   $query = "select *
             from shops
             where empresaid='$empresaid'";
   $result = @mysql_query($query);
   if (!$result || @mysql_num_rows($result)>0)
   {
     return false;}

   $query = "delete from empresas
             where empresaid='$empresaid'";
   $result = @mysql_query($query);
   if (!$result){
	  
     return false;}
   else{
	 
     return true;}
}	  
/*function Conectarse()
{
if (!($link=mysql_connect("localhost","root","140573")))
{
echo "Error conectando a la base de datos.";
exit();
}
if (!mysql_select_db("mydatabase",$link))
{
echo "Error seleccionando la base de datos.";
exit();
}
if (!mysql_set_charset('utf8', $link)) {
echo "Error: No se pudo establecer el conjunto de caracteres.\n";
exit;
}
return $link;
}*/


function Conectarse()
{
if (!($link=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london")))
{
echo "Error conectando a la base de datos.";
exit();
}
if (!mysql_select_db("a5899716_ddbb",$link))
{
echo "Error seleccionando la base de datos.";
exit();
}
if (!mysql_set_charset('utf8', $link)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
}
return $link;		
}  
?>
