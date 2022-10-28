<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo_contexto=$_REQUEST['codigo'];
?>
<link rel="stylesheet" type="text/css" href="../css/datatable.css">





<table id="tabela-fatores-internos" class="display" style="width:100%">
        <thead>
            <tr>
				<th>Fator</th>
                <th>Área</th>
                <th>Processo</th>
             	<th>Atendimento</th>
				<th>Importância</th>
				<th>Análise</th>
				<th>Ação</th>
            </tr>
        </thead>
        <tbody>
			<?php
	
				mysqli_query($conexao,"SET NAMES 'utf8'");
				mysqli_query($conexao,'SET character_set_connection=utf8');
				mysqli_query($conexao,'SET character_set_client=utf8');
				mysqli_query($conexao,'SET character_set_results=utf8');
			
				$selecao=mysqli_query($conexao,"select * from tabela_fatores_internos WHERE codigo_contexto='$codigo_contexto'");
				while($registros=mysqli_fetch_array($selecao)){
				$area=$registros['area'];
				$processo=$registros['processo'];
					
				$selecao2=mysqli_query($conexao,"select * from areas WHERE id='$area'");
				$registros2=mysqli_fetch_array($selecao2);	
				$area2=$registros2['area'];
				if($area2==''){$area2='-----------';};	
					
					
				$selecao3=mysqli_query($conexao,"select * from processos WHERE id='$processo'");
				$registros3=mysqli_fetch_array($selecao3);	
				$processo3=$registros3['processo'];
				if($processo3==''){$processo3='-----------';};		
					
			?>
            <tr>
				<td><a class="text-dark"  href=""><?php echo $registros['fator'] ?></a></td>
				
                <td><a class="text-dark"  href=""><?php echo $area2 ?></a></td>
				
                <td><a class="text-dark"  href=""><?php echo $processo3 ?></a></td>
				 <td><a class="text-dark"  href=""><?php echo $registros['atendimento'] ?></a></td>
				 <td><a class="text-dark"  href=""><?php echo $registros['importancia'] ?></a></td>
				 <td><a class="text-dark"  href=""><?php echo $registros['analise'] ?></a></td>
                <td>
					<a class="text-dark"  onClick="ExcluiFatoresInternos(<?php echo $registros['id']; ?>)">
					<i class="fa fa-trash" style="cursor: pointer"></i></a>
				
				</td>
				
				
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>


<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


<script>
    	
CarregarFatoresInternos()
	

</script>
