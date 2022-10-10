<?php
$nav_menu_principal = 'gestaoderisco';
$nav_menu_pagina = 'monitoramento';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Software Philos</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>



<body class=" fixed-nav sticky-footer" id="page-top">
	<!-- Navegação !-->
	<?php
	include('menu.php');
	@$codigo = $_REQUEST['cod'];

	mysqli_query($conexao, "SET NAMES 'utf8'");
	mysqli_query($conexao, 'SET character_set_connection=utf8');
	mysqli_query($conexao, 'SET character_set_client=utf8');
	mysqli_query($conexao, 'SET character_set_results=utf8');

	?>
	<!-- Navegação !-->

	<form action="processa-cadastro-comite.php" method="post">
		<input type="hidden" name="codigo-comite" id="codigo-comite" value="<?php echo $codigo ?>">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row mb-5" style="margin-top: -16px; ">
					<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

						<div class="row">
							<div class="col-md-9">
								<a href="dashboard.php"><span class="text-white breadcrumb-item">Software | Cadastro atividade</span></a>
							</div>
						</div>


					</div>
				</div>


				<div class="row">
					<div class="col-md-12">
						<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
						<h3 class="mb-4 mt-4 ml-4 mr-4">CADASTRO COMITÊ </h3>


						<div class="row ml-4 mr-4">

							<div class="col-md-4">
								<label>Nome do Comitê</label>
								<input type="text" class="form-control" name="cad-comite" id="cad-comite">
							</div>

							<div class="col-md-4">
								<label>Descrição/Objetivo</label>
								<input type="text" class="form-control" name="cad-descricao" id="cad-descricao">
							</div>




							<div class="col-md-12 mt-4">
								<input type="submit" class="btn btn-primary" value="Cadastrar Comitê">
							</div>

						</div>

					</div>
				</div>
			</div>

		</div>
	</form>



	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>


	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>
		$f = jQuery.noConflict()

		$f(".datepicker").datepicker({
			dateFormat: 'dd/mm/yy',
			dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
			dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
			dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
			monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			nextText: 'Próximo',
			prevText: 'Anterior'
		});


		$f(function() {
			$f(".datepicker").datepicker();
		});
	</script>

	<script>
		function AtivarLink() {
			$f('#<?php echo $nav_menu_principal ?>').addClass('show')
			$f('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight', 'bold')

		}
		AtivarLink()
	</script>


</body>

</html>