<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/user_auth_fns.php");
require_once("../admin/output_fns.php");

session_start();
if (check_admin_user()){
	checkLogin_admin();
}
else checkLogin();

displayPageHeaders( "Detalles Socios AECA", $membersArea = true, $noticias=false);
displaygalleryppal($membersArea = true, $noticias=false);

?>
<body id="tab2">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Detalles de socios");
?>

    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
	else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
    	<div id="global_lateralycontenido"> <!-- igualar columnas -->
      	<?php 
		display_menu_gral_socios();
        display_menu_gral_admin(); 
		?> 
    		<!-- LATERAL -->
            <div id="lateral">
            	<div id="cat">
                     <?php  require_once("../members/menu_cat_area_socios.php"); ?>
             	</div>
            </div>
            <!-- //LATERAL -->
        	<!-- CONTENIDO -->
     		<div id="contenido">
                     <div id="principal" class="letreros">
    
     				<?php     
       				if ((isset ($_SESSION['admin_user'])) ||(isset ($_SESSION['member']))) {
     
						$memberId = isset( $_GET["memberId"] ) ? (int)$_GET["memberId"] : 0;
						
						if ( !$member = Member::getMember( $memberId ) ) {
						  echo "<div>No se han encontrado los datos de ese socio</div>";
						  exit;
						}
						$logEntries = LogEntry::getLogEntries( $memberId );
						echo "<h3>Detalles del socio con nombre de usuario: </h3>
							<h4 style=\"color:#900; font-size:24px\">" . $member->getValueEncoded( "username" ) . "</h4>";
						?>
							<dl style="width: 30em;">
							  <dt>Raz&oacute;n social</dt>
							  <dd><?php echo $member->getValueEncoded( "txtRazon" ) ?></dd>
							  <dt>Nombre comercial</dt>
							  <dd><?php echo $member->getValueEncoded( "shopname" ) ?></dd>
							  <dt>Direcci&oacute;n</dt>
							  <dd><?php echo $member->getValueEncoded( "address" ) ?></dd>
							  <dt>C&oacute;digo postal</dt>
							  <dd><?php echo $member->getValueEncoded( "zip" ) ?></dd>
							  <dt>Fecha de registro</dt>
							  <dd><?php echo $member->getValueEncoded( "joinDate" ) ?></dd>
							  <dt>Persona de contacto</dt>
							  <dd><?php echo $member->getValueEncoded( "firstName2" )?></dd>
							  <dt>Tel&eacute;fono</dt>
							  <dd><?php echo $member->getValueEncoded( "txtPhone" )?></dd>
							  <dt>M&oacute;vil</dt>
							  <dd><?php echo $member->getValueEncoded( "txtPhone" )?></dd>
							  <dt>Correo electr&oacute;nico</dt>
							  <dd><?php echo $member->getValueEncoded( "emailAddress" ) ?></dd>
							</dl>
						
							<div style="width: 30em; margin-top: 20px; text-align: center;">
							  <a class="avance" href="javascript:history.go(-1)"><<< Volver</a>
							</div>
					
					<?php
						}
					else{
						echo "No tiene permiso para entrar en el &aacute;rea de socios. ";
					    echo 'Si es socio, por favor, haga <a class="avance" href="../members/login.php">Log in</a>';
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