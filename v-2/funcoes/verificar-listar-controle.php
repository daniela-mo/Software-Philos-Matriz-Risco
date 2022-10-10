<?php
    session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo=$_POST['codigo'];
    mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
    $selecao_req=mysqli_query($conexao,"select * from controles_existentes_temp WHERE id='$codigo' ");
    $registros_req=mysqli_fetch_array($selecao_req);echo $registros_req['parecer_controle'];?>




                
              
                
          
                   
             