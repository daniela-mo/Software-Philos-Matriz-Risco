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
	<link rel="stylesheet" href="css/notificacoes.css">	
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
	

<?php
	include('menu.php');
	
	$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario'");
	$registros_usuarios=mysqli_fetch_array($selecao_usuario);
	$codigo_usuario=$registros_usuarios['id'];
	
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Notificações</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
	
    
   <div class="row">
      
      <div class="col-md-12 col-lg-12">
         <div id="tracking-pre"></div>
         <div id="tracking">
            <div class="text-center tracking-status-intransit">
               <p class="tracking-status text-tight">Notificações Recentes</p>
            </div>
			 
			<?php
			 
			 $selecao_notificacao=mysqli_query($conexao,"select * from notificacoes WHERE codigo_usuario='$codigo_usuario'");
			 $numero=mysqli_num_rows($selecao_notificacao);
			 if($numero==0){ ?>
				 
			<h4 class="mt-3">No momento sem notificações</h4>	 
				 
				 
			<?php }
			 
			 
			while($registros_notificacoes=mysqli_fetch_array($selecao_notificacao)){
				$tipo=$registros_notificacoes['tipo'];
				
				if($tipo=='modulo_qaa'){
				$tipo='Você agora é responsável pelo módulo de QAA ';
				$link="meus-qaas.php";					   
				}
				$tarefa=$registros_notificacoes['codigo_tarefa'];
				
				if($tipo=='modulo_workflow'){
				$tipo='Você agora é responsável pelo módulo de Workflow ';
				$link="planejamento-workflow.php";
				}
				
				if($tipo=='modulo_implementacao'){
				$tipo='Você agora é responsável pelo módulo de Implementação ';
				$link="implementacao.php";
				}
				
				
				$tarefa=$registros_notificacoes['codigo_tarefa'];
				
			 ?>
			 
            <div class="tracking-list">
               <div class="tracking-item">
                  <div class="tracking-icon status-intransit">
                     <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                     </svg>
                     <!-- <i class="fas fa-circle"></i> -->
                  </div>
                  <div class="tracking-date"><?php echo $registros_notificacoes['data'] ?><span><?php echo $registros_notificacoes['hora'] ?></span></div>
				   
                  <div class="tracking-content"><?php echo $tipo ?><?php echo $tarefa ?></span><br>
				  <input type="button"	 class="btn btn-primary btn-sm mt-2" value="Clique aqui" 
			onClick="location.href='<?php echo $link ?>?cod=<?php echo $registros_notificacoes['codigo_tarefa'] ?>'" >
				
				
				</div>
				
               </div>
               
              
            </div>
		  
		  <?php } ?>
		  
		  
		  
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