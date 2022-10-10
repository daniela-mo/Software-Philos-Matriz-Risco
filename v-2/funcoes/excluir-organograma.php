<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];




$selecao_organogramas=mysqli_query($conexao,"select * from organogramas WHERE id='$codigo' ");
$registros_organogramas=mysqli_fetch_array($selecao_organogramas);
$codigo_empresa=$registros_organogramas['cod_empresa'];	
	
	
$selecao_areas=mysqli_query($conexao,"select * from areas WHERE codigo_empresa='$codigo_empresa'");
while($registros_areas=mysqli_fetch_array($selecao_areas)){

$codigo_area=$registros_areas['id'];
	
	
$atualizar_area_organograma=mysqli_query($conexao,"update identificacao_do_risco set area='Em Transição', codigo_area='0' WHERE codigo_area='$codigo_area'");	
	
	
}




$excluir=mysqli_query($conexao,"delete  from organogramas WHERE cod_empresa='$codigo'");


if($excluir){ 

$excluir2=mysqli_query($conexao,"delete  from areas WHERE codigo_empresa='$codigo'");

	
	
	
?>




<?php }else{ ?>
	
	
<?php	
}
?>
