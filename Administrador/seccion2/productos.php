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
        <a class="nav-item nav-link active" href="#">Administrador del sitio <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?php echo $url;?>//Administrador/inicio.php">Inicio</a>

        <a class="nav-item nav-link" href="<?php echo $url;?>/Administrador/seccion2/productos.php">Vehículos</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/Administrador/seccion2/cerrar.php">Cerrar Cesión</a>

        <a class="nav-item nav-link" href="<?php echo $url;?>"> Ver Sitio Web </a>
    </div>
</nav>


<div class="container">
        <div class="row">

<form method="POST" enctype="multipart/form-data">
<?php

$txtid=(isset($_POST["txtid"]))?$_POST["txtid"]:"";
$txtNombre=(isset($_POST["txtNombre"]))?$_POST["txtNombre"]:"";
$txtImagen=(isset($_FILES["txtImagen"]["name"]))?$_FILES["txtImagen"]["name"]:"";
$accion=(isset($_POST["accion"]))?$_POST["accion"]:"";

echo $txtid."<br/>";
echo $txtNombre."<br/>";
echo $txtImagen."<br/>";
echo $accion."<br/>";
?>

<?php
$host="localhost:3307";
$bd="sitio";
$usuario="root";
$contrasenia="";

try{
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
    if($conexion){echo"conectado ... a sistema";}

}catch(Exception $ex){

echo $ex->getMessage();
}
?>

<?php
 Switch($accion){
     
           case "Agregar":

            $sentenciaSQL=$conexion->prepare("INSERT INTO `cars` (`id`, `Nombre`, `Modelo`, `Color`, `PrecioDía`, `Imagen`) VALUES (NULL, 'BMW', 'Z4', 'Blanco', '100', 'BMWZ4.jpg');");
            $sentanciaSQL->execute();

            echo "presionado boton Agregar";
            break;

             case"Modificar":
            echo "presionado boton Modificar";
             break;  

             case"Cancelar":
            echo "presionado boton Cancelar";
             break;

             
}
?>

<div class="col-md_5">


<div class="card">
    <div class="card-header">
        Datos de Vehículos
    </div>

    <div class="card-body">

    <form method="POST" enctype="multipart/form-data">



<div class = "form-group">
<label for="txtid">id:</label>
<input type="text" class="form-control" name="txtid" id="txtid"placeholder="id">

</div>

<form>
<div class = "form-group">
<label for="txtNombre">Nombre:</label>
<input type="text" class="form-control" name="txtNombre" id="txtNombre"placeholder="Nombre del Vehículo">

</div>

<div class = "form-group">
<label for="txtNombre">Imagen:</label>
<input type="file" class="form-control" name="txtImagen" id="txtImagen"placeholder="Nombre del Vehículo">
</div>

<div class="btn-group" role="group" aria-label="">
    <button type="submit" name="accion"value ="Agregar"  class="btn btn-succes">Agregar</button>
    <button type="submit" name="accion"Value="Modificar" class="btn btn-Warning">Modificar</button>
    <button type="submit" name="accion"Value="Cancelar"  class="btn btn-Info">Cancelar</button>
</div>
       
    </div>
    
</div>

<form>
    </div>

    <div class="col-md_7">
        <table class="table table-bordered">

    
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>Hyundai</td>
                <td>imagen.jpg</td>
                <td>seleccionar|borrar</td>


                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
            
        </tbody>
    </table>

    
</div>