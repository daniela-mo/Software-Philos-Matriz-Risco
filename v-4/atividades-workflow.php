 <?php
	$nav_menu_principal = 'workflow';
	$nav_menu_pagina = 'workflow';
	?>
 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
 	<title>Dashboard Philos</title>
 	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
 	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
 	<link rel="stylesheet" type="text/css" href="css/estilo.css">
 	<link rel="stylesheet" type="text/css" href="css/datatable.css">
 	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 </head>



 <body class=" fixed-nav sticky-footer" id="page-top">
 	<!-- Navegação !-->
 	<?php
		include('menu.php');
		$codigo = $_REQUEST['cod'];
		mysqli_query($conexao, "SET NAMES 'utf8'");
		mysqli_query($conexao, 'SET character_set_connection=utf8');
		mysqli_query($conexao, 'SET character_set_client=utf8');
		mysqli_query($conexao, 'SET character_set_results=utf8');

		$selecao = mysqli_query($conexao, "select * from atividades_planejamento_workflow WHERE id='$codigo'");

		$registros = mysqli_fetch_array($selecao);
		$codigo_planejamento = $registros['codigo_planejamento'];
		$tarefa = $registros['tarefa'];
		$codigo_fase = $registros['codigo_fase'];

		$selecao2 = mysqli_query($conexao, "select * from fases_workflow WHERE id='$codigo_fase'");
		$registros2 = mysqli_fetch_array($selecao2);
		$fase = $registros2['fase'];
		?>
 	<!-- Navegação !-->
 	<input type="hidden" name="codigo" id="codigo" value="">

 	<div class="content-wrapper">
 		<div class="container-fluid">
 			<div class="row mb-5" style="margin-top: -16px; ">
 				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

 					<div class="row">
 						<div class="col-md-9">
 							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Tarefas Planejamento</span>
 						</div>
 					</div>


 				</div>
 			</div>
 			<div class="row ml-4 mr-4">
 				<div class="col-md-12">
 					<input type="button" class="btn btn-primary mb-5" value="Voltar" onclick='history.go(-1)'><br>


 					<nav aria-label="breadcrumb">
 						<ol class="breadcrumb">
 							<li class="breadcrumb-item"><a href="planejamento-workflow.php?cod=<?php echo $codigo_planejamento ?>">Planejamento Workflow</a></li>

 							<li class="breadcrumb-item"><a href="planejamento-workflow.php?cod=<?php echo $codigo_planejamento ?>"><?php echo $registros2['fase'] ?></a></li>


 						</ol>
 					</nav>

 					<?php
						$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
						$numero_grupo = mysqli_num_rows($verificar_grupo);
						if ($numero_grupo >= 1) {

						?>

 						<a href="cadastro-tarefa-workflow.php?cod=<?php echo $registros['id'] ?>"> <img src="imgs/icone-mais.png" width="25" height="25" alt="" /> Nova Tarefa</a>
 					<?php } ?>




 					<input type="text" class="form-control bg-white mt-5" id="nome-atividade" value="<?php echo $registros['tarefa'] ?>" style="font-size: 22px; font-weight: 800;">

 					<div class="col-md-2 float-right">


 						<br>



 						<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter" onClick="CarregaUsers(<?php echo $codigo ?>)">
 							Responsáveis Atividade
 						</button>
 					</div>

 					<div class="col-md-12">

 						<div id="retorno-datas" style="color:red"></div>
 					</div>
 					<div class="row mt-5">
 						<div class="col-md-12">
 							<div id="retorno-atualizar-workflow"></div>
 						</div>

 						<!-- <div class="col-md-8">
							<strong>Atividade:</strong>
							<input type="text" class="form-control bg-white" id="nome-atividade" value="<?php echo $registros['tarefa'] ?>" style="font-size: 22px; font-weight: 800;">

						</div> -->

 						<div class="col-md-4">
 							<strong>Envolvido:</strong>
 							<input type="text" class="form-control" id="cad-envolvido" name="cad-envolvido" value="<?php echo $registros['envolvido'] ?>" style="font-size: 22px; font-weight: 500;">

 						</div>

 						<div class="col-md-3 mt-3">
 							<strong>Data Inicio:</strong>
 							<input type="text" class="form-control bg-white datepicker data" id="data-inicio" value="<?php

																														@$data_min = $registros['data_inicio'];
																														$ano_min = substr($data_min, 0, 4);
																														$mes_min = substr($data_min, 5, 2);
																														$dia_min = substr($data_min, 8, 2);

																														@$data_max = $dia_min . "/" . $mes_min . "/" . $ano_min;

																														echo	@$data_max;


																														?>" style="font-size: 22px; font-weight: 500;" onClick="Data()">

 						</div>
 						<input type="hidden" id="guarda-data-inicio" value="<?php echo $registros['data_inicio'] ?>">

 						<div class="col-md-3 mt-3">
 							<strong>Data Término:</strong>
 							<input type="text" class="form-control bg-white datepicker data" id="data-termino" value="<?php

																														@$data_max = $registros['data_termino'];
																														$ano_max = substr($data_max, 0, 4);
																														$mes_max = substr($data_max, 5, 2);
																														$dia_max = substr($data_max, 8, 2);

																														@$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;

																														echo @$data_max;


																														?>" style="font-size: 22px; font-weight: 500;" onClick="Data()">

 						</div>


 						<div class="col-md-3 mt-3">
 							<strong>Status:</strong>

 							<?php
								$status = $registros['status'];
								?>

 							<select class="form-control" name="cad-status" id="cad-status">

 								<?php if ($status != '') { ?>

 									<option selected><?php echo $registros['status'] ?></option>
 								<?php } ?>


 								<?php if ($status != 'Não iniciado') { ?>
 									<option>Não iniciado</option>
 								<?php } ?>

 								<?php if ($status != 'Em andamento') { ?>
 									<option>Em andamento</option>
 								<?php } ?>

 								<?php if ($status != 'Concluído]') { ?>
 									<option>Concluído</option>
 								<?php } ?>

 							</select>

 						</div>

 						<div class="col-md-3 mt-2">
 							<label>Periodicidade</label>
 							<select class="form-control" name="cad-periodicidade" id="cad-periodicidade">
 								<option><?php echo $registros['periodicidade'] ?></option>
 								<option>Diário</option>
 								<option>Quinzenal</option>
 								<option>Mensal</option>
 								<option>Bimestral</option>
 								<option>Trimestral</option>
 								<option>Semestral</option>
 								<option>Anual</option>
 								<option>Bianual</option>
 							</select>
 						</div>

 						<div class="col-md-5 mb-4 mt-3">
 							<label>Área</label>
 							<select class="form-control" name="cad-area" id="cad-area">

 								<?php
									if ($registros['area'] != '') {
										$id_area = $registros['area'];
										$selecao_areas = mysqli_query($conexao, "select * from areas WHERE id='$id_area'");
										$reg = mysqli_fetch_array($selecao_areas);
									?>
 									<option value="<?php echo $registros['area'] ?>"> <?php echo $reg['area'] ?></option>
 								<?php } else { ?>
 									<option value="0">Escolher</option>
 								<?php } ?>

 								<?php

									$selecao_areas = mysqli_query($conexao, "select * from areas order by area ASC");
									while ($registros_areas = mysqli_fetch_array($selecao_areas)) {

										if ($registros['area'] != $registros_areas['id']) {
									?>
 										<option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['area'] ?></option>

 								<?php }
									} ?>
 							</select>
 						</div>


 					</div>








 					<p><textarea id="nome-descricao" class="form-control bg-white mt-4" rows="5"><?php echo $registros['descricao'] ?></textarea></p>



 					<input type="hidden" id="guarda-data-inicio" value="<?php echo $registros['data_inicio'] ?>">


 					<?php
						$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and editar='1' ");
						$numero_grupo = mysqli_num_rows($verificar_grupo);
						if ($numero_grupo >= 1) {

						?>

 						<input type="button" class="btn btn-success mb-3" value="Atualizar dados" onClick="GravarAtividade()">

 					<?php } ?>

 				</div>




 				<div>
 					<style>
 						#example2 tr th {
 							font-size: 10px;
 							padding: 15px 4px;
 							text-align: center;
 						}


 						#example2 tr td {
 							font-size: 10px;
 							padding: 15px px;
 							text-align: center;
 						}
 					</style>

 					<h4>Tarefas</h4>
 					<table id="example2" class="table-striped" style="width:100%;">
 						<thead>


 							<tr>

 								<th><strong>Id</strong></th>
 								<th><strong>Tarefa</strong></th>

 								<th width="110"><strong>Item Qaa</th>
 								<th width="110"><strong>Responsável processo</th>
 								<th width="110"><strong>Responsável Ação</th>
 								<th width="110"><strong>Planta</strong></th>
 								<th width="90"><strong>Departamento</strong></th>
 								<th width="110"><strong>Plano de ação</th>
 								<th width="110"><strong>Mapa de Risco</strong></th>
 								<th width="110"><strong>Data envio plano de ação</th>
 								<th><strong>Data retorno com prazo</th>
 								<th><strong>Data devolutiva</th>
 								<th width="100"><strong>Dias atraso retorno com prazo</th>
 								<th><strong>Status prazo devolutiva</th>
 								<th width="150"><strong>Prazo atendimento plano de ação</th>
 								<th width="150"><strong>Data atendimento plano de ação</th>
 								<th width="120"><strong>Dias de atraso</th>
 								<th width="110"><strong>Status prazo atendimento plano de ação</th>
 								<th><strong>Área</strong></th>
 								<th width="100"><strong>Início</strong></th>
 								<th><strong>Término</strong></th>
 								<th><strong>Status</strong></th>
 								<th><strong>Descrição</strong></th>
 								<th><strong>Ação</strong></th>
 							</tr>

 						</thead>

 						<tbody style="width:100%;">
 							<?php
								$selecao_tarefas = mysqli_query($conexao, "select * from tarefas_atividades_workflow WHERE codigo_atividade='$codigo' order by tarefa ASC ");
								while ($registros_tarefas = mysqli_fetch_array($selecao_tarefas)) {
								?>

 								<tr class="pointer">




 									<?php


										$data_envio =  $registros_tarefas['dtEnvioPlanoAcao'];
										$data_envio = explode("-", $data_envio);
										$dia_envio = $data_envio[2];
										$mes_envio = $data_envio[1];
										$ano_envio = $data_envio[0];
										$data_envio = $dia_envio . "/" . $mes_envio . "/" . $ano_envio;


										$data_prazo =  $registros_tarefas['dtRetornoPrazo'];
										$data_prazo = explode("-", $data_prazo);
										$dia_prazo = $data_prazo[2];
										$mes_prazo = $data_prazo[1];
										$ano_prazo = $data_prazo[0];
										$data_prazo = $dia_prazo . "/" . $mes_prazo . "/" . $ano_prazo;


										$data_devol =  $registros_tarefas['dtDevolutiva'];
										$data_devol = explode("-", $data_devol);
										$dia_devol = $data_devol[2];
										$mes_devol = $data_devol[1];
										$ano_devol = $data_devol[0];
										$data_devol = $dia_devol . "/" . $mes_devol . "/" . $ano_devol;


										$prazo_atend =  $registros_tarefas['pzAtendPlanAcao'];
										$prazo_atend = explode("-", $prazo_atend);
										$dia_prazo = $prazo_atend[2];
										$mes_prazo = $prazo_atend[1];
										$ano_prazo = $prazo_atend[0];
										$prazo_atend = $dia_prazo . "/" . $mes_prazo . "/" . $ano_prazo;



										$data_atend =  $registros_tarefas['datAtendPlanAcao'];
										$data_atend = explode("-", $data_atend);
										$dia_atend = $data_atend[2];
										$mes_atend = $data_atend[1];
										$ano_atend = $data_atend[0];
										$data_atend = $dia_atend . "/" . $mes_atend . "/" . $ano_atend;


										?>


 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer">
 										<?php echo $registros_tarefas['id'] ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer">
 										<?php echo $registros_tarefas['tarefa'] ?>
 									</td>

 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['itemQaa'] ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['responProc'] ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['responAcao'] ?>
 									</td>

 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['empresa'] ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['departamento'] ?>
 									</td>


 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['planoAcao'] ?>
 									</td>

 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['mapaRisco'] ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $data_envio ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?> ">
 										<?php echo $data_prazo ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas " id="classe-tarefas_<?php echo $registros_tarefas['id'] ?> ">
 										<?php echo $data_devol ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['diasRetPrazo'] ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['statusDevolutiva'] ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas " id="classe-tarefas_<?php echo $registros_tarefas['id'] ?> ">
 										<?php echo $prazo_atend ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas " id="classe-tarefas_<?php echo $registros_tarefas['id'] ?> ">
 										<?php echo $data_atend ?>
 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas " id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['diasAtraso'] ?>
 									</td>

 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['statusPrazoPlanoAcao'] ?>
 									</td>

 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php

											$id_area = $registros_tarefas['area'];
											$selecao_areas = mysqli_query($conexao, "select * from areas WHERE id='$id_area'");
											$reg = mysqli_fetch_array($selecao_areas);

											echo $reg['area'];
											?>
 									</td>


 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">


 										<?php
											@$data_min = $registros_tarefas['data_inicio'];
											$ano_min = substr($data_min, 0, 4);
											$mes_min = substr($data_min, 5, 2);
											$dia_min = substr($data_min, 8, 2);

											@$data_min = $dia_min . "/" . $mes_min . "/" . $ano_min;

											echo	@$data_min;


											?>



 									</td>

 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">


 										<?php
											@$data_max = $registros_tarefas['data_termino'];
											$ano_max = substr($data_max, 0, 4);
											$mes_max = substr($data_max, 5, 2);
											$dia_max = substr($data_max, 8, 2);

											@$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;

											echo	@$data_max;


											?>



 									</td>
 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['status'] ?>
 									</td>


 									<td onClick="Tarefa(<?php echo $registros_tarefas['id'] ?>)" class="pointer classe-tarefas width:40px" id="classe-tarefas_<?php echo $registros_tarefas['id'] ?>">
 										<?php echo $registros_tarefas['descricao'] ?>
 									</td>


 									<td><i class="fa fa-trash pointer" onClick="ExcluirTarefas2(<?php echo $registros_tarefas['id'] ?>)"></i></td>
 								</tr>

 							<?php
								}
								?>
 						</tbody>
 					</table>

 				</div>


 				<div class="col-md-12" id="coluna-direita">


 				</div>



 				<!-- Modal -->
 				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 999999999">
 					<div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 999999999">
 						<div class="modal-content">
 							<div class="modal-header">
 								<h5 class="modal-title" id="exampleModalLongTitle">Responsáveis Atividade</h5>
 								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 									<span aria-hidden="true">&times;</span>
 								</button>
 							</div>
 							<div class="modal-body">
 								<div id="resposta-modal"></div>

 								<div id="carregar-listar-usuarios-atividades"></div>

 							</div>
 							<div class="modal-footer">
 								<select class="form-control" id="novo-user">
 									<option value="0">Novo usuário</option>
 									<?php
										$selecao_usuarios = mysqli_query($conexao, "select * from usuarios_empresa");
										while ($registros_usuarios = mysqli_fetch_array($selecao_usuarios)) {
										?>

 										<option value="<?php echo $registros_usuarios['id'] ?>"><?php echo $registros_usuarios['nome'] ?>|<?php echo $registros_usuarios['email'] ?></option>

 									<?php } ?>

 								</select>

 								<input type="button" value="Adicionar" class="btn btn-primary" onclick="AdicionarResponsavel()">

 							</div>
 						</div>
 					</div>
 				</div>


 				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999">
 					<div class="modal-dialog" role="document">
 						<div class="modal-content">
 							<div class="modal-header">
 								<h5 class="modal-title" id="exampleModalLabel">Adicionar Anexo</h5>
 								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 									<span aria-hidden="true">&times;</span>
 								</button>
 							</div>
 							<div class="modal-body">


 								<span id="msg" style="color:red"></span><br />
 								<input type="file" id="photo"><br />


 								<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 								<script type="text/javascript">
 									$(document).ready(function() {





 										function LimparUploads() {

 											$.ajax({
 												type: 'post',
 												data: 'codigo=',
 												url: 'funcoes/excluir-uploads-workflow-temp.php',
 												success: function(retorno) {
 													$('#respostaarquivo').html(retorno);

 												}
 											})
 										}

 										LimparUploads()

 										$(document).on('change', '#photo', function() {
 											var property = document.getElementById('photo').files[0];
 											var image_name = property.name;
 											var image_extension = image_name.split('.').pop().toLowerCase();
 											var nome = $("#nome-arquivo").val()


 											var form_data = new FormData();
 											form_data.append("file", property);
 											$.ajax({
 												url: 'funcoes/upload-workflow.php?nome=' + nome,
 												method: 'POST',
 												data: form_data,
 												contentType: false,
 												cache: false,
 												processData: false,
 												beforeSend: function() {
 													// $('#msg').html('Loading......');
 												},
 												success: function(data) {
 													console.log(data);
 													$('#respostaarquivo').html(data);
 													$('.close').trigger("click")


 													CarregaAnexos()
 												}
 											});
 										});
 									});
 								</script>
 							</div>

 							<div class="modal-footer">




 							</div>
 						</div>
 					</div>
 				</div>






 			</div>
 		</div>

 	</div>
 	<input type="hidden" id="passa-id">
 	<input type="hidden" id="codigo-tarefa">

 	<script src="bibliotecas/jquery/jquery.min.js"></script>
 	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
 	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
 	<script src="js/sb-admin.min.js" type="text/javascript"></script>

 	<script src="js/jquery.mask.min.js"></script>

 	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

 	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
 	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
 	<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.pt-br.js" type="text/javascript"></script>
 	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
 	<script src="js/jquery.mask.min.js"></script>
 	<script src="js/mascaras.js"></script>

 	<script>
 		$ff = jQuery.noConflict()



 		var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
 		$ff('#data-inicio').datepicker({
 			uiLibrary: 'bootstrap4',
 			iconsLibrary: 'fontawesome',
 			locale: 'pt-br',
 			format: 'dd/mm/yyyy'

 		});


 		$ff('#data-termino').datepicker({
 			uiLibrary: 'bootstrap4',
 			iconsLibrary: 'fontawesome',
 			locale: 'pt-br',
 			format: 'dd/mm/yyyy',
 			minDate: function() {
 				return $ff('#data-inicio').val();
 			}
 		});


 		function GravarAtividade() {


 			// var nome = $f('#nome-atividade').val()
 			// var codigo = $f('#codigo_atividade').val()
 			// var descricao = $f('#nome-descricao').val()
 			// var inicio = $f('#data-inicio').val()



 			// var dia1 = inicio.substring(0, 2);
 			// var mes1 = inicio.substring(5, 3);
 			// var ano1 = inicio.substring(10, 6);


 			// if (dia1 > 31) {
 			// 	$f("#retorno-datas").html("Campo Data de Inicio preenchido incorretamente!")
 			// } else if (mes1 > 12) {
 			// 	$f("#retorno-datas").html("Campo Data de Inicio preenchido incorretamente!")
 			// } else if (ano1 <= 1999) {
 			// 	$f("#retorno-datas").html("Campo Data de Inicio preenchido incorretamente!")
 			// } else {




 			// var termino = $f('#data-termino').val()

 			// var dia2 = termino.substring(0, 2);
 			// var mes2 = termino.substring(5, 3);
 			// var ano2 = termino.substring(10, 6);


 			// if (dia2 > 31) {
 			// 	$f("#retorno-datas").html("Campo Data de Término preenchido incorretamente!")
 			// } else if (mes2 > 12) {
 			// 	$f("#retorno-datas").html("Campo Data de Término preenchido incorretamente!")
 			// } else if (ano2 <= 1999) {
 			// 	$f("#retorno-datas").html("Campo Data de Término preenchido incorretamente!")
 			// } else {


 			// 	var envolvido = $f('#cad-envolvido').val()
 			// 	var status = $f('#cad-status').val()
 			// 	var periodicidade = $f('#cad-periodicidade').val()
 			// 	var area = $f('#cad-area option:selected').val()


 			// 	$f.ajax({
 			// 		type: 'post',
 			// 		data: 'codigo=<?php echo $codigo ?>&nome=' + nome + '&codigo' + codigo + '&descricao=' + descricao +
 			// 			'&inicio=' + inicio + '&termino=' + termino + '&envolvido=' + envolvido + '&status=' + status + '&periodicidade=' + periodicidade + '&area=' + area

 			// 			,
 			// 		url: 'funcoes/atualizar-atividade-workflow.php',
 			// 		success: function(retorno) {
 			// 			$f('#retorno-datas').html('')
 			// 			$f("#retorno-atualizar-workflow").hide();
 			// 			$f('#retorno-atualizar-workflow').html(retorno)
 			// 			$f("#retorno-atualizar-workflow").show(1000);
 			// 			$f("#retorno-atualizar-workflow").hide(1000);
 			// 		}
 			// 	})

 			// }
 			//	}
 		}


 		function Tarefa(variavel) {
 			$('#codigo-tarefa').val(variavel)



 			$.ajax({
 				type: 'post',
 				data: 'codigo=' + variavel + '&cod=<?php echo $codigo ?>',
 				url: 'funcoes/carregar-tarefas-workflow.php',
 				success: function(retorno) {

 					$('#coluna-direita').html(retorno);
 					CarregaAnexos()
 					CarregarResponsaveisTarefas(variavel)
 					Clique(variavel)

 					Datas()
 				}
 			})
 		}


 		function Clique(codigo) {
 			//$('.classe-tarefas').removeClass('bg-cinza')
 			//$('#classe-tarefas_'+codigo).addClass('bg-cinza')


 		}


 		function Deletar(codigo) {
 			if (window.confirm("Você deseja excluir a Atividade?")) {
 				$.ajax({
 					type: 'post',
 					data: 'codigo=' + codigo,
 					url: 'funcoes/excluir-uploads-workflow-temp.php',
 					success: function(retorno) {
 						$('#retorno-excluir').html(retorno);
 						CarregaAnexos()

 					}
 				})

 			}
 		}


 		function DeletarAnexo(codigo) {
 			if (window.confirm("Você deseja excluir o Anexo?")) {
 				$.ajax({
 					type: 'post',
 					data: 'codigo=' + codigo,
 					url: 'funcoes/excluir-uploads-workflow-temp.php',
 					success: function(retorno) {
 						$('#retorno-excluir').html(retorno);
 						var tarefa = $('#codigo-tarefa').val()
 						Tarefa(tarefa)

 					}
 				})

 			}

 		}

 		function DeletarAnexo2(codigo) {
 			if (window.confirm("Você deseja excluir o Anexo?")) {
 				$.ajax({
 					type: 'post',
 					data: 'codigo=' + codigo,
 					url: 'funcoes/excluir-uploads-workflow.php',
 					success: function(retorno) {
 						$('#retorno-excluir').html(retorno);
 						var tarefa = $('#codigo-tarefa').val()
 						Tarefa(tarefa)

 					}
 				})

 			}

 		}

 		function PassaId(variavel) {
 			$('#passa-id').val(variavel)
 		}


 		function TipoTarefa() {

 			var variavel = $("#tipo-tarefa :selected").val()

 			if (variavel == 'texto') {

 				$('#resposta-tarefa').load('tipos/texto.php')
 			}


 			if (variavel == 'anexos') {
 				$('#resposta-tarefa').load('tipos/anexos.php')
 			}


 			if (variavel == 'qaa') {
 				$('#resposta-tarefa').load('tipos/questao-qaa.php')
 			}


 		}



 		function GravarTexto() {

 			var titulo = $("#cad-titulo").val()
 			var descricao = $("#cad-descricao").val()
 			var codigo = $("#passa-id").val()

 			$.ajax({
 				type: 'post',
 				data: 'codigo=' + codigo + '&titulo=' + titulo + '&descricao=' + descricao,
 				url: 'funcoes/gravar-texto.php',
 				success: function(retorno) {
 					$('#resposta-tarefa').html(retorno);
 					$('.close').trigger('click')
 					location.reload();

 				}
 			})


 			function GravarArquivo() {

 				$.ajax({
 					type: 'post',
 					data: 'codigo=' + codigo + '&titulo=' + titulo + '&descricao=' + descricao,
 					url: 'funcoes/gravar-upload.php',
 					success: function(retorno) {
 						$('#resposta-tarefa').html(retorno);
 						$('.close').trigger('click')
 						location.reload();

 					}
 				})

 			}

 		}




 		function CarregarResponsaveis() {

 			var codigo = <?php echo $codigo; ?>;

 			$.ajax({
 				type: 'post',
 				data: 'codigo=' + codigo,
 				url: 'funcoes/carrega-responsaveis-atividades-workflow.php',
 				success: function(retorno) {
 					$('#carregar-listar-usuarios-atividades').html(retorno);

 				}
 			})
 		}


 		function CarregarResponsaveisTarefas(variavel) {


 			$.ajax({
 				type: 'post',
 				data: 'codigo=' + variavel,
 				url: 'funcoes/carrega-responsaveis-tarefas-workflow.php',
 				success: function(retorno) {
 					$('#carregar-responsaveis-tarefas').html(retorno);

 				}
 			})

 		}


 		function GravarTarefaResponsavel(codigo) {
 			var variavel = $("#novo-user :selected").val()


 			$.ajax({
 				type: 'post',
 				data: 'usuario=' + variavel + '&codigo=' + codigo,
 				url: 'funcoes/gravar-responsavel-tarefa-workflow.php',
 				success: function(retorno) {


 					$('.close').trigger('click')
 					$('#carregar-listar-usuarios-tarefas').html(retorno)
 					CarregarResponsaveisTarefas(codigo)
 				}
 			})
 		}






 		function RemoveResponsavel(variavel) {
 			if (window.confirm("Você deseja excluir o Responsável?")) {
 				$.ajax({
 					type: 'post',
 					data: 'codigo=' + variavel,
 					url: 'funcoes/excluir-responsavel-tarefa-workflow.php',
 					success: function(retorno) {
 						location.reload();
 					}
 				})
 			}

 		}


 		function ExcluirTarefas2(codigo) {

 			//tarefas_atividades_workflow
 			if (window.confirm("Você deseja excluir a Tarefa?")) {
 				$.ajax({
 					type: 'post',
 					data: 'codigo=' + codigo,
 					url: 'funcoes/excluir-tarefas-atividades-workflow.php',
 					success: function(retorno) {
 						location.reload();
 					}
 				})
 			}

 		}


 		CarregarResponsaveis()
 	</script>
 	<script>
 		$(document).ready(function() {


 			CarregarResponsaveis(<?php echo $codigo ?>)
 			$('#example').DataTable();
 			$('#example2').DataTable();



 			$("#example2").dataTable({

 				scrollX: true,
 				"dom": '<"top"i>rt<"bottom"flp><"clear">',
 				"iDisplayLength": 10,
 				stateSave: true,




 				"bJQueryUI": true,
 				"oLanguage": {
 					"sProcessing": "Processando...",
 					"sLengthMenu": "Mostrar _MENU_ registros",
 					"sZeroRecords": "Não foram encontrados resultados",
 					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
 					"sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
 					"sInfoFiltered": "",
 					"sInfoPostFix": "",
 					"sSearch": "Buscar:",
 					"sUrl": "",
 					"oPaginate": {
 						"sFirst": "Primeiro",
 						"sPrevious": "Anterior",
 						"sNext": "Seguinte",
 						"sLast": "Último"

 					}
 				}
 			})













 		});










 		$f = jQuery.noConflict()

 		$f('.data').mask('99/99/9999');

 		$('#example').DataTable({

 		});
 		$('#example2').DataTable({

 		});

 		function CarregaAnexos() {

 			$f.ajax({
 				type: 'post',
 				data: 'codigo=',
 				url: 'carrega-anexos-workflow.php',
 				success: function(retorno) {
 					$f('#carrega-anexos').html(retorno)
 					$f("#photo").val('');
 					$f("#nome-arquivo").val('');

 				}
 			})
 		}


 		$s = jQuery.noConflict()


 		function AtualizarTarefa(codigo) {

 			var area = $("#area").val()
 			var tarefa = $("#tarefa").val()
 			var descricao = $("#cad-descricao").val()
 			var inicio = $("#cad-inicio").val()
 			var termino = $("#cad-termino").val()
 			var envolvido = $("#cad-envolvido-tarefa").val()
 			var status = $('#cad-status').val()
 			var periodicidade = $('#cad-periodicidade4').val()
 			var planoAcao = $('#planoAcao').val()
 			var mapaRisco = $('#mapaRisco').val()
 			var itemQaa = $('#itemQaa').val()
 			var responProc = $('#responProc').val()
 			var responAcao = $('#responAcao').val()
 			var empresa = $('#empresa').val()
 			var departamento = $('#departamento').val()
 			var dtEnvioPlanoAcao = $('#dtEnvioPlanoAcao').val()
 			var dtRetornoPrazo = $('#dtRetornoPrazo').val()
 			var dtDevolutiva = $('#dtDevolutiva').val()
 			var diasRetPrazo = $('#diasRetPrazo').val()
 			var statusDevolutiva = $('#statusDevolutiva').val()
 			var pzAtendPlanAcao = $('#pzAtendPlanAcao').val()
 			var datAtendPlanAcao = $('#datAtendPlanAcao').val()
 			var diasAtraso = $('#diasAtraso').val()
 			var statusPrazoPlanoAcao = $('#statusPrazoPlanoAcao').val()



 			$.ajax({
 				type: 'post',
 				data: 'codigo=' + codigo + '&tarefa=' + tarefa + '&descricao=' +
 					descricao + '&inicio=' + inicio + '&termino=' + termino +
 					'&envolvido=' + envolvido + '&status=' + status +
 					'&periodicidade=' + periodicidade + '&area=' + area +
 					'&planoAcao=' + planoAcao + '&mapaRisco=' + mapaRisco +
 					'&itemQaa=' + itemQaa + '&responProc=' + responProc +
 					'&responAcao=' + responAcao + '&empresa=' + empresa +
 					'&departamento=' + departamento + '&dtEnvioPlanoAcao=' + dtEnvioPlanoAcao +
 					'&dtRetornoPrazo=' + dtRetornoPrazo +
 					'&dtDevolutiva=' + dtDevolutiva + '&diasRetPrazo=' +
 					diasRetPrazo + '&statusDevolutiva=' + statusDevolutiva +
 					'&pzAtendPlanAcao=' + pzAtendPlanAcao +
 					'&datAtendPlanAcao=' + datAtendPlanAcao +
 					'&diasAtraso=' + diasAtraso + '&statusPrazoPlanoAcao=' + statusPrazoPlanoAcao,

 				url: 'funcoes/atualizar-tarefa-workflow.php',
 				success: function(retorno) {

 					var tarefa = $('#codigo-tarefa').val()
 					Tarefa(tarefa)
 					location.reload()
 				}
 			})
 		}



 		function ExcluirResponsavel(codigo) {
 			if (window.confirm("Você deseja excluir o Responsável?")) {
 				$s.ajax({
 					type: 'post',
 					data: 'codigo=' + codigo + '&banco=responsaveis_atividades_workflow',
 					url: 'funcoes/excluir-responsavel-atividade-workflow.php',
 					success: function(retorno) {


 						CarregarResponsaveis(codigo)

 					}
 				})
 			}
 		}



 		function ExcluirResponsavelTarefa(codigo, tarefa) {
 			if (window.confirm("Você deseja excluir o Responsável?")) {
 				$s.ajax({
 					type: 'post',
 					data: 'codigo=' + codigo + '&banco=responsaveis_tarefas_workflow',
 					url: 'funcoes/excluir-responsavel-tarefa-workflow.php',
 					success: function(retorno) {


 						CarregarResponsaveisTarefas(tarefa)

 					}
 				})
 			}
 		}



 		function AdicionarResponsavel() {

 			var usuario = $s("#novo-user option:selected").val()


 			$s.ajax({
 				type: 'post',
 				data: 'atividade=<?php echo $codigo ?>&usuario=' + usuario,
 				url: 'funcoes/gravar-responsavel-atividade-workflow.php',
 				success: function(retorno) {
 					$s('#resposta-modal').html(retorno);

 					CarregarResponsaveis(<?php echo $codigo ?>)
 				}
 			})
 		}






 		function Datas() {
 			$aa = jQuery.noConflict()
 			var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());



 			$aa('#cad-inicio').datepicker({
 				uiLibrary: 'bootstrap4',
 				iconsLibrary: 'fontawesome',
 				locale: 'pt-br',
 				format: 'dd/mm/yyyy'

 			});


 			$aa('#cad-termino').datepicker({
 				uiLibrary: 'bootstrap4',
 				iconsLibrary: 'fontawesome',
 				locale: 'pt-br',
 				format: 'dd/mm/yyyy',
 				minDate: function() {
 					return $aa('#cad-inicio').val();
 				}
 			});

 		}
 	</script>


 	<script>
 		$rodape = jQuery.noConflict()

 		function AtivarLink() {
 			$rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
 			$rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight', 'bold')

 		}
 		AtivarLink()
 	</script>


 </body>

 </html>