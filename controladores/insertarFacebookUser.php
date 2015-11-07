<?php
	require_once ("claseUsuarios.php");
	$usuarios = new Usuarios();


	if (isset($_POST["FBID"])){
		$FBID = $_POST["FBID"];
		$resultado = $usuarios->insertarUsuarioJSON($FBID);
	} 
	
	
?>


