<?php  
$nav_menu_principal='naoconformidade';
$nav_menu_pagina='8d';
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<style>
	
		.metodo1{display: none}
		.metodo2{display: none}
	</style>
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	
	
	$codigo_8d=$_REQUEST['cod'];
	
	mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	
$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario' ");
$registros_usuario=mysqli_fetch_array($selecao_usuario);
$codigo_usuario=$registros_usuario['id'];	
?>		
<!-- Navegação !-->	

	
	
<?php
$selecao=mysqli_query($conexao,"select * from 8d WHERE id='$codigo_8d'");
$registros=mysqli_fetch_array($selecao);				
				?>	
	
<form action="processa-atualizar-8d.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="codigo" value="<?php echo $codigo_8d ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | 8D</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row ml-4 mr-4 mt-3">
				<div class="col-md-12">
					<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
					<h3 class="mt-3 mb-5">Editar Registro 8D</h3>
				</div>
				
				
				<div class="col-md-4 mb-3">
					<label>Emitente</label>
					<select class="form-control" name="cad-emitente" id="cad-emitente">
						<?php if($registros['emitente']!='0'){ ?>
<option selected value="<?php echo $registros['emitente'] ?>"><?php echo $registros['emitente'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
					<?php
						mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
					$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa");
					while($registros_usuarios=mysqli_fetch_array($selecao_usuarios)){	
					?>	
						
					<option><?php echo $registros_usuarios['nome'] ?></option>
						
					<?php } ?>	
						
						
					</select>	
				</div>

				<div class="col-md-2 mb-3">
					<label>N° da RNC</label>
					<input type="text" class="form-control" name="cad-numero_rnc" readonly value="<?php echo $registros['id'] ?>" >
				</div>
				
				<div class="col-md-5">
					<label>Origem</label>
					<select class="form-control" name="cad-origem">
						<?php if($registros['origem']!='0'){ ?>
<option selected value="<?php echo $registros['origem'] ?>"><?php echo $registros['origem'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
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
				
				<div class="col-md-3 mb-3">
					<label>Data do Registro</label> 
					<input type="text" class="form-control datepicker" name="cad-data" id="cad-data" value="<?php echo $registros['data_registro'] ?>" >
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Data da Ocorrência</label>
					<input type="text" class="form-control datepicker" name="cad-data-ocorrencia" value="<?php echo $registros['data_ocorrencia'] ?>" >
				</div>
				
				<div class="col-md-4">
					<label>Processo</label>
					<select class="form-control mb-3" name="cad-processo">
						<?php if($registros['processo']!='0'){ ?>
<option selected value="<?php echo $registros['processo'] ?>"><?php echo $registros['processo'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
					<?php
						mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
					$selecao_processos=mysqli_query($conexao,"select * from processos");
					while($registros_processos=mysqli_fetch_array($selecao_processos)){	
					?>	
						
					<option><?php echo $registros_processos['processo'] ?></option>
						
					<?php } ?>	
						
						
					</select>	
				</div>
				
				<div class="col-md-4 mb-3">
					<label>Risco</label>
					<select class="form-control" name="cad-risco">
						<?php if($registros['risco']!='0'){ ?>
<option selected value="<?php echo $registros['risco'] ?>"><?php echo $registros['risco'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
					<?php
						mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
					$selecao_riscos=mysqli_query($conexao,"select * from identificacao_do_risco");
					while($registros_riscos=mysqli_fetch_array($selecao_riscos)){	
					?>	
						
					<option><?php echo $registros_riscos['evento_risco'] ?></option>
						
					<?php } ?>	
						
						
					</select>	
				</div>
				
				
				
				<div class="col-md-12 mb-3 mt-5">
					<h5>1D - Equipe Responsável</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Nome</label>
					<select class="form-control" name="cad-responsavel-analise" id="cad-responsavel-analise">
						<option value="0">Escolher</option>
					<?php
					$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa");
					while($registros_usuarios=mysqli_fetch_array($selecao_usuarios)){	
					?>	
						
					<option><?php echo $registros_usuarios['nome'] ?></option>
						
					<?php } ?>	
						
						
					</select>	
				</div>
				
				<div class="col-md-3">
					<label>Área</label>
					<select class="form-control" name="cad-area-responsavel" id="cad-area-responsavel">
						<option value="0">Escolher</option>
						<?php
					$selecao_areas=mysqli_query($conexao,"select * from areas");
					while($registros_areas=mysqli_fetch_array($selecao_areas)){	
					?>	
						
					<option><?php echo $registros_areas['area'] ?></option>
						
					<?php } ?>	
					</select>
				</div>
				
				<div class="col-md-3">
					<label>&nbsp;</label>
					<input type="button" value="Adicionar Responsável" class="btn btn-primary" onClick="AdicionarResponsavel8d()">
				</div>
				
				
				<div class="col-md-12 mt-4">
					<div id="carregar-equipe-8d"></div>
				</div>
				
				<div class="col-md-12 mt-4">
					<input type="submit" value="Atualizar" class="btn btn-primary">
				</div>
				
				
				<div class="col-md-12 mb-3 mt-5">
					<h5>2D - Descrição do Problema</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Problema Reincidente?</label>
					<select class="form-control" name="cad-problema-reincidente" id="cad-problema-reincidente">
						<?php if($registros['problema_reincidente']!='0'){ ?>
<option selected value="<?php echo $registros['problema_reincidente'] ?>"><?php echo $registros['problema_reincidente'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
						<option>Sim</option>
						<option>Não</option>
					</select>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Tipo Cliente/Fornecedor </label>
					<?php
					$cod_id=$registros['cliente_fornecedor'];
					$selecao2=mysqli_query($conexao,"select * from terceiros WHERE id='$cod_id' ");
					$registros2=mysqli_fetch_array($selecao2);
					?>
					
					<select class="form-control" name="esc-cliente-fornecedor" id="esc-cliente-fornecedor"  onChange="CarregarTabelaClientes()">
						
			<option value="cliente" <?php if($registros2['class_cliente']==1){?> checked <?php } ?> >
								Cliente</option>
						<option value="fornecedor" <?php if($registros2['class_fornecedor']==1){?> checked<?php } ?> > Fornecedor </option>
					</select>
				</div>	
					
					
				<div class="col-md-4">
				<label>Escolher Cliente/Fornecedor</label>
				<div id="carregar-tabela-clientes"></div>	
				</div>	
				
				<div class="col-md-8 mb-3">
					<label>Problema</label>
					<textarea class="form-control" name="cad-problema" id="cad-problema" rows="6"><?php echo $registros['problema'] ?></textarea>
				</div>
				
				<div class="col-md-3">
					<label>Evidência Objetiva</label>
					<input class="form-control" type="file" name="cad-evidencia1" id="cad-evidencia1" >
				</div>
				
				<div class="col-md-12 mt-4">
					<input type="submit" value="Atualizar Registro" class="btn btn-primary">
				</div>
				
				
				<div class="col-md-12 mb-3 mt-5">
					<h5>3D - Ação de Contenção</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Ação</label>
					<textarea class="form-control" name="cad-acao" id="cad-acao"><?php echo $registros['acao'] ?></textarea>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Responsável</label>
					<select class="form-control" name="cad-responsavel-acao" id="cad-responsavel-acao">
						<?php if($registros['responsavel_acao']!='0'){ ?>
<option selected value="<?php echo $registros['responsavel_acao'] ?>"><?php echo $registros['responsavel_acao'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
					<?php
					$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa");
					while($registros_usuarios=mysqli_fetch_array($selecao_usuarios)){	
					?>	
						
					<option><?php echo $registros_usuarios['nome'] ?></option>
						
					<?php } ?>	
						
						
					</select>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Data</label>
					<input type="text" class="form-control datepicker" name="cad-data-contencao" id="cad-data-contencao" value="<?php echo $registros['data_contencao'] ?>">
				</div>
				
				<div class="col-md-12 mt-4">
					<input type="submit" value="Atualizar Registro" class="btn btn-primary">
				</div>
				
				<div class="col-md-12 mb-3 mt-5">
					<h5>4D - Definição de Causas</h5>
				</div>
				
				
				<div class="col-md-6 mb-3">
					<label>What - O que aconteceu</label>
					<input type="text" class="form-control" name="cad-what" id="cad-what" value="<?php echo $registros['p_what'] ?>"  >
				</div>
				
					<div class="col-md-6 mb-3">
					<label>When - Quando aconteceu</label>
					<input type="text" class="form-control" name="cad-when" id="cad-when" value="<?php echo $registros['p_when'] ?>" >
				</div>
				
				<div class="col-md-6 mb-3">
					<label>Who - Quem identificou</label>
					<input type="text" class="form-control" name="cad-who" id="cad-who" value="<?php echo $registros['p_who'] ?>" >
				</div>
				
				<div class="col-md-6 mb-3">
					<label>Where - Onde ocorreu</label>
					<input type="text" class="form-control" name="cad-where" id="cad-where" value="<?php echo $registros['p_where'] ?>" >
				</div>
				
				<div class="col-md-6 mb-3">
					<label>Why - Por que ocorreu</label>
					<input type="text" class="form-control" name="cad-why" id="cad-why" value="<?php echo $registros['p_why'] ?>" >
				</div>
				
				<div class="col-md-6 mb-3">
					<label>How - Como aconteceu</label>
					<input type="text" class="form-control" name="cad-how" id="cad-how" value="<?php echo $registros['how'] ?>" >
				</div>
				
					<div class="col-md-6 mb-3">
					<label>How much - Quanto custa</label>
					<input type="text" class="form-control" name="cad-how-much" id="cad-how-much" value="<?php echo $registros['how_much'] ?>" >
				</div>
				
				
				<div class="col-md-12 mb-3 mt-5">
					<h5>Metodologias 6ms</h5>
					<select class="form-control" name="cad-metodologias" id="cad-metodologias" onChange="Metodologias()">
						<?php if($registros['metodologias']!='0'){ ?>
<option selected value="<?php echo $registros['metodologias'] ?>"><?php echo $registros['metodologias'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
						<option value="metodo1">Método 1</option>
						<option value="metodo2">Método 2 (Por quês)</option>
					</select>
				</div>
				
				<div class="col-md-6 mb-3 metodo1">
					
					<h4  class="mb-3 mt-3">Método 1</h4>
					
					<div class="row" >
						<div class="col-md-4 mb-3">
							<label>Método</label>
							<input type="text" class="form-control" name="cad-metodo" id="cad-metodo" value="<?php echo $registros['metodo'] ?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label>Material</label>
							<input type="text" class="form-control" name="cad-material" id="cad-material" value="<?php echo $registros['material'] ?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label>Mão de Obra</label>
							<input type="text" class="form-control" name="cad-mao-de-obra" id="cad-mao-de-obra" value="<?php echo $registros['mao_de_obra'] ?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label>Meio Ambiente</label>
							<input type="text" class="form-control" name="cad-meio-ambiente" id="cad-meio-ambiente" value="<?php echo $registros['meio_ambiente'] ?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label>Máquina</label>
							<input type="text" class="form-control" name="cad-maquina" id="cad-maquina" value="<?php echo $registros['maquina'] ?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label>Medição</label>
							<input type="text" class="form-control" name="cad-medicao" id="cad-medicao" value="<?php echo $registros['medicao'] ?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label>Resposta da causa Raiz</label>
							<input type="text" class="form-control" name="cad-resposta-causa-raiz" id="cad-resposta-causa-raiz" value="<?php echo $registros['resposta_causa'] ?>">
						</div>
					</div>
				</div>
				
				<div class="col-md-6 mb-3 metodo2">
					<h4 class="mb-3 mt-3">Método 2</h4>
					
					<div class="row" >
						<div class="col-md-4 mb-3">
							<label>1 - Por quê</label>
							<input type="text" class="form-control" name="cad-pq1" id="cad-pq1" value="<?php echo $registros['pq1'] ?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label>2 - Por quê</label>
							<input type="text" class="form-control" name="cad-pq2" id="cad-pq2" value="<?php echo $registros['pq2'] ?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label>3 - Por quê</label>
							<input type="text" class="form-control" name="cad-pq3" id="cad-pq3" value="<?php echo $registros['pq3'] ?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label>4 - Por quê</label>
							<input type="text" class="form-control" name="cad-pq4" id="cad-pq4" value="<?php echo $registros['pq4'] ?>">
						</div>
						
						
						<div class="col-md-4 mb-3">
							<label>5 - Por quê</label>
							<input type="text" class="form-control" name="cad-pq5" id="cad-pq5" value="<?php echo $registros['pq5'] ?>">
						</div>
						
						
						<div class="col-md-4 mb-3">
							<label>Resposta da Causa Raiz</label>
							<input type="text" class="form-control" name="resposta-causa-raiz2" id="resposta-causa-raiz2" value="<?php echo $registros['resposta_causa2'] ?>">
						</div>
					</div>
				</div>
				
				<div class="col-md-12 mt-2 mb-4">
					<input type="submit" value="Atualizar Registro" class="btn btn-primary">
				</div>
				
				
				<div class="col-md-12">
					<h5>5D - Plano de Ação, Implementação da Ação</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Item</label>
					<select class="form-control" name="cad-item-implementacao" id="cad-item-implementacao">
						<?php if($registros['item_implantacao']!='0'){ ?>
<option selected value="<?php echo $registros['item_implantacao'] ?>"><?php echo $registros['item_implantacao'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
						<?php
						$selecao_workflow=mysqli_query($conexao,"select * from workflow order by planejamento ASC");
						while($registros_workflow=mysqli_fetch_array($selecao_workflow)){
						?>
						
						<option><?php echo $registros_workflow['planejamento'] ?></option>
						
						<?php } ?>
						
					</select>
				</div>
				
				<div class="col-md-3">
					<label>Descrição da Ação</label>
					<input type="text" class="form-control mb-3" name="cad-descricao-acao" id="cad-descricao-acao" value="<?php echo $registros['descricao_acao'] ?>" >
				</div>
				
				<div class="col-md-3">
					<label>Como Fazer?</label>
					<input type="text" class="form-control mb-3" name="cad-como-fazer" id="cad-como-fazer" value="<?php echo $registros['como_fazer'] ?>" >
				</div>
				
				<div class="col-md-3">
					<label>Responsável</label>
					<select class="form-control" name="cad-responsavel-implementacao" id="cad-responsavel-implementacao">
											<?php if($registros['responsavel_implementacao']!='0'){ ?>
<option selected value="<?php echo $registros['responsavel_implementacao'] ?>"><?php echo $registros['responsavel_implementacao'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
					<?php
					$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa");
					while($registros_usuarios=mysqli_fetch_array($selecao_usuarios)){	
					?>	
						
					<option><?php echo $registros_usuarios['nome'] ?></option>
						
					<?php } ?>	
						
						
					</select>	
				</div>
				
				<div class="col-md-3">
					<label>Data Prevista Conclusão</label>
					<input type="text" class="form-control mb-3 datepicker" name="cad-data-prevista" id="cad-data-prevista" value="<?php echo $registros['data_prevista'] ?>" >
				</div>
				
				<div class="col-md-3">
					<label>Data da Conclusão</label>
					<input type="text" class="form-control mb-3 datepicker" name="cad-data-conclusao" id="cad-data-conclusao" value="<?php echo $registros['data_conclusao'] ?>" >
				</div>
				
				<div class="col-md-3">
					<label>Responsável Monitoramento</label>
					<select class="form-control" name="cad-responsavel-monitoramento" id="cad-responsavel-monitoramento">
						<?php if($registros['responsavel_monitoramento']!='0'){ ?>
<option selected value="<?php echo $registros['responsavel_monitoramento'] ?>"><?php echo $registros['responsavel_monitoramento'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
					<?php
					$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa");
					while($registros_usuarios=mysqli_fetch_array($selecao_usuarios)){	
					?>	
						
					<option><?php echo $registros_usuarios['nome'] ?></option>
						
					<?php } ?>	
						
						
					</select>	
				</div>
				
				
				
				
				<div class="col-md-3">
					<label>Status</label>
					<select class="form-control" name="cad-status-monitoramento" id="cad-status-monitoramento">
						<?php if($registros['status_monitoramento']!='0'){ ?>
<option selected value="<?php echo $registros['status_monitoramento'] ?>"><?php echo $registros['status_monitoramento'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
						<option>Não Iniciado</option>
						<option>Em Andamento</option>
						<option>Concluído</option>
					</select>
				</div>
				
				<div class="col-md-3">
					<label>Evidência Objetiva</label>
					<input type="file" name="evidencia-objetiva" id="evidencia-objetiva">
				</div>
				
				<div class="col-md-12 mt-4">
					<input type="submit" value="Atualizar Registro" class="btn btn-primary">
				</div>
				
				
				<div class="col-md-12 mt-5">
					<h5>7D - Prevenção da Recorrência</h5>
				</div>
				
				
				<div class="col-md-4">
					<label>Informar se as soluções podem ser aplicadas em outros processos ou produtos:</label>
					<select class="form-control" name="cad-solucoes-aplicadas" id="cad-solucoes-aplicadas">
						<?php if($registros['solucoes_aplciadas']!='0'){ ?>
<option selected value="<?php echo $registros['solucoes_aplciadas'] ?>"><?php echo $registros['solucoes_aplciadas'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
						<option>Sim</option>
						<option>Não</option>
					</select>
				</div>
				
				<div class="col-md-4">
					<label>Descrição</label>
					<textarea class="form-control" name="cad-descricao-solucoes" id="cad-descricao-solucoes"><?php echo $registros['descricao_solucoes'] ?></textarea>
				</div>
				
				<div class="col-md-12 mt-4">
					<input type="submit" value="Atualizar Registro" class="btn btn-primary">
				</div>
				
				
				<div class="col-md-12 mt-5">
					<h5>8D - Verificação ou Aprovação</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Responsável pela análise</label>
					<select class="form-control" name="cad-responsavel-analise" id="cad-responsavel-analise">
						<?php if($registros['responsavel_analise']!='0'){ ?>
<option selected value="<?php echo $registros['responsavel_analise'] ?>"><?php echo $registros['responsavel_analise'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
					<?php
					$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa");
					while($registros_usuarios=mysqli_fetch_array($selecao_usuarios)){	
					?>	
						
					<option><?php echo $registros_usuarios['nome'] ?></option>
						
					<?php } ?>	
						
						
					</select>	
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Data Análise</label>
					<input type="text" class="form-control mb-3 datepicker" name="cad-data-analise" id="cad-data-analise" value="<?php echo $registros['data_conclusao'] ?>" >
				</div>
				
					<div class="col-md-3 mb-3">
					<label>Parecer</label>
					<select class="form-control" name="cad-parecer" id="cad-parecer" onChange="Parecer()">
						<?php if($registros['parecer']!='0'){ ?>
<option selected value="<?php echo $registros['parecer'] ?>"><?php echo $registros['parecer'] ?></option>		
<?php }else{ ?>	
						
<option value="0">Escolher</option>						
<?php } ?>	
						<option >Eficaz</option>
						<option >Ineficaz</option>
					</select>
				</div>
								
				<div class="col-md-3 mb-3">
					<label>Evidência Objetiva</label>
					<input type="file" name="evidencia-objetiva-analise" id="evidencia-objetiva-analise">
				</div>
				
				
				
	<div class="col-md-12 mt-4">
					<input type="submit" value="Atualizar Registro" class="btn btn-primary">
				</div>
				
			</div>
		</div>

	</div>
</form>
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	
		$(document).ready(function(){
		
			CarregarEquipe8d()
			CarregarTabelaClientes()
		})
		
		$f=jQuery.noConflict()	 
		  
		 $f(".datepicker").datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
}); 
		  
		  
  $f(function() {
    $f(".datepicker").datepicker();
  } );
		
		
function Metodologias(){
	
	var metodologia = $f('#cad-metodologias option:selected').val()

	if(metodologia=='metodo1'){
		$f('.metodo1').show()
		$f('.metodo2').hide()
	}
	
	if(metodologia=='metodo2'){
		$f('.metodo2').show()
		$f('.metodo1').hide()
	}
	
}	
		
		
function CarregarEquipe8d(){
		  $f.ajax({
			  type: 'post',
			  data: 'codigo=',
			  url:'funcoes/excluir-area.php',
			  success: function(retorno){
			 $f("#carregar-equipe-8d").load('funcoes/carregar-equipe-8d.php')
		  }
		   }) 
	
}		
		
 function AdicionarResponsavel8d(){
	 
	 var Responsavel = $f('#cad-responsavel-analise option:selected').val()
	 var Area = $f('#cad-area-responsavel option:selected').val()
	 
	   $f.ajax({
			  type: 'post',
			  data: 'area='+Area+'&responsavel='+Responsavel,
			  url:'funcoes/gravar-responsavel-8d.php',
			  success: function(retorno){
			CarregarEquipe8d()
		  }
		   }) 
	 
	 
 }	
		
		
function ExcluirResponsavel8d(codigo){
	
		
	if (window.confirm("Você deseja excluir o Responsável?")) {

	  $f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-responsavel-8d.php',
			  success: function(retorno){
		CarregarEquipe8d()
			
		  }
		   })  	

	
	
}			
		
}
		
		function CarregarTabelaClientes(){
	
	var tipo  = $f('#esc-cliente-fornecedor option:selected').val()
	
	
	  $f.ajax({
			  type: 'post',
			  data: 'tipo='+tipo+'&codigo=<?php echo $codigo_8d ?>',
			  url:'funcoes/carregar-tabela-clientes2.php',
			  success: function(retorno){
		$f('#carregar-tabela-clientes').html(retorno)
			
		  }
		   })  	
	
	
	
}	
		
		
	</script>
	
			<script>
	$rodape=jQuery.noConflict()
	function AtivarLink(){
		$rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
		$rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight','bold')
	}
	AtivarLink()
</script>	
	
</body>
</html>