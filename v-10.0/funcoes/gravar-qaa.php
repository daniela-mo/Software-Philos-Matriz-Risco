<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo_bloco = $_POST['codigo'];
$perguntaSimNao = $_POST['perguntaSimNao'];
$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];

$questao = $_POST['questao'];
$questao = addslashes($questao);

$resposta = $_POST['resposta'];
$resposta = addslashes($resposta);

$questaomae = $_POST['questaomae'];
if ($questaomae == '') {
    $questaomae = '0';
}

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$gravar = mysqli_query($conexao, "insert into questoes_qaa(
    questao,resposta,
    titulo,codigo_bloco,pergunta_sim_nao
    values('$questao',
    '$resposta','$titulo',
    '$codigo_bloco','$questaomae','$tipo', '$pergunta_sim_nao') ");




if ($gravar) {



?>

    <!-- <script>
        alert("Gravando")
    </script> -->

<?php } else { ?>

    <!-- <script>
        alert("Não Gravou")
    </script> -->
<?php
}
?>