<?php
session_start();

$id_jefes = $_SESSION['id_jefes'];

?>
<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/radio.css">

	<title>Competencias</title>
</head>

<body>
	<center>
		<h2>Objetivo</h2>

		<div>
			<div class="col-md-7 text-justify border">

				<p class="lead">El siguiente cuestionario es una herramienta para conocer sus intereses vocacionales.
					Este inventario comprende una lista de preguntas acerca de lo que le gusta o no le gusta a una
					persona, sus preferencias y costumbres en la vida diaria.</p>




			</div>
		</div>
		<br>
		<h2>Instrucciones</h2>

		<div>
			<div class="col-md-7 text-justify border">

				<p class="lead">Para contestar las preguntas seleccione la casilla a la derecha de la pregunta
					correspondiente a la respuesta escogida por usted de acuerdo a sus intereses personales. Aquí no hay
					respuestas correctas o equivocadas.
					Este cuestionario servirá de apoyo para conocer más a fondo sus intereses personales, por lo que lo
					invitamos a cumplir con el aviso de ética.
				</p>




			</div>
		</div>
		<br>

		<div class="card" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Aviso de ética</h5>
				<p class="card-text">Acepto contestar con completa sinceridad el siguiente cuestionario</p>

				<a href="encuestab1.php" class="card-link"><button class="btn btn-primary">Acepto</button></a>


			</div>
		</div>

	</center>

</body>

</html>