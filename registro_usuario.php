<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
        header("Location: cerrar_sesion.php");
}

include 'conexion.php';


?>
<!DOCTYPE html>
<html>

<head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport"
                content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <title>Registro</title>
</head>

<body>
        <center>
                <h1>Registro de Códigos</h1>
                <form action="guardar_datos_usuarios.php" method="post">
                        <?php
                        if (isset($datos1)) {
                                echo "<div class='alert alert-primary form-group' role='alert'>" . $datos1 . "</div>";
                        } else {

                        }
                        ?>

                        <div class="form-group col-md-5">
                                Código de prueba:
                                <input id="nombre" name="nombre" class="form-control" type="text" required
                                        placeholder="Introduce código a generar">
                        </div>
                        <input type="submit" class="btn btn-dark" value="Registrar">
        </center>


</body>

</html>