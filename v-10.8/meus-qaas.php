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
	
</head>
	
<style>

a.list-group-item {
   color:black;
}

a.list-group-item.active,
a.list-group-item.active:hover,
a.list-group-item.active:focus {
    color: white;
    background-color: #3A81BE;
    border: solid 1px #E5E5E5 ;
}
	
	
	a.list-group-item{
	background-color: white;	
	}	

.list-group-level1 .list-group-item {
    padding-left:30px;
}

.list-group-level2 .list-group-item {
    padding-left:60px;
}
	
	.active{
		background-color: #3A81BE;
		color:white;
		text-decoration: none;
	}
	
	.active a{
	
		color:white;
		text-decoration: none;
	}	
</style>	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	
	
	
	$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario'");
	$registros_usuarios=mysqli_fetch_array($selecao_usuario);
	$codigo_usuario=$registros_usuarios['id'];
	
	
	
	
	
	$codigo_qaa=$_REQUEST['cod'];
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	/*Obter dados da empresa como por exemplo CNPJ para fazer buscas*/
	$obterdados=mysqli_query($conexao,"select * from cadastro WHERE id='$codigo_qaa'");
	$registros_dados=mysqli_fetch_array($obterdados);
	$cnpj=$registros_dados['cnpj'];
	
	
	
?>	
<!-- Navegação !-->	
	<input type="hidden" id="codigo-qaa" value="<?php echo $codigo_qaa ?>">
	<form action="processa-gravar-qaa.php" method="post">
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | <a href="qaas.php" class="text-light">QAAs </a>| Cadastro QAA</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row ml-1 mr-1">
				<div class="col-12">
				<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>		
					
				
					
 					<h3 class="mb-4 mt-4">QAA</h3>			
				</div>
				
				
				<div class="col-md-5 mt-4">
					<p><strong>Questões QAA</strong> </p> 
					
					
				
					
					
					
				   <div id="main-menu" class="list-group">
  
	<?php
	$a=1;

		   
	$selecao1=mysqli_query($conexao,"select * from cadastro WHERE cnpj='$cnpj'");
	while($registros1=mysqli_fetch_array($selecao1)){
	$modal=$registros1['codigo_modalidade'];?>				   
					   
					   
					   
<?php 
	
	$selecao_blocos_modalidades=mysqli_query($conexao,"select * from blocos_modalidades WHERE codigo_modalidade='$modal'");
	while($registros_blocs_modalidades=mysqli_fetch_array($selecao_blocos_modalidades)){	
	$cod_bloco=$registros_blocs_modalidades['codigo_bloco'];	
	

		
		
	$selecao=mysqli_query($conexao,"select * from blocos_qaa WHERE id='$cod_bloco' ");
	$registros=mysqli_fetch_array($selecao);
	$codigo_bloco=$registros['id'];	
?>					   

					   <div class="list-group-item">
<a class="text-dark" href="#sub-menu<?php echo $a ?>"  data-toggle="collapse" data-parent="#main-menu">
	<strong><?php echo $registros['bloco'] ?></strong> 
	
	<?php

		$pesquisar=mysqli_query($conexao,"select * from questoes_qaa WHERE codigo_bloco='$codigo_bloco'");
		$registros_pesquisa=mysqli_fetch_array($pesquisar);
		$numero=mysqli_num_rows($pesquisar);
		if($numero>0){
	?>	
	<i class="fa fa-angle-down"></i>
	<?php } ?>
	
</a>
						   
						   
					   </div>						   
						   
						   
	<div class="collapse list-group-level1" id="sub-menu<?php echo $a ?>">	
	<?php
		
	$selecao2=	mysqli_query($conexao,"select * from questoes_qaa WHERE codigo_bloco='$codigo_bloco' and questao_principal=''");
	while($registros2=mysqli_fetch_array($selecao2)){
	$codigo_questao=$registros2['id'];	
	?>	
					<div class="list-group-item "  id="item-de-menu<?php echo $registros2['id'] ?>">
                     <a href="#sub-sub-menu1" class="text-dark"  data-toggle="collapse" data-parent="#sub-menu" >
						<?php echo $registros2['titulo'] ?> 
						 
						 <?php
		$selecao4=mysqli_query($conexao,"select * from questoes_qaa WHERE questao_principal ='$codigo_questao'");
		$registros4=mysqli_fetch_array($selecao4);
		if($registros4>0){?>
		<i class="fa fa-angle-down"></i>				 
						 
						 <?php  };
					?>
					</a>
						
							
						
					</div>
   
		
	<!-------QUESTÕES QAA------>	
		
	<?php
		$selecao3=mysqli_query($conexao,"select * from questoes_qaa WHERE questao_principal ='$codigo_questao' ");
		while($registros3=mysqli_fetch_array($selecao3)){
	?>
                    <div class="collapse list-group-level2" id="sub-sub-menu1">
                        <a href="#" onClick="ClicarQuestao(<?php echo $registros3['id'] ?>)"  class="list-group-item" data-parent="#sub-sub-menu">
							<?php echo $registros3['titulo'] ?>
						</a>
                    </div>
	<?php  } ?>	
		
	<!-------FINAL QUESTÕES QAA------>			
	
                
		<?php   } ?>			   
	</div>
					   
					   
					   
<?php $a= $a+1; } }  ?>					   
              
              
                 
                
            </div>
					
				
				</div>
				
				<div class="col-md-7 mt-4" id="resposta-questoes">
				</div>
				
				
				
				
				
				
			</div>
		</div>

	</div>
		
	<input type="hidden" id="obter-codigo-bloco">	

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
		  <input type="text" class="form-control" id="cad-bloco" >
		  
		  <label class="mt-3">Modalidade</label>	
		  <?php
		  	$selecao_modalidades=mysqli_query($conexao,"select * from modalidades");
		  	while($registros_modalidades=mysqli_fetch_array($selecao_modalidades)){
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
		
		

	
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	
	
	
	<script>
		$var=jQuery.noConflict()
		
		function AddQuestao(codigo_bloco){
			
		$var('#obter-codigo-bloco').val(codigo_bloco)	
			
		}
		
		
	
		
		
		
		function ClicarQuestao(variavel){
		  $var.ajax({
		  type: 'post',
		  data: 'codigo='+variavel,
		  url:'funcoes/questoes-qaa-usuario.php',
		  success: function(retorno){
		  $var('#resposta-questoes').html(retorno); 
			  
		Active(variavel)	  
			  
      }
       })}
		
		
		function GravarResposta(variavel){
			
		var CodigoQuestao= variavel;
		var usuario = "<?php echo $codigo_usuario ?>";
		var resposta = $var('#quest-resposta').val()
		var titulo = $var('#quest-titulo').val()
		
		
			  $var.ajax({
		  type: 'post',
		  data: 'codigo_questao='+variavel+'&usuario='+usuario+'&resposta='+resposta+'&titulo='+titulo,
		  url:'funcoes/gravar-questoes-qaa-usuario.php',
		  success: function(retorno){
		  $var('#resposta-alerta').html(retorno); 
			  	
			  
		Active(variavel)	  
			  
      }
       })
		
		
		}
		
		
	
		
		
		</script>
	

		

	<script>
	
		function Uploads(variavel){
			
		if(variavel=='s'){
		
			$var('#upload-arquivos').load('upload-arquivos.php')
			
		}
			
		}
		
	
		
	</script>	
		
		
	
		
		
</body>
</html>