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
$numero_rnc=$_POST['cad-numero_rnc'];
$origem=$_POST['cad-origem'];
$data_registro=$_POST['cad-origem'];
$data_ocorrencia=$_POST['cad-data-ocorrencia'];
$processo=$_POST['cad-processo'];
$risco=$_POST['cad-risco'];

$resposta_analise=$_POST['cad-responsavel-analise'];
$area_responsavel=$_POST['cad-area-responsavel'];
$problema_reincidente=$_POST['cad-problema-reincidente'];
$cliente_fornecedor=$_POST['cad-cliente-fornecedor'];
$problema=$_POST['cad-problema'];
$acao=$_POST['cad-acao'];
$responsavel_acao=$_POST['cad-responsavel-acao'];
$data_contencao=$_POST['cad-data-contencao'];
$what=$_POST['cad-what'];
$when=$_POST['cad-when'];
$who=$_POST['cad-who'];
$where=$_POST['cad-where'];
$why=$_POST['cad-why'];
$how=$_POST['cad-how'];
$how_much=$_POST['cad-how-much'];
$metodologias=$_POST['cad-metodologias'];
$metodo=$_POST['cad-metodo'];
$material=$_POST['cad-material'];
$mao_de_obra=$_POST['cad-mao-de-obra'];
$meio_ambiente=$_POST['cad-meio-ambiente'];
$maquina=$_POST['cad-maquina'];
$medicao=$_POST['cad-medicao'];
$resposta_raiz=$_POST['cad-resposta-causa-raiz'];
$pq1=$_POST['cad-pq1'];
$pq2=$_POST['cad-pq2'];
$pq3=$_POST['cad-pq3'];
$pq4=$_POST['cad-pq4'];
$pq5=$_POST['cad-pq5'];

$resposta_causa2=$_POST['resposta-causa-raiz2'];
$item_implantacao=$_POST['cad-item-implementacao'];
$descricao_acao=$_POST['cad-descricao-acao'];
$como_fazer=$_POST['cad-como-fazer'];
$responsavel_monitoramento=$_POST['cad-responsavel-monitoramento'];
$data_prevista=$_POST['cad-data-prevista'];
$data_conclusao=$_POST['cad-data-conclusao'];
$responsavel_monitoramento=$_POST['cad-responsavel-monitoramento'];
$status_monitoramento=$_POST['cad-status-monitoramento'];
$solucoes_aplciadas=$_POST['cad-solucoes-aplicadas'];
$descricao_solucoes=$_POST['cad-descricao-solucoes'];
$responsavel_analise=$_POST['cad-responsavel-analise'];
$data_analise=$_POST['cad-data-analise'];
$parecer=$_POST['cad-parecer'];





$atualizar=mysqli_query($conexao,"update 8d set 

emitente ='$emitente',
origem = '$origem',
data_registro = '$data_registro',
data_ocorrencia = '$data_ocorrencia',
processo = '$processo',
risco = '$risco'  ,
resposta_analise = '$resposta_analise',
area_responsavel = '$area_responsavel',
problema_reincidente = '$problema_reincidente',
cliente_fornecedor = '$cliente_fornecedor',
problema = '$problema',
acao = '$acao',
responsavel_acao = '$responsavel_acao',
data_contencao = '$data_contencao',
p_what = '$what',
p_when = '$when',
p_who = '$who',
p_where = '$where',
p_why = '$why',
how = '$how',
how_much = '$how_much',
metodologias = '$metodologias',
metodo = '$metodo',
mao_de_obra = '$mao_de_obra',
meio_ambiente = '$meio_ambiente',
maquina = '$maquina',
medicao = '$medicao',
resposta_raiz = '$resposta_raiz',
pq1 = '$pq1',
pq2 = '$pq2',
pq3 = '$pq3',
pq4 = '$pq4',
pq5 = '$pq5',
resposta_causa2= '$resposta_causa2',
item_implantacao = '$item_implantacao',
descricao_acao = '$descricao_acao',
como_fazer = '$como_fazer',
responsavel_monitoramento = '$responsavel_monitoramento',
data_prevista = '$data_prevista',
data_conclusao = '$data_conclusao',
responsavel_monitoramento2 = '$responsavel_monitoramento',
status_monitoramento = '$status_monitoramento',
solucoes_aplciadas = '$solucoes_aplciadas',
descricao_solucoes = '$descricao_solucoes',
responsavel_analise = '$responsavel_analise',
data_analise = '$data_analise',
parecer = '$parecer'
WHERE id='$codigo'
");



if($atualizar){?>
<script>
location.href='8ds.php'
</script>
	
<?php }else{ ?>
<script>
	alert("Cadastro não pode ser realizado!")
location.href='8ds.php'
</script>	

<?php	
}

?>






