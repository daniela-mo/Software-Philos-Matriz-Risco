
<?php 

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$setor=$_POST['setor'];

?>
             
              
<select class="form-control" name="esc-causa" id="esc-causa" onChange="EscolhendoCausa()">
				<option value="0">Escolher Causa</option>
				<?php
	        mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
					$selecao=mysqli_query($conexao,"select * from matriz_de_risco_causas WHERE setor='$setor'");
					while($registros=mysqli_fetch_array($selecao)){
				?>
				
				<option value="<?php echo $registros['id'] ?>"><?php echo $registros['causa'] ?></option>
				
				<?php } ?>
				
			</select>