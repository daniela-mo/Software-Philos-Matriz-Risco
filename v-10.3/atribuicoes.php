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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<link rel="stylesheet" href="css/timeline.css">	
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Atribuições</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
		
 			
				
	
	<div class="container text-center">
            <h2 class="mb-4 mt-4">Atribuições Recentes</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline">
						
						<?php
						mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa WHERE email ='$usuario'");
$registros_usuarios=mysqli_fetch_array($selecao_usuarios);
$id=$registros_usuarios['id'];

$selecao_responsabilidades=mysqli_query($conexao,"select * from responsaveis_qaa WHERE codigo_usuario=$id");
while($registros=mysqli_fetch_array($selecao_responsabilidades)){
$codigo_questao=$registros['codigo_qaa'];	
	
$selecao_qaa=mysqli_query($conexao,"select * from questoes_qaa WHERE id='$codigo_questao' ");	
$registros_qaa=mysqli_fetch_array($selecao_qaa);						
						?>
						
                        <a href="#" class="timeline" data-aos="fade-up" >
                            <div class="timeline-icon"><i class="fa fa-user-md"></i></div>
                            <div class="timeline-content">
                                <h3 class="title">Data <?php echo $registros['data'] ?></h3>
                                <p class="description">
                                   <?php echo $registros['hora'] ?> Questão do Questionário de Auto Avaliação <?php echo $registros_qaa['titulo']; ?> atribuida para você
									
                                </p>
                            </div>
                        </a>
						
			<?php } ?>			
                      
                     
                      
                    </div>
                </div>
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
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	
	
	
	
	
</body>
</html>