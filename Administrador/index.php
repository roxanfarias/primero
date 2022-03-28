<?php
//*cambiar por consulta a la base de datos cuando cree Usuario en bd

session_start(); 
 if($_POST){
   if(($_POST["Usuario"]=="Usuario")&&($_POST["contraseña"]=="sistema")){
     $_SESSION["Usuario"]="ok";
     $_SESSION["nombreusuario"]="Usuario";
    header("location:inicio.php");
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
              <?php if(isset($mensaje))           {  ?>
              <div class= "alert alert-primary"role="alert> 
                          <?php echo $mensaje;?>

             </div>
             <?php }?>

               <form method="POST">
               <div class = "form-group">
               <label for=>Usuario</label>
               <input type="text" class="form-control" name="Usuario" placeholder="Escribe tu usuario">
               
            
               </div>
               <div class="form-group">

               <label for=>Contraseña:</label>
               <input type="password" class="form-control"name="Contraseña"  placeholder="Escribe tu contraseña">
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