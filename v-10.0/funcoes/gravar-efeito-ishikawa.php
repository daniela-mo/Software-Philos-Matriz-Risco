<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

// $codigo = $_POST['codigo'];
$efeito = $_POST['efeito'];
$codigo_matriz = $_POST['codigo_matriz'];
$setor = $_POST['setor'];
$gravar = mysqli_query($conexao, "insert into diagrama_ishikawa_efeitos(codigo_matriz,efeito,tipo)values('$codigo_matriz','$efeito','$setor') ");


if ($gravar) { ?>
	

<?php } else { ?>
	
	
<?php
}

?>
