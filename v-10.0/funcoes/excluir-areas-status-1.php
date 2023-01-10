<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');




$deletar =  mysqli_query($conexao, "delete from area_principal_risco WHERE status='1'");
$deletar1 =  mysqli_query($conexao, "delete from demais_areas_risco WHERE status='1'");
$deletar2 =  mysqli_query($conexao, "delete from item_qaa_risco WHERE status='1'");


?>
<script>
    location.href = "cadastro-identificacao-de-risco.php"
</script>