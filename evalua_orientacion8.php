<?php

include 'conexion.php';


$id_jefes = $_POST['id_jefes'];
$uno = $_POST['uno'];
$dos = $_POST['dos'];
$tres = $_POST['tres'];
if ($uno == 1) {
    $carrera = "Desarrollo de negocios";
    $sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

    $result = $conn->query($sql);

}
if ($uno == 2) {
    $carrera = "Tecnologías de la información";
    $sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

    $result = $conn->query($sql);

}
if ($dos == 1) {
    $carrera = "Desarrollo de negocios";
    $sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

    $result = $conn->query($sql);

}
if ($dos == 3) {
    $carrera = "Gastronomía";
    $sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

    $result = $conn->query($sql);

}
if ($tres == 1) {
    $carrera = "Desarrollo de negocios";
    $sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

    $result = $conn->query($sql);

}
if ($tres == 4) {
    $carrera = "Mantenimiento Industrial";
    $sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

    $result = $conn->query($sql);

}



$consulta1 = mysqli_query($conn, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Tecnologías de la Información'");
$row_cnt1 = $consulta1->num_rows;


$sql = "INSERT INTO puntos (id_jefes,tics) VALUES('$id_jefes','$row_cnt1')";
$result = $conn->query($sql);



$consulta2 = mysqli_query($conn, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Gastronomía'");
$row_cnt2 = $consulta2->num_rows;


$sql = "UPDATE puntos SET gastronomia = '$row_cnt2' WHERE id_jefes='$id_jefes'";
$result = $conn->query($sql);


$consulta3 = mysqli_query($conn, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Mantenimiento Industrial'");
$row_cnt3 = $consulta3->num_rows;


$sql = "UPDATE puntos SET mantenimiento = '$row_cnt3' WHERE id_jefes='$id_jefes'";
$result = $conn->query($sql);


$consulta4 = mysqli_query($conn, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Desarrollo de negocios'");
$row_cnt4 = $consulta4->num_rows;


$sql = "UPDATE puntos SET desarrollo = '$row_cnt4' WHERE id_jefes='$id_jefes'";
$result = $conn->query($sql);




mysqli_close($conn);

$datos1 = "Datos guardados con exito";
header('location: Highcharts-7.1.2/index.php');

