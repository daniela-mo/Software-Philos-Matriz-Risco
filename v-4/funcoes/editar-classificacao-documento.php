<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo= $_POST['codigo'];
$a=1;
?>


<table class="table">

	<tr>
		<th>Código</th>
		<th>Descrição</th>
		<th>Tipo Documento</th>
	</tr>

<?php
	
	    mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao=mysqli_query($conexao,"select * from classificacao_documento WHERE id='$codigo'");
	
	while($registros=mysqli_fetch_array($selecao)){
?>

	
	
	

<tr>
	<td><input type="text" class="form-control" value="<?php echo $registros['sigla'] ?>" id="editar-sigla" ></td>
	<td><input type="text" class="form-control" value="<?php echo $registros['descricao'] ?>" id="editar-descricao"  ></td>
	<td><input type="text" class="form-control" value="<?php echo $registros['tipo_documento'] ?>" id="editar-tipo-documento"  ></td>
</tr>


	<?php } ?>
	
	
	</table>