<?php
    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    if(isset($_POST["query"])){
        echo $_POST["query"];
        $output = '';
        $query = "SELECT * FROM cessacao WHERE nome LIKE '%" . $_POST["query"] . "%'";
        $result = mysqli_query($link, $query);
        $output = '<ul class="list-unstyled">';

        if(mysqli_num_rows($result) > 0 ){
            while($row = mysqli_fetch_array($result)){
                $output .= '<li>' . $row[nome] . '</li>';
            }
        } else {
            $output .= '<li>Não Encontrado</li>';
        }
        $output .= '</ul>';
        echo $output;
    }
?>