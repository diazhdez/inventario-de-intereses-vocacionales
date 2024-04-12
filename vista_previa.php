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
  <title>Encuestas</title>
</head>

<body>
  <center>
    <h1>Encuestas</h1>
    <?php
    include 'conexion.php';
    $consulta = mysqli_query($conn, "SELECT * FROM encuestas")
      or die("error al actualizar los datos");


    while ($datos = mysqli_fetch_assoc($consulta)) {
      /* echo "<ul>";
       echo "<li>";
       echo "<a href='vista_previa2.php?id_encuesta=".$datos['id_encuesta']."&titulo=".$datos['titulo']."'>".$datos['titulo']."</a>";
       echo"<br>";
       echo "</li>";
       echo "</ul>";		*/


      ?>
      <div class="list-group col-md-8">

        <a href="vista_previa3.php?id_encuesta=<?php echo $datos['id_encuesta']; ?>&titulo=<?php echo $datos['titulo'] ?>"
          class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo $datos['titulo']; ?></h5>
            <small><?php echo $datos['fecha_inicial']; ?></small>
          </div>
          <small class="mb-1"><?php echo $datos['descripcion']; ?></small>
        </a>

      </div>
      <!--<a  href="pdf/reporte_general_competencias.php" ><button class="btn btn-dark boton">Generar reporte </button></a>-->
    <?php } ?>
  </center>
</body>

</html>