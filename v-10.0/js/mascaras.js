	$b=jQuery.noConflict();	
	
$b(document).ready(function(){ 
$b('.cep').mask('99999-999');
$b('.cnpj').mask('99.999.999/9999-99');
$b('.telefone').mask('(99) 99999-9999');	
$b('.cpf').mask('999.999.999-99');
$b('.horario').mask('99:99');
$b('.data').mask('99/99/9999');		
}); 