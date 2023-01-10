<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
?>
<link rel="stylesheet" type="text/css" href="../css/datatable.css">







<table id="tabela-integrantes" class="display" style="width:100%">
        <thead>
            <tr>
				<th>N°</th>
                <th>Nome Completo</th>
                <th>Área</th>
				<th>Competência</th>
             	<th></th>
            </tr>
        </thead>
        <tbody>
			<?php
	
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from comites_participantes");
				while($registros=mysqli_fetch_array($selecao)){
				$codigo_usuario=$registros['codigo_usuario'];	
					
				$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo_usuario'");
				$registros_usuario=mysqli_fetch_array($selecao_usuario);
					
				$area=$registros['area'];	
			?>
            <tr>
				<td><a class="text-dark"  href="usuario.php?cod=<?php echo $codigo_usuario ?>"><?php echo $registros['id'] ?></a></td>
				
                <td><a class="text-dark"  href="usuario.php?cod=<?php echo $codigo_usuario ?>"><?php echo $registros['nome'] ?></a></td>
				
                <td><a class="text-dark"  href="usuario.php?cod=<?php echo $codigo_usuario ?>">
					
					
					<?php 
					$selecao_area=mysqli_query($conexao,"select * from areas WHERE id='$area'");
					$registros_areas=mysqli_fetch_array($selecao_area);
					echo $registros_areas['area']
					?></a></td>
				
				  <td><a class="text-dark"  href="usuario.php?cod=<?php echo $codigo_usuario ?>"><?php echo $registros['competencia'] ?></a></td>
				
                <td>
					<a class="text-dark"  onClick="ExcluiIntegrantes(<?php echo $registros['id']; ?>)">
					<i class="fa fa-trash" style="cursor: pointer"></i></a>
				
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

		
	TabelaIntegrantes()
		
	
	

</script>



