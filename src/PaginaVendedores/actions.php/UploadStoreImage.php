<?php
require_once "/xampp/htdocs/webProjects/KandyNess/src/dbConnection/connection.php";
$idLoja = $_POST['idLoja'];
$diretorio = "/xampp/htdocs/webProjects/KandyNess/src/assets/images/StoreImages/"; //diretório em que as imagens serão postadas
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $diretorio . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);



if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg',);
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT INTO tb_lojaImages (file_name, uploaded_on, imagem_loja) VALUES ('".$fileName."', NOW(), '".$idLoja."')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                 $statusMsg = "Upload de imagem falhou, tente novamente";
            } 
        }else{
             $statusMsg = "Desculpe, houve um erro ao tentar enviar a sua imagem";
        }
    }else{
         $statusMsg = 'Desculpe, somente imagens do tipo JPG, JPEG, PNG, são permitidas no sistema .';
    }
}else{
     $statusMsg = 'Por favor, selecione uma imagem para dar upload na imagem';
}

echo $statusMsg;

?>