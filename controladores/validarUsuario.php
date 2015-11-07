<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<?php

require_once('claseLogin.php');

$user = $_POST['usuario'];
$pass = $_POST['password'];


$login=new Login();

$bandera = $login->login($user,$pass);

if($bandera==1){
echo '<div align="center">
<META HTTP-EQUIV="refresh" content="1; URL=../index.php"/>
  <img src="../vistas/imagenes/loaderGif.gif" style="width:128px;height:128px;"></div>';
}

if($bandera==0){
echo '<div align="center">
<META HTTP-EQUIV="refresh" content="1; URL=../index.php"/>
  <img src="../vistas/imagenes/loaderGif.gif" style="width:128px;height:128px;"></div>';
}
?>