<?php
require_once("../modelos/Modelo.php");
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
		setcookie("institucionid",$array_usuario["id"],time()+3600,"/","");
		setcookie("usuario",$array_usuario["usuario"],time()+3600,"/","");
		setcookie("password",$array_usuario["password"],time()+3600,"/","");
		setcookie("nombre",$array_usuario["nombre"],time()+3600,"/","");
		setcookie("imagen",$array_usuario["imagen"],time()+3600,"/","");
	}
	else{
	$bandera=0;
	}
	return $bandera;
	}
}
?>