<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from empresas WHERE id='$codigo'");


if($excluir){ 


$excluir2=mysqli_query($conexao,"delete  from filiais WHERE codigo_empresa_principal='$codigo'");	

$excluir3=mysqli_query($conexao,"delete  from terceiros WHERE codigo_empresa_principal='$codigo'");	
	
$selecao=mysqli_query($conexao,"select * from areas WHERE codigo_empresa='$codigo'");
while($registros=mysqli_fetch_array($selecao)){
$area_mae=$registros['id'];	

$deletar=mysqli_query($conexao,"delete from responsaveis_areas WHERE codigo_area='$area_mae'");	
	
}		
	
	
$excluir4=mysqli_query($conexao,"delete  from areas WHERE codigo_empresa='$codigo'");	
	

$excluir5=mysqli_query($conexao,"delete  from organogramas WHERE cod_empresa='$codigo'");	
	
	
	
	
?>




<?php }else{ ?>
	
	
<?php	
}
?>
