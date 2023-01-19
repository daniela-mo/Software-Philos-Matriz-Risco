<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$monitoramento = $_POST['monitoramento'];
$plano_acao  = $_POST['plano_acao'];
$area_monitoramento = $_POST['area_monitoramento'];
$responsavel_monitoramento = $_POST['responsavel_monitoramento'];
$data = $_POST['data'];
$status_monitoramento = $_POST['status_monitoramento'];



mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update monitoramento_rnc set item ='$plano_acao', descricao ='$monitoramento', data ='$data',status ='$status_monitoramento',area= '$area_monitoramento',responsavel_monitor= '$responsavel_monitoramento' WHERE id='$codigo'
");
