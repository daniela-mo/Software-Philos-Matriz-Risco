<?php  
$nav_menu_principal='cadastros';
$nav_menu_pagina='nives-permissao';
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
	<link rel="shortcut icon" href="imgs/favicon.fw.png" />
	
<style>
#main-menu {
   
}

.list-group-item {
    color:black;
    border: none;
	background-color: white;
	border:  solid 1px #D9D9D9;
}

a.list-group-item {
    color:black;
	background-color: white;
	border:  solid 1px #D9D9D9;
}

a.list-group-item:hover,
a.list-group-item:focus {
 color:black;  
	background-color: white;
	border:  solid 1px #D9D9D9;
}

a.list-group-item.active,
a.list-group-item.active:hover,
a.list-group-item.active:focus {
    color:white;
    border: none;
	background-color: #031335;
	border:  solid 1px #D9D9D9;
}

.list-group-item:first-child,
.list-group-item:last-child {
    border-radius: 0;
}

.list-group-level1 .list-group-item {
    padding-left:30px;
}

.list-group-level2 .list-group-item {
    padding-left:60px;
}
	
.list-group-level3 .list-group-item {
    padding-left:90px;
}	
</style>	
	
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$codigo=$_REQUEST['cod']; 
	
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
?>	
<!-- Navegação !-->	
	
<form action="processa-niveis-permissoes.php" method="post" >
	<input type="hidden" id="codigo-grupo" name="codigo-grupo" value="<?php echo $codigo; ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
			
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Grupo de Permissão</span>
						</div>
					</div>
					
					
				</div>
			</div>
		<?php
			$selecao_grupo=mysqli_query($conexao,"select * from grupos WHERE id='$codigo'");
			$registros_grupos=mysqli_fetch_array($selecao_grupo);
		?>	
			
			
			
		<div class="row ml-4 mr-4">
		<div class="col-md-12">
			<input type="button" class="btn btn-primary mb-3 pointer" value="Voltar" onclick="location.href='niveis-permissoes.php'"><br>
			<h3 class="mb-4 mt-4">Permissões <?php echo $registros_grupos['grupo'] ?> </h3>
		</div>
	
</div>	
			
	<div class="row ml-4 mr-4 mt-4">
        <div class="col-md-3">
            <!-- column1, Vertical Dropdown Menu -->
            <div id="main-menu" class="list-group">
				
		<?php
			$selecao_menus=mysqli_query($conexao,"select * from estrutura_de_menus WHERE codigo_menu_mae='0' ");
			while($registros_menus=mysqli_fetch_array($selecao_menus)){	
		?>
				
                <a href="#sub-menu" class="list-group-item" id="ligacao<?php echo $registros_menus['id'] ?>" data-toggle="collapse" data-parent="#main-menu" onClick="TabelaSubMenus(<?php echo $registros_menus['id'] ?>)">
					<?php echo $registros_menus['menu'] ?> <span class="caret"></span>
				</a>
				
				
			<?php } ?>	
              
               
            </div>
        </div>
        <div class="col-md-8">
			<div id="carregar-tabela-submenus-permissoes"></div>
        </div>
		
		
		
    </div>	
			
			
			
	</div>
	</div>	
	</form>	
		
	
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
		
function TabelaSubMenus(codigo){
	
	$('.list-group-item').removeClass('active')
	$('#ligacao'+codigo).addClass('active')
	
	 $.ajax({
		  type: 'post',
		  data: 'codigo='+codigo+'&codigo_grupo=<?php echo $_REQUEST['cod']; ?>',
		  url:'funcoes/carregar-tabela-submenus-permissoes.php',
		  success: function(retorno){
		 $('#carregar-tabela-submenus-permissoes').html(retorno)
		 
      }
       })	
}		
		
		
	
		
	</script>
			<script>
	function AtivarLink(){
		$('#<?php echo $nav_menu_principal ?>').addClass('show')
		$('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight','bold')
	}
	AtivarLink()
</script>	
</body>
</html>