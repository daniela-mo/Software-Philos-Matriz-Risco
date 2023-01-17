	<label>Nome do Anexo</label>				
	<input type="text" name="nome-arquivo" id="nome-arquivo" class="form-control">				
					
					
	<span id="msg" style="color:red"></span><br/>
    <input type="file" id="photo"><br/>
					
  
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>	
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('change','#photo',function(){
        var property = document.getElementById('photo').files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
		  	var nome=$("#nome-arquivo").val()
       

        var form_data = new FormData();
        form_data.append("file",property);
        $.ajax({
          url:'funcoes/upload-qaa.php?nome='+nome,
          method:'POST',
          data:form_data,
          contentType:false,
          cache:false,
          processData:false,
          beforeSend:function(){
            $('#msg').html('Loading......');
          },
          success:function(data){
            console.log(data);
            $('#msg').html(data);
			 $('.close').trigger("click") 
			CarregaAnexos()  
          }
        });
      });
    });
  </script>	