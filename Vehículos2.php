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

<?php foreach($listacars as $cars) { ?>

<div class="col-md-12">
<div class="card">
    <img class="card-img-top" src="Administrador/Imagen echo $cars["Imagen"];?>
    <div class="card-body">
    <h4 class="card-title"><?php echo $cars["Nombre"];?></h4>
    <a name="" id="" class="btn btn-primary" href="Clientes.php" role="button">Reservar</a>
    </div>
    </div>
    </div>
<?php } ?>



<?php include("template/pie.php");
?>      