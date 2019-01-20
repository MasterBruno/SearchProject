<html lang="pt_BR">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <title>INSS - Consultar Motivo</title>

    <!--[if lt IE 9]>
      <script src="js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  </head>
  <body>
    <div class="s006">
      <form>
        <fieldset>
          <legend class="text-center"><div class="display-3 font-weight-bold">Consultar Motivo <i class="fa fa-comments"></i></div></legend>
          <div class="container">
            <div class="">
              <nav id="navegar">
                <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-Motces-tab" data-toggle="tab" href="#nav-Motces" role="tab" aria-controls="nav-Motces" aria-selected="true" onClick="set_item('')">Motivo de Cessação</a>
                  <a class="nav-item nav-link" id="nav-Motsus-tab" data-toggle="tab" href="#nav-Motsus" role="tab" aria-controls="nav-Motsus" aria-selected="false" onClick="set_item('')">Motivo de Suspensão</a>
                </div>
              </nav>
              <br>
              <div class="tab-content" id="nav-tabContent">
                  <div class="inner-form">
                    <div class="input-group add-on">
                      <input class="form-control" autocomplete="off" placeholder="Digite aqui..." name="search" id="search" type="text">
                      <div class="input-group-btn">
                        <button class="btn btn-primary button2" type="button" name="pesquisar" onClick="enviar()"><i class="fa fa-search col-md-12 js-scroll-trigger"><a href="#resultado" class="js-scroll-trigger"></a></i></button>
                      </div>
                      <div class="tab-pane fade show active" id="nav-Motces" role="tabpanel" aria-labelledby="nav-Motces-tab">
                      </div>
                      <div class="tab-pane fade" id="nav-Motsus" role="tabpanel" aria-labelledby="nav-Motsus-tab">
                      </div>
                    </div>                    
                  </div>
                  <div class="list-group">
                    <ul class="list-unstyled list-group" id="sugestao" style="margin-bottom:10px;"></ul>
                  </div>
                  <div class="suggestion-wrap">
                    <span>Código</span>
                    <span>Nome do Motivo</span>
                  </div>
                </div>
              </div>
              <div class="text-white font-weight-bold float-right">
                Deseja fazer o download da planilha? <a class="text-warning" href="./Tabela.xls" download>Clique Aqui.</a>
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

    <!-- Scripts para funções -->
    <script type="text/javascript" src="js/script.js"></script>
    
    <script>
      
    </script>
  </body>
</html>

