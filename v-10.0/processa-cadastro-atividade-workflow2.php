<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
$codigo=$_POST['codigo'];
$tarefa=$_POST['tarefa'];
$descricao=$_POST['descricao'];
$descricao=addslashes($descricao);
$data_inicio=$_POST['datainicio'];


$dia1=substr($data_inicio,0,2);
$mes1=substr($data_inicio,3,2);
$ano1=substr($data_inicio,6,4);

	
				
if($dia1>31){ ?>
<script>
	alert("Campo 'Dia' em Data de Início preenchido incorretamente!")
	window. history. back();
</script>
<?php }
				
else if($mes1>=12){	?>
<script>
	alert("Campo 'Mês' em Data de Início preenchido incorretamente!")
	window. history. back();
</script>	
<?php }				
else if($ano1<=1999){ ?>
<script>
	alert("Campo 'Ano' em Data de Início preenchido incorretamente!")
	window. history. back();
</script>
<?php	}					
else{		



$data_termino=$_POST['datatermino'];
	
	
$dia1=substr($data_termino,0,2);
$mes1=substr($data_termino,3,2);
$ano1=substr($data_termino,6,4);

	
				
if($dia1>31){ ?>
<script>
	alert("Campo 'Dia' em Data de Término preenchido incorretamente!")
	window. history. back();
</script>
<?php }
				
else if($mes1>=12){	?>
<script>
	alert("Campo 'Mês' em Data de Término preenchido incorretamente!")
	window. history. back();
</script>	
<?php }				
else if($ano1<=1999){ ?>
<script>
	alert("Campo 'Ano' em Data de Término preenchido incorretamente!")
	window. history. back();
</script>
<?php	}					
else{		
	
	
	
	
	
	
$envolvido=$_POST['envolvido'];
$data_criacao=date('d-m-Y');
$hora_criacao=date('H:m:s');

$marco=$_POST['marco'];
$periodicidade=$_POST['periodicidade'];
$status=$_POST['status'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$inserir=mysqli_query($conexao,"insert into atividades_planejamento_workflow(tarefa,descricao,data,hora,codigo_planejamento,data_inicio,data_termino,codigo_fase,envolvido,status,periodicidade)values('$tarefa','$descricao','$data_criacao','$hora_criacao','$codigo','$data_inicio','$data_termino','$marco','$envolvido','$status','$periodicidade')");

if($inserir){ ?>

<script>
	
</script>
	
<?php }else{ ?>
<script>
	
</script>	

<?php }}} ?>



