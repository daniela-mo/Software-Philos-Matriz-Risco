<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;

$codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>



<select class="form-control" id="escolher-area" name="escolher-area">
	<option value="0">Escolher Área de Atuação</option>
	<?php
	$selecao2 = mysqli_query($conexao, "select * from areas  WHERE codigo_empresa='$codigo' order by area ASC");
	while ($registros2 = mysqli_fetch_array($selecao2)) {
	?>
		<option value="<?php echo $registros2['id'] ?>"><?php echo $registros2['area'] ?></option>

	<?php } ?>
</select>