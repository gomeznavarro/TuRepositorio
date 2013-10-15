<?
function displayForm( $errorMessages, $missingFields, $member ) {

  if ( $errorMessages ) {
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  } else {
	   
	  if (!isset ($_SESSION['admin_user'])){
?>	
	<div class="inform" style="float:left; margin:20px 0px 20px 100px;">
    <p>Gracias por tu inter&eacute;s</p>
    <p>Para registrarte introduce tus detalles y pulsa Enviar.</p>
    <p>Los campos marcados con un asterisco (*) son obligatorios.</p>
    </div>
<?php } }?>
    <form action="register.php" method="post" style="float:left; margin-left: 100px; margin-bottom: 50px;" id="registro" name="registro" >

    <div style="width: 500px; float:left; margin-bottom:20px">
    
        <input type="hidden" name="action" value="register" />
        <input type="hidden" name="alta" value="n" /> 

        <fieldset>

            <legend class="visible">Datos de la empresa</legend>
            
            <label for="txtRazon"<?php validateField( "txtRazon", $missingFields ) ?>>Raz&oacute;n Social *</label>
            <input type="text" name="txtRazon" id="txtRazon" tabindex="1" value="<?php echo $member->getValueEncoded( "txtRazon" ) ?>" />
            
            <label for="cif"<?php validateField( "cif", $missingFields ) ?>>CIF, NIF o NIE*</label>
            <input type="text" name="cif" id="cif" tabindex="2" value="<?php echo $member->getValueEncoded( "cif" ) ?>" />
    
            <label for="address_postal"<?php validateField( "address_postal", $missingFields ) ?>>Direcci&oacute;n Postal *</label>
            <input type="text" name="address_postal" id="address_postal" tabindex="3" value="<?php echo $member->getValueEncoded( "address_postal" ) ?>" />
                            <span style="float:left; font-size:10px; margin-right:10px;">Por favor, no escriba el tipo de v&iacute;a</span>

            <?php $link=Conectarse();?>
    
            <label for="RE_Prov"<?php validateField( "RE_Prov", $missingFields ) ?>>Provincia *</label>
            <select name='RE_Prov' id="RE_Prov" >
            <option value='0'>Seleccione provincia...</option>
                   
            <?php
                $query= mysql_query ("SELECT * FROM provincias order by provincia asc",$link);
                $array=mysql_fetch_assoc($query);
                $num=mysql_num_rows($query);
                $suma=0;
                do{ ++$suma;
                echo "<option value='".$array['id']."'>".$array['provincia']."</option>";
                }while($array=mysql_fetch_assoc($query));?>
                
            </select><span style="position:absolute; top:540px; left:30px; color:#900" id='Buscando'> </span>
    
            <label for="RE_pobla"<?php validateField( "RE_pobla", $missingFields ) ?>>Poblaci&oacute;n *</label>
            <select name='RE_pobla' id="RE_pobla"  class="pobla" >
            <option value='0'>-seleccione provincia-</option>
            </select>            
           
           	
            
            <label for="zip_postal"<?php validateField( "zip_postal", $missingFields ) ?>>C&oacute;digo Postal *</label>
            <input type="text" name="zip_postal" id="zip_postal" tabindex="4" value="<?php echo $member->getValueEncoded( "zip_postal" ) ?>" />

        </fieldset>         	 	
       
        <fieldset>
            <legend class="visible">Datos del comercio</legend>
            
            <label for="shopname"<?php validateField( "shopname", $missingFields ) ?>>Nombre Comercial *</label>
            <input type="text" name="shopname" id="shopname" tabindex="5" value="<?php echo $member->getValueEncoded( "shopname" ) ?>" />      
     
                            
            <label for="subcatid"<?php validateField( "subcatid", $missingFields ) ?>>Sector *</label>
            <select name="subcatid" id="subcatid" size="1">
            <option value='0'>[-selecciona-]</option>
                   
            <?php
                $query= mysql_query ("SELECT * FROM subcategories order by subcatid asc",$link);
                $array=mysql_fetch_assoc($query);
                $num=mysql_num_rows($query);
                $suma=0;
                do{ ++$suma;
                echo "<option value='".$array['subcatid']."'>".$array['subcatname']."</option>";
                }while($array=mysql_fetch_assoc($query));?>
                
            </select>
    
            <label for="address"<?php validateField( "address", $missingFields ) ?>>Direcci&oacute;n </label>
            <input type="text" name="address" id="address" tabindex="6" value="<?php echo $member->getValueEncoded( "address" ) ?>" />
                <span style="float:left; font-size:10px; margin-right:10px;">Por favor, no escriba el tipo de v&iacute;a</span>
            <label for="zip"<?php validateField( "zip", $missingFields ) ?>>C&oacute;digo Postal </label>
            <input type="text" name="zip" id="zip" tabindex="7" value="<?php echo $member->getValueEncoded( "zip" ) ?>" />
    
            <label for="web"<?php validateField( "web", $missingFields ) ?>>Web</label>
            <input type="text" name="web" id="web" tabindex="8" value="<?php echo $member->getValueEncoded( "web" ) ?>" />

        </fieldset>
        <fieldset>
        
            <legend class="visible">Datos de contacto</legend>
    
            <label for="firstName2"<?php validateField( "firstName2", $missingFields ) ?>>Nombre persona contacto *</label>
            <input type="text" name="firstName2" id="firstName2" tabindex="9" value="<?php echo $member->getValueEncoded( "firstName2" ) ?>" />
    
            
            <label for="emailAddress"<?php validateField( "emailAddress", $missingFields ) ?>>Correo electr&oacute;nico *</label>
            <input type="text" name="emailAddress" id="emailAddress" tabindex="10" value="<?php echo $member->getValueEncoded( "emailAddress" ) ?>" />
            
            <label for="txtPhone"<?php validateField( "txtPhone", $missingFields ) ?>>Tel&eacute;fono *</label>
            <input type="text" name="txtPhone" id="txtPhone" tabindex="11" value="<?php echo $member->getValueEncoded( "txtPhone" ) ?>" />
            
            <label for="txtMobile"<?php validateField( "txtMobile", $missingFields ) ?>>M&oacute;vil *</label>
            <input type="text" name="txtMobile" id="txtMobile" tabindex="12" value="<?php echo $member->getValueEncoded( "txtMobile" ) ?>" />
               
        </fieldset>
        <fieldset>
        
            <legend class="visible">Otros datos</legend>        
                   
            <label for="favoriteGenre"<?php validateField( "favoriteGenre", $missingFields ) ?>>&#191;C&oacute;mo nos conociste? *</label>
            <select name="favoriteGenre" id="favoriteGenre" size="1">
            <?php foreach ( $member->getConocer() as $value => $label ) { ?>
              <option value="<?php echo $value ?>"<?php setSelected( $member, "favoriteGenre", $value ) ?>><?php echo $label ?></option>
            <?php } ?>
            </select>    
    
            <label for="otherInterests"<?php validateField( "otherInterests", $missingFields ) ?>>Describe brevemente tu negocio *</label>
            <textarea name="otherInterests" id="otherInterests" rows="4" cols="50" ><?php echo $member->getValueEncoded( "otherInterests" ) ?></textarea>
        	 	<div class="clear"></div>  
       
        <span style="float:right; font-size:9px; ">M&aacute;x. 255 caracteres</span>
        </fieldset>        
        <fieldset>
        
            <legend class="visible">Aceptaci&oacute;n de t&eacute;rminos</legend>
    
            <label for="termin" <?php validateField( "termin", $missingFields ) ?>>He le&iacute;do y acepto los <a target="_blank" href="terminos.php">t&eacute;rminos de uso</a> *</label>    
            <input type="checkbox" value="1" name="termin" tabindex="13" id="termin" <?php setChecked( $member, "termin", "1" )?>/>
            
        </fieldset>

        <div style="clear: both;">
          <input type="submit" name="submitButton" id="submitButton" value="Enviar" style="padding:4px; font-weight:bold"/>
          <label style="display:none" for="resetButton">Limpiar</label>
          <input type="reset" name="resetButton" id="resetButton" value="Limpiar" style="margin-right: 20px; padding:4px;" />
        </div>

      </div>
    </form>
              		 <div class="clear"></div>
    
<?php
}

function processForm() {
  $requiredFields = array( "txtRazon", "cif", "address_postal", "RE_Prov", "RE_pobla", "zip_postal", "shopname","subcatid", "txtPhone", "txtMobile", "emailAddress","firstName2", "favoriteGenre", "otherInterests","termin" );
  $missingFields = array();
  $errorMessages = array();
		
		if (validatetitulo($_POST["txtRazon"])==0)
	$_POST["txtRazon"]="";
	
		if (validatetitulo($_POST["shopname"])==0)
	$_POST["shopname"]="";
	
		if (validateaddress($_POST["address_postal"])==0)
	$_POST["address_postal"]="";
	
		if (validateaddress($_POST["address"])==0)
	$_POST["address"]=$_POST["address_postal"];

	
		if (validatearea($_POST["otherInterests"])==0){
			
	$non=$_POST["otherInterests"];
	$_POST["otherInterests"]=substr($non,0,255);
	$errorMessages[] = '<p class="error">Hemos recortado a 255 caracteres tu respuesta a &#191;Compras en...?. Comprueba que lo que está en la caja es lo que quieres enviarnos, por favor. </p>';

	}
	
		if (validatetxtNombre($_POST["firstName2"])==0)
	$_POST["firstName2"]="";
	
	$valor=	validateCif($_POST["cif"]);
	if ($valor!=1 && $valor!=2 && $valor!=3)
		
	$_POST["cif"]="";
	
		else 
	$_POST["cif"] = strtoupper($_POST["cif"]);

		if (validateProv($_POST["RE_Prov"])==0)
	$_POST["RE_Prov"]="";
	
		if (isset($_POST["RE_pobla"])){
	if(	validateProv($_POST["RE_pobla"])==0)
	$_POST["RE_pobla"]="";}
	
		if (validateProv($_POST["subcatid"])==0)
	$_POST["subcatid"]="";
	
	   if (validateZip($_POST["zip_postal"])==0)
	$_POST["zip_postal"]="";
	
		if (validateZip2($_POST["zip"])==0){
	$_POST["zip"]=$_POST["zip_postal"];
	$_POST["address"]=$_POST["address_postal"];
	}

	 	if (validateWeb($_POST["web"])==0)
	$_POST["web"]="";

    	if (validateEmail($_POST["emailAddress"])==0)
	$_POST["emailAddress"]="";	

		if (validatePhone($_POST["txtPhone"])==0)
	$_POST["txtPhone"]="";
	
		if (validateMobile($_POST["txtMobile"])==0)
	$_POST["txtMobile"]="";
		 
$username= new_user(); 	//Genero un usuario aleatoriamente en el registro de miembros, que quedará asociado a los datos introducidos por los usuarios
						//Si después de comprobar sus datos todo está correcto, se lo enviaré por email junto a instrucciones de acceso

  	$member = new Member( array( 
		"txtRazon" => isset( $_POST["txtRazon"] ) ? delete_format($_POST["txtRazon"]) : "",
		"cif" => isset( $_POST["cif"] ) ?  delete_format_cif($_POST["cif"])  : "",
		"address_postal" => isset( $_POST["address_postal"] ) ? delete_format_address($_POST["address_postal"]) : "",
		"RE_Prov" => isset( $_POST["RE_Prov"] ) ?  $_POST["RE_Prov"]  : "",
		"RE_pobla" => isset( $_POST["RE_pobla"] ) ? $_POST["RE_pobla"]   : "",
		"zip_postal" => isset( $_POST["zip_postal"] ) ? delete_format($_POST["zip_postal"]):"",
		"shopname" => isset( $_POST["shopname"] ) ? delete_format($_POST["shopname"]) : "",
		"subcatid"=> isset( $_POST["subcatid"] ) ? preg_replace( "/[^ 0-9]/", "", $_POST["subcatid"] ) : "",
		"address" => (isset( $_POST["address"])&&isset( $_POST["zip"]) ) ? delete_format_address($_POST["address"]) : delete_format_address($_POST["address_postal"]),
		"zip" => isset( $_POST["zip"] ) ? delete_format($_POST["zip"]): delete_format($_POST["zip_postal"]),
		"web"=> isset( $_POST["web"] ) ? delete_format($_POST["web"]):"",
		"firstName2" =>isset( $_POST["firstName2"] ) ?  delete_format($_POST["firstName2"])  : "",
		"joinDate" => date( "Y-m-d" ),
		"favoriteGenre" => isset( $_POST["favoriteGenre"] ) ? preg_replace( "/[^ \á\Á\é\É\í\Í\ó\Ó\ú\Ú\ñ\Ñ\ü\Üa-zA-Z]$/i", "", $_POST["favoriteGenre"] ) : "",
		"otherInterests" => isset( $_POST["otherInterests"] ) ? delete_format_text($_POST["otherInterests"]) : "",
		"emailAddress" => isset( $_POST["emailAddress"] )? $_POST["emailAddress"]:"",
		"username"=>"$username",
		"txtPhone" => isset( $_POST["txtPhone"] ) ?  $_POST["txtPhone"]  : "",
		"txtMobile" => isset( $_POST["txtMobile"] ) ?  $_POST["txtMobile"]  : "",
		"termin"=> isset ($_POST["termin"])? $_POST["termin"]:"",
		"alta"=> isset( $_POST["alta"] ) ? preg_replace( "/[^n]/", "", $_POST["alta"] ) : ""
  ) );

  foreach ( $requiredFields as $requiredField ) {
    			if ( !$member->getValue( $requiredField ) ) {
     				$missingFields[] = $requiredField;
    			}
  }
  

  if ( $missingFields ) {
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os o incorrectos en el formulario. Por favor, completa los campos se&ntilde;alados abajo y pulsa Enviar.</p>';
  } 

  if ( Member::getByUsername( $member->getValue( "username" ) ) ) {
    $errorMessages[] = '<p class="error">Ya existe un socio con ese usuario en la base de datos. Por favor, elige otro usuario.</p>';
  }

  if ( Member::getByEmailAddress( $member->getValue( "emailAddress" ) ) ) {
    $errorMessages[] = '<p class="error">Ya existe un socio con ese correo en la base de datos. Por favor, elige otro correo o contacta con la asociaci&oacute;n.</p>';
  }
  
  if ( Member::getByShopnameEmpresaid( $member->getValue( "shopname" ), $member->getValue("txtRazon") ) ) {
    $errorMessages[] = '<p class="error">Ya hay una tienda con ese nombre registrada con esa empresa. Si tienes varias tiendas con el mismo nombre, contacta con la asociaci&oacute;n. Si olvidaste tu usuario, pincha <a href="members/forgot_form_user.php">aqu&iacute;</a></p>';
  }
 
  if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $member );
  } else {
	
	$member->insert();
	
	$RE_pobla=$member->getValue("RE_pobla");
	$RE_Prov=$member->getValue("RE_Prov");
	$joinDate=$member->getValueEncoded( "joinDate");
	$joinDate=(string)$joinDate;
	$registro=explode('-', $joinDate);
	$joinDate="$registro[2]-$registro[1]-$registro[0]";	
	?>
    
    <div style="margin-top:20px; margin-bottom:20px; margin-left:100px">
    	<?php  if (!isset ($_SESSION['admin_user'])){?>

    <p>Gracias por solicitar tu registro en nuestra asociaci&oacute;n.</p> 	
    <p>A continuaci&oacute;n te mostramos la informaci&oacute;n que hemos recibido. Si hay alg&uacute;n error, ponte en contacto con nosotros.</p>
		<? }?>
    	<h5 style="font-size:1.1em">Datos de la empresa</h5>

      	<dl style="width: 30em;">        
          <dt>Raz&oacute;n social</dt>
          <dd><?php echo $nombre=$member->getValueEncoded( "txtRazon" ) ?></dd>
          <dt>Direcci&oacute;n postal</dt>
          <dd><?php echo $address=$member->getValueEncoded( "address_postal" ) ?></dd>
          <dt>C&oacute;digo postal</dt>
          <dd><?php echo $zip=$member->getValueEncoded( "zip_postal" ) ?></dd>
          <dt>Poblaci&oacute;n</dt>
          <dd><?php echo $municipio=$member->getmunicipioByRE_pobla($RE_pobla); ?></dd>
          <dt>Provincia</dt>
          <dd><?php echo $provincia=$member->getprovinciaByRE_Prov(	$RE_Prov);?></dd>
    	</dl>
	<h5 style="font-size:1.1em">Datos del comercio</h5>
    	<dl style="width: 30em;">
          <dt>Nombre comercial</dt>
          <dd><?php echo $shopname=$member->getValueEncoded( "shopname" ) ?></dd>
          <dt>Direcci&oacute;n</dt>
          <dd><?php echo $address=$member->getValueEncoded( "address" ) ?></dd>
          <dt>C&oacute;digo postal</dt>
          <dd><?php echo $zip=$member->getValueEncoded( "zip" ) ?></dd>
          <dt>Fecha de solicitud</dt>
          <dd><?php echo $joinDate ?></dd>
      	</dl>
   <h5 style="font-size:1.1em">Datos de contacto</h5>
        <dl style="width: 30em;">
          <dt>Persona de contacto</dt>
          <dd><?php echo $nombre=$member->getValueEncoded( "firstName2" )?></dd>
          <dt>Tel&eacute;fono</dt>
          <dd><?php echo $txtPhone=$member->getValueEncoded( "txtPhone" )?></dd>
          <dt>M&oacute;vil</dt>
          <dd><?php echo $txtMobile=$member->getValueEncoded( "txtMobile" )?></dd>
          <dt>Correo electr&oacute;nico</dt>
          <dd><?php echo $email=$member->getValueEncoded( "emailAddress" ) ?></dd>
        </dl>
   <h5 style="font-size:1.1em">Otros datos</h5>
        <dl style="width: 30em;">
          <dt>Nos conociste por:</dt>
          <dd><?php echo $favoriteGenre=$member->getFavoriteConocer()?></dd>
          <dt style="text-align:left">Descripci&oacute;n de tu negocio</dt>
          <dd><?php echo $otherInterests=$member->getValueEncoded( "otherInterests" )?></dd>
    	</dl>
        <?php  if (!isset ($_SESSION['admin_user'])){?>
    <p>Hemos enviado un email de confirmaci&oacute;n de solicitud a tu correo.</p>
    <p>En breve nos pondremos en contacto contigo</p>
    <p>Un saludo del equipo de AECA - Asociaci&oacute;n de Empresarios y Comerciantes de Atocha<p>
   
    		<? } ?>
	
	 </div>
      <?
	$username=$member->getValue("username");

	$adireccion  = 'silvia@salcedomacias.netii.net' . ', ';  //me envío una copia a mi correo del servidor
	$adireccion .= "$email"; //se le manda al cliente también
	$asunto="Solicitud socio AECA";
	$contenido="Hemos recibido solicitud de registro de: \n"."Nombre contacto ".$nombre."\n"."Nombre establecimiento ".$shopname."\n"."En breve nos pondremos en contacto contigo.\n Un saludo del equipo de AECA";
	$dedireccion="silvia@salcedomacias.netii.net"; // la del servidor web
 
 	mail($adireccion, $asunto, $contenido, $dedireccion);
  
  //envío apunte a archivo de texto, con usuario generado, email, nombre de la tienda y nombre de contacto
   
	
  	$hoy="\r\n".date('j')."/".date('m')."/".date('Y')." - ".date('H:i');
	$salida=$hoy."\r\nCorreo: ".$email."\r\nNombre: ".$nombre."\r\nComentario: ".$otherInterests."\r\n";
	$salida=utf8_decode($salida); 
	$fp=fopen("members/members.txt", "a");
	flock($fp,2);
	if(!$fp){echo "Se ha producido un error";}
	fwrite($fp,$salida);
	flock($fp,3);
	fclose($fp);  
 
  }
}




