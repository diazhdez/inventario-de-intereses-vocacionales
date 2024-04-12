<html>

<head>
  <link rel="shortcut icon" href="img/favicon1.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <title>Login</title>
</head>

<body>
  <div class="modal-dialog text-center">
    <div class="col-sm-8 main">
      <div class="modal-content">
        <form action="validar_datos3.php" method="post">
          <?php
          if (isset($errorvalidacion)) {
            echo "<div class='alert alert-primary' role='alert'>" . $errorvalidacion . "</div>";

          }
          ?>
          <div class="form-group">

            <label>Introduce tu código:</label>
            <input class="form-control" id="correo" name="correo" type="text" required
              placeholder="Introduce tu código">

          </div>
          <input class="btn btn-success boton" type="submit" value="Iniciar sesión">
      </div>
    </div>
  </div>
  </div>
  </div>
  </form>
</body>

</html>