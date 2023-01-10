<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo_qaa=$_POST['codigoqaa'];
$bloco=$_POST['bloco'];

@$modalidade=$_POST['modalidade'];


$codigo_modalidade=$_POST['codigomodalidade'];


$array=explode(",", $_POST['codigomodalidade']);





mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into blocos_qaa(bloco)values('$bloco') ");



if($gravar){ 

	
$selecao_blocos=mysqli_query($conexao,"select * from blocos_qaa order by id DESC");	
$registros_blocos=mysqli_fetch_array($selecao_blocos);	
$codigo_bloco=$registros_blocos['id'];
	
$contador= count($array);


for($i=0;$i<=$contador-1;$i++){
	
$selecao_modalidade=mysqli_query($conexao,"select * from modalidades WHERE id='$array[$i]'");	
$registros_modalidades=mysqli_fetch_array($selecao_modalidade);	
$modalidade=$registros_modalidades['modalidade'];	
	
$inserir=mysqli_query($conexao,"insert into blocos_modalidades(codigo_modalidade,modalidade,codigo_bloco)values('$array[$i]','$modalidade','$codigo_bloco') ");	
	
	
}



?>



	

<?php }else{ ?>
	
	
<?php	
}
?>
