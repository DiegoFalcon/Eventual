<?php
	require_once ("../modelos/modelo.php");

	class Fotos{
		public $model;  
		public function __construct()    
         {    
              $this->model = new Model();  
         }  
         

		public function insertarFotosJSON($AsistenciasID, $nombreImagen){

			$result=$this->model->insertarFoto($AsistenciasID, $nombreImagen); //usar la funcion designada
	  		$encode = array();

	  		while($row = mysqli_fetch_assoc($result)) {
	    	 $encode[] = $row;
	  		}

	  		echo json_encode($encode); 
		}

		public function getFotosJSON($EventosID){
			$result=$this->model->getFotos($EventosID); //usar la funcion designada
	  		$encode = array();

	  		while($row = mysqli_fetch_assoc($result)) {
	  			$row["FechaHora"] = $this->formatearFecha($row["FechaHora"]);
	    	 $encode[] = $row;
	  		}

	  		echo json_encode($encode); 
		}
		public function Consecutivo(){
		$result=$this->model->ConsecutivoFotos(); //usar la funcion designada
  		$encode = array();
  		while($row = mysqli_fetch_assoc($result)) {
    	 $encode[] = $row;
  		}

  		return json_encode($encode); 
		}
		function formatearFecha($fechaComentario){
		date_default_timezone_set('America/Los_Angeles');
		//$dw = date('N jS \of F Y h:i:s A');
		// N = dia de la semana
		// n = mes del año
		// A = AM O PM
		// g = formato de horas sin ceros iniciales
		// Y = año
		// i = minutos
		$fechaActual = new DateTime();
		$fechaActualString = $fechaActual->format('Y-m-d H:i:s');
		$resultado = $this->diferenciaFecha($fechaComentario,$fechaActualString);
		return $resultado;
	}
	function diferenciaFecha($fechaPasada, $fechaActual){
		$diferencia = 0;
		$diferenciaString = "Hace ";
		$pluralSingular = "";

		$anoPasado = date('Y', strtotime($fechaPasada));
		$anoActual = date('Y', strtotime($fechaActual));
		$diferencia = $this->diferencia($anoPasado,$anoActual);
		if($diferencia!=0){
			if($diferencia > 1)
				$pluralSingular = "s";
			$diferenciaString .=$diferencia." año".$pluralSingular;
			return $diferenciaString;
		}

		$mesPasado = date('n', strtotime($fechaPasada));
		$mesActual = date('n', strtotime($fechaActual));
		$diferencia = $this->diferencia($mesPasado,$mesActual);
		if($diferencia!=0){
			if($diferencia > 1)
				$pluralSingular = "es";
			$diferenciaString .=$diferencia." mes".$pluralSingular;
			return $diferenciaString;
		}

		$diaPasado = date('j', strtotime($fechaPasada));
		$diaActual = date('j', strtotime($fechaActual));
		$diferencia = $this->diferencia($diaPasado,$diaActual);
		if($diferencia!=0){
			if($diferencia > 1)
				$pluralSingular = "s";
			$diferenciaString .=$diferencia." día".$pluralSingular;
			return $diferenciaString;
		}

		$horaPasada = date('H', strtotime($fechaPasada));
		$horaActual = date('H', strtotime($fechaActual));
		$diferencia = $this->diferencia($horaPasada,$horaActual);
		if($diferencia!=0){
			if($diferencia > 1)
				$pluralSingular = "s";
			$diferenciaString .=$diferencia." hora".$pluralSingular;
			return $diferenciaString;
		}

		$minutoPasado = date('i', strtotime($fechaPasada));
		$minutoActual = date('i', strtotime($fechaActual));
		$diferencia = $this->diferencia($minutoPasado,$minutoActual);
		if($diferencia!=0){
			if($diferencia > 1)
				$pluralSingular = "s";
			$diferenciaString .=$diferencia." minuto".$pluralSingular;
			return $diferenciaString;
		}

		$segundoPasado = date('s', strtotime($fechaPasada));
		$segundoActual = date('s', strtotime($fechaActual));
		$diferencia = $this->diferencia($segundoPasado,$segundoActual);
		if($diferencia!=0){
			if($diferencia > 1)
				$pluralSingular = "s";
			$diferenciaString .=$diferencia." segundo".$pluralSingular;
			return $diferenciaString;
		}

	}
	function diferencia($numero1, $numero2){
		$diferencia = abs($numero1 - $numero2);
		return $diferencia;
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