<?php


include 'conexion.php';
$id_area = $_GET['id_area'];

mysqli_query($conn, "DELETE from areas where id_area = '$id_area'")
    or die("error al eliminar los datos");

mysqli_close($conn);
include_once 'ver_area_departamento.php';
?>