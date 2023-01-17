<?php
session_start();


$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;


$respostasimnao = $_POST['respostasimnao'];
$codigo = $_POST['codigo'];
$cnpj = $_POST['cnpj'];
$modalidade = $_POST['mod'];
$titulo = $_POST['titulo'];
$questao = $_POST['questao'];
$resposta = $_POST['resposta'];

$certificado = $_POST['certificado'];

$resposta = $text_description = str_replace("&nbsp;", "</br>", $resposta);

$resposta = addslashes($resposta);

$retorno = $_POST['retorno'];

$possui = $_POST['possui'];
$pergunta = $_POST['pergunta'];
if ($possui == '0') {
	$possui = 'não';
}

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$obter_versao_atual = mysqli_query($conexao, "select * from status_qaas order by id DESC");
$registros = mysqli_fetch_array($obter_versao_atual);
$versao = $registros['versao'];
if ($versao == '') {
	$versao = $versao + 1;
}


if ($retorno == 'gravar') {

	$deletar = mysqli_query($conexao, "delete from resposta_qaa WHERE codigo_questao='$codigo'");

	$sql = "insert into resposta_qaa(codigo_questao,resposta,questao,titulo,certificado,cnpj,codigo_modalidade,salvar,resposta_sim_nao,possui_nao_possui,pergunta_sim_nao,versao,check_id)
	values('$codigo','$resposta','$questao','$titulo','$certificado','$cnpj','$modalidade','1','$respostasimnao','$possui','$pergunta','$versao','1')";
	$gravar = mysqli_query($conexao, $sql);



	// $atualizar = mysqli_query($conexao, "update resposta_qaa set salvar='1' WHERE codigo_questao='$codigo'");


	if ($gravar) { ?>

		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Questão <?php echo $retorno ?> com sucesso!!


		</div>


	<?php }
}
if ($retorno == 'salvar') {

	$deletar = mysqli_query($conexao, "delete from resposta_qaa WHERE codigo_questao='$codigo'");

	$sql = "insert into resposta_qaa(codigo_questao,resposta,questao,titulo,certificado,cnpj,codigo_modalidade,salvar,resposta_sim_nao,possui_nao_possui,pergunta_sim_nao,versao,check_id)
	values('$codigo','$resposta','$questao','$titulo','$certificado','$cnpj','$modalidade','1','$respostasimnao','$possui','$pergunta','$versao','0')";
	$salvar = mysqli_query($conexao, $sql);



	// $atualizar = mysqli_query($conexao, "update resposta_qaa set salvar='1' WHERE codigo_questao='$codigo'");


	if ($salvar) { ?>

		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Questão <?php echo $retorno ?> com sucesso!!


		</div>


<?php }
}
