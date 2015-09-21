<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">


  </head>
  <body>

    <?php
      require_once("navBar.php");
    ?>

   
    

    <div class="container" style="margin-top:100px;">

      <form class="form-signin" action="administrador" method="post">
        <h2 class="form-signin-heading">Ingresar</h2>
        <label for="inputEmail" class="sr-only">Nombre</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Nombre" required="" autofocus="" style="width:400px;" align="center">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="" style="width:400px;" align="center">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Recuerdame
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="width:400px; bgcolor:#FFFFF;">Ingresar</button>
       
      </form>
       <form class="form-signin" action="registrarse" method="post">
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="width:400px;" >Registrarme</button>
      </form>
    </div>
  </body>
</html>