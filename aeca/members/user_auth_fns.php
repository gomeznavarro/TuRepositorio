<?php 

require_once("../config.php");
require_once("db_fns.php");

function login($username, $password)
// check username and password with db
// if yes, return true
// else return false
{
  // connect to db
  $conn = db_connect();
  if (!$conn)
    return 0;

  // check if username is unique
  
  $result = mysql_query("select * from members
                         where username='$username'
                         and password = password('$password')");

                         
  if (!$result){
    
     return 0;
     }

  if (mysql_num_rows($result)>0)
     {return 1;
     }
  else{
    
     return 0;
     }
}
function login_email($old_username, $emailAddress)
// check username and password with db
// if yes, return true
// else return false
{
  // connect to db
  $conn = db_connect();
  if (!$conn)
    return 0;

  // check if username is unique
  
  $result = mysql_query("select * from members
                         where username='$old_username'
                         and emailAddress = '$emailAddress'");

	                                
  if (!$result){
    
     return 0;
     }

  if (mysql_num_rows($result)>0)
     {
		
		return 1;
     }
  else{
    
     return 0;
     }
}
function usuario_unico($new_username)
// check username and password with db
// if yes, return true
// else return false
{
  // connect to db
  $conn = db_connect();
  if (!$conn)
    return 0;

  // check if username is unique
  
  $result = mysql_query("select username from members
                         where username='$new_username'");

	                                
  if (!$result){
     return 0;
     }

  if (mysql_num_rows($result)>0)
     {return 0;
     }
  if (mysql_num_rows($result)==0)
     {
     return 1;
     }
}
function check_valid_user()
// see if somebody is logged in and notify them if not
{
  
  if ($_SESSION["valid_user"])
  {
      $valid_user=$_SESSION["valid_user"];
      echo "Logged in como $valid_user.";
      echo "<br>";
  }
  else
  {
     // they are not logged in
     do_html_heading("Problema:");
     echo "No estás logged in.<br>";
     do_html_url("login.php", "Login");
     do_html_footer();
     exit;
  }
}

function change_password($username, $old_password, $new_password)
// change password for username/old_password to new_password
// return true or false
{
  // if the old password is right
  // change their password to new_password and return true
  // else return false
  if (login($username, $old_password))
  { 
    if (!($conn = db_connect()))
      return false;
    $result = mysql_query( "update members
                            set password = password('$new_password')
                            where username = '$username'");
    if (!$result)
      return false;  // not changed
    else
      return true;  // changed successfully
  }
  else
    return false; // old password was wrong
}



function reset_password($username){
  // utilizaré la fecha actual  
  $new_password = date("Ymd");
  // más un número al azar del 0 al 9999
  srand ((double) microtime() * 1000000);
  $rand_number = rand(0, 9999);
  $new_password .= $rand_number;

  // la inserto en la bd o lanzo error
  if (!($conn = db_connect()))
      return false;
  
  	$result = mysql_query( "select username from members
                          where username = '$username' and alta='s'"); //han de ser realmente socios dados de alta (alta=s)						  
						  
	if (!$result){
     return false;
     }

  if (mysql_num_rows($result)==0)
     {echo "<p>Si te has registrado hace poco, quiz&aacute; a&uacute;n no est&eacute;s dado de alta. Si ya has recibido el email de confirmaci&oacute;n, ponte en contacto con nosotros.</p>";
	 echo '<p>Si a&uacute;n no te has registrado hazlo<a class="avance" href="../register.php"> aqu&iacute;</a></p>';
		 return false;
     }
  if (mysql_num_rows($result)>0)
     {
    
  				$result = mysql_query( "update members
                          set password = password('$new_password')
                          where (username = '$username' and alta='s')");
  				if (!$result)
    			return false;  // not changed
  				else
    			return $new_password;  // changed successfully
  }
  else return false;
}

function notify_password($username, $new_password)
// notify the user that their password has been changed
{
    if (!($conn = db_connect()))
      return false;
    $result = mysql_query("select emailAddress from members
                            where username='$username' and alta='s'");
    if (!$result)
      return false;  // not changed
    else if (mysql_num_rows($result)==0)
      return false; // username not in db
    else
    {
		echo "<p>Tu contrase&ntilde;a de AECA ha sido cambiada y se te enviar&aacute; por email.</p>";

     $email = mysql_result($result, 0, "emailAddress");	 
      $from = "From: silvia@salcedomacias.netii.net \r\n";
      $mesg = "Tu contraseña de AECA ha sido cambiada a $new_password \r\n"
	   ."Por favor utilízala la próxima ver que hagas log in y cámbiala por una que recuerdes fácilmente \r\n"
              ."Un saludo del equipo de AECA - Asociación de Empresarios y Comerciantes de Atocha \r\n";
      if (mail($email, "Login información de AECA", $mesg, $from))
        return true;
      else
        return false;
    }
}
function change_user($emailAddress, $old_username, $new_username){
		// change user for email/old_username to new_username
		// if the old username is right
		  // change their username to new_username and return true
		// else return false
 
    	if (!($conn = db_connect()))
      	return false;
			
   		$result = mysql_query( "update members
                            set username = '$new_username'
                            where emailAddress = '$emailAddress'");
    	if (!$result)	
      	return false;  // not changed
   		else
      	return true;  // changed successfully
  
}

function notify_user($emailAddress)
// notify the user that their user has been changed
{
    if (!($conn = db_connect()))
      return false;
    $result = mysql_query("select * from members
                            where emailAddress='$emailAddress' and alta='s'");
    if (!$result)
      return false;  // not changed
    else if (mysql_num_rows($result)==0)
	{echo "<div id=\"principal\"class=\"letreros\"><p>Si te has registrado hace poco, quiz&aacute; a&uacute;n no est&eacute;s dado de alta. Si ya has recibido el email de confirmaci&oacute;n, ponte en contacto con nosotros.</p>";
	 echo '<p>Si a&uacute;n no te has registrado hazlo<a class="avance" href="../register.php"> aqu&iacute;</a></p></div>';
      return false;} // username not in db
	  
    else{
  $username = mysql_result($result, 0, "username");
echo "<div id=\"principal\"class=\"letreros\"><p>Tu username es <strong>$username</strong></p></div>";
			//FUNCIONA LO SIGUIENTE, VOLVER A CAMBIAR AL FINAL
     $email = mysql_result($result, 0, "emailAddress");	 
      $from = "From: silvia@salcedomacias.netii.net \r\n";
      $mesg = "Tu usuario de AECA es $username \r\n"
	   ."Por favor utilízalo la próxima ver que accedas a nuestro sitio \r\n"
              ."Un saludo del equipo de AECA - Asociación de Empresarios y Comerciantes de Atocha \r\n";
      if (mail($email, "Login información de AECA", $mesg, $from))
        return true;
      else
        return false;


   }
}


?>