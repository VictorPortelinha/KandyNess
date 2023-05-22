<?php 
require "../dbConnection/queries.php";

$idProduto = $_POST['idProduto'];
$idLoja = $_POST['idLoja'];
$nomeProduto = $_POST['nomeProduto'];
$categoria = $_POST['categoriaProduto'];
$descricaoProduto = $_POST['descProduto'];
$valor = $_POST['precoProduto'];



$result = insertNovosProdutos($idLoja,$nomeProduto,$categoria,$descricaoProduto,$valor);
if($result){
    $idProduto = selectHighestId();
    
    header('location:http://localhost/webProjects/KandyNess/src/PaginaProdutos/produtos.php?idloja='.$idLoja); //retorna a loja aonde foi feita a inserção
}



?>