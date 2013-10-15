<?php

require_once( "common.inc.php" );
require_once("display_partes.php");
include_once("admin/db_fns.php"); 
include_once("admin/output_fns.php");
include_once("admin/book_fns.php");
include_once("registro_fns_sin.php");
require_once("admin/user_auth_fns.php");

session_start();
displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = false, $gallery=false);
displaygalleryppal($membersArea = false, $gallery=false);

?>
<body id="tab2">
<?
displayPageHeadings($membersArea = false, $noticias = false, $gallery=false);
?>


<div id="menu_solapas">

 	

 	<div class="izdo"> 
     
    	<ul class="menu_banderas">             
				
               	<li><a class="banderas" title="Espa&ntilde;ol" href="#"><img src="<?php if ( $membersArea ) echo "../" ?>images/bandera_espana.jpg" alt="Espa&ntilde;ol" width="25" height="15"/></a></li>

            	<li><a class="banderas" title="English" href="#" hreflang="en"><img src="<?php if ( $membersArea ) echo "../" ?>images/bandera_britanica.jpg" alt="English" width="25" height="15"/></a></li>

            	<li><span>S&iacute;guenos en: </span></li>
                <li><a class="banderas sociales" title="S&iacute;guenos en Twitter" href="https://twitter.com/asoc_atocha"><img src="<?php if ( $membersArea ) echo "../" ?>images/twitter.jpg"  height="15" alt="S&iacute;guenos en Twitter"/></a></li>

				<li><a class="banderas sociales" title="S&iacute;guenos en Facebook" href="http://www.facebook.com/pages/Asociaci%C3%B3n-Empresarios-y-Comerciantes-de-Atocha/408269435899290"><img src="<?php if ( $membersArea ) echo "../" ?>images/facebook.jpg" height="15" alt="S&iacute;guenos en Facebook"/></a></li>
                
     	</ul>
              
	</div>                
 	
    <div class="dcho"> 

 		<ul class="solapas">                
                
                <li class="tab1"><a href="<?php if ( $membersArea ) echo "../" ?>index.php" title="Inicio">Inicio</a></li>
                <li class="tab2"><a href="<?php if ( $membersArea ) echo "../" ?>socios.php" title="Socios">Socios</a></li>
                <li class="tab3"><a href="<?php if ( $membersArea ) echo "../" ?>clientes.php" title="Clientes">Clientes</a></li>
                <li class="tab4"><a href="<?php if ( $membersArea ) echo "../" ?>tienda/index.php" title="Nuestros asociados">Nuestros asociados</a></li>
                <li class="tab5"><a href="<?php if ( $membersArea ) echo "../" ?>noticias/index.php" title="Noticias">Noticias</a></li>
                <li class="tab6"><a href="<?php if ( $membersArea ) echo "../" ?>gallery/gallery.php" title="Galer&iacute;a">Galer&iacute;a</a></li>
                <li class="tab7"><a href="<?php if ( $membersArea ) echo "../" ?>contacto.php" title="Contacto">Contacto</a></li>              
                
         </ul>
 
 	</div>  
  
</div><!-- //MENU_SOLAPAS -->
           
          		 <div class="clear"></div>
<?php 
displayCentral( $membersArea = false, $menu=false, "Registro de Socios", $foto=false, $gallery=false);
?>

<!-- CONTENT -->

<div id="content">
        <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="members/logout.php">Logout</a></div>';
        else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="users/logout.php">Logout</a></div>';
        else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="admin/logout.php">Logout</a></div>';?>

	<div id="global_lateralycontenido"> <!-- igualar columnas -->

           		  <?php		if (check_admin_user()){  display_menu_gral_admin($membersArea=false); }?>
       
        <?php
        if ( isset( $_POST["action"] ) and $_POST["action"] == "register" ) {
        processForm();
        } 
        else {
        displayForm( array(), array(), new Member( array() ) );
        }
    ?>
    
    
        <div class="clear"></div><!-- /NO TOCAR -->
                
    
                <div class="clear"></div>
         
   	</div><!-- //igualar columnas -->
			
	<!-- MENU_INFERIOR -->			

	<?php displayMenuInf( $membersArea = false);?>

</div><!-- //CONTENT -->
        
        
<!-- PIE -->  

<?php displayFooter( $membersArea = false); ?>
