  <?php
    session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo_bloco=$_POST['codigo_bloco'];

  ?>
  
  
  
  <select name="cad-questao-mae" id="cad-questao-mae" class="form-control">
		  	<option value="">Escolha</option>
			  
			<?php
            mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	  
			  $selecao_questao_qaa=mysqli_query($conexao,"select * from questoes_qaa WHERE questao_principal='0' and codigo_bloco='$codigo_bloco' order by titulo ASC");
			  while($registros_questao_qaa=mysqli_fetch_array($selecao_questao_qaa)){
			 ?> 
			  
			  <option value="<?php echo $registros_questao_qaa['id'] ?>"><?php echo $registros_questao_qaa['titulo'] ?></option>
			  
			 <?php } ?> 
			  
		  </select>