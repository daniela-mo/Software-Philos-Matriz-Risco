<?php  
$nav_menu_principal='gestaoderisco';
$nav_menu_pagina='contextos';
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
</head>

<style>
	#conteudo2{display: none}
	#conteudo3{display: none}
	#conteudo4{display: none}
	#conteudo5{display: none}
</style>	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$codigo=$_REQUEST['cod'];
?>	
<!-- Navegação !-->	
	
	<form action="processa-cadastro-contextos.php" method="post">
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Novo Contexto</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
			<div class="row ml-4 mr-4 mt-5">
    
    <div class="col-md-12 text-center mt-4">
      	 <?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='30' and codigo_grupo='$cod_grupo' and ler='1' ");
	$numero_grupo=mysqli_num_rows($verificar_grupo);
	if($numero_grupo>=1){	?>	
		
        <input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Análise">
	<?php } ?>	
		
	<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='31' and codigo_grupo='$cod_grupo' and ler='1' ");
	$numero_grupo=mysqli_num_rows($verificar_grupo);
	if($numero_grupo>=1){	?>		
		
        <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn2" onClick="Abas(2)" value="Fatores Internos">
		
	<?php } ?>	
		
		
	<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='32' and codigo_grupo='$cod_grupo' and ler='1' ");
	$numero_grupo=mysqli_num_rows($verificar_grupo);
	if($numero_grupo>=1){	?>		
        <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn3" onClick="Abas(3)" value="Fatores Externos">
	<?php } ?>	
		
	<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='33' and codigo_grupo='$cod_grupo' and ler='1' ");
	$numero_grupo=mysqli_num_rows($verificar_grupo);
	if($numero_grupo>=1){	?>		
        <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn4" onClick="Abas(4)" value="Critérios">
     <?php } ?>  
			
        <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn5" onClick="Abas(5)" value="SWOT">
     

    </div>
    </div>
			
	<?php
		$selecao_analise=mysqli_query($conexao,"select * from contextos WHERE id='$codigo'");
		$registros_analise=mysqli_fetch_array($selecao_analise);	
	?>		
			
			
			<div class="row mb-3 ml-4 mr-4">
				<div class="col-md-12 mb-2">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
 			
				
				</div>
			</div>
			
	<div id="conteudo1">	
		<div class="row ml-4 mr-4">
			
			
		<div class="col-md-4 mb-3">
			<label>Nome da Análise</label>
			<input type="text" class="form-control" name="cad-nome-analise" id="cad-nome-analise" onChange="Analise()" value="<?php echo $registros_analise['analise'] ?>" readonly>
		</div>
			
			
		<div class="col-md-4 mb-3">
			<label>Objetivo da Análise</label>
			<input type="text" class="form-control" name="cad-objetivo" id="cad-objetivo" value="<?php echo $registros_analise['objetivo'] ?>" readonly>
		</div>
			
			
		<div class="col-md-4 mb-3">
			<label>Data Criação</label>
			<input type="text" class="form-control" name="cad-data" id="cad-data" value="<?php echo date('d-m-Y') ?>" value="<?php echo $registros_analise['data'] ?>" readonly>
		</div>	
			
			
		<div class="col-md-12 mb-3 mt-4">
			
			<!--<a  class="pointer float-left" data-toggle="modal" data-target="#ModalCadastroMembro"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/></a>	
			--->
			
			<h4 class="mb-3"><strong>Membros</strong></h4>
			<div id="carregar-tabela-membros"></div>
		</div>		
			
		
			
		</div>
	</div>			
			
			
	<div id="conteudo2">
		<div class="row ml-4 mr-4">
		
	
			
			
			
			<div class="col-md-3 mb-3">
				<label>Fator Interno</label>
				<input type="text" class="form-control" name="cad-fator-interno" id="cad-fator-interno">
			</div>
			
					<div class="col-md-3  mb-3">
				<label>Área</label>
	<select class="form-control" name="cad-esc-area" id="cad-esc-area" >
	<option value="0">Escolha</option>	
<?php
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	
$selecao_area=mysqli_query($conexao,"select * from areas order by area ASC");
while($registros_area=mysqli_fetch_array($selecao_area)){					
?>
	<option value="<?php echo $registros_area['id'] ?>"><?php echo $registros_area['area'] ?></option>
		
<?php } ?>					
				</select>	
			</div>
			
			
				<div class="col-md-3  mb-3">
				<label>Processo</label>
	<select class="form-control" name="cad-esc-processo" id="cad-esc-processo" >
	<option value="0">Escolha</option>	
<?php
$selecao_area=mysqli_query($conexao,"select * from processos order by processo ASC");
while($registros_area=mysqli_fetch_array($selecao_area)){					
?>
	<option value="<?php echo $registros_area['id'] ?>"><?php echo $registros_area['processo'] ?></option>
		
<?php } ?>					
				</select>	
			</div>
			
				<div class="col-md-3  mb-3">
				<label>Atendimento</label>
					<select class="form-control" name="cad-atendimento" id="cad-atendimento" onChange="Calcular1()">
						<option value="0">Escolher</option>
						<option >Atende Razoavelmente</option>
						<option >Atende Totalmente</option>
						<option >Não Atende</option>
						
						
					</select>
			</div>
			
				<div class="col-md-3  mb-3">
				<label>Importância</label>
					<select class="form-control" name="cad-importancia" id="cad-importancia" onChange="Calcular1()">
						<option value="0">Escolher</option>
						<option >Muito Importante</option>
						<option >Importante</option>
						<option >Insignificante</option>
						
						
					</select>
			</div>
			
				<div class="col-md-3  mb-3">
				<label>Análise</label>
					<input type="text" class="form-control" name="cad-analise" id="cad-analise" readonly>
			</div>
			
			<div class="col-md-12 mt-2 ">
				<input type="button" value="Gravar Fator Interno " class="btn btn-primary" onClick="GravarFatorInterno()"  >
			</div>
			
			
			
			<div class="col-md-12 mt-5">
				<div id="carregar-tabela-fatores-internos"></div>
			</div>
			
		</div>
		
		
			
   	</div>		
			
			
	<div id="conteudo3">
		<div class="row ml-4 mr-4">
		
	
			
			<div class="col-md-3 mb-3">
				<label>Fator Externo</label>
				<input type="text" class="form-control" name="cad-fator-interno-externo" id="cad-fator-interno-externo">
			</div>
			
					<div class="col-md-3  mb-3">
				<label>Área</label>
	<select class="form-control" name="cad-esc-area-externo" id="cad-esc-area-externo" >
	<option value="0">Escolha</option>	
<?php
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	
$selecao_area=mysqli_query($conexao,"select * from areas order by area ASC");
while($registros_area=mysqli_fetch_array($selecao_area)){					
?>
	<option value="<?php echo $registros_area['id'] ?>"><?php echo $registros_area['area'] ?></option>
		
<?php } ?>					
				</select>	
			</div>
			
			
				<div class="col-md-3  mb-3">
				<label>Processo</label>
	<select class="form-control" name="cad-esc-processo-externo" id="cad-esc-processo-externo" >
	<option value="0">Escolha</option>	
<?php
$selecao_area=mysqli_query($conexao,"select * from processos order by processo ASC");
while($registros_area=mysqli_fetch_array($selecao_area)){					
?>
	<option value="<?php echo $registros_area['id'] ?>"><?php echo $registros_area['processo'] ?></option>
		
<?php } ?>					
				</select>	
			</div>
			
				<div class="col-md-3  mb-3">
				<label>Momento</label>
					<select class="form-control" name="cad-momento-externo" id="cad-momento-externo" onChange="Calcular2()" >
						<option value="0">Escolher</option>
						<option >Desfavorável</option>
						<option >Neutro</option>
						<option >Favorável</option>
						
						
					</select>
			</div>
			
				<div class="col-md-3  mb-3">
				<label>Importância</label>
					<select class="form-control" name="cad-importancia-externo" id="cad-importancia-externo" onChange="Calcular2()">
						<option value="0">Escolher</option>
						<option >Muito Importante</option>
						<option >Importante</option>
						<option >Insignificante</option>
						
						
					</select>
			</div>
			
				<div class="col-md-3  mb-3">
				<label>Análise</label>
					<input type="text" class="form-control" name="cad-analise-externo" id="cad-analise-externo" readonly>
			</div>
			
			<div class="col-md-12 mt-2 ">
				<input type="button" value="Gravar Fator Externo " class="btn btn-primary" onClick="GravarFatorExterno()" >
			</div>
			
			
			<div class="col-md-12 mt-5">
				<div id="carregar-tabela-fatores-externos"></div>
			</div>
			
		</div>
			
   	</div>	
			
			
	<div id="conteudo4">
		<div class="row ml-4 mr-4">
			
			
			
			
		<form id="form-fatores-internos">
		<div class="col-md-10">	
		<table class="table">
			<tr>
				<th>FATORES INTERNOS</th>
				<th colspan="3" style="text-align: center" bgcolor="#C6C6C6">ATENDIMENTO</th>
				
			</tr>
			
			<tr>
				<td bgcolor="#C6C6C6"><strong>IMPORTÂNCIA</strong></td>
				<td align="center" bgcolor="#E3E3E3"><strong>Não Atende</strong></td>
				<td align="center" bgcolor="#E3E3E3"><strong>Atende Razoavelmente</strong></td>
				<td align="center" bgcolor="#E3E3E3"><strong>Atende Totalmente</strong></td>
			</tr>
			
				<tr>
				<td bgcolor="#E3E3E3" ><strong>Muito Importante</strong></td>
				<td align="center" bgcolor="#E5E951">Fraqueza</td>
				<td align="center" bgcolor="#64A8E7">Força</td>
				<td align="center" bgcolor="#64A8E7">Força</td>
			</tr>
			
			<tr>
				<td bgcolor="#E3E3E3"><strong>Importante</strong></td>
				<td align="center" bgcolor="#E5E951">Fraqueza</td>
				<td align="center" bgcolor="#64A8E7">Força</td>
				<td align="center" bgcolor="#64A8E7">Força</td>
			</tr>
			
			
				<tr>
				<td bgcolor="#E3E3E3"><strong>Insignificante</strong></td>
				<td align="center">Neutro</td>
				<td align="center" bgcolor="#E5E951">Fraqueza</td>
				<td align="center" bgcolor="#E5E951">Fraqueza</td>
			</tr>
		
		</table>
		</div>
			</form>
	</div>	
		
		
		
		
		<div class="row ml-4 mr-4 mt-5">
			
		<div class="col-md-10">	
		<table class="table">
			
			<tr>
				<td bgcolor="#E3E3E3"><strong>CLASSIFICAÇÃO</strong></td>
				<td bgcolor="#E3E3E3"><strong>AÇÃO RECOMENDADA</strong></td>
			</tr>
			
			<tr>
				<td bgcolor="#64A8E7">Força</td>
				<td bgcolor="#64A8E7">
				Utilizar bem as forças para minimizar as ameaças identificadas. Não é necessário realizar o processo de avaliação de riscos para  desenvolvimento de Plano de Ação.
				</td>
			</tr>
			
			
			<tr>
				<td bgcolor="#E5E951">Fraqueza</td>
				<td bgcolor="#E5E951">
				Aproveitar o máximo possível as oportunidades para intensificar os pontos fortes da empresa. Há necessidade de mapear os riscos existentes para desenvolver Plano de Ação.
				</td>
			</tr>
			
			<tr>
				<td>Neutro</td>
				<td>
				Nenhuma recomendação.
				</td>
			</tr>	
		
		</table>
		</div>
	</div>	
		
		
		
	<div class="row ml-4 mr-4 mt-5">
			
		<div class="col-md-10">	
		<table class="table">
			<tr>
				<th>FATORES EXTERNOS</th>
				<th colspan="3" style="text-align: center" bgcolor="#C6C6C6" >MOMENTO</th>
				
			</tr>
			
			<tr>
				<td bgcolor="#C6C6C6"><strong>IMPORTÂNCIA</strong></td>
				<td align="center" bgcolor="#E3E3E3"><strong>Desfavorável</strong></td>
				<td align="center" bgcolor="#E3E3E3"><strong>Favorável</strong></td>
				<td align="center" bgcolor="#E3E3E3"><strong>Neutro</strong></td>
			</tr>
			
				<tr>
				<td bgcolor="#E3E3E3"><strong>Muito Importante</strong></td>
				<td align="center" bgcolor="#FF2D31">Ameaça</td>
				<td align="center"  bgcolor="#2DCD53">Oportunidade</td>
				<td align="center" bgcolor="#FF2D31">Ameaça</td>
			</tr>
			
			<tr>
				<td bgcolor="#E3E3E3"><strong>Importante</strong></td>
				<td align="center" bgcolor="#FF2D31">Ameaça</td>
				<td align="center" bgcolor="#2DCD53">Oportunidade</td>
				<td align="center" bgcolor="#FF2D31">Ameaça</td>
			</tr>
			
			
				<tr>
				<td bgcolor="#E3E3E3"><strong>Insignificante</strong></td>
				<td align="center">Neutro</td>
				<td align="center">Neutro</td>
				<td align="center">Neutro</td>
			</tr>
		
		</table>
		</div>
	</div>		
		
		
	<div class="row ml-4 mr-4 mt-5">
			
		<div class="col-md-10">	
		<table class="table">
			
			<tr>
				<td><strong>CLASSIFICAÇÃO</strong></td>
				<td><strong>AÇÃO RECOMENDADA</strong></td>
			</tr>
			
			<tr>
				<td bgcolor="#FF2D31">Ameaça</td>
				<td bgcolor="#FF2D31">
				Adotar estratégia que minimize as fraquezas para que as ameaças tenham menor efeito na empresa. Recomenda-se mapear possíveis riscos para desenvolver Plano de Ação.
				</td>
			</tr>
			
			
			<tr>
				<td bgcolor="#2DCD53">Oportunidade</td>
				<td bgcolor="#2DCD53">
				Aproveitar as oportunidades, tentando minimizar os efeitos das fraquezas existentes. A organização poderá livremente optar por desenvolver ou não um Plano de Ação em carácter preventivo.
				</td>
			</tr>
			
			<tr>
				<td>Neutro</td>
				<td>
				Nenhuma recomendação.
				</td>
			</tr>	
		
		</table>
		</div>
	</div>		
		
   	</div>			
			
			
	<div id="conteudo5">
		
		
		<div class="row ml-2 mr-2 mb-5"> 
			<div class="col-md-12">
		<h3 class="mb-5 mt-2">SWOT</h3>			
	<h5 style="margin-top: -25px" class="mb-0">Análise SWOT para levantamento de fatores de riscos a partir da análise de contexto interno e externo</h5>	
			</div>		
		</div>
		
		<div class="row ml-5 mr-5 mt-5 ">
			
				
			
			<div class="col-md-2"></div>
			
			<div class="col-md-5">
				<h5><strong>Positivos(Ajuda)</strong></h5>
			</div>
			
			<div class="col-md-5">
				<h5><strong>Negativos(Atrapalha)</strong></h5>
			</div>
			
			
			<div class="col-md-2 justify-content-center align-self-center">
				<h5>Interno</h5>
			</div>
			
			<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');	
			
				$selecao1=mysqli_query($conexao,"select * from tabela_fatores_internos WHERE codigo_contexto='$codigo' and analise='Força'");
				$numeros1=mysqli_num_rows($selecao1);
			?>
			<div class="col-md-5 p-4 d-flex align-items-center justify-content-center h-100 pointer " style="background-color: cornflowerblue; min-height: 150px" onClick="Filtrar('Forças')">
				<h4>Forças(<?php echo $numeros1 ?>)</h4>
			</div>
			
			
			<?php
				$selecao2=mysqli_query($conexao,"select * from tabela_fatores_internos WHERE codigo_contexto='$codigo' and analise='Fraqueza'");
				$numeros2=mysqli_num_rows($selecao2);
			?>
			<div class="col-md-5 p-4 d-flex align-items-center justify-content-center h-100 pointer" style="background-color:yellow; min-height: 150px" onClick="Filtrar('Fraquezas')">
				<h4>Fraquezas(<?php echo $numeros2 ?>)</h4>
			</div>
			
			<div class="col-md-2 justify-content-center align-self-center">
				<h5>Externo</h5>
			</div>
			
			<?php
				$selecao3=mysqli_query($conexao,"select * from tabela_fatores_externos WHERE codigo_contexto='$codigo' and analise='Oportunidade'");
				$numeros3=mysqli_num_rows($selecao3);
			?>
			<div class="col-md-5 p-4 d-flex align-items-center justify-content-center h-100 pointer" style="background-color:green; min-height: 150px" onClick="Filtrar('Oportunidades')">
				<h4>Oportunidades(<?php echo $numeros3 ?>)</h4>
			</div>
			
			
			<?php
				$selecao4=mysqli_query($conexao,"select * from tabela_fatores_externos WHERE codigo_contexto='$codigo' and analise='Ameaça'");
				$numeros4=mysqli_num_rows($selecao4);
			?>
			<div class="col-md-5 p-4 d-flex align-items-center justify-content-center h-100 pointer" style="background-color:red; min-height: 150px" onClick="Filtrar('Ameaças')">
				<h4>Ameaças(<?php echo $numeros4 ?>)</h4>
			</div>
			
			
		</div>
	</div>	
			
		</div>	
			
	</div>
	</form>
	
	
	
	<!-- Modal -->
<div class="modal fade" id="ModalCadastroMembro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Membro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<div class="row ml-4 mr-4 mt-4 mb-4"> 

	<div class="col-md-8">
		<select class="form-control" name="esc-membro" id="esc-membro">
			<option>Escolher Membro</option>
		<?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa order by nome ASC");
			while($registros=mysqli_fetch_array($selecao_usuario)){	   
		?>
		
			<option value="<?php echo $registros['id'] ?>"><?php echo $registros['nome'] ?></option>
			
			
		<?php } ?>	
			
		</select>
	</div>
	
	<div class="col-md-12 mt-3">
		<input type="button" class="btn btn-primary" value="Adicionar Membro" onClick="AdicionarMembro()">		
	</div>		
			
			
</div>  
	  	  
		  
      </div>
      <div class="modal-footer">
        
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

		
	$j=jQuery.noConflict()
		
		
		
		
function Abas(codigo){
	
if(codigo==1){	

$j('#conteudo1').show()	
$j('#conteudo2').hide()		
$j('#conteudo3').hide()	
$j('#conteudo4').hide()
$j('#conteudo5').hide()	
	
$j("#btn1").addClass('btn-primary')	
$j("#btn1").css('color','white')		
	
$j("#btn2").removeClass('btn-primary')
$j("#btn2").css('color','black')		
	
$j("#btn3").removeClass('btn-primary')
$j("#btn3").css('color','black')		
	
$j("#btn4").removeClass('btn-primary')
$j("#btn4").css('color','black')
	
$j("#btn5").removeClass('btn-primary')
$j("#btn5").css('color','black')		
	
}
	
	
if(codigo==2){	

$j('#conteudo2').show()	
$j('#conteudo1').hide()		
$j('#conteudo3').hide()	
$j('#conteudo4').hide()	
$j('#conteudo5').hide()		

$j("#btn2").addClass('btn-primary')	
$j("#btn2").css('color','white')	
	
$j("#btn1").removeClass('btn-primary')
$j("#btn1").css('color','black')		
	
$j("#btn3").removeClass('btn-primary')
$j("#btn3").css('color','black')		
	
$j("#btn4").removeClass('btn-primary')
$j("#btn4").css('color','black')
	
$j("#btn5").removeClass('btn-primary')
$j("#btn5").css('color','black')		
	
	
}
	
	
if(codigo==3){	

$j('#conteudo3').show()	
$j('#conteudo1').hide()		
$j('#conteudo2').hide()	
$j('#conteudo4').hide()	
$j('#conteudo5').hide()		

$j("#btn3").addClass('btn-primary')	
$j("#btn3").css('color','white')	
	
$j("#btn1").removeClass('btn-primary')
$j("#btn1").css('color','black')		
	
$j("#btn2").removeClass('btn-primary')
$j("#btn2").css('color','black')		
	
$j("#btn4").removeClass('btn-primary')
$j("#btn4").css('color','black')
	
$j("#btn5").removeClass('btn-primary')
$j("#btn5").css('color','black')		
	
	
}		

	
if(codigo==4){	

$j('#conteudo4').show()	
$j('#conteudo1').hide()		
$j('#conteudo2').hide()	
$j('#conteudo3').hide()	
$j('#conteudo5').hide()		

$j("#btn4").addClass('btn-primary')	
$j("#btn4").css('color','white')	
	
$j("#btn1").removeClass('btn-primary')
$j("#btn1").css('color','black')		
	
$j("#btn2").removeClass('btn-primary')
$j("#btn2").css('color','black')		
	
$j("#btn3").removeClass('btn-primary')
$j("#btn3").css('color','black')
	
$j("#btn5").removeClass('btn-primary')
$j("#btn5").css('color','black')		
	
}
	
	
if(codigo==5){	

$j('#conteudo5').show()	
$j('#conteudo1').hide()		
$j('#conteudo2').hide()	
$j('#conteudo3').hide()	
$j('#conteudo4').hide()		

$j("#btn5").addClass('btn-primary')	
$j("#btn5").css('color','white')	
	
$j("#btn1").removeClass('btn-primary')
$j("#btn1").css('color','black')		
	
$j("#btn2").removeClass('btn-primary')
$j("#btn2").css('color','black')		
	
$j("#btn3").removeClass('btn-primary')
$j("#btn3").css('color','black')
	
$j("#btn4").removeClass('btn-primary')
$j("#btn4").css('color','black')		
	
}		
	
	
	
}	
		
		
		
		
function AdicionarMembro(){
	
		var usuario=$("#esc-membro option:selected").val()
		
		
		 $.ajax({
		  type: 'post',
		  data: 'codigo_usuario='+usuario,
		  url:'funcoes/gravar-membro-swot.php',
		  success: function(retorno){ 
		$('.close').trigger('click')
		$("#carregar-tabela-membros").load('funcoes/carregar-tabela-membros-contexto.php')
			  	
      }
       })	
			
	
}		
		
		
		
		
	$j(document).ready(function(){
		
		CarregarTabelaMembros()
		CarregarTabelaFatoresInternos()
		CarregarTabelaFatoresExternos()
		CarregarFatoresInternos()
		CarregarFatoresExternos()
	})	
		
	
	function CarregarTabelaMembros(){
		  $j.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo; ?>',
			  url:'funcoes/carregar-tabela-membros-contexto.php',
			  success: function(retorno){
				 
		$j("#carregar-tabela-membros").html(retorno)
				
		  }
		   })  
		
	}
		
							function ExcluirIntegrantes(codigo){
		
			if (window.confirm("Você deseja excluir o Integrante?")) {

	  $j.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-integrante-swot-oficial.php',
			  success: function(retorno){
location.reload()
		  }
		   })  	
}}	
		
		function LimparTabelaFatoresInternos(){
$j("#cad-esc-area").val($j("#cad-esc-area option:first").val());
$j("#cad-esc-processo").val($j("#cad-esc-processo option:first").val());;
$j("#cad-atendimento").val($j("#cad-atendimento option:first").val());
$j("#cad-importancia").val($j("#cad-importancia option:first").val());
$j('#cad-analise').val('');
$j('#cad-analise').css('background-color','white')
			
}
		
		
		function LimparTabelaFatoresExternos(){
$j("#cad-fator-interno-externo").val($j("#cad-fator-interno-externo option:first").val());
$j("#cad-esc-area-externo").val($j("#cad-esc-area-externo option:first").val());;
$j("#cad-atendimento-externo").val($j("#cad-atendimento-externo option:first").val());
$j("#cad-esc-processo-externo").val($j("#cad-esc-processo-externo option:first").val());
$j("#cad-importancia-externo	").val($j("#cad-importancia-externo	 option:first").val());	
$j("#cad-momento-externo		").val($j("#cad-momento-externo		 option:first").val());			
	
			
$j('#cad-analise-externo').val('');
$j('#cad-analise-externo').css('background-color','white')
			
}		
		
		
		
	
	function CarregarTabelaFatoresInternos(){
		
LimparTabelaFatoresInternos()
		
		  $j.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo ?>',
			  url:'funcoes/carregar-tabela-fatores-internos-oficial.php',
			  success: function(retorno){
				 
		$j("#carregar-tabela-fatores-internos").html(retorno)
				
		  }
		   })  
	}	
		
		
	function CarregarTabelaFatoresExternos(){
		LimparTabelaFatoresExternos()		 
		  $j.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo ?>',
			  url:'funcoes/carregar-tabela-fatores-externos-oficial.php',
			  success: function(retorno){
				 
		$j("#carregar-tabela-fatores-externos").html(retorno)
				  CarregarFatoresExternos()
				
		  }
		   })  
	}			
		
		
	function GravarFatorInterno(){
	
		var Fator = $('#cad-fator-interno').val()
		var Area = $('#cad-esc-area option:selected').val()
		var Processo = $('#cad-esc-processo option:selected').val()
		var Atendimento = $('#cad-atendimento option:selected').val()
		var Importancia = $('#cad-importancia option:selected').val()
		var Analise = $('#cad-analise').val()
		
		$.ajax({
		
		type: 'post',
		data: 'fator='+Fator+'&area='+Area+'&processo='+Processo+'&atendimento='+Atendimento+'&importancia='+Importancia+'&analise='+Analise,
		 url:'funcoes/gravar-fatores-internos.php',
		success: function(retorno){
			
			$('#cad-fator-interno').val('')
			
LimparTabelaFatoresInternos()
		
			
			CarregarTabelaFatoresInternos()
		}
			   })
		
	}	
		
		
		function GravarFatorExterno(){
	
		var Fator = $('#cad-fator-interno-externo').val()
		var Area = $('#cad-esc-area-externo option:selected').val()
		var Processo = $('#cad-esc-processo-externo option:selected').val()
		var Momento = $('#cad-momento-externo option:selected').val()
		var Pontuacao = $('#cad-pontuacao option:selected').val()
		var Importancia = $('#cad-importancia-externo option:selected').val()
		var Analise = $('#cad-analise-externo').val()
		
		$.ajax({
		
		type: 'post',
		data: 'fator='+Fator+'&area='+Area+'&processo='+Processo+'&momento='+Momento+'&importancia='+Importancia+'&pontuacao='+Pontuacao+'&analise='+Analise,
		 url:'funcoes/gravar-fatores-externos.php',
		success: function(retorno){
		LimparTabelaFatoresExternos()		 

		CarregarTabelaFatoresExternos()	
		}
			   })
		
	}		
		
		
		
		
		
	function Calcular1(){
	
	var cor = '';	
	var atendimento = $j("#cad-atendimento option:selected").val()
	var importancia = $j("#cad-importancia option:selected").val()
	
	if(atendimento=='Não Atende' && importancia =='Muito Importante' ){var analise= 'Fraqueza';cor='#E5E951' }
	if(atendimento=='Não Atende' && importancia =='Importante' ){var analise= 'Fraqueza';cor='#E5E951'}	
	if(atendimento=='Não Atende' && importancia =='Insignificante' ){var analise= 'Neutro';cor='white'}	
		
	if(atendimento=='Atende Razoavelmente' && importancia =='Muito Importante' ){var analise= 'Força';cor ='#64A8E7'}		
	if(atendimento=='Atende Razoavelmente' && importancia =='Importante' ){var analise= 'Força';cor ='#64A8E7'}	
	if(atendimento=='Atende Razoavelmente' && importancia =='Insignificante' ){var analise= 'Fraqueza';cor='#E5E951'}		
		
	if(atendimento=='Atende Totalmente' && importancia =='Muito Importante' ){var analise= 'Força';cor ='#64A8E7'}		
	if(atendimento=='Atende Totalmente' && importancia =='Importante' ){var analise= 'Força';cor ='#64A8E7'}	
	if(atendimento=='Atende Totalmente' && importancia =='Insignificante' ){var analise= 'Fraqueza';cor='#E5E951'}		
		
	
	$j('#cad-analise').val(analise)
	$j('#cad-analise').css("background-color", cor)
	}
		

	function Calcular2(){
	
	var cor = '';	
	var momento = $j("#cad-momento-externo option:selected").val()
	var importancia = $j("#cad-importancia-externo option:selected").val()
	

	
	if(momento=='Desfavorável' && importancia =='Muito Importante' ){var analise= 'Ameaça';cor='#E5E951' }
	if(momento=='Desfavorável' && importancia =='Importante' ){var analise= 'Ameaça';cor='#E5E951'}	
	if(momento=='Desfavorável' && importancia =='Insignificante' ){var analise= 'Neutro';cor='white'}	
		
	if(momento=='Favorável' && importancia =='Muito Importante' ){var analise= 'Oportunidade';cor ='#64A8E7'}		
	if(momento=='Favorável' && importancia =='Importante' ){var analise= 'Oportunidade';cor ='#64A8E7'}	
	if(momento=='Favorável' && importancia =='Insignificante' ){var analise= 'Neutro';cor='#E5E951'}		
		
	if(momento=='Neutro' && importancia =='Muito Importante' ){var analise= 'Ameaça';cor ='#64A8E7'}		
	if(momento=='Neutro' && importancia =='Importante' ){var analise= 'Ameaça';cor ='#64A8E7'}	
	if(momento=='Neutro' && importancia =='Insignificante' ){var analise= 'Neutro';cor='#E5E951'}		
		
	
	$j('#cad-analise-externo').val(analise)
	$j('#cad-analise-externo').css("background-color", cor)
	}	
		
		
	function ExcluiFatoresInternos(codigo){
		
			if (window.confirm("Você deseja excluir o Fator Interno?")) {

	  $j.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-fator-interno.php',
			  success: function(retorno){
CarregarTabelaFatoresInternos()
		  }
		   })  	
}}	
		
			function ExcluirIntegrantes(codigo){
		
			if (window.confirm("Você deseja excluir o Integrante?")) {

	  $j.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-integrante-swot.php',
			  success: function(retorno){
CarregarTabelaFatoresInternos()
		  }
		   })  	
}}	
		
		
		function ExcluiFatoresExternos(codigo){
		
			if (window.confirm("Você deseja excluir o Fator Externo?")) {

	  $j.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-fator-externo.php',
			  success: function(retorno){
CarregarTabelaFatoresExternos()
		  }
		   })  	
}}	
		
		
	function CarregarFatoresInternos(){
		
			
			
	$j("#tabela-fatores-internos").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            })  
		
	}	
		
		
		
	function CarregarFatoresExternos(){

			
	$j("#tabela-fatores-externos").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            })  
	
		
	}	
		
	
	
	</script>
	
	<script>
	$j(".datepicker").datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
}); 
		  
		  
  $j(function() {
    $j(".datepicker").datepicker();
  } );
	
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