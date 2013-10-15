
<?php

require_once("bookmark_fns.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
include_once('../admin/book_sc_fns.php');
include_once("../admin/output_fns.php");
include_once("../admin/admin_fns.php");
include_once("../admin/result_array.php");
require_once("../display_partes.php");

session_start();
checkLogin();

displayPageHeaders( "Socios AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);
?>
<body id="tab2">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Cambio de usuario socios");
?>

    <!-- CONTENT -->
    
    <div id="content">
    <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
         <?php display_menu_gral_socios();?>	
            
             <!-- LATERAL -->
             <div id="lateral">
             	<div id="cat" >        
                <?php  require_once("../members/menu_cat_area_socios.php"); ?>
            	</div>
            </div><!-- //LATERAL -->
      
             <!-- CONTENIDO -->
             <div id="contenido">
              	<div id="principal" class="letreros">
               	<?php 
                if(isset($_POST['new_username']))$new_username=$_POST["new_username"];
                if(isset($_POST['new_username2']))$new_username2=$_POST["new_username2"];
                if(isset($_POST['new_username'])&&isset($_POST['new_username2'])){
            
					 if (!filled_out($_POST))
					 {
					   echo "<p>No has cubierto el formulario completo.Prueba de nuevo por favor.</p>";
					   display_enlacesimple("../members/change_user_form.php", "Volver");		

					 }
					 else
					 {
						
						if ($new_username!=$new_username2){
						    echo "<p>El usuario escrito no era el mismo.  Prueba de nuevo.";
            				display_enlacesimple("../members/change_user_form.php", "Volver");	
						}
						else if (strlen($new_username)>30 || strlen($new_username)<6){
						    echo "El nuevo usuario debe estar entre 6 y 30 caracteres.  Prueba de nuevo.";
            			    display_enlacesimple("../members/change_user_form.php", "Volver");
						}
						else
						{
							$username=$_SESSION["member"]->getValue( "username" );
							$emailAddress=$_SESSION["member"]->getValue( "emailAddress" );
							if(isset($_POST['old_username']))$old_username=$_POST["old_username"];
							
							if (login_email($old_username, $emailAddress) && usuario_unico($new_username)&& change_user($emailAddress, $old_username, $new_username)){
								echo "Usuario cambiado, ahora eres $new_username.";
							}					
							else{
								echo "$username, el usuario no ha podido cambiarse";
							}
						}       
             		}
				}
				else{
					echo "<p>No has rellenado el formulario.</p>";
            		display_enlacesimple("../members/change_user_form.php", "Volver");
				}
            		?>
            		</div>
                </div>
                <!-- //CONTENIDO -->
    
                <div class="clear"></div>
             
             </div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
    
        <?php displayMenuInf( $membersArea = true); ?>
    
    	</div><!-- //CONTENT -->        
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>
