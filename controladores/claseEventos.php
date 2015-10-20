<?php

require_once ("../modelos/modelo.php");
class Eventos{

	public function insertarEvento($nombre,$fechayhorainicial,$fechayhorafinal,$descripcion,$categoria,$imagennombre){
		$model = new Model(); // pedir usar el modelo


	try {
	$model->insertarEvento($nombre,date("Y-m-d h:m:s", strtotime($fechayhorainicial)),date("Y-m-d h:m:s", strtotime($fechayhorafinal)),$descripcion,$categoria,$imagennombre);
		$mensaje = "Se inserto el evento ".$nombre." con exito.";
					 echo '<div align="center">
				<META HTTP-EQUIV="refresh" content="1; URL=../index.php"/>
				<script type="text/javascript">alert("'.$mensaje.'")</script></div>';

				} catch (Exception $e) {
					$mensaje = "No se pudo insertar el evento ".$nombre.".";
				    echo '<div align="center">
				<META HTTP-EQUIV="refresh" content="3; URL=../index.php"/>
				 <script type="text/javascript">alert("'.$mensaje.'")</script></div>';

				}
	}


}
?>