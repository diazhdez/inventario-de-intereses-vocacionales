<?php

include 'conexion.php';
$id_area = $_POST['id_area'];
$tipo = $_POST['tipo'];
$titulo = $_POST['titulo'];
//echo $id_area." ".$tipo." ".$titulo;
//echo "<br>";

if ($tipo == "2") {
	//echo "area: ".$tipo;
	$query = "UPDATE areas SET area='$titulo'  WHERE id_area='$id_area'";
	$resultado = $conn->query($query);

	include_once 'ver_area_departamento.php';

}
if ($tipo == "1") {
	//echo "Departamento ".$tipo;
	$query = "UPDATE areas SET departamento='$titulo'  WHERE id_area='$id_area'";
	$resultado = $conn->query($query);
	include_once 'ver_area_departamento.php';

}


?>