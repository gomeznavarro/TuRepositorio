<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/Member.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/user_auth_fns.php");
require_once("../admin/output_fns.php");

session_start();
if (check_admin_user()){
	checkLogin_admin();
}
else checkLogin();
	
displayPageHeaders( "Listado Socios AECA", $membersArea = true, $noticias=false);
displaygalleryppal($membersArea = true, $noticias=false);

  	?>
	<body id="tab2">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false,  $gallery=false);
 	displaySolapas( $membersArea = true);
 	displayCentral( $membersArea = true, $menu=false, "Listado de socios", $foto=false, $gallery=false);
	?>

        <!-- CONTENT -->
        
        <div id="content">
        <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
		else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
        
            <div id="global_lateralycontenido"> <!-- igualar columnas -->
            <?php 
			display_menu_gral_socios();
            display_menu_gral_admin(); 
			?> 
                
            	<!-- LATERAL -->
                <div id="lateral">
              	
           		<?php if(isset($_SESSION['member'])&& $_SESSION['member']!='')	{?>                      
                	<div id="cat" >            
                         <?php  require_once("../members/menu_cat_area_socios.php"); ?>
                 	</div>
                <? }?>
                </div><!-- //LATERAL -->
        
                <!-- CONTENIDO -->
                <div id="contenido">
                         <?php  if (!check_admin_user()){?>
     				<div id="principal" class="letreros">        

        
                	<?php }	
                  	if ((isset ($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') ||(isset ($_SESSION['member'])&& $_SESSION['member']!='')) {		  
                     
                        $start = isset( $_GET["start"] ) ? (int)$_GET["start"] : 0;
                        $order = isset( $_GET["order"] ) ? preg_replace( "/[^ a-zA-Z12]/", "", $_GET["order"] ) : "username";
                        list( $members, $totalRows ) = Member::getMembers( $start, PAGE_SIZE, $order );
        
						if (check_member()) { 
						
								$shopid=$_SESSION['member']->getValueEncoded('shopid');	
								display_enlace_ppal("view_themember.php?memberId=$shopid","Edici&oacute;n de tus datos");
					
								?>
								<h3>Listado de todos los socios <?php echo $start + 1 ?> - <?php echo min( $start +  PAGE_SIZE, $totalRows ) ?> de <?php echo $totalRows ?></h3> 
								<p>Pincha los enlaces para ver sus detalles</p> 
								 
								<table cellspacing="0" style="width: 630px; border: 1px solid #666;">
								  <tr>
									<th ><?php if ( $order != "username" ) { ?><a href="view_members.php?order=username"><?php } ?>Username<?php if ( $order != "username" ) { ?></a><?php } ?></th>
									<th><?php if ( $order != "txtRazon" ) { ?><a href="view_members.php?order=txtRazon"><?php } ?>Empresa<?php if ( $order != "txtRazon" ) { ?></a><?php } ?></th>
									<th><?php if ( $order != "shopname" ) { ?><a href="view_members.php?order=shopname"><?php } ?>Nombre comercial<?php if ( $order != "shopname" ) { ?></a><?php } ?></th>
							
								 </tr>
							<?php
							$rowCount = 0;
								
							foreach ( $members as $member ) {
							$rowCount++;
							?>
								<tr<?php if ( $rowCount % 2 == 0 ) echo ' class="alt"' ?>>
										<td><a href="view_member2.php?memberId=<?php echo $member->getValueEncoded( "shopid" ) ?>&amp;start=<?php echo $start ?>&amp;order=<?php echo $order ?>"><?php echo $member->getValueEncoded( "username" ) ?></a></td>
										<td><?php echo $member->getValueEncoded( "txtRazon" ) ?></td>
										<td><?php echo $member->getValueEncoded( "shopname" ) ?></td>
								</tr><?php
							}?>
							</table>
							<?php 	 	
						}
        				else if (check_admin_user()) { 	?>
                        
                            <h3>Mostrando socios <?php echo $start + 1 ?> - <?php echo min( $start +  PAGE_SIZE, $totalRows ) ?> de <?php echo $totalRows ?></h3>
                               <table cellspacing="0" style="width: 40em; border: 1px solid #666;">
                                  <tr>
                                    <th><?php if ( $order != "username" ) { ?><a href="view_members.php?order=username"><?php } ?>Username<?php if ( $order != "username" ) { ?></a><?php } ?></th>
                                    <th><?php if ( $order != "txtRazon" ) { ?><a href="view_members.php?order=txtRazon"><?php } ?>Empresa<?php if ( $order != "txtRazon" ) { ?></a><?php } ?></th>
                                    <th><?php if ( $order != "shopname" ) { ?><a href="view_members.php?order=shopname"><?php } ?>Shop<?php if ( $order != "shopname" ) { ?></a><?php } ?></th>
                                  </tr>
                            <?php
                            $rowCount = 0;
                            
                            foreach ( $members as $member ) {
                              $rowCount++;
                            ?>
                                  <tr<?php if ( $rowCount % 2 == 0 ) echo ' class="alt"' ?>>
                                    <td ><a  href="../admin/view_member.php?memberId=<?php echo $member->getValueEncoded( "shopid" ) ?>&amp;start=<?php echo $start ?>&amp;order=<?php echo $order ?>"><?php echo $member->getValueEncoded( "username" ) ?></a></td>
                                    <td><?php echo $member->getValueEncoded( "txtRazon" ) ?></td>
                                    <td><?php echo $member->getValueEncoded( "shopname" ) ?></td>
                                  </tr>
                            <?php
                            }?>
                          </table><?php
                          }
                            ?>        
                        <div style="width: 30em; margin-top: 20px; text-align: center;">
                        <?php if ( $start > 0 ) { ?>
                        <a class="avance" href="view_members.php?start=<?php echo max( $start - PAGE_SIZE, 0 ) ?>&amp;order=<?php echo $order ?>">P&aacute;gina anterior</a>
                        <?php } ?>
                        <?php if ( $start + PAGE_SIZE < $totalRows ) { ?>
                              <a class="avance" href="view_members.php?start=<?php echo min( $start + PAGE_SIZE, $totalRows ) ?>&amp;order=<?php echo $order ?>">P&aacute;gina siguiente</a>
                        <?php } ?>
                            </div>        
                        <?php      
                        }
          
						 else
						 echo "No est&aacute;s autorizado a entrar. Si eres socio, <a class=\"avance\" href=../members/login.php>haz login</a>";         
                
				  ?>
                   <?php  if (!check_admin_user()){?>
     				</div>        
        
                	<?php }	?>
          		</div>
           		<!-- //CONTENIDO -->
        
                    <div class="clear"></div>
                 
       		</div><!-- //igualar columnas -->
                    
       		<!-- MENU_INFERIOR -->			
        
       		<?php displayMenuInf( $membersArea = true); ?>
        
        
   		</div><!-- //CONTENT -->
        
<!-- PIE -->  

<?php displayFooter( $membersArea = true); ?>

