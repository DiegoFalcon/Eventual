<?php
	require_once ("../modelos/modelo.php");

	class Categorias{
		
		public function getCategorias(){
			$model = new Model(); // pedir usar el modelo
			$int_count=0;

			$result=$model->getCategorias(); //usar la funcion designada

			//extraer los datos de la bd
			while ($row = mysqli_fetch_row($result)){
			$array_categorias[$int_count]["id"] = $row[0];
			$array_categorias[$int_count]["nombre"] = $row[1];

			$int_count++;
			}
			return $array_categorias;
		}
		public function getCategorias_X_UsuarioID($UsuarioID){
			$model = new Model(); // pedir usar el modelo
			$int_count=0;

			$result=$model->getCategorias_X_UsuarioID($UsuarioID); //usar la funcion designada

			//extraer los datos de la bd
			while ($row = mysqli_fetch_row($result)){
			$array_categorias[$int_count]["id"] = $row[0];
			$array_categorias[$int_count]["nombre"] = $row[1];

			$int_count++;
			}

			if (!isset($array_categorias))
				return -1;
			else
				return $array_categorias;
		}
		public function insertarCategoria($nombre,$imagenruta,$usuarioid){
			try {
				$model = new Model(); // pedir usar el modelo
				$model->insertarCategoria($nombre,$imagenruta,$usuarioid);
					$mensaje = "Se inserto la categoria ".$nombre." con exito.";
					 echo '<div align="center">
				<META HTTP-EQUIV="refresh" content="1; URL=../index.php"/>
				<script type="text/javascript">alert("'.$mensaje.'")</script></div>';

				} catch (Exception $e) {
					$mensaje = "No se pudo insertar la categoria ".$nombre.".";
				    echo '<div align="center">
				<META HTTP-EQUIV="refresh" content="3; URL=../index.php"/>
				 <script type="text/javascript">alert("'.$mensaje.'")</script></div>';
				}
				//usar la funcion designada
		}

	}
?>