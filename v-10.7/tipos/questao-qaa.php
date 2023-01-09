<?php
	include('../conexao.php');
?>

<div class="row ">

	
<div class="col-md-8 mb-4">
	
<label>Escolha a questão do QAA</label>
	<select class="form-control">
	<?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao=mysqli_query($conexao,"select * from qaa");
	while($registros=mysqli_fetch_array($selecao)){
?>	
	<option><?php echo $registros['pergunta'] ?></option>	
	
	<?php } ?>
	
</select>
	
</div>	

<div class="col-md-12 mb-4">	
<input type="button" class="btn btn-primary" value="Gravar Tarefa" onClick="GravarArquivo()">
	</div>	
	
</div>	