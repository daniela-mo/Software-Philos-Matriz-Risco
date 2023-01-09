<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$causa = $_POST['causa'];
$causa = addslashes($causa);
$setor = $_POST['setor'];
$codigo_matriz = $_POST['codigo_matriz'];



mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$gravar = mysqli_query($conexao, "insert into matriz_de_risco_causas(causa,setor,codigo_matriz)values('$causa','$setor','$codigo_matriz')");


if ($gravar) { ?>

    <script>
        location.href = 'matriz-de-risco.php?cod=<?php echo $codigo_matriz ?>&aba=analise'
    </script>

<?php } else { ?>

<?php
}
?>