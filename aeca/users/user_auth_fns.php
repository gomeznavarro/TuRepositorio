<?php 

require_once("../config.php");
//require_once("../admin/db_fns.php");

function db_connect4()
{
   $result = @mysql_pconnect("mysql7.000webhost.com", "a5899716_silvia", "160989london");
   if (!$result)
      return false;
   if (!@mysql_select_db("a5899716_ddbb"))
      return false;

   return $result;
}

/*function db_connect4()
{
   $result = @mysql_pconnect("localhost", "root", "140573");
   if (!$result)
      return false;
   if (!@mysql_select_db("mydatabase"))
      return false;

   return $result;
}*/




function login($username, $password)
// check username and password with db
// if yes, return true
// else return false
{
  // connect to db
  $conn = db_connect4();
  if (!$conn)
    return 0;

  // check if username is unique
  
  $result = mysql_query("select * from users
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
  $conn = db_connect4();
  if (!$conn)
    return 0;

  // check if username is unique
  
  $result = mysql_query("select * from users
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
  $conn = db_connect4();
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
    if (!($conn = db_connect4()))
      return false;
    $result = mysql_query( "update users
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



function reset_password($username)
// set password for username to a random value
// return the new password or false on failure
{
  // get a random dictionary word b/w 6 and 13 chars in length
  
  /****************************
 /*$new_password = get_random_word(6, 13);

  // add a number  between 0 and 999 to it
  // to make it a slightly better password
  srand ((double) microtime() * 1000000);
  $rand_number = rand(0, 999);
  $new_password .= $rand_number;*/
  /******************************/
  $new_password = date("Ymd");
  // add a number  between 0 and 999 to it
  // to make it a slightly better password
  srand ((double) microtime() * 1000000);
  $rand_number = rand(0, 9999);
  $new_password .= $rand_number;


  // set user's password to this in database or return false
  //$new_password = 'gato';
  if (!($conn = db_connect4()))
  {echo "No se ha podido establecer la conexi&oacute;n";
      return false;}
  $result = mysql_query( "select username from users
                          where username = '$username'");
						  
						  
	if (!$result){
		
     return false;
     }

  if (mysql_num_rows($result)==0)
     {echo "<div id=\"principal\"class=\"letreros\"><p>No existe ese usuario. </p>";
	 echo '<p>Si a&uacute;n no te has registrado hazlo<a class="avance" href="../register_user.php"> aqu&iacute;</a></p></div>';
		 return false;
     }
  if (mysql_num_rows($result)>0)
     {
    
  				$result = mysql_query( "update users
                          set password = password('$new_password')
                          where username = '$username'");
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
    if (!($conn = db_connect4()))
      return false;
    $result = mysql_query("select emailAddress from users
                            where username='$username'");
    if (!$result)
      return false;  // not changed
    else if (mysql_num_rows($result)==0)
	{echo "Hay alg&uacute;n problema con tus datos";
      return false;}// email not in db
    else
    {
		echo "<p>Tu contrase&ntilde;a de AECA ha sido cambiada y se te enviar&aacute; por email.</p> ";
    
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
function change_user($emailAddress, $old_username, $new_username)
// change password for username/old_password to new_password
// return true or false
{
  // if the old password is right
  // change their password to new_password and return true
  // else return false
 
		
    	if (!($conn = db_connect4()))
      	return false;
			
   		$result = mysql_query( "update users
                            set username = '$new_username'
                            where emailAddress = '$emailAddress'");
    	if (!$result)	
      	return false;  // not changed
   		else
      	return true;  // changed successfully
  
}

function notify_user($emailAddress)
// notify the user that their password has been changed
{
    if (!($conn = db_connect4()))
      return false;
    $result = mysql_query("select * from users
                            where emailAddress='$emailAddress'");
    if (!$result)
      return false;  // not changed
    else if (mysql_num_rows($result)==0)
	{echo "<div id=\"principal\"class=\"letreros\"><p>No existe ese email en nuestra base de datos</p>";
		 echo '<p>Si a&uacute;n no te has registrado hazlo<a class="avance" href="../register_user.php"> aqu&iacute;</a></p></div>';

      return false;} // username not in db
	  
    else{
	//he metido lo siguiente hasta los 2 echos!!
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