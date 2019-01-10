<?php
	//	Carregar a classe PHPEXCEL
	require_once './Classes/PHPExcel.php';

	//	iniciar o objeto
	$objReader = new PHPExcel_Reader_Excel5();
	$objReader->setReadDataOnly(true);
	$objPHPExcel = $objReader->load("cessacao.xls");

	//	pegar as colunas
	$colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
	$total_col = PHPExcel_Cell::columnIndexFromString($colunas);

	//	pegar total de linhas
	$total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

	echo "<table>";

	// navegar nas linhas
	for ($i=0; $i < $total_linhas; $i++) { 
		for ($j=0; $j < $total_col; $j++) { 
			if($i == 1) {
				echo "<th>" . utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($j, $i)->getValue()) . "</th>";
			} else {
				echo "<td>" . utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($j, $i)->getValue()) . "</td>";
			}
		}
		echo "<br>";		
	}
	
	echo "</table>";
?>