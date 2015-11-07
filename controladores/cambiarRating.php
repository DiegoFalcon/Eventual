<?php
	require_once ("claseAsistencias.php");
	$asistencias = new Asistencias();


	if (isset($_POST["AsistenciasID"]) && isset($_POST["Rating"])){
		$AsistenciasID = $_POST["AsistenciasID"];
		$Rating = $_POST["Rating"];
		$resultado = $asistencias->cambiarRatingJSON($AsistenciasID,$Rating);
	}
	
?>
