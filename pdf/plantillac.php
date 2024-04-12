<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
	function Header()
	{
		$this->Image('../img/favicon1.png', 5, 5, 30);
		$this->SetFont('Arial', 'B', 15);
		$this->Cell(40);
		$this->Cell(120, 10, utf8_decode('Reporte de evaluación'), 0, 0, 'C');
		$this->Ln(20);
	}

	function Footer()
	{
		$this->SetY(-11);
		$this->Cell(0, 10, utf8_decode('Everlever´s creation'), 0, 0, 'C');
		$this->SetY(-15);
		$this->SetFont('Arial', 'I', 8);
		$this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}
?>