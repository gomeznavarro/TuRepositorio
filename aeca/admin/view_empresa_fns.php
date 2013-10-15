<?php
function displayForm( $errorMessages, $missingFields, $member ) {
	
  $logEntries = LogEntry::getLogEntries( $member->getValue( "empresaid" ) );
	echo  "<h3 style=\"font-size:22px\">Ver Empresa: " . $member->getValueEncoded( "empresaid" ) . "  /  " . $member->getValueEncoded( "txtRazon" )."</h3>";
	echo  "<p id=\"nota\" style=\"color:#900\">Nota(*): Si realizas cambios en el campo provincia, pulsa Salvar Cambios para recuperar la lista apropiada de municipios</p>";
 	if ( $errorMessages ) {
    	foreach ( $errorMessages as $errorMessage ) {
      	echo $errorMessage;
		}
	}

  $start = isset( $_REQUEST["start"] ) ? (int)$_REQUEST["start"] : 0;
  $order = isset( $_REQUEST["order"] ) ? preg_replace( "/[^ a-zA-Z]/", "", $_REQUEST["order"] ) : "empresaid";
  
?>
    	<form action="view_empresa.php" method="post" style="margin-bottom: 50px;" id="registro">
      	<div style="width: 30em;">      

        <input type="hidden" name="memberId" id="memberId" value="<?php echo $member->getValueEncoded( "empresaid" ) ?>" />
                <input type="hidden" name="empresaid" id="empresaid" value="<?php echo $member->getValueEncoded( "empresaid" ) ?>" />

        <input type="hidden" name="start" id="start" value="<?php echo $start ?>" />
        <input type="hidden" name="order" id="order" value="<?php echo $order ?>" />

        <fieldset>

        <legend style="font-size:20px;">Datos de la empresa</legend>
   		<label for="empresaid"<?php validateField( "empresaid", $missingFields ) ?>>empresaid *</label>
        <input  disabled="disabled" type="text" name="empresaid" id="empresaid"  value="<?php echo $member->getValueEncoded( "empresaid" ) ?>" />

       	<label for="txtRazon"<?php validateField( "txtRazon", $missingFields ) ?>>Empresa *</label>
        <input type="text" name="txtRazon" id="txtRazon"  value="<?php echo $member->getValueEncoded( "txtRazon" ) ?>" />
     
        <label for="cif"<?php validateField( "cif", $missingFields ) ?>>CIF *</label>
        <input type="text" name="cif" id="cif"  value="<?php echo $member->getValueEncoded( "cif" ) ?>" />        
   
        <label for="address_postal"<?php validateField( "address_postal", $missingFields ) ?>>Direcci&oacute;n *</label>
        <input type="text" name="address_postal" id="address_postal"  value="<?php echo $member->getValueEncoded( "address_postal" ) ?>" />
        
        <label for="zip_postal"<?php validateField( "zip_postal", $missingFields ) ?>>C&oacute;digo postal *</label>
        <input type="text" name="zip_postal" id="zip_postal"  value="<?php echo $member->getValueEncoded( "zip_postal" ) ?>" />    
        
        
        <label for="RE_Prov"<?php validateField( "RE_Prov", $missingFields ) ?>>Provincia *</label>

      <select name="RE_Prov" id="RE_Prov" style="width:308px" >
     <?
	 if($edit=get_provincias_todo($member->getValueEncoded( "RE_Prov" )) ){
			foreach ($edit as $provincia){  
	  
	  $edit = is_array($provincia);
          // lista de las categorías posibles enviadas por la base de datos
         $provincias_array=get_provincias();
		  
          foreach ($provincias_array as $thisprovincia)
          {
               echo "<option value=\"";
               echo $thisprovincia["id"];
               echo "\"";
               // si existen libros, ponerlo en la categoría actual
               if ($edit && $thisprovincia["id"] == $provincia["id"])
                   echo " selected";
               echo ">";
               echo $thisprovincia["provincia"];
			   echo "</option>";
               echo "\n";
          }}}
          ?>
          </select>
                  <label for="RE_pobla"<?php validateField( "RE_pobla", $missingFields ) ?>>Municipio *</label>
        <? 
		
		

	
       
 		
		?>

           <select name="RE_pobla" id="RE_pobla" style="width:308px">
      <?
	  
	if($edit=get_municipios_todo($member->getValueEncoded("RE_pobla")) ){
			foreach ($edit as $municipio){  
	  
	  $edit = is_array($municipio);
          // lista de las categorías posibles enviadas por la base de datos
         $municipios_array=get_municipios($member->getValueEncoded( "RE_Prov" ));
		  
          foreach ($municipios_array as $thismunicipio)
          {
               echo "<option value=\"";
               echo $thismunicipio["id"];
               echo "\"";
               // si existen libros, ponerlo en la categoría actual
               if ($edit && $thismunicipio[0] == $municipio["id"])
                   echo " selected";
               echo ">";
               echo $thismunicipio["municipio"];
			   echo "</option>";
               echo "\n";
          }}}
          ?>
          </select>
        </fieldset>  
     

        <div style="clear: both;">
          <input class="envio" type="submit" name="action" id="saveButton" value="Salvar Cambios" />
          <input class="envio" onclick="return confirm('&iquest;Est&aacute;s seguro?');" type="submit" name="action" id="deleteButton" value="Borrar Empresa" style="margin-right: 20px;" />
        </div>
      </div>
    </form>
        


  

    <div style="width: 30em; margin-top: 20px; text-align: center;">
      <a class="avance" href="view_empresas.php?start=<?php echo $start ?>&amp;order=<?php echo $order ?>">Volver al listado de empresas</a>
    </div>

<?php
 
}

function saveEmpresa() {
  $requiredFields = array("empresaid", "txtRazon",  "cif", "address_postal", "zip_postal", "RE_Prov", "RE_pobla"  );
  $missingFields = array();
  $errorMessages = array();

if (validatetitulo($_POST["txtRazon"])==0)
	$_POST["txtRazon"]="";
	
	
		if (validateaddress($_POST["address_postal"])==0)
	$_POST["address_postal"]="";
	

	
	
	
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
	

	
	   if (validateZip($_POST["zip_postal"])==0)
	$_POST["zip_postal"]="";
	
		
	
		

	 	
	

  $member = new Member( array(

  		"empresaid" => isset( $_POST["empresaid"] ) ? preg_replace( "/[^ 0-9]/", "", $_POST["empresaid"] ) : "",
		"txtRazon" => isset( $_POST["txtRazon"] ) ? delete_format($_POST["txtRazon"]) : "",
		"cif" => isset( $_POST["cif"] ) ?  delete_format_cif($_POST["cif"])  : "",
		"address_postal" => isset( $_POST["address_postal"] ) ? delete_format_address($_POST["address_postal"]) : "",
		"RE_Prov" => isset( $_POST["RE_Prov"] ) ?  $_POST["RE_Prov"]  : "",
		"RE_pobla" => isset( $_POST["RE_pobla"] ) ? $_POST["RE_pobla"]   : "",
		"zip_postal" => isset( $_POST["zip_postal"] ) ? delete_format($_POST["zip_postal"]):"",
  ) );

  foreach ( $requiredFields as $requiredField ) {
    if ( !$member->getValue( $requiredField ) ) {
      $missingFields[] = $requiredField;
    }
  }

  if ( $missingFields ) {
    $errorMessages[] = '<p class="error">Hay campos vac&iacute;os en el formulario.</p>';
  }
  $RE_pobla=$member->getValueEncoded("RE_pobla");
		$RE_Prov=$member->getValueEncoded("RE_Prov");
  if ( !Member::getByMunicipioProvincia( $RE_pobla, $RE_Prov ) ) {
    $errorMessages[] = '<p class="error">Si ha realizado cambios en la provincia, no habr&aacute; podido elegir la poblaci&oacute;n correctamente. Por favor, vuelva a introducir la poblaci&oacute;n eligiendo entre la nueva lista.</p>';
	
?><style type="text/css">#nota{display:none}</style><?
  }

  if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $member );
  } else {
    $member->update_empresa();
    displaySuccess();
  }
}

function deleteEmpresa() {
  $member = new Member( array(
    "empresaid" => isset( $_POST["empresaid"] ) ? (int) $_POST["empresaid"] : "",
  ) );
  $member->delete_empresa();
  displaySuccess();
}

function displaySuccess() {
  $start = isset( $_REQUEST["start"] ) ? (int)$_REQUEST["start"] : 0;
  $order = isset( $_REQUEST["order"] ) ? preg_replace( "/[^ a-zA-Z]/", "", $_REQUEST["order"] ) : "username";
  //displayPageHeader( "Changes saved" );
?>
    <p>Sus cambios han sido guardados correctamente</p>
    <p><a href="view_empresas.php?start=<?php echo $start ?>&amp;order=<?php echo $order ?>">Volver a la lista de empresas</a></p>
<?php
		
}
?>