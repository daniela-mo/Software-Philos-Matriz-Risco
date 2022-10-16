<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];

$excluir = mysqli_query($conexao, "delete  from identificacao_do_risco WHERE id='$codigo'");


if ($excluir) {

    $exclui1 = mysqli_query($conexao, "delete  from tabela_avaliacao_risco_inerente WHERE codigo_matriz='$codigo'");
    $exclui2 = mysqli_query($conexao, "delete  from tabela_avaliacao_risco_residual WHERE codigo_matriz='$codigo'");

    $exclui3 = mysqli_query($conexao, "delete  from avaliacao_risco_residual WHERE codigo_matriz='$codigo'");
    $exclui4 = mysqli_query($conexao, "delete  from avaliacao_risco_inerente WHERE codigo_matriz='$codigo'");
    $exclui5 = mysqli_query($conexao, "delete  from avaliacao_risco_futuro WHERE codigo_matriz='$codigo'");

    $excluir6 = mysqli_query($conexao, "delete  from item_qaa_risco WHERE codigo_matriz_risco='$codigo'");
    $excluir7 = mysqli_query($conexao, "delete  from demais_areas_risco WHERE codigo_matriz_risco='$codigo'");
    $excluir8 = mysqli_query($conexao, "delete  from area_principal_risco WHERE codigo_matriz_risco='$codigo'");



?>


<?php } else { ?>

	
<?php
}
?>
