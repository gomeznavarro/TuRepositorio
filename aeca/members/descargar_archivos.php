<?php
$conn = mysql_connect("localhost","root","140573");
mysql_select_db("profind");
$id=$_GET['id'];
 $qry = "SELECT tipo, contenido FROM tbl_cv WHERE id=$id";
 $res = mysql_query($qry);
 $tipo = mysql_result($res, 0, "tipo");
 $contenido = mysql_result($res, 0, "contenido");

 header("Content-type: $tipo");
 print $contenido; 

?>