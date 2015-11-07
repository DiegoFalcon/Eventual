<?php

require_once ("claseCategorias.php");
$categorias = new Categorias();
$categorias->getCategoriasJSON();

?>