<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$cnpj=$_POST['cnpj'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$selecao_areas=mysqli_query($conexao,"select * from cadastro WHERE cnpj='$cnpj'");
while($registros_areas=mysqli_fetch_array($selecao_areas)){
			?>


<input type="hidden" id="retorno-codigo" value="<?php echo $codigo=$registros_areas['id'] ?>">
<input type="hidden" id="retorno-data-cadastro" value="<?php echo $registros_areas['data_cadastro'] ?>">
<input type="hidden" id="retorno-requerimento" value="<?php echo $registros_areas['requerimento'] ?>">
<input type="hidden" id="retorno-data-pleito" value="<?php echo $registros_areas['data_pleito'] ?>">
<input type="hidden" id="retorno-certificacao" value="<?php echo $registros_areas['certificacao'] ?>">
<input type="hidden" id="retorno-data-certificacao" value="<?php echo $registros_areas['data_certificacao'] ?>">
<input type="hidden" id="retorno-data-validacao" value="<?php echo $registros_areas['data_validacao'] ?>">



<?php } ?>

