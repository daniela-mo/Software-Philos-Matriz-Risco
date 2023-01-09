<?php
include('header.php');
$codigo=$_REQUEST['cod'];
?>



                <!-- End of Topbar -->

              <div class="container-fluid">

              
                   <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Contas </h1>
                        <a href="nova-conta.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i
                                class="fas fa-edit fa-sm text-white-50"></i> Nova Conta</a>
                    </div>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4  mt-4">
                       
                        <div class="card-body">
<?php
$selecao=mysqli_query($conexao,"select * from empresas_cadastradas WHERE id='$codigo'");
$registros=mysqli_fetch_array($selecao);		
							
?>	
							
<form action="processa-atualizar-conta.php" method="post">
	<input type="hidden" name="codigo" value="<?php echo $codigo ?>">
		  
								<div class="row">
									<div class="col-md-4 mb-3">
										<label>Empresa</label>
										<input type="text" name="cad-empresa" id="cad-empresa" class="form-control" required value="<?php echo $registros['empresa'] ?>">
									</div>	
									<div class="col-md-4 mb-3">
										<label>CNPJ</label>
										<input type="text" name="cad-cnpj" id="cad-cnpj" class="form-control" value="<?php echo $registros['cnpj'] ?>">
									</div>	
									
									
									<div class="col-md-4 mb-3">
										<label>Prefixo</label>
										<input placeholder="dominio.com.br" type="text" name="cad-prefixo" id="cad-prefixo" class="form-control" required value="<?php echo $registros['prefixo'] ?>" readonly>
									</div>	
									
									
									<div class="col-md-4 mb-3">
										<label>Caminho</label>
										<input placeholder="dominio.com.br" type="text" name="cad-caminho" id="cad-caminho" class="form-control" required value="<?php echo $registros['caminho'] ?>" readonly>
									</div>
									
								</div>
	
	
	<div class="row mt-4">
		<div class="col-md-12">
		<h4>Banco de Dados</h4>
		</div>
		
		<div class="col-md-6 mb-3">
			<label>Endereço do Servidor</label>
			<input placeholder="dominio.com.br" type="text" name="cad-endereco" id="cad-endereco" class="form-control" required value="<?php echo $registros['servidor'] ?>" >
		</div>	
		
		<div class="col-md-6 mb-3">
			<label>Banco</label>
			<input  type="text" name="cad-banco" id="cad-banco" class="form-control" required value="<?php echo $registros['banco'] ?>" >
		</div>	
		
		
			<div class="col-md-5 mb-3">
			<label>Usuário</label>
			<input  type="text" name="cad-usuario" id="cad-usuario" class="form-control" required value="<?php echo $registros['usuario'] ?>" >
		</div>	
		
		<div class="col-md-5 mb-3">
			<label>Senha</label>
			<input  type="text" name="cad-senha" id="cad-senha" class="form-control" required value="<?php echo $registros['senha'] ?>" >
		</div>	
		
		
	
	</div>
									
								<div class="col-md-12 ml-0 pl-0 mt-3">
										
								<input type="submit" value="Atualizar dados da Conta" class="btn btn-primary ml-0 ">
									<p class="float-right"><a class="btn btn-danger" onClick="ExcluirConta(<?php echo $registros['id'] ?>)">Excluir Conta</a></p>
									</div>		
									
								</form>							
							
							
						
							
							
                        </div>
                    </div>

                </div>

          

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

	<script>
		
		
		function ExcluirConta(codigo){
			
			if (confirm("Deseja confirmar a exclusão?")) {

                location.href="excluir-conta.php?codigo="+codigo

            } else {

                return false;

            }

		
			
			
			
		}
		

	$("#dataTable").dataTable({
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
</body>

</html>