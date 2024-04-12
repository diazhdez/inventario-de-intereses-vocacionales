<?php
include_once "../conexion.php";
$consulta = mysqli_query($conn, "SELECT DISTINCT departamento FROM respuestas ORDER BY id_subordinado ")
    or die("error al actualizar los datos");
$row_cnt = $consulta->num_rows;
//echo "numero de resultados: ".$row_cnt;
?>
<!DOCTYPE html>
<html>

<head>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Resultado por Departamento</title>
    </head>

<body>
    <center>
        <br>
        <h2>Departamentos</h2>

        <?php
        if ($datos = mysqli_fetch_array($consulta)) {
            echo "<ul class='list-group col-sm-6'>";
            while ($datos = mysqli_fetch_array($consulta)) {

                echo "<li class='list-group-item list-group-item-action'>";
                echo "<a href='../grafica/barras_departamento.php?departamento=" . $datos['departamento'] . "'>" . $datos['departamento'] . "</a>";
                echo "<br>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<h3>Aun no hay resultados por departamento</h3>";
            exit();
        }
        ?>
    </center>
</body>

</html>