<?php
require_once("../modelos/connection.php");

class Model{
	public function login($user,$pass){
	$conn=new Connection();
	$query="";
	$result=NULL;
	$query = "SELECT * FROM usuarios where Usuario='$user'";	
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
		$result=$conn->EjecutaQuery($query);
		
		while ($row = mysqli_fetch_row($result)){
			if($row[2]==$pass){
			$array_usuario["id"] = $row[0];
			$array_usuario["usuario"] = $row[1];
			$array_usuario["password"] = $row[2];
			$array_usuario["institucion"] = $row[2];

			}
		}
		if(!isset($array_usuario)){
		$array_usuario["usuario"] = -1;
			$array_usuario["password"] = -1;
			$array_usuario["institucion"] = -1;
		}
		
		return $array_usuario;
	}
	
	public function nuevoEvento($Nombre,$FechaHora,$Descripcion,$CategoriasID)
	{
	//Conexion a la base de datos
	$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query= "insert into eventos  (Nombre,FechaHora,Descripcion,CategoriasID) VALUES ('".$Nombre."','".$FechaHora."','".$Descripcion."','".$CategoriasID."')";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function Eventos()
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	$query="select * from eventos";
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function modificarEvento($EventosID,$Nombre,$FechaHora,$Descripcion,$CategoriasID)
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query="UPDATE eventos SET Nombre='".$Nombre."', FechaHora='".$FechaHora."', Descripcion='".$Descripcion."', CategoriasID='".$CategoriasID."' where EventosID='$EventosID'";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;
		
	}
	public function eliminarEventos($EventosID)
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query

	$query= "DELETE FROM eventos WHERE EventosID='$EventosID'";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;	
	}
	
	public function nuevaCategoria($Nombre,$imagenruta)
	{
	//Conexion a la base de datos
	$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query= "insert into categorias  (Nombre,Imagen) VALUES ('".$Nombre."','".$imagenruta."')";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	
	public function Categorias()
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	$query="select * from categorias";
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}

public function eliminarCategoria($CategoriasID)
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query

	$query= "DELETE FROM categorias WHERE CategoriasID='$CategoriasID'";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;	
	}
	

	public function Informacion()
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	$query="select * from informacion";
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}

	public function modificarInformacion($quienes,$telefono,$ubicacion,$correo,$horario)
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query="UPDATE informacion SET quienesSomos='".$quienes."', telefono='".$telefono."', ubicacion='".$ubicacion."', correo='".$correo."', horario='".$horario."' where idinformacion='1'";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;
    }
		
	public function nuevaImagen($imagennombre,$imagenruta)
	{
	//Conexion a la base de datos
	$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query= "INSERT INTO imagenes  (imagennombre,imagenruta) VALUES ('".$imagennombre."','".$imagenruta."')";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function Imagenes()
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	$query="select * from imagenes";
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	
	public function eliminarImagen($id)
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query

	$query= "DELETE FROM imagenes WHERE id='$id'";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;	
	}
	
}
