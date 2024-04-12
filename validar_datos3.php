<?php
require 'conexion.php';
session_start();

$correo = $_POST['correo'];
#echo $correo;
//$password  = $_POST['pass'];
#echo $password;


$query = "SELECT * FROM jefes WHERE correo = '$correo'";

$resultado = $conn->query($query);

if ($row = $resultado->fetch_assoc()) {
	if ($row['nombre'] != '') {
		$_SESSION['id_jefes'] = $row['id_jefes'];
		header('location: Highcharts-7.1.2/index.php');
	} else {
		if ($row['tipo_usuario'] == '') {
			$_SESSION['id_jefes'] = $row['id_jefes'];
			$_SESSION['correo'] = $row['correo'];
			include_once 'framedatos.php';

		} else {
			$errorvalidacion = "Usuario no valido";
			include_once 'index.php';
		}

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