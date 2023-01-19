<form action="processa-cadastro-fase-workflow.php" method="post">	
	<input type="hidden" name="codigo-fase" id="codigo-fase" value="<?php echo $codigo ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
		
			
		
			<div class="row">
				<div class="col-12">
				
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Cadastro Fase </h3>			
	
		
<div class="row ml-4 mr-4">		
		
			
	<div class="col-md-8 mb-4">
		<label>Título</label>
		<input type="text" name="cad-titulo" id="cad-titulo" class="form-control" required>
	</div>
	
	<div class="col-md-2 mb-4">
		<label>Data de Inicio</label>
		<input type="text" name="cad-data-inicio" id="cad-data-inicio" class="form-control datepicker" required>
	</div>
	
	<div class="col-md-2 mb-4">
		<label>Data Termino</label>
		<input type="text" name="cad-data-termino" id="cad-data-termino" class="form-control datepicker" required>
	</div>
		
	
	<div class="col-md-12">
		<label>Descrição</label>
		<textarea class="form-control" cols="5" rows="5" name="cad-descricao" id="cad-descricao"></textarea>
	</div>	
	
	<div class="col-md-12 mt-4">
		<input type="submit" class="btn btn-primary" value="Cadastrar Fase">
	</div>	
					
</div>				
					
				</div>
			</div>
		</div>

	</div>
</form>	