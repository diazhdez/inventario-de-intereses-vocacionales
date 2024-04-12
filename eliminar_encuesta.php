<?php

include 'conexion.php';
$id_encuesta = $_GET['id_encuesta'];

mysqli_query($conn, "DELETE from encuestas where id_encuesta = '$id_encuesta'")
    or die("error al eliminar los datos");

mysqli_close($conn);
include_once 'agregar_preguntas.php';
?>