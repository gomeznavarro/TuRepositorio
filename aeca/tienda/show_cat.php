<?
require_once ('../admin/book_sc_fns.php'); 
require_once("../display_partes.php");
session_start();
displayPageHeaders( "Categor&iacute;as AECA", $membersArea = true);
displaygalleryppal($membersArea = true);

?>
<body id="tab4">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
$catid=$_GET['catid'];	
$catname = get_category_name($catid);
$name="<span style='font-size:.8em'>Asociados ></span>$catname";
displayCentral( $membersArea = true, $menu=true, $name, $foto=false);
?>

    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div style="margin-top:5px; margin-bottom:5px; text-align:right">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a style="color:#000" href="../admin/logout.php">Logout</a></div>'?>
    
        <div id="global_lateralycontenido" style="border-top:0"> <!-- igualar columnas //style border para IE7-->
        
        <?php do_html_header2(); ?>
    
            <!-- LATERAL -->
            <div id="lateral" style="padding-top:50px">
                <?php			
                $subcategory_array = get_subcategories($catid);
                display_subcategories($subcategory_array); 
                ?>
            </div><!-- //LATERAL -->
            <!-- CONTENIDO -->
            <div id="contenido" > 
                            <div id="principal">
    
                <?php
                
                $catid=$_GET['catid'];
                        if(isset($_SESSION['admin_user'])&&$_SESSION['admin_user']!=''){			
        
            display_enlace_ppal("../admin/edit_category_form.php?catid=$catid", "Editar categor&iacute;a");}
        
                $name = get_category_name($catid);
    
                $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    
                if(preg_match ('/aeca\/tienda\/show_cat.php\?catid\=1/', $url)){
                    $name = get_category_name(1);
                    echo '<h1 style="margin-top:30px">'.$name.'</h1>';
                    echo '<p>Las mejores tiendas de Atocha le esperan para realizar sus compras ipsum dolor sit amet, consectetur adipiscing elit. Donec porta arcu a sem. Vestibulum id pede. Maecenas ullamcorper. Donec molestie augue nec nunc. Nunc mi. Fusce iaculis. Aliquam sagittis bibendum velit. Pellentesque laoreet. Integer vehicula ante sed lorem. Morbi vitae velit. Sed ornare congue sapien1. Ut non justo vel metus volutpat congue. Curabitur non tellus et magna dictum ullamcorper. Nunc sollicitudin, justo nec ultricies convallis, elit magna pellentesque pede, et facilisis</p>';
                }
    
                if(preg_match ('/aeca\/tienda\/show_cat.php\?catid\=2/', $url)){
                    $name = get_category_name(2);
                    echo '<h1 style="margin-top:30px">'.$name.'</h1>';
                    echo '<p>Nuestros restaurantes condimentum justo sit amet libero. Praesent rhoncus. Suspendisse potenti. Vivamus mollis magna a nulla. Donec elementum consectetur ligula. Sed nulla. Nunc pulvinar luctus ante. Nullam aliquam facilisis odio. Nam hendrerit justo non risus. Proin sed velit vitae leo dapibus fermentum. Nunc nec est eget ante volutpat faucibus. Cras bibendum. In vitae purus</p>';
                }
    
                if(preg_match ('/aeca\/tienda\/show_cat.php\?catid\=3/', $url)){
                    $name = get_category_name(3);
                    echo '<h1 style="margin-top:30px">'.$name.'</h1>';
                    echo '<p>&iquest;Viene a Madrid a pasar unos d&iacute;as? Aenean fringilla tortor nec nunc. Vivamus a metus a nulla sagittis hendrerit. Phasellus libero sapien, posuere vehicula, viverra ut, ultrices eget, augue. Sed felis. </p>';
                }
    
                if(preg_match ('/aeca\/tienda\/show_cat.php\?catid\=4/', $url)){
                    $name = get_category_name(4);
                    echo '<h1 style="margin-top:30px">'.$name.'</h1>';
                    echo '<p>Para todo lo que necesite, disponemos de los mejores profesionales. Suspendisse potenti. Maecenas mollis semper ante. Nunc adipiscing ipsum vel nulla. Phasellus egestas. Nulla facilisi. Nam lobortis tempor ligula. Vestibulum lorem. Aliquam ut tortor in dolor dignissim accumsan. Morbi cursus consectetur pede. </p>';
                }
    
                if(preg_match ('/aeca\/tienda\/show_cat.php\?catid\=5/', $url)){
                    $name = get_category_name(5);
                    echo '<h1 style="margin-top:30px">'.$name.'</h1>';
                    echo '<p>La mejor oferta de ocio para que disfrute condimentum lobortis. Nunc ac enim. Pellentesque dapibus rutrum mauris. Vestibulum feugiat tincidunt orci. Sed dui. Integer nec ipsum. Suspendisse tincidunt. Aenean eleifend cursus lectus. In vitae quam nec nisl egestas vestibulum. Nam dignissim convallis nulla. Fusce eleifend neque vitae dui. Proin nec ligula ut enim rhoncus ultricies.</p>';
                } ?> 	
     
        <div style="float:right;">
        <?php   
            if(isset($_SESSION['admin_user'])&&$_SESSION['admin_user']!=''){			
        
            display_enlace("../admin/index_admin.php", "P&aacute;gina central de edici&oacute;n");
            display_enlace("../admin/index.php", "Men&uacute; de administraci&oacute;n");
    
            }
             else
    
        ?></div>
     
      <?php
    
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
