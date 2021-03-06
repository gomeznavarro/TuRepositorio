<?php
function displayForm( $errorMessages, $missingFields, $member ) {
  $logEntries = LogEntry::getLogEntries( $member->getValue( "shopid" ) );
  //displayPageHeader( "View member: " . $member->getValueEncoded( "firstName" ) . " " . $member->getValueEncoded( "lastName1" ) );
echo  "<h2>Vista de solicitante: " . $member->getValueEncoded( "username" ) . "  /  " . $member->getValueEncoded( "shopname" )."</h2>";
  if ( $errorMessages ) {
    foreach ( $errorMessages as $errorMessage ) {
      echo $errorMessage;
    }
  }

  $start = isset( $_REQUEST["start"] ) ? (int)$_REQUEST["start"] : 0;
  $order = isset( $_REQUEST["order"] ) ? preg_replace( "/[^ a-zA-Z]/", "", $_REQUEST["order"] ) : "username";
  
?>


    <form action="view_solicit_member.php" method="post" style="margin-bottom: 50px;" id="registro">
      <div style="width: 30em;">
              <input type="hidden" name="memberId" id="memberId" value="<?php echo $member->getValueEncoded( "shopid" ) ?>" />


        <input type="hidden" name="shopid" id="shopid" value="<?php echo $member->getValueEncoded( "shopid" ) ?>" />
                     <input type="hidden" name="start" id="start" value="<?php echo $start ?>" />
        <input type="hidden" name="order" id="order" value="<?php echo $order ?>" />
        <input   type="hidden" name="empresaid" id="empresaid"  value="<?php echo $member->getValueEncoded( "empresaid" ) ?>" />

              
          
             <fieldset>
        <legend style="font-size:20px;">Datos del comercio</legend>
        

                <label for="txtRazon"<?php validateField( "txtRazon", $missingFields ) ?>>Empresa *</label>

    <select name="txtRazon" id="txtRazon" style="width:308px">
      <?
	if($edit=get_shop_todo($member->getValueEncoded( "shopid" )) ){
			foreach ($edit as $shop){  
	  
	  $edit = is_array($shop);
          // lista de las categorías posibles enviadas por la base de datos
         $empresas_array=get_empresas();
		  
          foreach ($empresas_array as $thisempresa)
          {
               echo "<option value=\"";
               echo $thisempresa["txtRazon"];
               echo "\"";
               // si existen libros, ponerlo en la categoría actual
               if ($edit && $thisempresa["empresaid"] == $shop["empresaid"])
                   echo " selected";
               echo ">";
               echo $thisempresa["txtRazon"];
			   echo "</option>";
               echo "\n";
          }}}
          ?>
          </select>
      
           <label for="shopid"<?php validateField( "shopid", $missingFields ) ?>>C&oacute;digo del comercio *</label>
        <input disabled="disabled" type="text" name="shopid" id="shopid"  value="<?php echo $member->getValueEncoded( "shopid" ) ?>" />
     
        
        <label for="shopname"<?php validateField( "shopname", $missingFields ) ?>>Nombre comercial *</label>
        <input type="text" name="shopname" id="shopname"  value="<?php echo $member->getValueEncoded( "shopname" ) ?>" />

                <label for="subcatid">Sector *</label>
        <select name="subcatid" id="subcatid" size="1" style="width:308px">
        <?php foreach ( $member->getSubcat() as $value=>$label ) { ?>
          <option value="<?php echo $value ?>"<?php setSelected( $member, "subcatid", $value )  ?>><?php echo $label ?></option>
        <?php } ?>
        </select>      

        
        <label for="address"<?php validateField( "address", $missingFields ) ?>>Direcci&oacute;n *</label>
        <input type="text" name="address" id="address"  value="<?php echo $member->getValueEncoded( "address" ) ?>" />
        
   

        <label for="zip"<?php validateField( "zip", $missingFields ) ?>>C&oacute;digo Postal </label>
        <input type="text" name="zip" id="zip" value="<?php echo $member->getValueEncoded( "zip" ) ?>" />

        <label for="web"<?php validateField( "web", $missingFields ) ?>>Web *</label>
        <input type="text" name="web" id="web" value="<?php echo $member->getValueEncoded( "web" ) ?>" />

        </fieldset>
        <fieldset>
        <legend style="font-size:20px;">Datos de contacto</legend>

                <label for="firstName2"<?php validateField( "firstName2", $missingFields ) ?>>Nombre persona contacto *</label>
        <input type="text" name="firstName2" id="firstName2" value="<?php echo $member->getValueEncoded( "firstName2" ) ?>" />

        
        <label for="emailAddress"<?php validateField( "emailAddress", $missingFields ) ?>>Correo electr&oacute;nico *</label>
        <input type="text" name="emailAddress" id="emailAddress" value="<?php echo $member->getValueEncoded( "emailAddress" ) ?>" />
        
        <label for="txtPhone"<?php validateField( "txtPhone", $missingFields ) ?>>Tel&eacute;fono *</label>
        <input type="text" name="txtPhone" id="txtPhone" value="<?php echo $member->getValueEncoded( "txtPhone" ) ?>" />
        
        <label for="txtMobile"<?php validateField( "txtMobile", $missingFields ) ?>>M&oacute;vil *</label>
        <input type="text" name="txtMobile" id="txtMobile" value="<?php echo $member->getValueEncoded( "txtMobile" ) ?>" />


        </fieldset>
        <fieldset>
        <legend style="font-size:20px;">Otros datos</legend>
        
         
      
        <label for="favoriteGenre">&#191;C&oacute;mo nos conocieron?</label>
        <select name="favoriteGenre" id="favoriteGenre" size="1" style="width:308px">
        <?php foreach ( $member->getConocer() as $value => $label ) { ?>
          <option value="<?php echo $value ?>"<?php setSelected( $member, "favoriteGenre", $value ) ?>><?php echo $label ?></option>
        <?php } ?>
        </select> 
           




        <label for="otherInterests">Descripci&oacute;n negocio</label>
        <textarea name="otherInterests" id="otherInterests" rows="4" cols="50"><?php echo $member->getValueEncoded( "otherInterests" ) ?></textarea>
        
        </fieldset>
        <fieldset>
        <legend style="font-size:20px;">Datos de autentificaci&oacute;n</legend>
        
        <label for="username"<?php validateField( "username", $missingFields ) ?>>Username *</label>
        <input type="text" name="username" id="username" value="<?php echo $member->getValueEncoded( "username" ) ?>" />
        
        <label for="password">New password</label>
        <input type="password" name="password" id="password" value="" />
        
        <label<?php validateField( "alta", $missingFields ) ?>>Alta *</label>
        
        <label for="alta_si">Dado de alta</label>
        <input type="radio" name="alta" id="alta_si" value="s"<?php setChecked( $member, "alta", "s" )?>/>
        <label for="alta_no">No dado de alta</label>
        <input type="radio" name="alta" id="alta_no" value="n"<?php setChecked( $member, "alta", "n" )?> />

   

        <label for="joinDate"<?php validateField( "joinDate", $missingFields ) ?>>Fecha solicitud</label>
        <input type="text" name="joinDate" id="joinDate" value="<?php echo $member->getValueEncoded( "joinDate" ) ?>" />
</fieldset>      

        <div style="clear: both;">
          <input  class="envio" type="submit" name="action" id="saveButton" value="Salvar Cambios" />
          <input class="envio" type="submit" onclick="return confirm('&iquest;Est&aacute;s seguro?');" name="action" id="deleteButton" value="Borrar Solicitud" style="margin-right: 20px;" />
        </div>
      </div>
    </form>
        

     

    <div style="width: 30em; margin-top: 20px; text-align: center;">
      <a class="avance" href="view_solicit_members.php?start=<?php echo $start ?>&amp;order=<?php echo $order ?>">Volver al listado de solicitudes</a>
    </div>

<?php
 
display_enlace("../admin/index.php", "Inicio administraci&oacute;n");
}

function saveMember() {
  $requiredFields = array("empresaid", "txtRazon","shopid",  "subcatid","shopname",  "address", "zip", "username",  "alta", "emailAddress", "joinDate", "firstName2", "txtPhone", "txtMobile", "favoriteGenre","otherInterests",  );
  $missingFields = array();
  $errorMessages = array();
  
  		if (validatetitulo($_POST["txtRazon"])==0)
	$_POST["txtRazon"]="";
	
		if (validatetitulo($_POST["shopname"])==0)
	$_POST["shopname"]="";
	
	
		if (validateaddress($_POST["address"])==0)
	$_POST["address"]="";	

	
		if (validatearea($_POST["otherInterests"])==0)
	{
	$non=$_POST["otherInterests"];
	$_POST["otherInterests"]=substr($non,0,255);
	$errorMessages[] = '<p class="error">Hemos recortado a 255 caracteres tu respuesta a &#191;Compras en...?. Comprueba que lo que está en la caja es lo que quieres enviarnos, por favor. </p>';

	}
	
		if (validatetxtNombre($_POST["firstName2"])==0)
	$_POST["firstName2"]="";
	
	
		if (validateProv($_POST["subcatid"])==0)
	$_POST["subcatid"]="";
	
	   if (validateZip($_POST["zip"])==0)
	$_POST["zip"]="";

	 	if (validateWeb($_POST["web"])==0)
	$_POST["web"]="";

    	if (validateEmail($_POST["emailAddress"])==0)
	$_POST["emailAddress"]="";	

		if (validatePhone($_POST["txtPhone"])==0)
	$_POST["txtPhone"]="";
	
		if (validateMobile($_POST["txtMobile"])==0)
	$_POST["txtMobile"]="";

  $member = new Member( array(
  
  		"username" => isset( $_POST["username"] ) ?  delete_format($_POST["username"])  : "",
      	"password" => isset( $_POST["password"] ) ? delete_format($_POST["password"])  : "",
		"emailAddress" => isset( $_POST["emailAddress"] )? $_POST["emailAddress"]:"",
		"alta"=> isset( $_POST["alta"] ) ? preg_replace( "/[^sn]/", "", $_POST["alta"] ) : "",
		"txtRazon" => isset( $_POST["txtRazon"] ) ? delete_format($_POST["txtRazon"]) : "",
		"empresaid"=> isset( $_POST["empresaid"] ) ? preg_replace( "/[^ 0-9]/", "", $_POST["empresaid"] ) : "",

   		"shopid"=> isset( $_POST["shopid"] ) ? preg_replace( "/[^ 0-9]/", "", $_POST["shopid"] ) : "",
		"subcatid"=> isset( $_POST["subcatid"] ) ? preg_replace( "/[^ 0-9]/", "", $_POST["subcatid"] ) : "",
		"shopname" => isset( $_POST["shopname"] ) ? delete_format($_POST["shopname"]) : "",
		"address" => isset( $_POST["address"] ) ? delete_format_address($_POST["address"]) : "",
		"zip" => isset( $_POST["zip"] ) ? delete_format($_POST["zip"]):"",
		"web"=> isset( $_POST["web"] ) ? delete_format($_POST["web"]):"",
		"firstName2" =>isset( $_POST["firstName2"] ) ?  delete_format($_POST["firstName2"])  : "",
		"joinDate" => date( "Y-m-d" ),
		"favoriteGenre" => isset( $_POST["favoriteGenre"] ) ? preg_replace( "/[^ \á\Á\é\É\í\Í\ó\Ó\ú\Ú\ñ\Ñ\ü\Üa-zA-Z]$/i", "", $_POST["favoriteGenre"] ) : "",
		"otherInterests" => isset( $_POST["otherInterests"] ) ? delete_format_text($_POST["otherInterests"]) : "",
		"txtPhone" => isset( $_POST["txtPhone"] ) ?  $_POST["txtPhone"]  : "",
		"txtMobile" => isset( $_POST["txtMobile"] ) ?  $_POST["txtMobile"]  : "",
		"termin"=> isset ($_POST["termin"])? $_POST["termin"]:""
	
  ) );

  foreach ( $requiredFields as $requiredField ) {
    if ( !$member->getValue( $requiredField ) ) {
      $missingFields[] = $requiredField;
    }
  }

  if ( $missingFields ) {
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os en el formulario.</p>';
  }

  if ( $existingMember = Member::getByUsername2( $member->getValue( "username" ) ) and $existingMember->getValue( "shopid" ) != $member->getValue( "shopid" ) ) {
    $errorMessages[] = '<p class="error">Ya existe un socio con ese usuario en la base de datos.</p>';
  }

  if ( $existingMember = Member::getByEmailAddress( $member->getValue( "emailAddress" ) ) and $existingMember->getValue( "shopid" ) != $member->getValue( "shopid" ) ) {
    $errorMessages[] = '<p class="error">Ya existe un socio con ese correo en la base de datos.</p>';
  }
  
  if ( $existingMember = Member::getByShopnameEmpresaid( $member->getValue( "shopname" ), $member->getValue("txtRazon") ) and $existingMember->getValue( "shopid" ) != $member->getValue( "shopid" ) ) {
	  
  
    $errorMessages[] = '<p class="error">Ya hay una tienda con ese nombre registrada con esa empresa.</p>';
  }
  
  if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $member );
  } else {
    $member->update();
    displaySuccess();
  }
}

function deleteMember() {
  $member = new Member( array(
    "id" => isset( $_POST["memberId"] ) ? (int) $_POST["memberId"] : "",
	    "shopid" => isset( $_POST["shopid"] ) ? (int) $_POST["shopid"] : "",
		    "empresaid" => isset( $_POST["empresaid"] ) ? (int) $_POST["empresaid"] : "",
   		

  ) );
  LogEntry::deleteAllForMember( $member->getValue( "id" ) );
  $member->delete();
  displaySuccess();
}
function displaySuccess() {
  $start = isset( $_REQUEST["start"] ) ? (int)$_REQUEST["start"] : 0;
  $order = isset( $_REQUEST["order"] ) ? preg_replace( "/[^ a-zA-Z]/", "", $_REQUEST["order"] ) : "username";
  //displayPageHeader( "Changes saved" );
?>
    <p>Sus cambios han sido guardados correctamente</p>
   <p><a class="avance" href="view_solicit_members.php?start=<?php echo $start ?>&amp;order=<?php echo $order ?>">Volver a la lista de solicitudes</a></p>
   
<?php
}
?>