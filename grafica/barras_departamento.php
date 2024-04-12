<?php
include_once "../conexion.php";
$departamento = $_GET['departamento'];
$sql = "SELECT nombre,promedio FROM respuestas_departamentos WHERE departamento = '$departamento'";
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
<div id="graficabarras">

</div>
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

	Plotly.newPlot('graficabarras', data);
</script>
<?php include_once 'resultado_departamento1.php';
?>