<style>
	@media print {
		@page {
			size: A4;
			/* DIN A4 standard, Europe */
			margin: 0 0 0 0;
		}

		html,
		body {
			width: 210mm;
			/* height: 297mm; */
			height: 250mm;
			font-size: 11px;
			background: #FFF;
			overflow: visible;
		}

		body {
			padding-top: 15mm;
			padding-bottom: 15mm;
		}
	}
</style>

<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');

if ($obterdominio == 'flextronics.com.br') {
	$obterdominio = 'Flextronics';
}
if ($obterdominio == 'positivo.com.br') {
	$obterdominio = 'Positivo';
}
@$usuario = $_SESSION['usuario'];

if (isset($_SESSION['usuario'])) {
} else { ?>

	<script>
		location.href = 'index.php'
	</script>

<?php
}



$selecao = mysqli_query($conexao, "select * from usuarios_empresa WHERE email='$usuario'");
$registros = mysqli_fetch_array($selecao);
$tipo = $registros['tipo'];
$id_usuario = $registros['id'];
$cod_grupo = $registros['grupo'];
$user_email = $registros['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard M2V</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>



<body class=" fixed-nav sticky-footer" id="page-top">
	<!-- Navegação !-->
	<?php
	$email = $_SESSION['usuario'];
	$codigo = $_REQUEST['cod'];
	$versao = $_REQUEST['versao'];
	mysqli_query($conexao, "SET NAMES 'utf8'");
	mysqli_query($conexao, 'SET character_set_connection=utf8');
	mysqli_query($conexao, 'SET character_set_client=utf8');
	mysqli_query($conexao, 'SET character_set_results=utf8');

	$selecao = mysqli_query($conexao, "select * from cadastro WHERE id='$codigo'");
	$registros = mysqli_fetch_array($selecao);
	$cnpj = $registros['cnpj'];
	$codigo_modalidade = $registros['codigo_modalidade'];


	?>
	<!-- Navegação !-->

	<div class="container-fluid pt-5 pb-5 " style="width: 1200px;border:solid 1px #D3D3D3; border-radius:10px">
		<div class="row ">
			<div class="row ml-4 mr-4 pr-5">


				<div class="col-md-12">
					<?php
					$selecao_qaas = mysqli_query($conexao, "select * from status_qaas WHERE codigo_qaa='$codigo' and versao='$versao' order by id desc");
					$numero_qaas = mysqli_num_rows($selecao_qaas);
					$registros_qaas = mysqli_fetch_array($selecao_qaas);
					?>

					<?php
					if ($numero_qaas >= 1) {
					?>
						<h2 class="mt-4">QAA - Questionário de Auto Avaliação </h2>

						<?php
						$selecao11 = mysqli_query($conexao, "select * from cadastro WHERE id='$codigo'");
						$registros11 = mysqli_fetch_array($selecao11);
						$cnpj = $registros11['cnpj'];

						$selecao_empresa = mysqli_query($conexao, "select * from empresas WHERE cnpj='$cnpj'");
						$registros_empresas = mysqli_fetch_array($selecao_empresa);
						$razao = $registros_empresas['razao_social'];
						$fantasia = $registros_empresas['nome_fantasia'];
						?>

						<h3><?php echo $razao ?> (<?php echo $fantasia ?>) - <?php echo $cnpj ?></h3>

						<p style="font-size:15px" class="text-success"> <i class="fa fa-check"></i> Versão: <?php echo $versao ?> (<?php echo $registros_qaas['data'] ?> - <?php echo $registros_qaas['hora'] ?> - <?php echo $registros_qaas['usuario'] ?>)</p>

					<?php } else { ?>
						<p style="font-size:15px">Sem versão gravada</p>

					<?php } ?>

				</div>

				<?php


				//Obtendo Código de Modalidade//		
				$selecao = mysqli_query($conexao, "select * from qaa_view WHERE codigo_modalidade = '$codigo_modalidade' 
	order by bloco ASC	
	");

				//Obtendo Bloco//
				while ($registros = mysqli_fetch_array($selecao)) {
					$codigo_bloco = $registros['codigo_bloco'];
				?>

					<div class="col-md-12 break">
						<br>


					</div>
					<div class="col-md-12 mt-3 mb-3" style="color: #031335; border: solid 1px #D3D3D3; padding: 15px 10px; border-radius:10px">
						<h2><i class="fa fa-wpforms"></i> <?php
															//Obtendo Titulo Principal do Bloco //
															echo $registros['bloco'] ?></h2>
					</div>
					<?php
					//Obtendo Subtitulo 1 do Bloco //
					$selecao2 = mysqli_query($conexao, "select * from questoes_qaa WHERE codigo_bloco='$codigo_bloco' and questao_principal='0' and versao=$versao");
					while ($registros2 = mysqli_fetch_array($selecao2)) {
						$id = $registros2['cod'];

					?>

						<div class="col-md-12">
							<h3><?php echo $registros2['titulo']; ?></h3>
						</div>

						<?php
						$selecao222 = mysqli_query($conexao, "select * from questoes_qaa WHERE codigo_bloco='$codigo_bloco' and questao_principal='$id' and versao='$versao'");
						while ($registros222 = mysqli_fetch_array($selecao222)) {
							$id2 = $registros222['cod'];
						?>
							<div class="col-md-12 ml-4 ">
								<h4 style="font-weight: 400"><?php echo $registros222['titulo']; ?></h4>
							</div>


							<?php
							$selecao2222 = mysqli_query($conexao, "select * from questoes_qaa WHERE codigo_bloco='$codigo_bloco' and questao_principal='$id2' and versao='$versao'");
							while ($registros2222 = mysqli_fetch_array($selecao2222)) {

								if ($versao == 1) {
									$id3 = $registros2222['cod'];
								} else {
									$id3 = $registros2222['cod'];
								}

							?>
								<div class="col-md-12  ml-5">
									<h5 style="font-weight: 400"><?php echo $registros2222['titulo']; ?></h5>
								</div>


								<?php
								$selecao3 = mysqli_query($conexao, "select * from resposta_qaa WHERE codigo_questao='$id3'    ");
								$registros3 = mysqli_fetch_array($selecao3);
								$resposta = $registros3['resposta'];
								?>
								<div class="col-md-12  ml-5" style="border:solid 1px #9F9F9F; padding: 10px 5px; border-radius:10px">
									<h5 class=" ml-3"><?php echo $registros3['questao']; ?></h5>

									<div class="ml-4">
										<?php if ($resposta == '') {
											echo "<p class='text-danger'>Não Respondido</p>";
										} else {
											echo "<p class='text-success'>" . $resposta . "</p>";
										}  ?>

									</div>
								</div>









								<div class="col-md-12 mb-4 mt-4"></div>



				<?php }
						}
					}
				} ?>
			</div>
		</div>
	</div>

	<script src="bibliotecas/jquery/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			window.print();

		})
	</script>