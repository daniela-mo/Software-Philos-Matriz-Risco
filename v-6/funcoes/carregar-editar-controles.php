<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
$codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>


<?php
$selecao = mysqli_query($conexao, "select * from controles_existentes_temp WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>

<div class="row pl-4 pr-4 ml- mr-4">




	<div class="col-md-12 mb-3">
		<label>Tratamento</label>
		<input type="text" class="form-control mb-4" name="alt-nome" id="alt-nome" value="<?php echo $registros['nome_controle'] ?>">
	</div>

	<div class="col-md-12 mb-3">
		<label>Controles</label>
		<input type="text" class="form-control mb-4" name="alt-objetivo" id="alt-objetivo" value="<?php echo $registros['objetivo_controle'] ?>">
	</div>

	<div class="col-md-12 mb-3">
		<label>Número do procedimento associado ao processo de trabalho envolvido</label>
		<input type="text" class="form-control mb-4" name="alt-objetivo" id="alt-objetivo" value="<?php echo $registros['objetivo_controle'] ?>">
	</div>


</div>


<div class="col-md-12 ml-2 mt-4">
	<input type="button" value="Atualizar Controle" class="btn btn-primary float-right" onClick="AtualizarItens(<?php echo $registros['id'] ?>)" data-dismiss="modal">

</div>