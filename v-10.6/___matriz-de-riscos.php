<?php  
$nav_menu_principal='gestaoderisco';
$nav_menu_pagina='matrizderiscos';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard M2V</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

	<link rel="shortcut icon" href="imgs/favicon.fw.png" />
</head>
	

	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			
?>	

<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Matriz de Risco</span>
						</div>
					</div>
					
					
				</div>
			</div>



<div class="row ml-4 mr-4">
				<div class="col-12">
					<div id="resposta-empresa"></div>
	<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='19' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>							
					
	<a href="cadastro-identificacao-de-risco.php"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Novo Evento de Risco</a>	
					
	<?php } ?>				
					
 	<h3 class="mb-4 mt-4">Evento de Risco + Ferramenta de Controle</h3>			
	<?php
					$selecao_user=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$id_usuario'");		
	$registros_user=mysqli_fetch_array($selecao_user);
	$area_principal=$registros_user['setor'];
	
			$selecao_setor=mysqli_query($conexao,"select * from areas WHERE id='$area_principal'");
			$registros_areas=mysqli_fetch_array($selecao_setor);
			$exibir_area_principal=$registros_areas['area'];
					
					?>
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Evento do Risco </th>
                <th>Origem</th>
                <th>Fator do risco</th>
                <th>Data de Identificação</th>
				<th>Classif. de risco</th>
                <th>Risco Residual</th>
				<th>Risco Inerente</th>
				<th>Risco OEA</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
			<?php
				$selecao=mysqli_query($conexao,"select * from identificacao_do_risco WHERE area='$exibir_area_principal' ");
				while($registros_matriz=mysqli_fetch_array($selecao)){
                $classificacao_risco=$registros_matriz['classificacao_risco']
			?>
            <tr>
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['id'] ?></a></td>
                
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['evento_risco'] ?></a></td>
                
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['origem'] ?></a></td>
                
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['fator_risco'] ?></a></td>
                
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['data_id_risco'] ?></a></td>
                
                 <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php 
                $selecao_parametrizacao=mysqli_query($conexao,"select * from parametrizacao WHERE id='$classificacao_risco'");
                $registros_parametrizacao=mysqli_fetch_array($selecao_parametrizacao);
                
                echo  $registros_parametrizacao['nome'];
                
                ?></a></td>
                
				<?php
					$id=$registros_matriz['id'];
					$selecao_risco_residual=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE codigo_matriz='$id'");
					$registros_residual=mysqli_fetch_array($selecao_risco_residual);
				?>	
				
                 <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_residual['nivel'] ?></a></td>
				
				
				
				  <?php
					$selecao_risco_inerente=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE codigo_matriz='$id'");
					$registros_inerente=mysqli_fetch_array($selecao_risco_inerente);
				?>	
				
                 <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_inerente['nivel'] ?></a></td>
                
				<td>
				
					<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='19' and codigo_grupo='$cod_grupo' and excluir='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>			
					
					<i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirMatriz(<?php echo $registros_matriz['id'] ?>)"></i>
			<?php } ?>	
				
				
				</td>
            </tr>
			
			<?php } ?>
			
			<?php
			 $pesquisar=mysqli_query($conexao,"select * from responsaveis_areas WHERE codigo_usuario='$id_usuario'");
			while($registros_pesquisar=mysqli_fetch_array($pesquisar)){
			$outras_areas=$registros_pesquisar['area'];
			
			$selecao22=mysqli_query($conexao,"select * from identificacao_do_risco WHERE area='$outras_areas' ");
			$number=mysqli_num_rows($selecao22);	
			while($registros_matriz=mysqli_fetch_array($selecao22)){
			 $classificacao_risco=$registros_matriz['classificacao_risco'];
			if($number>=1){
			?>
            <tr>
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['id'] ?></a></td>
                
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['evento_risco'] ?></a></td>
                
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['origem'] ?></a></td>
                
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['fator_risco'] ?></a></td>
                
                <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['data_id_risco'] ?></a></td>
                
                 <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php 
                $selecao_parametrizacao=mysqli_query($conexao,"select * from parametrizacao WHERE id='$classificacao_risco'");
                $registros_parametrizacao=mysqli_fetch_array($selecao_parametrizacao);
                
                echo  $registros_parametrizacao['nome'];
                
                ?></a></td>
                
				<?php
					$id=$registros_matriz['id'];
					$selecao_risco_residual=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE codigo_matriz='$id'");
					$registros_residual=mysqli_fetch_array($selecao_risco_residual);
				?>	
				
                 <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_residual['nivel'] ?></a></td>
				
				
				
				  <?php
					$selecao_risco_inerente=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE codigo_matriz='$id'");
					$registros_inerente=mysqli_fetch_array($selecao_risco_inerente);
				?>	
				
                 <td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_inerente['nivel'] ?></a></td>
                
				<td><a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                <?php echo $registros_matriz['item_oea'] ?></a></td>
				
				
				
				<td>
						<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='19' and codigo_grupo='$cod_grupo' and excluir='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>			
					
					<i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirMatriz(<?php echo $registros_matriz['id'] ?>)"></i>
				
				<?php } ?>
				
				</td>
            </tr>
			
			<?php }}} ?>
			
			
			

        </tbody>
       
    </table>				
					
				</div>
			</div>
			
			
</div>
</div>	
	
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>	
<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>+
<script src="js/sb-admin.min.js" type="text/javascript"></script>
	
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
		"iDisplayLength": 1000,
		 stateSave: true,
		
		
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
                        "sLast":     "Último",
						"pageLength": "1"
                    }
                },
		 dom: 'Bfrtip',
        buttons: [
       {
           extend: 'pdf',
           footer: true,
            exportOptions: {
                columns: [0,1,3,4,5,6,7,8]
            }
           
          
       },
       {
           extend: 'csv',
           footer: false
          
       },
       {
           extend: 'excelHtml5',
           footer: false,
           exportOptions: {
                columns: [0,1,3,4,5,6,7,8]
            }
       }         
    ],
		 
    } );
} );
	
        
	
	
	function AtivarLink(){
		$('#<?php echo $nav_menu_principal ?>').addClass('show')
		$('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight','bold')
		
	}
AtivarLink()
</script>







