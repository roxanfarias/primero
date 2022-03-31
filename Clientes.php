 // * En esta carpeta deberia el cliente poder registrarse para acceder a una reserva //
<?php
include("Administrador/bd.php");

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
     
<nav class="navbar navbar-expand bs-green">
    <div class="nav navbar-nav-bs-green">
        <a class="nav-item nav-link active" href="#">Este es tu sitio de Reserva <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/SitioWeb/Registrate.php">Registrate</a>

        <a class="nav-item nav-link" href="<?php echo $url;?>/SitioWeb/Clientes.php">Vehículos</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/SitioWeb">Cerrar Cesión</a>

        <a class="nav-item nav-link" href="<?php echo $url;?>"> Inicio </a>
    </div>
</nav>

<div class="container">
        <div class="row">

<form method="POST" enctype="multipart/form-data">

<?php


$txtid=(isset($_POST["txtid"]))?$_POST["txtid"]:"";
$txtNombre=(isset($_POST["txtNombre"]))?$_POST["txtNombre"]:"";
$txtApellido=(isset($_POST["txtApellido"]))?$_POST["txtApellido"]:"";
$txtDireccion=(isset($_POST["txtDireccion"]))?$_POST["txtDireccion"]:"";
$txtTelefono=(isset($_POST["txtTelefono"]))?$_POST["txtTelefono"]:"";
$txtemail=(isset($_POST["txtemail"]))?$_POST["txtemail"]:"";
$accion=(isset($_POST["accion"]))?$_POST["accion"]:"";
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

// INGRESAMOS EN LA BASE DE DATOS

            
$sentenciaSQL=$conexion->prepare(" INSERT INTO `clientes` (`Nombre`, `Apellido`, `Direccion`, `Telefono`, `email`)
                                   VALUES (:Nombre,:Apellido, :Direccion, :Telefono, :email);");
$arrayInsert = [
"Nombre"        => $txtNombre,
"Apellido"      => $txtApellido,
"Direccion"     => $txtDireccion,
"Telefono"      =>$txtTelefono,
"email"         =>$txtemail,
];


$sentenciaSQL->execute($arrayInsert);



?>

<div class="col-md_5">


<div class="card">
 <div class="card-header">
        Datos de Vehículos
    </div>

    <div class="card-body">

    <form  action="index.php" method="POST" enctype='multipart/form-data'>

   



<div class = "form-group">
<label for="txtid">id:</label>
<input type="text" class="form-control"Value="<?php echo $txtid;?>" name="txtid" id="txtid"placeholder="id">

</div>

<form>
<div class = "form-group">
<label for="txtNombre">Nombre:</label>
<input type="text" class="form-control"Value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre"placeholder="Nombre">

</div>

<div class = "form-group">
<label for="txtNombre">Apellido:</label>
<input type="text" class="form-control"Value="<?php echo $txtApellido;?>" name="txtApellido" id="txtApellido"placeholder="Apellido">

</div>

<div class = "form-group">
<label for="txtNombre">Direccion:</label>
<input type="text" class="form-control"Value="<?php echo $txtDireccion;?>" name="txtDireccion" id="txtDireccion"placeholder="Direccion">

</div>


<div class = "form-group">
<label for="txtNombre">Telefono:</label>
<input type="text" class="form-control"Value="<?php echo $txtTelefono;?>" name="txtTelefono" id="txtTelefono"placeholder="Telefono">

</div>

<div class = "form-group">
<label for="txtNombre">email:</label>
<input type="text" class="form-control"Value="<?php echo $txtemail;?>" name="txtemail" id="txtemail"placeholder="email">

</div>

<div class="btn-group" role="group" aria-label="">
    <button type="submit" name="accion"value ="Agregar"  class="btn btn-succes">Agregar</button>
    <button type="submit" name="accion"Value="Modificar" class="btn btn-Warning">Modificar</button>
    <button type="submit" name="accion"Value="Cancelar"  class="btn btn-Info">Cancelar</button>