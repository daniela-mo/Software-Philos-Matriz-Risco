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
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	
?>	
<!-- Navegação !-->	
	
<form action="processa-cadastro-empresa-matriz.php" method="post">	
	<div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-12">
					
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Cadastro Empresa</h3>			
				
	<div class="row ml-4 mr-4">
		<div class="col-md-2 mb-4">
			<label>Número Cad.</label>
			<?php
				$selecao=mysqli_query($conexao,"select * from empresas");
				$registros=mysqli_fetch_array($selecao);
				$id=$registros['id'];
				if($id==''){$id='0';}
			?>
			
			<input type="number" class="form-control" name="cad-num" id="cad-num" value="<?php echo $id+1 ?>" readonly >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Razão Social</label>
			<input type="text" class="form-control" name="cad-razao-social" id="cad-razao-social">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Nome Fantasia</label>
			<input type="text" class="form-control" name="cad-nome-fantasia" id="cad-nome-fantasia">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>CNPJ Matriz</label>
			<input type="text" class="form-control cnpj" name="cad-cnpj" id="cad-cnpj">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Inscrição Estadual</label>
			<input type="text" class="form-control" name="cad-inscricao-estadual" id="cad-inscricao-estadual">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Inscrição Municipal</label>
			<input type="text" class="form-control" name="cad-inscricao-municipal" id="cad-inscricao-municipal">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>CNAE</label>
			<input type="text" class="form-control" name="cad-cnae" id="cad-cnae">
		</div>
		
		<div class="col-md-2 mb-4">
			<label>CEP</label>
			<input type="text" class="form-control cep" name="cad-cep" id="cad-cep">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Logradouro</label>
			<input type="text" class="form-control" name="cad-logradouro" id="cad-logradouro">
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Número</label>
			<input type="number" class="form-control" name="cad-numero" id="cad-numero">
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Complemento</label>
			<input type="text" class="form-control" name="cad-complemento" id="cad-complemento">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Bairro</label>
			<input type="text" class="form-control" name="cad-bairro" id="cad-bairro">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Cidade</label>
			<input type="text" class="form-control" name="cad-cidade" id="cad-cidade">
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Estado</label>
			<input type="text" class="form-control" name="cad-estado" id="cad-estado">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Possui Estrutura de Organograma ?</label>
			<select class="form-control" name="cad-estrutura-organograma" id="cad-estrutura-organograma">
				<option>Sim</option>
				<option>Não</option>
			</select>
		</div>
</div>	
		
<div class="row ml-4 mr-4">		
		<div class="col-md-4 mb-4">
			<label>Função</label>
	<input type="checkbox" name="cad-funcao" value="Importador" > Importador<br>
	<input type="checkbox" name="cad-funcao" value="Exportador" > Exportador<br>
	<input type="checkbox" name="cad-funcao" value="Transportadora" > Transportadora<br>	
	<input type="checkbox" name="cad-funcao" value="Agente de Cargas" > Agente de Cargas<br>
	<input type="checkbox" name="cad-funcao" value="Dep/Redex" > Dep/Redex<br>
	<input type="checkbox" name="cad-funcao" value="Operador Portuário" > Operador Portuário<br>
	<input type="checkbox" name="cad-funcao" value="Operador Aeroportuário" > Operador Aeroportuário<br>		
		</div>
		
		
		
		<div class="col-md-4 mb-4">
			<label>Tipo de Certificação</label>
	<input type="checkbox" name="cad-tipo-certificacao" value="OEA - Conformidade" > OEA - Conformidade<br>
	<input type="checkbox" name="cad-tipo-certificacao" value="OEA - Segurança" > OEA - Segurança<br>
		
		</div>
		
	<div class="col-md-12 mb-4">		
			<h3 class="mb-4 mt-4 ">Cadastro Empresa Matriz</h3>	
	</div>	
	
					
		<div class="col-md-4 mb-4">
			<label>CNPJ Matriz</label>
	<input type="text" class="form-control cnpj" name="cad-cnpj-matriz" id="cad-cnpj-matriz">
		</div>
	
			<div class="col-md-4 mb-4">
			<label>CNAE</label>
	<input type="text" class="form-control" name="cad-cnae-matriz" id="cad-cnae-matriz">
		</div>
	
			<div class="col-md-4 mb-4">
			<label>Atividade Econômica</label>
	<input type="text" class="form-control" name="cad-atividade-economica" id="cad-atividade-economica">
		</div>
	
		
				<div class="col-md-3 mb-4">
			<label>Comércio Exterior?</label>
	<select class="form-control" name="cad-comercio-exterior">
		<option>Sim</option>
		<option>Não</option>
	</select>
		</div>
		
		<div class="col-md-3 mb-4">
			<label>Volume Importação</label>
			<input type="text" class="form-control" name="cad-volume-importacao" id="cad-volume-importacao">
		</div>
		
			<div class="col-md-3 mb-4">
			<label>Volume Exportação</label>
			<input type="text" class="form-control" name="cad-volume-exportacao" id="cad-volume-exportacao">
		</div>
		
		<div class="col-md-12 mb-4">
			<label>Observações Adicionais</label>
			<textarea cols="30" rows="5" class="form-control" name="cad-observacoes-adicionais" id="cad-observacoes-adicionais"></textarea>
		</div>
	
	
	
	
	<div class="col-md-12 mb-4">		
			<h3 class="mb-4 mt-4 ">Cadastro Empresa - Filiais</h3>	
	</div>	
	
					
		<div class="col-md-4 mb-4">
			<label>CNPJ Filial</label>
	<input type="text" class="form-control cnpj" name="cad-cnpj-filial[]" id="cad-cnpj-filial">
		</div>
	
			<div class="col-md-4 mb-4">
			<label>CNAE</label>
	<input type="text" class="form-control cnpj" name="cad-cnae-filial[]" id="cad-cnae-filial">
		</div>
	
			<div class="col-md-4 mb-4">
			<label>Atividade Econômica</label>
	<input type="text" class="form-control" name="cad-atividade-filial[]" id="cad-atividade-filial">
		</div>
	
		
				<div class="col-md-3 mb-4">
			<label>Comércio Exterior?</label>
	<select class="form-control" name="cad-comercio-exterior-filial[]">
		<option>Sim</option>
		<option>Não</option>
	</select>
		</div>
		
		<div class="col-md-3 mb-4">
			<label>Volume Importação</label>
			<input type="text" class="form-control" name="cad-volume-importacao-filial[]" id="cad-volume-importacao-filial">
		</div>
		
			<div class="col-md-3 mb-4">
			<label>Volume Exportação</label>
			<input type="text" class="form-control" name="cad-volume-exportacao-filial[]" id="cad-volume-exportacao-filial">
		</div>
		
		<div class="col-md-12 mb-4">
			<label>Observações Adicionais</label>
			<textarea cols="30" rows="5" class="form-control" name="cad-observacoes-adicionais-filial[]" id="cad-observacoes-adicionais-filial"></textarea>
		</div>
	
	
	
	<div class="col-md-12 mb-4">		
			<h3 class="mb-4 mt-4 ">Cadastro Empresa - Terceiros Atrelados a Cadeia Logística Internacional <img src="imgs/icone-mais.png" width="30" height="30" alt=""/></h3>	
	</div>	
	
	
				
		<div class="col-md-4 mb-4">
			<label>CNPJ Terceiros</label>
	<input type="text" class="form-control cnpj" name="cad-cnpj-terceiro[]" id="cad-cnpj-terceiro">
		</div>
	
			<div class="col-md-4 mb-4">
			<label>CNAE</label>
	<input type="text" class="form-control" name="cad-cnae-terceiro[]" id="cad-cnae-terceiro">
		</div>
	
			<div class="col-md-4 mb-4">
			<label>Atividade Econômica</label>
	<input type="text" class="form-control" name="cad-atividade-terceiro[]" id="cad-atividade-terceiro">
		</div>
	
		
				<div class="col-md-3 mb-4">
			<label>Comércio Exterior?</label>
	<select class="form-control" name="cad-comercio-exterior-terceiro[]">
		<option>Sim</option>
		<option>Não</option>
	</select>
		</div>
		
		<div class="col-md-3 mb-4">
			<label>Volume Importação</label>
			<input type="text" class="form-control" name="cad-volume-importacao-terceiro[]" id="cad-volume-importacao-terceiro">
		</div>
		
			<div class="col-md-3 mb-4">
			<label>Volume Exportação</label>
			<input type="text" class="form-control" name="cad-volume-exportacao-terceiro[]" id="cad-volume-exportacao-terceiro">
		</div>
		
		
</div>
					
					
<div class="row ml-4 mr-4">		
	
	<div class="col-md-3 mb-4">
		<label>Tipo de Operação</label>
		<input type="checkbox" name="cad-tipo-operacao-terceiro[]" value="Transportadora"> Transportadora<br>
		<input type="checkbox" name="cad-tipo-operacao-terceiro[]" value="Agente de Carga"> Agente de Carga<br>
		<input type="checkbox" name="cad-tipo-operacao-terceiro[]" value="Comissária de despacho"> Comissária de Despacho<br>
		<input type="checkbox" name="cad-tipo-operacao-terceiro[]" value="Armazém"> Armazém
	</div>
	
	<div class="col-md-3 mb-4">
		<label>Tipo de Frete</label>
		<input type="checkbox" name="tipo-frete-terceiro[]" value="interno" > Interno<br>
		<input type="checkbox" name="tipo-frete-terceiro[]" value="internacional"> Internacional<br>
	</div>
	
		<div class="col-md-3 mb-4">
		<label>Modal</label>
		<input type="checkbox" name="modal-terceiro[]" value="Aéreo"> Aéreo<br>
		<input type="checkbox" name="modal-terceiro[]" value="Maritimo"> Maritimo<br>
		<input type="checkbox" name="modal-terceiro[]" value="Terrestre"> Terrestre<br>	
	</div>
	
	
	<div class="col-md-3 mb-4">
		<label>Função</label>
		<input type="checkbox" name="cad-funcao[]" value="Importador" > Importador<br>
		<input type="checkbox" name="cad-funcao[]" value="Exportador" > Exportador<br>
		<input type="checkbox" name="cad-funcao[]" value="Transportadora" > Transportadora<br>	
		<input type="checkbox" name="cad-funcao[]" value="Agente de Cargas" > Agente de Cargas<br>
		<input type="checkbox" name="cad-funcao[]" value="Dep/Redex" > Dep/Redex<br>
		<input type="checkbox" name="cad-funcao[]" value="Operador Portuário" > Operador Portuário<br>
		<input type="checkbox" name="cad-funcao[]" value="Operador Aeroportuário" > Operador Aeroportuário<br>	

	</div>
	
	<div class="col-md-12 mb-4">
			<label>Observações Adicionais</label>
			<textarea cols="30" rows="5" class="form-control" name="cad-observacoes-adicionais-terceiro" id="cad-observacoes-adicionais-terceiro"></textarea>
		</div>
	
		
		<div class="col-md-12">
			<input type="submit" class="btn btn-primary" value="Cadastrar">
		</div>
		
					
	</div>				
					
				</div>
			</div>
		</div>

	</div>
</form>	
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script src="js/jquery.mask.min.js"></script>
	
	
	<script>
	$b=jQuery.noConflict();	
	
$b(document).ready(function(){ 
$b('.cep').mask('99999-999');
$b('.cnpj').mask('99.999.999/9999-99');
	
	
}); 
	
	</script>
	

</body>
</html>