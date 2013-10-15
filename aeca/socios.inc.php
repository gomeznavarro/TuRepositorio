 

 
 <?php 
 

 display_login_form2();


?>

<?php
function display_login_form2()
{
?>
<div id="socios">
                  

				<h1>Acceso socios</h1>  

				<form action="member.php" method="post">

					<fieldset>

						<legend>Acceso socios</legend>

						<label for="nombre">Usuario</label>

						<input id="nombre" type="text" tabindex="1" name="username" size="30" maxlength="100" accesskey="n" onFocus="if (this.value=='Escribe aqu&iacute; tu usuario...') this.value='';" value="Escribe aqu&iacute; tu usuario..."/>

						<label for="contrasena">Contrase&ntilde;a</label>

						<input id="contrasena" type= "password" tabindex="2" name="passwd" size="30" maxlength="100" accesskey="e" onFocus="if (this.value=='*************************') this.value='';" value="*************************"/>

						<input id="boton" type="submit" name="enviar" value="Iniciar sesi&oacute;n"/>

						<a href="register_form.php">¿No eres socio?</a> 

						<p><a href="forgot_form_user.php">¿Olvidaste tu usuario?</a></p>
                        <p><a href="forgot_form.php">¿Olvidaste tu contrase&ntilde;a?</a></p>

					</fieldset>

				</form>    

			</div>
  
<?php 
}
 
 ?>
 
 
            
            
            
         <!--   <a href="../validar_ajax/index.php">¿No eres un miembro aún?</a>
  <form method=post action="member.php">
  <table bgcolor=#cccccc>
   <tr>
     <td colspan=2>Miembros identificarse aquí:</td>
   <tr>
     <td>Nombre Usuario:</td>
     <td><input type=text name=username></td></tr>
   <tr>
     <td>Contraseña:</td>
     <td><input type=password name=passwd></td></tr>
   <tr>
     <td colspan=2 align=center>
     <input type=submit value="Log in"></td></tr>
   <tr>
     <td colspan=2><a href="forgot_form.php">¿Olvidastes tu Contraseña?</a></td>
   </tr>
 </table></form> -->