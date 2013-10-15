<?
require_once( "common.inc.php" );

$link=Conectarse();

$query= mysql_query ("SELECT * FROM municipios where idprovincia='".$_POST["idprovincia"]."' order by municipio asc",$link);
$array=mysql_fetch_assoc($query);
$num=mysql_num_rows($query);
if($num){
	do{
		if($_POST["id"]==$array['id']){
	
			$true=" selected='selected'";
		}
		else{
			$true="";}
		
		echo "<option value='".$array['id']."' $true>".$array['municipio']."</option>";

		}
		while($array=mysql_fetch_assoc($query));
	}
else{
		echo "<option value=''>-seleccionar provincia-</option>";
	}
	mysql_close($link);
?>
