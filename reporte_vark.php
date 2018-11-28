<?php
	include 'plantilla.php';
	include 'database.php';

  $pdo = Database::connect();
  $sql = 'SELECT * FROM resultado_vark ORDER BY Matricula DESC';


	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
  $pdf->Cell(500,10,'VARK - Todos los alumnos.');
  $pdf->Ln(10);
  $pdf->Cell(35,6,'Matricula',1,0,'C',1);
	$pdf->Cell(35,6,'Visual',1,0,'C',1);
	$pdf->Cell(35,6,'Auditivo',1,0,'C',1);
	$pdf->Cell(35,6,'Lectura/Escritura',1,0,'C',1);
  $pdf->Cell(35,6,'Quinestesico',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

  foreach ($pdo -> query($sql) as $row) {
    $pdf->Cell(35,6,$row['Matricula'],1,0,'C');
    $pdf->Cell(35,6,$row['SumaVisual'],1,0,'C');
    $pdf->Cell(35,6,$row['SumaAuditivo'],1,0,'C');
    $pdf->Cell(35,6,$row['SumaLectura'],1,0,'C');
    $pdf->Cell(35,6,$row['SumaQuinestesico'],1,1,'C');
  }
    Database::disconnect();
    $pdf->Output();
?>
