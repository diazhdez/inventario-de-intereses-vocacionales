<?php

include 'conexion.php';
#if ($conn){
#echo "conectado";
#}

$area = $_POST['ad'];
$titulo = $_POST['titulo'];
if ($area == 'Departamento') {
    $sql = "INSERT INTO areas (departamento) VALUES('$titulo')";

    $result = $conn->query($sql);

    mysqli_close($conn);

    $datos = "Datos guardados con exito";
    include_once 'alta_area_departamento.php';
}
if ($area == 'Area') {
    $sql = "INSERT INTO areas (area) VALUES('$titulo')";

    $result = $conn->query($sql);

    mysqli_close($conn);

    $datos = "Datos guardados con exito";
    include_once 'alta_area_departamento.php';
}
