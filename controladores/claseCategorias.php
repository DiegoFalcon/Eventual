<?php
	require_once ("../modelos/modelo.php");

	class Categorias{
		public $model;  
		public function __construct()    
         {    
              $this->model = new Model();  
         }  
		public function getCategorias(){
			$int_count=0;

			$result=$this->model->getCategorias(); //usar la funcion designada

			//extraer los datos de la bd
			while ($row = mysqli_fetch_row($result)){
			$array_categorias[$int_count]["id"] = $row[0];
			$array_categorias[$int_count]["nombre"] = $row[1];

			$int_count++;
			}
			return $array_categorias;
		}
		public function getCategoriasJSON(){
			$result=$this->model->getCategorias(); //usar la funcion designada
	  		$encode = array();

	  		while($row = mysqli_fetch_assoc($result)) {
	    	 $encode[] = $row;
	  		}

	  		echo json_encode($encode); 
		}
		public function getCategorias_X_UsuarioID($UsuarioID){
			$model = new Model(); // pedir usar el modelo
			$int_count=0;

			$result=$this->model->getCategorias_X_UsuarioID($UsuarioID); //usar la funcion designada

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
		public function Consecutivo(){
		$result=$this->model->ConsecutivoCategorias(); //usar la funcion designada
  		$encode = array();
  		while($row = mysqli_fetch_assoc($result)) {
    	 $encode[] = $row;
  		}

  		return json_encode($encode); 
		}
  		 function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
		}
		public function insertarCategoria($nombre,$imagenruta){
			try {
				$this->model = new Model(); // pedir usar el modelo
				$this->model->insertarCategoria($nombre,$imagenruta);
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