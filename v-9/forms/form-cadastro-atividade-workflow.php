<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
?>


<div class="row">
	<div class="col-md-12">
		<h3 class="mb-4 mt-4">Cadastro Atividade </h3>
	</div>

	<div class="col-md-6 mb-4">
		<label>Marco</label>
		<select class="form-control" name="cad-codigo-marco" id="cad-codigo-marco">
			<option value="0">Nenhum - Sem marco</option>
			<?php
			mysqli_query($conexao, "SET NAMES 'utf8'");
			mysqli_query($conexao, 'SET character_set_connection=utf8');
			mysqli_query($conexao, 'SET character_set_client=utf8');
			mysqli_query($conexao, 'SET character_set_results=utf8');
			$selecao_marco = mysqli_query($conexao, "select * from fases_workflow where codigo_planejamento='$codigo'");
			while ($registros_marco = mysqli_fetch_array($selecao_marco)) {
			?>

				<option value="<?php echo $registros_marco['id'] ?>"><?php echo $registros_marco['fase'] ?></option>

			<?php } ?>
		</select>
	</div>

	<div class="col-md-6 mb-4">
		<label>Atividade</label>
		<input type="text" name="cad-tarefa" id="cad-tarefa" class="form-control" required>
	</div>

	<div class="col-md-6 mb-4">
		<label>Envolvido</label>
		<input type="text" name="cad-envolvido" id="cad-envolvido" class="form-control" required>
	</div>



	<div class="col-md-3 mb-4">
		<label>Data de Inicio</label>
		<input type="text" name="cad-data-inicio" id="cad-data-inicio2" class="form-control datepicker data" required autocomplete="off">
	</div>

	<div class="col-md-3 mb-4">
		<label>Data Termino</label>
		<input type="text" name="cad-data-termino" id="cad-data-termino2" class="form-control datepicker data" required autocomplete="off">
	</div>

	<div class="col-md-4 mb-4">
		<label>Status</label>
		<select class="form-control" name="cad-status-atividade" id="cad-status-atividade">

			<option>Não iniciado</option>
			<option>Em andamento</option>
			<option>Concluído</option>


		</select>
	</div>

	<div class="col-md-3">
		<label>Periodicidade</label>
		<select class="form-control" name="cad-periodicidade2" id="cad-periodicidade2">
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
		<textarea class="form-control" cols="5" rows="5" name="cad-descricao" id="cad-descricao"></textarea>
	</div>


	<div class="col-md-12">



		<div id="resposta-campos">

		</div>



	</div>



	<div class="col-md-12 mt-4">
		<input type="button" class="btn btn-primary" value="Cadastrar Atividade" onClick="CadastroAtividade()">
	</div>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script src="js/mascaras.js"></script>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.pt-br.js" type="text/javascript"></script>

<script>
	$f = jQuery.noConflict()



	$f(document).ready(function() {

		CarregarData()
	});



	var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());



	$f('#cad-data-inicio2').datepicker({
		uiLibrary: 'bootstrap4',
		iconsLibrary: 'fontawesome',
		locale: 'pt-br',
		format: 'dd/mm/yyyy'


	});




	$f('#cad-data-termino2').datepicker({
		uiLibrary: 'bootstrap4',
		iconsLibrary: 'fontawesome',
		locale: 'pt-br',
		format: 'dd/mm/yyyy',
		minDate: function() {
			return $f('#cad-data-inicio2').val();
		}
	});
</script>