<?php

include 'conexion.php';


$id_jefes = $_POST['id_jefes'];
$uno = $_POST['uno'];
$dos = $_POST['dos'];
$tres = $_POST['tres'];
if ($uno == 1) {
	$carrera = "Mantenimiento Industrial";
	$sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

	$result = $conn->query($sql);

}
if ($uno == 2) {
	$carrera = "Tecnologías de la información";
	$sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

	$result = $conn->query($sql);

}
if ($dos == 1) {
	$carrera = "Mantenimiento Industrial";
	$sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

	$result = $conn->query($sql);

}
if ($dos == 3) {
	$carrera = "Gastronomía";
	$sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

	$result = $conn->query($sql);

}
if ($tres == 1) {
	$carrera = "Mantenimiento Industrial";
	$sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

	$result = $conn->query($sql);

}
if ($tres == 4) {
	$carrera = "Desarrollo de negocios";
	$sql = "INSERT INTO respuestas (id_jefes,carrera) VALUES('$id_jefes','$carrera')";

	$result = $conn->query($sql);

}


mysqli_close($conn);

$datos1 = "Datos guardados con exito";
include_once 'encuestab4.php';
