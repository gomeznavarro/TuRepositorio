<?
require_once("../display_partes.php");
require_once("../admin/book_sc_fns.php");
require_once( "../config.php" );
require_once( "../common.inc.php" );
require_once( "../clases/Admin.class.php" );

session_start();
checkLogin_admin();

displayPageHeaders( "Insertar noticias AECA", $membersArea = true, $noticias=false);
displaygalleryppal($membersArea = true);

?>

	<body id="tab5">
    <?php
	displayPageHeadings($membersArea = true);
	displaySolapas( $membersArea = true);
	displayCentral( $membersArea = true, $menu=false, "Nueva noticia", $foto=false);
?>


        <!-- CONTENT -->
        
        <div id="content">
                <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
            <div id="global_lateralycontenido" > <!-- igualar columnas -->
                    <?php display_menu_gral_admin(); ?>
        
                <!-- CONTENIDO -->
                <div id="contenido">
                    <div id="principal">
                        <form action="procesanoticia.php" method="post" id="registro" name="registro">
                        <div style="width: 300px; float:left; margin-bottom:20px">
                        <fieldset>
                            <label for="titulo">T&iacute;tulo noticia:</label>
                            <input type="text" id="titulo" name="titulo"> 
                           
                            <label for="autor">Autor:</label>
                            <input type="text" id="autor" name="autor">
                          
                            <label for="categoria">Categor&iacute;a:</label>                
                            <input type="text" id="categoria" name="categoria">
                            
                            <label for="fecha_public">Fecha de publicaci&oacute;n (yyyy/mm/dd):</label>             
                            <input type="text" id="fecha_public" name="fecha_public" value="">
                            
                            <label for="fecha_fin">Fecha de retirada (yyyy/mm/dd):</label>             
                            <input type="text" id="fecha_fin" name="fecha_fin" value="">                
                    
                            <label for="noticia">Escriba el art&iacute;culo:</label>            
                            <textarea id="noticia" name="noticia" cols="50" rows="10"></textarea>
                        </fieldset>
                            <div style="clear: both;">
                            <input type="submit" value="Publicar">
                            </div>     
                        </form>
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