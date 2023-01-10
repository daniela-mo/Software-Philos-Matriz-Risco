
<?php
if($_FILES['file']['name'] != ''){
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = rand(100,999).'.'.$extension;
	
	 $error = $_FILES['file']['error'];
    if ($error !== UPLOAD_ERR_OK) {
        echo 'Erro ao fazer o upload:', $error;
    }

    $location = 'public_html/m2v.braol.com.br/uploads/'.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);

    echo $name;
}

