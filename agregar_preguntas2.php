<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
    header("Location: cerrar_sesion.php");
}

include 'conexion.php';

$id_encuesta = $_GET['id_encuesta'];
$titulo = $_GET['titulo'];
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title></title>
</head>

<body>

    <center>
        <h1><?php echo $titulo; ?></h1>

        <?php
        $consulta = mysqli_query($conn, "SELECT * FROM preguntas WHERE id_enc ='$id_encuesta'")
            or die("error al actualizar los datos");
        echo "<table class='table table-sm table-bordered table-hover'>";
        echo "<tr class='table-primary'>";
        echo "<th id= 'pregunta'>Preguntas</th>";
        echo "<th id= 'estado'>Estado</th>";
        echo "<th colspan ='2'>Acciones</th>";
        echo "</tr>";

        while ($datos = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo "<td>" . $datos['pregunta'] . "</td>";
            echo "<td>" . $datos['estado'] . "</td>";
            echo "<td> <a target='derecha' href='eliminar_pregunta.php?id_pregunta=" . $datos['id_pregunta'] . "'><button class='btn btn-danger'>Eliminar</button></a></td>";
            echo "<td> <a target='derecha' href='modificar_pregunta.php?id_pregunta=" . $datos['id_pregunta'] . "'><button class='btn btn-primary'>Modificar</button></a></td>";
            echo "</tr>";
        }

        mysqli_close($conn);
        echo "</table>";
        ?>

        <h2>Agregar preguntas</h2>
        <form action="guardar_preguntas.php" method="post">
            <input type="hidden" name="id_encuesta" id="id_encuesta" value=" <?php echo $id_encuesta; ?>">

            <div class="form-group col-md-5">
                Pregunta 1:
                <input class="form-control" type="text" name="p1" id="p1" placeholder="Ingrese la pregunta">
            </div>
            <div class="form-group col-md-5">
                Pregunta 2:
                <input class="form-control" type="text" name="p2" id="p2" placeholder="Ingrese la pregunta">
            </div>
            <div class="form-group col-md-5">
                Pregunta 3:
                <input class="form-control" type="text" name="p3" id="p3" placeholder="Ingrese la pregunta">
            </div>
            <div>
                <input class='btn btn-success' type="submit" value="Guardar">
            </div>


        </form>
    </center>


</body>

</html>