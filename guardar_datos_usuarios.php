<?php

include 'conexion.php';


$nombre = $_POST['nombre'];




$sql = "INSERT INTO jefes (correo) VALUES('$nombre')";

$result = $conn->query($sql);

mysqli_close($conn);

$datos1 = "Datos guardados con exito";
include_once 'registro_usuario.php';