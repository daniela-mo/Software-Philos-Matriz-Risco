<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

// $codigoa = $_POST['codigo'];


$seleco = mysqli_query($conexao, "select * from identificacao_do_risco WHERE codigo='$codigo'");
// $registr = mysqli_fetch_array($seleco);
// $codigoa = $registr['codigo'];

if ($excluir) {


    $alterar =  mysqli_query($conexao, "update area_principal_risco set status='3' WHERE codigo_matriz_risco='$codigo'");
    $alterar2 =  mysqli_query($conexao, "update demais_areas_risco set status='3' WHERE codigo_matriz_risco='$codigo'");
    $alterar3 =  mysqli_query($conexao, "update item_qaa_risco set status='3' WHERE codigo_matriz_risco='$codigo'");



?>

<?php } ?>