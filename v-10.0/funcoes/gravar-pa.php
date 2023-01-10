<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo_comite=$_POST['codigo'];
$codigo_usuario=$_POST['codigo_usuario'];

$selecao=mysqli_query($conexao,"select * from usuarios_empresa");
$registros=mysqli_fetch_array($selecao);
$nome=$registros['nome'];
$competencia=$registros['cargo'];

$area=$_POST['area'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');



$gravar=mysqli_query($conexao,"insert into comites_participantes(codigo_comite,codigo_usuario,area,nome,competencia)values('$codigo_comite','$codigo_usuario','$area','$nome','$competencia') ");


if($gravar){ 


?>


<?php }else{ ?>
	
	
<?php	
}
?>
