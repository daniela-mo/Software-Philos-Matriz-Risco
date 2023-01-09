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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
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
	$selecao=mysqli_query($conexao,"select * from comites_atas WHERE id='$codigo'");
	$registros=mysqli_fetch_array($selecao);
?>	
<!-- Navegação !-->	
	

	<input type="hidden" name="codigo-comite" id="codigo-comite" value="<?php echo $codigo ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Detalhes da Ata</span></a>
						</div>
					</div>
					
					
				</div>
			</div>	
			
		
			<div class="row ">
				<div class="col-md-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>				
 	<h2 class="mb-4 mt-4 ml-4 mr-4">Ata <?php echo $registros['nome'] ?></h2>			
	
		
<div class="row ml-4 mr-4">		
	
	<div class="col-md-4">
		<label>Nome</label>
		<input type="text" class="form-control mb-4" name="cad-nome-ata" id="cad-nome-ata" value="<?php echo $registros['nome'] ?>" readonly>
	</div>
	
		<div class="col-md-4">
		<label>Tipo de Reunião</label>
		<input type="text" class="form-control mb-4" name="cad-tipo-reuniao" id="cad-tipo-reuniao" value="<?php echo $registros['tipo'] ?>" readonly>
	</div>
	
		<div class="col-md-4">
		<label>Data</label>
		<input type="text" class="form-control mb-4" name="cad-data" id="cad-data" value="<?php echo $registros['data'] ?>" readonly>
	</div>
	
			<div class="col-md-4">
		<label>Inicio</label>
		<input type="text" class="form-control mb-4" name="cad-inicio" id="cad-inicio" value="<?php echo $registros['inicio'] ?>" readonly>
	</div>
	
		<div class="col-md-4">
		<label>Término</label>
		<input type="text" class="form-control mb-4" name="cad-termino" id="cad-termino" value="<?php echo $registros['termino'] ?>" readonly>
	</div>
	
	
	<div class="col-md-12 mt-5">
		 <a class="pointer" data-toggle="modal" data-target="#ModalCadastroAssuntos" ><img src="imgs/icone-mais.png" width="25" height="25" alt="" class="pointer" /> Novos Assuntos</a>
		<h3>Assuntos Abordados</h3>
		
		
	<table id="tabela-assuntos" class="display" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>Assunto</th>
              	<th>Anexo</th>
				<th>Risco Associado</th>
				<th>Ação</th>
				
            </tr>
        </thead>
        <tbody>
			<?php
	
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from comites_assuntos WHERE codigo_ata='$codigo'");
				while($registros=mysqli_fetch_array($selecao)){
			?>
            <tr>
                <td><a class="text-dark" href="assunto-ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['id'] ?></a></td>
				
                <td><a class="text-dark" href="assunto-ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['assunto'] ?></a></td>
               
				 <td><a class="text-dark" href="assunto-ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['anexo'] ?></a></td>
				
				<td><a class="text-dark" href="assunto-ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['risco_associado'] ?></a></td>
				
			<td><i class="fa fa-trash pointer" onClick="ExcluirAssuntos(<?php echo $registros['id'] ?>)"></i></td> 
               
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>	
		
	</div>	
	
	
	
	<div class="col-md-12 mt-5">
		 <a class="pointer" data-toggle="modal" data-target="#ModalCadastroTratamentos" ><img src="imgs/icone-mais.png" width="25" height="25" alt="" class="pointer" /> Novos Tratamentos</a>
		<h3>Tratamentos</h3>
		
		
		<div id="carregar-tabela-tratamentos"> </div>	
		
	</div>	
	
	
	
	
		
	</div>
	
</div>				
					
				</div>
			</div>
		</div>

	</div>

	<!-- Modal -->
<div class="modal fade" id="ModalCadastroAssuntos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novos Assuntos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row ml-4 mr-4 mt-4 mb-4">
		  
			<div class="col-md-6 mb-4">
				<label>Assunto</label>
				<input type="text" class="form-control" name="cad-assunto" id="cad-assunto">
			</div>
				
		<div class="col-md-6 mb-4">
				<label>Risco Associado</label>
				<input type="text" class="form-control" name="cad-risco-associado" id="cad-risco-associado">
			</div>
			
			<div class="col-md-6 mb-4">
				<label>Anexo</label>
				<input type="text" class="form-control" name="cad-anexo" id="cad-anexo">
			</div>
			
			
			<div class="col-md-12 mb-4">
				<label>Descrição</label>
				<textarea class="form-control" rows="6" name="cad-descricao" id="cad-descricao"></textarea>
			</div>
			
			
			
		<div class="col-md-12 mt-3">
			<input type="button" value="Cadastrar Novo Assunto" class="btn btn-primary" onClick="CadastrarAssuntos(<?php echo $codigo; ?>)">
			
		</div>
		  
		 </div>
		  
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>


	
	
<!-- Modal -->
<div class="modal fade" id="ModalCadastroTratamentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Tratamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row ml-4 mr-4 mt-4 mb-4">
		  
			<div class="col-md-6 mb-4">
				<label>Atividade</label>
				<input type="text" class="form-control" name="cad-atividade-tratamento" id="cad-atividade-tratamento">
			</div>
			
			<div class="col-md-6 mb-4">
				<label>Assunto</label>
			<select class="form-control" name="cad-codigo-assunto" id="cad-codigo-assunto">	
				<?php
			$selecao_assuntos=mysqli_query($conexao,"select * from comites_assuntos WHERE codigo_ata='$codigo'");
			while($registros_assuntos=mysqli_fetch_array($selecao_assuntos)){	
				?>
				
					<option value="<?php echo $registros_assuntos['id'] ?>"><?php echo $registros_assuntos['assunto'] ?></option>
			<?php } ?>	
				
				
				
				</select>
				
				
			</div>
			
			<div class="col-md-6 mb-4">
				<label>Data prevista</label>
				<input type="text" class="form-control datepicker" name="cad-data-prevista-tratamento" id="cad-data-prevista-tratamento">
			</div>
			
			<div class="col-md-6 mb-4">
		<label>Responsável</label>
		<select class="form-control" name="cad-responsavel" id="cad-responsavel" >
			<?php 
			$selecao1=mysqli_query($conexao,"select * from usuarios_empresa");
			while($registros1=mysqli_fetch_array($selecao1)){
			 ?>
			<option value="<?php echo $registros1['id'] ?>">
				<?php echo $registros1['nome'] ?> - <?php echo $registros1['email'] ?>
			</option>
			
			<?php } ?>
			
		</select>
	</div>	
			
			<div class="col-md-6 mb-4">
				<label>Status</label>
				<input type="text" class="form-control" name="cad-status" id="cad-status">
			</div>
			
			
		<div class="col-md-12 mt-3">
			<input type="button" value="Cadastrar Novo Tratamento" class="btn btn-primary" onClick="CadastrarTratamentos(<?php echo $codigo; ?>)">
			
		</div>
		  
		 </div>
		  
      </div>
      <div class="modal-footer">
       
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
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
$b=jQuery.noConflict()	
	
$b(document).ready(function() {
	CarregarTabelaTratamentos()
	
} );
		
	$b("#tabela-assuntos").dataTable({
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
	 
	 
	 
	 
		
	
	function CadastrarAssuntos(codigo_ata){
		
		var assunto = $b("#cad-assunto").val()
		var risco =  $b("#cad-risco-associado").val()
		var anexo =   $b("#cad-anexo").val()
		
		
		$b.ajax({
		type: 'post',
		data: 'codigo='+codigo_ata+'&assunto='+assunto+'&risco_associado='+risco+'&anexo='+anexo,
		url:'funcoes/gravar-assuntos-ata.php',
		success: function(retorno){
		$b(".close").trigger("click") 
			location.reload()		 
				
		  }
		   })  
	}


	function CadastrarTratamentos(codigo_ata){
		
		var atividade = $b("#cad-atividade-tratamento").val()
		var assunto =  $b("#cad-atividade-assunto").val()
		var data_prevista =   $b("#cad-data-prevista-tratamento").val()
		var status = $b("#cad-status").val()
		var responsavel = $b("#cad-responsavel").val()
		
		$b.ajax({
		type: 'post',
		data: 'codigo='+codigo_ata+'&atividade='+atividade+'&assunto='+assunto+'&data_prevista='+data_prevista+'&status='+status+'&responsavel='+responsavel,
		url:'funcoes/gravar-tratamentos-ata.php',
		success: function(retorno){
			$b(".close").trigger("click") 
			location.reload()
		  }
		   })  
	}
	 
	 
		function CarregarTabelaTratamentos(){
		  $b.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo ?>',
			  url:'funcoes/carregar-tabela-tratamentos.php',
			  success: function(retorno){
				 
		$b("#carregar-tabela-tratamentos").html(retorno)
				
		  }
		   })  
		
	}	 
	 
	 
	$b(".datepicker").datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
}); 
		  
		  
  $b(function() {
    $b(".datepicker").datepicker();
  } ); 
	 
	 
	 
	
	 
	 	function ExcluirTratamento(codigo){
		
	if (window.confirm("Você deseja excluir o Tratamento?")) {

	  $b.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-tratamentos.php',
			  success: function(retorno){
				 
			 CarregarTabelaTratamentos()
		  }
		   })  	
}}	
	 
	 
	 function ExcluirAssuntos(codigo){
		 
		 if (window.confirm("Você deseja excluir o Assunto?")) {

	  $b.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-assuntos.php',
			  success: function(retorno){
				 
			 location.reload()
		  }
		   })  	
		 
	 }}
	 
</script>

	  
	

 	

</body>
</html>