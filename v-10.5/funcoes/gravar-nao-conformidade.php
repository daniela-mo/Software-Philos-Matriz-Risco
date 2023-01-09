<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$descricao = $_POST['descricao'];
$descricao = addslashes($descricao);
$id = $_POST['id'];



mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$gravar = mysqli_query($conexao, "insert into detalhe_nao_conformidade(descricao,id_registro)values('$descricao','$id')");


if ($gravar) { ?>

    <script>
        location.href = 'cadastro-rnc.php?cod=<?php echo $id ?>&aba=registro'
    </script>

<?php } else { ?>

<?php
}
?>