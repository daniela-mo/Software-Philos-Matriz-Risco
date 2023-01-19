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
$selecao = mysqli_query($conexao, "select * from rnc WHERE id='$codigo'");
$registros_rnc = mysqli_fetch_array($selecao);
?>


<div class="row ml-4 mr-4">


    <input type="text" class="form-control" name="edit-responsavel-rnc" id="edit-responsavel-rnc" value="<?php echo $registros_rnc['responsavel_rnc'] ?>">


    <input type="button" class="btn btn-primary mt-3" value="Atualizar Responsável pelo registro" onClick="AtualizarResponsavel(<?php echo $registros_rnc['id'] ?>)">


</div>