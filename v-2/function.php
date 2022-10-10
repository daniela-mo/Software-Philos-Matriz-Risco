<?php
session_start();
function retorna($responProc, $conexao)
{
	$db = explode (".com", $_SESSION['dominio']);
	$db = 'sistemam2vconsul_'.$db[0];
	$conexao = mysqli_connect('54.197.73.103', 'root', 'philos.tec',$db);
	$result_responsavel = "SELECT * FROM usuarios_empresa WHERE nome = '$responProc' LIMIT 1";
	$resultado_responsavel = mysqli_query($conexao, $result_responsavel);
	if($resultado_responsavel->num_rows){
		$row_responsavel = mysqli_fetch_assoc($resultado_responsavel);
		$valores['area'] = $row_responsavel['cargo'];
	}else{
		$valores['area'] = 'Cargo não encontrado';
	}
	return json_encode($valores);
}

if(isset($_GET['responProc'])){
	echo retorna($_GET['responProc'], $conexao);
}




/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
//include_once("conexao.php");

	$conexao = mysqli_connect('54.197.73.103', 'root', 'philos.tec','sistemam2vconsul_nexaresources');
	$sql = "SELECT * FROM usuarios_empresa WHERE nome = 'M2V'";
	$consulta = mysqli_query($conexao, $sql)or die( mysqli_error($db));
	$resultado = mysqli_fetch_array($consulta);
	//print $sql;
	//print "<br>";
	print $resultado['cargo'];
	*/

?>