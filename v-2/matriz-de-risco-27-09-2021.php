<?php  
$nav_menu_principal='gestaoderisco';
$nav_menu_pagina='matrizderiscos';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard Philos</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
	
	
</head>
	
	<style>
		.esc-listar{display: none}
		.esc-parecer{display:none}
	</style>
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$codigo=$_REQUEST['cod'];
    $codigo_matriz=$_REQUEST['cod'];
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Matriz de Risco</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
	<div class="row ml-4 mr-4 mt-5">
         <input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
    
    <div class="col-md-12 text-center mt-4 mb-5">
        <input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Identificação">
        <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn2" onClick="Abas(2)" value="Análise">
        <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn3" onClick="Abas(3)" value="Avaliação">
        <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn4" onClick="Abas(4)" value="Tratamento">
 

    </div>
    </div> 
			
			
			
	 <div class="row ml-4 mr-4">
		<div class="col-md-12">		

			
			
			
			
			<div id="conteudo1">
				<?php
     mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
        $selecao=mysqli_query($conexao,"select * from identificacao_do_risco WHERE id='$codigo'");
        $registros=mysqli_fetch_array($selecao); 
        $classifi=$registros['classificacao_risco'];
		$evento_risco = $registros['evento_risco'];	
		$origem = $registros['origem'];
		$processo = $registros['processo'];
		$area = $registros['area'];			
    ?>
				
		<div class="row">
   
        <div class="col-md-2 mb-4">
           <label>ID</label>
           <input type="number" name="cad-id" id="cad-id" class="form-control" value="<?php echo $registros['id'] ?>" readonly>
        </div>
        
         <div class="col-md-3 mb-4">
           <label>Evento de Risco</label>
           <input type="text" name="cad-evento" id="cad-evento"  class="form-control" value="<?php echo $registros['evento_risco'] ?>" readonly>
        </div>
        
          <div class="col-md-3 mb-4">
           <label>Origem</label>
           <input type="text" name="cad-origem" id="cad-origem"  class="form-control" value="<?php echo $registros['origem'] ?>" readonly>
        </div>
        
          <div class="col-md-3 mb-4">
           <label>Fator de Risco</label>
           <input type="text" name="cad-fator" id="cad-fator"  class="form-control" value="<?php echo $registros['fator_risco'] ?>" readonly>
        </div>
        
          <div class="col-md-2 mb-4">
           <label>Data de Id.</label>
           <input type="text" name="cad-data-id-risco" id="cad-data-id-risco"  class="form-control datepicker" value="<?php echo $registros['data_id_risco'] ?>" readonly>
        </div>
        
        
         <?php      
    $classifi=$registros['classificacao_risco'];
    $selecao_parametrizacao=mysqli_query($conexao,"select * from parametrizacao WHERE id='$classifi'");
    $registros_parametrizacao=mysqli_fetch_array($selecao_parametrizacao);
    ?>
          <div class="col-md-3 mb-4">
           <label>Classif. Risco Corporativo</label>
           <input type="text" name="cad-classificacao-risco" id="cad-classificacao-risco"  class="form-control" value="<?php echo $registros_parametrizacao['nome'] ?>" readonly>
        </div>
        
          
        
          <div class="col-md-3 mb-4">
			<label>Área 
				
				
			<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='19' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>				
				
				<i class="fa fa-edit pointer"  data-toggle="modal" data-target="#exampleModal" onClick="EditarAtualizarArea(<?php echo $registros['id'] ?>)"></i>
			  
			<?php } ?>  
			  
			  
			  
			  
			  
			  </label>
				<input type="text" name="cad-area-risco" id="cad-area-risco" value="<?php echo $registros['area'] ?>" class="form-control" readonly>
		</div>
        
        
<div class="col-md-3 mb-4">
<label>Processo</label>
           <input type="text" name="cad-processo" id="cad-processo"  class="form-control" value="<?php echo $registros['processo'] ?>" readonly >
        </div>
        
        
        
        
        
   </div>     
 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atualizar Área</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-3 pb-3 mt-2 mb-5">
      
		  <label>Área Atual</label>
		  
		<?php
	$codigo_area=$registros['codigo_area'];	
	$selecao_area=mysqli_query($conexao,"select * from areas WHERE id='$codigo_area'");	
	$registros_area=mysqli_fetch_array($selecao_area);	
				  
	$codigo_empresa=$registros_area['codigo_empresa'];
	$selecao_empresa=mysqli_query($conexao,"select * from empresas WHERE id='$codigo_empresa'");
	$registros_empresa=mysqli_fetch_array($selecao_empresa);			  
				  
				  
	?>
		  
		  
		  <input type="text" readonly class="form-control" value="<?php echo $registros['area'] ?> (<?php echo $registros_empresa['razao_social'] ?>)">
		  
		  <label class="mt-3">Área nova</label>
		 <select class="form-control" id="cad-area-nova">
			  <?php
	$selecao_area=mysqli_query($conexao,"select * from areas order by area ASC");
	while($registros_areas=mysqli_fetch_array($selecao_area)){	
	if($registros_areas['area']!=$registros['area']){
	$codigo_empresa=$registros_areas['codigo_empresa'];	
		
	$selecao_empresa=mysqli_query($conexao,"select * from empresas WHERE id='$codigo_empresa'");	
	$registros_empresa=mysqli_fetch_array($selecao_empresa);	
		
	if($registros_areas['area']!=''){	
		?>
		 	<option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['area'] ?> (<?php echo $registros_empresa['razao_social'] ?>)</option> 
	<?php }}} ?>		 
			 
		 </select>  
		  
		  <input type="button" class="btn btn-primary mt-3" value="Atualizar" onClick="AtualizarrArea()">
		  
		  
      </div>
      
    </div>
  </div>
</div>      
<div class="row mr-4">
    	    
	<div class="col-md-12">
		<h6 class="mt-4 mb-3"><strong>Demais áreas impactadas pelo risco</strong></h6>
	</div>
	
         <div class="col-md-3">
			
			
			<table class="table table-sm table-striped">
				
				
				
			<?php
             mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao2=mysqli_query($conexao,"select * from areas_identificacao_de_risco WHERE codigo_id_risco='$codigo'");
				while($registros2=mysqli_fetch_array($selecao2)){
			?>	
				
				
			<tr>
				<td class="pl-4 pt-2 pb-2"><?php echo $registros2['area'] ?></td>	
			</tr>	
				
				
			<?php } ?>	
				
				
				
			</table>
			
		</div>
        
        
        
    </div>   		
				
				
				
			</div>
			
			<div id="conteudo2">
				<div class="row">
     <div class="col-md-3 mb-4">
			<label>Área</label>
			<input type="text" readonly class="form-control" value="<?php echo $registros['area'] ?>">
		</div>
      
        <div class="col-md-3 mb-4">
          <label>Evento de risco</label>
          <input type="text" class="form-control" name="cad-evento-risco" id="cad-evento-risco" value="<?php echo $registros['evento_risco'] ?>" readonly>
      </div>
      
        <div class="col-md-3 mb-4">
          <label>Processo</label>
          <input type="text" class="form-control" name="cad-processo" id="cad-processo" value="<?php echo $registros['processo'] ?>" readonly>
      </div>
      
      
      
      
      
      <div class="col-md-12 mt-3 mb-3">
      
      
      <h4 class="mb-4 mt-4"><a data-toggle="modal" data-target="#ModalControles" class="pointer"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/></a> <strong>Controles existentes</strong> </h4>
      
		  
				  
      
      <div id="carregar-tabela-controles-existentes">
      </div>
      
      
       <h4 class="mb-4 mt-5"> <strong>Causa e Efeito - Diagrama de Ishikawa ou Causa & Efeito (6Ms)</strong> </h4>
      
		  
<div class="row">
	
	
	
	
	<div class="col-md-12 pr-5">	  
	  		  
		  
		  
<!-------------MÉTODO------------>      
      <div id="sanfona1" class="pointer" onClick="AbrirSanfona(1)" >
      <h4 class="cursor"><strong >Método</strong> 
	  </h4>
           
      </div>
      
      <div id="sanfona-conteudo1" class="p-4 mb-5">
         <div class="row mb-4"> 
      
	<div class="col-md-7 mb-3">
		<h4>Causa</h4>	
	<input type="button" class="btn btn-primary float-right mb-3 " value="Adicionar Causa" onClick="ModalAdicionarControle('Método')"> 
		
		
	 <div id="carregar-ishikawa"></div>	
		
	</div>			 
			 
		<div class="col-md-5">	 
    
		<?php
	$selecao_efeito=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Método' and codigo_matriz='$codigo_matriz'");
	$registros_efeito=mysqli_fetch_array($selecao_efeito);			   
	?>
		
	<h4>Efeito</h4>
	<textarea class="form-control" rows="4" id="cad-efeito1"><?php echo $registros_efeito['efeito'] ?></textarea>
		<input type="button" value="Salvar Efeito" class="btn btn-primary mt-3" onClick="SalvarEfeito('Método')" >
	
			
			
			
          </div> 
           
           </div>
      </div>
	</div>	  
	<div class="col-md-12 pr-5">	
		
		
		  <!-------------MEDIDAS------------>      
      <div id="sanfona2" class="pointer" onClick="AbrirSanfona(2)" >
      <h4 class="cursor"><strong >Medidas</strong> 
	  </h4>
           
      </div>
      
      <div id="sanfona-conteudo2" class="p-4 mb-5">
         <div class="row mb-4"> 
      
	<div class="col-md-7 mb-3">
		<h4>Causa</h4>	
	<input type="button" class="btn btn-primary float-right mb-3 " value="Adicionar Causa" onClick="ModalAdicionarControle('Medidas')"> 
		
		
	 <div id="carregar-ishikawa2"></div>	
		
	</div>			 
			 
		<div class="col-md-5">	 
     <?php
	$selecao_efeito=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Medidas' and codigo_matriz='$codigo_matriz'");
	$registros_efeito=mysqli_fetch_array($selecao_efeito);			   
	?>     
		
	<h4>Efeito</h4>
	<textarea class="form-control" rows="4" id="cad-efeito2"><?php echo $registros_efeito['efeito'] ?></textarea>
		<input type="button" value="Salvar Efeito" class="btn btn-primary mt-3" onClick="SalvarEfeito('Medidas')" >
	
			
			
			
          </div> 
           
           </div>
      </div>
	</div>
	
	
	
	
	
	
	
	
		  
	<div class="col-md-12 pr-5">	  
	<!-------------MÃO DE OBRA------------>      
       <div id="sanfona3" class="pointer" onClick="AbrirSanfona(3)" >
      <h4 class="cursor"><strong >Mão de Obra</strong> 
	  </h4>
           
      </div>
      
      <div id="sanfona-conteudo3" class="p-4 mb-5">
         <div class="row mb-4"> 
      
	<div class="col-md-7 mb-3">
		<h4>Causa</h4>	
	<input type="button" class="btn btn-primary float-right mb-3 " value="Adicionar Causa" onClick="ModalAdicionarControle('Mão de Obra')"> 
		
		
	 <div id="carregar-ishikawa3"></div>	
		
	</div>			 
			 
		<div class="col-md-5">	 
    <?php
	$selecao_efeito=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Mão de Obra' and codigo_matriz='$codigo_matriz'");
	$registros_efeito=mysqli_fetch_array($selecao_efeito);			   
	?>      
		
	<h4>Efeito</h4>
	<textarea class="form-control" rows="4" id="cad-efeito3"><?php echo $registros_efeito['efeito'] ?></textarea>
		<input type="button" value="Salvar Efeito" class="btn btn-primary mt-3" onClick="SalvarEfeito('Mão de Obra')" >
	
			
			
			
          </div> 
           
           </div>
      </div>
	</div>	  
		  
		  
		  
	<div class="col-md-12 pr-5">	  
			  
	<!-------------MÁQUINA------------>      
     <div id="sanfona4" class="pointer" onClick="AbrirSanfona(4)" >
      <h4 class="cursor"><strong >Máquina</strong> 
	  </h4>
           
      </div>
      
      <div id="sanfona-conteudo4" class="p-4 mb-5">
         <div class="row mb-4"> 
      
	<div class="col-md-7 mb-3">
		<h4>Causa</h4>	
	<input type="button" class="btn btn-primary float-right mb-3 " value="Adicionar Causa" onClick="ModalAdicionarControle('Máquina')"> 
		
		
	 <div id="carregar-ishikawa4"></div>	
		
	</div>			 
			 
		<div class="col-md-5">	 
   <?php
	$selecao_efeito=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Máquina' and codigo_matriz='$codigo_matriz'");
	$registros_efeito=mysqli_fetch_array($selecao_efeito);			   
	?>       
		
	<h4>Efeito</h4>
	<textarea class="form-control" rows="4" id="cad-efeito4"><?php echo $registros_efeito['efeito'] ?></textarea>
		<input type="button" value="Salvar Efeito" class="btn btn-primary mt-3" onClick="SalvarEfeito('Máquina')" >
	
			
			
			
          </div> 
           
           </div>
      </div>
	</div>	  
		  
		  
	<div class="col-md-12 pr-5">	  
		  
	<!-------------MEIO AMBIENTE------------>      
     <div id="sanfona5" class="pointer" onClick="AbrirSanfona(5)" >
      <h4 class="cursor"><strong >Meio Ambiente</strong> 
	  </h4>
           
      </div>
      
      <div id="sanfona-conteudo5" class="p-4 mb-5">
         <div class="row mb-4"> 
      
	<div class="col-md-7 mb-3">
		<h4>Causa</h4>	
	<input type="button" class="btn btn-primary float-right mb-3 " value="Adicionar Causa" onClick="ModalAdicionarControle('Meio Ambiente')"> 
		
		
	 <div id="carregar-ishikawa5"></div>	
		
	</div>			 
			 
		<div class="col-md-5">	 
   <?php
	$selecao_efeito=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Meio Ambiente' and codigo_matriz='$codigo_matriz'");
	$registros_efeito=mysqli_fetch_array($selecao_efeito);			   
	?>       
		
	<h4>Efeito</h4>
	<textarea class="form-control" rows="4" id="cad-efeito5"><?php echo $registros_efeito['efeito'] ?></textarea>
		<input type="button" value="Salvar Efeito" class="btn btn-primary mt-3" onClick="SalvarEfeito('Meio Ambiente')" >
	
			
			
			
          </div> 
           
           </div>
      </div>
	</div>	  
		  
	<div class="col-md-12 pr-5">	  
		  
		  	<!-------------MATERIAIS------------>      
         <div id="sanfona6" class="pointer" onClick="AbrirSanfona(6)" >
      <h4 class="cursor"><strong >Materiais</strong> 
	  </h4>
           
      </div>
      
      <div id="sanfona-conteudo6" class="p-4 mb-5">
         <div class="row mb-4"> 
      
	<div class="col-md-7 mb-3">
		<h4>Causa</h4>	
	<input type="button" class="btn btn-primary float-right mb-3 " value="Adicionar Causa" onClick="ModalAdicionarControle('Materiais')"> 
		
		
	 <div id="carregar-ishikawa6"></div>	
		
	</div>			 
			 
		<div class="col-md-5">	 
    <?php
	$selecao_efeito=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Materiais' and codigo_matriz='$codigo_matriz'");
	$registros_efeito=mysqli_fetch_array($selecao_efeito);			   
	?>      
		
	<h4>Efeito</h4>
	<textarea class="form-control" rows="4" id="cad-efeito6"><?php echo $registros_efeito['efeito'] ?></textarea>
		<input type="button" value="Salvar Efeito" class="btn btn-primary mt-3" onClick="SalvarEfeito('Materiais')" >
	
			
			
			
          </div> 
           
           </div>
      </div>
		</div>
	
	
	
	<?php
	$selecao_efeitos=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE codigo_matriz='$codigo_matriz'");
	$registros_efeitos=mysqli_fetch_array($selecao_efeitos);			   
	?>
	
	
		  
		  
      
    </div>  
    </div>
     
	</div>
				<div style="height: 250px" class="mt-5"></div>
</div>
			
			<div id="conteudo3">
				<form action="processa-gravar-avaliacao-risco-inerente.php" method="post">
    <input type="hidden" name="codigo-matriz-de-risco" id="codigo-matriz-de-risco" value="<?php echo $codigo ?>">
    <input type="hidden" name="classificacao-risco" id="classificacao-risco" value=" <?php echo $classifi=$registros['classificacao_risco'] ?>">
    
   
    
    <div class="row">
    
    <?php      
    $classifi=$registros['classificacao_risco'];
    $selecao_parametrizacao=mysqli_query($conexao,"select * from parametrizacao WHERE id='$classifi'");
    $registros_parametrizacao=mysqli_fetch_array($selecao_parametrizacao);
    ?>
    
    
     <div class="col-md-2">
          <label>Classif. de Risco</label>
          <input type="text" class="form-control" name="cad-classificacao-de-risco" id="cad-classificacao-de-risco"  
          value="<?php  echo  $registros_parametrizacao['nome']; ?>" readonly>
      </div>
      
   
      <div class="col-md-2">
          <label>Área</label>
          <input type="text" class="form-control" name="cad-area" id="cad-area"  value="<?php echo $registros['area'] ?>" readonly>
      </div>
      
        <div class="col-md-2">
          <label>Evento de Risco</label>
          <input type="text" class="form-control" name="cad-evento-risco" id="cad-evento-risco"  value="<?php echo $registros['evento_risco'] ?>" readonly>
      </div>
      
       <div class="col-md-2">
          <label>Processo</label>
          <input type="text" class="form-control" name="cad-processo" id="cad-processo"  value="<?php echo $registros['processo'] ?>" readonly>
      </div>
      
        
      
        
    </div>
    
    <div class="col-md-12 mt-5">
            <h4>Avaliação de Risco Inerente</h4>
        </div>
    <div>
    <div class="row pl-4 pr-4 pt-4 pb-5" >
    
     <?php
$selecao_avaliacao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
$num=mysqli_num_rows($selecao_avaliacao);
$registros_avaliacao=mysqli_fetch_array($selecao_avaliacao);
$exibir_probabilidade=$registros_avaliacao['probabilidade'];
$exibir_impacto=$registros_avaliacao['impacto'];

if($exibir_probabilidade==1){$exibir_probabilidade='Rara';}
if($exibir_probabilidade==2){$exibir_probabilidade='Improvável';}
if($exibir_probabilidade==3){$exibir_probabilidade='Possível';}
if($exibir_probabilidade==4){$exibir_probabilidade='Provável';}
if($exibir_probabilidade==5){$exibir_probabilidade='Quase Certo';}


if($exibir_impacto==0){$exibir_impacto='Insignificante';}
if($exibir_impacto==5){$exibir_impacto='Baixo';}
if($exibir_impacto==8){$exibir_impacto='Moderado';}
if($exibir_impacto==17){$exibir_impacto='Alto';}
if($exibir_impacto==27){$exibir_impacto='Muito Alto';}
if($exibir_impacto==40){$exibir_impacto='Catastrófico';}

$nivel=$registros_avaliacao['nivel'];				 
if($nivel=='Aceitável'){$cor_nivel='#41841E';};				 
if($nivel=='Sério'){$cor_nivel='#E58C2C';};	
if($nivel=='Significativo'){$cor_nivel='#F2E70A';};					 
if($nivel=='Inaceitável'){$cor_nivel='#FF0000';};					 
				 
?>
    
    
            <div class="col-md-2">
           <label>Probabilidade</label>
           
           <select class="form-control" name="cad-probabilidade-avaliacao" id="cad-probabilidade-avaliacao" onChange="Calcular()">
               <option value="0">Escolher</option>
               <option value="1">Rara</option>
               <option value="2">Improvável</option>
               <option value="3">Possível</option>
               <option value="4">Provável</option>
               <option value="5">Quase certo</option>
           </select>
       </div>
       
        <div class="col-md-2">
           <label>Impacto(Consequência)</label>
           
           <select class="form-control" name="cad-impacto-avaliacao" id="cad-impacto-avaliacao" onChange="Calcular()">
               <option value="0">Escolher</option>
               <option value="5">Insignificante</option>
               <option value="8">Baixo</option>
               <option value="17">Moderado</option>
               <option value="27">Alto</option>
               <option value="40">Catastrófico</option>
           </select>
       </div>
       
       <div class="col-md-3">
           <label>Nível do Risco</label>
           
           <input type="text" name="cad-nivel-do-risco-inerente"  id="cad-nivel-do-risco-inerente" readonly  >
       </div>
       
       <?php
       
       $selecao_itens=mysqli_query($conexao,"select * from tabela_itens_parametrizacao WHERE codigo_parametrizacao='$classifi' and checkbox='s'");
       while($registros_itens=mysqli_fetch_array($selecao_itens)){
       $item=$registros_itens['item'];
       
       mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
       $selecao_impacto=mysqli_query($conexao,"select * from tipo_impacto WHERE id='$item' ");
       $registros_impacto=mysqli_fetch_array($selecao_impacto);
       
       $registros_item=$registros_impacto['item'];
       
       if($registros_item=='Operacional/Estratégica'){$registros_item='Op. Estratégica ';}
       
       ?>
       
       
       <div class="col-md-1">
       
        <input type="hidden" id="titulos[]" name="titulos[]" value="<?php echo $registros_item ?>">  
       
           <label><?php echo $registros_item ?></label>
           
           <select class="form-control"  name="inerente[]" id="cad-<?php echo $registros_impacto['id']; ?>" onChange="CoresNiveis('cad-<?php echo $registros_impacto['id']; ?>')">
                <option value="0">Escolher</option>
               <option value="1">Baixa</option>
              <option value="2">Média</option>
               <option value="3">Alta</option>
               <option value="4">Muito Alta</option>
           
           </select>
       </div>
       
       
       
       <?php }?>
       
         
       
        
       
       
        <div class="col-md-3">
           <label>Decisão de Tratamento do Risco</label>
           
           
          
           
           <select class="form-control form-cores" name="cad-decisao-avaliacao" id="cad-decisao-avaliacao">
            <option value="0">Escolher</option>
           <?php
    mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$selecao3=mysqli_query($conexao,"select * from medida_tratamento");
while($registros3=mysqli_fetch_array($selecao3)){
?>
           
           
               <option><?php echo $registros3['descricao']?></option>
    <?php } ?>          
           
           </select>
       </div> 
       
    
       
        <div class="col-md-12 mt-3">
        <input type="submit" class="btn btn-primary" value="Gravar">
    
    </div>
  
    
    
       </div>
		
	
		
		
		<div class="row ml-4 mr-4">
			<div class="col-md-12">
				
				<table id="example1" class="display table table-striped" style="width: 100%">
					<tr>
						<th>Probabilidade</th>
						<th>Impacto(Consequência)</th>
						<th>Nível do Risco</th>
						<th>Decisão de Tratamento do Risco</th>
						
					</tr>
					
				<?php
					$selecao11=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
					while($registros11=mysqli_fetch_array($selecao11)){
					?>
					
					<tr>
						<td><?php echo $registros11['probabilidade'] ?></td>
						<td><?php echo $registros11['impacto'] ?></td>
						<td><?php echo $registros11['nivel'] ?></td>
						<td><?php echo $registros11['decisao'] ?></td>
					</tr>
					
					
					<?php } ?>
				
				</table>
				
				
			</div>
		
		</div>
		
		
		
		
		
		
		
    </div>
</form>    
   
<form action="processa-gravar-avaliacao-risco-residual.php" method="post"> 
 <input type="hidden" name="codigo-matriz-de-risco" id="codigo-matriz-de-risco" value="<?php echo $codigo ?>">
    <input type="hidden" name="classificacao-risco" id="classificacao-risco" value=" <?php echo $classifi=$registros['classificacao_risco'] ?>">
    <div class="col-md-12 mt-5">
            <h4>Avaliação de Risco Residual
</h4>
        </div>
    <div>
    <div class="row pl-4 pr-4 pt-4 pb-4" >
    
     <?php
$selecao_avaliacao=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
$num=mysqli_num_rows($selecao_avaliacao);
$registros_avaliacao=mysqli_fetch_array($selecao_avaliacao);
$exibir_probabilidade=$registros_avaliacao['probabilidade'];
$exibir_impacto=$registros_avaliacao['impacto'];

if($exibir_probabilidade==1){$exibir_probabilidade='Rara';}
if($exibir_probabilidade==2){$exibir_probabilidade='Improvável';}
if($exibir_probabilidade==3){$exibir_probabilidade='Possível';}
if($exibir_probabilidade==4){$exibir_probabilidade='Provável';}
if($exibir_probabilidade==5){$exibir_probabilidade='Quase Certo';}


if($exibir_impacto==0){$exibir_impacto='Insignificante';}
if($exibir_impacto==5){$exibir_impacto='Baixo';}
if($exibir_impacto==8){$exibir_impacto='Moderado';}
if($exibir_impacto==17){$exibir_impacto='Alto';}
if($exibir_impacto==27){$exibir_impacto='Muito Alto';}
if($exibir_impacto==40){$exibir_impacto='Catastrófico';}
		
		
$nivel=$registros_avaliacao['nivel'];				 
if($nivel=='Aceitável'){$cor_nivel='#41841E';};				 
if($nivel=='Sério'){$cor_nivel='#E58C2C';};	
if($nivel=='Significativo'){$cor_nivel='#F2E70A';};					 
if($nivel=='Inaceitável'){$cor_nivel='#FF0000';};			
		

?>

  
         
    
            <div class="col-md-2">
           <label>Probabilidade</label>
           
           <select class="form-control" name="cad-probabilidade-residual" id="cad-probabilidade-residual" onChange="Calcular2()">
               <option value="0">Escolher</option>
               <option value="1">Rara</option>
               <option value="2">Improvável</option>
               <option value="3">Possível</option>
               <option value="4">Provável</option>
               <option value="5">Quase certo</option>
           </select>
       </div>
       
        <div class="col-md-2">
           <label>Impacto(Consequência)</label>
           
           <select class="form-control" name="cad-impacto-residual" id="cad-impacto-residual" onChange="Calcular2()">
               <option value="0">Escolher</option>
               <option value="5">Insignificante</option>
               <option value="8">Baixo</option>
               <option value="17">Moderado</option>
               <option value="27">Alto</option>
               <option value="40">Catastrófico</option>
           </select>
       </div>
       
       <div class="col-md-2">
           <label>Nível do Risco</label>
           
           <input type="text"  id="cad-nivel-do-risco-residual" name="cad-nivel-do-risco-residual" readonly >
       </div>
		
	
       
         <?php
       
       $selecao_itens=mysqli_query($conexao,"select * from tabela_itens_parametrizacao WHERE codigo_parametrizacao='$classifi' and checkbox='s'");
       while($registros_itens=mysqli_fetch_array($selecao_itens)){
       $item=$registros_itens['item'];
       
       mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
       $selecao_impacto=mysqli_query($conexao,"select * from tipo_impacto WHERE id='$item' ");
       $registros_impacto=mysqli_fetch_array($selecao_impacto);
       
       $registros_item=$registros_impacto['item'];
       
       if($registros_item=='Operacional/Estratégica'){$registros_item='Op. Estratégica ';}
       
       ?>
       
       
       <div class="col-md-2">
           <label><?php echo $registros_item ?></label>
           
            <input type="hidden" id="titulos[]" name="titulos[]" value="<?php echo $registros_item ?>"> 
            
            <select class="form-control form-cores"  name="residual[]" id="cad-residual-<?php echo $registros_impacto['id']; ?>" onChange="CoresNiveis('cad-residual-<?php echo $registros_impacto['id']; ?>')">
                <option value="0">Escolher</option>
               <option value="1">Baixa</option>
              <option value="2">Média</option>
               <option value="3">Alta</option>
               <option value="4">Muito Alta</option>
           
           </select>
       </div>
       
       
       
       <?php } ?> 
       
         
       
         
       
       
        
       
        <div class="col-md-3">
           <label>Decisão de Tratamento do Risco</label>
           
           <select class="form-control"  name="cad-decisao-residual" id="cad-decisao-residual">
            <option value="0">Escolher</option>
               <?php
    mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$selecao3=mysqli_query($conexao,"select * from medida_tratamento");
while($registros3=mysqli_fetch_array($selecao3)){
?>
           
           
               <option><?php echo $registros3['descricao']?></option>
    <?php } ?>      
           
           </select>
       </div> 
     
       
        <div class="col-md-12 mt-3">
        <input type="submit" class="btn btn-primary" value="Gravar">
    
    </div>
   
    
       </div>
		
		<div class="row ml-4 mr-4">
			<div class="col-md-12">
				
				<table id="example1" class="display table table-striped" style="width: 100%">
					<tr>
						<th>Probabilidade</th>
						<th>Impacto(Consequência)</th>
						<th>Nível do Risco</th>
						<th>Decisão de Tratamento do Risco</th>
						
					</tr>
					
				<?php
					$selecao22=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
					while($registros22=mysqli_fetch_array($selecao22)){
					?>
					
					<tr>
						<td><?php echo $registros22['probabilidade'] ?></td>
						<td><?php echo $registros22['impacto'] ?></td>
						<td><?php echo $registros22['nivel'] ?></td>
						<td><?php echo $registros22['decisao'] ?></td>
					</tr>
					
					
					<?php } ?>
				
				</table>
				
				
			</div>
		
		</div>
    </div>
    
   
    
    </form>
			</div>
			
			<div id="conteudo4">
				<div class="row">
				<div class="col-12">
					<h3>Plano de ação - Workflow de atividades</h3>
						<a class="mb-4 pointer" data-toggle="modal" data-target="#ModalNovoPlanejamento"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Cadastro do Tratamento</a>
					<br><br><br>



	<div id="resposta-tabela"></div>

 			
				
	<div id="carregar-tabela-matriz-de-risco"></div>			
					
				</div>
			</div>
			</div>
			
	

		</div>		
	 </div>		
			

			
			
			
 <!-- Modal -->
<div class="modal fade" id="ModalControles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Controles Existentes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

           <div class="row pl-4 pr-4 ml- mr-4">
           
             
               
                             
              <div class="col-md-6 mb-3">
           <label>Nome do controle</label>
               <input type="text" class="form-control mb-4" name="cad-nome" id="cad-nome"> 
       </div>
       
          <div class="col-md-6 mb-3">
           <label>Objetivo do controle</label>
               <input type="text" class="form-control mb-4" name="cad-objetivo" id="cad-objetivo"> 
       </div>
       
         <div class="col-md-12 mb-3">
           <label>Cadastro de tipo</label>
              <select class="form-control mb-4" name="cadastro-tipo" id="cadastro-tipo">
                  <option>POP - Procedimento Operacional Padrão</option>
                  <option>Fluxograma de atividades</option>
                   <option>Check list </option>
              </select>
       </div>
		</div>	   
			   
	<div class="row pl-4 pr-4 ml- mr-4">		   
       
         <div class="col-md-4 mb-4">
           <label>Natureza do controle</label>
	
			 
               <input type="radio" id="cad-natureza" value="Manual" name="cad-natureza"> Manual<br>
                <input type="radio" id="cad-natureza" value="Automático" name="cad-natureza"> Automático<br>
                <input type="radio" id="cad-natureza" value="Manual dependente de TI" name="cad-natureza"> Manual dependente de TI 
<br>
       </div>
       
      <div class="col-md-4 mb-4">
           <label>Frequência da execução do controle</label>
		  
		  <select id="cad-frequencia" name="cad-frequencia" class="form-control">
		  	<option>Diário</option>
			  <option>Semanal</option>
			  <option>Quinzenal</option>
			  <option>Mensal</option>
			  <option>Bimestral</option>
			  <option>Trimestral</option>
			  <option>Semestral</option>
			  <option>Anual</option>
			  <option>Bienal</option>
			  <option>Trienal</option>
		  </select>
		  
             
       </div>
       
              <div class="col-md-4 mb-4">
           <label>Tipo de controle 
</label>
               <input type="radio" id="cad-tipo-controle" name="cad-tipo-controle" value="Preventivo (impede que os erros
antes da execução ou registro)"> Preventivo (impedem os erros antes da execução ou registro)
<br>
                <input type="radio" id="cad-tipo-controle" name="cad-tipo-controle" value="Detectivo (expõem os erros após
o registro)"> Detectivo (expõem os erros após
o registro)<br>
                
<br>
       </div>
           
           <div class="col-md-12  mb-4">
               <h3 class="mb-3">Análise Crítica</h3>
           </div>
          
            <div class="col-md-4 mb-5">
            
            
           <label>Método de avaliação</label>
           <select class="form-control" name="cad-metodo-avaliacao" id="cad-metodo-avaliacao">
			   <option value="Não informado">Escolher</option>
			    <option>Acompanhamento</option>
			    <option>Amostragem</option>
			   <option>Procedimento Analítico</option>
			    <option>Entrevista</option>
               <option>Inspeção no local</option>
			   <option>Observação</option>
			   <option>Outro</option>
           </select>
       </div>
       
        <div class="col-md-4 mb-5">
           <label>Responsável</label>
           <select class="form-control" name="cad-responsavel" id="cad-responsavel">
               <option>Fulano</option>
           </select>
       </div>
       
        <div class="col-md-4 mb-5">
           <label>Data da avaliação</label>
           <input type="text" class="form-control datepicker" name="cad-data-avaliacao" id="cad-data-avaliacao">
       </div>
       
          <div class="col-md-8 mb-4">
           <label>Resultado da avaliação(Comentar ou recomendar)</label>
           <input type="text" class="form-control" name="cad-resultado-avaliacao" id="cad-resultado-avaliacao">
       </div>
       
        <div class="col-md-4 mb-4">
           <label>Evidência objetiva</label>
           <input type="file" class="form-control" name="arquivos" id="arquivos">
       </div>
       
       <div class="col-md-4" >
               <label>Parecer</label>
               <select class="form-control" id="cad-parecer-avaliacao">
				   <option value="Sem Resposta">Escolher</option>
                   <option>Eficaz</option>
                   <option>Ineficaz</option>
               </select>
           </div>
       
       
       </div>
         
          <div class="col-md-12 ml-2 mt-4">
            <input type="button" value="Adicionar Controle" class="btn btn-primary float-right" onClick="AdicionarItens()" data-dismiss="modal">
        
        </div>
           
           
        </div>  
        
        
       
        
      
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>	
			
			
			
<!-- Modal Novo Planejamento -->
<div class="modal fade" id="ModalNovoPlanejamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999999999999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Tratamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		  
		<div class="row ml-4 mr-4 mt-4 mb-4">		
		
    <div class="col-md-2 mb-4">
		<label>N°Registro</label>
        <?php
        $selecao_workflow=mysqli_query($conexao,"select * from workflow order by id DESC");
        $registros_workflow=mysqli_fetch_array($selecao_workflow);
        ?>
		<input type="text" name="cad-numero-registro" id="cad-numero-registro" class="form-control" readonly value="<?php echo $registros_workflow['id']+1 ?>">
	</div>    
        
			
	<div class="col-md-6 mb-4">
		<label>Título</label>
		<input type="text" name="cad-titulo" id="cad-titulo" class="form-control" required value="<?php echo $evento_risco ?>" readonly>
	</div>
	
	<div class="col-md-4 mb-4">
		<label>Prioridade</label>
		
		<select name="cad-prioridade" id="cad-prioridade" class="form-control" >
			<option>Baixa</option>
			<option>Média</option>
			<option>Alta</option>
		</select>
	</div>
	
	<div class="col-md-2 mb-4">
		<label>Data Inicio</label>
		<input type="text" name="cad-data-inicio" id="cad-data-inicio" class="form-control" required autocomplete="off" readonly value="<?php echo date('d-m-Y') ?>">
	</div>	
	
	<div class="col-md-3 mb-4">
		<label>Previsão Entrega</label>
		<input type="text" name="cad-data-vencimento" id="cad-data-vencimento" class="form-control datepicker" required autocomplete="off">
	</div>	
	
    
	
	<div class="col-md-12">
		<label>Descrição(Área Editável)</label>
		<textarea class="form-control" cols="5" rows="7" name="cad-descricao" id="cad-descricao"><?php if($origem!=''){ ?>Origem: <?php echo $origem ?> <?php } ?>
			
<?php if($area!=''){ ?>Área: <?php echo $area ?> <?php } ?>
			

		</textarea>
	</div>	
	
	<div class="col-md-12 mt-4">
		<input type="button" class="btn btn-primary" value="Cadastrar Tratamento" onClick="CadastrarTratamento()">
	</div>	
					
</div>	  
		  
		  
		  
		  
		  
		  
		  
      </div>
      
    </div>
  </div>
</div>			
			
			
			
<!-- Modal Adicionar Controle -->
<div class="modal fade" id="ModalAdicionarControle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloAdicionarControle">
		</h5> 
		  
		  <!-------Obter Setor------------->
			<input type="hidden" id="obter-setor">
		  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form>      
		<div class="row mb-4 ml-4 mr-4"> 
       
       
      
        <div class="col-md-6 mb-4">
               <label>Causa <span onClick="AddCausa()">(<span class="pointer" style="font-size: 15px; color:cornflowerblue">Adicionar Nova Causa</span>)</span> <span class="float-right" onClick="RemoverCausa()"><i class="fa fa-trash" style="cursor: pointer"></i></span></label>
				
			<div id="carregar-esc-causa"></div>
			
               <input type="text" class="form-control  add-causa mt-3" name="cad-causa" id="cad-causa" autocomplete="off">
				<input type="button" value="Adicionar Nova Causa" class="btn btn-primary  add-causa mt-3" onClick="GravarCausa()">
			
           </div>
           
               <div class="col-md-6 mb-4 pos-causa">
               <label>Controle</label>
               <select class="form-control" name="esc-controle" id="esc-controle" onChange="Controle()" >
				   <option value="0">Escolher</option>
                   <option value="sim">Sim</option>
                   <option value="Não">Não</option>
               </select>
           </div>
           
			<div class="col-md-6 mb-4 pos-causa">
               <label class="esc-listar">Listar</label>
             <select class="form-control esc-listar" name="esc-listar" id="esc-listar" onChange="VerificarControle()">
				 <option value="0">Escolher</option>
                   <?php
            mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from controles_existentes_temp");
				while($registros=mysqli_fetch_array($selecao)){
			?>
            <option value="<?php echo $registros['id'] ?>"><?php echo $registros['nome_controle'] ?></option>
			
			<?php } ?>
                   
                   
                   
               </select>
           </div>
          
              <div class="col-md-6 pos-causa">
               <label class="esc-parecer">Parecer</label>
               <input type="text" class="form-control esc-parecer" name="esc-parecer" id="esc-parecer" readonly>
           </div>
           
            
           
           <div class="col-md-12 mt-3 mb-4 pos-causa" >
           <input type="button" value="Adicionar" class="btn btn-primary mt-2 esc-listar" onClick="AdicionarControleTabela()">
			<input type="reset" value="Limpar" class="btn btn-danger mt-2 esc-listar" id="btn1-limpar">   
           </div>
			
	 <div class="col-md-12 mt-3 mb-4 pos-causa ">		
		<div id="carregar-tabela-causas" class="esc-listar"></div>		
	</div>  		
			
	<div class="col-md-12 pos-causa ">
			           <div class="col-md-12 mt-3 mb-4">
           <input type="button" value="Enviar para Aprovação" class="btn btn-primary mt-2 float-right" onClick="BtnGravar()">
           </div>
	</div>		
			
         
           </div>  
		  </form>  
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>	
			
			
			
			
<!-- Modal Adicionar Controle -->
<div class="modal fade" id="ModalEditarControles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloEditarControle">
		</h5> 
		  
		
		  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
        
		<div id="resposta-editar-controle"></div>
           
           
        </div>  
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>		
			
			
			
			
			
			
			
<script src="bibliotecas/jquery/jquery.min.js"></script>
<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>				
	
<script>
$y=jQuery.noConflict()
	$y(document).ready(function() {
    $y('#tabela-comites').DataTable();
	$y('#example1').DataTable();	
	$y('#example2').DataTable();		
} );
		
		
		
	$y("#tabela-comites").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            })   
	
		$y("#example1").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            }) 
	
	
	
		$y("#example2").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            }) 
			
</script>			
			
			
			
			
			
<script>
$g=jQuery.noConflict()		
		
	function Abas(codigo){

if(codigo==1){

$g('#btn1').addClass('btn-primary')

$g('#btn2').removeClass('btn-primary')
$g('#btn3').removeClass('btn-primary')
$g('#btn4').removeClass('btn-primary')
$g('#btn5').removeClass('btn-primary')

$g('#conteudo1').show()
$g('#conteudo2').hide()
$g('#conteudo3').hide()
$g('#conteudo4').hide()
$g('#conteudo5').hide()

}

if(codigo==2){

$g('#conteudo2').show()
$g('#conteudo1').hide()
$g('#conteudo3').hide()
$g('#conteudo4').hide()
$g('#conteudo5').hide()

$g('#btn2').removeClass('btn-light')
$g('#btn2').addClass('btn-primary')

$g('#btn1').removeClass('btn-primary')
$g('#btn3').removeClass('btn-primary')
$g('#btn4').removeClass('btn-primary')
$g('#btn5').removeClass('btn-primary')

}

if(codigo==3){

$g('#conteudo3').show()
$g('#conteudo1').hide()
$g('#conteudo2').hide()
$g('#conteudo4').hide()
$g('#conteudo5').hide()

$g('#btn3').removeClass('btn-light')
$g('#btn3').addClass('btn-primary')

$g('#btn1').removeClass('btn-primary')
$g('#btn2').removeClass('btn-primary')
$g('#btn4').removeClass('btn-primary')
$g('#btn5').removeClass('btn-primary')

}


if(codigo==4){

$g('#conteudo4').show()
$g('#conteudo1').hide()
$g('#conteudo2').hide()
$g('#conteudo3').hide()
$g('#conteudo5').hide()

$g('#btn4').removeClass('btn-light')
$g('#btn4').addClass('btn-primary')

$g('#btn1').removeClass('btn-primary')
$g('#btn2').removeClass('btn-primary')
$g('#btn3').removeClass('btn-primary')
$g('#btn5').removeClass('btn-primary')

}

if(codigo==5){

$g('#conteudo5').show()
$g('#conteudo1').hide()
$g('#conteudo2').hide()
$g('#conteudo3').hide()
$g('#conteudo4').hide()

$g('#btn5').removeClass('btn-light')
$g('#btn5').addClass('btn-primary')

$g('#btn1').removeClass('btn-primary')
$g('#btn2').removeClass('btn-primary')
$g('#btn3').removeClass('btn-primary')
$g('#btn4').removeClass('btn-primary')

}

}
	

$g(document).ready(function(){ 

$g('#conteudo2').hide()
$g('#conteudo3').hide()
$g('#conteudo4').hide()
$g('#conteudo5').hide()

$g("#sanfona-conteudo1").hide()
$g("#sanfona-conteudo2").hide()
$g("#sanfona-conteudo3").hide()
$g("#sanfona-conteudo4").hide()
$g("#sanfona-conteudo5").hide()
$g("#sanfona-conteudo6").hide()

$g("#baixo1").hide()


 CarregarMatriz()  
CarregarTabelaControlesExistentes()
	
	
	
})
		
		
		
	$g(document).ready(function() {
    $g('#example').DataTable();
	$g('#tabela_causas').DataTable();	
	
} );
		
		
		
	$g("#example").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            }) 
	
		
	function LoadTabelaCausas(){
		
		$g("#tabela_causas").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            })  
		
	}
	
	
function AdicionarItens(){

var nome = $g('#cad-nome').val()
var objetivo = $g('#cad-objetivo').val()
var cadastro = $g('#cadastro-tipo').val()
var metodo = $g('#cad-metodo-avaliacao').val()
var responsavel = $g('#cad-responsavel').val()
var data_avaliacao = $g('#cad-data-avaliacao').val()
var resultado = $g('#cad-resultado-avaliacao').val()
var parecer = $g('#cad-parecer-avaliacao').val()
var natureza = $g('#cad-natureza').val()
var frequencia = $g('#cad-frequencia').val()
var controle = $g('#cad-tipo-controle').val()


	 $g.ajax({
		  type: 'post',
		  data: 'nome='+nome+'&objetivo='+objetivo+'&cadastro='+cadastro+'&metodo='+metodo+'&responsavel='+responsavel+'data='+data_avaliacao+'&resultado='+resultado+'&natureza='+natureza+'&frequencia='+frequencia+'&controle='+controle+'&codigo=<?php echo $codigo_matriz; ?>'+'&parecer='+parecer,
		  url:'funcoes/gravar-itens-controles-existentes.php',
		  success: function(retorno){
		 CarregarTabelaControlesExistentes()
			
      }
       })	
}	
	
	
function CarregarTabelaControlesExistentes(){


	
 $g.ajax({
		  type: 'post',
		  data: 'codigo=<?php echo $codigo_matriz; ?>',
		  url:'tabela-controles-existentes.php',
		  success: function(retorno){
		  $g('#carregar-tabela-controles-existentes').html(retorno);  
		 	 
		
      }
       })		
	
	
	
}	
	
	
$g(document).ready(function(){ 
	 CarregarTabelaControlesExistentes()
	CarregarTabelaMatrizDeRiscos()
$g('#conteudo2').hide()
$g('#conteudo3').hide()
$g('#conteudo4').hide()
$g('#conteudo5').hide()

$g("#sanfona-conteudo1").hide()
$g("#sanfona-conteudo2").hide()
$g("#sanfona-conteudo3").hide()
$g("#sanfona-conteudo4").hide()
$g("#sanfona-conteudo5").hide()
$g("#sanfona-conteudo6").hide()

$g("#baixo1").hide()


 CarregarMatriz()  
 CarregarTabelaCausas()
CarregarIshikawa('Método')	
CarregarIshikawa2('Medidas')	
CarregarIshikawa3('Mão de Obra')
CarregarIshikawa4('Máquina')	
CarregarIshikawa5('Meio Ambiente')	
CarregarIshikawa6('Materiais')	
	
})	
	
function ExcluirControlesExistentes(codigo){
	if (window.confirm("Você deseja excluir o Controle?")) {
	
 $g.ajax({
		  type: 'post',
		  data: 'codigo='+codigo,
		  url:'funcoes/excluir-controles-existentes-temp.php',
		  success: function(retorno){
		  $g('#resposta-matriz').html(retorno);  
		 	 
			 CarregarTabelaControlesExistentes()
      }
       })	

}}
	
function AbrirSanfona(codigo){

$g('#sanfona-conteudo'+codigo).toggle()

}	
	
	
function ModalAdicionarControle(titulo){
	$g('.pos-causa').hide()	
	$g('#TituloAdicionarControle').html(titulo)
	$g('#obter-setor').val(titulo)
	$g('#ModalAdicionarControle').modal('show');
	CarregarEscCausas()
	
}		
	

function Calcular(){

var probabilidade = $g("#cad-probabilidade-avaliacao option:selected").val()
var impacto = $g("#cad-impacto-avaliacao option:selected").val()

if(probabilidade==0 || impacto ==0 ){
	
	$g('#cad-nivel-do-risco-inerente').val('')
	$g('#cad-nivel-do-risco-inerente').css("background-color","#fff")
	
}else{


var calcular = (probabilidade * impacto) 

var resultado = ''
var cor = ''

if(calcular<=15){resultado='Aceitável'; cor ='#41841E' }
if(calcular >=15 && calcular <= 34  ){resultado='Significativo'; cor ='#F2E70A'}
if(calcular >=34 && calcular <= 85  ){resultado='Sério'; cor ='#E58C2C'}
if(calcular >=85 && calcular <= 200  ){resultado='Inaceitável'; cor ='#FF0000'}

$g('#cad-nivel-do-risco-inerente').val(resultado)
$g('#cad-nivel-do-risco-inerente').css("background-color",cor)
}

}

function Calcular2(){

var probabilidade = $g("#cad-probabilidade-residual option:selected").val()
var impacto = $g("#cad-impacto-residual option:selected").val()

if(probabilidade==0 || impacto ==0 ){
	$g('#cad-nivel-do-risco-residual').val('') 
	$g('#cad-nivel-do-risco-residual').css("background-color","#fff")


}else{

var calcular = (probabilidade * impacto) 

var resultado = ''
var cor = ''

if(calcular<=15){resultado='Aceitável'; cor ='#41841E' }
if(calcular >=15 && calcular <= 34  ){resultado='Significativo'; cor ='#F2E70A'}
if(calcular >=34 && calcular <= 85  ){resultado='Sério'; cor ='#E58C2C'}
if(calcular >=85 && calcular <= 200  ){resultado='Inaceitável'; cor ='#FF0000'}

$g('#cad-nivel-do-risco-residual').val(resultado)
$g('#cad-nivel-do-risco-residual').css("background-color",cor)


}}


function CoresNiveis(campo){
var nivel = $g("#"+campo).val()
var cor = '';

if(nivel=='1'){cor='#41841E'}
if(nivel=='2'){cor='#F2E70A'}
if(nivel=='3'){cor='#E58C2C'}
if(nivel=='4'){cor='#FF0000'}

campo = $g('#'+campo).css("background-color",cor)



}
	
function CarregarMatriz(){

$g('#carregar-matriz').load("funcoes/carrega-matriz.php")

}	
	
	
 $g(".datepicker").datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
}); 
		  
		  
  $g(function() {
    $g(".datepicker").datepicker();
  } );	
	
	
function VerificarControle(){
	var listar = $g("#esc-listar option:selected").val()

	
	if(listar!=0){
	 $g.ajax({
		  type: 'post',
		  data: 'codigo='+listar,
		  url:'funcoes/verificar-listar-controle.php',
		  success: function(retorno){
		  $g('#esc-parecer').val(retorno);  		 	 
		
      }
       })	
		
		
	}
}	
	
	
function AdicionarControleTabela(setor){
	
	var controle = $g("#esc-listar option:selected").val()
	var parecer = $g("#esc-parecer").val()
	var causa = $g("#esc-causa").val()
	var setor= $g("#obter-setor").val()
	
	 $g.ajax({
		  type: 'post',
		  data: 'controle='+controle+'&parecer='+parecer+'&codigo_matriz=<?php echo $_REQUEST['cod'] ?>&codigo_causa='+causa+'&setor='+setor,
		  url:'funcoes/gravar-listar-parecer.php',
		  success: function(retorno){		 	 
		CarregarTabelaCausas()
			
			   
      }
       })	
}	
	
	
	
function CarregarTabelaCausas(){
	var causa = $g('#esc-causa').val()
	
	 $g.ajax({
		  type: 'post',
		  data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&codigo_causa='+causa,
		  url:'funcoes/carregar-tabela-causas.php',
		  success: function(retorno){		 	 
		  $g('#carregar-tabela-causas').html(retorno)
			  LoadTabelaCausas()
      }
       })
}	
	
function CarregarEscCausas(){
	var setor= $g('#obter-setor').val()
	
	 $g.ajax({
		  type: 'post',
		  data: 'setor='+setor,
		  url:'funcoes/carrega-esc-causa.php',
		  success: function(retorno){		 	 
		  $g('#carregar-esc-causa').html(retorno)
      }
       })
}		
	
	
	
function ExcluirTabelaCausas(codigo){
 if(window.confirm("Tem certeza que deseja excluir?")) {	
$g.ajax({
		  type: 'post',
		  data: 'codigo='+codigo,
		  url:'funcoes/excluir-tabela-causas-temp.php',
		  success: function(retorno){
		CarregarTabelaCausas()
      }
       })	

}}
	

function ExcluirCausa(codigo){
 if(window.confirm("Tem certeza que deseja excluir?")) {	
$g.ajax({
		  type: 'post',
		  data: 'codigo='+codigo,
		  url:'funcoes/excluir-causa.php',
		  success: function(retorno){
			  
			  CarregarIshikawa('Método')	
CarregarIshikawa2('Medidas')	
CarregarIshikawa3('Mão de Obra')
CarregarIshikawa4('Máquina')	
CarregarIshikawa5('Meio Ambiente')	
CarregarIshikawa6('Materiais')	
		
      }
       })		
	
	
}}	
	
	function RemoverCausa(){
		var codigo = $g("#esc-causa option:selected").val()
			if (window.confirm("Você deseja excluir a Causa?")) {

	  $g.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/remover-causa.php',
			  success: function(retorno){
				 $g('.close').trigger("click")
			  
		  }
		   })  	
}
		
	}
		
	
	function AddCausa(){
	$g(".add-causa").toggle()	
		
	}
	
	function GravarCausa(){
		var causa=$g('#cad-causa').val()	
		var setor =$g('#obter-setor').val()
		
		$g.ajax({
		  type: 'post',
		  data: 'causa='+causa+'&setor='+setor,
		  url:'funcoes/gravar-causa.php',
		  success: function(retorno){
		$g(".add-causa").hide()
		CarregarEscCausas()	  
      }
       })
	}
	
	
	function EscolhendoCausa(){
		var causa = $g('#esc-causa option:selected').val()
		if(causa!=0){
			$g('.pos-causa').show()
			CarregarTabelaCausas()
		}else{
			$g('.pos-causa').hide()			
		}
	}
	
	function BtnGravar(){
		$g('.close').trigger("click")
		CarregarIshikawa('Método')	
CarregarIshikawa2('Medidas')	
CarregarIshikawa3('Mão de Obra')
CarregarIshikawa4('Máquina')	
CarregarIshikawa5('Meio Ambiente')	
CarregarIshikawa6('Materiais')	
		
	}
	
	
	function CarregarIshikawa(setor){
		$g.ajax({
		  type: 'post',
		  data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&setor='+setor,
		  url:'funcoes/carregar-ishikawa.php',
		  success: function(retorno){		 	 
		  $g('#carregar-ishikawa').html(retorno)
			
      }
       })
	}
	
		function CarregarIshikawa2(setor){
		$g.ajax({
		  type: 'post',
		  data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&setor='+setor,
		  url:'funcoes/carregar-ishikawa.php',
		  success: function(retorno){		 	 
		  $g('#carregar-ishikawa2').html(retorno)
      }
       })
	}
	
		function CarregarIshikawa3(setor){
		$g.ajax({
		  type: 'post',
		  data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&setor='+setor,
		  url:'funcoes/carregar-ishikawa.php',
		  success: function(retorno){		 	 
		  $g('#carregar-ishikawa3').html(retorno)
      }
       })
	}
	
		function CarregarIshikawa4(setor){
		$g.ajax({
		  type: 'post',
		  data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&setor='+setor,
		  url:'funcoes/carregar-ishikawa.php',
		  success: function(retorno){		 	 
		  $g('#carregar-ishikawa4').html(retorno)
      }
       })
	}
	
		function CarregarIshikawa5(setor){
		$g.ajax({
		  type: 'post',
		  data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&setor='+setor,
		  url:'funcoes/carregar-ishikawa.php',
		  success: function(retorno){		 	 
		  $g('#carregar-ishikawa5').html(retorno)
      }
       })
	}
	
		function CarregarIshikawa6(setor){
		$g.ajax({
		  type: 'post',
		  data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&setor='+setor,
		  url:'funcoes/carregar-ishikawa.php',
		  success: function(retorno){		 	 
		  $g('#carregar-ishikawa6').html(retorno)
      }
       })
	}
	
	function Controle(){
		var controle = $g('#esc-controle option:selected').val()

		if(controle=='sim'){
			$g('.esc-listar').show()
			$g('.esc-parecer').show()
		}
		
		if(controle=='Não'){
			$g('.esc-listar').hide()
			$g('.esc-parecer').hide()
		}
		
	}
	
	
	 function Popover(id){
  $g('#popover'+id).popover('show')

 }
	 function Popover2(id){
  $g('#popover'+id).popover('hide')

 }	
	
	
	
function CadastrarTratamento(){
	
	var inicio = $g('#cad-data-inicio').val()
	var vencimento = $g('#cad-data-vencimento').val()
	var descricao = $g('#cad-descricao').val()
	var prioridade = $g('#cad-prioridade option:selected').val()
	var titulo = $g('#cad-titulo').val()
	
		$g.ajax({
		  type: 'post',
		  data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&inicio='+inicio+'&vencimento='+vencimento+'&descricao='+descricao+'&prioridade='+prioridade+'&titulo='+titulo,
		  url:'funcoes/gravar-tratamento-matriz-risco.php',
		  success: function(retorno){		 	 
		  $g(".close").trigger('click')
			   CarregarTabelaMatrizDeRiscos()
      }
       })
	
}
	
	
	
function CarregarTabelaMatrizDeRiscos(){

	
	$g.ajax({
		  type: 'post',
		  data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&usuario=<?php echo $id_usuario ?>',
		  url:'funcoes/carregar-tabela-matriz-de-risco.php',
		  success: function(retorno){		 	 
		  $g('#carregar-tabela-matriz-de-risco').html(retorno)
      }
       })
}	
	
	
	function Excluir(variavel){
	  if (window.confirm("Tem certeza que deseja excluir?")) {
      
			  $g.ajax({
			  type: 'post',
			  data: 'codigo='+variavel,
			  url:'funcoes/excluir-workflow.php',
			  success: function(retorno){
			 CarregarTabelaMatrizDeRiscos()
				 
		  }
		   })  
		  
		  
		  
   }
				
			}	
	
	
	function SalvarEfeito(tipo){
		
		if(tipo=='Método'){
			
			var efeito = $g('#cad-efeito1').val()
		}
		
		if(tipo=='Medidas'){
			
			var efeito = $g('#cad-efeito2').val()
		}
		
		if(tipo=='Mão de Obra'){
			
			var efeito = $g('#cad-efeito3').val()
		}
		
		if(tipo=='Máquina'){
			
			var efeito = $g('#cad-efeito4').val()
		}
		
		if(tipo=='Meio Ambiente'){
			
			var efeito = $g('#cad-efeito5').val()
		}
		
		if(tipo=='Materiais'){
			
			var efeito = $g('#cad-efeito6').val()
		}
		
		
			  $g.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo_matriz  ?>&efeito='+efeito+'&tipo='+tipo,
			  url:'funcoes/gravar-efeito-ishikawa.php',
			  success: function(retorno){
				 
		  }
		   })  
		
	}
	
	
	function EditarControlesExistentes(codigo){
		
			  $g.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/carregar-editar-controles.php',
			  success: function(retorno){
				$g("#resposta-editar-controle").html(retorno) 
		  }
		   })  
	}
	
	
	function AtualizarItens(codigo){
		
var nome = $g('#alt-nome').val()
var objetivo = $g('#alt-objetivo').val()
var cadastro = $g('#alt-tipo').val()
var metodo = $g('#alt-metodo-avaliacao').val()
var responsavel = $g('#alt-responsavel').val()
var data_avaliacao = $g('#alt-data-avaliacao').val()
var resultado = $g('#alt-resultado-avaliacao').val()
var parecer = $g('#alt-parecer-avaliacao').val()
var natureza = $g('#alt-natureza').val()
var frequencia = $g('#alt-frequencia').val()
var controle = $g('#alt-tipo-controle').val()


	 $g.ajax({
		  type: 'post',
		  data:'codigo='+codigo+ '&nome='+nome+'&objetivo='+objetivo+'&cadastro='+cadastro+'&metodo='+metodo+'&responsavel='+responsavel+'&data='+data_avaliacao+'&resultado='+resultado+'&natureza='+natureza+'&frequencia='+frequencia+'&controle='+controle+'&parecer='+parecer,
		  url:'funcoes/atualizar-itens-controles-existentes.php',
		  success: function(retorno){ 
		 CarregarTabelaControlesExistentes()
			
      }
       })		
		
		
	}
	
	function AtualizarrArea(){
	var novaarea= $g("#cad-area-nova option:selected").val()
	
	 $g.ajax({
		  type: 'post',
		  data:'codigo=<?php echo $codigo_matriz ?>&area='+novaarea ,
		  url:'funcoes/atualizar-area-nova-matriz.php',
		  success: function(retorno){ 
		 location.reload()
			
      }
       })		
	}
	
</script>			
			
	<script>
	$rodape=jQuery.noConflict()
	function AtivarLink(){
		$rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
		$rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight','bold')
		
	}
	AtivarLink()
</script> 				
			