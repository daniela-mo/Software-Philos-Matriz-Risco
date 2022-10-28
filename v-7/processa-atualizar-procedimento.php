<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

$codigo_procedimento=$_POST['codigo_procedimento'];
$documento='';

if(@$_FILES['file']['name'] != ''){
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = $_FILES['file']['name'];
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
}}else{

$selecao=mysqli_query($conexao,"select * from procedimentos WHERE id='$codigo_procedimento'");
$registros=mysqli_fetch_array($selecao);	
	
$name=	$registros['anexo'];
	
}

if(@$_FILES['cad-documento']['name'] != ''){
    $test = explode('.', $_FILES['cad-documento']['name']);
    $extension = end($test);    
    echo "aqui ".$documento = $_FILES['cad-documento']['name'];
?>
<?php
$filename = 'uploads/'.$name;

if (file_exists($filename)) { ?>
   

<div class="alert alert-danger" role="alert">
  O arquivo <?php echo $filename ?> já existe!!
</div>

<?php }else {

 $location = $obterdominio."/uploads/".$documento;
    move_uploaded_file($_FILES['cad-documento']['tmp_name'], $location);
}}






$numero_revisao=$_POST['cad-numero-revisao'];
$processo=$_POST['cad-processo'];
$nome_procedimento=$_POST['cad-procedimento'];
$classificacao_documento=$_POST['cad-classificacao'];
$referencia_legal=$_POST['cad-referencia'];

$frequencia_revisao=$_POST['cad-frequencia-revisao'];
$elaborado_por=$_POST['cad-elaborado-por'];
$data_planejada=$_POST['cad-data-planejada'];
$data_emissao_documento=$_POST['cad-data-emissao-documento'];

$sigla_classificacao=$_POST['cad-sigla-classificacao'];
$descricao_classificacao=$_POST['cad-descricao-classificacao'];
$documento_classificacao=$_POST['cad-tipo-documento-classificacao'];

$nome_referencia=$_POST['cad-nome-referencia'];
$descricao_referencia=$_POST['cad-descricao-referencia'];
$requisito_normativo_referencia=$_POST['cad-requisito-normativo-referencia'];



	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
    
    
$atualizar=mysqli_query($conexao,"update procedimentos set numero_revisao='$numero_revisao' 
,processo='$processo',
nome_procedimento = '$nome_procedimento',
classificacao_documento = '$classificacao_documento',
referencia_legal = '$referencia_legal',
frequencia_revisao = '$frequencia_revisao',
elaborado_por = '$elaborado_por',
data_planejada = '$data_planejada',
data_emissao='$data_emissao_documento',
sigla_classificacao ='$sigla_classificacao',
descricao_classificacao = '$descricao_classificacao',
tipo_documento_classificacao = '$documento_classificacao',
nome_referencia = '$nome_referencia',
descricao_referencia = '$descricao_referencia',
requisito_normativo_referencia = '$requisito_normativo_referencia',
anexo='$name',
documento='$documento'
WHERE id='$codigo_procedimento'");    
    
    

if($atualizar){ ?>

<script>
location.href='documentos.php'
</script>

<?php }else{ ?>

<script>
alert("Cadastro não pode ser atualizado")	
location.href='documentos.php'
</script>

<?php } ?>

