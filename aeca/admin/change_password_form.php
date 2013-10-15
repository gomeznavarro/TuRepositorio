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
            
                    <div id="registro" style="float:left; margin-left: 150px; ">        
            		<?php         
         			if (check_admin_user()){        
         					display_password_form2();
         			}
         			else{
						   echo "No est&aacute;s autorizado a entrar en el &aacute;rea de administraci&oacute;n.";
						   do_html_url2("login.php", "Haga Log In");
					}
        			?>
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