<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Eventual" content="">

    <title>Eventual</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="dist/css/bootstrap.min.css" rel="stylesheet">-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style type="text/css">
</style>
<script>
	$(document).ready(function() {

			$('#login').click(function(){
				console.log("entra aqui");
				window.location.href='login';
			});
	});//$(document).ready(function()
	</script>

  </head>
<!-- NAVBAR
================================================== -->
  <body>

	<?php
      require_once("navBar.php");
    ?>



    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <div class="banner" align="center">
            <img src="http://www.mxl.cetys.mx/imagenes_vocetys/Mexicali/17-4-15/sarao.jpg" alt="First slide" width="100%" height="500px" align="center">
          </div>          
          <div class="container">
            <div class="carousel-caption">
              <!--<h1>Play your favorite music.</h1>
              <p>Play your favorite music has never been easier.</p>
          -->
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.carousel -->


    
  </body>
</html>