<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
  header("Location: cerrar_sesion.php");
}

$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));

date_default_timezone_set('America/Mexico_City');
$fecha = date("m/d/y");
//AGREGAS S para segundos
$fechayhora = $fecha . " " . $hora->format('H:i:s');
include 'conexion.php';

$id_encuesta = $_GET['id_encuesta'];

$consulta = mysqli_query($conn, "SELECT * FROM encuestas WHERE id_encuesta = '" . $id_encuesta . "'")
  or die("error al actualizar los datos");

while ($datos = mysqli_fetch_assoc($consulta)) {

  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Modificar competemcia</title>
  </head>

  <body>
    <center>
      <h1> Modificar competencia</h1>


      <form action="modificar_encuesta2.php" method="post">


        <div class="form-group col-md-5">
          Titulo:
          <input class="form-control" id="titulo" name="titulo" type="text" value="<?php echo $datos['titulo']; ?>">
        </div>
        <div class="form-group col-md-5">
          Descripción:<br>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="5"
            cols="40"><?php echo $datos['descripcion']; ?></textarea>
        </div>
        <input class="form-control" type="hidden" name="id_encuesta" id="id_encuesta" value="<?php echo $id_encuesta; ?>">

        <div class="form-group col-md-5">

          Fecha y hora inicial formato MM/DD/AA HH:MM:SS
          <input class="form-control" id="fecha_inicial" name="fecha_inicial" type="text"
            value="<?php echo $datos['fecha_inicial']; ?>">
        </div>
        <div class="form-group col-md-5">
          Fecha y hora final formato MM/DD/AA HH:MM:SS
          <input class="form-control" id="fecha_final" name="fecha_final" type="text"
            value="<?php echo $datos['fecha_final']; ?>">
        </div>

        <div class="form-group col-md-5">
          La encuesta estara:
          <select class="form-control" id="estado" name="estado">
            <option value="<?php echo $datos['estado']; ?>"><?php echo $datos['estado']; ?></option>
            <option value="activado">Activada</option>
            <option value="desactivado">Desactivada</option>
          </select>
        </div>
        <div>
          <input class='btn btn-success' type="submit" value="Guardar">
        </div>
      </form>
    </center>
  <?php } ?>
</body>

</html>