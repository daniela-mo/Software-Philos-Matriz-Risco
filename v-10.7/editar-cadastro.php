<?php  
$nav_menu_principal='riskassesment';
$nav_menu_pagina='cadastro-certificacao';
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
	
	<form action="processa-editar-cadastro.php" method="post">
	<div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 5000">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard</span></a>
						</div>
					</div>
					
					
				</div>
			</div>
			
			<?php
				mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao=mysqli_query($conexao,"select * from cadastro WHERE id='$codigo'");
			$registros=mysqli_fetch_array($selecao);
			?>
			<input type="hidden" class="form-control" id="cad-codigo" name="cad-codigo" required value="<?php echo $registros['id'] ?> " readonly>
			<div class="row ml-4 mr-4">
				<div class="col-12">
					<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>	
				<h3 class="mt-3 mb-3">Editar Cadastro </h3>	
					
					
					<div id="resposta">
					</div>
				</div>
								
				<div class="col-md-3 mb-3">
					<label>CNPJ</label>

					<input type="text" class="form-control cnpj" name="cad-cnpj" id="cad-cnpj"value="<?php echo $registros['cnpj'] ?> ">
					
				</div>
				
				<div class="col-md-3 mb-3">
					<label>Data do Requerimento</label>
					<input type="text" class="form-control datepicker data" name="cad-data-requerimento" id="cad-requerimento"  value="<?php echo $registros['data_requerimento'] ?> " >
				</div>
				
				<div class="col-md-3 mb-3">
					<label>N° de Requerimento</label>
					<input type="text" class="form-control" name="cad-numero-requerimento" id="cad-numero-requerimento" value="<?php echo $registros['numero_requerimento'] ?> ">
				</div>
				
							

				
				<div class="col-md-3 mb-3">
					<label>Data validação pela RFB</label>
					<input type="text" class="form-control datepicker data" name="cad-data-validacao" id="cad-data-validacao"  value="<?php echo $registros['data_validacao'] ?> ">
				</div>
				
					<div class="col-md-3 mb-3">
					<label>Data Certificação</label>
					<input type="text" class="form-control datepicker data" name="cad-data-certificacao" id="cad-data-certificacao"  value="<?php echo $registros['data_certificacao'] ?> ">
				</div>
				
				<div class="col-md-3 mb-3">
					<label>N° Certificado</label>
					<input type="text" class="form-control" name="cad-numero-certificado" id="cad-numero-certificado" value="<?php echo $registros['numero_certificacao'] ?> ">
				</div>
				
									<div class="col-md-3 mb-3">
					<label>Modalidade de Certificação</label>
						
<select class="form-control" name="cad-modalidade-certificacao" id="cad-modalidade-certificacao">						
	<option selected value="<?php echo $registros['codigo_modalidade'] ?>"><?php echo $registros['modalidade'] ?></option>						
<?php 
$selecao2=mysqli_query($conexao,"select * from modalidades");
while($registros2=mysqli_fetch_array($selecao2)){
?>

	<?php 
		if($registros['codigo_modalidade']!=$registros2['id']){									   
	?>										   
<option value="<?php echo $registros2['id'] ?>"><?php echo $registros2['modalidade'] ?></option>

<?php } } ?>
</select>				
				</div>
				
			</div>
			
		<div class="row ml-4 mr-4">
			<div class="col-md-12">
				
					<div class="col-md-6" id="retorno-funcao">
				</div>
				
				<div class="col-md-12">
				<h4 class="mt-3">Anexos <img src="imgs/icone-mais.png" width="25"  alt="" data-toggle="modal" data-target="#exampleModal"/>
				</h4>
			<div id="respostaarquivo"></div>		
			<div id="carrega-anexos"></div>			
					
					
				</div>
				
				
			</div>	
			
			<div class="col-md-12">
				<input type="submit" class="btn btn-primary" value="Atualizar Cadastro">
			</div>
			
		</div>
			
			
			
			
			<div class="row ml-4 mr-4">
			
				<div class="col-md-6" id="retorno-modalidade">
					
					
				</div>
				
				
					<div class="col-md-6" id="retorno-funcao">
									
						
						
				</div>
				
				
			
			</div>
			
		</div>

	</div>
	</form>
	
	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Anexo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       				
					
	<span id="msg" style="color:red"></span><br/>
    <input type="file" id="photo"><br/>
					
  
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>	
  <script type="text/javascript">
	  $ff=jQuery.noConflict()
    $ff(document).ready(function(){
		
		
		
		
		
		/*function LimparUploads(){
			
		 $ff.ajax({
		  type: 'post',
		  data: 'codigo=',
		  url:'funcoes/excluir-uploads-temp.php',
		  success: function(retorno){ 
		  $ff('#respostaarquivo').html(retorno);  
			  
		  } 
		 }) 	
		}*/
		
		//LimparUploads()
		
      $ff(document).on('change','#photo',function(){
        var property = document.getElementById('photo').files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
		  	var nome=$ff("#nome-arquivo").val()
       

        var form_data = new FormData();
        form_data.append("file",property);
        $ff.ajax({
          url:'funcoes/upload-cadastro-definitivo.php?nome='+nome+'&codigo=<?php echo $codigo ?>',
          method:'POST',
          data:form_data,
          contentType:false,
          cache:false,
          processData:false,
          beforeSend:function(){
           // $('#msg').html('Loading......');
          },
          success:function(data){ 
            console.log(data);
            $ff('#respostaarquivo').html(data);
			 $ff('.close').trigger("click")
			  
			
			CarregaAnexos()  
          }
        });
      });
    });
  </script>	
      </div>
		
      <div class="modal-footer">
      
		        

		  
      </div>
    </div>
  </div>
</div>
	
	<div id="retorno-excluir"></div>
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="js/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>
	  <script>
	$f=jQuery.noConflict()	 
		  
		  
	$f('.data').mask('99/99/9999');		  
		  
		  
		  
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
		  
		 		  
		  
		  
			function CarregarFuncoes(codigo){
			if(codigo==''){codigo=0}
		
		 $f.ajax({
		  type: 'post',
		  data: 'codigo=<?php echo $codigo ?>',
		  url:'ver-funcoes-editar.php',
		  success: function(retorno){ 
		  $f('#retorno-funcao').html(retorno);  
			  
		  } 
		 })
			
		}	  
		  
		function CarregaAnexos(){
			
			$f('#carrega-anexos').load('carrega-anexos-cadastro.php')
			$f("#photo").val('');
			$f("#nome-arquivo").val('');
		}  
		  
		  
		$f(document).ready(function(){
		
		CarregaAnexos()
	
		CarregarFuncoes()
			
		})  
		  
			function Deletar(codigo){
		if(window.confirm("Você deseja excluir o Cadastro?")) {		
		 $f.ajax({
		  type: 'post',
		  data: 'codigo='+codigo,
		  url:'funcoes/excluir-upload-cadastro-definitivo.php',
		  success: function(retorno){ 
		  $f('#retorno-excluir').html(retorno); 
			CarregaAnexos()  
			  
		  } 
		 })	
			
		} } 
		  
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