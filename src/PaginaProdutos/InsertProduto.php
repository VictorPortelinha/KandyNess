<?php 
require "../dbConnection/queries.php";

$idProduto = $_POST['idProduto'];
$idLoja = $_POST['idLoja'];
$nomeProduto = $_POST['nomeProduto'];
$categoria = $_POST['categoriaProduto'];
$descricaoProduto = $_POST['descProduto'];
$valor = $_POST['precoProduto'];
$imagemProduto = $_FILES['imgProduto'];


$result = insertNovosProdutos($idLoja,$nomeProduto,$categoria,$descricaoProduto,$valor);
if($result){
    insertImageInLoja($idLoja,$idProduto,$imagemProduto);
    //header('location:http://localhost/webProjects/KandyNess/src/PaginaProdutos/produtos.php?idloja='.$idLoja);
}



?>