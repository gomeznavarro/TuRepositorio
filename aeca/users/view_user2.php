<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/User.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/user_auth_fns.php");
require_once("../admin/output_fns.php");

session_start();

displayPageHeaders( "Listado Usuarios AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

?>
<body id="tab3">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Listado de usuarios");
?>

    <!-- CONTENT -->
    <div id="content">
	<?php 
	if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../users/logout.php">Logout</a></div>';
	?>  
        
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        
            <!-- LATERAL -->
            <div id="lateral">
            </div><!-- //LATERAL -->
            <!-- CONTENIDO -->
            <div id="contenido">
         
            <?php     
           if ((isset ($_SESSION['admin_user'])) ||(isset ($_SESSION['user']))) {
         
            $userId = isset( $_GET["userId"] ) ? (int)$_GET["userId"] : 0;
        
            if ( !$user = User::getUser( $userId ) ) {
            echo "<div>No se han encontrado los datos de ese cliente</div>";
            exit;
            }
                                
            $logEntries = LogEntryUser::getLogEntriesUsers( $userId );
            echo "<h3>Detalles del cliente con nombre de usuario: </h3>
            <h4 style=\"color:#900; font-size:24px\">" . $user->getValueEncoded( "username" ) . "</h4>";
            ?>
            <dl style="width: 30em;">
              <dt>Nombre</dt>
              <dd><?php echo $user->getValueEncoded( "firstName" ) ?></dd>
              <dt>Fecha de registro</dt>
              <dd><?php echo $user->getValueEncoded( "joinDate" ) ?></dd>
              <dt>G&eacute;nero</dt>
              <dd><?php echo $user->getGenderString() ?></dd>
              <dt>&#191;C&oacute;mo nos conoci&oacute;?</dt>
              <dd><?php echo $user->getFavoriteConocer() ?></dd>
              <dt>Correo electr&oacute;nico</dt>
              <dd><?php echo $user->getValueEncoded( "emailAddress" ) ?></dd>
              <dt>Cada cuánto y dónde compra</dt>
              <dd><?php echo $user->getValueEncoded( "otherInterests" ) ?></dd>
            </dl>
        
            <div style="width: 30em; margin-top: 20px; text-align: center;">
              <a class="avance" href="javascript:history.go(-1)">Volver</a>
            </div>    
            <?php
           }
           else{
               echo "No tiene permisos para ver esta p&aacute;gina del &aacute;rea de clientes";
               echo '<p>Si est&aacute;s registrado, por favor, <a href="../users/login_user.php">haz Log in</a></p>';
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