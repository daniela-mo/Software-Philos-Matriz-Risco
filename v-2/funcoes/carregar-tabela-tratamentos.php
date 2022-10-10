<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo=$_POST['codigo'];


?>
<link rel="stylesheet" type="text/css" href="../css/datatable.css">







<table id="tabela-tratamentos" class="display" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>Atividade</th>
              	<th>Assunto</th>
				<th>Data Prevista</th>
				<th>Status</th>
				<th>Responsável</th>
				<th>Ação</th>
            </tr>
			
			
        </thead>
        <tbody>
			<?php
	
				mysqli_query($conexao,"SET NAMES 'utf8'");
				mysqli_query($conexao,'SET character_set_connection=utf8');
				mysqli_query($conexao,'SET character_set_client=utf8');
				mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from comites_tratamentos WHERE codigo_ata='$codigo'");
				while($registros=mysqli_fetch_array($selecao)){
					$codigo_resp=$registros['responsavel'];
					
					
			?>
            <tr>
                <td><?php echo $registros['id'] ?></td>
				
                <td><?php echo $registros['atividade'] ?></td>
               
				 <td><?php echo $registros['codigo_assunto'] ?></td>
				
				<td><?php echo $registros['data_prevista'] ?></td>
				
				<td><?php echo $registros['status'] ?></td>
				
				<td><?php
				
			
			$selecao1=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo_resp'");
			$registros1=mysqli_fetch_array($selecao1);
			 
				
				
				
				echo $registros1['email'] ?></td>
              <td><i class="fa fa-trash pointer" onClick="ExcluirTratamento(<?php echo $registros['id'] ?>)"></i></td> 
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>


<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


<script>
$b=jQuery.noConflict()	
	
$b(document).ready(function() {
	

		
   
	
	
	
	
} );
		
	$b("#tabela-tratamentos").dataTable({
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



