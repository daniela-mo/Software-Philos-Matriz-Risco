<?php
session_start();
$_SESSION['check'] = 'style=display:inline';


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
	$versao = 1;
}


if ($retorno == 'salvar') {

	$salvar = mysqli_query($conexao, "insert into resposta_qaa(codigo_questao,resposta,questao,titulo,certificado,cnpj,codigo_modalidade,salvar,resposta_sim_nao,possui_nao_possui,pergunta_sim_nao,versao)
	values('$codigo','$resposta','$questao','$titulo','$certificado','$cnpj','$modalidade','1','$respostasimnao','$possui','$pergunta','$versao')");



	$atualizar = mysqli_query($conexao, "update resposta_qaa set salvar='1' WHERE codigo_questao='$codigo'");


	if ($salvar) { ?>

		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Questão <?php echo $retorno ?> com sucesso!!


		</div>

		<?php }
} else {


	$atualizar = mysqli_query($conexao, "update  resposta_qaa 
set  questao='$questao', resposta='$resposta', resposta_sim_nao='$respostasimnao', possui_nao_possui='$possui', pergunta_sim_nao='$pergunta',titulo='$titulo'  WHERE id='$codigo' and versao='$versao'  and certificado='$certificado'  ");

	$pesq = mysqli_query($conexao, "select * from resposta_qaa WHERE codigo_questao='$codigo' and cnpj='$cnpj'");
	$registros_pesq = mysqli_fetch_array($pesq);
	$num = mysqli_num_rows($pesq);

	if ($num == 0) {

		$inserir = mysqli_query($conexao, "insert into resposta_qaa(codigo_questao,resposta,certificado,cnpj,codigo_modalidade,salvar,resposta_sim_nao,possui_nao_possui,pergunta_sim_nao,versao)
															values('$codigo','$resposta','$certificado','$cnpj','$modalidade','1','$respostasimnao','$possui','$pergunta','$versao')");


		if ($inserir) { ?>

			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Questão <?php echo $retorno ?> com sucesso!!

			</div>

		<?php } ?>
	<?php	}


	if ($num == 1) {
		$update = mysqli_query($conexao, "update resposta_qaa set  questao='$questao', resposta='$resposta', resposta_sim_nao='$respostasimnao', possui_nao_possui='$possui', pergunta_sim_nao='$pergunta',titulo='$titulo'  WHERE id='$codigo' and versao='$versao'  and certificado='$certificado'  ");
	}

	if ($update) { ?>

		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Questão <?php echo $retorno ?> com sucesso!!

		</div>

<?php }
} ?>