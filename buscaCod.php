<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $codigo = $_POST['key'];
    $tab = $_POST['tab'];

    if(strcmp($tab, "cessacao") == 0){
        $query = "SELECT * FROM cessacao WHERE codigo = (:codigo) LIMIT 1;";
    } else {
        $query = "SELECT * FROM suspensao WHERE codigo = (:codigo) LIMIT 1;";
    }

    $sql = $link->prepare($query);

    $sql->bindParam(':codigo', $codigo, PDO::PARAM_STR);

    $sql->execute();

    $linha = $sql->fetch(PDO::FETCH_ASSOC);
        
    if($linha != null){
        echo 1;
    } else {
        echo -1;
    }
?>