<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	

$fator=$_POST['fator'];

if($fator=='Forças'){
$analise='Força';	
$tabela='tabela_fatores_internos';	
}

if($fator=='Fraquezas'){
$analise='Fraqueza';		
$tabela='tabela_fatores_internos';	
}

if($fator=='Ameaças'){
$analise='Ameaça';		
$tabela='tabela_fatores_externos';	
}

if($fator=='Oportunidades'){
$analise='Oportunidade';		
$tabela='tabela_fatores_externos';	
}


$selecao=mysqli_query($conexao,"select * from $tabela WHERE analise='$analise' ");
$numero=mysqli_num_rows($selecao);
if($numero>0){
	
?>

<h3><?php echo $fator ?></h3>

<table id="tabela-fatores-de-riscos" class="table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Fator</th>
				<th>Tipo SWOT</th>
				<th>Nível de Criticidade</th>
				<th>Ação</th>
				<th></th>
              	
            </tr>
        </thead>
        <tbody>
			<?php
$selecao=mysqli_query($conexao,"select * from $tabela ");


	

	
	
while($registros=mysqli_fetch_array($selecao)){	
$codigo_contexto=$registros['codigo_contexto'];	
$area=$registros['area'];
$processo=$registros['processo'];	
$fator =  $registros['fator'];
$id=$registros['id']; 	
	
			?>
            <tr>
                <td><?php echo $registros['fator'] ?> </td>
               <td><?php echo $registros['analise'] ?></td>
				<td><?php echo $registros['atendimento'] ?></td>
				
		
   <td><?php if($tabela=='tabela_fatores_internos'){
				
		if($analise=='Força'){	
			$acao='Utilizar bem as forças para minimizar as ameaças identificadas. Não é necessário realizar o processo de avaliação de riscos para desenvolvimento de Plano de Ação.';
		}
				
		if($analise=='Fraqueza'){	
			$acao='Aproveitar o máximo possível as oportunidades para intensificar os pontos fortes da empresa. Há necessidade de mapear os riscos existentes para desenvolver Plano de Ação.';
		}		
				
				
			} ?>
				
			<?php echo $acao ?>	
	   
	   
				</td>
		
			<td><input type="button" class="btn btn-primary"  value="Riscos" style="background-color: #0069D9" data-toggle="modal" data-target="#ModalNovoRisco" onClick="LevarFator('<?php echo $fator ?>','<?php echo $id ?>')" >
				
		
				
            </tr>
			
			<?php } ?>			
			

        </tbody>
       
    </table>

<?php }else{ ?>

<h4>Sem registros para <strong><?php echo $fator ?></strong></h4>
<?php } ?>


<script>
	$(document).ready(function() {
    $('#tabela-fatores-de-riscos').DataTable();
} );
		
		
		
	$("#tabela-fatores-de-riscos").dataTable({
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

