<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$nconforme  = $_POST['nconforme'];
$area = $_POST['area_nconforme'];
$responsavel = $_POST['responsavel_nconforme'];




mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update detalhe_nao_conformidade set
descricao='$nconforme',responsavel='$responsavel',area='$area' WHERE id='$codigo'
");
