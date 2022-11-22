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

	<form action="processa-cadastro-organograma.php" method="post">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row mb-5" style="margin-top: -16px; ">
					<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

						<div class="row">
							<div class="col-md-9">
								<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Cadastro Organograma </span>
							</div>
						</div>


					</div>
				</div>



				<div class="row">
					<div class="col-12">
						<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
						<h3 class="mb-4 mt-4 ml-4 mr-4">Cadastro Áreas da empresa</h3>
						<div id="resposta-tabela"></div>





						<div class="row ml-4 mr-4">

							<div class="col-md-4">
								<label>Empresa</label>
								<select class="form-control" name="empresa" id="empresa" onChange="EscolherEmpresa()">
									<option value="0">Escolher Empresa</option>
									<?php
									$selecao_empresas = mysqli_query($conexao, "select * from filiais order by razao_social ASC");
									while ($registros_empresas = mysqli_fetch_array($selecao_empresas)) {
									?>
										<option value="<?php echo $registros_empresas['id'] ?>">
											<?php echo $registros_empresas['razao_social'] ?> - <?php echo $registros_empresas['cnpj'] ?></option>

									<?php } ?>

									<?php
									$selecao_empresas = mysqli_query($conexao, "select * from empresas order by razao_social ASC");
									while ($registros_empresas = mysqli_fetch_array($selecao_empresas)) {
									?>
										<option value="<?php echo $registros_empresas['id'] ?>"><?php echo $registros_empresas['razao_social'] ?>
											- <?php echo $registros_empresas['cnpj'] ?></option>

									<?php } ?>



								</select>
							</div>



							<div class="col-md-4">
								<label>Nome da Área</label>
								<input type="text" class="form-control" name="cad-area" id="cad-area" readonly required>
							</div>

							<div class="col-md-4">
								<label>Área Mãe</label>
								<div id="carregar-areas-mae">
									<select class="form-control" disabled>
										<option></option>
									</select>
								</div>
							</div>





							<div class="col-md-12 mt-3">
								<input type="submit" class="btn btn-primary" value="Gravar">
							</div>

						</div>



						<div id="carrega-tabela-areas"></div>


					</div>
				</div>
			</div>

		</div>
	</form>

	<!-------------Contadores--------->
	<input type="hidden" value="1" id="contador_terceiros">
	<input type="hidden" value="1" id="contador_filiais">
	<input type="hidden" id="codigo-excluir-area">



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
	</script>



	<script>
		$j = jQuery.noConflict()




		function EscolherEmpresa() {
			var escolha = $j('#esc-empresa option:selected').val()

			if (escolha == 0) {
				var liberar_area = $j('#cad-area').attr("readonly", true);
				var liberar_area_mae = $j('#cad-codigo-area-mae').attr("disabled", true);
			} else {

				var liberar_area = $j('#cad-area').removeAttr("readonly");
				var liberar_area_mae = $j('#cad-codigo-area-mae').removeAttr("disabled");

				CarregarTabela(escolha)
				CarregarAreasMae(escolha)
			}
		}

		function CarregarTabela(codigo_empresa) {

			$j.ajax({
				type: 'post',
				data: 'codigo=' + codigo_empresa,
				url: 'funcoes/tabela-areas.php',
				success: function(retorno) {
					$j('#carrega-tabela-areas').html(retorno)
				}
			})
		}

		function CarregarAreasMae(codigo_empresa) {
			$j.ajax({
				type: 'post',
				data: 'codigo=' + codigo_empresa,
				url: 'funcoes/carregar-areas-mae.php',
				success: function(retorno) {
					$j('#carregar-areas-mae').html(retorno)
				}
			})

		}


		function Excluir(variavel) {
			if (window.confirm("Tem certeza que deseja excluir essa área?")) {

				$j.ajax({
					type: 'post',
					data: 'codigo=' + variavel,
					url: 'funcoes/excluir-area.php',
					success: function(retorno) {

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