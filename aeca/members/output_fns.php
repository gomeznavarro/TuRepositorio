<?php 

function do_html_url($url, $name)
{
  // output URL as link and br
?>
  <p><a class="avance" href="<?php echo $url?>"><?php echo $name?></a></p>
<?php 
}

function display_password_form(){ ?>
   
   <form action="change_passwd.php" method="post">
      	<div style="width: 500px;">
        <fieldset style="border:0">
        <legend style="margin-bottom:20px; font-weight:bold">Cambio de contrase&ntilde;a socios</legend>
        
        <label style="width:auto" for="old_password">Vieja Contrase&ntilde;a:</label>
        <input type="password" id="old_password" name="old_password" size="16" maxlength="16">
        
        <label style="width:auto" for="new_password">Nueva Contrase&ntilde;a:</label>
        <input type="password" name="new_password" size="16" maxlength="16">
      
        <label style="width:auto" for="new_password2">Repite Nueva Contrase&ntilde;a:</label>
        <input type="password" name="new_password2" size="16" maxlength="16">
        
        </fieldset>

        <input type="submit" value="Cambiar Contrase&ntilde;a">
  		</div>
  	</form>
 
<?php 
}

function display_user_form()
{
  
?>
   <form action="change_user.php" method=post>
         <div style="width: 500px;">

  		<fieldset style="border:0">
            <legend style="margin-bottom:20px; font-weight:bold">Cambio de nombre de usuario</legend>
            
            <label style="width:auto" for="old_username">Viejo Usuario:</label>   
            <input type="text" name="old_username" id="old_username" size="16" maxlength="16">
                   
            <label style="width:auto" for="new_username">Nuevo Usuario:</label>  
            <input type="text" name="new_username" id="new_username" size="16" maxlength="16">
            
            <label style="width:auto" for="old_username">Repite Nuevo Usuario:</label>
            <input type="text" name="new_username2" id="new_username2" size="16" maxlength="16">
        </fieldset>

   		<input type="submit" value="Cambiar Usuario">
        
        </div>
   </form>
<?php 
};

function display_forgot_form()
{
  // display HTML form to reset and email password
?>
  
   <form action="forgot_passwd.php" method="post">
   <div style="width: 300px;">
   <label style="width:auto" for="username">Escribe tu nombre de usuario</label>
     <input type="text" name="username" size="16" maxlength="16">
  <input type="submit" value="Cambiar contrase&ntilde;a">
  </div>
  </form>
 
<?php 
};

function display_forgot_form_user()
{
  // display HTML form to reset and email password
?>
  
   <form action="forgot_user.php" method="post">
            <div style="width: 300px;">

  <label style="width:auto"for="emailAddress"> Escribe tu email</label>
      <input type="text" name="emailAddress" size="30" maxlength="30">
  <input type="submit" value="Recordar usuario">
  </div>
  </form>
   
 
<?php 
};

