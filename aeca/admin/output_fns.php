<?
function filled_out($form_vars){
  // test that each variable has a value
  foreach ($form_vars as $key => $value){
     if (!isset($key) || ($value == ""))
        return false;
  }
  return true;
}

function do_html_header2($title = ''){
  
 @$total_price=$_SESSION['total_price'];
 @$items=$_SESSION['items'];

  if(!$items) $items = "0";
  if(!$total_price) $total_price = "0.00";
  ?>   
   
  <div style="float:right;">

  <? 
  if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='')
       echo "&nbsp;";
     else
	  if($items!=0)
	   display_enlacerojo("show_cart.php", "Ver carro");
  ?>
   <div style="float:right;margin-top:10px; margin-right:10px">
  <? 
  if(isset($_SESSION['admin_user'])&& $_SESSION['admin_user']!='')
       echo "&nbsp;";
  else{
	 if($items!=0)
       echo "<p style=\"float:right;\">Total Art&iacute;culos = $items </p><div class=\"clear\"></div>";
	 if($total_price!=0)
       echo "<p style=\"float:right;\">Precio Total = ".number_format($total_price,2)." &#8364;</p>";
	 }
  ?>
  </div><div class="clear"></div>
  </div><div class="clear"></div>          		
  <?
  if($title)
    do_html_heading2 ($title);
	?> <div class="clear"></div>  <?
}

function do_html_footer2(){
?>
  </body>
  </html>
<?
}

function do_html_heading1($heading){
?>
  <h2 style="width:940px; background:#000; color:#f3f3f3; padding:5px 0 5px 20px; margin:0x; font-size:30px "><?=$heading?></h2>
<?
}
function do_html_heading2($heading){
?>
  <h2><?=$heading?></h2>
<?
}

function do_html_cat2($heading){
?>
  <?=$heading?>
<?
}

function do_html_url2($url, $name){
?>
 <a href="<?=$url?>"><?=$name?></a>
<?
}
function do_html_url3($url, $name){
?>
 <a style="color:#000; padding-left:10px" href="<?=$url?>"><?=$name?></a> 
<?
}

function do_html_url_titulo($url, $title){
?>
 <a style="font-size:18px" href="<?=$url?>"><?=$title?></a> <!--esto cambia "volver al menu admin" y "Lacostes by Mat"-->
<?
}

function display_categories($cat_array){
  if (!is_array($cat_array))
  {
     echo "<p>No hay categor&iacute;as actualmente disponibles</p>";
     return;
  }
    echo "<div id='cat' style='margin-top:30px; '>";

  echo "<ul>";
  foreach ($cat_array as $row){
	 
	    $url = "show_cat.php?catid=".($row["catid"]);

    $title = $row["catname"];
    echo "<li>";
    do_html_url2($url, $title);
	
	 echo "</li>";
  }
  echo "</ul>";
    echo "</div>";
}

function display_categories_subcategories($cat_array){
  if (!is_array($cat_array)){
     echo "<p>No hay categor&iacute;as actualmente disponibles</p>";
     return;
  }
  foreach ($cat_array as $row){	 
	    $url = "tienda/show_cat.php?catid=".($row["catid"]);
		$url_current="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		$name 	 = $row["catname"]; 
    	$title = $row["catname"];
 ?>
         <li class="nivel1"><a class="nivel1" href="<?=$url?>" ><?php 
			do_html_cat2($name);?>        </a>
<!--[if lte IE 6]><a class="nivel1ie" href="<?=$url?>"><?php 
			do_html_cat2($name);?><table class="falsa"><tr><td><![endif]-->
		<?php $subcat_array = get_subcategories($row["catid"]);
  display_subcategories_menu($subcat_array , $members=false);?> 
<!--[if lte IE 6]></td></tr></table></a><![endif]-->		
        </li>
  <?php 
  }
}

function display_categories_subcategories2($cat_array){
  if (!is_array($cat_array)){
     echo "<p>No hay categor&iacute;as actualmente disponibles</p>";
     return;
  }
  foreach ($cat_array as $row){	 
	    $url = "show_cat.php?catid=".($row["catid"]);
		$name=get_category_name($row["catid"]); 	  
    	$title = $row["catname"];
		$loc=get_category_imagenloc($row["catid"]);
 		?>
        <li class="nivel1" ><a style="text-align:left" class="nivel1" href="<?=$url?>" ><?php do_html_cat2($name);?>   
       	<?php echo     '<img style="display:block" src="'.'../'.$loc.'" alt="Tiendas"  height="69" width="125" />' ;	   ?>    </a>
		<!--[if lte IE 6]><a class="nivel1ie" href="<?=$url?>"><?php 
		do_html_cat2($name);?><table class="falsa"><tr><td><![endif]-->
		<?php $subcat_array = get_subcategories($row["catid"]);
  		display_subcategories_menu($subcat_array , $members=true);?> 
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->		
        </li>
  		<?php 
		}
  		?> <li class="nivel1 ultimo" ><a style="text-align:left" class="nivel1" href="oferton.php" >Ofertas<img style="display:block" src="../images/9.jpg" alt="Tiendas"  height="69" width="125" /></a></li>
 		<?php 
}

function display_subcategories($subcat_array){
  if (!is_array($subcat_array)){
     echo "<p>No hay subcategor&iacute;as actualmente disponibles</p>";
     return;
  }
  echo "<div id='cat' style='margin-top:80px; '>";
  echo "<ul>";
  foreach ($subcat_array as $row){
	    $url = "show_subcat.php?subcatid=".($row["subcatid"]);
    	$title = $row["subcatname"];
   		echo "<li>";
    	do_html_url2($url, $title);
		echo "</li>";
  		}
  echo "</ul>";
  echo "</div>";
}

function Inicio($sitio){

$direccion = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

	if(preg_match($sitio,$direccion)) {
		echo 'class="seleccionado"'; 
	}
} 

function display_subcategories_menu($subcat_array, $members=false)
{
  if (!is_array($subcat_array))
  {
     echo "<p>No hay subcategor&iacute;as actualmente disponibles</p>";
     return;
  }
 echo "<ul>";
  foreach ($subcat_array as $row)
  {
	 if($members)
	 
         $url = "show_subcat.php?subcatid=".($row["subcatid"]);
		else

      $url = "tienda/show_subcat.php?subcatid=".($row["subcatid"]);
	        


    $titles = $row["subcatname"]; //no $title porque IE 7 lo pone como título y aquí no me interesa
    echo "<li>";
    do_html_url2($url, $titles); 
	echo "</li>";
  }
 echo "</ul>";
 
}
function display_shops($shop_array, $tienda=false)
{
	echo "<style type=\"text/css\">#global_2colysecundario{display:none}</style>";
  if (!is_array($shop_array))
  {
	  	echo "<h4 style=\"font-size:20px; color:#900; margin-bottom:30px;\">Resultados de tu b&uacute;squeda</h4>";
 
     echo "<p>No hay resultados para esa b&uacute;squeda</p>";
     return;
  }
  	echo "<style type=\"text/css\">.photoslider{display:none}</style>";

 echo "<ul style='margin-left:50px'>";
  foreach ($shop_array as $row)
  {
	  if($tienda=true)
   $url = "show_shop.php?shopid=".($row["shopid"]);
   else
      $url = "tienda/show_shop.php?shopid=".($row["shopid"]);

    $title = $row["shopname"];
    echo "<li>";
    do_html_url_titulo($url, $title);
	 ?>
      <dl style="width: 30em;">
            <dt>Direcci&oacute;n:</dt>
            	<dd> <?php echo $row["address"]?> </dd>
            <dt>Web</dt>
      		<dd>  <?php echo $row["web"]?> </dd>
            <dt>Email</dt>
                  		<dd>  <?php echo $row["emailAddress"]?> </dd>
            <dt>Tel&eacute;fono</dt>
                  		<dd>  <?php echo $row["txtPhone"]?> </dd>

</dl>
	 <?php
	echo "</li>";
  }
 echo "</ul>";
 
}
function display_shops_indice($shop_array, $tienda=false)
{
  if (!is_array($shop_array))
  {
     echo "<p style=\"font-size:.9em; text-align:left\">Actualmente no hay tiendas disponibles</p>";
     return;
  }
 echo "<ul >";
  foreach ($shop_array as $row)
  {
	  if($tienda=true)
   $url = "show_shop.php?shopid=".($row["shopid"]);
   else
      $url = "tienda/show_shop.php?shopid=".($row["shopid"]);

    $title = $row["shopname"];
    echo "<li>";
    do_html_url2($url, $title);
	echo "</li>";
  }
 echo "</ul>";
 
}

function display_books($book_array)
{
  //display all items in the array passed in
  if (!is_array($book_array))
  {
     echo "<p style=\"font-size:0.9em\">Lo sentimos, actualmente no hay ofertas.</p>";
  }
  else
  {
    //create table
    echo "<div style=\"margin-left:10px; \"><table width = \"100%\" border = 0 >";

    //create a table row for each item
    foreach ($book_array as $row)
    {
      $url = "show_book.php?isbn=".($row["isbn"]);
      echo "<tr><td width=\"200px\">";
      if (@file_exists("images/".$row["isbn"].".jpg"))
      {
        $title = "<img src=\"images/".($row["isbn"]).".jpg\" border=0 width=100>";
        do_html_url2($url, $title);
		
		}
      else
      {
        echo "&nbsp;";
      }
      echo "</td><td>";
      $title =  $row["title"]." - ".$row["author"];
      display_enlace_ppal_tienda($url, $title);
      echo "</td></tr>";
    }
    echo "</table></div>";
  }
  echo "<hr>";
}
function display_books_indice($book_array)
{
	if (!is_array($book_array))
  {
     echo "<p style=\"font-size:.9em\">Actualmente no hay ofertas disponibles</p>";
     return;
  }
 echo "<ul >";
  foreach ($book_array as $row)
  {
	  if($tienda=true)
   $url = "show_book.php?isbn=".($row["isbn"]);
   else
    $url = "tienda/show_book.php?isbn=".($row["isbn"]);
    $title = $row["title"];
    echo "<li>";
    do_html_url2($url, $title);
	echo "</li>";
  }
 echo "</ul>";
  //display all items in the array passed in
 
}
function display_ofertas($ofertas_array)
{
  //display all items in the array passed in
  if (!is_array($ofertas_array))
  {
     echo "<br>Lo sentimos, actualmente no hay ofertas <br>";
  }
  else
  {
    //create table
    echo "<table width = \"600px\" border = 0 style=\"float:left; border-collapse:collapse\">";

    //create a table row for each item
    foreach ($ofertas_array as $row)
    {
      $url = "show_book.php?isbn=".($row["isbn"]);
      echo "<tr height=80px style=\"border-top:1px solid #999\"><td>";
      if (@file_exists("images/".$row["isbn"].".jpg"))
      {
        $title = "<img src=\"images/".($row["isbn"]).".jpg\" height=70 border=0>";
        do_html_url2($url, $title);
      }
      else
      {
        echo "&nbsp;";
      }
      echo "</td><td>";
      $title =  $row["title"];
	  
	  
      do_html_url2($url, $title);
	  ?><p><span style="font-size:.9em">Establecimiento:</span> <?php echo $row["shopname"]?> </p>
      <p><span style="font-size:.9em">Precio: </span><?php echo $row["price"]."&#8364;"?> </p>

	 <?php
      echo "</td></tr>";
    }
    echo "</table>";
  }
}
function display_email($email_array)
{
  //display all items in the array passed in
  if (!is_array($email_array))
  {
     echo "<p>Lo sentimos, actualmente no hay email </p>";
  }
  else
  {
    //create table
    echo "<table width = \"100%\" border = 0>";

    //create a table row for each book
    foreach ($email_array as $row)
    {
      echo "<tr><td>";
	  ?><p>Email: <?php echo $row["emailAddress"]?> </p>

	 <?php
      echo "</td></tr>";
    }
    echo "</table>";
  }
}
function display_book_details($book)
{
  // display all details about this book
  if (is_array($book))
  {
 
    //display the picture if there is one
    if (@file_exists("images/".($book["isbn"]).".jpg"))
    {
      $size = GetImageSize("images/".$book["isbn"].".jpg");
      if($size[0]>0 && $size[1]>0)
        echo "<div style=\"border-bottom:1px solid #333; padding-bottom:20px\">";
		echo "<img style=\"margin-left:50px\" src=\"images/".$book["isbn"].".jpg\" border=0 ".$size[3].">";
    }
    echo "<ul style=\"list-style:none; float:left; width:300px\" >";
    echo "<li>Marca: <strong>".$book["author"]."</strong></li>";
    echo "<li>Nuestro Precio: <strong>". number_format($book["price"], 2)."&#8364;"."</strong></li>";
    echo "<li>Descripci&oacute;n: <br/>";
	echo "<strong>". $book["caract"]."</strong></li>";
    echo "</ul>";
  }
  else
    echo "<p>Los detalles de esta oferta no pueden ser mostrados en este momento.</p>";
  echo "</div>";
}

function display_checkout_form(){
  //display the form that asks for name and address
?>
  <br>
  <table border = 0 width = 100% cellspacing = 0>
  <form action = "purchase.php" method = "post">
  <tr><th colspan = 2 bgcolor="#cccccc">Su informaci&oacute;n</th></tr>
  <tr>
    <td><label for="name">Nombre</label></td>
    <td><input type = "text" id = "name" name = "name" value = "" maxlength = "40" size = "40"></td>
  </tr>
  <tr>
    <td><label for="address">Direcci&oacute;n</label></td>
    <td><input type = "text" id = "address" name = "address" value = "" maxlength = "40" size = "40"></td>
  </tr>
  <tr>
    <td><label for="city">Poblaci&oacute;n</label></td>
    <td><input type = "text" id = "city" name = "city" value = "" maxlength = "20" size = "40"></td>
  </tr>
  <tr>
    <td><label for="state">Provincia</label></td>
    <td><input type = "text" id = "state" name = "state" value = "" maxlength = "20" size = "40"></td>
  </tr>
  <tr>
    <td><label for="zip">C&oacute;digo Postal</label></td>
    <td><input type = "text" id = "zip" name = "zip" value = "" maxlength = "10" size = "40"></td>
  </tr>
  <tr>
    <td><label for="country">Pa&iacute;s</label></td>
    <td><input type = "text" id = "country" name = "country" value = "" maxlength = "20" size = "40"></td>
  </tr>
  <tr><th colspan = 2 bgcolor="#cccccc">Direcci&oacute;n de env&iacute;o (dejar en blanco si es el de arriba)</th></tr>
  <tr>
    <td><label for="ship_name">Nombre</label></td>
    <td><input type = "text" id = "ship_name" name = "ship_name" value = "" maxlength = "40" size = "40"></td>
  </tr>
  <tr>
    <td><label for="ship_address">Direcci&oacute;n</label></td>
    <td><input type = "text"  id = "ship_address" name = "ship_address" value = "" maxlength = "40" size = "40"></td>
  </tr>
  <tr>
    <td><label for="ship_city">Poblaci&oacute;n</label></td>
    <td><input type = "text" id = "ship_city" name = "ship_city" value = "" maxlength = "20" size = "40"></td>
  </tr>
  <tr>
    <td><label for="ship_state">Provincia</label></td>
    <td><input type = "text" id = "ship_state" name = "ship_state" value = "" maxlength = "20" size = "40"></td>
  </tr>
  <tr>
    <td><label for="ship_zip">C&oacute;digo Postal</label></td>
    <td><input type = "text" id = "ship_zip" name = "ship_zip" value = "" maxlength = "10" size = "40"></td>
  </tr>
  <tr>
    <td><label for="ship_country">Pa&iacute;s</label></td>
    <td><input type = "text" id = "ship_country" name = "ship_country" value = "" maxlength = "20" size = "40"></td>
  </tr>
  <tr>
    <td colspan = 2 align = center>
      <p>Por favor pulsar compar para confirmar su compra,
         o Continuar comprando para a&ntilde;adir o eliminar art&iacute;culos</p>
     <? display_form_button("comprar", "Comprar"); ?>
    </td>
  </tr>
  </form>
  </table><hr>
<?
}

function display_shipping($shipping)
{
  // display table row with shipping cost and total price including shipping
 // global $total_price;
 $total_price=$_SESSION['total_price'];
?>
  <table border = 0 width = 100% cellspacing = 0>
  <tr><td align = left>Env&iacute;o</td>
      <td align = right> <?=number_format($shipping, 2); ?> &#8364;</td></tr>
  <tr><th width=100% bgcolor="#cccccc" align = left>TOTAL INCLUIDO ENV&Iacute;O</th>
      <th width=100% bgcolor="#cccccc" align = right><?=number_format($shipping+$total_price, 2); ?>&nbsp;&#8364;</th>
  </tr>
  </table><br>
<?
}

function display_card_form($name)
{
  //display form asking for credit card details
?>
  <table border = 0 width = 100% cellspacing = 0>
  <form action = process.php method = post>
  <tr><th colspan = 2 bgcolor="#cccccc">Detalles Tarjeta Cr&eacute;dito</th></tr>
  <tr>
    <td>Tipo</td>
    <td><select name = card_type><option>VISA<option>MasterCard<option>American Express</select></td>
  </tr>
  <tr>
    <td>N&uacute;mero</td>
    <td><input type = text name = card_number value = "" maxlength = 16 size = 40></td>
  </tr>
  <tr>
    <td>C&oacute;digo AMEX code (si se requiere)</td>
    <td><input type = text name = amex_code value = "" maxlength = 4 size = 4></td>
  </tr>
  <tr>
    <td>Fecha Caducidad</td>
    <td>Mes <select name = card_month><option>01<option>02<option>03<option>04<option>05<option>06<option>07<option>08<option>09<option>10<option>11<option>12</select>
    a&ntilde;o <select name = card_year><option>12<option>13<option>14<option>15<option>16<option>17<option>18<option>19<option>20<option>21<option>22</select></td>
  </tr>
  <tr>
    <td>Nombre en Tarjeta</td>
    <td><input type = text name = card_name value = "<?=$name; ?>" maxlength = 40 size = 40></td>
  </tr>
  <tr>
    <td colspan = 2 align = center>
      <b>Por favor pulsa comprar para confirmar tu compra,
         o Continuar Comprando para a&ntilde;adir o eliminar art&iacute;culos</b>
     <? display_form_button("comprar", "Comprar"); 
	 ?>
    </td>
  </tr>
  </table>
<?
}

function display_cart($cart, $change = true, $images = 1)
{
  // display items in shopping cart
  // optionally allow changes (true or false)
  // optionally include images (1 - yes, 0 - no)

 $total_price=$_SESSION['total_price'];
  $items=$_SESSION['items'];

  echo "<table border = 0 width = 100% cellspacing = 0>
        <form action = show_cart.php method = post>
        <tr><th colspan = ". (1+$images) ." bgcolor=\"#cccccc\">Art&iacute;culo</th>
        <th bgcolor=\"#cccccc\">Precio</th><th bgcolor=\"#cccccc\">Cantidad</th>
        <th bgcolor=\"#cccccc\">Total</th></tr>";

  //display each item as a table row
  foreach ($cart as $isbn => $qty)
  {
    $book = get_book_details($isbn);
    echo "<tr>";
    if($images ==true)
    {
      echo "<td align = left>";
      if (file_exists("images/$isbn.jpg"))
      {
         $size = GetImageSize("images/".$isbn.".jpg");
         if($size[0]>0 && $size[1]>0)
         {
           echo "<img src=\"images/".$isbn.".jpg\" border=0 ";
           echo "width = ". $size[0]/3 ." height = " .$size[1]/3 . ">";
         }
      }
      else
         echo "&nbsp;";
      echo "</td>";
    }
    echo "<td align = left>";
    echo "<a href = \"show_book.php?isbn=".$isbn."\">".$book["title"]."</a> de ".$book["author"];
    echo "</td><td >".number_format($book["price"], 2)." &#8364;";
    echo "</td><td >";
    // if we allow changes, quantities are in text boxes
    if ($change == true)
      echo "<input type = text name = \"$isbn\" value = $qty size = 3>";
	  //echo "<input type = text name = \"cant[]\" value = $qty size = 3>";  
    else
      echo $qty;
    echo "</td><td >".number_format($book["price"]*$qty,2)."&#8364;</td></tr>\n";
  }
  // display total row
  echo "<tr>
          <th colspan = ". (2+$images) ." bgcolor=\"#cccccc\">&nbsp;</td>
          <th bgcolor=\"#cccccc\"> 
              ".$_SESSION['items']."
          </th>
          <th align = center bgcolor=\"#cccccc\">
              ".number_format($_SESSION['total_price'], 2).
          "&#8364;</th></tr>";
  // display save change button
  if($change == true)
  {
    echo "<tr>
            <td colspan = ". (5) .">
            <input type = \"hidden\" name = \"save\" value = \"true\">
            <input class=\"enlaces\" style=\"text-align:left; font-weight:normal; color:#fff; background:#900; cursor:pointer\" type = submit value=\"Salvar cambios\" border = \"0\" alt = \"Save Changes\">
            </td>
        </tr>";
  }
  echo "</form></table>";
}

function display_login_form2(){
  // display form asking for name and password
?>
  <form method="post" action="index.php">
  <table bgcolor=#cccccc>
   <tr>
     <td>Nombre Usuario:</td>
     <td><input type="text" name="username"></td></tr>
   <tr>
     <td>Contraseña:</td>
     <td><input type="password" name="passwd"></td></tr>
   <tr>
     <td colspan=2 align=center>
     <input type="submit" value="Log in"></td></tr>
   <tr>
 </table></form>
<?
}

function display_admin_menu(){
?>
<ul>
<li class="admin">Edici&oacute;n general</li>
<li><a href="insert_category_form.php">A&ntilde;adir una nueva categor&iacute;a</a></li>
<li><a href="insert_subcategory_form.php">A&ntilde;adir una nueva subcategor&iacute;a</a></li>
<li><a href="../register.php">A&ntilde;adir una nueva tienda</a></li>
<li><a href="insert_book_form.php">A&ntilde;adir un nuevo art&iacute;culo</a></li>
<li><a href="index_admin.php">Editar/borrar categor&iacute;as, subcategor&iacute;as, comercios, ofertas</a></li>
<li><a href="../tienda/index.php">Ir a Nuestros Asociados para edici&oacute;n/borrado </a></li>

<li class="admin">Edici&oacute;n socios/clientes</li>
<li><a href="../admin/view_empresas.php">Editar empresas</a></li>
<li><a href="../members/view_members.php">Editar socios-comercios</a></li>
<li><a href="../users/view_users.php">Editar usuarios</a></li>
<li><a href="../admin/view_solicit_members.php">Solicitudes de registro pendientes</a></li>

<li class="admin">Edici&oacute;n noticias</li>
<li><a href="../noticias/administrar.php">A&ntilde;adir noticias</a></li>
<li><a href="../noticias/index.php">Editar/borrar noticias y comentarios</a></li>

<li class="admin">Edici&oacute;n galer&iacute;as</li>
<li><a href="../edit_gallery/index.php">A&ntilde;adir/editar/borrar fotos de la galer&iacute;a general</a></li>
<li><a href="../edit_gallery_socios/index.php">A&ntilde;adir/editar/borrar fotos de la galer&iacute;a de socios</a></li>

<li class="admin">Subir archivos</li>
<li><a href="../admin/archivos.php">Subir documentaci&oacute;n de la asociaci&oacute;n</a></li>

<li class="admin">Contacto</li>
<li><a href="../admin/mostrar_guardado.php">Mostrar los comentarios de contacto</a></li>

<li class="admin">Administraci&oacute;n</li>
<li><a href="../admin/register_admin.php">Registro de nuevo usuario administrador</a></li>
<li><a href="change_password_form.php">Cambiar la contrase&ntilde;a de Admin</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<?
}

function display_button($target, $image, $alt){
  echo "<center><a href=\"$target\"><img src=\"images/$image".".gif\"
           alt=\"$alt\" border=0 height = 50 width = 135></a></center>";
}
function display_enlace_ppal($target, $letrero){
  echo "<a class=\"edicion\" style=\"color:#fff\" href=\"$target\">$letrero</a>";
}
function display_enlace_ppal_tienda($target, $letrero){
  echo "<a class=\"edicion\" style=\"color:#fff; float:left\"  href=\"$target\">$letrero</a>";
}
function display_enlace($target, $letrero){
  echo "<a class=\"enlaces\" style=\"color:#fff\" href=\"$target\">$letrero</a>";
}
function display_enlace_centro($target, $letrero){
  echo "<a class=\"enlaces_centro\" style=\"color:#fff\" href=\"$target\">$letrero</a>";
}
function display_enlacesimple($target, $letrero){
  echo "<p><a class=\"avance\" href=\"$target\">$letrero</a></p>";
}
function display_enlacesimple2($target, $letrero){
  echo "<p style=\"margin-top:30px\"><a class=\"avance2\" href=\"$target\">$letrero</a></p>";
}
function display_enlacerojo($target, $letrero){
  echo "<a class=\"enlacesrojo\" style=\"text-align:left; font-weight:normal; color:#fff; background:#900 url(images/carrito.jpg) 120px no-repeat\" href=\"$target\">$letrero</a>";
}
function display_enlacecaja($target, $letrero){
  echo "<a class=\"enlacesrojo\" style=\"text-align:left; font-weight:normal; color:#fff; background:#900 url(images/caja.jpg) 120px no-repeat\" href=\"$target\">$letrero</a>";
}

function display_form_button($image, $alt){
  echo "<center><input type = image src=\"images/$image".".jpg\"
           alt=\"$alt\" border=0 height = 100 width = 200></center>";
}

function display_emails($email_array, $tienda=false){
  if (!is_array($email_array))
  {
     echo "Actualmente no hay tiendas disponibles<br>";
     return;
  }
 echo "<ul>";
  foreach ($email_array as $row)
  {
	 ?>
      <dl style="width: 30em;">
            <dt>Direccion:</dt>
            	<dd> <?php echo $row["emailAddress"]?> </dd>
            <dt>Web</dt>
      		<dd>  <?php echo $row["web"]?> </dd>
</dl>
	 <?php
	echo "</li>";
  }
 echo "</ul>";
 
}

function display_categories_subcategories_admin($cat_array){
  if (!is_array($cat_array)){
     echo "<p>No hay categor&iacute;as actualmente disponibles</p>";
     return;
  }
  foreach ($cat_array as $row){	 
	    $url = "../admin/edit_category_form.php?catid=".($row["catid"]);
		$name=get_category_name($row["catid"]); 	  
    	$title = $row["catname"];
 		?>
 		<ul>
            <li style='margin-left:30px; margin-top:30px;'><a  href="<?=$url?>" ><?php 
                do_html_cat2($name);?>        </a>
    <!--[if lte IE 6]><a href="<?=$url?>"><?php 
                do_html_cat2($name);?><table class="falsa"><tr><td><![endif]-->
            <?php $subcat_array = get_subcategories($row["catid"]);
      display_subcategories_menu_admin($subcat_array , $members=true);?> 
    <!--[if lte IE 6]></td></tr></table></a><![endif]-->		
            </li>
        </ul>
  		<?php 
		}
}

function display_subcategories_menu_admin($subcat_array, $members=false){
  if (!is_array($subcat_array))
  {
     echo "<p>No hay subcategor&iacute;as actualmente disponibles</p>";
     return;
  }
 echo "<ul >";
  foreach ($subcat_array as $row)
  {
	 

      $url = "../admin/edit_subcategory_form.php?subcatid=".($row["subcatid"]);
	        


    $title = $row["subcatname"];
    echo "<li >";
    do_html_url_admin($url, $title);
	$shops_array = get_shops($row["subcatid"]);
  display_shops_admin($shops_array , $member=true);
	echo "</li>";
  }
 echo "</ul>";
 
}
function display_shops_admin($shop_array, $tienda=false)
{
  if (!is_array($shop_array))
  {
     echo "<p>Actualmente no hay negocios disponibles</p>";
     return;
  }
 echo "<ul >";
  foreach ($shop_array as $row)
  {
$url = "../admin/view_member.php?memberId=".($row["shopid"])."&start=0&order=username";
    //$url = "../admin/edit_shop_form.php?shopid=".($row["shopid"]);
    $title = $row["shopname"];
	$ofertas_array = get_books($row["shopid"]);
    echo "<li>";
    do_html_URL_admin2($url, $title);
	  display_books_admin($ofertas_array , $member=true);

	 ?>
      
	 <?php
	echo "</li>";
  }
 echo "</ul>";
 
}
function display_books_admin($book_array)
{
  //display all books in the array passed in
  if (!is_array($book_array))
  {
     echo "<p>Actualmente no hay ofertas asociadas a este negocio</p>";
  }
  else
  {
    //create table
    echo "<ul>";

    //create a table row for each book
    foreach ($book_array as $row)
    {
      $url = "../admin/edit_book_form.php?isbn=".($row["isbn"]);
      echo "<li style=\"text-align:left\">";
    
      
      $title =  $row["title"]." - ".$row["author"];
      do_html_url2($url, $title);
      echo "</li>";
    }
    echo "</ul>";
  }
}
function do_html_URL_admin($url, $name)
{
  // output URL as link and br
?>

 <a  href="<?=$url?>"><?=$name?></a> <!--esto cambia "volver al menu admin" y "Lacostes by Mat"-->
<?
}

function do_html_URL_admin2($url, $name)
{
  // output URL as link and br
?>

 <a  href="<?=$url?>"><?=$name?></a> <!--esto cambia "volver al menu admin" y "Lacostes by Mat"-->
<?
}
function display_noticias($noticias_array)
{
  if (!is_array($noticias_array))
  {
     echo "No hay subcategor&iacute;as actualmente disponibles<br>";
     return;
  }
 echo "<ul>";
  foreach ($noticias_array as $row)
  {
	    $url = "ver.php?id=".($row["id_noticia"]);


    $title = $row["titulo"];
	
    echo "<li >";
    do_html_url2($url, $title);
	echo "</li>";
  }
 echo "</ul>";
}

/********************************************************/

function display_categories_subcategories_mapa($cat_array, $mem=false)
{
    foreach ($cat_array as $row)
  {	 
  	if(!$mem)
	    $url = "tienda/show_cat.php?catid=".($row["catid"]);
	else
	    $url = "../tienda/show_cat.php?catid=".($row["catid"]);		
		$name=get_category_name($row["catid"]); 	  
    	$title = $row["catname"];
 ?>
 <ul>
        <li class="nivel1"><a  href="<?=$url?>" ><?php 
			do_html_cat2($name);?>        </a>
<!--[if lte IE 6]><a href="<?=$url?>"><?php 
			do_html_cat2($name);?><table class="falsa"><tr><td><![endif]-->
		<?php $subcat_array = get_subcategories($row["catid"]);
  display_subcategories_menu_mapa($subcat_array , $members=true, $mem=false);?> 
<!--[if lte IE 6]></td></tr></table></a><![endif]-->		
        </li>
        </ul>
  <?php }
}
function display_subcategories_menu_mapa($subcat_array, $members=false, $mem=false)
{
  
 echo "<ul >";
  foreach ($subcat_array as $row)
  {
	 
  	if(!$mem)

      $url = "tienda/show_subcat.php?subcatid=".($row["subcatid"]);
	 else       

      $url = "../tienda/show_subcat.php?subcatid=".($row["subcatid"]);

    $title = $row["subcatname"];
    echo "<li >";
    do_html_url_admin($url, $title);
	$shops_array = get_shops($row["subcatid"]);
  display_shops_mapa($shops_array , $member=true, $mem=false);
	echo "</li>";
  }
 echo "</ul>";
 
}
function display_shops_mapa($shop_array, $tienda=false, $mem=false)
{
   if (!is_array($shop_array))
  {
     echo "<p>Actualmente no hay negocios disponibles</p>";
     return;
  }
 echo "<ul >";
  foreach ($shop_array as $row)
  {
	    	if(!$mem)

$url = "tienda/show_shop.php?shopid=".($row["shopid"]);
else
$url = "../tienda/show_shop.php?shopid=".($row["shopid"]);

    //$url = "../admin/edit_shop_form.php?shopid=".($row["shopid"]);
    $title = $row["shopname"];
	$ofertas_array = get_books($row["shopid"]);
    echo "<li>";
    do_html_URL_admin2($url, $title);
	  display_books_mapa($ofertas_array, $mem=false);

	 ?>
      
	 <?php
	echo "</li>";
  }
 echo "</ul>";
 
}
function display_books_mapa($book_array, $mem=false)
{
  //display all books in the array passed in
  if (!is_array($book_array))
  {
     echo "<p>Actualmente no hay ofertas asociadas a este negocio</p>";
  }
  else
  {
 
    //create table
    echo "<ul>";

    //create a table row for each book
    foreach ($book_array as $row)
    {
			    	if(!$mem)

      $url = "tienda/show_book.php?isbn=".($row["isbn"]);
	  else
      $url = "../tienda/show_book.php?isbn=".($row["isbn"]);
	  
      echo "<li>";
    
      
      $title =  $row["title"]." - ".$row["author"];
      do_html_url2($url, $title);
      echo "</li>";
    }
	    echo "</ul>";
  }
}


function display_menu_gral_admin($membersArea=true){
if(isset($_SESSION['admin_user'])&& $_SESSION["admin_user"] != ""){?>

		<div id="menu_admin" style="margin-top:0">
        
						<ul>
                            <li class="nivel1"><a class="nivel1" href="<?php if ( $membersArea ) echo "../" ?>admin/index.php">Inicio Admin</a></li>
                            <li class="nivel1"><a class="nivel1" href="#">Admin</a> 
                            <!--[if lte IE 6]><a href="#" class="nivel1ie">Edici&oacute;n establecimientos<table class="falsa"><tr><td><![endif]-->
                            
                                    <ul>
                            <li><a href="<?php if ( $membersArea ) echo "../" ?>admin/register_admin.php">A&ntilde;adir administrador</a></li>
                            <li><a href="<?php if ( $membersArea ) echo "../" ?>admin/change_password_form.php">Cambiar contrase&ntilde;a</a></li>
  									</ul>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            <li class="nivel1"><a class="nivel1" href="<?php if ( $membersArea ) echo "../" ?>admin/index_admin.php">Edici&oacute;n general</a> 
                            <!--[if lte IE 6]><a href="#" class="nivel1ie">Edici&oacute;n establecimientos<table class="falsa"><tr><td><![endif]-->
                            
                                    <ul>
                                       <li><a href="<?php if ( $membersArea ) echo "../" ?>admin/insert_category_form.php">A&ntilde;adir categor&iacute;a</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>admin/insert_subcategory_form.php">A&ntilde;adir subcategor&iacute;a</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>register.php">A&ntilde;adir tienda</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>admin/insert_book_form.php">A&ntilde;adir art&iacute;culo</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>admin/index_admin.php">Editar/borrar</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>tienda/index.php">P&aacute;gina general tiendas</a></li>
                                                                        
                                    </ul>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            
 							<li class="nivel1"><a class="nivel1" href="#">Edici&oacute;n socios/clientes</a> 
                            <!--[if lte IE 6]><a href="#" class="nivel1ie">Edici&oacute;n establecimientos<table class="falsa"><tr><td><![endif]-->
                            
                                    <ul>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>admin/view_empresas.php">Editar empresas</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>members/view_members.php">Editar socios-comercios</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>users/view_users.php">Editar usuarios</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>admin/view_solicit_members.php">Solicitudes pendientes</a></li>
  									</ul>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li> 							
                            
                            <li class="nivel1"><a class="nivel1" href="../noticias/index.php">Edici&oacute;n noticias</a>
                            <!--[if lte IE 6]><a href="#" class="nivel1ie">Edici&oacute;n noticias<table class="falsa"><tr><td><![endif]-->
                            
                                    <ul>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>noticias/administrar.php">A&ntilde;adir noticias</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>noticias/index.php">Editar/borrar noticias y comentarios</a></li>
                                                                        
                                    </ul>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->            
                			</li> 							
                            
                            <li class="nivel1"><a class="nivel1" href="#">Edici&oacute;n galer&iacute;as</a> 
                            <!--[if lte IE 6]><a href="#" class="nivel1ie">Edici&oacute;n establecimientos<table class="falsa"><tr><td><![endif]-->
                            
                                    <ul>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>edit_gallery/index.php">Galer&iacute;a general</a></li>
                                        <li><a href="<?php if ( $membersArea ) echo "../" ?>edit_gallery_socios/index.php">Galer&iacute;a socios</a></li>
  									</ul>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            <li class="nivel1"><a class="nivel1" href="<?php if ( $membersArea ) echo "../" ?>admin/archivos.php">Archivos</a></li>
                            <li class="nivel1"><a class="nivel1" href="<?php if ( $membersArea ) echo "../" ?>admin/mostrar_guardado.php">Contacto</a></li>
                         
						</ul>
		</div>	 

<? }
}




function display_menu_gral_socios($membersArea=true){
if(isset($_SESSION['member'])&& $_SESSION["member"] != ""){?>
<div id="menu_admin" style="margin-top:0">
<ul>
                    <li class="nivel1"><a href="../members/index.php">Inicio &aacute;rea socios</a></li>
                    <li class="nivel1"><a href="../members/eventos.php">Eventos</a></li>
                    <li class="nivel1"><a href="../members/miscelanea.php">Miscel&aacute;nea</a></li>
                    <li class="nivel1"><a href="../members/listar_archivos.php">Documentaci&oacute;n</a></li>
                    <li class="nivel1"><a href="../members/gallery2.php">Galer&iacute;a</a></li>        
                    <li class="nivel1"><a href="../members/juntas.php">Juntas</a></li>
                    <li class="nivel1"><a href="../members/contact.php">Contacto</a></li>
                    <?php  $shopid=$_SESSION['member']->getValueEncoded('shopid');?>
                    <li class="nivel1"><a class="nivel1" href="view_themember.php?memberId=<?=$shopid?>">Edici&oacute;n datos</a> 
					 
                            <!--[if lte IE 6]><a href="#" class="nivel1ie">Edici&oacute;n establecimientos<table class="falsa"><tr><td><![endif]-->
                            
                                    <ul>
                            <li><a href="view_themember.php?memberId=<?=$shopid?>">Edita tus datos</a></li>
                            <li><a href="../members/change_user_form.php">Cambiar usuario</a></li>
                            <li><a href="../members/change_passwd_form.php">Cambiar contrase&ntilde;a</a></li>
  									</ul>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                    <li class="nivel1"><a href="../members/view_members.php">Listado socios</a></li>
                </ul>
</div>
<? }
}















?>