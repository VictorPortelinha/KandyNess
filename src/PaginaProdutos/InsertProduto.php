<?php 
require "../dbConnection/queries.php";


$idLoja = $_POST['idLoja'];
$nomeProduto = $_POST['nomeProduto'];
$categoria = $_POST['categoriaProduto'];
$descricaoProduto = $_POST['descProduto'];
$valor = $_POST['precoProduto'];
$imagemProduto = $_POST['imgProduto'];

$result = insertNovosProdutos($idLoja,$nomeProduto,$categoria,$descricaoProduto,$valor);
if($result){
    header('location:http://localhost/webProjects/KandyNess/src/PaginaProdutos/produtos.php?idloja='.$idLoja);
}



?>