<?php
//*cambiar por consulta a la base de datos cuando cree Usuario en bd

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


session_start(); 
 if($_POST){
   //if(($_POST["Usuario"]=="Usuario")&&($_POST["contrasena"]=="sistema")){
    if(isset($_POST["Usuario"]) && isset($_POST["contrasenia"])){

      $sentenciaSQL=$conexion->prepare("SELECT *From usuarios WHERE Nombre=:nombre AND clave=:clave "); 
 
      $arraySelect = [
      "nombre" =>$_POST["Usuario"],
      "clave"  =>$_POST["contrasenia"],
      
      ];

      $sentenciaSQL->execute($arraySelect);
      $usuarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
      //$usuarios=$sentenciaSQL->fetch(PDO::FETCH_LAZY);


      if(isset($usuarios[0])){

        $_SESSION["Usuario"]      ="ok";
        $_SESSION["nombreusuario"]=$usuarios[0]["Nombre"];
        header("location:inicio.php");


      }else{
        $mensaje="Error:El usuario o contraseña incorrectos";

      }
      


      }else{
     $mensaje="Error:El usuario o contraseña incorrectos";

   }
 
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
      
   <div class="container">
   <div class="row">
   <div class="col-md-4">
  <br/><br/>

           </div>
           <div class="card">
           <div class="card-header">
                   Login
           </div>
           <div class="card-body">
           <?php if(isset($mensaje)){ ?>
           <div class= "alert alert-primary"role="alert"> 
           <?php echo $mensaje;?>

             </div>
             <?php }?>

               <form action="index.php" method="POST">
               <div class = "form-group">
               <label for=>Usuario</label>
               <input type="text" class="form-control" name="Usuario" placeholder="Escribe tu usuario">
               
            
               </div>
               <div class="form-group">

               <label for=>Contraseña:</label>
               <input type="password" class="form-control"name="contrasenia"  placeholder="Escribe tu contraseña">
               </div>

               
               <button type="submit" class="btn btn-primary">Entrar al Administrador</button>
               </form>
               
               
                   
               </div>
               
               </div>
           </div>
           
       </div>
   </div>
  </body>
</html>