<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/user_auth_fns.php");
require_once("../admin/output_fns.php");

session_start();
checkLogin_admin();

displayPageHeaders( "Listado Empresas AECA", $membersArea = true, $noticias=false);
displaygalleryppal($membersArea = true, $noticias=false);

?>
<body>
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Listado de empresas", $foto=false);
?>

    <!-- CONTENT -->
    
    <div id="content">    
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
            <?php display_menu_gral_admin(); ?>
            <!-- LATERAL --> 
                     <div id="lateral"></div>
            <!-- CONTENIDO -->
            <div id="contenido">
            <?php	
        
              if ((isset ($_SESSION['admin_user'])) ||(isset ($_SESSION['member']))) {
                  
            $start = isset( $_GET["start"] ) ? (int)$_GET["start"] : 0;
            $order = isset( $_GET["order"] ) ? preg_replace( "/[^ a-zA-Z12]/", "", $_GET["order"] ) : "empresaid";
            list( $members, $totalRows ) = Member::getEmpresas( $start, PAGE_SIZE, $order );
            
            ?>
                <h3>Mostrando empresas <?php echo $start + 1 ?> - <?php echo min( $start +  PAGE_SIZE, $totalRows ) ?> de <?php echo $totalRows ?></h3>
            <?php
    
                if (check_admin_user()) {
                    ?>
                    <table cellspacing="0" style="width: 40em; border: 1px solid #666;">
                      <tr>
                        <th><?php if ( $order != "empresaid" ) { ?><a href="view_empresas.php?order=empresaid"><?php } ?>C&oacute;digo<?php if ( $order != "empresaid" ) { ?></a><?php } ?></th>
                        <th><?php if ( $order != "txtRazon" ) { ?><a href="view_empresas.php?order=txtRazon"><?php } ?>Nombre Empresa<?php if ( $order != "txtRazon" ) { ?></a><?php } ?></th>
                        <th><?php if ( $order != "cif" ) { ?><a href="view_empresas.php?order=cif"><?php } ?>CIF<?php if ( $order != "cif" ) { ?></a><?php } ?></th>
                      </tr>
                <?php
                $rowCount = 0;
                
                foreach ( $members as $member ) {
                  $rowCount++;
                ?>
                      <tr<?php if ( $rowCount % 2 == 0 ) echo ' class="alt"' ?>>
                        <td><a href="view_empresa.php?memberId=<?php echo $member->getValueEncoded( "empresaid" ) ?>&amp;start=<?php echo $start ?>&amp;order=<?php echo $order ?>"><?php echo $member->getValueEncoded( "empresaid" ) ?></a></td>
                        <td><?php echo $member->getValueEncoded( "txtRazon" ) ?></td>
                        <td><?php echo $member->getValueEncoded( "cif" ) ?></td>
                      </tr>
                <?php
                }
                ?>
                </table>
                <?php
            }
            ?>
    
                <div style="width: 30em; margin-top: 20px; text-align: center;">
                <?php if ( $start > 0 ) { ?>
                     <a class="avance" href="view_empresas.php?start=<?php echo max( $start - PAGE_SIZE, 0 ) ?>&amp;order=<?php echo $order ?>">Previous page</a>
                <?php } ?>
                &nbsp;
                <?php if ( $start + PAGE_SIZE < $totalRows ) { ?>
                <a class="avance" href="view_empresas.php?start=<?php echo min( $start + PAGE_SIZE, $totalRows ) ?>&amp;order=<?php echo $order ?>">Next page</a>
                <?php } ?>
                </div>
    
                <?php
              }
              else
              echo "No est&aacute;s autorizado a entrar al &aacute;rea de administraci&oacute;n";
              ?>
      
            </div>     <!-- //CONTENIDO -->
    
                <div class="clear"></div>
             
        </div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
    
        <?php displayMenuInf( $membersArea = true); ?>
    
    </div><!-- //CONTENT -->
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>

