<?php
require "../dbConnection/queries.php";

$idProduto = $_POST['idProduto'];
$idLoja = $_POST['idLoja'];
$nomeProduto = $_POST['nomeProduto'];
$categoria = $_POST['categoriaProduto'];
$descricaoProduto = $_POST['descProduto'];
$valor = $_POST['precoProduto'];
$estoque = $_POST['estoqueProduto'];




$result = updateProduto($idProduto,$idLoja,$nomeProduto,$categoria,$descricaoProduto,$valor,$estoque);
if($result){
   
    header('location:http://localhost/webProjects/KandyNess/src/PaginaProdutos/produtos.php?idloja='.$idLoja);
}

?>