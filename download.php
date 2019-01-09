<?php
    require_once 'Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setCellValue('A', 'hello world!');
    $objPHPExcel->getActiveSheet()->setTitle('Cessacao');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Planilha.xlsx"');
    header('Cache-Control: max-age=0');
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');

    header("location: index.php");
?>
3000847876669