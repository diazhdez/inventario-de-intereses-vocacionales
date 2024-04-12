<?php

include 'conexion.php';
$id_pregunta = $_GET['id_pregunta'];

mysqli_query($conn, "DELETE from preguntas where id_pregunta = '$id_pregunta'")
    or die("error al eliminar los datos");

mysqli_close($conn);
include_once "agregar_preguntas.php";
