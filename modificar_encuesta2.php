<?php

include 'conexion.php';
$id_encuesta = $_POST['id_encuesta'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_inicial = $_POST['fecha_inicial'];
$fecha_final = $_POST['fecha_final'];
$estado = $_POST['estado'];

$query = "UPDATE encuestas SET titulo='$titulo',descripcion='$descripcion',fecha_inicial='$fecha_inicial',fecha_final='$fecha_final',estado='$estado' WHERE id_encuesta='$id_encuesta'";
$resultado = $conn->query($query);
if ($resultado > 0) {

  $modificado = "Datos modificados correctamentes";
  include_once 'agregar_preguntas.php';
} else {
  echo "ocurrio un error";
}
?>