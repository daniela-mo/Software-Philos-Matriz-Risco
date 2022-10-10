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
	$codigo_procedimento=$_REQUEST['cod'];
    
    mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
    
    $selecao=mysqli_query($conexao,"select * from procedimentos WHERE id='$codigo_procedimento'");
    $registros=mysqli_fetch_array($selecao);
    $processo=$registros['processo'];
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Procedimento</span></a>
						</div>
					</div>
					
					
				</div>
			</div>	
            
            
            
			<div class="row" >
				<div class="col-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>	
    

    
    <div id="conteudo1">
 	<h3 class="mb-4 mt-5 ml-4 mr-4">&nbsp;&nbsp;Procedimento 
    <a href="editar-procedimento.php?cod=<?php echo $codigo_procedimento ?>">
    <img src="imgs/icone-editar.png" width="30" height="30" alt=""/>
    </a></h3>	
    
				
	<div class="row ml-4 mr-4">
		
		
				
		<div class="col-md-2 mb-4">
			<label>N° da Revisão</label>
			<input type="number" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['numero_revisao'] ?>">
		</div>
		
			<div class="col-md-4 mb-4">
			<label>Processo</label>
             <?php
                    $selecao_processo=mysqli_query($conexao,"select * from processos WHERE id='$processo'");
                    $registros_processo=mysqli_fetch_array($selecao_processo);
                ?>
			<input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros_processo['processo'] ?>">           
               
               
		</div>
		
		<div class="col-md-5 mb-4">
			<label>Nome Procedimento</label>
			<input type="text" class="form-control" name="cad-procedimento" id="cad-procedimento" readonly value="<?php echo $registros['nome_procedimento'] ?>">
		</div>
        
        <?php
        $id_classificacao_documento=$registros['classificacao_documento'];
         $selecao3=mysqli_query($conexao,"select * from classificacao_documento WHERE id='$id_classificacao_documento'");
         $registros3=mysqli_fetch_array($selecao3);
                    
        ?>    
		
		<div class="col-md-4 mb-4">
			<label>Classificação do Documento</label>
			<input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros3['sigla'] ?>">
		</div>
		
        <?php
        $id_requisito=$registros['referencia_legal'];
         $selecao3=mysqli_query($conexao,"select * from requisitos_normativos WHERE id='$id_requisito'");
         $registros3=mysqli_fetch_array($selecao3);
                    
        ?>            
		<div class="col-md-4 mb-4">
			<label>Referência legal ou normativa</label>
			<input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros3['referencia'] ?>">
		</div>
		
		
        
    </div>    
    <div class="row ml-4 mr-4">  
    
   
        
        
    <div class="col-md-12 mt-3">
    <label>Tabela de Requisito(s) Normativo(s)</label>
    
  <div id="resposta-tabela"></div>
    </div>    
        
        
        
		
		<div class="col-md-4 mb-4">
			<label>Frequência da revisão</label>
<input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['frequencia_revisao'] ?>">
		</div>
		
			<div class="col-md-4 mb-4">
			<label>Elaborado por</label>
			<input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['elaborado_por'] ?>">
		</div>
		
				<div class="col-md-4 mb-4">
			<label>Data planejada</label>
			<input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['data_planejada'] ?>">
		</div>
		
		
		<div class="col-md-4 mb-4">
			<label>Data Emissão do Doc</label>
			<input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['data_emissao'] ?>">
		</div>
		
			
			
		
		<div class="col-md-12">
		<input type="submit" value="Enviar para aprovação" class="btn btn-primary">
		
		</div>
		
</div>	
</div>		

<div id="conteudo2">
<h3 class="mb-4 mt-5 ml-4 mr-4">&nbsp;&nbsp;Cadastro classificação do documento</h3>	
    
    
      <div class="row ml-4 mr-4">  
        <div class="col-md-2">
            <label>Sigla</label>
           <input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['sigla_classificacao'] ?>">
        </div>
        
         <div class="col-md-5">
          <label>Descrição</label>
            <input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['descricao_classificacao'] ?>">
        </div>
        
         <div class="col-md-5">
            <label>Tipo de documento</label>
            <input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['tipo_documento_classificacao'] ?>">
        </div>
    </div>
    
</div>


<div id="conteudo3">
<h3 class="mb-4 mt-5 ml-4 mr-4">&nbsp;&nbsp;Cadastro de Referência e Requisitos Normativos</h3>

    <div class="row ml-4 mr-4">  
        <div class="col-md-2">
            <label>Nome</label>
            <input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['nome_referencia'] ?>">
        </div>
        
         <div class="col-md-5">
          <label>Descrição</label>
            <input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['descricao_referencia'] ?>">
        </div>
        
         <div class="col-md-5">
            <label>Requisito Normativo</label>
           <input type="text" class="form-control" name="cad-numero-revisao" id="cad-numero-revisao" readonly value="<?php echo $registros['requisito_normativo_referencia'] ?>">
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
			  data: 'codigo=<?php echo $codigo_procedimento ?>',
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
	
    
 	

</body>
</html>