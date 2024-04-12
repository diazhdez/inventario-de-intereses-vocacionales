<?php
error_reporting(1);
session_start();

include_once "../conexion.php";
$id_jefes = $_GET['id_jefes'];
$consulta1 = mysqli_query($conn, "SELECT * FROM jefes WHERE id_jefes = '$id_jefes'")
	or die("error al actualizar los datos");
$datos1 = mysqli_fetch_array($consulta1);
$nombre = $datos1['nombre'] . " " . $datos1['ap'];
$consulta = mysqli_query($conn, "SELECT * FROM respuestas WHERE id_subordinado = '$id_jefes'")
	or die("error al actualizar los datos");
$sql = "SELECT titulo,opcion FROM respuestas WHERE id_subordinado = '$id_jefes'";
$sql1 = "SELECT SUM(opcion) as total FROM respuestas WHERE id_subordinado = '$id_jefes'";
$result1 = mysqli_query($conn, $sql1);
;

$sumar = mysqli_fetch_assoc($result1);
$row_cnt = $consulta->num_rows;
/*echo "nummero de resultados ".$row_cnt;
echo "<br>";
echo $sumar['total'];*/
$res = $sumar['total'] / $row_cnt;
//echo "el promedio es: ".$promedio;
if ($res <= 20) {
	$resultado1 = 'Nada productivo';

} else if (($res >= 21.0) and ($res <= 35.9)) {
	$resultado1 = "Nada productivo";

} else if (($res >= 36) and ($res <= 51.9)) {

} else if (($res >= 52) and ($res <= 67.9)) {
	$resultado1 = "Regular";

} else if (($res >= 68) and ($res <= 83.9)) {
	$resultado1 = "Productivo";

} else if (($res >= 84) and ($res <= 100)) {
	$resultado1 = "Muy productivo";

}

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
	<title>Resutados trabajador</title>
</head>

<body>
	<center>
		<h1>Resultados del Colaborador</h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-primary">
						<div class="panel panel-heading">
							<h5>Promedio del colaborador
								<?php echo " " . $nombre;
								echo " " . round($res, 1) . " " . $resultado1; ?>
							</h5>
						</div>
						<div class="panel panel-body">

							<div class="col-sm-10">
								<div id="myDiv">


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form action="pdf/" method="post">

			</form>
			<?php if ($_SESSION['tipo_usuario'] == 'administrador') {
				?>
				<a target='derecha' href='../resultados/resultado_trabajador.php'><button class='btn btn-primary '>Regresar
					</button></a>
				<?php
			} else {
			}
			?>
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