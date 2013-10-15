<?php
require("dbconnect.inc.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/LogEntry.class.php" );
require_once("../display_partes.php");
require_once("../admin/book_sc_fns.php");
require_once("../admin/output_fns.php");
  
session_start();
checkLogin_admin();

displayPageHeaders( "Subir archivo AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

	?>
    <body>
    <?php
    displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
    displaySolapas( $membersArea = true);
    displayCentral( $membersArea = true, $menu=false, "Subir archivos");
    ?>

        <!-- CONTENT -->
        
        <div id="content">
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
            <div id="global_lateralycontenido"> <!-- igualar columnas -->
            <?php display_menu_gral_admin(); ?>
                <!-- LATERAL -->
                <div id="lateral">                 
                </div>
                <!-- //LATERAL -->
                
                <!-- CONTENIDO -->
                 <div id="contenido">
                 <?php
                
                 $archivo = $_FILES["archivito"]["tmp_name"]; 
                 $tamanio = $_FILES["archivito"]["size"];
                 $tipo    = $_FILES["archivito"]["type"];
                 $nombre  = $_FILES["archivito"]["name"];
                 $titulo  = $_POST["titulo"];
                
                 if ( $archivo != "none" )
                 {
                    $fp = fopen($archivo, "rb");
                    $contenido = fread($fp, $tamanio);
                    $contenido = addslashes($contenido);
                    fclose($fp); 
                
                    $qry = "INSERT INTO archivos VALUES 
                            (0,'$nombre','$titulo','$contenido','$tipo')";
                
                    mysql_query($qry);
                
                    if(mysql_affected_rows($conn) > 0)
                       print "Se ha guardado el archivo en la base de datos.";
                    else
                       print "No se ha podido guardar el archivo en la base de datos.";
                 }
                 else
                    print "No se ha podido subir el archivo al servidor";
                ?>
                
                <?php  		display_enlace("../admin/index.php", "Men&uacute; de administraci&oacute;n");
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







