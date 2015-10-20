<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New user</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>

<body>
  
  <div class="container" align="center">
  <div class="blog-header">
        <h1 class="blog-title">Categorias</h1>
      </div>
<div class="row" style="width:800px;">
  <div class="span4_offset4">
    <div class="well">
<form class="form-horizontal" role="form" action="../controladores/crearCategorias.php" method="post" enctype="multipart/form-data">
   <div class="form-group" style="width:700px;">
      <label for="usuario" class="col-sm-2 control-label">Nombre de categoria</label>
      <div class="col-sm-10" >
         <input type="text" class="form-control" id="usuario" name="nombre"
            placeholder="Ingresa el nombre de la categoria" >
      </div>
   </div>
   <div class="form-group" style="width:700px;">
   <label for="uploaded file" class="col-sm-2 control-label">Sube una foto</label>
     <div class="col-sm-10" >
  <input name="uploadedfile" type="file" class="form-control"/><br/>
  </div>
</div>
  <div class="form-group" style="margin:50px;" align="right">
      <button type="submit" class="btn btn-warning">Agregar categoria</button>
      </div>
  </div>
   </div>
    </div>
  </div>
  </form>
    <footer align="center">
        <p>&copy;<a href="http://localhost/Eventual">Eventual</a>, por <a href="https://facebook.com/DiiegoFalcon">Diego Falcon</a> y <a href="https://facebook.com/darkomcfly">Jesus Zavala</a> .</p>
      </footer>
     <!-- /container -->

</body>
</html>