<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/LogEntry.class.php" );
require_once("../admin/output_fns.php");
require_once("../admin/book_fns.php");
require_once("../admin/user_auth_fns.php");

session_start();
if (check_admin_user()){
	checkLogin_admin();
}
else checkLogin();

displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = true, $gallery=false, $gallery_portada=false, $gallery_tiendas=false, $gallery_socios=true);
displaygallerysocios($membersArea = true);
displaygalleryppal($membersArea = true, $gallery=false, $gallery_portada=false, $gallery_tiendas=false, $gallery_socios=true);

?>
<body id="tab2">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = false, $menu=false, "Galer&iacute;a de socios", $banner=false, $foto=false, $gallery=false, $socios_menu=false, $clientes_menu=false);
?>
 
    <!-- CONTENT -->
    
    <div id="contentt">
    <?php 
	if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
	else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';
	?>
    
        <div id="global_lateralycontenido" > <!-- igualar columnas -->
        <?php 
		display_menu_gral_socios();
        display_menu_gral_admin(); 
		?> 
    
            <!-- LATERAL -->
            <div id="lateral">
                <div id="cat">        
                     <?php  require_once("../members/menu_cat_area_socios.php"); ?>
                </div>
            </div><!-- //LATERAL -->
    
            <div id="contenido">            
        
                <div id="content" style="background-color:#f3f3f3; margin:20px">  
        
                    <div class="section" id="example">
        
                        <h2>Inauguraciones de negocios 2012</h2>
        
                        <div class="imageRow">
                                <div class="set">	
                                <?php
                                include('../gallery/phpgallery/config.php');
                                $result = mysql_query("SELECT * FROM photos_socios");
                                while($row = mysql_fetch_array($result))
                                {
                                    
                                     echo '<div class="single"><div class="wrap">
                                          <a href="'.$row['location'].'" rel="lightbox[plants]" title="'.$row['title'].'"><img src="'.$row['location'].'" alt="'.$row['description'].'" /></a>
                                        </div></div>';
                                }				
                                ?>		
                                </div>
                        </div>
            
                    </div>
        
                </div><!-- end #content -->
        
            </div><!-- end #contenido -->
            <div class="clear"></div>
    
        </div><!-- //igualar columnas -->
			
	<!-- MENU_INFERIOR -->			

	<?php displayMenuInf( $membersArea = true); ?>

	</div><!-- //CONTENT -->
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>
