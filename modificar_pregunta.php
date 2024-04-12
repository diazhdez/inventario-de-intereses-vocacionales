<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
  header("Location: cerrar_sesion.php");
}

include 'conexion.php';

$id_pregunta = $_GET['id_pregunta'];

$consulta = mysqli_query($conn, "SELECT * FROM preguntas WHERE id_pregunta = '$id_pregunta'")
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
  <title>Modificar preguntas</title>
</head>

<body>
  <center>
    <h2>Modificar pregunta</h2>
    <form action="modificar_pregunta2.php" method="post">
      <input type="hidden" name="id_pregunta" id="id_pregunta" value=" <?php echo $id_pregunta; ?>">

      <div class="form-group col-md-5">
        Pregunta:
        <input class="form-control" type="text" name="p" id="p" placeholder="Ingrese la pregunta"
          value="<?php echo $datos['pregunta'] ?>">
      </div>
      <div class="form-group col-md-5">
        Estado:
        <select class="form-control" id="estado" name='estado'>
          <option value="<?php echo $datos['estado'] ?>"><?php echo $datos['estado'] ?></option>
          <option value="activado">Activada</option>
          <option value="desactivado">Desactivada</option>
        </select>
      </div>
      <div>
        <input class='btn btn-success' type="submit" value="Guardar">
      </div>

    </form>
  </center>
</body>

</html>