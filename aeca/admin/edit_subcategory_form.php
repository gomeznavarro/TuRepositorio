<?
require_once("book_sc_fns.php");
require_once("output_fns.php");
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Editar Subcategor&iacute;a AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body>
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true, $adminArea=true);
displayCentral( $membersArea = true, $menu=false, "Editar subcategor&iacute;a", $foto=false);
?>


    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        <?php
            if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
            display_menu_gral_admin(); 
            }?> 
        
            <!-- LATERAL -->    
           	<div id="lateral"></div>
           
            <!-- CONTENIDO -->
         	<div id="contenido">
                <div id="edicion">
                <?php
                $subcatid=$_GET['subcatid'];
                if (check_admin_user()){
					
              		if ($edit = get_subcategory_todo($subcatid)){
					  
                  		foreach ($edit as $subcategory){                                
						  display_subcategory_form($subcategory);
						  }
                 	?><div class="clear"></div><?		
                	display_enlacesimple2("../tienda/show_subcat.php?subcatid=$subcatid", "Ir a la subcategor&iacute;a");
                  	}
                  	else
                    echo "<p>No se han podido recuperar los detalles de la categor&iacute;a.</p>";
                }
                else{
                  echo "<p>No est&aacute;s autorizado a entrar en el área de administración.</p>";
                  display_enlacesimple("login_admin.php", "Login");
                }
                ?>
                </div>
                <div class="clear"></div>
                <div style="width: 30em; margin-top: 20px; text-align: center;">
                <a class="avance" href="javascript:history.go(-1)"><<< Volver</a>
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