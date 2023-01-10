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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

</head>



<body class=" fixed-nav sticky-footer" id="page-top">



	<script type='text/javascript'>
		$(document).ready(function() {
			$("input[name='responProc']").blur(function() {
				var $area = $("input[name='area']");

				$.getJSON('function.php', {
					responProc: $(this).val()

				}, function(json) {
					$area.val(json.area);
					//alert(json.area)

				});
			});
		});

		function calcula_prazo() {
			var date = new Date();
			var dia = date.getUTCDate();
			var mes = date.getMonth();
			var ano = date.getFullYear();
			data_atual = ano + '-' + mes + '-' + dia
			var data_campo = document.getElementById('dtRetornoPrazo').value;

			var date1 = new Date(data_campo);
			var date2 = new Date(data_atual);


			if (date1.getUTCDate() >= date2.getUTCDate()) {
				document.getElementById('statusDevolutiva').value = '2';
			} else if (date1.getUTCDate() < date2.getUTCDate()) {
				document.getElementById('statusDevolutiva').value = '1';
			}
		}

		function calcula_prazoAtend() {
			var date = new Date();
			var dia = date.getUTCDate();
			var mes = date.getMonth();
			var ano = date.getFullYear();
			data_atual = ano + '-' + mes + '-' + dia
			var data_campo = document.getElementById('pzAtendPlanAcao').value;

			var date1 = new Date(data_campo);
			var date2 = new Date(data_atual);


			if (date1.getUTCDate() >= date2.getUTCDate()) {
				document.getElementById('statusPrazoPlanoAcao').value = '2';
			} else if (date1.getUTCDate() < date2.getUTCDate()) {
				document.getElementById('statusPrazoPlanoAcao').value = '1';
			}
		}


		function calcula_dataDevolutiva() {
			var data1 = document.getElementById('dtEnvioPlanoAcao').value;
			var data2 = document.getElementById('dtRetornoPrazo').value;
			var data3 = document.getElementById('dtDevolutiva').value;




			var dt2 = new Date(data2)
			var dt3 = new Date(data3)


			var difference = Math.abs(dt3 - dt2);
			resultado = difference / (1000 * 3600 * 24)
			document.getElementById('diasRetPrazo').value = resultado


			if (data3 < data2 || resultado < 0) {
				document.getElementById('diasRetPrazo').value = '0';
				document.getElementById('statusDevolutiva').value = '3';
			} else if (data3 > data2) {
				document.getElementById('statusDevolutiva').value = '3';
			} else if (resultado == 0) {
				document.getElementById('statusDevolutiva').value = '3';
			}
		}



		function calcula_dataAtendimento() {

			var data4 = document.getElementById('pzAtendPlanAcao').value;
			var data5 = document.getElementById('datAtendPlanAcao').value;

			var dt4 = new Date(data4)
			var dt5 = new Date(data5)

			var difference = Math.abs(dt4 - dt5)

			resultado2 = difference / (1000 * 3600 * 24)
			document.getElementById('diasAtraso').value = resultado2

			if (data4 < data5 || resultado2 < 0) {
				document.getElementById('statusPrazoPlanoAcao').value = '3';
			} else if (data4 > data5 || resultado2 < 0) {
				document.getElementById('diasAtraso').value = '0';
				document.getElementById('statusPrazoPlanoAcao').value = '3';
			} else if (data4 > data5) {
				document.getElementById('statusPrazoPlanoAcao').value = '3';
			} else if (resultado2 == 0) {
				document.getElementById('statusPrazoPlanoAcao').value = '3';
			}

		}
	</script>

	<script type='text/javascript'>

	</script>
	<!-- Navegação !-->
	<?php
	include('menu.php');


	?>
	<!-- Navegação !-->

	<form action="processa-cadastro-planejamento-workflow.php" method="post">

		<input type="hidden" name="codigo-tarefa" id="codigo-tarefa" value="<?php echo $codigo ?>">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row mb-5" style="margin-top: -16px; ">
					<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

						<div class="row">
							<div class="col-md-9">
								<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Cadastro Planejamento</span></a>
							</div>
						</div>


					</div>
				</div>


				<div class="row">
					<div class="col-md-12">
						<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
						<h3 class="mb-4 mt-4 ml-4 mr-4">Cadastro Planejamento Workflow </h3>


						<div class="row">

							<div class="col-md-6 mb-2 mt-2">
								<div id="retorno-datas" class="text-danger" style="font-weight: 800"></div>
							</div>
						</div>

						<div class="row ml-4 mr-4">

							<div class="col-md-1 mb-4">
								<label>Id Registro</label>
								<?php
								mysqli_query($conexao, "SET NAMES 'utf8'");
								mysqli_query($conexao, 'SET character_set_connection=utf8');
								mysqli_query($conexao, 'SET character_set_client=utf8');
								mysqli_query($conexao, 'SET character_set_results=utf8');
								$selecao_workflow = mysqli_query($conexao, "select * from workflow order by id DESC");
								$registros_workflow = mysqli_fetch_array($selecao_workflow);
								?>
								<input type="text" name="cad-numero-registro" id="cad-numero-registro" class="form-control" readonly value="<?php echo $registros_workflow['id'] + 1 ?>">
							</div>



							<div class="col-md-6 mb-4">
								<label>Título</label>
								<input type="text" name="cad-titulo" id="cad-titulo" class="form-control" required autocomplete="off">
							</div>

							<div class="col-md-2 mb-4">
								<label>Prioridade</label>

								<select name="cad-prioridade" id="cad-prioridade" class="form-control">
									<option>Baixa</option>
									<option>Média</option>
									<option>Alta</option>
								</select>
							</div>

							<div class="col-md-3 mb-4">
								<label>Data Inicio</label>
								<input type="text" name="cad-data-inicio" id="cad-data-inicio" class="form-control data" required autocomplete="off">
							</div>

							<input type="hidden" id="guarda-data-inicio">

							<div class="col-md-3 mb-4">
								<label>Previsão Entrega</label>
								<input type="text" name="cad-data-vencimento" id="cad-data-vencimento" class="form-control data" required autocomplete="off">
							</div>

							<div class="col-md-2 mb-4">
								<label>Status</label>

								<select class="form-control" name="cad-status" id="cad-status">

									<option>Não iniciado</option>
									<option>Em andamento</option>
									<option>Concluído</option>


								</select>


							</div>



							<div class="col-md-3 mb-4">
								<label>item Qaa</label>
								<input type="text" class="form-control" name="itemQaa" id="itemQaa">
							</div>

							<div class="col-md-4 mb-4">
								<label>Responsável pelo processo</label>
								<input type="text" class="form-control" name="responProc" id="responProc">
							</div>

							<div class="col-md-4 mb-4">
								<label>Responsável pela Ação</label>
								<input type="text" class="form-control" name="responAcao" id="responAcao">
							</div>


							<div class="col-md-4 mb-4">
								<label>Departamento</label>
								<input class="form-control" name="area" id="area">
							</div>

							<div class="col-md-4">
								<label>Planta</label>
								<select class="form-control" name="empresa" id="empresa">
									<option value="0">Escolher Planta</option>
									<?php
									$selecao_empresas = mysqli_query($conexao, "select * from empresas order by razao_social ASC");
									while ($registros_empresas = mysqli_fetch_array($selecao_empresas)) {
									?>
										<option value="<?php echo $registros_empresas['razao_social'] ?>">
											<?php echo $registros_empresas['razao_social'] ?> - <?php echo $registros_empresas['cnpj'] ?></option>

									<?php } ?>

									<?php
									$selecao_empresas = mysqli_query($conexao, "select * from filiais order by razao_social ASC");
									while ($registros_empresas = mysqli_fetch_array($selecao_empresas)) {
									?>
										<option value="<?php echo $registros_empresas['razao_social'] ?>"><?php echo $registros_empresas['razao_social'] ?>
											- <?php echo $registros_empresas['cnpj'] ?></option>

									<?php } ?>
								</select>
							</div>



							<div class="col-md-5 mb-4">
								<label>Plano de Ação</label>
								<input type="text" class="form-control" name="planoAcao" id="planoAcao">
							</div>


							<div class="col-md-4 mb-4">
								<label>Mapa de Risco</label>
								<input type="text" class="form-control" name="mapaRisco" id="mapaRisco">
							</div>


							<div class="col-md-3 mb-4">
								<label>Data de envio do plano de ação</label>
								<input type="date" name="dtEnvioPlanoAcao" id="dtEnvioPlanoAcao" class="form-control">
							</div>

							<div class="col-md-3 mb-4">
								<label>Data para retorno com o prazo</label>
								<input type="date" name="dtRetornoPrazo" id="dtRetornoPrazo" class="form-control" onChange="calcula_prazo()">
							</div>

							<div class=" col-md-3 mb-4">
								<label>Data da devolutiva</label>
								<input type="date" name="dtDevolutiva" id="dtDevolutiva" class="form-control" onBlur="calcula_dataDevolutiva()">
							</div>

							<div class="col-md-3 mb-4">
								<label>Dias de atraso para retorno com o prazo</label>
								<input type="number" name="diasRetPrazo" id="diasRetPrazo" class="form-control">
							</div>

							<div class="col-md-3 mb-4">
								<label>Status prazo devolutiva</label>
								<select class="form-control" name="statusDevolutiva" id="statusDevolutiva">
									<option value='0' id="0">Não iniciado</option>
									<option value='1' id="1"> Dentro do Prazo</option>
									<option value='2' id="2">Em atraso</option>
									<option value='3' id="3">Concluído</option>
								</select>
							</div>


							<div class="col-md-3 mb-4">
								<label>Prazo para atendimento do plano de ação</label>
								<input type="date" name="pzAtendPlanAcao" id="pzAtendPlanAcao" class="form-control" onChange="calcula_prazoAtend()">
							</div>

							<div class="col-md-3 mb-4">
								<label>Data de atendimento do plano de ação</label>
								<input type="date" name="datAtendPlanAcao" id="datAtendPlanAcao" class="form-control" onBlur="calcula_dataAtendimento()">
							</div>


							<div class="col-md-3 mb-4">
								<label>Dias de atraso</label>
								<input type="number" name="diasAtraso" id="diasAtraso" class="form-control">
							</div>

							<div class="col-md-3 mb-4">
								<label>Status prazo atedimento plano de ação</label>

								<select class="form-control" name="statusPrazoPlanoAcao" id="statusPrazoPlanoAcao">
									<option value='0' id="0">Não iniciado</option>
									<option value='1' id="1"> Dentro do Prazo</option>
									<option value='2' id="2">Em atraso</option>
									<option value='3' id="3">Concluído</option>
								</select>
							</div>


							<div class="col-md-12">
								<label>Descrição</label>
								<textarea class="form-control" cols="5" rows="7" name="cad-descricao" id="cad-descricao"></textarea>

							</div>


							<div class="col-md-12 mt-4">
								<input type="submit" class="btn btn-primary" value="Cadastrar Planejamento">
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


	<script>



	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>

	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.pt-br.js" type="text/javascript"></script>


	<script>
		$ff = jQuery.noConflict()

		$ff(document).ready(function() {

			$ff('.data').mask('99/99/9999');
		});

		var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());



		$ff('#cad-data-inicio').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#cad-data-vencimento').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {
				return $ff('#cad-data-inicio').val();
			}
		});
	</script>



	<script type="text/javascript">
		$d = jQuery.noConflict();
		$d(document).ready(function() {
			$d("#cad-cep").focusout(function() {
				//Início do Comando AJAX
				$d.ajax({
					//O campo URL diz o caminho de onde virá os dados
					//É importante concatenar o valor digitado no CEP
					url: 'https://viacep.com.br/ws/' + $d(this).val() + '/json/unicode/',
					//Aqui você deve preencher o tipo de dados que será lido,
					//no caso, estamos lendo JSON.
					dataType: 'json',
					//SUCESS é referente a função que será executada caso
					//ele consiga ler a fonte de dados com sucesso.
					//O parâmetro dentro da função se refere ao nome da variável
					//que você vai dar para ler esse objeto.
					success: function(resposta) {
						//Agora basta definir os valores que você deseja preencher
						//automaticamente nos campos acima.
						$d("#cad-logradouro").val(resposta.logradouro);
						$d("#cad-complemento").val(resposta.complemento);
						$d("#cad-bairro").val(resposta.bairro);
						$d("#cad-cidade").val(resposta.localidade);
						$d("#cad-estado").val(resposta.uf);
						//Vamos incluir para que o Número seja focado automaticamente
						//melhorando a experiência do usuário
						$d("#cad-numero").focus();
					}
				});
			});



			CarregaFrete()

		});
	</script>
</body>

</html>