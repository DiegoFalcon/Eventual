<?php
require_once ("claseEventos.php");
	$accion = $_REQUEST['accion'];
	switch($accion){
		case "refrescarTodosLosEventos":
			refrescarTodosLosEventos();
			break;
		case "getCategorias":
			getCategorias();
			break;
		case "nuevoEvento":
			nuevoEvento();
			break;
		case "eliminarEvento":
			eliminarEvento();
			break;
		case "getEvento":
			getEvento();
			break;
		case "editarEvento":
			editarEvento();
			break;
		case "cantidadesEventos":
			cantidadesEventos();
		break;
	}
	
	
	function refrescarTodosLosEventos(){
		 $model = new Model(); 
		$result=$model->eventos_X_InstitucionID($_COOKIE['institucionid']); //usar la funcion designada
		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
			$row["FechaHoraInicial"] = formatearFechaWeb($row["FechaHoraInicial"]);
			$row["FechaHoraFinal"] = formatearFechaWeb($row["FechaHoraFinal"]);
		   $encode["Items"][] = $row;
		}

		echo json_encode($encode); 
	}
	function formatearFechaWeb($fecha){
		date_default_timezone_set('America/Los_Angeles');
		$formato = date("m/d/Y H:i", strtotime($fecha));
		return $formato;
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
		$formatoFecha = formatoFecha($dia, $mes, $ano);
		$horaMinutos = date('g:i A', strtotime($fecha));
		$hora = date('g', strtotime($fecha));
		if($hora==1)
		$resultado = $formatoFecha." a la ".$horaMinutos.".";
		else
		$resultado = $formatoFecha." a las ".$horaMinutos.".";
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
	function getCategorias(){

		 $model = new Model(); 
		$result=$model->getCategorias(); //usar la funcion designada
		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
		   $encode["Items"][] = $row;
		}

		echo json_encode($encode); 

	}
	
	function nuevoEvento(){

	$target_path="../vistas/imagenes/";
	//$_FILES['uploadedfile']['name']
	$nombreImagen= $_POST['nombre']._.generateRandomString(5).".jpg";
	$target_path=$target_path.$nombreImagen;

	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path) == false)
		echo "There was an error uploading the file, please try again.";


	 $eventos = new Eventos();
	 $resultado = $eventos->insertarEvento($_POST['nombre'],$_POST['fechayhorainicial'],$_POST['fechayhorafinal'],$_POST['descripcion'],$_POST['categoriaid'],$nombreImagen,$_COOKIE['institucionid']);
	 echo $resultado;
	}
	function editarEvento(){
		$target_path="../vistas/imagenes/";
		//$_FILES['uploadedfile']['name']
		$nombreImagen = "";
		if(basename($_FILES['uploadedfile']['name']) != ""){
		$nombreImagen= $_POST['nombre']._.generateRandomString(5).".jpg";
		$target_path=$target_path.$nombreImagen;

		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path) == false)
		echo "There was an error uploading the file, please try again.";
		}
		$eventos = new Eventos();
		$resultado = $eventos->editarEvento($_POST['nombre'],$_POST['fechayhorainicial'],$_POST['fechayhorafinal'],$_POST['descripcion'],$_POST['categoriaid'],$nombreImagen,$_COOKIE['institucionid'],$_POST['eventoid']);
		echo $resultado;
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
	function eliminarEvento(){
		$evento = new Eventos();
		$resultado = $evento->eliminarEvento($_POST['ID']);
		echo $resultado;
	}
	
	function getEvento(){
		 $model = new Model(); 
		$result=$model->getEvento_X_EventoID($_REQUEST['ID']); //usar la funcion designada
		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
			$row["FechaHoraInicial"] = formatearFechaWeb($row["FechaHoraInicial"]);
			$row["FechaHoraFinal"] = formatearFechaWeb($row["FechaHoraFinal"]);
		   $encode["Items"][] = $row;
		}

		echo json_encode($encode); 
	}
	function cantidadesEventos(){
		 $model = new Model(); 
		 date_default_timezone_set('America/Los_Angeles');
		$FechaHora = new DateTime();
		$result=$model->cantidadesEventos($FechaHora); //usar la funcion designada
		$encode = array();

		while($row = mysqli_fetch_assoc($result)) {
		   $encode["Items"][] = $row;
		}

		echo json_encode($encode); 
	}
	
	
?>