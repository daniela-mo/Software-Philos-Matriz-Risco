<?php
include('header.php')

?>



                <!-- End of Topbar -->

              <div class="container-fluid">

                    <!-- Page Heading -->
                   <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Nova Conta</h1>
                        
                    </div>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4  mt-4">
                       
                        <div class="card-body mt-4 mb-4">
                           
								<form action="processa-nova-conta.php" method="post">
								<div class="row">
									<div class="col-md-12">
											<h4><strong>Dados da empresa</strong></h4>
										</div>
									
									<div class="col-md-4 mb-3">
										<label>Nome da Empresa</label>
										<input type="text" name="cad-empresa" id="cad-empresa" class="form-control" required>
									</div>	
									<div class="col-md-4 mb-3">
										<label>CNPJ</label>
										<input type="text" name="cad-cnpj" id="cad-cnpj" class="form-control">
									</div>	
									
									
									<div class="col-md-4 mb-3">
										<label>Prefixo(dominio do cliente)</label>
										<input placeholder="dominio.com.br" type="url" name="cad-prefixo" id="cad-prefixo" class="form-control" required>
									</div>	
									
									
									
								</div>
									
									
									<div class="row">
										<div class="col-md-12 mt-4">
											<h4><strong>Banco de Dados</strong></h4>
										</div>
										
									<div class="col-md-4 mb-3">
										<label>Servidor</label>
										<input type="text" name="cad-servidor" id="cad-servidor" class="form-control" required>
									</div>	
									<div class="col-md-4 mb-3">
										<label>Usuário</label>
										<input type="text" name="cad-usuario" id="cad-usuario" class="form-control" required>
									</div>	
									
									
									<div class="col-md-4 mb-3">
										<label>Senha</label>
										<input type="text" name="cad-senha" id="cad-senha" class="form-control" required>
									</div>	
									
									
									<div class="col-md-4 mb-3">
										<label>Banco de dados</label>
										<input  type="text" name="cad-banco" id="cad-banco" class="form-control" required>
									</div>	
								</div>
									
								<div class="col-md-12 ml-0 pl-0 mt-3">
										
								<input type="submit" value="Cadastrar Conta" class="btn btn-primary ml-0 ">
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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