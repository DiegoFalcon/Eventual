<?php echo '
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
        
        <form class="navbar-form navbar-right" role="form" action="view/RegisterView.php" method="post"><button type="submit" class="btn btn-primary">Register now</button></form>
          <form class="navbar-form navbar-right" role="form" action="controller/ValidarController.php" method="post">
            <div class="form-group">
              <input type="text" id="username" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" id="password" name="password" placeholder="Password" class="form-control">
            </div>
            
            <button id="Signin" type="submit"class="btn btn-default">Log in</button>
          </form>
          
        </div><!--/.navbar-collapse -->
        
      </div>';?>