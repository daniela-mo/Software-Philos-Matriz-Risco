<?php
$nav_menu_principal = 'cadastros';
$nav_menu_pagina = 'organograma';
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

	?>
	<!-- Navegação !-->


	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Organogramas</span>
						</div>
					</div>


				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div id="resposta-empresa"></div>


					<?php
					$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='3' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
					$numero_grupo = mysqli_num_rows($verificar_grupo);
					if ($numero_grupo >= 1) {
					?>

						<a href="cadastro-organograma.php"> <img src="imgs/icone-mais.png" width="25" height="25" alt="" /> Novo Organograma</a>
					<?php } ?>



					<h3 class="mb-4 mt-4">Organograma(s)</h3>
					<div class="table-responsive">
						<table id="example" class="display">
							<thead>
								<tr>
									<th>Empresa</th>
									<th>Fantasia</th>
									<th>CNPJ</th>

									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
								<?php
								mysqli_query($conexao, "SET NAMES 'utf8'");
								mysqli_query($conexao, 'SET character_set_connection=utf8');
								mysqli_query($conexao, 'SET character_set_client=utf8');
								mysqli_query($conexao, 'SET character_set_results=utf8');
								$selecao2 = mysqli_query($conexao, "select * from organogramas");
								while ($registros2 = mysqli_fetch_array($selecao2)) {
									$id = $registros2['cod_empresa'];

									$selecao_empresa = mysqli_query($conexao, "select * from empresas WHERE id='$id' ");
									$registros_empresa = mysqli_fetch_array($selecao_empresa);
									$numero_empresa = mysqli_num_rows($selecao_empresa);
									if ($numero_empresa >= 1) {
								?>
										<tr>
											<td><a class="text-dark" href="organograma.php?cod=<?php echo $registros_empresa['id'] ?>"><?php echo $registros_empresa['razao_social'] ?></a></td>
											<td><a class="text-dark" href="organograma.php?cod=<?php echo $registros_empresa['id'] ?>"><?php echo $registros_empresa['nome_fantasia'] ?></a></td>
											<td><a class="text-dark" href="organograma.php?cod=<?php echo $registros_empresa['id'] ?>"><?php echo $registros_empresa['cnpj'] ?></a></td>


											<td>

												<?php
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='3' and codigo_grupo='$cod_grupo' and editar='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>


													<a href="editar-organograma.php?cod=<?php echo $registros_empresa['id'] ?>" class="text-dark"><i class="fa fa-edit" style="cursor: pointer;"></i>
													</a>
												<?php } ?>

												<?php
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='3' and codigo_grupo='$cod_grupo' and excluir='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirOrganograma(<?php echo $registros_empresa['id'] ?>)"></i>
												<?php } ?>

											</td>
										</tr>

									<?php } else { ?>

										<?php
										$selecao_filial = mysqli_query($conexao, "select * from filiais WHERE id='$id' ");
										$registros_filial = mysqli_fetch_array($selecao_filial);
										$numero_filial = mysqli_num_rows($selecao_filial);
										?>

										<tr>
											<td><a class="text-dark" href="organograma.php?cod=<?php echo $registros_filial['id'] ?>"><?php echo $registros_filial['razao_social'] ?></a></td>
											<td><a class="text-dark" href="organograma.php?cod=<?php echo $registros_filial['id'] ?>"><?php echo $registros_filial['nome_fantasia'] ?></a></td>
											<td><a class="text-dark" href="organograma.php?cod=<?php echo $registros_filial['id'] ?>"><?php echo $registros_filial['cnpj'] ?></a></td>

											<td>


												<a href="editar-organograma.php?cod=<?php echo $registros_empresa['id'] ?>"><i class="fa fa-edit" style="cursor: pointer"></i></a>



												<i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirOrganograma(<?php echo $registros_filial['id'] ?>)"></i>




											</td>
										</tr>



										<?php  ?>




								<?php }
								} ?>

							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>

	</div>

	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>




	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});



		$("#example").dataTable({
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


		$ba = jQuery.noConflict()

		function ExcluirOrganograma(codigo) {

			if (window.confirm("Você deseja excluir o Organograma?")) {

				$ba.ajax({
					type: 'post',
					data: 'codigo=' + codigo,
					url: 'funcoes/excluir-organograma.php',
					success: function(retorno) {

						$ba('#resposta-empresa').html(retorno);
						location.href = 'organogramas.php'
					}
				})
			}
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