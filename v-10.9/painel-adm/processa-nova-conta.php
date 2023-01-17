<?php
include('../conexao.php');


function copia_ficheiros($origem, $destino){
    //O nome das pastas tem de terminar em "/" ou ""(win).
    if (is_dir($origem)) {
        if (is_dir($destino)) {
            if ($dir = opendir($origem)) {
                while (($ficheiro = readdir($dir)) !== false) {
                    if (!is_dir($origem.$ficheiro)) {
                        copy($origem.$ficheiro, $destino.$ficheiro);
                    }
                }
                closedir($dir);
            }
        }else{
            echo "A pasta $destino não existe.";
        }
    }else{
        echo "A pasta $origem não existe.";
    }
}


	
$empresa= $_POST['cad-empresa'];
$cnpj= $_POST['cad-cnpj'];
$prefixo= $_POST['cad-prefixo'];

$str1 = str_replace('www.', '', $prefixo);

$str2 = str_replace('http://', '', $str1);

$str3 = str_replace('https://', '', $str2);


$caminho= $_POST['cad-caminho'];
$data=date('d-m-Y');
$hora=date('H:i:s');

$servidor= $_POST['cad-servidor'];
$banco= $_POST['cad-banco'];
$usuario= $_POST['cad-usuario'];
$senha= $_POST['cad-senha'];


$selecao=mysqli_query($conexao,"select * from empresas_cadastradas WHERE prefixo='$str1'");
$numero=mysqli_num_rows($selecao);
if($numero==0){

$inserir=mysqli_query($conexao,"insert into empresas_cadastradas(empresa,cnpj,prefixo,caminho,data_cad,hora_cad,servidor,banco,usuario,senha)values('$empresa','$cnpj','$str3','$str3','$data','$hora','$servidor','$banco','$usuario','$senha') ");

if($inserir){ 


	
$oldmask = umask(0);	
mkdir('../'.$str3.'/', 0777, true);
umask($oldmask);
	
		$oldmask = umask(0);	
mkdir('../'.$str3.'/evidencias', 0777, true);
umask($oldmask);
	
		$oldmask = umask(0);	
mkdir('../'.$str3.'/imgs', 0777, true);
umask($oldmask);
	
	$oldmask = umask(0);	
mkdir('../'.$str3.'/uploads', 0777, true);
umask($oldmask);
	
	$oldmask = umask(0);	
mkdir('../'.$str3.'/uploads-cadastro', 0777, true);
umask($oldmask);	
	
	$oldmask = umask(0);	
mkdir('../'.$str3.'/uploads-qaa', 0777, true);
umask($oldmask);
	
	$oldmask = umask(0);	
mkdir('../'.$str3.'/uploads-workflow', 0777, true);
umask($oldmask);	

	
copia_ficheiros("../estrutura-de-pastas/imgs/","../".$str3."/imgs/");

copia_ficheiros("../estrutura-de-pastas/evidencias/","../".$str3."/evidencias/");	


$texto1=" <?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>";
$texto1.=" <?php date_default_timezone_set('America/Sao_Paulo'); ?>";
$texto1.="<?php ".'$conexao'."= mysqli_connect('$servidor', '$usuario', '$senha','$banco'); ?>";


$arquivo = fopen('../'.$str3.'/conexao.php', 'w');
fwrite($arquivo, $texto1);
fclose($arquivo);

?>

<script>
location.href="contas.php"
</script>
	
	
<?php }else{?>
	
<script>
alert("Conta não pode ser cadastrada! Tente novamente!")
location.href="nova-conta.php"
</script>	
	
<?php }}else{ ?>
	
<script>
alert("Domínio ja cadastrado!")
location.href="nova-conta.php"
</script>		
	
<?php } ?>






             