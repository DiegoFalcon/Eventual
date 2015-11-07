<?php

	require_once ("claseComentarios.php");
	$comentarios = new Comentarios();

	if (isset($_GET['EventosID'])){
		$EventosID = $_GET['EventosID'];
		$comentarios->getComentariosJSON($EventosID);
	}

	

?>