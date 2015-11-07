<?php

require_once ("claseEventos.php");
$eventos = new Eventos();
if (isset($_GET['Filtro']))  
{
	
	$filtro = $_GET['Filtro'];
	switch($filtro){
		case "pasados":
			$eventos->eventosPasados();
		break;
		case "presentes":
			$eventos->eventosPresentes();
		break;
		case "futuros":
			$eventos->eventosFuturos();
		break;
		case "eventoid":
			if (isset($_GET['FiltroID'])) {
				$eventos->getEvento_X_EventoID(($_GET['FiltroID']));
			}
			else{
				$eventos->eventosTodos();
			}
		break;
		case "categorias":
			if (isset($_GET['FiltroID'])) {
				$eventos->eventos_X_CategoriasID(($_GET['FiltroID']));
			}
			else{
				$eventos->eventosTodos();
			}

		break;
		case "instituciones":
			if (isset($_GET['FiltroID']))  
				$eventos->eventos_X_InstitucionID(($_GET['FiltroID']));
			else
				$eventos->eventosTodos();
		break;

		case "asistire":
			if (isset($_GET['FiltroID']))  
				$eventos->eventos_X_UsuariosID(($_GET['FiltroID']));
			else
				$eventos->eventosTodos();
		break;
		default:
			$eventos->eventosTodos();
		break;
	}
	
}
else
{
	$eventos->eventosTodos();
}
?>
