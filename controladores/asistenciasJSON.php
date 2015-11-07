<?php
	require_once ("claseAsistencias.php");
	$asistencias = new Asistencias();

	if (isset($_GET["EventoID"]) && isset($_GET["UsuarioID"]))  
	{
		$EventoID = $_GET['EventoID'];
		$UsuarioID = $_GET["UsuarioID"];
		$asistencias->getAsistenciasJSON($EventoID,$UsuarioID);
    }

?>
