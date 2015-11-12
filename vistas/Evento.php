<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Eventos</title>
		<?php
if (!isset($_COOKIE["usuario"])){echo '<META HTTP-EQUIV="refresh" content="1; URL=../index.php"/>';}
      require_once("navBar.php");
    ?>


	</head>
	
	<body>

		<div class="container" style="margin-top:100px;">
			<div class="row">
				<div class="row"> 
					<blockquote class="pull-right">
						<h1>Eventual</h1>
						<small>Evento</small>
					</blockquote>
				</div>
				
			<div class = "row">
			<div class="panel panel-default" align="center" style=" margin-left:150px; margin-right:150px;">
  			<div class="panel-heading" id="tituloEvento">
    		<h3  class="panel-title"></h3>
 			</div>
 			 <div class="panel-body" style="text-align:left;" id="cuerpoEvento">

 			 </div>
			</div>
			</div>
			<div class = "row"> 
				<div class="col-md-2">
				</div>
				<div class="col-md-10" id="alerta">
				</div>
			</div>
				<div class="row" name="ETQtabla">
				<div class="col-md-2" align="left" style="margin-top:50px;" id="listaOpcionesEventos">
				</div>

					<div class="col-md-10">
					<table class="table table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<th>Comentario/Foto</th>
							<th>Usuario</th>
							<th>Fecha Hora</th>
							<th>Accion</th>
						</tr>
					</thead >
						
					<tbody id="tabla">
					</tbody>
				</table>
				<div class="container">
					 <a type="button" id="Regresar"  href="Administrador.php">Regresar</button>
			</div>
			</div>
			</div>
			</div>
		</div>
		  
		 
	<script type="text/javascript">
    $(function () {
        $('#fechayhorainicial').datetimepicker({
          format: 'MM/DD/YYYY HH:mm',
        });
        $('#fechayhorafinal').datetimepicker({
          format: 'MM/DD/YYYY HH:mm',
            useCurrent: false //Important! See issue #1075
        });
        $("#fechayhorainicial").on("dp.change", function (e) {
            $('#fechayhorafinal').data("DateTimePicker").minDate(e.date);
        });
        $("#fechayhorafinal").on("dp.change", function (e) {
            $('#fechayhorainicial').data("DateTimePicker").maxDate(e.date);
        });
    });
</script> 
		<script>
			var modificar = false;
			function cargarEvento(){
				var eventoid = <?php echo $_GET["EventosID"];?>;
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "getEvento",ID: eventoid}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					var htmlTituloEvento ="";
					var htmlCuerpoEvento ="";
					if(obj == "" || msg == "[]"){
						$("#tabla").html("");

						return;
					}
					var Rating = 0; 
				  for(var i=0;i<obj.Items.length;i++){
				  	if(obj.Items[i].Rating!=null){
				  		Rating = obj.Items[i].Rating;
				  	}
				  	htmlTituloEvento+="<h1 >"+obj.Items[i].NombreEvento+"</h1>";
					htmlCuerpoEvento+="<p style='font-size:32px;'><img src='imagenes/categoriaicono.png' style='width: 20px; height: 20px;'  class='img-rounded'> <b>Categoria:</b> "+obj.Items[i].NombreCategoria+"</p>";
					htmlCuerpoEvento+="<p style='align-text:right;'><img src='imagenes/relojicono.jpg' style='width: 20px; height: 20px;'  class='img-rounded'> <b>Fecha Hora Inicial:</b> "+obj.Items[i].FechaHoraInicial+"</p>";
					htmlCuerpoEvento+="<p><img src='imagenes/relojicono.jpg' style='width: 20px; height: 20px;'  class='img-rounded'> <b>Fecha Hora Final:</b> "+obj.Items[i].FechaHoraFinal+"</p>";
					

					htmlCuerpoEvento+="<p align='center'><img src='imagenes/"+obj.Items[i].Imagen+"' style='width: 280px; height: 200px; align:center;'  class='img-rounded'></p>";
					if(Rating!=0){
						htmlCuerpoEvento+="<p align='center'>";
					for(var j=0; j<Rating; j++)
						htmlCuerpoEvento+="<img src='imagenes/estrellaicono.jpg' style='width: 40px; height: 40px; align:center;'  class='img-rounded'>";
						htmlCuerpoEvento+="</p>";
					}
   			 		htmlCuerpoEvento+="<p><img src='imagenes/descripcionicono.png' style='width: 20px; height: 20px;'  class='img-rounded'> <b>Descripcion:</b></p>";
   			 		htmlCuerpoEvento+="<p text-align='justify'>"+obj.Items[i].Descripcion+"</p>";
   			 		
				  }			 
				  $("#cuerpoEvento").html(htmlCuerpoEvento);
				  $("#tituloEvento").html(htmlTituloEvento);
				  cargarComentarios(eventoid);
				  refrescarTablaOpciones("Comentarios",eventoid);
				});
			}
			function cargarComentarios(eventoid){
				
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "cargarComentarios_X_EventoID",ID: eventoid}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					
					if(obj == "" || msg == "[]"){
						$("#tabla").html("");

						return;
					}
					
				  for(var i=0;i<obj.Items.length;i++){
				  	var comentario = 'comentario';
				  	html += "<tr>";
					html += "<td>" + (i+1) +"</td>";
					html += "<td>"+obj.Items[i].Comentario+"</td>";
					html += "<td>" + obj.Items[i].Nombre+"</td>";
					html += "<td>" + obj.Items[i].FechaHora +"</td>";
					html += "<td>";
					html +="<button class='btn btn-danger' type='button' onclick='preguntarEliminar("+eventoid+","+obj.Items[i].AsistenciasComentariosID+","+1+")'>Eliminar</button><i class='icon-trash icon-white'></i></button></td>";
					html += "</tr>";
				
				  }			 
				  $("#tabla").html(html);
				  refrescarTablaOpciones("Comentarios",eventoid);
				});
			}
			function cargarFotos(eventoid){
				
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "cargarFotos_X_EventoID",ID: eventoid}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					
					if(obj == "" || msg == "[]"){
						$("#tabla").html("");

						return;
					}
				  for(var i=0;i<obj.Items.length;i++){

				  	html += "<tr>";
					html += "<td>" + (i+1) +"</td>";
					html += "<td><p><img src='imagenes/"+obj.Items[i].Imagen+"' style='width: 140px; height: 80px;'  class='img-rounded'></p></td>";
					html += "<td>" + obj.Items[i].Nombre+"</td>";
					html += "<td>" + obj.Items[i].FechaHora +"</td>";
					html += "<td>";
					html +="<button class='btn btn-danger' type='button' onclick='preguntarEliminar("+eventoid+","+obj.Items[i].AsistenciasFotosID+","+2+")'>Eliminar</button><i class='icon-trash icon-white'></i></button></td>";
					html += "</tr>";
				
				  }			 
				  $("#tabla").html(html);
				  refrescarTablaOpciones("Fotos",eventoid);
				});
			}
			function refrescarTablaOpciones(opcion,eventoid){
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "cantidadesFotosComentarios", ID: eventoid}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					
					if(obj == "" || msg == "[]"){
						$("#listaOpcionesEventos").html("");

						return;
					}
					
				  for(var i=0;i<obj.Items.length;i++){
				  	if(opcion=="Comentarios")
					html+='<a href="#ETQtabla" class="list-group-item active" style="background:#AAA;" onclick="cargarComentarios('+eventoid+')"><span class="badge">'+obj.Items[i].Comentarios+'</span>Comentarios</a>';
					else
					html+='<a href="#ETQtabla" class="list-group-item" style="color:#AAA;" onclick="cargarComentarios('+eventoid+')"> <span class="badge">'+obj.Items[i].Comentarios+'</span>Comentarios</a>';
					if(opcion=="Fotos")
					html+='<a href="#ETQtabla" class="list-group-item active" style="background:#AAA;" onclick="cargarFotos('+eventoid+')">  <span class="badge">'+obj.Items[i].Fotos+'</span>Fotos</a>';
					else
					html+='<a href="#ETQtabla" class="list-group-item" style="color:#AAA;" onclick="cargarFotos('+eventoid+')"> <span class="badge">'+obj.Items[i].Fotos+'</span>Fotos</a>';
				  }
				   $("#listaOpcionesEventos").html(html);
				  });
			}

			function eliminarComentario(eventoid,asistenciascomentariosid){
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "eliminarComentario",ID:asistenciascomentariosid}
				}).done(function( msg ) {
					if(msg == "1"){
						mostrarMensaje("Comentario Eliminado!");
					}else{
						mostrarMensaje("No se pudo eliminar el comentario!");
					}
					cargarComentarios(eventoid);
				});
			}
			function eliminarFoto(eventoid,asistenciasfotosid){
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "eliminarFoto",ID:asistenciasfotosid}
				}).done(function( msg ) {
					if(msg == "1"){
						mostrarMensaje("Foto Eliminada!");
					}else{
						mostrarMensaje("No se pudo eliminar la foto!");
					}
					cargarFotos(eventoid);
				});
			}
			function abrirForm(){
				$("#inputNombre").val("");
				$("#inputDescripcion").val("");
				$("#inputCategoria").val("");
				$("#inputFechaHoraInicial").val("");
				$("#inputFechaHoraFinal").val("");
				$("#uploadedfile").val("");
				$("#inputID").val("");
				$("#alertaForm").html("");
				$("#myModalLabel").html("Nuevo Evento");
				$("#inputNombreGroup").removeClass("error");
				$("#inputCategoriaGroup").removeClass("error");
				$("#inputDescripcionGroup").removeClass("error");
				$("#inputFechaHoraInicialGroup").removeClass("error");
				$("#inputFechaHoraFinalGroup").removeClass("error");
				$("#inputUploadedFileGroup").removeClass("error");

				modificar = false;
			}
			
			$(document).ready(function() {
				cargarEvento();
			});
			
			function mostrarMensaje(mensaje){
				var html = "<div class='alert alert-info'>";
				html += "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				html += "<h4>Atencion!</h4>";
				html += mensaje;
				html += "</div>";
				
				$("#alerta").html(html);
			}
			function mostrarMensajeForm(mensaje){
				var html = "<div class='alert alert-error'>";
				html += "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				html += "<h4>Error!</h4>";
				html += mensaje;
				html += "</div>";
				
				$("#alertaForm").html(html);
			}
			function preguntarEliminar(eventoid,eliminarid,opcion){
				var mensaje = "Seguro que quieres eliminar el elemento?";
				var html = "<div class='alert alert-error'>";
				html += "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				html += "<h4>Eliminar Elemento</h4>";
				html += mensaje;
				html += "<p>"
				if(opcion==1)
				html += "<a class='btn btn-danger' href='#' onClick='eliminarComentario("+eventoid+","+eliminarid+")'>Eliminar</a>";
				if(opcion==2)
				html += "<a class='btn btn-danger' href='#' onClick='eliminarFoto("+eventoid+","+eliminarid+")'>Eliminar</a>";
				html += "<a class='btn' href='#' onclick='limpiarAlert()'>Close</a>";
				html += "</p>";
				html += "</div>";
				
				$("#alerta").html(html);
			}
			
			function limpiarAlert(){
				$("#alerta").html("");
			}
			
		</script>
	</body>
</html>