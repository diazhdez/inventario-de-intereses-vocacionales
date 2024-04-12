<?php

include 'conexion.php';
$id_pregunta = $_POST['id_pregunta'];
$pregunta = $_POST['p'];
$estado = $_POST['estado'];

$query = "UPDATE preguntas SET pregunta='$pregunta',estado='$estado'  WHERE id_pregunta='$id_pregunta'";
$resultado = $conn->query($query);
if ($resultado > 0) {

  $modificado = "Datos modificados correctamentes";
  include_once 'agregar_preguntas.php';
} else {
  echo "ocurrio un error";
}
?>