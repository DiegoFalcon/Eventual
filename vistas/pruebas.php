<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pruebas</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>

<body>
  
  <div class="container" align="center">
  <div class="blog-header">
        <h1 class="blog-title">PRUEBAS!</h1>
      </div>
<div class="row" style="width:800px;">
  <div class="span4_offset4">
    <div class="well">
<form class="form-horizontal" role="form" action="../controladores/insertarComentarios.php" method="post" enctype="multipart/form-data">
   <div class="form-group" style="width:700px;">
      <label for="AsistenciasID" class="col-sm-2 control-label">AsistenciasID</label>
      <div class="col-sm-10" >
         <input type="text" class="form-control" id="AsistenciasID" name="AsistenciasID"
            placeholder="ASISTENCIA ID" >
      </div>
   </div>
   
   <div class="form-group" style="width:700px;">
      <label for="Comentario" class="col-sm-2 control-label">Comentario</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="Comentario" name="Comentario"
            placeholder="COMMENT">
      </div>
    </div>

      <div class="form-group" style="margin:50px;" align="right">
      <button href="../index.php" class="btn btn-success">Cancelar</button>
      <button type="submit" class="btn btn-success">Mandar comentario!</button>
      </div>
   </div>
  </div>
   </div>
    </div>
  
</form>
</body>
</html>