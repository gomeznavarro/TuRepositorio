 				
      <?php
	  require_once("../admin/user_auth_fns.php");

	  if (!check_admin_user() && !check_member())
	  echo "No tienes los permisos necesarios para ver esta p&aacute;gina";
	  else{?>          
                <ul>

 					<li class="soc">Inicio</li>
                    <li><a href="../members/index.php">Inicio &aacute;rea socios</a></li>
					
                    <li class="soc">P&aacute;ginas socios</li>
                    <li><a href="../members/eventos.php">Pr&oacute;ximos eventos</a></li>
                    <li><a href="../members/miscelanea.php">Miscel&aacute;nea</a></li>
                    <li><a href="../members/listar_archivos.php">Documentaci&oacute;n</a></li>
                    <li><a href="../members/gallery2.php">Galer&iacute;a fotos socios</a></li>        
                    <li><a href="../members/juntas.php">Juntas generales</a></li>
                    <li><a href="../members/contact.php">Contacto</a></li>

 					<?php if(!isset($_SESSION['admin_user'])){?>
                    <li class="soc">Edici&oacute;n datos</li>
                    <? $shopid=$_SESSION['member']->getValueEncoded('shopid');?>
                    <li><a href="view_themember.php?memberId=<?=$shopid?>">Edici&oacute;n datos</a>   
                    <li><a href="../members/change_user_form.php">Cambia tu usuario</a></li>
                    <li><a href="../members/change_passwd_form.php">Cambia tu contrase&ntilde;a</a></li>
                    <? } ?> 
 					<li class="soc">Listado socios</li>
                    <li><a href="../members/view_members.php">Listado y datos socios</a></li>
                    
                    <li class="soc">Salida</li>
                    <li><a href="../members/logout.php">Logout</a></li>
                </ul>
                
                <? }?>