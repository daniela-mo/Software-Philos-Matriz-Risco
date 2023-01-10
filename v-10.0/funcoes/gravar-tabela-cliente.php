<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$cliente=$_POST['cliente'];


mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$gravar=mysqli_query($conexao,"insert into tabela_clientes(cliente)values('$cliente') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
