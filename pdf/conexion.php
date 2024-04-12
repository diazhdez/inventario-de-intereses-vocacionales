<?php
//servidor, usuario de base de datos, contrase�a del usuario, nombre de base de datos
$mysqli = new mysqli("localhost", "root", "IORIyagami300", "inventario");

if (mysqli_connect_errno()) {
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
}