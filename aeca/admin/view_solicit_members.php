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

displayPageHeaders( "Listado Solicitudes AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

?>
<body id="tab">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Solicitudes pendientes");
?>

    <!-- CONTENT -->
    
    <div id="content">
        <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        <?php display_menu_gral_admin(); ?>
            
            <!-- LATERAL --> 
            <div id="lateral"></div>            
            <!-- //LATERAL -->
        
            <!-- CONTENIDO -->
            <div id="contenido">
            
            <?php 
			if ((isset ($_SESSION['admin_user']))){	                
                           
                $start = isset( $_GET["start"] ) ? (int)$_GET["start"] : 0;
                $order = isset( $_GET["order"] ) ? preg_replace( "/[^ a-zA-Z12]/", "", $_GET["order"] ) : "username";
                list( $members, $totalRows ) = Member::getSolicitMembers( $start, PAGE_SIZE, $order );        
                ?>
                <h3>Mostrando solicitudes <?php echo $start + 1 ?> - <?php echo min( $start +  PAGE_SIZE, $totalRows ) ?> de <?php echo $totalRows ?></h3>
                
                <table cellspacing="0" style="width: 30em; border: 1px solid #666;">
                <tr>
                    <th><?php if ( $order != "username" ) { ?><a href="view_solicit_members.php?order=username"><?php } ?>Usuario<?php if ( $order != "username" ) { ?></a><?php } ?></th>
                    <th><?php if ( $order != "txtRazon" ) { ?><a href="view_solicit_members.php?order=txtRazon"><?php } ?>Empresa<?php if ( $order != "txtRazon" ) { ?></a><?php } ?></th>
                    <th><?php if ( $order != "shopname" ) { ?><a href="view_solicit_members.php?order=shopname"><?php } ?>Nombre comercial<?php if ( $order != "shopname" ) { ?></a><?php } ?></th>
                </tr>
                <?php 
                $rowCount = 0;
                foreach ( $members as $member ) {
					$rowCount++;
					?>
					<tr<?php if ( $rowCount % 2 == 0 ) echo ' class="alt"' ?>>
						<td><a href="view_solicit_member.php?shopid=<?php echo $member->getValueEncoded( "shopid" ) ?>&amp;start=<?php echo $start ?>&amp;order=<?php echo $order ?>"><?php echo $member->getValueEncoded( "username" ) ?></a></td>
						<td><?php echo $member->getValueEncoded( "txtRazon" ) ?></td>
						<td><?php echo $member->getValueEncoded( "shopname" ) ?></td>
					</tr>
					<?php
                }
                ?>
                </table>            
        
                <div style="width: 30em; margin-top: 20px; text-align: center;">
				<?php 
				if ( $start > 0 ) { ?>
                      <a href="view_solicit_members.php?start=<?php echo max( $start - PAGE_SIZE, 0 ) ?>&amp;order=<?php echo $order ?>">Previous page</a>
                <?php 
				}  
				if ( $start + PAGE_SIZE < $totalRows ) { ?>
                      <a href="view_solicit_members.php?start=<?php echo min( $start + PAGE_SIZE, $totalRows ) ?>&amp;order=<?php echo $order ?>">Next page</a>
                <?php 
				}               
                ?>
                </div>    
    			<?php    
      			}
      		else{
				echo "No estás autorizado a entrar en el área de administración.";
     			echo "<a class=\"avance\" href=\"../admin/login.php\">Haz login</a>";
				}?>
      
			</div><!-- //CONTENIDO -->
    
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