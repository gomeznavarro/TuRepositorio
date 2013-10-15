<?php 
require_once("../display_partes.php");
require_once( "../common.inc.php" );
require_once( "../clases/Member.class.php" );
require_once( "../clases/User.class.php" );
require_once("../admin/book_sc_fns.php");


// iniciamos sesión para seguir a admin, socios y clientes
session_start(); 

displayPageHeaders( "Noticias", $membersArea = true, $noticias=false, $gallery=false);
displayscriptsnoticias();
displaygalleryppal( $membersArea = true, $gallery=false);

?>
<body id="tab5">
<?php
displayPageHeadings($membersArea = true, $noticias = false, $gallery=false);
displaySolapas( $membersArea = true);
displayCentral( $membersArea = true, $menu=false, "Noticias", $foto=false);
?>
		<!-- CONTENT -->
		
		<div id="content">
		<?php
		if(isset($_SESSION['member'])&& $_SESSION['member']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['member']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
		else if(isset($_SESSION['user'])&& $_SESSION['user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['user']->getValue('username').'</strong> | <a class="infos" href="../members/logout.php">Logout</a></div>';
		else if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='') echo '<div class="logged">Est&aacute;s identificado como <strong>'. $_SESSION['admin_user']->getValue('username').'</strong> | <a class="infos" href="../admin/logout.php">Logout</a></div>';
		?>
		
			<div id="global_lateralycontenido" > <!-- igualar columnas -->
			<?php
            if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
            display_menu_gral_admin(); 
            }?> 
				<!-- LATERAL -->
				<div id="lateral">		
					<div id="cat">						
						<ul>
						<li><a href="index.php">Noticias</a></li>
						</ul>
					</div>
				</div><!-- //LATERAL -->
			
				<!-- CONTENIDO -->
				<div id="contenido" style="margin-top:30px">
					<div id="principal">
					<?php
					//recibimos la variable id enviada en el enlace por GET 
					$id=$_GET['id']; 
					
					if(isset($_SESSION['member'])&& $_SESSION['member']!='')
					$a=  $_SESSION["member"]->getValue( "username" );
					
					if(isset($_SESSION['user'])&& $_SESSION['user']!='')	
					$b=  $_SESSION["user"]->getValue( "username" );
				
					if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='')	
					$c=  $_SESSION["admin_user"]->getValue( "username" );
				
					//conectamos a la base 
					//$connect=mysql_connect("localhost","root","140573"); 
					//mysql_select_db("mydatabase",$connect);
					
					$connect=mysql_connect("mysql7.000webhost.com", "a5899716_silvia", "160989london"); 	
					mysql_select_db("a5899716_ddbb",$connect);		
				
					if (!mysql_set_charset('utf8', $connect)) {
						echo "Error: No se pudo establecer el conjunto de caracteres.\n";
						exit;
					}
				
					//hacemos las consultas 
					$result=mysql_query("select * from noticias where id_noticia='$id'" ,$connect); 
					//Una vez seleccionado el registro, mostramos la noticia completamente 
					if (!$result) { // add this check.
						die('Error en la consulta: ' . mysql_error());
					}
					
					$num_rows=mysql_num_rows($result); 
					while($row=mysql_fetch_array($result)) 
					{ 
					$result2=mysql_query("select * from comentarios where id='$id'" ,$connect); 
						if (!$result2) { // add this check.
							die('Error en la consulta: ' . mysql_error());
						}
					$num_rows2=mysql_num_rows($result2); 
					$fecha=$row['fecha'];
							$fecha=(string)$fecha;
							$fechas=explode('-', $fecha);
							$primero=substr( $fechas[2],0,2);
							$hora=substr( $fechas[2],3,8);
							$fecha="$primero-$fechas[1]-$fechas[0] / $hora";
					
					if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){
						?> <form name="borrado" action="borrar.php" method="post" >
								<input type="hidden"  name="id" value="<?php  echo $row['id_noticia']?>" />
								<input class="edicion" type="button"  onclick="pregunta()" value="Borrar noticia" />
							</form>								
						<?	
						echo '<a class="edicion" style="color:#fff" href="editar.php?id='.$row['id_noticia'].'">Editar noticia y comentarios</a>';
						echo '<div class="clear"></div>';
						}
						echo '<h3 style="color:#006; font-size:24px">'.$row['titulo'].'</h3>'.'<span style="font-size:.8em; ">'.$row['autor'].' | '.$fecha.' | '.$row['categoria'].'</span><p style="margin-top:10px; margin-bottom:20px">'.$row['noticia'].'</p>';
					} 
					mysql_free_result($result) 
					?>
						<div id="comentarios">
						<? 
							echo '<h4>Comentarios:</h4>';
							//hago la llamada a la base 
							$result3=mysql_query("select * from comentarios where id='$id' and publicacion='s'" ,$connect); 
							//Bucle while para visualizarlos 
							while($rows=mysql_fetch_array($result3)){ 
						
							$fecha=$rows['fecha_com'];
							$fecha=(string)$fecha;
							$fechas=explode('-', $fecha);
							$dia=substr( $fechas[2],0,2);
							$hora=substr( $fechas[2],3,8);
							$autor=$rows['nick'];
							$rotulo="$dia-$fechas[1]-$fechas[0] / $hora";
							$tipo=$rows['tipo'];
							if ($tipo=='m') $tipo='Socio';
							if($tipo=='u')$tipo='Cliente';
									
							echo '<div style="margin-left:20px; margin-bottom:15px; border-bottom:1px solid #999"><span style="font-size:.8em; ">'.$autor.' | '.$rotulo.' | '.$tipo.'</span><p style="margin-left:20px;margin-top:10px; font-size:0.9em">'.$rows['comentario'].'</p></div> '; 
								
							}
							?>
							</div>
							<?php
							 if((isset($_SESSION['member'])&& $_SESSION['member']!='')||(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='')
							 ||(isset($_SESSION['user'])&& $_SESSION['user']!='')  ){
								 
							 ?>
							 <div id="comentar">
							<?php if(isset($_SESSION['member'])&& $_SESSION['member']!='')echo "<p style='margin-bottom:20px'>&iquest;C&oacute;mo est&aacute;s <strong>$a</strong>?</p>";?>
							<?php if(isset($_SESSION['user'])&& $_SESSION['user']!='')echo "<p style='margin-bottom:20px'>&iquest;C&oacute;mo est&aacute;s <strong>$b</strong>?</p>";?>
						
					
							<form action="editacomentarios.php" method="post" name="registro" id="registro" onSubmit="return gracias()">
                                <div style="width: 300px; float:left; margin-bottom:20px">
                                    <fieldset>
                                        <legend>Comentarios</legend> 
                                        <label for="comentario">Escribe tu comentario</label>
                                        <textarea id="comentario" name="comentario" cols="50" rows="10"></textarea> 
                                    </fieldset>
                                    <div style="clear: both;">
                                        <input type="submit" value="Enviar comentario" />
                                        <input type="hidden" name="id" value="<?php echo $id?>" />
                                        <input type="hidden" name="nick" value="<?php if(isset($_SESSION['member']))echo $a; else if(isset($_SESSION['user']))echo $b; else if(isset($_SESSION['admin_user']))echo $c?>" /> 
                                        <input type="hidden" name="tipo" value="<?php if(isset($_SESSION['member']))echo 'm'; else if(isset($_SESSION['user']))echo 'u'; else if(isset($_SESSION['admin_user']))echo 'a';?>" />
                                        <input type="hidden" name="publicacion" value="n" />
                                    </div>
                                </div>
							</form>
							
							</div>
							<?php 
							}
						
							else {
							?><p id="info_login" style="font-size:.9em; margin-left:20px;margin-top:10px; font-weight:bold; color:#900">&iexcl;Haz login para poder hacer comentarios!</p><?
							  require_once ("login.html");
						}?>	
					</div>
			 </div>    <!-- //CONTENIDO -->
			
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