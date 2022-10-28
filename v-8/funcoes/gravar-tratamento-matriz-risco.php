<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$codigo = $_POST['codigo_matriz'];
$inicio = $_POST['inicio'];
$causa_tratamento = $_POST['causa_tratamento'];
$risco = $_POST['risco'];


@$data_min = $_POST['inicio'];
$ano_min = substr($data_min, 6, 10);
$mes_min = substr($data_min, 3, 2);
$dia_min = substr($data_min, 0, 2);

@$data_min = $ano_min . "-" . $mes_min . "-" . $dia_min;



$vencimento = $_POST['vencimento'];

@$data_max = $_POST['vencimento'];
$ano_max = substr($data_max, 6, 10);
$mes_max = substr($data_max, 3, 2);
$dia_max = substr($data_max, 0, 2);

@$data_max = $ano_max . "-" . $mes_max . "-" . $dia_max;




$responProc = $_POST['responProc'];
$prioridade = $_POST['prioridade'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];


$selecao = mysqli_query($conexao, "select * from matriz_de_risco_causas WHERE id='$causa_tratamento'");
$registro_causa = mysqli_fetch_array($selecao);
$causa = $registro_causa['causa'];



$gravar = mysqli_query($conexao, "insert into workflow(codigo_matriz_risco,planejamento,prioridade,data_inicio,data_vencimento,tratamento,status,responProc,causa,risco)values('$codigo','$descricao','$prioridade','$data_min','$data_max','1','Aberto','$responProc','$causa','$risco') ");


if ($gravar) { ?>
    <!-- <script>
        alert('Tratamento cadastrado')
        location.href = "http://50.19.17.159/matriz-de-risco.php?cod=113&tratamento=1"
    </script> -->

<?php } else { ?>


<?php
}
?>