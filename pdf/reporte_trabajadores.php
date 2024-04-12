<?php
include 'plantillac.php';
require 'conexion.php';

$query = "SELECT * FROM respuestas_areas WHERE area != '1' ORDER BY area";
$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY(35);
$pdf->Cell(50, 6, 'NOMBRE', 1, 0, 'C', 1);
$pdf->Cell(60, 6, 'EDAD', 1, 0, 'C', 1);
$pdf->Cell(40, 6, utf8_decode('ESCUELA'), 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'CODIGO', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'FECHA', 1, 1, 'C', 1);


$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(50, 6, utf8_decode($row['nombre']), 1, 0, 'C');
	$pdf->Cell(60, 6, utf8_decode($row['area']), 1, 0, 'C');
	$pdf->Cell(40, 6, round($row['promedio'], 1), 1, 0, 'C');
	$pdf->Cell(40, 6, utf8_decode($row['valoracion']), 1, 1, 'C');
}
$pdf->Output();
?>