<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

$codigo=$_POST['codigo-matriz-de-risco'];

$probabilidade_avaliacao=$_POST['cad-probabilidade-avaliacao'];
$impacto_avaliacao=$_POST['cad-impacto-avaliacao'];
$nivel_avaliacao=$_POST['cad-nivel-avaliacao'];

$probabilidade_residual=$_POST['cad-probabilidade-residual'];
$impacto_residual=$_POST['cad-impacto-residual'];
$nivel_residual=$_POST['cad-nivel-residual'];


$classificacao_risco=$_POST['classificacao-risco'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$inserir=mysqli_query($conexao,"insert into avaliacao_matriz_de_risco(

codigo_classificacao_risco,
probabilidade_avaliacao,
impacto_avaliacao,
nivel_avaliacao,
probabilidade_residual,
impacto_residual,
nivel_residual,
codigo_matriz_de_risco

)values(
'$classificacao_risco',
'$probabilidade_avaliacao',
'$impacto_avaliacao',
'$nivel_avaliacao',
'$probabilidade_residual',
'$impacto_residual',
'$nivel_residual',
'$codigo'


)");

if($inserir){ ?>

<script>
location.href='matriz-de-risco.php?cod=<?php echo $codigo ?>'
</script>


<?php }else{ ?>

<script>
alert("Cadastro não realizado")
location.href='matriz-de-risco.php?cod=<?php echo $codigo ?>'
</script>

<?php }
?>
