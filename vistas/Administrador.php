<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Eventos</title>
		<?php
if (!isset($_COOKIE["usuario"])){echo '<META HTTP-EQUIV="refresh" content="1; URL=../index.php"/>';}
      require_once("navBar.php");
    ?>

<style>
.Body{
background-color: #272727;

}
</style>
	</head>
	
	<body>

		<div class="container" style="margin-top:100px;">
			<div class="row">
				<div class="row"> 
					<blockquote class="pull-right">
						<h1>Eventual</h1>
						<small>Administrador de eventos</small>
					</blockquote>
				</div>
				<div class = "row"> 
					<div class="col-md-2">
					</div>
				<div class="col-md-10" id="alerta">
				</div>
				</div>
				<div class="row">
				<div class="col-md-2" align="left" style="margin-top:50px;" id="listaOpcionesEventos">
				</div>

					<div class="col-md-10">
					<table class="table table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nombre</th>
							<th>Fecha Inicio</th>
							<th>Fecha Final</th>
							<th>Descripcion</th>
							<th>Imagen</th>
							<th>Categoria</th>
							<th>Rating</th>
							<th>Accion</th>
						</tr>
					</thead >
						
					<tbody id="tabla">
					</tbody>
				</table>
				<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" id="AgregarEvento" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onClick="abrirForm()">Agregar Evento</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Eventos</h4>
        </div>
       <div class="modal-body">
						<form class="form-horizontal" enctype="multipart/form-data" id="myForm" method="POST">
							
							<div id="alertaForm"></div>
							
							<input type="hidden" id="inputID" />
							 
							<div class="control-group" id="inputNombreGroup">
								<label class="control-label" for="inputNombre">Nombre</label>
								<div class="controls">
									<input type="text" class="form-control" id="inputNombre" placeholder="Inserta el nombre">
								</div>
							</div>

          
        	  <label class="control-label" for="inputFechaHoraInicial">Fecha Hora Inicial</label>
           
            <div class='input-group date' id='fechayhorainicial'>
                <input type='text' class="form-control" id="inputFechaHoraInicial" name="fechayhorainicial" data-format="yyyy-MM-dd hh:mm:ss"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"  ></span>
                </span>
            </div>
            <label class="control-label" for="inputFechaHoraFinal">Fecha Hora Final</label>
           
            <div class='input-group date' id='fechayhorafinal'>
                <input type='text' class="form-control" id="inputFechaHoraFinal" name="fechayhorafinal" data-format="yyyy-MM-dd hh:mm:ss"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"  ></span>
                </span>
            </div>
       

							<div class="control-group" id="inputCategoriaGroup">
								<label class="control-label" for="Categoria">Categoria</label>
								<div class="controls">
									<select id="inputCategoria" class="form-control">
											
									</select>
								</div>
							</div>
							<div class="control-group" id="inputDescripcionGroup">
								<label class="control-label" for="inputDescripcion">Descripcion</label>
								<div class="controls">
									<input type="text" class="form-control" id="inputDescripcion" placeholder="Agrega una descripcion">
								</div>
							</div>
							<div class="control-group" id="inputUploadedFileGroup">
							   <label class="control-label" for="uploadedfile">Sube una imagen</label>
							   <div class="controls">
							   <input name="uploadedfile" id = "uploadedfile" type="file" class="form-control"/><br/>
							   </div>
							</div>
							
						</form>
					</div>
 					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true" id="cerrar">Close</button>
						<button class="btn btn-primary" id="AgregarEventoABaseDatos">Guardar</button>
					</div>
			      </div>
			    </div>
			  </div>
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
			refrescarTodosLosEventos();
			function refrescarTodosLosEventos(){
				
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "refrescarTodosLosEventos"}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					
					if(obj == "" || msg == "[]"){
						$("#tabla").html("");

						return;
					}
				  for(var i=0;i<obj.Items.length;i++){
				  	var Rating = 0;
				  	if(obj.Items[i].Rating!=null){Rating=obj.Items[i].Rating;}else{Rating="S/C";}
				  	html += "<tr>";
					html += "<td>" + (i+1) +"</td>";
					html += "<td><a href='Evento.php?EventosID="+obj.Items[i].EventosID+"'>"+obj.Items[i].NombreEvento+"</a></td>";
					html += "<td>" + obj.Items[i].FechaHoraInicial+"</td>";
					html += "<td>" + obj.Items[i].FechaHoraFinal +"</td>";
					html += "<td>" + obj.Items[i].Descripcion +"</td>";
					html += "<td><img src='../vistas/imagenes/" + obj.Items[i].Imagen +"'style='width: 180px; height: 100px; align:center;'  class='img-rounded'/></td>";
					html += "<td>" + obj.Items[i].NombreCategoria +"</td>";
					html += "<td>" + Rating +"</td>";
					html += "<td>";
					html +="<button class='btn btn-primary' type='button' onclick='editarEvento("+obj.Items[i].EventosID+")'>Editar</button><i class='icon-pencil icon-white'></i></button>";
					html +="<button class='btn btn-danger' type='button' onclick='preguntarEliminar("+obj.Items[i].EventosID+")'>Eliminar</button><i class='icon-trash icon-white'></i></button></td>";
					html += "</tr>";
				
				  }			 
				  $("#tabla").html(html);
				  refrescarTablaOpciones("Todos");
				});
			}
			function refrescarEventosPresentes(){
				
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "refrescarEventosPresentes"}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					
					if(obj == "" || msg == "[]"){
						$("#tabla").html("");

						return;
					}
				  for(var i=0;i<obj.Items.length;i++){
				  	var Rating = 0;
				  	if(obj.Items[i].Rating!=null){Rating=obj.Items[i].Rating;}else{Rating="S/C";}
				  	html += "<tr>";
					html += "<td>" + (i+1) +"</td>";
					html += "<td><a href='Evento.php?EventosID="+obj.Items[i].EventosID+"'>"+obj.Items[i].NombreEvento+"</a></td>";
					html += "<td>" + obj.Items[i].FechaHoraInicial+"</td>";
					html += "<td>" + obj.Items[i].FechaHoraFinal +"</td>";
					html += "<td>" + obj.Items[i].Descripcion +"</td>";
					html += "<td><img src='../vistas/imagenes/" + obj.Items[i].Imagen +"'style='width: 180px; height: 100px; align:center;'  class='img-rounded'/></td>";
					html += "<td>" + obj.Items[i].NombreCategoria +"</td>";
					html += "<td>" + Rating +"</td>";
					html += "<td>";
					html +="<button class='btn btn-primary' type='button' onclick='editarEvento("+obj.Items[i].EventosID+")'>Editar</button><i class='icon-pencil icon-white'></i></button>";
					html +="<button class='btn btn-danger' type='button' onclick='preguntarEliminar("+obj.Items[i].EventosID+")'>Eliminar</button><i class='icon-trash icon-white'></i></button></td>";
					html += "</tr>";
				
				  }			 
				  $("#tabla").html(html);
				  refrescarTablaOpciones("Presentes");
				});
			}
			function refrescarEventosPasados(){
				
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "refrescarEventosPasados"}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					
					if(obj == "" || msg == "[]"){
						$("#tabla").html("");

						return;
					}
				  for(var i=0;i<obj.Items.length;i++){
				  	var Rating = 0;
				  	if(obj.Items[i].Rating!=null){Rating=obj.Items[i].Rating;}else{Rating="S/C";}
				  	html += "<tr>";
					html += "<td>" + (i+1) +"</td>";
					html += "<td><a href='Evento.php?EventosID="+obj.Items[i].EventosID+"'>"+obj.Items[i].NombreEvento+"</a></td>";
					html += "<td>" + obj.Items[i].FechaHoraInicial+"</td>";
					html += "<td>" + obj.Items[i].FechaHoraFinal +"</td>";
					html += "<td>" + obj.Items[i].Descripcion +"</td>";
					html += "<td><img src='../vistas/imagenes/" + obj.Items[i].Imagen +"'style='width: 180px; height: 100px; align:center;'  class='img-rounded'/></td>";
					html += "<td>" + obj.Items[i].NombreCategoria +"</td>";
					html += "<td>" + Rating +"</td>";
					html += "<td>";
					html +="<button class='btn btn-primary' type='button' onclick='editarEvento("+obj.Items[i].EventosID+")'>Editar</button><i class='icon-pencil icon-white'></i></button>";
					html +="<button class='btn btn-danger' type='button' onclick='preguntarEliminar("+obj.Items[i].EventosID+")'>Eliminar</button><i class='icon-trash icon-white'></i></button></td>";
					html += "</tr>";
				
				  }			 
				  $("#tabla").html(html);
				  refrescarTablaOpciones("Pasados");
				});
			}
			function refrescarEventosFuturos(){
				
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "refrescarEventosFuturos"}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					
					if(obj == "" || msg == "[]"){
						$("#tabla").html("");

						return;
					}
				  for(var i=0;i<obj.Items.length;i++){
				  	var Rating = 0;
				  	if(obj.Items[i].Rating!=null){Rating=obj.Items[i].Rating;}else{Rating="S/C";}
				  	html += "<tr>";
					html += "<td>" + (i+1) +"</td>";
					html += "<td><a href='Evento.php?EventosID="+obj.Items[i].EventosID+"'>"+obj.Items[i].NombreEvento+"</a></td>";
					html += "<td>" + obj.Items[i].FechaHoraInicial+"</td>";
					html += "<td>" + obj.Items[i].FechaHoraFinal +"</td>";
					html += "<td>" + obj.Items[i].Descripcion +"</td>";
					html += "<td><img src='../vistas/imagenes/" + obj.Items[i].Imagen +"'style='width: 180px; height: 100px; align:center;'  class='img-rounded'/></td>";
					html += "<td>" + obj.Items[i].NombreCategoria +"</td>";
					html += "<td>" + Rating +"</td>";
					html += "<td>";
					html +="<button class='btn btn-primary' type='button' onclick='editarEvento("+obj.Items[i].EventosID+")'>Editar</button><i class='icon-pencil icon-white'></i></button>";
					html +="<button class='btn btn-danger' type='button' onclick='preguntarEliminar("+obj.Items[i].EventosID+")'>Eliminar</button><i class='icon-trash icon-white'></i></button></td>";
					html += "</tr>";
				
				  }			 
				  $("#tabla").html(html);
				  refrescarTablaOpciones("Futuros");
				});
			}
			function refrescarTablaOpciones(opcion){
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "cantidadesEventos"}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					
					if(obj == "" || msg == "[]"){
						$("#listaOpcionesEventos").html("");

						return;
					}
				  for(var i=0;i<obj.Items.length;i++){
				  	if(opcion=="Todos")
					html+='<a href="#" class="list-group-item active" style="background:#AAA;" onclick="refrescarTodosLosEventos()"><span class="badge">'+obj.Items[i].Todos+'</span>Todos los Eventos</a>';
					else
					html+='<a href="#" class="list-group-item" style="color:#AAA;" onclick="refrescarTodosLosEventos()"> <span class="badge">'+obj.Items[i].Todos+'</span>Todos los Eventos</a>';
					if(opcion=="Presentes")
					html+='<a href="#" class="list-group-item active" style="background:#AAA;" onclick="refrescarEventosPresentes()">  <span class="badge">'+obj.Items[i].Presentes+'</span>Eventos Presentes</a>';
					else
					html+='<a href="#" class="list-group-item" style="color:#AAA;" onclick="refrescarEventosPresentes()"> <span class="badge">'+obj.Items[i].Presentes+'</span>Eventos Presentes</a>';
					if(opcion=="Pasados")
      				html+='<a href="#" class="list-group-item active" style="background:#AAA;" onclick="refrescarEventosPasados()"> <span class="badge">'+obj.Items[i].Pasados+'</span>Eventos Pasados</a>';
      				else	
        			html+='<a href="#" class="list-group-item" style="color:#AAA;" onclick="refrescarEventosPasados()"> <span class="badge">'+obj.Items[i].Pasados+'</span>Eventos Pasados</a>';
        			if(opcion=="Futuros")
        			html+='<a href="#" class="list-group-item active" style="background:#AAA;" onclick="refrescarEventosFuturos()"> <span class="badge">'+obj.Items[i].Futuros+'</span>Eventos Futuros</a>';
        			else
        			html+='<a href="#" class="list-group-item" style="color:#AAA;" onclick="refrescarEventosFuturos()"> <span class="badge">'+obj.Items[i].Futuros+'</span>Eventos Futuros</a>';
				  }
				   $("#listaOpcionesEventos").html(html);
				  });
			}
			function cargarCategorias(){
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "getCategorias"}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
				  for(var i=0;i<obj.Items.length;i++){
					html += "<option value='"+obj.Items[i].CategoriasID+"'>"+obj.Items[i].Nombre+"</option>";
				  }
				  
				  $("#inputCategoria").html(html);
				  
				});
			}
			function editarEvento(id){
				$("#AgregarEvento").click();
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "getEvento",ID:id}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					
					var i = 0;
				
					$("#inputNombre").val(obj.Items[i].NombreEvento);
					$("#inputFechaHoraInicial").val(obj.Items[i].FechaHoraInicial);
					$("#inputFechaHoraFinal").val(obj.Items[i].FechaHoraFinal);
					$("#inputCategoria").val(obj.Items[i].CategoriasID);
					$("#inputDescripcion").val(obj.Items[i].Descripcion);
					
					$("#uploadedfile").val("");

					$("#inputID").val(obj.Items[i].EventosID);
					$("#myModalLabel").html("Editar Evento");
				});
				
				
				modificar = true;
			}
			function eliminarEvento(id){
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "eliminarEvento",ID:id}
				}).done(function( msg ) {
					if(msg == "1"){
						mostrarMensaje("Evento Eliminado!");
					}else{
						mostrarMensaje("No se pudo eliminar el evento!");
					}
					refrescarTodosLosEventos();
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
				refrescarTodosLosEventos();
				cargarCategorias();
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
			function preguntarEliminar(id){
				var mensaje = "Seguro que quieres eliminar el evento?";
				var html = "<div class='alert alert-error'>";
				html += "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				html += "<h4>Eliminar evento</h4>";
				html += mensaje;
				html += "<p>"
				html += "<a class='btn btn-danger' href='#' onClick='eliminarEvento("+id+")'>Eliminar</a>";
				html += "<a class='btn' href='#' onclick='limpiarAlert()'>Close</a>";
				html += "</p>";
				html += "</div>";
				
				$("#alerta").html(html);
			}
			
			function limpiarAlert(){
				$("#alerta").html("");
			}
			
			$("#AgregarEventoABaseDatos").click(function() {
				var error = false;

				if($("#inputNombre").val() == ""){
					$("#inputNombreGroup").addClass("error");
					error = true;
				}
				if($("#inputFechaHoraInicial").val() == ""){
					$("#inputFechaHoraInicialGroup").addClass("error");
					error = true;
				}
				if($("#inputFechaHoraFinal").val() == ""){
					$("#inputFechaHoraFinalGroup").addClass("error");
					error = true;
				}
				if($("#inputCategoria").val() == ""){
					$("#inputCategoriaGroup").addClass("error");
					error = true;
				}
				if($("#inputDescripcion").val() == ""){
					$("#inputDescripcionGroup").addClass("error");
					error = true;
				}

				if(error){
					mostrarMensajeForm("Llenar todos los datos");
					return;
				}
				
				var action = "nuevoEvento";
				if(modificar){
					action = "editarEvento";
				}


				var file_data = $('#uploadedfile').prop('files')[0];   
    			var form_data = new FormData();  
    			form_data.append('accion',action);                
    			form_data.append('uploadedfile', file_data);
    			form_data.append('nombre',$("#inputNombre").val());
    			form_data.append('fechayhorainicial',$("#inputFechaHoraInicial").val());
    			form_data.append('fechayhorafinal',$("#inputFechaHoraFinal").val());
    			form_data.append('descripcion',$("#inputDescripcion").val());
    			form_data.append('categoriaid',$("#inputCategoria").val());
    			form_data.append('eventoid',$("#inputID").val());          
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  contentType: false,
				  processData: false,
				  data: form_data,
				}).done(function( msg ) {
					
					refrescarTodosLosEventos();
					mostrarMensaje("Se guardo el evento!");
					$("#cerrar").click();
					$('body').removeClass('modal-open');
				});
			});
		</script>
	</body>
</html>