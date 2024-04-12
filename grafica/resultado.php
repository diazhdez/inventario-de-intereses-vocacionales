<?php
session_start();
if (isset($_SESSION['correo'])) {

} else {
	header("Location: cerrar_sesion.php");
}
include_once "../conexion.php";

$consulta = mysqli_query($conn, "SELECT * FROM respuestas_generales")
	or die("error al actualizar los datos");
$sql = "SELECT area,promedio FROM respuestas_generales ";
$sql1 = "SELECT SUM(promedio) as total FROM respuestas_generales ";
$result1 = mysqli_query($conn, $sql1);
;

$sumar = mysqli_fetch_assoc($result1);
$row_cnt = $consulta->num_rows;
/*echo "nummero de resultados ".$row_cnt;
echo "<br>";
echo $sumar['total'];*/
$promedio = $sumar['total'] / $row_cnt;
//echo "el promedio es: ".$promedio;

$result = mysqli_query($conn, $sql);
$valoresy = array();//porcentaje
$valoresx = array();//nombres
while ($ver = mysqli_fetch_row($result)) {
	$valoresy[] = $ver[1];
	$valoresx[] = $ver[0];
}
$datosx = json_encode($valoresx);
$datosy = json_encode($valoresy);
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!--<link rel="stylesheet" type="text/css" href="libreria/plotly-latest.min.js">-->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
	<title>Resutado General</title>
</head>

<body>
	<center>
		<h1>Resultados Generales</h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-primary">
						<div class="panel panel-heading">Promedio General
							<?php echo round($promedio, 1); ?>
						</div>
						<div class="panel panel-body">

							<div class="col-sm-8">
								<div id="myDiv">


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form action="pdf/" method="post">

			</form>
			<!-- qui va el boton para imprimir reporte------<a target ='derecha'  href='../resultados/resultado_area.php' ><button class='btn btn-primary '>Regresar </button></a>-->
	</center>
</body>

</html>
<script type="text/javascript">
	function crearcadenabarra(json) {
		var parsed = JSON.parse(json);
		var arr = [];
		for (var x in parsed) {
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">
	datosx = crearcadenabarra('<?php echo $datosx; ?>');
	datosy = crearcadenabarra('<?php echo $datosy; ?>');
	var data = [
		{
			x: datosx,
			y: datosy,
			type: 'bar'
		}
	];

	Plotly.newPlot('myDiv', data);
</script>