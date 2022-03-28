<?php include("template/cabecera.php");?>



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
$sentenciaSQL=$conexion->prepare("Select * From cars");
$sentenciaSQL->execute();
$listacars=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<?php foreach($listacars as $cars)  ?>
<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./Imagen<?php echo $cars["Imagen"];?>" alt="">
    <div class="card-body">
    <h4 class="card-title"><?php echo $cars["Nombre"];?></h4>
    <a name="" id="" class="btn btn-primary" href="Clientes.php" role="button">Reservar</a>
    </div>
    </div>
    </div>
<?php ?>



<?php include("template/pie.php");?>      