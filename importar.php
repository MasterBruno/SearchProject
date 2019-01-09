<?php

  include_once './mysql.php';

  //  Realiza a busca na base de dados
  $con = new Conexao();
  $link = $con->conexao();

  //  Realiza a busca pelo arquivo csv
  $arquivo = $_FILES['file']['tmp_name'];

  //  Exibe detalhes da variável carregada
  //  var_dump($_FILES['file']);

  $objeto = fopen($arquivo, 'r');

  $i = 0;
  while ($row = fgetcsv($objeto)) {
    /*
    if($i = 0){
      $row = explode(" - ", $row);
    }
    */

    $value = "'" . implode("','", $row) . "'";

    echo "<pre>";
    print_r($value);
    //  print_r(explode(" - ", $row[0])); 
    echo "</pre>";
    
    //  $desc = explode(" - ", $value);

    //  Insere no banco de dados
    //  $query = "INSERT INTO cessacao(codigo, nome, conc_final, prisma_sabi, reatnb_plenus, situacao) VALUES (" . $value . ");";

    $i++;
  }

?>