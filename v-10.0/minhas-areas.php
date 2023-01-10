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
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.orgchart.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
<style type="text/css">
#orgChart{
    width: auto;
    height: auto;
}
	

#orgChartContainer{
    width: 100%;
    height: auto;
    overflow: auto;
    background: #eeeeee;
}
	
	div.orgChart div.node{
		height: auto;
		padding: 10px;
		width: 150px;
	
	}

    </style>
</head>
	

	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	
?>	
	
	<?php
include("conexao.php");		
$usuario=$_SESSION['usuario'];

?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Minhas Áreas</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
			<div class="row">
				<div class="col-4">
	
					
					
 	<h3 class="mb-4 mt-4">Minhas Áreas</h3>		
	<p>Áreas de minha responsabilidade no sistema</p>				
					
<table class="table table-striped">
	<tr  >
		<th style="background-color: #031335; color:white">Áreas e subareas</th>
	</tr>				
					
					
	<?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa WHERE email ='$usuario'");
$registros_usuarios=mysqli_fetch_array($selecao_usuarios);
$id=$registros_usuarios['id'];

$selecao1=mysqli_query($conexao,"select * from responsaveis_areas WHERE codigo_usuario='$id'");
while($registros1=mysqli_fetch_array($selecao1)){		
	?>				
					
<tr>
	<td><?php echo $registros1['area'] ?></td>	
</tr>	
					
<?php } ?>	
					
</table>			
					
					
					
				</div>
				
				
	<div class="col-md-8">
				
				</div>			
				
				
				
				
				
				
				
			</div>
		</div>
		

<!------------------ Pegar ID Organogramas -------------->
<input type="hidden" id="codigo_organograma"  >		
		

<!-- Modal -->
<div class="modal fade" id="modalConteudo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo-modal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="conteudo-modal">
       
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

	</div>
	
	<!-----data-toggle="modal" data-target="#modalExemplo"---->
	
	
	
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	
	
	
	

		
	
	
	
</body>
</html>