<?php

include "../conexion.php";

session_start();
if (isset($_SESSION['correo'])) {

} else {
  header("Location: cerrar_sesion.php");
}
$id_encuesta = $_GET['id_encuesta'];
$titulo = $_GET['titulo'];
$id_jefes = $_GET['id_jefes'];
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/radio.css">
  <title>Competencias</title>
</head>
<style type="text/css">
  .tg {
    border-collapse: collapse;
    border-spacing: 0;
    border: none;
    border-color: #9ABAD9;
  }

  .tg td {
    font-family: Arial, sans-serif;
    font-size: 14px;
    padding: 10px 5px;
    border-style: solid;
    border-width: 0px;
    overflow: hidden;
    word-break: normal;
    border-color: #9ABAD9;
    color: #444;
  }

  .tg th {
    font-family: Arial, sans-serif;
    font-size: 14px;
    font-weight: normal;
    padding: 10px 5px;
    border-style: solid;
    border-width: 0px;
    overflow: hidden;
    word-break: normal;
    border-color: #9ABAD9;
    color: #fff;
  }

  .tg .tg-3e6p {
    background-color: #d2e4fc;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif !important;
    ;
    color: #000000;
    border-color: inherit;
    text-align: center;
    vertical-align: top
  }

  .tg .tg-k0ei {
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif !important;
    ;
    color: #000000;
    border-color: inherit;
    text-align: center;
    vertical-align: top
  }

  .tg .tg-f3ey {
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif !important;
    ;
    color: #000000;
    border-color: inherit;
    text-align: left;
    vertical-align: top
  }
</style>

<body>
  <center>
    <h2><?php echo $titulo; ?></h2>
    <?php
    $consulta = mysqli_query($conn, "SELECT * FROM preguntas WHERE id_enc = '$id_encuesta' AND estado = 'activado'")
      or die("error al actualizar los datos");
    $row_cnt = $consulta->num_rows;

    $i = 1;
    ?>
    <form action="evaluar2.php" method="post">
      <input type="hidden" name="id_encuesta" id="id_encuesta" value="<?php echo $id_encuesta; ?>">
      <input type="hidden" name="filas" id="filas" value="<?php echo $row_cnt; ?>">
      <input type="hidden" name="id_jefes" id="id_jefes" value="<?php echo $id_jefes; ?>">
      <input type="hidden" name="titulo" id="titulo" value="<?php echo $titulo; ?>">

      <table class="tg table table-striped table-hover ">
        <tr>
          <th class="tg-3e6p"></th>
          <th class="tg-3e6p">Muy<br> productivo</th>
          <th class="tg-3e6p">Productivo</th>
          <th class="tg-3e6p">Regular</th>
          <th class="tg-3e6p">Poco<br> productivo</th>
          <th class="tg-3e6p">Nada<br> productivo</th>
        </tr>
        <?php
        while ($datos = mysqli_fetch_assoc($consulta)) {
          ?>
          <tr>
            <td class="tg-f3ey">
              <h6><?php echo $i . ": " . $datos['pregunta'] ?></h6>
            </td>
            <td class="tg-f3ey">
              <center><input type="radio" name="<?php echo $datos['id_pregunta'] ?>" value="5" required></center>
            </td>
            <td class="tg-f3ey">
              <center><input required type="radio" name="<?php echo $datos['id_pregunta'] ?>" value="4"></center>
            </td>
            <td class="tg-f3ey">
              <center><input required type="radio" name="<?php echo $datos['id_pregunta'] ?>" value="3"></center>
            </td>
            <td class="tg-f3ey">
              <center><input required type="radio" name="<?php echo $datos['id_pregunta'] ?>" value="2"></center>
            </td>
            <td class="tg-f3ey">
              <center><input required type="radio" name="<?php echo $datos['id_pregunta'] ?>" value="1"></center>
            </td>
          </tr>
          <?php
          $i++;
        }
        ?>
      </table>
      <button class="btn btn-primary boton ">Evaluar</button>

    </form>

  </center>
</body>

</html>