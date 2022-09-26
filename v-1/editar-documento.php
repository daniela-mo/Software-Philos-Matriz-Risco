<?php 


$nav_menu_principal='gestaodeprocessos';
$nav_menu_pagina='documentos';

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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
		
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$obterdominio=$_SESSION['dominio'];
    	$codigo_procedimento=$_REQUEST['cod'];
    
    mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
    
    $selecao=mysqli_query($conexao,"select * from procedimentos WHERE id='$codigo_procedimento'");
    $registros=mysqli_fetch_array($selecao);
	
?>	
<!-- Navegação !-->	
	
<form action="processa-atualizar-procedimento.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="codigo_procedimento" value="<?php echo $codigo_procedimento ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Editar Documento</span></a>
						</div>
					</div>
					
					
				</div>
			</div>	
            
            
            
			<div class="row" >
				<div class="col-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>	
    
    
     <div class="row ml-4 mr-4 mt-4">
 <div class="col-md-12 text-center">
<!--<input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Documentos">
<!--<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn2" onClick="Abas(2)" value="Cadastro Classificação do Documento">-->
<!--<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn3" onClick="Abas(3)" value="Cadastro de Referência e Requisitos Normativos"
 --->
            </div>
        </div>
    
    <div id="conteudo1">
 	<h3 class="mb-4 mt-5 ml-4 mr-4">&nbsp;&nbsp;Editar Documento</h3>	
    
				
	<div class="row ml-4 mr-4">
		
		
				
		<div class="col-md-2 mb-4">
			<label>N° da Revisão</label>
			<input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" value="<?php echo $registros['numero_revisao'] ?>" readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Data Emissão do Doc</label>
			<input type="text" name="cad-data-emissao-documento" class="form-control datepicker" autocomplete="off" value="<?php echo $registros['data_emissao'] ?>" >
		</div>
		
		<?php 
		$processo=$registros['processo']; 

       $selecao_processos1=mysqli_query($conexao,"select * from processos WHERE id='$processo'");
       $registros_processos1=mysqli_fetch_array($selecao_processos1);

		
		?>	
	
			<div class="col-md-4 mb-4">
			<label>Processo</label>
			<select class="form-control" name="cad-processo" id="cad-processo" >
				<option value="<?php echo $processo ?>"><?php echo $registros_processos1['processo'] ?></option>
                <?php
				mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
                $selecao_processos=mysqli_query($conexao,"select * from processos");
                while($registros_processos=mysqli_fetch_array($selecao_processos)){
                ?>
                <?php if($registros_processos1['processo']!=$registros_processos['processo']){ ?>
                <option value="<?php echo $registros_processos['id'] ?>"><?php echo $registros_processos['processo'] ?></option>
                
                <?php } } ?>
                
			</select>
		</div>
		
		<div class="col-md-5 mb-4">
			<label>Nome Documento</label>
			<input type="text" name="cad-procedimento" class="form-control" autocomplete="off" value="<?php echo $registros['nome_procedimento'] ?>" >
		</div>
		
        
         <?php
        $id_classificacao_documento=$registros['classificacao_documento'];
         $selecao3=mysqli_query($conexao,"select * from classificacao_documento WHERE id='$id_classificacao_documento'");
         $registros3=mysqli_fetch_array($selecao3);
                    
        ?>    
		<div class="col-md-2 mb-4">
			<label>Código do Documento</label>
			<input type="text" name="cad-classificacao" class="form-control" autocomplete="off" value="<?php echo $registros3['sigla'] ?>" >
		</div>
		
        
        <?php
        $id_requisito=$registros['referencia_legal'];
         $selecao3=mysqli_query($conexao,"select * from requisitos_normativos ");
         $registros3=mysqli_fetch_array($selecao3);
                    
        ?>    
		<div class="col-md-3 mb-4">
			<label>Referência legal ou normativa</label>
			<select class="form-control" name="cad-referencia">
				<option value="Não Informado">Escolher</option>
               <?php
         $selecao3=mysqli_query($conexao,"select * from requisitos_normativos ");
         while($registros3=mysqli_fetch_array($selecao3)){
        ?> 		
        <option value="<?php echo $registros3['id'] ?>"><?php echo $registros3['referencia'] ?></option>
		<?php } ?>		
				
			</select>
		</div>
		
		<div class="col-md-3 mb-4">
			<label>Documento</label>
		<?php $anexo= $registros['anexo']; if($anexo!=''){ ?>
			
			<img src="imgs/icone-documento.png" width="18" alt=""><a href="/uploads/<?php echo $registros['anexo'] ?>" target="_blank"><?php echo $registros['anexo'] ?></a>
			
		<?php } ?>	
		</div>
		
		<div class="col-md-3 mb-4">
			<label>Alterar Anexo</label>
			<input type="file" name="file" class="form-control" >
		</div>
        
    </div>    
    <div class="row ml-4 mr-4">  
    
    <div class="col-md-4 mb-4 pointer">
			<label>Requisito Normativo</label>
			    <a class="btn btn-light form-control pt-3 pb-3" data-toggle="modal" data-target="#exampleModalLong">
                <i class="fa fa-search float-left"></i>
                </a>
		</div>
        
        
    <div class="col-md-12 mt-3">
    <label>Tabela de Requisito(s) Normativo(s)</label>
    
  <div id="resposta-tabela"></div>
    </div>    
        
        
        
		
		<div class="col-md-4 mb-4">
			<label>Frequência da revisão</label>
			<select class="form-control" name="cad-frequencia-revisao">
                <option><?php echo $registros['frequencia_revisao'] ?></option>
				<option>Trienal</option>
				<option>Bienal</option>
				<option>Anual</option>
			</select>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Previsão da próxima revisão</label>
			<input type="text" name="cad-data-planejada" class="form-control datepicker" autocomplete="off" value="<?php echo $registros['data_planejada'] ?>" >
		</div>
		
		
			<div class="col-md-4 mb-4">
			<label>Elaborado por</label>
			<select class="form-control" name="cad-elaborado-por">
                <option><?php echo $registros['elaborado_por']; ?></option>
			
			 <?php 
			$selecao1=mysqli_query($conexao,"select * from usuarios_empresa order by nome ASC");
			while($registros1=mysqli_fetch_array($selecao1)){
			  		?>  
			   
               <option><?php echo  strtolower($registros1['nome']) ?> - <?php echo $registros1['email'] ?></option>
			   
			   
			   <?php } ?>
			</select>
		</div>
		
				
		
		
		
		<div class="col-md-4 mb-4">
			<label>Inserir documento</label>
			<input type="file" name="cad-documento" >
		</div>
		
			<div class="col-md-12 mb-4">
			<label>Lista documentação com upload</label>
			<a target="_blank" href="<?php echo $obterdominio ?>/uploads/<?php echo $registros['documento'] ?>"><?php echo $registros['documento'] ?></a>
            
		</div>
		
		<div class="col-md-12">
		<input type="submit" value="Atualizar Informações" class="btn btn-primary">
		
		</div>
		
</div>	
</div>		

<div id="conteudo2">
<h3 class="mb-4 mt-5 ml-4 mr-4">&nbsp;&nbsp;Cadastro classificação do documento</h3>	
    
    
      <div class="row ml-4 mr-4">  
        <div class="col-md-2">
            <label>Sigla</label>
            <input type="text" name="cad-sigla-classificacao" class="form-control" <?php echo $registros['sigla_classificacao'] ?>>
        </div>
        
         <div class="col-md-5">
          <label>Descrição</label>
            <input type="text" name="cad-descricao-classificacao" class="form-control" <?php echo $registros['descricao_classificacao'] ?>>
        </div>
        
         <div class="col-md-5">
            <label>Tipo de documento</label>
            <input type="text" name="cad-tipo-documento-classificacao" class="form-control" <?php echo $registros['tipo_documento_classificacao'] ?>>
        </div>
    </div>
    
</div>


<div id="conteudo3">
<h3 class="mb-4 mt-5 ml-4 mr-4">&nbsp;&nbsp;Cadastro de Referência e Requisitos Normativos</h3>

    <div class="row ml-4 mr-4">  
        <div class="col-md-2">
            <label>Nome</label>
            <input type="text" name="cad-nome-referencia" class="form-control" <?php echo $registros['nome_referencia'] ?>>
        </div>
        
         <div class="col-md-5">
          <label>Descrição</label>
            <input type="text" name="cad-descricao-referencia" class="form-control" <?php echo $registros['descricao_referencia'] ?>>
        </div>
        
         <div class="col-md-5">
            <label>Requisito Normativo</label>
            <input type="text" name="cad-requisito-normativo-referencia" class="form-control" <?php echo $registros['requisito_normativo_referencia'] ?>>
        </div>
    </div>
</h3>	
    
</div>

					
				</div>
			</div>
		</div>

	</div>
</form>	
	
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="z-index: 999999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Requisitos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <label>Requisito Normativo</label>
       <p>Escolha os itens do requisito abaixo</p>
       
       
       <select class="form-control" id="escolher-requisito" style="background-color: white" onChange="TabelaRequisitos()">
           <option value="0">Escolha</option>
        <?php
        mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
            $selecao_normativos=mysqli_query($conexao,"select * from requisitos_normativos");
            while($registros_normativos=mysqli_fetch_array($selecao_normativos)){
        ?>
        
            <option value="<?php echo $registros_normativos['id'] ?>"><?php echo $registros_normativos['requisito'] ?></option>
        
        
        <?php } ?>
        
           
       </select> 
        
   <div id="tabela-requisitos"></div>
       
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
	
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
<script>
	$f=jQuery.noConflict()	 

function TabelaRequisitos(){ 
var codigo= $f('#escolher-requisito option:selected').val()

            $f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'tabela-requisitos.php',
			  success: function(retorno){
			  $f('#tabela-requisitos').html(retorno); 
			   
		  }
		   })  

}


		  
		 $f(".datepicker").datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
}); 
		  
		  
  $f(function() {
    $f(".datepicker").datepicker();
  } );
  

function AdicionarItens(){
var codigo= $f('#escolher-requisito option:selected').val()

var itens = new Array();
$f("input[name='itens[]']:checked").each(function()
{
   // valores inteiros usa-se parseInt
   //checkeds.push(parseInt($(this).val()));
   // string
   itens.push($f(this).val());
});

      $f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo+'&itens='+itens,
			  url:'funcoes/gravar-requisitos-temp.php',
			  success: function(retorno){
			  $f('#resposta-tabela').html(retorno); 
			   CarregarTabela(codigo)
		  }
		   }) 
}



function CarregarTabela(){

   $f.ajax({
			  type: 'post',
			  data: 'codigo=',
			  url:'funcoes/carregar-requisitos.php',
			  success: function(retorno){
			  $f('#resposta-tabela').html(retorno); 
			  
		  }
		   }) 

}

$f(document).ready(function(){

CarregarTabela()


$f('#conteudo2').hide()
$f('#conteudo3').hide()


})

function ExcluirRequisito(codigo){

$f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-itens-requisitos-temp.php',
			  success: function(retorno){
			  $f('#resposta-tabela').html(retorno); 
              CarregarTabela()
			  
		  }
		   }) 


}

function Abas(codigo){

if(codigo==1){

$f('#btn1').addClass('btn-primary')

$f('#btn2').removeClass('btn-primary')
$f('#btn3').removeClass('btn-primary')

$f('#conteudo1').show()
$f('#conteudo2').hide()
$f('#conteudo3').hide()

}

if(codigo==2){

$f('#conteudo2').show()
$f('#conteudo1').hide()
$f('#conteudo3').hide()

$f('#btn2').removeClass('btn-light')
$f('#btn2').addClass('btn-primary')

$f('#btn1').removeClass('btn-primary')
$f('#btn3').removeClass('btn-primary')

}

if(codigo==3){

$f('#conteudo3').show()
$f('#conteudo1').hide()
$f('#conteudo2').hide()

$f('#btn3').removeClass('btn-light')
$f('#btn3').addClass('btn-primary')

$f('#btn1').removeClass('btn-primary')
$f('#btn2').removeClass('btn-primary')


}

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
 	

</body>
</html>