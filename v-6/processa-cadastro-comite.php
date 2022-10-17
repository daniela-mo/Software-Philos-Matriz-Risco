<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


// $codigo = $_POST['cod'];
$comite = $_POST['cad-comite'];
$descricao = $_POST['cad-descricao'];

$data_cadastro = date('d-m-Y');



$inserir = mysqli_query($conexao, "insert into comites(nome_comite,descricao,data_criacao)values('$comite','$descricao','$data_cadastro')");

if ($inserir) { ?>

	<script>
		alert("Cadastro realizado")
		location.href = "monitoramento.php"
	</script>

<?php } else { ?>

	<script>
		alert("Cadastro não pode ser realizado")
		// location.href = "matriz-de-risco.php?cod=<?php echo $codigo ?>"
		location.href = "cadastro-comite.php"
	</script>


<?php } ?>