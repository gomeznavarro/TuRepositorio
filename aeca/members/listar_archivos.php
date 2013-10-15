<?php
require_once("dbconnect.inc.php");
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

displayPageHeaders( "Documentaci&oacute;n AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

	?>
    <body id="tab2">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
	displaySolapas( $membersArea = true);
	displayCentral( $membersArea = true, $menu=false, "Documentaci&oacute;n AECA");
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
                </div><!-- //LATERAL -->
                
                <!-- CONTENIDO -->
                <div id="contenido">
                    <div id="principal" class="letreros">
        
               			<p> Desde aqu&iacute; puedes ver en pantalla y descargarte la documentaci&oacute;n de la asociaci&oacute;n. Ten paciencia si tarda unos segundos.</p>
						<?php	
                        $qry = "SELECT id, nombre, titulo, tipo FROM archivos";
                        $res = mysql_query($qry);                        
                        while($fila = mysql_fetch_array($res)){                            
                        print "<dl ><dt style=\"width:200px\">$fila[titulo]</dt>
                        <dd>
                        <a class='lista' href='descargar_archivo.php?id=$fila[id]'> $fila[nombre]</a> ($fila[tipo])
                        </dd>
                        </dl>";
                        }
                    ?>
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







