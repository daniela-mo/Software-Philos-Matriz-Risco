<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$acao  = $_POST['acao'];
$data_acao = $_POST['data_acao'];
$responsavel_acao = $_POST['responsavel_acao'];
$area_acao = $_POST['area_acao'];






mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update acao_imediata_nao_conformidade set
desc_acao='$acao',data='$data_acao',responsavel='$responsavel_acao',area='$area_acao' WHERE id='$codigo'
");
