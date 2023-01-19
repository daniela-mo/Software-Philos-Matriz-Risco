<?php
$nav_menu_principal = 'naoconformidade';
$nav_menu_pagina = 'rncs';
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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | RNC</span>
						</div>
					</div>


				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div id="resposta-tabela"></div>

					<?php
					$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='22' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
					$numero_grupo = mysqli_num_rows($verificar_grupo);
					if ($numero_grupo >= 1) {
					?>

						<a href="cadastro-rnc.php" style="text-decoration:none;padding-top:5px;padding-left:8px;padding-right:8px;padding-bottom:10px;margin-bottom:10px;margin-top:15px;border-radius:5px;background:#031335;color:#fff;"> Nova RNC</a>
					<?php } ?>


					<h3 class="mb-4 mt-4">RNC – Registro de Não Conformidade</h3>

					<table id="example_rnc" class="display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
								<th>Data de Identificação</th>
								<th>Planta</th>
								<th>Parceiros</th>
								<th>Área</th>
								<th>Responsável</th>
								<th>Descrição</th>
								<th>Ação</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$selecao = mysqli_query($conexao, "select * from rnc order by id");
							while ($registros = mysqli_fetch_array($selecao)) {
								$id = $registros['id']
							?>
								<tr>
									<td><a class="text-dark" href="rnc.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['id'] ?></a></td>


									<td><a class="text-dark" href="rnc.php?cod=<?php echo $registros['id'] ?>">
											<?php
											$data_id = $registros['data'];

											$ano = substr($data_id, 0, 4);
											$mes = substr($data_id, 5, 2);
											$dia = substr($data_id, 8, 2);

											$data_id = str_replace('-', '/', $data_id);

											echo $dia . "/" . $mes . "/" . $ano;

											?>

										</a></td>

									<td><a class="text-dark" href="rnc.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['planta_reg_nao_conformidade'] ?> </a></td>


									<td><a class="text-dark" href="rnc.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['parceiro'] ?></a></td>
									<td><a class="text-dark" href="rnc.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['area_reg_nao_conformidade'] ?></a></td>
									<td><a class="text-dark" href="rnc.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['responsavel_rnc'] ?></a></td>

									<td>
										<?php
										$selecao_nconformidade = mysqli_query($conexao, "select * from detalhe_nao_conformidade where id_registro='$id' ");
										while ($registros_nconformidade = mysqli_fetch_array($selecao_nconformidade)) {

										?>
											<a class="text-dark" href="rnc.php?cod=<?php echo $registros_nconformidade['id'] ?>">


												<?php echo $registros_nconformidade['descricao'] ?></a>
										<?php	} ?>
									</td>
									<td>



										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='22' and codigo_grupo='$cod_grupo' and excluir='1' ");
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
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>




	<script>
		$j = jQuery.noConflict()

		function Excluir(variavel) {
			if (window.confirm("Tem certeza que deseja excluir?")) {

				$j.ajax({
					type: 'post',
					data: 'codigo=' + variavel,
					url: 'funcoes/excluir-rcns.php',
					success: function(retorno) {
						location.reload()

					}
				})



			}
		}






		$j(document).ready(function() {
			$j('#example_rnc').DataTable();
		});



		$j("#example_rnc").dataTable({
			"bJQueryUI": true,
			"bJQueryUI": true,
			"bFilter": false,
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
					"sLast": "Último"
				}
			}
		})
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