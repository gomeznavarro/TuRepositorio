<?php
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../config.php" );
require_once( "../clases/User.class.php" );
require_once("../admin/book_sc_fns.php");
require_once("../admin/user_auth_fns.php");
require_once("../admin/output_fns.php");

session_start();
if (check_admin_user()){
	checkLogin_admin();
}
else checkLogin_user();

displayPageHeaders( "Listado Clientes AECA", $membersArea = true, $noticias=false);
displaygalleryppal( $membersArea = true);

?>
<body id="tab3">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Listado de Clientes", $foto=false, $gallery=false);
?>

    <!-- CONTENT -->
    
    <div id="content">
        <?php if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../users/logout.php">Logout</a></div>';
     else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
		<?php
        if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
        display_menu_gral_admin($membersArea=true);        
        }?>    
            <!-- LATERAL -->
             <div id="lateral">
             
             <?php 
			 if(isset($_SESSION['user'])&& $_SESSION['user']!='')	{?>
               
             	<div id="cat" >
             	<?php  require_once("../users/menu_cat_area_clientes.php"); ?>
             	</div>
              <? 
			  }?>
              
            </div><!-- //LATERAL -->
            
            <!-- CONTENIDO -->
            <div id="contenido">
            	<div id="principal" class="letreros">        
            	<?php
          		if (check_admin_user() || check_user()) {	  
          
				$start = isset( $_GET["start"] ) ? (int)$_GET["start"] : 0;
				$order = isset( $_GET["order"] ) ? preg_replace( "/[^ a-zA-Z12]/", "", $_GET["order"] ) : "username";
				list( $users, $totalRows ) = User::getUsers( $start, PAGE_SIZE, $order );
				
					if (check_user()) {
                    
					$user_id=$_SESSION['user']->getValueEncoded('user_id');	
                    display_enlace_ppal("view_theuser.php?userId=$user_id","Edici&oacute;n de tus datos");
					?>
    
         			<h3 style=" margin-top:20px">Listado de todos los clientes <?php echo $start + 1 ?> - <?php echo min( $start +  PAGE_SIZE, $totalRows ) ?> de <?php echo $totalRows ?></h3>  
                
                            <table cellspacing="0" style="width: 630px; border: 1px solid #666;">
                            <tr>
                                <th><?php if ( $order != "username" ) { ?>
                                    <a href="view_users.php?order=username"><?php } ?>Usuario<?php if ( $order != "username" ) { ?></a>
                                <?php } ?></th>
                                <th><?php if ( $order != "firstName" ) { ?>
                                    <a href="view_users.php?order=firstName"><?php } ?>Nombre<?php if ( $order != "firstName" ) { ?></a>
                                <?php } ?></th>
                            </tr>
                            <?php
                            $rowCount = 0;
                            foreach ( $users as $user ) {
                            $rowCount++;
                            ?>
                            <tr<?php if ( $rowCount % 2 == 0 ) echo ' class="alt"' ?>>
                            <td><a href="view_user2.php?userId=<?php echo $user->getValueEncoded( "user_id" ) ?>&amp;start=<?php echo $start ?>&amp;order=<?php echo $order ?>">							          <?php echo $user->getValueEncoded( "username" ) ?></a></td>
                            <td><?php echo $user->getValueEncoded( "firstName" ) ?></td>
                            </tr>
                    <?php } ?>
                    </table>
                    <?php
                    }
					
    				if (check_admin_user()) {?>
                    
                	<h2>Mostrando usuarios <?php echo $start + 1 ?> - <?php echo min( $start +  PAGE_SIZE, $totalRows ) ?> de <?php echo $totalRows ?></h2>
    
                            <table cellspacing="0" style="width: 40em; border: 1px solid #666;">
                              <tr>
                                <th><?php if ( $order != "username" ) { ?>
                                <a href="view_users.php?order=username"><?php } ?>Usuario<?php if ( $order != "username" ) { ?></a>
								<?php } ?></th>
                                <th><?php if ( $order != "firstName" ) { ?>
                                <a href="view_users.php?order=firstName"><?php } ?>Nombre<?php if ( $order != "firstName" ) { ?></a>
								<?php } ?></th>
                            </tr>
                        	<?php
                        	$rowCount = 0;
                        
                        	foreach ( $users as $user ) {
                          	$rowCount++;
                        	?>
                            <tr<?php if ( $rowCount % 2 == 0 ) echo ' class="alt"' ?>>
                                <td><a href="../admin/view_user.php?userId=<?php echo $user->getValueEncoded( "user_id" ) ?>&amp;start=<?php echo $start ?>&amp;order=<?php echo $order ?>"><?php echo $user->getValueEncoded( "username" ) ?></a></td>
                                <td><?php echo $user->getValueEncoded( "firstName" ) ?></td>
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
          <a class="avance" href="view_users.php?start=<?php echo max( $start - PAGE_SIZE, 0 ) ?>&amp;order=<?php echo $order ?>">P&aacute;gina anterior</a>
    <?php } ?>
    &nbsp;
    <?php if ( $start + PAGE_SIZE < $totalRows ) { ?>
          <a class="avance" href="view_users.php?start=<?php echo min( $start + PAGE_SIZE, $totalRows ) ?>&amp;order=<?php echo $order ?>">P&aacute;gina siguiente</a>
    <?php } ?>
        </div>
    
    <?php
    
      }
      else
      echo "No estás autorizado a entrar en el área de usuarios";
      
            
      ?>
      </div>
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

