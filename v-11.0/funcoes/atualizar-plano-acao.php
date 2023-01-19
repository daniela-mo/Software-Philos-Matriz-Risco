<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$plano_acao  = $_POST['plano_acao'];
$inicio = $_POST['inicio'];
$termino = $_POST['termino'];
$status_plano_acao = $_POST['status_plano_acao'];
$prioridade_plano_acao = $_POST['prioridade_plano_acao'];
$area_plano_acao = $_POST['area_plano_acao'];
$responsavel_plano_acao = $_POST['responsavel_plano_acao'];


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update tabela_plano_de_acao_temp set descricao ='$plano_acao',data_prevista_conclusao ='$inicio',data_conclusao ='$termino',status ='$status_plano_acao',prioridade ='$prioridade_plano_acao',area= '$area_plano_acao',responsavel= '$responsavel_plano_acao' WHERE id='$codigo'
");
