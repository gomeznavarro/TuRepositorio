<?
function calculate_shipping_cost()
{
    //gastos envio fijos
  if((isset($_SESSION['member']) && $_SESSION['member']!='') || (isset($_SESSION['user']) && $_SESSION['user']!=''))
  return 0.00;
  else if((isset($_SESSION['member']) && $_SESSION['member']!='') || (isset($_SESSION['user']) && $_SESSION['user']!=''))
  return 10.00;
  else
  return 20.00;
}

function get_categories()
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select catid, catname, imagenloc
             from categories";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_cats = @mysql_num_rows($result);
   if ($num_cats ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}

function get_category_name($catid)
{
   // Petición a la base de datos del nombre de una categoría con su catid
   $conn = db_connect();
   $query = "select catname
             from categories
             where catid = $catid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_cats = @mysql_num_rows($result);
   if ($num_cats ==0)
      return false;
   $result = mysql_result($result, 0, "catname");
   return $result;
}
function get_catname_by_subcatid($subcatid)
{
   // Petición a la base de datos del nombre de una categoría con el subcatid
   $conn = db_connect();
   $query = "select catname
             from categories, subcategories
             where subcategories.subcatid=$subcatid and subcategories.catid = categories.catid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_cats = @mysql_num_rows($result);
   if ($num_cats ==0)
      return false;
   $result = mysql_result($result, 0, "catname");
   return $result;
}
function get_subcatname_by_shopid($shopid)
{
   // Petición a la base de datos del nombre de una subcategoría con el shopid
   $conn = db_connect();
   $query = "select subcatname
             from shops, subcategories
             where shops.shopid=$shopid and shops.subcatid = subcategories.subcatid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_cats = @mysql_num_rows($result);
   if ($num_cats ==0)
      return false;
   $result = mysql_result($result, 0, "subcatname");
   return $result;
}
function get_shopname_by_isbn($isbn)
{
   // Petición a la base de datos del nombre de un establecimiento con el itemid
   $conn = db_connect();
   $query = "select shopname
             from shops, books
             where books.isbn=$isbn and shops.shopid = books.shopid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_cats = @mysql_num_rows($result);
   if ($num_cats ==0)
      return false;
   $result = mysql_result($result, 0, "shopname");
   return $result;
}
function get_category_imagenloc($catid)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select imagenloc
             from categories
             where catid = $catid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_cats = @mysql_num_rows($result);
   if ($num_cats ==0)
      return false;
   $result = mysql_result($result, 0, "imagenloc");
   return $result;
}
function get_empresas()
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select *
             from empresas";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_empresas = @mysql_num_rows($result);
   if ($num_empresas ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}

function get_all_subcategories()
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select subcatid, subcatname
             from subcategories";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_subcats = @mysql_num_rows($result);
   if ($num_subcats ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}

function get_subcategories($catid)
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select subcatid, subcatname, catid
             from subcategories where catid=$catid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_subcats = @mysql_num_rows($result);
   if ($num_subcats ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_subcategory_todo($subcatid)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select subcatid, subcatname, catid
             from subcategories
             where subcatid=$subcatid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_subcats = @mysql_num_rows($result);
   if ($num_subcats ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;

   
}
function get_subcategory_name($subcatid)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select subcatname
             from subcategories
             where subcatid=$subcatid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_subcats = @mysql_num_rows($result);
   if ($num_subcats ==0)
      return false;
   $result = mysql_result($result, 0, "subcatname");
   return $result;
}
function get_all_shops()
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select shopid, shopname
             from shops";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_shops = @mysql_num_rows($result);
   if ($num_shops ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_shops($subcatid)
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
	 
	
	$query = "SELECT *
FROM shops, members, contacto_member WHERE 
 shops.shopid = members.shopid and contacto_member.shopid=shops.shopid and 
members.alta='s' and shops.subcatid =$subcatid
ORDER BY shops.shopid";
	
	
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_shops = @mysql_num_rows($result);
   if ($num_shops ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}

function get_shops_ofertas()
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select * from books,shops
             where  books.shopid=shops.shopid ";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_shops = @mysql_num_rows($result);
   if ($num_shops ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_shops_email()
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select emailAddress from members,shops
             where  members.shopid=shops.shopid ";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_shops = @mysql_num_rows($result);
   if ($num_shops ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_shop_name($shopid)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select shopname
             from shops
             where shopid=$shopid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_subcats = @mysql_num_rows($result);
   if ($num_subcats ==0)
      return false;
   $result = mysql_result($result, 0, "shopname");
   return $result;
}
function get_shop_address($shopid)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select address
             from shops
             where shopid=$shopid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_subcats = @mysql_num_rows($result);
   if ($num_subcats ==0)
      return false;
   $result = mysql_result($result, 0, "address");
   return $result;
}
function get_shop_zip($shopid)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select zip
             from shops
             where shopid=$shopid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_subcats = @mysql_num_rows($result);
   if ($num_subcats ==0)
      return false;
   $result = mysql_result($result, 0, "zip");
   return $result;
}
function get_shop_todo($shopid)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select *
             from shops
             where shopid=$shopid";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_subcats = @mysql_num_rows($result);
   if ($num_subcats ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;

   
}

function get_books($shopid)
{
   // petición a la base de datos de los libros de una categoría
   if (!$shopid || $shopid=="")
     return false;

   $conn = db_connect();
   $query = "select * from books where shopid='$shopid'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_books = @mysql_num_rows($result);
   if ($num_books ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_all_ofertas()
{
   // petición a la base de datos de los libros de una categoría
     $conn = db_connect();
   $query = "select * from books ";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_books = @mysql_num_rows($result);
   if ($num_books ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_books_todo($isbn)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select * from books
             where isbn=$isbn";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_subcats = @mysql_num_rows($result);
   if ($num_subcats ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;

   
}
function get_book_name($isbn)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select title
             from books
             where isbn=$isbn";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_shops = @mysql_num_rows($result);
   if ($num_shops ==0)
      return false;
   $result = mysql_result($result, 0, "title");
   return $result;
}
function get_book_details($isbn)
{
  // Petición a la base de datos por todos los detalles de un libro particular
  if (!$isbn || $isbn=="")
     return false;

   $conn = db_connect();
   $query = "select * from books where isbn='$isbn'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $result = @mysql_fetch_array($result);
   return $result;
}

function calculate_price($cart)
{
  // suma total de los precios de todos los artículos en el carrito de compras
  $price = 0.0;
  if(is_array($cart))
  {
    $conn = db_connect();
    foreach($cart as $isbn => $qty)
    {
      $query = "select price from books where isbn='$isbn'";
      $result = mysql_query($query);
      if ($result)
      {
        $item_price = mysql_result($result, 0, "price");
        $price +=$item_price*$qty;
      }
    }
  }
  return $price;
}

function calculate_items($cart)
{
  // suma total de los artículos en el carrito de compras
  $items = 0;
  if(is_array($cart))
  {
    foreach($cart as $isbn => $qty)
    {
      $items += $qty;
    }
  }
  return $items;
}
function Ruta_noticias($sitio) {

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if(preg_match($sitio,$url)) {echo 'noticias/'; }
} 
function Ruta_tiendas($sitio) {

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if(preg_match($sitio,$url)) {echo 'tiendas/'; }
} 
function Menu($sitio) {

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if(preg_match($sitio,$url)) {echo 'class="seleccionado"'; }
} 

function get_shops_subcatname($subcatname)
{
   // Petición a la base de datos de una lista de tiendas
   $conn = db_connect();
	 
	
	$query = "SELECT *
FROM subcategories, shops, members, contacto_member WHERE subcategories.subcatid=shops.subcatid and 
 shops.shopid = members.shopid and contacto_member.shopid=shops.shopid and 
members.alta='s' and subcategories.subcatname = '$subcatname'
ORDER BY shops.shopid";
	
	
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_shops = @mysql_num_rows($result);
   if ($num_shops ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_shops_zip($zip)
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
	 
	
	$query = "SELECT *
FROM subcategories, shops, members, contacto_member WHERE subcategories.subcatid=shops.subcatid and 
 shops.shopid = members.shopid and contacto_member.shopid=shops.shopid and 
members.alta='s' and shops.zip = '$zip'
ORDER BY shops.shopid";
	
	
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_shops = @mysql_num_rows($result);
   if ($num_shops ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_shops_poralgo($algo)
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
	 
	
	$query = "SELECT *
FROM subcategories, shops, members, contacto_member WHERE (subcategories.subcatid=shops.subcatid and 
 shops.shopid = members.shopid and contacto_member.shopid=shops.shopid and 
members.alta='s') and (subcategories.subcatname like '%$algo%' or shops.shopname like '%$algo%')
ORDER BY shops.shopname";
	
	
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_shops = @mysql_num_rows($result);
   if ($num_shops ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}

function get_shops_shopname($shopname)
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
	 
	
	$query = "SELECT *
FROM subcategories, shops, members, contacto_member WHERE subcategories.subcatid=shops.subcatid and 
 shops.shopid = members.shopid and contacto_member.shopid=shops.shopid and 
members.alta='s' and shops.shopname like '%$shopname%'
ORDER BY shops.shopid";
	
	
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_shops = @mysql_num_rows($result);
   if ($num_shops ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_noticias()
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "SELECT id_noticia, titulo
FROM noticias
where fecha_public < NOW() and fecha_fin > now()
ORDER BY fecha DESC";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_noticias = @mysql_num_rows($result);
   if ($num_noticias ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
 function get_comentarios($id)
                {
                   $conn = db_connect();                
                    
                    $query = "SELECT *
                FROM comentarios, noticias WHERE 
                 noticias.id_noticia = comentarios.id and 
                comentarios.id =$id
                ORDER BY comentarios.id_comentario";                   
                    
                   $result = @mysql_query($query);
                   if (!$result)
                     return false;
                   $num_comentarios = @mysql_num_rows($result);
                   if ($num_comentarios ==0)
                      return false;
                   $result = db_result_to_array($result);
                   return $result;
                }
                
				function display_comentarios($comentario_array)
                {
                  if (!is_array($comentario_array))
                  {
                     echo "Actualmente no hay comentarios disponibles<br>";
                     return;
                  }
				  
                  foreach ($comentario_array as $row)
                  {
                          $nick = $row["nick"];
                          $id_comentario = $row["id_comentario"];
                
                         $url = "show_comentario.php?id_comentario=".($row["id_comentario"]);
						 
				
						 
					echo '<dl style="float:right; width:550px">';
                   	echo '<div><dt><a  style="font-weight:bold" href="'. $url. '">'.$nick.'</a></dt></div>';
					echo '<div style="float:right;width:350px">';		
					echo '<dd>Fecha: '.$row["fecha"].'</dd><dd>Tipo usuario: '.$row["tipo"].'</dd><dd>Publicado: '.$row["publicacion"].'</dd><dd>Comentario: <br/>'.$row["comentario"].'</dd></div>';
					echo '</dl>';
                
                 }
                 
                }
				
function get_provincias_todo($RE_Prov)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select *
             from provincias
             where id=$RE_Prov";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_provincias = @mysql_num_rows($result);
   if ($num_provincias ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;   
}
function get_municipios_todo($RE_pobla)
{
   // Petición a la base de datos del nombre de una categoría id
   $conn = db_connect();
   $query = "select *
             from municipios
             where id=$RE_pobla ";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_provincias = @mysql_num_rows($result);
   if ($num_provincias ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;   
}

function get_provincias()
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select *
             from provincias";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_prov = @mysql_num_rows($result);
   if ($num_prov ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_municipios($RE_Prov)
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select *
             from municipios where idprovincia='$RE_Prov'";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_prov = @mysql_num_rows($result);
   if ($num_prov ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_todos_municipios()
{
   // Petición a la base de datos de una lista de categorías
   $conn = db_connect();
   $query = "select *
             from municipios ";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_prov = @mysql_num_rows($result);
   if ($num_prov ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}
function get_idnoticia($id_comentario)
                {
                   $conn = db_connect();                
                    
                    $query = "SELECT id
                FROM comentarios WHERE 
                 id_comentario =$id_comentario";                   
                    
                   $result = @mysql_query($query);
                   if (!$result)
                     return false;
                   $num_comentarios = @mysql_num_rows($result);
                   if ($num_comentarios ==0)
                      return false;
                   $result = db_result_to_array($result);
                   return $result[0][0];
                }
?>