<?php include("template/cabecera.php");?>
<?php
include("Administrador/bd.php");

?>

?>
<?php
$sentenciaSQL=$conexion->prepare("Select * From cars");
$sentenciaSQL->execute();
$listacars=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row">
<?php foreach($listacars as $cars) { ?>

<div class="col-md-4">
<div class="card">
    <img class="card-img-top" src="Administrador/Seccion2/Imagen/<?=$cars['Imagen']?>" width="400px">
    <div class="card-body">
    <h4 class="card-title"><?php echo $cars["Nombre"];?></h4>
    <a name="" id="" class="btn btn-primary" href="Clientes.php" role="button">Reservar</a>
    </div>
    </div>
    </div>
<?php } ?>


<div>
<?php include("template/pie.php");
?>      