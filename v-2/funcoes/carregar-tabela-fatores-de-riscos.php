<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	


$codigo_fator=$_POST['codigo_fator'];


?>
<div class="row">
<div class="col-md-12">
<table id="tabela-avaliacao-fatores-de-riscos" class="table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Evento</th>
				<th>Fator</th>
				<th>Área</th>
				<th>Processo</th>
				<th>Status</th>
              	
            </tr>
        </thead>
        <tbody>
		
<?php
	$selecao=mysqli_query($conexao,"select * from associacao_fator_risco WHERE codigo_fator='$codigo_fator'");
	while($registros=mysqli_fetch_array($selecao)){	
		
	$area=$registros['area']; 
	$processo=$registros['processo'];	
		
?>			
		<tr>
			<td><?php echo $registros['evento'] ?></td>
			<td><?php echo $registros['fator'] ?></td>
			<td>
			<?php
		$selecao_area=mysqli_query($conexao,"select * from areas WHERE id='$area' ");
		$registros_area=mysqli_fetch_array($selecao_area);
		echo $registros_area['area'];
			?>
			
			</td>
			<td>
				<?php
		$selecao_processo=mysqli_query($conexao,"select * from processos WHERE id='$processo' ");
		$registros_processo=mysqli_fetch_array($selecao_processo);
		echo $registros_processo['processo'];
			?>
			
			</td>
			<td><?php echo $registros['status'] ?></td>
		</tr>	
			
	<?php } ?>			
</table>			
</div>
	</div>


<script>
	$("#tabela-avaliacao-fatores-de-riscos").dataTable({
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
