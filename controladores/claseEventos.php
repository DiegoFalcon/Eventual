<?php

require_once ("../modelos/modelo.php");
class Eventos{

	public $model;  
	public function __construct()    
         {    
              $this->model = new Model();  
         }  
	public function insertarEvento($nombre,$fechayhorainicial,$fechayhorafinal,$descripcion,$categoria,$imagennombre,$institucionid){


		$result = $this->model->insertarEvento($nombre,date("Y-m-d H:i", strtotime($fechayhorainicial)),date("Y-m-d H:i", strtotime($fechayhorafinal)),$descripcion,$categoria,$imagennombre,$institucionid);
		return $result;
		}
	public function editarEvento($nombre,$fechayhorainicial,$fechayhorafinal,$descripcion,$categoria,$imagennombre,$institucionid,$eventoid){


		$result = $this->model->editarEvento($nombre,date("Y-m-d H:i", strtotime($fechayhorainicial)),date("Y-m-d H:i", strtotime($fechayhorafinal)),$descripcion,$categoria,$imagennombre,$institucionid,$eventoid);
		return $result;
		}

		function eliminarEvento($eventoid){
		$result = $this->model->eliminarEvento($eventoid);
		return $result;
		}	
		
	public function eventosPresentes(){
		date_default_timezone_set('America/Los_Angeles');
		$FechaHora = new DateTime();

		$result=$this->model->eventosPresentes($FechaHora); //usar la funcion designada

		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
		   $row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		   $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}
	public function eventosPresentes_X_InstitucionID($institucionid){
		date_default_timezone_set('America/Los_Angeles');
		$FechaHora = new DateTime();
		
		$result=$this->model->eventosPresentes_X_InstitucionID($FechaHora,$institucionid); //usar la funcion designada

		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
		   $row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		   $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
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
			$row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		   $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}
	public function eventosPasados_X_InstitucionID($institucionid){
		date_default_timezone_set('America/Los_Angeles');
		$FechaHora = new DateTime();

		$result=$this->model->eventosPasados_X_InstitucionID($FechaHora,$institucionid); //usar la funcion designada

		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
			$row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		   $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
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
			$row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		   $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}
	public function eventosFuturos_X_InstitucionID($institucionid){
		date_default_timezone_set('America/Los_Angeles');
		$FechaHora = new DateTime();

		$result=$this->model->eventosFuturos_X_InstitucionID($FechaHora,$institucionid); //usar la funcion designada

		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
			$row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		   $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}
	public function eventosTodos(){
		$result=$this->model->todosLosEventos(); //usar la funcion designada
		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
		   $row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		   $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}
	public function getEvento_X_EventoID($EventosID){
		$result=$this->model->getEvento_X_EventoID($EventosID); //usar la funcion designada
		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
			 $row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		   $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
		   $encode[] = $row;
		}

		echo json_encode($encode); 
	}
	public function eventos_X_InstitucionID($InstitucionID){
		$result=$this->model->eventos_X_InstitucionID($InstitucionID); //usar la funcion designada
  		$encode = array();

  		while($row = mysqli_fetch_assoc($result)) {
  			 $row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		   $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
    	 $encode[] = $row;
  		}

  		echo json_encode($encode); 
	}
	public function eventos_X_CategoriasID($CategoriasID){
		$result=$this->model->eventos_X_CategoriasID($CategoriasID); //usar la funcion designada
  		$encode = array();

  		while($row = mysqli_fetch_assoc($result)) {
  		 $row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		 $row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
     	$encode[] = $row;
  		}

  		echo json_encode($encode); 
	}

	public function eventos_X_UsuariosID($UsuariosID){
		$result=$this->model->eventos_X_UsuariosID($UsuariosID); //usar la funcion designada
  		$encode = array();

  		while($row = mysqli_fetch_assoc($result)) {
  		 $row["FechaHoraInicial"] = $this->formatearFecha($row["FechaHoraInicial"]);
		$row["FechaHoraFinal"] = $this->formatearFecha($row["FechaHoraFinal"]);
     	$encode[] = $row;
  		}

  		echo json_encode($encode); 
	}
	function formatearFecha($fecha){
		date_default_timezone_set('America/Los_Angeles');
		//$dw = date('N jS \of F Y h:i:s A');
		// N = dia de la semana
		// n = mes del año
		// A = AM O PM
		// g = formato de horas sin ceros iniciales
		// Y = año
		// i = minutos
		$dia = date('N', strtotime($fecha));
		$mes = date('n', strtotime($fecha));
		$ano = date('Y', strtotime($fecha));
		$formatofecha = $this->formatoFecha($dia, $mes, $ano);
		$horaMinutos = date('g:i A', strtotime($fecha));
		$hora = date('g', strtotime($fecha));
		if($hora==1)
		$resultado = $formatofecha." a la ".$horaMinutos.".";
		else
		$resultado = $formatofecha." a las ".$horaMinutos.".";
		return $resultado;
	}
	function formatoFecha($dia, $mes, $ano)
	{
		$formato = "";
		$mesString = "";
		switch($mes){
			case 1:
			$mesString = "Enero";
			break;
			case 2:
			$mesString = "Febrero";
			break;
			case 3:
			$mesString = "Marzo";
			break;
			case 4:
			$mesString = "Abril";
			break;
			case 5:
			$mesString = "Mayo";
			break;
			case 6:
			$mesString = "Junio";
			break;
			case 7:
			$mesString = "Julio";
			break;
			case 8:
			$mesString = "Agosto";
			break;
			case 9:
			$mesString = "Septiembre";
			break;
			case 10:
			$mesString = "Octubre";
			break;
			case 11:
			$mesString = "Noviembre";
			break;
			case 12:
			$mesString = "Diciembre";
			break;
		}
		$formato = $dia." de ".$mesString." del ".$ano;
		return $formato;
	}

}
?>