<?php
  require_once './mysql.php';
  error_reporting(0);
?>
<html lang="pt_BR">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <title>INSS - Pesquisar Motivo</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>
  <body>
    <div class="s006">
      <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <fieldset>
          <legend class="text-center"><div class="display-3 font-weight-bold">Buscar Motivo <i class="fa fa-comments"></i></div></legend>
          <div class="container">
            <div class="">
              <nav id="navegar">
                <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-Motces-tab" data-toggle="tab" href="#nav-Motces" role="tab" aria-controls="nav-Motces" aria-selected="true" onClick="autocomplete()">Motivo de Cessação</a>
                  <a class="nav-item nav-link" id="nav-Motsus-tab" data-toggle="tab" href="#nav-Motsus" role="tab" aria-controls="nav-Motsus" aria-selected="false" onClick="autocomplete()">Motivo de Suspensão</a>
                </div>
              </nav>
              <br>
              <div class="tab-content" id="nav-tabContent">
                  <div class="inner-form">
                    <div class="input-group add-on">
                      <input class="form-control" autocomplete="off" placeholder="Digite aqui..." name="search" id="search" type="text" onkeyup="autocomplet()">
                      <div class="input-group-btn">
                        <button class="btn btn-primary button1" type="submit" name="pesquisar"><i class="fa fa-search col-md-12"><a href="#resultado" class="js-scroll-trigger"></a></i></button>
                      </div>
                      <div class="tab-pane fade show active" id="nav-Motces" role="tabpanel" aria-labelledby="nav-Motces-tab">
                      </div>
                      <div class="tab-pane fade" id="nav-Motsus" role="tabpanel" aria-labelledby="nav-Motsus-tab">
                      </div>
                    </div>                    
                  </div>
                  <div class="list-group">
                    <ul class="list-unstyled list-group" id="sugestao"></ul>
                  </div>
                  <div class="suggestion-wrap">
                    <span>Código</span>
                    <span>Nome do Motivo</span>
                  </div>
                </div>
              </div>
              <div class="text-white font-weight-bold float-right">
                Deseja fazer o download da planilha? <a class="text-warning" href="download.php">Clique Aqui.</a>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
    
    <?php 
      if (isset($_POST["pesquisar"])) {
        $text = explode(" - ", $_POST["search"], 2);
        $cod = $text[0];
        if(empty($cod)) {
          echo "<script language='javascript' type='text/javascript'>alert('Informe algo à pesquisar!');</script>";
        } else {
          //  Realiza a conexao com a base de dados
          $con = new Conexao();
          $link = $con->conexao();

          $link->beginTransaction();

          $tab = "<script>
                    document.write('nav-Motces');
                  </script>";
          echo $tab;

          if($tab == "nav-Motces"){
            $query = "SELECT * FROM cessacao WHERE codigo = $cod LIMIT 1;";
          } else {
            $query = "SELECT * FROM suspensao WHERE codigo = $cod LIMIT 1;";          
          }
          
          $sql = $link->prepare($query);
          
          $sql->execute();

          $linha = $sql->fetch(PDO::FETCH_ASSOC);

          if($linha != null){
          /*
          echo "<script language='javascript' type='text/javascript'>alert('Pesquisando...!');</script>";
          */
    ?>

    <div class="jumbotron jumbotron-fluid" id="resultado">
      <div class="container">
        
        <form>
          <div class="form-row">
            <div class="form-group col-md-1">
              <label class="font-weight-bold" for="inputMotivo">Código</label>
              <input type="text" class="form-control" id="inputMotivo" value="<?php echo $linha[codigo]; ?>" name="codigo" disabled>
            </div>
            <div class="form-group col-md-11">
              <label class="font-weight-bold" for="inputNome">Nome</label>
              <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" value="<?php echo $linha[nome]; ?>" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="font-weight-bold" for="inputFin">Conceito e Finalidade</label>
              <textarea class="form-control" id="inputFin" rows="5" name="conceito" disabled><?php echo $linha[conc_final]; ?></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="font-weight-bold" for="inputSit">Situação</label>
              <textarea class="form-control" id="inputSit" rows="5" name="situacao" disabled><?php echo $linha[situacao]; ?></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="font-weight-bold" for="inputReativ">Motivos de Reativação</label>
              <div class="row" id="inputReativ">
                <div class="col-md-12">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-PRISMA" role="tab" aria-controls="nav-home" aria-selected="true">PRISMA SABI</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-REATNB" role="tab" aria-controls="nav-profile" aria-selected="false">REATNB</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-PRISMA" role="tabpanel" aria-labelledby="nav-home-tab">
                      <br>
                      <textarea class="form-control" id="inputPrisma" rows="3" name="prisma" disabled><?php echo $linha[prisma_sabi]; ?></textarea>

                    </div>
                    <div class="tab-pane fade" id="nav-REATNB" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <br>
                      <textarea class="form-control" id="inputReatnb" rows="3" name="reatnb" disabled><?php echo $linha[reatnb_plenus]; ?></textarea>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <?php
              if(empty($linha[prisma_sabi])){
                echo 1;
                echo "<script language='javascript' type='text/javascript'>$('#nav-home-tab').hide();</script>";
              }
              if(empty($linha[reatnb_plenus])){
                echo 2;
                echo "<script language='javascript' type='text/javascript'>$('#nav-profile-tab').hide();</script>";
              } 
            } else {
              echo "<script language='javascript' type='text/javascript'>alert('Resultado não encontrado!');</script>";
            }
          }
        }
      ?>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Scripts para autocomplete -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    
    <!-- Nav pills -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script>
      $(function(){
        $('#navegar').click(function(){
        });
      });
    </script>

    <!--
    <script>
      $(document).ready(function(){
        $('#search').typeahead({
            source: function(query, result) {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {query:query},
                    dataType: "json",
                    sucess:function(data){
                        result($.map(data, function(item){
                            return item;
                        }));
                    }
                })
            }
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#search').keyup(function(){
          var query = $(this).val();
          if(query != '') {
            $.ajax({
              url: "search.php",
              method: "POST",
              data: {query:query},
              sucess:functin(data) {
                $('#sugestao').fadeIn();
                $('#sugestao').html(data);
              }
            });
          } else {
            $('#sugestao').fadeOut();
            $('#sugestao').html("");
          }
        })
      })
    </script>
    -->
  </body>
</html>

