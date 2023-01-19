<?php
include('../conexao.php');

$codigo=$_POST['codigo'];
$variavel=$_POST['usuario'];

$gravar=mysqli_query($conexao,"insert into responsaveis_tarefa_workflow(codigo_tarefa,codigo_usuario)values('$codigo','$variavel') ");


if($gravar){ ?>
	

<?php }else{ ?>

	
<?php	
}
?>
