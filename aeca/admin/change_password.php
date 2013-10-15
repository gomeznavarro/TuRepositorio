<?
 require_once("book_sc_fns.php");
 require_once("../display_partes.php");

session_start();
displayPageHeaders( "Cambiar contrase&ntilde;a Admin AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);

 ?>
<body>
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Cambiar contrase&ntilde;a", $foto=false);
?>

    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        <?php
        if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
        display_menu_gral_admin(); 
        }?> 
        
             <!-- CONTENIDO -->
             <div id="contenido">
                <?php
            if (check_admin_user()){
				
                if(isset($_POST['new_passwd']))$new_passwd=$_POST['new_passwd'];
                if(isset($_POST['new_passwd2']))$new_passwd2=$_POST['new_passwd2'];
                if(isset($_POST['new_passwd'])&&isset($_POST['new_passwd2'])){
            
            
                	if (!filled_out($_POST)){
						
                       	echo "<p>No has cubierto el formulario completamente.
                             Int&eacute;ntalo de nuevo, por favor.</p>";
                    }
                    else
                    {
                    	if ($new_passwd!=$new_passwd2){
							   echo "La contrase&ntilde;a escrita no era la misma.  Prueba de nuevo.";
							   display_enlacesimple("../admin/change_password_form.php", "Volver");
						}
                        else if (strlen($new_passwd)>16 || strlen($new_passwd)<6){
							   echo "La nueva contrase&ntilde;a debe estar entre 6 y 16 caracteres.  Prueba de nuevo.";
							   display_enlacesimple("../admin/change_password_form.php", "Volver");
						}
						else{
                            	$username=$_SESSION["admin_user"]->getValue('username');
                            	if(isset($_POST['old_passwd']))$old_passwd=$_POST['old_passwd'];
                            	if (change_password2($username, $old_passwd, $new_passwd))
                               		echo "La contrase&ntilde;a ha sido cambiada, $username.";
                            	else
                              	 	echo "La contrase&ntilde;a no ha podido cambiarse, $username.";	  
                        }		
                   	}
               	}
               	else{
                        echo "<p>No has rellenado el formulario.</p>";
                        display_enlacesimple("../admin/change_password_form.php", "Volver");		
               	}
            
             
            }
            else{
            echo "<p>No est&aacute;s autorizado a ver esta p&aacute;gina.</p>";
            display_enlacesimple("login_admin.php", "Login");
            }
            
            ?>
            </div>
            <!-- //CONTENIDO -->
    
                <div class="clear"></div>
             
		</div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
    
        <?php
		displayMenuInf( $membersArea = true);
		?>

	</div><!-- //CONTENT -->
        
<!-- PIE -->  
<?php
displayFooter( $membersArea = true);
?>