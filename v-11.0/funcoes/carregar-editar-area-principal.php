<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
// $codigo_area = $_POST['area'];
$codigo_matriz = $_POST['codigo'];
// $id = $_POST['id'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>



<?php
// $selecao = mysqli_query($conexao, "select * from areas WHERE id='$codigo_area'");
// $registros = mysqli_fetch_array($selecao);
// $nome_area = $registros['area'];


// $selecao_codigo = mysqli_query($conexao, "select * from identificacao_do_risco WHERE id='$codigo_matriz'");
// $registros_codigo = mysqli_fetch_array($selecao_codigo);
// $codigo = $registros_codigo['codigo'];




$selecao_principal = mysqli_query($conexao, "select * from area_principal_risco WHERE codigo_matriz_risco='$codigo_matriz'");
while ($registros_principal = mysqli_fetch_array($selecao_principal)) {
    $id_principal = $registros_principal['id'];
?>
    <div class="d-flex mb-2 align-items-center" style="border: 1px solid red;">
        <input type="text" readonly class="form-control mr-2" value="<?php echo $registros_principal['area'] ?>">

    </div>
<?php
} ?>

<div class="col-md-12 ml-2 mt-4">
    <input type="button" value="Atualizar Area" class="btn btn-primary float-right" onClick="AtualizarAreaPrincipal(<?php echo $registros_principal['id'] ?>)" data-dismiss="modal">

</div>