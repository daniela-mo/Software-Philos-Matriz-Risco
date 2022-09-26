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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />

	<style>
		.datepicker {
			z-index: 9999999999999999999999999999999 !important;
			/* has to be larger than 1050 */
		}
	</style>
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
	?>
	<!-- Navegação !-->


	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Planejamento</span>
						</div>
					</div>

				</div>
			</div>
			<div class="row ml-2 mr-2">
				<div class="col-md-12 ">


					<input type="button" class="btn btn-primary mb-5" value="Voltar" onclick='history.go(-1)'><br>

					<p class="mb-5">
						<?php
						$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
						$numero_grupo = mysqli_num_rows($verificar_grupo);
						if ($numero_grupo >= 1) {

						?>
							<a href data-toggle="modal" class="pointer" data-target="#GravarTarefa"> <img src="imgs/icone-mais.png" width="25" height="25" alt="" /> Adicionar Marco</a>
							<br>

							<a href="cadastro-atividade-workflow.php?cod=<?php echo $registros['id'] ?>"> <img src="imgs/icone-mais.png" width="25" height="25" alt="" /> Adicionar Atividade</a>
						<?php } ?>
					</p>
					<?php

					$selecao1 = mysqli_query($conexao, "select * from workflow WHERE id='$codigo'");
					$registros1 = mysqli_fetch_array($selecao1);
					?>

					<div class="row">

						<div class="col-md-12">
							<div id="retorno-atualizar-workflow"></div>

						</div>
					</div>
					<div class="row">

						<div class="col-md-6 mb-2 mt-2">
							<div id="retorno-datas" class="text-danger" style="font-weight: 800"></div>
						</div>
					</div>


					<div class="row mb-4">
						<div class="col-md-3 mb-3">
							<label>Data de Inicio</label>
							<input type="text" class="form-control datepicker bg-white data" name="cad-data-inicio" id="cad-data-inicio" value="<?php

																																				@$data_min = $registros1['data_inicio'];
																																				$ano_min = substr($data_min, 0, 4);
																																				$mes_min = substr($data_min, 5, 2);
																																				$dia_min = substr($data_min, 8, 2);

																																				@$data_max = $dia_min . "/" . $mes_min . "/" . $ano_min;

																																				echo	@$data_max;


																																				?>">
						</div>

						<input type="hidden" id="guarda-data-inicio" value="<?php echo $registros1['data_inicio'] ?>">

						<div class="col-md-3 mb-3">
							<label>Data de Término</label>
							<input type="text" class="form-control datepicker bg-white data" name="cad-data-vencimento" id="cad-data-vencimento" value="<?php

																																						@$data_max = $registros1['data_vencimento'];
																																						$ano_max = substr($data_max, 0, 4);
																																						$mes_max = substr($data_max, 5, 2);
																																						$dia_max = substr($data_max, 8, 2);

																																						@$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;

																																						echo @$data_max;


																																						?>" onClick="Data2()">
						</div>


						<div class="col-md-3 mb-3">
							<label>Status</label>
							<?php

							$status = $registros1['status'];
							?>

							<select class="form-control" name="cad-status" id="cad-status">

								<?php if ($status != '') { ?>

									<option selected><?php echo $registros1['status'] ?></option>
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

						<div class="col-md-3">
							<label>Periodicidade</label>
							<select class="form-control" name="cad-periodicidade1" id="cad-periodicidade1">
								<option><?php echo $registros1['periodicidade'] ?></option>
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

						<div class="col-md-10">
							<label>Planejamento</label>
							<input type="text" class="form-control bg-white" id="planejamento" value="<?php echo $registros1['planejamento'] ?>" style="font-size: 22px; font-weight: 800;">

						</div>

						<div class="col-md-3 mt-3">
							<label>Responsável</label>
							<input type="text" class="form-control bg-white" id="responProc" value="<?php echo $registros1['responProc'] ?>">

						</div>




					</div>
					<p><textarea id="nome-descricao" class="form-control bg-white" rows="5"><?php echo $registros1['descricao'] ?></textarea></p>

					<?php
					$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and editar='1' ");
					$numero_grupo = mysqli_num_rows($verificar_grupo);
					if ($numero_grupo >= 1) {

					?>
						<input type="button" class="btn btn-success mb-3" value="Atualizar dados" onClick="GravarAtividade()">


					<?php
					}
					?>


				</div>

				<?php
				mysqli_query($conexao, "SET NAMES 'utf8'");
				mysqli_query($conexao, 'SET character_set_connection=utf8');
				mysqli_query($conexao, 'SET character_set_client=utf8');
				mysqli_query($conexao, 'SET character_set_results=utf8');
				$selecao = mysqli_query($conexao, "select * from fases_workflow WHERE codigo_planejamento='$codigo' inner join atividades_planejamento_workflow='$codigo'");
				while ($registros = mysqli_fetch_array($selecao)) {
					$id = $registros['id'];

				?>
					<div class="col-md-12 mb-4">
						<div class="card text-white">
							<div class="card-body text-dark">

								<h3 class="card-title text-dark ">


									<?php echo $registros['fase'] ?>
									<p style="font-size: 14px; ">
										<?php if ($registros['data_inicio'] != '') { ?>
											Inicio: <?php
													@$data_min = $registros['data_inicio'];
													$ano_min = substr($data_min, 0, 4);
													$mes_min = substr($data_min, 5, 2);
													$dia_min = substr($data_min, 8, 2);

													@$data_min = $dia_min . "/" . $mes_min . "/" . $ano_min;

													echo	@$data_min;




													?> |
										<?php } ?>

										<?php if ($registros['data_termino'] != '') { ?>
											Término: <?php



														@$data_max = $registros['data_termino'];
														$ano_max = substr($data_max, 0, 4);
														$mes_max = substr($data_max, 5, 2);
														$dia_max = substr($data_max, 8, 2);

														@$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;

														echo	@$data_max;


														?> |







										<?php } ?>

										Status: <?php echo $registros['status'] ?> |
										Periodicidade: <?php echo $registros['periodicidade'] ?>


									</p>
									<?php

									$cod_fase = $registros['id'];


									?>

									<?php
									$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and excluir='1' ");
									$numero_grupo = mysqli_num_rows($verificar_grupo);
									if ($numero_grupo >= 1) {

									?>
										<span class="float-right">
											<i class="fa fa-trash" style="cursor: pointer" onClick="Excluirtarefa(<?php echo $cod_fase = $registros['id'] ?>)"></i>

										</span>

									<?php
									}
									?>

								</h3>



								<?php
								mysqli_query($conexao, "SET NAMES 'utf8'");
								mysqli_query($conexao, 'SET character_set_connection=utf8');
								mysqli_query($conexao, 'SET character_set_client=utf8');
								mysqli_query($conexao, 'SET character_set_results=utf8');
								$selecao_tarefas_fases = mysqli_query($conexao, "select * from atividades_planejamento_workflow WHERE codigo_fase='$cod_fase' ");
								while ($registros_tarefas_fases = mysqli_fetch_array($selecao_tarefas_fases)) {
								?>

									<img src="imgs/tasks.fw.png" width="40" alt="" style="float:left; margin-right: 20px; " />
									<a href="atividades-workflow.php?cod=<?php echo $registros_tarefas_fases['id'] ?>">
										<p style="line-height: 40px; vertical-align: middle; font-weight: 600" class="text-dark">

											<?php echo $registros_tarefas_fases['tarefa'] ?>
										</p>
									</a>

								<?php } ?>


							</div>
						</div>
					</div>
				<?php } ?>




				<!-- Modal -->
				<div class="modal fade" id="GravarTarefa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999999">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Marco</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="row ml-2 mr-2">
									<div class="col-md-12">


										<!-- <button type="button" name="escolha" value="fase" onClick="Escolha('fase')"> Marco &nbsp;&nbsp; -->
										<!--<input type="radio" name="escolha" value="tarefa" onClick="Escolha('tarefa')"> Atividade-->






										<div class="row">
											<div class="col-12">

												<h3 class="mb-4 mt-4">Cadastro Marco </h3>


												<div class="row">


													<div class="col-md-6 mb-4">
														<label>Título</label>
														<input type="text" name="cad-titulo" id="cad-titulo-marco" class="form-control" required>
													</div>

													<div class="col-md-3 mb-4">
														<label>Data de Inicio</label>
														<input type="text" name="cad-data-inicio" id="cad-data-inicio-marco" class="form-control datepicker data" required autocomplete="off">
													</div>

													<div class="col-md-3 mb-4">
														<label>Data Termino</label>
														<input type="text" name="cad-data-termino" id="cad-data-termino-marco" class="form-control datepicker data" required autocomplete="off">
													</div>

													<div class="col-md-4 mb-4">
														<label>Status</label>
														<select class="form-control" name="cad-status-fase" id="cad-status-fase">

															<option>Não iniciado</option>
															<option>Em andamento</option>
															<option>Concluído</option>


														</select>
													</div>

													<div class="col-md-3">
														<label>Periodicidade</label>
														<select class="form-control" name="cad-periodicidade3" id="cad-periodicidade3">
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


													<div class="col-md-12">
														<label>Descrição</label>
														<textarea class="form-control" cols="5" rows="5" name="cad-descricao" id="cad-descricao-marco"></textarea>
													</div>

													<div class="col-md-12 mt-4">
														<input type="submit" class="btn btn-primary" value="Cadastrar Marco" onClick="CadastroMarco()">
													</div>

												</div>

											</div>
										</div>


										<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
										<script src="js/jquery.mask.min.js"></script>
										<script src="js/mascaras.js"></script>

										<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
										<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
										<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.pt-br.js" type="text/javascript"></script>

										<script>
											$f = jQuery.noConflict()


											$f(document).ready(function() {

												$f('.data').mask('99/99/9999');

												CarregarData()
											});


											var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());



											$f('#cad-data-inicio-marco').datepicker({
												uiLibrary: 'bootstrap4',
												iconsLibrary: 'fontawesome',
												locale: 'pt-br',
												format: 'dd/mm/yyyy'


											});




											$f('#cad-data-termino-marco').datepicker({
												uiLibrary: 'bootstrap4',
												iconsLibrary: 'fontawesome',
												locale: 'pt-br',
												format: 'dd/mm/yyyy',
												minDate: function() {
													return $f('#cad-data-inicio-marco').val();
												}
											});
										</script>





									</div>

									<div class="col-md-12" id="resposta-escolha">

									</div>
								</div>

							</div>
							<div class="modal-footer">

							</div>
						</div>
					</div>
				</div>



			</div>


			<di>
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

				<h4>Atividades</h4>
				<table id="example2" class="table-striped" style="width:100%;">
					<thead>


						<tr>

							<th><strong>Id</strong></th>
							<th><strong>Atividade</strong></th>
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
						$selecao_atividades = mysqli_query($conexao, "select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' order by atividade ASC ");
						while ($registros_atividades = mysqli_fetch_array($selecao_atividades)) {
							// $id = $registros_atividades['id'];
							// $codigo_atividade = $registros['codigo_atividade'];
							// $selecao_tarefas = mysqli_query($conexao, "select * from atividades_planejamento_workflow WHERE id='$codigo_atividade'");
							// $registros_tarefas = mysqli_fetch_array($selecao_tarefas);
						?>

							<tr class="pointer">

								<?php


								$data_envio =  $registros_atividades['dtEnvioPlanoAcao'];
								$data_envio = explode("-", $data_envio);
								$dia_envio = $data_envio[2];
								$mes_envio = $data_envio[1];
								$ano_envio = $data_envio[0];
								$data_envio = $dia_envio . "/" . $mes_envio . "/" . $ano_envio;


								$data_prazo =  $registros_atividades['dtRetornoPrazo'];
								$data_prazo = explode("-", $data_prazo);
								$dia_prazo = $data_prazo[2];
								$mes_prazo = $data_prazo[1];
								$ano_prazo = $data_prazo[0];
								$data_prazo = $dia_prazo . "/" . $mes_prazo . "/" . $ano_prazo;


								$data_devol =  $registros_atividades['dtDevolutiva'];
								$data_devol = explode("-", $data_devol);
								$dia_devol = $data_devol[2];
								$mes_devol = $data_devol[1];
								$ano_devol = $data_devol[0];
								$data_devol = $dia_devol . "/" . $mes_devol . "/" . $ano_devol;


								$prazo_atend =  $registros_atividades['pzAtendPlanAcao'];
								$prazo_atend = explode("-", $prazo_atend);
								$dia_prazo = $prazo_atend[2];
								$mes_prazo = $prazo_atend[1];
								$ano_prazo = $prazo_atend[0];
								$prazo_atend = $dia_prazo . "/" . $mes_prazo . "/" . $ano_prazo;



								$data_atend =  $registros_atividades['datAtendPlanAcao'];
								$data_atend = explode("-", $data_atend);
								$dia_atend = $data_atend[2];
								$mes_atend = $data_atend[1];
								$ano_atend = $data_atend[0];
								$data_atend = $dia_atend . "/" . $mes_atend . "/" . $ano_atend;


								?>


								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer">
									<?php echo $registros_atividades['id'] ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer">
									<?php echo $registros_atividades['atividade'] ?>
								</td>

								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['itemQaa'] ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['responProc'] ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['responAcao'] ?>
								</td>

								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['empresa'] ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['departamento'] ?>
								</td>


								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['planoAcao'] ?>
								</td>

								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['mapaRisco'] ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $data_envio ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?> ">
									<?php echo $data_prazo ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades " id="classe-atividades_<?php echo $registros_atividades['id'] ?> ">
									<?php echo $data_devol ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['diasRetPrazo'] ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['statusDevolutiva'] ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades " id="classe-atividades_<?php echo $registros_atividades['id'] ?> ">
									<?php echo $prazo_atend ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades " id="classe-atividades_<?php echo $registros_atividades['id'] ?> ">
									<?php echo $data_atend ?>
								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades " id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['diasAtraso'] ?>
								</td>

								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['statusPrazoPlanoAcao'] ?>
								</td>

								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php

									$id_area = $registros_atividades['area'];
									$selecao_areas = mysqli_query($conexao, "select * from areas WHERE id='$id_area'");
									$reg = mysqli_fetch_array($selecao_areas);

									echo $reg['area'];
									?>
								</td>


								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">


									<?php
									@$data_min = $registros_atividades['data_inicio'];
									$ano_min = substr($data_min, 0, 4);
									$mes_min = substr($data_min, 5, 2);
									$dia_min = substr($data_min, 8, 2);

									@$data_min = $dia_min . "/" . $mes_min . "/" . $ano_min;

									echo	@$data_min;


									?>



								</td>

								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">


									<?php
									@$data_max = $registros_atividades['data_termino'];
									$ano_max = substr($data_max, 0, 4);
									$mes_max = substr($data_max, 5, 2);
									$dia_max = substr($data_max, 8, 2);

									@$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;

									echo	@$data_max;


									?>



								</td>
								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['status'] ?>
								</td>


								<td onClick="Atividade(<?php echo $registros_atividades['id'] ?>)" class="pointer classe-atividades width:40px" id="classe-atividades_<?php echo $registros_atividades['id'] ?>">
									<?php echo $registros_atividades['descricao'] ?>
								</td>


								<td><i class="fa fa-trash pointer" onClick="ExcluirAtividade(<?php echo $registros_atividades['id'] ?>)"></i></td>
							</tr>

						<?php
						}
						?>
					</tbody>
				</table>

		</div>


		<div class="col-md-12" id="coluna-direita">


		</div>




	</div>

	</div>
	<input type="hidden" id="passa-id">

	<input type="hidden" id="cod-planejamento" value="<?php echo $codigo ?>">






	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 999999999">
		<div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 999999999">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Responsáveis</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="resposta-modal"></div>

					<div id="carregar-listar-usuarios"></div>

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

					<input type="button" value="Adicionar" class="btn btn-primary" onclick="AdicionarResponsavel(<?php echo $codigo ?>)">

				</div>
			</div>
		</div>
	</div>



	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>




	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>

	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
	<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
	<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.pt-br.js" type="text/javascript"></script>

	<script>
		$f = jQuery.noConflict()

		$('#example2').DataTable({

		});


		$f(document).ready(function() {

			$f('.data').mask('99/99/9999');
		});


		function CarregarData() {

			$f('.data').mask('99/99/9999');
		}


		var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());



		$f('#cad-data-inicio').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$f('#cad-data-vencimento').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {
				return $f('#cad-data-inicio').val();
			}
		});




		function GravarAtividade() {

			// alert('entrando daqui')
			var planejamento = $f('#planejamento').val()
			var codigo = $f('#codigo_atividade').val()
			var descricao = $f('#nome-descricao').val()
			var responProc = $f('#responProc').val()

			// alert('passando daqui1')
			var inicio = $f('#cad-data-inicio').val()
			// alert('passando daqui2')

			var dia1 = inicio.substring(0, 2);
			var mes1 = inicio.substring(5, 3);
			var ano1 = inicio.substring(10, 6);



			// alert('passando daqui3')
			if (dia1 > 31) {
				$f("#retorno-datas").html("Campo Data de Inicio preenchido incorretamente!")
			} else if (mes1 > 12) {
				$f("#retorno-datas").html("Campo Data de Inicio preenchido incorretamente!")
			} else if (ano1 <= 1999) {
				$f("#retorno-datas").html("Campo Data de Inicio preenchido incorretamente!")
			} else {


				var vencimento = $f('#cad-data-vencimento').val()
				var dia2 = vencimento.substring(0, 2);
				var mes2 = vencimento.substring(5, 3);
				var ano2 = vencimento.substring(10, 6);

				// alert('passando daqui4')

				if (dia2 > 31) {
					$f("#retorno-datas").html("Campo Data de Término preenchido incorretamente!")
				} else if (mes2 > 12) {
					$f("#retorno-datas").html("Campo Data de Término preenchido incorretamente!")
				} else if (ano2 <= 1999) {
					$f("#retorno-datas").html("Campo Data de Término preenchido incorretamente!")
				} else {

					// var envolvido = $f('#cad-envolvido').val()
					var status = $f('#cad-status').val()
					var periodicidade = $f('#cad-periodicidade1').val()
					var area = $f('#cad-area option:selected').val()

					// alert('passando daqui5')

					$f.ajax({

						type: 'post',
						data: '&codigo=<?php echo $codigo ?>&planejamento=' + planejamento + '&descricao=' + descricao +
							'&inicio=' + inicio + '&vencimento=' + vencimento + '&status=' + status + '&periodicidade=' + periodicidade + '&area=' + area + '&responProc=' + responProc,
						url: 'funcoes/atualizar-workflow.php',

						success: function(retorno) {
							$f('#retorno-datas').html('')
							$f("#retorno-atualizar-workflow").hide();
							$f('#retorno-atualizar-workflow').html(retorno)
							$f("#retorno-atualizar-workflow").show(1000);
							$f("#retorno-atualizar-workflow").hide(1000);
						}
					})

				}
			}
			// alert('passando daqui6')
		}


		function Atividade(variavel) {
			$('#codigo-atividade').val(variavel)



			$.ajax({
				type: 'post',
				data: 'codigo=' + variavel + '&cod=<?php echo $codigo ?>',
				url: 'funcoes/carregar-atividades-workflow.php',
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
			//$('.classe-atividades').removeClass('bg-cinza')
			//$('#classe-atividades_'+codigo).addClass('bg-cinza')


		}




		$f('#cad-data-termino-marco').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',

		});

		$f('#cad-data-inicio-marco').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',

		});







		$f(document).ready(function() {

			$f('#example').DataTable();
		});



		$f("#example").dataTable({
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




		function Escolha(variavel) {


			if (variavel == 'fase') {

				$f.ajax({
					type: 'post',
					data: 'codigo=',
					url: 'forms/form-cadastro-fase-workflow.php',
					success: function(retorno) {

						$f('#resposta-escolha').html(retorno);
						Carregartabelas()
					}
				})


			}

			/*if (variavel == 'tarefa') {

				$f.ajax({
					type: 'post',
					data: 'codigo=<?php echo $codigo ?>',
					url: 'forms/form-cadastro-atividade-workflow.php',
					success: function(retorno) {
						$f('#resposta-escolha').html(retorno);
						Carregartabelas()
					}
				})
			}*/
		}

		$f(document).ready(function() {
			CarregaUsers()

		})

		function PassaId(variavel) {
			$f('#passa-id').val(variavel)
		}


		function TipoTarefa() {

			var variavel = $f("#tipo-tarefa :selected").val()

			if (variavel == 'texto') {

				$f('#resposta-tarefa').load('tipos/texto.php')
			}


			if (variavel == 'anexos') {
				$f('#resposta-tarefa').load('tipos/anexos.php')
			}


			if (variavel == 'qaa') {
				$f('#resposta-tarefa').load('tipos/questao-qaa.php')
			}


		}


		function GravarTexto() {

			var titulo = $f("#cad-titulo").val()
			var descricao = $f("#cad-descricao").val()
			var codigo = $f("#passa-id").val()

			$f.ajax({
				type: 'post',
				data: 'codigo=' + codigo + '&titulo=' + titulo + '&descricao=' + descricao,
				url: 'funcoes/gravar-texto.php',
				success: function(retorno) {
					$f('#resposta-tarefa').html(retorno);
					$f('.close').trigger('click')
					location.reload();

				}
			})
		}


		function GravarArquivo() {

			$f.ajax({
				type: 'post',
				data: 'codigo=' + codigo + '&titulo=' + titulo + '&descricao=' + descricao,
				url: 'funcoes/gravar-upload.php',
				success: function(retorno) {
					$f('#resposta-tarefa').html(retorno);
					$f('.close').trigger('click')
					location.reload();
				}
			})
		}


		function Excluirtarefa(variavel) {
			if (window.confirm("Você deseja excluir a Tarefa?")) {
				$f.ajax({
					type: 'post',
					data: 'codigo=' + variavel,
					url: 'funcoes/excluir-fase-workflow.php',
					success: function(retorno) {
						$f('#resposta-campos').html(retorno);
						location.reload();
					}
				})

			}
		}


		function ExcluirAtividade(codigo) {
			if (window.confirm("Você deseja excluir a Atividade?")) {
				$f.ajax({
					type: 'post',
					data: 'codigo=' + codigo,
					url: 'funcoes/excluir-atividade-workflow.php',
					success: function(retorno) {
						$f('#resposta-campos').html(retorno);
						location.reload();
					}
				})

			}
		}


		function CadastroAtividade() {
			var tarefa = $f('#cad-tarefa').val()
			var datainicio = $f('#cad-data-inicio2').val()
			var datatermino = $f('#cad-data-termino2').val()
			var descricao = $f('#cad-descricao').val()
			var codigomarco = $f("#cad-codigo-marco").val()
			var envolvido = $f("#cad-envolvido").val()
			var status = $f("#cad-status-atividade").val()

			$f.ajax({
				type: 'post',
				data: 'codigo=' + <?php echo $codigo ?> + '&tarefa=' + tarefa + '&descricao=' + descricao + '&datainicio=' + datainicio + '&datatermino=' + datatermino + '&marco=' + codigomarco + '&envolvido=' + envolvido + '&status=' + status,
				url: 'processa-cadastro-atividade-workflow.php',
				success: function(retorno) {
					$f('#resposta-campos').html(retorno);
					$f('.close').trigger('click')
					location.reload();
				}
			})
		}

		function CadastroMarco() {

			var titulo = $f('#cad-titulo-marco').val()
			var datainicio = $f('#cad-data-inicio-marco').val()
			var datatermino = $f('#cad-data-termino-marco').val()
			var descricao = $f('#cad-descricao-marco').val()
			var codigo = $f("#cod-planejamento").val()
			var status = $f('#cad-status-fase').val()

			$f.ajax({
				type: 'post',
				data: 'codigo=' + codigo + '&titulo=' + titulo + '&datainicio=' + datainicio + '&datatermino=' + datatermino + '&descricao=' + descricao + '&status=' + status,
				url: 'processa-cadastro-fase-workflow.php',
				success: function(retorno) {
					$f('#resposta-campos').html(retorno);
					$f('.close').trigger('click')
					location.reload();
				}
			})


		}



		function CarregaUsers(variavel) {

			$f.ajax({
				type: 'post',
				data: 'workflow=' + variavel,
				url: 'lista-usuarios-modal-workflow.php',
				success: function(retorno) {
					$f('#resposta-modal').html(retorno);
					//$g('#fechar-quests').trigger('click')
					//location.reload()  	  

				}
			})
		}


		function AdicionarResponsavel(variavel) {

			var usuario = $f("#novo-user option:selected").val()


			$f.ajax({
				type: 'post',
				data: 'workflow=' + variavel + '&usuario=' + usuario,
				url: 'funcoes/gravar-responsavel-workflow.php',
				success: function(retorno) {
					$f('#resposta-modal').html(retorno);
					CarregaUsers(variavel)

				}
			})
		}



		function ExcluirResponsavel(codigo) {
			if (window.confirm("Você deseja excluir o Responsável?")) {

				$f.ajax({
					type: 'post',
					data: 'codigo=' + codigo + '&banco=responsaveis_workflow',
					url: 'funcoes/excluir-responsavel.php',
					success: function(retorno) {
						$f('#resposta-modal').html(retorno);
						CarregaUsers(<?php echo $codigo ?>)

					}
				})

			}

		}


		function AtualizarAtividade(codigo) {


			var area = $("#area").val()
			var atividade = $("#atividade").val()
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
				data: 'codigo=' + codigo +
					'&atividade=' + atividade + '&descricao=' +
					descricao + '&inicio=' + inicio + '&termino=' +
					termino + '&envolvido=' + envolvido + '&status=' + status +
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



				url: 'funcoes/atualizar-atividades-workflow.php',
				success: function(retorno) {
					// alert('caiu aqui')
					var atividade = $('#codigo-atividade').val()
					Atividade(atividade)
					location.reload()

					// $f("#retorno-atualizar-workflow").hide();
					// $f('#retorno-atualizar-workflow').html(retorno)
					// $f("#retorno-atualizar-workflow").show(1000);
					// $f("#retorno-atualizar-workflow").hide(1000);
				}
			})


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