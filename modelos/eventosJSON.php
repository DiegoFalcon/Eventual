<?php

require_once ("../modelos/modelo.php");

$model = new Model(); // pedir usar el modelo

$int_count=0;

$result=$model->eventosSucediendo(); //usar la funcion designada

//extraer los datos de la bd
echo json_encode($result);

?>

