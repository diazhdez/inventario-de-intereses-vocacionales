<?php

include 'conexion.php';
#if ($conn){
#echo "conectado";
#}

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_inicial = $_POST['fecha_inicial'];
$fecha_final = $_POST['fecha_final'];
$estado = $_POST['estado'];


$sql = "INSERT INTO encuestas (titulo,descripcion,fecha_inicial,fecha_final,estado) VALUES('$titulo','$descripcion','$fecha_inicial','$fecha_final','$estado')";

$result = $conn->query($sql);

mysqli_close($conn);

$datos3 = "Datos guardados con exito";
include_once 'agregar_encuesta.php';


?>