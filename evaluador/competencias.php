<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
  header("Location: cerrar_sesion.php");
}
$id_jefes = $_GET['id_jefes'];
/*$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
date_default_timezone_get('America/Mexico_City');
$fecha = date('m/d/y');
$fechayhora= $fecha." ".$hora->format('H:i:s');
echo $fechayhora. "<br>";
echo strtotime ($fechayhora);
//el formtato de la fecha es mes dia y año, aa/dd
$fec = "05/25/19 13:03:12"; 

$fechactual =strtotime("now");
echo $fechactual."<br>";
$fetro = strtotime ($fec);
echo "coversion de la fecha ".$fetro;
if(strtotime($fec) > time()) {
echo " <br> fecha del futuro";
}

if(strtotime($fec) < time()) {
echo "  <br>  fecha del pasado";
}

if(strtotime($fec) == time()) {
echo " <br> coincide con la fecha de hoy";
}*/
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

  <center>

    <h2>Selecione la competencia a evaluar</h2>
    <div> Ver resultado del colaborador
      <a target="derecha" href="../grafica/barras_trabajador.php?id_jefes=<?php echo $id_jefes; ?>"><button
          class="btn btn-primary ">Resultados </button></a>
    </div>
    <?php
    include "../conexion.php";

    $consulta = mysqli_query($conn, "SELECT * FROM encuestas WHERE estado ='activado' ORDER BY fecha_inicial ")
      or die("error al actualizar los datos");

    while ($datos = mysqli_fetch_assoc($consulta)) {
      if (strtotime($datos['fecha_final']) > time()) {
        ?>
        <div class="list-group col-md-8">
          <a href="evaluar1.php?id_encuesta=<?php echo $datos['id_encuesta']; ?>&id_jefes=<?php echo $id_jefes ?>&titulo=<?php echo $datos['titulo']; ?>"
            class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><?php echo $datos['titulo']; ?></h5>
              <small><?php echo $datos['fecha_inicial']; ?></small>
            </div>
            <small class="mb-1"><?php echo $datos['descripcion']; ?></small>
          </a>

        </div>
      <?php
      }
      if (strtotime($datos['fecha_final']) == time()) {

        ?>
        <div class="list-group col-md-8">
          <a href="evaluar1.php?id_encuesta=<?php echo $datos['id_encuesta']; ?>&id_jefes=<?php echo $id_jefes ?>&titulo=<?php echo $datos['titulo']; ?>"
            class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><?php echo $datos['titulo']; ?></h5>
              <small><?php echo $datos['fecha_inicial']; ?></small>
            </div>
            <small class="mb-1"><?php echo $datos['descripcion']; ?></small>
          </a>

        </div>
        <!--<a  href="pdf/reporte_general_competencias.php" ><button class="btn btn-dark boton">Generar reporte </button></a>-->

        <?php
        $row_cnt = $consulta->num_rows;
      }
      //echo  $row_cnt;
    }
    ?>
  </center>
</body>

</html>