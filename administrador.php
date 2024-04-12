<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos2.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<title>administrador</title>

</head>

<body>


	<?php
	session_start();
	if (isset($_SESSION['correo'])) {

	} else {
		header("Location: cerrar_sesion.php");
	}

	?>

	<center><strong>><p style="color:#000000;">BIENVENIDO ADMINISTRADOR <?php echo $_SESSION['correo']; ?></p></strong>
	</center>
	<ul class="menu">
		<!--<li class="active" > <a href="#"><i class="fa fa-user-circle icono izquierda"></i> Alta de usuarios. <i class="icono derecha fa fa-chevron-down"></i></a>
	<ul>
		<li><a target="derecha" href="registro_administrador.php" >Administrador o encuestado.</a></li>
		<li><a target="derecha" href="registro_usuario.php">Subordinado.</a></li>
	</ul> </li>
	<li class="active"><a href="#"><i class="fas fa-list-alt icono izquierda"></i>Administración de encuesta. <i class="icono derecha fa fa-chevron-down"></i></a>
	<ul>
		<li><a target="derecha" href="agregar_encuesta.php">Nueva encuesta.</a></li>
		<li><a target="derecha" href="agregar_preguntas.php">Modificar, agregar, ver preguntas.</a></li>
		<li><a target="derecha" href="vista_previa.php">Vista previa.</a></li>
	</ul></li>-->
		<li><a target="derecha" href="registro_administrador.php"><i class="fa fa-user-circle icono izquierda"></i>Alta
				de administrador</a>
		</li>
		<li><a target="derecha" href="registro_usuario.php"><i class="fas fa-qrcode icono izquierda"></i>Generación de
				código</a>
		</li>
		<li><a target="derecha" href="administracion_contra.php"><i
					class="fa fa-key icono izquierda"></i>Contraseñas</a>

		</li>
		<li><a target="derecha" href="buscador.php"><i class="fa fa-search icono izquierda"></i>Verificación de
				resultados</a></li>
	</ul>


	<center><a target="_top" href="cerrar_sesion.php"><button class="btn btn-dark boton">Cerrar sesión</button></a>
		<script src="js/js.js"></script>
		<!--<div>
			<footer>Everlever´s creations</footer>
		</div>-->
	</center>
</body>

</html>