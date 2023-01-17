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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Marcos - Workflow de Atividades</span>
						</div>
					</div>


				</div>
			</div>
			<div class="row">
				<div class="col-12">

					<h3 class="mb-4 mt-4 float-left">Marcos - Workflow de Atividades</h3>
					<p class="float-right mr-5" style="margin-top:50px"><a href="workflow.php" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;">Workflow</a> | <a href="pesquisar-marcos.php" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;">Marcos</a> | <a href="pesquisar-atividades.php" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;">Atividades</a> | <a href="pesquisar-tarefas.php" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;"> Tarefas</a></p>

					<div style="clear: both"></div>


					<?php
					$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
					$numero_grupo = mysqli_num_rows($verificar_grupo);
					if ($numero_grupo >= 1) {
					?>
						<a href="cadastro-planejamento-workflow.php" class="mb-5" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;border-radius:5px;background:#031335;color:#fff;text-decoration:none;cursor:pointer;"> Novo Planejamento</a>
					<?php } ?>




					<form action="pesquisar-marcos.php" method="post" class="mt-5">

						<h5>Pesquisa por Datas</h5>
						<div class="row">
							<div class="col-md-2 mb-3">
								<label>Data de Início</label>
								<input type="text" class="form-control data datepicker" id="min" name="min" autocomplete="off" value="<?php echo @$_POST['min'] ?>">
							</div>

							<div class="col-md-2 mb-3">
								<label>Data de Término</label>
								<input type="text" class="form-control data datepicker" id="max" name="max" autocomplete="off" value="<?php echo @$_POST['max'] ?>">
							</div>

							<div class="col-md-2 mb-3">
								<label>&nbsp;</label>
								<input type="submit" class="btn btn-primary" value="Filtrar">
							</div>
						</div>
					</form>



					<div id="resposta-tabela"></div>






					<!---<input type="button" value="Relatório Completo" class="btn btn-secondary mb-3" onClick="RelatorioFull()">
		--->

					<table id="example" class="display" style="width:100%">


						<thead>
							<tr>
								<th>Marco</th>
								<th>Prioridade</th>
								<th>Inicio</th>
								<th>Término</th>
								<th>Status</th>
								<th>Periodicidade</th>
								<th>Responsável</th>
								<th>Ação</th>

							</tr>
						</thead>
						<tbody>
							<?php




							$selecao2 = mysqli_query($conexao, "select * from responsaveis_workflow WHERE codigo_usuario='$codigo_usuario'");
							$registros2 = mysqli_fetch_array($selecao2);
							$codigo_workflow = $registros2['codigo_workflow'];


							@$data_min = $_POST['min'];
							$ano_min = substr($data_min, 6, 10);
							$mes_min = substr($data_min, 3, 2);
							$dia_min = substr($data_min, 0, 2);

							@$data_min = $ano_min . "-" . $mes_min . "-" . $dia_min;


							@$data_max = $_POST['max'];
							$ano_max = substr($data_max, 6, 10);
							$mes_max = substr($data_max, 3, 2);
							$dia_max = substr($data_max, 0, 2);

							@$data_max = $ano_max . "-" . $mes_max . "-" . $dia_max;


							if ($data_min == '--') {
								$data_min = '1999-01-01';
							}
							if ($data_max == '--') {
								$data_max = '2200-01-01';
							}


							if (@$_POST['min'] == '') {
								$selecao = mysqli_query($conexao, "select * from fases_workflow ");
							} else {

								$selecao = mysqli_query($conexao, "select * from fases_workflow WHERE data_inicio >='$data_min' and data_termino <='$data_max' ");
							}


							while ($registros = mysqli_fetch_array($selecao)) {
								$id = $registros['id'];
							?>
								<tr>
									<td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['codigo_planejamento'] ?>"><?php echo $registros['fase'] ?></a></td>



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

																@$data_max = $data_inicio = $registros['data_termino'];
																$ano_max = substr($data_max, 0, 4);
																$mes_max = substr($data_max, 5, 2);
																$dia_max = substr($data_max, 8, 2);

																echo @$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;




																?></a></td>

									<td><a class="text-dark"><?php echo $registros['status'] ?></a></td>

									<td><a class="text-dark"><?php echo $registros['periodicidade'] ?></a></td>




									<td><a class="text-dark"><?php


																$selecao_responsavel = mysqli_query($conexao, "select * from responsaveis_workflow WHERE codigo_workflow ='$id'");
																$registros_responsavel = mysqli_fetch_array($selecao_responsavel);

																echo $registros_responsavel['usuario'] ?></a></td>





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
											<a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['codigo_planejamento'] ?>"><i class="fa fa-edit " style="cursor: pointer"></i></a>

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





			$(function() {
				$(".datepicker").datepicker();
			});



			$(".datepicker").datepicker({
				dateFormat: 'dd/mm/yy',
				dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
				dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
				dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
				monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
				monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
				nextText: 'Próximo',
				prevText: 'Anterior'
			});




			$('#example').DataTable({
				"dom": '<"top"i>rt<"bottom"flp><"clear">',
				"iDisplayLength": 1000,
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
						"sLast": "Último",
						"pageLength": "1"
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
							columns: [0, 1, 2, 3, 4, 5, 6]
						}
					},



				],

			});
		});
	</script>


	<script>
		function Excluir(variavel) {
			if (window.confirm("Tem certeza que deseja excluir o Marco?")) {

				$.ajax({
					type: 'post',
					data: 'codigo=' + variavel,
					url: 'funcoes/excluir-marcos-workflow.php',
					success: function(retorno) {
						$('#resposta-duplicar').html(retorno);
						location.href = 'pesquisar-marcos.php'
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