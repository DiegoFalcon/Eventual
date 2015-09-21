<style>
.linkButton { 
     background: none;
     border: none;
     color: #0066ff;
     cursor: pointer;
}
.navBarAmarillo{
  background:none;
  background-color:#0066ff;
}
</style>
<nav class="navbar navbar-default navbar-fixed-top">
  <?php if (!isset($_COOKIE["usuario"])){
    echo '
      <div class="container-fluid" id="navbarcontainer">
        <div class="navbar-header" id="navbarheader">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Event Manager</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        
        <form class="navbar-form navbar-right" role="form" action="Registrarse.php" method="post">
        <button type="submit" class="linkButton">Registrarse</button>
        </form>
          <form class="navbar-form navbar-right" role="form" action="../controladores/validarUsuario.php" method="post">
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
   echo ' <div class="ccontainer-fluid" id="navbarcontainer">
       <div class="navbar-header" id="navbarheader">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Event Manager</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
    
    <form class="navbar-form navbar-right" role="form" action="controller/LogoutController.php" method="post"><button type="submit" class="btn btn-primary">Log out</button></form>
          <form class="navbar-form navbar-right" role="form" action="controller/ModifyUserbyuserController.php" method="post">
       
            <button id="myaccount" type="submit"class="btn btn-primary">My account</button>
          </form>
      <form class="navbar-form navbar-right" role="form" action="view/EventManagement.php" method="post">
       
            <button id="eventmanager" type="submit"class="btn btn-primary">Event Management</button>
          </form>
          <h3 style="color:white;" align="center">Welcome '.$_COOKIE["username"].'!</h3>
        </div><!--/.navbar-collapse -->
        
      </div>
  ';
  }
  ?>
    </nav>