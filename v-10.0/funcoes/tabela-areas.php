<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
<link rel="shortcut icon" href="imgs/favicon.fw.png" />

<?php session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php'); 
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

$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario'");
$registros=mysqli_fetch_array($selecao);
$tipo=$registros['tipo'];
$id_usuario=$registros['id'];
$cod_grupo=$registros['grupo'];

?>
<div class="row ml-4 mr-4 mt-5">
		
	<div class="alert alert-danger ml-2" role="alert">
<strong> Alerta:</strong> Ao apagar a área raíz todas as áreas contidas no organograma serão apagadas automáticamente!
</div>	
		
		
		<div class="col-md-8">
		<table id="tabela" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Área</th>
                <th>Área Mãe</th>
				<th>Ação</th>
              
            </tr>
        </thead>
        <tbody>
			<?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from areas WHERE codigo_empresa='$codigo'");
				while($registros=mysqli_fetch_array($selecao)){
				$area= $registros['area'];
				$area_mae= $registros['codigo_area_mae'];	
			?>
            <tr>
                <td><?php echo $area ?></td>
                <td>
					<?php
					$selecao2=mysqli_query($conexao,"select * from areas WHERE id='$area_mae' and codigo_empresa='$codigo'");
					$registros2=mysqli_fetch_array($selecao2);
					$exibir_area=$registros2['area'];
					?>
					<?php if($exibir_area==''){$exibir_area='Raiz/principal';}?>
					
					<?php echo $exibir_area  ?>
					
				
				</td>
               <td>
				  	 <?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='3' and codigo_grupo='$cod_grupo' and excluir='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	   
				   
				   <a href="" onClick="Excluir(<?php echo $registros['id']; ?>)"><i class="fa fa-trash" style="cursor: pointer"></i></a>
				 <?php } ?>  
					  	 <?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='3' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){ 	
			?>   
				&nbsp;&nbsp;<a href="editar-area.php?codigo=<?php echo $registros['id']; ?>"><i class="fa fa-edit"></i></a>
				   
			 <?php  } ?>	   
				   
				</td>
               
               
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>	
		
		</div>
		
		
		
		
					
	</div>	



<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	
	
	
	
	<script>

		
		
		
	$j("#tabela").dataTable({
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