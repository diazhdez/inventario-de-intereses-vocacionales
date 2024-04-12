<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
  header("Location: cerrar_sesion.php");
}

include 'conexion.php';

$id_area = $_GET['id_area'];


$consulta = mysqli_query($conn, "SELECT * FROM areas WHERE id_area = '$id_area'")
  or die("error al actualizar los datos");
$datos = mysqli_fetch_assoc($consulta);

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <?php
  if ($datos['area'] == '') {

    $tipo = "1";
    ?>
    <title>Modificar departamento</title>
  </head>

  <body>
    <center>
      <h2>Modificar departamento </h2>
      <form action="modificar_area_departamento2.php" method="post">
        <input type="hidden" name="id_area" id="id_area" value=" <?php echo $id_area; ?>">
        <input type="hidden" name="tipo" id="tipo" value=" <?php echo $tipo; ?>">
        <div class="form-group col-md-5">
          Titulo:
          <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $datos['departamento'] ?>">
        </div>

        <div>
          <input class='btn btn-success' type="submit" value="Guardar">
        </div>

      </form>

    </center>
  <?php }

  if ($datos['departamento'] == '') {
    $tipo = "2";

    ?>
    <title>Modificar Area</title>
    </head>

    <body>
      <center>
        <h2>Modificar area </h2>
        <form action="modificar_area_departamento2.php" method="post">
          <input type="hidden" name="id_area" id="id_area" value=" <?php echo $id_area; ?>">
          <input type="hidden" name="tipo" id="tipo" value=" <?php echo $tipo; ?>">

          <div class="form-group col-md-5">
            Titulo:
            <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $datos['area'] ?>">
          </div>

          <div>
            <input class='btn btn-success' type="submit" value="Guardar">
          </div>

        </form>
      </center>
    <?php }
  ?>

  </body>

</html>