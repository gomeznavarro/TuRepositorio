<?php

require_once("../display_partes.php");
require_once("../admin/db_fns.php"); 
require_once("../admin/output_fns.php");
require_once("../admin/book_fns.php");
require_once( "../common.inc.php" );
session_start();

	displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = true, $gallery=true);
	displaygallery();
	displaygalleryppal($membersArea = true, $gallery=true);

		?>
	<body id="tab6">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=true, $foto=true);

 	displaySolapas( $membersArea = true);
 	displayCentral( $membersArea = true, $menu=false, "Galer&iacute;a de fotos", $banner=false, $foto=false, $gallery=true)
?>

<!-- CONTENT -->

<div id="content" >
<?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../users/logout.php">Logout</a></div>';
else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
<div id="global_lateralycontenido" style="background-color:#000"> <!-- igualar columnas -->
	<!-- LATERAL -->
    
	<?php
//displayLateral( $membersArea = false, $clientesArea=false, $sociosArea=false);

?>
	<!-- CONTENIDO -->
 		
	<!--<div id="contenido">
	<?php
//require ("contenido.inc.php");
?>

 <!--GALLERY-->
      
  
      <div id="gallery" style="margin-bottom:20px">
      		
            
           

            
            
         
		<div class="content" >
			<div id="myGallery" >
            
					<?php
                   include('../config2.php');
                    $result = mysql_query("SELECT * FROM photos where publicar='1'") or die("Error en: $busqueda: " . mysql_error());
        
                    while($row = mysql_fetch_array($result) )
                    {
            
                    echo '<div class="imageElement">';
                    echo '<h3>'.$row['title'].'</h3>';
                    echo '<p>'.$row['description'].'</p>';
                  echo '<a href="#" class="open" title="'.$row['title'].'">
                  <img src="'.$row['location'].'" class="full"/></a>  		
                  <img src="'.$row['location_mini'].'"  class="thumbnail"/></a>
                  </div>';
               }			
                ?>		

            
   
            

			
			</div>
		</div>
      </div>
      
      <!--END GALLERY  -->
	
    

					<div class="clear"></div><!-- /NO TOCAR -->
            
<!--</div>  //CONTENIDO -->

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


    










