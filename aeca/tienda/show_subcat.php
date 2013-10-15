<?
require_once ('../admin/book_sc_fns.php');
require_once("../display_partes.php");

session_start();

displayPageHeaders( "Subcategor&iacute;as AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body id="tab4">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
$subcatid=$_GET['subcatid'];
$subcatname = get_subcategory_name($subcatid);
$catname=get_catname_by_subcatid($subcatid);
$name="<span style='font-size:.8em'>$catname > </span>$subcatname";
displayCentral( $membersArea = true, $menu=true, $name, $foto=false);
?>

    <!-- CONTENT -->
    
    <div id="content">
            <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';?>
    
    <div id="global_lateralycontenido" style="border-top:0"> <!-- igualar columnas //style border para IE7-->
        <?php do_html_header2(); ?>
        
        <!-- LATERAL -->
     <div id="lateral" style="padding-top:50px; width:230px">
     <div id="cat2" style="width:100%">
                <?php			
                $shop_array = get_shops($subcatid);
                display_shops_indice($shop_array); 
                ?>
                </div>
            </div><!-- //LATERAL -->
        <!-- CONTENIDO -->
     <div id="contenido" style="width:670px">
    <div id="principal" style="width:650px">
    
     <?php
    if(isset($_SESSION['admin_user'])&&$_SESSION['admin_user']!=''){			
        
            display_enlace_ppal("../admin/edit_subcategory_form.php?subcatid=$subcatid", "Editar subcategor&iacute;a");}
    
    
    
      // obener la información de la subcategoría de la base de datos
      $shop_array = get_shops($subcatid);
      display_shops($shop_array);
      // si está loqueado como admin, mostrar enlaces añadir y borrar libros
      if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!="")
      {
            display_enlace("../admin/index_admin.php", "P&aacute;gina central de edici&oacute;n");
            display_enlace("../admin/index.php", "Men&uacute; de administraci&oacute;n");
      }
       else{
                    display_enlace("index.php", "Seguir de compras");
                    display_enlace("salir_sin_comprar.php", "Salir sin comprar");					
                  }
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
