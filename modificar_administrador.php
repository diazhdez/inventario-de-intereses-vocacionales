<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
  header("Location: cerrar_sesion.php");
}

include 'conexion.php';

$id_jefes = $_GET['id_jefes'];

$consulta = mysqli_query($conn, "SELECT * FROM jefes WHERE id_jefes = '" . $id_jefes . "'")
  or die("error al actualizar los datos");

while ($datos = mysqli_fetch_assoc($consulta)) {

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
      <h1>Modificar datos</h1>

      <form action="modificar_administrador2.php" method="post">
        <div class="form-group col-md-5">
          <input class="form-control" type="hidden" name="id_jefes" id="id_jefes" value="<?php echo $id_jefes ?>">
        </div>

        <div class="form-group col-md-5"> Nombre:
          <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombre'] ?>">
        </div>

        <div class="form-group col-md-5">
          Apellido paterno:
          <input class="form-control" id="ap" name="ap" type="text" value="<?php echo $datos['ap'] ?>">
        </div>

        <div class="form-group col-md-5">
          Apellido materno:
          <input class="form-control" id="am" name="am" type="text" value="<?php echo $datos['am'] ?>">
        </div>


        <div class="form-group col-md-5">
          Correo electronico:
          <input class="form-control" id="correo" name="correo" type="email" value="<?php echo $datos['correo'] ?>">
        </div>

        <div class="form-group col-md-5">
          Contraseña:
          <input class="form-control" id="pass" name="pass" type="text" value="<?php echo $datos['password'] ?>">
        </div>

        <?php
}
?> <input type="submit" class="btn btn-dark" value="Guardar cambios">

    </form>
    <a target="derecha" href="administracion_contra.php"><button class="btn btn-primary boton">Regresar</button></a>
</body>

</html>