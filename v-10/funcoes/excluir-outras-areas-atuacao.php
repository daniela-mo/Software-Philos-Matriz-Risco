<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];





	$excluir=mysqli_query($conexao,"delete  from responsaveis_areas WHERE id='$codigo' ");
	


