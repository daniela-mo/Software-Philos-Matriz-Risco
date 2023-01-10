<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


$setor=$_POST['setor'];
$controle=$_POST['controle'];
$codigo_parecer=$_POST['parecer'];
$codigo_causa=$_POST['codigo_causa'];
 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao_causa=mysqli_query($conexao,"select * from matriz_de_risco_causas WHERE id='$codigo_causa'");
	$registros_causa=mysqli_fetch_array($selecao_causa);
$causa=$registros_causa['causa'];

$selecao=mysqli_query($conexao,"select * from controles_existentes_temp WHERE id='$controle'");
$registros=mysqli_fetch_array($selecao);
$parecer=$registros['parecer_controle'];
$controle=$registros['nome_controle'];

$codigo_matriz=$_POST['codigo_matriz'];


$gravar=mysqli_query($conexao,"insert into tabela_causa_efeito_temp(codigo_matriz,parecer,controle,codigo_causa,causa,setor)values('$codigo_matriz','$parecer','$controle','$codigo_causa','$causa','$setor') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
