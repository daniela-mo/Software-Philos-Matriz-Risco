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
            <th>Nome</th>
          
            
            <?php
            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
            $selecao_tabela=mysqli_query($conexao,"select * from tipo_impacto");
            while($registros_tabela=mysqli_fetch_array($selecao_tabela)){
            ?>
            <th><?php echo $registros_tabela['item'] ?></th>
            
            <?php } ?>
            

			<th></th>
        </tr>
        
    <?php
     mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	
	
        $selecao_parametrizacao=mysqli_query($conexao,"select * from parametrizacao");
        while($registros_parametrizacao=mysqli_fetch_array($selecao_parametrizacao)){
       
			
			$reputacao=$registros_parametrizacao['reputacao'];
			if($reputacao=='false'){$reputacao='não';}
			if($reputacao=='true'){$reputacao='sim';}

			$legal=$registros_parametrizacao['legal'];
			if($legal=='false'){$legal='não';}
			if($legal=='true'){$legal='sim';}

			$contratual=$registros_parametrizacao['contratual'];
			if($contratual=='false'){$contratual='não';}
			if($contratual=='true'){$contratual='sim';}

			$operacional=$registros_parametrizacao['operacional_estrategica'];
			if($operacional=='false'){$operacional='não';}
			if($operacional=='true'){$operacional='sim';}

			$seguranca=$registros_parametrizacao['seguranca'];
			 if($seguranca=='false'){$seguranca='não';}
			if($seguranca=='true'){$seguranca='sim';}
        
    ?>
        
        <tr>
            <td><?php echo $registros_parametrizacao['nome'] ?></td>
           
           
           <?php
     		$codigo=$registros_parametrizacao['id'];
            $selecao_tabela=mysqli_query($conexao,"select * from tipo_impacto");
            while($registros_tabela=mysqli_fetch_array($selecao_tabela)){
            $id=$registros_tabela['id'];
            
            $selecao_itens=mysqli_query($conexao,"select * from tabela_itens_parametrizacao WHERE item='$id' and codigo_parametrizacao='$codigo'");
            $registros_itens=mysqli_fetch_array($selecao_itens);
            $checkbox=$registros_itens['checkbox']
            ?>
            <td>
          <?php
           if($checkbox=='s'){$checkbox='sim';}
          if($checkbox==''){$checkbox='não';}
		  if($checkbox=='n'){$checkbox='não';}
          echo $checkbox;
          ?>
            </td>
            
            <?php } ?>
           
          
           
            <td> 
					 <?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='26' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	
				
				<a class="pointer" style="color:black" onClick="EditarParametrizacao(<?php echo $registros_parametrizacao['id'] ?>)"><i class="fa fa-edit"></a></i>
			<?php } ?>	
				
				
					 <?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='26' and codigo_grupo='$cod_grupo' and excluir='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	
				<a  style="cursor: pointer" onClick="ExcluirParametrizacao(<?php echo $registros_parametrizacao['id'] ?>)"><i class="fa fa-trash"></i></a>
			
			<?php } ?>
			
			
			</td>
        </tr>
        
        
        
        <?php } ?>
        
        
        
    </table>