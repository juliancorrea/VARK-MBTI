<?php
    session_start();
    if(!isset($_SESSION["matricula"]))
    {
        header('Refresh: 0; URL = index.php');
        die();
    }
?>
<?php
	include 'plantilla.php';
	include 'database.php';
  $matricula = $_SESSION["matricula"];
	$alumno = $_SESSION["alumno"];
  $pdo = Database::connect();
  $sql = "SELECT * FROM resultado_mbti WHERE matricula = '$matricula'";

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,6,'Extrovertido (E)',0,0,1);
	$pdf->Cell(35,6,'Introvertido (I)',0,0,1);
	$pdf->Cell(35,6,'Sensorial (S)',0,0,1);
	$pdf->Cell(35,6,'Intuitivo (N)',0,0,1);
	$pdf->Ln(5);
	$pdf->Cell(35,6,'Racional (T)',0,0,1);
	$pdf->Cell(35,6,'Emocional (F)',0,0,1);
	$pdf->Cell(35,6,'Calificador (J)',0,0,1);
	$pdf->Cell(35,6,'Perceptivo (P)',0,0,1);
	$pdf->Ln(10);
	$pdf->Cell(500,10,"MBTI - Resultados individuales - $alumno");
	$pdf->Ln(10);
  $pdf->Cell(35,6,'Matricula',1,0,'C',1);
	$pdf->Cell(20,6,'(E)',1,0,'C',1);
	$pdf->Cell(20,6,'(I)',1,0,'C',1);
	$pdf->Cell(20,6,'(S)',1,0,'C',1);
  $pdf->Cell(20,6,'(N)',1,0,'C',1);
	$pdf->Cell(20,6,'(T)',1,0,'C',1);
	$pdf->Cell(20,6,'(F)',1,0,'C',1);
	$pdf->Cell(20,6,'(J)',1,0,'C',1);
	$pdf->Cell(20,6,'(P)',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

  foreach ($pdo -> query($sql) as $row) {
    $pdf->Cell(35,6,$row['Matricula'],1,0,'C');
    $pdf->Cell(20,6,$row['SumaExtroversion'],1,0,'C');
		$pdf->Cell(20,6,$row['SumaIntroversion'],1,0,'C');
		$pdf->Cell(20,6,$row['SumaSensorial'],1,0,'C');
		$pdf->Cell(20,6,$row['SumaIntuitivo'],1,0,'C');
		$pdf->Cell(20,6,$row['SumaRacional'],1,0,'C');
		$pdf->Cell(20,6,$row['SumaEmocional'],1,0,'C');
		$pdf->Cell(20,6,$row['SumaCalificador'],1,0,'C');
    $pdf->Cell(20,6,$row['SumaPerceptivo'],1,1,'C');
  }
    Database::disconnect();
    $pdf->Output();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Resultado MBTI</title>
	</head>
	<body>

	</body>
</html>
