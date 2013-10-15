<?
require_once( "../common.inc.php" );
// Este archivo contiene las funciones usadas por la interfaz de admin
// del carrito de compra de los comercios.

function display_category_form($category = ""){
  // si se pasa una categoría existente, proceder en "modo edición"
  // y avisar al administrador de los posibles cambios en el diseño
  $edit = is_array($category);
  $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
  
  	if(!preg_match ('/aeca\/admin\/edit_category_form.php/', $url)){
	?>
        <p style="color:#900; font-weight:bold">Advertencia:</p>
        <p>Si a&ntilde;ades una nueva categor&iacute;a, se situar&aacute; en el men&uacute; principal del sitio, haciendo que aparezca probablemente otra l&iacute;nea de men&uacute;. Consulta con el dise&ntilde;ador de la p&aacute;gina antes de insertarla, por favor.</p>
	<?php 
	}?>
  <form method="post" action="<?=$edit?"edit_category.php":"insert_category.php";?>">
  <div style="width:300px">
 		<label for "catname">Nombre Categor&iacute;a:</label>
 		<input type="text" id="catname" name="catname" size="40" maxlength="40" value="<?=$edit?$category["catname"]:""; ?>" />
		<? if (!$edit) echo ""; ?> 
        <? if ($edit)
             echo "<input type=\"hidden\" id=\"catid\" name=\"catid\" value=\"".$category["catid"]."\" \/>";
        ?>
     	<input type="submit" value="<?=$edit?"Actualizar":"A&ntilde;adir"; ?> Categor&iacute;a">
  </div>
  </form>
    
     <? if ($edit)
       // permitir borrar categorías existentes
       {
          echo "<form name=\"borrado\" method=\"post\" action=\"delete_category.php\">";
          echo "<input type=\"hidden\" name=\"catid\" value=\"".$category['catid']."\">";
          echo "<input type=\"button\" onclick=\"pregunta()\" value=\"Borrar Categor&iacute;a\">";
          echo "</form>";
       }
}

function display_subcategory_form($subcategory = ""){
  // si se pasa una subcategoría existente, proceder en "modo edición"
  $edit = is_array($subcategory);  
?>
  <form method="post" action="<?=$edit?"edit_subcategory.php":"insert_subcategory.php";?>" />
   <div style="width:300px">

   		<label for "subcatname">Nombre Subcategor&iacute;a:</label>   
   		<input type="text" id="subcatname" name="subcatname" size="40" maxlength="40" value="<?=$edit?$subcategory["subcatname"]:""; ?>" />
     	
        <label for "catid">Categor&iacute;a:</label>     
     	<select id="catid" name="catid">
      	<?
          // lista de las categorías posibles enviadas por la base de datos
          $cat_array=get_categories();		  
          foreach ($cat_array as $thiscat){
               echo "<option value=\"";
               echo $thiscat["catid"];
               echo "\"";
               // si existen libros, ponerlo en la categoría actual
               if ($edit && $thiscat["catid"] == $subcategory["catid"])
                   echo " selected";
               echo ">";
               echo $thiscat["catname"];
               echo "\n";
          }
           if (!$edit) echo ""; 
		   if ($edit)
         	echo "<input type=\"hidden\" name=\"subcatid\" value=\"".$subcategory["subcatid"]."\">";
      ?>
      </select>
      <input  type="submit" value="<?=$edit?'Actualizar':'A&ntilde;adir'; ?> Subcategor&iacute;a" />
      </div>
      </form>
    
     <? if ($edit){
       // permitir borrar subcategorías existentes       
          echo "<form name=\"borrado\" method=\"post\" action=\"delete_subcategory.php\">";
		           	echo "<input type=\"hidden\" name=\"subcatid\" value=\"".$subcategory["subcatid"]."\">";

          echo "<input type=\"button\" onclick=\"pregunta()\" value=\"Borrar Subcategoria\">";
          echo "</form>";
       }
}
//no utilizo esta función, va a edición tienda(view_member.php)
/*function display_shop_form($shop = ""){
  // si se pasa una categoría existente, proceder en "modo edición"
  	
		$edit = is_array($shop); 
		?>
      <form action="<?=$edit?'edit_shop.php':'insert_shop.php';?>" method="post" >

            <label for="shopname">Nombre Tienda: </label> 
  			<input type="text" id="shopname" name="shopname" size="40" maxlength="40" value='<?=$edit?$shop["shopname"]:""; ?>'/>
            
            <label for="address"> Direcci&oacute;n Tienda:</label> 
			<input type="text" id="address" name="address" size="40" maxlength="40" value='<?=$edit?$shop["address"]:""; ?>'/>
 
 			<label for="zip"> C&oacute;digo postal:</label> 
  			<input type="text" id="zip" name="zip" size="40" maxlength="40" value='<?=$edit?$shop["zip"]:""; ?>'/>
            
             			<label for="web"> Web:</label> 
  			<input type="text" id="web" name="web" size="40" maxlength="40" value='<?=$edit?$shop["web"]:""; ?>'/>

   
 			<label for="subcatid">  Subcategor&iacute;a:</label> 
      		<select id="subcatid" name="subcatid">
      		<?php
			  // lista de las categorías posibles enviadas por la base de datos
			 $subcat_array=get_all_subcategories();
			  
			  foreach ($subcat_array as $thiscat)
			  {
				   echo "<option value=\"";
				   echo $thiscat["subcatid"];
				   echo "\"";
				   // si existen libros, ponerlo en la categoría actual
				   if ($edit && $thiscat["subcatid"] == $shop["subcatid"])
					   echo " selected";
				   echo ">";
				   echo $thiscat["subcatname"];
				   echo "\n";
			  }
			  ?>
          	</select>
  			
            <label  for ="empresaid">   Empresa:</label> 
     		<select id="empresaid" name="empresaid">
      		<?
			  // lista de las categorías posibles enviadas por la base de datos
			 $empresas_array=get_empresas();
			  
			  foreach ($empresas_array as $thisempresa)
			  {
				   echo "<option value=\"";
				   echo $shop["empresaid"];
				   echo "\"";
				   // si existen libros, ponerlo en la categoría actual
				   if ($edit && $thisempresa["empresaid"] == $shop["empresaid"])
					   echo " selected";
				   echo ">";
				   echo $thisempresa["txtRazon"];
				   echo "\n";
			  }
			  ?>
          	</select>
     		<? 	if (!$edit) echo ""; 
			 	if ($edit){
         			echo "<input type=\"hidden\" name=\"shopid\" value=\"".$shop["shopid"]."\">";
				}
      		?>
                    			

      		<input type="submit" value='<?=$edit?"Actualizar":"Añadir"; ?> Tienda'>
     </form>
     
     		<? if ($edit) {
       		// permitir borrar tiendas existentes
      
          echo "<form name=\"borrado\" method=post action=\"delete_shop.php\">";
          echo "<input type=hidden name=shopid value=\"".$shop['shopid']."\">";
          echo "<input type=\"button\" onclick=\"pregunta()\" value=\"Borrar Tienda\">";
          echo "</form></td>";
       		}
     		?>
    
<?
}*/
function display_book_form($book = ""){

  // si es pasado un artículo existente, proceder en "modo edición"
  $edit = is_array($book);
 
?>
  <form method="post" action="<?=$edit?"edit_book.php":"insert_book.php";?>" id="edicion" name="edicion">
          <!--   <label  for ="isbn">  C&oacute;digo:</label> 

  <input type="text" id="isbn" name="isbn"
         value="<?//=$edit?$book["isbn"]:""; ?>">-->
 <label  for ="title">Nombre:</label> 
  <input type=text id="title" name="title"
         value="<?=$edit?$book["title"]:""; ?>">
<label  for ="author"> Marca:</label> 
 <input type="text" id="author" name="author"
         value="<?=$edit?$book["author"]:""; ?>">
 <label  for ="shopid">Tienda:</label>
   <select name="shopid" name="shopid">
      <?
          // lista de las categorías posibles enviadas por la base de datos
          $shop_array=get_all_shops();
		  
          foreach ($shop_array as $thiscat)
          {
               echo "<option value=\"";
               echo $thiscat["shopid"];
               echo "\"";
               // si existen libros, ponerlo en la categoría actual
               if ($edit && $thiscat["shopid"] == $book["shopid"])
                   echo " selected";
               echo ">";
               echo $thiscat["shopname"];
			    echo "</option>";
               echo "\n";
          }
          ?>
          </select>
                <?     if (!$edit) echo ""; 
		   if ($edit)
         	echo "<input type=\"hidden\" name=\"isbn\" value=\"".$book["isbn"]."\">";?>

    <label  for ="price">Precio:</label>
 
  <input type=text id="price" name="price"
               value="<?=$edit?$book["price"]:""; ?>">
    <label  for ="description">Descripci&oacute;n:</label>
   <textarea id="description" name="description"><?=$edit?$book["caract"]:"";?></textarea>
    <? if (!$edit) echo ""; ?> 
         <?
            if ($edit)
             // necesitamos el viejo isbn para encontrar libros en la base de datos
             // si el isbn está siendo actualizado
             echo "<input type=hidden name=oldisbn
                    value=\"".$book["isbn"]."\">";
         ?>
        <input type=submit
               value="<?=$edit?"Actualizar":"A&ntilde;adir"; ?> art&iacute;culo">
        </form>
        <?
           if ($edit)
           {
             echo "<form name=\"borrado\" method=\"post\" action=\"delete_book.php\">";
             echo "<input type=\"hidden\" name=\"isbn\"
                    value=\"".$book["isbn"]."\">";
             echo "<input type=\"button\" onclick=\"pregunta()\" value=\"Borrar art&iacute;culo\">";
             echo "</form></td>";
            }
          ?>
         
  </form>
<?
}

function display_password_form2()
{
// muestra el formulario para cambiar la contraseña
?>
   
   <form action="change_password.php" method=post >
         <div style="width: 300px;">

   <label for="old_passwd">Vieja contrase&ntilde;a:</label>
  <input type="password" id="old_passwd" name="old_passwd" size="1"6 maxlength="16" />
   <label for="new_passwd">Nueva contrase&ntilde;a:</label>
    <input type="password" id="new_passwd" name="new_passwd" size="16" maxlength="16" />
   <label for="new_passwd2">Repetir nueva contrase&ntilde;a:</label>
       <input type="password" id="new_passwd2" name="new_passwd2" size="16" maxlength="16">
                     			<div class="clear">

 <input type="submit" value="Cambiar Contrase&ntilde;a">
  </div> 
   </div>
   </form>
<?
};

function insert_category($catname) 
// inserta una nueva categoría en la base de datos
// el problema es que duplicará filas del menú
{
   $conn = db_connect();

   // comprueba que la categoría no exista ya
   $query = "select *
             from categories
             where catname='$catname'";
   $result = mysql_query($query);
   if (!$result || mysql_num_rows($result)!=0)
     return false;

   // inserta la nueva categoría
   $query = "insert into categories (catid, catname) values
            ('', '$catname')";
   $result = mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}
function insert_subcategory($subcatname,$catid)
// inserta una nueva categoría en la base de datos
{
   $conn = db_connect();

   // comprueba que la categoría no exista ya
   $query = "select *
             from subcategories
             where subcatname='$subcatname'";
   $result = mysql_query($query);
   if (!$result || mysql_num_rows($result)!=0)
     return false;

   // inserta la nueva categoría
   $query = "insert into subcategories  values
            ('', '$subcatname','$catid')";
   $result = mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}

function insert_shop($shopname,$subcatid,$txtRazon)
// inserta una nueva tienda en la base de datos
{
   $conn = db_connect();

   // comprueba que la tienda no exista ya
   $query = "select *
             from shops, empresas 
             where shopname='$shopname' and txtRazon='$txtRazon' and shops.empresaid=empresas.empresaid";
   $result = mysql_query($query);
   if (!$result || mysql_num_rows($result)!=0)
   
   echo "Ya hay una tienda con ese nombre y empresa";
     //return false;
//MIRAR ESTO PORQUE ESTA MAL
// inserta la nueva categoría
   $query = "select empresaid from empresas where txtRazon='$txtRazon'";
   $result = mysql_query($query);
   if (!$result) {
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
   $fila = mysql_fetch_row($result);
   
   
   
echo $fila[0]; 
   
   

//echo $fila[0]; // 42

   $query = "insert into shops(shopname,subcatid,empresaid) values
            ('$shopname', '$subcatid', '$fila[0]')";
   $result = mysql_query($query);
   if (!$result)
     return false;

   
  
   else
     return true;
}
/*MIRAR MUY BIEN ESTO SI LO QUIERO METER

function insert_empresa($txtRazon)
// inserta una nueva tienda en la base de datos
{
   $conn = db_connect();

   // comprueba que la tienda no exista ya
   $query = "select *
             from empresas 
             where txtRazon='$txtRazon'";
   $result = mysql_query($query);
  
   
     if (!$result) {
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
 if (mysql_num_rows($result)!=0){
	   echo 'Ya hay una empresa com est nombre: ' . mysql_error();
    exit;
}
	 
   $fila = mysql_fetch_row($result);
   
   
   
echo $fila[0]; 
   
   

//echo $fila[0]; // 42

   $query = "insert into shops(shopname,subcatid,empresaid) values
            ('$shopname', '$subcatid', '$fila[0]')";
   $result = mysql_query($query);
   if (!$result)
     return false;

   
  
   else
     return true;
}
*****************************/
function insert_book($title, $author, $shopid, $price, $description)
// inserta un nuevo libro en la base de datos
{
   $conn = db_connect();

   // inserta nueva categoría, generando automaticamente el isbn
   $query = "insert into books (author, title, shopid, price, caract) values
            ('$author', '$title', '$shopid', '$price', '$description')";
   $result = mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}

function update_category($catid, $catname)
// cambia el nombre de la categoría con catid en la base de datos
{
   $conn = db_connect();

   $query = "update categories
             set catname='$catname'
             where catid='$catid'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}
function update_subcategory($subcatid, $subcatname,$catid)
// cambia el nombre de la categoría con catid en la base de datos
{
   $conn = db_connect();

   $query = "update subcategories
             set subcatname='$subcatname', catid='$catid'
             where subcatid='$subcatid'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}
function update_shops($shopid, $shopname,$subcatid,$zip,$address, $empresaid)
// cambia el nombre de la categoría con catid en la base de datos
{
  $conn = db_connect();
   $query = "update shops
             set shopname='$shopname', subcatid='$subcatid',
			 zip='$zip', empresaid='$empresaid', address='$address'
             where shopid='$shopid'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}

function update_book($oldisbn, $isbn, $title, $author, $shopid,
                     $price, $description)
// cambia los detalles de los libros almacenados bajo $oldisbn en
// la base de datos con nuevos detalles en argumentos
{
   $conn = db_connect();

   $query = "update books
             set isbn='$isbn',
             title ='$title',
             author = '$author',
             shopid = '$shopid',
             price = '$price',
             caract = '$description'
             where isbn='$oldisbn'";

   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}

function delete_category($catid)
// Elimina la categoría identificada por catid de la base de datos
// Si hay libros en la categoría, no
// será eliminada y la función devolvera falso.
{
   $conn = db_connect();

   // comprueba si hay subcategorías en la categoría
   // para evitar borrados anómalos
   $query = "select *
             from subcategories
             where catid='$catid'";
   $result = @mysql_query($query);
   if (!$result || @mysql_num_rows($result)>0)
     return false;

   $query = "delete from categories
             where catid='$catid'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}
function delete_subcategory($subcatid)
// Elimina la categoría identificada por catid de la base de datos
// Si hay libros en la categoría, no
// será eliminada y la función devolvera falso.
{
   $conn = db_connect();

   // comprueba si hay algunos libros en la categoría
   // para evitar borrados anómalos
   $query = "select *
             from shops
             where subcatid='$subcatid'";
   $result = @mysql_query($query);
   if (!$result || @mysql_num_rows($result)>0)
   {
     return false;}

   $query = "delete from subcategories
             where subcatid='$subcatid'";
   $result = @mysql_query($query);
   if (!$result){
	  
     return false;}
   else{
	 
     return true;}
}

function delete_shop($shopid)
// Elimina la categoría identificada por catid de la base de datos
// Si hay libros en la categoría, no
// será eliminada y la función devolvera falso.
{
   $conn = db_connect();

   // comprueba si hay algunos libros en la categoría
   // para evitar borrados anómalos
   $query = "select *
             from books
             where shopid='$shopid'";
   $result = @mysql_query($query);
   if (!$result || @mysql_num_rows($result)>0)
     return false;

	$query = "delete from otros_members
             where shopid='$shopid'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
	$query = "delete from contacto_member
             where shopid='$shopid'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
	$query = "delete from members
             where shopid='$shopid'";
   $result = @mysql_query($query);
   if (!$result)
     return false; 
   $query = "delete from shops
             where shopid='$shopid'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}
function delete_book($isbn)
// Borra el libro identificado por $isbn de la base de datos.
{
   $conn = db_connect();

   $query = "delete from books
             where isbn='$isbn'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return true;
}
/********/
function display_shop_firm($shop = "")
{
  // si se pasa una categoría existente, proceder en "modo edición"
  $edit = is_array($shop);

  // la mayoría del formulario esta en HTML plano con algún
  // trozo opcional de PHP por todo.
?>
     


   Empresa:
     <select name=txtRazon>
      <?
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
               echo "\n";
          }
          ?>
          </select>
     <? if (!$edit) echo ""; ?> 
      <? if ($edit)
         echo "<input type=hidden name=shopid
                value=\"".$shop["shopid"]."\">";
     }
	 
	/***************************/
	/*MIRAR MUY BIEN ESTO SI LO QUIERO METER
	function display_empresa_form($empresa = "")
{
  // si se pasa una categoría existente, proceder en "modo edición"
  $edit = is_array($empresa);

  // la mayoría del formulario esta en HTML plano con algún
  // trozo opcional de PHP por todo.
?>
  <form method=post
      action="<?=$edit?"edit_empresa.php":"insert_empresa.php";?>">
 
 
    Nombre Empresa:
  <input type=text name=shopname size=40 maxlength=40
          value="<?=$edit?$empresa["txtRazon"]:""; ?>">
        cif Empresa:
  <input type=text name=shopname size=40 maxlength=40
          value="<?=$edit?$empresa["cif"]:""; ?>">

 Dirección Tienda:<input type=text name=address size=40 maxlength=40
          value="<?=$edit?$empresa["address_postal"]:""; ?>">
 Código postal:
  <input type=text name=zip size=40 maxlength=40
          value="<?=$edit?$shop["zip_postal"]:""; ?>">
   

 Provincia:
      <select name=RE_Prov>
      <?
          // lista de las categorías posibles enviadas por la base de datos
         $subcat_array=get_all_provincias();
		  
          foreach ($provincias_array as $thisprov)
          {
               echo "<option value=\"";
               echo $thisprov["RE_Prov"];
               echo "\"";
               // si existen libros, ponerlo en la categoría actual
               if ($edit && $thisprov["RE_Prov"] == $empresa["RE_Prov"])
                   echo " selected";
               echo ">";
               echo $thisprov["provincia"];
               echo "\n";
          }
          ?>
          </select>
  
  Municipio:
      <select name=RE_Prov>
      <?
          // lista de las categorías posibles enviadas por la base de datos
         $subcat_array=get_all_municipios();
		  
          foreach ($municipios_array as $thismun)
          {
               echo "<option value=\"";
               echo $thismun["RE_pobla"];
               echo "\"";
               // si existen libros, ponerlo en la categoría actual
               if ($edit && $thismun["RE_pobla"] == $empresa["RE_pobla"])
                   echo " selected";
               echo ">";
               echo $thisprov["municipio"];
               echo "\n";
          }
          ?>
          </select>

   Empresa:
     <select name=txtRazon>
      <?
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
               echo "\n";
          }
          ?>
          </select>
     <? if (!$edit) echo ""; ?> 
      <? if ($edit)
         echo "<input type=hidden name=shopid
                value=\"".$shop["shopid"]."\">";
      ?>
      <input type=submit
       value="<?=$edit?"Actualizar":"Añadir"; ?> Tienda"></form>
     
     <? if ($edit)
       // permitir borrar tiendas existentes
       {
          echo "<form name=\"borrado\" method=post action=\"delete_shop.php\">";
          echo "<input type=hidden name=shopid value=\"".$shop['shopid']."\">";
          echo "<input type=button onclick=\"pregunta()\" value=\"Borrar Tienda\">";
          echo "</form></td>";
       }
     ?>
    
  </form>
<?
} 
***********************/	 
	 
	 
?>