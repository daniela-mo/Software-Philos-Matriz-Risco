<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$variavel=$_POST['usuario'];

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into responsaveis_tarefa_implementacao(codigo_tarefa,codigo_usuario)values('$codigo','$variavel') ");


if($gravar){ ?>
	

<?php }else{ ?>

	
<?php	
}
?>
