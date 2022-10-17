<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard Philos</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
	
</head>
<style>
	
	body{font-family: Open Sans}
	
	.content-wrapper{margin-left: 0px}	
	
		.card{
			-webkit-box-shadow: 10px 10px 5px 0px rgba(235,235,235,1);
-moz-box-shadow: 10px 10px 5px 0px rgba(235,235,235,1);
box-shadow: 10px 10px 5px 0px rgba(235,235,235,1);
			border-radius:30px;
			padding: 15px 5px;
		}
	
	#form-buscar{background-color: #E4E4E4; color:#031335}
	#btn-buscar{background-color: #E4E4E4; border:none; border-left:solid 2px #C5C5C5}
	.fa-search{color:#687184}
	.logo{color:#1D2B4A}
	.card-title{color:#031335; margin-top: 15px; }
	
	.card-title:hover{text-decoration: none}
	
	.icone-custom{margin-top:-5px}
	.boasvindas-custom{margin-top: 1px;}
	.texto-boasvindas{font-size:18px; margin-top: 5px}
</style>	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
	<!-- Navegação !-->
	<?php include('header.php'); ?>
	
	
	
	
	
	
	<div class="content-wrapper" style=" margin: 0px">
		<div class="container-fluid">
			
			<div class="row ml-5 mr-5 ">
				<div class="col-12 mt-4 mb-4">
					
					<h2 align="center">Página de Atalhos</h2>
					
				</div>
				
				
				<div class="col-md-4 mt-4 text-center">
				<div class="card">
  <div class="card-body">
    
   <img src="imgs/dashboard.fw.png" width="66" height="54" alt=""/> 
	  <a href="dashboard.php">
		  <h5 class="card-title">Dashboard</h5>
	  </a>
  </div>
</div>
				</div>
	 				
				<div class="col-md-4 mt-4 mb-4 text-center">
				<div class="card" >
  <div class="card-body">
   
   	<img src="imgs/icon-user-blue.png" height="54"  alt=""/>
	   <a href="empresas.php">
	   <h5 class="card-title">Cadastro</h5>
		</a>			
				  </div>
</div>
				</div>
				
			
				
				
		 		
				<div class="col-md-4 mt-4 mb-4  text-center">
				<div class="card" >
  <div class="card-body">
    
   <img src="imgs/icon-oea.fw.png" width="66" height="54"  alt=""/> 
	  <a href="qaas.php">
	  <h5 class="card-title">Módulo OEA</h5>
	  </a>
		  </div>
</div>
				</div>
				
	
				
			
				
			  <div class="col-md-4 mt-4 mb-4  text-center">
				<div class="card" >
  <div class="card-body">
   
   <img src="imgs/risco-azul.png" width="66" height="54"  alt=""/> 
	   <a href="matriz-de-riscos.php"><h5 class="card-title">Gestão de risco</h5></a>
  </div>
</div>
				</div>
				
				
				
				
				
				
			  <div class="col-md-4 mt-4 mb-4  text-center">
				<div class="card" >
  <div class="card-body">
   
   <img src="imgs/workflow-icon-blue2.fw.png" width="66" height="54"   alt=""/> 
	  <a href="workflow.php"> <h5 class="card-title">Workflow de Atividade</h5></a>
  </div>
</div>
				</div>
				
				
				
	<div class="col-md-4 mt-4 mb-4  text-center">
				<div class="card" >
  <div class="card-body">
   
   <img src="imgs/icon-gestao.fw.png"  width="66" height="54" alt=""/> 
	  <a href="processos.php"> <h5 class="card-title">Gestão de Processos</h5></a>
  </div>
</div>
				</div>			
				
				
				
				
				
	<div class="col-md-4 mt-4 mb-4  text-center">
				<div class="card" >
  <div class="card-body">
   
   <img src="imgs/n-conformidades.png"  width="66" height="54" alt=""/> 
	  <a href="rncs.php"> <h5 class="card-title">Não Conformidade</h5></a>
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
</body>
</html>