<?
require_once("../display_partes.php");
require_once("../admin/book_sc_fns.php");

// iniciamos sesión para seguir a admin, socios y clientes
session_start(); 

displayPageHeaders( "Noticias", $membersArea = true, $noticias=false, $gallery=false);
displaygalleryppal($membersArea = true, $noticias=false,$gallery=false);
?>
	<body id="tab5">
    <?php
	displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
 	displaySolapas( $membersArea = true);
	displayCentral( $membersArea = true, $menu=false, "Edici&oacute;n de noticias y comentarios", $foto=false);
?>

        <!-- CONTENT -->
        
        <div id="content">
 <?php if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div style="margin-top:5px; margin-bottom:5px; text-align:right">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a style="color:#000" href="../admin/logout.php">Logout</a></div>';?>
        
        	<div id="global_lateralycontenido" > <!-- igualar columnas -->
        <?php
if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
		display_menu_gral_admin();

 }?>    
   					 	<div id="lateral">
                        </div>
                <!-- CONTENIDO -->
                 <div id="contenido">
                 		<div id="principal" style="margin-left:200px">

				 <h2> Edici&oacute;n de noticias</h2>
                 <? 
                //recibimos la variable id enviada en el enlace por GET 
                $id=$_GET['id']; 
                //conectamos a la base 
                
				//$connect=mysql_connect("localhost","root","140573");
				 //mysql_select_db("mydatabase",$connect); 
				 
                $connect=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london"); 
				mysql_select_db("a5899716_ddbb",$connect);
				
                 if (!mysql_set_charset('utf8', $connect)) {
    echo "Error: No se pudo establecer el conjunto de caracteres.\n";
    exit;
}

//echo 'El conjunto de caracteres actual es: ' .  mysql_client_encoding($connect);

                             
                //hacemos las consultas 
                $result=mysql_query("select * from noticias where id_noticia='$id'" ,$connect); 
                //Una vez seleccionados los registros los mostramos para su edición 
                while($row=mysql_fetch_array($result)) 
                { ?>
               	<form action="edit.php" method="post" id="registro" name="registro">
                    <div style="width: 300px; float:left; margin-bottom:20px">

                <fieldset >
                <legend style="display:none">Editar noticia</legend>
                <input type="hidden"  name="id" value="<?php echo $row['id_noticia']?>" />
                
                <label for="titulo">T&iacute;tulo noticia: </label>
                <input type="text" id="titulo" name="titulo" value="<?php  echo $row['titulo']?>" /> 
                
                <label for="autor">Autor:  </label>                
                <input type="text" id="autor" name="autor" value="<?php  echo $row['autor']?>" /> 
                
                <label for="categoria"> Categor&iacute;a: </label>               
                <input type="text" id="categoria" name="categoria" value="<?php  echo $row['categoria']?>" />
                 
                <label for="fecha_public">Fecha de publicaci&oacute;n (yyyy/mm/dd): </label>
                <input type="text" id="fecha_public" name="fecha_public" value="<?php  echo $row['fecha_public']?>" />
                
                <label for="fecha_fin">Fecha de retirada (yyyy/mm/dd): </label> 
                <input type="text" id="fecha_fin" name="fecha_fin" value="<?php  echo $row['fecha_fin']?>" /> 
                
                <label for="fecha_fin">Escriba el articulo </label> 
                <textarea name="noticia" cols="50" rows="10"><?php  echo $row['noticia']?></textarea>
              <div class="clear"></div>  
                <input class="botonb" type="submit" value="Guardar" />
                </fieldset>
                 </div>
                                 	
                </form>
<div class="clear"></div>  
                
                   
            	 	<div class="clear"></div>  
              
                <? } 
				
                mysql_free_result($result);

	            echo '<h2> Edici&oacute;n de comentarios</h2>';

                echo '<div class="clear"></div>';
                echo '<div id="comment">';
          		echo '<p>Editar, publicar o borrar los comentarios a esta noticia de los siguientes usuarios:</p>';
                
               	$comentario_array = get_comentarios($id);
              	 display_comentarios($comentario_array);
                
                mysql_close($connect) ;

                ?>
                </div>
                   </div>
 			</div>
      		<!-- //CONTENIDO -->
        
                    <div class="clear"></div>
   		</div><!-- //igualar columnas -->
                    
        <!-- MENU_INFERIOR -->			
        
        <?php displayMenuInf( $membersArea = true); ?>        
        
 	</div><!-- //CONTENT -->
        
    <!-- PIE -->  

	<?php displayFooter( $membersArea = true); ?>