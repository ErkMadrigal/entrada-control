<?php
include './php-excel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->
    getProperties()
		->setCreator("Admin")
        ->setLastModifiedBy("Admin")
        ->setTitle("Plantilla Excel")
        ->setSubject("Plantilla Excel")
        ->setDescription("Plantilla para alumnos en formato Excel")
        ->setKeywords("Alumnos")
        ->setCategory("Plantilla Excel Control Entrada");

     $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Grupo')
            ->setCellValue('B1', 'Matrícula')
            ->setCellValue('C1', 'Apellido Paterno')
            ->setCellValue('D1', 'Apellido Materno')
            ->setCellValue('E1', 'Nombre(s)');
    $objPHPExcel->getActiveSheet()->setTitle('Alumnos');
    $objPHPExcel->setActiveSheetIndex(0);
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        $objPHPExcel->setActiveSheetIndex($objPHPExcel->getIndex($worksheet));
        $sheet = $objPHPExcel->getActiveSheet();
        $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(true);
        foreach ($cellIterator as $cell) {
            $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
        }
    }
    #configuracion para exportar excel
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Plantilla_Excel.xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
?>