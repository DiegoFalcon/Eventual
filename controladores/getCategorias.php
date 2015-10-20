<?php

require_once ("../modelos/modelo.php");

$model = new Model(); // pedir usar el modelo

$int_count=0;

$result=$model->getCategorias(); //usar la funcion designada

//extraer los datos de la bd
while ($row = mysqli_fetch_row($result)){
$array_categorias[$int_count]["id"] = $row[0];
$array_categorias[$int_count]["nombre"] = $row[1];

$int_count++;
}
?>