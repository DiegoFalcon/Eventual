<?php
	require_once ("../modelos/modelo.php");

	class Asistencias{
		public $model;  
		public function __construct()    
         {    
              $this->model = new Model();  
         }  
         
		public function insertarAsistencia($UsuarioID,$EventoID){
			$resultado = "";

			try {
				$this->model = new Model(); // pedir usar el modelo
				$result=$this->model->insertarAsistencia($UsuarioID,$EventoID); 

				while ($row = mysqli_fetch_row($result)){
					$array_asistencias[$int_count]["AsistenciasID"] = $row[0];
					$array_asistencias[$int_count]["EventosID"] = $row[1];
					$array_asistencias[$int_count]["UsuariosID"] = $row[2];
					$array_asistencias[$int_count]["Calificacion"] = $row[3];

					$int_count++;
				}

				return $array_asistencias;

				} catch (Exception $e) {
					$result = $e;
				}
				//usar la funcion designada
		}

		public function insertarAsistenciasJSON($UsuarioID,$EventoID){
			$result=$this->model->insertarAsistencia($UsuarioID,$EventoID); //usar la funcion designada
	  		$encode = array();

	  		while($row = mysqli_fetch_assoc($result)) {
	    	 $encode[] = $row;
	  		}

	  		echo json_encode($encode); 
		}

		public function eliminarAsistenciasJSON($UsuarioID,$EventoID){
			$result=$this->model->eliminarAsistencia($UsuarioID,$EventoID); //usar la funcion designada
	  		$encode = array();

	  		while($row = mysqli_fetch_assoc($result)) {
	    	 $encode[] = $row;
	  		}

	  		echo json_encode($encode); 
		}

		public function cambiarRatingJSON($AsistenciasID,$Rating){
			$result=$this->model->cambiarRating($AsistenciasID,$Rating); //usar la funcion designada
	  		$encode = array();

	  		while($row = mysqli_fetch_assoc($result)) {
	    	 $encode[] = $row;
	  		}

	  		echo json_encode($encode); 
		}


		public function getAsistenciasJSON($EventosID,$UsuariosID){
			$result=$this->model->getAsistencia_X_EventoID_UsuarioID($EventosID,$UsuariosID); //usar la funcion designada
	  		$encode = array();

	  		while($row = mysqli_fetch_assoc($result)) {
	    	 	$encode[] = $row;
	  		}

	  		echo json_encode($encode); 
		}


	}
?>