<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$descricaoAcao = $_POST['descricaoAcao'];
$descricaoAcao = addslashes($descricaoAcao);
$responsavelAcao = $_POST['responsavelAcao'];
$areaAcao = $_POST['areaAcao'];
$dataAcao = $_POST['dataAcao'];
$id = $_POST['id'];



mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$gravar = mysqli_query($conexao, "insert into acao_imediata_nao_conformidade(
    desc_acao,responsavel,data,id_registro,area)values(
    '$descricaoAcao',
    '$responsavelAcao',
    '$dataAcao',
    '$id',
    '$areaAcao'
    )");


if ($gravar) { ?>

    <script>
        location.href = 'cadastro-rnc.php?cod=<?php echo $id ?>&aba=registro'
    </script>

<?php } else { ?>

<?php
}
?>