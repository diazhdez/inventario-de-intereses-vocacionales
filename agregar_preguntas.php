<?php

session_start();
if (isset($_SESSION['correo'])) {

} else {
	header("Location: cerrar_sesion.php");
}

include 'conexion.php';


?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilosadministrador.css">
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title></title>
</head>

<body>
	<h1>Encuestas</h1>
	<p>Selecione el titulo de la encuesta a la que quiera agregar o ver preguntas</p>
	<?php
	$consulta = mysqli_query($conn, "SELECT * FROM encuestas")
		or die("error al actualizar los datos");
	echo "<table class='table table-sm table-bordered table-hover'>";
	echo "<tr class='table-primary'>";
	echo "<th id= 'titulo'>Titulo</th>";
	echo "<th id= 'descripcion'>Descripción</th>";
	echo "<th id= 'fecha_inicial'>Fecha de inicio</th>";
	echo "<th id= 'fecha_final'>Fecha final</th>";
	echo "<th id= 'estado'>Estado</th>";
	echo "<th colspan ='2'>Acciones</th>";
	echo "</tr>";

	while ($datos = mysqli_fetch_array($consulta)) {
		echo "<tr>";
		echo "<td><a target='derecha' href='agregar_preguntas2.php?id_encuesta=" . $datos['id_encuesta'] . "&titulo=" . $datos['titulo'] . "'>" . $datos['titulo'] . "</a></td>";
		echo "<td>" . $datos['descripcion'] . "</td>";
		echo "<td>" . $datos['fecha_inicial'] . "</td>";
		echo "<td>" . $datos['fecha_final'] . "</td>";
		echo "<td>" . $datos['estado'] . "</td>";
		echo "<td> <a target='derecha' href='modificar_encuesta.php?id_encuesta=" . $datos['id_encuesta'] . "'><button class='btn btn-primary'>Modificar</button></a></td>";
		echo "<td> <a target='derecha' href='eliminar_encuesta.php?id_encuesta=" . $datos['id_encuesta'] . "'><button class='btn btn-danger'>Eliminar</button></a></td>";
		echo "</tr>";
	}

	mysqli_close($conn);
	echo "</table>";
	?>
</body>

</html>