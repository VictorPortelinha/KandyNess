<?php
require "../dbConnection/connection.php";


function insertIntoUsers($nome,$matricula,$password,$cpf,$userType) {
    global $conn;
    $result = $conn->query("INSERT INTO tb_usuario(nome,matricula,cpf,vendedor,senha) VALUES ('$nome', '$matricula', '$cpf', '$userType', '$password')");
    return $result;
}


function selectHighestId(){
    global $conn;
    $result = $conn->query("SELECT MAX(id) AS max_id FROM tb_produtos");
    while($row = $result->fetch_assoc()){
        $id = $row['max_id'];
        return $id;
    }
}
function selectProdutoById($idProduto,$idLoja){
    global $conn;
    $result = $conn->query("SELECT * FROM tb_produtos WHERE id = " . $idProduto . " AND id_loja = " . $idLoja);
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}    


function selectNomeDoLoja($idLoja) {
    global $conn;
    $sql = "SELECT nome as nome FROM tb_lojas WHERE id = " . $idLoja;
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $nome = $row['nome'];
    }return $nome;
}


function returnAutoIncrementValue(){
    global $conn;
    $result =$conn->query("SHOW TABLE STATUS LIKE 'tb_produtos'");
    $row = $result->fetch_assoc();
    $autoIncrementValue = $row['Auto_increment'];
    return $autoIncrementValue;
}

function selecionarTodasAsLojas(){
    global $conn; //declara a variavel como global para que ela possar ser recebida dentro da function. Está sendo recebida do arquivo connection.php
    $sql = "SELECT * from tb_lojas";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
}}


function selecionarTodosOsProdutos($idLoja){
    global $conn; //declara a variavel como global para que ela possar ser recebida dentro da function. Está sendo recebida do arquivo connection.php
    $sql = "SELECT * FROM tb_produtos WHERE id_loja = \"" . $idLoja . "\"";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
}};

function retornarPathImagemDaLoja($idLoja) {
    global $conn;
    $result = $conn->query("SELECT * FROM tb_lojaImages WHERE id = \"" . $idLoja . "\"");

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $imageURL = '../assets/images/StoreImages/'.$row["file_name"];
        }}
    if(isset($imageURL)){
        return $imageURL;
    }
    else {
        $imageURL = '../assets/images/StoreImages/Default.jpg';
        return $imageURL;
    }};
function retornPathImagemDoProduto($idLoja,$idProduto){
    global $conn;
    $result = $conn->query("SELECT * FROM tb_produtosImages WHERE id_produto = " . $idProduto . " AND id_loja = " . $idLoja);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $imageURL = '../assets/images/StoreImages/'.$row["file_name"];
        }}
    if(isset($imageURL)){
        return $imageURL;
    }
    else {
        $imageURL = '../assets/images/StoreImages/Default.jpg';
        return $imageURL;
}
}
function retornarFileName($idLoja,$idProduto){
    global $conn;
    $result = $conn->query("SELECT * FROM tb_produtosImages WHERE id_produto = " . $idProduto . " AND id_loja = " . $idLoja);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            return $row["file_name"];
        }}
    
}



function insertNovosProdutos($idLoja,$nome,$categoria,$descricao,$valor){
    global $conn;


    $insertQuery = "INSERT INTO tb_produtos (id_loja, nome, valor, descricao, categoria)
    VALUES ('$idLoja', '$nome', '$valor', '$descricao', '$categoria')";

    $conn->query($insertQuery);
    
    
    return $insertQuery;
};

function insertImageInLoja($idLoja,$idProduto,$imagemProduto) {
    global $conn;
    $diretorio = "/xampp/htdocs/webProjects/KandyNess/src/assets/images/StoreImages/"; //diretório em que as imagens serão postadas
    $fileName = basename($imagemProduto["name"]);
    $targetFilePath = $diretorio . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    $allowTypes = array('jpg','png','jpeg',);
    if(isset($imagemProduto["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg',);
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($imagemProduto["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $conn->query("INSERT INTO tb_produtosImages (file_name, uploaded_on, id_loja,id_produto) VALUES ('".$fileName."', NOW(), '".$idLoja."','".$idProduto."')");
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
};
function removeProduct($idProduto,$idLoja){
    global $conn;
    $removeProduct = $conn->query("DELETE FROM tb_produtos WHERE id = " . $idProduto . " AND id_loja = " . $idLoja);
    return $removeProduct;
    

}
function updateProduto($idProduto,$idLoja,$nomeProduto,$categoria,$descricaoProduto,$valor){
    global $conn;


    $updateQuery = "UPDATE tb_produtos
    SET nome = '$nomeProduto', valor = $valor, categoria = '$categoria', descricao = '$descricaoProduto'
    WHERE id_loja = $idLoja AND id = $idProduto";

    $result = $conn->query($updateQuery);
    return $result;


    }
function updateImagemProduto($idLoja,$idProduto,$imagemProduto){
    global $conn;
    $diretorio = "/xampp/htdocs/webProjects/KandyNess/src/assets/images/StoreImages/"; //diretório em que as imagens serão postadas
    $fileName = basename($imagemProduto["name"]);
    $targetFilePath = $diretorio . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    $allowTypes = array('jpg','png','jpeg',);
    if(isset($imagemProduto["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg',);
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($imagemProduto["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $conn->query("UPDATE tb_produtosImages SET file_name = '$fileName' WHERE id_loja = '$idLoja' AND id_produto = '$idProduto'");

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
}

    

?>