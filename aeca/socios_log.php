
<div id="socios" > 
         <div style="padding:5px; text-align:center; font-size:14px; color:#fff; background:#333">Acceso Socios</div>

       <form action="<?php if ( $membersArea ) echo "../" ?>members/login.php" method="post">
                <input type="hidden" name="action" value="login" />

					<fieldset>

						<legend>Acceso socios</legend>

						<label for="nombre">Usuario - socio</label>

						<input id="nombre" type="text" tabindex="1" name="username" size="30" maxlength="100" accesskey="n" onfocus="if (this.value=='Escribe aqu&iacute; tu usuario...') this.value='';" value="Escribe aqu&iacute; tu usuario..."/>

						<label for="contrasena">Contrase&ntilde;a</label>

						<input id="contrasena" type= "password" tabindex="2" name="password" size="30" maxlength="100" accesskey="e" onfocus="if (this.value=='*************************') this.value='';" value="*************************"/>

						<input  id="boton" type="submit" name="enviar" value="Login"/>

						<a href="<?php if ( $membersArea ) echo "../" ?>register.php">&#191;No eres socio?</a> 
						<p><a href="<?php if ( $membersArea ) echo "../" ?>members/forgot_form_user.php">&#191;Olvidaste tu usuario?</a></p>
                        <p><a href="<?php if ( $membersArea ) echo "../" ?>members/forgot_form.php">&#191;Olvidaste tu contrase&ntilde;a?</a></p>

					</fieldset>

				</form>   
  </div>   
