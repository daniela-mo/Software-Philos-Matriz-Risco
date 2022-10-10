<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$codigo = $_POST['codigo-comite'];
$comite = $_POST['cad-comite'];
$descricao = $_POST['cad-descricao'];

$data_cadastro = date('d-m-Y');



$inserir = mysqli_query($conexao, "insert into comites(nome,descricao,data_criacao,codigo_comite)values('$comite','$descricao','$data_cadastro','$codigo')");

if ($inserir) { ?>

	<script>
		alert("Cadastro realizado")
		location.href = "matriz-de-riscos.php"
	</script>

<?php } else { ?>

	<script>
		alert("Cadastro não pode ser realizado")
		// location.href = "matriz-de-risco.php?cod=<?php echo $codigo ?>"
		location.href = "matriz-de-riscos.php"
	</script>


<?php } ?>