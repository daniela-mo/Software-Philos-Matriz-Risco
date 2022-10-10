<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


$tipo=$_POST['tipo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
?>

<select class="form-control" name="cad-cliente-fornecedor" id="cad-cliente-fornecedor">
	<option value="Não Informado">Escolher</option>
	<?php
$selecao=mysqli_query($conexao,"select * from terceiros WHERE class_".$tipo."='1'");
while($registros=mysqli_fetch_array($selecao)){
?>
	
	<option value="<?php echo $registros['id'] ?>"><?php echo $registros['razao_social'] ?></option>	
	
<?php } ?>	
</select>



