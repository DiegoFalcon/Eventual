<?php
	require_once ("claseFotos.php");
	$fotos = new Fotos();

	if (isset($_POST["AsistenciasID"]) && isset($_POST["Foto"]))  
	{
		$AsistenciasID = $_POST['AsistenciasID'];
		$Foto = $_POST["Foto"];
		$binary=base64_decode($Foto);

    	header('Content-Type: bitmap; charset=utf-8');

    	$target_path="../vistas/imagenes/";

    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < 10; $i++) {
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}

        //obtener el consecutivo de las asistencias fotos
        $result = $fotos->Consecutivo();
        $jsondecode = json_decode($result,true);
        $consecutivoid = $jsondecode[0]["Consecutivo"];
        $consecutivoid++;

		$nombreImagen= "ASFTO".$consecutivoid.'_'.$randomString.".jpeg";
		$target_path=$target_path.$nombreImagen;
		
    	$file = fopen($target_path, 'wb');
    	fwrite($file, $binary);
    	fclose($file);


		$fotos->insertarFotosJSON($AsistenciasID,$nombreImagen);
    }


?>
