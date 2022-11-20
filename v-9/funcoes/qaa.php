<?php
session_start();
$nav_menu_principal = 'riskassesment';
$nav_menu_pagina = 'qaa';
@$mod = $_REQUEST['mod'];
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
	<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
</head>

<style>
	.icone-geral {
		display: none;
		color: green;
		float: left;
	}

	.desativar {
		display: none;
	}

	a.list-group-item {
		color: black;
	}

	a.list-group-item.active,
	a.list-group-item.active:hover,
	a.list-group-item.active:focus {
		color: white;
		background-color: #3A81BE;
		border: solid 1px #E5E5E5;
	}


	a.list-group-item {
		background-color: white;
	}

	.list-group-level1 .list-group-item {
		padding-left: 30px;
	}

	.list-group-level2 .list-group-item {
		padding-left: 60px;
	}

	.list-group-level3 .list-group-item {
		padding-left: 90px;
	}

	.active {
		background-color: #3A81BE;
		color: white;
		text-decoration: none;
	}

	.active a {

		color: white;
		text-decoration: none;
	}


	.tipo-topico {
		display: none
	}

	.tipo-questao {
		display: none
	}

	.tipo-geral {
		display: none
	}
</style>

<body class=" fixed-nav sticky-footer" id="page-top" style="overflow-x: scroll">
	<!-- Navegação !-->
	<?php
	include('menu.php');
	@$codigo_qaa = $_REQUEST['cod'];
	?>
	<!-- Navegação !-->
	<input type="hidden" id="codigo-qaa" value="<?php echo $codigo_qaa ?>">
	<form action="processa-gravar-qaa.php" method="post">
		<div class="content-wrapper" style="overflow: hidden">
			<div class="container-fluid">
				<div class="row mb-5" style="margin-top: -16px; ">
					<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

						<div class="row">
							<div class="col-md-9">
								<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | QAA</span>
							</div>
						</div>


					</div>
				</div>
				<div class="row ml-1 mr-1">
					<div class="col-md-12">
						<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>

						<?php

						mysqli_query($conexao, "SET NAMES 'utf8'");
						mysqli_query($conexao, 'SET character_set_connection=utf8');
						mysqli_query($conexao, 'SET character_set_client=utf8');
						mysqli_query($conexao, 'SET character_set_results=utf8');
						$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
						$numero_grupo = mysqli_num_rows($verificar_grupo);
						if ($numero_grupo >= 1) {
						?>

							<a data-toggle="modal" data-target="#NovoBloco" style="cursor: pointer"> <img src="imgs/icone-mais.png" width="25" height="25" alt="" /> Novo Bloco</a>
						<?php } ?>


						<h3 class="mt-4">QAA - Questionário de Auto Avaliação </h3>

						<?php
						$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
						$numero_grupo = mysqli_num_rows($verificar_grupo);
						if ($numero_grupo >= 1) {
						?>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter" onClick="CarregaUsers2(<?php echo $codigo_qaa ?>)">
								Responsáveis Módulo QAA
							</button>
						<?php } ?>



						<?php
						$selecao_qaas = mysqli_query($conexao, "select * from status_qaas WHERE codigo_qaa='$codigo_qaa' order by id desc");
						$numero_qaas = mysqli_num_rows($selecao_qaas);
						$versao = 0;
						$registros_qaas = mysqli_fetch_array($selecao_qaas);
						?>

						<?php
						if ($numero_qaas >= 1) {
						?>
							<p style="font-size:15px" class="text-success"> <i class="fa fa-check"></i> Versão: <?php echo $numero_qaas ?> (<?php echo $registros_qaas['data'] ?> - <?php echo $registros_qaas['hora'] ?> - <?php echo $registros_qaas['usuario'] ?>)</p>

						<?php } else { ?>
							<p style="font-size:15px">Sem versão gravada</p>

						<?php } ?>


					</div>




					<div class="col-md-12">
						<?php

						$selecao1 = mysqli_query($conexao, "select * from cadastro WHERE id='$codigo_qaa'");
						$registros1 = mysqli_fetch_array($selecao1);
						$cnpj = $registros1['cnpj'];
						$certificado = $registros1['numero_certificacao'];
						$codigo_modalidade = '0';
						if ($mod != '') {
							$codigo_modalidade = $mod;
						};

						$selecao_empresa = mysqli_query($conexao, "select * from empresas WHERE cnpj='$cnpj'");
						$registros_empresa = mysqli_fetch_array($selecao_empresa);
						?>

						<h4><?php echo $registros_empresa['razao_social'] ?> - <?php echo $cnpj = $registros1['cnpj'] ?></h4>

						<p><?php

							if ($mod != '') {

								$selecao11 = mysqli_query($conexao, "select * from cadastro WHERE cnpj='$cnpj' and codigo_modalidade='$mod'");
							} else {
								$selecao11 = mysqli_query($conexao, "select * from cadastro WHERE cnpj='$cnpj' ");
							}

							while ($registros11 = mysqli_fetch_array($selecao11)) {
								$codigo_modalidade = $registros11['codigo_modalidade'];
								if ($mod != '') {
									$codigo_modalidade = $mod;
								};


							?>

								<?php echo $registros11['modalidade'] ?><br>


							<?php }  ?>

						</p>

					</div>





					<div class="col-md-5 mt-4">
						<div class="row">
							<div class="col-md-7 mb-3">
								<input type="button" value="Gravar QAA" class="btn btn-success mt-10" onClick="GravarQaa()">

							</div>
						</div>

						<div class="row">
							<div class="col-md-7">
								<strong>Questões QAA</strong>
							</div>


							<?php
							$selecao_versao = mysqli_query($conexao, "select * from questoes_qaa WHERE versao='$versao'"); {
							?>

								<div class="col-md-5">
									<a href="imprimir-relatorio.php?cod=<?php echo $codigo_qaa ?>&versao=<?php echo $versao ?>" target="_blank">
										<p style="font-size: 12px; text-align: end"> Impressão</p>
									</a>
								</div>
							<?php } ?>


						</div>




						<div id="main-menu" class="list-group">

							<?php
							mysqli_query($conexao, "SET NAMES 'utf8'");
							mysqli_query($conexao, 'SET character_set_connection=utf8');
							mysqli_query($conexao, 'SET character_set_client=utf8');
							mysqli_query($conexao, 'SET character_set_results=utf8');
							$a = 1;
							$b = 1;
							$c = 1;
							if ($codigo_modalidade == 0) {
								$selecao = mysqli_query($conexao, "select * from qaa_view order by bloco ASC  ");
								$var_a = 1;
							} else {
								$selecao = mysqli_query($conexao, "select * from qaa_view WHERE codigo_modalidade = '$codigo_modalidade' order by bloco ASC	");
							}



							while ($regis = mysqli_fetch_array($selecao)) {
								$codigo_bloco_modalidade = $regis['codigo_bloco'];
								$codigo_mod = $regis['codigo_modalidade'];


								$codigo_bloco = $regis['id'];
							?>

								<div class="list-group-item">
									<a class="text-dark" href="#sub-menu<?php echo $a ?>" data-toggle="collapse" data-parent="#main-menu">
										<strong><?php echo $regis['bloco'] ?></strong> <?php if (@$var_a == 1) {
																							$selecao2_modalidades = mysqli_query($conexao, "select * from blocos_modalidades WHERE codigo_modalidade='$codigo_mod'; ");
																							$registros2_modalidades = mysqli_fetch_array($selecao2_modalidades);
																							echo "- " . $registros2_modalidades['modalidade'];
																						} ?>

										<?php
										$pesquisar = mysqli_query($conexao, "select * from questoes_qaa WHERE codigo_bloco='$codigo_bloco' and versao='$versao'  ");
										$registros_pesquisa = mysqli_fetch_array($pesquisar);
										$numero = mysqli_num_rows($pesquisar);
										if ($numero > 0) {
										?>
											<i class="fa fa-angle-down"></i>
										<?php } ?>

									</a>

									<?php
									$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and excluir='1' ");
									$numero_grupo = mysqli_num_rows($verificar_grupo);
									if ($numero_grupo >= 1) {
									?>

										<span style="margin-left: 10px; cursor: pointer" class="float-right" data-toggle="modal" data-target="#EditarBloco"> <i class="fa fa-edit" onClick="EditarBloco(<?php echo $codigo_bloco ?>)"></i></span>

										<span style="margin-left: 10px; cursor: pointer" class="float-right" onClick="DelBloco(<?php echo $codigo_bloco ?>)"> <i class="fa fa-trash"></i></span>





									<?php } ?>


									<?php
									$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
									$numero_grupo = mysqli_num_rows($verificar_grupo);
									if ($numero_grupo >= 1) {
									?>
										<span class="float-right" data-toggle="modal" data-target="#NovaQuestao" onClick="AddQuestao(<?php echo $codigo_bloco ?>)">+</span>
									<?php } ?>
									<!-----------Final GROUP ITEM ---------------->
								</div>


								<div class="collapse list-group-level1" id="sub-menu<?php echo $a ?>">

									<?php
									$selecao1 = mysqli_query($conexao, "select * from questoes_qaa WHERE questao_principal='0' and codigo_bloco='$codigo_bloco' and versao='$versao' ");
									while ($registros1 = mysqli_fetch_array($selecao1)) {
										$codigo1 = $registros1['id'];
									?>

										<div class="list-group-item">
											<a class="text-dark" href="#sub-sub-menu<?php echo $a ?>_<?php echo $b ?>" data-toggle="collapse">
												<?php echo $registros1['titulo'] ?>

												<?php
												$selecao22 = mysqli_query($conexao, "select * from questoes_qaa WHERE questao_principal='$codigo1' and codigo_bloco='$codigo_bloco' and versao='$versao' ");
												$num22 = mysqli_num_rows($selecao22);
												if ($num22 >= 1) {
												?>
													<i class="fa fa-angle-down"></i>
												<?php } ?>
											</a>

											<?php
											$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and excluir='1' ");
											$numero_grupo = mysqli_num_rows($verificar_grupo);
											if ($numero_grupo >= 1) {
											?>


												<span style="margin-left: 10px; cursor: pointer" class="float-right" data-toggle="modal" data-target="#EditarCriterio"> <i class="fa fa-edit" onClick="EditarCriterio(<?php echo $registros1['id'] ?>)"></i></span>


												<span class="float-right pointer" onClick="DelQuestao(<?php echo $registros1['id'] ?>)"><i class="fa fa-trash"></i></span>



											<?php } ?>

										</div>


										<div class="collapse list-group-level2" id="sub-sub-menu<?php echo $a ?>_<?php echo $b ?>">


											<?php
											$selecao2 = mysqli_query($conexao, "select * from questoes_qaa WHERE questao_principal='$codigo1' and codigo_bloco='$codigo_bloco' and versao='$versao' ");
											while ($registros2 = mysqli_fetch_array($selecao2)) {
												$codigo_questao = $registros2['id'];
											?>

												<div class="list-group-item">
													<a class="text-dark" href="#sub-sub-sub-menu<?php echo $a ?>_<?php echo $b ?>_<?php echo $c ?>" data-toggle="collapse">
														<?php echo $registros2['titulo'] ?>
														<?php
														$selecao33 = mysqli_query($conexao, "select * from questoes_qaa WHERE questao_principal='$codigo_questao' and codigo_bloco='$codigo_bloco' and versao='$versao' ");
														$num33 = mysqli_num_rows($selecao33);
														if ($num33 >= 1) {
														?>
															<i class="fa fa-angle-down"></i>
														<?php } ?>
													</a>


													<?php
													$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and excluir='1' ");
													$numero_grupo = mysqli_num_rows($verificar_grupo);
													if ($numero_grupo >= 1) {
													?>

														<span style="margin-left: 10px; cursor: pointer" class="float-right" data-toggle="modal" data-target="#EditarSubCriterio"> <i class="fa fa-edit" onClick="EditarSubCriterio(<?php echo $registros2['id'] ?>)"></i></span>

														<span class="float-right" onClick="DelQuestao(<?php echo $registros2['id'] ?>)"><i class="fa fa-trash"></i></span>

													<?php } ?>


												</div>

												<div class="collapse list-group-level3" id="sub-sub-sub-menu<?php echo $a ?>_<?php echo $b ?>_<?php echo $c ?>">

													<?php
													$selecao3 = mysqli_query($conexao, "select * from questoes_qaa WHERE questao_principal='$codigo_questao' and codigo_bloco='$codigo_bloco' and versao='$versao' ");
													while ($registros3 = mysqli_fetch_array($selecao3)) {

														$codigo_id = $registros3['id'];

													?>

														<div class="list-group-item">

															<!----- Aqui colocar Tick ao salvar ---->


															<?php
															$selecao44 = mysqli_query($conexao, "select * from resposta_qaa where salvar='$salvar'");
															$registros44 = mysqli_fetch_array($selecao44);
															$codigo_questao = $registros3['id'];
															$selecao_ckeck = mysqli_query($conexao, "select * from resposta_qaa where codigo_questao='$codigo_questao'");
															$registros_ckeck = mysqli_fetch_array($selecao_ckeck);


															?>

															<?php $check = $registros_ckeck['check_id'];
															if ($check == '1') {
															?>
																<i class="fa fa-check icone-geral" style="display:inline"></i>

															<?php } ?>
															<i class="fa fa-check icone-geral" id="codigo2-<?php echo $registros3['id'] ?>"></i> &nbsp;


															<a class="text-dark pointer" onClick="ClicarQuestao(<?php echo $registros3['id'] ?>)"><?php echo $registros3['titulo'] ?><?php echo $registros3['resposta'] ?></a>

															<?php
															$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and excluir='1' ");
															$numero_grupo = mysqli_num_rows($verificar_grupo);
															if ($numero_grupo >= 1) {
															?>

																<span class="float-right" onClick="DelQuestao(<?php echo $registros3['id'] ?>)"><i class="fa fa-trash"></i></span>
															<?php } ?>


														</div>

													<?php } ?>

												</div>
												<!-----------Final LEVEL 3 ---------------->

											<?php $c = $c + 1;
											} ?>
										</div>
										<!-----------Final LEVEL 2 ---------------->

									<?php
										$b = $b + 1;
									}
									?>


								</div>



							<?php $a = $a + 1;
							} ?>






							<!-----------Final Main Menu ---------------->








							<div id="resposta-qaa"></div>



						</div>




					</div>

					<div class="col-md-7 mt-4" id="resposta-questoes">



					</div>

					<div class="col-md-12 mt-3">

						<h5 class="mt-4">Versões de QAAs</h5>
						<table class="table table-striped">
							<tr>
								<th>Empresa</th>
								<th>CNPJ</th>
								<th>Versão</th>
								<th>Data</th>
								<th>Hora</th>
								<th>Usuário</th>
								<th>Imprimir</th>
								<th>Excluir</th>
							</tr>
							<?php
							$selecao_versao = mysqli_query($conexao, "select * from status_qaas WHERE codigo_qaa='$codigo_qaa'");
							while ($registros_versao = mysqli_fetch_array($selecao_versao)) {
							?>
								<tr>
									<td><?php echo $registros_empresa['razao_social'] ?></td>
									<td><?php echo $registros_empresa['cnpj'] ?></td>
									<td><?php echo $registros_versao['versao'] ?></td>
									<td><?php echo $registros_versao['data'] ?></td>
									<td><?php echo $registros_versao['hora'] ?></td>
									<td><?php echo $registros_versao['usuario'] ?></td>
									<th><a href="imprimir-relatorio.php?cod=<?php echo $registros_versao['codigo_qaa'] ?>&versao=<?php echo $registros_versao['versao'] ?>" target="_blank">
											<p style="font-size: 20px; "> <i class="fa fa-print"></i></p>
										</a>

									<th><a onClick="DelVersao(<?php echo $registros_versao['versao'] ?>)"><i class="fa fa-trash"></i></a></th>
								</tr>

							<?php } ?>

						</table>

					</div>

					<input type="hidden" id="obter-codigo-bloco">


				</div>
			</div>

		</div>




		<!-- Modal Cadastro Bloco -->
		<div class="modal fade" id="NovoBloco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999; ">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Bloco</h5>
						<button type="button" class="close" id="fechar-bloco" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label>Nome do Bloco</label>
						<input type="text" class="form-control" id="cad-bloco">

						<label class="mt-3">Modalidade</label>
						<?php
						$selecao_modalidades = mysqli_query($conexao, "select * from modalidades");
						while ($registros_modalidades = mysqli_fetch_array($selecao_modalidades)) {
						?>





							<input type="checkbox" name="modalidade[]" id="cad-modalidade[]" value="<?php echo $registros_modalidades['id']; ?>"> <?php echo $registros_modalidades['modalidade']; ?><br>


						<?php } ?>

					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-primary" onClick="GravarBloco()">Gravar</button>
					</div>
				</div>
			</div>
		</div>



		<!-- Modal Cadastro Questão -->
		<div class="modal fade" id="NovaQuestao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999; ">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Tópico/Questão</h5>
						<button type="button" class="close" id="fechar-quests" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<label>Deseja Cadastrar novo Critério ou Questão?</label>
						<input type="radio" name="tipo-quest" id="tipo-quest" value="Tópico" onClick="Topico('Tópico')"> Critério/Subcritério
						<input type="radio" name="tipo-quest" id="tipo-quest" value="Questão" onClick="Topico('Questão')"> Questão

						<label class="mt-3 tipo-topico">Critério/Subcritério Mãe</label>
						<div id="carregar-select-qaa" class="tipo-topico"></div>

						<label class="mt-3 tipo-questao">Questão Mãe</label>
						<div id="carregar-select-qaa-questao" class="tipo-questao"></div>




						<label class="mt-3 tipo-topico">Título</label>
						<label class="mt-3 tipo-questao">Título</label>
						<input type="text" class="form-control  tipo-geral" id="cad-titulo-questao">




						<label class="mt-3 tipo-questao">Questão</label>
						<textarea id="cad-questao" class="form-control tipo-questao"></textarea>


						<label class="mt-3 tipo-questao">Pergunta(Com resposta Sim ou Não)</label>
						<input type="text" class="form-control tipo-questao" id="cad-pergunta-sim-nao" name="cad-pergunta-sim-nao">

					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-primary tipo-topico" onClick="GravarQuestao('criterio')">Gravar Critério/Subcritério</button>
						<button type="button" class="btn btn-primary tipo-questao" onClick="GravarQuestao('questao')">Gravar Questão</button>
					</div>
				</div>
			</div>
		</div>



		<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 999999999">
			<div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 999999999">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Responsáveis QAA</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="resposta-modal-qaa-inteiro"></div>

						<div id="carregar-listar-usuarios"></div>

					</div>
					<div class="modal-footer">
						<select class="form-control" id="novo-user">
							<option value="0">Novo usuário</option>
							<?php
							$selecao_usuarios = mysqli_query($conexao, "select * from usuarios_empresa");
							while ($registros_usuarios = mysqli_fetch_array($selecao_usuarios)) {
							?>

								<option value="<?php echo $registros_usuarios['id'] ?>"><?php echo $registros_usuarios['nome'] ?>|<?php echo $registros_usuarios['email'] ?></option>

							<?php } ?>

						</select>

						<input type="button" value="Adicionar" class="btn btn-primary" onclick="AdicionarResponsavel2(<?php echo $codigo_qaa ?>)">

					</div>
				</div>
			</div>
		</div>


		<!-- Modal Editar Bloco -->
		<div class="modal fade" id="EditarBloco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999; ">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar Bloco</h5>
						<button type="button" class="close" id="fechar-bloco" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label>Nome do Bloco</label>
						<input type="text" class="form-control" id="edit-bloco">




					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-primary" onClick="AtualizarBloco()">Atualizar Bloco</button>
					</div>
				</div>
			</div>
		</div>



		<!-- Modal Editar Bloco -->
		<div class="modal fade" id="EditarCriterio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999; ">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar Critério</h5>
						<button type="button" class="close" id="fechar-bloco" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label>Nome do Critério</label>
						<input type="text" class="form-control" id="edit-criterio">




					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-primary" onClick="AtualizarCriterio()">Atualizar Critério</button>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal Editar Bloco -->
		<div class="modal fade" id="EditarSubCriterio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999; ">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar Subcritério</h5>
						<button type="button" class="close" id="fechar-bloco" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label>Nome do Subcritério</label>
						<input type="text" class="form-control" id="edit-subcriterio">




					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-primary" onClick="AtualizarSubCriterio()">Atualizar Subcritério</button>
					</div>
				</div>
			</div>
		</div>


		<input type="hidden" id="codigo-qaa">
		<input type="hidden" id="codigo-bloco-qaa">
		<input type="hidden" id="codigo-criterio-qaa">
		<input type="hidden" id="codigo-subcriterio-qaa">


		<script src="bibliotecas/jquery/jquery.min.js"></script>
		<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
		<script src="js/sb-admin.min.js" type="text/javascript"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
		<script src="js/jquery.mask.min.js"></script>
		<script src="js/autosize.js"></script>

		<script>
			$var = jQuery.noConflict()

			$var(document).ready(function() {

				$var("#editor1").bind('paste', function(e) {
					e.preventDefault();
				});

			});








			function AddQuestao(codigo_bloco) {

				$var('#obter-codigo-bloco').val(codigo_bloco)



				$var.ajax({
					type: 'post',
					data: 'codigo_bloco=' + codigo_bloco,
					url: 'funcoes/select-qaa.php',
					success: function(retorno) {
						$var('#carregar-select-qaa').html(retorno)

					}
				})


				$var.ajax({
					type: 'post',
					data: 'codigo_bloco=' + codigo_bloco,
					url: 'funcoes/select-qaa-questao.php',
					success: function(retorno) {
						$var('#carregar-select-qaa-questao').html(retorno)

					}
				})



			}


			function DelBloco(codigo) {

				if (window.confirm("Você realmente excluir esse bloco?")) {

					$var.ajax({
						type: 'post',
						data: 'codigo=' + codigo,
						url: 'funcoes/excluir-blocos-qaa.php',
						success: function(retorno) {
							$var('#resposta-questoes').html(retorno);

							location.reload()

						}
					})
				}
			}



			function DelQuestao(codigo) {

				if (window.confirm("Você realmente excluir essa Questão?")) {




					$var.ajax({
						type: 'post',
						data: 'codigo=' + codigo,
						url: 'funcoes/excluir-questoes-qaa.php',
						success: function(retorno) {
							$var('#resposta-questoes').html(retorno);

							location.reload()

						}
					})

				}
			}

			function DelVersao(versao) {

				if (window.confirm("Você realmente excluir essa Versão?")) {




					$var.ajax({
						type: 'post',
						data: 'versao=' + versao,
						url: 'funcoes/excluir-versao-qaa.php',
						success: function(retorno) {


							location.reload()

						}
					})

				}
			}

			function Deletar(codigo) {


				if (window.confirm("Você realmente excluir esse Anexo?")) {




					$var.ajax({
						type: 'post',
						data: 'codigo=' + codigo,
						url: 'funcoes/excluir-anexos-qaa.php',
						success: function(retorno) {


							CarregarAnexos()

						}
					})

				}



			}


			function ClicarQuestao(variavel) {

				if (variavel == 0) {

					$var('#resposta-questoes').hide()
				} else {


					$var.ajax({
						type: 'post',
						data: 'codigo=' + variavel + '&certificado=<?php echo $certificado ?>' + '&cnpj=<?php echo $cnpj ?>&mod=<?php echo $codigo_modalidade ?>',
						url: 'funcoes/questoes-qaa.php',
						success: function(retorno) {
							$var('#resposta-questoes').show()
							$var('#resposta-questoes').html(retorno);
							$var('#codigo-qaa').val(variavel)
							Active(variavel)
							CarregarAnexos()
							VerificaPossui()
							Redimensionar()
						}
					})
				}
			}


			function GravarBloco() {

				var modalidade = $var('#nome-modalidade').val()

				var codigoqaa = $var('#codigo-qaa').val()

				var nome = $var("#cad-bloco").val()


				var checkeds = new Array();
				$var("input[name='modalidade[]']:checked").each(function() {

					checkeds.push($var(this).val());
				});





				if (nome != '') {

					$var.ajax({
						type: 'post',
						data: 'bloco=' + nome + '&codigoqaa=' + codigoqaa + '&codigomodalidade=' + checkeds,
						url: 'funcoes/gravar-bloco-qaa.php',
						success: function(retorno) {
							$var('#resposta-questoes').html(retorno);
							$var('#fechar-bloco').trigger('click')

							location.reload()

						}
					})

				}

			}

			function Active(variavel) {
				$var('.list-group-item').removeClass('active');
				$var('#item-de-menu' + variavel).addClass('active');

			}


			function AtualizarQAA(retorno) {
				var codigo = $var('#quest-codigo').val()
				var questao = $var('#quest-questao').val()
				var resposta = $var('#quest-resposta').val()
				var titulo = $var('#quest-titulo').val()
				var cnpj = $var('#cad-cnpj').val()
				var mod = $var('#cad-mod').val()
				var respostasimnao = $var('#cad-resposta-sim-nao:checked').val()
				var possui = $var("#cad-documentos option:selected").val()
				// var data = resposta.getData();
				// var data2 = data.replace('&nbsp;', ' ')
				var pergunta = $var('#cad-pergunta').val()

				$var.ajax({
					type: 'post',
					data: '&codigo=' + codigo + '&questao=' + questao + '&resposta=' + resposta + '&titulo=<?php echo $registros3['titulo'] ?>' + '&respostasimnao=' + respostasimnao + '&possui=' + possui + '&pergunta=' + pergunta + '&retorno=' + retorno + '&certificado=<?php echo $certificado ?>' + '&cnpj=' + cnpj + '&mod=' + mod,
					url: 'processa-gravar-qaa.php',
					success: function(retorno2) {

						if (retorno == 'gravar') {
							$var('#codigo2-' + codigo).show()

						}

						$var('#resposta-alertas').html(retorno2);

					}
				})
				// alert('Ta passando daqui')

			}



			function GravarQuestao(variavel) {
				var codigo = $var('#obter-codigo-bloco').val()
				var titulo = $var('#cad-titulo-questao').val()
				var questao = $var('#cad-questao').val()
				var resposta = $var('#cad-resposta').val()
				var resposta2 = encodeURIComponent(resposta)
				var perguntaSimNao = $var('#cad-pergunta-sim-nao').val()

				var questaocriterio = $var('#cad-questao-mae option:selected').val()
				var questaomae = $var('#cad-item-mae option:selected').val()


				if (variavel == 'questao') {

					$var.ajax({
						type: 'post',
						data: 'titulo=' + titulo + '&questao=' + questao + '&resposta=' + resposta + '&codigo=' + codigo + '&questaomae=' + questaomae + '&perguntasimnao=' + perguntaSimNao + '&tipo=questao',
						url: 'funcoes/gravar-qaa.php',
						success: function(retorno) {
							$var('#resposta-questoes').html(retorno);
							$var('#fechar-quests').trigger('click')
							location.reload()

						}
					})
				}



				if (variavel == 'criterio') {

					$var.ajax({
						type: 'post',
						data: 'titulo=' + titulo + '&questao=' + questao + '&resposta=' + resposta + '&codigo=' + codigo + '&questaomae=' + questaocriterio + '&perguntasimnao=' + perguntaSimNao + '&tipo=criterio',
						url: 'funcoes/gravar-qaa.php',
						success: function(retorno) {
							$var('#resposta-questoes').html(retorno);
							$var('#fechar-quests').trigger('click')
							location.reload()

						}
					})
				}

			}





			$l = jQuery.noConflict();


			function CarregaUsers2(variavel) {

				$l.ajax({
					type: 'post',
					data: 'qaa=' + variavel,
					url: 'lista-usuarios-modal-qaa-inteiro.php',
					success: function(retorno) {
						$l('#resposta-modal-qaa-inteiro').html(retorno);
						//$g('#fechar-quests').trigger('click')
						//location.reload()  	  

					}
				})
			}


			$j = jQuery.noConflict();

			function AdicionarResponsavel2(variavel) {



				var usuario = $j("#novo-user option:selected").val()



				$j.ajax({
					type: 'post',
					data: 'qaa=' + variavel + '&usuario=' + usuario,
					url: 'funcoes/gravar-responsavel-qaa-inteiro.php',
					success: function(retorno) {
						$j('#resposta-modal').html(retorno);
						CarregaUsers2(variavel)

					}
				})
			}
		</script>




		<script>
			function Uploads() {
				VerificaPossui()
				var variavel = $("#cad-documentos option:selected").val()

				if (variavel == 'sim') {
					$var('#upload-arquivos').show()
					$var('#upload-arquivos').load('upload-arquivos-qaa.php')

				}


				if (variavel == 'não') {

					$var('#upload-arquivos').hide()
					$var(".exibir-anexo").hide()
				}


			}

			function CarregaAnexos() {

				$var('#carrega-anexos-qaa').load('carrega-anexos-qaa.php')
				$var("#photo").val('');
				$var("#nome-arquivo").val('');
			}
		</script>


		<script>
			$g = jQuery.noConflict()





			$g(document).on('change', '#photo', function() {

				var codigo = $g('#codigo-qaa').val()


				var myfiles = document.getElementById("photo");
				var files = myfiles.files;
				var data = new FormData();

				for (i = 0; i < files.length; i++) {
					data.append('file' + i, files[i]);
				}




				$g.ajax({
					url: 'funcoes/upload-qaa.php?codigo=' + codigo + '&cnpj=<?php echo $cnpj ?>',
					method: 'POST',
					data: data,
					contentType: false,
					cache: false,
					processData: false,
					beforeSend: function() {
						$g('#msg').html('Carregando......');
					},
					success: function(data) {
						console.log(data);
						$g('#msg').html(data);

						CarregarAnexos()



					}
				});


			})


			function CarregaUsers(variavel) {

				$g.ajax({
					type: 'post',
					data: 'qaa=' + variavel,
					url: 'lista-usuarios-modal-qaa.php',
					success: function(retorno) {
						$g('#resposta-modal').html(retorno);
						//$g('#fechar-quests').trigger('click')
						//location.reload()  	  

					}
				})
			}


			function AdicionarResponsavel(variavel) {

				var usuario = $g("#novo-user option:selected").val()


				$g.ajax({
					type: 'post',
					data: 'qaa=' + variavel + '&usuario=' + usuario,
					url: 'funcoes/gravar-responsavel-qaa.php',
					success: function(retorno) {
						$g('#resposta-modal').html(retorno);
						CarregaUsers(variavel)

					}
				})
			}



			function GravarQaa() {
				var resposta = $var('#quest-resposta').val()

				// let confirmAction = confirm('Deseja realmente gravar a verão do QAA ?');

				if (resposta === '') {
					window.confirm("Você não pode gravar uma versão do Qaa sem ter respondido ao menos uma questão.")
				}
				if (confirmAction) {
					// $g.ajax({
					// 	type: 'post',
					// 	data: 'codigo=<?php echo $codigo_qaa ?>&usuario=<?php echo $user_email ?>&cnpj=<?php echo $cnpj ?>&certificado=<?php echo $certificado ?>',
					// 	url: 'funcoes/salvar-qaa.php',
					// 	success: function(retorno) {

					// 		location.reload()

					// 	}
					// })
					alert('deu errado')

				}

			}


			$ba = jQuery.noConflict()

			function CarregarAnexos() {

				var codigo = $g('#codigo-qaa').val()


				$ba.ajax({
					type: 'post',
					data: 'codigo=' + codigo + '&cnpj=<?php echo $cnpj ?>',
					url: 'carrega-anexos-qaa.php',
					success: function(retorno) {

						$ba('#carrega-anexos-qaa').html(retorno);


					}
				})








			}


			function EditarNomeAnexo() {

				$ba('.desativar').toggle()
			}







			function AtualizarNomeAnexo(antigo) {

				var codigo = $ba('#codigo-qaa').val()
				var novo = $ba('#btn-alterar-anexo').val()

				$ba.ajax({
					type: 'post',
					data: 'codigo=' + codigo + '&novo=' + novo + '&antigo=' + antigo,
					url: 'funcoes/atualizar-nome-anexo-qaa.php',
					success: function(retorno) {

						CarregarAnexos(<?php echo $codigo_qaa ?>)

					}
				})


			}


			function Topico(variavel) {

				if (variavel == 'Tópico') {
					$ba('.tipo-topico').show()
					$ba('.tipo-questao').hide()
					$ba('.tipo-geral').show()
				}

				if (variavel == 'Questão') {
					$ba('.tipo-questao').show()
					$ba('.tipo-topico').hide()
					$ba('.tipo-geral').show()
				}


			}

			function VerificaPossui() {
				var variavel = $ba("#cad-documentos option:selected").val()


				if (variavel == 'sim') {
					$ba("#carrega-anexos-qaa").css('display', 'block')
				}
				if (variavel == 'não') {
					$ba("#carrega-anexos-qaa").css('display', 'none')
				}
			}

			function EditarBloco(codigo) {
				$ba('#codigo-bloco-qaa').val(codigo)
				$ba.ajax({
					type: 'post',
					data: 'codigo=' + codigo,
					url: 'funcoes/ver-bloco-qaa.php',
					success: function(retorno) {
						$ba("#edit-bloco").val(retorno)
					}
				})

			}

			function AtualizarBloco() {
				var codigo = $ba('#codigo-bloco-qaa').val()
				var editar = $ba("#edit-bloco").val()
				$ba.ajax({
					type: 'post',
					data: 'codigo=' + codigo + '&valor=' + editar,
					url: 'funcoes/editar-bloco-qaa.php',
					success: function(retorno) {
						$ba(".close").trigger('click')
						location.reload()
					}
				})

			}

			function EditarCriterio(codigo) {
				$ba('#codigo-criterio-qaa').val(codigo)
				$ba.ajax({
					type: 'post',
					data: 'codigo=' + codigo,
					url: 'funcoes/ver-criterio-qaa.php',
					success: function(retorno) {
						$ba("#edit-criterio").val(retorno)
					}
				})

			}


			function AtualizarCriterio() {
				var codigo = $ba('#codigo-criterio-qaa').val()
				var editar = $ba("#edit-criterio").val()
				$ba.ajax({
					type: 'post',
					data: 'codigo=' + codigo + '&valor=' + editar,
					url: 'funcoes/editar-criterio-qaa.php',
					success: function(retorno) {
						$ba(".close").trigger('click')
						location.reload()
					}
				})

			}

			function EditarSubCriterio(codigo) {
				$ba('#codigo-subcriterio-qaa').val(codigo)
				$ba.ajax({
					type: 'post',
					data: 'codigo=' + codigo,
					url: 'funcoes/ver-subcriterio-qaa.php',
					success: function(retorno) {
						$ba("#edit-subcriterio").val(retorno)
					}
				})

			}


			function AtualizarSubCriterio() {
				var codigo = $ba('#codigo-subcriterio-qaa').val()
				var editar = $ba("#edit-subcriterio").val()
				$ba.ajax({
					type: 'post',
					data: 'codigo=' + codigo + '&valor=' + editar,
					url: 'funcoes/editar-subcriterio-qaa.php',
					success: function(retorno) {
						$ba(".close").trigger('click')
						location.reload()
					}
				})

			}


			function Historico() {


				$ba('#retorno-historico').html("Teste")
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