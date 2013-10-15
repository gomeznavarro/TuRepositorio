

<?php
require_once( "common.inc.php" );
require_once("display_partes.php");
include_once("admin/db_fns.php"); 
include_once("admin/output_fns.php");
include_once("admin/book_fns.php");
include_once("registro_users_fns.php");
require_once("admin/user_auth_fns.php");

session_start();

displayPageHeaders( "Registro Clientes AECA", $membersArea = false, $gallery=false);
displaygalleryppal($membersArea = false, $gallery=false);

?>
<body id="tab3">
<?php
displayPageHeadings($membersArea = false, $noticias = false, $gallery=false);
displaySolapas( $membersArea = false);
displayCentral( $membersArea = false, $menu=false, "Registro de clientes", $banner=false, $foto=false, $gallery=false,$socios_menu=false,$clientes_menu=true);
?>

    <!-- CONTENT -->
    <div id="content">
        <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="members/logout.php">Logout</a></div>';
        else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="users/logout.php">Logout</a></div>';
        else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="admin/logout.php">Logout</a></div>';?>
       
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
        <?php		
		if (check_admin_user()){  
		display_menu_gral_admin($membersArea=false); 
		}?>
    
            <!-- CONTENIDO -->
            <div id="contenido">
            <?php	
            if(isset($_SESSION['user'])&& $_SESSION['user']!='') {
				
				$user_id=$_SESSION['user']->getValue('user_id');
				echo "<div id=\"principal\">";
				echo "<p><strong>". $_SESSION['user']->getValue('username')."</strong>, ya estás registrado. Puedes cambiar tus datos en: "; 	
				display_enlace_ppal("users/view_theuser.php?userId=$user_id","Edici&oacute;n de tus datos");
				echo "</p></div>";
            }
            else{
                
                if ( isset( $_POST["action"] ) and $_POST["action"] == "register" ) {
                  processForm();
                } 
                else {
                  displayForm( array(), array(), new User( array() ) );
                }
            }
            ?>
                    <script type="text/javascript">
                    //<![CDATA[
                    $('#RE_Prov').change(function () {
                    var provincia =document.getElementById("RE_Prov").value;
                    var municipio = $(this).attr("municipioattri");
                    var to=document.getElementById("Buscando");
                    to.innerHTML="buscando....";
                    $.ajax({
                    type: "POST", 
                    url: "busqueda.php",
                    data: 'idprovincia='+provincia+'&id='+municipio,
                    success: function(a) {
                    $('#RE_pobla').html(a);
                    var to=document.getElementById("Buscando");
                    to.innerHTML="";
                    }
                    });
                    })
                       //]]>  
                    </script> 
    
    
                <div class="clear"></div><!-- /NO TOCAR -->
                    
           </div> <!-- //CONTENIDO -->
    
                <div class="clear"></div>
             
       </div><!-- //igualar columnas -->
                
        <!-- MENU_INFERIOR -->			
    
        <?php displayMenuInf( $membersArea = false); ?>
    
    </div><!-- //CONTENT -->        
        
<!-- PIE -->  

<?php displayFooter( $membersArea = false); ?>
