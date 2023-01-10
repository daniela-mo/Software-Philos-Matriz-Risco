<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


$causa=$_POST['causa'];

 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from tabela_causa_efeito_temp  WHERE codigo_causa='$causa'");
$registros=mysqli_fetch_array($selecao);

$codigo_matriz=$registros['codigo_matriz'];
$codigo_causa=$registros['codigo_causa'];
	$selecao_causa=mysqli_query($conexao,"select * from causas WHERE id='$codigo_causa'");
	$registros_causa=mysqli_fetch_array($selecao_causa);
$causa=$registros_causa['causa'];	

$controle=$registros['controle'];
$parecer=$registros['parecer'];

if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
