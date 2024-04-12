<?php
//$pdf->SetFillColor(255, 99, 71);
//rect(x,horizontal==,y vertical ||,whidth ancho,height largo);
//$pdf->Rect(10, 35, 140, 100, 'F');
//sirve para dibujar una linea,como tipo borde $pdf->Line(10, 35, 15, 40);
//$pdf->SetXY(15,60);
//$pdf->Cell(15, 6, '10, 35', 0 , 1);
//	$pdf->SetFont('Arial','',10);

/*while($row = $resultado->fetch_assoc())

   {
	   $pdf->Cell(40,6,utf8_decode($row['titulo']),1,0,'C');
	   $pdf->Cell(60,6,utf8_decode($row['descripcion']),1,0,'C');
	   $pdf->Cell(30,6,utf8_decode($row['fecha_final']),1,0,'C');
	   $pdf->Cell(60,6,utf8_decode($row['pregunta']),1,1,'C');
   }*/
//color AZUL $pdf->SetFillColor(80, 150, 200);
//$pdf->Rect(10, 10, 95, 20, 'F');
//$pdf->Line(10, 10, 15, 15);
//$pdf->SetXY(15, 15);
//$pdf->Cell(15, 6, '10, 10', 0 , 1);
//color verde lima
include 'plantillac.php';
require 'conexion.php';
//$query = "SELECT encuestas.titulo,encuestas.descripcion,encuestas.fecha_inicial,preguntas.pregunta FROM encuestas INNER JOIN preguntas";
$query = mysqli_query($mysqli, "SELECT encuestas.titulo,encuestas.fecha_inicial,preguntas.pregunta FROM encuestas INNER JOIN preguntas ORDER BY id_encuesta");
//$consulta = mysqli_query ($mysqli,"SELECT * FROM preguntas ORDER BY id_enc")
//or die ("error al actualizar los datos");
//$resultado = $mysqli->query($query);
//$row = $resultado->fetch_assoc();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetY(35);
//rect(x,horizontal==,y vertical ||,whidth ancho,height largo);
$pdf->SetFillColor(153, 255, 100);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 6, 'Titulo', 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 10);
$i = 1;

//$pdf->SetFont('Arial','B',12);
$pdf->SetXY(60, 35);
$pdf->Cell(110, 6, 'Preguntas', 1, 0, 'C', 1);
$pdf->SetXY(170, 35);
//$pdf->SetFont('Arial','B',12);
$pdf->Cell(30, 6, 'Fecha', 1, 1, 'C', 1);

while ($row = mysqli_fetch_assoc($query)) {
	$pdf->Cell(50, 6, utf8_decode($row['titulo']), 1, 1, 'C');
	// while($row1 = mysqli_fetch_assoc($consulta))
	//$pdf->SetX(60);
	$pdf->Cell(110, 6, utf8_decode($i . ':' . $row['pregunta']), 1, 1, 'C');
	$i++;
}
$pdf->SetX(170);
$pdf->Cell(30, 6, utf8_decode($row['fecha_inicial']), 1, 1, 'C');

$pdf->Output();

?>