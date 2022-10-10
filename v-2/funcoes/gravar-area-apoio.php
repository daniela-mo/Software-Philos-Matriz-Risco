<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$area=$_POST['area'];
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao_area=mysqli_query($conexao,"select * from areas WHERE id='$area'");
$registros=mysqli_fetch_array($selecao_area);
$nome_area=$registros['area'];

$usuario=$_POST['usuario'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');


$selecao2=mysqli_query($conexao,"select * from areas_apoio WHERE codigo_area='$area'");
$num=mysqli_num_rows($selecao2);
if($num==0){



$gravar=mysqli_query($conexao,"insert into areas_apoio(codigo_area,codigo_usuario,area)values('$area','$usuario','$nome_area') ");




if($gravar){ 


?>
	

<?php }else{ ?>
	
	
<?php	
}}
?>
