<?php

include 'conexion.php';
if ($conn) {
    echo "conectado";
}

$tipo_usuario = $_POST['tipo_usuario'];
echo $tipo_usuario;
$nombre = $_POST['nombre'];
echo $nombre;
$ap = $_POST['ap'];
echo $ap;
$am = $_POST['am'];
echo $am;
$correo = $_POST['correo'];
echo $correo;
$password = $_POST['pass'];
echo $password;

$sql = "INSERT INTO jefes (nombre,ap,am,tipo_usuario,correo,password) VALUES('$nombre','$ap','$am','$tipo_usuario','$correo','$password')";

$result = $conn->query($sql);

mysqli_close($conn);

$datos1 = "Datos guardados con exito";
include_once 'administrador.php';
