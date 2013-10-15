<?
require_once("display_partes.php");
require_once("admin/db_fns.php");
require_once("admin/book_fns.php");
require_once("admin/output_fns.php");
 
displayPageHeaders( "Asociaci&oacute;n Atocha", $membersArea = false, $noticias=false, $gallery=false);
displaygalleryppal($membersArea = false);	
?>
<body id="tab">
<?php 
displayPageHeadings($membersArea = false, $noticias = false, $gallery=false, $foto=true);
displaySolapas( $membersArea = false);
displayCentral( $membersArea = false, $menu=false, "Mapa del sitio", $foto=false, $gallery=false);


?>

<style type="text/css">
#global_lateralycontenidos p{
	font-size:10px;
	color:#666}
#global_lateralycontenidos ul{
	margin-left:200px;
	margin-right:30px;
	border-left: 1px #000 solid;
}
#global_lateralycontenidos ul li{
	padding-bottom:10px;
	margin-left:40px;
}
#global_lateralycontenidos ul li a{
	color:#000;
	list-style:armenian;
	padding-bottom:30px;
	text-decoration:none;
	font-size:15px; 
	font-weight:bold;
	text-align:left
}
#global_lateralycontenidos ul li a:hover {
	color:#900;
}
h3 a {
	color:#000;
	list-style:armenian;	
	font-weight:bold;
}
h3 a:hover {
	color:#900;
	}
#global_lateralycontenidos ul li ul{
	margin-left:120px;
	margin-top:10px;

}
#global_lateralycontenidos ul li ul li {
	padding-bottom:10px;
	margin-left:40px;
	color:#000;
}

#global_lateralycontenidos ul li ul li a {
	color:#000;
	font-size:14px; 
}
#global_lateralycontenidos ul li ul li ul{
	border-bottom:0;
	margin-left:120px;
	margin-top:10px;

}

#global_lateralycontenidos ul li ul li ul li{
	color:#000;
	margin-left:40px;
	padding-bottom:10px;

}
#global_lateralycontenidos ul li ul li ul {
	color:#000;
	margin-left:120px;
	margin-top:10px;
}
#global_lateralycontenidos ul li ul li ul li a{
	color:#000;
	font-size:13px; 

}
#global_lateralycontenidos ul li ul li ul li ul li a{
	color:#000;
	font-size:13px; 
}

</style>

    <!-- CONTENT -->
    <div id="content">
    
        <div id="global_lateralycontenidos"> <!-- igualar columnas -->
                
            <h3 style="margin-left:20px; margin-top:20px"><a href="index.php" >Inicio</a></h3> 			
            <h3 style="margin-left:20px; margin-top:20px"><a href="socios.php" > Socios</a></h3> 			
            
                    <ul>                            
                                    
                        <li class="nivel1"><a href="register.php" class="nivel1" >Hazte socio</a></li>
                        <li class="nivel1"><a href="members/index.php" class="nivel1" >&Aacute;rea de socios</a></li>
                                    
                             <ul> 
                                      <li><a href="members/eventos.php">Pr&oacute;ximos eventos</a></li>
                                      <li><a href="members/miscelanea.php">Miscel&aacute;nea</a></li>
                                      <li><a href="members/listar_archivos.php">Documentaci&oacute;n</a></li>
                                      <li><a href="members/gallery2.php">Galer&iacute;as de fotos socios</a></li>
                                      <li><a href="members/juntas.php">Acuerdos de las &uacute;ltima junta general</a></li>
                                      <li><a href="members/contact.php">Contacto</a></li>
                                      <li><a href="members/change_passwd_form.php">Cambia tu contrase&ntilde;a</a></li>
                                      <li><a href="members/change_user_form.php">Cambia tu usuario</a></li>
                                      <li><a href="members/view_members.php">Edici&oacute;n de tu negocio - listado de otros socios</a></li>
                                      <li><a href="members/logout.php">Logout</a></li>
                            </ul>
                        <li class="nivel1"><a href="servicios.php" class="nivel1">Servicios</a></li>    
                        <ul style="width:170px">                            
                                    
                            <li class="nivel1 aa">Asesoramiento</li>
                            <li class="nivel1 bb">Publicidad conjunta</li>                                
                            <li class="nivel1 cc">Ahorro de costes</li>
                                          
                        </ul>                            
                        <li class="nivel1"><a href="formacion.php" class="nivel1">Formaci&oacute;n</a></li>                          
                        <ul style="width:170px"> 
                                        
                                    
                            <li class="nivel1 aa">Cursos</li>
                            <li class="nivel1 bb">Plan Prepara</li>                                
                            <li class="nivel1 cc">Ayudas</li>
                                          
                        </ul>	
                    </ul> 
                      
             <h3 style="margin-left:20px; margin-top:20px"><a href="clientes.php" > Clientes</a> </h3> 			
                       
                        
                        <ul>     
                            <li class="nivel1"><a href="register_user.php" class="nivel1">Hazte cliente</a></li>
                            <li class="nivel1"><a href="users/index.php" class="nivel1">&Aacute;rea de clientes</a></li>     
                                <ul>
                                    <li><a href="users/eventos.php">Pr&oacute;ximos eventos</a></li>
                                    <li><a href="users/change_passwd_form.php">Cambia tu contrase&ntilde;a</a></li>
                                    <li><a href="users/change_user_form.php">Cambia tu usuario</a></li>
                                    <li><a href="users/view_users.php">Edici&oacute;n de tu perfil - listado de clientes</a></li>
                                    <li><a href="users/logout.php">Logout</a></li>
                                </ul>
                            <li class="nivel1"><a href="tarjeta.php" class="nivel1">Tarjeta descuento</a></li>                          
                            <li class="nivel1"><a href="personal_shopping.php" class="nivel1">Personal shopping</a></li>                          
                            <li class="nivel1"><a href="http://madripedia.es/wiki/Barrio_de_Atocha" class="nivel1">Descubre Atocha</a>
                                   
                                            
                                 <ul>
                                    <li><a href="http://es.wikipedia.org/wiki/Estaci%C3%B3n_de_Atocha">La Estaci&oacute;n</a></li>
                                    <li><a href="tienda/show_cat.php?catid=5">Zona de ocio</a></li>
                                    <li><a href="http://www.renfe.com/rutas/Madrid/madridMuseos.html">Zona cultural</a></li>
                                            
                                 </ul>
                                  
                             </li>
                             <li class="nivel1"><a href="http://es.wikipedia.org/wiki/Madrid" class="nivel1">Descubre Madrid</a>
                                            
                                                <ul>
                                                    <li><a href="http://www.turismomadrid.es/">Qu&eacute; visitar</a></li>
                                                    <li><a href="http://www.guiadelocio.com/madrid">Qu&eacute; hacer</a></li>
                                                    <li><a href="enlaces.php">Enlaces de inter&eacute;s</a></li>
            
                                            
                                                </ul>
                                  
                              </li>
                                           
                        </ul>
            
                    
             <h3 style="margin-left:20px; margin-top:20px"><a href="tienda/index.php" > Nuestros asociados</a> </h3>
             
             <?php
              $cat_array = get_categories();
              
             display_categories_subcategories_mapa($cat_array, $mem=false);
            
              ?>
             <h3 style="margin-left:20px; margin-top:20px"><a href="noticias/index.php" > Noticias</a> </h3>
             <h3 style="margin-left:20px; margin-top:20px"><a href="gallery/gallery.php" > Galer&iacute;a de fotos</a> </h3>
             <h3 style="margin-left:20px; margin-top:20px"><a href="register_comment.php" > Contacto</a> </h3>
            
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
