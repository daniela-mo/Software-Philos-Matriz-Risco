<?php
session_start();

$check_cnd = $_SESSION['cnd'];

$check_oea = $_SESSION['oea'];

$check_dte = $_SESSION['dte'];

$check_ecd = $_SESSION['ecd'];

$check_nfe = $_SESSION['nfe'];

$check_func_interv = $_SESSION['func_interv'];

$check_aut_area_atuacao = $_SESSION['aut_area_atuacao'];

$check_1_1 = $_SESSION['1_1'];

$check_1_2 = $_SESSION['1_2'];

$check_1_3 = $_SESSION['1_3'];

$check_1_4 = $_SESSION['1_4'];

$check_1_5 = $_SESSION['1_5'];

$check_2_1_1_a = $_SESSION['2_1_1_a'];

$check_2_1_1_b = $_SESSION['2_1_1_b'];

$check_2_2_1_a = $_SESSION['2_2_1_a'];

$check_2_2_1_b = $_SESSION['2_2_1_b'];

$check_2_2_1_c = $_SESSION['2_2_1_c'];

$check_2_2_1_d = $_SESSION['2_2_1_d'];

$check_2_2_1_e = $_SESSION['2_2_1_e'];

$check_2_2_2_a = $_SESSION['2_2_2_a'];

$check_2_2_2_b = $_SESSION['2_2_2_b'];

$check_2_2_2_c = $_SESSION['2_2_2_c'];

$check_2_2_2_d = $_SESSION['2_2_2_d'];

$check_2_2_2_e = $_SESSION['2_2_2_e'];

$check_2_2_2_f = $_SESSION['2_2_2_f'];

$check_2_2_2_g = $_SESSION['2_2_2_g'];

$check_2_2_2_h = $_SESSION['2_2_2_h'];

$check_2_2_3_a = $_SESSION['2_2_3_a'];

$check_2_2_3_b = $_SESSION['2_2_3_b'];

$check_2_2_3_c = $_SESSION['2_2_3_c'];

$check_2_2_3_d = $_SESSION['2_2_3_d'];

$check_2_2_4_a  = $_SESSION['2_2_4_a'];

$check_2_2_4_b = $_SESSION['2_2_4_b'];

$check_2_3_1_a = $_SESSION['2_3_1_a'];

$check_2_3_2_a = $_SESSION['2_3_2_a'];

$check_2_3_2_b = $_SESSION['2_3_2_b'];

$check_2_4_1_a = $_SESSION['2_4_1_a'];

$check_2_4_2_a = $_SESSION['2_4_2_a'];

$check_2_4_2_b = $_SESSION['2_4_2_b'];

$check_2_4_2_c = $_SESSION['2_4_2_c'];

$check_2_4_2_c = $_SESSION['2_4_2_c'];

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

	$salvar = mysqli_query($conexao, "insert into resposta_qaa(codigo_questao,resposta,questao,certificado,cnpj,codigo_modalidade,salvar,resposta_sim_nao,possui_nao_possui,pergunta_sim_nao,versao,titulo)
	values('$codigo','$resposta','$questao','$certificado','$cnpj','$modalidade','1','$respostasimnao','$possui','$pergunta','$versao','$titulo')");


	if ($salvar) {
		$sql =
			// "update resposta_check set cnd='1',oea='1',dte='1',ecd ='1',nfe='1',func_interv='1',aut_area_atuacao='1',1_1='1',
			// 1_2='1',1_3='1',1_4='1',1_5='1',2_1_1_a='1',2_1_1_b='1',2_2_1_a='1',2_2_1_b='1',2_2_1_c='1',2_2_1_d='1',2_2_1_e='1',2_2_2_a='1',
			// 2_2_2_b='1',2_2_2_c='1',2_2_2_d='1',2_2_2_e='1',2_2_2_f='1',
			// 2_2_2_g='1',2_2_2_h='1',2_2_3_a='1',2_2_3_b='1',2_2_3_c='1',2_2_3_d='1',2_2_4_a='1',2_2_3_d='1',2_3_1_a='1',
			// 2_3_2_a='1',2_3_2_b='1',2_4_1_a='1',2_4_2_a='1',2_4_2_b='1',
			// 2_4_2_c='1',2_4_2_d='1',2_4_3_a='1',2_4_3_b='1',2_4_4_a='1',
			// 2_4_4_b='1',2_4_4_c='1',2_4_4_d='1',2_4_4_e='1',2_5_1_a='1',
			// 2_5_1_b='1',3_1_1_a='1',3_1_1_b='1',3_1_1_c='1',3_1_1_d='1',
			// 3_1_2_a='1',3_1_2_b='1',3_1_2_c='1',3_1_2_d='1',3_1_2_e='1',
			// 3_1_2_f='1',3_1_3_a='1',3_1_3_b='1',3_1_3_c='1',3_1_4_a='1',
			// 3_1_4_b='1',3_1_4_c='1',3_1_4_d='1',3_1_4_e='1',3_1_5_a='1',
			// 3_1_5_b='1',3_1_5_c='1',3_1_5_d='1',3_2_1_a='1',
			// 3_2_1_b='1',3_2_1_c='1',3_2_1_d='1',3_2_2_a='1',3_2_2_b='1',
			// 3_2_2_c='1',3_2_2_d='1',3_2_3_a='1',3_2_3_b='1',3_2_4_a='1',
			// 3_2_4_b='1',3_2_4_c='1',3_2_5_a='1',3_2_5_b='1',3_2_5_c='1',
			// 3_3_1_a='1',3_3_1_b='1',3_3_1_c='1',3_3_2_a='1',
			// 3_3_2_b='1',3_3_2_c='1',3_3_2_b='1',3_3_2_c='1',3_4_1_a='1',
			// 3_4_1_b='1',3_4_1_c='1',3_4_1_d='1',3_4_2_a='1',3_4_2_b='1',
			// 3_4_3_a='1',3_4_3_b='1',3_4_3_c='1',3_4_4_a='1',3_4_4_b='1',
			// 3_4_5_a='1',3_4_5_b='1',3_4_5_c='1',3_4_5_d='1',3_5_1_a='1',
			// 3_5_1_b='1',3_5_1_c='1',3_5_1_d='1',3_5_1_e='1',3_5_2_a='1',
			// 3_5_2_b='1',3_5_2_c='1',3_5_2_d='1',3_5_3_a='1',3_5_3_b='1',
			// 3_5_3_c='1'";



			// print($sql);
			$inserir = mysqli_query($conexao, $sql);

		if ($inserir) {
?>

			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Questão <?php echo $retorno ?>1 com sucesso!!

			</div>

<?php	}
	}
}
?>