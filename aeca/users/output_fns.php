<?php 

function do_html_url($url, $name)
{
  // output URL as link and br
?>
  <a class="avance" href="<?php echo $url?>"><?php echo $name?></a>
<?php 
}

function display_password_form()
{
  // display html change password form
?>
  
    <form action="change_passwd.php" method="post">
            <div style="width: 300px;">

        <fieldset style="border:0">
        <legend>Cambio de contrase&ntilde;a clientes</legend>
        
        <label style="width:auto" for="old_password">Vieja Contrase&ntilde;a:</label>
        <input type="password" id="old_password" name="old_password" size="16" maxlength="16" />
        
        <label style="width:auto" for="new_password">Nueva Contrase&ntilde;a:</label>
        <input type="password" id="new_password" name="new_password" size="16" maxlength="16" />
      
        <label style="width:auto" for="new_password2">Repite Nueva Contrase&ntilde;a:</label>
        <input type="password" id="new_password2" name="new_password2" size="16" maxlength="16" />
        
        </fieldset>
         <div style="clear: both;">
        <input type="submit" value="Cambiar Contrase&ntilde;a" />
  </div></div>
  	</form>
   
   
   
   
   
   
<?php 
}
function display_user_form()
{
  // display html change user form
?>
   
   
    <form action="change_user.php" method=post>
                <div style="width: 300px;">

  		<fieldset style="border:0">
            <legend style="margin-bottom:20px; font-weight:bold">Cambio de nombre de usuario</legend>
            
            <label style="width:auto" for="old_username">Viejo Usuario:</label>   
            <input type="text" name="old_username" id="old_username" size="16" maxlength="16">
                   
            <label style="width:auto" for="new_username">Nuevo Usuario:</label>  
            <input type="text" name="new_username" id="new_username" size="16" maxlength="16">
            
            <label style="width:auto" for="old_username">Repite Nuevo Usuario:</label>
            <input type="text" name="new_username2" id="new_username2" size="16" maxlength="16">
            
        </fieldset>
          <div style="clear: both;">
   		<input type="submit" value="Cambiar Usuario">
        </div></div>
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

  <label style="width:auto" for="emailAddress"> Escribe tu email</label>
      <input type="text" name="emailAddress" size="30" maxlength="30">
  <input type="submit" value="Recordar usuario">
  </div>
  </form>
<?php 
};

/*function display_recommended_urls($url_array)
{
  // similar output to display_user_urls
  // instead of displaying the users bookmarks, display recomendation
?>
  <br>
  <table width=300 cellpadding=2 cellspacing=0>
<?php 
  $color = "#cccccc";
  echo "<tr bgcolor=$color><td><strong>Recomendaciones</strong></td></tr>";
  if (is_array($url_array) && count($url_array)>0)
  {
    foreach ($url_array as $url)
    {
      if ($color == "#cccccc")
        $color = "#ffffff";
      else
        $color = "#cccccc";
      echo "<tr bgcolor=$color><td><a href=\"$url\">".htmlspecialchars($url)."</a></td></tr>";
    }
  }
  else
    echo "<tr><td>No hay recomendaciones para ti de momento.</td></tr>";
?>
  </table>
<?php 
};
function display_menu_socios()
{?>
   <ul> 
                            
                        
                                <li class="nivel1"><a href="<?php if ( $membersArea ) echo "../" ?>members/index.php" class="nivel1" >&Aacute;rea de socios</a>
                           
                                    </li>
                                    <li class="nivel1"><a href="#" class="nivel1">Descubre Atocha</a>
                            
                            
                                    </li>
                                
                                    <li class="nivel1"><a href="#" class="nivel1">Descubre Madrid</a>
                           
                            
                                    </li>
                               
                        </ul>
                                      
                
               
<? };
*/