Administrador.php:
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrador</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
 <!-- Custom styles for this template -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><b>MXLI Snacks - Administracion</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Informacion</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Platillos<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="nuevoPlatillo.php">Agregar</a></li>
                  <li><a href="../controller/consultaPlatilloControl.php">Consultar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bebidas<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="nuevaBebida.php">Agregar</a></li>
                  <li><a href="../controlador/consultaBebidasControl.php">Consultar</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Galeria<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="nuevaImagen.php">Agregar</a></li>
                  <li><a href="../controlador/consultaImagenesControl.php">Consultar</a></li>
                </ul>
            </li>

            <li><a href="../index.php">Salir</a></li>
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="jumbotron" style="background-color:#FFFFFF;">
          <h1 align="center">Menu de Administracion</h1>
            <div align="center">
              <p>Modifique la informacion de la pagina, platillos o bebidas.</p>
          </div>
    </div>

<div class="container-fluid" style="align:center">
  <?php
    require("../controlador/consultaInformacionControl.php");

    ?>
</div>

  
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>      
        <footer>
    <div class="container">
    <h3 align="center"> &copy; Eventual</h3>
    </div>
    </footer>
</body>
</html>
