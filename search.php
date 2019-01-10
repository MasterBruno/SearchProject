<?php
	include_once './mysql.php';

	//  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $codigo = $_POST['codigo'];
    $tab = $_POST['tab'];

    if(strcmp($tab, "nav-Motces") == 0){
        $query = "SELECT * FROM cessacao WHERE codigo = (:codigo) LIMIT 1;";
    } else {
        $query = "SELECT * FROM suspensao WHERE codigo = (:codigo) LIMIT 1;";
    }    
    $sql = $link->prepare($query);
    
    $sql->bindParam(':codigo', $codigo, PDO::PARAM_STR);

    $sql->execute();
    
		$linha = $sql->fetch(PDO::FETCH_ASSOC);
		
	if ($linha != null){
		echo '
			<form class="result" id="result">
			  <div class="form-row">
				<div class="form-group col-md-1">
				  <label class="font-weight-bold" for="inputMotivo">Código</label>
				  <input type="text" class="form-control" id="inputMotivo" value="' . $linha['codigo'] .'" name="codigo" disabled>
				</div>
				<div class="form-group col-md-11">
				  <label class="font-weight-bold" for="inputNome">Nome</label>
				  <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" value="' . $linha['nome'] . '" disabled>
				</div>
			  </div>
			  <div class="form-row">
				<div class="form-group col-md-12">
				  <label class="font-weight-bold" for="inputFin">Conceito e Finalidade</label>
				  <textarea class="form-control" id="inputFin" rows="5" name="conceito" disabled>' . $linha['conc_final'] . '</textarea>
				</div>
			  </div>
			  <div class="form-row">
				<div class="form-group col-md-12">
				  <label class="font-weight-bold" for="inputSit">Situação</label>
				  <textarea class="form-control" id="inputSit" rows="5" name="situacao" disabled>' . $linha['situacao'] . '</textarea>
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
						  <textarea class="form-control" id="inputPrisma" rows="3" name="prisma" disabled>' . $linha['prisma_sabi'] . '</textarea>

						</div>
						<div class="tab-pane fade" id="nav-REATNB" role="tabpanel" aria-labelledby="nav-profile-tab">
						  <br>
						  <textarea class="form-control" id="inputReatnb" rows="3" name="reatnb" disabled>' . $linha['reatnb_plenus'] . '</textarea>

						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</form>
			';

			if($linha['prisma_sabi'] == null){				
				echo '<script>
					document.getElementById("nav-home-tab").disabled = true;
				</script>';
			} else if($linha['reatnb_plenus'] == null){
				echo '<script>
					document.getElementById("nav-profile-tab").disabled = true;
				</script>';
			}			
  } else {
		echo "<script language='javascript' type='text/javascript'>alert('Resultado não encontrado!');</script>";
	}
?>