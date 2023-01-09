<label>Função</label>

<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

@$codigo=$_POST['codigo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

if(isset($codigo)){
	
$selecao=mysqli_query($conexao,"select * from funcoes_cadastro");	
while($registros=mysqli_fetch_array($selecao)){ 
$modalidade=$registros['funcao'];
?>


	<?php
		$selecao2=mysqli_query($conexao,"select * from cadastro_funcoes WHERE codigo_cadastro='$codigo' and funcao='$modalidade'");
		$registros2=mysqli_fetch_array($selecao2);
		$modalidade2=$registros2['funcao'];	
	?>


<input <?php if($modalidade==$modalidade2){ ?>
		checked
	<?php }	 ?>  type="checkbox" name="cad-funcao[]" id="cad-funcao" value="<?php echo $modalidade ?>" > <?php echo $registros['funcao'] ?><br>	
	
	
<?php } ?>	
	
	
<?php	
	
}else{


$selecao=mysqli_query($conexao,"select * from funcoes");

	
	
	
while($registros=mysqli_fetch_array($selecao)){
?>

<input type="checkbox" name="cad-funcao[]" id="cad-funcao" value="<?php echo $registros['funcao'] ?>" > <?php echo $registros['funcao'] ?><br>



<?php } } ?>


