<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$codigo_matriz_de_risco = $_POST['codigo-matriz-de-risco'];
$classificacao_risco = $_POST['classificacao-risco'];
$probabilidade = $_POST['cad-probabilidade-residual'];
$impacto = $_POST['cad-impacto-residual'];
$nivel_risco = $_POST['cad-nivel-do-risco-residual'];
$decisao = $_POST['cad-decisao-residual'];
$data = date("Y-m-d");

if ($probabilidade != '0' || $impacto != '0' || $decisao != '0') {


	$inserir = mysqli_query($conexao, "insert into avaliacao_risco_residual(
codigo_classificacao_risco,
codigo_matriz,
probabilidade,
impacto,
nivel,
decisao,
data

)values(

'$classificacao_risco',
'$codigo_matriz_de_risco',
'$probabilidade',
'$impacto',
'$nivel_risco',
'$decisao',
'$data'




)");

	if ($inserir) {

		$quantidade_array = count($_POST['residual']);



		for ($i = 0; $i <= $quantidade_array - 1; $i++) {

			$residual = $_POST['residual'][$i];
			$titulos = $_POST['titulos'][$i];

			$inserir_tabela = mysqli_query($conexao, "insert into tabela_avaliacao_risco_residual(codigo_matriz,item,titulo)values('$codigo_matriz_de_risco','$residual','$titulos')");
		}




?>

		<script>
			location.href = 'matriz-de-risco.php?cod=<?php echo $codigo_matriz_de_risco ?>#2conteudo2'
		</script>

	<?php } else { ?>

		<script>
			location.href = 'matriz-de-risco.php?cod=<?php echo $codigo_matriz_de_risco ?>#2conteudo2'
		</script>

	<?php }
} else { ?>

	<script>
		alert("Todos os campos de Avaliação de Risco Residual precisam ser selecionados!")
		location.href = 'matriz-de-risco.php?cod=<?php echo $codigo_matriz_de_risco ?>&aba=avaliacao'
	</script>

<?php } ?>