<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$area=$_POST['area'];
$usuario=$_POST['codigo_usuario'];
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$data=date('d-m-Y');
$hora=date('H:i:s');	

$selecao2=mysqli_query($conexao,"select * from responsaveis_areas WHERE codigo_area='$area' and codigo_usuario='$usuario'");
$num=mysqli_num_rows($selecao2);
if($num==0){

$selecao_area=mysqli_query($conexao,"select * from areas WHERE id='$area'");
$registros_area=mysqli_fetch_array($selecao_area);	
$nome_area=$registros_area['area'];
	
$gravar=mysqli_query($conexao,"insert into responsaveis_areas(codigo_area,codigo_usuario,data,hora,area)values('$area','$usuario','$data','$hora','$nome_area') ");




if($gravar){ 


?>
	

<?php }else{ ?>
	
	
<?php	
}}
?>
