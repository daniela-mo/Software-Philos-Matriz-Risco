<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');


$codigo = $_POST['codigo_matriz'];
$definicao_kpis = $_POST['definicao_kpis'];
$periodicidade = $_POST['periodicidade'];
$responsavel = $_POST['responsavel'];
$objetivo = $_POST['objetivo'];
$necessidade_revisao = $_POST['necessidade_revisao'];

// $data_id_risco = str_replace('/', '-', $data_id_risco);

// $dia_de = substr($data_id_risco, 0, 2);
// $mes_de = substr($data_id_risco, 3, 2);
// $ano_de	= substr($data_id_risco, 6, 4);

// $data_id_risco = $ano_de . "-" . $mes_de . "-" . $dia_de;

// $data_criacao = date('d-m-Y');

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$inserir = mysqli_query($conexao, "insert into monitoramento_risco(
	
codigo_matriz_risco,
definicao_kpis,
periodicidade,
responsavel,
objetivo_sim_nao,
necessidade_revisao_sim_nao
)values(
'$codigo',
'$definicao_kpis',
'$periodicidade',
'$responsavel',
'$objetivo',
'$necessidade_revisao'
)");

if ($inserir) { ?>
	<script>
		alert("Monitoramento Cadastrado!")
		// location.href = 'matriz-de-risco.php?cod=<?php echo $codigo_matriz_de_risco ?>&aba=monitoramento'
	</script>

<?php } else {  ?>

	<script>
		alert("Cadastro não pode ser realizado")
		// location.href = "matriz-de-riscos.php"
	</script>


<?php } ?>