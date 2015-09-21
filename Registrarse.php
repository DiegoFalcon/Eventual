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

<form action="../controller/RegisterController.php" method="post">
<div class="container" align="center">
<div class="blog-header">
        <h1 class="blog-title">Register Now</h1>
        <p class="lead blog-description">Input your personal information to participate in the event.</p>
      </div>
  
<div class="input-group" style="margin:50px;">
  <span class="input-group-addon" style="width:50px; height:15px;">User name</span>
  <input type="text" class="form-control" placeholder="..." name="username">
</div>
<div class="input-group" style="margin:50px;">
  <span class="input-group-addon" style="width:50px; height:15px;">Password</span>
  <input type="password" class="form-control" placeholder="..." name="password">
</div>
<div class="input-group" style="margin:50px;">
 <span class="input-group-addon">Real name</span>
  <input type="text" class="form-control" placeholder="..." name="name">
  <span class="input-group-addon">Last name</span>
  <input type="text" class="form-control" placeholder="..." name="lastname">
</div>
<div class="input-group" style="margin:50px;">
 <span class="input-group-addon">Phone number</span>
  <input type="text" class="form-control" placeholder="..." name="phonenumber">
  <span class="input-group-addon">Address</span>
  <input type="text" class="form-control" placeholder="..." name="address">
</div>
<div class="input-group" style="margin:50px;">
 <span class="input-group-addon">E-mail</span>
  <input type="text" class="form-control" placeholder="..." name="email">
</div>
<div class="input-group" style="margin:50px;">
<h3> Select your T-shirt Size</h3><br>

  <input type="radio" name="tshirt" value="S">Small
<input type="radio" name="tshirt" value="M">Median
<input type="radio" name="tshirt" value="L">Large
<input type="radio" name="tshirt" value="XL">Extra Large
</div>
<div class="input-group" style="margin:50px;">
<button type="submit" class="btn btn-primary">Register now</button>
</div>

</form>
<footer>
        <p>&copy; Event Manager <a href="http://localhost:8080/EventManager">Dia del ICC</a>, by <a href="https://facebook.com/DiiegoFalcon">Diego Falcon</a>.</p>
      </footer>
     <!-- /container -->
</div>

</body>
</html>