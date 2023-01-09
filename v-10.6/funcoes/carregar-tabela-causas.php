<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$codigo_matriz=$_POST['codigo_matriz'];
$codigo_causa=$_POST['codigo_causa'];

$selecao_causas=mysqli_query($conexao,"select * from tabela_causa_efeito_temp WHERE codigo_matriz='$codigo_matriz' and codigo_causa='$codigo_causa'");

?>

<table id="tabela_causas" class="display mt-4" style="width:100%">
        <thead>
            <tr>
                <th>Controle</th>
                <th>Parecer</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
			<?php
			
			
			$selecao_causas=mysqli_query($conexao,"select * from tabela_causa_efeito_temp WHERE codigo_matriz='$codigo_matriz' and codigo_causa='$codigo_causa'");
			while($registros_causas=mysqli_fetch_array($selecao_causas)){
			
				
			
			
				
			?>
            <tr>
               
               <td><?php echo $registros_causas['controle'] ?></td>
				<td><?php echo $registros_causas['parecer'] ?></td>
				
                <td>
					
					<a class="text-dark"  onClick="ExcluirTabelaCausas(<?php echo $registros_causas['id']; ?>)">
					<i class="fa fa-trash" style="cursor: pointer"></i></a>
				
				
				</td>
              
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>	