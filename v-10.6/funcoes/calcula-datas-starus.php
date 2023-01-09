<?php

session_start();


function retorna($dtDevolutiva, $conexao)
{
	$db = explode (".com", $_SESSION['dominio']);
	$db = 'sistemam2vconsul_'.$db[0];
	$conexao = mysqli_connect('50.19.17.159', 'root', 'philos.tec',$db);
	$result_atraso = "SELECT * FROM workflow WHERE nome = '$diasRetPrazo' LIMIT 1";

    $entrada = new DateTime('dtEnvioPlanoAcao','dtRetornoPrazo','dtDevolutiva' ); 
    $saida = new DateTime('diasRetPrazo');
    
    $intervalo = $entrada->diff($saida);
    var_dump($intervalo);
	
    
	return json_encode($saida);

}

if(isset($_GET['dtDevolutiva'])){
	echo retorna($_GET['diasRetPrazo'], $conexao);




?>
	

    <!-- dtDevolutiva -->