<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');


$descricao = $_POST['descricao'];
$responsavel = $_POST['responsavel'];
$area_plano_acao = $_POST['area_plano_acao'];
$inicio = $_POST['inicio'];
$conclusao = $_POST['conclusao'];
$prioridade = $_POST['prioridade'];
$status_plano_acao = $_POST['status_plano_acao'];
$id = $_REQUEST['codigo'];


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');



$gravar = mysqli_query($conexao, "insert into 
tabela_plano_de_acao_temp(
descricao,
responsavel,
area,
prioridade,
status,
data_prevista_conclusao,
data_conclusao,
codigo_rnc
)values(
'$descricao',
'$responsavel',
'$area_plano_acao',
'$prioridade',
'$status_plano_acao',
'$inicio',
'$conclusao',
'$id'

) ");
if ($gravar) { ?>

    <!-- <script>
        location.href = 'rnc.php?cod=<?php echo $id ?>&aba=plano'
    </script> -->

<?php } else { ?>

<?php
}
?>