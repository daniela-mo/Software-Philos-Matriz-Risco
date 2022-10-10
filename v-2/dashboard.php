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
$nav_menu_principal='dashboards';
$nav_menu_pagina='menu-dashboard';
?>	
<!-- Navegação !-->	
	
	
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
			
			
			<div class="row ml-4 mr-4">
				<div class="col-12">
				<h3 class="mt-3 mb-5">Dashboard</h3>	
				</div>
				
				
				<?php
				
				if(@$_SESSION['privilegio']=='admin'){ ?>
					
			<div class="col-12">
				<h3>Você Está logado como administrador do sistema</h3><br>

				<p>Aqui você pode criar uma Empresa/Usuário e dar as devidas permissões para o mesmo.</p><br>
				<ul>
					<li><a href="cadastro-empresa.php">Cadastro de Empresas</a></li>
					<li><a href="empresas.php">Empresas</a></li>
					<li><a href="cadastro-usuario.php">Cadastro de usuários</a></li>
					<li><a href="usuarios.php">Usuários</a></li>
					<li><a href="niveis-permissoes.php">Níveis de Permissões</a></li>
				</ul>
			
				</div>	
			<?php	}else{
				
				?>	
				
				
				
				<div class="col-md-12 mb-3">
					<h5><strong>Riscos por áreas(Qtd)</strong></h5>
						<?php include("graficos/grafico-dashboard1.php") ?>
				</div>
				
				<div class="col-md-12 mb-3">
					<h5><strong>Riscos por Áreas(%)</strong></h5>
					<?php include("graficos/grafico-dashboard3.php") ?>
				</div>
				
				<div class="col-md-12 mb-3">
					<h5><strong>Riscos por área/Nível de riscos (Qtd)</strong></h5>
					<?php include("graficos/grafico-dashboard10.php") ?>
				</div>
				
				<div class="col-md-12 mb-3">
					<h5><strong>Risco Inerente/Risco Residual/Risco Futuro(Qtd)</strong></h5>
					<?php include("graficos/grafico-dashboard2.php") ?>
				</div>
				
					<div class="col-md-12 mb-3">
						<h5><strong>Riscos Inerentes/Residuais/Futuros(%)</strong></h5>
					<?php include("graficos/grafico-dashboard4.php") ?>
				</div>
				
				<div class="col-md-4 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Inerentes(Qtd)</strong></h5>
					<?php include("graficos/grafico-dashboard7.php") ?>
				</div>
				
				<div class="col-md-4 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Residuais(Qtd)</strong></h5>
					<?php include("graficos/grafico-dashboard6.php") ?>
				</div>
				
				
				
				
				
				<div class="col-md-4 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Futuros(Qtd)</strong></h5>
					<?php include("graficos/grafico-dashboard11.php") ?>
				</div>
				
				
				<div class="col-md-12 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Inerentes(%)</strong></h5>
					<?php include("graficos/grafico-dashboard9.php") ?>
				</div>
				
				
				
				<div class="col-md-12 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Residuais(%)</strong></h5>
					
					<?php include("graficos/grafico-dashboard8.php") ?>
				</div>
				
				
				
				
				<div class="col-md-12 mb-3">
						<h5><strong>Níveis da Avaliação de Riscos Futuros(%)</strong></h5>
					<?php include("graficos/grafico-dashboard12.php") ?>
				</div>
				
				<div class="col-md-12 mb-3">
						<h5><strong>Tratamentos Status</strong></h5>
					<?php include("graficos/grafico-dashboard5.php") ?>
				</div>
				<?php } ?>
			</div>
		</div>

	</div>
	
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<style>
		.a1{display: none}
		
	</style>
	<script>
		
		
		
	function Filtrar(qual_grafico){
			  $.ajax({
		  type: 'post',
		  data: 'codigo=0',
		  url:'funcoes/grafico-dashboard1.php',
		  success: function(retorno){
			$('#carregar-grafico1').load('graficos/grafico-dashboard1.php') 
      
		 
		  }
       })
		
	}	
		
	
	$(document).ready(function(){
		
		
	$('#carregar-grafico1').load("graficos/grafico-dashboard1.php")		
		
		
		
		
$("g [aria-labelledby='id-66-title']").each(function () {
       
   $(this).addClass('a1')         

    });
		

	  
		
	

})
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