<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agregar evento</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="../vistas/js/moment.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker.css" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet">
        <script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <script src="../vistas/js/dropdown.js"></script>
        <script src="../vistas/js/popover.js"></script>
        <script src="../vistas/js/transition.js"></script>
         <script src="../vistas/js/collapse.js"></script>
<link rel="stylesheet" href="../style.css">

</head>

<body>
  <?php
   include_once("../controladores/claseCategorias.php");
   $categorias = new Categorias();
   $array_categorias = $categorias->getCategorias();
   ?>
  <div class="container" align="center">
  <div class="blog-header">
        <h1 class="blog-title">Eventos</h1>
      </div>
<div class="row" style="width:800px;">
  <div class="span4_offset4">
    <div class="well">
<form class="form-horizontal" role="form" action="../controladores/crearEventos.php" method="post" enctype="multipart/form-data">
   <div class="form-group" style="width:800px;">
      <label for="usuario" class="col-sm-2 control-label">Nombre del evento</label>
      <div class="col-sm-10" >
         <input type="text" class="form-control" id="usuario" name="nombre"
            placeholder="Ingresa el nombre del evento" >
      </div>
   </div>

        <div class="form-group" style="width:800px;">
          
           <label for="categoria" class="col-sm-2 control-label">Fecha y hora inicial</label>
           <div class='col-sm-10'>
            <div class='input-group date' id='fechayhorainicial'>
                <input type='text' class="form-control" name="fechayhorainicial" data-format="yyyy-MM-dd hh:mm:ss" />
                <span class="input-group-addon" >
                    <span class="glyphicon glyphicon-calendar" ></span>
                </span>
            </div>
        </div>
    </div>
        <div class="form-group" style="width:800px;">
          
           <label for="categoria" class="col-sm-2 control-label">Fecha y hora final</label>
           <div class='col-sm-10'>
            <div class='input-group date' id='fechayhorafinal'>
                <input type='text' class="form-control" name="fechayhorafinal" data-format="yyyy-MM-dd hh:mm:ss"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"  ></span>
                </span>
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

   <div class="form-group" style="width:800px;">
      <label for="categoria" class="col-sm-2 control-label">Categoria</label>
      <div class="col-sm-10" >
        <select class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="categoria" style="width:630px;">
          <?php 
          for ($i=0; $i < count($array_categorias); $i++) { 
            echo  '<option value='.$array_categorias[$i]["id"].'>'.$array_categorias[$i]["nombre"].'</option>';
          }
          ?>
          </select>
      </div>
   </div>
   <div class="form-group" style="width:800px;">
   <label for="uploaded file" class="col-sm-2 control-label">Sube una foto</label>
     <div class="col-sm-10" >
  <input name="uploadedfile" type="file" class="form-control"/><br/>
  </div>
</div>
    <div class="form-group" style="width:800px;">
      <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
      <div class="col-sm-10" >
         <input type="textfield" class="form-control" id="descripcion" name="descripcion"
            placeholder="Ingresa una descripción" >
      </div>
   </div>
   
</select>
  <div class="form-group" style="margin:50px;" align="right">
      <button type="submit" class="btn btn-success">Agregar evento</button>
      </div>
  </div>
   </div>
    </div>
  </div>
</form>
</body>
</html>