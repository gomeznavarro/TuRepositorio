<?php
require_once("display_partes.php");
require_once("admin/db_fns.php"); 
require_once("admin/output_fns.php");
require_once("admin/book_fns.php");
require_once("admin/user_auth_fns.php");
require_once( "common.inc.php" );

session_start();

displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = false, $noticias = false, $gallery=false);
displaygalleryppal( $membersArea = false, $noticias = false, $gallery=false);
?>
<body id="tab2">
<?php 
displayPageHeadings($membersArea = false, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = false);
displayCentral($membersArea = false, $menu=false, "Formaci&oacute;n", $banner=false, $foto=false, $gallery=false, $socios_menu=true, $clientes_menu=false);
?>

    <!-- CONTENT -->
    <div id="content">
    <?php if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="members/logout.php">Logout</a></div>';
    else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="users/logout.php">Logout</a></div>';
    else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="admin/logout.php">Logout</a></div>';?>
    
        <div id="global_lateralycontenido"> <!-- igualar columnas -->
    
            <!-- LATERAL -->
            <div id="lateral">
                <div id="cat">
                    <ul style="width:170px"> 
                        <li class="nivel1 aa"><a href="#" class="nivel1" >Cursos</a></li>
                        <li class="nivel1 bb"><a href="#" class="nivel1">Plan Prepara</a></li>                                
                        <li class="nivel1 cc"><a href="#" class="nivel1">Ayudas</a></li>
                    </ul>			
                </div>
            </div><!-- //LATERAL -->
    
            <!-- CONTENIDO -->
            <div id="contenido">
            <script type="text/javascript">
            $(document).ready(function(){
                
                $('.aa').click(function(){
                    $('.a').hide();
                    $('.b').show();
                    $('.c').hide();
                    $('.d').hide();
                });
                $('.bb').click(function(){
                    $('.c').show();
                    $('.a').hide();
                    $('.b').hide();
                    $('.d').hide();
                });
                $('.cc').click(function(){
                    $('.d').show();
                    $('.a').hide();
                    $('.b').hide();
                    $('.c').hide();
                })
            });
            </script>
                <!-- ARTICULOS -->
                <div id="principal_1col" >
        
                    <div class="a">
                        <h2>Formaci&oacute;n</h2>
                        <p class="articulo">En AECA creemos que la formaci&oacute;n es le mejor instrumento magna non erat blandit eleifend. Ut felis felis, varius commodo dictum nec, molestie sit amet lectus. Morbi eget magna urna, sed dignissim purus. Donec sit amet tellus tellus, nec tempor nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam.</p> 
                    </div>
                    
                    <div class="b ">
                        <h3>Cursos</h3>
                        <p class="articulo">Tenemos una gran variedad de cursos a tu disposici&oacute;n. Morbi eget magna urna, sed dignissim purus. Donec sit amet tellus tellus, nec tempor nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam.</p>
                        
                        <div class="cursos">
                            <h4>Administraci&oacute;n de Empresas</h4>
                            <dl>
                            <dt>La direcci&oacute;n para la empresa del sigo XXI (630h)</dt>
                                 <dd>El Marketing en la empresa: Estrategia, Herramientas y Planes de &Eacute;xito</dd>
                                 <dd>El &eacute;xito en la venta: Direcci&oacute;n y T&eacute;cnicas comerciales</dd>
                                 <dd>Direcci&oacute;n de operaciones</dd>
                                 <dd>Direcci&oacute;n de Sistemas de Informaci&oacute;n y Control</dd>
                                 <dd>Gesti&oacute;n de Recursos Humanos</dd>
                                 <dd>Gesti&oacute;n Econ&oacute;mica y financiera</dd>
                                 <dd>Habilidades Directivas: el l&iacute;der en Acci&oacute;n</dd>
                                 <dd>Creaci&oacute;n de empresas</dd>
                            </dl>
                            <dl>
                            <dt>Econom&iacute;a Financiera (460h)</dt>
                                 <dd>Introducci&oacute;n a las Finanzas y los Mercados Financieros.
                                 <dd>Valoraci&oacute;n de activos financieros de renta fija y variable.
                                 <dd>Valoraci&oacute;n de proyectos de inversi&oacute;n en condiciones de certeza.
                                 <dd>Valoraci&oacute;n de proyectos de Inversi&oacute;n en Condiciones de riesgo.
                                 <dd>Rentabilidad y riesgo. Fundamentos de la teor&iacute;a de cartera.
                                 <dd>El an&aacute;lisis media-varianza: El modelo de Markowitz.
                                 <dd>Modelo de valoraci&oacute;n de activos con riesgo. Capital Asset Pricing Model (CAPM).
                                 <dd>Eficiencia de los mercados financieros y precios de los activos.
                                 <dd>Introducci&oacute;n a los mercados de derivados (I). Futuros
                                 <dd>Introducci&oacute;n a los mercados de derivados (II). Opciones Financieras. Valoraci&oacute;n. Modelo de Black & Scholes. Acciones 
                           </dl>
                       </div>
                    </div>
                    
                    <div class="c ">
                        <h3>Plan Prepara</h3>
                        <p class="articulo">El Plan Prepara consiste en la utilizaci&oacute;n de nuestra tarjeta com&uacute;n para commodo dictum nec, molestie sit amet lectus. Morbi eget magna urna, sed dignissim purus. Donec sit amet tellus tellus, nec tempor nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum.</p> 
                    </div>
                    
                    <div class="d ">
                        <h3>Ayudas al estudio</h3>
                        <p class="articulo">Si quieres seguir form&aacute;ndote eget magna urna, sed dignissim purus. Donec sit amet tellus tellus, nec tempor nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis lectus mauris, non aliquet diam. Quisque iaculis dapibus est eget lacinia. Quisque malesuada ante sodales mi sodales vitae porta libero condimentum. Pellentesque lorem erat, auctor non fermentum eget, aliquam a quam.</p> 
                    </div>	
                    
                </div>
                <?php                 
                require_once ("cierre_fotos.inc.php"); 
                ?> 
    
            </div>    	<!-- //CONTENIDO -->
    
                <div class="clear"></div>
             
        </div><!-- //igualar columnas -->
                
    <!-- MENU_INFERIOR -->			
    <?php
    displayMenuInf( $membersArea = false);
    ?>
    
    </div><!-- //CONTENT -->
        
<!-- PIE -->  
<?php
displayFooter( $membersArea = false);
?>







