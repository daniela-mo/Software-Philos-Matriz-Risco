<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$item=$_POST['item'];
$descricao=$_POST['descricao'];
$comofazer=$_POST['comofazer'];
$responsavel=$_POST['responsavel'];
$data_previsao=$_POST['dataprevisao'];
$conclusao=$_POST['conclusao'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');



$gravar=mysqli_query($conexao,"insert into 
tabela_plano_de_acao(
item,
descricao,
como_fazer,
responsavel,
data_prevista_conclusao,
data_conclusao,
codigo_rnc)values(
'$item',
'$descricao',
'$comofazer',
'$responsavel',
'$data_previsao',
'$conclusao',
'$codigo'

) ");






?>
