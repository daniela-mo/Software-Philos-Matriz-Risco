<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$referencia=$_POST['referencia'];
$descricao=$_POST['descricao'];
$requisito=$_POST['requisito'];

mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$verificar_requisito=mysqli_query($conexao,"select * from requisitos_normativos WHERE referencia='$referencia'");
$num=mysqli_num_rows($verificar_requisito);

if($num==0){

$gravar=mysqli_query($conexao,"insert into requisitos_normativos(referencia,requisito,descricao)values('$referencia','$requisito','$descricao') ");

}

if($gravar){ 

$selecao=mysqli_query($conexao,"select * from requisitos_normativos order by id DESC");
$registros=mysqli_fetch_array($selecao);
$codigo=$registros['id'];



$selecao_temp=mysqli_query($conexao,"select * from tabela_requisitos_normativos_temp");
while($registros_temp=mysqli_fetch_array($selecao_temp)){
$numero=$registros_temp['numero'];
$subnumero=$registros_temp['subnumero'];
$requisito=$registros_temp['requisito'];
$codigo_requisito=$registros_temp['id'];

$inserir=mysqli_query($conexao,"insert into tabela_requisitos_normativos(requisito,codigo_requisito,numero,id)values('$requisito','$codigo','$numero','$codigo_requisito')");

$selecao_procedimento=mysqli_query($conexao,"select * from procedimentos order by id DESC");
$registros_procedimentos=mysqli_fetch_array($selecao_procedimento);
$ultimo_codigo=$registros_procedimentos['id'];
if($ultimo_codigo==''){$ultimo_codigo=1;}else{$ultimo_codigo=$ultimo_codigo+1;}


$inserir_ligacao=mysqli_query($conexao,"insert into procedimentos_tabela_requisitos(codigo_requisito,codigo_procedimento)values('$codigo_requisito','$ultimo_codigo')");
}


?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
