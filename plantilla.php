<?php
	require 'fpdf/fpdf.php';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/fs.jpg', 5, 5, 30 );
      $this->Image('img/logo.png', 155, 10, 50 );
			$this->SetFont('Arial','B',20);
			$this->Cell(30);
			$this->Cell(120,20, 'RESULTADOS DEL TEST',0,0,'C');
			$this->Ln(40);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}
?>
