<?php
    session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


@$usuario=$_SESSION['usuario'];

$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario'");
$registros=mysqli_fetch_array($selecao);
$tipo=$registros['tipo'];
$id_usuario=$registros['id'];
$cod_grupo=$registros['grupo'];
?>

<table class="table table-striped">
        <tr>
            <th>ID</th>
             <th>Descrição</th>
             
                 <th></th>
        </tr>
        
<?php
    mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from medida_tratamento");
while($registros=mysqli_fetch_array($selecao)){
?>


<tr>
    <td><?php echo $registros['id'] ?></td>
     <td><?php echo $registros['descricao'] ?></td>
     
         <td>
			 
			 <?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='28' and codigo_grupo='$cod_grupo' and excluir='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	 
			 
			 <a  onClick="ExcluirMedidaTratamento(<?php echo $registros['id'] ?>)"><i class="fa fa-trash"></i></a>
	<?php } ?>
	
	
	</td>
</tr>



<?php }?>
      
        
        </table>