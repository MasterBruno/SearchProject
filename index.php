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
    <title>INSS - Consultar Motivo</title>

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
      <!--<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">-->
      <form>
        <fieldset>
          <legend class="text-center"><div class="display-3 font-weight-bold">Consultar Motivo <i class="fa fa-comments"></i></div></legend>
          <div class="container">
            <div class="">
              <nav id="navegar">
                <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-Motces-tab" data-toggle="tab" href="#nav-Motces" role="tab" aria-controls="nav-Motces" aria-selected="true">Motivo de Cessação</a>
                  <a class="nav-item nav-link" id="nav-Motsus-tab" data-toggle="tab" href="#nav-Motsus" role="tab" aria-controls="nav-Motsus" aria-selected="false">Motivo de Suspensão</a>
                </div>
              </nav>
              <br>
              <div class="tab-content" id="nav-tabContent">
                  <div class="inner-form">
                    <div class="input-group add-on">
                      <input class="form-control" autocomplete="off" placeholder="Digite aqui..." name="search" id="search" type="text" onkeyup="autocomplet()">
                      <div class="input-group-btn">
                        <!--
                        <input class="btn btn-primary button1" id="submit" onclick="enviar()" type="button" value="Pesquisar">
                        -->
                        <button class="btn btn-primary button2" type="button" name="pesquisar" onClick="enviar()"><i class="fa fa-search col-md-12 js-scroll-trigger"><a href="#resultado" class="js-scroll-trigger"></a></i></button>
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
                Deseja fazer o download da planilha? <a class="text-warning" href="./download.php">Clique Aqui.</a>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
    
    <div class="container">
      <div id="resultado">
      </div>
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

