<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo_area = $_POST['area'];
$codigo_matriz = $_POST['codigo_matriz'];



mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$selecao = mysqli_query($conexao, "select * from areas WHERE id='$codigo_area'");
$registros = mysqli_fetch_array($selecao);
$nome_area = $registros['area'];


$selecao_codigo = mysqli_query($conexao, "select * from area_principal_risco WHERE id='$codigo_matriz'");
$registros_codigo = mysqli_fetch_array($selecao_codigo);
$codigo = $registros_codigo['codigo_matriz_risco'];


$gravar = mysqli_query($conexao, "update area_principal_risco set area='$nome_area',codigo_area='$codigo_area',status='2' WHERE ='$codigo'");


if ($gravar) { ?>

    <script>
        location.href = 'matriz-de-risco.php?cod=<?php echo $codigo_matriz ?>&aba=analise'
    </script>

<?php } else { ?>

<?php
}
?>