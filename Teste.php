<!doctype>
<html>
<head>
</head>
<body>
    <?php
		error_reporting(0);
        require_once "./mysql.php";
        require_once "Classes/PHPExcel.php";

        //  Realiza a busca na base de dados
        $con = new Conexao();
        $link = $con->conexao();

        $tmpfname = "cessacao.xls";
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();
        
        echo "<table>";
        for ($row = 1; $row <= $lastRow; $row++) {
            if ($row != 1) {
                $quebra = explode(" - ", $worksheet->getCell('A'.$row)->getValue(), 2);
                //  echo "<pre>" . print_r($quebra) . "</pre>";
                //  Insere no banco de dados
                $query = "INSERT INTO cessacao(codigo, nome, conc_final, prisma_sabi, reatnb_plenus, situacao) 
                VALUES ('" . $quebra[0] . "',
                        '" . $quebra[1] . "',
                        '" . $worksheet->getCell('B'.$row)->getValue() . "',
                        '" . $worksheet->getCell('C'.$row)->getValue() . "',
                        '" . $worksheet->getCell('D'.$row)->getValue() . "',
                        '" . $worksheet->getCell('E'.$row)->getValue() . "'
                        );";

                $sql = $link->prepare($query);
                if($sql->execute()){
                    echo "Sucesso!<br>"; 
                }
            }

            echo "<tr><td>";
            echo $worksheet->getCell('D'.$row)->getValue();
            echo "</td><td>";
            echo $worksheet->getCell('B'.$row)->getValue();
            echo "</td><tr>";
        }
        echo "</table>";	
    ?>
</body>
</html>