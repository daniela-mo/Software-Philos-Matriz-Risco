<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];



$excluir = mysqli_query($conexao, "delete  from identificacao_do_risco WHERE id='$codigo' ");


if ($excluir) {

    $exclui1 = mysqli_query($conexao, "delete from tabela_avaliacao_risco_inerente WHERE codigo_matriz='$codigo'");
    $exclui2 = mysqli_query($conexao, "delete from tabela_avaliacao_risco_residual WHERE codigo_matriz='$codigo'");

    $exclui3 = mysqli_query($conexao, "delete from avaliacao_risco_residual WHERE codigo_matriz='$codigo'");
    $exclui4 = mysqli_query($conexao, "delete from avaliacao_risco_inerente WHERE codigo_matriz='$codigo'");
    $exclui5 = mysqli_query($conexao, "delete from avaliacao_risco_futuro WHERE codigo_matriz='$codigo'");

    $alterar =  mysqli_query($conexao, "update area_principal_risco set status='3' WHERE codigo_matriz_risco='$codigo'");
    $alterar2 =  mysqli_query($conexao, "update demais_areas_risco set status='3' WHERE codigo_matriz_risco='$codigo'");
    $alterar3 =  mysqli_query($conexao, "update item_qaa_risco set status='3' WHERE codigo_matriz_risco='$codigo'");

?>


<?php }
if ($excluir) {

    // $seleco = mysqli_query($conexao, "select * from identificacao_do_risco order by codigo DESC");
    // $registr = mysqli_fetch_array($seleco);
    // $codigoa = $registr['codigo'];



} else { ?>

	
<?php
}
?>
