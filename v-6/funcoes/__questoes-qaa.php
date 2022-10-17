<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');


$codigo=$_POST['codigo'];
@$usuario=$_SESSION['usuario'];

$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario'");
$registros=mysqli_fetch_array($selecao);
$tipo=$registros['tipo'];
$id_usuario=$registros['id'];
$cod_grupo=$registros['grupo'];


$selecao=mysqli_query($conexao,"select * from questoes_qaa WHERE id='$codigo'");
$regsitros=mysqli_fetch_array($selecao);
?>

<div id="resposta-alertas" ></div>
<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>
					<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onClick="CarregaUsers(<?php echo $codigo ?>)">
 Aprovadores
</button>
<?php } ?>


					<input type="hidden" id="quest-codigo" value="<?php echo $regsitros['id'] ?>">
					<label class="mt-3">Questão</label>
					<textarea class="form-control" rows="3" id="quest-questao" 
									  
							  ><?php echo $regsitros['questao'] ?></textarea>	



<?php
	if($regsitros['pergunta_sim_nao']!=''){
?>	

<label class="mt-3"><?php echo $regsitros['pergunta_sim_nao'] ?></label>

<input type="radio" <?php if($regsitros['resposta_sim_nao']=='Sim'){?> checked <?php } ?>  name="cad-resposta-sim-nao" id="cad-resposta-sim-nao" value="Sim"> Sim

<input type="radio" <?php if($regsitros['resposta_sim_nao']=='Não'){?> checked <?php } ?>  name="cad-resposta-sim-nao" id="cad-resposta-sim-nao"  value="Não"> Não  


<?php } ?>
					
                    <label class="mt-3">Resposta</label>
                    <textarea class="form-control" rows="3" id="quest-resposta" 
							
							  
							  ><?php echo $regsitros['resposta'] ?></textarea>
                    
                    
					<label class="mt-3">Essa resposta possui documentos ou evidências a serem anexadas?
					</label>
					<?php $possui=$regsitros['possui_nao_possui'];
						if($possui=='0'){$possui='não';$possui2='Não Possui';}
						if($possui==''){$possui='não';}
						if($possui=='não'){$possui2='Não Possui';}	
						if($possui=='sim'){$possui2='Possui';}	
?>

					<select class="form-control mt-3 mb-4" name="cad-documentos" id="cad-documentos" onChange="Uploads()">
						<option value="<?php echo $possui ?>">
							<?php echo $possui2 ?>
						</option>
						
					<?php if($possui=='sim'){ ?>
						<option value="não">Não Possui</option>
						<?php } ?>
						
						<?php if($possui=='não'){ ?>
						<option value="sim">Possui</option>
						<?php } ?>
						
					</select>

				






<div id="carrega-anexos-qaa"></div>



<div id="upload-arquivos"></div>
		
<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='8' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo==1){	
			?>
							
				
				<input type="button" value="Atualizar" class="btn btn-primary mt-1" onClick="AtualizarQAA()">		
<?php } ?>	
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