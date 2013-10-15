<?

require_once("db_fns.php");

function login2($username, $passwd)
// comprueba el nombre del usuario y el password con la base de datos
// si sí, devuelve verdadero
// si no devueelve falso
{
  // conectar a la base de datos
  $conn = db_connect();
  if (!$conn){
	  echo "no conecta";
    return 0;
  }

  // comprobar que el nombre de usuario sea único
  
  $result = mysql_query("select * from admin
                         where username='$username'
                         and passwd = password('$passwd')");
  if (!$result){
     return 0;}

  if (mysql_num_rows($result)>0){
     return 1;
  }
  else{
     return 0;}
}

function check_admin_user()
// ver si admin está logged in y notificárselo si no
{
	
  if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!="")
    return true;
  else
    return false;
}
function check_member()
// ver si socio está logged in y notificárselo si no
{
	
  if(isset($_SESSION['member'])&& $_SESSION['member']!="")
    return true;
  else
    return false;
}
function check_user()
// ver si cliente está logged in y notificárselo si no
{
	
  if(isset($_SESSION['user'])&& $_SESSION['user']!="")
    return true;
  else
    return false;
}
function change_password2($username, $old_password, $new_password){
   // cambiar contraseña para  username/old_password a nueva contraseña
   // devuelve verdadero o falso  // si la vieja contraseña es correcta
  // cambia su contraseña a nueva contraseña y devuelve verdadero
  // si no es así devuelve falso
  login2($username, $old_password);
  if (login2($username, $old_password)){
    if (!($conn = db_connect()))
      return false;
    $result = mysql_query( "update admin
                            set passwd = password('$new_password')
                            where username = '$username'");
    if (!$result)
      return false;  // no cambiado
    else
      return true;  // cambiado correctamente
  }
  else{
    return false; // la vieja contraseña estaba equivocada
  }
}


?>