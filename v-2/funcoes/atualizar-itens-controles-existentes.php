<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$objetivo = $_POST['objetivo'];
$cadastro = $_POST['cadastro'];
$metodo = $_POST['metodo'];
$responsavel = $_POST['responsavel'];
$data = $_POST['data'];
$resultado = $_POST['resultado'];
$parecer = $_POST['parecer'];
$natureza = $_POST['natureza'];
$frequencia = $_POST['frequencia'];
$controle = $_POST['controle'];




mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');


$atualizar=mysqli_query($conexao,"update controles_existentes_temp set
nome_controle = '$nome',
objetivo_controle = '$objetivo',
cadastro_tipo = '$cadastro',
natureza_controle = '$natureza',
frequencia_controle = '$frequencia',
tipo_controle = '$controle',
metodo = '$metodo',
responsavel = '$responsavel',
data = '$data',
resultado = '$resultado',
parecer_controle = '$parecer'



WHERE id='$codigo'
");




?>
