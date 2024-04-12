<?php
error_reporting(1);
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
  <link rel="stylesheet" type="text/css" href="../css/estilosevaluador.css">
  <title>evaluador</title>
</head>

<body>

  <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
  <p>Subordinados a evaluar</p>

  <?php
  include "../conexion.php";

  $correo = $_SESSION['correo'];
  $departamento = $_SESSION['departamento'];
  $area = $_SESSION['area'];
  $tipo_usuario = $_SESSION['tipo_usuario'];
  #echo $departamento;
#echo "<br>";
#echo $area;
#echo "<br>";
#echo $tipo_usuario;
  if ($tipo_usuario == 'jarea') {
    $consulta = mysqli_query($conn, "SELECT * FROM jefes WHERE area = '$area' AND correo != '$correo'")
      or die("No se encontraron resultados");
    $i = 1;
    while ($datos = mysqli_fetch_assoc($consulta)) {
      echo "<ul class='menu'>";
      echo "<li>";
      echo "<a target='derecha' href='competencias.php?id_jefes=" . $datos['id_jefes'] . "'>" . $i . " : " . $datos['nombre'] . " " . $datos['ap'] . " " . $datos['am'] . "</a>";
      echo "</li>";
      echo "</ul>";
      $i++;
    }

  }
  if ($tipo_usuario == 'jdepartamento') {

    $consulta = mysqli_query($conn, "SELECT * FROM jefes WHERE departamento = '$departamento' AND correo != '$correo'")
      or die("No se encontraron resultados");

    while ($datos = mysqli_fetch_assoc($consulta)) {
      $nombre1 = $datos['nombre'] . " " . $datos['ap'] . " " . $datos['am'];
      echo "<ul class='menu'>";
      echo "<li>";
      echo "<a target='derecha' href='competencias.php?id_jefes=" . $datos['id_jefes'] . "'>" . $nombre1 . "</a>";
      echo "</li>";
      echo "</ul>";
    }
  }
  ?>


  <center><a target='_top' href='../cerrar_sesion.php'><button class='btn btn-dark boton'>Cerrar sesion</button></a>
  </center>


</body>

</html>