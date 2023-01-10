<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$objetivo = $_POST['objetivo'];
$numero = $_POST['numero'];




mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$atualizar = mysqli_query($conexao, "update controles_existentes_tratamento set
nome_controle = '$nome',
objetivo_controle = '$objetivo',
numero_controle = '$numero'
WHERE id='$codigo'
");
