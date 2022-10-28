<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');



$codigo=$_POST['codigo'];




$emitente=$_POST['cad-emitente'];
$data=$_POST['cad-data'];
$processo=$_POST['cad-processo'];
$risco=$_POST['cad-risco'];
$origem=$_POST['cad-origem'];
$reincidencia=$_POST['cad-reincidencia'];
$tipo=$_POST['cad-tipo'];
$requisito=$_POST['cad-requisito'];
$descricao=$_POST['cad-descricao'];
$abrangencia=$_POST['cad-abrangencia'];
$descricao_correcao=$_POST['cad-descricao-correcao'];
$data_implementacao=$_POST['cad-data-implementacao'];
$responsavel_implementacao=$_POST['cad-responsavel-implementacao'];

$r1=$_POST['cad-r1'];
$r2=$_POST['cad-r2'];
$r3=$_POST['cad-r3'];
$r4=$_POST['cad-r4'];
$r5=$_POST['cad-r5'];
$r6=$_POST['cad-r6'];

$d1=$_POST['cad-d1'];
$d2=$_POST['cad-d2'];
$d3=$_POST['cad-d3'];
$d4=$_POST['cad-d4'];
$d5=$_POST['cad-d5'];
$d6=$_POST['cad-d6'];

$c1=$_POST['cad-c1'];
$c2=$_POST['cad-c2'];
$c3=$_POST['cad-c3'];
$c4=$_POST['cad-c4'];
$c5=$_POST['cad-c5'];
$c6=$_POST['cad-c6'];

$criticidade1=$_POST['cad-criticidade1'];
$criticidade2=$_POST['cad-criticidade2'];
$criticidade3=$_POST['cad-criticidade3'];
$criticidade4=$_POST['cad-criticidade4'];
$criticidade5=$_POST['cad-criticidade5'];
$criticidade6=$_POST['cad-criticidade6'];


$responsavel_analise=$_POST['cad-responsavel-analise'];
$data_analise=$_POST['cad-data_analise'];


$atualizar=mysqli_query($conexao,"update rnc set
emitente = '$emitente',
data='$data',
processo = '$processo',
risco = '$risco',
origem = '$origem',
reincidencia = '$reincidencia',
tipo = '$tipo',
requisito='$requisito',
descricao= '$descricao',
abrangencia= '$abrangencia',
descricao_correcao = '$descricao_correcao',
data_implementacao = '$data_implementacao',
responsavel_acao_imediata = '$responsavel_implementacao',
r1 = '$r1',
r2 = '$r2',
r3 = '$r3',
r4 = '$r4',
r5 = '$r5',
r6 = '$r6',
d1 = '$d1',
d2 = '$d2',
d3 = '$d3',
d4 = '$d4',
d5 = '$d5',
d6 = '$d6',
c1 = '$c1',
c2 = '$c2',
c3 = '$c3',
c4 = '$c4',
c5 = '$c5',
c6 = '$c6',
criticidade1 = '$criticidade1',
criticidade2 = '$criticidade2',
criticidade3 = '$criticidade3',
criticidade4 = '$criticidade4',
criticidade5 = '$criticidade5',
criticidade6 = '$criticidade6',
responsavel_analise = '$responsavel_analise',
data_analise = '$data_analise'


WHERE id='$codigo'");



if($atualizar){?>
<script>
location.href='rncs.php'
</script>
	
<?php }else{ ?>
<script>
	alert("Cadastro não pode ser realizado!")
location.href='rncs.php'
</script>	

<?php	
}

?>






