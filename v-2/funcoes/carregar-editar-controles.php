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


<?php
	$selecao=mysqli_query($conexao,"select * from controles_existentes_temp WHERE id='$codigo'");
	$registros=mysqli_fetch_array($selecao);
?>

           <div class="row pl-4 pr-4 ml- mr-4">
           
             
               
                             
              <div class="col-md-6 mb-3">
           <label>Nome do controle</label>
               <input type="text" class="form-control mb-4" name="alt-nome" id="alt-nome" value="<?php echo $registros['nome_controle'] ?>"> 
       </div>
       
          <div class="col-md-6 mb-3">
           <label>Objetivo do controle</label>
               <input type="text" class="form-control mb-4" name="alt-objetivo" id="alt-objetivo" value="<?php echo $registros['objetivo_controle'] ?>"> 
       </div>
       
         <div class="col-md-12 mb-3">
           <label>Cadastro de tipo</label>
			 <?php $cadastro_tipo=$registros['cadastro_tipo'] ?>
              <select class="form-control mb-4" name="alt-tipo" id="alt-tipo">
				  
				  <option><?php echo $cadastro_tipo ?></option>
				  
				  
				  <?php if($cadastro_tipo!='POP - Procedimento Operacional Padrão'){ ?>
                  <option>POP - Procedimento Operacional Padrão</option>
				  <?php } ?>
				  
				  <?php if($cadastro_tipo!='Fluxograma de atividades'){ ?>
                  <option>Fluxograma de atividades</option>
				  <?php } ?>
				  
				  <?php if($cadastro_tipo!='Check list'){ ?>
                   <option>Check list</option>
				  <?php } ?>
              </select>
       </div>
		</div>	   
			   
	<div class="row pl-4 pr-4 ml- mr-4">		   
       
         <div class="col-md-4 mb-4">
           <label>Natureza do controle</label>
	 <?php $natureza_controle=$registros['natureza_controle'] ?>
			 
			 
     <input type="radio" id="alt-natureza" value="Manual" name="alt-natureza" <?php if($natureza_controle=='Manual'){?> checked <?php } ?>> Manual<br>
			 
     <input type="radio" id="alt-natureza" value="Automático" name="alt-natureza" <?php if($natureza_controle=='Automático'){?> checked <?php } ?>> Automático<br>
			 
     <input type="radio" id="alt-natureza" value="Manual dependente de TI" name="alt-natureza" <?php if($natureza_controle=='Manual dependente de TI'){?> checked <?php } ?>>Manual dependente de TI 
<br>
			 
			 
       </div>
       
      <div class="col-md-4 mb-4">
           <label>Frequência da execução do controle</label>
		   <?php $frequencia_controle=$registros['frequencia_controle'] ?>
		  <select id="cad-frequencia" name="cad-frequencia" class="form-control">
			  
			 <option><?php echo $frequencia_controle ?></option> 
			  
			<?php if($frequencia_controle!='Diário'){ ?>  
		  	<option>Diário</option>
			 <?php } ?>
			  
			<?php if($frequencia_controle!='Semanal'){ ?>   
			  <option>Semanal</option>
			   <?php } ?>
			  
			 <?php if($frequencia_controle!='Quinzenal'){ ?>  
			  <option>Quinzenal</option>
			   <?php } ?>
			  
			  <?php if($frequencia_controle!='Mensal'){ ?> 
			  <option>Mensal</option>
			   <?php } ?>
			  
			  <?php if($frequencia_controle!='Bimestral'){ ?> 
			  <option>Bimestral</option>
			   <?php } ?>
			  
			  <?php if($frequencia_controle!='Trimestral'){ ?> 
			  <option>Trimestral</option>
			   <?php } ?>
			  
			  <?php if($frequencia_controle!='Semestral'){ ?> 
			  <option>Semestral</option>
			   <?php } ?>
			  
			  <?php if($frequencia_controle!='Anual'){ ?> 
			  <option>Anual</option>
			   <?php } ?>
			  
			  <?php if($frequencia_controle!='Diário'){ ?> 
			  <option>Bienal</option>
			   <?php } ?>
			  
			  <?php if($frequencia_controle!='Diário'){ ?> 
			  <option>Trienal</option>
			   <?php } ?>
		  </select>
		  
             
       </div>
       
              <div class="col-md-4 mb-4">
           <label>Tipo de controle </label>
		   <?php $tipo_controle=$registros['tipo_controle'] ?>		  
				  
				  
<input type="radio" id="alt-tipo-controle" name="alt-tipo-controle" value="Preventivo (impede que os erros
antes da execução ou registro)"  <?php if($tipo_controle=='Preventivo (impede que os erros
antes da execução ou registro)'){ ?> checked <?php } ?>> Preventivo (impedem os erros antes da execução ou registro)
<br>
				  
<input type="radio" id="alt-tipo-controle" name="alt-tipo-controle" value="Detectivo (expõem os erros após
o registro)" <?php if($tipo_controle=='Detectivo (expõem os erros após o registro)'){ ?> checked <?php } ?>> Detectivo (expõem os erros após o registro)<br>
                
<br>
       </div>
           
           <div class="col-md-12  mb-4">
               <h3 class="mb-3">Análise Crítica</h3>
           </div>
          
            <div class="col-md-4 mb-5">
            
            
           <label>Método de avaliação</label>
				
			 <?php $metodo=$registros['metodo'] ?>		  	
				
           <select class="form-control" name="alt-metodo-avaliacao" id="alt-metodo-avaliacao">
			   <option><?php echo $metodo ?></option>
			   
			   <?php if($metodo!='Acompanhamento'){?>
			    <option>Acompanhamento</option>
			   <?php } ?>
			   
			   <?php if($metodo!='Amostragem'){?>
			    <option>Amostragem</option>
			   <?php } ?>
			   
			   <?php if($metodo!='Procedimento Analítico'){?>
			   <option>Procedimento Analítico</option>
			   <?php } ?>
			   
			   <?php if($metodo!='Entrevista'){?>
			    <option>Entrevista</option>
			   <?php } ?>
			   
			   <?php if($metodo!='Inspeção no local'){?>
               <option>Inspeção no local</option>
			   <?php } ?>
			   
			   <?php if($metodo!='Observação'){?>
			   <option>Observação</option>
			   <?php } ?>
			   
			   <?php if($metodo!='Outro'){?>
			   <option>Outro</option>
			   <?php } ?>
           </select>
       </div>
       
        <div class="col-md-4 mb-5">
           <label>Responsável</label>
			
		
           <select class="form-control" name="alt-responsavel" id="alt-responsavel">
			   <?php
			$selecao_responsavel=mysqli_query($conexao,"select * from usuarios_empresa");
			while($registros_responsaveis=mysqli_fetch_array($selecao_responsavel)){
		?>	
               <option><?php echo $registros_responsaveis['email'] ?></option>
			   
			   <?php } ?>
           </select>
       </div>
       
        <div class="col-md-4 mb-5">
           <label>Data da avaliação</label>
           <input type="text" class="form-control datepicker" name="alt-data-avaliacao" id="alt-data-avaliacao" value="<?php echo $registros['data'] ?>">
       </div>
       
          <div class="col-md-8 mb-4">
           <label>Resultado da avaliação(Comentar ou recomendar)</label>
           <input type="text" class="form-control" name="alt-resultado-avaliacao" id="alt-resultado-avaliacao" autocomplete="off" value="<?php echo $registros['resultado'] ?>">
       </div>
       
        <div class="col-md-4 mb-4">

           <label>Evidência objetiva</label>
           <input type="file" class="form-control" name="arquivos" id="arquivos">
       </div>
       
		
		
       <div class="col-md-4" >
		    <?php $parecer=$registros['parecer_controle'] ?>		
               <label>Parecer</label>
               <select class="form-control" id="alt-parecer-avaliacao">
				   
				   <option><?php echo $parecer ?></option>
                   
				   <?php if($parecer!='Eficaz'){?>
				   <option>Eficaz</option>
				   <?php } ?>
				   
				   <?php if($parecer!='Ineficaz'){?>
                   <option>Ineficaz</option>
				    <?php } ?>
               </select>
           </div>
       
       
       </div>
         
          <div class="col-md-12 ml-2 mt-4">
            <input type="button" value="Atualizar Controle" class="btn btn-primary float-right" onClick="AtualizarItens(<?php echo $registros['id'] ?>)" data-dismiss="modal">
        
        </div>