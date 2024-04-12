<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
	header("Location: cerrar_sesion.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilosadministrador.css">
	<title>Ver usuarios</title>
</head>

<body>
	<center>
		<h1>Administración de usuarios</h1>
	</center>
	<h2>Administradores</h2>

	<?php
	include 'conexion.php';
	$consulta = mysqli_query($conn, "SELECT * FROM jefes WHERE tipo_usuario = 'administrador'")
		or die("error al actualizar los datos");

	echo "<table class='table table-sm table-bordered table-hover table-condensed'>";

	echo "<tr  class='table-primary'>";

	echo "<th id= 'nombre'>Nombre</th>";
	echo "<th id= 'ap'>Apellido paterno</th>";
	echo "<th id= 'am'>Apellido materno</th>";
	echo "<th id= 'tipo_usuario'>Usuario</th>";
	echo "<th id= 'correo'>Correo Electronico</th>";
	echo "<th id= 'pass'>Contraseña</th>";
	echo "<th colspan ='2'>Acciones</th>";

	echo "</tr>";

	while ($datos = mysqli_fetch_assoc($consulta)) {
		echo "<tr>";

		echo "<td>" . $datos['nombre'] . "</td>";
		echo "<td>" . $datos['ap'] . "</td>";
		echo "<td>" . $datos['am'] . "</td>";
		echo "<td>" . $datos['tipo_usuario'] . "</td>";
		echo "<td>" . $datos['correo'] . "</td>";
		echo "<td>" . $datos['password'] . "</td>";

		echo "<td> <a target='derecha' href='modificar_administrador.php?id_jefes=" . $datos['id_jefes'] . "'><button class='btn btn-primary'>Modificar</button></a></td>";
		echo "<td> <a target='derecha' href='eliminar_administrador.php?id_jefes=" . $datos['id_jefes'] . "'><button class='btn btn-danger'>Eliminar</button></a></td>";
		echo "</tr>";
	}

	mysqli_close($conn);
	echo "</table>";

	?>



</body>

</html>