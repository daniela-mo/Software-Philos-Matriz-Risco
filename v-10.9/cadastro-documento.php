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
	
?>	
<!-- Navegação !-->	
	
<form action="processa-cadastro-procedimento.php" method="post" enctype="multipart/form-data">	
	<div class="content-wrapper">
		<div class="container-fluid">
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Cadastro Documento</span></a>
						</div>
					</div>
					
					
				</div>
			</div>	
            
            
            
			<div class="row" >
				<div class="col-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>	
    
    
     <div class="row ml-4 mr-4 mt-4">
 <div class="col-md-12 text-center">
<input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Documentos">
<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn2" onClick="Abas(2)" value="Cadastro Classificação do Documento">
<input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn3" onClick="Abas(3)" value="Cadastro de Referência e Requisitos Normativos"
 
            </div>
        </div>
    
    <div id="conteudo1">
 	<h3 class="mb-4 mt-5 ml-4 mr-4">&nbsp;&nbsp;Cadastro de novo documento</h3>	
    
				
	<div class="row ml-4 mr-4">
		
		
				
		<div class="col-md-3 mb-4">
			<label>N° da Revisão</label>
			<input type="number" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" min="0">
		</div>
		
		<div class="col-md-3 mb-4">
			<label>Data Emissão do Doc</label>
			<input type="text" name="cad-data-emissao-documento" class="form-control datepicker" autocomplete="off" >
		</div>
		
			<div class="col-md-4 mb-4">
			<label>Processo</label>
			<select class="form-control" name="cad-processo" id="cad-processo" >
				<option value="0">Escolha</option>
                <?php
				mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
                $selecao_processos=mysqli_query($conexao,"select * from processos");
                while($registros_processos=mysqli_fetch_array($selecao_processos)){
                ?>
                
                <option value="<?php echo $registros_processos['id'] ?>"><?php echo $registros_processos['processo'] ?></option>
                
                <?php } ?>
                
			</select>
		</div>
		
		<div class="col-md-5 mb-4">
			<label>Nome Documento</label>
			<input type="text" name="cad-procedimento" class="form-control" autocomplete="off" >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Código do Documento</label>
			<select class="form-control" name="cad-classificacao">
				<option>Escolha</option>
				 <?php
            $selecao_areas=mysqli_query($conexao,"select * from classificacao_documento");
            while($registros_areas=mysqli_fetch_array($selecao_areas)){
            ?>
                <option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['sigla'] ?></option>
                
            <?php } ?>   
			</select>
		</div>
		
		   
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
			<label>Anexo</label>
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
				<option>Diário</option>
				<option>Semanal</option>
				<option>Quinzenal</option>
				<option>Mensal</option>
				<option>Bimestral</option>
				<option>Trimetral</option>
				<option>Semestral</option>
				<option>Anual</option>
				<option>Bienal</option>
				<option>Trienal</option>
				
			</select>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Previsão da próxima revisão</label>
			<input type="text" name="cad-data-planejada" class="form-control datepicker" autocomplete="off" >
		</div>
		
			
		
				
		
		
		
		
		<!----<div class="col-md-4 mb-4">
			<label>Inserir documento</label>
			<input type="file" name="cad-documento" >
		</div>
		---->
			
		
		<div class="col-md-12">
		<input type="submit" value="Gravar Dados" class="btn btn-primary">
		
		</div>
		
</div>	
</div>		

<div id="conteudo2">

  <div class="row ml-4 mr-4">           
    
<h3 class="mb-4 mt-5 col-md-12">&nbsp;&nbsp;Cadastro classificação do documento</h3>

     
        <div class="col-md-2">
            <label>Código</label>
            <input type="text" name="cad-sigla-referencia" id="cad-sigla-referencia" class="form-control">
        </div>
        
         <div class="col-md-5">
          <label>Descrição</label>
            <input type="text" name="cad-descricao-referencia" id="cad-descricao-referencia" class="form-control">
        </div>
        
         <div class="col-md-5">
            <label>Tipo</label>
            <input type="text" name="cad-tipo-documento-referencia" id="cad-tipo-documento-referencia" class="form-control">
        </div>
        
        
        <div class="col-md-12"> 
            <input type="button" value="Gravar" class="btn btn-primary mt-4 mb-4" onClick="GravarRequisitosNormativos()">
        
        
        <div id="resposta-tabela-requisitos"></div>
        
        
        </div>
        
    </div>
    
</div>


<div id="conteudo3">
  <div class="row ml-4 mr-4">           
    
<h3 class="mb-4 mt-5 col-md-12">&nbsp;&nbsp;Cadastro de Referência e Requisitos Normativos</h3>

        <div class="col-md-2">
            <label>Referência</label>
            <input type="text" name="cad-referencia-requisito" id="cad-referencia-requisito" class="form-control">
        </div>
        
         <div class="col-md-5">
            <label>Descrição</label>
            <input type="text" name="cad-descricao-requisito" id="cad-descricao-requisito" class="form-control">
        </div>
        
         <div class="col-md-5">
            <label>Requisito Normativo</label>
            <input type="button" name="cad-requisito-normativo" id="cad-requisito-normativo" class="btn btn-primary" value="+" data-toggle="modal" data-target="#ModalRequisitos">
        </div>
        
        <div class="col-md-12"> 
            <input type="button" value="Gravar" class="btn btn-primary mt-4 mb-4" onClick="GravarReqNor()" >
            <input type="reset" value="Limpar" class="btn btn-danger mt-4 mb-4" id="btn-limpar" >
        
        <div id="resposta-tabela-requisitos-normativos"></div>
        
        </div>
    </div>
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
        
            <option value="<?php echo $registros_normativos['id'] ?>"><?php echo $registros_normativos['referencia'] ?></option>
        
        
        <?php } ?>
        
           
       </select> 
        
       <div id="tabela-requisitos"></div>
       
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ModalRequisitos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999999999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Referência e Requisitos Normativos
</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       
       <div class="row ml-4 mr-4 mt-4">
           
           <div class="col-md-3">
               <label>Cláusula/Item</label>
               <input type="number" class="form-control" name="cad-numero-modal" id="cad-numero-modal">
           </div>
           
                 
           
             <div class="col-md-6">
                 <label>Requisito Normativo</label>
                 <input type="text" class="form-control" name="cad-requisito-modal" id="cad-requisito-modal">
           </div>
           
           <div class="col-md-12">
                <input type="button" class="btn btn-success mt-4" value="Adicionar" onClick="GravarReq()" style="background-color: #033318">
           </div>
           
          
           <div class="col-md-12">
           
           
           <div id="carrega-tabela-req"></div>
           
            
               <!--- <input type="button" class="btn btn-primary mt-4" value="Salvar e fechar"  >---->
           
           <input type="button" class="btn btn-primary mt-4" value="Salvar e fechar"  data-dismiss="modal" aria-label="Close"  >
               
           
           </div>
           
       </div>
       
       
       
       
       
      </div>
      
    </div>
  </div>
</div>
	
<!--------------- PASSAR CAMPO ID ---->	
	<input type="hidden" id="obter-id-requisito">
	<input type="hidden" id="obter-id-classificacao-documento">
	
	
	
	
	<!-- Modal EDITAR CLASSIFICAÇÃO -->
<div class="modal fade" id="ModalEditarClassificacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 99999999999">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Classificação do Documento </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		  <div class="row ml-4 mr-4">
			  <div class="col-md-12">
		  <div id="carregar-editar-classificacao-documento"></div>
		  	</div>
		  </div>
		  
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onClick="AtualizarClassificacaoDocumento()">Atualizar</button>
      </div>
    </div>
  </div>
</div>	
	
	
	
	
	
	
	<!-- Modal EDITAR -->
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 99999999999">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Requisitos </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		  <div class="row ml-4 mr-4">
			  <div class="col-md-12">
		  <div id="carregar-editar-requisitos"></div>
		  	</div>
		  </div>
		  
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onClick="AtualizarRequisitosNormativos()">Atualizar</button>
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
			  url:'funcoes/carregar-requisitos-temp.php',
			  success: function(retorno){
			  $f('#resposta-tabela').html(retorno); 
			  
		  }
		   }) 

}

function CarregarTabelaRequisitos(){

$f("#resposta-tabela-requisitos").load('carregar-tabela-requisitos.php')

}

$f(document).ready(function(){



CarregarTabela()
CarregarTabelaRequisitos()
CarregarReq()
CarregaReqNorma()
LimparTabela()
LimparTabelaItens()

$f('#conteudo2').hide()
$f('#conteudo3').hide()


})

function ExcluirRequisito(codigo){
	if (window.confirm("Você deseja excluir o Requisito?")) {
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
}

function ExcluirReq(codigo){
	if (window.confirm("Você deseja mesmo excluir?")) {
$f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-req.php',
			  success: function(retorno){
			  $f('#carrega-tabela-req').html(retorno); 
             CarregarReq()
			  
		  }
		   }) 
}
}



function ExcluirTabelaRequisitoNorma(codigo){
	if (window.confirm("Você deseja mesmo excluir a norma?")) {
$f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-tabela-requisitos-normativos.php',
			  success: function(retorno){
			  $f('#resposta-tabela-requisitos-normativos').html(retorno); 
              CarregaReqNorma()
			  
		  }
		   }) 


}
}

function ExcluirTabelaRequisito(codigo){
if (window.confirm("Você deseja mesmo excluir o Requisito?")) {

$f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-tabela-requisitos.php',
			  success: function(retorno){
			  $f('#resposta-tabela-requisitos').html(retorno); 
              CarregarTabelaRequisitos()
			  
		  }
		   }) 

}
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

function GravarRequisitosNormativos(){

var sigla = $f('#cad-sigla-referencia').val()
var descricao = $f('#cad-descricao-referencia').val()
var documento = $f('#cad-tipo-documento-referencia').val()

$f.ajax({
			  type: 'post',
			  data: 'sigla='+sigla+'&descricao='+descricao+'&documento='+documento,
			  url:'funcoes/gravar-tabela-requisitos.php',
			  success: function(retorno){
			  $f('#resposta-tabela-requisitos').html(retorno); 
              
$f('#cad-sigla-referencia').val('')
$f('#cad-descricao-referencia').val('')
 $f('#cad-tipo-documento-referencia').val('')
           
              
             CarregarTabelaRequisitos()
             
			   /*Limpando campos */
         
		  }
		   }) 

}

function CarregarReq(){

$f('#carrega-tabela-req').load("funcoes/carrega-req.php")

}
            
function CarregaReqNorma(){


$f('#resposta-tabela-requisitos-normativos').load("funcoes/carrega-tabela-requisitos-normativos.php")

}     


/*JANELA MODAL*/
function GravarReq(){
            
    var numero = $f('#cad-numero-modal').val()
    var subnumero = $f('#cad-subnumero-modal').val()
    var requisito = $f('#cad-requisito-modal').val()
            
$f.ajax({
			  type: 'post',
			  data: 'numero='+numero+'&subnumero='+subnumero+'&requisito='+requisito,
			  url:'funcoes/gravar-req.php',
			  success: function(retorno){
			  $f('#resposta-tabela-requisitos').html(retorno); 
                            
     /*Limpar os campos */         
    $f('#cad-numero-modal').val('')
    $f('#cad-requisito-modal').val('')
			  CarregarReq()
              
		  }
		   })             
}
            
function GravarReqNor(){

    var referencia = $f('#cad-referencia-requisito').val()
    var descricao = $f('#cad-descricao-requisito').val()
    var requisito = $f('#cad-requisito-normativo').val()


$f.ajax({
			  type: 'post',
			  data: 'referencia='+referencia+'&descricao='+descricao+'&requisito='+requisito,
			  url:'funcoes/gravar-referencia-requisitos.php',
			  success: function(retorno){
              
			  $f('#resposta-tabela-requisitos-normativos').html(retorno); 
			
             $f('#resposta-tabela-requisitos-normativos').load("funcoes/carrega-tabela-requisitos-normativos.php")

       		$f("#btn-limpar").trigger('click')
     ResetTabela()
              
		  }
		   })  



}

function LimparTabela(){

$f.ajax({
			  type: 'post',
			  data: 'codigo=',
			  url:'funcoes/limpar-tabela-requisitos-temp.php',
			  success: function(retorno){
			  $f('#resposta-tabela').html(retorno); 
             
		  }
		   }) 


}


function LimparTabelaItens(){

$f.ajax({
			  type: 'post',
			  data: 'codigo=',
			  url:'funcoes/limpar-itens-tabela-requisitos-temp.php',
			  success: function(retorno){
			  $f('#resposta-tabela').html(retorno); 
             
		  }
		   }) 


}
	
	function EditarRequisito(codigo){
	
	$f('#obter-id-requisito').val(codigo)
		
		
		$f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/editar-reqisitos-normativos.php',
			  success: function(retorno){
			  $f('#carregar-editar-requisitos').html(retorno); 
             
		  }
		   }) 
	
}	
	

	function EditarClassificacaoDocumento(codigo){
		$f('#obter-id-classificacao-documento').val(codigo)
		
		
		$f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/editar-classificacao-documento.php',
			  success: function(retorno){
			  $f('#carregar-editar-classificacao-documento').html(retorno); 
             
		  }
		   }) 
			
		
		
	}
	
	
function AtualizarRequisitosNormativos(){
	var codigo=$f('#obter-id-requisito').val()

 var Codigos = new Array();
var Codigos2 = new Array();	
var Numero = new Array();		
 
  $f("input[id='editar_requisito[]']").each(function(){
     Codigos.push($f(this).val());
	  
  });

	  $f("input[id='codigo_requisito[]']").each(function(){
     Codigos2.push($f(this).val());
  });
	
	
	  $f("input[id='editar_numero[]']").each(function(){
     Numero.push($f(this).val());
  });
	
	
	$f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo+'&editar_requisito='+Codigos+'&codigo_requisito='+Codigos2+'&numero_requisito='+Numero,
			  url:'funcoes/atualizar-requisitos-normativos.php',
			  success: function(retorno){
			  $f('#carregar-editar-requisitos').load("funcoes/editar-requisitos-normativos.php"); 
              $f('.close').trigger("click")
		  }
		   }) 
	
}	
	
	
	
	
function AtualizarClassificacaoDocumento(){
	var codigo=$f('#obter-id-classificacao-documento').val()

 	var sigla =$f("#editar-sigla").val()
	var descricao =$f("#editar-descricao").val()
	var tipo =$f("#editar-tipo-documento").val()
	
	
	$f.ajax({
			  type: 'post',
			  data: 'codigo='+codigo+'&sigla='+sigla+'&descricao='+descricao+'&tipo='+tipo,
			  url:'funcoes/atualizar-classificacao-documento.php',
			  success: function(retorno){
			 
              $f('.close').trigger("click")
				CarregarTabelaRequisitos()  
				  
		  }
		   }) 
	
}		
	
	

function ResetTabela(){

LimparTabela()
CarregarTabela()
CarregarTabelaRequisitos()
CarregarReq()
CarregaReqNorma()
$f('#carrega-tabela-req').load("funcoes/carrega-req.php")
$f('#carrega-tabela-req').load("funcoes/carrega-req.php")
$f('#carrega-tabela-req').load("funcoes/carrega-req.php")
}
       
  

	
	
	
	
	
  </script>	
	
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