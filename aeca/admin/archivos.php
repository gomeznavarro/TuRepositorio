<?php
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/LogEntry.class.php" );
require_once("../display_partes.php");
require_once("../admin/book_sc_fns.php");
require_once("../admin/output_fns.php");

session_start();
checkLogin_admin();

displayPageHeaders( "Subir Archivos AECA", $membersArea = true, $noticias=false);
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
            </div><!-- //LATERAL -->
            
            <!-- CONTENIDO -->
            <div id="contenido">
             	<div id="principal">
    
             	<form enctype="multipart/form-data" action="guardar_archivo.php" method="post" id="registro">
                 <div style="width:300px">
                    <fieldset>
                    <label for="titulo">Título </label> 
                    <input type="text" name="titulo" size="30" />
                    
                    <label for="archivito">Ubicaci&oacute;n</label> 
                    <input style="width:300px; float:right; margin-top:5px" type="file" name="archivito" />
                    </fieldset>
                    
                    <input type="submit" value="Enviar archivo" />
                 </div>
            	</form>
    
        		</div>
            </div>    <!-- //CONTENIDO -->
    
                <div class="clear"></div>
             
        </div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
    
        <?php displayMenuInf( $membersArea = true); ?>
    
    
    </div><!-- //CONTENT -->
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>







