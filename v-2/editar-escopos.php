<?php  
$nav_menu_principal='gestaoderisco';
$nav_menu_pagina='escopos';
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
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
		
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$cod=$_REQUEST['cod'];
	
		mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao=mysqli_query($conexao,"select * from escopos WHERE id='$cod'");
	$registros=mysqli_fetch_array($selecao);
?>	
<!-- Navegação !-->	
	
<form action="processa-editar-escopo.php" method="post">
	<input type="hidden" name="cad-codigo" id="cad-codigo" value="<?php echo $cod ?>">
	
	<div class="content-wrapper">
		<div class="container-fluid">
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Cadastro Bia</span></a>
						</div>
					</div>
					
				
				</div>
			</div>	
			<div class="row">
				<div class="col-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'>				
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Editar Cadastro Bia 
						
					</h3>			
				
	<div class="row ml-4 mr-4 mt-5">
		
	<div class="col-md-4 mb-4">
			<label>Processo</label>
		<input type="text"  class="form-control" name="cad-processo" id="cad-processo" value="<?php echo $registros['processo'] ?>" >
		
		
		</div>		
	
		<div class="col-md-4 mb-4">
			<label>Área</label>
		<input type="text"  class="form-control" name="cad-area" id="cad-area" value="<?php echo $registros['area'] ?>" >
		
		</div>			
					
			<div class="col-md-4 mb-4">
			<label>Responsáveis</label>
				
				
		<select class="form-control" name="cad-responsavel">
			<option><?php echo $registros['responsavel'] ?></option>
		<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao_processos=mysqli_query($conexao,"select * from usuarios_empresa order by nome ASC");
			while($registros_processos=mysqli_fetch_array($selecao_processos)){
		?>
		
		<option><?php echo $registros_processos['nome'] ?>|<?php echo $registros_processos['email'] ?></option>
		
		<?php } ?>
		</select>
		</div>	
		
		
		
		<div class="col-md-4 mb-4">
			<label>Impacto</label>
		
		<select class="form-control" name="cad-impacto" id="selecao-impacto" onChange="Bia1()">
			<option ><?php echo $registros['impacto'] ?></option>
		<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao_processos=mysqli_query($conexao,"select * from tabela_impacto_negocios");
			while($registros_processos=mysqli_fetch_array($selecao_processos)){
		?>
		
		<option value="<?php echo $registros_processos['numero'] ?>"><?php echo $registros_processos['impacto'] ?></option>
		
		<?php } ?>
		</select>
		</div>	
		
			
		<div class="col-md-4 mb-4">
			<label>Req. para Recuperação</label>
			
		
			
		<select class="form-control" name="cad-requisito" id="selecao-requisitos-recuperacao" onChange="Bia1()">
			<option><?php echo $registros['requisito_recuperacao'] ?></option>
		<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao_processos=mysqli_query($conexao,"select * from tabela_requisitos_recuperacao");
			while($registros_processos=mysqli_fetch_array($selecao_processos)){
		?>
		
		<option value="<?php echo $registros_processos['numero'] ?>"><?php echo $registros_processos['nivel'] ?></option>
		
		<?php } ?>
		</select>
		</div>	
		
		
		
		
			
		<div class="col-md-4 mb-4">
			<label>Nível de Criticidade</label>
			<input type="text"  class="form-control" name="cad-criticidade" id="resposta-requisitos-recuperacao" value="<?php echo $registros['nivel_criticidade'] ?>" readonly >
		
		</div>	
		
		
		<div class="col-md-6 mb-4">
			<label>Resposta</label>
			
			<textarea id="resposta-criticidade" name="cad-resposta" class="form-control" rows="5"  ><?php echo $registros['resposta'] ?></textarea>
		</div>	
		
		
	<div class="col-md-12">
			<input type="submit" value="Atualizar" class="btn btn-primary">
		</div>	
		
		
		
	</div>				
					
				</div>
			</div>
		</div>

	</div>

	

	
	 <script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script src="js/jquery.mask.min.js"></script>
	
		<script>
			$j= jQuery.noConflict()
	function Bia1(){
		
		var impacto = $j("#selecao-impacto option:selected").val()
		var requisitos = $j("#selecao-requisitos-recuperacao option:selected").val()
	
		var resultado = (impacto*requisitos)
		var resposta = ''
		var cor = ''
		var resposta2= ''
		
		if(resultado<=15  ){resposta='Aceitável - Baixa criticidade'; cor='#00B050'; resposta2=("Processo com baixa criticidade - baixo impacto nos negócios. As ações poderão ser aplicadas quando os processos críticos estiverem controlados.") }
		
		if(resultado>=15 && 34 ){resposta='Significativo - Crítico'; cor ='#FFFF00';resposta2=("Processo considerado crítico. Plano de ação deve ser proposto.")}
		
		if(resultado>=34 && 85 ){resposta='Sério - Moderadamente crítico'; cor='#FFC000';resposta2=("Processo considerado moderadamente crítico. Plano de ação deve ser proposto.")}
		
		if(resultado>=85 && 200 ){resposta='Inaceitável - Altamente crítico'; cor='#FF0000';resposta2=("Processo considerado altamente crítico. Plano de ação deve ser proposto urgentemente.")}
		
		
		$j('#resposta-requisitos-recuperacao').css('background',cor)
		$j('#resposta-requisitos-recuperacao').css('color','black')
		$j('#resposta-requisitos-recuperacao').val(resposta)
		
		$j("#resposta-criticidade").html(resposta2)
		
	}		
			
			
			
	$rodape=jQuery.noConflict()
	function AtivarLink(){
		$rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
		$rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight','bold')
		
	}
	AtivarLink()
</script> 
	
</body>
</html>