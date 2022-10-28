<?php  
$nav_menu_principal='sistema';
$nav_menu_pagina='usuarios';
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
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-white">Dashboard </a>| Usuários</span>
						</div>
					</div>
					
					
				</div>
			</div>	
			<div class="row">
				<div class="col-12">
	<div id="resposta-usuario"></div>
		
			<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='5' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>					
	<a href="cadastro-usuario.php"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Novo Usuário</a>		
	<?php } ?>				
					
 	<h3 class="mb-4 mt-4">Usuários</h3>			
				
	<table id="example" class="display table table-striped" style="width:100%">
        <thead>
            <tr>
                <td>Nome</td>
              
                <td>Cargo</td>
                <td>Grupo</td>
				<td>Ação</td>
            </tr>
        </thead>
        <tbody>
			<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from usuarios_empresa");
				while($registros=mysqli_fetch_array($selecao)){
					$grupo=$registros['grupo'];
			?>
            <tr>
                <td class="maiusculas"><a class="text-dark maiusculas" href="usuario.php?cod=<?php echo $registros['id'] ?>"><?php echo strtoupper($registros['nome']); ?></a></td>
               
                <td class="maiusculas"><a class="text-dark maiusculas" href="usuario.php?cod=<?php echo $registros['id'] ?>"><?php echo strtoupper($registros['cargo']); ?></a></td>
              
				<?php
				$selecao_grupo=mysqli_query($conexao,"select * from grupos WHERE id='$grupo'");
				$registros_grupo=mysqli_fetch_array($selecao_grupo);	
				?>
                <td><a class="text-dark" href="usuario.php?cod=<?php echo $registros['id'] ?>"><?php echo strtoupper($registros_grupo['grupo']); ?></a></td>
				<td>
					
					<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='5' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>			
					
					
				<a href="editar-usuario.php?cod=<?php echo $registros['id'] ?>" class="text-dark"><i class="fa fa-edit" style="cursor: pointer" ></i></a>	
					
			<?php } ?>			
					
					<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='5' and codigo_grupo='$cod_grupo' and excluir='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>			
					
					<i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirUsuario(<?php echo $registros['id'] ?>)"></i>
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
		function ExcluirUsuario(codigo){
		
	if (window.confirm("Você deseja excluir o usuário?")) {

	  $a.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-usuario.php',
			  success: function(retorno){
				 
			  $a('#resposta-usuario').html(retorno); 
				location.reload();
		  }
		   })  	
}}		
		
		
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
                    "sSearch":       "Procurar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                },
		
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