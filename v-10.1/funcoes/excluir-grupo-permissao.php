<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from grupos WHERE id='$codigo'");

$excluir=mysqli_query($conexao,"delete  from grupos_permissoes WHERE codigo_grupo='$codigo'");

if($excluir){ ?>


<?php }else{ ?>

	
<?php	
}
?>
