<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$tipo=$_POST['tipo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
?>

<select class="form-control" name="cad-cliente-fornecedor" id="cad-cliente-fornecedor">
	<?php
$selecao=mysqli_query($conexao,"select * from 8d WHERE id='$codigo'");
$registros=mysqli_fetch_array($selecao);
?>
	<option><strong><?php $cliente= $registros['cliente_fornecedor'];
							$selecao1=mysqli_query($conexao,"select * from terceiros WHERE id='$cliente'");
							$registros1=mysqli_fetch_array($selecao1);
							echo $registros1['razao_social'];
							?></strong> (Atual)</option>

	
	<?php
$selecao=mysqli_query($conexao,"select * from terceiros WHERE class_".$tipo."='1'");
while($registros2=mysqli_fetch_array($selecao)){
?>
	<?php
		if($cliente!=$registros2['id']){										
	?>											
	<option value="<?php echo $registros2['id'] ?>"><?php echo $registros2['razao_social'] ?></option>	
	
<?php }} ?>	
</select>



