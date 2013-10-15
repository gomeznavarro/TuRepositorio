<?php
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/LogEntry.class.php" );
require_once("../display_partes.php");
require_once("../admin/book_sc_fns.php");
require_once("../admin/output_fns.php");
require_once("../admin/user_auth_fns.php");

session_start();
if (check_admin_user()){
	checkLogin_admin();
}
else checkLogin();

displayPageHeaders( "Juntas Socios AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

?>
<body id="tab2">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Juntas de Socios");
?>

<!-- CONTENT -->

    <div id="content">
    <?php 
	if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
	else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';
	?>

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
                    	<h3>&Uacute;ltima Junta General de Socios</h3>
                         <p>La &uacute;ltima Junta se celebr&oacute; el 25 de agosto. Debido a realizarse en periodo vacacional, la afluencia fue escasa. </p>
                         <p>Los principales puntos a tratar fueron:</p>
                         <dl>
                              <dt>Cambio de sede</dt>
                              <dd>Nos trasladamos en enero a la calle Canarias, 3</dd>
                              <dt>Baja del presidente de la asociaci&oacute;n</dt>
                              <dd>Ser&aacute; reemplazado por el Vicepresidente hasta la pr&oacute;xima celebraci&oacute;n de elecciones</dd>
                              <dt>Pago de cuotas</dt>
                              <dd>Los pagos de las cuotas del a&ntilde;o 2013 se podr&aacute;n realizar hasta el 31 de marzo de 2013</dd>
                         </dl> 
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







