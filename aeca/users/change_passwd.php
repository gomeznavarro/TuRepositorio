
<?php

require_once("bookmark_fns.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
include ('../admin/book_sc_fns.php');
include_once("../admin/output_fns.php");
include_once("../admin/admin_fns.php");

require_once("../display_partes.php");

session_start();
checkLogin_user();

displayPageHeaders( "Cambio Contrase&ntilde;a Clientes AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);

?>
<body id="tab3">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Cambio de contrase&ntilde;a clientes");
?>
	<!-- CONTENT -->        
	<div id="content">
	<?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        <?php display_menu_gral_admin(); ?>
                
       		<!-- LATERAL -->
            <div id="lateral">
             	<div id="cat2" >
            	<?php  require_once("../users/menu_cat_area_clientes.php"); ?>
                </div>
            </div><!-- //LATERAL -->
            
            <!-- CONTENIDO -->
         	<div id="contenido">            
          		<div id="principal" class="letreros">    
           		<?php 		 
				if(isset($_POST['new_password']))$new_password=$_POST["new_password"];
				if(isset($_POST['new_password2'])) $new_password2=$_POST["new_password2"];
				if(isset($_POST['new_password'])&&isset($_POST['new_password2'])){
				
						 if (!filled_out($_POST)){
							 
						   echo "No has cubierto el formulario completo.
								 Prueba de nuevo por favor.";
								 display_enlacesimple("../users/change_passwd_form.php", "Volver");
						 }
						 else{							
								if ($new_password!=$new_password2){
								  echo "Las dos contrase&ntilde;as escritas no eran iguales.  Prueba de nuevo.";
								  display_enlacesimple("../users/change_passwd_form.php", "Volver");
								}
								else if (strlen($new_password)>16 || strlen($new_password)<6){
								  echo "Nueva contrase&ntilde;a debe estar entre 6 y 16 caracteres.  Prueba de nuevo.";
								  display_enlacesimple("../users/change_passwd_form.php", "Volver");
								}
								else
								{
									$username=$_SESSION["user"]->getValue( "username" );
									if(isset($_POST['old_password']))$old_password=$_POST["old_password"];
									if (change_password($username, $old_password, $new_password)) //user_auth_fns
									   echo "La contrase&ntilde;a ha sido cambiada, $username.";
									else
									   echo "La contrase&ntilde;a no ha podido cambiarse, $username. Contacta con nosotros";
								}
						 }
				}
				else{
						echo "<p>No has rellenado el formulario.</p>";
						display_enlacesimple("../users/change_passwd_form.php", "Volver");		
				}?>
                </div>
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

