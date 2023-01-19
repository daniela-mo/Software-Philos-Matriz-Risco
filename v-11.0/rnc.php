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

	@$aba = $_REQUEST['aba'];



	mysqli_query($conexao, "SET NAMES 'utf8'");
	mysqli_query($conexao, 'SET character_set_connection=utf8');
	mysqli_query($conexao, 'SET character_set_client=utf8');
	mysqli_query($conexao, 'SET character_set_results=utf8');
	$selecao_usuario = mysqli_query($conexao, "select * from usuarios_empresa WHERE email='$usuario' ");
	$registros_usuario = mysqli_fetch_array($selecao_usuario);
	$codigo_usuario = $registros_usuario['id'];



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

						<?php
						$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and ler='1' ");
						$numero_grupo = mysqli_num_rows($verificar_grupo);
						if ($numero_grupo >= 1) {    ?>
							<input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Registro">
						<?php } ?>

						<?php
						$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='41' and codigo_grupo='$cod_grupo' and ler='1' ");
						$numero_grupo = mysqli_num_rows($verificar_grupo);
						if ($numero_grupo >= 1) {    ?>
							<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn2" onClick="Abas(2)" value="Plano de ação">
						<?php } ?>

						<?php
						$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='42' and codigo_grupo='$cod_grupo' and ler='1' ");
						$numero_grupo = mysqli_num_rows($verificar_grupo);
						if ($numero_grupo >= 1) {    ?>
							<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn3" onClick="Abas(3)" value="Monitoramento">
						<?php } ?>
						<?php
						$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='43' and codigo_grupo='$cod_grupo' and ler='1' ");
						$numero_grupo = mysqli_num_rows($verificar_grupo);
						if ($numero_grupo >= 1) {    ?>

							<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn4" onClick="Abas(4)" value="Análise Crítica">
						<?php } ?>


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
									<?php
									mysqli_query($conexao, "SET NAMES 'utf8'");
									mysqli_query($conexao, 'SET character_set_connection=utf8');
									mysqli_query($conexao, 'SET character_set_client=utf8');
									mysqli_query($conexao, 'SET character_set_results=utf8');
									$selecao_rnc = mysqli_query($conexao, "select * from rnc where id='$id'");
									while ($registros_rnc = mysqli_fetch_array($selecao_rnc)) {
										$id = $registros_rnc['id'];
										$codigo = $registros_rnc['id'];

									?>
										<label>Id</label>

										<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['id'] ?>" readonly>

								</div>

								<div class="col-md-3">
									<label>Data de Identificação
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarDataIdentificacao(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarDataIdentificacao"></i>

										<?php } ?>
									</label>
									<input type="date" class="form-control mb-3" value="<?php echo $registros_rnc['data'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Planta
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarPlanta(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarPlanta"></i>
										<?php } ?>

									</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['planta_reg_nao_conformidade'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Parceiros
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarParceiros(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarParceiros"></i>
										<?php } ?>
									</label>

									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['parceiro'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Origem
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarOrigem(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarOrigem"></i>
										<?php } ?>
									</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['origem'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Processo
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarProcesso(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarProcesso"></i>
										<?php } ?>
									</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['processo'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Risco
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarRisco(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarRisco"></i>
										<?php } ?>
									</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['risco'] ?>" readonly>
								</div>

								<div class="col-md-4">
									<label>Área da não conformidade
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarAreaRnc(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarAreaNConforme"></i>
										<?php } ?>

									</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['area_reg_nao_conformidade'] ?>" readonly>
								</div>
								<div class="col-md-4">
									<label>Área do responsável pelo registro
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarAreaResponsavel(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarAreaResponsavel"></i>
										<?php } ?>
									</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['area_responsavel'] ?>" readonly>
								</div>

								<div class="col-md-3">
									<label>Responsável pelo registro
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarResponsavel(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarResponsavel"></i>
										<?php } ?>
									</label>
									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['responsavel_rnc'] ?>" readonly>
								</div>

								<div class="col-md-3">
									<label>Ata Comitê
										<?php
										$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
										$numero_grupo = mysqli_num_rows($verificar_grupo);
										if ($numero_grupo >= 1) {
										?>
											<i class="fa fa-edit" style="cursor: pointer" onClick="EditarAta(<?php echo $registros_rnc['id'] ?>)" data-toggle="modal" data-target="#ModalEditarAta"></i>
										<?php } ?>
									</label>

									<input type="text" class="form-control mb-3" value="<?php echo $registros_rnc['ata'] ?>" readonly>
								</div>

							<?php } ?>
							</div>


							<div class="col-md-12 causaEfeito px-0">



								<div class="col-md-6 mb-3 d-flex flex-column ml-0 mr-2 pl-0 pr-0">
									<h4>Descrição da Não Conformidade</h4>
									<?php
									$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
									$numero_grupo = mysqli_num_rows($verificar_grupo);
									if ($numero_grupo >= 1) {
									?>
										<input type="button" class="btn btn-primary float-left mb-3 pointer" style="width:40%;" value="Adicionar Não Conformidade" onClick="ModalAdicionarNaoConformidade()" data-dismiss="modal">
									<?php } ?>



									<div id="carregar-abrangencia" style="max-width:100%">
										<table class="table table-striped mt-2">
											<tr>
												<th class="col-md-1">Id</th>
												<th>Descrição</th>
												<th>Responsável</th>
												<th>Área</th>
												<?php
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<th class="col-md-1">Editar</th>
												<?php }
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and excluir='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<th class="col-md-1">Excluir</th>
												<?php } ?>
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
													<?php
													$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
													$numero_grupo = mysqli_num_rows($verificar_grupo);
													if ($numero_grupo >= 1) {
													?>
														<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarNConforme(<?php echo $registros_tabela['id'] ?>)" data-toggle="modal" data-target="#editarNConforme">
																<span class="fa fa-edit"></span></a></td>
													<?php }

													$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and excluir='1' ");
													$numero_grupo = mysqli_num_rows($verificar_grupo);
													if ($numero_grupo >= 1) {
													?>
														<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirNConforme(<?php echo $registros_tabela['id'] ?>)">
																<span class="fa fa-trash"></span></a></td>
													<?php } ?>
												</tr>

											<?php } ?>

										</table>
									</div>
								</div>



								<div class="col-md-6 mb-3 d-flex flex-column ml-0 mr-2 pl-0 pr-0">
									<h4>Descrição da Abrangência</h4>
									<?php
									$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
									$numero_grupo = mysqli_num_rows($verificar_grupo);
									if ($numero_grupo >= 1) {
									?>
										<input type="button" class="btn btn-primary float-left mb-3 w-25 pointer" style="width:200px" value="Adicionar Abrangência" onClick="ModalAdicionarAbrangencia()" data-dismiss="modal">
									<?php } ?>



									<div id="carregar-abrangencia" style="max-width:100%">
										<table class="table table-striped mt-2">
											<tr>
												<th class="col-md-1">Id</th>
												<th>Descrição</th>
												<th>Responsável</th>
												<th>Área</th>
												<?php
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<th class="col-md-1">Editar</th>
												<?php }
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and excluir='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<th class="col-md-1">Excluir</th>
												<?php } ?>
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
													<?php
													$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
													$numero_grupo = mysqli_num_rows($verificar_grupo);
													if ($numero_grupo >= 1) {
													?>
														<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarAbrangencia(<?php echo $registros_tabela['id'] ?>)" data-toggle="modal" data-target="#editarAbrangencia">
																<span class="fa fa-edit"></span></a></td>
													<?php }

													$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and excluir='1' ");
													$numero_grupo = mysqli_num_rows($verificar_grupo);
													if ($numero_grupo >= 1) {
													?>
														<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirAbrangencia(<?php echo $registros_tabela['id'] ?>)">
																<span class="fa fa-trash"></span></a></td>
													<?php } ?>
												</tr>

											<?php } ?>

										</table>
									</div>
								</div>
							</div>









							<div class="col-md-12 mb-3 d-flex flex-column">
								<h4>Ação Imediata (quando houver)</h4>
								<?php
								$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
								$numero_grupo = mysqli_num_rows($verificar_grupo);
								if ($numero_grupo >= 1) {
								?>
									<input type="button" class="btn btn-primary float-left mb-3 pointer" style="width:10%" value="Adicionar Ação" onClick="ModalAcaoImediata()" data-dismiss="modal">
								<?php } ?>

								<div id="carregar-acao" style="max-width:100%">
									<table class="table table-striped mt-2">
										<tr>
											<th class="col-md-1">Id</th>
											<th>Descrição</th>
											<th>Responsável</th>
											<th>Área</th>
											<th>Data</th>
											<?php
											$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
											$numero_grupo = mysqli_num_rows($verificar_grupo);
											if ($numero_grupo >= 1) {
											?>
												<th class="col-md-1">Editar</th>
											<?php }

											$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and excluir='1' ");
											$numero_grupo = mysqli_num_rows($verificar_grupo);
											if ($numero_grupo >= 1) {
											?>
												<th class="col-md-1">Excluir</th>
											<?php } ?>
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

												<?php
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and editar='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarAcao(<?php echo $registros_tabela_acao['id'] ?>)" data-toggle="modal" data-target="#editarAcao">
															<span class="fa fa-edit"></span></a></td>
												<?php }


												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='40' and codigo_grupo='$cod_grupo' and excluir='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirAcao(<?php echo $registros_tabela_acao['id'] ?>)">
															<span class="fa fa-trash"></span></a></td>
												<?php } ?>
											</tr>

										<?php } ?>

									</table>
								</div>
							</div>


							<!-- ---------------------------------------MODAIS------------------------------------------------------------ -->

							<!-- Modal editar data de identificação-->
							<div class="modal fade" id="ModalEditarDataIdentificacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Data de Identificação
											</h5>



											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div id="resposta-editar-data-rnc"></div>


										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>


							<!-- Modal editar planta-->
							<div class="modal fade" id="ModalEditarPlanta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Planta
											</h5>


											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div id="resposta-editar-planta"></div>

										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="ModalEditarParceiros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Parceiros
											</h5>



											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div id="resposta-editar-parceiros-rnc"></div>

										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>


							<div class="modal fade" id="ModalEditarOrigem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Origem
											</h5>



											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

											<div id="resposta-editar-origem-rnc"></div>

										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="ModalEditarProcesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Processo
											</h5>



											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div id="resposta-editar-processo-rnc"></div>

										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="ModalEditarRisco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Risco
											</h5>



											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div id="resposta-editar-risco-rnc"></div>

										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>


							<div class="modal fade" id="ModalEditarAreaNConforme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Área da Não Conformidade
											</h5>



											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

											<div id="resposta-editar-area-rnc"></div>

										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>


							<div class="modal fade" id="ModalEditarAreaResponsavel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Área do Responsável pelo registro
											</h5>


											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

											<div id="resposta-editar-area-responsavel-rnc"></div>

										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>


							<div class="modal fade" id="ModalEditarResponsavel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Responsável pelo registro
											</h5>

											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

											<div id="resposta-responsavel-rnc"></div>

										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>



							<div class="modal fade" id="ModalEditarAta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Ata Comitê
											</h5>


											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

											<div id="resposta-ata-rnc" name="resposta-ata-rnc"></div>

										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>







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

											</form>
										</div>
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


							<div class="modal fade" id="editarNConforme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Não conformidade
											</h5>

											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

											<div id="resposta-editar-nconforme"></div>


										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>


							<div class="modal fade" id="editarAbrangencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Abrangência
											</h5>



											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

											<div id="resposta-editar-abrangencia"></div>


										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>


							<div class="modal fade" id="editarAcao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="TituloEditarControle">
												Editar Ação
											</h5>



											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

											<div id="resposta-editar-acao"></div>


										</div>
										<div class="modal-footer">

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

								<?php
								$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='41' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
								$numero_grupo = mysqli_num_rows($verificar_grupo);
								if ($numero_grupo >= 1) {
								?>
									<div class="col-md-12">
										<label>&nbsp;</label>
										<input type="button" class="btn btn-primary" value="Adicionar Plano de Ação" onClick="GravarPlanoAcaoTemp()">
									</div>
								<?php } ?>
							</div>

							<div class="col-md-12 mb-4">

								<div>
									<table class="table table-striped mt-5">
										<tr>

											<th class="col-md-2">Descrição</th>
											<th class="col-md-2">Responsável</th>
											<th class="col-md-2">Área</th>
											<th class="col-md-1">Início</th>
											<th class="col-md-1">Término</th>
											<th class="col-md-1">Prioridade</th>
											<th class="col-md-1">Status</th>
											<?php
											$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='41' and codigo_grupo='$cod_grupo' and editar='1' ");
											$numero_grupo = mysqli_num_rows($verificar_grupo);
											if ($numero_grupo >= 1) {
											?>
												<th class="col-md-1">Editar</th>
											<?php }


											$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='41' and codigo_grupo='$cod_grupo' and excluir='1' ");
											$numero_grupo = mysqli_num_rows($verificar_grupo);
											if ($numero_grupo >= 1) {
											?>
												<th class="col-md-1">Excluir</th>

											<?php } ?>
										</tr>


										<tr>
											<?php
											$selecao_tabela = mysqli_query($conexao, "select * from tabela_plano_de_acao_temp WHERE codigo_rnc='$id'");
											while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
											?>
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

												<?php
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='41' and codigo_grupo='$cod_grupo' and editar='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarPlanoTemp(<?php echo $registros_tabela['id'] ?>)" data-toggle="modal" data-target="#editarPlanoAcao">
															<span class="fa fa-edit"></span></a></td>
												<?php }

												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='41' and codigo_grupo='$cod_grupo' and excluir='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<td class="col-md-1"><i class="fa fa-trash pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela['id'] ?>)"></i></td>
												<?php } ?>

										</tr>

									<?php } ?>

									</table>



									<div class="modal fade" id="editarPlanoAcao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="TituloEditarControle">
														Editar Plano de Ação
													</h5>



													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

													<div id="resposta-editar-plano-acao"></div>


												</div>
												<div class="modal-footer">

												</div>
											</div>
										</div>
									</div>




								</div>
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

								<table class="table table-striped" id="carrega-anexos-rnc" name="carrega-anexos-rnc">

									<?php

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
								<!-- <div id="carrega-anexos-rnc">aparece</div> -->


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

							<?php
							$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='42' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
							$numero_grupo = mysqli_num_rows($verificar_grupo);
							if ($numero_grupo >= 1) {
							?>

								<div class="col-md-12">
									<input type="button" value="Adicionar Monitoramento" onClick="GravarMonitoramento()" class="btn btn-primary mt-3">
								</div>
							<?php } ?>

							<div class="col-md-12 mb-4">
								<div>
									<table class="table table-striped mt-5">
										<tr>

											<th class="col-md-2">Descrição do monitoramento</th>
											<th class="col-md-2">Plano de ação</th>
											<th class="col-md-2">Área</th>
											<th class="col-md-2">Responsável Monitoramento</th>
											<th class="col-md-1">Data</th>
											<th class="col-md-1">Status</th>
											<th class="col-md-1">Editar</th>
											<th class="col-md-1">Excluir</th>
										</tr>

										<?php
										$selecao_tabela = mysqli_query($conexao, "select * from monitoramento_rnc where codigo_rnc='$codigo_rnc'");
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

												<?php
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='42' and codigo_grupo='$cod_grupo' and editar='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<td class="col-md-1"><i class="fa fa-edit pointer" onClick="EditarMonitoramento(<?php echo $registros_tabela['id'] ?>)" data-toggle="modal" data-target="#editarMonitoramento"></i></td>
												<?php }

												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='42' and codigo_grupo='$cod_grupo' and editar='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<td class="col-md-1"><i class="fa fa-trash pointer" onClick="ExcluirMonitoramento(<?php echo $registros_tabela['id'] ?>)"></i></td>
												<?php } ?>
											</tr>

										<?php } ?>

									</table>


									<div class="modal fade" id="editarMonitoramento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="TituloEditarControle">
														Editar Monitoramento
													</h5>



													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

													<div id="resposta-monitoramento-rnc"></div>


												</div>
												<div class="modal-footer">

												</div>
											</div>
										</div>
									</div>



								</div>
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

								<table class="table table-striped" id="carrega-anexos-analise" name="carrega-anexos-analise">
									<?php

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

							<?php
							$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='43' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
							$numero_grupo = mysqli_num_rows($verificar_grupo);
							if ($numero_grupo >= 1) {
							?>

								<div class="col-md-12">
									<input type="button" value="Adicionar Análise" onClick="GravarAnalise()" class="btn btn-primary mt-3">
								</div>

							<?php } ?>
							<div class="col-md-12 mb-4">
								<div>
									<table class="table table-striped mt-5">
										<tr>

											<th class="col-md-2">Descrição da Análise Crítica</th>
											<th class="col-md-2">Área</th>
											<th class="col-md-2">Responsável pela análise</th>
											<th class="col-md-1">Data</th>
											<th class="col-md-1">Parecer</th>
											<th class="col-md-1">Objetivo atendido?</th>
											<th class="col-md-1">Indicação de necessidade de revisão</th>
											<?php
											$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='43' and codigo_grupo='$cod_grupo' and editar='1' ");
											$numero_grupo = mysqli_num_rows($verificar_grupo);
											if ($numero_grupo >= 1) {
											?>
												<th class="col-md-1">Editar</th>
											<?php }

											$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='43' and codigo_grupo='$cod_grupo' and excluir='1' ");
											$numero_grupo = mysqli_num_rows($verificar_grupo);
											if ($numero_grupo >= 1) {
											?>
												<th class="col-md-1">Excluir</th>
											<?php } ?>
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

												<?php
												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='43' and codigo_grupo='$cod_grupo' and editar='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<td class="col-md-1"><i class="fa fa-edit pointer" onClick="EditarAnalise(<?php echo $registros_tabela_analise['id'] ?>)" data-toggle="modal" data-target="#editarAnalise"></i></td>
												<?php }

												$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='43' and codigo_grupo='$cod_grupo' and excluir='1' ");
												$numero_grupo = mysqli_num_rows($verificar_grupo);
												if ($numero_grupo >= 1) {
												?>
													<td class="col-md-1"><i class="fa fa-trash pointer" onClick="ExcluirAnalise(<?php echo $registros_tabela_analise['id'] ?>)"></i></td>
											</tr>

									<?php }
											} ?>

									</table>


									<div class="modal fade" id="editarAnalise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="TituloEditarControle">
														Editar Análise
													</h5>



													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

													<div id="resposta-editar-analise"></div>


												</div>
												<div class="modal-footer">

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

	function CarregarTabelaPlanoAcao(id) {

		var codigo = $g('#codigo_rnc').val()

		$f.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&id=<?php echo $id ?>',
			url: 'carregar-tabela-plano-de-acao-temp.php',
			success: function(retorno) {
				$f('#carregar-tabela-plano-de-acao').html(retorno)

			}
		})
	}

	function CarregarTabelaMonitoramento(id) {

		var codigo = $g('#codigo_rnc').val()

		$f.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&id=<?php echo $id ?>',
			url: 'carregar-tabela-monitoramento-rnc.php',
			success: function(retorno) {
				$f('#carregar-tabela-monitoramento').html(retorno)

			}
		})
	}

	function CarregarTabelaAnalise(id) {

		var codigo = $g('#codigo_rnc').val()

		$f.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&id=<?php echo $id ?>',
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
				// location.href = 'rnc.php?cod=<?php echo $id ?>&aba=plano'
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

				CarregarTabelaAnalise()
				// $f('#carregar-tabela-analise').html(retorno)
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


	function ExcluirMonitoramento(codigo) {

		if (window.confirm("Você deseja excluir o Monitoramento?")) {

			$f.ajax({
				type: 'post',
				data: 'codigo=' + codigo,
				url: 'funcoes/excluir-monitoramento-rnc.php',
				success: function(retorno) {
					CarregarTabelaMonitoramento()

				}
			})
		}
	}

	function ExcluirAnalise(codigo) {

		if (window.confirm("Você deseja excluir esta Análise?")) {

			$f.ajax({
				type: 'post',
				data: 'codigo=' + codigo,
				url: 'funcoes/excluir-analise-rnc.php',
				success: function(retorno) {
					CarregarTabelaAnalise()

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
		if (abas === 'plano') {
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


	var btn = document.querySelector("#refresh");
	btn.addEventListener("click", function() {

		location.href = 'rnc.php?cod=<?php echo $id ?>&aba=plano'
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



	function ExcluirNConforme(codigo) {

		if (window.confirm("Tem certeza que deseja excluir?")) {
			$g.ajax({
				type: 'post',
				data: 'codigo=' + codigo,
				url: 'funcoes/excluir-ncorfomidade.php',
				success: function(retorno) {
					location.reload()
				}
			})
		}
	}


	function ExcluirAbrangencia(codigo) {

		if (window.confirm("Tem certeza que deseja excluir?")) {
			$g.ajax({
				type: 'post',
				data: 'codigo=' + codigo,
				url: 'funcoes/excluir-abrangencia.php',
				success: function(retorno) {
					location.reload()
				}
			})
		}
	}

	function ExcluirAcao(codigo) {

		if (window.confirm("Tem certeza que deseja excluir?")) {
			$g.ajax({
				type: 'post',
				data: 'codigo=' + codigo,
				url: 'funcoes/excluir-acao.php',
				success: function(retorno) {
					location.reload()
				}
			})
		}
	}


	function EditarNConforme(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-nconforme.php',
			success: function(retorno) {
				$g('#resposta-editar-nconforme').html(retorno)
			}
		})
	}



	function AtualizarNConforme(codigo) {

		var nconforme = $g('#editar_nconforme').val()
		var area_nconforme = $g('#editar_area_nconforme').val()
		var responsavel_nconforme = $g('#editar-responsavel-nconforme').val()


		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&nconforme=' + nconforme + '&area_nconforme=' + area_nconforme + '&responsavel_nconforme=' + responsavel_nconforme,
			url: 'funcoes/atualizar-nconforme.php',
			success: function(retorno) {
				// CarregarTabelaControlesExistentes()
				location.reload()
			}
		})

	}


	function EditarAbrangencia(codigo) {
		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-abrangencia.php',
			success: function(retorno) {
				$g('#resposta-editar-abrangencia').html(retorno)
			}
		})
	}

	function AtualizarAbrangencia(codigo) {

		var abrangencia = $g('#editar_abrangencia').val()
		var area_abrangencia = $g('#editar_area_abrangencia').val()
		var responsavel_abrangencia = $g('#editar-responsavel-abrangencia').val()


		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&abrangencia=' + abrangencia + '&area_abrangencia=' + area_abrangencia + '&responsavel_abrangencia=' + responsavel_abrangencia,
			url: 'funcoes/atualizar-abrangencia.php',
			success: function(retorno) {
				location.reload()
			}
		})


	}


	function EditarAcao(codigo) {
		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-acao.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-acao').html(retorno)
			}
		})
	}



	function AtualizarAcao(codigo) {

		var acao = $g('#editar_acao').val()
		var area_acao = $g('#editar_area_acao').val()
		var responsavel_acao = $g('#editar-responsavel-acao').val()
		var data_acao = $g('#editar-data-acao').val()


		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&acao=' + acao + '&area_acao=' + area_acao + '&responsavel_acao=' + responsavel_acao + '&data_acao=' + data_acao,
			url: 'funcoes/atualizar-acao.php',
			success: function(retorno) {
				location.reload()
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


	function CarregarAnexos(codigo) {

		var codigo = $g('#codigo_rnc').val()


		$f.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&id=<?php echo $id ?>',
			url: 'carrega-anexos-rnc.php',
			success: function(retorno) {

				$f('#carrega-anexos-rnc').html(retorno);
			}
		})
	}

	function CarregaAnexosAnalise() {

		$var('#carrega-anexos-analise').load('carrega-anexos-analise.php')
		$var("#analise").val('');
		$var("#nome-arquivo").val('');
	}


	function CarregarAnexosAnalise(codigo) {

		var codigo = $g('#codigo_rnc').val()


		$f.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&id=<?php echo $id ?>',
			url: 'carrega-anexos-analise.php',
			success: function(retorno) {

				$f('#carrega-anexos-analise').html(retorno);
			}
		})
	}







	$g = jQuery.noConflict()


	$g(document).on('change', '#photo', function() {

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
				CarregarAnexos(codigo)
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
				CarregarAnexosAnalise(codigo)
			}
		});
	})
</script>



<script>
	function EditarPlanoTemp(codigo) {
		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-plano-acao.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-plano-acao').html(retorno)
			}
		})
	}



	function AtualizarPlanoAcao(codigo) {

		var plano_acao = $g('#editar-desc-plano-acao').val()
		var inicio = $g('#editar-inicio-plano-acao').val()
		var termino = $g('#editar-termino-plano-acao').val()
		var status_plano_acao = $g('#editar-status-plano-acao').val()
		var prioridade_plano_acao = $g('#editar-prioridade-plano-acao').val()
		var area_plano_acao = $g('#editar-area-plano-acao').val()
		var responsavel_plano_acao = $g('#editar-responsavel-plano-acao').val()



		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&plano_acao=' + plano_acao + '&inicio=' + inicio + '&termino=' + termino + '&status_plano_acao=' + status_plano_acao + '&prioridade_plano_acao=' + prioridade_plano_acao + '&area_plano_acao=' + area_plano_acao + '&responsavel_plano_acao=' + responsavel_plano_acao,
			url: 'funcoes/atualizar-plano-acao.php',
			success: function(retorno) {
				// CarregarTabelaControlesExistentes()
				location.reload()
			}
		})


	}
</script>



<script>
	function EditarMonitoramento(codigo) {
		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-monitoramento-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-monitoramento-rnc').html(retorno)
			}
		})
	}



	function AtualizarMonitoramento(codigo) {

		var monitoramento = $g('#editar-desc-monitoramento').val()
		var plano_acao = $g('#editar-plano-acao').val()
		var area_monitoramento = $g('#editar-area-monitoramento').val()
		var responsavel_monitoramento = $g('#editar-responsavel-monitoramento').val()
		var data = $g('#editar-data-monitoramento').val()
		var status_monitoramento = $g('#editar-status-monitoramento').val()



		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&monitoramento=' + monitoramento + '&plano_acao=' + plano_acao + '&area_monitoramento=' + area_monitoramento + '&responsavel_monitoramento=' + responsavel_monitoramento + '&data=' + data + '&status_monitoramento=' + status_monitoramento,
			url: 'funcoes/atualizar-monitoramento-rnc.php',
			success: function(retorno) {
				// CarregarTabelaControlesExistentes()
				location.reload()
			}
		})


	}
</script>



<script>
	function EditarAnalise(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-analise-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-analise').html(retorno)
			}
		})
	}



	function AtualizarAnaliseRnc(codigo) {

		var analise = $g('#editar-desc-analise').val()
		var data = $g('#editar-data-analise').val()
		var area_analise = $g('#editar-area-analise').val()
		var responsavel_analise = $g('#editar-responsavel-analise').val()
		var parecer = $g('#editar-parecer-analise').val()
		var objetivo = $g('#editar-objetivo-analise').val()
		var necessidade = $g('#editar-necessidade-analise').val()



		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&analise=' + analise + '&data=' + data + '&area_analise=' + area_analise + '&responsavel_analise=' + responsavel_analise + '&parecer=' + parecer + '&objetivo=' + objetivo + '&necessidade=' + necessidade,
			url: 'funcoes/atualizar-analise-rnc.php',
			success: function(retorno) {
				location.href = 'rnc.php?cod=<?php echo $codigo ?>&aba=analise'

				// $g('#resposta-editar-analise').html(retorno)
			}
		})
	}
</script>



<script>
	function EditarDataIdentificacao(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-data-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-data-rnc').html(retorno)
			}
		})
	}


	function AtualizarDataIdentificacao(codigo) {

		var data_identificacao = $g('#edit-data-identificacao').val()


		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&data_identificacao=' + data_identificacao,
			url: 'funcoes/atualizar-data-identificacao-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})

	}


	function EditarPlanta(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-planta-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-planta').html(retorno)
			}
		})
	}





	function AtualizarPlanta(codigo) {

		var planta = $g('#edit-planta-rnc').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&planta=' + planta,
			url: 'funcoes/atualizar-planta-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}


	function EditarParceiros(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-parceiros-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-parceiros-rnc').html(retorno)
			}
		})
	}



	function AtualizarParceiro(codigo) {

		var parceiro = $g('#edit-parceiros-rnc').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&parceiro=' + parceiro,
			url: 'funcoes/atualizar-parceiros-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}



	function EditarOrigem(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-origem-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-origem-rnc').html(retorno)
			}
		})
	}





	function AtualizarOrigem(codigo) {

		var origem = $g('#edit-origem-rnc').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&origem=' + origem,
			url: 'funcoes/atualizar-origem-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}



	function EditarProcesso(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-processo-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-processo-rnc').html(retorno)
			}
		})
	}





	function AtualizarProcesso(codigo) {

		var processo = $g('#edit-processo-rnc').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&processo=' + processo,
			url: 'funcoes/atualizar-processo-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}


	function EditarRisco(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-risco-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-risco-rnc').html(retorno)
			}
		})
	}





	function AtualizarRisco(codigo) {

		var risco = $g('#edit-risco-rnc').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&risco=' + risco,
			url: 'funcoes/atualizar-risco-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}


	function EditarAreaNConformidade(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-area-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-area-rnc').html(retorno)
			}
		})
	}





	function AtualizarAreaNConforme(codigo) {

		var area_rnc = $g('#edit-area-rnc').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&area_rnc=' + area_rnc,
			url: 'funcoes/atualizar-area-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}


	function EditarAreaRnc(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-area-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-area-rnc').html(retorno)
			}
		})
	}





	function AtualizarAreaRnc(codigo) {

		var area_rnc = $g('#edit-area-rnc').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&area_rnc=' + area_rnc,
			url: 'funcoes/atualizar-area-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}


	function EditarAreaResponsavel(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-area-responsavel-rnc.php',
			success: function(retorno) {
				// location.reload()
				$g('#resposta-editar-area-responsavel-rnc').html(retorno)
			}
		})
	}



	function AtualizarAreaResponsavel(codigo) {

		var area_responsavel_rnc = $g('#edit-area-responsavel').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&area_responsavel_rnc=' + area_responsavel_rnc,
			url: 'funcoes/atualizar-area-responsavel-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}



	function EditarResponsavel(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-responsavel-rnc.php',
			success: function(retorno) {
				$g('#resposta-responsavel-rnc').html(retorno)
			}
		})
	}





	function AtualizarResponsavel(codigo) {

		var responsavel_rnc = $g('#edit-responsavel-rnc').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&responsavel_rnc=' + responsavel_rnc,
			url: 'funcoes/atualizar-responsavel-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}




	function EditarAta(codigo) {

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo,
			url: 'funcoes/carregar-editar-ata-rnc.php',
			success: function(retorno) {
				$g('#resposta-ata-rnc').html(retorno)
			}
		})
	}


	function AtualizarAtaComite(codigo) {

		var ata_rnc = $g('#edit-ata-rnc').val()

		$g.ajax({
			type: 'post',
			data: 'codigo=' + codigo + '&ata_rnc=' + ata_rnc,
			url: 'funcoes/atualizar-ata-rnc.php',
			success: function(retorno) {
				location.reload()
			}
		})
	}
</script>