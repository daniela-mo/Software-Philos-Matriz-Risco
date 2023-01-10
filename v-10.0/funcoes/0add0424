<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard M2V</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
	<link rel="shortcut icon" href="imgs/favicon.fw.png" />
</head>
	
	
	
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
         <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn5" onClick="Abas(5)" value="Monitoramento">

    </div>
    </div>  
    
    <?php
     mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
        $selecao=mysqli_query($conexao,"select * from identificacao_do_risco WHERE id='$codigo'");
        $registros=mysqli_fetch_array($selecao); 
        $classifi=$registros['classificacao_risco'] 
    ?>
    
    
    <div class="row ml-4 mr-4">
    <div class="col-md-12">
    
   
            
     <div id="conteudo1">
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
           <label>Data id Risco</label>
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
           <label>Tipo Risco</label>
           <input type="text" name="cad-tipo-risco" id="cad-tipo-risco"  class="form-control" value="<?php echo $registros['tipo_risco'] ?>" readonly>
        </div>
        
          <div class="col-md-3 mb-4">
			<label>Área</label>
				<input type="text" name="cad-area-risco" id="cad-area-risco" value="<?php echo $registros['area'] ?>" class="form-control" readonly>
		</div>
        
        
<div class="col-md-3 mb-4">
<label>Processo</label>
           <input type="text" name="cad-processo" id="cad-processo"  class="form-control" value="<?php echo $registros['processo'] ?>" readonly >
        </div>
        
         <div class="col-md-3 mb-4">
           <label>Risco OEA?</label>
           <input type="text" value="<?php echo $registros['item_oea'] ?>" class="form-control" readonly>
        </div>
        
        
        
   </div>     
       
<div class="row mr-4">
        
         <div class="col-md-4">
			
			<h5 class="mt-4 mb-3"><strong>Demais áreas impactadas pelo risco</strong></h5>
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
      
        <div class="col-md-3 mb-4">
          <label>Risco OEA?</label>
          <input type="text" class="form-control" name="cad-item-oea" id="cad-item-oea" value="<?php echo $registros['item_oea'] ?>" readonly>
      </div>
      
      
      
      <div class="col-md-12 mt-3 mb-3">
      
      
      <h4 class="mb-4 mt-4"> <strong>Controles existentes</strong> <a data-toggle="modal" data-target="#ModalControles" class="pointer">+</a></h4>
      
      
      <div id="carregar-tabela-controles-existentes">
      </div>
      
      
       <h4 class="mb-4 mt-5"> <strong>Causa e Efeito - Diagrama de Ishikawa ou Causa & Efeito (6Ms)</strong> </h4>
       
<!-------------MÉTODO------------>      
      <div id="sanfona1" class="pointer" onClick="AbrirSanfona(1)" >
      <h4 class="cursor"><strong >Método</strong> 
	  </h4>
           
      </div>
      
      <div id="sanfona-conteudo1" class="p-4 mb-5">
         <div class="row mb-4"> 
      
	<div class="col-md-12 mb-3 float-right">
	<input type="button" class="btn btn-primary float-right " value="Adicionar Método" onClick="ModalAdicionarControle('Método')"> 
	</div>			 
			 
			 
         <table class="table table-striped mt-2">
            <tr>
                <th>Causa</th>
                <th>Controle</th>
                <th></th>
            </tr>
        
        <?php
        $selecao_tabela=mysqli_query($conexao,"select * from tabela_causa_controle");
        while($registros_tabela=mysqli_fetch_array($selecao_tabela)){
        ?>
        
        <tr>
            <td><?php echo $registros_tabela['causa'] ?></td>
            <td><?php echo $registros_tabela['controle'] ?></td>

            <td><a class="pointer_red" style="color:red" onClick="ExcluirTabelaRequisito(<?php echo $registros_tabela['id'] ?>)">X</a></td>
        </tr>
        
        <?php } ?>
            
        </table>     
           
               
           
           
          
             
              
           
               
           
           </div>
      </div>
      

  
      
    </div>
     <div style="height: 150px"></div>
	</div>
    <!-------------------Final Conteúdo 2 ------------->
    
    
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
      
        <div class="col-md-2">
          <label>Risco OEA?</label>
          <input type="text" class="form-control" name="cad-oea" id="cad-oea"  value="<?php echo $registros['item_oea'] ?>" readonly>
      </div>
      
        
    </div>
    
    <div class="col-md-12 mt-5">
            <h4>Avaliação de Risco Inerente</h4>
        </div>
    <div style="overflow: auto">
    <div class="row pl-4 pr-4 pt-4 pb-5" style="width: 1900px">
    
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

if($num==1){ ?>

 <div class="col-md-2">
    <label>Probabilidade</label>
    <input type="text" class="form-control" value="<?php echo $exibir_probabilidade ?>" readonly>
 </div>
 
  <div class="col-md-2">
     <label>Impacto(Consequência)</label>
    <input type="text" class="form-control" value="<?php echo $exibir_impacto ?>" readonly>
 </div>
 
 <div class="col-md-2">
     <label>Nível do Risco</label>
    <input type="text" class="form-control" value="<?php echo $registros_avaliacao['nivel']; ?>" readonly>
 </div>
 
 
 <?php
       
      
       
       mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
      
      $selecao_itens2=mysqli_query($conexao,"select * from tabela_avaliacao_risco_inerente");
      while($registros_inerente=mysqli_fetch_array($selecao_itens2)){  
       $itens_t=$registros_inerente['item'];
      if($itens_t=='1'){$itens_t='Baixa'; $cor='#41841E';}
       if($itens_t=='2'){$itens_t='Média';$cor='#F2E70A';}
        if($itens_t=='3'){$itens_t='Alta';$cor='#E58C2C';}
         if($itens_t=='4'){$itens_t='Muito Alta';$cor='#FF0000';}
  
  
    
       ?>
       
       
       <div class="col-md-1">
           <label><?php echo $registros_inerente['titulo'] ?></label>
           
          <input type="text" class="form-control" value="<?php echo $itens_t ?>" readonly style="background-color: <?php echo $cor ?>">
           
       </div>
       
       
       
       <?php }?>



<?php 
}else{
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
       
       <div class="col-md-2">
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
       
         
       
        
       
       
        <div class="col-md-2">
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
       
       <?php
        $verificar_cadastro=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
        $numeros_inerente=mysqli_num_rows($verificar_cadastro);
        
        if($numeros_inerente==0){
       ?>
       
        <div class="col-md-12 mt-3">
        <input type="submit" class="btn btn-primary" value="Gravar">
    
    </div>
    <?php }}  ?>
    
    
    
    
       </div>
    </div>
</form>    
   
<form action="processa-gravar-avaliacao-risco-residual.php" method="post"> 
 <input type="hidden" name="codigo-matriz-de-risco" id="codigo-matriz-de-risco" value="<?php echo $codigo ?>">
    <input type="hidden" name="classificacao-risco" id="classificacao-risco" value=" <?php echo $classifi=$registros['classificacao_risco'] ?>">
    <div class="col-md-12 mt-5">
            <h4>Avaliação De Risco Residual
</h4>
        </div>
    <div style="overflow: auto">
    <div class="row pl-4 pr-4 pt-4 pb-4" style="width: 1900px">
    
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

if($num==1){ ?>

 <div class="col-md-2">
    <label>Probabilidade</label>
    <input type="text" class="form-control" value="<?php echo $exibir_probabilidade ?>" readonly>
 </div>
 
  <div class="col-md-2">
     <label>Impacto(Consequência)</label>
    <input type="text" class="form-control" value="<?php echo $exibir_impacto ?>" readonly>
 </div>
 
 <div class="col-md-2">
     <label>Nível do Risco</label>
    <input type="text" class="form-control" value="<?php echo $registros_avaliacao['nivel']; ?>" readonly>
 </div>
 
 
 <?php
       
      
       
       mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
      
      $selecao_itens2=mysqli_query($conexao,"select * from tabela_avaliacao_risco_residual");
      while($registros_inerente=mysqli_fetch_array($selecao_itens2)){  
       $itens_t=$registros_inerente['item'];
     if($itens_t=='1'){$itens_t='Baixa'; $cor='#41841E';}
       if($itens_t=='2'){$itens_t='Média';$cor='#F2E70A';}
        if($itens_t=='3'){$itens_t='Alta';$cor='#E58C2C';}
         if($itens_t=='4'){$itens_t='Muito Alta';$cor='#FF0000';}
      
       ?>
       
       
       <div class="col-md-1">
           <label><?php echo $registros_inerente['titulo'] ?></label>
           
          <input type="text" class="form-control" value="<?php echo $itens_t ?>" readonly style="background-color: <?php echo $cor ?>">
           
       </div>
       
       
       
       <?php }?>



<?php 
}else{
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
       
       
       <div class="col-md-1">
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
       
         
       
         
       
       
        
       
        <div class="col-md-2">
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
       
       <?php }
        $verificar_cadastro=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
        $numeros_inerente=mysqli_num_rows($verificar_cadastro);
        
        if($numeros_inerente==0){
       ?>
       
        <div class="col-md-12 mt-3">
        <input type="submit" class="btn btn-primary" value="Gravar">
    
    </div>
    <?php } ?>
    
       </div>
    </div>
    
   
    
    </form>
	</div>
    
    <div id="conteudo4">
    <div class="row">
				<div class="col-12">
	<div id="resposta-tabela"></div>
					
				Teste
 			
				
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Planejamento</th>
                <th>Prioridade</th>
                <th>Inicio</th>
				<th>Término</th>
				<th>Status</th>
                <?php if($tipo=='admin'){ ?><th>Ação</th><?php } ?>
                
            </tr>
        </thead>
        <tbody>
			<?php
			
			if($tipo=='admin'){
			$selecao=mysqli_query($conexao,"select * from workflow WHERE tratamento='Sim'");
			}
			
			if($tipo=='usuario'){
			$selecao2=mysqli_query($conexao,"select * from responsaveis_workflow WHERE codigo_usuario='$codigo_usuario'");
			$registros2=mysqli_fetch_array($selecao2);
			$codigo_workflow=$registros2['codigo_workflow'];	
				
			$selecao=mysqli_query($conexao,"select * from workflow WHERE id='$codigo_workflow'");	
				
			}
			
				while($registros=mysqli_fetch_array($selecao)){
			?>
            <tr>
                <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['planejamento'] ?></a></td>
				
                <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['prioridade'] ?></a></td>
				
                <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['data_inicio'] ?> </a></td>
				
				<td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['data_vencimento'] ?></a></td>
				
				<td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">Aberto</a></td>
				
				 <?php if($tipo=='admin'){ ?>
                <td>
					
					<a class="text-dark" href="" onClick="Duplicar(<?php echo $registros['id']; ?>)">
					<i class="fa fa-folder " style="cursor: pointer"></i></a>
					
					<a class="text-dark" href="" onClick="Excluir(<?php echo $registros['id']; ?>)">
					<i class="fa fa-trash" style="cursor: pointer"></i></a>
				
				
				</td>
               <?php } ?>
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>				
					
				</div>
			</div>
    </div>
    
    
    <div id="conteudo5">
    <div class="row">

<div class="col-md-6">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>



  <div>
    <canvas id="barChart" height="200" style="width:100px"></canvas>
  </div>


<script>
	
	var ctx = document.getElementById("barChart").getContext('2d');

var barChart = new Chart(ctx, {
	

  type: 'bar',
  data: {
    labels: ["Aval. de Risco Inerente"],
    
    
    
    datasets: [
    
    <?php
    
    $selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Aceitável'");    
    $numeros=mysqli_num_rows($selecao);
    while($registros=mysqli_fetch_array($selecao)){
    ?>
    {
      label: 'Aceitável',
      data: [<?php echo $numeros ?>],
      backgroundColor: "#41841E"
    }, 
    <?php } ?>
    
        <?php
    
    $selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Sério'");    
    $numeros=mysqli_num_rows($selecao);
    while($registros=mysqli_fetch_array($selecao)){
    ?>
    {
      label: 'Sério',
      data: [<?php echo $numeros ?>],
      backgroundColor: "#E58C2C"
    }, 
    <?php } ?>
    
      <?php
    
    $selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Significativo'");    
    $numeros=mysqli_num_rows($selecao);
    while($registros=mysqli_fetch_array($selecao)){
    ?>
    {
      label: 'Significativo',
      data: [<?php echo $numeros ?>],
      backgroundColor: "#F2E70A"
    }, 
    <?php } ?>
    
        <?php
    
    $selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Inaceitável'");    
    $numeros=mysqli_num_rows($selecao);
    while($registros=mysqli_fetch_array($selecao)){
    ?>
    {
      label: 'Inaceitável',
      data: [<?php echo $numeros ?>],
      backgroundColor: "#FF0000"
    }, 
    <?php } ?>
    
    ],

},
	
	options: {
		responsive: true,
        legend: {
            display: true,
            position: 'bottom',
			
        },
		
	scales: {
        yAxes: [{ticks: {fontSize: 16, fontFamily: "'Roboto', sans-serif", fontColor: '#000', fontStyle: '600'}}],
        xAxes: [{ticks: {fontSize: 16, fontFamily: "'Roboto', sans-serif", fontColor: '#000', fontStyle: '600'}}]
        }

	
		
    }
});
</script>

    
    </div>
    
    
    <div class="col-md-6">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>



  <div>
    <canvas id="barChart2" height="200" style="width:100px"></canvas>
  </div>


<script>
	
	var ctx = document.getElementById("barChart2").getContext('2d');

var barChart = new Chart(ctx, {
	

  type: 'bar',
  data: {
    labels: ["Aval. de Risco Residual"],
    
    
    
    datasets: [
    
    <?php
    
    $selecao=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE nivel='Aceitável'");    
    $numeros=mysqli_num_rows($selecao);
    while($registros=mysqli_fetch_array($selecao)){
    ?>
    {
      label: 'Aceitável',
      data: [<?php echo $numeros ?>],
      backgroundColor: "#41841E"
    }, 
    <?php } ?>
    
        <?php
    
    $selecao=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE nivel='Sério'");    
    $numeros=mysqli_num_rows($selecao);
    while($registros=mysqli_fetch_array($selecao)){
    ?>
    {
      label: 'Sério',
      data: [<?php echo $numeros ?>],
      backgroundColor: "#E58C2C"
    }, 
    <?php } ?>
    
      <?php
    
    $selecao=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE nivel='Significativo'");    
    $numeros=mysqli_num_rows($selecao);
    while($registros=mysqli_fetch_array($selecao)){
    ?>
    {
      label: 'Significativo',
      data: [<?php echo $numeros ?>],
      backgroundColor: "#F2E70A"
    }, 
    <?php } ?>
    
        <?php
    
    $selecao=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE nivel='Inaceitável'");    
    $numeros=mysqli_num_rows($selecao);
    while($registros=mysqli_fetch_array($selecao)){
    ?>
    {
      label: 'Inaceitável',
      data: [<?php echo $numeros ?>],
      backgroundColor: "#FF0000"
    }, 
    <?php } ?>
    
    ],

},
	
	options: {
		responsive: true,
        legend: {
            display: true,
            position: 'bottom',
			
        },
		
	scales: {
        yAxes: [{ticks: {fontSize: 16, fontFamily: "'Roboto', sans-serif", fontColor: '#000', fontStyle: '600'}}],
        xAxes: [{ticks: {fontSize: 16, fontFamily: "'Roboto', sans-serif", fontColor: '#000', fontStyle: '600'}}]
        }

	
		
    }
});
</script>

    
    </div>
    
    
    </div>
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
        

           <div class="row pl-4 pr-4">
           
             
               
                             
              <div class="col-md-4 mb-3">
           <label>Nome do controle</label>
               <input type="text" class="form-control mb-4" name="cad-nome" id="cad-nome"> 
       </div>
       
          <div class="col-md-4 mb-3">
           <label>Objetivo do controle</label>
               <input type="text" class="form-control mb-4" name="cad-objetivo" id="cad-objetivo"> 
       </div>
       
         <div class="col-md-4 mb-3">
           <label>Cadastro de tipo</label>
              <select class="form-control mb-4" name="cadastro-tipo" id="cadastro-tipo">
                  <option>POP - Procedimento Operacional Padrão</option>
                  <option>Fluxograma de atividades</option>
                   <option>Check list </option>
              </select>
       </div>
       
         <div class="col-md-4 mb-4">
           <label>Natureza do controle</label>
               <input type="radio" id="cad-natureza" value="Manual" name="cad-natureza"> Manual<br>
                <input type="radio" id="cad-natureza" value="Automático" name="cad-natureza"> Automático<br>
                <input type="radio" id="cad-natureza" value="Manual dependente de TI" name="cad-natureza"> Manual dependente de TI 
<br>
       </div>
       
      <div class="col-md-4 mb-4">
           <label>Frequência da execução do controle</label>
               <input type="radio" id="cad-frequencia" value="Anual" name="cad-frequencia"> Anual
<br>
                <input type="radio" id="cad-frequencia" value="Semestral" name="cad-frequencia"> Semestral<br>
                <input type="radio" id="cad-frequencia" value="Quadrimestral" name="cad-frequencia"> Quadrimestral 
<br>
       </div>
       
              <div class="col-md-4 mb-4">
           <label>Tipo de controle 
</label>
               <input type="radio" id="cad-tipo-controle" name="cad-tipo-controle" value="Preventivo (impede que os erros
antes da execução ou registro)"> Preventivo (impede que os erros
antes da execução ou registro)
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
               <option>Inspeção no local</option>
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
       
       <div class="col-md-4">
               <label>Parecer</label>
               <select class="form-control">
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
	
	
	
	
	
	
<!-- Modal -->
<div class="modal fade" id="ModalAdicionarControle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloAdicionarControle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		<div class="row mb-4"> 
       
       
       
        <div class="col-md-6 mb-4">
               <label>Causa</label>
               <input type="text" class="form-control" name="cad-causa" id="causa6[]">
           </div>
           
               <div class="col-md-2 mb-4">
               <label>Controle</label>
               <select class="form-control" name="cad-controle" id="cad-controle">
                   <option value="sim">Sim</option>
                   <option value="Não">Não</option>
               </select>
           </div>
           
<div class="col-md-2 mb-4">
               <label>Listar</label>
             <select class="form-control" name="cad-listar" id="cad-listar">
                   <?php
            mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from controles_existentes_temp");
				while($registros=mysqli_fetch_array($selecao)){
			?>
            <option><?php echo $registros['nome_controle'] ?></option>
			
			<?php } ?>
                   
                   
                   
               </select>
           </div>
          
              <div class="col-md-3">
               <label>Parecer</label>
               <input type="text" class="form-control" name="cad-causa" id="cad-causa" readonly>
           </div>
           
            
           
           <div class="col-md-12 mt-3">
           <input type="button" value="Gravar" class="btn btn-primary mt-2">
           </div>
          
           </div>  
		  
		  
		  
		  
		  
		  
		  
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>	
	
	
	
	
	
	
	
	
<!--------------------------Contadores Causas------------------------------->
<input type="hidden" id="contador-causa1" value="1">
<input type="hidden" id="contador-causa2" value="1">
<input type="hidden" id="contador-causa3" value="1">
<input type="hidden" id="contador-causa4" value="1">
<input type="hidden" id="contador-causa5" value="1">
<input type="hidden" id="contador-causa6" value="1">	
	
	
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	
	
	
	
	<script>
    
    $f=jQuery.noConflict()
		

		
		
	$f(document).ready(function() {
    $f('#example').DataTable();
	
} );
		
		
		
	$f("#example").dataTable({
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

  function ExcluirMatriz(codigo){

	 $f.ajax({
		  type: 'post',
		  data: 'codigo='+codigo,
		  url:'funcoes/excluir-matriz.php',
		  success: function(retorno){
		  $f('#resposta-matriz').html(retorno);  
		 	 
			CarregarMatriz()  
      }
       })	

}


function CarregarMatriz(){

$f('#carregar-matriz').load("funcoes/carrega-matriz.php")

}

$j=jQuery.noConflict()

$j(document).ready(function(){ 

$j('#conteudo2').hide()
$j('#conteudo3').hide()
$j('#conteudo4').hide()
$j('#conteudo5').hide()

$j("#sanfona-conteudo1").hide()
$j("#sanfona-conteudo2").hide()
$j("#sanfona-conteudo3").hide()
$j("#sanfona-conteudo4").hide()
$j("#sanfona-conteudo5").hide()
$j("#sanfona-conteudo6").hide()

$j("#baixo1").hide()


 CarregarMatriz()  
CarregarTabelaControlesExistentes()
	
	
$j('#teste').on('shown.bs.modal', function () {
  $j('#ModalAdicionarControle').trigger('focus')
})	
	
	
})


function Calcular(){

var probabilidade = $j("#cad-probabilidade-avaliacao option:selected").val()
var impacto = $j("#cad-impacto-avaliacao option:selected").val()

var calcular = (probabilidade * impacto) 

var resultado = ''
var cor = ''

if(calcular<=15){resultado='  Aceitável'; cor ='#41841E' }
if(calcular >=15 && calcular <= 34  ){resultado='  Significativo'; cor ='#F2E70A'}
if(calcular >=34 && calcular <= 85  ){resultado='  Sério'; cor ='#E58C2C'}
if(calcular >=85 && calcular <= 200  ){resultado='  Inaceitável'; cor ='#FF0000'}

$j('#cad-nivel-do-risco-inerente').val(resultado)
$j('#cad-nivel-do-risco-inerente').css("background-color",cor)


}

function Calcular(){

var probabilidade = $j("#cad-probabilidade-avaliacao option:selected").val()
var impacto = $j("#cad-impacto-avaliacao option:selected").val()

var calcular = (probabilidade * impacto) 

var resultado = ''
var cor = ''

if(calcular<=15){resultado='Aceitável'; cor ='#41841E' }
if(calcular >=15 && calcular <= 34  ){resultado='Significativo'; cor ='#F2E70A'}
if(calcular >=34 && calcular <= 85  ){resultado='Sério'; cor ='#E58C2C'}
if(calcular >=85 && calcular <= 200  ){resultado='Inaceitável'; cor ='#FF0000'}

$j('#cad-nivel-do-risco-inerente').val(resultado)
$j('#cad-nivel-do-risco-inerente').css("background-color",cor)


}

function Calcular2(){

var probabilidade = $j("#cad-probabilidade-residual option:selected").val()
var impacto = $j("#cad-impacto-residual option:selected").val()

var calcular = (probabilidade * impacto) 

var resultado = ''
var cor = ''

if(calcular<=15){resultado='  Aceitável'; cor ='#41841E' }
if(calcular >=15 && calcular <= 34  ){resultado='  Significativo'; cor ='#F2E70A'}
if(calcular >=34 && calcular <= 85  ){resultado='  Sério'; cor ='#E58C2C'}
if(calcular >=85 && calcular <= 200  ){resultado='  Inaceitável'; cor ='#FF0000'}

$j('#cad-nivel-do-risco-residual').val(resultado)
$j('#cad-nivel-do-risco-residual').css("background-color",cor)


}


function CoresNiveis(campo){
var nivel = $j("#"+campo).val()
var cor = '';

if(nivel=='Baixa'){cor='#41841E'}
if(nivel=='Média'){cor='#F2E70A'}
if(nivel=='Alta'){cor='#E58C2C'}
if(nivel=='Muito Alta'){cor='#FF0000'}

campo = $j('#'+campo).css("background-color",cor)



}



function AdicionarItens(){

var nome = $j('#cad-nome').val()
var objetivo = $j('#cad-objetivo').val()
var cadastro = $j('#cadastro-tipo').val()
var metodo = $j('#cad-metodo-avaliacao').val()
var responsavel = $j('#cad-responsavel').val()
var data_avaliacao = $j('#cad-data-avaliacao').val()
var resultado = $j('#cad-resultado-avaliacao').val()

var natureza = $j('#cad-natureza').val()
var frequencia = $j('#cad-frequencia').val()
var controle = $j('#cad-tipo-controle').val()


	 $j.ajax({
		  type: 'post',
		  data: 'nome='+nome+'&objetivo='+objetivo+'&cadastro='+cadastro+'&metodo='+metodo+'&responsavel='+responsavel+'data='+data_avaliacao+'&resultado='+resultado+'&natureza='+natureza+'&frequencia='+frequencia+'&controle='+controle,
		  url:'funcoes/gravar-itens-controles-existentes.php',
		  success: function(retorno){
		 CarregarTabelaControlesExistentes()
        
		 	 
			
      }
       })	

}

function CarregarTabelaControlesExistentes(){

$j('#carregar-tabela-controles-existentes').load('tabela-controles-existentes.php')
}

function ExcluirControlesExistentes(codigo){
 $j.ajax({
		  type: 'post',
		  data: 'codigo='+codigo,
		  url:'funcoes/excluir-controles-existentes-temp.php',
		  success: function(retorno){
		  $j('#resposta-matriz').html(retorno);  
		 	 
			 CarregarTabelaControlesExistentes()
      }
       })	

}


function AbrirSanfona(codigo){

$j('#sanfona-conteudo'+codigo).toggle()



}

		
function ModalAdicionarControle(titulo){
	
	$j('#TituloAdicionarControle').html(titulo)
	$j('#ModalAdicionarControle').modal('show');
	
}	
		
		

	</script>
</body>
</html>