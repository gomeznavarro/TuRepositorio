
<?php

require_once("bookmark_fns.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once ('../admin/book_sc_fns.php');
require_once("../admin/output_fns.php");
require_once("../admin/admin_fns.php");
require_once("../admin/result_array.php");
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
displayCentral( $membersArea = true, $menu=false, "Cambio de contrase&ntilde;a socios");
?>

<!-- CONTENT -->

    <div id="content">
    <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';?>
        
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
     		 <?php display_menu_gral_socios(); ?>		
             
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
				if(isset($_POST['new_password']))$new_password=$_POST["new_password"];
				if(isset($_POST['new_password2'])) $new_password2=$_POST["new_password2"];
				
				if(isset($_POST['new_password'])&&isset($_POST['new_password2'])){
        
                     if (!filled_out($_POST))
                     {
                       echo "No has cubierto el formulario completo.
                             Prueba de nuevo por favor.";
                       display_enlacesimple("../members/change_passwd_form.php", "Volver");      
                     }
                     else{
                        if ($new_password!=$new_password2){
                           echo "Las dos contrase&ntilde;as escritas no eran iguales.  Prueba de nuevo.";
						   display_enlacesimple("../members/change_passwd_form.php", "Volver");      
						}
                        else if (strlen($new_password)>16 || strlen($new_password)<6){
                           echo "Nueva contrase&ntilde;a debe estar entre 6 y 16 caracteres.  Prueba de nuevo.";
                     	   display_enlacesimple("../members/change_passwd_form.php", "Volver"); 
						}
                        else{
                            $username=$_SESSION["member"]->getValue( "username" );
                            if(isset($_POST['old_password'])) $old_password=$_POST["old_password"];
                            
                            if (change_password($username, $old_password, $new_password)) { 
                            
                                echo "La contrase&ntilde;a ha sido cambiada, $username.";		  
                            	}
                            else{
                                echo "La contrase&ntilde;a no ha podido cambiarse, $username. Contacta con nosotros";					   
                            	}			
                        	}			
                     	}
				}
				else{
				echo "<p>No has rellenado el formulario.</p>";
				display_enlacesimple("../members/change_passwd_form.php", "Ir al formulario");		
				}?>
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

