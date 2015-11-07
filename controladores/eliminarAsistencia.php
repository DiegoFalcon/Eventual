<?php
	require_once ("claseAsistencias.php");
	$asistencias = new Asistencias();


	if (isset($_POST["EventoID"]) && isset($_POST["UsuarioID"])){
		$UsuarioID = $_POST["UsuarioID"];
		$EventoID = $_POST["EventoID"];
		$resultado = $asistencias->eliminarAsistenciasJSON($UsuarioID,$EventoID);
	}
	
?>
