<link rel="shortcut icon" href="imgs/favicon.fw.png" /><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard Philos</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
		
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$codigo=$_REQUEST['cod'];
	
?>	
<!-- Navegação !-->	
	
<form action="processa-cadastro-atividade.php" method="post">	
	<input type="hidden" name="codigo-tarefa" id="codigo-tarefa" value="<?php echo $codigo ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Cadastro atividade</span></a>
						</div>
					</div>
					
					
				</div>
			</div>	
			
		
			<div class="row">
				<div class="col-12">
					
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Cadastro Atividade </h3>			
	
		
<div class="row ml-4 mr-4">		
		
			
	<div class="col-md-6 mb-4">
		<label>Título Atividade</label>
		<input type="text" name="cad-titulo-atividade" id="cad-titulo-atividade" class="form-control" required>
	</div>
	
	<div class="col-md-6 mb-4">
		<label>Prioridade</label>
		
		<select name="cad-prioridade-atividade" id="cad-prioridade-atividade" class="form-control" >
			<option>Baixa</option>
			<option>Média</option>
			<option>Alta</option>
		</select>
	</div>
	
	<div class="col-md-12">
		<label>Descrição</label>
		<textarea class="form-control" cols="5" rows="5" name="cad-descricao-atividade" id="cad-descricao-atividade"></textarea>
	</div>	
	
	<div class="col-md-12 mt-4">
		<input type="submit" class="btn btn-primary" value="Cadastrar Atividade">
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
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>
	
	<script>

$c=jQuery.noConflict();		
		
		
function Terceiros(contador){
	
if(contador=='s'){	
	
var  variavel = $c('#contador_terceiros').val()	
var variavel = parseInt(variavel)
$c('#terc'+variavel).show()	

$c('#resposta-terceiros').append('<div id=terc'+variavel+'></div>')	
$c('#contador_terceiros').val(variavel+1)	
$c('#terc'+variavel).load('terceiros.php')
$c('.cad-funcao').attr('name', 'cad-funcao'+variavel+'[]');	
$c('.cad-operacao').attr('name', 'cad-funcao'+variavel+'[]');	
}
		
if(contador=='n'){	
	var  variavel = $c('#contador_terceiros').val()	
	var variavel = parseInt(variavel-1)
	
	$c('#terc'+variavel).hide()	
	$c('#contador_terceiros').val(variavel)
	$c('.cad-funcao').attr('name', 'cad-funcao'+variavel+'[]');	
	$c('.cad-operacao').attr('name', 'cad-funcao'+variavel+'[]');	
	
}
	
}		
		
function Filiais(contador){
	
if(contador=='s'){	
	
var  variavel = $c('#contador_filiais').val()	
var variavel = parseInt(variavel)
$c('#fili'+variavel).show()	

$c('#resposta-filiais').append('<div id=fili'+variavel+'></div>')	
$c('#contador_filiais').val(variavel+1)	
$c('#fili'+variavel).load('filiais.php')
	

}
		
if(contador=='n'){	
	var  variavel = $c('#contador_filiais').val()	
	var variavel = parseInt(variavel-1)
	
	$c('#fili'+variavel).hide()	
	$c('#contador_filiais').val(variavel)	
	
}
	
}
		
		
		
function AddFrete(){
	
	$c('.div-frete').toggle()
	
	
}	
		
		
function GravarFrete(){ 
	var variavel = $c('#cad-novo-frete').val()
	 $c.ajax({
		  type: 'post',
		  data: 'frete='+variavel,
		  url:'funcoes/gravar-frete.php',
		  success: function(retorno){
		  $c('#resposta-frete').html(retorno); 
		CarregaFrete()	  
      }
       })
	
}	
		
		
function DelFrete(){ 
	var variavel = $c('#tipo-frete-terceiro').val()
	
	 $c.ajax({
		  type: 'post',
		  data: 'frete='+variavel,
		  url:'funcoes/excluir-frete.php',
		  success: function(retorno){
		  $c('#resposta-frete').html(retorno); 
			CarregaFrete()  
			  
      }
       })
	
	
	
}			
		
function CarregaFrete(){
	
	$c("#carrega-frete").load("funcoes/carrega-frete.php")
	
}		
		
		
</script>
	

 	
<script type="text/javascript">
	
	$d=jQuery.noConflict();	
		$d(document).ready(function(){ 
		$d("#cad-cep").focusout(function(){ 
			//Início do Comando AJAX
			$d.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$d(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
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