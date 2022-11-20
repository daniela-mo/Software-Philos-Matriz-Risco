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
		none}
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
?>		
<!-- Navegação !-->	
	
<form action="processa-gravar-rcn.php" method="post" enctype="multipart/form-data">	
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
			<div class="row ml-4 mr-4 mt-3">
				<div class="col-md-12">
					<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
					<h3 class="mt-3 mb-5">Registro de Não Conformidade</h3>
				</div>
				
				
				<div class="col-md-4">
					<label>Emitente</label>
					<select class="form-control" name="cad-emitente" id="cad-emitente">
						<option value="0">Escolher</option>
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
					<input type="text" class="form-control mb-3 datepicker" name="cad-data" id="cad-data">
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
					<select class="form-control mb-3" name="cad-processo">
						<option value="0">Escolher</option>
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
					<select class="form-control mb-3" name="cad-risco">
						<option value="0">Escolher</option>
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
				
					<div class="col-md-3 mb-3">
					<label>Reincidência</label>
					<select class="form-control" name="cad-reincidencia" id="cad-reincidencia" onChange="VerificarReincidencia()">
						<option value="0">Escolher</option>
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
					<select class="form-control" name="cad-tipo" id="cad-tipo">
						<option value="0">Escolher</option>
						<option>Ação Corretiva</option>
						<option>Oportunidade de Melhoria</option>
					</select>
				</div>
				
					<div class="col-md-4 mb-3">
					<label>Requisito</label>
						
						<select class="form-control" name="cad-requisito" >
							<option value="Não Informado">Escolher</option>
							<?php
					$selecao=mysqli_query($conexao,"select * from requisitos_normativos order by referencia ASC");
						while($registros=mysqli_fetch_array($selecao)){
						?>
							
							<option><?php echo $registros['referencia'] ?></option>	
						<?php } ?>	
						</select>
					
				</div>
				
				
				<div class="col-md-12 mt-3 mb-3">
					<h5>Detalhamento da Não Conformidade</h5>
				</div>
				
				<div class="col-md-6">
					<label>Descrição</label>
					<textarea class="form-control" rows="6" name="cad-descricao"></textarea>
				</div>
				
				
				<div class="col-md-6">
					<label>Abrangência</label>
					<textarea class="form-control" rows="6" name="cad-abrangencia"></textarea>
				</div>
				
				
				<div class="col-md-12 mt-5 mb-3">
					<h5>Ação Imediata Quando Houver</h5>
				</div>
				
				<div class="col-md-6">
					<label>Descrição da Ação de Correção no Ato da Ciência</label>
					<textarea class="form-control" rows="6" name="cad-descricao-correcao"></textarea>
				</div>
				
				
				<div class="col-md-3">
					<label>Data da Implementação</label>
					<input type="text" class="form-control mb-3 datepicker" name="cad-data-implementacao" id="" >
				</div>
				
				
				<div class="col-md-3 mb-3">
					<label>Responsável</label>
					<select class="form-control" name="cad-responsavel-implementacao">
						<option value="0">Escolher</option>
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
					<td> 
						<select class="form-control" name="cad-r1" id="cad-r1" onChange="Resposta(1)">
							<option value="0">-----</option>
							<option>Sim</option>
							<option>Não</option>
						</select>
					
					</td>	
					<td><textarea class="form-control" name="cad-d1" id="cad-d1" readonly></textarea></td>	
					<td><textarea class="form-control" name="cad-c1" id="cad-c1" readonly></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade1" id="cad-criticidade1" readonly></td>	
				</tr>
					
					
								<tr>
					<td>2. Identificado desvio no material utilizado?	 	</td>
					<td> 
						<select class="form-control" name="cad-r2" id="cad-r2" onChange="Resposta(2)">
							<option value="0">-----</option>
							<option>Sim</option>
							<option>Não</option>
						</select>
									</td>	
					<td><textarea class="form-control" name="cad-d2" id="cad-d2" readonly></textarea></td>	
					<td><textarea class="form-control"  name="cad-c2" id="cad-c2" readonly></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade2" id="cad-criticidade2" readonly></td>	
				</tr>		
				
					
								<tr>
					<td>3. Identificado desvio na mão de obra utilizada?		 	</td>
					<td> 
						<select class="form-control" name="cad-r3" id="cad-r3" onChange="Resposta(3)">
							<option value="0">-----</option>
							<option>Sim</option>
							<option>Não</option>
						</select>
									</td>	
					<td><textarea class="form-control" name="cad-d3" id="cad-d3" readonly></textarea></td>	
					<td><textarea class="form-control" name="cad-c3" id="cad-c3" readonly></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade3" id="cad-criticidade3" readonly></td>	
				</tr>	
					
					
				<tr>
					<td>4. Identificado desvio na máquinas, ferramenta ou equipamento utilizado?			 	</td>
					<td> 
						<select class="form-control" name="cad-r4" id="cad-r4" onChange="Resposta(4)">
							<option value="0">-----</option>
							<option>Sim</option>
							<option>Não</option>
						</select>
					</td>	
					<td><textarea class="form-control" name="cad-d4" id="cad-d4" readonly ></textarea></td>	
					<td><textarea class="form-control" name="cad-c4" id="cad-c4" readonly ></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade4" id="cad-criticidade4" readonly></td>	
				</tr>		
					
					
					<tr>
					<td>5. Identificado desvio na medição utilizada?	
			 	</td>
					<td> 
						<select class="form-control" name="cad-r5" id="cad-r5" onChange="Resposta(5)">
							<option value="0">-----</option>
							<option>Sim</option>
							<option>Não</option>
						</select>
						</td>	
					<td><textarea class="form-control" name="cad-d5" id="cad-d5" readonly></textarea></td>	
					<td><textarea class="form-control" name="cad-c5" id="cad-c5" readonly></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade5" id="cad-criticidade5" readonly></td>	
				</tr>	
					
					
					<tr>
					<td>6. Identificado desvio no ambiente de trabalho?	
	
			 	</td>
					<td> 
						<select class="form-control" name="cad-r6" id="cad-r6" onChange="Resposta(6)">
							<option value="0">-----</option>
							<option>Sim</option>
							<option>Não</option>
						</select></td>	
					<td><textarea class="form-control" name="cad-d6" id="cad-d6" readonly></textarea></td>	
					<td><textarea class="form-control" name="cad-c6" id="cad-c6" readonly></textarea></td>	
					<td><input type="text" class="form-control" name="cad-criticidade6" id="cad-criticidade6" readonly></td>	
				</tr>	
					
					
					
				</table>	
					
					
				</div>
				
				<div class="col-md-5">
					<label>Responsável pela análise</label>
					<select class="form-control" name="cad-responsavel-analise">
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
					<label>Data</label>
					<input type="text" class="form-control mb-3 datepicker" name="cad-data_analise" id="cad-data_analise" >
				</div>
				
				
				
				<div class="col-md-12 mt-3 mb-3">
					<h5>Plano de Ação</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Item</label>
					<select class="form-control" name="cad-item" id="cad-item">
						<option value="0">Escolher</option>
						<?php
						$selecao=mysqli_query($conexao,"select * from workflow order by planejamento ASC");
						while($registros=mysqli_fetch_array($selecao)){
						?>
						
						<option><?php echo $registros['planejamento'] ?></option>
						
						<?php } ?>
						
					</select>
				</div>
				
					<div class="col-md-3 mb-3">
					<label>Descrição</label>
					<input type="text" class="form-control" name="cad-descricao-acao" id="cad-descricao-acao">
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Como Fazer?</label>
					<input type="text" class="form-control" name="cad-como-fazer" id="cad-como-fazer">
				</div>
				
				
				<div class="col-md-3">
					<label>Responsável</label>
					<select class="form-control" name="cad-responsavel-plano-de-acao" id="cad-responsavel-plano-de-acao">
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
					<label>Data Prevista Conclusão</label>
					<input type="text" class="form-control mb-3 datepicker" name="cad-data-previsao" id="cad-data-previsao" >
				</div>
				
				<div class="col-md-3">
					<label>Data Conclusão</label>
					<input type="text" class="form-control mb-3 datepicker" name="cad-conclusao" id="cad-data-conclusao" >
				</div>
				
				<div class="col-md-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Adicionar" onClick="GravarPlanoAcaoTemp()"  >
				</div>
				
				
				
					<div class="col-md-12 mb-4">
						<div id="carregar-tabela-plano-de-acao"></div>
					</div>
				
				
				
				
				
				
				
				
				<div class="col-md-12 mt-3 mb-3">
					<h5>Acompanhamento da Implementação - Monitoramento</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Item</label>
					<select class="form-control" name="cad-item-implementacao" id="cad-item-implementacao">
						<option value="0">Escolher</option>
						<?php
						$selecao=mysqli_query($conexao,"select * from workflow order by planejamento ASC");
						while($registros=mysqli_fetch_array($selecao)){
						?>
						
						<option><?php echo $registros['planejamento'] ?></option>
						
						<?php } ?>
						
					</select>
				</div>
				
				<div class="col-md-2">
					<label>Data</label>
					<input type="text" class="form-control mb-3 datepicker" name="cad-implementacao" id="cad-data-implementacao" >
				</div>
				
				<div class="col-md-4">
					<label>Responsável Monitoramento</label>
					<select class="form-control" name="cad-responsavel-monitoramento" id="cad-responsavel-monitoramento">
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
				
				
				<div class="col-md-12 mt-5 mb-3">
					<h5>Verificação da Eficácia - Análise crítica</h5>
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Responsável pela análise</label>
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
				
				<div class="col-md-3 mb-3">
					<label>Data Análise</label>
					<input type="text" class="form-control mb-3 datepicker" name="cad-data-analise" id="cad-data-analise" >
				</div>
				
					<div class="col-md-3 mb-3">
					<label>Parecer</label>
					<select class="form-control" name="cad-parecer" id="cad-parecer" onChange="Parecer()">
						<option value="0">Escolher</option>
						<option >Eficaz</option>
						<option >Ineficaz</option>
					</select>
				</div>
				
					
				
				<div class="col-md-3 mb-3">
					<label>Evidência Objetiva</label>
					<input type="file" name="evidencia-objetiva-analise" id="evidencia-objetiva-analise">
				</div>
				
			
				<div class="col-md-12 mt-3 mb-3">
					<input type="submit" value="Gravar Registro" class="btn btn-primary">
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
	  CarregarTabelaPlanoAcao()
    $f(".datepicker").datepicker();
  } );
		
		
		
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
		
		
function Resposta(codigo){

	var resposta = $f("#cad-r"+codigo+" option:selected").val()
	
	if(resposta=='Sim'){
	$f('#nova-conformidade'+codigo).removeAttr("readonly");
	$f('#cad-d'+codigo).removeAttr("readonly");
	$f('#cad-c'+codigo).removeAttr("readonly");
	$f('#cad-criticidade'+codigo).removeAttr("readonly");
}else{
	
$f('#nova-conformidade'+codigo).attr("readonly", "readonly");
	$f('#cad-d'+codigo).attr("readonly", "readonly");
	$f('#cad-c'+codigo).attr("readonly", "readonly");
	$f('#cad-criticidade'+codigo).attr("readonly", "readonly");
}




}	
		
function CarregarTabelaPlanoAcao(){

	
		  $f.ajax({
			  type: 'post',
			  data: 'codigo=',
			  url:'carregar-tabela-plano-de-acao-temp.php',
			  success: function(retorno){
				$f('#carregar-tabela-plano-de-acao').html(retorno) 
			 
		  }
		   }) 
}
		
		
function GravarPlanoAcaoTemp(){
	
	var item = $f('#cad-item option:selected').val()
	var descricao = $f('#cad-descricao-acao').val()
	var ComoFazer = $f('#cad-como-fazer').val()	 
	var responsavel = $f('#cad-responsavel-plano-de-acao').val()
	var dataPrevisao = $f('#cad-data-previsao').val()
	var conclusao =  $f('#cad-data-conclusao').val()
	
	  $f.ajax({
			  type: 'post',
			  data: 'item='+item+'&descricao='+descricao+'&comofazer='+ComoFazer+'&responsavel='+responsavel+'&dataprevisao='+dataPrevisao+'&conclusao='+conclusao,
			  url:'funcoes/gravar-tabela-plano-de-acao-temp.php',
			  success: function(retorno){ 
				CarregarTabelaPlanoAcao()
		  }
		   }) 
}	
		
	function ExcluirPlanoTemp(codigo){
		
	if (window.confirm("Você deseja excluir o Plano de Ação?")) {

	  $f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-plano-de-acao-temp.php',
			  success: function(retorno){
				CarregarTabelaPlanoAcao() 
			
		  }
		   })  	
}}		
		
		
		
		
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