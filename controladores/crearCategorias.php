<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<?php

require_once ("../controladores/claseCategorias.php");

$categorias = new Categorias(); // pedir usar el modelo
	$target_path="../vistas/imagenes/";
	$result = $categorias->Consecutivo();
	$jsondecode = json_decode($result,true);
	$consecutivoid = $jsondecode[0]["Consecutivo"];
	$consecutivoid++;
	$RandomString = $categorias->generateRandomString(5);
	$nombreImagen= "CAT".$consecutivoid."_".$RandomString.".jpg";
	$target_path=$target_path.$nombreImagen;

	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path) == false)
		echo "There was an error uploading the file, please try again.";


$categorias->insertarCategoria($_POST['nombre'],$nombreImagen)

?>