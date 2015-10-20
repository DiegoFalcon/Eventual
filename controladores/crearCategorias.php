<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<?php

require_once ("../controladores/claseCategorias.php");

$target_path="../vistas/imagenes/";

$target_path=$target_path.basename($_FILES['uploadedfile']['name']);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path) == false)
	echo "There was an error uploading the file, please try again.";


$categorias = new Categorias(); // pedir usar el modelo

$categorias->insertarCategoria($_POST['nombre'],$_FILES['uploadedfile']['name'],$_COOKIE['usuarioid'])

?>