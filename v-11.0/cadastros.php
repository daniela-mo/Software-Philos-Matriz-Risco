<?php
$nav_menu_principal = 'riskassesment';
$nav_menu_pagina = 'cadastro-certificacao';
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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Cadastros</span>
						</div>
					</div>


				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div id="resposta-cadastro"></div>
					<?php
					$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='9' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
					$numero_grupo = mysqli_num_rows($verificar_grupo);
					if ($numero_grupo >= 1) {
					?>
						<a href="cadastro.php"> <img src="imgs/icone-mais.png" width="25" height="25" alt="" /> Novo Cadastro</a>
					<?php } ?>



					<h3 class="mb-4 mt-4">Cadastros</h3>

					<table id="example" class="display" style="width:100%">
						<thead>
							<tr>
								<th>Razão Social</th>
								<th>CNPJ</th>
								<th>Modalidade</th>
								<th>N° Certificado
								</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php
							mysqli_query($conexao, "SET NAMES 'utf8'");
							mysqli_query($conexao, 'SET character_set_connection=utf8');
							mysqli_query($conexao, 'SET character_set_client=utf8');
							mysqli_query($conexao, 'SET character_set_results=utf8');
							$selecao = mysqli_query($conexao, "select * from cadastro");
							while ($registros = mysqli_fetch_array($selecao)) {
								$cnpj = $registros['cnpj'];
								$mod = $registros['codigo_modalidade'];
							?>
								<tr>
									<td>
										<a class="text-dark" href="cadastro-detalhe.php?cod=<?php echo $registros['id'] ?>&mod=<?php echo $registros['codigo_modalidade'] ?>">
											<?php
											$selecao_empresa = mysqli_query($conexao, "select * from empresas WHERE cnpj='$cnpj'");
											$registros_empresa = mysqli_fetch_array($selecao_empresa);
											echo $registros_empresa['razao_social']; ?></a>
									</td>

									<td><a class="text-dark" href="cadastro-detalhe.php?cod=<?php echo $registros['id'] ?>&mod=<?php echo $registros['codigo_modalidade'] ?>"><?php echo $registros['cnpj'] ?></a></td>


									<td>
										<?php echo $registros['modalidade'] ?><br>

									</td>

									<td>
										<a class="text-dark" href="cadastro-detalhe.php?cod=<?php echo $registros['id'] ?>&mod=<?php echo $registros['codigo_modalidade'] ?>"><?php echo $registros['numero_certificacao'] ?> </a>
									</td>



									<td>

										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='9' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>

											<a class="text-dark" href="editar-cadastro.php?cod=<?php echo $registros['id'] ?> "><i class="fa fa-edit" style="cursor: pointer"></i></a>

										<?php } ?>
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='9' and codigo_grupo='$cod_grupo' and excluir='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>

											<i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirCadastro(<?php echo $registros['id'] ?>,'<?php echo $registros['codigo_modalidade'] ?>')"></i>

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

	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>




	<script>
		$a = jQuery.noConflict()

		function ExcluirCadastro(codigo, excluir) {

			if (window.confirm("Você deseja excluir o Cadastro?")) {

				$a.ajax({
					type: 'post',
					data: 'codigo=' + codigo + '&mod=' + excluir + '&cnpj=<?php echo $cnpj ?>',
					url: 'funcoes/excluir-cadastro.php',
					success: function(retorno) {

						$a('#resposta-cadastro').html(retorno);
						location.href = 'cadastros.php'
					}
				})
			}
		}







		$a(document).ready(function() {
			$a('#example').DataTable();
		});



		$a("#example").dataTable({
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