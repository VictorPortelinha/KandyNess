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

function selecionarTodosOsProdutos($nomeLoja){
    global $conn; //declara a variavel como global para que ela possar ser recebida dentro da function. Está sendo recebida do arquivo connection.php
    $sql = "SELECT * FROM tb_produtos WHERE nome_loja = \"" . $nomeLoja . "\"";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
}}



?>