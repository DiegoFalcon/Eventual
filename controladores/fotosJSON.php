<?php

	require_once ("claseFotos.php");
	$fotos = new Fotos();

	if (isset($_GET['EventosID'])){
		$EventosID = $_GET['EventosID'];
		$fotos->getFotosJSON($EventosID);
	}

	

?>