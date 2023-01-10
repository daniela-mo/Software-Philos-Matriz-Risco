<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
$name='';

$numero_revisao=$_POST['cad-numero-revisao'];
$processo=$_POST['cad-processo'];

$nome_procedimento=$_POST['cad-procedimento'];
$verificar=mysqli_query($conexao,"select * from procedimentos WHERE numero_revisao='$numero_revisao' and nome_procedimento='$nome_procedimento'");
$num=mysqli_num_rows($verificar);

if($num==0){


$classificacao_documento=$_POST['cad-classificacao'];

$referencia_legal=$_POST['cad-referencia'];





$frequencia_revisao=$_POST['cad-frequencia-revisao'];

$data_planejada=$_POST['cad-data-planejada'];
$data_emissao_documento=$_POST['cad-data-emissao-documento'];

@$sigla_classificacao=$_POST['sigla-classificacao'];
@$descricao_classificacao=$_POST['cad-descricao-classificacao'];

@$descricao_classificacao=addslashes($descricao_classificacao);

@$documento_classificacao=$_POST['cad-tipo-documento-classificacao'];


if($_FILES['file']['name'] != ''){
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    @$name = $_FILES['file']['name'];
?>
<?php
$filename = 'uploads/'.$name;

if (file_exists($filename)) { ?>
   

<div class="alert alert-danger" role="alert">
  O arquivo <?php echo $filename ?> já existe!!
</div>

<?php }else {

 $location = "uploads/".$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
}}
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
    
    
    $pegar_ultimo_codigo=mysqli_query($conexao,"select * from procedimentos ORDER BY ID DESC");
$registros_pegar_ultimo_codigo=mysqli_fetch_array($pegar_ultimo_codigo);
$ultimo_codigo=$registros_pegar_ultimo_codigo['id'];

if($ultimo_codigo==''){$ultimo_codigo=1;}else{$ultimo_codigo=$ultimo_codigo+1;}   
    
    
$inserir=mysqli_query($conexao,"insert into procedimentos(
numero_revisao,
processo,
nome_procedimento,
classificacao_documento,
frequencia_revisao,
data_planejada,
data_emissao,
sigla_classificacao,
descricao_classificacao,
tipo_documento_classificacao,
id,
anexo,
referencia_legal



)values(
'$numero_revisao',
'$processo',
'$nome_procedimento',
'$classificacao_documento',
'$frequencia_revisao',
'$data_planejada',
'$data_emissao_documento',
'$sigla_classificacao',
'$descricao_classificacao',
'$documento_classificacao',
'$ultimo_codigo',
'$name',
'$referencia_legal'


)");
if($inserir){ 

$selecao_ultimo_id=mysqli_query($conexao,"select * from procedimentos order by id DESC ");
$registros_ultimo_id=mysqli_fetch_array($selecao_ultimo_id);
$id=$registros_ultimo_id['id'];



$selecao_tabela_temporaria=mysqli_query($conexao,"select * from tabela_itens_requisitos_temp");
$numero=mysqli_num_rows($selecao_tabela_temporaria);

if($numero>=1){

while($registros=mysqli_fetch_array($selecao_tabela_temporaria)){
$codigo_requisito=$registros['codigo_requisito'];

$nova_tabela=mysqli_query($conexao,"insert into procedimentos_tabela_requisitos(codigo_requisito,codigo_procedimento)values('$codigo_requisito','$id')");


}



}



?>

<script>
location.href='documentos.php'
</script>

<?php }else{ ?>

<script>
alert("Cadastro não pode ser realizado")	
location.href='documentos.php'
</script>

<?php }}else{?>


<script>
alert("Documento ou N° de Revisão já cadastrado!")	
location.href='documentos.php'
</script>


<?php } ?> 
