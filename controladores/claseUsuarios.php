<?php
	require_once ("../modelos/modelo.php");

	class Usuarios{
		public $model;  
		public function __construct()    
         {    
              $this->model = new Model();  
         }  
         
		public function insertarUsuario($FacebookUserID){
			$resultado = "";

			try {
				$this->model = new Model(); // pedir usar el modelo
				$resultado = $this->model->insertarUsuario($FacebookUserID);

				while ($row = mysqli_fetch_row($resultado)){
					$array_usuarios[$int_count]["UserID"] = $row[0];
					$array_usuarios[$int_count]["FBID"] = $row[1];

					$int_count++;
				}

				return $array_usuarios;

				} catch (Exception $e) {
					$resultado = $e;
				}
				//usar la funcion designada
		}

		public function insertarUsuarioJSON($FacebookUserID,$FBName,$GCMID){
			$result=$this->model->insertarUsuario($FacebookUserID,$FBName,$GCMID); //usar la funcion designada
	  		$encode = array();

	  		while($row = mysqli_fetch_assoc($result)) {
	    	 $encode[] = $row;
	  		}

	  		echo json_encode($encode); 
		}

	}
?>