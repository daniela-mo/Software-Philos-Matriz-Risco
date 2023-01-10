<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$nome=$_POST['nome'];
$descricao=$_POST['descricao'];
$reputacao=$_POST['reputacao'];
$legal=$_POST['legal'];
$contratual=$_POST['contratual'];
$operacional_estrategica=$_POST['operacional'];
$seguranca=$_POST['seguranca'];




mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into parametrizacao(nome,descricao,reputacao,legal,contratual,operacional_estrategica,seguranca)values('$nome','$descricao','$reputacao','$legal','$contratual','$operacional_estrategica','$seguranca') ");


if($gravar){ 

$selecao=mysqli_query($conexao,"select * from parametrizacao order by ID DESC");
$registros=mysqli_fetch_array($selecao);

$codigo=$registros['id'];

?>
	
    <input type="hidden" name="codigo-parametrizacao" id="codigo-parametrizacao" value="<?php echo $codigo; ?>">

<?php }else{ ?>
	
	
<?php	
}
?>
