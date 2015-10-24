<?php

require_once ("../modelos/modelo.php");
class Eventos{

	public $model;  
	public function __construct()    
         {    
              $this->model = new Model();  
         }  
	public function insertarEvento($nombre,$fechayhorainicial,$fechayhorafinal,$descripcion,$categoria,$imagennombre,$institucionid){


	try {
	$this->model->insertarEvento($nombre,date("Y-m-d h:m:s", strtotime($fechayhorainicial)),date("Y-m-d h:m:s", strtotime($fechayhorafinal)),$descripcion,$categoria,$imagennombre,$institucionid);
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

	public function eventosPresentes(){
		date_default_timezone_set('America/Los_Angeles');
		$FechaHora = new DateTime();

		$result=$this->model->eventosPresentes($FechaHora); //usar la funcion designada

		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}

	public function eventosPasados(){
		date_default_timezone_set('America/Los_Angeles');
		$FechaHora = new DateTime();

		$result=$this->model->eventosPasados($FechaHora); //usar la funcion designada

		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}

	public function eventosFuturos(){
		date_default_timezone_set('America/Los_Angeles');
		$FechaHora = new DateTime();

		$result=$this->model->eventosFuturos($FechaHora); //usar la funcion designada

		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}
	public function eventosTodos(){
		$result=$this->model->todosLosEventos(); //usar la funcion designada
		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}
	public function eventos_X_InstitucionID($InstitucionID){
		$result=$this->model->eventos_X_InstitucionID($InstitucionID); //usar la funcion designada
  		$encode = array();

  		while($row = mysqli_fetch_assoc($result)) {
    	 $encode[] = $row;
  		}

  		echo json_encode($encode); 
	}
	public function eventos_X_CategoriasID($CategoriasID){
		$result=$this->model->eventos_X_CategoriasID($CategoriasID); //usar la funcion designada
  		$encode = array();

  		while($row = mysqli_fetch_assoc($result)) {
     	$encode[] = $row;
  		}

  		echo json_encode($encode); 
	}

}
?>