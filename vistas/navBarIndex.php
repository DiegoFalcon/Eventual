<style>
.linkButton { 
     background: none;
     border: none;
     color: #0066ff;
     cursor: pointer;
}
.navBarAmarillo{
  background:none;
  background-color:#ffaa00;
}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script>
function validarUsuario(){
        var user = $("#usuario").val();
        var pass = $("#password").val();
        $.ajax({
          type: "POST",
          url: "http://appeventual.com/admin/controladores/registroControlador.php",
          data: { accion: "validarUsuario",usuario:user,password:pass}
        }).done(setTimeout(function( msg ) {
          if (msg === 1){
           location.reload();;
            alert("exito");
          }
          else{
            location.reload();;
            alert("falla");
          }
        }),3000);
        
      }
</script>
<nav class="navbar navbar-default navbar-fixed-top">
  <?php if(!isset($_COOKIE["usuario"])){
    echo '
      <div class="container-fluid" id="navbarcontainer">
        <div class="navbar-header" id="navbarheader">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Eventual</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        
        <form class="navbar-form navbar-right" role="form" action = "vistas/Registrarse.php">
        <button type="submit" class="linkButton">Registrarse</button>
        </form>
          <form class="navbar-form navbar-right" role="form" method="POST" action="controladores/validarUsuario.php">
            <div class="form-group">
              <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" id="password" name="password" placeholder="Contraseña" class="form-control">
            </div>
            <button id="Signin" type="submit" class="linkButton">Log in</button>
          </form>
          
        </div><!--/.navbar-collapse -->
        
      </div>';
  }
  else
  {
   echo '
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Eventual</a>
        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a>
                    </li>
                    <li><a href="#">'.$_COOKIE["nombre"].'</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="vistas/agregarCategorias.php">Crear Categoria</a>
                            </li>
                            <li><a href="vistas/agregarEventos.php">Crear Evento</a>
                            </li>
                              <li><a href="vistas/Administrador.php">Administrar</a>
                            </li>
                             <li><a href="vistas/AdministradorPrueba.php">Administrar</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="controladores/Logout.php">Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
              
            </div>

        </center>
           
    </div>
  ';
  }
  ?>
    </nav>