<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>
	
	  <script>
	$d=jQuery.noConflict()	 
		  
		 $d(".datepicker").datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
}); 
		  
		  
  $d(function() {
    $d(".datepicker").datepicker();
	 
	  CarregarData()
	  
	  
  } );
		  
		  

		  
		  
  </script>	
<script>

</script>

<div class="row">		
		<div class="col-md-12">
	<h3 class="mb-4 mt-4">Cadastro Atividade </h3>			
	</div>
	
	<div class="col-md-6 mb-4">
		<label>Marco</label>
		<select class="form-control" name="cad-codigo-marco" id="cad-codigo-marco">
			<option value="0">Nenhum - Sem marco</option>
		<?php
			include('../conexao.php');
				mysqli_query($conexao,"SET NAMES 'utf8'");
		mysqli_query($conexao,'SET character_set_connection=utf8');
		mysqli_query($conexao,'SET character_set_client=utf8');
		mysqli_query($conexao,'SET character_set_results=utf8');
		$selecao_marco=mysqli_query($conexao,"select * from fases_workflow where codigo_planejamento='1'");
		while($registros_marco=mysqli_fetch_array($selecao_marco)){
		?>
		
		<option value="<?php echo $registros_marco['id'] ?>"><?php echo $registros_marco['fase'] ?></option>
		
		<?php } ?>
		</select>
	</div>
			
	<div class="col-md-6 mb-4">
		<label>Nome da Tarefa</label>
		<input type="text" name="cad-tarefa" id="cad-tarefa" class="form-control" required>
	</div>
	
	
	
		<div class="col-md-3 mb-4">
		<label>Data de Inicio</label>
		<input type="text" name="cad-data-inicio" id="cad-data-inicio" class="form-control datepicker data" required>
	</div>
	
	<div class="col-md-3 mb-4">
		<label>Data Termino</label>
		<input type="text" name="cad-data-termino" id="cad-data-termino" class="form-control datepicker data" required>
	</div>
	
	
	<div class="col-md-12">
		<label>Descrição</label>
		<textarea class="form-control" cols="5" rows="5" name="cad-descricao" id="cad-descricao"></textarea>
	</div>	
	
	
	<div class="col-md-12">

	
		
	<div id="resposta-campos">
		
	</div>	
		
		
		
	</div>
	
	
	
	<div class="col-md-12 mt-4">
		<input type="button" class="btn btn-primary" value="Cadastrar Tarefa" onClick="CadastroTarefa()">
	</div>	
					
</div>				
					
	
		