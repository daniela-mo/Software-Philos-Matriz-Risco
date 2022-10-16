<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
?>
<link rel="stylesheet" type="text/css" href="../css/datatable.css">







<table id="tabela-comites" class="display" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nome</th>
              <th>Tipo</th>
				<th>Data</th>
				<th>Inicio</th>
				<th>Término</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
			<?php
	
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from comites_atas");
				while($registros=mysqli_fetch_array($selecao)){
			?>
            <tr>
                <td><a class="text-dark" href="ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['id'] ?></a></td>
				
                <td><a class="text-dark" href="ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['nome'] ?></a></td>
               
				 <td><a class="text-dark" href="ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['tipo'] ?></a></td>
				
				<td><a class="text-dark" href="ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['data'] ?></a></td>
				
				<td><a class="text-dark" href="ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['inicio'] ?></a></td>
				
				<td><a class="text-dark" href="ata.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['termino'] ?></a></td>
				
				 <td>
					
					
					<i class="fa fa-edit" style="cursor: pointer" data-toggle="modal" data-target="#ModalEditarCronograma" onClick="EditarModalCronograma(<?php echo $registros['id'] ?>)" ></i>	
						
						
						<a class="text-dark"  onClick="ExcluirAtas(<?php echo $registros['id']; ?>)"><i class="fa fa-trash" style="cursor: pointer"></i></a>
				
				</td>
               
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
$bbbb=jQuery.noConflict()	
	
$bbbb(document).ready(function() {
	

		
   
	
	
	
	
} );
		
	$bbbb("#tabela-comites").dataTable({
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



