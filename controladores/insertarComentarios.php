<?php
	require_once ("claseComentarios.php");
	$comentarios = new Comentarios();

	if (isset($_POST["AsistenciasID"]) && isset($_POST["Comentario"]))  
	{
		$AsistenciasID = $_POST['AsistenciasID'];
		$Comentario = $_POST["Comentario"];
		$comentarios->insertarComentarioJSON($AsistenciasID,$Comentario);
    }

?>
