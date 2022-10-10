<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo= $_POST['codigo'];
$a=1;

$selecao=mysqli_query($conexao,"select * from tabela_requisitos_normativos WHERE codigo_requisito='$codigo'");
	$numero=mysqli_num_rows($selecao);
if($numero==0){
?>

<h3>Sem registros</h3>

<?php }else{ ?>


<table class="table">

	<tr>
		<th>Número</th>
		<th>Requisito Normativo</th>
	</tr>

<?php
	
	    mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao=mysqli_query($conexao,"select * from tabela_requisitos_normativos WHERE codigo_requisito='$codigo'");
	
	while($registros=mysqli_fetch_array($selecao)){
?>

	
	
	

<tr>
	<td><input type="number" value="<?php echo $registros['numero'] ?>" id="editar_numero[]" name="editar-numero" class="form-control"></td>
	
	<td>
		<input type="hidden" id="codigo_requisito[]" value="<?php echo $registros['id'] ?>">	
		
		<input type="text" value="<?php echo $registros['requisito'] ?>" id="editar_requisito[]" name="editar-requisito" class="form-control">
	
	
	</td>	
</tr>


<?php $a=$a+1; }} ?>
	
	
	</table>