
<div id="tren">    

			<a href="http://www.renfe.com"><img src="<?php if ( $membersArea ) echo "../" ?>images/tren_F3F3F3.jpg" alt="Renfe" name="Renfe" width="70"/></a>

		</div>
		 				<div class="clear"></div>  


<div id="buscador">

		<?php 
		if ( !$membersArea ) echo '<form name="busqueda"  onsubmit="return OnSubmitForm();" action="post">'; 			
        else echo '<form name="busqueda"  onsubmit="return OnSubmitForm2();" action="post">';
        ?>
            
            <fieldset>            
				<legend> B&uacute;squeda</legend>                
            	<label class="no_visible" for="busqueda">Buscador</label>
				<input id="busqueda" class="buscar" maxlength="2000" name="q" onfocus="if (this.value=='Escribe aqu&iacute; tu b&uacute;squeda...') this.value='';" value="Escribe aqu&iacute; tu b&uacute;squeda..."/>
            
                		<div class="clear"></div> <!-- NO TOCAR necesario en Firefox-->
		
       			<div class="botones">
            
					<label class="no_visible" for="busca_google">Busca en Google</label>
           			<input  id="busca_google" tabindex="1" title="Busca en Google" type="radio" name="sitesearch" value=""/> 
         
					<img  src="<?php if ( $membersArea ) echo "../" ?>images/Logo_40wht.gif" alt="Google" name="Google" width="60"/>
            
            		<label class="no_visible" for="busca_sitio">Busca en Atocha.es</label>  
            		<input id="busca_sitio"  tabindex="2" title="Busca en Atocha.es" type="radio" name="sitesearch" checked="checked" value="1"/> 
                    <span>Atocha.es</span>
            
           		 	<input class="boton_buscar" type="submit" value="Buscar"/>
              
              			<div class="clear"></div> 
                        
				</div>            
       
	 		</fieldset>
	 	</form>

   		</div>	 <!--//BUSCADOR-->