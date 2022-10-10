
<?php 

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$codigo=$_POST['codigo'];

$selecao=mysqli_query($conexao,"select * from tipo_impacto WHERE id='$codigo'");
$registros=mysqli_fetch_array($selecao);
?>

<div class="row mb-4">		
	<div class="col-md-6">
		<label>Item</label>	
		<input type="text" class="form-control mb-3" name="esc-item" id="esc-item" value="<?php echo $registros['item'] ?>">
	</div>
	
	<div class="col-md-6">
		<label>Descrição</label>
		<input type="text" class="form-control mb-3" name="esc-descricao" id="esc-descricao" value="<?php echo $registros['descricao'] ?>">
	</div>
	
	<div class="col-md-6">
		<label>Baixa</label>	
		<input type="text" class="form-control mb-3" name="esc-baixa" id="esc-baixa" value="<?php echo $registros['baixa'] ?>">
	</div>
	
	<div class="col-md-6">
		<label>Média</label>
		<input type="text" class="form-control mb-3" name="esc-media" id="esc-media" value="<?php echo $registros['media'] ?>">
	</div>
	
	<div class="col-md-6">
		<label>Alta</label>	
		<input type="text" class="form-control mb-3" name="esc-alta" id="esc-alta" value="<?php echo $registros['alta'] ?>">
	</div>
	
	<div class="col-md-6">
		<label>Muito Alta</label>
		<input type="text" class="form-control mb-3" name="esc-malta" id="esc-malta" value="<?php echo $registros['malta'] ?>">
	</div>
	
	<div class="col-md-6">
		<input type="button" class="btn btn-primary mt-3" value="Atualizar" onClick="AtualizarImpacto(<?php echo $registros['id'] ?>)" >
	</div>
	
	
</div>	
	
	
	
	
	
	
	
		
	
		