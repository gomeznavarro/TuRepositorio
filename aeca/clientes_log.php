

     <div id="socios" > 
    <div style="padding:5px; text-align:center; font-size:14px; color:#fff; background:#333">Acceso Clientes</div>
				<form action="<?php if ( $membersArea ) echo "../" ?>users/login_user.php" method="post">
                <input type="hidden" name="action" value="login" />

					<fieldset>

						<legend>Acceso clientes</legend>

						<label for="nombre2">Usuario - cliente</label>

						<input id="nombre2" type="text" tabindex="1" name="username" size="30" maxlength="100" accesskey="n" onfocus="if (this.value=='Escribe aqu&iacute; tu usuario...') this.value='';" value="Escribe aqu&iacute; tu usuario..."/>

						<label for="contrasena2">Contrase&ntilde;a</label>

						<input id="contrasena2" type= "password" tabindex="2" name="password" size="30" maxlength="100" accesskey="e" onfocus="if (this.value=='*************************') this.value='';" value="*************************"/>

						<input id="boton2" type="submit" name="enviar" value="Login"/>

						<a href="<?php if ( $membersArea ) echo "../" ?>register_user.php">&#191;No est&aacute;s registrado?</a> 
						<p><a href="<?php if ( $membersArea ) echo "../" ?>users/forgot_form_user.php">&#191;Olvidaste tu usuario?</a></p>
                        <p><a href="<?php if ( $membersArea ) echo "../" ?>users/forgot_form.php">&#191;Olvidaste tu contrase&ntilde;a?</a></p>

					</fieldset>

				</form>      

</div>