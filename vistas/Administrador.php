
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrador</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="icon"  type="image/png" href="../eventualsimple.png" />
<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
 <!-- Custom styles for this template -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>

<body>
 <?php
if (!isset($_COOKIE["usuario"])){echo '<META HTTP-EQUIV="refresh" content="1; URL=../index.php"/>';}
      require_once("navBar.php");
    ?>
 <div class="col-xs-6 col-md-4" style="margin-top:100px;">
    
        <a href="ListaCategorias.php" class="list-group-item active" style="background:#4DB6AC;"><span class="badge">14</span>Categorias</a>
        <a href="ListaEventosPasados.php" class="list-group-item" style="color:white;"> <span class="badge">14</span>Eventos pasados</a>
        <a href="ListaEventosSucediendo.php" class="list-group-item" style="color:white;"> <span class="badge">14</span>Eventos sucediendo</a>
        <a href="ListaEventosPorOcurrir.php" class="list-group-item" style="color:white; hover-color:black;"> <span class="badge">14</span>Eventos por ocurrir</a>
        <a href="MiInstitucion.php" class="list-group-item" style="color:white;"> <span class="badge">14</span>Mi institucion</a>
     
  </div>


<div class="row">
 
  <div class="col-xs-6 col-md-6" >
    <div style="margin-top:100px; color:white;">
              <table class="table table-hover">
               <tr>
                <td >Nombre Categoria</td>
                <td >Descripcion</td>
              </tr>
              </table>
            </div>
  </div>
</div>

<img src="../eventual.png" class="centerLogo">
       
</body>
</html>
