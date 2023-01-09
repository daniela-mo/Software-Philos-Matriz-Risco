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

	<form action="processa-gravar-rcn.php" method="post" enctype="multipart/form-data">

		<input type="hidden" id="abas" value="<?php echo $aba; ?>">

		<!-- <input type="hidden" id="receber_monitoramento" value="<?php echo $receber_monitoramento = $_REQUEST['monitoramento']; ?>">
		<input type="hidden" id="receber_tratamento" value="<?php echo $receber_tratamento = $_REQUEST['tratamento']; ?>">
		<input type="hidden" id="receber_avaliacao" value="<?php echo $receber_avaliacao = $_REQUEST['avaliacao']; ?>"> -->

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
						<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>

						<div class="col-md-12 text-center mt-4 mb-5">
							<input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Registro">
							<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn2" onClick="Abas(2)" value="Plano de ação">
							<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn3" onClick="Abas(3)" value="Monitoramento">
							<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn4" onClick="Abas(4)" value="Análise Crítica">


						</div>
					</div>


					<div class="row mr-4">
						<div class="col-md-12">
							<div id="conteudo1">
								<h3 class="mb-4">

									Registro de Não Conformidade
								</h3>
								<div class="row">
									<div class="col-md-4">
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


									<div class="col-md-4 mb-3">
										<label>Origem</label>
										<select class="form-control" name="cad-origem">
											<option value="0">Escolha</option>
											<option>Produto não conforme</option>
											<option>Auditoria interna produto</option>
											<option>Auditoria interna de processo</option>
											<option>Auditoria externa</option>
											<option>Auditoria do SGQ</option>
											<option>Fornecedor</option>
											<option>Cliente</option>
											<option>Reclamação e/ou devolução </option>
											<option>Inspeção de recebimento</option>
											<option>Inspeção fiscal</option>
											<option>Desenvolvimento</option>
											<option>Processo interno</option>
											<option>Outros - descrever:</option>



										</select>
									</div>


									<div class="col-md-12 mt-3 mb-3">
										<input type="submit" value="Gravar Registro" class="btn btn-primary">
									</div>

	</form>


	<div class="col-md-12 causaEfeito px-0">


		<!-- 
		<?php
		$selecao_causas = mysqli_query($conexao, "select * from detalhe_nao_conformidade'");
		$registros_causas = mysqli_fetch_array($selecao_causas);
		?> -->
		<div class="col-md-6 mb-3 d-flex flex-column ml-0 mr-2 pl-0 pr-0">
			<h4>Detalhamento da Não Conformidade</h4>
			<input type="button" class="btn btn-primary float-left mb-3 pointer" style="width:30%;" value="Adicionar Não Conformidade" onClick="ModalAdicionarNaoConformidade()" data-dismiss="modal">
			<div id="carregar-nao-conformidade" style="max-width:100%">
				<table class="table table-striped mt-2">
					<tr>
						<th class="col-md-1">Id</th>
						<th>Detalhamento</th>
						<th class="col-md-1">Editar</th>
						<th class="col-md-1">Excluir</th>
					</tr>

					<?php
					mysqli_query($conexao, "SET NAMES 'utf8'");
					mysqli_query($conexao, 'SET character_set_connection=utf8');
					mysqli_query($conexao, 'SET character_set_client=utf8');
					mysqli_query($conexao, 'SET character_set_results=utf8');
					$selecao_tabela = mysqli_query($conexao, "select * from detalhe_nao_conformidade WHERE id_registro='$id'");
					while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
					?>

						<tr>
							<td class="col-md-1"><?php echo $registros_tabela['id'] ?></td>
							<td><?php echo $registros_tabela['descricao'] ?></td>


							<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarCausa(<?php echo $registros_tabela['id'] ?>)" data-toggle="modal" data-target="#causaModal">
									<span class="fa fa-edit"></span></a></td>

							<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirCausa(<?php echo $registros_tabela['id'] ?>)">
									<span class="fa fa-trash"></span></a></td>

						</tr>

					<?php } ?>

				</table>
			</div>
		</div>



		<div class="col-md-6 mb-3 d-flex flex-column ml-0 mr-2 pl-0 pr-0">
			<h4>Detalhamento da Abrangência</h4>
			<input type="button" class="btn btn-primary float-left mb-3 w-25 pointer" style="width:30%;" value="Adicionar Abrangência" onClick="ModalAdicionarAbrangencia()" data-dismiss="modal">

			<div id="carregar-abrangencia" style="max-width:100%">
				<table class="table table-striped mt-2">
					<tr>
						<th class="col-md-1">Id</th>
						<th>Detalhamento</th>
						<th class="col-md-1">Editar</th>
						<th class="col-md-1">Excluir</th>
					</tr>

					<?php
					mysqli_query($conexao, "SET NAMES 'utf8'");
					mysqli_query($conexao, 'SET character_set_connection=utf8');
					mysqli_query($conexao, 'SET character_set_client=utf8');
					mysqli_query($conexao, 'SET character_set_results=utf8');
					$selecao_tabela = mysqli_query($conexao, "select * from detalhe_abrangencia WHERE id_registro='$id'");
					while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
					?>

						<tr>
							<td class="col-md-1"><?php echo $registros_tabela['id'] ?></td>
							<td><?php echo $registros_tabela['descricao'] ?></td>


							<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarCausa(<?php echo $registros_tabela['id'] ?>)" data-toggle="modal" data-target="#causaModal">
									<span class="fa fa-edit"></span></a></td>

							<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirCausa(<?php echo $registros_tabela['id'] ?>)">
									<span class="fa fa-trash"></span></a></td>

						</tr>

					<?php } ?>

				</table>
			</div>
		</div>
	</div>


	<!-- ---------------------------------------MODAIS DE DETALHAMENTO NÃO CONFORMIDADE E ABRANGÊNCIA------------------------------------------------------------ -->

	<div class="modal fade" id="ModalAdicionarNaoConformidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="">

					<input type="hidden" id="obter-setor">

					<button type="button" class="close mr-3 mt-3" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="form-reset">
						<div class="">

							<div class="mb-4">
								<label>Não Conformidade </label>
								<textarea class="form-control" rows="5" name="cad-nao-conformidade" id="cad-nao-conformidade" autocomplete="off"></textarea>
								<input type="button" value="Adicionar Detalhamento" class="btn btn-primary mt-3" onClick="GravarNaoConformidade()" data-dismiss="modal" aria-label="Close">

							</div>


						</div>
					</form>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="ModalAdicionarAbrangencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="">

					<input type="hidden" id="obter-setor">

					<button type="button" class="close mr-3 mt-3" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="form-reset">
						<div class="">

							<div class="mb-4">
								<label>Abrangência</label>

								<textarea class="form-control" rows="5" name="cad-abrangencia" id="cad-abrangencia" autocomplete="off"></textarea>

								<input type="button" value="Adicionar Detalhamento" class="btn btn-primary mt-3" onClick="GravarAbrangência()" data-dismiss="modal" aria-label="Close">

							</div>


						</div>
					</form>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>





	<!-- 
	<div class="col-md-12 mt-5 mb-3">
		<h4>Ação Imediata Quando Houver</h4>
	</div> -->


	<div class="col-md-12 mb-3 d-flex flex-column">
		<h4>Ação Imediata Quando Houver</h4>
		<input type="button" class="btn btn-primary float-left mb-3 pointer" style="width:10%" value="Adicionar Ação" onClick="ModalAcaoImediata()" data-dismiss="modal">


		<div id="carregar-acao" style="max-width:100%">
			<table class="table table-striped mt-2">
				<tr>
					<th class="col-md-1">Id</th>
					<th>Descrição da Ação de Correção no Ato da Ciência</th>
					<th>Data</th>
					<th>Responsável</th>
					<th class="col-md-1">Editar</th>
					<th class="col-md-1">Excluir</th>
				</tr>

				<?php
				mysqli_query($conexao, "SET NAMES 'utf8'");
				mysqli_query($conexao, 'SET character_set_connection=utf8');
				mysqli_query($conexao, 'SET character_set_client=utf8');
				mysqli_query($conexao, 'SET character_set_results=utf8');
				$selecao_tabela_acao = mysqli_query($conexao, "select * from acao_imediata_nao_conformidade WHERE id_registro='$id'");
				while ($registros_tabela_acao = mysqli_fetch_array($selecao_tabela_acao)) {
				?>

					<tr>
						<td class="col-md-1"><?php echo $registros_tabela_acao['id'] ?></td>
						<td><?php echo $registros_tabela_acao['desc_acao'] ?></td>
						<td>
							<?php
							$data_id = $registros_tabela_acao['data'];

							$ano = substr($data_id, 0, 4);
							$mes = substr($data_id, 5, 2);
							$dia = substr($data_id, 8, 2);

							$data_id = str_replace('-', '/', $data_id);

							echo $dia . "/" . $mes . "/" . $ano;

							?></a></td>
						</td>
						<td><?php echo $registros_tabela_acao['responsavel'] ?></td>


						<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarCausa(<?php echo $registros_tabela_acao['id'] ?>)" data-toggle="modal" data-target="#causaModal">
								<span class="fa fa-edit"></span></a></td>

						<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirCausa(<?php echo $registros_tabela_acao['id'] ?>)">
								<span class="fa fa-trash"></span></a></td>

					</tr>

				<?php } ?>

			</table>
		</div>
	</div>


	<div class="modal fade" id="ModalAcaoImediata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="">

					<button type="button" class="close mr-3 mt-3" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<div class="row mt-4 mb-4">

						<div class="col-md-12">
							<label>Descrição da Ação de Correção no Ato da Ciência</label>
							<textarea class="form-control" cols="5" rows="7" name="cad-descricao-correcao" id="cad-descricao-correcao"></textarea>
						</div>

						<div class="row mt-3 col-md-12" style="display:flex;justify-content:space-around">
							<div class="col-md-5">
								<label>Data da Implementação</label>
								<input type="date" class="form-control mb-3" name="cad-data-implementacao" id="cad-data-implementacao" value="<?php echo date('Y-m-d') ?>" autocomplete="on">
							</div>


							<div class=" mb-3 col-md-7">
								<label>Responsável</label>
								<select class=" form-control" name="cad-responsavel-implementacao" id="cad-responsavel-implementacao">
									<option value="0">Escolher</option>
									<?php
									$selecao_usuarios = mysqli_query($conexao, "select * from usuarios_empresa");
									while ($registros_usuarios = mysqli_fetch_array($selecao_usuarios)) {
									?>

										<option><?php echo $registros_usuarios['nome'] ?></option>

									<?php } ?>


								</select>
							</div>

						</div>

					</div>
					<div class="mb-3">
						<input type="button" value="Adicionar Ação Imediata" class="btn btn-primary mt-3" onClick="GravarAcaoImediata()" data-dismiss="modal" aria-label="Close">

					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>






	<div id="conteudo2">
		<div class="mb-4">
			<h3>Plano de Ação</h3>
		</div>
		<div class="row">


			<!-- 
			<div class="col-md-3 mb-3">
				<label>Item</label>
				<select class="form-control" name="cad-item" id="cad-item">
					<option value="0">Escolher</option>
					<?php
					$selecao = mysqli_query($conexao, "select * from workflow order by planejamento ASC");
					while ($registros = mysqli_fetch_array($selecao)) {
					?>

						<option><?php echo $registros['planejamento'] ?></option>

					<?php } ?>

				</select>
			</div> -->

			<div class="col-md-3 mb-3">
				<label>Descrição do Plano de Ação</label>
				<input type="text" class="form-control" name="cad-descricao-acao" id="cad-descricao-acao">
			</div>

			<!-- <div class="col-md-3 mb-3">
				<label>Como Fazer?</label>
				<input type="text" class="form-control" name="cad-como-fazer" id="cad-como-fazer">
			</div> -->


			<div class="col-md-3">
				<label>Responsável</label>
				<input type="text">
				<!-- <select class="form-control" name="cad-responsavel-plano-de-acao" id="cad-responsavel-plano-de-acao">
					<option value="0">Escolher</option>
					<?php
					$selecao_usuarios = mysqli_query($conexao, "select * from usuarios_empresa");
					while ($registros_usuarios = mysqli_fetch_array($selecao_usuarios)) {
					?>

						<option><?php echo $registros_usuarios['nome'] ?></option>

					<?php } ?>


				</select> -->
			</div>

			<div class="col-md-3">
				<label>Data Prevista Conclusão</label>
				<input type="text" class="form-control mb-3 datepicker" name="cad-data-previsao" id="cad-data-previsao">
			</div>

			<div class="col-md-3">
				<label>Data Conclusão</label>
				<input type="text" class="form-control mb-3 datepicker" name="cad-conclusao" id="cad-data-conclusao">
			</div>

			<div class="col-md-4">
				<label>&nbsp;</label>
				<input type="button" class="btn btn-primary" value="Adicionar" onClick="GravarPlanoAcaoTemp()">
			</div>



			<div class="col-md-12 mb-4">
				<div id="carregar-tabela-plano-de-acao"></div>
			</div>
		</div>
	</div>





	<div id="conteudo3">
		<div class="row">


			<div class="col-md-12 mt-3 mb-3">
				<h3>Acompanhamento da Implementação - Monitoramento</h3>
			</div>


			<form action="processa-monitoramento-rcn.php" method="post" class="row">

				<div class="col-md-3 mb-3">
					<label>Item</label>
					<select class="form-control" name="cad-item-implementacao" id="cad-item-implementacao">
						<option value="0">Escolher</option>
						<?php
						$selecao = mysqli_query($conexao, "select * from workflow order by planejamento ASC");
						while ($registros = mysqli_fetch_array($selecao)) {
						?>

							<option><?php echo $registros['planejamento'] ?></option>

						<?php } ?>

					</select>
				</div>

				<div class="col-md-2">
					<label>Data</label>
					<input type="date" class="form-control mb-3 " name="cad-data-implementacao" id="cad-data-implementacao" value="<?php echo date('Y-m-d') ?>" autocomplete="on">
				</div>

				<div class="col-md-4">
					<label>Responsável Monitoramento</label>
					<select class="form-control" name="cad-responsavel-monitoramento" id="cad-responsavel-monitoramento">
						<option value="0">Escolher</option>
						<?php
						$selecao_usuarios = mysqli_query($conexao, "select * from usuarios_empresa");
						while ($registros_usuarios = mysqli_fetch_array($selecao_usuarios)) {
						?>

							<option><?php echo $registros_usuarios['nome'] ?></option>

						<?php } ?>


					</select>
				</div>

				<div class="col-md-3">
					<label>Status</label>
					<select class="form-control" name="cad-status-monitoramento" id="cad-status-monitoramento">
						<option value="0">Escolher</option>
						<option>Não Iniciado</option>
						<option>Em Andamento</option>
						<option>Concluído</option>
					</select>
				</div>

				<div class="col-md-3">
					<label>Evidência Objetiva</label>
					<input type="file" name="evidencia-objetiva" id="evidencia-objetiva">
				</div>

				<input type="submit" value="Adicionar Monitoramento" class="btn btn-primary mt-3">
			</form>
		</div>
	</div>






	<div id="conteudo4">
		<div class="mt-5 mb-3">
			<h3>Verificação da Eficácia - Análise crítica</h3>
		</div>

		<div>

			<form action="processa-analise-rnc.php" method="post" class="row">
				<div class="col-md-3 mb-3">
					<label>Responsável pela análise</label>
					<select class="form-control" name="cad-responsavel-analise" id="cad-responsavel-analise">
						<option value="0">Escolher</option>
						<?php
						$selecao_usuarios = mysqli_query($conexao, "select * from usuarios_empresa");
						while ($registros_usuarios = mysqli_fetch_array($selecao_usuarios)) {
						?>

							<option><?php echo $registros_usuarios['nome'] ?></option>

						<?php } ?>


					</select>
				</div>

				<div class="col-md-3 mb-3">
					<label>Data Análise</label>
					<input type="date" class="form-control mb-3" name="cad-data-analise" id="cad-data-analise">
				</div>

				<div class="col-md-3 mb-3">
					<label>Parecer</label>
					<select class="form-control" name="cad-parecer" id="cad-parecer" onChange="Parecer()">
						<option value="0">Escolher</option>
						<option>Eficaz</option>
						<option>Ineficaz</option>
					</select>
				</div>



				<div class="col-md-3 mb-3">
					<label>Evidência Objetiva</label>
					<input type="file" name="evidencia-objetiva-analise" id="evidencia-objetiva-analise">
				</div>

				<input type="submit" value="Adicionar Análise" class="btn btn-primary mt-3">

			</form>


		</div>
	</div>
	</div>
	</div>
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
			CarregarTabelaPlanoAcao()
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


		function GravarPlanoAcaoTemp() {

			var item = $f('#cad-item option:selected').val()
			var descricao = $f('#cad-descricao-acao').val()
			var ComoFazer = $f('#cad-como-fazer').val()
			var responsavel = $f('#cad-responsavel-plano-de-acao').val()
			var dataPrevisao = $f('#cad-data-previsao').val()
			var conclusao = $f('#cad-data-conclusao').val()

			$f.ajax({
				type: 'post',
				data: 'item=' + item + '&descricao=' + descricao + '&comofazer=' + ComoFazer + '&responsavel=' + responsavel + '&dataprevisao=' + dataPrevisao + '&conclusao=' + conclusao,
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

			var receber_avaliacao = $g("#receber_avaliacao").val()
			var receber_tratamento = $g("#receber_tratamento").val()
			var receber_monitoramento = $g("#receber_monitoramento").val()



			if (receber_avaliacao == 2) {
				Abas(2)
				$b('#btn2').trigger("click")
			}
			if (receber_tratamento == 3) {
				Abas(3)
				$b('#btn3').trigger("click")
			}
			if (receber_monitoramento == 4) {
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


			$g.ajax({
				type: 'post',
				data: 'id=<?php echo $id ?>&descricao=' + descricao,
				url: 'funcoes/gravar-nao-conformidade.php',
				success: function(retorno) {

					// CarregarNaoConformidade()

					$g('#carregar-nao-conformidade').html(retorno)
				}
			})
		}



		function GravarAbrangência(id) {

			var descricaoAbrangencia = $g('#cad-abrangencia').val()


			$g.ajax({
				type: 'post',
				data: 'id=<?php echo $id ?>&descricaoAbrangencia=' + descricaoAbrangencia,
				url: 'funcoes/gravar-abrangencia.php',
				success: function(retorno) {

					// CarregarNaoConformidade()

					$g('#carregar-abrangencia').html(retorno)
				}
			})
		}





		function GravarAcaoImediata(id) {

			var descricaoAcao = $g('#cad-descricao-correcao').val()
			var responsavelAcao = $g('#cad-responsavel-implementacao').val()
			var dataAcao = $g('#cad-data-implementacao').val()

			$g.ajax({
				type: 'post',
				data: 'id=<?php echo $id ?>&descricaoAcao=' + descricaoAcao + '&responsavelAcao=' + responsavelAcao + '&dataAcao=' + dataAcao,
				url: 'funcoes/gravar-acao-imediata.php',
				success: function(retorno) {

					// CarregarNaoConformidade()

					$g('#carregar-acao').html(retorno)
				}
			})
		}
	</script>

</body>

</html>