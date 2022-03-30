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
$txtModelo=(isset($_POST["txtModelo"]))?$_POST["txtModelo"]:"";
$txtColor=(isset($_POST["txtColor"]))?$_POST["txtColor"]:"";
$txtPrecioDia=(isset($_POST["txtPrecioDia"]))?$_POST["txtPrecioDia"]:"";
$txtImagen=(isset($_FILES["txtImagen"]["name"]))?$_FILES["txtImagen"]["name"]:"";
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
<?php

 Switch($accion){
     
           case "Agregar":


            // SUBIMOS EL ARCHIVO 

            $fecha=new DateTime();
            $NombreArchivo =  isset($_FILES["txtImagen"]["name"])?  $fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"] : "Imagen.jpg";
           
            /*
            if($tmpImagen!=""){

                move_uploaded_file($tmpImagen,"../../Img".$NombreArchivo);
            }*/

            if( isset($_FILES['txtImagen']['name']) ){
                $ruta = "Imagen/".$NombreArchivo;
            
                if(copy($_FILES['txtImagen']['tmp_name'], $ruta)){
                   
                }else{
                    print_r("Dio Error al subir la imagen");
                    die();
                }
            }


            // INGRESAMOS EN LA BASE DE DATOS
            
            $sentenciaSQL=$conexion->prepare("INSERT INTO `cars` (`Nombre`,`Modelo`,`Color`,`PrecioDia`, `Imagen`) 
                                                 VALUES (:Nombre,:Modelo, :Color, :PrecioDia, :Imagen);");
            $arrayInsert = [
                "Nombre"    => $txtNombre,
                "Modelo"    => $txtModelo,
                "Color"     => $txtColor,
                "PrecioDia" =>$txtPrecioDia,
                "Imagen"    =>$NombreArchivo,
            ];


            $sentenciaSQL->execute($arrayInsert);


            echo "presionado boton Agregar";
            break;

             case"Modificar":
                $sentenciaSQL=$conexion->prepare("UPDATE cars SET Nombre=:Nombre Where id=:id");
                $sentenciaSQL->bindParam(":Nombre",$txtNombre);
                $sentenciaSQL->bindParam(":id",$txtid);
                $sentenciaSQL->execute();
               
                if($txtImagen!=""){
                $sentenciaSQL=$conexion->prepare("UPDATE cars SET Imagen=:Imagen Where id=:id");
                $sentenciaSQL->bindParam(":Imagen",$txtImagen);
                $sentenciaSQL->bindParam(":id",$txtid);
                $sentenciaSQL->execute();
                
            }
        
             echo "presionado boton Modificar";
             break;  

             case"Cancelar":
             echo "presionado boton Cancelar";
             break;

             case"Seleccionar":
                
                $sentenciaSQL=$conexion->prepare("Select * From cars where id=:id");
                $sentenciaSQL->bindParam(":id",$txtid);
                $sentenciaSQL->execute();
                $cars=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                $arrayInsert = [
                    "Nombre" => $txtNombre,
                    "Modelo" => $txtModelo,
                    "Color" => $txtColor,
                    "PrecioDia"=>$txtPrecioDia,
                    "Imagen"=>$txtImagen,
                ];
             //echo "presionado boton Seleccionar";
                 break;

             case"Borrar":

                $sentenciaSQL=$conexion->prepare("Select Imagen From cars WHERE id=:id");
                $sentenciaSQL->bindParam(":id",$txtid);
                $sentenciaSQL->execute();
                $cars=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                
            if(isset($cars["Imagen"])&&($cars["Imagen"]!="Imagen.jpg")){
            if(file_exists("../../Imagen/".$cars["Imagen"])){

                unlink("../../Imagen/".$cars["Imagen"]);

            }
            
        }
        $sentenciaSQL=$conexion->prepare("DELETE From cars WHERE id=:id");
        $sentenciaSQL->bindParam(":id",$txtid);
        $sentenciaSQL->execute();
        $cars=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
             // * echo "presionado boton Borrar";
                     break;

                 }



             $sentenciaSQL=$conexion->prepare("Select * From cars");
             $sentenciaSQL->execute();
             $listacars=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


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
<input type="text" class="form-control"Value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre"placeholder="Nombre del Vehículo">

</div>

<div class = "form-group">
<label for="txtNombre">Modelo:</label>
<input type="text" class="form-control"Value="<?php echo $txtModelo;?>" name="txtModelo" id="txtModelo"placeholder="Modelo del Vehículo">

</div>

<div class = "form-group">
<label for="txtNombre">Color:</label>
<input type="text" class="form-control"Value="<?php echo $txtColor;?>" name="txtColor" id="txtColor"placeholder="Color del Vehículo">

</div>

<div class = "form-group">
<label for="txtNombre">PrecioDia:</label>
<input type="text" class="form-control"Value="<?php echo $txtPrecioDia;?>" name="txtPrecioDia" id="txtPrecioDia"placeholder="Precio del Vehículo">

</div>


<div class = "form-group">
<label for="txtNombre">Imagen:</label>

<?php echo $txtImagen;?>
<input type="file" class="form-control" name="txtImagen" id="txtImagen"placeholder="Nombre del Vehículo">
</div>

<div class="btn-group" role="group" aria-label="">
    <button type="submit" name="accion"value ="Agregar"  class="btn btn-succes">Agregar</button>
    <button type="submit" name="accion"Value="Modificar" class="btn btn-Warning">Modificar</button>
    <button type="submit" name="accion"Value="Cancelar"  class="btn btn-Info">Cancelar</button>
</div>
       
</form>
    
</div>


    </div>

    <div class="col-7md-">
        <table class="table table-bordered">

    
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Precio Día</th>
                <th>Imagen</th>

            </tr>
        </thead>
        <tbody>
        <?php foreach($listacars as $cars) { ?> 

            <tr>
            <td><?php echo $cars["id"]; ?></td>
            <td><?php echo $cars["Nombre"]; ?></td>
            <td><?php echo $cars["Modelo"]; ?></td>
            <td><?php echo $cars["Color"]; ?></td>
            <td><?php echo $cars["PrecioDia"]; ?></td>
            <td>
            <img src="Imagen/<?php echo $cars["Imagen"];?>" width="50" alt="">
            <?php echo $cars["Imagen"]; ?>

            

            </td>
                
            <td>

                seleccionar|borrar
                <form method="post">

               <input type="hidden" name="txtid" id="txtid" value="<?php echo $cars["id"]; ?>"/>
               <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
               <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
               
                </form>

                <td>
                </tr>
            
                <?php } ?>
                <tbody>

                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
            
            
        </tbody>
    </table>

    
</div>