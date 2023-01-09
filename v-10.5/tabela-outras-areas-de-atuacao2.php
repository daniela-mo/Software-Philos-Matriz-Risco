<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
<link rel="shortcut icon" href="imgs/favicon2.fw.png" />

<?php session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php'); 
if($obterdominio=='flextronics.com.br'){$obterdominio='Flextronics';}
if($obterdominio=='positivo.com.br'){$obterdominio='Positivo';}
@$usuario=$_SESSION['usuario'];

if(isset($_SESSION['usuario'])){}else{ ?>

<script>
location.href='index.php'
</script>

<?php
}
$codigo=$_POST['codigo'];
	mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');


$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario'");
$registros=mysqli_fetch_array($selecao);
$tipo=$registros['tipo'];
$id_usuario=$registros['id'];
$cod_grupo=$registros['grupo'];

?>
<div class="row mt-5">
		
		
		
		
		<div class="col-md-8">
		<table id="example3" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Área</th>
				<th>Empresa</th>
				<th>Ação</th>
              
            </tr>
        </thead>
        <tbody>
			<?php

			
				$selecao=mysqli_query($conexao,"select * from responsaveis_areas WHERE codigo_usuario='$codigo'");
				while($registros=mysqli_fetch_array($selecao)){
				$codigo_area=$registros['codigo_area'];
					
				$selecao_areas=mysqli_query($conexao,"select * from areas WHERE id='$codigo_area'");
				$registros_areas=mysqli_fetch_array($selecao_areas);	
				$codigo_empresa=$registros_areas['codigo_empresa'];	
				$numero=mysqli_num_rows($selecao_areas);	
					
				$selecao_empresa=mysqli_query($conexao,"select * from empresas WHERE id='$codigo_empresa'");
				$registros_empresa=mysqli_fetch_array($selecao_empresa);	
				if($numero==0){}else{	
			?>
			
			
			<?php if($registros_areas['area']!=''){?>
            <tr>
                <td><?php echo $registros_areas['area'];?></td>
				<td><?php echo $registros_empresa['razao_social'];?></td>
                <td><a onclick="DeletarOutrasAreas(<?php echo $registros['id'] ?>)"><i class="fa fa-trash"></i></a></td>
         
               
               
            </tr>
			<?php }} ?>
			<?php } ?>

        </tbody>
       
    </table>	
		
		</div>
		
		
		
		
					
	</div>	


	