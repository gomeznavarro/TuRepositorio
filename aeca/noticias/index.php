<?
require_once("../display_partes.php");
require_once( "../clases/Member.class.php" );
require_once("../admin/book_sc_fns.php");


  // iniciamos sesión para seguir a admin, socios y clientes
     session_start(); 

  	displayPageHeaders( "Noticias AECA", $membersArea = true,  $gallery=false);
	displaygalleryppal( $membersArea = true, $gallery=false);

	  	?>
	<body id="tab5">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false, $foto=true);

 	displaySolapas( $membersArea = true);
	displayCentral( $membersArea = true, $menu=false, "Noticias", $banner=false,$foto=true, $gallery=false, $socios_menu=false, $clientes_menu=false);

?>


<!-- CONTENT -->

<div id="content">
<?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
<div id="global_lateralycontenido"  > <!-- igualar columnas -->
<?php
if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
		display_menu_gral_admin();

 }?>
	<!-- LATERAL -->
	<div id="lateral" style="padding-top:50px; width:240px">
 <div id="catnoticias" style="width:100%; ">
	<?php
	           
$noticias_array = get_noticias();
           
			display_noticias($noticias_array)
?>
</div>
</div>
	<!-- CONTENIDO -->
    
 <div id="contenido" style="width:650px;">
 <div id="principal_1col">
	<?php
require_once("cont_noticias.php");  
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



    
	
