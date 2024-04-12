<?php
require 'conexion.php';
session_start();

$correo = $_POST['correo'];
#echo $correo;
$password = $_POST['pass'];
#echo $password;


$query = "SELECT * FROM jefes WHERE correo = '$correo' AND password = '$password'";

$resultado = $conn->query($query);
if ($row = $resultado->fetch_assoc()) {
	if ($row['tipo_usuario'] == 'administrador') {
		$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
		$_SESSION['correo'] = $row['correo'];
		include_once 'frame.html';
		$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
		$_SESSION['correo'] = $row['correo'];
		include_once 'administrador.php';
	} else if ($row['tipo_usuario'] == 'jarea') {
		$_SESSION['correo'] = $row['correo'];
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['area'] = $row['area'];
		$_SESSION['tipo_usuario'] = $row['tipo_usuario'];

		header("Location: evaluador/frame.php");
	} else if ($row['tipo_usuario'] == 'jdepartamento') {
		$_SESSION['correo'] = $row['correo'];
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['departamento'] = $row['departamento'];
		$_SESSION['tipo_usuario'] = $row['tipo_usuario'];

		header("Location: evaluador/frame.php");
	} else {
		$errorvalidacion = "Usuario no valido";
		include_once 'index.php';
	}

} else {
	$errorvalidacion = "usuario o contraseña incorrecto";
	include_once 'index.php';
}

if (!$query) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
}


?>