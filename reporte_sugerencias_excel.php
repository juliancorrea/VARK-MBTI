<?php
require 'database.php';
require 'excelphp/Classes/PHPExcel.php';


if (PHP_SAPI == 'cli')
	die('Este ejemplo sólo se puede ejecutar desde un navegador Web');

// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();


// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:C1');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'LISTADO DE SUGERENCIAS')
            ->setCellValue('A2', 'NOMBRE')
            ->setCellValue('B2', 'EMAIL')
            ->setCellValue('C2', 'SUGERENCIA');

// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:C2')->applyFromArray($boldArray);



//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setWrapText(true);
$style = array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, );
$objPHPExcel->getDefaultStyle()->applyFromArray($style);



/*Extraer datos de MYSQL*/
	# conectare la base de datos
  $pdo = Database::connect();
  $sql = 'SELECT * FROM sugerencias ORDER BY id DESC';
	$cel=3;//Numero de fila donde empezara a crear  el reporte
  $c="0";
	foreach ($pdo -> query($sql) as $row) {
		$nombre=$row['nombre'];
		$email=$row['email'];
		$sugerencia=$row['sugerencia'];

			$a="A".$cel;
			$b="B".$cel;
			$c="C".$cel;

			// Agregar datos
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($a, $nombre)
            ->setCellValue($b, $email)
            ->setCellValue($c, $sugerencia);

	$cel+=1;
	}

/*Fin extracion de datos MYSQL*/


$rango="A2:C500";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);

$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);


// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('SUGERENCIAS');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
