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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilosadministrador.css">
	<title>ver usuarios</title>
</head>

<body>
	<center>
		<h1>Areas</h1>
	</center>

	<?php
	include 'conexion.php';
	$consulta = mysqli_query($conn, "SELECT * FROM areas where area !=''")
		or die("error al actualizar los datos");

	echo "<table class='table table-sm table-bordered table-hover table-condensed'>";

	echo "<tr  class='table-primary'>";

	echo "<th id= 'titulo'>Titulo</th>";

	echo "<th colspan ='2'>Acciones</th>";

	echo "</tr>";

	while ($datos = mysqli_fetch_assoc($consulta)) {
		echo "<tr>";

		echo "<td>" . $datos['area'] . "</td>";

		echo "<td> <a target='derecha' href='modificar_area_departamento.php?id_area=" . $datos['id_area'] . "'><button   class='btn btn-primary'>Modificar</button></a></td>";
		echo "<td> <a target='derecha' href='eliminar_area_departamento.php?id_area=" . $datos['id_area'] . "'><button class='btn btn-danger' >Eliminar</button></a></td>";
		echo "</tr>";
	}

	mysqli_close($conn);
	echo "</table>";

	?>
	<center>
		<h1>Departamentos</h1>
	</center>

	<?php
	include 'conexion.php';
	$consulta1 = mysqli_query($conn, "SELECT * FROM areas where departamento !=''")
		or die("error al actualizar los datos");

	echo "<table class='table table-sm table-bordered table-hover table-condensed'>";

	echo "<tr  class='table-primary'>";

	echo "<th id= 'titulo'>Titulo</th>";

	echo "<th colspan ='2'>Acciones</th>";

	echo "</tr>";

	while ($datos1 = mysqli_fetch_assoc($consulta1)) {
		echo "<tr>";

		echo "<td>" . $datos1['departamento'] . "</td>";

		echo "<td> <a target='derecha' href='modificar_area_departamento.php?id_area=" . $datos1['id_area'] . "'><button   class='btn btn-primary'>Modificar</button></a></td>";
		echo "<td> <a target='derecha' href='eliminar_area_departamento.php?id_area=" . $datos1['id_area'] . "'><button class='btn btn-danger' >Eliminar</button></a></td>";
		echo "</tr>";
	}

	mysqli_close($conn);
	echo "</table>";

	?>



</body>

</html>