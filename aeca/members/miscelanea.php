<?php
require_once("../display_partes.php");
require_once("../admin/output_fns.php");
require_once("../admin/book_fns.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/LogEntry.class.php" );
require_once("../admin/user_auth_fns.php");

session_start();
if (check_admin_user()){
	checkLogin_admin();
}
else checkLogin();

displayPageHeaders( "Miscel&aacute;nea AECA", $membersArea = true, $gallery=false, $gallery_portada=false, $gallery_tiendas=false, $gallery_socios=false, $docum=true);
displayscriptsdiccion();
displaygalleryppal( $membersArea = true, $gallery=false, $gallery_portada=false, $gallery_tiendas=false, $gallery_socios=false, $docum=true);

?>

<body id="tab2">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Miscel&aacute;nea", $foto=false, $gallery=false, $socios_menu=false, $clientes_menu=false);
?>

<!-- CONTENT -->

    <div id="content">
    <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
	else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
        <div id="global_lateralycontenido" > <!-- igualar columnas -->
      	<?php 
		display_menu_gral_socios();
        display_menu_gral_admin(); 
		?> 
                    <div class="letras">
                      <div class="letra" id="letra-a">
                        <div class="boton">Cambios en normativa</div>
                      </div>
                      <div class="letra" id="ofertas">
                        <div class="boton">Ofertas disponibles</div>
                      </div>
                       <div class="letra" id="users">
                        <div class="boton">Comentarios Clientes</div>
                      </div>
                      <div class="letra" id="letra-d">
                        <div class="boton">T&eacute;rminos legales</div>
                      </div>
                  	</div>
            <!-- LATERAL -->
            <div id="lateral">
             	<div id="cat">
                     <?php  require_once("../members/menu_cat_area_socios.php"); ?>
             	</div>
            </div><!-- //LATERAL -->
    
    		<!-- CONTENIDO -->
            <div id="contenido" style="margin-left:0px" >
          
                <div id="cargando_imagen">
                <img src="cargador2.gif" width="54" height="55" alt="cargador" />
                </div> 
    
    			<div id="diccionario">
    				<div class="intro">
                        <h2>Actualizaci&oacute;n de contenidos</h2>
                        <p>Utilizaremos este espacio para ofrecerle una forma r&aacute;pida de visualizar los m&aacute;s recientes acontecimientos de la asociaci&oacute;on, cambios de normativa, y una ipsum dolor sit amet, consectetur adipiscing elit. Donec porta arcu a sem. Vestibulum id pede. Maecenas ullamcorper. Donec molestie augue nec nunc. Nunc mi. Fusce iaculis. Aliquam sagittis bibendum velit. Pellentesque laoreet. Integer vehicula ante sed lorem. Morbi vitae velit. Sed ornare congue sapien. Ut non justo vel metus volutpat congue. Curabitur non tellus et magna dictum ullamcorper. Nunc sollicitudin, justo nec ultricies convallis, elit magna pellentesque pede, et facilisis</p>
                        <p>
                        Quisque turpis. Praesent condimentum justo sit amet libero. Praesent rhoncus. Suspendisse potenti. Vivamus mollis magna a nulla. Donec elementum consectetur ligula. Sed nulla. Nunc pulvinar luctus ante. Nullam aliquam facilisis odio. Nam hendrerit justo non risus. Proin sed velit vitae leo dapibus fermentum. </p>
                   </div>
    			</div> 
    
    		</div><!-- //CONTENIDO -->  
    
                <div class="clear"></div>
    	</div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
    
        <?php displayMenuInf( $membersArea = true); ?>
    
    </div><!-- //CONTENT -->        
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>
