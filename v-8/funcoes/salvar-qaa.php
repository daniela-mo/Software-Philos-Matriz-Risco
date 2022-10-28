<?php
session_start();


$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


$codigo_qaa = $_POST['codigo'];
$data = date('d/m/Y');
$hora = date('H:i:s');
$usuario = $_POST['usuario'];
$cnpj = $_POST['cnpj'];
$certificado = $_POST['certificado'];
$resposta = $_POST['resposta'];
$resposta_sim_nao = $_POST['resposta_sim_nao'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$verificar = mysqli_query($conexao, "select * from status_qaas WHERE codigo_qaa='$codigo_qaa' order by id DESC ");
$numerox = mysqli_num_rows($verificar);

$numero = $numerox + 1;

if ($numerox == 0) {
	$versao_old = '0';
} else {
	$versao_old = $numerox - 1;
}



// $selecao_geral = mysqli_query($conexao, "select * from questoes_qaa");
// while ($registros_geral = mysqli_fetch_array($selecao_geral)) {
// 	$cod = $registros_geral['cod'];
// 	$questao_principal = $registros_geral['questao_principal'];
// 	$questao = $registros_geral['questao'];
// 	$resposta = $registros_geral['resposta'];
// 	$titulo = $registros_geral['titulo'];
// 	$codigo_bloco = $registros_geral['codigo_bloco'];
// 	$anexo = $registros_geral['anexo'];
// 	$nome_anexo = $registros_geral['nome_anexo'];
// 	$pergunta_sim_nao = $registros_geral['pergunta_sim_nao'];
// 	$resposta_sim_nao = $registros_geral['resposta_sim_nao'];
// 	$tipo = $registros_geral['tipo'];
// 	$possui_nao_possui = $registros_geral['possui_nao_possui'];
// 	$versao	= $registros_geral['versao'];
// 	$id = $registros_geral['id'];


// $inserir = mysqli_query($conexao, "insert into questoes_qaa(
// 	questao_principal,
// 	questao,

// 	titulo,
// 	codigo_bloco,
// 	anexo,
// 	nome_anexo,

// 	tipo,
// 	possui_nao_possui,
// 	versao,
// 	cod,

// 	certificado,
// 	codigo_anterior

// 	)values(
// 	'$questao_principal',
// 	'$questao',

// 	'$titulo',
// 	'$codigo_bloco',
// 	'$anexo',
// 	'$nome_anexo',

// 	'$tipo',
// 	'$possui_nao_possui',
// 	'$numero',
// 	'$cod',

// 	'$certificado',
// 	'$codigo_anterior'
// 	'$id'
// 	) ");




$gravarqaa = mysqli_query($conexao, "insert into status_qaas(codigo_qaa,data,hora,usuario,versao,certificado,cnpj)values('$codigo_qaa','$data','$hora','$usuario','$numero','$certificado','$cnpj') ");

if ($gravarqaa) {
	$check_disable = mysqli_query($conexao, "update resposta_qaa set check_id='0' and resposta_sim_nao=''");
}
