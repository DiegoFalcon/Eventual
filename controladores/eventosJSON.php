<?php


require_once ("../modelos/modelo.php");

$model = new Model(); // pedir usar el modelo

$int_count=0;

$result=$model->eventosSucediendo(); //usar la funcion designada

$encode = array();

while($row = mysqli_fetch_assoc($result)) {
   $encode[] = $row;
}

echo json_encode($encode); 

?>

