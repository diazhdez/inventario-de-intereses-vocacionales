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

  <title>Registro</title>
</head>

<body>
  <center>
    <h1>Alta de area o Departamento</h1>
    <form action="guardar_area_departamento.php" method="post">
      <?php
      if (isset($datos)) {
        echo "<div class='alert alert-primary form-group' role='alert'>" . $datos . "</div>";
      } else {

      }
      ?>

      <div class="form-group col-md-5">
        Titulo:
        <input id="titulo" name="titulo" class="form-control" type="text" required placeholder="Introduce el titulo">
      </div>
      <div class="form-group col-md-5">
        Area o Departamento:
        <select class="form-control" id="ad" name="ad">
          <option value="Area">Area</option>
          <option value="Departamento">Departamento</option>
        </select>
      </div>

      <input type="submit" class="btn btn-dark" value="Registrar">
  </center>


</body>

</html>