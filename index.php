<html>

<head>
  <link rel="shortcut icon" href="img/favicon1.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
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
        <form action="validar_datos2.php" method="post">
          <?php
          if (isset($errorvalidacion)) {
            echo "<div class='alert alert-primary' role='alert'>" . $errorvalidacion . "</div>";

          }
          ?>
          <div class="form-group">

            <label>Correo electronico:</label>
            <input class="form-control" id="correo" name="correo" type="email" required
              placeholder="Introduce tu correo">

          </div>
          <div class="form-group">
            <label>Contraseña:</label>
            <input class="form-control" id="pass" name="pass" type="password" required
              placeholder="Introduce tu contraseña">

            <div>
              <input class="btn btn-success boton" type="submit" value="Iniciar sesión">
            </div>
          </div>
      </div>
    </div>
  </div>
  </form>
  <center>
    <a href="login.php"><button class="btn btn-primary ">Ingresa tu código </button></a>
  </center>
</body>

</html>