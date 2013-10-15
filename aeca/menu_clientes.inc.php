
                
                
               
                        
					<ul> 
                            
                        
                  		<li class="nivel1"><a href="<?php if ( $membersArea ) echo "../" ?>register_user.php" class="nivel1" style="background:#900">Hazte cliente</a></li>
						<li class="nivel1"><a href="<?php if ( $membersArea ) echo "../" ?>users/index.php" class="nivel1">&Aacute;rea de clientes</a></li>                          
                      	<li class="nivel1"><a href="<?php if ( $membersArea ) echo "../" ?>tarjeta.php" class="nivel1">Tarjeta descuento</a></li>                          
                      	<li class="nivel1"><a href="<?php if ( $membersArea ) echo "../" ?>personal_shopping.php" class="nivel1">Personal shopping</a></li>
                        
                        <?php if(!isset($_SESSION['admin_user'])){?>                         
                        <li class="nivel1"><a href="http://madripedia.es/wiki/Barrio_de_Atocha" class="nivel1">Descubre Atocha</a>
                        <!--[if lte IE 6]><a href="#" class="nivel1ie">Descubre Atocha<table class="falsa"><tr><td><![endif]-->
                                
                                    <ul>
                                        <li><a href="http://es.wikipedia.org/wiki/Estaci%C3%B3n_de_Atocha">La Estaci&oacute;n</a></li>
                                        <li><a href="tienda/show_cat.php?catid=5">Zona de ocio</a></li>
                                        <li><a href="http://www.renfe.com/rutas/Madrid/madridMuseos.html">Zona cultural</a></li>
                                
                                    </ul>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            
                     	</li>
                                
                    	<li class="nivel1"><a href="http://es.wikipedia.org/wiki/Madrid" class="nivel1">Descubre Madrid</a>
                        <!--[if lte IE 6]><a href="#" class="nivel1ie">Descubre Madrid<table class="falsa"><tr><td><![endif]-->
                                
                                    <ul>
                                        <li><a href="http://www.turismomadrid.es/">Qu&eacute; visitar</a></li>
                                        <li><a href="http://www.guiadelocio.com/madrid">Qu&eacute; hacer</a></li>
                                        <li><a href="enlaces.php">Enlaces de inter&eacute;s</a></li>
                                
                                    </ul>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            
                     	</li>
                          <? }?>     
					</ul>
                                      
                
               