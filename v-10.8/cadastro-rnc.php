<?php
$nav_menu_principal = 'naoconformidade';
$nav_menu_pagina = 'rncs';
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
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<style>
		#numero-correspondente {
			display: none
		}

		#nova-conformidade {
			display: none
		}

		/* none} */
	</style>


	<style>
		.causaEfeito {
			display: flex;
			margin-left: 13px;
			margin-top: 5.625rem;

		}
	</style>
</head>



<body class=" fixed-nav sticky-footer" id="page-top">
	<!-- Navegação !-->
	<?php
	include('menu.php');

	$codigo_rnc = $_REQUEST['id'];
	$id = $_REQUEST['id'];

	mysqli_query($conexao, "SET NAMES 'utf8'");
	mysqli_query($conexao, 'SET character_set_connection=utf8');
	mysqli_query($conexao, 'SET character_set_client=utf8');
	mysqli_query($conexao, 'SET character_set_results=utf8');
	$selecao_usuario = mysqli_query($conexao, "select * from usuarios_empresa WHERE email='$usuario' ");
	$registros_usuario = mysqli_fetch_array($selecao_usuario);
	$codigo_usuario = $registros_usuario['id'];



	@$aba = $_REQUEST['aba'];
	?>
	<!-- Navegação !-->

	<input type="hidden" id="abas" value="<?php echo $aba; ?>">
	<input type="hidden" id="codigo_rnc" value="<?php echo $codigo_rnc; ?>">

	<input type="hidden" id="receber_registro" value="<?php echo $receber_registro = $_REQUEST['registro']; ?>">
	<input type="hidden" id="receber_plano" value="<?php echo $receber_plano = $_REQUEST['plano']; ?>">
	<input type="hidden" id="receber_monitoramento" value="<?php echo $receber_monitoramento = $_REQUEST['monitoramento']; ?>">
	<input type="hidden" id="receber_analise" value="<?php echo $receber_analise = $_REQUEST['analise']; ?>">

	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Software Philos</a> | RNC</span>
						</div>
					</div>


				</div>
			</div>
			<div class="row ml-4 mr-4 mt-3">

				<div class="col-md-12">
					<input type="button" class="btn btn-primary mb-5" value="Voltar" onclick='history.go(-1)'><br>


				</div>


				<div class="row mr-4">
					<div class="col-md-12">
						<div id="conteudo1">

							<form class="ml-4" action="processa-gravar-rcn.php" method="post" enctype="multipart/form-data">
								<h3 class="mb-4">

									Registro de Não Conformidade
								</h3>
								<div class="row">
									<div class="col-md-1">
										<label>Id</label>
										<?php
										$selecao_reg = mysqli_query($conexao, "select * from rnc order by id DESC");
										$mostrar = mysqli_fetch_array($selecao_reg);
										$id = $mostrar['id'];
										if ($id == '') {
											$id = '0';
										}
										?>

										<input type="text" class="form-control mb-3" name="id" id="id" readonly value="<?php echo $mostrar['id'] + 1 ?>">
									</div>


									<div class="col-md-3">
										<label>Data de Identificação</label>
										<input type="date" class="form-control mb-3 " name="cad-data" id="cad-data" autocomplete="on" value="<?php echo date('Y-m-d') ?>">
									</div>




									<div class="col-md-4 mb-4">
										<label>Planta</label>


										<select class="form-control" name="cad-empresa" id="cad-empresa">
											<option value=" 0">Escolher Planta</option>
											<?php
											mysqli_query($conexao, "SET NAMES 'utf8'");
											mysqli_query($conexao, 'SET character_set_connection=utf8');
											mysqli_query($conexao, 'SET character_set_client=utf8');
											mysqli_query($conexao, 'SET character_set_results=utf8');
											$selecao_empresa = mysqli_query($conexao, "select * from empresas");
											while ($registros_empresa = mysqli_fetch_array($selecao_empresa)) {
											?>

												<option value="<?php echo $registros_empresa['razao_social'] ?>"><?php echo $registros_empresa['razao_social'] ?> - <?php echo $registros_empresa['cnpj'] ?></option>

											<?php }
											$selecao_empresa = mysqli_query($conexao, "select * from filiais");
											while ($registros_empresa = mysqli_fetch_array($selecao_empresa)) {
											?>

												<option value="<?php echo $registros_empresa['razao_social'] ?>"><?php echo $registros_empresa['razao_social'] ?> - <?php echo $registros_empresa['cnpj'] ?></option>

											<?php } ?>
										</select>
									</div>



									<div class="col-md-4 mb-4">
										<label>Parceiros</label>


										<select class="form-control" name="cad-parceiro">
											<option value=" 0">Escolher Parceiro</option>
											<?php
											mysqli_query($conexao, "SET NAMES 'utf8'");
											mysqli_query($conexao, 'SET character_set_connection=utf8');
											mysqli_query($conexao, 'SET character_set_client=utf8');
											mysqli_query($conexao, 'SET character_set_results=utf8');
											$selecao_terceiros = mysqli_query($conexao, "select * from terceiros");
											while ($registros_terceiros = mysqli_fetch_array($selecao_terceiros)) {
											?>

												<option value="<?php echo $registros_terceiros['razao_social'] ?>"><?php echo $registros_terceiros['razao_social'] ?> - <?php echo $registros_terceiros['cnpj'] ?></option>

											<?php } ?>
										</select>
									</div>


									<div class="col-md-4 mb-3">
										<label>Origem</label>
										<select class="form-control" name="cad-origem">
											<option value="0">Escolher Origem</option>
											<option>Análise de Processo</option>
											<!-- <option>BIA</option> -->
											<option>Não Conformidade</option> -->
											<!-- <option>SWOT</option> -->
										</select>
									</div>


									<div class="col-md-4">
										<label>Processo</label>
										<select class="form-control mb-3" name="cad-processo">
											<option value="0">Escolher</option>
											<?php
											mysqli_query($conexao, "SET NAMES 'utf8'");
											mysqli_query($conexao, 'SET character_set_connection=utf8');
											mysqli_query($conexao, 'SET character_set_client=utf8');
											mysqli_query($conexao, 'SET character_set_results=utf8');
											$selecao_processos = mysqli_query($conexao, "select * from processos");
											while ($registros_processos = mysqli_fetch_array($selecao_processos)) {
											?>

												<option><?php echo $registros_processos['processo'] ?></option>

											<?php } ?>


										</select>
									</div>


									<div class="col-md-4">
										<label>Risco</label>
										<select class="form-control mb-3" name="cad-risco">
											<option value="0">Escolher</option>
											<?php
											mysqli_query($conexao, "SET NAMES 'utf8'");
											mysqli_query($conexao, 'SET character_set_connection=utf8');
											mysqli_query($conexao, 'SET character_set_client=utf8');
											mysqli_query($conexao, 'SET character_set_results=utf8');
											$selecao_riscos = mysqli_query($conexao, "select * from identificacao_do_risco");
											while ($registros_riscos = mysqli_fetch_array($selecao_riscos)) {
											?>

												<option><?php echo $registros_riscos['evento_risco'] ?></option>

											<?php } ?>


										</select>
									</div>



									<div class="col-md-4">
										<label>Área do responsável pelo registro</label>
										<select class="form-control mb-3" name="cad-area-nconformidade" id="cad-area-nconformidade">
											<option value="0">Escolher Área</option>
											<?php
											mysqli_query($conexao, "SET NAMES 'utf8'");
											mysqli_query($conexao, 'SET character_set_connection=utf8');
											mysqli_query($conexao, 'SET character_set_client=utf8');
											mysqli_query($conexao, 'SET character_set_results=utf8');
											$selecao_area = mysqli_query($conexao, "select * from areas");
											while ($registros_area = mysqli_fetch_array($selecao_area)) {
											?>

												<option><?php echo $registros_area['area'] ?></option>

											<?php } ?>


										</select>

									</div>

									<div class="col-md-3">
										<label>Responsável pelo registro</label>
										<input type="text" class="form-control" name="cad-responsavel-nconformidade" id="cad-responsavel-nconformidade">

									</div>

									<div class="col-md-4">
										<label>Atas Comitês</label>
										<select class="form-control mb-3" name="cad-ata-comite" id="cad-ata-comite">
											<option value="0">Escolher Ata</option>
											<?php
											mysqli_query($conexao, "SET NAMES 'utf8'");
											mysqli_query($conexao, 'SET character_set_connection=utf8');
											mysqli_query($conexao, 'SET character_set_client=utf8');
											mysqli_query($conexao, 'SET character_set_results=utf8');
											$selecao_area = mysqli_query($conexao, "select * from comites");
											while ($registros_area = mysqli_fetch_array($selecao_area)) {
											?>

												<option><?php echo $registros_area['nome_comite'] ?></option>

											<?php } ?>


										</select>

									</div>




								</div>

								<div class="col-md-12 mt-3 mb-3">
									<input type="submit" value="Gravar Registro" class="btn btn-primary">
								</div>

							</form>

							<!-- ---------------------------------------MODAIS DE DETALHAMENTO NÃO CONFORMIDADE E ABRANGÊNCIA------------------------------------------------------------ -->


						</div>
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
			CarregarTabelaMonitoramento()
			CarregarTabelaPlanoAcao()
			CarregarTabelaAnalise()
			$f(".datepicker").datepicker();
		});



		function VerificarReincidencia() {

			var reincidencia = $f('#cad-reincidencia option:selected').val()

			if (reincidencia == 'Sim') {
				$f('#numero-correspondente').show()
			}

			if (reincidencia == 'Não') {
				$f('#numero-correspondente').hide()
			}

			if (reincidencia == '0') {
				$f('#numero-correspondente').hide()
			}

		}


		function Parecer() {

			var parecer = $f('#cad-parecer option:selected').val()

			if (parecer == 'Ineficaz') {
				$f('#nova-conformidade').show()
			}

			if (parecer == 'Eficaz') {
				$f('#nova-conformidade').hide()
			}

		}


		function Resposta(codigo) {

			var resposta = $f("#cad-r" + codigo + " option:selected").val()

			if (resposta == 'Sim') {
				$f('#nova-conformidade' + codigo).removeAttr("readonly");
				$f('#cad-d' + codigo).removeAttr("readonly");
				$f('#cad-c' + codigo).removeAttr("readonly");
				$f('#cad-criticidade' + codigo).removeAttr("readonly");
			} else {

				$f('#nova-conformidade' + codigo).attr("readonly", "readonly");
				$f('#cad-d' + codigo).attr("readonly", "readonly");
				$f('#cad-c' + codigo).attr("readonly", "readonly");
				$f('#cad-criticidade' + codigo).attr("readonly", "readonly");
			}

		}

		function CarregarTabelaPlanoAcao() {


			$f.ajax({
				type: 'post',
				data: 'codigo=',
				url: 'carregar-tabela-plano-de-acao-temp.php',
				success: function(retorno) {
					$f('#carregar-tabela-plano-de-acao').html(retorno)

				}
			})
		}

		function CarregarTabelaMonitoramento() {


			$f.ajax({
				type: 'post',
				data: 'codigo=',
				url: 'carregar-tabela-monitoramento-rnc.php',
				success: function(retorno) {
					$f('#carregar-tabela-monitoramento').html(retorno)

				}
			})
		}

		function CarregarTabelaAnalise() {


			$f.ajax({
				type: 'post',
				data: 'codigo=',
				url: 'carregar-tabela-analise-rnc.php',
				success: function(retorno) {
					$f('#carregar-tabela-analise').html(retorno)

				}
			})
		}


		function GravarPlanoAcaoTemp() {

			var descricao = $f('#cad-descricao-acao').val()
			var responsavel = $f('#responsavel-plano-de-acao').val()
			var area_plano_acao = $f('#area-plano-acao').val()
			var inicio = $f('#inicio-plano-acao').val()
			var conclusao = $f('#cad-data-conclusao').val()
			var prioridade = $f("#prioridade-acao option:selected").val()
			var status_plano_acao = $f("#status_plano_acao option:selected").val()

			$f.ajax({
				type: 'post',
				data: 'descricao=' + descricao + '&responsavel=' + responsavel + '&area_plano_acao=' + area_plano_acao + '&inicio=' + inicio + '&conclusao=' + conclusao + '&prioridade=' + prioridade + '&status_plano_acao=' + status_plano_acao,
				url: 'funcoes/gravar-tabela-plano-de-acao-temp.php',
				success: function(retorno) {
					CarregarTabelaPlanoAcao()
				}
			})
		}

		function ExcluirPlanoTemp(codigo) {

			if (window.confirm("Você deseja excluir o Plano de Ação?")) {

				$f.ajax({
					type: 'post',
					data: 'codigo=' + codigo,
					url: 'funcoes/excluir-plano-de-acao-temp.php',
					success: function(retorno) {
						CarregarTabelaPlanoAcao()

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




	<script>
		$g = jQuery.noConflict()

		function Abas(codigo) {

			if (codigo == 1) {

				$g('#btn1').addClass('btn-primary')

				$g('#btn2').removeClass('btn-primary')
				$g('#btn3').removeClass('btn-primary')
				$g('#btn4').removeClass('btn-primary')
				$g('#btn5').removeClass('btn-primary')

				$g('#conteudo1').show()
				$g('#conteudo2').hide()
				$g('#conteudo3').hide()
				$g('#conteudo4').hide()
				$g('#conteudo5').hide()

			}

			if (codigo == 2) {

				$g('#conteudo2').show()
				$g('#conteudo1').hide()
				$g('#conteudo3').hide()
				$g('#conteudo4').hide()
				$g('#conteudo5').hide()

				$g('#btn2').removeClass('btn-light')
				$g('#btn2').addClass('btn-primary')

				$g('#btn1').removeClass('btn-primary')
				$g('#btn3').removeClass('btn-primary')
				$g('#btn4').removeClass('btn-primary')
				$g('#btn5').removeClass('btn-primary')

			}

			if (codigo == 3) {

				$g('#conteudo3').show()
				$g('#conteudo1').hide()
				$g('#conteudo2').hide()
				$g('#conteudo4').hide()
				$g('#conteudo5').hide()

				$g('#btn3').removeClass('btn-light')
				$g('#btn3').addClass('btn-primary')

				$g('#btn1').removeClass('btn-primary')
				$g('#btn2').removeClass('btn-primary')
				$g('#btn4').removeClass('btn-primary')
				$g('#btn5').removeClass('btn-primary')

			}

			if (codigo == 4) {

				$g('#conteudo4').show()
				$g('#conteudo1').hide()
				$g('#conteudo2').hide()
				$g('#conteudo3').hide()
				$g('#conteudo5').hide()

				$g('#btn4').removeClass('btn-light')
				$g('#btn4').addClass('btn-primary')

				$g('#btn1').removeClass('btn-primary')
				$g('#btn2').removeClass('btn-primary')
				$g('#btn3').removeClass('btn-primary')
				$g('#btn5').removeClass('btn-primary')

			}

			if (codigo == 5) {

				$g('#conteudo5').show()
				$g('#conteudo1').hide()
				$g('#conteudo2').hide()
				$g('#conteudo3').hide()
				$g('#conteudo4').hide()

				$g('#btn5').removeClass('btn-light')
				$g('#btn5').addClass('btn-primary')

				$g('#btn1').removeClass('btn-primary')
				$g('#btn2').removeClass('btn-primary')
				$g('#btn3').removeClass('btn-primary')
				$g('#btn4').removeClass('btn-primary')

			}


		}


		$g(document).ready(function() {



			$g('#conteudo2').hide()
			$g('#conteudo3').hide()
			$g('#conteudo4').hide()
			$g('#conteudo5').hide()

			$g("#sanfona-conteudo1").hide()
			$g("#sanfona-conteudo2").hide()
			$g("#sanfona-conteudo3").hide()
			$g("#sanfona-conteudo4").hide()
			$g("#sanfona-conteudo5").hide()


			$g("#baixo1").hide()


			CarregarMatriz()
			CarregarTabelaControlesExistentes()




		})


		$g(document).ready(function() {
			CarregarTabelaControlesExistentes()
			CarregarTabelaMatrizDeRiscos()
			CarregarTabelaMonitoramento()

			$g('#conteudo2').hide()
			$g('#conteudo3').hide()
			$g('#conteudo4').hide()
			$g('#conteudo5').hide()

			// $g("#sanfona-conteudo1").hide()
			$g("#sanfona-conteudo2").hide()
			$g("#sanfona-conteudo3").hide()
			$g("#sanfona-conteudo4").hide()
			$g("#sanfona-conteudo5").hide()
			$g("#sanfona-conteudo6").hide()

			$g("#baixo1").hide()


			CarregarMatriz()
			CarregarTabelaCausas()
			CarregarIshikawa('Método')
			CarregarIshikawaEfeito('Método')
			CarregarAnexos()


			var abas = $g('#abas').val()

			if (abas == 'registro') {
				$g('#btn1').trigger('click')
				$g('#conteudo1').show()
			}
			if (abas == 'plano') {
				$g('#btn2').trigger('click')
				$g('#conteudo2').show()
			}
			if (abas == 'monitoramento') {
				$g('#btn3').trigger('click')
				$g('#conteudo3').show()
			}
			if (abas == 'analise') {
				$g('#btn4').trigger('click')
				$g('#conteudo4').show()
			}


		})


		$b('document').ready(function() {

			var receber_plano = $g("#receber_plano").val()
			var receber_monitoramento = $g("#receber_monitoramento").val()
			var receber_analise = $g("#receber_analise").val()



			if (receber_plano == 2) {
				Abas(2)
				$b('#btn2').trigger("click")
			}
			if (receber_monitoramento == 3) {
				Abas(3)
				$b('#btn3').trigger("click")
			}
			if (receber_analise == 4) {
				Abas(4)
				$b('#btn4').trigger("click")
			}

		});





		function ModalAdicionarNaoConformidade() {

			document.getElementById('form-reset').reset();


			// $g('.pos-naoconformidade').hide()
			$g('#ModalAdicionarNaoConformidade').modal('show');
			CarregarNaoConformidade()

		}

		function ModalAdicionarAbrangencia() {

			document.getElementById('form-reset').reset();


			// $g('.pos-naoconformidade').hide()
			$g('#ModalAdicionarAbrangencia').modal('show');
			// CarregarEscNaoConformidades()

		}


		function ModalAcaoImediata() {

			document.getElementById('form-reset').reset();


			// $g('.pos-naoconformidade').hide()
			$g('#ModalAcaoImediata').modal('show');
			// CarregarEscNaoConformidades()

		}


		// function CarregarNaoConformidade(id) {
		// 	$g.ajax({
		// 		type: 'post',
		// 		data: 'id=' + id,
		// 		url: 'funcoes/carregar-nao-conformidade.php',
		// 		success: function(retorno) {
		// 			$g('#carregar-nao-conformidade').html(retorno)

		// 		}
		// 	})
		// }


		function GravarNaoConformidade(id) {

			var descricao = $g('#cad-nao-conformidade').val()
			var area_nconformidade = $g('#area-modal-nconformidade').val()
			var responsavel_nconformidade = $g('#responsavel-modal-nconformidade').val()


			$g.ajax({
				type: 'post',
				data: 'id=<?php echo $id ?>&descricao=' + descricao + '&area_nconformidade=' + area_nconformidade + '&responsavel_nconformidade=' + responsavel_nconformidade,
				url: 'funcoes/gravar-nao-conformidade.php',
				success: function(retorno) {

					// CarregarNaoConformidade()

					$g('#carregar-nao-conformidade').html(retorno)
				}
			})
		}



		function GravarAbrangência(id) {

			var descricaoAbrangencia = $g('#cad-abrangencia').val()
			var area_abrangencia = $g('#area-modal-abrangencia').val()
			var resposanvel_abrangencia = $g('#responsavel-modal-abrangencia').val()


			$g.ajax({
				type: 'post',
				data: 'id=<?php echo $id ?>&descricaoAbrangencia=' + descricaoAbrangencia + '&area_abrangencia=' + area_abrangencia + '&resposanvel_abrangencia=' + resposanvel_abrangencia,
				url: 'funcoes/gravar-abrangencia.php',
				success: function(retorno) {

					// CarregarNaoConformidade()

					$g('#carregar-abrangencia').html(retorno)
				}
			})
		}





		function GravarAcaoImediata(id) {

			var descricaoAcao = $g('#cad-descricao-correcao').val()
			var responsavelAcao = $g('#cad-responsavel-acao').val()
			var areaAcao = $g('#cad-area-acao').val()
			var dataAcao = $g('#cad-data-implementacao').val()

			$g.ajax({
				type: 'post',
				data: 'id=<?php echo $id ?>&descricaoAcao=' + descricaoAcao + '&responsavelAcao=' + responsavelAcao + '&areaAcao=' + areaAcao + '&dataAcao=' + dataAcao,
				url: 'funcoes/gravar-acao-imediata.php',
				success: function(retorno) {

					// CarregarNaoConformidade()

					$g('#carregar-acao').html(retorno)
				}
			})
		}
	</script>


	<script>
		// function Uploads() {
		// 	VerificaPossui()
		// 	var variavel = $("#cad-documentos option:selected").val()

		// 	if (variavel == 'sim') {
		// 		$var('#upload-arquivos').show()
		// 		$var('#upload-arquivos').load('upload-arquivos-rnc.php')
		// 	}


		// 	if (variavel == 'não') {

		// 		$var('#upload-arquivos').hide()
		// 		$var(".exibir-anexo").hide()
		// 	}


		// }


		function CarregaAnexos() {

			$var('#carrega-anexos-rnc').load('carrega-anexos-rnc.php')
			$var("#photo").val('');
			$var("#nome-arquivo").val('');
		}






		$ba = jQuery.noConflict()

		function CarregarAnexos() {

			var codigo = $g('#id').val()


			$ba.ajax({
				type: 'post',
				data: 'codigo=' + codigo,
				url: 'carrega-anexos-rnc.php',
				success: function(retorno) {

					$ba('#carrega-anexos-rnc').html(retorno);
				}
			})
		}

		function Uploads(id) {

			var variavel = $("#cad-documentos option:selected").val()

			$var('#upload-arquivos').show()
			$var('#upload-arquivos').load('upload-arquivos-qaa.php')

			CarregarAnexos()

		}
	</script>


	<script>
		$g = jQuery.noConflict()


		$g(document).on('change', '#photo', function() {

			var codigo = $g('#codigo-rnc').val()


			var myfiles = document.getElementById("photo");
			var files = myfiles.files;
			var data = new FormData();

			for (i = 0; i < files.length; i++) {
				data.append('file' + i, files[i]);
			}

			$g.ajax({
				url: 'funcoes/upload-rnc.php?codigo=' + codigo + '<?php echo $id ?>',
				method: 'POST',
				data: data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function() {
					$g('#msg').html('Carregando...');
				},
				success: function(data) {
					console.log(data);
					$g('#msg').html(data);

					CarregarAnexos()

				}
			});
		})
	</script>
</body>

</html>