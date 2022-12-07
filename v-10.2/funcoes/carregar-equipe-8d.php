    <?php
    
   session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
    
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

    
        ?>
        
<table id="tabela_equipe_responsavel_8d" class="display mt-5" style="width:100%">
        <thead>
            <tr>
                <th>Responsável</th>
                <th>Área</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
			<?php
			
			
			$selecao=mysqli_query($conexao,"select * from 8d_equipe_responsavel_temp ");
			while($registros=mysqli_fetch_array($selecao)){
			
				
			
			
				
			?>
            <tr>
               
               <td><?php echo $registros['responsavel'] ?></td>
				<td><?php echo $registros['area'] ?></td>
				
                <td>
					
					<a class="text-dark"  onClick="ExcluirResponsavel8d(<?php echo $registros['id']; ?>)">
					<i class="fa fa-trash" style="cursor: pointer"></i></a>
				
				
				</td>
              
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>	

<script>

				$f(document).ready(function() {
    $f('#tabela_equipe_responsavel_8d').DataTable();
} );
		
		
		
	$f("#tabela_equipe_responsavel_8d").dataTable({
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


