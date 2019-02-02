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
							<a class="nav-item nav-link ';
							if($linha['prisma_sabi'] != null){ echo "active"; } else { echo "disabled";}
							echo '" id="nav-home-tab" data-toggle="tab" href="#nav-PRISMA" role="tab" aria-controls="nav-home" aria-selected="true">PRISMA SABI</a>
							<a class="nav-item nav-link ';
							if($linha['reatnb_plenus'] != null){ if($linha['prisma_sabi'] == null) { echo "active"; }} else { echo "disabled";}
							echo '" id="nav-profile-tab" data-toggle="tab" href="#nav-REATNB" role="tab" aria-controls="nav-profile" aria-selected="false">REATNB</a>
						</div>
					  </nav>
					  <div class="tab-content" id="nav-tabContent">
						
						<div class="tab-pane fade ';
						if($linha['prisma_sabi'] != null){ echo "active show"; }
						echo '" id="nav-PRISMA" role="tabpanel" aria-labelledby="nav-home-tab">
						  <br>
						  <textarea class="form-control" id="inputPrisma" rows="3" name="prisma" disabled>';

						  $string  = str_replace("e", ",", $linha['prisma_sabi']);
						  $motivos = explode(",", $string);
						  
						  foreach ($motivos as $value) {
							$value = trim($value);
							
							$query1 = "SELECT * FROM reativacao WHERE codigo = (:codigo) LIMIT 1;";
						  
							$sql1 = $link->prepare($query1);
    
							$sql1->bindParam(':codigo', $value, PDO::PARAM_STR);

							$sql1->execute();
							
							$linha1 = $sql1->fetch(PDO::FETCH_ASSOC);
							
							echo $linha1['codigo'] . ' - ' . $linha1['nome'] . "\n";
						  }
						  
						  echo '</textarea>

						</div>
						
						<div class="tab-pane fade ';
						if($linha['reatnb_plenus'] != null){if($linha['prisma_sabi'] == null) { echo "active "; }  echo "show";} else { echo "disabled";} 
						echo '" id="nav-REATNB" role="tabpanel" aria-labelledby="nav-profile-tab">
						<br>
						  <textarea class="form-control" id="inputReatnb" rows="3" name="reatnb" disabled>'; 
						  
						  $string  = str_replace("e", ",", $linha['reatnb_plenus']);
						  $motivos = explode(",", $string);
						  
						  foreach ($motivos as $value) {
							$value = trim($value);
							$query1 = "SELECT * FROM reativacao WHERE codigo = (:codigo) LIMIT 1;";
						  
							$sql1 = $link->prepare($query1);
    
							$sql1->bindParam(':codigo', $value, PDO::PARAM_STR);

							$sql1->execute();
							
							$linha1 = $sql1->fetch(PDO::FETCH_ASSOC);
							
							echo $linha1['codigo'] . ' - ' . $linha1['nome'] . "\n";
						  }
						  
						  echo '</textarea>

						</div>
					  </div>
					</div>
				  </div>
				</div>
				<button type="button" style="cursor:pointer;" class="btn btn-secondary fixed-bottom pull-right position-fixed" id="scroll_top" onClick="toTopo()"><i class="fa fa-arrow-up"></i></button>
			  </div>
				</form>
			';

						
  } else {
		echo "<script language='javascript' type='text/javascript'>alert('Resultado não encontrado!');</script>";
	}
?>