<script>
    alert('entrando')
</script>
<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$editar_causa_tratamento = $_POST['editar_causa_tratamento'];
$edit_risco = $_POST['edit_risco'];
$edit_descricao  = $_POST['edit_descricao'];
$edit_responProc = $_POST['edit_responProc'];
$edit_data_inicio  = $_POST['edit_data_inicio'];
$edit_data_vencimento = $_POST['edit_data_vencimento'];
$edit_prioridade = $_POST['edit_prioridade'];




mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update workflow set
planejamento = '$edit_descricao',
causa = '$editar_causa_tratamento',
risco = '$edit_risco',
responProc = '$edit_responProc',
data_inicio = '$edit_data_inicio',
data_vencimento = '$edit_data_vencimento',
prioridade = '$edit_prioridade'
WHERE id='$codigo'
");
