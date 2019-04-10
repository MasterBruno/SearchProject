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
    <div class="container">
        <h2 class="text-center modal-header"> Cadastrar de Motivo </h2>
        <form class="branco" id="cadastro">
            
            <div class="branco">
                <label class="font-weight-bold" for="Tmotivo">Tipo do Motivo:</label>
                <div class="" id="Tmotivo">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo_Motiv" id="cessacao" placeholder="Cessação" value="cessacao">
                        <label class="form-check-label" for="cessacao">Cessação</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo_Motiv" id="suspensao" placeholder="Suspensão" value="suspensao">
                        <label class="form-check-label" for="suspensao">Suspensão</label>
                    </div>
                </div>
                <br><br>
                <div class="form-row">
                    <div class="form-group col-md-1" id="cod">
                        <label class="font-weight-bold" for="inputMotivo">Código</label>
                        <input type="text" class="form-control" id="inputMotivo" name="codigo" placeholder="Código" onfocusout="verificaCod()">
                    </div>
                    <div class="form-group col-md-11">
                        <label class="font-weight-bold" for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold" for="inputFin" required >Conceito e Finalidade</label>
                        <textarea class="form-control" id="inputFin" rows="5" name="conceito"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold" for="inputSit" required >Situação</label>
                        <textarea class="form-control" id="inputSit" rows="5" name="situacao"></textarea>
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
                        </div>
                    </div>
                </div>
                    <button type="button" style="cursor:pointer;" class="scroll_btn " id="scroll_top" onClick="toTopo()"><i class="fa fa-arrow-up"></i></button>
                </div>
            </div>
            <div class="input-group-btn">
                <button class="btn btn-primary button3 float-right" type="button" name="cadastrar" onClick="cadastrar()"><i class="fa fa-save col-md-12 js-scroll-trigger"> Salvar</i></button>
                <button class="btn btn-danger button3 float-right" type="button" name="cancelar" onClick="cancelar()"><i class="fa fa-ban col-md-12 js-scroll-trigger"> Cancelar</i></button>
            </div>
        </form>
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


