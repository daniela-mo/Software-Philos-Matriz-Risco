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
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario' ");
$registros_usuario=mysqli_fetch_array($selecao_usuario);
$codigo_usuario=$registros_usuario['id'];	
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | QAAs</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">

 	<h3 class="mb-4 mt-4">Cadastros</h3>			
				
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
              
                <th>CNPJ</th>
				<th>Modalidades</th>
				
               
            </tr>
        </thead>
        <tbody>
		
           <?php
				mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			
			
			
			if($tipo=='admin'){
			$selecao=mysqli_query($conexao,"select * from cadastro group by cnpj");
			}
			
			if($tipo=='usuario'){
			$selecao2=mysqli_query($conexao,"select * from responsaveis_qaa_inteiro WHERE codigo_usuario='$codigo_usuario'");
			$registros2=mysqli_fetch_array($selecao2);
			$codigo_qaa=$registros2['codigo_qaa'];	
				
			$selecao=mysqli_query($conexao,"select * from cadastro WHERE id='$codigo_qaa'");	
				
			}
			
				
				while($registros=mysqli_fetch_array($selecao)){
				$cnpj=$registros['cnpj'];	
			?>
            <tr>
               
				
                <td><a class="text-dark" href="meus-qaas.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['cnpj'] ?></a></td>
				
							
			<td>
				<?php 
				$selecao_modalidades=mysqli_query($conexao,"select * from cadastro WHERE cnpj='$cnpj' ");
				while($registros_modalidades=mysqli_fetch_array($selecao_modalidades)){?>
				
				<a class="text-dark" href="meus-qaas.php?cod=<?php echo $registros['id'] ?>">
					
					<?php echo $registros_modalidades['modalidade'] ?><br>

				
				
				</a>
				<?php } ?>
				
				</td>
				
			
			<?php } ?>

        </tbody>
       
    </table>				
					
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
	$(document).ready(function() {
    $('#example').DataTable();
} );
		
		
		
	$("#example").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            })           	
		
		
		
	</script>
</body>
</html>