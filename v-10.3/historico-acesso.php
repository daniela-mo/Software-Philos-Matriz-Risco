<?php  
$nav_menu_principal='sistema';
$nav_menu_pagina='historicos';
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Histórico Acesso</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
		
 	<h3 class="mb-4 mt-4">Histórico de Acessos</h3>			
				
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Ip</th>
                <th>Data</th>
                <th>Hora</th>
				<th></th>
               
            </tr>
        </thead>
        <tbody>
			<?php
				$selecao=mysqli_query($conexao,"SELECT * FROM historico ORDER BY historico.data DESC");
				while($registros=mysqli_fetch_array($selecao)){
			?>
			
			<?php $data= $registros['data'];
			$ano = substr($data,0,4);
			$mes = substr($data,5,2);
			$dia = substr($data,8,2);
			?>
            <tr>
                <td><?php echo $registros['usuario'] ?></td>
                <td><?php echo $registros['ip'] ?></td>
                <td><?php echo $dia ?>/<?php echo $mes ?>/<?php echo $ano ?></td>
                <td><?php echo $registros['hora'] ?></td>
               <td style="color: white"><?php echo $registros['id'] ?></td>
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
		$v=jQuery.noConflict()
	$v(document).ready(function() {
    $v('#example').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
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