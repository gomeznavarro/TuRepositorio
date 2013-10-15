      <?php
	  require_once("../admin/user_auth_fns.php");

	  if (!check_admin_user() && !check_user())
	  echo "No tienes los permisos necesarios para ver esta p&aacute;gina";
	  else{?>          

<ul >
  <li><a href="eventos.php">Pr&oacute;ximos eventos</a></li>
  <li><a href="change_passwd_form.php">Cambia tu contrase&ntilde;a</a></li>
    <li><a href="change_user_form.php">Cambia tu usuario</a></li>

  <li><a href="view_users.php">Edici&oacute;n / listado clientes</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
                <? }?>