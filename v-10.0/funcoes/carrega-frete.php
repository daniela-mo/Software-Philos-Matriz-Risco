<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
?>
		
		<div class="row">
			<div class="col-md-12">
			<input type="text" id="cad-novo-frete" class="form-control div-frete">
			</div>	
			
			<div class="col-md-4">
			<input type="button" class="btn btn-primary div-frete mt-2 mb-2" value="Gravar Frete" onClick="GravarFrete()">
			</div>		
		</div>
		<?php
            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao_fretes=mysqli_query($conexao,"select * from fretes");
			while($registros_fretes=mysqli_fetch_array($selecao_fretes)){
		?>
		<input type="radio" name="tipo-frete-terceiro" id="tipo-frete-terceiro" value="<?php echo $registros_fretes['id'] ?>" > <?php echo $registros_fretes['frete'] ?><br>
		<?php } ?>