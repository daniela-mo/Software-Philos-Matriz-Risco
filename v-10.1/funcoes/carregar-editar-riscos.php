<div class="row">
<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo=$_POST['codigo'];
	
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');		
$selecao=mysqli_query($conexao,"select * from parametrizacao WHERE id='$codigo'");
$registros=mysqli_fetch_array($selecao);
	
?>


<div class="col-md-6">
				<label>Nome</label>
				<input type="text" class="form-control mb-4" name="cad-nome-risco" id="cad-nome-risco" value="<?php echo $registros['nome'] ?>">
			</div>	
			
				<div class="col-md-6">
				<label>Descrição</label>
				<input type="text" class="form-control mb-4" name="cad-descricao-risco" id="cad-descricao-risco" value="<?php echo $registros['descricao'] ?>">
			</div>
			
			
			<div class="col-md-12">
			    <?php

       $selecao_itens_riscos_corporativos=mysqli_query($conexao,"select * from tipo_impacto");
       while($registros=mysqli_fetch_array($selecao_itens_riscos_corporativos)){
		   $id=$registros['id'];
		 $selecao_itens=mysqli_query($conexao,"select * from tabela_itens_parametrizacao WHERE item='$id'");
            $registros_itens=mysqli_fetch_array($selecao_itens);   
		   
       ?>
       
       <input type="checkbox" name="cad-itens2[]" id="cad-itens2[]" class="checkbox" value="<?php echo $registros['id'] ?>" <?php if($registros_itens['checkbox']=='s'){ ?> checked <?php } ?> >&nbsp;&nbsp; <?php echo $registros['item'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
       
       
       <?php } ?>
			
			</div>
	
	<div class="col-md-12 mt-4">
		<input type="button" class="btn btn-primary" value="Atualizar" onClick="AtualizarRiscoCorporativo()" >
	</div>
	
	</div>