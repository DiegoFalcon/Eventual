<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Eventos</title>
		<?php
if (!isset($_COOKIE["usuario"])){echo '<META HTTP-EQUIV="refresh" content="1; URL=../index.php"/>';}
      require_once("navBar.php");
    ?>

				<div class="container">
  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Institucion</h4>
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
							<div class="control-group" id="inputPasswordGroup">
								<label class="control-label" for="inputPassowrd">Password</label>
								<div class="controls">
									<input type="password" class="form-control" id="inputPassword" placeholder="Agrega un password">
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
						<button class="btn btn-primary" id="ModificarInstitucion">Guardar</button>
					</div>
			      </div>
			    </div>
			  </div>
			</div>
	</head>
	
	<body>

		<div class="container" style="margin-top:100px;">
			<div class="row">
				<div class="row"> 
					<blockquote class="pull-right">
						<h1>Eventual</h1>
						<small>Institucion</small>
					</blockquote>
				</div>
				<div class = "row"> 
				<div class="col-md-2">
				</div>
				<div class="col-md-10" id="alerta">
				</div>
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
			function cargarInstitucion(){
				var institucionid = <?php echo $_COOKIE["institucionid"];?>;
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "getInstitucion",ID: institucionid}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					var html = "";
					var htmlTituloInstitucion ="";
					var htmlCuerpoInstitucion ="";
					if(obj == "" || msg == "[]"){
						$("#tabla").html("");

						return;
					}
					var Rating = 0; 
				  for(var i=0;i<obj.Items.length;i++){
				  	if(obj.Items[i].Rating!=null){
				  		Rating = obj.Items[i].Rating;
				  	}
				  	htmlTituloInstitucion+="<h1 >"+obj.Items[i].NombreInstitucion+"</h1>";
					

					htmlCuerpoInstitucion+="<p align='center'><img src='imagenes/"+obj.Items[i].Imagen+"' style='width: 280px; height: 200px; align:center;'  class='img-rounded'></p>";
					if(Rating!=0){
						htmlCuerpoInstitucion+="<p align='center'>";
					for(var j=0; j<Rating; j++)
						htmlCuerpoInstitucion+="<img src='imagenes/estrellaicono.jpg' style='width: 40px; height: 40px; align:center;'  class='img-rounded'>";
						htmlCuerpoInstitucion+="</p>";
					}
   			 		htmlCuerpoInstitucion+="<p style='align-text:right;'><img src='imagenes/eventoicon.png' style='width: 20px; height: 20px;'  class='img-rounded'> <b>Total de eventos:</b> "+obj.Items[i].TotalEventos+"</p>";

					htmlCuerpoInstitucion+="<p style='align-text:right;'><img src='imagenes/personaicono.png' style='width: 20px; height: 20px;'  class='img-rounded'> <b>Total de participantes:</b> "+obj.Items[i].TotalAsistencias+"</p>";

					htmlCuerpoInstitucion+="<p style='align-text:right;'><img src='imagenes/commenticono.png' style='width: 20px; height: 20px;'  class='img-rounded'> <b>Total de comentarios:</b> "+obj.Items[i].TotalComentarios+"</p>";
					htmlCuerpoInstitucion+="<p style='align-text:right;'><img src='imagenes/fotoicono.png' style='width: 20px; height: 20px;'  class='img-rounded'> <b>Total de fotos:</b> "+obj.Items[i].TotalFotos+"</p>";

					htmlCuerpoInstitucion+='<p align="right"><button type="button" id="ModificarInstitucion" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onClick="editarInstitucion('+obj.Items[i].InstitucionID+')">Modificar</button></p>';
				  }			 
				  $("#cuerpoEvento").html(htmlCuerpoInstitucion);
				  $("#tituloEvento").html(htmlTituloInstitucion);
				  
				});
			}
				function editarInstitucion(id){
				abrirForm();
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  data: { accion: "getInstitucion",ID:id}
				}).done(function( msg ) {
					var obj = eval("(" + msg + ')');
					
					var i = 0;
					$("#inputNombre").val(obj.Items[i].NombreInstitucion);
					$("#inputPassword").val(obj.Items[i].Pass);
					$("#uploadedfile").val("");
					$("#inputID").val(obj.Items[i].InstitucionID);
					$("#myModalLabel").html("Editar Institucion");
				});
				
				
				modificar = true;
			}
			function abrirForm(){
				$("#inputNombre").val("");
				$("#inputPassword").val("");
				$("#uploadedfile").val("");
				$("#inputID").val("");
				$("#alertaForm").html("");
				$("#myModalLabel").html("Editar Institucion");
				$("#inputNombreGroup").removeClass("error");
				$("#inputPasswordGroup").removeClass("error");
				$("#inputUploadedFileGroup").removeClass("error");

				modificar = false;
			}
			
			$(document).ready(function() {
				cargarInstitucion();
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
			
			function limpiarAlert(){
				$("#alerta").html("");
			}
				$("#ModificarInstitucion").click(function() {
				var error = false;

				if($("#inputNombre").val() == ""){
					$("#inputNombreGroup").addClass("error");
					error = true;
				}
				if($("#inputPassword").val() == ""){
					$("#inputPasswordGroup").addClass("error");
					error = true;
				}

				if(error){
					mostrarMensajeForm("Llenar todos los datos");
					return;
				}
				
				var action = "editarInstitucion";
				if(modificar){
					action = "editarInstitucion";
				}

				
				var file_data = $('#uploadedfile').prop('files')[0];   
    			var form_data = new FormData();  
    			form_data.append('accion',action);                
    			form_data.append('uploadedfile', file_data);
    			form_data.append('nombre',$("#inputNombre").val());
    			form_data.append('password',$("#inputPassword").val());
    			form_data.append('institucionid',$("#inputID").val());         
				$.ajax({
				  type: "POST",
				  url: "../controladores/peticiones.php",
				  contentType: false,
				  processData: false,
				  data: form_data,
				}).done(function( msg ) {
					
					mostrarMensaje("Se guardaron los cambios!");
					$("#cerrar").click();
					$('body').removeClass('modal-open');
					cargarInstitucion();
				});
			});
			
		</script>
	</body>
</html>