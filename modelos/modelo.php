<?php
require_once("../modelos/connection.php");

class Model{

	//------FUNCION PARA LOGIN----
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
			$array_usuario["institucion"] = $row[3];

			}
		}
		if(!isset($array_usuario)){
		$array_usuario["usuario"] = -1;
			$array_usuario["password"] = -1;
			$array_usuario["institucion"] = -1;
		}
		
		return $array_usuario;
	}
	//------FUNCIONES PARA EVENTOS----
	public function eventosSucediendo(){
		$conn=new Connection();
		$query="";
		$result=NULL;
	
		$query="select * from eventos";
		$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function insertarEvento($Nombre,$FechaHoraInicial,$FechaHoraFinal,$Descripcion,$CategoriasID,$imagennombre)
	{
	//Conexion a la base de datos
	$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query= "insert into eventos  (Nombre,FechaHoraInicial,FechaHoraFinal,Descripcion,CategoriasID,Imagen) VALUES ('".$Nombre."','".$FechaHoraInicial."','".$FechaHoraFinal."','".$Descripcion."','".$CategoriasID."','".$imagennombre."')";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function todosLosEventos()
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
	

	//------FUNCIONES PARA CATEGORIAS----
	public function insertarCategoria($nombre,$imagenruta,$usuarioid)
	{
	//Conexion a la base de datos
	$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query= "insert into categorias  (Nombre,Imagen,UsuariosID) VALUES ('".$nombre."','".$imagenruta."','".$usuarioid."')";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function insertarUsuario($usuario,$password,$institucion)
	{
	//Conexion a la base de datos
	$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query= "INSERT INTO usuarios  (Usuario,Password,Institucion) VALUES ('".$usuario."','".$password."','".$institucion."')";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}

	public function getCategorias()
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	$query="select * from categorias";
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function getCategorias_X_UsuarioID($usuarioID)
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	$query="SELECT * FROM categorias WHERE UsuariosID ='$usuarioID'";
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
