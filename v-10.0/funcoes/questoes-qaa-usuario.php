<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$codigo=$_POST['codigo'];


session_start();
$usuario=$_SESSION['usuario'];
$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario'");
$registros_usuario=mysqli_fetch_array($selecao_usuario);
$codigo_usuario=$registros_usuario['id'];



$selecao=mysqli_query($conexao,"select * from questoes_qaa WHERE id='$codigo'");
$regsitros=mysqli_fetch_array($selecao);
?>



<div id="resposta-alerta"></div>

<input type="hidden" id="quest-codigo" value="<?php echo $regsitros['id'] ?>">
					<label class="mt-2">Questão</label>
			<input type="text" id="quest-titulo" value="<?php echo $regsitros['questao'] ?>" class="form-control" readonly>		
					
					
					
					<label class="mt-2">Resposta</label>
					<textarea class="form-control" rows="8" id="quest-resposta" ><?php echo $regsitros['resposta'] ?></textarea>	
					
					<label class="mt-2">Essa resposta possui documentos ou evidências a serem anexadas?
					</label>
					
					<input type="radio" name="cad-documentos" value="sim" onChange="Uploads('s')"> Sim  <br> 
					<input type="radio" name="cad-documentos"  value="não" onChange="Uploads('n')"> Não<br>


<div id="upload-arquivos"></div>
		

				<input type="button" value="Gravar" class="btn btn-primary mt-3" onClick="GravarResposta(<?php echo $regsitros['id'] ?>)">		

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 999999999">
  <div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 999999999">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Responsáveis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div id="resposta-modal"></div>
        
		  <div id="carregar-listar-usuarios"></div>
		  
      </div>
      <div class="modal-footer">
       <select class="form-control" id="novo-user">
		  <option value="0">Novo usuário</option>
		   <?php
		    $selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa");
		   while($registros_usuarios=mysqli_fetch_array($selecao_usuarios)){
		   ?>
		   
		   <option value="<?php echo $registros_usuarios['id'] ?>"><?php echo $registros_usuarios['nome'] ?>|<?php echo $registros_usuarios['email'] ?></option>
		   
		   <?php } ?>
		   
		</select>
		  
		 <input type="button"  value="Adicionar" class="btn btn-primary" onclick="AdicionarResponsavel(<?php echo $codigo ?>)">
        
      </div>
    </div>
  </div>
</div>