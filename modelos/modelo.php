<?php
require_once("../modelos/connection.php");

class Model{

	//------FUNCION PARA LOGIN----
	public function login($user,$pass){
	$conn=new Connection();
	$query="";
	$result=NULL;
	$query = "SELECT * FROM institucion where Usuario='$user'";	
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
		$result=$conn->EjecutaQuery($query);
		
		while ($row = mysqli_fetch_row($result)){
			if($row[2]==$pass){
			$array_usuario["id"] = $row[0];
			$array_usuario["usuario"] = $row[1];
			$array_usuario["password"] = $row[2];
			$array_usuario["nombre"] = $row[3];
			$array_usuario["imagen"] = $row[4];

			}
		}
		if(!isset($array_usuario)){
		$array_usuario["usuario"] = -1;
			$array_usuario["password"] = -1;
			$array_usuario["nombre"] = -1;
			$array_usuario["imagen"] = -1;
		}
		
		return $array_usuario;
	}
	//------FUNCIONES PARA EVENTOS----
	public function eventosPresentes($FechaHoraCliente){
		$conn=new Connection();
		$query="";
		$result=NULL;
		$dt = $FechaHoraCliente->format('Y-m-d H:i:s');
		$query="select eventos.EventosID,eventos.Nombre As NombreEvento,eventos.FechaHoraInicial,eventos.FechaHoraFinal,eventos.Descripcion,eventos.Imagen,categorias.Nombre As NombreCategoria,institucion.Nombre As NombreInstitucion
			from eventos
			inner join categorias On categorias.CategoriasID = eventos.CategoriasID
			inner join institucion On institucion.InstitucionID = eventos.InstitucionID
			where FechaHoraInicial<='$dt' and FechaHoraFinal>='$dt'";
		$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function eventosPasados($FechaHoraCliente){
		$conn=new Connection();
		$query="";
		$result=NULL;
		$dt = $FechaHoraCliente->format('Y-m-d H:i:s');
		$query="select eventos.EventosID,eventos.Nombre As NombreEvento,eventos.FechaHoraInicial,eventos.FechaHoraFinal,eventos.Descripcion,eventos.Imagen,categorias.Nombre As NombreCategoria,institucion.Nombre As NombreInstitucion
			from eventos
			inner join categorias On categorias.CategoriasID = eventos.CategoriasID
			inner join institucion On institucion.InstitucionID = eventos.InstitucionID
			where FechaHoraInicial<='$dt' and FechaHoraFinal<='$dt'";
		$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function eventosFuturos($FechaHoraCliente){
		$conn=new Connection();
		$query="";
		$result=NULL;
		$dt = $FechaHoraCliente->format('Y-m-d H:i:s');
		$query="select eventos.EventosID,eventos.Nombre As NombreEvento,eventos.FechaHoraInicial,eventos.FechaHoraFinal,eventos.Descripcion,eventos.Imagen,categorias.Nombre As NombreCategoria,institucion.Nombre As NombreInstitucion
			from eventos
			inner join categorias On categorias.CategoriasID = eventos.CategoriasID
			inner join institucion On institucion.InstitucionID = eventos.InstitucionID
			where FechaHoraInicial>='$dt' and FechaHoraFinal>='$dt'";
		$result=$conn->EjecutaQuery($query);
	
	return $result;
	}

	public function eventos_X_InstitucionID($InstitucionID){
		$conn=new Connection();
		$query="";
		$result=NULL;
		$query="select eventos.EventosID,eventos.Nombre As NombreEvento,eventos.FechaHoraInicial,eventos.FechaHoraFinal,eventos.Descripcion,eventos.Imagen,categorias.Nombre As NombreCategoria,institucion.Nombre As NombreInstitucion
			from eventos
			inner join categorias On categorias.CategoriasID = eventos.CategoriasID
			inner join institucion On institucion.InstitucionID = eventos.InstitucionID
			where eventos.InstitucionID=$InstitucionID";
		$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function eventos_X_CategoriasID($CategoriasID){
		$conn=new Connection();
		$query="";
		$result=NULL;
		$query="select eventos.EventosID,eventos.Nombre As NombreEvento,eventos.FechaHoraInicial,eventos.FechaHoraFinal,eventos.Descripcion,eventos.Imagen,categorias.Nombre As NombreCategoria,institucion.Nombre As NombreInstitucion
			from eventos
			inner join categorias On categorias.CategoriasID = eventos.CategoriasID
			inner join institucion On institucion.InstitucionID = eventos.InstitucionID
			where eventos.CategoriasID=$CategoriasID";
		$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function insertarEvento($Nombre,$FechaHoraInicial,$FechaHoraFinal,$Descripcion,$CategoriasID,$imagennombre,$institucionid)
	{
	//Conexion a la base de datos
	$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query= "insert into eventos  (Nombre,FechaHoraInicial,FechaHoraFinal,Descripcion,CategoriasID,Imagen,InstitucionID) VALUES ('".$Nombre."','".$FechaHoraInicial."','".$FechaHoraFinal."','".$Descripcion."','".$CategoriasID."','".$imagennombre."','".$institucionid."')";
	
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
	public function insertarInstitucion($usuario,$password,$institucion,$imagenruta)
	{
	//Conexion a la base de datos
	$conn=new Connection();
	$query="";
	$result=NULL;
	
	//creamos el query
	$query= "INSERT INTO institucion  (Usuario,Password,Nombre,Imagen) VALUES ('".$usuario."','".$password."','".$institucion."','".$imagenruta."')";
	
	//llamamos el metodo EjecutarQuery de la clase Conexion, enviando la variable $query
	$result=$conn->EjecutaQuery($query);
	
	return $result;
	}
	public function getInstituciones()
	{
		$conn=new Connection();
	$query="";
	$result=NULL;
	
	$query="select * from institucion";
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
	
	
}
