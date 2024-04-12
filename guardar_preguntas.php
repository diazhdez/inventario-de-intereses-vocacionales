<?php

include 'conexion.php';
$id_encuesta = $_POST['id_encuesta'];
$estado = "activado";

$pregunta = $_POST['p1'];
if ($pregunta != '') {

	$sql = "INSERT INTO preguntas (id_enc,pregunta,estado) VALUES('$id_encuesta','$pregunta','$estado')";

	$result = $conn->query($sql);

}

$pregunta2 = $_POST['p2'];
if ($pregunta2 != '') {

	$sql2 = "INSERT INTO preguntas (id_enc,pregunta,estado) VALUES('$id_encuesta','$pregunta2','$estado')";

	$result2 = $conn->query($sql2);

}

$pregunta3 = $_POST['p3'];
if ($pregunta3 != '') {
	$sql3 = "INSERT INTO preguntas (id_enc,pregunta,estado) VALUES('$id_encuesta','$pregunta3','$estado')";

	$result3 = $conn->query($sql3);


}

$datos = "Datos guardados con exito";
include_once 'agregar_preguntas.php';
