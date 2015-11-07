<?php

require_once("../modelos/modelo.php");
class Login{
	
	public $model;
	public function __construct(){

	$this->model=new Model();	
	}
	public function login($user,$pass)
	{

		$array_usuario= $this->model->Login($user,$pass);	
	
	//se tiene que validar el usuario y el password porque las tablas de MYSQL no son case sensitive
	if(($array_usuario["usuario"]==$user) && ($array_usuario["password"]==$pass))
	{
		$bandera=1;
		//echo "ENTRA AL LOGIN";
		//$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
		setcookie("institucionid",$array_usuario["id"],time()+3600,"/","");
		setcookie("usuario",$array_usuario["usuario"],time()+3600,"/","");
		setcookie("password",$array_usuario["password"],time()+3600,"/","");
		setcookie("nombre",$array_usuario["nombre"],time()+3600,"/","");
		setcookie("imagen",$array_usuario["imagen"],time()+3600,"/","");
		//echo "COOKIE USUARIO: ".$_COOKIE["usuario"]; 
		//echo "SESSION USUARIO: ".$_SESSION["usuario"];
		//echo $array_usuario["id"]."\n".$array_usuario["usuario"]."\n".$array_usuario["password"]."\n".$array_usuario["nombre"]."\n".$array_usuario["imagen"];
		//echo "USUARIO: ".$_SESSION["usuario"];
	}
	else{
	$bandera=0;
	}
	return $bandera;
	}
}
?>