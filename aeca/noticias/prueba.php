<?php
require_once("../admin/book_sc_fns.php");
$id_comentario=64;
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
                
echo $id=get_idnoticia($id_comentario);
?>