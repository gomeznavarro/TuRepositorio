
<?php

require_once("bookmark_fns.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once('../admin/book_sc_fns.php');
require_once("../admin/output_fns.php");
require_once("../admin/admin_fns.php");
require_once("../display_partes.php");

session_start();
checkLogin_user(); //incluye session_start

displayPageHeaders( "Cambio Usuario Clientes AECA", $membersArea = true);
displaygalleryppal( $membersArea = true);

?>
<body id="tab3">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Cambio de usuario clientes");
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
                if(isset($_POST['new_username']))$new_username=$_POST["new_username"];
                if(isset($_POST['new_username2']))$new_username2=$_POST["new_username2"];
                if(isset($_POST['new_username'])&&isset($_POST['new_username2'])){
					 if (!filled_out($_POST)){
						 
					   echo "No has cubierto el formulario completo.
							 Prueba de nuevo por favor.";
    						 display_enlacesimple("../users/change_user_form.php", "Volver");		
					 }
					 else{					  
					
						if ($new_username!=$new_username2){
						   echo "Usuario escrito no era el mismo.  Prueba de nuevo.";
						   display_enlacesimple("../users/change_user_form.php", "Volver");	
						}
						else if (strlen($new_username)>30 || strlen($new_username)<6){
						   echo "El nuevo usuario debe estar entre 6 y 30 caracteres.  Prueba de nuevo.";
						   display_enlacesimple("../users/change_user_form.php", "Volver");	
						}
						else{
							$username=$_SESSION["user"]->getValue( "username" );
							$emailAddress=$_SESSION["user"]->getValue( "emailAddress" );
							if(isset($_POST['old_username']))$old_username=$_POST["old_username"];							
							if (login_email($old_username, $emailAddress) && usuario_unico($new_username)&& change_user($emailAddress, $old_username, $new_username))  
							   echo "Usuario cambiado, ahora eres $new_username.";
							else
							   echo "$username, el usuario no ha podido cambiarse.";
						}        
            	 	}                           
    			}
				else{
				echo "<p>No has rellenado el formulario.</p>";
				display_enlacesimple("../users/change_user_form.php", "Ir al formulario");		
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

    




