<!--socios-clientes acordeon-->
 
 <script  type="text/javascript" > 
$(document).ready(function(){
	$("#flip2").css("background","#666");

	 $("#panel2").css("display","none");
  $("#flip2").click(function(){
    $("#panel").hide();
 
    $("#panel2").show();
$("#flip2").css("background","#333");
$("#flip").css("background","#666");


  });
$("#flip").click(function(){
    $("#panel").show();
 
    $("#panel2").hide();
$("#flip2").slideDown("slow");
$("#flip2").css("background","#666");
$("#flip").css("background","#333");


  });
});
</script>
 
 <!--//socios-clientes acordeon-->
 


 
<div id="flip">Acceso Socios</div>
<div id="panel">

     
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
<div id="flip2">Acceso clientes</div>
<div id="panel2">
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


