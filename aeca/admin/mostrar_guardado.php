<?
require_once("book_sc_fns.php");
require_once("../display_partes.php");
require_once( "../config.php" );
require_once( "../common.inc.php" );
require_once( "../clases/Admin.class.php" );

session_start();
checkLogin_admin();

displayPageHeaders( "Administraci&oacute;n", $membersArea = true);
displaygalleryppal( $membersArea = true);

?>
<body>
<?
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Comentarios de contacto", $foto=false);
?>

    <!-- CONTENT -->
    
    <div id="content">
    
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
            <?php display_menu_gral_admin(); ?>
            <!-- LATERAL -->
            <div id="lateral" >
                
            </div>
            <!-- CONTENIDO -->
            <div id="contenido" >
    
				<?
                $fp=fopen("comentarios.txt","r");
                flock($fp,1);
                while(!feof($fp)){
                    $char=utf8_encode(fgetc($fp));
                    if(!feof($fp))
                    echo($char=="\n"?"<br/>":$char);
                }
                flock($fp,3);
                ?>
            
                <?php display_enlace("../admin/index.php", "Men&uacute; de administraci&oacute;n");?>
            </div>
            <!-- //CONTENIDO -->
                    <div class="clear"></div>
             
        </div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
    
        <?php displayMenuInf( $membersArea = true); ?>
    
    
    </div><!-- //CONTENT -->
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>
