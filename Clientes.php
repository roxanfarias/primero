<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php $url= "http://".$_SERVER["HTTP_HOST"]."/SitioWeb"?>
     
<nav class="navbar navbar-expand bs-green">
    <div class="nav navbar-nav-bs-green">
        <a class="nav-item nav-link active" href="#">Cliente <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/SitioWeb/Clientes.php">Inicio</a>

        <a class="nav-item nav-link" href="<?php echo $url;?>/SitioWeb/Clientes.php">Vehículos</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/Administrador/Seccion2/cerrar.php">Cerrar Cesión</a>

        <a class="nav-item nav-link" href="<?php echo $url;?>"> Ver Sitio Web </a>
    </div>
</nav>


<div class="container">
        <div class="row">

<form method="POST" enctype="multipart/form-data">
<?php
