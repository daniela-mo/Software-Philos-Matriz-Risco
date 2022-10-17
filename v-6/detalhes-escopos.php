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
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Cadastro Bia 
						<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='17' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	
				<a href="editar-escopos.php?cod=<?php echo $cod ?>">
				<img src="imgs/icone-editar.png" width="30" height="30" alt=""/>
				</a>
			<?php } ?>	
					</h3>			
				
	<div class="row ml-4 mr-4 mt-5">
		
	<div class="col-md-4 mb-4">
			<label>Processo</label>
		<input type="text" readonly class="form-control" value="<?php echo $registros['processo'] ?>" >
		
		
		</div>		
	
		<div class="col-md-4 mb-4">
			<label>Área</label>
		<input type="text" readonly class="form-control" value="<?php echo $registros['area'] ?>" >
		
		</div>			
					
			<div class="col-md-4 mb-4">
			<label>Responsáveis</label>
		<input type="text" readonly class="form-control" value="<?php echo $registros['responsavel'] ?>" >
		
		</div>	
		
		
		
		<div class="col-md-4 mb-4">
			<label>Impacto</label>
		<input type="text" readonly class="form-control" value="<?php echo $registros['impacto'] ?>" >
		
		</div>	
		
			
		<div class="col-md-4 mb-4">
			<label>Req. para Recuperação</label>
		<input type="text" readonly class="form-control" value="<?php echo $registros['requisito_recuperacao'] ?>" >
		
		</div>	
		
		
		
		
			
		<div class="col-md-4 mb-4">
			<label>Nível de Criticidade</label>
			<input type="text" readonly class="form-control" value="<?php echo $registros['nivel_criticidade'] ?>" >
		
		</div>	
		
		
		<div class="col-md-6 mb-4">
			<label>Resposta</label>
			
			<textarea id="resposta-criticidade" name="cad-resposta" class="form-control" rows="5" readonly ><?php echo $registros['resposta'] ?></textarea>
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
	$rodape=jQuery.noConflict()
	function AtivarLink(){
		$rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
		$rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight','bold')
		
	}
	AtivarLink()
</script> 
	
</body>
</html>