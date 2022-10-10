<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$sigla=$_POST['sigla'];
$descricao=$_POST['descricao'];
$documento=$_POST['documento'];


            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into classificacao_documento(sigla,descricao,tipo_documento)values('$sigla','$descricao','$documento') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
