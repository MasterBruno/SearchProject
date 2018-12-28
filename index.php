<html lang="pt_BR">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <title>Search</title>

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
          <legend class="text-center">Search of Reason <i class="fa fa-comments"></i></legend>
          <div class="container">
            <div class="">
              <nav>
                <div class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-Motces-tab" data-toggle="tab" href="#nav-Motces" role="tab" aria-controls="nav-Motces" aria-selected="true">Motivo de Cessação</a>
                  <a class="nav-item nav-link" id="nav-Motsus-tab" data-toggle="tab" href="#nav-Motsus" role="tab" aria-controls="nav-Motsus" aria-selected="false">Motivo de Suspensão</a>
                </div>
              </nav>
              <br>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-Motces" role="tabpanel" aria-labelledby="nav-Motces-tab">
                  <div class="inner-form">
                    <div class="input-group add-on">
                      <input class="form-control" placeholder="Digite aqui..." name="search" id="srch-term" type="text">
                      <div class="input-group-btn">
                        <button class="btn btn-primary button1" type="submit" name="pesquisar"><i class="fa fa-search col-md-12"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="suggestion-wrap">
                    <span>Código</span>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-Motsus" role="tabpanel" aria-labelledby="nav-Motsus-tab">
                  <div class="inner-form">
                    <div class="inner-form">
                    <div class="input-group add-on">
                      <input class="form-control" placeholder="Digite aqui..." name="search" id="srch-term" type="text">
                      <div class="input-group-btn">
                        <button class="btn btn-primary button1" type="submit" name="pesquisar"><i class="fa fa-search col-md-12"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="suggestion-wrap">
                    <span>Código</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
    </div>

    <?php 
      if (isset($_POST["pesquisar"])) {
        $text = $_POST["search"];
        if(empty($text)) {
          echo "<script language='javascript' type='text/javascript'>alert('Digite no campo de pesquisa!');</script>";
        } else {
          /*
          echo "<script language='javascript' type='text/javascript'>alert('Pesquisando...!');</script>";
          */
    ?>

    <br>
    <div class="container">
      
      <form>
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="inputMotivo">Motivo</label>
            <input type="text" class="form-control" id="inputMotivo" value="Motivo">
          </div>
          <div class="form-group col-md-10">
            <label for="inputNome">Nome</label>
            <input type="text" class="form-control" id="inputNome" placeholder="Senha">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputFin">Conceito e Finalidade</label>
            <textarea class="form-control" id="inputFin" rows="3"></textarea>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputSit">Situação</label>
            <textarea class="form-control" id="inputSit" rows="3"></textarea>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputReativ">Motivos de Reativação</label>
            <textarea class="form-control" id="inputReativ" rows="3"></textarea>
          </div>
        </div>
      </form>

      <div class="row">
        <div class="col-md-12">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-PRISMA" role="tab" aria-controls="nav-home" aria-selected="true">PRISMA SABI</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-REATNB" role="tab" aria-controls="nav-profile" aria-selected="false">REATNB</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-PRISMA" role="tabpanel" aria-labelledby="nav-home-tab">

              <br>
              <!-- DataTables Example -->
              <div class="container">
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fas fa-table"></i>
                    Resultado da Pesquisa</div>
                  <div class="card-body">
                    <div class="table-responsive text-center">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                          <tr>
                            <th>Código</th>
                            <th>Data</th>
                            <th>Descrição da Conta</th>
                            <th>Integrante</th>
                            <th>Valor</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Código</th>
                            <th>Data</th>
                            <th>Descrição da Conta</th>
                            <th>Integrante</th>
                            <th>Valor</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr>
                            <td><?php echo "$text"; ?></td>
                            <td><?php echo "$text"; ?></td>
                            <td><?php echo "$text"; ?></td>
                            <td><?php echo "$text"; ?></td>
                            <td><?php echo "$text"; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Atualizado às '<?php echo date('H:i'); ?>'.</div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="nav-REATNB" role="tabpanel" aria-labelledby="nav-profile-tab">
              
              <br>
              <!-- DataTables Example -->
              <div class="container">
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fas fa-table"></i>
                    Resultado da Pesquisa</div>
                  <div class="card-body">
                    <div class="table-responsive text-center">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                          <tr>
                            <th>Código</th>
                            <th>Data</th>
                            <th>Descrição da Conta</th>
                            <th>Integrante</th>
                            <th>Valor</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Código</th>
                            <th>Data</th>
                            <th>Descrição da Conta</th>
                            <th>Integrante</th>
                            <th>Valor</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr>
                            <td><?php echo "$text"; ?></td>
                            <td><?php echo "$text"; ?></td>
                            <td><?php echo "$text"; ?></td>
                            <td><?php echo "$text"; ?></td>
                            <td><?php echo "$text"; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Atualizado às '<?php echo date('H:i'); ?>'.</div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
      }
    ?>


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

    <!-- Nav pills -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
