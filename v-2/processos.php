<?php  
$nav_menu_principal='gestaodeprocessos';
$nav_menu_pagina='processos';
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
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Processos</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div id="resposta-empresa"></div>
					
		<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='13' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>						
					
	<a href="cadastro-processo.php"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Novo Processo</a>			<?php } ?>	
 	<h3 class="mb-4 mt-4">Processos</h3>			
				
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Data do Registro</th>
                <th>Área</th>
                <th>Processo</th>
                <th>Objetivo</th>
                <th>Aplicação</th>
                <th>Ação</th>
			
            </tr>
        </thead>
        <tbody>
			<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from processos");
				while($registros=mysqli_fetch_array($selecao)){
			?>
            <tr>
                <td><a class="text-dark" href="processo.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['data'] ?></a></td>
                <td><a class="text-dark" href="processo.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['area'] ?></a></td>
                <td><a class="text-dark" href="processo.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['processo'] ?></a></td>
                <td><a class="text-dark" href="processo.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['descricao'] ?></a></td>
                <td><a class="text-dark" href="processo.php?cod=<?php echo $registros['id'] ?>">
					
					
					
					<?php $cod_aplicacao= $registros['aplicacao'];
					$selecao_aplicacao=mysqli_query($conexao,"select * from empresas WHERE id='$cod_aplicacao'");
					$registros_aplicacao=mysqli_fetch_array($selecao_aplicacao);
					echo $registros_aplicacao['razao_social']?></a>
				
				
				
				</td>
								<td>
									
							<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='13' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	
		<a href="editar-processo.php?cod=<?php echo $registros['id'] ?>" class="text-dark">							
				<i class="fa fa-edit" style="cursor: pointer" ></i>
			</a>	
				<?php } ?>					
									
									
									
									
								<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='13' and codigo_grupo='$cod_grupo' and excluir='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>				
									
									<i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirProcesso(<?php echo $registros['id'] ?>)"></i>
				
				<?php } ?>
				
				</td>
            </tr>
			
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
		$a=jQuery.noConflict()
	function ExcluirProcesso(codigo){
			
	if (window.confirm("Você deseja excluir o processo?")) {

	  $a.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-processo.php',
			  success: function(retorno){
				 
			  $a('#resposta-empresa').html(retorno); 
				location.reload()
		  }
		   })  	
}}	
		
		
	$a(document).ready(function() {
    $a('#example').DataTable();
} );
		
		
		
	$a("#example").dataTable({
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