<?php
	include 'database.php';
  require 'fpdf/fpdf.php';

  $pdo = Database::connect();
  $sql = 'SELECT * FROM sugerencias ORDER BY id DESC';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/fs.jpg', 25, 5, 30 );
      $this->Image('img/logo.png', 200, 15, 50 );
			$this->SetFont('Arial','B',20);
			$this->Cell(30);
			$this->Cell(200,20, 'SUGERENCIAS',0,0,'C');
			$this->Ln(40);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}

	$pdf = new PDF('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
  $pdf->Cell(500,10,'Sugerencias dadas por alumnos.');
  $pdf->Ln(10);
  $pdf->Cell(40,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(40,6,'EMAIL',1,0,'C',1);
	$pdf->Cell(200,6,'SUGERENCIA',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

  foreach ($pdo -> query($sql) as $row) {
    $pdf->Cell(40,6,$row['nombre'],1,0,'C');
    $pdf->Cell(40,6,$row['email'],1,0,'C');
    $pdf->Cell(200,6,$row['sugerencia'],1,1);
  }
    Database::disconnect();
    $pdf->Output();
?>
