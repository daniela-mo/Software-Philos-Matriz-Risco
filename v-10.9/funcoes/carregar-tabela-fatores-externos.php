<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
?>
<link rel="stylesheet" type="text/css" href="../css/datatable.css">





<table id="tabela-fatores-externos" class="display" style="width:100%">
        <thead>
            <tr>
				<th>Fator</th>
                <th>Área</th>
                <th>Processo</th>
             	<th>Momento</th>
				<th>Importância</th>
				<th>Análise</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
			<?php
	
				mysqli_query($conexao,"SET NAMES 'utf8'");
				mysqli_query($conexao,'SET character_set_connection=utf8');
				mysqli_query($conexao,'SET character_set_client=utf8');
				mysqli_query($conexao,'SET character_set_results=utf8');
			
				$selecao=mysqli_query($conexao,"select * from tabela_fatores_externos_temp");
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
				 <td><a class="text-dark"  href=""><?php echo $registros['momento'] ?></a></td>
				 <td><a class="text-dark"  href=""><?php echo $registros['importancia'] ?></a></td>
				
				 <td><a class="text-dark"  href=""><?php echo $registros['analise'] ?></a></td>
                <td>
					<a class="text-dark"  onClick="ExcluiFatoresExternos(<?php echo $registros['id']; ?>)">
					<i class="fa fa-trash" style="cursor: pointer"></i></a>
				
				</td>
				
				
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>




