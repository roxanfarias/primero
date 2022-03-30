<?php

  @session_start(); 

?>


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


<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#">Administrador del sitio web <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link"<?php echo $url;?>//Administrador/inicio.php">Inicio</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/Administrador/seccion2/productos.php">Vehículos</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/Administrador/seccion2/cerrar.php">Cerrar Cesión</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>"> Ver Sitio Web </a>




    </div>
</nav>


   <div class="container">
   <div class="row">
   <div class="col-md-12">
      
  </div>
      
    <div class="jumbotron">
        <h1 class="display-3">Bienvenido <?=$_SESSION["nombreusuario"]?><h1>
        <p class="lead">Usuario calificado</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="seccion2/productos.php" role="button">Administrar Vehículos</a>
        </p>
    </div>



  </body>
</html>
