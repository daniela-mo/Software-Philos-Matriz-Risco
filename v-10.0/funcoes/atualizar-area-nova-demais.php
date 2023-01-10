<script>
    alert('entrando area principal')
</script>

<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$codigo_area = $_POST['area'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$selecao = mysqli_query($conexao, "select * from areas WHERE id='$codigo_area'");
$registros = mysqli_fetch_array($selecao);
$nome_area = $registros['area'];

$selecao_codigo = mysqli_query($conexao, "select * from identificacao_do_risco WHERE id='$codigo_matriz'");
$registros_codigo = mysqli_fetch_array($selecao_codigo);
$codigo = $registros_codigo['codigo'];


$atualizar = mysqli_query($conexao, "update demais_areas_risco set codigo_area='$codigo_area', area='$nome_area' WHERE id='$codigo'");
if ($atualizar) { ?>


<?php } else { ?>


<?php }

?>