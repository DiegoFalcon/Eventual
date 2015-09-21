<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<?php

include_once('claseLogin.php');

$user = $_POST['username'];
$pass = $_POST['password'];

$login=new Login();

$bandera = $login->login($user,$pass);



if($bandera==1){
//echo"<div align=center><META HTTP-EQUIV='refresh' content='3; URL=../view/Lobby.php'/>//<br>";	
//echo"Conectando...</div>";
echo '<div class="alert alert-success" role="alert" align="center">
<META HTTP-EQUIV="refresh" content="3; URL=../index.php"/>
  <i class="alert-link">Conectando...</i></div>';
}

if($bandera==0){
/*echo"<div align=center><META HTTP-EQUIV='refresh' content='3; URL=../index.php'/><br>
<i>Usuario o Contrase&ntilde;a incorrecto.</i></div>";*/
echo '<div class="alert alert-danger" role="alert" align="center">
<META HTTP-EQUIV="refresh" content="3; URL=../index.php"/>
  <i class="alert-link">Usuario o Contrase&ntilde;a incorrecto.</i></div>';
}
?>