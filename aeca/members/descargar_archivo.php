<?php
 require("dbconnect.inc.php");
$id=$_GET['id'];
 $qry = "SELECT tipo, contenido FROM archivos WHERE id=$id";
 $res = mysql_query($qry);
 $tipo = mysql_result($res, 0, "tipo");
 $contenido = mysql_result($res, 0, "contenido");

 header("Content-type: $tipo");
 print $contenido; 

?>