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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$codigo=$_REQUEST['cod']; 
?>	
<!-- Navegação !-->	
	
<form action="processa-atualizar-filial.php" method="post">	
	<div class="content-wrapper">
		<div class="container-fluid">
			
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Editar Filial</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
			<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from filiais WHERE id='$codigo'");
				$registros=mysqli_fetch_array($selecao);
				
				
			?>
			
			<input type="hidden" name="codigo" value="<?php echo $codigo ?>">
			
	<div class="row ml-4 mr-4">
		<div class="col-md-12">
			<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
			<h3 class="mb-4 mt-4">Editar Filial </h3>
		</div>

			<?php
				$selecao=mysqli_query($conexao,"select * from filiais WHERE id='$codigo'");
				$registros=mysqli_fetch_array($selecao);
				$id=$registros['id'];
				
			?>
			
		
		
		<div class="col-md-4 mb-4">
			<label>Razão Social</label>
			<input type="text" class="form-control" name="cad-razao-social" id="cad-razao-social" value="<?php echo $registros['razao_social'] ?>" >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Nome Fantasia</label>
			<input type="text" class="form-control" name="cad-nome-fantasia" id="cad-nome-fantasia" value="<?php echo $registros['nome_fantasia'] ?>" >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>CNPJ</label>
			<input type="text" class="form-control cnpj" name="cad-cnpj-matriz" id="cad-cnpj-matriz" value="<?php echo $registros['cnpj'] ?>" >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Inscrição Estadual</label>
			<input type="text" class="form-control" name="cad-inscricao-estadual" id="cad-inscricao-estadual" value="<?php echo $registros['inscricao_estadual'] ?>" >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Inscrição Municipal</label>
			<input type="text" class="form-control" name="cad-inscricao-municipal" id="cad-inscricao-municipal" value="<?php echo $registros['inscricao_municipal'] ?>">
		</div>
		
		<div class="col-md-4 mb-4">
			<label>CNAE</label>
			<input type="text" class="form-control" name="cad-cnae-matriz" id="cad-cnae-matriz" value="<?php echo $registros['cnae'] ?>" >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Atividade Econômica</label>
	<input type="text" class="form-control" name="cad-atividade-economica" id="cad-atividade-economica" value="<?php echo $registros['atividade_economica'] ?>" >
		</div>
		
			<div class="col-md-3 mb-4">
			<label>Data da Fundação</label>
			<input type="text" class="form-control datepicker" name="cad-data-fundacao" id="cad-data-fundacao" value="<?php echo $registros['data_fundacao'] ?>"  >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Pais</label>
		<select name="cad-pais" id="cad-pais" class="form-control">
			<option value="<?php echo $registros['pais'] ?>"><?php echo $registros['pais'] ?></option>
	<?php if($registros['pais']=='Brasil'){}else{ ?>
			<option value="Brasil" selected="selected">Brasil</option>
			<?php } ?>
	<option value="Afeganistão">Afeganistão</option>
	<option value="África do Sul">África do Sul</option>
	<option value="Albânia">Albânia</option>
	<option value="Alemanha">Alemanha</option>
	<option value="Andorra">Andorra</option>
	<option value="Angola">Angola</option>
	<option value="Anguilla">Anguilla</option>
	<option value="Antilhas Holandesas">Antilhas Holandesas</option>
	<option value="Antárctida">Antárctida</option>
	<option value="Antígua e Barbuda">Antígua e Barbuda</option>
	<option value="Argentina">Argentina</option>
	<option value="Argélia">Argélia</option>
	<option value="Armênia">Armênia</option>
	<option value="Aruba">Aruba</option>
	<option value="Arábia Saudita">Arábia Saudita</option>
	<option value="Austrália">Austrália</option>
	<option value="Áustria">Áustria</option>
	<option value="Azerbaijão">Azerbaijão</option>
	<option value="Bahamas">Bahamas</option>
	<option value="Bahrein">Bahrein</option>
	<option value="Bangladesh">Bangladesh</option>
	<option value="Barbados">Barbados</option>
	<option value="Belize">Belize</option>
	<option value="Benim">Benim</option>
	<option value="Bermudas">Bermudas</option>
	<option value="Bielorrússia">Bielorrússia</option>
	<option value="Bolívia">Bolívia</option>
	<option value="Botswana">Botswana</option>
	<option value="Brunei">Brunei</option>
	<option value="Bulgária">Bulgária</option>
	<option value="Burkina Faso">Burkina Faso</option>
	<option value="Burundi">Burundi</option>
	<option value="Butão">Butão</option>
	<option value="Bélgica">Bélgica</option>
	<option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
	<option value="Cabo Verde">Cabo Verde</option>
	<option value="Camarões">Camarões</option>
	<option value="Camboja">Camboja</option>
	<option value="Canadá">Canadá</option>
	<option value="Catar">Catar</option>
	<option value="Cazaquistão">Cazaquistão</option>
	<option value="Chade">Chade</option>
	<option value="Chile">Chile</option>
	<option value="China">China</option>
	<option value="Chipre">Chipre</option>
	<option value="Colômbia">Colômbia</option>
	<option value="Comores">Comores</option>
	<option value="Coreia do Norte">Coreia do Norte</option>
	<option value="Coreia do Sul">Coreia do Sul</option>
	<option value="Costa do Marfim">Costa do Marfim</option>
	<option value="Costa Rica">Costa Rica</option>
	<option value="Croácia">Croácia</option>
	<option value="Cuba">Cuba</option>
	<option value="Dinamarca">Dinamarca</option>
	<option value="Djibouti">Djibouti</option>
	<option value="Dominica">Dominica</option>
	<option value="Egito">Egito</option>
	<option value="El Salvador">El Salvador</option>
	<option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
	<option value="Equador">Equador</option>
	<option value="Eritreia">Eritreia</option>
	<option value="Escócia">Escócia</option>
	<option value="Eslováquia">Eslováquia</option>
	<option value="Eslovênia">Eslovênia</option>
	<option value="Espanha">Espanha</option>
	<option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
	<option value="Estados Unidos">Estados Unidos</option>
	<option value="Estônia">Estônia</option>
	<option value="Etiópia">Etiópia</option>
	<option value="Fiji">Fiji</option>
	<option value="Filipinas">Filipinas</option>
	<option value="Finlândia">Finlândia</option>
	<option value="França">França</option>
	<option value="Gabão">Gabão</option>
	<option value="Gana">Gana</option>
	<option value="Geórgia">Geórgia</option>
	<option value="Gibraltar">Gibraltar</option>
	<option value="Granada">Granada</option>
	<option value="Gronelândia">Gronelândia</option>
	<option value="Grécia">Grécia</option>
	<option value="Guadalupe">Guadalupe</option>
	<option value="Guam">Guam</option>
	<option value="Guatemala">Guatemala</option>
	<option value="Guernesei">Guernesei</option>
	<option value="Guiana">Guiana</option>
	<option value="Guiana Francesa">Guiana Francesa</option>
	<option value="Guiné">Guiné</option>
	<option value="Guiné Equatorial">Guiné Equatorial</option>
	<option value="Guiné-Bissau">Guiné-Bissau</option>
	<option value="Gâmbia">Gâmbia</option>
	<option value="Haiti">Haiti</option>
	<option value="Honduras">Honduras</option>
	<option value="Hong Kong">Hong Kong</option>
	<option value="Hungria">Hungria</option>
	<option value="Ilha Bouvet">Ilha Bouvet</option>
	<option value="Ilha de Man">Ilha de Man</option>
	<option value="Ilha do Natal">Ilha do Natal</option>
	<option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
	<option value="Ilha Norfolk">Ilha Norfolk</option>
	<option value="Ilhas Cayman">Ilhas Cayman</option>
	<option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
	<option value="Ilhas Cook">Ilhas Cook</option>
	<option value="Ilhas Feroé">Ilhas Feroé</option>
	<option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
	<option value="Ilhas Malvinas">Ilhas Malvinas</option>
	<option value="Ilhas Marshall">Ilhas Marshall</option>
	<option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
	<option value="Ilhas Salomão">Ilhas Salomão</option>
	<option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
	<option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
	<option value="Ilhas Åland">Ilhas Åland</option>
	<option value="Indonésia">Indonésia</option>
	<option value="Inglaterra">Inglaterra</option>
	<option value="Índia">Índia</option>
	<option value="Iraque">Iraque</option>
	<option value="Irlanda do Norte">Irlanda do Norte</option>
	<option value="Irlanda">Irlanda</option>
	<option value="Irã">Irã</option>
	<option value="Islândia">Islândia</option>
	<option value="Israel">Israel</option>
	<option value="Itália">Itália</option>
	<option value="Iêmen">Iêmen</option>
	<option value="Jamaica">Jamaica</option>
	<option value="Japão">Japão</option>
	<option value="Jersey">Jersey</option>
	<option value="Jordânia">Jordânia</option>
	<option value="Kiribati">Kiribati</option>
	<option value="Kuwait">Kuwait</option>
	<option value="Laos">Laos</option>
	<option value="Lesoto">Lesoto</option>
	<option value="Letônia">Letônia</option>
	<option value="Libéria">Libéria</option>
	<option value="Liechtenstein">Liechtenstein</option>
	<option value="Lituânia">Lituânia</option>
	<option value="Luxemburgo">Luxemburgo</option>
	<option value="Líbano">Líbano</option>
	<option value="Líbia">Líbia</option>
	<option value="Macau">Macau</option>
	<option value="Macedônia">Macedônia</option>
	<option value="Madagáscar">Madagáscar</option>
	<option value="Malawi">Malawi</option>
	<option value="Maldivas">Maldivas</option>
	<option value="Mali">Mali</option>
	<option value="Malta">Malta</option>
	<option value="Malásia">Malásia</option>
	<option value="Marianas Setentrionais">Marianas Setentrionais</option>
	<option value="Marrocos">Marrocos</option>
	<option value="Martinica">Martinica</option>
	<option value="Mauritânia">Mauritânia</option>
	<option value="Maurícia">Maurícia</option>
	<option value="Mayotte">Mayotte</option>
	<option value="Moldávia">Moldávia</option>
	<option value="Mongólia">Mongólia</option>
	<option value="Montenegro">Montenegro</option>
	<option value="Montserrat">Montserrat</option>
	<option value="Moçambique">Moçambique</option>
	<option value="Myanmar">Myanmar</option>
	<option value="México">México</option>
	<option value="Mônaco">Mônaco</option>
	<option value="Namíbia">Namíbia</option>
	<option value="Nauru">Nauru</option>
	<option value="Nepal">Nepal</option>
	<option value="Nicarágua">Nicarágua</option>
	<option value="Nigéria">Nigéria</option>
	<option value="Niue">Niue</option>
	<option value="Noruega">Noruega</option>
	<option value="Nova Caledônia">Nova Caledônia</option>
	<option value="Nova Zelândia">Nova Zelândia</option>
	<option value="Níger">Níger</option>
	<option value="Omã">Omã</option>
	<option value="Palau">Palau</option>
	<option value="Palestina">Palestina</option>
	<option value="Panamá">Panamá</option>
	<option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
	<option value="Paquistão">Paquistão</option>
	<option value="Paraguai">Paraguai</option>
	<option value="País de Gales">País de Gales</option>
	<option value="Países Baixos">Países Baixos</option>
	<option value="Peru">Peru</option>
	<option value="Pitcairn">Pitcairn</option>
	<option value="Polinésia Francesa">Polinésia Francesa</option>
	<option value="Polônia">Polônia</option>
	<option value="Porto Rico">Porto Rico</option>
	<option value="Portugal">Portugal</option>
	<option value="Quirguistão">Quirguistão</option>
	<option value="Quênia">Quênia</option>
	<option value="Reino Unido">Reino Unido</option>
	<option value="República Centro-Africana">República Centro-Africana</option>
	<option value="República Checa">República Checa</option>
	<option value="República Democrática do Congo">República Democrática do Congo</option>
	<option value="República do Congo">República do Congo</option>
	<option value="República Dominicana">República Dominicana</option>
	<option value="Reunião">Reunião</option>
	<option value="Romênia">Romênia</option>
	<option value="Ruanda">Ruanda</option>
	<option value="Rússia">Rússia</option>
	<option value="Saara Ocidental">Saara Ocidental</option>
	<option value="Saint Martin">Saint Martin</option>
	<option value="Saint-Barthélemy">Saint-Barthélemy</option>
	<option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
	<option value="Samoa Americana">Samoa Americana</option>
	<option value="Samoa">Samoa</option>
	<option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
	<option value="Santa Lúcia">Santa Lúcia</option>
	<option value="Senegal">Senegal</option>
	<option value="Serra Leoa">Serra Leoa</option>
	<option value="Seychelles">Seychelles</option>
	<option value="Singapura">Singapura</option>
	<option value="Somália">Somália</option>
	<option value="Sri Lanka">Sri Lanka</option>
	<option value="Suazilândia">Suazilândia</option>
	<option value="Sudão">Sudão</option>
	<option value="Suriname">Suriname</option>
	<option value="Suécia">Suécia</option>
	<option value="Suíça">Suíça</option>
	<option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
	<option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
	<option value="São Marino">São Marino</option>
	<option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
	<option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
	<option value="Sérvia">Sérvia</option>
	<option value="Síria">Síria</option>
	<option value="Tadjiquistão">Tadjiquistão</option>
	<option value="Tailândia">Tailândia</option>
	<option value="Taiwan">Taiwan</option>
	<option value="Tanzânia">Tanzânia</option>
	<option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
	<option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
	<option value="Timor-Leste">Timor-Leste</option>
	<option value="Togo">Togo</option>
	<option value="Tonga">Tonga</option>
	<option value="Toquelau">Toquelau</option>
	<option value="Trinidad e Tobago">Trinidad e Tobago</option>
	<option value="Tunísia">Tunísia</option>
	<option value="Turcas e Caicos">Turcas e Caicos</option>
	<option value="Turquemenistão">Turquemenistão</option>
	<option value="Turquia">Turquia</option>
	<option value="Tuvalu">Tuvalu</option>
	<option value="Ucrânia">Ucrânia</option>
	<option value="Uganda">Uganda</option>
	<option value="Uruguai">Uruguai</option>
	<option value="Uzbequistão">Uzbequistão</option>
	<option value="Vanuatu">Vanuatu</option>
	<option value="Vaticano">Vaticano</option>
	<option value="Venezuela">Venezuela</option>
	<option value="Vietname">Vietname</option>
	<option value="Wallis e Futuna">Wallis e Futuna</option>
	<option value="Zimbabwe">Zimbabwe</option>
	<option value="Zâmbia">Zâmbia</option>
</select>
		</div>
		
		<div class="col-md-3 mb-4">
			<label>CEP(Formato: 99999-999)</label>
			<input type="text" class="form-control cep" name="cad-cep" id="cad-cep" value="<?php echo $registros['cep'] ?>"  >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Logradouro</label>
			<input type="text" class="form-control" name="cad-logradouro" id="cad-logradouro" value="<?php echo $registros['logradouro'] ?>" >
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Número</label>
			<input type="number" class="form-control" name="cad-numero" id="cad-numero" value="<?php echo $registros['numero'] ?>" >
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Complemento</label>
			<input type="text" class="form-control" name="cad-complemento" id="cad-complemento" value="<?php echo $registros['complemento'] ?>" >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Bairro</label>
			<input type="text" class="form-control" name="cad-bairro" id="cad-bairro" value="<?php echo $registros['bairro'] ?>" >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Cidade</label>
			<input type="text" class="form-control" name="cad-cidade" id="cad-cidade" value="<?php echo $registros['cidade'] ?>" >
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Estado</label>
			<input type="text" class="form-control" name="cad-estado" id="cad-estado" value="<?php echo $registros['estado'] ?>" >
		</div>
		
		<div class="col-md-5 mb-4">
			<label>E-mail</label>
			<input type="email" class="form-control" name="cad-email" id="cad-email" value="<?php echo $registros['email'] ?>" >
		</div>
		
		<div class="col-md-5 mb-4">
			<label>Site</label>
			<input type="url" class="form-control" name="cad-site" id="cad-site" value="<?php echo $registros['site'] ?>" >
		</div>
		
		<div class="col-md-3 mb-4">
			<label>Telefone</label>
			<input type="text" class="form-control telefone" name="cad-telefone" id="cad-telefone" value="<?php echo $registros['telefone'] ?>" >
		</div>
		
		
		
		
</div>	
		
<div class="row ml-4 mr-4">		

	
	
	<div class="col-md-12 mb-4">
			<label>Observações Adicionais</label>
	<textarea rows="10" class="form-control" name="cad-observacoes-adicionais" id="cad-observacoes-adicionais" ><?php echo $registros['observacoes'] ?></textarea>
	
		
		</div>
		<div class="col-md-12">
		<input type="submit" class="btn btn-primary" value="Atualizar Cadastro">
	</div>
		
			
		</div>
			
			

	
	
	
	
	
	
	

			
			
			
			
	</div>
</form>	
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>
	
			  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	  <script>
	$f=jQuery.noConflict()	 
		  
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
  </script>	
	
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
		
		
		
	$("#example").dataTable({
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
</body>
</html>