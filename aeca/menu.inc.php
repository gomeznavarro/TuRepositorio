                    
					<ul> 
                     <?php if ( !$membersArea )   {  ?>

                     			<li class="nivel1"><a href="register.php" class="nivel1" style="background:#900">Hazte socio</a></li>

                     <?php }       
                     $cat_array = get_categories();
                            if ( !$membersArea ){ 
                                    display_categories_subcategories($cat_array); //este es el normal, de index
							}
                            else{                                    
                                    display_categories_subcategories2($cat_array);                
                            }
							if ( !$membersArea )   {  ?>
                        
                                <li class="nivel1"><a href="tienda/oferton.php" class="nivel1" >Ofertas</a></li>
                                <li class="nivel1"><a href="http://madripedia.es/wiki/Barrio_de_Atocha" class="nivel1">Descubre Atocha</a>
                            <!--[if lte IE 6]><a href="#" class="nivel1ie">Descubre Atocha<table class="falsa"><tr><td><![endif]-->
                            
                                    <ul>
                                        <li><a href="http://es.wikipedia.org/wiki/Estaci%C3%B3n_de_Atocha">La Estaci&oacute;n</a></li>
                                        <li><a href="tienda/show_cat.php?catid=5">Zona de ocio</a></li>
                                        <li><a href="http://www.renfe.com/rutas/Madrid/madridMuseos.html">Zona cultural</a></li>
                                
                                    </ul>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            
                                </li>
                                
                             
                                <li class="nivel1"><a href="register_user.php" class="nivel1">Hazte cliente</a></li>

                                <?php }            
                    			?>
                      </ul>
                                   
                
                