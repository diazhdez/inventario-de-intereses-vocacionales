<?php
session_start();
include 'plantilla.php';
require 'conexion.php';
$id_jefes = $_GET['id_jefes'];

error_reporting(1);
$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
date_default_timezone_get('America/Mexico_City');
$fecha = date("m/d/y ");
$fechahora = $fecha . "-" . $hora->format('H:i:s');

$query = "SELECT * FROM jefes WHERE id_jefes = '$id_jefes'";

$resultado = $mysqli->query($query);

$consulta1 = mysqli_query($mysqli, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Tecnologías de la Información'");
$row_cnt1 = $consulta1->num_rows;

$consulta2 = mysqli_query($mysqli, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Gastronomía'");
$row_cnt2 = $consulta2->num_rows;

$consulta3 = mysqli_query($mysqli, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Mantenimiento Industrial'");
$row_cnt3 = $consulta3->num_rows;

$consulta4 = mysqli_query($mysqli, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Desarrollo de negocios'");
$row_cnt4 = $consulta4->num_rows;

if ($row_cnt1 >= $row_cnt2 and $row_cnt1 >= $row_cnt3 and $row_cnt1 >= $row_cnt4) {
	$carrera = "Tecnologías de la Información";

}
if ($row_cnt2 >= $row_cnt1 and $row_cnt2 >= $row_cnt3 and $row_cnt2 >= $row_cnt4) {
	$carrera = "Gastronomía";

}
if ($row_cnt3 >= $row_cnt1 and $row_cnt3 >= $row_cnt2 and $row_cnt3 >= $row_cnt4) {
	$carrera = "Mantenimiento Industrial";

}
if ($row_cnt4 >= $row_cnt1 and $row_cnt4 >= $row_cnt2 and $row_cnt4 >= $row_cnt3) {
	$carrera = "Desarrollo de Negocios";

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetY(40);
$pdf->SetFillColor(2, 200, 200);
$pdf->SetFont('Arial', 'B', 12);

$pdf->SetY(54);
$pdf->Cell(60, 6, 'NOMBRE', 1, 0, 'C', 0);
$pdf->Cell(20, 6, 'EDAD', 1, 0, 'C', 0);
$pdf->Cell(60, 6, utf8_decode('ESCUELA'), 1, 0, 'C', 0);
$pdf->Cell(20, 6, utf8_decode('CÓDIGO'), 1, 0, 'C', 0);
$pdf->Cell(30, 6, 'FECHA', 1, 1, 'C', 0);

$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(60, 6, utf8_decode($row['nombre'] . " " . $row['ap'] . " " . $row['am']), 1, 0, 'C');
	$pdf->Cell(20, 6, utf8_decode($row['edad']), 1, 0, 'C');
	$pdf->Cell(60, 6, utf8_decode($row['institucion']), 1, 0, 'C');
	$pdf->Cell(20, 6, ($row['correo']), 1, 0, 'C');
	$pdf->Cell(30, 6, utf8_decode($fechahora), 1, 1, 'C');

}
$query = "SELECT * FROM jefes WHERE id_jefes = '$id_jefes'";

$resultado = $mysqli->query($query);

$row = $resultado->fetch_assoc();
$carrera1 = $row['carrera'];
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY(76);
$pdf->Cell(190, 14, utf8_decode('A continuación le mostramos el resultado de la evaluación de acuerdo al Inventario de Intereses'), 1, 1, 'C');

$query2 = "SELECT * FROM puntos WHERE id_jefes = '$id_jefes'";

$resultado2 = $mysqli->query($query2);

while ($row2 = $resultado2->fetch_assoc()) {

	$pdf->Cell(190, 14, utf8_decode('Tecnologias de la informacion: ' . $row2['tics'] . ' puntos'), 1, 1, 'C');
	$pdf->Cell(190, 14, utf8_decode('Gastronomia: ' . $row2['gastronomia'] . ' puntos'), 1, 1, 'C');
	$pdf->Cell(190, 14, utf8_decode('Mantenimiento Industrial: ' . $row2['mantenimiento'] . ' puntos'), 1, 1, 'C');
	$pdf->Cell(190, 14, utf8_decode('Desarrollo de Negocios: ' . $row2['desarrollo'] . ' puntos'), 1, 1, 'C');

	$pdf->Cell(190, 14, utf8_decode('La carrera a la que te postulaste es: ' . $carrera1), 1, 0, 'C');
}
$pdf->Output();
?>