<?php
	require_once ("claseUsuarios.php");
	$usuarios = new Usuarios();


	if (isset($_POST["FBID"]) && isset($_POST["FBName"]) && isset($_POST["GCMID"])){
		$FBID = $_POST["FBID"];
		$FBName = $_POST["FBName"];
		$GCMID = $_POST["GCMID"];
		$resultado = $usuarios->insertarUsuarioJSON($FBID,$FBName,$GCMID);
		echo $resultado;
	} 
	
	
?>


