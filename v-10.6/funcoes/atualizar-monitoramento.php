<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$definicao_kpis = $_POST['definicao_kpis'];
$periodicidade = $_POST['periodicidade'];
$responsavel = $_POST['responsavel'];
$objetivo_monitoramento = $_POST['objetivo_monitoramento'];
$necessidade_revisao = $_POST['necessidade_revisao'];




mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update monitoramento_risco set
definicao_kpis = '$definicao_kpis',
periodicidade = '$periodicidade',
responsavel = '$responsavel',
objetivo_sim_nao = '$objetivo_monitoramento',
necessidade_revisao_sim_nao = '$necessidade_revisao'
WHERE id='$codigo'
");
