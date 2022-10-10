
			
		
			<div class="row">		
				<div class="col-12">
				
 	<h3 class="mb-4 mt-4">Cadastro Marco </h3>			
	
		
<div class="row">		
		
			
	<div class="col-md-6 mb-4">
		<label>Título</label>
		<input type="text" name="cad-titulo" id="cad-titulo-marco" class="form-control" required>
	</div>
	
	<div class="col-md-3 mb-4">
		<label>Data de Inicio</label>
		<input type="text" name="cad-data-inicio" id="cad-data-inicio-marco" class="form-control datepicker data" required autocomplete="off"  >
	</div>
	
	<div class="col-md-3 mb-4">
		<label>Data Termino</label>
		<input type="text" name="cad-data-termino" id="cad-data-termino-marco" class="form-control datepicker data" required autocomplete="off">
	</div>
	
	<div class="col-md-4 mb-4">
		<label>Status</label>	
<select class="form-control" name="cad-status-fase" id="cad-status-fase">	
		
			<option>Não iniciado</option>
			<option>Em andamento</option>
			<option>Concluído</option>
		
			
		</select>		
	</div>
	
	<div class="col-md-3">
		<label>Periodicidade</label>
		<select class="form-control" name="cad-periodicidade3" id="cad-periodicidade3">	
			<option>Diário</option>
			<option>Quinzenal</option>
			<option>Mensal</option>
			<option>Bimestral</option>
			<option>Trimestral</option>
			<option>Semestral</option>
			<option>Anual</option>
			<option>Bianual</option>
		</select>	
	</div>
		
	
	<div class="col-md-12">
		<label>Descrição</label>
		<textarea class="form-control" cols="5" rows="5" name="cad-descricao" id="cad-descricao-marco"></textarea>
	</div>	
	
	<div class="col-md-12 mt-4">
		<input type="submit" class="btn btn-primary" value="Cadastrar Marco" onClick="CadastroMarco()">
	</div>	
					
</div>				
					
				</div>
			</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>
   
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
     <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.pt-br.js" type="text/javascript"></script>

<script>
	$f=jQuery.noConflict()	 
	

    $f(document).ready(function(){ 

$f('.data').mask('99/99/9999');		
		
		CarregarData()
});    
 

	 var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
		
		
		
        $f('#cad-data-inicio-marco').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'
			
          
        });
		
			
	
	
	$f('#cad-data-termino-marco').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
            minDate: function () {
                return $f('#cad-data-inicio-marco').val();
            }
        });
	
	
	
	
</script>