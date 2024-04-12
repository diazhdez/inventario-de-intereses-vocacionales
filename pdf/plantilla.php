<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
	function Header()
	{
		$this->Image('../img/favicon1.png', 5, 5, 30);
		$this->SetFont('Arial', 'B', 15);
		$this->Cell(40);
		$this->Cell(120, 10, utf8_decode('Universidad Tecnológica de Acapulco'), 1, 1, 'C');
		$this->SetX(50);
		$this->Cell(120, 10, utf8_decode('Departamento de Psicopedagogia'), 0, 1, 'C');
		$this->SetX(50);
		$this->Cell(120, 10, utf8_decode('Inventario de Intereses Vocacionales'), 0, 1, 'C');
		$this->SetX(50);
		$this->Ln(20);
	}

	function Footer()
	{
		$this->SetY(-11);
		$this->Cell(0, 10, utf8_decode('Grupo investigador de la Universidad Tecnológica de Acapulco'), 0, 0, 'C');
		$this->SetY(-15);
		$this->SetFont('Arial', 'I', 8);
		$this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}
?>