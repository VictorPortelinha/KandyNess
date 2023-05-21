<?php
require "../dbConnection/connection.php";

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
function getLojaFromVendedor(){
    
}

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
    }
};

?>