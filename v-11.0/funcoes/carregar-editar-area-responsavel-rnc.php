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

    <input type="text" class="form-control" name="edit-area-responsavel" id="edit-area-responsavel" value="<?php echo $registros_rnc['area_responsavel'] ?>">


    <input type="button" class="btn btn-primary mt-3" value="Atualizar Área do Responsável pelo Registro" onClick="AtualizarAreaResponsavel(<?php echo $registros_rnc['id'] ?>)">

</div>