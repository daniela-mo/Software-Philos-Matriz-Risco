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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>



<body class=" fixed-nav sticky-footer" id="page-top">
	<!-- Navegação !-->
	<?php
	include('menu.php');
	mysqli_query($conexao, "SET NAMES 'utf8'");
	mysqli_query($conexao, 'SET character_set_connection=utf8');
	mysqli_query($conexao, 'SET character_set_client=utf8');
	mysqli_query($conexao, 'SET character_set_results=utf8');
	$selecao_usuario = mysqli_query($conexao, "select * from usuarios_empresa WHERE email='$usuario' ");
	$registros_usuario = mysqli_fetch_array($selecao_usuario);
	$codigo_usuario = $registros_usuario['id'];
	?>
	<!-- Navegação !-->


	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Workflow de Atividades</span>
						</div>
					</div>


				</div>
			</div>
			<div class="row">
				<div class="col-12">

					<h3 class="mb-4 mt-4 float-left">Workflow de Atividades</h3>




					<p class="float-right mr-5" style="margin-top:50px"><a href="workflow.php" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;">Workflow</a> | <a href="pesquisar-marcos.php" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;">Marcos</a> | <a href="pesquisar-atividades.php" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;">Atividades</a> | <a href="pesquisar-tarefas.php" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;"> Tarefas</a></p>
					<div style="clear: both"></div>


					<?php
					$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
					$numero_grupo = mysqli_num_rows($verificar_grupo);
					if ($numero_grupo >= 1) {
					?>
						<a href="cadastro-planejamento-workflow.php" class="mb-5" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;"> Novo Planejamento</a>
					<?php } ?>





					<form method="POST" action="workflow.php?cod=<?php echo $codigo ?>" class="d-flex w-100 mt-5 mb-5">


						<select name="filter_status" id="filter_status" class="form-control mr-3">
							<option value="">Selecione o Status</option>
							<option value="aberto">Aberto</option>
							<option value="concluido">Concluído</option>
							<option value="andamento">Em andamento</option>
							<option value="niniciado">Não iniciado</option>
						</select>

						<select name="filter_risco" id="filter_risco" class="form-control mr-3">
							<option value="">Selecione o Risco</option>
							<option value="inerente">Risco Inerente</option>
							<option value="residual">Risco Residual</option>
							<option value="futuro">Risco Futuro</option>
						</select>

						<select name="filter_prioridade" id="filter_prioridade" class="form-control mr-3">
							<option value="">Selecione a Prioridade</option>
							<option value="baixa">Baixa</option>
							<option value="media">Média</option>
							<option value="alta">Alta</option>
						</select>

						<select name="filter_responsavel" id="filter_responsavel" class="form-control mr-3">
							<option value="">Selecione o Responsável</option>
							<?php
							mysqli_query($conexao, "SET NAMES 'utf8'");
							mysqli_query($conexao, 'SET character_set_connection=utf8');
							mysqli_query($conexao, 'SET character_set_client=utf8');
							mysqli_query($conexao, 'SET character_set_results=utf8');
							$selecao = mysqli_query($conexao, "select * from workflow");
							while ($registros = mysqli_fetch_array($selecao)) {
								$responsavel = $registros['responProc'] ?>
								<option value="<?php echo $responsavel ?>"><?php echo $responsavel ?></option>
							<?php } ?>

						</select>

						<label style="display:flex;align-items:center;margin-left:7px">Início</label>
						<input type="date" name="data-inicio" id="data-inicio" class="form-control">

						<label style="display:flex;align-items:center;margin-left:7px">Término</label>
						<input type="date" name="data-vencimento" id="data-vencimento" class="form-control">


						<input type="submit" class="btn btn-primary ml-3" value="Filtrar" />
						<input id="refresh" class="btn btn-primary ml-3" value="Limpar" />

					</form>



					<form action="workflow.php" method="post" class="mt-5 ">

						<div class="row">

						</div>
					</form>


					<div id="resposta-tabela"></div>



					<!---<input type="button" value="Relatório Completo" class="btn btn-secondary mb-3" onClick="RelatorioFull()">
		--->

					<table id="example" class="display">


						<thead>
							<tr>
								<th>Id</th>
								<th>Desc. Evento de Risco </th>
								<th>Planejamento</th>
								<th>Prioridade</th>
								<th>Inicio</th>
								<th>Término</th>
								<th>Status</th>
								<th style="width:110px">Responsável pelo processo</th>
								<th style="width:110px">Responsável pela Ação</th>
								<th style="width:120px">Planta</th>
								<th style="width:120px">Departamento</th>
								<th>Risco</th>
								<th>Ação</th>

							</tr>
						</thead>
						<tbody>

							<?php

							// $dtInicio = date('y/m/d', strtotime($_POST['data-inicio']));
							// $dtFinal = date('y/m/d', strtotime($_POST['data-vencimento']));


							header("Expires: 0");
							header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
							header("Cache-Control: no-store, no-cache, must-revalidate");
							header("Cache-Control: post-check=0, pre-check=0", false);
							header("Pragma: no-cache");

							if (isset($_POST['data-inicio']) && (isset($_POST['data-vencimento']))) {
								$dtInicio = date('Y/m/d', strtotime($_POST['data-inicio']));
								$dtFinal = date('Y/m/d', strtotime($_POST['data-vencimento']));
							}

							if (isset($_POST['filter_status'])) {
								$filter_status = $_POST['filter_status'];
							}
							if (isset($_POST['filter_risco'])) {
								$filter_risco = $_POST['filter_risco'];
							}
							if (isset($_POST['filter_prioridade'])) {
								$filter_prioridade = $_POST['filter_prioridade'];
							}
							if (isset($_POST['filter_responsavel'])) {
								$filter_responsavel = $_POST['filter_responsavel'];
							}

							if ($filter_status == 'aberto') {
								$sql = "select * from workflow WHERE status='Aberto'";
							} elseif ($filter_status == 'concluido') {
								$sql = "select * from workflow WHERE status='Concluído'";
							} elseif ($filter_status == 'andamento') {
								$sql = "select * from workflow WHERE status='Em andamento'";
							} elseif ($filter_status == 'niniciado') {
								$sql = "select * from workflow WHERE status='Não iniciado'";
							} elseif ($filter_risco == 'residual') {
								$sql = "select * from workflow WHERE risco='Risco Residual'";
							} elseif ($filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE risco='Risco Inerente'";
							} elseif ($filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE risco='Risco Futuro'";
							} elseif ($filter_prioridade == 'alta') {
								$sql = "select * from workflow WHERE prioridade='Alta'";
							} elseif ($filter_prioridade == 'media') {
								$sql = "select * from workflow WHERE prioridade='Média'";
							} elseif ($filter_prioridade == 'baixa') {
								$sql = "select * from workflow WHERE prioridade='Baixa'";
							} elseif ($filter_responsavel != '') {
								$sql = "select * from workflow WHERE responProc='$filter_responsavel'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO STATUS E RISCO INERENTE------------------------------------------------------------------------
							elseif ($filter_status == 'aberto' && $filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE risco='Risco Inerente' and status='Aberto'";
							} elseif ($filter_status == 'concluido' && $filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE risco='Risco Inerente' and status='Concluído'";
							} elseif ($filter_status == 'andamento' && $filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE risco='Risco Inerente' and status='Em andamento'";
							} elseif ($filter_status == 'niniciado' && $filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE risco='Risco Inerente' and status='Não iniciado'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO STATUS E RISCO RESIDUAL------------------------------------------------------------------------

							elseif ($filter_status == 'aberto' && $filter_risco == 'residual') {
								$sql = "select * from workflow WHERE risco='Risco Residual' and status='Aberto'";
							} elseif ($filter_status == 'concluido' && $filter_risco == 'residual') {
								$sql = "select * from workflow WHERE risco='Risco Residual' and status='Concluído'";
							} elseif ($filter_status == 'andamento' && $filter_risco == 'residual') {
								$sql = "select * from workflow WHERE risco='Risco Residual' and status='Em andamento'";
							} elseif ($filter_status == 'niniciado' && $filter_risco == 'residual') {
								$sql = "select * from workflow WHERE risco='Risco Residual' and status='Não iniciado'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO STATUS E RISCO FUTURO------------------------------------------------------------------------

							elseif ($filter_status == 'aberto' && $filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Aberto'";
							} elseif ($filter_status == 'concluido' && $filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Concluído'";
							} elseif ($filter_status == 'andamento' && $filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Em andamento'";
							} elseif ($filter_status == 'niniciado' && $filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Não iniciado'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO PRIORIDADE E STATUS CONCLUIDO ------------------------------------------------------------------------
							elseif ($filter_status == 'concluido' && $filter_prioridade == 'alta') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Concluído'";
							} elseif ($filter_status == 'concluido' && $filter_prioridade == 'media') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Concluído'";
							} elseif ($filter_status == 'concluido' &&  $filter_prioridade == 'baixa') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Concluído'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO PRIORIDADE E STATUS ABERTO ------------------------------------------------------------------------
							elseif ($filter_status == 'aberto' && $filter_prioridade == 'alta') {
								$sql = "select * from workflow WHERE prioridade='Alta' and status='Aberto'";
							} elseif ($filter_status == 'aberto' && $filter_prioridade == 'media') {
								$sql = "select * from workflow WHERE prioridade='Média' and status='Aberto'";
							} elseif ($filter_status == 'aberto' && $filter_prioridade == 'futuro') {
								$sql = "select * from workflow WHERE prioridade='Baixa' and status='Aberto'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO PRIORIDADE E STATUS EM ANDAMENTO ------------------------------------------------------------------------
							elseif ($filter_status == 'andamento' && $filter_prioridade == 'alta') {
								$sql = "select * from workflow WHERE prioridade='Alta' and status='Em andamento'";
							} elseif ($filter_status == 'andamento' && $filter_prioridade == 'media') {
								$sql = "select * from workflow WHERE prioridade='Média' and status='Em andamento'";
							} elseif ($filter_status == 'andamento' && $filter_prioridade == 'baixa') {
								$sql = "select * from workflow WHERE prioridade='Baixa' and status='Em andamento'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO PRIORIDADE E STATUS NÃO INICIADO ------------------------------------------------------------------------
							elseif ($filter_status == 'niniciado' && $filter_prioridade == 'alta') {
								$sql = "select * from workflow WHERE prioridade='Alta' and status='Não iniciado'";
							} elseif ($filter_status == 'niniciado' && $filter_prioridade == 'media') {
								$sql = "select * from workflow WHERE prioridade='Média' and status='Não iniciado'";
							} elseif ($filter_status == 'niniciado' && $filter_prioridade == 'baixa') {
								$sql = "select * from workflow WHERE prioridade='Baixa' and status='Não iniciado'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO PRIORIDADE E RISCO INERENTE ------------------------------------------------------------------------

							elseif ($filter_status == 'aberto' && $filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE risco='Risco Inerente' and status='Aberto'";
							} elseif ($filter_status == 'concluido' && $filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE risco='Risco Inerente' and status='Concluído'";
							} elseif ($filter_status == 'andamento' && $filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE risco='Risco Inerente' and status='Em andamento'";
							} elseif ($filter_status == 'niniciado' && $filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE risco='Risco Inerente' and status='Não iniciado'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO PRIORIDADE E RISCO RESIDUAL ------------------------------------------------------------------------


							elseif ($filter_status == 'aberto' && $filter_risco == 'residual') {
								$sql = "select * from workflow WHERE risco='Risco Residual' and status='Aberto'";
							} elseif ($filter_status == 'concluido' && $filter_risco == 'residual') {
								$sql = "select * from workflow WHERE risco='Risco Residual' and status='Concluído'";
							} elseif ($filter_status == 'andamento' && $filter_risco == 'residual') {
								$sql = "select * from workflow WHERE risco='Risco Residual' and status='Em andamento'";
							} elseif ($filter_status == 'niniciado' && $filter_risco == 'residual') {
								$sql = "select * from workflow WHERE risco='Risco Residual' and status='Não iniciado'";
							}

							// ----------------------------------------------------------------- FILTRO DINÂMICO PRIORIDADE E RISCO FUTURO ------------------------------------------------------------------------

							elseif ($filter_status == 'aberto' && $filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Aberto'";
							} elseif ($filter_status == 'concluido' && $filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Concluído'";
							} elseif ($filter_status == 'andamento' && $filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Em andamento'";
							} elseif ($filter_status == 'niniciado' && $filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE risco='Risco Futuro' and status='Não iniciado'";
							}


							// ----------------------------------------------------------------- FILTRO DINÂMICO DATAS------------------------------------------------------------------------
							elseif ($dtFinal != '' && $dtInicio != '') {
								$sql = "select * from workflow WHERE data_inicio and data_vencimento between '$dtInicio' and '$dtFinal'";
							}
							// ----------------------------------------------------------------- FILTRO DINÂMICO DATAS E RISCO ------------------------------------------------------------------------
							elseif ($dtFinal != '' && $dtInicio != '' && $filter_risco == 'inerente') {
								$sql = "select * from workflow WHERE and data_inicio and data_vencimento between '$dtInicio' and '$dtFinal' and risco='Risco Inerente'";
							} elseif ($dtFinal != '' && $dtInicio != '' && $filter_risco == 'residual') {
								$sql = "select * from workflow WHERE and data_inicio and data_vencimento between '$dtInicio' and '$dtFinal' and risco='Risco Residual'";
							} elseif ($dtFinal != '' && $dtInicio != '' && $filter_risco == 'futuro') {
								$sql = "select * from workflow WHERE and data_inicio and data_vencimento between '$dtInicio' and '$dtFinal' and risco='Risco Futuro'";
							} else {
								$sql = "select * from workflow";
							}

							// $sql = "select * from workflow  ";


							$selecao = mysqli_query($conexao, $sql);
							while ($registros = mysqli_fetch_array($selecao)) {
								$id = $registros['id'];
								$codigo_matriz = $registros['codigo_matriz_risco'];
								$riscos = $registros['risco'];
								// $responsavel = $registros['responProc'];
								// $dtI = $registros['data-inicio'];
								// $dtF = $registros['data-vencimento'];
							?>
								<tr>
									<td><a class="text-dark"><?php echo $registros['id'] ?></a></td>

									<td style="padding-left:20px;">
										<?php
										$selecao_risco = mysqli_query($conexao, "select * from identificacao_do_risco where id='$codigo_matriz'");
										while ($registros_matriz = mysqli_fetch_array($selecao_risco)) {
											$evento_risco = $registros_matriz['evento_risco'];
											$codigo = $registros_matriz['id'] ?>
											<a style="width:400px;" class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
												<?php echo $registros_matriz['evento_risco'] ?></a>
										<?php } ?>
									</td>

									<td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['planejamento'] ?></a></td>

									<td><a class="text-dark"><?php echo $registros['prioridade'] ?></a></td>

									<td><a class="text-dark">

											<?php
											$data_inicio = $registros['data_inicio'];

											$ano_min = substr($data_inicio, 0, 4);
											$mes_min = substr($data_inicio, 5, 2);
											$dia_min = substr($data_inicio, 8, 2);

											echo  @$data_inicio = $dia_min . "/" . $mes_min . "/" . $ano_min;




											?> </a></td>

									<td><a class="text-dark"><?php

																@$data_max = $data_inicio = $registros['data_vencimento'];
																$ano_max = substr($data_max, 0, 4);
																$mes_max = substr($data_max, 5, 2);
																$dia_max = substr($data_max, 8, 2);

																echo @$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;




																?></a></td>

									<td><a class="text-dark"><?php echo $registros['status'] ?></a></td>


									<td><a class="text-dark" style="width:110px"><?php echo $registros['responProc'] ?></a></td>

									<td><a class="text-dark" style="width:110px"><?php echo $registros['responAcao'] ?></a></td>

									<td><a class="text-dark" style="width:110px"><?php echo $registros['empresa'] ?></a></td>

									<td><a class="text-dark" style="width:110px"><?php echo $registros['area'] ?></a></td>
















									<td><a class="text-dark" style="width:110px"><?php echo $registros['risco'] ?></a></td>







									<td>
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {

										?>
											<!--<a class="text-dark" href="" onClick="Duplicar(<?php // echo $registros['id']; 
																								?>)">
					<i class="fa fa-folder " style="cursor: pointer"></i></a>
					--->
										<?php } ?>


										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {

										?>
											<a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><i class="fa fa-edit " style="cursor: pointer"></i></a>

										<?php } ?>



										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and excluir='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<a class="text-dark" href="" onClick="Excluir(<?php echo $registros['id']; ?>)">
												<i class="fa fa-trash" style="cursor: pointer"></i></a>
										<?php } ?>

									</td>

								</tr>

							<?php } ?>

						</tbody>

					</table>

				</div>
			</div>
		</div>

	</div>
	<div id="resposta-duplicar"></div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>+
	<script src="js/sb-admin.min.js" type="text/javascript"></script>

	<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
	<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
	<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/jquery.mask.min.js"></script>

	<script>
		$(document).ready(function() {
			$('.data').mask('99/99/9999');





			// $(function() {
			// 	$(".datepicker").datepicker();
			// });



			// $(".datepicker").datepicker({
			// 	dateFormat: 'dd/mm/yy',
			// 	dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
			// 	dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
			// 	dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
			// 	monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			// 	monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			// 	nextText: 'Próximo',
			// 	prevText: 'Anterior'
			// });




			$('#example').DataTable({
				scrollX: true,
				"scrollY": 500,
				// "dom": '<"top"i>rt<"bottom"flp><"clear">',
				"iDisplayLength": 5,
				// stateSave: true,
				"bJQueryUI": true,
				"filter": false,
				"oLanguage": {
					"sProcessing": "Processando...",
					"sLengthMenu": "",
					"sZeroRecords": "Não foram encontrados resultados",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
					"sInfoFiltered": "",
					"sInfoPostFix": "",
					"sSearch": false,
					"sUrl": "",
					"oPaginate": {
						"sFirst": "Primeiro",
						"sPrevious": "Anterior",
						"sNext": "Seguinte",
						"sLast": "Último",
						// "pageLength": "1"
					}
				},
				dom: 'Bfrtip',
				buttons: [{
						extend: 'pdf',
						orientation: 'landscape',
						footer: true,
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6]
						}


					},
					{
						extend: 'csv',
						footer: false

					},
					{
						extend: 'excelHtml5',
						footer: false,
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]
						}
					},

					{
						text: 'Excel Detalhado(Todos Dados)',
						action: function(e, dt, node, config) {
							RelatorioExcell()
						}



					}

				],

			});
		});
	</script>


	<script>
		var btn = document.querySelector("#refresh");
		btn.addEventListener("click", function() {

			location.href = 'workflow.php?cod=<?php echo $codigo ?>'
		});


		function Excluir(variavel) {
			if (window.confirm("Tem certeza que deseja excluir?")) {

				$.ajax({
					type: 'post',
					data: 'codigo=' + variavel,
					url: 'funcoes/excluir-workflow.php',
					success: function(retorno) {
						$('#resposta-duplicar').html(retorno);
						location.href = 'workflow.php'
					}
				})



			} else {

			}

		}


		function Duplicar(variavel) {

			if (window.confirm("Tem certeza que deseja duplicar essa implementação?")) {

				$.ajax({
					type: 'post',
					data: 'codigo=' + variavel,
					url: 'funcoes/duplicar-workflow1.php',
					success: function(retorno) {

						$('#resposta-duplicar').html(retorno);
						location.href = 'workflow.php'
					}
				})



			} else {

			}

		}





		function RelatorioExcell() {
			var min = $('#min').val()
			var max = $('#max').val()

			location.href = "relatorio-workflow2.php?min=" + min + '&max=' + max
		}
	</script>
</body>

</html>