<?php

	require_once ("../modelos/modelo.php");

	class Institucion{
		
		public $model;  
		public function __construct()    
         {    
              $this->model = new Model();  
         }

		public function insertarInstitucion($usuario,$password,$nombre,$imagenruta){
			try {
				
				$this->model->insertarInstitucion($usuario,$password,$nombre,$imagenruta);
					$mensaje = "Creaste la institucion ".$nombre." con exito.";

					 echo '<div align="center">
				<META HTTP-EQUIV="refresh" content="1; URL=../index.php"/>
				<script type="text/javascript">alert("'.$mensaje.'")</script></div>';

				} catch (Exception $e) {
					$mensaje = "No se pudo crear la institucion ".$nombre.".";
				    echo '<div align="center">
				<META HTTP-EQUIV="refresh" content="3; URL=../index.php"/>
				 <script type="text/javascript">alert("'.$mensaje.'")</script></div>';
				}
				//usar la funcion designada
		}

		public function getInstituciones(){
			$result=$this->model->getInstituciones(); //usar la funcion designada
	  		$encode = array();

	  		while($row = mysqli_fetch_assoc($result)) {
	    	 $encode[] = $row;
	  		}

	  		echo json_encode($encode); 
		}
		public function editarInstitucion($nombre,$password,$imagennombre,$institucionid){

		$result = $this->model->editarInstitucion($nombre,$password,$imagennombre,$institucionid);
		echo $result;
		}

		function eliminarEvento($eventoid){
		$result = $this->model->eliminarEvento($eventoid);
		return $result;
		}
		public function Consecutivo(){
		$result=$this->model->ConsecutivoInstitucion(); //usar la funcion designada
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

		}
?>