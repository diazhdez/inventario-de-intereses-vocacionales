<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
  header("Location: cerrar_sesion.php");
}
$id_encuesta = $_GET['id_encuesta'];
$titulo = $_GET['titulo'];
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Competencias</title>
</head>

<body>

  <h2><?php echo $titulo; ?></h2>

  <?php
  include 'conexion.php';
  $d = "1";
  $consulta = mysqli_query($conn, "SELECT * FROM preguntas WHERE id_enc = '$id_encuesta' AND estado = 'activado'")
    or die("error al actualizar los datos");

  $i = 1;
  while ($datos = mysqli_fetch_assoc($consulta)) {
    ?>
    <form action="pdf/index.php" method="post">
      <input type="hidden" name="id_encuesta" id="id_encuesta" value="<?php echo $id_encuesta; ?>">
      <h3><?php echo $i . ": " . $datos['pregunta'] ?></h3>
      <div>
        <input type="radio" name="ans" value=5> Muy productivo
      </div>
      <div>
        <input type="radio" name="ans" value=4> Productivo
      </div>
      <div>
        <input type="radio" name="ans" value=3> Regular
      </div>
      <div>
        <input type="radio" name="ans" value=2> Poco productivo
      </div>
      <div>
        <input type="radio" name="ans" value=1> Nada productivo
      </div>

      <?php
      $i++;
  }

  ?>
    <button class="btn btn-dark boton">Ver PDF </button>
  </form>
  <form action="pdf/index.php" method="post">
    <input type="hidden" name="id_encuesta" id="id_encuesta" value="<?php echo $id_encuesta ?>">
    <input type="hidden" name="d" id="d" value="<?php echo $id_encuesta ?>">
    <button class="btn btn-dark boton">Desargar PDF </button>
  </form>

  <a target="derecha" href="vista_previa.php"><button class="btn btn-primary">Regresar </button></a>


</body>

</html>