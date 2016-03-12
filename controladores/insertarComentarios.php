<?php
	require_once ("claseComentarios.php");
	$comentarios = new Comentarios();

	if (isset($_POST["AsistenciasID"]) && isset($_POST["Comentario"]))  
	{
		$AsistenciasID = $_POST['AsistenciasID'];
		$Comentario = $_POST["Comentario"];
		$resultado = $comentarios->insertarComentarioJSON($AsistenciasID,$Comentario);
		echo $resultado;
    }
    else{
    	echo "nada pasa";
    }

?>
