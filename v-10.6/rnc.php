<?php  
$nav_menu_principal='naoconformidade';
$nav_menu_pagina='rncs';
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
	
		#numero-correspondente{display: none}
		#nova-conformidade{display: none}
	</style>
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	
$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario' ");
$registros_usuario=mysqli_fetch_array($selecao_usuario);
$codigo_usuario=$registros_usuario['id'];	
	
$codigo=$_REQUEST['cod'];	
?>		
<!-- Navegação !-->	
	

	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | RNC</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
	<?php
				
		$selecao=mysqli_query($conexao,"select * from rnc WHERE id='$codigo'");
		$registros=mysqli_fetch_array($selecao);		
	?>		
			
			
			<div class="row ml-4 mr-4 mt-3">
				<div class="col-md-12">
					<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
					<h3 class="mb-4 mt-4">Registro de Não Conformidade 
						
						<?php
						if($registros['parecer']==''){
						?>
						
						<a href="editar-rnc.php?cod=<?php echo $codigo ?>"><img src="imgs/icone-editar.png" width="30" height="30" alt=""/></a>
						
						<?php } ?>
					
					</h3>
				</div>
				
				
				<div class="col-md-4">
					<label>Emitente</label>
					<select class="form-control" name="cad-emitente" id="cad-emitente" disabled>
						<option value="0"><?php echo $registros['emitente'] ?></option>
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
				
				
				<div class="col-md-4">
					<label>Data</label>
					<input type="text" class="form-control mb-3" name="cad-data" id="cad-data" readonly value="<?php echo $registros['data'] ?>"  >
				</div>
				
				<?php
					$selecao_reg=mysqli_query($conexao,"select * from rnc");
					$mostrar=mysqli_fetch_array($selecao_reg);
					$id=$mostrar['id'];
				if($id==''){$id='0';}
				?>
				<div class="col-md-4">
					<label>Nº Registro</label>
					<input type="text" class="form-control mb-3" name="" id="" readonly value="<?php echo $id+1 ?>"  >
				</div>
				
					<div class="col-md-4">
					<label>Processo</label>
					<select class="form-control mb-3" name="cad-processo" disabled>
						<option value="0"><?php echo $registros['processo'] ?></option>
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
				
				
					<div class="col-md-4">
					<label>Risco</label>
					<select class="form-control mb-3" name="cad-risco" disabled>
						<option value="0"><?php echo $registros['risco'] ?></option>
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
				
				
					<div class="col-md-5 mb-3">
					<label>Origem</label>
					<select class="form-control" name="cad-origem" disabled>
						<option value="0"><?php echo $registros['origem'] ?></option>
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
					<label>Reincidência</label>
					<select class="form-control" name="cad-reincidencia" id="cad-reincidencia" onChange="VerificarReincidencia()" disabled>
						<option value="0"><?php echo $registros['reincidencia'] ?></option>
						<option >Sim</option>
						<option >Não</option>
					</select>	
				</div>
				
				<div class="col-md-4 mb-3" id="numero-correspondente">
					<label>N° de Registro Correspondente</label>
					<input type="number" class="form-control" name="cad-numero-correspondente" id="cad-numero-correspondente" >
				</div>
				
				
					<div class="col-md-3 mb-3">
					<label>Tipo</label>
					<select class="form-control" name="cad-tipo" id="cad-tipo" disabled>
						<option value="0"><?php echo $registros['tipo'] ?></option>
						<option>Ação Corretiva</option>
						<option>Oportunidade de Melhoria</option>
					</select>
				</div>
				
					<div class="col-md-4 mb-3">
					<label>Requisito</label>
					<input type="text" class="form-control" name="cad-requisito" id="" readonly value="<?php echo $registros['requisito'] ?>" >
				</div>
				
				
				<div class="col-md-12 mt-3 mb-3">
					<h5>Detalhamento da Não Conformidade</h5>
				</div>
				
				<div class="col-md-6">
					<label>Descrição</label>
					<textarea class="form-control" rows="6" name="cad-descricao" readonly><?php echo $registros['descricao'] ?></textarea>
				</div>
				
				
				<div class="col-md-6">
					<label>Abrangência</label>
					<textarea class="form-control" rows="6" name="cad-abrangencia" readonly><?php echo $registros['abrangencia'] ?></textarea>
				</div>
				
				
				<div class="col-md-12 mt-5 mb-3">
					<h5>Ação Imediata Quando Houver</h5>
				</div>
				
				<div class="col-md-6">
					<label>Descrição da Ação de Correção no Ato da Ciência</label>
					<textarea class="form-control" rows="6" name="cad-descricao-correcao" readonly><?php echo $registros['descricao_correcao'] ?></textarea>
				</div>
				
				
				<div class="col-md-3">
					<label>Data da Implementação</label>
					<input type="text" class="form-control mb-3" name="cad-data-implementacao" id="" readonly value="<?php echo $registros['data_implementacao'] ?>"   >
				</div>
				
				
				<div class="col-md-3 mb-3">
					<label>Responsável</label>
					<select class="form-control" name="cad-responsavel-implementacao" disabled>
						<option value="0"><?php echo $registros['responsavel_acao_imediata'] ?></option>
					<?php
					$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa");
					while($registros_usuarios=mysqli_fetch_array($selecao_usuarios)){	
					?>	
						
					<option><?php echo $registros_usuarios['nome'] ?></option>
						
					<?php } ?>	
						
						
					</select>	
				</div>
				
				
				<div class="col-md-12 mt-5 mb-3">
					<h5>Análise da Causa</h5>
					
				<table class="table table-striped">
				
				<tr>
					<th>Descrição 6M</th>
					<th>Resposta</th>
					<th>Detalhamento</th>
					<th>Causas</th>
					<th>Criticidade</th>
				</tr>
					
					
				<tr>
					<td>1. Identificado desvio no processo ou método? 	</td>
					
					<td> <select class="form-control" name="cad-r1" disabled>
							<option><?php echo $registros['r1'] ?></option>
						</select></td>
					
					<td><textarea class="form-control" name="cad-d1" readonly><?php echo $registros['d1'] ?></textarea></td>	
					<td><textarea class="form-control" name="cad-c1" readonly><?php echo $registros['c1'] ?></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade1" readonly value="<?php echo $registros['criticidade1'] ?>"></td>	
				</tr>
					
					
								<tr>
					<td>2. Identificado desvio no material utilizado?	 	</td>
									
						<td> <select class="form-control" name="cad-r1" disabled>
							<option><?php echo $registros['r2'] ?></option>
						</select></td>
					
					<td><textarea class="form-control" name="cad-d1" readonly><?php echo $registros['d2'] ?></textarea></td>	
					<td><textarea class="form-control" name="cad-c1" readonly><?php echo $registros['c2'] ?></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade2" readonly value="<?php echo $registros['criticidade2'] ?>"></td>	
				</tr>
					
				
					
								<tr>
					<td>3. Identificado desvio na mão de obra utilizada?		 	</td>
						<td> <select class="form-control" name="cad-r1" disabled>
							<option><?php echo $registros['r3'] ?></option>
						</select></td>
					
					<td><textarea class="form-control" name="cad-d1" readonly><?php echo $registros['d3'] ?></textarea></td>	
					<td><textarea class="form-control" name="cad-c1" readonly><?php echo $registros['c3'] ?></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade1" value="<?php echo $registros['criticidade3'] ?>" readonly></td>	
				</tr>
					
					
					
				<tr>
					<td>4. Identificado desvio na máquinas, ferramenta ou equipamento utilizado?			 	</td>
						<td> <select class="form-control" name="cad-r1" disabled>
							<option><?php echo $registros['r4'] ?></option>
						</select></td>
					
					<td><textarea class="form-control" name="cad-d1" readonly><?php echo $registros['d4'] ?></textarea></td>	
					<td><textarea class="form-control" name="cad-c1" readonly><?php echo $registros['c4'] ?></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade1" value="<?php echo $registros['criticidade4'] ?>" readonly></td>	
				</tr>
					
				</tr>		
					
					
					<tr>
					<td>5. Identificado desvio na medição utilizada?	
			 	</td>
						<td> <select class="form-control" name="cad-r1" disabled>
							<option><?php echo $registros['r5'] ?></option>
						</select></td>
					
					<td><textarea class="form-control" name="cad-d1" readonly><?php echo $registros['d5'] ?></textarea></td>	
					<td><textarea class="form-control" name="cad-c1" readonly><?php echo $registros['c5'] ?></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade1" value="<?php echo $registros['criticidade5'] ?>" readonly></td>	
				</tr>
					
				</tr>	
					
					
					<tr>
					<td>6. Identificado desvio no ambiente de trabalho?	
	
			 	</td>
						<td> <select class="form-control" name="cad-r1" disabled>
							<option><?php echo $registros['r6'] ?></option>
						</select></td>
					
					<td><textarea class="form-control" name="cad-d1" readonly><?php echo $registros['d6'] ?></textarea></td>	
					<td><textarea class="form-control" name="cad-c1" readonly><?php echo $registros['c6'] ?></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade1" value="<?php echo $registros['criticidade6'] ?>" readonly></td>	
				</tr>
					
					
					
				</table>	
					
					
				</div>
				
				<div class="col-md-5">
					<label>Responsável pela análise</label>
					<select class="form-control" name="cad-responsavel-analise" disabled>
						<option value="0"><?php echo $registros['responsavel_analise'] ?></option>
					
						
						
					</select>	
				</div>
				
				<div class="col-md-3">
					<label>Data</label>
					<input type="text" class="form-control mb-3" name="cad-data_analise" id="cad-data_analise" readonly  value="<?php echo $registros['data_analise'] ?>" >
				</div>
				
				
				
				<div class="col-md-12 mt-3 mb-3">
					<h5>Plano de Ação</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Item</label>
					<select class="form-control" name="cad-item" id="cad-item" disabled>
						<option value="0"><?php echo $registros['item_plano_acao'] ?></option>
						
						
					</select>
				</div>
				
					<div class="col-md-3 mb-3">
					<label>Descrição</label>
					<input type="text" class="form-control" name="cad-descricao-acao" id="cad-descricao-acao" readonly value="<?php echo $registros['descricao_correcao'] ?>">
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Como Fazer?</label>
					<input type="text" class="form-control" name="cad-como-fazer" id="cad-como-fazer" readonly value="<?php echo $registros['como_fazer'] ?>">
				</div>
				
				
				<div class="col-md-3">
					<label>Responsável</label>
					<select class="form-control" name="cad-responsavel-plano-de-acao" disabled>
						<option value="0"><?php echo $registros['responsavel_acao_imediata'] ?></option>
					
						
						
					</select>	
				</div>
				
				<div class="col-md-3">
					<label>Data Prevista Conclusão</label>
					<input type="text" class="form-control mb-3" name="cad-data-previsao" id="cad-data-previsao" readonly value="<?php echo $registros['data_prevista_conclusao'] ?>" >
				</div>
				
				<div class="col-md-3">
					<label>Data Conclusão</label>
					<input type="text" class="form-control mb-3" name="cad-conclusao" id="cad-data-conclusao" readonly value="<?php echo $registros['data_conclusao'] ?>" >
				</div>
		
		
					<div class="col-md-12 mb-4">
						<div id="carregar-tabela-plano-de-acao"></div>
					</div>
		
		
		
		
				
				<div class="col-md-12 mt-3 mb-3">
					<h5>Acompanhamento da Implementação - Monitoramento</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Item</label>
					<select class="form-control" name="cad-item-implementacao" id="cad-item-implementacao" disabled>
						<option value="0"><?php echo $registros['item'] ?></option>
						
						
					</select>
				</div>
				
				<div class="col-md-2">
					<label>Data</label>
					<input type="text" class="form-control mb-3" name="cad-implementacao" id="cad-data-implementacao" readonly value="<?php echo $registros['data_monitoramento'] ?>" >
				</div>
				
				<div class="col-md-4">
					<label>Responsável Monitoramento</label>
					<select class="form-control" name="cad-responsavel-monitoramento" id="cad-responsavel-monitoramento" disabled>
						<option value="0"><?php echo $registros['responsavel_monitoramento'] ?></option>
					
						
					</select>	
				</div>
				
				<div class="col-md-3">
					<label>Status</label>
					<select class="form-control" name="cad-status-monitoramento" id="cad-status-monitoramento" disabled>
						<option value="0"><?php echo $registros['status'] ?></option>
						<option>Não Iniciado</option>
						<option>Em Andamento</option>
						<option>Concluído</option>
					</select>
				</div>
				
				<div class="col-md-3">
					<label>Evidência Objetiva</label>
					<a target="_blank" href="evidencias/<?php echo $registros['evidencia1'] ?>" > <i class="fa fa-download"></i> Documento</a>
				</div>
				
				
				<div class="col-md-12 mt-5 mb-3">
					<h5>Verificação da Eficácia - Análise crítica</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Responsável pela análise</label>
				<input type="text" readonly class="form-control" value="<?php echo $registros['responsavel_analise'] ?>">
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Data Análise</label>
					<input type="text" class="form-control mb-3" name="cad-data-analise" id="cad-data-analise" readonly value="<?php echo $registros['data_analise'] ?>" >
				</div>
				
					<div class="col-md-3 mb-3">
					<label>Parecer</label>
					<select class="form-control" name="cad-parecer" id="cad-parecer" onChange="Parecer()" disabled>
						<option value="0"><?php echo $registros['parecer'] ?></option>
						<option >Eficaz</option>
						<option >Ineficaz</option>
					</select>
				</div>
				
					<div class="col-md-3 mb-3" id="nova-conformidade">
					<label>Parecer</label>
					 <input type="text" class="form-control" name="cad-nova-conformidade" readonly value="<?php echo $registros['parecer'] ?>">
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Evidência Objetiva</label>
					<a target="_blank" href="evidencias/<?php echo $registros['evidencia2'] ?>" > <i class="fa fa-download"></i> Documento</a>
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
	
		$f=jQuery.noConflict()	 

	$f(document).ready(function(){
		CarregarTabelaPlanoAcao()	
	 	
	})
		
		
function VerificarReincidencia(){
	
	var reincidencia = $f('#cad-reincidencia option:selected').val()
	
	if(reincidencia=='Sim'){
		$f('#numero-correspondente').show()
	}
	
	if(reincidencia=='Não'){
		$f('#numero-correspondente').hide()
	}
	
	if(reincidencia=='0'){
		$f('#numero-correspondente').hide()
	}
	
}		
		
		
function Parecer(){
	
	var parecer = $f('#cad-parecer option:selected').val()
	
	if(parecer=='Ineficaz'){
		$f('#nova-conformidade').show()
	}
	
	if(parecer=='Eficaz'){
		$f('#nova-conformidade').hide()
	}
	
}
		
		
function CarregarTabelaPlanoAcao(){

	
		  $f.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo ?>',
			  url:'carregar-tabela-plano-de-acao-ver.php',
			  success: function(retorno){
				$f('#carregar-tabela-plano-de-acao').html(retorno) 
			 
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