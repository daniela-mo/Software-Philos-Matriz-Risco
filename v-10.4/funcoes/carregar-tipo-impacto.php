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
            <th>Item</th>
             <th>Descrição</th>
              <th>Baixa</th>
               <th>Média</th>
                <th>Alta</th>
                 <th>Muito Alta</th>
                 <th>Ação</th>
        </tr>
        
<?php
            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from tipo_impacto");
while($registros=mysqli_fetch_array($selecao)){
?>


<tr>
    <td><?php echo $registros['item'] ?></td>
     <td><?php echo $registros['descricao'] ?></td>
      <td><?php echo $registros['baixa'] ?></td>
       <td><?php echo $registros['media'] ?></td>
        <td><?php echo $registros['alta'] ?></td>
         <td><?php echo $registros['malta'] ?></td>
         <td>
			<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='25' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	 
			 <a class="pointer " style="color:black" onClick="EditarImpacto(<?php echo $registros['id'] ?>)"  data-toggle="modal" data-target="#ModalEditarImpacto">
		<i class="fa fa-edit"></a></i>
		<?php } ?>	 
			 
			 
			<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='25' and codigo_grupo='$cod_grupo' and excluir='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	 
			 <a   onClick="ExcluirTipoImpacto(<?php echo $registros['id'] ?>)"><i class="fa fa-trash"></i></a>
	
	<?php } ?>
	
	
	</td>
</tr>



<?php }?>
      
        
        </table>