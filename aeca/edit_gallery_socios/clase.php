<?php
header('Content-Type: text/html; charset=utf-8'); 
?>
<?php
class Conexion  // se declara una clase para hacer la conexion con la base de datos
{
	var $con;
	function Conexion()
	{
		// se definen los datos del servidor de base de datos 
		/*$conection['server']="localhost";  //host
		$conection['user']="root";         //  usuario
		$conection['pass']="140573";             //password
		$conection['base']="mydatabase";           //base de datos
			*/
		
		$conection['server']="mysql7.000webhost.com";  //host
		$conection['user']="a5899716_silvia";         //  usuario
		$conection['pass']="160989london";             //password
		$conection['base']="a5899716_ddbb";           //base de datos
	
		
		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mysql_connect($conection['server'],$conection['user'],$conection['pass']);

		if ($conect) // si la conexion fue exitosa , selecciona la base
		{
			mysql_select_db($conection['base']);			
			$this->con=$conect;
			mysql_query("SET NAMES 'utf8'");

		}
	}
	function getConexion() // devuelve la conexion
	{
		return $this->con;
	}
	function Close()  // cierra la conexion
	{
		mysql_close($this->con);
	}	

}
class sQuery   // se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
{

	var $coneccion;
	var $consulta;
	var $resultados;
	function sQuery()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->coneccion= new Conexion();
	}
	function executeQuery($cons)  // metodo que ejecuta una consulta y la guarda en el atributo $pconsulta
	{
		$this->consulta= mysql_query($cons,$this->coneccion->getConexion());
		return $this->consulta;
	}	
	function getResults()   // retorna la consulta en forma de result.
	{return $this->consulta;}
	
	function Close()		// cierra la conexion
	{$this->coneccion->Close();}	
	
	function Clean() // libera la consulta
	{mysql_free_result($this->consulta);}
	
	function getResultados() // debuelve la cantidad de registros encontrados
	{return mysql_affected_rows($this->coneccion->getConexion()) ;}
	
	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysql_affected_rows($this->coneccion->getConexion()) ;}

    function fetchAll()
    {
        $rows=array();
		if ($this->consulta)
		{
			while($row=  mysql_fetch_array($this->consulta))
			{
				$rows[]=$row;
			}
		}
        return $rows;
    }
}




class Photo
{
	var $title;     //se declaran los atributos de la clase, que son los atributos del photo
	var $location;
	var $description;
	Var $publicar;
	Var $id;

    public static function getPhotos() 
		{
			$obj_photo=new sQuery();
			$obj_photo->executeQuery("select * from photos_socios order by id"); // ejecuta la consulta para traer al photo

			return $obj_photo->fetchAll(); // retorna todos los photos
		}

	function Photo($nro=0) // declara el constructor, si trae el numero de photo lo busca , si no, trae todos los photos
	{
		if ($nro!=0)
		{
			$obj_photo=new sQuery();
			$result=$obj_photo->executeQuery("select * from photos_socios where id = $nro"); // ejecuta la consulta para traer al photo 
			$row=mysql_fetch_array($result);
			$this->id=$row['id'];
			$this->title=$row['title']; //titulo
			$this->location=$row['location'];//localiz
			$this->description=$row['description'];//descrip
			$this->publicar=$row['publicar'];//public
		}
	}
		
		// metodos que devuelven valores
	function getID()
	 { return $this->id;}
	function getTitulo()
	 { return $this->title;}
	function getLocaliz()
	 { return $this->location;}
	function getDescrip()
	 { return $this->description;}
	function getPublic()
	 { return $this->publicar;}
	 
		// metodos que setean los valores
	function setTitulo($val)
	 { $this->title=$val;}
	function setLocaliz($val)
	 {  $this->location=$val;}
	function setDescrip($val)
	 {  $this->description=$val;}
	function setPublic($val)
	 {  $this->publicar=$val;}

    function save()
    {
        if($this->id)
        {$this->updatePhoto();}
        else
        {$this->insertPhoto();}
    }
	private function updatePhoto()	// actualiza el photo cargado en los atributos
	{
			$obj_photo=new sQuery();
			$query="update photos_socios set title='$this->title', location='$this->location',description='$this->description',publicar='$this->publicar' where id = $this->id";
			$obj_photo->executeQuery($query); // ejecuta la consulta para traer al photo 
			return $obj_photo->getAffect(); // retorna todos los registros afectados
	
	}
	private function insertPhoto()	// inserta el photo cargado en los atributos
	{
			$obj_photo=new sQuery();
			$query="insert into photos_socios( title, location, description,publicar)values('$this->title', '$this->location', '$this->description','$this->publicar')";
			
			$obj_photo->executeQuery($query); // ejecuta la consulta para traer al photo 
			return $obj_photo->getAffect(); // retorna todos los registros afectados
	
	}	
	function delete()	// elimina el photo
	{
			$obj_photo=new sQuery();
			$query="delete from photos_socios where id=$this->id";
			$obj_photo->executeQuery($query); // ejecuta la consulta para  borrar el photo
			return $obj_photo->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
function cleanString($string)
{
    $string=trim($string);
    $string=mysql_escape_string($string);
	//$string=htmlspecialchars($string);
    return $string;
}