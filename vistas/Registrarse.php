<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New user</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>

<body>
  
  <div class="container" align="center">
  <div class="blog-header">
        <h1 class="blog-title">Registrate!</h1>
        <p class="lead blog-description">Empieza a compartir los eventos de tu institución, ingresa la información.</p>
      </div>
<div class="row" style="width:800px;">
  <div class="span4_offset4">
    <div class="well">
<form class="form-horizontal" role="form" action="../controladores/registroControlador.php" method="post" enctype="multipart/form-data">
   <div class="form-group" style="width:700px;">
      <label for="usuario" class="col-sm-2 control-label">Usuario</label>
      <div class="col-sm-10" >
         <input type="text" class="form-control" id="usuario" name="usuario"
            placeholder="Ingresa tu usuario" >
      </div>
   </div>
   <div class="form-group" style="width:700px;">
      <label for="password" class="col-sm-2 control-label">Contraseña</label>
      <div class="col-sm-10">
         <input type="password" class="form-control" id="password" name="password"
            placeholder="Ingresa tu contraseña">
      </div>
   </div>
   <div class="form-group" style="width:700px;">
      <label for="institucion" class="col-sm-2 control-label">Institucion</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="institucion" name="institucion"
            placeholder="Ingresa el nombre de tu institución">
      </div>
    </div>
    <div class="form-group" style="width:700px;">
   <label for="uploaded file" class="col-sm-2 control-label">Sube una foto</label>
     <div class="col-sm-10" >
  <input name="uploadedfile" type="file" class="form-control"/><br/>
  </div>
</div>
      <div class="form-group" style="margin:50px;" align="right">
      <button href="../index.php" class="btn btn-success">Cancelar</button>
      <button type="submit" class="btn btn-success">Registrate ahora!</button>
      </div>
   </div>
  </div>
   </div>
    </div>
  
</form>
</body>
</html>