<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');



$excluir=mysqli_query($conexao,"delete  from responsaveis_areas_temp ");



