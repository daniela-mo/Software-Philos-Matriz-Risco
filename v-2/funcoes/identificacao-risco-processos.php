
<?php 

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	
?>
<select class="form-control" name="cad-processo" id="cad-processo">
				<option value="0">Escolha</option>
            <?php
            mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
            $selecao_areas=mysqli_query($conexao,"select * from processos WHERE area='$codigo' ");
            while($registros_areas=mysqli_fetch_array($selecao_areas)){
            ?>
                <option><?php echo $registros_areas['processo'] ?></option>
                
            <?php } ?>    
			</select>