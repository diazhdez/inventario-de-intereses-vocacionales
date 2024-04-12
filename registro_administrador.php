<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
     header("Location: cerrar_sesion.php");
}

include 'conexion.php';


?>
<!DOCTYPE html>
<html>

<head>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <meta charset="utf-8">
     <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <title>Registro</title>
</head>

<body>
     <center>
          <h1>Registro de administradores</h1>
          <form action="guardar_datos_administradores.php" method="post">
               <?php
               if (isset($datos2)) {
                    echo "<div class='alert alert-primary' role='alert'>" . $datos2 . "</div>";
               } else {

               }
               ?>

               <div class="form-group col-md-5">
                    Tipo de Usuario:
                    <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                         <!-- <option value="jarea">Jefe de area evaluador</option> 
             <option value="jdepartamento">Jefe de departamento evaluador</option>-->
                         <option value="administrador">Administrador</option>
                    </select>
               </div>
               <div class="form-group col-md-5">
                    Nombre:
                    <input class="form-control" id="nombre" name="nombre" type="text" required
                         placeholder="Introduce tu nombre">
               </div>

               <div class="form-group col-md-5"> Apellido paterno:
                    <input class="form-control" id="ap" name="ap" type="text" required
                         placeholder="Introduce tu apellido">
               </div>

               <div class="form-group col-md-5">
                    Apellido materno:
                    <input class="form-control" id="am" name="am" type="text" required
                         placeholder="Introduce tu apellido">
               </div>

               <!--<div class="form-group col-md-5">
                            Puesto de trabajo:
                 <input class="form-control" id="puesto" name ="puesto" type="text" required placeholder="Introduce tu puesto">
                    </div>-->

               <div class="form-group col-md-5">
                    Correo electronico:
                    <input class="form-control" id="correo" name="correo" type="text" required
                         placeholder="Introduce tu correo">
               </div>

               <div class="form-group col-md-5">
                    Contraseña:
                    <input class="form-control" id="pass" name="pass" type="password" required
                         placeholder="Introduce tu contraseña">
               </div>

               <input type="submit" class="btn btn-dark" value="Registrar">
          </form>
     </center>
</body>

</html>