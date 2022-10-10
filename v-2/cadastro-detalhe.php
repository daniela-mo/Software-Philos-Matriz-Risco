<?php

$nav_menu_principal='riskassesment';
$nav_menu_pagina='cadastro-certificacao';
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$obterdominio=$_SESSION['dominio'];
	$codigo=$_REQUEST['cod'];
?>	
<!-- Navegação !-->	
	
	<form action="processa-cadastro.php" method="post">
	<div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 5000">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard</span></a>
						</div>
					</div>
					
					
				</div>
			</div>
			
			<?php
				mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao=mysqli_query($conexao,"select * from cadastro WHERE id='$codigo'");
			$registros=mysqli_fetch_array($selecao);
			
			$modalidade=$registros['modalidade'];
			
			?>
			
			<div class="row ml-4 mr-4">
				<div class="col-12">
					<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>	
				<h3 class="mt-3 mb-3">Cadastro 
					
				<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='9' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	
				<a href="editar-cadastro.php?cod=<?php echo $codigo ?>">
				<img src="imgs/icone-editar.png" width="30" height="30" alt=""/>
				</a>
			<?php } ?>	
					
					
					</h3>	
					
					
					<div id="resposta">
					</div>
				</div>
				
				
				<div class="col-md-3 mb-3">
					<label>CNPJ</label>

					<input type="text" class="form-control" name="cad-codigo" id="cad-codigo" readonly value="<?php echo $cnpj=$registros['cnpj'] ?> ">
					
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Data do Requerimento</label>
					<input type="text" class="form-control datepicker" name="cad-data-requerimento" id="cad-requerimento" readonly value="<?php echo $registros['data_requerimento'] ?> " >
				</div>
				
				<div class="col-md-3 mb-3">
					<label>N° de Requerimento</label>
					<input type="text" class="form-control" name="cad-numero-requerimento" id="cad-numero-requerimento" readonly value="<?php echo $registros['numero_requerimento'] ?> ">
				</div>
				
							
					
				
				<div class="col-md-3 mb-3">
					<label>Data validação pela RFB</label>
					<input type="text" class="form-control datepicker" name="cad-data-validacao" id="cad-data-validacao" readonly value="<?php echo $registros['data_validacao'] ?> ">
				</div>
				
					<div class="col-md-3 mb-3">
					<label>Data Certificação</label>
					<input type="text" class="form-control datepicker" name="cad-data-certificacao" id="cad-data-certificacao" readonly value="<?php echo $registros['data_certificacao'] ?> ">
				</div>
				
				<div class="col-md-2 mb-3">
					<label>N° Certificado</label>
					<input type="text" class="form-control" name="cad-numero-certificado" id="cad-numero-certificado" value="<?php echo $registros['numero_certificacao'] ?> " readonly>
				</div>
				
				<div class="col-md-5 mb-3">
					<label>Modalidade de Certificação</label>
					<input type="text" class="form-control" name="cad-modalidade-certificacao" id="cad-modalidade-certificacao" required readonly value="<?php echo $registros['modalidade'] ?> ">
				</div>
				
			</div>
			
			
		<div class="row ml-4 mr-4">
			<div class="col-md-12">
				<h4 class="mt-3 mb-3">Funções</h4>
			<?php
				$selecao_funcoes=mysqli_query($conexao,"select * from cadastro_funcoes WHERE codigo_cadastro='$codigo'");
				 while($registros_funcoes=mysqli_fetch_array($selecao_funcoes)){
			?>
				
			<li><?php echo $registros_funcoes['funcao'] ?></li>

				
				<?php } ?>	
				
			</div>	
		</div>	
			
			
			
		<div class="row ml-4 mr-4">
			<div class="col-md-12">
				<h4 class="mt-3 mb-3">Anexos</h4>
				
			<table class="table table-striped">
				
				<?php
	$selecao2=mysqli_query($conexao,"select * from upload_cadastro WHERE codigo_cadastro='$codigo'");
	while($registros2=mysqli_fetch_array($selecao2)){
		
				?>
				<tr>
					<td><img src="imgs/icone-documento.png" width="18" alt=""/> <?php echo $registros2['arquivo'] ?></td>
					
					<td>
						<a href="<?php echo $obterdominio ?>/uploads-cadastro/<?php echo $registros2['arquivo'] ?>" class="float-right">
						<img src="imgs/download.png" width="25" alt=""/>
						</a>
					</td>
				</tr>
				
	<?php } ?>			
				
				</table>	
				
				
			</div>	
			
			
			
			<div class="col-md-12">
				<h4 class="mt-3 mb-3">Outras Modalidades cadastradas para o mesmo CNPJ</h4>
			
			<?php
				$selecao_modalidades=mysqli_query($conexao,"select * from cadastro WHERE cnpj='$cnpj' and modalidade !='$modalidade' ");
				while($registros_modalidades=mysqli_fetch_array($selecao_modalidades)){
					
			?>	
				
				<a href="cadastro-detalhe.php?cod=<?php echo $registros_modalidades['id'] ?>"><?php echo $registros_modalidades['modalidade'] ?></a><br>

				
			<?php
					}
				?>
				
			</div>
			
			
		</div>
			
			
			
			
			<div class="row ml-4 mr-4">
			
				<div class="col-md-6" id="retorno-modalidade">
					
					
				</div>
				
				
					<div class="col-md-6" id="retorno-funcao">
									
						
						
				</div>
				
				
			
			</div>
			
		</div>

	</div>
	</form>
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	
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
    $f(".datepicker").datepicker();
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