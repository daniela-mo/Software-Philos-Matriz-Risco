<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$titulo=$_POST['titulo'];
$descricao=	$_POST['descricao'];

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into tarefas_planejamento(titulo,descricao,codigo_fase)values('$titulo','$descricao','$codigo') ");


if($gravar){ ?>
	

<?php }else{ ?>

	
<?php	
}
?>
