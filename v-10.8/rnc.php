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

	$id = $_REQUEST['cod'];
	@$codigo_rnc = $_REQUEST['cod'];

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
	<input type="hidden" id="codigo_rnc" value="<?php echo $codigo_rnc ?>">

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
						<div id="conteudo1" class="col-md-12">
							<h3 class="mb-4">
								Registro de Não Conformidade
							</h3>
							<div class="row col-md-12">
								<div class="col-md-1">
									<label>Id</label>
									<?php
									mysqli_query($conexao, "SET NAMES 'utf8'");
									mysqli_query($conexao, 'SET character_set_connection=utf8');
									mysqli_query($conexao, 'SET character_set_client=utf8');
									mysqli_query($conexao, 'SET character_set_results=utf8');
									$selecao_rnc = mysqli_query($conexao, "select * from rnc where id='$id'");
									while ($registros_rnc = mysqli_fetch_array($selecao_rnc)) {
										$id = $registros_rnc['id'];

									?>

										<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['id'] ?>" readonly>
								</div>

								<div class="col-md-3">
									<label>Data de Identificação</label>
									<input type="date" class="form-control mb-3" value="<?php echo $registros_rnc['data'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Planta</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['planta_reg_nao_conformidade'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Parceiros</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['parceiro'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Origem</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['origem'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Processo</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['processo'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Risco</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['risco'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Área do responsável pelo registro</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['area_reg_nao_conformidade'] ?>" readonly>
								</div>

								<div class="col-md-3">
									<label>Responsável pelo registro</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['responsavel_rnc'] ?>" readonly>
								</div>

							<?php } ?>
							</div>


							<div class="col-md-12 causaEfeito px-0">



								<div class="col-md-6 mb-3 d-flex flex-column ml-0 mr-2 pl-0 pr-0">
									<h4>Descrição da Não Conformidade</h4>
									<input type="button" class="btn btn-primary float-left mb-3 pointer" style="width:30%;" value="Adicionar Não Conformidade" onClick="ModalAdicionarNaoConformidade()" data-dismiss="modal">
									<div id="carregar-nao-conformidade" style="max-width:100%">
										<table class="table table-striped mt-2">
											<tr>
												<th class="col-md-1">Id</th>
												<th>Descrição</th>
												<th>Responsável</th>
												<th>Área</th>
												<!-- <th class="col-md-1">Editar</th>
												<th class="col-md-1">Excluir</th> -->
											</tr>

											<?php
											mysqli_query($conexao, "SET NAMES 'utf8'");
											mysqli_query($conexao, 'SET character_set_connection=utf8');
											mysqli_query($conexao, 'SET character_set_client=utf8');
											mysqli_query($conexao, 'SET character_set_results=utf8');
											$selecao_tabela = mysqli_query($conexao, "select * from detalhe_nao_conformidade WHERE codigo='$id'");
											while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
											?>

												<tr>
													<td class="col-md-1"><?php echo $registros_tabela['id'] ?></td>
													<td><?php echo $registros_tabela['descricao'] ?></td>
													<td><?php echo $registros_tabela['responsavel'] ?></td>
													<td><?php echo $registros_tabela['area'] ?></td>


													<!-- <td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarCausa(<?php echo $registros_tabela['id'] ?>)" data-toggle="modal" data-target="#causaModal">
															<span class="fa fa-edit"></span></a></td>

													<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirCausa(<?php echo $registros_tabela['id'] ?>)">
															<span class="fa fa-trash"></span></a></td> -->

												</tr>

											<?php } ?>

										</table>
									</div>
								</div>



								<div class="col-md-6 mb-3 d-flex flex-column ml-0 mr-2 pl-0 pr-0">
									<h4>Descrição da Abrangência</h4>
									<input type="button" class="btn btn-primary float-left mb-3 w-25 pointer" style="width:30%;" value="Adicionar Abrangência" onClick="ModalAdicionarAbrangencia()" data-dismiss="modal">

									<div id="carregar-abrangencia" style="max-width:100%">
										<table class="table table-striped mt-2">
											<tr>
												<th class="col-md-1">Id</th>
												<th>Descrição</th>
												<th>Responsável</th>
												<th>Área</th>
												<!-- <th class="col-md-1">Editar</th>
												<th class="col-md-1">Excluir</th> -->
											</tr>

											<?php
											mysqli_query($conexao, "SET NAMES 'utf8'");
											mysqli_query($conexao, 'SET character_set_connection=utf8');
											mysqli_query($conexao, 'SET character_set_client=utf8');
											mysqli_query($conexao, 'SET character_set_results=utf8');
											$selecao_tabela = mysqli_query($conexao, "select * from detalhe_abrangencia WHERE codigo='$id'");
											while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
											?>

												<tr>
													<td class="col-md-1"><?php echo $registros_tabela['id'] ?></td>
													<td><?php echo $registros_tabela['descricao'] ?></td>
													<td><?php echo $registros_tabela['responsavel'] ?></td>
													<td><?php echo $registros_tabela['area'] ?></td>
													<!-- 
													<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarCausa(<?php echo $registros_tabela['id'] ?>)" data-toggle="modal" data-target="#causaModal">
															<span class="fa fa-edit"></span></a></td>

													<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirCausa(<?php echo $registros_tabela['id'] ?>)">
															<span class="fa fa-trash"></span></a></td> -->

												</tr>

											<?php } ?>

										</table>
									</div>
								</div>
							</div>









							<div class="col-md-12 mb-3 d-flex flex-column">
								<h4>Ação Imediata (quando houver)</h4>
								<input type="button" class="btn btn-primary float-left mb-3 pointer" style="width:10%" value="Adicionar Ação" onClick="ModalAcaoImediata()" data-dismiss="modal">


								<div id="carregar-acao" style="max-width:100%">
									<table class="table table-striped mt-2">
										<tr>
											<th class="col-md-1">Id</th>
											<th>Descrição</th>
											<th>Responsável</th>
											<th>Área</th>
											<th>Data</th>
											<!-- <th class="col-md-1">Editar</th>
											<th class="col-md-1">Excluir</th> -->
										</tr>

										<?php
										mysqli_query($conexao, "SET NAMES 'utf8'");
										mysqli_query($conexao, 'SET character_set_connection=utf8');
										mysqli_query($conexao, 'SET character_set_client=utf8');
										mysqli_query($conexao, 'SET character_set_results=utf8');
										$selecao_tabela_acao = mysqli_query($conexao, "select * from acao_imediata_nao_conformidade WHERE codigo='$id'");
										while ($registros_tabela_acao = mysqli_fetch_array($selecao_tabela_acao)) {
										?>

											<tr>
												<td class="col-md-1"><?php echo $registros_tabela_acao['id'] ?></td>
												<td class="col-md-3"><?php echo $registros_tabela_acao['desc_acao'] ?></td>
												<td class="col-md-3"><?php echo $registros_tabela_acao['responsavel'] ?></td>
												<td class="col-md-3"><?php echo $registros_tabela_acao['area'] ?></td>
												<td class="col-md-2">
													<?php
													$data_id = $registros_tabela_acao['data'];

													$ano = substr($data_id, 0, 4);
													$mes = substr($data_id, 5, 2);
													$dia = substr($data_id, 8, 2);

													$data_id = str_replace('-', '/', $data_id);

													echo $dia . "/" . $mes . "/" . $ano;

													?></a></td>
												</td>

												<!-- <td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarCausa(<?php echo $registros_tabela_acao['id'] ?>)" data-toggle="modal" data-target="#causaModal">
														<span class="fa fa-edit"></span></a></td>

												<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirCausa(<?php echo $registros_tabela_acao['id'] ?>)">
														<span class="fa fa-trash"></span></a></td> -->

											</tr>

										<?php } ?>

									</table>
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
												<div>

													<div class="mb-4">
														<label>Descrição da Não Conformidade </label>

														<textarea class="form-control" rows="5" name="cad-nao-conformidade" id="cad-nao-conformidade" autocomplete="off"></textarea>
													</div>

													<div class="col-md-12 row">
														<div class="col-md-6">
															<label>Área</label>
															<input type="text" class="form-control" name="area-modal-nconformidade" id="area-modal-nconformidade">

														</div>

														<div class="col-md-6">
															<label>Responsável</label>
															<input type="text" class="form-control" name="responsavel-modal-nconformidade" id="responsavel-modal-nconformidade">

														</div>
													</div>

													<input type="button" value="Adicionar Detalhamento" class="btn btn-primary mt-3" onClick="GravarNaoConformidade()" data-dismiss="modal" aria-label="Close">
												</div>

										</div>
										</form>
									</div>
									<div class="modal-footer">

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
														<label>Descrição da Abrangência</label>

														<textarea class="form-control" rows="5" name="cad-abrangencia" id="cad-abrangencia" autocomplete="off"></textarea>
													</div>

													<div class="col-md-12 row">
														<div class="col-md-6">
															<label>Área</label>
															<input type="text" class="form-control" name="area-modal-abrangencia" id="area-modal-abrangencia">

														</div>

														<div class="col-md-6">
															<label>Responsável</label>
															<input type="text" class="form-control" name="responsavel-modal-abrangencia" id="responsavel-modal-abrangencia">

														</div>
													</div>
													<input type="button" value="Adicionar Detalhamento" class="btn btn-primary mt-3" onClick="GravarAbrangência()" data-dismiss="modal" aria-label="Close">

												</div>


										</div>
										</form>
									</div>
									<div class="modal-footer">

									</div>
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
													<div class="col-md-4">
														<label>Data Implementação</label>
														<input type="date" class="form-control mb-3" name="cad-data-implementacao" id="cad-data-implementacao" value="<?php echo date('Y-m-d') ?>" autocomplete="on">
													</div>


													<div class="col-md-4">
														<label>Área</label>
														<input type="text" class="form-control" name="cad-area-acao" id="cad-area-acao">

													</div>

													<div class="mb-3 col-md-4">
														<label>Responsável</label>
														<input type="text" class="form-control" name="cad-responsavel-acao" id="cad-responsavel-acao">

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

							<div class="col-md-12 mb-3">
								<label>Descrição do Plano de Ação</label>
								<textarea name="cad-descricao-acao" id="cad-descricao-acao" rows="5" class="form-control"></textarea>
							</div>

							<div class="col-md-12 row">

								<div class="col-md-3">
									<label>Início</label>
									<input type="date" class="form-control mb-3 " name="inicio-plano-acao" id="inicio-plano-acao" value="<?php echo date('Y-m-d') ?>" autocomplete="on">
								</div>

								<div class="col-md-3">
									<label>Término</label>
									<input type="date" class="form-control mb-3 " name="cad-conclusao" id="cad-data-conclusao" value="<?php echo date('Y-m-d') ?>" autocomplete="on">
								</div>


								<div class="col-md-3">
									<label>Prioridade</label>
									<select name="prioridade-acao" id="prioridade-acao" class="form-control mr-3">
										<option value="">Selecione a Prioridade</option>
										<option>Baixa</option>
										<option>Média</option>
										<option>Alta</option>
									</select>
								</div>

								<div class="col-md-3">
									<label>Status</label>
									<select name="status_plano_acao" id="status_plano_acao" class="form-control mr-3">
										<option value="">Selecione o Status</option>
										<option>Aberto</option>
										<option>Concluído</option>
										<option>Em andamento</option>
										<option>Não iniciado</option>
									</select>
								</div>


								<div class="col-md-3">
									<label>Área</label>
									<input type="text" class="form-control" name="area-plano-acao" id="area-plano-acao">

								</div>

								<div class="col-md-3">
									<label>Responsável</label>
									<input type="text" class="form-control" name="responsavel-plano-de-acao" id="responsavel-plano-de-acao">

								</div>

								<div class="col-md-12">
									<label>&nbsp;</label>
									<input type="button" class="btn btn-primary" value="Adicionar Plano de Ação" onClick="GravarPlanoAcaoTemp()">
								</div>

							</div>

							<div class="col-md-12 mb-4">
								<table class="table table-striped mt-5">
									<tr>

										<th class="col-md-2">Descrição</th>
										<th class="col-md-2">Responsável</th>
										<th class="col-md-2">Área</th>
										<th class="col-md-1">Início</th>
										<th class="col-md-1">Término</th>
										<th class="col-md-1">Prioridade</th>
										<th class="col-md-1">Status</th>
										<!-- <th class="col-md-1">Editar</th>
										<th class="col-md-1">Excluir</th> -->
									</tr>

									<?php
									$selecao_tabela = mysqli_query($conexao, "select * from tabela_plano_de_acao_temp where codigo_rnc='$id'");
									while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
									?>

										<tr>
											<td class="col-md-2"><?php echo $registros_tabela['descricao'] ?></td>
											<td class="col-md-2"><?php echo $registros_tabela['responsavel'] ?></td>
											<td class="col-md-2"><?php echo $registros_tabela['area'] ?></td>
											<td class="col-md-1"> <?php
																	$data_id = $registros_tabela['data_prevista_conclusao'];

																	$ano = substr($data_id, 0, 4);
																	$mes = substr($data_id, 5, 2);
																	$dia = substr($data_id, 8, 2);

																	$data_id = str_replace('-', '/', $data_id);

																	echo $dia . "/" . $mes . "/" . $ano;

																	?></td>
											</td>
											<td class="col-md-1"><?php
																	$data_id = $registros_tabela['data_conclusao'];

																	$ano = substr($data_id, 0, 4);
																	$mes = substr($data_id, 5, 2);
																	$dia = substr($data_id, 8, 2);

																	$data_id = str_replace('-', '/', $data_id);

																	echo $dia . "/" . $mes . "/" . $ano;

																	?></td>
											<td class="col-md-1"><?php echo $registros_tabela['prioridade'] ?></td>
											<td class="col-md-1"><?php echo $registros_tabela['status'] ?></td>
											<!-- <td class="col-md-1"><i class="fa fa-edit pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela['id'] ?>)"></i></td>
											<td class="col-md-1"><i class="fa fa-trash pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela['id'] ?>)"></i></td> -->
										</tr>

									<?php } ?>

								</table>
								<!-- <div id="carregar-tabela-plano-de-acao"></div> -->
							</div>
						</div>
					</div>





					<div id="conteudo3">
						<div class="mt-3 mb-3">
							<h3>Acompanhamento da Implementação - Monitoramento</h3>
						</div>
						<div class="row col-md-12">

							<div class="col-md-9 mb-3">
								<label>Descrição do Monitoramento</label>
								<textarea name="cad-descricao-monitoramento" id="cad-descricao-monitoramento" rows="5" class="form-control"></textarea>
							</div>

							<div class="col-md-3">
								<span id="msg" style="color:red"></span><br />

								<input type="file" id="photo" name="photo" class="mb-3" multiple><br />

								<!-- <div id="carrega-anexos-rnc"></div> -->


								<table class="table table-striped" id="carrega-anexos-rnc" name="carrega-anexos-rnc">
									<?php
									session_start();
									$obterdominio = $_SESSION['dominio'];
									include($obterdominio . '/' . 'conexao.php');

									mysqli_query($conexao, "SET NAMES 'utf8'");
									mysqli_query($conexao, 'SET character_set_connection=utf8');
									mysqli_query($conexao, 'SET character_set_client=utf8');
									mysqli_query($conexao, 'SET character_set_results=utf8');


									$selecao = mysqli_query($conexao, "select * from upload_rnc where codigo_rnc='$id'");
									while ($registros = mysqli_fetch_array($selecao)) {
										$id = $_POST['id'];
									?>


										<tr>
											<td><img src="imgs/icone-documento.png" width="15" height="17" alt="" />

												<a target="_blank" href="<?php echo $obterdominio ?>/upload-rnc/<?php echo $registros['arquivo'] ?>">
													<?php echo $registros['arquivo'] ?>
												</a>


											</td>

											<!-- <td style="cursor: pointer" onClick="Deletar(<?php echo $registros['id'] ?>)"><strong><i class="fa fa-trash"></i></strong></td> -->
										</tr>


									<?php } ?>

								</table>


							</div>

							<div class="col-md-4 mb-3">
								<label>Plano de ação</label>
								<select class="form-control" name="cad-item-implementacao" id="cad-item-implementacao">
									<option value="0">Escolher</option>
									<?php
									$selecao = mysqli_query($conexao, "select * from tabela_plano_de_acao_temp order by descricao ASC");
									while ($registros = mysqli_fetch_array($selecao)) {
									?>

										<option><?php echo $registros['descricao'] ?></option>

									<?php } ?>
								</select>
							</div>


							<div class="col-md-3">
								<label>Área</label>
								<input type="text" class="form-control" name="cad-area-monitoramento" id="cad-area-monitoramento">
							</div>


							<div class="col-md-3">
								<label>Responsável Monitoramento</label>
								<input type="text" class="form-control" name="cad-responsavel-monitoramento" id="cad-responsavel-monitoramento">
							</div>

							<div class="col-md-2">
								<label>Data</label>
								<input type="date" class="form-control mb-3 " name="cad-data-implementacao" id="cad-data-implementacao" value="<?php echo date('Y-m-d') ?>" autocomplete="on">
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



							<div class="col-md-12">
								<input type="button" value="Adicionar Monitoramento" onClick="GravarMonitoramento()" class="btn btn-primary mt-3">
							</div>

							<div class="col-md-12 mb-4">
								<table class="table table-striped mt-5">
									<tr>

										<th class="col-md-2">Descrição do monitoramento</th>
										<th class="col-md-2">Plano de ação</th>
										<th class="col-md-2">Área</th>
										<th class="col-md-2">Responsável Monitoramento</th>
										<th class="col-md-1">Data</th>
										<th class="col-md-1">Status</th>
										<!-- <th class="col-md-1">Editar</th>
										<th class="col-md-1">Excluir</th> -->
									</tr>

									<?php
									$selecao_tabela = mysqli_query($conexao, "select * from monitoramento_rnc where codigo_rnc='$id'");
									while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
									?>

										<tr>
											<td class="col-md-2"><?php echo $registros_tabela['descricao'] ?></td>
											<td class="col-md-1"><?php echo $registros_tabela['item'] ?></td>
											<td class="col-md-2"><?php echo $registros_tabela['area'] ?></td>
											<td class="col-md-2"><?php echo $registros_tabela['responsavel_monitor'] ?></td>
											<td class="col-md-1"> <?php
																	$data_id = $registros_tabela['data'];

																	$ano = substr($data_id, 0, 4);
																	$mes = substr($data_id, 5, 2);
																	$dia = substr($data_id, 8, 2);

																	$data_id = str_replace('-', '/', $data_id);

																	echo $dia . "/" . $mes . "/" . $ano;

																	?></a></td>
											</td>
											<td class="col-md-1"><?php echo $registros_tabela['status'] ?></td>
											<!-- <td class="col-md-1"><i class="fa fa-edit pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela['id'] ?>)"></i></td>
											<td class="col-md-1"><i class="fa fa-trash pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela['id'] ?>)"></i></td> -->
										</tr>

									<?php } ?>

								</table>
								<!-- <div id="carregar-tabela-monitoramento"></div> -->
							</div>

						</div>
					</div>






					<div id="conteudo4">
						<div class="mt-5 mb-3">
							<h3>Verificação da Eficácia - Análise crítica</h3>
						</div>

						<div class="row col-md-12">

							<div class="col-md-9 mb-3">
								<label>Descrição da Análise Crítica</label>
								<textarea name="cad-descricao-analise" id="cad-descricao-analise" rows="5" class="form-control"></textarea>
							</div>

							<div class="col-md-3">
								<span id="msg" style="color:red"></span><br />

								<input type="file" id="analise" name="analise" class="mb-3" multiple><br />

								<table class="table table-striped">
									<?php
									session_start();
									$obterdominio = $_SESSION['dominio'];
									include($obterdominio . '/' . 'conexao.php');

									mysqli_query($conexao, "SET NAMES 'utf8'");
									mysqli_query($conexao, 'SET character_set_connection=utf8');
									mysqli_query($conexao, 'SET character_set_client=utf8');
									mysqli_query($conexao, 'SET character_set_results=utf8');


									$selecao = mysqli_query($conexao, "select * from upload_analise where codigo_rnc='$codigo_rnc'");
									while ($registros = mysqli_fetch_array($selecao)) {
										$id = $_POST['id'];
									?>


										<tr>
											<td><img src="imgs/icone-documento.png" width="15" height="17" alt="" />

												<a target="_blank" href="<?php echo $obterdominio ?>/upload-analise/<?php echo $registros['arquivo'] ?>">
													<?php echo $registros['arquivo'] ?>
												</a>


											</td>

											<!-- <td style="cursor: pointer" onClick="Deletar(<?php echo $registros['id'] ?>)"><strong><i class="fa fa-trash"></i></strong></td> -->
										</tr>


									<?php } ?>

								</table>

							</div>

							<div class="col-md-4">
								<label>Área</label>
								<input type="text" class="form-control" name="cad-area-analise" id="cad-area-analise">
							</div>
							<div class="col-md-4 mb-3">
								<label>Responsável pela análise</label>
								<input type="text" class="form-control" name="cad-responsavel-analise" id="cad-responsavel-analise">

							</div>

							<div class="col-md-2 mb-3">
								<label>Data</label>
								<input type="date" class="form-control mb-3" name="cad-data-analise" id="cad-data-analise" value="<?php echo date('Y-m-d') ?>" autocomplete="on">
							</div>

							<div class="col-md-4 mb-3">
								<label>Parecer</label>
								<select class="form-control" name="cad-parecer" id="cad-parecer">
									<option value="0">Escolher</option>
									<option>Eficaz</option>
									<option>Ineficaz</option>
								</select>
							</div>



							<div class="col-md-4 mb-4">
								<label>Objetivo atendido?</label>
								<select class="form-control" name="objetivo-analise" id="objetivo-analise">
									<option>Sim</option>
									<option selected>Não</option>
								</select>
							</div>


							<div class="col-md-3 mb-4">
								<label>Indicação de necessidade de revisão </label>
								<select class="form-control" name="necessidade_revisao_analise" id="necessidade_revisao_analise">
									<option>Sim</option>
									<option selected>Não</option>
								</select>
							</div>



							<div class="col-md-12">
								<input type="button" value="Adicionar Análise" onClick="GravarAnalise()" class="btn btn-primary mt-3">
							</div>


							<div class="col-md-12 mb-4">
								<?php
								session_start();
								$obterdominio = $_SESSION['dominio'];
								include($obterdominio . '/' . 'conexao.php');

								mysqli_query($conexao, "SET NAMES 'utf8'");
								mysqli_query($conexao, 'SET character_set_connection=utf8');
								mysqli_query($conexao, 'SET character_set_client=utf8');
								mysqli_query($conexao, 'SET character_set_results=utf8');
								?>


								<table class="table table-striped mt-5">
									<tr>

										<th class="col-md-2">Descrição da Análise Crítica</th>
										<th class="col-md-2">Área</th>
										<th class="col-md-2">Responsável pela análise</th>
										<th class="col-md-1">Data</th>
										<th class="col-md-1">Parecer</th>
										<th class="col-md-1">Objetivo atendido?</th>
										<th class="col-md-1">Indicação de necessidade de revisão</th>
										<!-- <th class="col-md-1">Editar</th>
										<th class="col-md-1">Excluir</th> -->
									</tr>

									<?php
									$selecao_tabela_analise = mysqli_query($conexao, "select * from analise_rnc where codigo_rnc='$codigo_rnc'");
									while ($registros_tabela_analise = mysqli_fetch_array($selecao_tabela_analise)) {
									?>

										<tr>
											<td class="col-md-2"><?php echo $registros_tabela_analise['descricao'] ?></td>
											<td class="col-md-2"><?php echo $registros_tabela_analise['area'] ?></td>
											<td class="col-md-2"><?php echo $registros_tabela_analise['responsavel_analise'] ?></td>
											<td class="col-md-1"> <?php
																	$data_id = $registros_tabela_analise['data'];

																	$ano = substr($data_id, 0, 4);
																	$mes = substr($data_id, 5, 2);
																	$dia = substr($data_id, 8, 2);

																	$data_id = str_replace('-', '/', $data_id);

																	echo $dia . "/" . $mes . "/" . $ano;

																	?></a></td>
											</td>
											<td class="col-md-1"><?php echo $registros_tabela_analise['parecer'] ?></td>
											<td class="col-md-1"><?php echo $registros_tabela_analise['objetivo'] ?></td>
											<td class="col-md-1"><?php echo $registros_tabela_analise['necessidade'] ?></td>
											<!-- <td class="col-md-1"><i class="fa fa-edit pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela_analise['id'] ?>)"></i></td>
											<td class="col-md-1"><i class="fa fa-trash pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela_analise['id'] ?>)"></i></td> -->
										</tr>

									<?php } ?>

								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>


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


	// function Parecer() {

	// 	var parecer = $f('#cad-parecer option:selected').val()

	// 	if (parecer == 'Ineficaz') {
	// 		$f('#nova-conformidade').show()
	// 	}

	// 	if (parecer == 'Eficaz') {
	// 		$f('#nova-conformidade').hide()
	// 	}

	// }


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

	function GravarMonitoramento(id) {

		var codigo = $g('#codigo_rnc').val()
		var descricaoMonitor = $f('#cad-descricao-monitoramento').val()
		var planoAcao = $f('#cad-item-implementacao').val()
		var areaMonitoramento = $f('#cad-area-monitoramento').val()
		var responsavelMonitor = $f('#cad-responsavel-monitoramento').val()
		var dataMonitor = $f('#cad-data-implementacao').val()
		var statusMonitor = $f("#cad-status-monitoramento option:selected").val()

		$f.ajax({
			type: 'post',
			data: 'descricaoMonitor=' + descricaoMonitor + '&planoAcao=' + planoAcao + '&areaMonitoramento=' + areaMonitoramento + '&responsavelMonitor=' + responsavelMonitor + '&dataMonitor=' + dataMonitor + '&statusMonitor=' + statusMonitor,
			url: 'processa-monitoramento-rnc.php?codigo=' + codigo + '&id=<?php echo $id ?>',
			success: function(retorno) {
				CarregarTabelaMonitoramento()

				location.href = 'rnc.php?cod=<?php echo $id ?>&aba=monitoramento'


			}
		})
	}



	function GravarPlanoAcaoTemp(id) {

		var codigo = $g('#codigo_rnc').val()
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
			url: 'funcoes/gravar-tabela-plano-de-acao-temp.php?codigo=' + codigo + '&id=<?php echo $id ?>',
			success: function(retorno) {
				location.href = 'rnc.php?cod=' + codigo + '<?php echo $receber_plano = $_REQUEST['plano']; ?>'
				CarregarTabelaPlanoAcao()
			}
		})
	}

	function GravarAnalise(id) {

		var codigo = $g('#codigo_rnc').val()
		var descricaoAnalise = $f('#cad-descricao-analise').val()
		var responsavel_analise = $f('#cad-responsavel-analise').val()
		var area_analise = $f('#cad-area-analise').val()
		var data_analise = $f('#cad-data-analise').val()
		var parecer = $f("#cad-parecer option:selected").val()
		var objetivo = $f("#objetivo-analise option:selected").val()
		var necessidade = $f("#necessidade_revisao_analise option:selected").val()

		$f.ajax({
			type: 'post',
			data: 'descricaoAnalise=' + descricaoAnalise + '&responsavel_analise=' + responsavel_analise + '&area_analise=' + area_analise + '&data_analise=' + data_analise + '&parecer=' + parecer + '&objetivo=' + objetivo + '&necessidade=' + necessidade,
			url: 'processa-analise-rnc.php?codigo=' + codigo + '&id=<?php echo $id ?>',
			success: function(retorno) {
				$f('#carregar-tabela-analise').html(retorno)
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




	// function CarregarTabelaMonitoramento() {


	// 	$f.ajax({
	// 		type: 'post',
	// 		data: 'codigo=',
	// 		url: 'carregar-tabela-monitoramento.php',
	// 		success: function(retorno) {
	// 			$f('#carregar-tabela-monitoramento').html(retorno)

	// 		}
	// 	})
	// }


	function GravarNaoConformidade(id) {

		var codigo = $g('#codigo_rnc').val()
		var descricao = $g('#cad-nao-conformidade').val()
		var area_nconformidade = $g('#area-modal-nconformidade').val()
		var responsavel_nconformidade = $g('#responsavel-modal-nconformidade').val()


		$g.ajax({
			type: 'post',
			data: 'descricao=' + descricao + '&area_nconformidade=' + area_nconformidade + '&responsavel_nconformidade=' + responsavel_nconformidade,
			url: 'funcoes/gravar-nao-conformidade.php?codigo=' + codigo + '&id=<?php echo $id ?>',
			success: function(retorno) {
				// CarregarNaoConformidade()

				$g('#carregar-nao-conformidade').html(retorno)
			}
		})

	}



	function GravarAbrangência(id) {

		var codigo = $g('#codigo_rnc').val()
		var descricaoAbrangencia = $g('#cad-abrangencia').val()
		var area_abrangencia = $g('#area-modal-abrangencia').val()
		var resposanvel_abrangencia = $g('#responsavel-modal-abrangencia').val()


		$g.ajax({
			type: 'post',
			data: 'descricaoAbrangencia=' + descricaoAbrangencia + '&area_abrangencia=' + area_abrangencia + '&resposanvel_abrangencia=' + resposanvel_abrangencia,
			url: 'funcoes/gravar-abrangencia.php?codigo=' + codigo + '&id=<?php echo $id ?>',
			success: function(retorno) {

				// CarregarNaoConformidade()

				$g('#carregar-abrangencia').html(retorno)
			}
		})
	}





	function GravarAcaoImediata(id) {

		var codigo = $g('#codigo_rnc').val()
		var descricaoAcao = $g('#cad-descricao-correcao').val()
		var responsavelAcao = $g('#cad-responsavel-acao').val()
		var areaAcao = $g('#cad-area-acao').val()
		var dataAcao = $g('#cad-data-implementacao').val()

		$g.ajax({
			type: 'post',
			data: 'descricaoAcao=' + descricaoAcao + '&responsavelAcao=' + responsavelAcao + '&areaAcao=' + areaAcao + '&dataAcao=' + dataAcao,
			url: 'funcoes/gravar-acao-imediata.php?codigo=' + codigo + '&id=<?php echo $id ?>',
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


	function CarregarAnexos() {

		var codigo = $g('#codigo_rnc').val()


		$ba.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'carrega-anexos-rnc.php',
			success: function(retorno) {

				$ba('#carrega-anexos-rnc').html(retorno);
			}
		})
	}


	function CarregaAnexos2() {

		$var('#carrega-anexos-rnc').show()
		$var("#analise").val('');
		$var("#nome-arquivo").show('');
	}







	$g = jQuery.noConflict()


	$g(document).on('change', '#photo', function(id) {

		var codigo = $g('#codigo_rnc').val()

		var myfiles = document.getElementById("photo");
		var files = myfiles.files;
		var data = new FormData();

		for (i = 0; i < files.length; i++) {
			data.append('file' + i, files[i]);
		}

		$g.ajax({
			url: 'funcoes/upload-rnc.php?codigo=' + codigo + '&id=<?php echo $id ?>',
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
				$ba('#carrega-anexos-rnc').html(retorno);
			}
		});
	})



	$g(document).on('change', '#analise', function(id) {

		var codigo = $g('#codigo_rnc').val()

		var myfiles = document.getElementById("analise");
		var files = myfiles.files;
		var data = new FormData();

		for (i = 0; i < files.length; i++) {
			data.append('file' + i, files[i]);
		}

		$g.ajax({
			url: 'funcoes/upload-analise.php?codigo=' + codigo + '&id=<?php echo $id ?>',
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

			}
		});
	})
</script>