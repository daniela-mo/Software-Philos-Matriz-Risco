<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo=$_POST['codigo'];
?>
<link rel="stylesheet" type="text/css" href="../css/datatable.css">



<table id="tabela-membros" class="display" style="width:100%">
        <thead>
            <tr>
				<th>Código</th>
                <th>Nome</th>
				<th>Email</th>
             	
            </tr>
        </thead>
        <tbody>
			<?php
	
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from tabela_contexto_membros WHERE cod_swot='$codigo' ");
				while($registros=mysqli_fetch_array($selecao)){
									
			?>
            <tr>
				<td><a class="text-dark"  href="usuario.php?cod=<?php echo $codigo_usuario ?>"><?php echo $registros['id'] ?></a></td>
				
                <td><a class="text-dark"  href="usuario.php?cod=<?php echo $codigo_usuario ?>"><?php echo $registros['nome_usuario'] ?></a></td>
				
                <td><a class="text-dark"  href="usuario.php?cod=<?php echo $codigo_usuario ?>"><?php echo $registros['email_usuario'] ?></a></td>
				
               
				
				
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
	
		
	$b("#tabela-membros").dataTable({
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



