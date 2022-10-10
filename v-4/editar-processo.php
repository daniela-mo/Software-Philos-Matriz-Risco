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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
		
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$codigo=$_REQUEST['cod'];
?>	
<!-- Navegação !-->	
	
<form action="processa-atualizar-processo.php" method="post">	
<input type='hidden' name="codigo" id="codigo" value="<?php echo $codigo ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Editar processo</span></a>
						</div>
					</div>
					
					
				</div>
			</div>	
			<div class="row">
				<div class="col-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>				
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Editar processo </h3>			
				
	<div class="row ml-4 mr-4">
		
			
			<?php
            mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from processos WHERE id='$codigo'");
				$registros=mysqli_fetch_array($selecao);
			?>
			
		
		<div class="col-md-2 mb-5">
			<label>Data</label>
			<input type="text" class="form-control datepicker" name="cad-data" id="example" value="<?php echo $registros['data'] ?>" >
		</div>
		
		<div class="col-md-5 mb-5">
			<label>Área</label>
			<select class="form-control" name="cad-area" id="cad-area">
				<option><?php echo $registros['area'] ?></option>
            <?php
            $selecao_areas=mysqli_query($conexao,"select * from areas order by area ASC");
            while($registros_areas=mysqli_fetch_array($selecao_areas)){
            ?>
                <option><?php echo $registros_areas['area'] ?></option>
                
            <?php } ?>    
			</select>
		</div>
		
		<div class="col-md-5 mb-5">
			<label>Processo</label>
			<input type="text" class="form-control" name="cad-processo" id="cad-processo" value="<?php echo $registros['processo'] ?>" >
		</div>
		
		<div class="col-md-6 mb-4">
			<label>Descrição do processo</label>
						
			<input type="text" class="form-control" name="cad-descricao" id="cad-descricao" value="<?php echo $registros['descricao'] ?>" >
		</div>
		
				<div class="col-md-6 mb-4">
			<label>Aplicação(Qual unidade se aplica)</label>
			<select class="form-control" name="cad-aplicacao" id="cad-aplicacao">
            <?php
            $aplicacao=$registros['aplicacao'];
            $selecao2=mysqli_query($conexao,"select * from empresas WHERE id ='$aplicacao'");
            $registros2=mysqli_fetch_array($selecao2);
            $aplicacao2=$registros2['razao_social'];
            
            ?>
            <option value="0"><?php echo $aplicacao2 ?></option>
            <?php
            $selecao_empresas=mysqli_query($conexao,"select * from empresas order by razao_social ASC");
            while($registros_empresas=mysqli_fetch_array($selecao_empresas)){
            ?>
            
                  <option value="<?php echo $registros_empresas['id'] ?>"><?php echo $registros_empresas['razao_social'] ?></option>
			<?php } ?>
			</select>
		</div>
		
			<div class="col-md-12 mb-4">			
			<input type="submit" class="btn btn-primary" value="Atualizar processo">
		</div>
		
		
</div>	
		
			
					
				</div>
			</div>
		</div>

	</div>
</form>	
	
<!-------------Contadores--------->	
	<input type="hidden" value="1" id="contador_terceiros">
	<input type="hidden" value="1" id="contador_filiais">
	
	 <script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
<script>
	$f=jQuery.noConflict()	 
		  
		 $f(".datepicker").datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
}); 
		  
		  
  $f(function() {
    $f(".datepicker").datepicker();
  } );
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