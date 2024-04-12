<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
  header("Location: cerrar_sesion.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Nueva encuesta</title>
</head>

<body>
  <center>
    <h1>Agregue una nueva encuesta</h1>
    <?php
    $hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));

    date_default_timezone_get('America/Mexico_City');
    $fecha = date("m/d/y");
    //AGREGAS S para segundos
    $fechayhora = $fecha . " " . $hora->format('H:i:s');

    //if ($informacion;){
    // echo $informacion;
//}
    
    ?>

    <form action="guardar_competencia.php" method="post">
      <?php
      if (isset($datos3)) {
        echo "<div class='alert alert-primary' role='alert'>" . $datos3 . "</div>";
      } else {

      }
      ?>
      <div class="form-group col-md-5">
        Titulo:
        <input class="form-control" id="titulo" name="titulo" type="text" required placeholder="Introduce el titulo">
      </div>
      <div class="form-group col-md-5">
        Descripción:
        <textarea class="form-control" id="descripcion" name="descripcion" rows="5" cols="40"
          placeholder="Descripción de la encuesta (opcional)"></textarea>
      </div>
      <input class="form-control" id="fecha_inicial" name="fecha_inicial" type="hidden"
        value="<?php echo $fechayhora; ?>">
      <div class="form-group col-md-5">
        Fecha y hora final: Formato de fecha MM/DD/AA HH:MM:SS
        <input class="form-control" id="fecha_final" name="fecha_final" type="text" value="<?php echo $fechayhora; ?>">
      </div>

      <div class="form-group col-md-5">
        La encuesta estara:
        <select class="form-control" id="estado" name="estado">
          <option value="activado">Activada</option>
          <option value="desactivado">Desactivada</option>
        </select>
      </div>
      <input type="submit" class="btn btn-dark" value="Guardar">
    </form>
  </center>

</body>

</html>